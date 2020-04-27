<style>
<?php
include '../style/profile.css';
include '../style/modal.css';
?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile Tukang Bangunan</title>
</head>
<body>

  <?php
  require '../admin/conn.php';
  if (!empty($_REQUEST["proses"])) {
    $proses = addslashes($_REQUEST['proses']);

    $sql = "SELECT id, nama_karyawan, foto, jabatan, upah, tgl_masuk, status_aktif FROM tukang WHERE id='$proses'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $nama = $row['nama_karyawan'];
        $id = $row['id'];
        $foto = $row['foto'];
        $jabatan = $row['jabatan'];
        $upah = $row['upah'];
        $rp_upah = number_format(floatval($row['upah']));
        $waktu = date("d F Y", strtotime($row['tgl_masuk']));
        $tgl_masuk = $row['tgl_masuk'];
        $status_aktif = $row['status_aktif'];
      }

      echo "
      <table>
      <caption>
      <div class=\"box\">".$foto."</div>
      </caption>

      <tr>
      <td>Nama Lengkap</td>
      <td>".$nama."</td>
      </tr>
      <tr>
      <td>Nomor ID</td>
      <td>".$id."</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>".$jabatan."</td>
    </tr>
    <tr>
      <td>Gaji / Hari</td>
      <td>".$rp_upah."</td>
    </tr>
    <tr>
      <td>Status</td>
      <td>".$status_aktif."</td>
    </tr>
    <tr>
      <td>Tanggal Masuk</td>
      <td>".$waktu."</td>
    </tr>
  </table>

  <div class=\"center\">
    <button onclick=\"goBack()\" style=\"width:auto;\">Kembali</button>
    <button onclick=\"document.getElementById('id01').style.display='block'\" style=\"width:auto;\">Ubah Profile</button>
  </div>

  <div id=\"id01\" class=\"modal\">

    <form class=\"modal-content animate\" action=\"update-profile.php\" method=\"post\">
      <div class=\"imgcontainer\">
        <span onclick=\"document.getElementById('id01').style.display='none'\" class=\"close\" title=\"Close Modal\">&times;</span>
      </div>

      <div class=\"container\">
        <label><b>Nomor ID</b></label>
        <input type=\"text\" value=\"".$id."\" name=\"id\" disabled>

        <label><b>Nama Lengkap</b></label>
        <input type=\"text\" value=\"".$nama."\" name=\"uname\" required>

        <label><b>Jabatan</b></label>
        <input type=\"text\" value=\"".$jabatan."\" name=\"jabatan\" required>

        <label><b>Gaji per Hari</b></label>
        <input type=\"number\" value=\"".$upah."\" name=\"gaji\" required>

        <label><b>Tanggal Masuk</b></label>
        <input type=\"date\" name=\"tanggal\" value=\"".$tgl_masuk."\" required>

        <label><b>Status Pekerja</b></label>
        <select name=\"status_aktif\">
          <option value=\"Masih Aktif\">Masih Aktif</option>
          <option value=\"Tidak Aktif\">Tidak Aktif</option>
        </select>

      </div>

      <div class=\"container center\" style=\"background-color:#f1f1f1\">
        <button type=\"button\" onclick=\"document.getElementById('id01').style.display='none'\">Batal</button>
        <button type=\"submit\" name=\"add\">Ganti Sekarang</button>
      </div>
    </form>
  </div>";
}
}
?>

<script src="../javascript/modal.js"></script>
<script src="../javascript/prev.js"></script>
</body>
</html>
