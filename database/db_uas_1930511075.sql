-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 13, 2021 at 04:12 AM
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
(3, '06012021-103', 'Pembelian', '2021-01-06 00:00:00'),
(4, '06012021-2625', 'kas masuk', '2021-01-06 00:00:00'),
(12, '08012021-4001', 'Uang Saku Ikram', '2021-01-08 00:00:00'),
(14, '08012021-4175', 'Uang Saku Ikram', '2021-01-09 00:00:00'),
(17, '08012021-4520', 'Ikram', '2021-01-08 00:00:00'),
(18, '09012021-6772', 'Kemahasiswaan', '2021-01-09 00:00:00'),
(19, '09012021-2029', 'Uang Kas', '2021-01-09 00:00:00'),
(20, '09012021-2578', 'Ikram', '2021-01-09 00:00:00'),
(21, '09012021-4634', 'Kemahasiswaan', '2021-01-09 00:00:00'),
(22, '09012021-6822', 'Uang Saku Ikram', '2021-01-09 00:00:00'),
(23, '09012021-6245', 'gadgetin', '2021-01-09 00:00:00'),
(24, '09012021-4695', 'sponsor', '2021-01-09 00:00:00');

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
(3, '3', 0, 7000),
(4, '4', 0, 2000),
(12, '12', 0, 1000),
(14, '14', 0, 10000),
(17, '17', 0, 1000),
(18, '18', 0, 10000),
(19, '19', 0, 20000),
(20, '20', 0, 6000),
(21, '21', 0, 10000),
(22, '22', 0, 20000),
(23, '23', 0, 10000),
(24, '24', 0, 10000);

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
('06012021-103', 'masuk', 'Pembelian', 7000, '2021-01-06 00:00:00'),
('06012021-2625', 'masuk', 'Donasi A/n ww', 2000, '2021-01-06 00:00:00'),
('08012021-4001', 'masuk', 'Uang Saku Ikram', 1000, '2021-01-08 00:00:00'),
('08012021-4175', 'masuk', 'Uang Saku Ikram', 10000, '2021-01-09 00:00:00'),
('08012021-4520', 'masuk', 'Ikram', 1000, '2021-01-08 00:00:00'),
('09012021-6772', 'masuk', 'Kemahasiswaan', 10000, '2021-01-09 00:00:00'),
('09012021-2029', 'masuk', 'Uang Kas', 20000, '2021-01-09 00:00:00'),
('09012021-2578', 'masuk', 'Ikram', 6000, '2021-01-09 00:00:00'),
('09012021-4634', 'masuk', 'Kemahasiswaan', 10000, '2021-01-09 00:00:00'),
('09012021-6822', 'masuk', 'Uang Saku Ikram', 20000, '2021-01-09 00:00:00'),
('09012021-6245', 'masuk', 'gadgetin', 10000, '2021-01-09 00:00:00'),
('09012021-4695', 'masuk', 'sponsor', 10000, '2021-01-09 00:00:00');

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
  `id_anggota` varchar(255) DEFAULT NULL,
  `date_trx` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_kaskeluar`
--

INSERT INTO `tbl_kaskeluar` (`id`, `id_transaksi`, `nama_transaksi`, `nominal`, `jenis`, `id_anggota`, `date_trx`) VALUES
(2, '06012021-2625', 'Donasi A/n ww', 2000, 'kas masuk', '1', '2021-01-06 00:00:00');

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
(2, '06012021-2625', 'Kemahasiswaan', 2000, 'kas masuk', '1', '2021-01-06 00:00:00'),
(10, '08012021-4001', 'Uang Saku Ikram', 1000, 'kas masuk', '11', '2021-01-08 00:00:00'),
(12, '08012021-4175', 'Uang Saku Ikram', 10000, 'kas masuk', '11', '2021-01-09 00:00:00'),
(15, '08012021-4520', 'Ikram', 1000, 'kas masuk', '4', '2021-01-08 00:00:00'),
(16, '09012021-6772', 'Kemahasiswaan', 10000, 'kas masuk', '2', '2021-01-09 00:00:00'),
(17, '09012021-2029', 'Uang Kas', 20000, 'kas masuk', '3', '2021-01-09 00:00:00'),
(18, '09012021-2578', 'Ikram', 6000, 'kas masuk', '4', '2021-01-09 00:00:00'),
(19, '09012021-4634', 'Kemahasiswaan', 10000, 'kas masuk', '2', '2021-01-09 00:00:00'),
(20, '09012021-6822', 'Uang Saku Ikram', 20000, 'kas masuk', '11', '2021-01-09 00:00:00'),
(21, '09012021-6245', 'gadgetin', 10000, 'kas masuk', '12', '2021-01-09 00:00:00'),
(22, '09012021-4695', 'sponsor', 10000, 'kas masuk', '13', '2021-01-09 00:00:00');

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
(2, 'Kemahasiswaan'),
(3, 'Uang Kas'),
(4, 'Ikram'),
(5, 'sss'),
(6, 'ssss'),
(7, 'sssss'),
(8, 'testo'),
(9, 'testi'),
(10, 'ites'),
(11, 'Uang Saku Ikram'),
(12, 'gadgetin'),
(13, 'sponsor');

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
(1, 'Ikram Maulana', 'ikram075@ummi.ac.id', 'IMG_20191201_171417_5305.jpg', '$2y$10$mu.NkJxaPOMcwBeFOpNffeO8/p/RSMb5blxlVajiogR7VALQBVxKq', 1, 1, 1609256295, '085156590021', '12/29/2020', 'Jl. Brawijaya 1 No.30'),
(7, 'Zahran Daak Janidri', 'ikram_maulana@onedrive.web.id', 'IMG_20191201_171417_5306.jpg', '$2y$10$/tgmluNHP8TsxJpco7z9h.MjhEc7V6Gglu6JVAXuS9/P4wQ.G64ra', 2, 1, 1609844270, '081906055080', '01/05/2021', 'Jl. Brawijaya 1 No.30'),
(8, 'farikh', 'farikhfadhil123@gmail.com', 'default.jpg', '$2y$10$qKBoy/PcomTH8gKTNVE42.6/WG6xGHlsOqOBZvlAWPQXY74KKnsi.', 2, 0, 1610011258, '081906055080', '01/07/2021', 'hjghjh');

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
(73, 1, 3),
(91, 1, 2),
(104, 10, 6),
(105, 10, 3);

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
(54, 'hackintosh');

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
(7, 2, 'Sumber Dana', 'admin/sumberdana', 'icon ni ni-tranx', 1),
(8, 2, 'Dana Masuk', 'admin/danamasuk', 'icon ni ni-wallet-in', 1),
(9, 2, 'Dana Keluar', 'admin/keluar', 'icon ni ni-wallet-out', 1),
(11, 2, 'SPP (Optional)', 'admin/spp', 'icon ni ni-grid-alt', 1),
(12, 3, 'Laporan Rekapitulasi', 'laporan', 'icon ni ni-file-docs', 1),
(13, 4, 'Daftar Akun', 'admin/akun', 'icon ni ni-user-list', 1),
(14, 6, 'My Profile', 'user/index', 'icon ni ni-user', 1),
(15, 6, 'Edit Account', 'user/edit', 'icon ni ni-account-setting', 1),
(16, 5, 'Menu Management', 'menu/index', 'icon ni ni-folder', 1),
(17, 5, 'Submenu Management', 'menu/submenu', 'icon ni ni-folder-list', 1),
(22, 5, 'Role', 'admin/role', 'icon ni ni-users', 1),
(28, 1, 'Dashboard', 'admin/index', 'icon ni ni-coins', 1);

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
(12, 'ikram_maulana@onedrive.web.id', 'TV9gHhT5FQvdtYSnro/VCGMb7vhrvO0T3flQyxR9pYc=', 1609843075),
(13, 'ikram_maulana@onedrive.web.id', 'qLjzNrYg8Ns4d5El9ONWc0CW82AC9eSE5gZOh6fvLo0=', 1609844270),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_kaskeluar`
--
ALTER TABLE `tbl_kaskeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kasmasuk`
--
ALTER TABLE `tbl_kasmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_sumber`
--
ALTER TABLE `tbl_sumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
