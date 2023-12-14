-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 01:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'adminBarang', 'adminBarang001'),
(2, 'adminBarang2', 'adminBarang002'),
(3, 'adminKasir1', 'adminKasir001'),
(4, 'adminKasir2', 'adminKasir002');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `harga_total` double NOT NULL,
  `customer` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `date`, `harga_total`, `customer`, `metode_pembayaran`) VALUES
(1, '2023-05-20 13:47:32', 120000, 'Ahmad Jati', 'transfer BRI'),
(2, '2023-05-20 13:49:48', 360000, 'Qolbi Adi', 'cash'),
(3, '2023-05-20 13:51:15', 45000, 'Dian cantik ', 'e-wallet dana'),
(4, '2023-05-26 14:16:03', 240000, 'Fandi ', 'cash'),
(5, '2023-05-30 17:29:34', 150000, 'Prihan', 'transfer BRI'),
(6, '2023-06-04 11:38:48', 20000, 'Lina', 'cash'),
(7, '2023-12-14 18:14:00', 200000, 'Hana', 'BNI');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderDetail_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `harga_satuan` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderDetail_id`, `produk_id`, `order_id`, `admin_id`, `quantity`, `harga_satuan`, `sub_total`) VALUES
(1, 1, 1, 3, 1, 50000, 50000),
(2, 2, 1, 3, 1, 70000, 70000),
(3, 3, 2, 4, 3, 100000, 300000),
(4, 4, 2, 4, 1, 60000, 60000),
(5, 5, 3, 3, 1, 45000, 45000),
(7, 1, 4, 4, 2, 50000, 100000),
(8, 2, 4, 4, 2, 70000, 140000),
(9, 1, 5, 4, 3, 50000, 150000),
(10, 3, 6, 3, 2, 100000, 20000),
(11, 3, 7, 3, 2, 100000, 200000);

--
-- Triggers `order_detail`
--
DELIMITER $$
CREATE TRIGGER `update_stok_brg` AFTER INSERT ON `order_detail` FOR EACH ROW BEGIN
    -- Pernyataan SQL untuk menambahkan baris ke tabel tujuan
    INSERT INTO stok_brg (admin_id, produk_id, jmlh_pemasukan, jmlh_pengeluaran, keterangan, exp_date, harga_beli, date_update)
    VALUES (NEW.admin_id, 
            NEW.produk_id, 
           0, 
           NEW.quantity, 
           'Barang Terjual', 
           '000-00-00', 
           0, 
           LOCALTIME);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga_satuan` double NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `nama_produk`, `harga_satuan`, `stok`, `tgl_update`, `link_gambar`) VALUES
(1, 'robusta', 50000, 134, '2023-05-19 04:55:07', 'https://unsplash.com/photos/qqBnLkeBD-E'),
(2, 'arabica', 70000, 142, '2023-05-19 04:56:34', 'https://unsplash.com/photos/HgRfUhd0UaU'),
(3, 'liberica', 100000, 91, '2023-12-14 18:14:28', 'https://unsplash.com/photos/_QjXb8ZAte8'),
(4, 'excelsa', 60000, 38, '2023-05-19 04:58:15', 'https://unsplash.com/photos/WzYLVYx-4es'),
(5, 'decaf', 45000, 41, '2023-05-19 04:59:18', 'https://unsplash.com/photos/FD28Etf3zcE'),
(6, 'White Coffee', 35000, 0, '2023-06-04 16:45:44', 'https://unsplash.com/photos/Y3AqmbmtLQI');

-- --------------------------------------------------------

--
-- Table structure for table `stok_brg`
--

CREATE TABLE `stok_brg` (
  `stok_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jmlh_pemasukan` int(11) NOT NULL,
  `jmlh_pengeluaran` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `exp_date` date NOT NULL,
  `harga_beli` double NOT NULL,
  `date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_brg`
--

INSERT INTO `stok_brg` (`stok_id`, `admin_id`, `produk_id`, `jmlh_pemasukan`, `jmlh_pengeluaran`, `keterangan`, `exp_date`, `harga_beli`, `date_update`) VALUES
(1, 1, 1, 150, 0, 'Barang Masuk', '2024-05-01', 6750000, '2023-05-20 13:47:32'),
(2, 1, 2, 150, 0, 'Barang Masuk', '2024-05-01', 7500000, '2023-05-20 13:47:32'),
(3, 1, 3, 100, 0, 'Barang Masuk', '2024-09-06', 9500000, '2023-05-20 13:47:32'),
(4, 1, 4, 50, 0, 'Barang Masuk', '2024-09-06', 2500000, '2023-05-20 13:47:32'),
(5, 1, 5, 50, 0, 'Barang Masuk', '2024-12-14', 1500000, '2023-05-20 13:47:32'),
(6, 2, 1, 0, 10, 'Barang Rusak', '0000-00-00', 0, '2023-05-20 17:59:30'),
(7, 2, 2, 0, 3, 'Barang Rusak', '0000-00-00', 0, '2023-05-20 18:00:23'),
(8, 3, 1, 0, 1, 'Barang Terjual', '0000-00-00', 0, '2023-05-20 22:31:45'),
(9, 3, 2, 0, 1, 'Barang Terjual', '0000-00-00', 0, '2023-05-20 22:32:50'),
(10, 4, 3, 0, 3, 'Barang Terjual', '0000-00-00', 0, '2023-05-20 22:33:38'),
(11, 4, 4, 0, 1, 'Barang Terjual', '0000-00-00', 0, '2023-05-20 22:34:22'),
(12, 3, 5, 0, 1, 'Barang Terjual', '0000-00-00', 0, '2023-05-20 22:34:49'),
(13, 2, 4, 0, 11, 'Barang Rusak', '0000-00-00', 0, '2023-05-20 17:57:48'),
(14, 2, 3, 0, 2, 'Barang Rusak', '0000-00-00', 0, '2023-05-20 18:01:07'),
(15, 2, 5, 0, 8, 'Barang Rusak', '0000-00-00', 0, '2023-05-20 18:01:34'),
(16, 4, 1, 0, 2, 'Barang Terjual', '0000-00-00', 0, '2023-05-26 19:19:12'),
(17, 4, 2, 0, 2, 'Barang Terjual', '0000-00-00', 0, '2023-05-26 19:19:44'),
(19, 4, 1, 0, 3, 'Barang Terjual', '0000-00-00', 0, '2023-05-30 22:31:03'),
(20, 3, 3, 0, 2, 'Barang Terjual', '0000-00-00', 0, '2023-06-04 16:39:36'),
(21, 3, 3, 0, 2, 'Barang Terjual', '0000-00-00', 0, '2023-12-14 18:14:28');

--
-- Triggers `stok_brg`
--
DELIMITER $$
CREATE TRIGGER `update_produk` AFTER INSERT ON `stok_brg` FOR EACH ROW BEGIN
  -- Pernyataan SQL untuk mengupdate stok barang yang baru diorder
  UPDATE produk
  SET stok = (SELECT SUM(jmlh_pemasukan) - SUM(jmlh_pengeluaran) FROM stok_brg WHERE produk_id = NEW.produk_id)
  WHERE produk.produk_id = NEW.produk_id;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderDetail_id`),
  ADD UNIQUE KEY `produk_id` (`produk_id`,`order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `harga_satuan` (`harga_satuan`),
  ADD KEY `order_detail_ibfk_3` (`admin_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `harga_satuan` (`harga_satuan`);

--
-- Indexes for table `stok_brg`
--
ALTER TABLE `stok_brg`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `stok_brg_ibfk_2` (`produk_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok_brg`
--
ALTER TABLE `stok_brg`
  MODIFY `stok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `stok_brg`
--
ALTER TABLE `stok_brg`
  ADD CONSTRAINT `fk_stok_brg_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_brg_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
