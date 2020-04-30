-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2020 at 02:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NGOPI`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `id_detail_keluar` int(11) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `subtotal_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `id_detail_masuk` int(11) NOT NULL,
  `id_masuk` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `jumlah_rusak` int(11) NOT NULL,
  `subtotal_masuk` int(11) NOT NULL,
  `subtotal_rusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `highlight`
--

CREATE TABLE `highlight` (
  `id_highlight` int(11) NOT NULL,
  `mini_text` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `photo` varchar(64) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `template` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highlight`
--

INSERT INTO `highlight` (`id_highlight`, `mini_text`, `name`, `photo`, `description`, `template`) VALUES
(1, 'BEST WARKOP', 'GOOD DRINKING', 'barista.png', 'Setiap cangkir kopi yang berkualitas dan dimulai dengan bahan-bahan pilihan lokal sebagai poin utama untuk rutinitas sehari-hari Anda yang menyenangkan ^_^', 1),
(2, 'BEST COFFEE', 'TO YOU', '', '', 2),
(3, 'FRAPPUCINO CHOCOLATE', 'COFFEES & CHOCO', 'frappucino.jpg', 'FRAPUCCINO dibuat dengan kopi diblender dengan es dan bahan-bahan lainnya seperti chocolate biasanya ditambah krim kocok yang dihias dengan butiran butiran chocolate', 3),
(4, 'FRENCH FRIES', 'SNACK & GOOD EATS', 'products-02.jpg', 'French Fries atau biasa disebut Kentang Goreng snack yang sering diminati oleh pengunjung karena harga yang sesuai dengan kantong dan dibuat dengan kentang kentang pilihan ditambah dengan bumbu bumbu yang sesuai dengan selera pengunjung', 3),
(5, 'NASI GORENG KU', 'EAT & GOOD TASTE', 'products-03.jpg', 'NASI GORENG menu makanan berat andalan kami yang dibuat dengan sepenuh hati dan dari bahan bahan pilihan yang harga nya sesuai dengan kantong anda dan dapat membuat anda kenyang^_^', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_masuk`
--

CREATE TABLE `pembelian_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `total_rugi` int(11) NOT NULL,
  `is_cek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_keluar`
--

CREATE TABLE `penjualan_keluar` (
  `id_keluar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_keluar` datetime NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stock_produk` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `days` varchar(16) NOT NULL,
  `descript` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `days`, `descript`) VALUES
(1, 'Minggu', 'TUTUP'),
(2, 'Senin', '7:00 AM to 8:00 PM'),
(3, 'Selasa', '7:00 AM to 8:00 PM'),
(4, 'Rabu', '7:00 AM to 8:00 PM'),
(5, 'Kamis', '7:00 AM to 8:00 PM'),
(6, 'Jumat', '7:00 AM to 8:00 PM'),
(7, 'Sabtu', '9:00 AM to 5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `ktp` varchar(32) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `pass`, `phone`, `ktp`, `role`) VALUES
(0, 'admin', 'admin@admin.com', '$2y$10$XDTttrdYam0ssjrEZOZYs./SnAcLGPQDeoHVnNqIv/XWL2ueuiuzK', '0000', '0000', 1),
(0, 'kasir', 'kasir@kasir.com', '$2y$10$aJMOU1FTTeqC.uYy4eV/weqpnmMyid2XelDx3UudyGTvXdjgIfCgC', '1111', '1111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warkop_settings`
--

CREATE TABLE `warkop_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `quotes` varchar(1024) NOT NULL,
  `place` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warkop_settings`
--

INSERT INTO `warkop_settings` (`id`, `name`, `quotes`, `place`, `phone`) VALUES
(1, 'NGOPI YUUK', 'PENGHILANG STRESS', 'RUNGKUT, SURABAYA', '(031)1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD PRIMARY KEY (`id_detail_keluar`);

--
-- Indexes for table `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD PRIMARY KEY (`id_detail_masuk`);

--
-- Indexes for table `highlight`
--
ALTER TABLE `highlight`
  ADD PRIMARY KEY (`id_highlight`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `warkop_settings`
--
ALTER TABLE `warkop_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `highlight`
--
ALTER TABLE `highlight`
  MODIFY `id_highlight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
