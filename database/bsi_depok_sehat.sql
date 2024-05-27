-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2024 at 08:28 AM
-- Server version: 11.3.2-MariaDB-log
-- PHP Version: 8.3.4

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

INSERT INTO `instansi_kesehatan` (`id_instansi`, `nama_instansi`, `tipe`, `alamat`, `kontak`, `id_kecamatan`, `created_at`) VALUES
('IS0001', 'Puskesmas Tanah Baru', 'Puskesmas', 'Perum Depok Mulya III RT. 06/02 Tanah Baru, Beji.', '021 7750 712', 'KEC01', '2024-05-25 06:59:32'),
('IS0002', 'Puskesmas Kemiri Muka', 'Puskesmas', 'Jl. H. Juanda No. 8 RT. 02/03 Kemiri Muka, Beji.', '021 7888 3835', 'KEC01', '2024-05-25 07:00:14'),
('IS0003', 'Puskesmas Beji', 'Puskesmas', 'Jl. Bambon Raya No. 7B RT. 01/01, Beji.', '021 7757 033', 'KEC01', '2024-05-25 07:19:54'),
('IS0004', 'Puskesmas Cimanggis', 'Puskesmas', 'Jl. Raya Bogor Km. 33 RT. 05/02 Curug, Cimanggis.', ' 021 8741 072', 'KEC12', '2024-05-25 07:27:54'),
('IS0005', 'Puskesmas Mekarsari', 'Puskesmas', 'Jl. Tipar Raya 1 RT. 04/09 Mekarsari, Cimanggis.', '021 2982 3647', 'KEC12', '2024-05-25 07:29:23'),
('IS0006', 'Puskesmas Tugu', 'Puskesmas', 'Jl. Akses UI Palsi Gunung RT. 05/03 Tugu, Cimanggis', '021 8727 924', 'KEC12', '2024-05-25 07:32:57'),
('IS0007', 'Puskesmas Harjamukti', 'Puskesmas', 'Komplek Deppen, Harjamukti, Cimanggis.', '021 8733 165', 'KEC12', '2024-05-25 07:36:38'),
('IS0008', 'Puskesmas Pasir Gunung Selatan', 'Puskesmas', 'Komp. Villa Kalisari Blok B RT. 12/01 Pasir Gn. Selatan.', '021 6810 5826', 'KEC12', '2024-05-25 07:38:22'),
('IS0009', 'Puskesmas Tapos', 'Puskesmas', 'Jl. Raya Tapos RT. 02/12 Tapos', '021 8762 908', 'KEC13', '2024-05-25 07:39:17'),
('IS0010', 'Puskesmas Sukatani', 'Puskesmas', 'Komp. Kopassus Jl. Wijaya Kusuma RT. 04/09, Sukatani', '021 8741 282', 'KEC13', '2024-05-25 07:40:00'),
('IS0011', 'Puskesmas Jatijajar', 'Puskesmas', 'Jl. Setu Jatijajar No. 25 RT. 07/03, Jatijajar.', '021 8763 417', 'KEC13', '2024-05-25 07:41:12'),
('IS0012', 'Puskesmas Cilangkap', 'Puskesmas', 'Kp. Banjaran Pucung RT. 01/07, Cilangkap.', '021 8792 6148', 'KEC13', '2024-05-25 07:42:33'),
('IS0013', 'Puskesmas Cimpaeun', 'Puskesmas', 'Perumahan Persada Depok, Tapos.', '021 8792 2036', 'KEC13', '2024-05-25 07:43:35'),
('IS0014', 'Puskesmas Grogol', 'Puskesmas', 'Jl. Raya Grogol RT. 01/01 Kel. Grogol', '021 7754 632', 'KEC14', '2024-05-25 07:45:02'),
('IS0015', 'Puskesmas Cinere', 'Puskesmas', 'Jl. Cinere Raya No. 30 Limo', '021 7548 707', 'KEC05', '2024-05-25 07:45:52'),
('IS0016', 'Puskesmas Depok Jaya', 'Puskesmas', 'Jl. Melati Raya Depok I, Depok Jaya, Pan Mas', '021 7503 08', 'KEC15', '2024-05-25 07:49:32'),
('IS0017', 'Puskesmas Pancoran Mas', 'Puskesmas', 'Jl. Pemuda No. 2 RT. 02/08 Pancoran Mas', '021 7520 130', 'KEC15', '2024-05-25 07:50:47'),
('IS0018', 'Puskesmas Rangkapan Jaya', 'Puskesmas', 'Jl. Keadilan, Rangkapan Jaya, Pan Mas', '021 7788 2044', 'KEC15', '2024-05-25 07:55:41'),
('IS0019', 'Puskesmas Cipayung', 'Puskesmas', 'Jl. Jembatan Serong, Blok Rambutan Rt. 01/04, Cipayung', '021 7792 364', 'KEC16', '2024-05-25 07:59:15'),
('IS0020', 'Puskesmas Sawangan', 'Puskesmas', 'Jalan Raya Muchtar No.155, Sawangan, Sawangan Baru, Sawangan, Kota Depok, Jawa Barat 16511', '0251 8617 482', 'KEC17', '2024-05-25 08:00:07'),
('IS0021', 'Puskesmas Cinangka', 'Puskesmas', 'Jl. Pertiwi Raya Komp. Bappenas Kedaung. ', '-', 'KEC17', '2024-05-25 08:01:18'),
('IS0022', 'Puskesmas Pengasinan', 'Puskesmas', 'Komp. BSI II, Jl. Anggrek Raya, Sawangan.', '0251 8610 438', 'KEC17', '2024-05-25 08:02:24'),
('IS0023', 'Puskesmas Pasir Putih', 'Puskesmas', 'Jl. Raya Pasir Putih (Griya Sawangan Asri) ', '021 2943 4508', 'KEC17', '2024-05-25 08:03:41'),
('IS0024', 'Puskesmas Pondok Petir', 'Puskesmas', 'Komplek Pamulang Village Blok H8 No. 8 Rt.6/Rw.14, Pondok Petir, Bojongsari, Depok, Jawa Barat 16517', '021 7477 1693', 'KEC02', '2024-05-25 08:05:05'),
('IS0025', 'Puskesmas Duren Seribu', 'Puskesmas', 'Jl. Delima No.5, Duren Seribu, Bojongsari, Kota Depok, Jawa Barat 16518', '0251 8611 306', 'KEC02', '2024-05-25 08:06:01'),
('IS0026', 'Puskesmas Sukmajaya', 'Puskesmas', 'Jalan Arjuna Raya No. 1, Mekar Jaya, Sukmajaya, Mekar Jaya, Sukmajaya, Kota Depok, Jawa Barat 16411', '021 7782 4908', 'KEC06', '2024-05-25 08:08:15'),
('IS0027', 'Puskesmas Pondok Sukmajaya', 'Puskesmas', 'Perum Pondok Sukmajaya B1 G3 RT. 02/07 Pdk Sukmajaya', '021 7782 4908', 'KEC06', '2024-05-25 08:08:52'),
('IS0028', 'Puskesmas Bhakti Jaya', 'Puskesmas', 'Komplek PELNI Blok G2, Bhakti Jaya.', '021 8771 0143', 'KEC06', '2024-05-25 08:09:28'),
('IS0029', 'Puskesmas Abdi Jaya', 'Puskesmas', 'Jl. Kerinci Raya No. 1 Rw. 26 Abadijaya, Sukmajaya', '021 7716 940', 'KEC06', '2024-05-25 08:10:13'),
('IS0030', 'Puskesmas Abdi Jaya', 'Puskesmas', 'Jl. Kerinci Raya No. 1 Rw. 26 Abadijaya, Sukmajaya', '021 7716 940', 'KEC06', '2024-05-25 08:10:13'),
('IS0031', 'Puskesmas Villa Pertiwi', 'Puskesmas', 'Jalan Annuriyah Blok I3 No.1, Cilodong, Sukamaju, Cilodong, Kota Depok, Jawa Barat 16415', '021 8790 4636', 'KEC03', '2024-05-25 08:10:58'),
('IS0032', 'Puskesmas Cilodong', 'Puskesmas', 'Komp. Asrama Kostrad, Jl. Asrama Cilodong RT. 01/01, Kalibaru', '021 8791 8703', 'KEC03', '2024-05-25 08:11:38'),
('IS0033', 'Puskesmas Kalimulya', 'Puskesmas', 'Jl. Raya Kalimulya, Jatimulya, Cilodong, Kota Depok, Jawa Barat 16413', '021 8763 354', 'KEC03', '2024-05-25 08:12:24'),
('IS0034', 'RS Bunda Margonda', 'Rumah Sakit', 'Jl. Margonda Raya No. 28 Pondok Cina Depok', '021 7889 0551', 'KEC01', '2024-05-25 08:13:24'),
('IS0035', 'RSIA Graha Permata Ibu', 'Rumah Sakit', 'Jl. KH. M. Usman No. 168 Kukusan Beji Depok', '021 7778 898', 'KEC01', '2024-05-25 08:13:59'),
('IS0036', 'RS Bhayangkara Brimob', 'Rumah Sakit', 'Jl. Akses UI Cimanggis Depok', '021 8710 089', 'KEC01', '2024-05-25 08:14:28'),
('IS0037', 'RS Meilia', 'Rumah Sakit', 'Jl. Alternatif Cibubur Cileungsi Km. 1 Depok', '021 8444 444', 'KEC12', '2024-05-25 08:15:07'),
('IS0038', 'RS Tugu Ibu', 'Rumah Sakit', 'Jl. Raya Bogor Km. 29 Cimanggis', '021 8710 870', 'KEC12', '2024-05-25 08:15:42'),
('IS0039', 'RSIA Tumbuh Kembang', 'Rumah Sakit', 'Jl. Raya Bogor Km.31 No.23 Palsi Gunung Cimanggis', '021 8701 873', 'KEC12', '2024-05-25 08:16:23'),
('IS0040', 'RSU Bhayangkara Brimob', 'Rumah Sakit', 'JL KOMJEN POL M YASIN, KELAPADUA, CIMANGGISJatijajar, Tapos, Kota Depok', '021 8770 4691', 'KEC13', '2024-05-25 08:17:03'),
('IS0041', 'RS Hospital Cinere', 'Rumah Sakit', 'Jl. MaribayaBlok F2 No.1 Perumahan Puri Cinere Limo', '021 7545 488', 'KEC05', '2024-05-25 08:17:44'),
('IS0042', 'RSP Fatmawati', '', 'Jl. RS Fatmawati Cilandak Jakarta Selatan', '021 7501 524', 'KEC05', '2024-05-25 08:18:45'),
('IS0043', 'RS Khusus Jantung Diagram', 'Rumah Sakit', 'Jl. Maribaya Blok G2 No.1, Pangkalan Jati, Cinere, Kota Depok, Jawa Barat 16514', '021 7545 499', 'KEC05', '2024-05-25 08:19:16'),
('IS0044', 'RSIA Hermina Depok', 'Rumah Sakit', 'Jl. Raya Siliwangi No. 50 Panmas', '021 7720 2525', 'KEC15', '2024-05-25 08:20:55'),
('IS0045', 'RS Harapan Depok', 'Rumah Sakit', 'Jl. Pemuda No.10 Depok', '021 7520 009', 'KEC15', '2024-05-25 08:21:37'),
('IS0046', 'RS Mitra Keluarga', 'Rumah Sakit', 'Jl. Margonda Raya Depok Pancoran Mas Depok', '021 7721 0700', 'KEC15', '2024-05-25 08:22:06'),
('IS0047', 'RSIA Asy-Sifa', 'Rumah Sakit', 'Jl.Ry Cinere No. 9 Rangkapan Jaya Baru, Pancoran mas, Depok', '021 7788 3905', 'KEC15', '2024-05-25 08:22:43'),
('IS0048', 'RSD Cibinong', 'Rumah Sakit', 'Jl. KSR Dadi Kusmayadi No. 27 Cibinong', '021 8753 487', 'KEC16', '2024-05-25 08:23:23'),
('IS0049', 'RS Bhakti Yudha', 'Rumah Sakit', 'Jl. Raya Sawangan Depok', '021 7520 082', 'KEC17', '2024-05-25 08:23:55'),
('IS0050', 'RS Permata Depok', 'Rumah Sakit', 'Jalan Muchtar Raya No.22, Sawangan Baru, 16511', '021 2966 9000', 'KEC17', '2024-05-25 08:24:29'),
('IS0051', 'RS Umum Daerah Depok', 'Rumah Sakit', 'Jl. Raya Muchtar No.99 Depok', '(0251) 7169 1', 'KEC17', '2024-05-25 08:25:06'),
('IS0052', 'RS Sentra Medika', 'Rumah Sakit', 'Jl. Raya Bogor Km.33 Cisalak Depok', '021 8743 790', 'KEC06', '2024-05-25 08:25:57'),
('IS0053', 'RS Hasanah Graha Afiah', 'Rumah Sakit', 'Jl. Raden Saleh No. 42 Depok', '021 7782 6267', 'KEC06', '2024-05-25 08:26:24'),
('IS0054', 'RS Simpangan Depok', 'Rumah Sakit', 'Jl. Raya Bogor Km.36Sukamaju Depok', '021 8741 549', 'KEC03', '2024-05-25 08:27:00'),
('IS0055', 'RS Citra Medika Depok', 'Rumah Sakit', 'Jl. Raya Kalimulya No.68 Kota Kembang Depok', '021 2967 1000', 'KEC03', '2024-05-25 08:27:26');

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
('KEC06', 'Sukmajaya', '2024-04-17 02:34:22'),
('KEC07', 'Grogol', '2024-04-17 02:34:22'),
('KEC08', 'Depok', '2024-04-17 02:34:22'),
('KEC09', 'Bedahan', '2024-04-17 02:34:22'),
('KEC10', 'Abadijaya', '2024-04-17 02:34:22'),
('KEC11', 'Cilangkap', '2024-04-17 02:34:22'),
('KEC12', 'Cimanggis', '2024-05-25 07:21:07'),
('KEC13', 'Tapos', '2024-05-25 07:38:50'),
('KEC14', 'Limo', '2024-05-25 07:44:12'),
('KEC15', 'Pancoran Mas', '2024-05-25 07:48:46'),
('KEC16', 'Cipayung', '2024-05-25 07:58:55'),
('KEC17', 'Sawangan', '2024-05-25 07:59:55');

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
('1234567890', 'John Doe Telolet', '1990-05-15', 'Jl. Merdeka No. 123', '(021) 1234-56', 'KEC01', '2024-05-24 04:03:38'),
('19220916', 'Iqbal Baihaqi', '2003-05-06', 'Cilebut', '081299384413', 'KEC10', '2024-04-28 09:00:48'),
('2345678901', 'Jane Smith', '1985-08-20', 'Jl. Jendral Sudirman No. 456', '(021) 8765-43', 'KEC02', '2024-05-24 04:03:38'),
('PS00000001', 'iqbal sunar', '1989-04-11', 'Jl. Raya Sawangan No. 3, Mampang, Pancoran Mas, Depok.', '085780827731', 'KEC10', '2024-04-17 02:40:36'),
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

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_pasien`, `id_penyakit`, `id_instansi`, `tanggal_pemeriksaan`, `keterangan`, `created_at`) VALUES
('RKM0001', 'PS00000003', 'PK002', 'IS0001', '2024-05-08', 'Keterangan', '2024-05-07 13:34:55'),
('RKM0002', '19220916', 'PK003', 'IS0001', '2024-05-06', 'keternagan', '2024-05-07 13:47:54'),
('RKM0003', '14999414', '', 'IS0001', '2024-05-16', 'aknfeag', '2024-05-07 13:48:11'),
('RKM0004', '19220414', '', 'IS0001', '0000-00-00', 'keretangan', '2024-05-09 05:00:56'),
('RKM0005', '192204134', 'PK003', 'IS0001', '2024-05-10', 'ketiringin', '2024-05-09 05:07:33'),
('RKM0006', 'PS00000002', 'PK002', 'IS0001', '2024-05-18', 'keterangan', '2024-05-17 14:25:49'),
('RKM0007', '1234567890', 'PK001', 'IS0001', '2024-05-24', 'Keterangan Flue', '2024-05-24 03:59:50');

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
('USR001', 'Admin', 'admin@gmail.com', '$2y$10$wkBWSl.wRRG8rzRCFUp3cu7d70mF39W2H/UAKel7G6On6BJX/tITq', '2', 'IS0001', '2024-04-17 02:37:22'),
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
