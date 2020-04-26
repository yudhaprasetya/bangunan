<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nama Tukang</title>
</head>
<body>

<!-- Sql Select for PHP -->

<?php
require_once '../admin/conn.php';
$sql = "SELECT id, nama_karyawan, jabatan, upah, tgl_masuk, status FROM tukang ORDER BY nama_karyawan ASC";
$result = $conn->query($sql);
$number = 1;

if ($result->num_rows > 0) {
    # code...
    while ($row = $result->fetch_assoc()) {
        # code...
        $date = strtotime($row['tgl_masuk']);
        $tgl_format = date("d F Y", $date);
        $rp_upah = number_format(floatval($row['upah']));
    }
}
$conn->close();
?>

 <table>
     <caption>
         Daftar Nama Tukang
     </caption>

     <thead>
         <tr>
             <th>No</th>
             <th>Nama</th>
             <th>Jabatan</th>
             <th>Gaji/Hari</th>
             <th>Tanggal Masuk</th>
             <th>Alamat</th>
             <th>Status</th>
         </tr>
     </thead>
     <tbody>
         <tr>
             <td><?php echo $number ?></td>
             <td><?php echo $row["nama_karyawan"] ?></td>
             <td><?php echo $row["jabatan"] ?></td>
             <td><?php echo $row["upah"] ?></td>
             <td><?php echo $tgl_format ?></td>
             <td></td>
             <td><?php echo $row["status"] ?></td>
         </tr>
     </tbody>
 </table>
<?php $number++; ?>
 
</body>
</html>
