<?php
include 'config.php';

// Get student ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Delete query
$query = "DELETE FROM siswa WHERE id=$id";

if (mysqli_query($conn, $query)) {
    header("Location: index.php?pesan=delete");
} else {
    header("Location: index.php?pesan=error");
}

mysqli_close($conn);
exit();
?>
