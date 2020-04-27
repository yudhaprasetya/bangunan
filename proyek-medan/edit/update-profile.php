<?php
require '../admin/conn.php';

if (isset($_POST["add"])) {
    $id = $_POST['id'];
    $nama = $_POST['uname'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal = $_POST['tanggal'];
    $status_aktif = $_POST['status_aktif'];

  $sql = "UPDATE tukang SET nama_karyawan='$nama', jabatan='$jabatan', upah='$gaji', tgl_masuk='$tanggal', status_aktif='$status_aktif' WHERE id='$id'";
  mysqli_select_db($conn, $sql);
  $retval = mysqli_query($conn, $sql);

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
}
?>
