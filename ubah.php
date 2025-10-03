<?php
include 'config.php';

// Get student ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Update query
    $query = "UPDATE siswa SET nama='$nama', nis='$nis', kelas='$kelas', jurusan='$jurusan', email='$email' WHERE id=$id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: index.php?pesan=update");
        exit();
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}

// Fetch student data
$query = "SELECT * FROM siswa WHERE id=$id";
$result = mysqli_query($conn, $query);
$siswa = mysqli_fetch_assoc($result);

if (!$siswa) {
    header("Location: index.php?pesan=error");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa - CRUD PHP Native</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nis">NIS (Nomor Induk Siswa):</label>
                    <input type="text" id="nis" name="nis" value="<?php echo htmlspecialchars($siswa['nis']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($siswa['nama']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="kelas">Kelas:</label>
                    <input type="text" id="kelas" name="kelas" value="<?php echo htmlspecialchars($siswa['kelas']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">Jurusan:</label>
                    <select id="jurusan" name="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="IPA" <?php echo $siswa['jurusan'] == 'IPA' ? 'selected' : ''; ?>>IPA</option>
                        <option value="IPS" <?php echo $siswa['jurusan'] == 'IPS' ? 'selected' : ''; ?>>IPS</option>
                        <option value="Bahasa" <?php echo $siswa['jurusan'] == 'Bahasa' ? 'selected' : ''; ?>>Bahasa</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($siswa['email']); ?>">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Update</button>
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
