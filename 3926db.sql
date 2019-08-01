-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 08:47 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(20) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Id_cus` int(11) NOT NULL,
  `first_name` varchar(11) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `email_add` text NOT NULL,
  `login_name` varchar(11) NOT NULL,
  `login_password` varchar(150) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `add_1` text NOT NULL,
  `add_2` text NOT NULL,
  `add_3` text NOT NULL,
  `add_4` text NOT NULL,
  `profinsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Id_cus`, `first_name`, `last_name`, `gender`, `email_add`, `login_name`, `login_password`, `phone_number`, `add_1`, `add_2`, `add_3`, `add_4`, `profinsi`) VALUES
(5, 'Dedi', 'Prihandaru', 'L', 'rehan.siaan@gmail.com', 'dedi123', '', '089674007136', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Id_invoice` varchar(12) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `id_order` varchar(11) NOT NULL,
  `due_date` date NOT NULL,
  `invoice_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(5) NOT NULL,
  `id_cus` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty_order` int(11) NOT NULL,
  `price_order` int(11) NOT NULL,
  `payment` varchar(4) NOT NULL,
  `shipment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_cus`, `date_order`, `id_produk`, `qty_order`, `price_order`, `payment`, `shipment`) VALUES
(23, 5, '2018-12-27', 1, 3, 6000000, '', 0),
(24, 5, '2018-12-27', 2, 1, 150000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `Id_order_status` int(11) NOT NULL,
  `shipment_status` varchar(20) NOT NULL,
  `id_order` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_list`
--

CREATE TABLE `payment_list` (
  `Id_payment` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `atas_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_list`
--

INSERT INTO `payment_list` (`Id_payment`, `payment_type`, `no_rek`, `atas_nama`) VALUES
(1, 'Transfer', '08989898989', 'hadi'),
(2, 'Transfer', '089757676666', 'mulyo'),
(3, 'Transfer', '90877656266', 'yumna');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Id_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `size_produk` int(11) NOT NULL,
  `produk_desc` text NOT NULL,
  `id_kategori` varchar(20) NOT NULL,
  `id_brand` varchar(11) NOT NULL,
  `produk_qty` int(11) NOT NULL,
  `image` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Id_produk`, `nama_produk`, `harga_produk`, `size_produk`, `produk_desc`, `id_kategori`, `id_brand`, `produk_qty`, `image`) VALUES
(1, 'intel core i5', 2000000, 0, '', 'processor', '', 20, 'intel-core-i5.png'),
(2, 'intel core i3', 150000, 0, '-', 'processor', 'intel', 20, 'intel-core-i5.png');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_list`
--

CREATE TABLE `shipment_list` (
  `Id_shipment` int(11) NOT NULL,
  `shipment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(150) NOT NULL,
  `akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `akses`) VALUES
('admin', 'fcea920f7412b5da7be0cf42b8c93759', 1),
('amikom11', '25f9e794323b453885f5181f1b624d0b', 0),
('dedi123', '4297f44b13955235245b2497399d7a93', 1),
('MHS0001', 'fcea920f7412b5da7be0cf42b8c93759', 0),
('user', '6eea9b7ef19179a06954edd0f6c05ceb', 0);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`Id_order_status`);

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
-- Indexes for table `shipment_list`
--
ALTER TABLE `shipment_list`
  ADD PRIMARY KEY (`Id_shipment`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Id_cus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `Id_order_status` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_list`
--
ALTER TABLE `payment_list`
  MODIFY `Id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `Id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shipment_list`
--
ALTER TABLE `shipment_list`
  MODIFY `Id_shipment` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
