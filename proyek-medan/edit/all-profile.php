<style>
<?php
include '../style/master.css';
include '../style/table.css';
include '../style/modal.css';
?>

</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Nama Tukang</title>
  <script src="https://kit.fontawesome.com/71dab61d8f.js" crossorigin="anonymous"></script>
</head>
<body>
  <div class="overflow">

  </div>
  <table>
    <caption>
      Daftar Nama Tukang
    </caption>

    <thead>
      <tr>
        <th>No</th>
        <th>No ID</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Gaji/Hari</th>
        <th>Tanggal Masuk</th>
        <th>Alamat</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>

      <!-- Sql Select for PHP -->

      <?php
      require_once '../admin/conn.php';
      $sql = "SELECT id, nama_karyawan, jabatan, upah, tgl_masuk, status_aktif FROM tukang ORDER BY nama_karyawan ASC";
      $result = $conn->query($sql);
      $number = 1;

      if ($result->num_rows > 0) {
        # code...
        while ($row = $result->fetch_assoc()) {
          # code...
          $date = strtotime($row['tgl_masuk']);
          $tgl_format = date("d F Y", $date);
          $rp_upah = number_format(floatval($row['upah']));

          echo "
          <tr>
            <td>".$number."</td>
            <td>".$row["id"]."</td>
            <td><a href=\"profile.php?proses=".$row["id"]."\">".$row["nama_karyawan"]."</a></td>
            <td>".$row["jabatan"]."</td>
            <td>Rp ".$rp_upah."</td>
            <td>$tgl_format</td>
            <td></td>
            <td>".$row["status_aktif"]."</td>
          </tr>";
          $number++;
        }
      } else {
        # code...
        echo "
        <tr>
          <td>Tidak Ada Tukang</td>
        </tr>";
      }
      $conn->close();
      ?>
    </tbody>
  </table>
</body>
</html>
