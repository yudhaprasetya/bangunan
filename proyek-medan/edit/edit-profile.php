
<style>
    <?php
    include '../style/profile.css';
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

<table>

<?php
require '../admin/conn.php';
if (!empty($_REQUEST["proses"])) {
  $proses = addslashes($_REQUEST['proses']);

  $sql = "SELECT id, nama_karyawan, foto, jabatan, upah, tgl_masuk, status FROM tukang WHERE nama_karyawan='$proses'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $nama = $row['nama_karyawan'];
      $id = $row['id'];
      $foto = $row['foto'];
      $jabatan = $row['jabatan'];
      $rp_upah = number_format(floatval($row['upah']));
      $waktu = date("d F Y", strtotime($row['tgl_masuk']));
      $status = $row['status'];
    }

    echo "
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
        <td>".$status."</td>
    </tr>
    <tr>
        <td>Tanggal Masuk</td>
        <td>".$waktu."</td>
    </tr>";

    } else {
      // code...
      echo "
      <tr>
        <td>Tidak Ada</td>
      </tr>";
  }
    $conn->close();
  }
  ?>
</table>

</body>
</html>