-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 07:30 AM
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
(1, 12345, 'fira', 'samping bengkel', 'perempuan', ''),
(2, 12346, 'hibatur', 'jalur 2', 'pria', ''),
(3, 12347, 'davva', 'timbau', 'pria', ''),
(6, 11111111, 'mardais', 'ketopong', 'pria', ''),
(8, 9090, 'nisaaaa', 'isekai', 'perempuan', ''),
(9, 12312, 'Uyiz Dofukizi', 'sdgdf', 'pria', ''),
(11, 2147483647, 'nisaaaa', 'sdgdf', 'pria', '194938.png'),
(12, 2147483647, 'Jeruk Bali', 'sdgdf', 'pria', '194938.png'),
(13, 12312, 'mardais', 'sdgdf', 'pria', '2022-10-2511:54:36am194938.png'),
(14, 12312, 'mardais', 'sdgdf', 'pria', '2022-10-2511-54-50am194938.png'),
(15, 2342, 'asda', 'asdfasd', 'asfa', '2022-10-2512-02-36pm194938.png'),
(16, 2342, 'sdfs', 'svcs', 'asdfs', '2022-10-2512-03-10pm194938.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
