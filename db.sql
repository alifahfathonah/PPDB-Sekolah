-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql_container:3306
-- Generation Time: Nov 22, 2020 at 12:10 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int NOT NULL,
  `nama` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `email`, `status`, `tanggal_daftar`) VALUES
(4, '123123', '1231@gmai.com', 0, '2020-11-20 08:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int NOT NULL,
  `jam_awal` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `hari` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_guru` int NOT NULL,
  `id_pelajaran` int NOT NULL,
  `id_kelas` int NOT NULL,
  `id_grade` int NOT NULL,
  `id_jurusan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `jam_awal`, `jam_akhir`, `hari`, `id_guru`, `id_pelajaran`, `id_kelas`, `id_grade`, `id_jurusan`) VALUES
(3, '07:00:00', '17:00:00', 'Senin', 4, 3, 5, 1, 2),
(4, '07:00:00', '17:00:00', 'Senin', 4, 3, 5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(2, 'Rekayasa Perangkat Lunak'),
(3, 'Multimedia'),
(4, 'Teknik Kendaraan Ringan'),
(5, 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int NOT NULL,
  `nama` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`) VALUES
(2, '11'),
(5, '10'),
(6, '12');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int NOT NULL,
  `matematika` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `indonesia` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `inggris` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ipa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `matematika`, `indonesia`, `inggris`, `ipa`, `total`) VALUES
(15, '100', '100', '100', '100', '400'),
(16, '100', '100', '100', '100', '400'),
(17, '100', '100', '100', '90', '390'),
(18, '100', '100', '100', '100', '400'),
(19, '100', '100', '80', '90', '370'),
(20, '100', '100', '100', '100', '400'),
(21, '10', '100', '100', '100', '310'),
(22, '100', '100', '100', '100', '400'),
(23, '100', '100', '100', '100', '400'),
(24, '100', '100', '100', '100', '400');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` int NOT NULL,
  `kode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `kode`, `nama`) VALUES
(3, 'KD1010', 'Matematika');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('gagal','diproses','lolos') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'diproses',
  `id_kelas` int DEFAULT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_nilai` int DEFAULT NULL,
  `id_jurusan` int DEFAULT NULL,
  `id_grade` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `nama`, `email`, `username`, `password`, `status`, `id_kelas`, `tanggal_daftar`, `id_nilai`, `id_jurusan`, `id_grade`) VALUES
(7, 2, 'Admin', 'admin@gmail.com', 'admin', '4297f44b13955235245b2497399d7a93', NULL, NULL, '2020-10-18 03:55:16', NULL, NULL, NULL),
(17, 1, 'ApiRahman', '', 'apirahman55', '4297f44b13955235245b2497399d7a93', 'diproses', NULL, '2020-11-21 11:31:18', NULL, NULL, NULL),
(18, 0, 'Api Rahman', 'apirahman55@gmail.com', 'apirahman', '6dbe809068f94ca88b93068e1843e917', 'lolos', 5, '2020-11-21 07:20:58', 23, 5, 1),
(19, 0, 'Fansa', 'fansa@gmail.com', 'fansa', '4297f44b13955235245b2497399d7a93', 'gagal', NULL, '2020-11-21 09:21:39', 24, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_sekolah` text COLLATE utf8_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8_unicode_ci NOT NULL,
  `visi` text COLLATE utf8_unicode_ci NOT NULL,
  `misi` text COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `nama_sekolah`, `alamat_sekolah`, `sejarah`, `visi`, `misi`, `banner`) VALUES
(1, 'SMK Cipta Karya Bekasi1', 'Jl. Kaliabang Bungur No.2, RT.003/RW.001, Pejuang, Kecamatan Medan Satria, Kota Bks, Jawa Barat 17124', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor convallis, venenatis urna vel, ultrices nisl. Ut lorem libero, pulvinar eu odio eget, hendrerit volutpat lorem. Vestibulum pulvinar tristique lectus in iaculis. Curabitur ultrices dignissim nulla, quis aliquet purus tincidunt vel. Suspendisse molestie rhoncus nulla eget dapibus. Nulla pharetra, elit ac ornare rutrum, libero risus bibendum arcu, eget maximus libero sapien id lorem. Proin maximus dolor urna, vitae luctus risus tincidunt sit amet. In porttitor placerat tristique. Vivamus quis nisi ultrices, tempor est vitae, hendrerit metus. Vestibulum finibus arcu nec orci fermentum, et mollis tortor rhoncus. Duis tristique scelerisque magna, id tristique tellus eleifend vitae. Donec dignissim ipsum sit amet ullamcorper eleifend. Vivamus pretium nibh nec massa auctor, eget laoreet nulla convallis. Fusce eros felis, ornare eget odio vitae, pulvinar varius libero.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor convallis, venenatis urna vel, ultrices nisl. Ut lorem libero, pulvinar eu odio eget, hendrerit volutpat lorem. Vestibulum pulvinar tristique lectus in iaculis. Curabitur ultrices dignissim nulla, quis aliquet purus tincidunt vel. Suspendisse molestie rhoncus nulla eget dapibus. Nulla pharetra, elit ac ornare rutrum, libero risus bibendum arcu, eget maximus libero sapien id lorem. Proin maximus dolor urna, vitae luctus risus tincidunt sit amet. In porttitor placerat tristique. Vivamus quis nisi ultrices, tempor est vitae, hendrerit metus. Vestibulum finibus arcu nec orci fermentum, et mollis tortor rhoncus. Duis tristique scelerisque magna, id tristique tellus eleifend vitae. Donec dignissim ipsum sit amet ullamcorper eleifend. Vivamus pretium nibh nec massa auctor, eget laoreet nulla convallis. Fusce eros felis, ornare eget odio vitae, pulvinar varius libero.\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non dolor convallis, venenatis urna vel, ultrices nisl. Ut lorem libero, pulvinar eu odio eget, hendrerit volutpat lorem. Vestibulum pulvinar tristique lectus in iaculis. Curabitur ultrices dignissim nulla, quis aliquet purus tincidunt vel. Suspendisse molestie rhoncus nulla eget dapibus. Nulla pharetra, elit ac ornare rutrum, libero risus bibendum arcu, eget maximus libero sapien id lorem. Proin maximus dolor urna, vitae luctus risus tincidunt sit amet. In porttitor placerat tristique. Vivamus quis nisi ultrices, tempor est vitae, hendrerit metus. Vestibulum finibus arcu nec orci fermentum, et mollis tortor rhoncus. Duis tristique scelerisque magna, id tristique tellus eleifend vitae. Donec dignissim ipsum sit amet ullamcorper eleifend. Vivamus pretium nibh nec massa auctor, eget laoreet nulla convallis. Fusce eros felis, ornare eget odio vitae, pulvinar varius libero.\r\n', 'beauty-girl.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `jadwal_ibfk_3` (`id_kelas`),
  ADD KEY `jadwal_ibfk_4` (`id_grade`),
  ADD KEY `jadwal_ibfk_5` (`id_jurusan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `users_ibfk_3` (`id_kelas`),
  ADD KEY `users_ibfk_4` (`id_grade`),
  ADD KEY `users_ibfk_2` (`id_jurusan`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
