-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2019 pada 05.25
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `amilin`
--

CREATE TABLE `amilin` (
  `nama_amilin` varchar(40) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jenisbarang` varchar(30) NOT NULL,
  `satuanbarang` varchar(30) NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenisbarang`, `satuanbarang`, `harga_beli`, `harga_jual`, `stok`) VALUES
(11, 'pelet', 'pakan', 'kg', 4000, 5000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pejakat`
--

CREATE TABLE `pejakat` (
  `no` int(250) NOT NULL,
  `nama_pejakat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL,
  `jum_keluarga` int(40) NOT NULL,
  `nominal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_zakat`
--

CREATE TABLE `penerima_zakat` (
  `no` int(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `usia` int(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `no` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
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
-- Indeks untuk tabel `amilin`
--
ALTER TABLE `amilin`
  ADD PRIMARY KEY (`nama_amilin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pejakat`
--
ALTER TABLE `pejakat`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `penerima_zakat`
--
ALTER TABLE `penerima_zakat`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pejakat`
--
ALTER TABLE `pejakat`
  MODIFY `no` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penerima_zakat`
--
ALTER TABLE `penerima_zakat`
  MODIFY `no` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
