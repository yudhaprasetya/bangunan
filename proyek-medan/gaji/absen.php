<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <style media="screen">
  <?php
  include '../style/table-def.css';
  include '../style/master.css';
  ?>
  </style>
</head>
<body>

  <div class="print_hidden">
    <form id="form_pekerja" action="<?php $_SERVER["PHP_SELF"] ?>" method="get">
      <div class="w3-padding w3-center">
        <input class="w3-input w3-round-large" type="text" onfocus="(this.type='date')" onchange="this.form.submit();" name="tanggal" id="tanggal" placeholder="Pilih Tanggal di Hari Sabtu">
      </div>
    </form>
  </div>

  <?php
  require '../admin/conn.php';
  if (!empty($_REQUEST['tanggal'])) {
    date_default_timezone_set("Asia/Jakarta");
    $tanggal = addslashes($_REQUEST['tanggal']);

    $sunday = strtotime("-6 day, $tanggal");
    $senin = strtotime("-5 day, $tanggal");
    $selasa = strtotime("-4 day, $tanggal");
    $rabu = strtotime("-3 day, $tanggal");
    $kamis = strtotime("-2 day, $tanggal");
    $jumat = strtotime("-1 day, $tanggal");
    $sabtu = strtotime("$tanggal");

    $sun_format = date("Y-m-d", $sunday);
    $sen_format = date("Y-m-d", $senin);
    $sel_format = date("Y-m-d", $selasa);
    $rab_format = date("Y-m-d", $rabu);
    $kam_format = date("Y-m-d", $kamis);
    $jum_format = date("Y-m-d", $jumat);
    $sab_format = date("Y-m-d", $sabtu);

    $sun_indo = date("d F", $sunday);
    $sen_indo = date("d F", $senin);
    $sel_indo = date("d F", $selasa);
    $rab_indo = date("d F", $rabu);
    $kam_indo = date("d F", $kamis);
    $jum_indo = date("d F", $jumat);
    $sab_indo = date("d F", $sabtu);

    $sql = "SELECT a.nama_karyawan, a.jabatan, a.upah,
    SUM(CASE WHEN waktu >= '$sun_format%' THEN b.hutang else 0 end) hutang,
    SUM(CASE WHEN waktu >= '$sun_format%' THEN b.tabungan else 0 end) tabungan,
    SUM(CASE WHEN waktu LIKE '$sen_format%' THEN b.lembur else 0 end) senin,
    SUM(CASE WHEN waktu LIKE '$sel_format%' THEN b.lembur else 0 end) selasa,
    SUM(CASE WHEN waktu LIKE '$rab_format%' THEN b.lembur else 0 end) rabu,
    SUM(CASE WHEN waktu LIKE '$kam_format%' THEN b.lembur else 0 end) kamis,
    SUM(CASE WHEN waktu LIKE '$jum_format%' THEN b.lembur else 0 end) jumat,
    SUM(CASE WHEN waktu LIKE '$sab_format%' THEN b.lembur else 0 end) sabtu,
    SUM(CASE WHEN waktu LIKE '$sun_format%' THEN b.lembur else 0 end) sunday,
    COUNT(CASE WHEN waktu LIKE '$sun_format%' THEN b.ket_hadir END) hdsunday,
    COUNT(CASE WHEN waktu LIKE '$sen_format%' THEN b.ket_hadir END) hdsenin,
    COUNT(CASE WHEN waktu LIKE '$sel_format%' THEN b.ket_hadir END) hdselasa,
    COUNT(CASE WHEN waktu LIKE '$rab_format%' THEN b.ket_hadir END) hdrabu,
    COUNT(CASE WHEN waktu LIKE '$kam_format%' THEN b.ket_hadir END) hdkamis,
    COUNT(CASE WHEN waktu LIKE '$jum_format%' THEN b.ket_hadir END) hdjumat,
    COUNT(CASE WHEN waktu LIKE '$sab_format%' THEN b.ket_hadir END) hdsabtu
    FROM tukang AS a LEFT JOIN absen_tukang AS b ON a.nama_karyawan=b.nama_karyawan WHERE status_aktif LIKE 'Masih Aktif' GROUP BY nama_karyawan, jabatan, upah ORDER BY a.nama_karyawan";
    $result = $conn->query($sql);
    $counter = 1;
    $total = 0;
    $hasil_total_gaji = 0;
    $hasil_hutang = 0;
    $hasil_upah = 0;
    $hasil_lembur = 0;
    $hasil_gaji = 0;

    echo "
    <table>

      <caption class=\"w3-yellow w3-padding\">
        *Perhitungan Gaji Dimulai Dari Hari Minggu tanggal <b>".date("d F Y" ,$sunday)."</b> Sampai Hari Sabtu Tanggal <b>".date("d F Y", $sabtu)."</b>
      </caption>

      <caption class=\"w3-center w3-blue\">
        <h1>Absensi Dan Gaji Tukang Harian</h1>
      </caption>

      <thead class=\"thead\">
        <tr>
          <th colspan=\"3\"></th>
          <th>$sun_indo</th>
          <th>$sen_indo</th>
          <th>$sel_indo</th>
          <th>$rab_indo</th>
          <th>$kam_indo</th>
          <th>$jum_indo</th>
          <th>$sab_indo</th>
          <th colspan=\"9\"></th>
        </tr>

        <tr>
          <th class=\"th\">No.</th>
          <th class=\"th\" style=\"min-width: 120px\">Nama Pekerja</th>
          <th class=\"th\" style=\"min-width: 80px\">Jabatan</th>
          <th class=\"th\">Minggu</th>
          <th class=\"th\">Senin</th>
          <th class=\"th\">Selasa</th>
          <th class=\"th\">Rabu</th>
          <th class=\"th\">Kamis</th>
          <th class=\"th\">Jum'at</th>
          <th class=\"th\">Sabtu</th>
          <th class=\"th\">Jumlah</th>
          <th class=\"th\" style=\"min-width: 100px\">Upah</th>
          <th class=\"th\" style=\"min-width: 100px\">Pendapatan</th>
          <th class=\"th\" style=\"min-width: 100px\">Pendapatan Lembur</th>
          <th class=\"th\" style=\"min-width: 100px\">Pendapatan</th>
          <th class=\"th\" style=\"min-width: 100px\">Bayar Pinjaman</th>
          <th class=\"th\" style=\"min-width: 100px\">Tabungan</th>
          <th class=\"th\" style=\"min-width: 100px\">Sisa Pendapatan</th>
          <th class=\"th\" style=\"min-width: 100px\">Tanda Tangan</th>
        </tr>
      </thead>

      ";

      if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {
          $upah = $total + $row['upah'];
          $hutang = $total + $row['hutang'];
          $tabungan = $total + $row['tabungan'];
          $sum_absen = $row['hdsunday'] + $row['hdsenin'] + $row['hdselasa'] + $row['hdrabu'] + $row['hdkamis'] + $row['hdjumat'] + $row['hdsabtu'];
          $sum_lembur = $row['sunday'] + $row['senin'] + $row['selasa'] + $row['rabu'] + $row['kamis'] + $row['jumat'] + $row['sabtu'];
          $rata_lembur = $row['upah'] / 8 * $sum_lembur;
          $sum_total_gaji = $sum_absen * $row['upah'] + $rata_lembur;
          $sum_gaji = $sum_absen * $row['upah'] + $rata_lembur - $row['hutang'] - $row['tabungan'];
          $sum_upah = $sum_absen * $row['upah'];

          $hasil_total_gaji += $sum_total_gaji;
          $hasil_upah += $sum_upah;
          $hasil_lembur += $rata_lembur;
          $hasil_gaji += $sum_gaji;
          $hasil_hutang += $hutang;
          $hasil_tabungan += $tabungan;

          if ($sum_absen==0) {
            # code...
            $abai = $abai+1;
            $color = 'w3-text-gray';
          } else {
            # code...
            $yg_bergaji = $yg_bergaji+1;
            $color = NULL;
          }

          $rp_upah = number_format(floatval($upah));
          $rp_hutang = number_format(floatval($hutang));
          $rp_tabungan = number_format(floatval($tabungan));
          $rp_total_gaji = number_format(floatval($sum_total_gaji));
          $rp_gaji = number_format(floatval($sum_gaji));
          $rp_sum_upah = number_format(floatval($sum_upah));
          $rp_lembur = number_format(floatval($rata_lembur));

          $rp_hasil_total_gaji = number_format(floatval($hasil_total_gaji));
          $rp_hasil_upah = number_format(floatval($hasil_upah));
          $rp_hasil_lembur = number_format(floatval($hasil_lembur));
          $rp_hasil_gaji = number_format(floatval($hasil_gaji));
          $rp_hasil_hutang = number_format(floatval($hasil_hutang));
          $rp_hasil_tabungan = number_format(floatval($hasil_tabungan));

          echo "
          <tr class=\"$color\">
            <td>".$counter."</td>
            <td><a href=\"/medan-ggkasih/absen/cari-profile.php?proses=".$row["nama_karyawan"]."\" class=\"w3-btn w3-round\">
              <b>".$row['nama_karyawan']."</b></a></td>
              <td>".$row["jabatan"]."</td>
              <td class=\"w3-center\">".$row['hdsunday']."/".$row['sunday']."</td>
              <td class=\"w3-center\">".$row['hdsenin']."/".$row['senin']."</td>
              <td class=\"w3-center\">".$row['hdselasa']."/".$row['selasa']."</td>
              <td class=\"w3-center\">".$row['hdrabu']."/".$row['rabu']."</td>
              <td class=\"w3-center\">".$row['hdkamis']."/".$row['kamis']."</td>
              <td class=\"w3-center\">".$row['hdjumat']."/".$row['jumat']."</td>
              <td class=\"w3-center\">".$row['hdsabtu']."/".$row['sabtu']."</td>
              <td class=\"w3-center\">".$sum_absen."/".$sum_lembur."</td>
              <td>Rp<i class=\"w3-right\">".$rp_upah."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_sum_upah."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_lembur."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_total_gaji."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_hutang."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_tabungan."</i></td>
              <td>Rp<i class=\"w3-right\">".$rp_gaji."</i></td>
              <td></td>
            </tr>
            ";
            $counter++;
          }

          echo "
          <tr>
            <th colspan=\"3\">Jumlah Absen/Lembur</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th colspan=\"8\"></th>
          </tr>
          ";
        }
        echo "
        <thead class=\"w3-yellow\">
          <th colspan=\"12\">Total / Jumlah Keseluruhan (Upah, Lembur dan Total Pendapatan) Mingguan</th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_upah</i></th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_lembur</i></th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_total_gaji</i></th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_hutang</i></th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_tabungan</i></th>
          <th>Rp <i class=\"w3-right\">$rp_hasil_gaji</i></th>
          <th></th>
        </thead>
        <tr>
          <th colspan=\"10\">Yang Bekerja Minggu Ini Sebanyak $yg_bergaji orang</th>
          <th colspan=\"9\">Yang Tidak Bekerja Minggu Ini Sebanyak $abai orang</th>
        </tr>
        ";
        echo "</table>";
      }
      ?>
    </body>
    </html>
