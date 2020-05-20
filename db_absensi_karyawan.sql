-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2020 at 08:37 AM
-- Server version: 10.3.22-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dumdumbr_william`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tipe_absen` int(11) NOT NULL DEFAULT 0,
  `hadir` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nama_karyawan`, `waktu`, `lokasi`, `pesan`, `gambar`, `tipe_absen`, `hadir`) VALUES
(4, 'Will', '2020-05-11 11:54:17', 'Kantor', 'asd', 'login_background.jpg', 0, 0),
(5, 'Will', '2020-05-11 13:06:35', 'Rumah', 'asdas', 'login_background.jpg', 1, 2),
(8, 'Will', '2020-05-11 13:33:57', 'Kantor', 'asdasd', 'login_background.jpg', 1, 2),
(9, 'Will', '2020-05-11 13:42:15', 'Kantor', 'asd', 'login_background.jpg', 1, 1),
(10, 'Will', '2020-05-11 13:42:43', 'Rumah', 'asd', 'login_background.jpg', 2, 3),
(11, 'Will', '2020-05-11 13:44:14', 'Kantor', 'asdas', 'login_background.jpg', 1, 1),
(12, 'Will', '2020-05-11 13:44:21', 'Rumah', 'asdas', 'login_background.jpg', 2, 3),
(13, 'Will', '2020-05-11 13:45:04', 'Kantor', 'asd', 'login_background.jpg', 1, 1),
(15, 'test', '2020-05-20 13:47:03', 'Kantor', 'asdasd', '197-karyawan_illustration.png', 1, 1),
(16, 'karyawan', '2020-05-20 19:30:43', 'Rumah', 'test', '677-woman-working.PNG', 1, 1),
(17, 'karyawan', '2020-05-20 19:31:39', 'Rumah', 'test 2', '619-woman-working.PNG', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kepala_dept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `kepala_dept`) VALUES
(1, 'Sales', 'Will');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `account_type` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `password`, `account_type`, `nama`, `jenis_kelamin`, `no_telp`, `email`, `no_ktp`, `alamat`, `foto`, `id_shift`, `id_departemen`) VALUES
(9, 'will', 'will', 1, 'Will', 'L', '123123', '123123@12312', '123123', 'batam', 'login_background.jpg', 1, 1),
(12, 'karyawan', 'karyawan', 2, 'karyawan', 'L', '1231231231', 'test@gmail.com', '08123123123', 'test', '344-karyawan_illustration.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`) VALUES
(1, 'Kantor'),
(2, 'Kantin'),
(3, 'Rumah'),
(4, 'Parkiran');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id` int(11) NOT NULL,
  `shift` varchar(50) NOT NULL,
  `jam_mulai` varchar(8) NOT NULL,
  `jam_berhenti` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`id`, `shift`, `jam_mulai`, `jam_berhenti`) VALUES
(1, 'Pagi', '8:00 AM', '3:00 PM'),
(2, 'Sore', '3:00 PM', '10:00 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
