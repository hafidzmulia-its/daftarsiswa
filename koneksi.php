<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "dios";
// Membuat koneksi
$conn = mysqli_connect($server, $username, $password, $database);
// Jika koneksi gagal
if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}else{
     echo "Koneksi Berhasil";
}
?>