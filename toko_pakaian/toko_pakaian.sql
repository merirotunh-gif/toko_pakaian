CREATE DATABASE IF NOT EXISTS toko_pakaian CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE toko_pakaian;
CREATE TABLE admin(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(100) NOT NULL,email VARCHAR(100) UNIQUE NOT NULL,password VARCHAR(255) NOT NULL);
CREATE TABLE produk(id INT AUTO_INCREMENT PRIMARY KEY,nama VARCHAR(150) NOT NULL,kategori VARCHAR(50) NOT NULL,harga INT NOT NULL,stok INT NOT NULL DEFAULT 0,gambar VARCHAR(255),deskripsi TEXT);
INSERT INTO produk(nama,kategori,harga,stok,gambar,deskripsi) VALUES
('Blouse Casual Wanita','Dewasa Wanita',129000,20,'uploads/produk/blouse.jpg','Blouse casual dengan bahan nyaman untuk kegiatan sehari-hari.'),
('Dress Midi Floral','Dewasa Wanita',189000,15,'uploads/produk/dress.jpg','Dress bermotif floral dengan model sederhana dan nyaman.'),
('Kemeja Oxford Pria','Dewasa Pria',159000,18,'uploads/produk/kemeja.jpg','Kemeja pria model rapi untuk kegiatan formal maupun santai.'),
('Kaos Basic Pria','Dewasa Pria',89000,30,'uploads/produk/kaos.jpg','Kaos basic dengan desain minimalis untuk penggunaan harian.'),
('Setelan Anak Cowok','Anak-anak',119000,15,'uploads/produk/anak-cowok.jpg','Setelan anak laki-laki yang nyaman untuk bermain.'),
('Dress Anak Cewek','Anak-anak',109000,16,'uploads/produk/anak-cewek.jpg','Dress anak perempuan dengan model ceria dan nyaman.');
-- Setelah database dibuat, jalankan auth/buat_admin.php sekali untuk membuat akun admin.
