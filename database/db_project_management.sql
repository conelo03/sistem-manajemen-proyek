-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 12:53 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_activity`
--

CREATE TABLE `tb_activity` (
  `id_activity` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `name_activity` varchar(100) NOT NULL,
  `categories_activity` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `bobot` int(11) NOT NULL,
  `budget_planning` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_plan_end` date NOT NULL,
  `status_activity` varchar(10) NOT NULL,
  `date_end` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_activity`
--

INSERT INTO `tb_activity` (`id_activity`, `id_project`, `name_activity`, `categories_activity`, `description`, `bobot`, `budget_planning`, `date_start`, `date_plan_end`, `status_activity`, `date_end`, `id_user`, `created_at`) VALUES
(3, 2, 'Kegiatan 2', 'jenis', 'desc', 20, 200000, '2022-04-16', '2022-01-31', 'Open', '2022-04-17', 1, '2022-04-16 23:25:29'),
(4, 2, 'Kegiatan 3', 'jenis', 'desc', 80, 12000, '2022-04-16', '2022-04-30', 'Progress', '2022-04-19', 1, '2022-04-16 23:25:51'),
(5, 3, 'Kegiatan 1', 'jenis ', 'desks', 30, 12000000, '2022-04-18', '2022-04-30', 'Finish', '2022-04-30', 1, '2022-04-18 19:35:34'),
(6, 3, 'Kegiatan 2', 'jenis 2', 'desk', 70, 1000000, '2022-04-18', '2022-04-30', 'Finish', '2022-04-18', 1, '2022-04-18 19:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_attachment`
--

CREATE TABLE `tb_attachment` (
  `id_attachment` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `name_activity` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_attachment`
--

INSERT INTO `tb_attachment` (`id_attachment`, `id_project`, `name_activity`, `description`, `file`, `id_user`, `created_at`) VALUES
(1, 2, 'tes', 'Tes', '7__SOAL_UAS-STATISTIKA_SOSIAL-PRODY_NEGARA_KARYAWAN_P2K.pdf', 1, '2022-04-17 00:42:40'),
(2, 2, 'tes', 'tes lagi', '5533-15688-1-PB.pdf', 1, '2022-04-17 00:43:27'),
(3, 3, 'tes', 'tes', 'Activity_Diagram_1.pdf', 1, '2022-04-18 19:37:35'),
(4, 3, 'tes', 'tes', 'ica.docx', 1, '2022-04-18 19:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_activity`
--

CREATE TABLE `tb_log_activity` (
  `id_log_activity` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` text NOT NULL,
  `mode` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log_activity`
--

INSERT INTO `tb_log_activity` (`id_log_activity`, `id_project`, `id_user`, `description`, `mode`, `created_at`) VALUES
(2, 2, 1, 'Administrator menambahkan kegiatan Kegiatan 1', 'new', '2022-04-16 00:00:00'),
(3, 2, 1, 'Administrator mengupdate kegiatan Kegiatan 12', 'update', '2022-04-16 23:21:55'),
(4, 2, 1, 'Administrator menghapus kegiatan Kegiatan 12', 'delete', '2022-04-16 23:22:01'),
(5, 2, 1, 'Administrator menambahkan kegiatan Kegiatan 2', 'new', '2022-04-16 23:25:29'),
(6, 2, 1, 'Administrator menambahkan kegiatan Kegiatan 3', 'new', '2022-04-16 23:25:51'),
(7, 2, 1, 'Administrator mengupdate status kegiatan  dari Open ke Progress', 'update', '2022-04-16 23:40:22'),
(8, 2, 1, 'Administrator mengupdate status kegiatan  dari Progress ke Finish', 'update', '2022-04-17 00:06:52'),
(9, 2, 1, 'Administrator mengupdate status kegiatan  dari Open ke Finish', 'update', '2022-04-17 00:07:06'),
(10, 2, 1, 'Administrator menambahkan lampiran tes lagi', 'new', '2022-04-17 00:43:27'),
(11, 2, 1, 'Administrator menambahkan lampiran tes', 'new', '2022-04-17 00:43:52'),
(12, 2, 1, 'Administrator menghapus lampiran tes', 'delete', '2022-04-17 00:54:12'),
(13, 2, 1, 'Administrator mengupdate status kegiatan  dari Finish ke Progress', 'update', '2022-04-17 01:24:32'),
(14, 2, 1, 'Administrator mengupdate kegiatan Kegiatan 2', 'update', '2022-04-17 15:59:07'),
(15, 3, 1, 'Administrator menambahkan kegiatan Kegiatan 1', 'new', '2022-04-18 19:35:34'),
(16, 3, 1, 'Administrator menambahkan kegiatan Kegiatan 2', 'new', '2022-04-18 19:36:12'),
(17, 3, 1, 'Administrator mengupdate kegiatan Kegiatan 1', 'update', '2022-04-18 19:36:25'),
(18, 3, 1, 'Administrator mengupdate status kegiatan  dari Open ke Progress', 'update', '2022-04-18 19:36:48'),
(19, 3, 1, 'Administrator mengupdate status kegiatan  dari Progress ke Finish', 'update', '2022-04-18 19:37:01'),
(20, 3, 1, 'Administrator mengupdate status kegiatan  dari Open ke Finish', 'update', '2022-04-18 19:37:17'),
(21, 3, 1, 'Administrator menambahkan lampiran tes', 'new', '2022-04-18 19:37:35'),
(22, 3, 1, 'Administrator menambahkan lampiran tes', 'new', '2022-04-18 19:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE `tb_project` (
  `id_project` int(11) NOT NULL,
  `name_project` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL,
  `nilai_project` double NOT NULL,
  `status_project` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`id_project`, `name_project`, `unit`, `client`, `nilai_project`, `status_project`, `description`, `date_start`, `date_end`, `id_user`, `created_at`, `progress`) VALUES
(2, 'Proyek Jalan Tol', 'Unit Jakarta', 'PT. TOL Indo', 12000000000, 'Selesai', 'testes', '2022-04-16', '2022-05-31', 1, '2022-04-17 00:22:04', 20),
(3, 'Project Jalan Tolo', 'Unit Bandung', 'PT. ABC', 1000000000000, 'Progress', 'desk', '2022-04-18', '2022-10-18', 1, '2022-04-18 19:33:52', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `photos` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `gender`, `phone`, `unit`, `email`, `username`, `password`, `photos`, `role`) VALUES
(1, 'Administrator', 'Laki-laki', '089', 'Unit Bandung', 'admin@email.com', 'admin', '$2y$10$ig4KL9R7sGc2oe25GKW5lu3jFSVLxTdLyadn0SU7CkAHodM1bNxfi', 'programmer-1571407517582-29481.jpg', 1),
(3, 'User', 'Laki-laki', '089', 'Unit Bandung', 'user@email.com', 'user', '$2y$10$dQeXuvthF9tDGMJr5WGTseLSgbWBm9yD9pMQRNtrVWG23WdO/SPEq', 'avatar.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_activity`
--
ALTER TABLE `tb_activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `tb_attachment`
--
ALTER TABLE `tb_attachment`
  ADD PRIMARY KEY (`id_attachment`);

--
-- Indexes for table `tb_log_activity`
--
ALTER TABLE `tb_log_activity`
  ADD PRIMARY KEY (`id_log_activity`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_activity`
--
ALTER TABLE `tb_activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_attachment`
--
ALTER TABLE `tb_attachment`
  MODIFY `id_attachment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_log_activity`
--
ALTER TABLE `tb_log_activity`
  MODIFY `id_log_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
