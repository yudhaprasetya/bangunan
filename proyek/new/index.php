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

    <form class="" action="index.html" method="post">
      <label for="nm_proyek">Nama Proyek</label>
      <input type="text" name="nm_proyek" required placeholder="Nama Proyek Sesuai Daerah" value="">
      <label for="nm_daerah">Nama Daerah</label>
      <input type="text" name="nm_daerah" required placeholder="Nama Daerah / Kota / Nama Jalan" value="">
      <input type="submit" name="new_proyek" value="Buat Baru">
    </form>

  </div>
</body>
</html>
