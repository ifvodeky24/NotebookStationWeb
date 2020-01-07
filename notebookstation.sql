-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 02:43 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pesanan`
--

CREATE TABLE `tb_detail_pesanan` (
  `id_detail_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pesanan`
--

INSERT INTO `tb_detail_pesanan` (`id_detail_pesanan`, `id_pesanan`, `id_produk`, `jumlah`, `total_tagihan`, `createdAt`, `updatedAt`) VALUES
(25, 28, 16, 3, 13902000, '2019-12-15 17:01:18', '2019-12-15 17:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `restore_id` varchar(300) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konsumen`
--

INSERT INTO `tb_konsumen` (`id_konsumen`, `username`, `nama_lengkap`, `email`, `password`, `nomor_hp`, `alamat`, `restore_id`, `foto`, `createdAt`, `updatedAt`) VALUES
(4, 'nopri_aja', 'Nopri Wahyudi Tes', 'nopri1@gmail.com', '123456', '2147483647', 'Jalan Kubang', '1232dsf323', 'pemilik_20191203_215651.jpg', '2019-11-02 16:46:08', '2019-11-02 16:46:08'),
(11, 'ifvodeky', 'Ifvo Deky Wirawan', 'ifvodeky.w24@gmail.com', '123456', '082383396914', 'Jalan Kubang', '190ec896-006a-4539-b79c-e08148df4ec7', 'pemilik_20191203_215651.jpg', '2019-12-01 21:44:39', '2019-12-01 21:44:39');

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

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_konsumen` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu Pembayaran','Menunggu Konfirmasi','Pesanan Diproses','Sedang Dikirim','Sampai Tujuan','Selesai','Batal') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_konsumen`, `tanggal_pesanan`, `status`, `createdAt`, `updatedAt`) VALUES
(28, 11, '2019-12-15 10:01:18', 'Menunggu Pembayaran', '2019-12-15 17:01:18', '2019-12-15 17:01:18');

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
(1, 'rido_randika', 'Rido randika Putra', '123456', '1995', '11987adf', 'ridorandika25@gmail.com', 'Admin', 'Jl.Kubang', '085374489932', 'Admin', 'tes.jpg', 'Skin Tech', '', '2019-11-02 16:47:28', '2019-11-02 16:47:28'),
(4, 'Arif', 'Arif Galau', '123456', 'dmfkdsjsj', 'dfkdfjf', 'arif.galau@gmail.com', 'Admin', 'Jl.Cinta Betepuk Sebelah Tangan', '085374489909', 'Pimpinan', 'images.jpg', 'Skin Tech', 'asus_store.jpeg', '2019-11-02 16:47:28', '2019-11-02 16:47:28');

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
(73, 4, 1, '2019-12-07 23:58:38', '2019-12-07 23:58:38'),
(74, 4, 20, '2019-12-08 23:02:19', '2019-12-08 23:02:19'),
(82, 11, 1, '2019-12-16 08:23:35', '2019-12-16 08:23:35');

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
  MODIFY `id_detail_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_detail_pesanan`
--
ALTER TABLE `tb_detail_pesanan`
  MODIFY `id_detail_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
