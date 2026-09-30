-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2026 at 10:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_pakaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Administrator', 'admin@gmail.com', '$2y$12$V49CU1I1N5gbEqahPM8zxem3cKIz0mx6Arx/L3QoCkOuL7YdJgmUm');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `kategori`, `harga`, `stok`, `gambar`, `deskripsi`, `created_at`) VALUES
(1, 'Blouse Wanita Casual', 'Dewasa Wanita', 85000, 10, 'uploads/produk/produk_6abcadd8896834.96879552.jpeg', 'Blouse wanita dengan model casual yang nyaman digunakan sehari-hari.', '2026-09-30 05:27:57'),
(2, 'Dress Wanita Elegan', 'Dewasa Wanita', 150000, 8, 'uploads/produk/produk_6abcadc63e17f2.53576130.jpeg', 'Dress wanita dengan desain elegan untuk acara santai maupun formal.', '2026-09-30 05:27:57'),
(3, 'Kemeja Pria Casual', 'Dewasa Pria', 100000, 12, 'uploads/produk/produk_6abcadb0d1c250.48482100.jpeg', 'Kemeja pria dengan desain casual dan nyaman digunakan sehari-hari.', '2026-09-30 05:27:57'),
(4, 'Kaos Pria', 'Dewasa Pria', 65000, 15, 'uploads/produk/produk_6abcad938e6708.92952611.jpeg', 'Kaos pria yang cocok untuk kegiatan sehari-hari.', '2026-09-30 05:27:57'),
(5, 'Kaos Anak Laki-laki', 'Anak-anak', 50000, 10, 'uploads/produk/produk_6abcad3e596b30.58002127.jpeg', 'Kaos anak laki-laki dengan bahan nyaman dan desain menarik.', '2026-09-30 05:27:57'),
(6, 'Dress Anak Perempuan', 'Anak-anak', 75000, 10, 'uploads/produk/produk_6abcad1f9ec931.68512532.jpeg', 'Dress anak perempuan dengan desain lucu dan nyaman dipakai.', '2026-09-30 05:27:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
