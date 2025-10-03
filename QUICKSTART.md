# Quick Start Guide

## 🚀 Setup in 3 Minutes

### Step 1: Database Setup
```bash
# Option A: Using MySQL command line
mysql -u root -p < database.sql

# Option B: Using phpMyAdmin
# 1. Open phpMyAdmin
# 2. Click "Import"
# 3. Select database.sql
# 4. Click "Go"
```

### Step 2: Configure Database (Optional)
Edit `config.php` if your database credentials differ:
```php
$servername = "localhost";  // Usually localhost
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "daftarsiswa";    // Database name
```

### Step 3: Run the Application
```bash
# Option A: XAMPP/WAMP/MAMP
# Copy project folder to htdocs/www
# Visit: http://localhost/daftarsiswa

# Option B: PHP Built-in Server (Recommended for testing)
cd daftarsiswa
php -S localhost:8000
# Visit: http://localhost:8000
```

## 📱 Usage Guide

### Add New Student
1. Click "**+ Tambah Siswa Baru**" button
2. Fill in the form:
   - **NIS**: Student ID (must be unique)
   - **Nama**: Full name
   - **Kelas**: Class (e.g., XII, XI, X)
   - **Jurusan**: Select major (IPA/IPS/Bahasa)
   - **Email**: Email address (optional)
3. Click "**Simpan**"

### View Students
- Main page displays all students automatically
- Shows: No, NIS, Name, Class, Major, Email, Actions

### Edit Student
1. Click "**Edit**" button on any student row
2. Modify the information
3. Click "**Update**"

### Delete Student
1. Click "**Hapus**" button on any student row
2. Confirm the deletion
3. Student will be removed

## 🎨 Customization

### Change Colors
Edit `style.css`:
```css
/* Line 7: Background gradient */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Line 58: Primary button color */
.btn-primary {
    background-color: #667eea;  /* Change this */
}
```

### Modify Majors (Jurusan)
Edit `tambah.php` and `ubah.php`:
```php
<select id="jurusan" name="jurusan" required>
    <option value="">Pilih Jurusan</option>
    <option value="IPA">IPA</option>
    <option value="IPS">IPS</option>
    <option value="Bahasa">Bahasa</option>
    <!-- Add more options here -->
</select>
```

### Add More Fields
1. **Update database.sql**: Add new column
2. **Update forms**: Add input field in tambah.php and ubah.php
3. **Update queries**: Include new field in INSERT/UPDATE
4. **Update display**: Add column in index.php table

## 🔧 Troubleshooting

### "Connection failed" error
- Check if MySQL is running
- Verify credentials in `config.php`
- Ensure database `daftarsiswa` exists

### "Table doesn't exist" error
- Import `database.sql` file
- Or create database manually using SQL commands

### "Duplicate entry for NIS" error
- NIS must be unique
- Use a different NIS number

### PHP errors displayed
- For production, hide errors in `config.php`:
```php
error_reporting(0);
ini_set('display_errors', 0);
```

## 📚 Learning Resources

### Concepts Demonstrated
- ✅ PHP Variables and Functions
- ✅ MySQLi Database Connection
- ✅ SQL CRUD Operations
- ✅ HTML Forms (GET/POST)
- ✅ CSS Styling & Responsive Design
- ✅ Security (Input Sanitization)
- ✅ User Experience (Messages, Confirmations)

### Next Steps to Learn
1. **Prepared Statements**: Better SQL injection protection
2. **PDO**: Modern database interface
3. **Session Management**: User authentication
4. **AJAX**: Dynamic updates without page reload
5. **Validation**: Client and server-side
6. **MVC Pattern**: Code organization
7. **Frameworks**: Laravel, CodeIgniter

## 🎯 Code Examples

### Add Custom Validation
In `tambah.php`:
```php
// Add after line 10
if (strlen($nis) < 7) {
    $error = "NIS must be at least 7 characters";
} else {
    // Existing insert code
}
```

### Change Date Format
In `index.php`:
```php
// If you add created_at to table display
<?php echo date('d/m/Y', strtotime($row['created_at'])); ?>
```

### Add Search Feature
In `index.php`:
```php
// Add before query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$query = "SELECT * FROM siswa WHERE nama LIKE '%$search%' ORDER BY id DESC";

// Add search form in HTML
<input type="text" name="search" placeholder="Cari nama...">
```

## 💡 Tips

1. **Always backup database** before making changes
2. **Test on localhost** before deploying
3. **Use unique NIS** for each student
4. **Keep config.php secure** - don't commit passwords
5. **Validate input** on both client and server side
6. **Use prepared statements** for production apps

## 📝 File Quick Reference

| File | Purpose | When to Edit |
|------|---------|-------------|
| index.php | Main page | Change display layout |
| tambah.php | Add form | Add/modify fields |
| ubah.php | Edit form | Add/modify fields |
| hapus.php | Delete | Add confirmation logic |
| style.css | Styling | Change colors/layout |
| config.php | DB config | Change credentials |
| database.sql | Schema | Modify table structure |

---
**Need help?** Check IMPLEMENTATION.md and ARCHITECTURE.md for detailed documentation.
