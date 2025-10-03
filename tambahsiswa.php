<!DOCTYPE html>
<html lang="en">
<head>
 <title>Tambah Siswa</title>
 <?php
 include 'metacss.php';
 ?>
</head>
<body>
 <?php
 include 'navigation.php';
 ?>
 <div class="container p-3">
 <h1>Tambah Siswa</h1>
 <p>
 Untuk menambah data siswa, masukkan nama, NRP, tanggal lahir, jen
is kelamin, dan deskripsi siswa.
 <br>
 Nama, NRP, tanggal lahir, dan jenis kelamin harus terisi.
 <br>
 Secara default, jenis kelamin yang terpilih adalah lakilaki. Sesuaikan dengan kebutuhan.
 </p>
 <form action="hasiltambahsiswa.php" method="post">
 <div class="form-group">
 <label>Nama<span class="text-danger">*</span> :</label>
 <input type="text" class="form-control" name="nama" required>
 </div>
 <div class="form-group">
 <label>NRP<span class="text-danger">*</span> :</label>
 <input type="number" class="formcontrol" name="nrp" required>
 </div>
 <div class="form-group">
 <label>Tanggal Lahir<span class="textdanger">*</span> :</label>
 <input type="date" class="formcontrol" name="tanggallahir" required>
 </div>
 <div class="form-group">
 <label>Jenis Kelamin<span class="textdanger">*</span> :</label>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-checkinput" name="jeniskelamin" value="Laki-laki" checked>
 Laki-laki
 </label>
 </div>
 <div class="form-check">
 <label class="form-check-label">
 <input type="radio" class="form-checkinput" name="jeniskelamin" value="Perempuan">
 Perempuan
 </label>
 </div>
 </div>
 <div class="form-group">
 <label>Deskripsi :</label>
 <textarea class="formcontrol" rows="5" name="deskripsi"></textarea>
 </div>
 <p class="text-danger">*Harus terisi</p>
 <button type="submit" class="btn btn-primary">Simpan</button>
 </form>
 </div>
 <?php
 include 'javascript.php';
 ?>
</body>
</html>
