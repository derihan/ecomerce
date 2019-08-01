-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jan 2019 pada 16.42
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3926db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(20) NOT NULL,
  `manufacture` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `manufacture`, `alamat`, `email`) VALUES
(1, 'amd', 'amd corp', 'yogyakarta', 'oficiall.web@gmail.com'),
(3, 'Intel ', 'intel corp', 'yogyakarta', 'intel.corp@mail.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `Id_cus` int(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `email_add` text NOT NULL,
  `login_name` varchar(11) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `add_1` text NOT NULL,
  `add_2` text NOT NULL,
  `add_3` text NOT NULL,
  `add_4` text NOT NULL,
  `image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`Id_cus`, `first_name`, `last_name`, `gender`, `email_add`, `login_name`, `phone_number`, `add_1`, `add_2`, `add_3`, `add_4`, `image`) VALUES
(5, 'agata', 'prima', 'L', 'rihan.nonim@gmail.com', 'dedi123', '089674007136', 'Soropaten 06', 'Ringinharjo', 'Bantul', 'Yogyakarta', 'dedi123.png'),
(6, 'rehan', 'anonim', '', 'oficiall.web@gmail.com', 'amikom11', '089674007136', 'soropaten', 'ringinharjo', 'bantul', 'yogyakarta', 'amikom11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `Id_invoice` varchar(12) NOT NULL,
  `Id_cus` varchar(12) NOT NULL,
  `total_bayar` mediumint(9) NOT NULL,
  `tgl_msk` date NOT NULL,
  `status` enum('pending','complete','not') NOT NULL DEFAULT 'not'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`Id_invoice`, `Id_cus`, `total_bayar`, `tgl_msk`, `status`) VALUES
('NVC01', '5', 8388607, '2019-01-10', 'not'),
('NVC02', '5', 2400000, '2019-01-10', 'complete');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `Id_invoice` varchar(10) NOT NULL,
  `send_to` varchar(30) NOT NULL,
  `add_1` text NOT NULL,
  `add_2` text NOT NULL,
  `add_3` text NOT NULL,
  `add_4` text NOT NULL,
  `bill_to` varchar(30) NOT NULL,
  `payment_method` varchar(70) NOT NULL,
  `kirim_ke` text NOT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `invoice_detail`
--

INSERT INTO `invoice_detail` (`Id_invoice`, `send_to`, `add_1`, `add_2`, `add_3`, `add_4`, `bill_to`, `payment_method`, `kirim_ke`, `tgl_order`) VALUES
('NVC01', 'agata', 'bantul', 'jogja', 'jogja', 'mhs', 'Digg Computer', 'COD', 'agataprima', '2019-01-10'),
('NVC02', 'agata', 'Jln kolonel sugiono Soropaten', 'Ringinharjo', 'Bantul', 'Yogyakarta', 'Digg Computer', 'Transfer', 'agataprima', '2019-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'komputer'),
(3, 'Memori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` int(5) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_order` int(11) NOT NULL,
  `price_order` int(11) NOT NULL,
  `id_invoice` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_cus`, `date_order`, `id_produk`, `qty_order`, `price_order`, `id_invoice`) VALUES
(1, 5, '2019-01-10', 7, 1, 15000000, 'NVC01'),
(2, 5, '2019-01-10', 1, 1, 2000000, 'NVC02'),
(3, 5, '2019-01-10', 6, 1, 400000, 'NVC02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_list`
--

CREATE TABLE `payment_list` (
  `Id_payment` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(8) NOT NULL,
  `atas_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment_list`
--

INSERT INTO `payment_list` (`Id_payment`, `payment_type`, `no_rek`, `nama_bank`, `atas_nama`) VALUES
(1, 'Transfer', '1230985655', 'BNI', 'Big-computer'),
(2, 'Transfer', '100200654099001', 'mandiri', 'Big-computer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `Id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `vendor` varchar(30) NOT NULL,
  `size_produk` int(11) NOT NULL,
  `produk_desc` text NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_brand` varchar(11) NOT NULL,
  `produk_qty` int(11) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`Id_produk`, `nama_produk`, `harga_produk`, `vendor`, `size_produk`, `produk_desc`, `id_kategori`, `id_brand`, `produk_qty`, `image`) VALUES
(1, 'intel core i5', 2000000, 'gelis', 0, 'e have included widgets for latest news, progress bars, to-do lists, chat windows, calendars, timelines and contact form. In addition, you will also find beautiful responsive charts, UI elements, alerts, panels and even a login page template to help you get started building your admin dashboard.', 'prosessor', 'intel', 90, 'intel_core_i5190109.png'),
(6, 'intel core i3', 400000, 'jagat', 0, '-', 'prosessor', 'intel', 2, 'intel_core_i5190109.png'),
(7, 'AMD A9', 15000000, '', 0, 'MURAH', 'prosessor', 'intel', 20, 'AMD_A9190109.png'),
(8, 'AMD A8', 12000000, '', 0, 'mahal', 'prosessor', 'intel', 8, 'AMD_A8190109.png'),
(9, 'acer one Z142', 5000000, '', 0, 'bagus\r\nnew\r\nsecond', 'prosessor', 'intel', 3, 'acer_one_Z142190109.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_invoice` varchar(10) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `no_rekening` varchar(30) NOT NULL,
  `bank_to` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bukti_tf` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_invoice`, `nama_bank`, `no_rekening`, `bank_to`, `nama`, `total_bayar`, `bukti_tf`) VALUES
(1, 'NVC02', 'BNI', '0984311111', 'BNI', 'Supradinn', 2400000, 'NVC02190110.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `akses`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 2),
('amikom11', '4297f44b13955235245b2497399d7a93', 1),
('dedi123', '4297f44b13955235245b2497399d7a93', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama`, `email`, `alamat`, `no_telp`) VALUES
(1, 'PT magu ogah', 'Maju.wegah@gmail.com', 'soropaten', '0897666'),
(2, 'TAS-IRENG', 'rihan.nonim@gmail.com', 'yogyakarta', '0897666');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Id_cus`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Id_invoice`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`Id_invoice`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `payment_list`
--
ALTER TABLE `payment_list`
  ADD PRIMARY KEY (`Id_payment`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `Id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
