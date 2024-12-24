-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 05:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temansehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `status` enum('Aktif','Nonaktif','','') NOT NULL DEFAULT 'Nonaktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `nama`, `email`, `id_member`, `role`, `status`) VALUES
(1, 'John', 'john123', 'John Doe', 'johndoe@gmail.com', NULL, 'admin', 'Aktif'),
(2, 'janedoe', 'jane123', 'Jane Doe', 'janedoe@gmail.com', 1, 'user', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `gambar` blob DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `merk` varchar(100) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `satuan_barang` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_kategori`, `gambar`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 2, NULL, 'Sanmol', NULL, 2000.00, 2800.00, NULL, 23, NULL, NULL),
(2, 3, NULL, 'Diabetasol', NULL, 2000.00, 6000.00, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`, `deskripsi`) VALUES
(1, 'Obat Bebas', '2024-12-11 00:00:00', 'Obat yang dapat dibeli tanpa resep dokter, seperti obat sakit kepala, flu, batuk, atau demam.'),
(2, 'Obat Resep Dokter', '2024-12-10 10:41:23', 'Obat yang memerlukan resep dokter, termasuk obat antibiotik, obat untuk penyakit kronis, atau obat pengobatan khusus.'),
(3, 'Suplemen & Vitamin', '2024-12-10 10:41:48', 'Multivitamin, suplemen untuk kesehatan tubuh, seperti vitamin C, vitamin D, suplemen untuk daya tahan tubuh, dan suplemen olahraga.');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_member` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama_member`, `alamat`, `tgl_daftar`) VALUES
(1, 'Jane Doe Member', 'Jl. Medan Karya 123', '2024-12-19 10:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `status` enum('Pending','Dikirim','Dibatalkan','Selesai') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `id_barang`, `id_member`, `jumlah`, `total`, `tanggal_input`, `periode`, `status`) VALUES
(1, 1, 1, 1, 2800.00, '2024-12-20 04:56:04', '12-2024', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`);

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `nota_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
