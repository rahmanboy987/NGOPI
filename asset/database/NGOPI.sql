-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2020 pada 11.01
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keluar`
--

CREATE TABLE `detail_keluar` (
  `id_detail_keluar` int(11) NOT NULL,
  `id_keluar` varchar(32) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `subtotal_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `highlight`
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
-- Dumping data untuk tabel `highlight`
--

INSERT INTO `highlight` (`id_highlight`, `mini_text`, `name`, `photo`, `description`, `template`) VALUES
(1, 'BEST WARKOP', 'GOOD DRINKING', 'barista.png', 'Setiap cangkir kopi yang berkualitas dan dimulai dengan bahan-bahan pilihan lokal sebagai poin utama untuk rutinitas sehari-hari Anda yang menyenangkan ^_^', 1),
(2, 'BEST COFFEE', 'TO YOU', '', '', 2),
(3, 'FRAPPUCINO CHOCOLATE', 'COFFEES & CHOCO', 'frappucino.jpg', 'FRAPUCCINO dibuat dengan kopi diblender dengan es dan bahan-bahan lainnya seperti chocolate biasanya ditambah krim kocok yang dihias dengan butiran butiran chocolate', 3),
(4, 'FRENCH FRIES', 'SNACK & GOOD EATS', 'products-02.jpg', 'French Fries atau biasa disebut Kentang Goreng snack yang sering diminati oleh pengunjung karena harga yang sesuai dengan kantong dan dibuat dengan kentang kentang pilihan ditambah dengan bumbu bumbu yang sesuai dengan selera pengunjung', 3),
(5, 'NASI GORENG KU', 'EAT & GOOD TASTE', 'products-031.jpg', 'NASI GORENG menu makanan berat andalan kami yang dibuat dengan sepenuh hati dan dari bahan bahan pilihan yang harga nya sesuai dengan kantong anda dan dapat membuat anda kenyang^_^', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_produk`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_masuk`
--

CREATE TABLE `pembelian_masuk` (
  `id_masuk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `total_harga` int(11) NOT NULL,
  `keterangan` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_keluar`
--

CREATE TABLE `penjualan_keluar` (
  `id_keluar` varchar(32) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_keluar` datetime NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `jenis_produk` varchar(64) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `stock_produk` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `jenis_produk`, `nama_produk`, `stock_produk`, `harga_jual`) VALUES
(1, 'Makanan', 'Nasi Goreng', 100, 15000),
(2, 'Minuman', 'Frappucino Chocolate', 100, 10000),
(3, 'Makanan', 'French Fries', 100, 5000),
(4, 'Makanan', 'Omelete', 100, 8000),
(5, 'Makanan', 'Indomie Goreng', 100, 5000),
(6, 'Makanan', 'Indomie Goreng + Telur', 100, 8000),
(7, 'Makanan', 'Indomie Kuah', 100, 5000),
(8, 'Makanan', 'Indomie Kuah + Telur', 100, 8000),
(9, 'Makanan', 'Nasi Pecel', 100, 10000),
(10, 'Makanan', 'Nasi Bakar', 100, 12000),
(11, 'Makanan', 'Nasi Campur', 100, 10000),
(12, 'Minuman', 'Es teh', 100, 3000),
(13, 'Minuman', 'Es Jeruk', 100, 5000),
(14, 'Other', 'Rokok Surya Pro', 100, 20000),
(15, 'Other', 'Rokok Dunhill Hitam', 100, 25000),
(16, 'Other', 'Rokok Dunhill Putih', 100, 24000),
(17, 'Other', 'Rokok Dji Sam Soe kretek 16', 100, 19000),
(18, 'Other', 'Rokok Magnum Biru', 100, 20000),
(19, 'Other', 'Rokok Sampoerna Mild', 100, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `days` varchar(16) NOT NULL,
  `descript` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `schedule`
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `pass`, `phone`, `ktp`, `role`) VALUES
(1, 'fathur', 'admin@admin.com', '$2y$10$j.YPXmcTiFu/Hai4dSgfZe4M7122r94hh.kch.WC4Q5om0w8aOx76', '0000', '0000', 1),
(4, 'kasir', 'kasir@kasir.com', '$2y$10$6hv2x6.gUaCGcMg3EdTfGO9b6yL5X4uCT9jgy5y0okqB0jCCDf.Ay', '0000', '0000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warkop_settings`
--

CREATE TABLE `warkop_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `quotes` varchar(1024) NOT NULL,
  `place` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `warkop_settings`
--

INSERT INTO `warkop_settings` (`id`, `name`, `quotes`, `place`, `phone`) VALUES
(1, 'NGOPI YUUK', 'PENGHILANG STRESS', 'RUNGKUT, SURABAYA', '(031)1234567');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_keluar`
--
ALTER TABLE `detail_keluar`
  ADD PRIMARY KEY (`id_detail_keluar`);

--
-- Indeks untuk tabel `highlight`
--
ALTER TABLE `highlight`
  ADD PRIMARY KEY (`id_highlight`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pembelian_masuk`
--
ALTER TABLE `pembelian_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `penjualan_keluar`
--
ALTER TABLE `penjualan_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `warkop_settings`
--
ALTER TABLE `warkop_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_keluar`
--
ALTER TABLE `detail_keluar`
  MODIFY `id_detail_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `highlight`
--
ALTER TABLE `highlight`
  MODIFY `id_highlight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pembelian_masuk`
--
ALTER TABLE `pembelian_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
