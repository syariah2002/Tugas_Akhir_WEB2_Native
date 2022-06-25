-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2022 at 03:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi_simpan_pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tmp_lhr` varchar(20) NOT NULL,
  `j_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `username`, `password`, `nama`, `alamat`, `tgl_lhr`, `tmp_lhr`, `j_kel`, `status`, `no_tlp`, `gambar`) VALUES
(1, 'Ayu', 'ayu', 'Ayu Sukma', 'Kuningan', '2002-12-12', 'Kuningan', 'Perempuan', 'Anggota', '08978443559', ''),
(2, 'Nisa', 'nisa', 'Nisa Rahmawati', ' Cianjur', '2002-06-06', 'Kuningan', 'Perempuan', 'Anggota', '089787654323', ''),
(3, 'Tika', 'tika', 'Tika Utari', ' Jakarta', '2007-06-06', 'Kuningan', 'Perempuan', 'Anggota', '08978765567', ''),
(4, 'Ramadhan', 'ramadhan', 'Ramadhan', ' Kuningan', '2002-06-02', 'Kuningan', 'Laki-Laki', 'Anggota', '089787655679', ''),
(5, 'Rio', '', 'Rio Andriyanto', ' Kuningan', '2003-06-14', 'Kuningan', 'Laki-Laki', 'Anggota', '0897765765', '');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_petugas`, `id_anggota`, `id_pinjaman`, `tgl_pembayaran`, `angsuran_ke`, `ket`) VALUES
(1, 1, 3, 1, '2022-01-01', 1, 'Belum Lunas'),
(3, 1, 3, 1, '2022-06-12', 2, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `typeuser` enum('admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `typeuser`) VALUES
('Ninggrum', 'ninggrum', 'member'),
('Nisa', 'nisa', 'member'),
('Ramadhan', 'ramadhan', 'member'),
('Rio', 'rio', 'member'),
('Riri', 'riri', 'admin'),
('Syariah', 'syariah', 'admin'),
('Tika', 'tika', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tmp_lhr` varchar(20) NOT NULL,
  `j_kel` enum('Laki-Laki','Perempuan') NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `gambar` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `username`, `alamat`, `tgl_lhr`, `tmp_lhr`, `j_kel`, `status`, `no_tlp`, `gambar`) VALUES
(1, 'Riri', 'Riri', 'Kuningan', '2002-12-12', 'Kuningan', 'Perempuan', 'Petugas', '08925443885', '0'),
(2, 'Syariah', 'Syariah', 'Majalengka', '2002-06-07', 'Majalengka', 'Perempuan', 'Petugas', '0897855345', 'Profil.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `besar_pinjaman` varchar(50) NOT NULL,
  `tgl_pengajuan_pinjaman` date NOT NULL,
  `tgl_acc_pinjaman` date NOT NULL,
  `tgl_pinjaman` date NOT NULL,
  `tgl_pelunasan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_anggota`, `id_petugas`, `besar_pinjaman`, `tgl_pengajuan_pinjaman`, `tgl_acc_pinjaman`, `tgl_pinjaman`, `tgl_pelunasan`) VALUES
(1, 1, 1, '2.000.000', '2022-01-01', '2022-01-02', '2022-01-02', '2022-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `id_petugas` varchar(11) NOT NULL,
  `id_anggota` varchar(11) NOT NULL,
  `nm_simpanan` varchar(20) NOT NULL,
  `tgl_simpanan` date NOT NULL,
  `besar_simpanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `id_petugas`, `id_anggota`, `nm_simpanan`, `tgl_simpanan`, `besar_simpanan`) VALUES
(1, '1', '1', 'Tabungan', '2022-01-01', '2.000.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
