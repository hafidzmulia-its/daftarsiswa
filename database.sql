-- Create database
CREATE DATABASE IF NOT EXISTS daftarsiswa;

-- Use database
USE daftarsiswa;

-- Create siswa (students) table
CREATE TABLE IF NOT EXISTS siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nis VARCHAR(20) NOT NULL UNIQUE,
    kelas VARCHAR(20) NOT NULL,
    jurusan VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert sample data
INSERT INTO siswa (nama, nis, kelas, jurusan, email) VALUES
('Ahmad Rizki', '2024001', 'XII', 'IPA', 'ahmad.rizki@email.com'),
('Siti Nurhaliza', '2024002', 'XII', 'IPS', 'siti.nurhaliza@email.com'),
('Budi Santoso', '2024003', 'XI', 'IPA', 'budi.santoso@email.com');
