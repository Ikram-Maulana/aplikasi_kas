-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2021 at 03:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_1930511075`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_transaksi`, `keterangan`, `tgl_transaksi`) VALUES
(25, '13012021-6105', 'Kemahasiswaan', '2021-01-13 00:00:00'),
(26, '13012021-5238', 'Pembelian Banner', '2021-01-13 00:00:00'),
(27, '14012021-6600', 'Uang Kas', '2021-01-14 00:00:00'),
(29, '17012021-1025', 'Uang Saku Ikram', '2021-01-17 00:00:00'),
(30, '17012021-3998', 'Sewa Kamera', '2021-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id` int(11) NOT NULL,
  `id_jurnal` varchar(255) DEFAULT NULL,
  `kredit` int(255) DEFAULT NULL,
  `debit` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jurnal_detail`
--

INSERT INTO `jurnal_detail` (`id`, `id_jurnal`, `kredit`, `debit`) VALUES
(1, '25', 0, 300000),
(2, '26', 50000, 0),
(3, '27', 0, 30000),
(5, '29', 0, 20000),
(6, '30', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas`
--

CREATE TABLE `tbl_kas` (
  `id_transaksi` varchar(255) DEFAULT NULL,
  `tipe_kas` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal` int(255) DEFAULT NULL,
  `tgl_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kas`
--

INSERT INTO `tbl_kas` (`id_transaksi`, `tipe_kas`, `keterangan`, `nominal`, `tgl_transaksi`) VALUES
('13012021-6105', 'masuk', 'Kemahasiswaan', 300000, '2021-01-13 00:00:00'),
('13012021-5238', 'keluar', 'Pembelian Banner', 50000, '2021-01-13 00:00:00'),
('14012021-6600', 'masuk', 'Uang Kas', 30000, '2021-01-14 00:00:00'),
('17012021-1025', 'masuk', 'Uang Saku Ikram', 20000, '2021-01-17 00:00:00'),
('17012021-3998', 'keluar', 'Sewa Kamera', 50000, '2021-01-17 00:00:00');

--
-- Triggers `tbl_kas`
--
DELIMITER $$
CREATE TRIGGER `after_kas_insert` AFTER INSERT ON `tbl_kas` FOR EACH ROW BEGIN
	DECLARE id_jurnal INT;
         INSERT INTO jurnal(id_transaksi, keterangan,tgl_transaksi)
        VALUES(NEW.id_transaksi,NEW.keterangan,NEW.tgl_transaksi);
				

    select id INTO id_jurnal
    from jurnal where id_transaksi=NEW.id_transaksi;
		
    IF NEW.tipe_kas = 'keluar' THEN
		 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,NEW.nominal,0);
				ELSE
				 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,0,NEW.nominal);
		END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kaskeluar`
--

CREATE TABLE `tbl_kaskeluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `nama_transaksi` varchar(255) DEFAULT NULL,
  `nominal` double(255,0) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `date_trx` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kaskeluar`
--

INSERT INTO `tbl_kaskeluar` (`id`, `id_transaksi`, `nama_transaksi`, `nominal`, `jenis`, `date_trx`) VALUES
(1, '13012021-5238', 'Pembelian Banner', 50000, 'kas keluar', '2021-01-13 00:00:00'),
(3, '17012021-3998', 'Sewa Kamera', 50000, 'kas keluar', '2021-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasmasuk`
--

CREATE TABLE `tbl_kasmasuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(255) DEFAULT NULL,
  `nama_transaksi` varchar(255) DEFAULT NULL,
  `nominal` double(255,0) DEFAULT NULL,
  `jenis` varchar(255) DEFAULT NULL,
  `id_anggota` varchar(255) DEFAULT NULL,
  `date_trx` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kasmasuk`
--

INSERT INTO `tbl_kasmasuk` (`id`, `id_transaksi`, `nama_transaksi`, `nominal`, `jenis`, `id_anggota`, `date_trx`) VALUES
(1, '13012021-6105', 'Kemahasiswaan', 300000, 'kas masuk', '1', '2021-01-13 00:00:00'),
(2, '14012021-6600', 'Uang Kas', 30000, 'kas masuk', '2', '2021-01-14 00:00:00'),
(3, '17012021-1025', 'Uang Saku Ikram', 20000, 'kas masuk', '3', '2021-01-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sumber`
--

CREATE TABLE `tbl_sumber` (
  `id` int(11) NOT NULL,
  `sumber` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sumber`
--

INSERT INTO `tbl_sumber` (`id`, `sumber`) VALUES
(1, 'Kemahasiswaan'),
(2, 'Uang Kas'),
(3, 'Uang Saku Ikram');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `phone`, `birthday`, `address`) VALUES
(1, 'Ikram Maulana', 'ikram075@ummi.ac.id', 'IMG_20191201_171417_5305.jpg', '$2y$10$pkty35BiGd9UtjJk3eYxeuRCblQE4MNSDR7bJjgvgQwWoPc416XnG', 1, 1, 1609256295, '085156590021', '2000-08-20', 'Jl. Brawijaya 1 No.30'),
(7, 'Zahran Daak Janidri', 'ikram_maulana@onedrive.web.id', 'IMG_20191201_171417_5306.jpg', '$2y$10$7tY9xHZTCwJKr1FZohXU2OjwQRseVDAwbq3nZpzU8PX3WFIosYd6W', 2, 1, 1609844270, '081906055080', '01/05/2021', 'Jl. Brawijaya 1 No.30');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(7, 1, 5),
(8, 1, 4),
(9, 2, 3),
(10, 2, 6),
(45, 1, 6),
(91, 1, 2),
(104, 10, 6),
(105, 10, 3),
(107, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Applications'),
(3, 'Laporan'),
(4, 'Akun'),
(5, 'Menu'),
(6, 'User'),
(50, 'ss9'),
(51, 'data10'),
(52, 'data11'),
(53, 'datadata'),
(81, 'Linux Mint'),
(82, 'Ikram');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(7, 2, 'Sumber Dana', 'admin/sumberdana', 'fas fa-building', 1),
(8, 2, 'Dana Masuk', 'admin/danamasuk', 'fas fa-donate', 1),
(9, 2, 'Dana Keluar', 'admin/danakeluar', 'fas fa-shopping-bag', 1),
(12, 3, 'Laporan Rekapitulasi', 'laporan/index', 'fas fa-file-alt', 1),
(13, 4, 'Daftar Akun', 'admin/akun', 'fas fa-list', 1),
(14, 6, 'My Profile', 'user/index', 'fas fa-user', 1),
(15, 6, 'Edit Account', 'user/edit', 'fas fa-user-cog', 1),
(16, 5, 'Menu Management', 'menu/index', 'fas fa-folder', 1),
(17, 5, 'Submenu Management', 'menu/submenu', 'fas fa-folder-open', 1),
(22, 5, 'Role', 'admin/role', 'fas fa-user-secret', 1),
(28, 1, 'Dashboard', 'admin/index', 'fas fa-fire', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(125) NOT NULL,
  `token` varchar(125) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(14, 'farikhfadhil123@gmail.com', 'il7HwHwTntIvu3tYjgmbVYERfIawn0egQH4SUNCe558=', 1610011258);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kaskeluar`
--
ALTER TABLE `tbl_kaskeluar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kasmasuk`
--
ALTER TABLE `tbl_kasmasuk`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_sumber`
--
ALTER TABLE `tbl_sumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kaskeluar`
--
ALTER TABLE `tbl_kaskeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kasmasuk`
--
ALTER TABLE `tbl_kasmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sumber`
--
ALTER TABLE `tbl_sumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
