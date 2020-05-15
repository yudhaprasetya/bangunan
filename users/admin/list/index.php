<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Proyek Bangunan - Daftar Nama Administrator</title>

  <style media="screen">
    <?php include '../../../style/user.css'; ?>
  </style>
</head>
<body>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Lengkap</th>
        <th>Nomor KTP</th>
        <th>Tanggal Lahir</th>
        <th>Username</th>
        <th>Alamat E-mail</th>
        <th>Alamat Tinggal</th>
        <th>Password</th>
        <th>Tanggal Pembuatan</th>
      </tr>
    </thead>

    <?php
    include '../../../config/conn.php';

    $sql = "SELECT * FROM admin" ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // code...

      while ($row = $result->fetch_assoc()) {
        // code...
        $tanggal = $row["tanggal"];
        $bod = $row["bod"];
        $tgl_indo = date("d F Y", strtotime("$tanggal"));
        $bod_indo = date("d F Y", strtotime("$bod"));

        echo "
        <tbody>
        <tr>
        <td>".$row["id"]."</td>
        <td>".$row["nama"]."</td>
        <td>".$row["no_ktp"]."</td>
        <td>".$bod_indo."</td>
        <td>".$row["uname"]."</td>
        <td>".$row["email"]."</td>
        <td>".$row["alamat"]."</td>
        <td>".$row["password"]."</td>
        <td>".$tgl_indo."</td>
        <td>DEL</td>
        </tr>
        </tbody>
        ";
      }
    }else {
      // code...
      echo "
      <tbody>
        <tr>
          <td colspan=\"9\">Tidak Ada Data</td>
        </tr>
      </tbody>
      ";
    }
    ?>
  </table>
</body>
</html>
