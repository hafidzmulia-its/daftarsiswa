<!DOCTYPE html>
<html lang="en">
<head>
 <title>Detail Siswa</title>
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
 echo "<h1>Detail Siswa</h1>";
 echo "<p>Berikut ini adalah detail dari siswa yang dipilih.</p>";
 echo "<form>";
 if (mysqli_num_rows($result) > 0) {
 while($row = mysqli_fetch_assoc($result)) {
 echo "<div class=\"form-group\">";
 echo "<label>Nama :</label>";
 echo "<input type=\"text\" class=\"formcontrol\" name=\"nama\" value=\"" . $row["nama"] . "\" disabled>";
 echo "</div>";
 echo "<div class=\"form-group\">";
 echo "<label>NRP :</label>";
 echo "<input type=\"number\" class=\"formcontrol\" name=\"nrp\" value=\"" . $row["nrp"] . "\" disabled>";
 echo "</div>";
 echo "<div class=\"form-group\">";
 echo "<label>Tanggal Lahir :</label>";
 echo "<input type=\"date\" class=\"formcontrol\" name=\"tanggallahir\" value=\"" . $row["tanggallahir"] . "\" disabled>";
 echo "</div>";
 echo "<div class=\"form-group\">";
 echo "<label>Jenis Kelamin :</label>";
 echo "<div class=\"form-check\">";
 echo "<label class=\"form-check-label\">";
 echo "<input type=\"radio\" class=\"form-checkinput\" name=\"jeniskelamin\" value=\"Laki-laki\" ";
 if ($row["jeniskelamin"] == "Laki-laki") {
 echo "checked ";
 }
echo "disabled>";
 echo "Laki-laki";
 echo "</label>";
 echo "</div>";
 echo "<div class=\"form-check\">";
 echo "<label class=\"form-check-label\">";
 echo "<input type=\"radio\" class=\"form-checkinput\" name=\"jeniskelamin\" value=\"Perempuan\" ";
 if ($row["jeniskelamin"] == "Perempuan") {
 echo "checked ";
 }
echo "disabled>";
 echo "Perempuan";
 echo "</label>";
 echo "</div>";
 echo "</div>";
 echo "<div class=\"form-group\">";
 echo "<label>Deskripsi :</label>";
 echo "<textarea class=\"formcontrol\" rows=\"5\" name=\"deskripsi\" disabled>" . $row["deskripsi"] . "</textarea>";
 echo "</div>";
 }
 }
 else {
 echo "Data tidak ditemukan.";
 }
 echo "</form>";
 mysqli_close($conn);
 }
 ?>
 </div>

 <?php
 include 'javascript.php';
 ?>
</body>
</html>