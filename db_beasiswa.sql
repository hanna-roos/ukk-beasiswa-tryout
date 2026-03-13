-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2026 at 09:40 AM
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
-- Database: `db_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrasi_beasiswa`
--

CREATE TABLE `registrasi_beasiswa` (
  `id_beasiswa` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `semester` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `ipk` varchar(4) NOT NULL,
  `beasiswa` enum('beasiswa_nasional','beasiswa_internasional','','') NOT NULL,
  `upload_berkas` varchar(255) NOT NULL,
  `status_ajuan` enum('Sudah Diverifikasi','Belum Diverifikasi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrasi_beasiswa`
--

INSERT INTO `registrasi_beasiswa` (`id_beasiswa`, `nama`, `email`, `nomor_hp`, `semester`, `ipk`, `beasiswa`, `upload_berkas`, `status_ajuan`) VALUES
(9, 'test', 'test@gmail.com', '082146804586', '2', '3.3', 'beasiswa_nasional', 'weverse_2-300121428.jpg', 'Belum Diverifikasi'),
(10, 'test', 'test@gmail.com', '082146804586', '5', '2.9', '', '', 'Belum Diverifikasi'),
(11, 'jungwon', 'jungwon@gmail.com', '02146854586', '5', '3.2', 'beasiswa_internasional', '', 'Belum Diverifikasi'),
(12, 'felix', 'felixgmail.com', '02146854586', '6', '3.1', 'beasiswa_internasional', 'weverse_0-283517320.jpeg', 'Belum Diverifikasi'),
(13, 'jake', 'jake@gmail.com', '082146804586', '4', '3.3', 'beasiswa_internasional', 'favicon.png', 'Belum Diverifikasi'),
(14, 'Han', 'hanjisung@gmail.com', '08214680586', '4', '3.3', 'beasiswa_internasional', '8c7a830b5d1548b10d1f275390258c31-removebg-preview.png', 'Belum Diverifikasi'),
(15, 'Jihoon', 'jihoon@gmail.com', '02146854586', '6', '3.4', 'beasiswa_nasional', 'weverse_2-300121429.jpg', 'Belum Diverifikasi'),
(17, 'hanna', 'hannaroosbeatrix@gmail.com', '08214680586', '6', '3.2', 'beasiswa_nasional', 'O&F_2026_LOGO_alt1.png', 'Belum Diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrasi_beasiswa`
--
ALTER TABLE `registrasi_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrasi_beasiswa`
--
ALTER TABLE `registrasi_beasiswa`
  MODIFY `id_beasiswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
