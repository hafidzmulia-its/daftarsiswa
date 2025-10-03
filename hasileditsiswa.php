<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hasil Edit Siswa</title>
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

 $ID = $_POST["id"];
 $NAMA = $_POST["nama"];
 $NRP = $_POST["nrp"];
 $TANGGALLAHIR = $_POST["tanggallahir"];
 $JENISKELAMIN = $_POST["jeniskelamin"];
 $DESKRIPSI = $_POST["deskripsi"];
 $sql = "UPDATE $TABEL SET nama='$NAMA', nrp='$NRP', tanggallahir='$TANGGALLAHIR', jeniskelamin='$JENISKELAMIN', deskripsi='$DESKRIPSI' WHERE id=$ID";
 if (mysqli_query($conn, $sql)) {
 echo "<h1>Edit Siswa Berhasil</h1>";
 }
 else {
 echo "<h1>Edit Siswa Gagal</h1>";
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