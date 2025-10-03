<!DOCTYPE html>
<html lang="en">
<head>
 <title>Hapus Siswa</title>
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
 $sql = "SELECT id, nama, nrp, tanggallahir, jeniskelamin, deskripsi FROM $TABEL WHERE id=$ID";
 $result = mysqli_query($conn, $sql);
 echo "<h1>Hapus Siswa</h1>";
 echo "<p>Apakah anda yakin akan menghapus data siswa berikut?</p>";
 echo "<p>";
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
 echo "Nama : " . $row["nama"] . "<br>";
 echo "NRP : " . $row["nrp"] . "<br>";
 echo "<form action=\"hasilhapussiswa.php\" method=\"post\">";
 echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
 echo "<button type=\"submit\" class=\"btn btndanger\">Hapus</button>";
 echo "</form>";
 }
 }
 else {
 echo "Data tidak ditemukan.";
 }
 echo "</p>";
 mysqli_close($conn);
 }
 ?>
 </div>

 <?php
 include 'javascript.php';
 ?>
</body>
</html>