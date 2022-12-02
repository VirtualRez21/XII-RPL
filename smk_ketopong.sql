-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 11:03 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_ketopong`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` int(32) NOT NULL,
  `nama` varchar(512) NOT NULL,
  `alamat` varchar(512) NOT NULL,
  `jenis_kelamin` varchar(64) NOT NULL,
  `foto` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `alamat`, `jenis_kelamin`, `foto`) VALUES
(2, 12346, 'hibatur', 'jalur 2', 'pria', '2022-10-2508-26-14pmAvatar-Profile-PNG-Picture.png'),
(6, 11111111, 'mardais', 'ketopong', 'pria', '2022-10-2508-23-01pm147140.png'),
(8, 9090, 'nisaaaa', 'isekai', 'perempuan', '2022-10-2508-22-37pm194938.png'),
(9, 12312, 'Uyiz Dofukizi', 'sdgdf', 'pria', '2022-10-2508-21-05pmavatar_3.png'),
(14, 12312, 'mardais', 'sdgdf', 'pria', '2022-10-2511-54-50am194938.png'),
(15, 234245754, 'asdaafasfgsdfg', 'asdfasd', 'asfa', '2022-11-0101-10-41pmavatar-png-1.png'),
(18, 123, 'adsas', 'adsa', 'ada', '2022-11-1512-32-24pm4c644b8d-a230-49eb-9082-dc6e5855af13-profile-image-118.jpeg'),
(19, 456, 'asda', 'ada', 'ads', '2022-11-1512-32-24pm147140.png'),
(20, 987, 'blablabla', 'samping bengkel', 'pria', '2022-11-2101-14-57pm147144.png'),
(21, 654, 'cacacaa', 'samping jembatan', 'perempuan', '2022-11-2101-14-57pmavatar_3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
