<?php
session_start();
if(isset($_SESSION['userp'])) {
  header('location:/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Bangunan - Login</title>

  <style media="screen">
  <?php include '../../style/login.css'; ?>
  </style>
</head>
<body>

  <header>
    <p>Proyek Bangunan - Login</p>
  </header>

  <form class="" action="proses.php" method="post">

    <div class="main">
      <?php
      require_once("../../config/conn.php");
      $sql = "SELECT * FROM nama_proyek ORDER BY nm_proyek ASC";
      $result = $conn->query($sql);

      echo "
      <select class=\"\" name=\"nm_proyek\">
      <option>Silahkan Pilih Nama Proyek</option>
      ";

      while ($row = $result->fetch_assoc()) {
        // code...
        echo "
          <option value=".$row["nm_proyek"].">".$row["nm_proyek"]."</option>
        ";
      }

      echo "</select>";

      ?>

      <input type="password" name="userp" value="" placeholder="Password / PIN">
      <input type="submit" name="login" value="( Masuk )">
    </div>
  </form>
</body>
</html>
