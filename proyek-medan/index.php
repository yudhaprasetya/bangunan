<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyek Bangunan - Medan</title>
    <link rel="stylesheet" type="text/css" href="/proyek-medan/style/master.css">
  </head>
  <body>

    <?php
    date_default_timezone_set("Asia/Jakarta");
    $now = date("Y-m-d");
    $tanggal_str = strtotime("Saturday");
    $sabtu = date("Y-m-d", $tanggal_str);
    ?>

    <div class="center">

    </div>

    <a href="gaji/absen.php?<?php echo "$sabtu"; ?>">Absensi Gaji</a>
    <a href="absen/all-profile.php">Daftar Tukang Bangunan</a>

  </body>
</html>
