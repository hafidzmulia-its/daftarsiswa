<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hasil Tambah Siswa</title>
 <?php
 include 'metacss.php';
 ?>
</head>
<body>
 <?php
 include 'navigation.php';
 ?>
 <div class="container p-3">
 <?php
 if(isset($_POST["nama"])) {
 include 'koneksi.php';
 $TABEL = "siswa";

 $NAMA = $_POST["nama"];
 $NRP = $_POST["nrp"];
 $TANGGALLAHIR = $_POST["tanggallahir"];
 $JENISKELAMIN = $_POST["jeniskelamin"];
 $DESKRIPSI = $_POST["deskripsi"];
 $sql = "INSERT INTO $TABEL (nama, nrp, tanggallahir, jeniskelamin, deskripsi) VALUES ('$NAMA', '$NRP', '$TANGGALLAHIR', '$JENISKELAMIN', '$DESKRIPSI')";

 if (mysqli_query($conn, $sql)) {
 echo "<h1>Tambah Siswa Berhasil</h1>";
 }
 else {
 echo "<h1>Tambah Siswa Gagal</h1>";
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }

 mysqli_close($conn);
 }
 ?>
 </div>
 <?php
 include 'javascript.php';
 ?>
</body>
</html>