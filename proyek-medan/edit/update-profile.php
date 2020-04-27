<?php
require '../admin/conn.php';

if (isset($_POST["change"])) {
    $id = $_POST['id'];
    $nama = $_POST['uname'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

  $sql = "UPDATE tukang SET nama_karyawan = '$nama', jabatan = '$jabatan', upah = '$gaji', tgl_masuk = '$tanggal', status = '$status' WHERE id='$id'";
  mysqli_select_db($conn, $sql);
  $retval = mysqli_query($conn, $sql);

  if (! $retval) {
    // code...

    echo "<script>
    alert(\"Perubahan Data Gagal!\");
    location.replace(\"profile.php?proses=$id\");
    </script>";
  }

  echo "<script>
  alert(\"Perubahan Data Berhasil!\");
  location.replace(\"profile.php?proses=$id\");
  </script>";
}
?>
