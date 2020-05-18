<?php
session_start();
if(!isset($_SESSION['uname'])) {
  header('location:../auth');
} else {
  $uname_admin = $_SESSION['uname'];
}

require_once '../../config/conn.php';
$sql = "SELECT * FROM admin WHERE uname = '$uname_admin'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $nama = $row['nama'];
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Proyek Bangunan - Buat Proyek Baru</title>
  <style media="screen">
  <?php include '../../style/create.css'; ?>
  </style>
</head>
<body>

  <header>
    Buat Proyek Baru
  </header>

  <div class="main">

    <form class="" action="proses.php" method="post">
      <p><?php echo $_SESSION["message"]; ?></p>
      <label for="id_creator">ADMINISTRATOR</label>
      <input type="text" hidden name="id_creator" value="<?php echo "$id"; ?>">
      <input type="text" disabled name="" value="<?php echo "$nama"; ?>">
      <label for="nm_proyek">NAMA PROYEK</label>
      <input type="text" name="nm_proyek" required placeholder="Nama Proyek Sesuai Daerah" value="">
      <label for="nm_daerah">KOTA PROYEK</label>
      <input type="text" name="nm_daerah" required placeholder="Nama Daerah / Kota / Nama Jalan" value="">
      <label for="alamat">ALAMAT LENGKAP PROYEK</label>
      <input type="text" name="alamat" required placeholder="Alamat Lengkap Proyek" value="">
      <input type="submit" name="new_proyek" value="Buat Baru">
    </form>

  </div>
</body>
</html>
