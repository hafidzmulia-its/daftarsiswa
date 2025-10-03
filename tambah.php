<?php
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert query
    $query = "INSERT INTO siswa (nama, nis, kelas, jurusan, email) VALUES ('$nama', '$nis', '$kelas', '$jurusan', '$email')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?pesan=success");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa - CRUD PHP Native</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Siswa Baru</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nis">NIS (Nomor Induk Siswa):</label>
                    <input type="text" id="nis" name="nis" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" placeholder="Contoh: XII" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="IPA">IPA</option>
                        <option value="IPS">IPS</option>
                        <option value="Bahasa">Bahasa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
