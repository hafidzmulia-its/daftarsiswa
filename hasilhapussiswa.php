<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hasil Hapus Siswa</title>
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
 if(isset($_POST["id"])) {
 include 'koneksi.php';
 $TABEL = "siswa";
 $ID = $_POST["id"];
 $sql = "DELETE FROM $TABEL WHERE id=$ID";

 if (mysqli_query($conn, $sql)) {
 echo "<h1>Hapus Siswa Berhasil</h1>";
 }
 else {
 echo "<h1>Hapus Siswa Gagal</h1>";
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