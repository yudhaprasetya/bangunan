<?php
session_start();
?>
<?php echo $_SESSION["message"] ; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Proyek Bangunan - Create Admin User</title>

  <style media="screen">
  <?php include '../../../style/create.css'; ?>
  </style>
</head>
<body>

  <header>
    Buat Anggota Admin
  </header>



  <div class="main">
    <form class="" action="proses.php" method="post">
      <label for="nama">Nama Lengkap</label>
      <input type="text" name="nama" required placeholder="Sesuai KTP" value="">
      <label for="no_ktp">Nomor KTP</label>
      <input type="text" name="no_ktp" required placeholder="Input Nomor KTP" value="">
      <label for="bod">Tanggal Lahir</label>
      <input type="date" name="bod" required value="">
      <label for="uname">Username</label>
      <input type="text" name="uname" required placeholder="Input Username" value="">
      <label for="email">E-mail</label>
      <input type="email" name="email" required placeholder="Input Alamat E-mail" value="">
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" required placeholder="Alamat Tempat Tinggal" value="">
      <label for="password">Password</label>
      <input type="password" name="password" required placeholder="Input Password" value="">
      <input type="submit" name="new_adm" value="Buat Admin">
    </form>
  </div>

</body>
</html>
