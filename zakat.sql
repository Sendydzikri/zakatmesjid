-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Mar 2019 pada 04.35
-- Versi Server: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `amilin`
--

CREATE TABLE IF NOT EXISTS `amilin` (
  `nama` int(50) NOT NULL,
  `status` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejakat`
--

CREATE TABLE IF NOT EXISTS `pejakat` (
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `jenis_zakat` varchar(50) NOT NULL,
  `nominal` int(40) NOT NULL,
  `inpaq` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_zakat`
--

CREATE TABLE IF NOT EXISTS `penerima_zakat` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `zakat_keluar`
--

CREATE TABLE IF NOT EXISTS `zakat_keluar` (
  `nominal` int(50) NOT NULL,
  `nama_penerima` varchar(40) NOT NULL,
  `jum_penerima` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `zakat_masuk`
--

CREATE TABLE IF NOT EXISTS `zakat_masuk` (
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` int(50) NOT NULL,
  `jenis_zakat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amilin`
--
ALTER TABLE `amilin`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `pejakat`
--
ALTER TABLE `pejakat`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `penerima_zakat`
--
ALTER TABLE `penerima_zakat`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `zakat_keluar`
--
ALTER TABLE `zakat_keluar`
 ADD PRIMARY KEY (`nominal`);

--
-- Indexes for table `zakat_masuk`
--
ALTER TABLE `zakat_masuk`
 ADD PRIMARY KEY (`nama`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
