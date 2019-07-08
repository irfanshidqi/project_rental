-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2019 pada 05.25
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `level` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `nama_admin`, `email`, `no_hp`, `level`, `password`, `reset`) VALUES
(1, 'admin2', 'irfan', 'triplets.cv@gmail.com', '0852747247', 2, '$2y$10$dEo885oSE15jL0Rx0yqCF.yZCMhQXv9l8zFyXqcxvtjcbNfDDtjWS', ''),
(2, 'admin4', 'irfan shidqi laksono', 'guramin01@gmail.com', '082731723', 2, '$2y$10$NxuWcTEHChXBbeuaT9wDjeFACYyyRjRBU1rWssgycxdDA7izmSLXO', ''),
(3, 'admin', 'ini', 'yusrilfahmi09@gmail.com', '0812312424', 1, '$2y$10$dEo885oSE15jL0Rx0yqCF.yZCMhQXv9l8zFyXqcxvtjcbNfDDtjWS', 'da7ac1e743618de26b089228fcf0b46e'),
(4, 'admin3', 'ini', 'halo@galo.com', '027428428', 2, '$2y$10$PPSyof2/n3Xi0o02toNrT.tWW1MTBO9CS9HaO3wveyMCB7zju5qE2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_rekening` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`id_bank`, `nama_bank`, `no_rekening`, `nama_pemilik`, `created`, `last_update`) VALUES
(12, 'BRI', '28891273987', 'muahmmad', '2019-05-08 00:00:00', '2019-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(11) NOT NULL,
  `tipe_denda` varchar(100) NOT NULL,
  `total_denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_denda`
--

INSERT INTO `tb_denda` (`id_denda`, `tipe_denda`, `total_denda`) VALUES
(1, 'Telat_hari', '200000'),
(2, 'Cacat', '1000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merek_mobil`
--

CREATE TABLE `tb_merek_mobil` (
  `id_merek` int(3) NOT NULL,
  `nama_merek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_merek_mobil`
--

INSERT INTO `tb_merek_mobil` (`id_merek`, `nama_merek`) VALUES
(1, 'BMW'),
(2, 'Chevrolet'),
(3, 'Daihatsu'),
(4, 'Datsun'),
(5, 'Ducati'),
(6, 'Ferrari'),
(7, 'Ford'),
(8, 'Hearly Davidson'),
(9, 'Honda'),
(10, 'Hyundai'),
(11, 'Isuzu'),
(12, 'Jeep'),
(16, 'Lambhorgini'),
(17, 'Lexus'),
(18, 'Mazda'),
(19, 'Mercedes Benz'),
(20, 'Mitsubishi'),
(21, 'Nissan'),
(24, 'Suzuki'),
(25, 'Toyota'),
(26, 'Daihatsu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_merek` int(3) NOT NULL,
  `nama_mobil` varchar(225) DEFAULT NULL,
  `deskripsi_mobil` text,
  `tahun_mobil` varchar(4) DEFAULT NULL,
  `kapasitas_mobil` int(2) DEFAULT NULL,
  `harga_sewa` decimal(10,0) DEFAULT NULL,
  `warna_mobil` varchar(50) DEFAULT NULL,
  `transmisi_mobil` int(2) DEFAULT NULL,
  `plat_mobil` varchar(25) DEFAULT NULL,
  `status_sewa` int(2) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  `status_mobil` int(2) DEFAULT NULL,
  `ditambahkan` datetime DEFAULT NULL,
  `fasilitas_mobil` int(2) NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `id_merek`, `nama_mobil`, `deskripsi_mobil`, `tahun_mobil`, `kapasitas_mobil`, `harga_sewa`, `warna_mobil`, `transmisi_mobil`, `plat_mobil`, `status_sewa`, `gambar`, `status_mobil`, `ditambahkan`, `fasilitas_mobil`, `last_update`) VALUES
(41, 1, 'Ninja ', 'weeeeeeeeeeeeeeeeeee', '2013', 2, '290000', ' Hitam', 1, ' H2015 2', 2, 'gambar2019_05_29_14_13_53.jpg', 1, '2019-05-28 23:32:10', 1, '2019-05-29 19:13:53'),
(43, 4, 'Alya', 'odododod', '2015', 8, '500000', 'Hitam', 1, 'H42312', 2, 'wwwewewe.jpg', 2, '2019-06-29 00:00:00', 2, '2019-06-30 00:00:00'),
(44, 1, 'CORTEZ', 'eqweweweqweqweqwew4tw3te4t', '2018', 5, '60000', ' Hitam', 1, ' H2015 2', 1, 'gambar2019_06_20_05_25_501.jpg', 1, '2019-06-20 10:25:50', 1, '0000-00-00 00:00:00'),
(45, 4, '   F1 formula wr', 'ydytdtrdtrdtdtdtrdtrdtrdtrdtdtr', '2013', 4, '2', ' Hitam', 1, ' 4hygygy', 1, 'gambar2019_07_03_08_55_331.jpg', 1, '2019-07-03 13:55:33', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supir`
--

CREATE TABLE `tb_supir` (
  `id_supir` int(11) NOT NULL,
  `nama_supir` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `status_supir` varchar(2) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `umur` int(3) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supir`
--

INSERT INTO `tb_supir` (`id_supir`, `nama_supir`, `nik`, `no_ktp`, `no_hp`, `status_supir`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `umur`, `foto`, `created`, `last_update`) VALUES
(1, 'wadidaw', '3529253959359', '35933054049629329', '0864035945', '2', '1', 'JL delima putin no 8 jalan yg sangan toantnag', '2019-05-31', 21, 'foto2019_05_28_09_33_33.png', '2019-05-15 00:00:00', '2019-05-28 14:33:39'),
(2, 'avicenna maulai', '3259011102010006', '12553523522352', '0854543534', '2', '1', 'New South Wales,NSW', '2019-05-07', 25, 'foto2019_05_19_08_53_211.jpg', '2019-05-19 13:53:21', '0000-00-00 00:00:00'),
(3, 'Athok Fajariano', '325901110201000625', '35205938358', '06524241424', '1', '1', 'New South Wales,NSW', '2019-05-14', 23, 'foto2019_07_04_18_17_33.jpg', '2019-05-21 10:23:12', '2019-07-04 23:17:33'),
(4, 'Irfan shidiq', '352482912939', '324591252389', '08133063065', '1', '2', 'New South Wales,NSWwrwrw', '2019-05-09', 12, 'foto2019_05_28_06_37_43.png', '2019-05-23 10:43:13', '2019-05-28 11:37:43'),
(5, 'bagus', '123123123', '123123123', '123123', '1', '1', 'qweqweqweqweqw', '2019-06-26', 21, 'qweqweqwe.jpg', '2019-06-28 00:00:00', '2019-06-19 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `id_merek` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_supir` int(5) NOT NULL,
  `status_transaksi` int(2) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(120) NOT NULL,
  `tujuan` varchar(1200) NOT NULL,
  `tgl_order` date NOT NULL,
  `waktu_order` time NOT NULL,
  `tgl_akhir` date NOT NULL,
  `lama_peminjaman` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `id_bank` int(5) NOT NULL,
  `id_admin` int(2) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `created_inv` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_mobil`, `id_merek`, `id_user`, `id_supir`, `status_transaksi`, `nama`, `no_hp`, `email`, `tujuan`, `tgl_order`, `waktu_order`, `tgl_akhir`, `lama_peminjaman`, `harga`, `total_harga`, `denda`, `bukti_pembayaran`, `id_bank`, `id_admin`, `tgl_kembali`, `created_inv`) VALUES
('TR19061000004', 41, 1, 0, 0, 9, 'Irfan Shdiqi', '08133063065', 'valve@gmail.com', 'Magelang', '2019-06-18', '11:22:00', '2019-06-21', 3, 290000, 870000, 0, '23213', 12, 2, '0000-00-00', '2019-06-10 20:35:14'),
('TR19061000006', 41, 1, 0, 0, 9, 'Irfan Shdiqi', '08133063065', 'guramin07@gmail.com', 'Magelang', '2019-06-25', '22:02:00', '2019-06-27', 2, 290000, 580000, 0, NULL, 12, 2, '0000-00-00', '2019-06-10 21:50:03'),
('TR19061300008', 41, 1, 0, 0, 9, 'Muhammad irfan Shidqi Laksono', '08133063065', 'guramin07@gmail.com', 'Magelang', '2019-06-10', '22:02:00', '2019-06-12', 2, 290000, 580000, 0, NULL, 12, 2, '0000-00-00', '2019-06-13 08:54:18'),
('TR19061300009', 41, 1, 0, 0, 9, 'Muhammad irfan Shidqi Laksono', '08133063065', 'sulthamilan02@gmail.com', 'Alexandria', '2019-06-10', '22:02:00', '2019-06-13', 3, 290000, 870000, 0, NULL, 12, 2, '0000-00-00', '2019-06-13 08:55:05'),
('TR19061300010', 41, 1, 0, 0, 9, 'Muhammad irfan Shidqi Laksono', '08133063065', 'sulthanmilan02@gmail.com', 'Alexandria', '2019-06-10', '22:02:00', '2019-06-14', 4, 290000, 1160000, 0, NULL, 12, 2, '0000-00-00', '2019-06-13 08:56:11'),
('TR19061400011', 41, 1, 0, 0, 9, 'Irfan Shdiqi', '08133063065', 'guramin01@gmail.com', 'Magelang', '2019-07-18', '22:22:00', '2019-06-22', 4, 290000, 1450000, 290000, 'bukti2019_06_14_10_03_551.png', 12, 2, '2019-06-23', '2019-06-14 15:03:37'),
('TR19062000012', 44, 1, 0, 0, 9, 'Muhammad irfan Shidqi Laksono', '08133063065', 'yusrilfahmi09@gmail.com', 'Magelang', '2019-07-04', '22:02:00', '2019-06-06', 2, 60000, 140000, 0, NULL, 12, 2, '0000-00-00', '2019-06-20 10:31:39'),
('TR19062000013', 44, 1, 2, 4, 5, 'Athok Fajariyanto', '08533063656', 'markipul05@gmail.com', 'Magelang', '2019-06-05', '22:02:00', '2019-06-07', 2, 60000, 120000, 0, NULL, 12, 2, '0000-00-00', '2019-06-20 17:41:35'),
('TR19062100014', 44, 1, 5, 2, 5, 'Muhammad irfan Shidqi Laksono', '253525345', 'guramin07@gmail.com', 'Magelang', '2019-06-20', '22:02:00', '2019-07-22', 2, 60000, 120000, 0, NULL, 12, 2, '0000-00-00', '2019-06-21 09:06:49'),
('TR19062100015', 44, 1, 5, 4, 5, 'Muhammad irfan Shidqi Laksono', '253525345', 'guramin07@gmail.com', 'Alexandria', '2019-07-22', '22:02:00', '2019-07-25', 3, 60000, 180000, 0, 'bukti2019_07_21_11_19_281.png', 12, 2, '2019-07-21', '2019-06-21 16:14:07'),
('TR19062900016', 44, 1, 2, 1, 5, 'Athok Fajariyanto', '08533063656', 'markipul05@gmail.com', 'Alexandria', '2019-06-28', '22:02:00', '2019-06-30', 2, 60000, 120000, 90000, 'bukti2019_06_29_10_45_461.png', 12, 2, '2019-06-29', '2019-06-29 15:45:21'),
('TR19070300017', 44, 1, 5, 4, 5, 'Muhammad irfan Shidqi Laksono', '253525345', 'guramin07@gmail.com', 'Alexandria', '2019-07-25', '22:02:00', '2019-07-27', 2, 60000, 120000, 0, 'bukti2019_07_03_09_08_041.jpg', 12, 2, '2019-07-03', '2019-07-03 14:07:37'),
('TR19070300018', 44, 1, 5, 5, 9, 'Muhammad irfan Shidqi Laksono', '253525345', 'guramin07@gmail.com', 'Alexandria', '2019-07-12', '22:02:00', '2019-07-15', 3, 60000, 180000, 0, NULL, 12, 2, '0000-00-00', '2019-07-03 14:10:53'),
('TR19070600019', 41, 1, 6, 4, 9, 'Athok', '0853305454', 'markipul01@gmail.com', 'Magelang', '2019-07-18', '22:02:00', '2019-07-22', 4, 290000, 1160000, 0, NULL, 12, 3, '0000-00-00', '2019-07-06 21:30:42'),
('TR19070700020', 41, 1, 2, 4, 9, 'Athok Fajariyanto', '08533063656', 'markipul05@gmail.com', 'Magelang', '2019-07-18', '22:02:00', '2019-07-20', 2, 290000, 580000, 0, NULL, 12, 3, '0000-00-00', '2019-07-07 11:51:40'),
('TR19070800021', 41, 1, 5, 1, 1, 'Muhammad irfan Shidqi Laksono', '253525345', 'guramin07@gmail.com', 'Alexandria', '2019-07-17', '22:02:00', '2019-07-22', 5, 290000, 1450000, 0, NULL, 12, 3, '0000-00-00', '2019-07-08 10:20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `reset` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nama`, `nik`, `email`, `no_hp`, `jenis_kelamin`, `alamat`, `password`, `status`, `created`, `last_login`, `last_update`, `reset`) VALUES
(2, 'guramin02', 'Athok Fajariyanto', '3529258353853858', 'markipul05@gmail.com', '08533063656', '2', 'JL.KAPTEN TESNA nO.11', '$2y$10$nt9pW0fJ9qJTqo5J0PoqwO/b9hnORrQMm1EzKJjibeBbnC1MI31AO', 1, '2019-05-15 21:41:45', '2019-05-23 06:04:34', '2019-05-18 14:48:55', ''),
(5, '  irfan', 'Muhammad irfan Shidqi Laksono', '3259011102010006', 'guramin07@gmail.com', '253525345', '1', 'New South Wales,NSWgyyggy', '$2y$10$ZNt07g8GtAAgUMhXpwGkyO4cKegcVIaqdZg8IV2199iGmLdYnVChy', 1, '2019-05-16 10:35:35', '2019-05-23 06:04:34', '2019-06-13 08:52:16', ''),
(6, 'guramin03', 'Athok', '352925822323', 'markipul01@gmail.com', '0853305454', 'P', 'JLP TESNA GNRnO.12EQ', '$2y$10$2A.UxSXqcKktV/s9HxcbZuLFCYpMg7Rtfi/Be7Fk/ymVukjg/x9xK', 1, '2019-05-20 10:39:04', '2019-06-27 13:13:17', '0000-00-00 00:00:00', ''),
(7, 'irfan', 'irfan shidqi laksonk', '19582829292', 'wkwmwmwmw', '085330630666', '1', 'markipul05@gmail.com', '$2y$10$uoiSqT3XoPIfBPtitrRP6ubog9J3o.jY9PZMUuWcSBPPL/ofENmqC', 1, '2019-06-27 18:47:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, 'romi', 'romi dullahbabbaaabb', '494946464', 'gahahahaha', '085330630656', '1', 'guramin01@gmail.com', '$2y$10$I084ghbdO0.f13AEE173ZuVIwDb0Jzd8gF4T84vXOGmflqyYqf27a', 1, '2019-06-27 18:52:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'wowo', 'wowo awaw wwkkw', '1949494646', 'akjddhheh', '085330630656', '1', 'irdan@gmail.com', '$2y$10$NbHyXloYsSC4a4P73s3lYuELzxz1ChdmCbFAOust7/Q/N7S63e57C', 1, '2019-06-27 18:56:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 'atok', 'athokkdkdkdkd', '49481949494', 'wkakksksk', '08536030303', '1', 'email@gmail.com', '$2y$10$OIDV724tRfOR6gm4CiHcMukWeOQKoczrpWl3YQxV9pOkfkz3tlJD.', 1, '2019-06-27 22:54:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `tb_denda`
--
ALTER TABLE `tb_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tb_merek_mobil`
--
ALTER TABLE `tb_merek_mobil`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_merek` (`id_merek`);

--
-- Indexes for table `tb_supir`
--
ALTER TABLE `tb_supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mobil` (`id_mobil`),
  ADD KEY `id_merek` (`id_merek`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_supir` (`id_supir`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_merek_mobil`
--
ALTER TABLE `tb_merek_mobil`
  MODIFY `id_merek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD CONSTRAINT `tb_mobil_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `tb_merek_mobil` (`id_merek`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `tb_merek_mobil` (`id_merek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `tb_bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
