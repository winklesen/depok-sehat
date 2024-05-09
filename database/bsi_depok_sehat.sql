-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 11:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsi_depok_sehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `instansi_kesehatan`
--

CREATE TABLE `instansi_kesehatan` (
  `id_instansi` varchar(6) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `tipe` enum('Rumah Sakit','Puskesmas','Klinik','') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instansi_kesehatan`
--

INSERT INTO `instansi_kesehatan` (
  `id_instansi`, `nama_instansi`, `tipe`, `alamat`, `kontak`, `id_kecamatan`, `created_at`) VALUES
('IS0001', 'RS Tugu Ibu Depok', 'Rumah Sakit', 'Jalan Raya Bogor №29, Mekarsari, Kec. Cimanggis, Kota Depok, Jawa Barat 16452', '0218710870', '', '2024-04-17 02:24:40'),
('IS0002', 'RS Tugu Bapak Depok', 'Rumah Sakit', 'Jalan Raya Bogor №29, Mekarsari, Kec. Cimanggis, Kota Depok, Jawa Barat 16452', '0218710870', '', '2024-04-17 02:24:55'),
('IS0003', 'Puskesmas Beji', 'Puskesmas', 'Jl. Bambon Raya No. 7B RT. 01/01, Beji.', '0217757033', '', '2024-04-17 02:27:30'),
('IS0004', 'Puskesmas Tapos', 'Puskesmas', 'Jl. Raya Bogor Km. 33 RT. 05/02 Curug, Cimanggis.', '0218741072', '', '2024-04-17 02:27:30'),
('IS0005', 'Bahar Medical Clinic I', 'Klinik', 'Jl. Dewi Sartika No.48, Depok Jaya, Pancoran Mas, Depok.', '02177203440', '', '2024-04-17 02:29:41'),
('IS0006', 'Klinik Sawangan Medika', 'Klinik', 'Jl. Raya Sawangan No. 3, Mampang, Pancoran Mas, Depok.', ' 02129315685', '', '2024-04-17 02:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(5) NOT NULL,
  `nama_kecamatan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `created_at`) VALUES
('KEC01', 'Beji', '2024-04-17 02:33:30'),
('KEC02', 'Bojongsari', '2024-04-17 02:34:22'),
('KEC03', 'Cilodong', '2024-04-17 02:34:22'),
('KEC04', 'Cisalak', '2024-04-17 02:34:22'),
('KEC05', 'Cinere', '2024-04-17 02:34:22'),
('KEC06', 'Bojong', '2024-04-17 02:34:22'),
('KEC07', 'Grogol', '2024-04-17 02:34:22'),
('KEC08', 'Depok', '2024-04-17 02:34:22'),
('KEC09', 'Bedahan', '2024-04-17 02:34:22'),
('KEC10', 'Abadijaya', '2024-04-17 02:34:22'),
('KEC11', 'Cilangkap', '2024-04-17 02:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` varchar(16) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `info_kontak` varchar(13) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama`, `tanggal_lahir`, `alamat`, `info_kontak`, `id_kecamatan`, `created_at`) VALUES
('19220916', 'Iqbal Baihaqi', '2003-05-06', 'Cilebut', '081299384413', 'KEC10', '2024-04-28 09:00:48'),
('PS00000001', 'Abdul Rojak Ali', '1989-04-11', 'Jl. Raya Sawangan No. 3, Mampang, Pancoran Mas, Depok.', '085780827731', 'KEC10', '2024-04-17 02:40:36'),
('PS00000002', 'Agus Anjay', '1989-04-11', 'Jl. Raya Sawangan No. 3, Mampang, Pancoran Mas, Depok.', '085780827731', 'KEC02', '2024-04-17 02:41:34'),
('PS00000003', 'Jokowo', '1989-04-11', 'Jl. Raya Sawangan No. 3, Mampang, Pancoran Mas, Depok.', '085780827731', 'KEC03', '2024-04-17 02:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(100) NOT NULL,
  `gambar_penyakit` varchar(255) NOT NULL,
  `info_gejala` text NOT NULL,
  `info_pencegahan` text NOT NULL,
  `info_pengobatan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `gambar_penyakit`, `info_gejala`, `info_pencegahan`, `info_pengobatan`, `created_at`) VALUES
('PK001', 'Hipertensi', '', 'Informasi Gejala lorem ipsum dolor sim amet', 'Informasi Pencegahan lorem ipsum dolor sim amet', 'Informasi Pengobatan lorem ipsum dolor sim amet', '2024-04-17 02:35:40'),
('PK002', 'Stroke', '', 'Informasi Gejala lorem ipsum dolor sim amet', 'Informasi Pencegahan lorem ipsum dolor sim amet', 'Informasi Pengobatan lorem ipsum dolor sim amet', '2024-04-17 02:36:45'),
('PK003', 'Gagal Jantung', '', 'Informasi Gejala lorem ipsum dolor sim amet', 'Informasi Pencegahan lorem ipsum dolor sim amet', 'Informasi Pengobatan lorem ipsum dolor sim amet', '2024-04-17 02:36:45'),
('PK004', 'Diabetes', '', 'Informasi Gejala lorem ipsum dolor sim amet', 'Informasi Pencegahan lorem ipsum dolor sim amet', 'Informasi Pengobatan lorem ipsum dolor sim amet', '2024-04-17 02:36:45'),
('PK005', 'TBC', '', 'Informasi Gejala lorem ipsum dolor sim amet', 'Informasi Pencegahan lorem ipsum dolor sim amet', 'Informasi Pengobatan lorem ipsum dolor sim amet', '2024-04-17 02:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` varchar(7) NOT NULL,
  `id_pasien` varchar(16) NOT NULL,
  `id_penyakit` varchar(5) NOT NULL,
  `id_instansi` varchar(6) NOT NULL,
  `tanggal_pemeriksaan` date NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(6) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` char(1) NOT NULL,
  `id_instansi` varchar(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role_id`, `id_instansi`, `created_at`) VALUES
('USR001', 'Admin', 'admin@gmail.com', '$2y$10$wkBWSl.wRRG8rzRCFUp3cu7d70mF39W2H/UAKel7G6On6BJX/tITq', '2', NULL, '2024-04-17 02:37:22'),
('USR002', 'Petugas Satu', 'petugas1@gmail.com', '$2y$10$wkBWSl.wRRG8rzRCFUp3cu7d70mF39W2H/UAKel7G6On6BJX/tITq', '1', NULL, '2024-04-17 02:37:47'),
('USR003', 'Petugas Dua', 'petugas2@gmail.com', '$2y$10$wkBWSl.wRRG8rzRCFUp3cu7d70mF39W2H/UAKel7G6On6BJX/tITq', '1', NULL, '2024-04-17 02:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi_kesehatan`
--
ALTER TABLE `instansi_kesehatan`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
