<?php
include 'config.php';

// Query to get all students
$query = "SELECT * FROM siswa ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - CRUD PHP Native</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Siswa</h1>
        <div class="header-actions">
            <a href="tambah.php" class="btn btn-primary">+ Tambah Siswa Baru</a>
        </div>

        <?php if (isset($_GET['pesan'])): ?>
            <div class="alert alert-<?php echo $_GET['pesan'] == 'success' ? 'success' : 'error'; ?>">
                <?php 
                if ($_GET['pesan'] == 'success') {
                    echo "Data berhasil disimpan!";
                } elseif ($_GET['pesan'] == 'update') {
                    echo "Data berhasil diupdate!";
                } elseif ($_GET['pesan'] == 'delete') {
                    echo "Data berhasil dihapus!";
                } elseif ($_GET['pesan'] == 'error') {
                    echo "Terjadi kesalahan!";
                }
                ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo htmlspecialchars($row['nis']); ?></td>
                            <td><?php echo htmlspecialchars($row['nama']); ?></td>
                            <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                            <td><?php echo htmlspecialchars($row['jurusan']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="action-buttons">
                                <a href="ubah.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php 
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="7" style="text-align: center;">Tidak ada data siswa</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
