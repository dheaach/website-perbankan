-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 11:38 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perbankan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ambil`
--

CREATE TABLE `tbl_ambil` (
  `id_ambil` int(10) NOT NULL,
  `id_simpan` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `jml_ambil` bigint(30) NOT NULL,
  `tgl_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ambil`
--

INSERT INTO `tbl_ambil` (`id_ambil`, `id_simpan`, `id_nasabah`, `jml_ambil`, `tgl_ambil`) VALUES
(1, 25, 1, 12000000, '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id_angsur` int(10) NOT NULL,
  `id_pinjam` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `jml_angsur` bigint(30) NOT NULL,
  `tgl_angsur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id_angsur`, `id_pinjam`, `id_nasabah`, `jml_angsur`, `tgl_angsur`) VALUES
(1, 4, 2, 3150000, '2019-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ang_simpan`
--

CREATE TABLE `tbl_ang_simpan` (
  `id_ang_simpan` int(10) NOT NULL,
  `id_simpan` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `jml_tab` bigint(30) NOT NULL,
  `tgl_ang_sim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ang_simpan`
--

INSERT INTO `tbl_ang_simpan` (`id_ang_simpan`, `id_simpan`, `id_nasabah`, `jml_tab`, `tgl_ang_sim`) VALUES
(2, 25, 1, 12000000, '2019-11-26'),
(3, 25, 1, 12000000, '2019-11-26'),
(28, 25, 1, 12000000, '2019-12-03'),
(29, 0, 0, 0, '0000-00-00'),
(30, 0, 0, 0, '0000-00-00'),
(31, 0, 0, 0, '0000-00-00'),
(32, 0, 0, 0, '0000-00-00'),
(33, 0, 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bunga`
--

CREATE TABLE `tbl_bunga` (
  `id_bunga` int(11) NOT NULL,
  `jml_bunga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bunga`
--

INSERT INTO `tbl_bunga` (`id_bunga`, `jml_bunga`) VALUES
(1, '6'),
(2, '2'),
(3, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'teller'),
(3, 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nasabah`
--

CREATE TABLE `tbl_nasabah` (
  `id_nasabah` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_nasabah` varchar(30) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('islam','katholik','protestan','hindu','budha','dll') NOT NULL,
  `jk` enum('laki_laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nasabah`
--

INSERT INTO `tbl_nasabah` (`id_nasabah`, `no_ktp`, `nama_nasabah`, `tmp_lahir`, `tgl_lahir`, `agama`, `jk`, `alamat`, `no_hp`, `email`, `jenis`) VALUES
('1', '35556532', 'qin', 'mlg', '2019-02-05', 'islam', 'laki_laki', 'ttj', '08811919911', 'www@gmail.com', 'calon'),
('2', '1123239293', 'dhea', 'malang', '2002-05-23', 'islam', '', 'ddddddddeeeeeee', '0988872777', 'guhya@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `no_ktp` varchar(15) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `no_ktp`, `nama_petugas`, `username`, `password`, `tgl_lahir`, `alamat`, `no_hp`, `level`) VALUES
('2305', '3554333112', 'dhea sukma', 'dhea@gmail.com', '202cb962ac59075b964b07152d234b70', '2002-05-23', 'malangg', '087701500719', 1),
('2306', '08666765565', 'Arthit', 'sun@gmail.com', '202cb962ac59075b964b07152d234b70', '2002-05-23', 'thai', '087719882882', 88);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `id_bunga` int(10) NOT NULL,
  `jml_pinjam` bigint(30) NOT NULL,
  `total_pinjam` bigint(30) NOT NULL,
  `angsuran` varchar(50) NOT NULL,
  `waktu` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `sisa_pinjam` bigint(30) NOT NULL,
  `status_pinjam` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `id_nasabah`, `id_bunga`, `jml_pinjam`, `total_pinjam`, `angsuran`, `waktu`, `tgl_pinjam`, `sisa_pinjam`, `status_pinjam`) VALUES
(4, 2, 5, 30000000, 31500000, '3150000', 10, '2019-11-26', 28350000, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpan`
--

CREATE TABLE `tbl_simpan` (
  `id_simpan` int(10) NOT NULL,
  `id_nasabah` int(10) NOT NULL,
  `id_bunga` int(10) NOT NULL,
  `jml_simpan` bigint(30) NOT NULL,
  `total_simpan` bigint(30) NOT NULL,
  `tgl_simpan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_simpan`
--

INSERT INTO `tbl_simpan` (`id_simpan`, `id_nasabah`, `id_bunga`, `jml_simpan`, `total_simpan`, `tgl_simpan`) VALUES
(25, 1, 0, 12000000, 24000000, '2019-11-26'),
(45, 0, 0, 0, 0, '0000-00-00'),
(46, 0, 0, 0, 0, '0000-00-00'),
(47, 0, 0, 0, 0, '0000-00-00'),
(48, 0, 0, 0, 0, '0000-00-00'),
(49, 0, 0, 0, 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ambil`
--
ALTER TABLE `tbl_ambil`
  ADD PRIMARY KEY (`id_ambil`);

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id_angsur`);

--
-- Indexes for table `tbl_ang_simpan`
--
ALTER TABLE `tbl_ang_simpan`
  ADD PRIMARY KEY (`id_ang_simpan`);

--
-- Indexes for table `tbl_bunga`
--
ALTER TABLE `tbl_bunga`
  ADD PRIMARY KEY (`id_bunga`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_nasabah`
--
ALTER TABLE `tbl_nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  ADD PRIMARY KEY (`id_simpan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ambil`
--
ALTER TABLE `tbl_ambil`
  MODIFY `id_ambil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id_angsur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ang_simpan`
--
ALTER TABLE `tbl_ang_simpan`
  MODIFY `id_ang_simpan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_bunga`
--
ALTER TABLE `tbl_bunga`
  MODIFY `id_bunga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_simpan`
--
ALTER TABLE `tbl_simpan`
  MODIFY `id_simpan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
