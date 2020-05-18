<?php

session_start();

require '../../config/conn.php';

if (isset($_POST["new_proyek"])) {
  $id_creator = $_POST['id_creator'];
  $nm_proyek = $_POST['nm_proyek'];
  $nm_daerah = $_POST['nm_daerah'];
  $alamat = $_POST['alamat'];

  $_SESSION["id"]= "$id_creator";

  date_default_timezone_set("Asia/Jakarta");
  $now = date("Y-m-d H:i:s");

  $sql = "INSERT INTO nama_proyek (id_creator, nm_proyek, nm_daerah, alamat, tanggal) VALUES
  ('$id_creator', '$nm_proyek', '$nm_daerah', '$alamat', '$now')";

  if (mysqli_query($conn, $sql)) {
    // code...
    $_SESSION["message"]= "proyek baru telah di buat / Tambah Lagi?";
    header("Location:../new/");
  } else {
    // code...
    $_SESSION["message"]= "proyek baru gagal di buat (Cek Data Apakah Sudah Benar?)";
    header("Location:../new/");
  }
  mysqli_close($conn);
}
?>
