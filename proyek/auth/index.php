<?php
require_once '../../config/conn.php';
session_start();
if(isset($_SESSION['uname'])) {
  header('location:../new');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Bangunan - Login as Admin</title>

  <style media="screen">
  <?php include '../../style/create.css'; ?>
  </style>
</head>
<body>

  <header>
    <p>Proyek Bangunan - Login as Admin</p>
  </header>

  <form class="" action="proses.php" method="post">

    <div class="main">

      <label for="uname">Username</label>
      <input type="text" name="uname" required placeholder="Username" value="">
      <label for="password">Password</label>
      <input type="password" name="password" value="" placeholder="Password">
      <input type="submit" name="login" value="Masuk">
    </div>
  </form>

</body>
</html>
