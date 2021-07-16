-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 11:48 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_pendaftaran` int(10) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `persyaratan` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_pendaftaran`, `id_anggota`, `nama_anggota`, `alamat`, `no_tlp`, `persyaratan`, `tempat_lahir`, `tanggal_lahir`, `status`) VALUES
(4, '3', 'udins', 'banung', '89339319', 'KTP', NULL, '0000-00-00', NULL),
(5, '100', 'yosep', 'banung', '89223211', 'KTP', NULL, '0000-00-00', NULL),
(6, '5', 'anggota', 'bandung', '035678897987', 'KTP', 'Bandung', '2018-01-02', 'aktif'),
(10, 'U-19588C00', 'anggota', 'cimahi', '08145456456', '', 'Cimahi', '1993-01-01', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenisbarang` varchar(30) NOT NULL,
  `satuanbarang` varchar(30) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenisbarang`, `satuanbarang`, `harga_beli`, `harga_jual`, `stok`) VALUES
(11, 'pelet', 'pakan', 'kg', 4000, 5000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_angsuran` varchar(50) NOT NULL,
  `angsuran_ke` int(10) NOT NULL,
  `jumlah_bayar` varchar(50) NOT NULL,
  `sisa_bayar` varchar(100) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_anggota`, `nama_anggota`, `tgl_bayar`, `jumlah_angsuran`, `angsuran_ke`, `jumlah_bayar`, `sisa_bayar`, `bukti_pembayaran`, `status`, `keterangan`) VALUES
(1, '5', 'ikin', '2018-01-01', '15', 1, '500000', '5000000', '', 'confirm', ''),
(19, 'U-19588C00', 'anggota', '2018-01-08', '5', 1, '1000', '699000', '', 'waiting', ''),
(20, 'U-19588C00', 'anggota', '2018-01-09', '5', 2, '600', '698400', '', 'waiting', ''),
(21, 'U-19588C00', 'anggota', '2018-01-10', '5', 3, '8400', '690000', '', 'waiting', '');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_anggota` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `persyaratan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_anggota`, `nama`, `alamat`, `no_tlp`, `persyaratan`) VALUES
(0, '0', 'Bandung', 2147483647, '0');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE IF NOT EXISTS `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `umur` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `jumlah_angsuran` varchar(50) NOT NULL,
  `nominal_pinjam` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_anggota`, `nama_anggota`, `alamat`, `no_telepon`, `umur`, `tanggal_pengajuan`, `jumlah_angsuran`, `nominal_pinjam`, `status`) VALUES
(2, '5', 'tes', 'bandung', '022678678', '20', '2018-01-10', '15', '5000000', 'accepted'),
(17, 'U-19588C00', 'anggota', 'cimahi', '08145456456', '', '2018-01-08', '5', '700000', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `id_barang`, `qty`, `total_harga`, `tgl`, `setor`) VALUES
(14, 123, 2, 3000, '2014-10-20', 1),
(15, 456, 2, 10000, '2014-10-20', 1),
(16, 123, 2, 3000, '2014-10-19', 1),
(17, 220, 1, 2500, '2017-10-13', 0),
(18, 220, 1, 2500, '2017-10-13', 0),
(19, 230, 1, 1000, '2017-10-13', 0),
(20, 258, 1, 55000, '2017-10-23', 0),
(21, 456, 1, 5500, '2017-10-23', 0),
(22, 239, 3, 15000, '2017-10-30', 0),
(23, 247, 1, 9000, '2017-11-08', 0),
(24, 246, 1, 4500, '2017-11-08', 0),
(25, 247, 1, 9000, '2017-11-08', 0),
(26, 246, 1, 4500, '2017-11-08', 0),
(27, 248, 1, 13000, '2017-11-08', 0),
(28, 248, 2, 26000, '2017-11-08', 0),
(29, 239, 1, 5000, '2017-11-08', 0),
(30, 245, 1, 5000, '2017-11-08', 0),
(31, 246, 1, 4500, '2017-11-08', 0),
(32, 247, 1, 9000, '2017-11-08', 0),
(33, 248, 1, 13000, '2017-11-08', 0),
(34, 249, 1, 10, '2017-11-08', 0),
(35, 248, 1, 13000, '2017-11-08', 0),
(36, 248, 2, 26000, '2017-11-08', 0),
(37, 245, 1, 5000, '2017-11-08', 0),
(38, 249, 1, 10, '2017-11-14', 0),
(39, 247, 1, 9000, '2017-11-14', 0),
(40, 246, 2, 9000, '2017-11-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `no` int(11) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jenis_alat` varchar(11) NOT NULL,
  `jml_pinjam` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`no`, `id_anggota`, `nama_anggota`, `tgl_pinjam`, `jenis_alat`, `jml_pinjam`, `total_bayar`, `status`) VALUES
(9, 'U-19588C00', 'anggota', '2018-01-30', 'pakan', '3', '9000', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE IF NOT EXISTS `setoran` (
  `no` int(11) NOT NULL,
  `id_anggota` varchar(50) NOT NULL,
  `nama_anggota` varchar(40) NOT NULL,
  `tgl_setoran` date NOT NULL,
  `nominal` int(20) NOT NULL,
  `total` int(40) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`no`, `id_anggota`, `nama_anggota`, `tgl_setoran`, `nominal`, `total`, `status`) VALUES
(2, '22223', 'udjang', '2017-12-19', 4000, 0, 'belum diterima'),
(3, '90', 'fff', '2018-01-21', 4700, 0, 'belum diterima');

-- --------------------------------------------------------

--
-- Table structure for table `set_pinjam`
--

CREATE TABLE IF NOT EXISTS `set_pinjam` (
  `id_set_pinjam` int(10) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_pinjam`
--

INSERT INTO `set_pinjam` (`id_set_pinjam`, `nilai`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `set_simpan`
--

CREATE TABLE IF NOT EXISTS `set_simpan` (
  `id_set_simpan` int(10) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_simpan`
--

INSERT INTO `set_simpan` (`id_set_simpan`, `nilai`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `simpan`
--

CREATE TABLE IF NOT EXISTS `simpan` (
  `id_anggota` int(30) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `tgl_simpan` date NOT NULL,
  `jenis_simpan` varchar(30) NOT NULL,
  `total_simpan` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpan`
--

INSERT INTO `simpan` (`id_anggota`, `nama_anggota`, `tgl_simpan`, `jenis_simpan`, `total_simpan`) VALUES
(991223, 'doni', '2017-12-09', 'sukarela', 4030);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `no` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`no`, `id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, '1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, '2', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(3, '4', 'ramdani', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer'),
(4, '5', 'ikin', 'anggota', 'cfba03cfe4c900cf8069e518fd420c17', 'anggota'),
(8, 'U-19588C00', 'anggota', 'anggota', '827ccb0eea8a706c4c34a16891f84e7b', 'anggota'),
(9, 'U-51AC03CE', 'jajang', 'jajang', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'pasterisasi'),
(10, 'U-94C06EBE', 'abdul', 'abdul', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'mako');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `simpan`
--
ALTER TABLE `simpan`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `setoran`
--
ALTER TABLE `setoran`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
