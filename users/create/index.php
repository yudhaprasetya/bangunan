<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftarkan User Baru</title>

  <style media="screen">
  <?php include '../../style/create.css'; ?>
  </style>
</head>
<body>

  <header>
    Daftar User Baru
  </header>

  <div class="main">

    <form class="" action="index.html" method="post">
      <label for="nama">Nama</label>
      <input type="text" name="nama" value="" placeholder="Nama Lengkap">
      <label for="namap">Nama Panggilan</label>
      <input type="text" name="namap" value="" placeholder="Nama Panggilan">
      <label for="pin">Pin</label>
      <input type="password" name="pin" value="" placeholder="PIN 4 Angka" maxlength="4">
      <label for="nm_proyek">Nama Proyek</label>
      <input type="text" name="nm_proyek" value="" placeholder="Nama Proyek">
      <label for="nm_daerah">Nama Daerah / Kota</label>
      <input type="text" name="nm_daerah" value="" placeholder="Nama Daerah / Kota">
      <input type="submit" name="create" value="Buat Baru">
    </form>

  </div>
</body>
</html>
