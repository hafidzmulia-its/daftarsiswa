<!DOCTYPE html>
<html lang="en">
<head>
 <title>Daftar Siswa</title>
 <?php
 include 'metacss.php';
 ?>
</head>
<body>
 <?php
 include 'navigation.php';
 ?>

 <div class="container p-3">
 <h1>Daftar Siswa</h1>
 <p>Berikut ini adalah daftar siswa yang tersimpan di database.</p>
 <div class="table-responsive">
 <table class="table table-striped table-bordered table-hover">
 <thead class="thead-dark">
 <tr>
 <th>No</th>
 <th>Nama</th>
 <th>NRP</th>
 <th>Detail</th>
 <th>Edit</th>
 <th>Hapus</th>
 </tr>
 </thead>
 <tbody>
 <?php
 include 'koneksi.php';
 $TABEL = "siswa";
 $sql = "SELECT id, nama, nrp FROM $TABEL";
 $result = mysqli_query($conn, $sql);
 
 if ($result && mysqli_num_rows($result) > 0) {
 // output data of each row
 $i = 1;
 while($row = mysqli_fetch_assoc($result)) {
 echo "<tr>";
 echo "<td>" . $i . "</td>";
 echo "<td>" . $row["nama"] . "</td>";
 echo "<td>" . $row["nrp"] . "</td>";

 echo "<td>";
 echo "<form action=\"detailsiswa.php\" method=\"post\">";
 echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
 echo "<button type=\"submit\" class=\"btn btn-primary btn-sm\">Detail</button>";
 echo "</form>";
 echo "</td>";
 echo "<td>";
 echo "<form action=\"editsiswa.php\" method=\"post\">";
 echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
 echo "<button type=\"submit\" class=\"btn btn-success btn-sm\">Edit</button>";
 echo "</form>";
 echo "</td>";
 echo "<td>";
 echo "<form action=\"hapussiswa.php\" method=\"post\">";
 echo "<input type=\"hidden\" name=\"id\" value=\"" . $row["id"] . "\">";
 echo "<button type=\"submit\" class=\"btn btn-danger btn-sm\">Hapus</button>";
 echo "</form>";
 echo "</td>";

 echo "</tr>";
 $i = $i+1;
 }
 } else if ($result) {
 echo "<tr><td colspan='6'>No students found</td></tr>";
 } else {
 echo "<tr><td colspan='6'>Error: " . mysqli_error($conn) . "</td></tr>";
 }
 $conn->close();
 ?>
 </tbody>
 </table>
 </div>
 </div>

 <?php
 include 'javascript.php';
 ?>
</body>
</html>