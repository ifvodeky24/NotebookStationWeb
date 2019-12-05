-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 03:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notebookstation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_keranjang`
--

CREATE TABLE `tb_detail_keranjang` (
  `id_detail_keranjang` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_keranjang`
--

INSERT INTO `tb_detail_keranjang` (`id_detail_keranjang`, `id_keranjang`, `id_produk`, `jumlah`, `createdAt`, `updatedAt`) VALUES
(2, 14, 2, 3443545, '2019-11-03 17:07:37', '2019-11-03 17:07:37'),
(3, 15, 3, 5656868, '2019-11-04 11:02:50', '2019-11-04 11:02:50'),
(4, 16, 2, 12, '2019-11-27 17:14:42', '2019-11-27 17:14:42'),
(6, 18, 1, 1, '2019-11-28 12:16:26', '2019-11-28 12:16:26'),
(7, 22, 1, 1, '2019-11-28 13:10:00', '2019-11-28 13:10:00'),
(8, 23, 1, 1, '2019-11-28 13:11:46', '2019-11-28 13:11:46'),
(11, 26, 18, 1, '2019-11-28 20:27:24', '2019-11-28 20:27:24'),
(12, 27, 15, 1, '2019-11-28 20:31:44', '2019-11-28 20:31:44'),
(13, 28, 20, 1, '2019-11-28 20:45:53', '2019-11-28 20:45:53'),
(15, 30, 1, 1, '2019-11-28 21:18:06', '2019-11-28 21:18:06'),
(19, 34, 2, 1, '2019-12-03 11:11:34', '2019-12-03 11:11:34'),
(21, 36, 1, 1, '2019-12-04 13:54:23', '2019-12-04 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pesanan`
--

CREATE TABLE `tb_detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pesanan`
--

INSERT INTO `tb_detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah`, `createdAt`, `updatedAt`) VALUES
(3, 4, 14, 12, '2019-12-05 12:09:45', '2019-12-05 12:09:45'),
(4, 5, 2, 12, '2019-12-05 12:27:05', '2019-12-05 12:27:05'),
(5, 5, 19, 12, '2019-12-05 12:28:21', '2019-12-05 12:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_konsumen`, `status`, `createdAt`, `updatedAt`) VALUES
(14, 6, 'Tersedia', '2019-11-03 17:07:36', '2019-11-03 17:07:36'),
(15, 4, 'Tersedia', '2019-11-04 11:02:50', '2019-11-04 11:02:50'),
(16, 4, 'Tidak Tersedia', '2019-11-27 17:14:42', '2019-11-27 17:14:42'),
(17, 6, 'Tersedia', '2019-11-28 11:57:07', '2019-11-28 11:57:07'),
(18, 6, 'Tersedia', '2019-11-28 12:11:22', '2019-11-28 12:11:22'),
(19, 6, 'Tersedia', '2019-11-28 12:15:42', '2019-11-28 12:15:42'),
(20, 6, 'Tersedia', '2019-11-28 12:16:26', '2019-11-28 12:16:26'),
(21, 6, 'Tersedia', '2019-11-28 13:03:28', '2019-11-28 13:03:28'),
(22, 6, 'Tersedia', '2019-11-28 13:10:00', '2019-11-28 13:10:00'),
(23, 6, 'Tersedia', '2019-11-28 13:11:46', '2019-11-28 13:11:46'),
(26, 4, 'Tersedia', '2019-11-28 20:27:24', '2019-11-28 20:27:24'),
(27, 4, 'Tersedia', '2019-11-28 20:31:43', '2019-11-28 20:31:43'),
(28, 4, 'Tersedia', '2019-11-28 20:45:53', '2019-11-28 20:45:53'),
(30, 4, 'Tersedia', '2019-11-28 21:18:05', '2019-11-28 21:18:05'),
(34, 11, 'Tersedia', '2019-12-03 11:11:34', '2019-12-03 11:11:34'),
(36, 11, 'Tersedia', '2019-12-04 13:54:23', '2019-12-04 13:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_konsumen`
--

CREATE TABLE `tb_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_hp` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `username`, `nama_lengkap`, `email`, `password`, `nomor_hp`, `alamat`, `foto`, `createdAt`, `updatedAt`) VALUES
(4, 'nopri_aja', 'Nopri Wahyudi', 'nopri@gmail.com', '123456', '2147483647', 'Jalan Kubang', 'omom.jpg', '2019-11-02 16:46:08', '2019-11-02 16:46:08'),
(6, 'nopri', 'Nopri Wahyudi', 'nopri@gmail.com', '123456', '2147483647', 'Jalan Kubang', 'IMG_20161005_103222.jpg', '2019-11-02 16:46:08', '2019-11-02 16:46:08'),
(11, 'ifvodeky', 'Ifvo Deky Wirawan', 'ifvodeky.w24@gmail.com', '123456', '082383396914', 'Jalan Kubang', 'pemilik_20191203_215651.jpg', '2019-12-01 21:44:39', '2019-12-01 21:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `jumlah_transfer` int(11) NOT NULL,
  `status` enum('Belum Lunas','Lunas') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pesanan`, `bukti_transfer`, `jumlah_transfer`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 5, 'hai.jpg', 456768, 'Belum Lunas', '2019-11-04 11:30:37', '2019-11-04 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu Konfirmasi','Menunggu Pembayaran','Sedang Dikirim','Sampai Tujuan','Selesai','Batal','Pesanan Diproses') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_konsumen`, `tanggal_pesanan`, `status`, `createdAt`, `updatedAt`) VALUES
(4, 4, '2019-11-02 10:54:46', 'Sedang Dikirim', '2019-11-02 16:46:43', '2019-11-02 16:46:43'),
(5, 11, '2019-11-21 17:00:00', 'Menunggu Pembayaran', '2019-11-03 16:22:12', '2019-11-03 16:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `merk_produk` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `kondisi` enum('Baru','Bekas') NOT NULL,
  `stok` int(11) NOT NULL,
  `foto_1` varchar(50) NOT NULL,
  `foto_2` varchar(50) NOT NULL,
  `foto_3` varchar(50) NOT NULL,
  `foto_4` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `merk_produk`, `harga`, `deskripsi`, `kondisi`, `stok`, `foto_1`, `foto_2`, `foto_3`, `foto_4`, `id_user`, `createdAt`, `updatedAt`) VALUES
(1, 'ASUS E203M', 'ASUS ', 3990000, 'INTEL 4000, RAM 4GB, HDD 500 GB, WEBCAM', 'Baru', 10, '4.JPG', '5.JPG', '6.JPG', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(2, 'ASUS E402', 'ASUS', 490000, 'INTEL 4000, RAM 4GB, HDD 500 GB, WEBCAM, WIFI, BLUETOOTH, 11.6\", WIN 10', 'Baru', 20, '1.jpg', '2.jpg', '3.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(3, 'ACER A311', 'ACER', 3990000, 'INTEL 4000, RAM 4GB, HDD 500 GB, WEBCAM, WIFI, BLUETOOTH, 11.6\", WIN 10', 'Baru', 9, '31.jpg', '32.jpg', '33.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(4, 'ACER E476', 'ACER', 5890000, 'INTEL CORE I3,RAM 4GB, HDD 500 GB, WEBCAM, WIFI, BLUETOOTH, DVD-RW, WIN 10', 'Baru', 5, '41.jpg', '41.jpg', '42.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(14, 'ACER', 'Acer Aspire 3 A314-41 ', 3850000, ' AMD A4/ 4GB/ 500GB/ 14\"/ WIN10] #01 BLACK', 'Baru', 10, '11.jpg', '111.jpg', '11.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(15, 'Asus X441UA-GA312T ', 'ASUS', 5875000, '14 Inch/ i3-7020U/ 4GB RAM/ 1 TB/ DVD-RW/ Windows 10/ Non Touch', 'Baru', 10, '12.jpg', '122.jpg', '1222.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(16, 'Lenovo IP330-14AST Notebook ', 'Lenovo', 4629000, '14.0 HD/ AMD A9-9425/ Win10 Home/ Integrated/ 1TB/ 4GB/ NO SSD/ 2 Year Warranty', 'Baru', 10, '7.jpg', '77.jpg', '7.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(17, 'HP 14-CK0009TU/ 0010TU/ 0011TU/ 0013TU Notebook', 'HP', 3779000, 'WIN10/INT CEL N4000 1.10GHZ/4GB DDR4/1TB/NO ODD/14.0\"HD', 'Baru', 20, '8.jpg', '88.jpg', '888.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(18, 'Asus X441NA-BX001 ', 'ASUS', 5397500, 'OS : Endless Processor : N3350 Memori RAM : 2GB Kapasitas penyimpanan : 500 GB Layar : 14 Inch', 'Baru', 20, '9.JPG', '99.JPG', '9.JPG', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(19, 'Asus ROG4454', 'ASUS', 4000000, 'INTEL CORE I3, RAM 4 GB, HDD 500 GB, WEBCAM, WIFI, 14 BLUETOOTH, DVD-RW, WIN 10', 'Baru', 10, '100.jpg', '101.jpg', '102.jpg', '6.JPG', 1, '2019-11-02 16:47:05', '2019-11-02 16:47:05'),
(20, 'HP 430', 'HP', 3990000, 'INTEL CORE I3, RAM 4 GB, HDD 500 GB, WEBCAM, WIFI, 14 BLUETOOTH, DVD-RW, WIN 10', 'Baru', 10, '1.jpg', '2.jpg', '3.jpg', '6.JPG', 4, '2019-11-02 16:47:05', '2019-11-02 16:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authKey` varchar(50) NOT NULL,
  `accesToken` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nomor_hp` varchar(50) NOT NULL,
  `level` enum('Admin','Pimpinan') NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `logo_toko` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama_lengkap`, `password`, `authKey`, `accesToken`, `email`, `jabatan`, `alamat`, `nomor_hp`, `level`, `foto`, `nama_toko`, `logo_toko`, `createdAt`, `updatedAt`) VALUES
(1, 'rido_randika', 'Rido randika Putra', '123456', '1995', '11987adf', 'ridorandika25@gmail.com', 'Admin', 'Jl.Kubang', '085374489932', 'Admin', 'foto.jpg', 'flazz computer', 'logotoko1.jpg', '2019-11-02 16:47:28', '2019-11-02 16:47:28'),
(3, 'Eci', 'Eci Kartika', '123456', '2342', '12312', 'Eci Kartika@gmail.com', 'Admin', 'Jl.Cinta Betepuk Sebelah Tangan', '085374489909', 'Admin', 'C360_2016-11-23-13-48-28-507.jpg', 'friendly computer', 'logotoko2.png', '2019-11-02 16:47:28', '2019-11-02 16:47:28'),
(4, 'Arif', 'Arif Galau', '123456', 'dmfkdsjsj', 'dfkdfjf', 'arif.galau@gmail.com', 'Admin', 'Jl.Cinta Betepuk Sebelah Tangan', '085374489909', 'Admin', '9.JPG', 'flazz computer', 'logotoko2.png', '2019-11-02 16:47:28', '2019-11-02 16:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id_wishlist`, `id_konsumen`, `id_produk`, `createdAt`, `updatedAt`) VALUES
(6, 6, 14, '2019-11-02 16:47:53', '2019-11-02 16:47:53'),
(43, 6, 2, '2019-11-18 09:20:18', '2019-11-18 09:20:18'),
(53, 4, 1, '2019-11-28 21:21:03', '2019-11-28 21:21:03'),
(69, 11, 2, '2019-12-04 21:18:31', '2019-12-04 21:18:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_keranjang`
--
ALTER TABLE `tb_detail_keranjang`
  ADD PRIMARY KEY (`id_detail_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `tb_detail_keranjang_ibfk_1` (`id_keranjang`);

--
-- Indexes for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD PRIMARY KEY (`id_detail_pesanan`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_konsumen` (`id_konsumen`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_keranjang`
--
ALTER TABLE `tb_detail_keranjang`
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_konsumen`
--
ALTER TABLE `tb_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_keranjang`
--
ALTER TABLE `tb_detail_keranjang`
  ADD CONSTRAINT `tb_detail_keranjang_ibfk_1` FOREIGN KEY (`id_keranjang`) REFERENCES `tb_keranjang` (`id_keranjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_keranjang_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD CONSTRAINT `tb_keranjang_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `tb_konsumen` (`id_konsumen`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `tb_pesanan` (`id_pesanan`);

--
-- Constraints for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `tb_konsumen` (`id_konsumen`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `tb_wishlist_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `tb_konsumen` (`id_konsumen`),
  ADD CONSTRAINT `tb_wishlist_ibfk_2` FOREIGN KEY (`id_konsumen`) REFERENCES `tb_konsumen` (`id_konsumen`),
  ADD CONSTRAINT `tb_wishlist_ibfk_3` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
