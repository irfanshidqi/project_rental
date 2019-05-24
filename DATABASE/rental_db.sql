-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Mei 2019 pada 17.29
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
  `level` int(2) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `nama_admin`, `email`, `level`, `password`, `reset`) VALUES
(1, 'admin2', 'irfan', 'triplets.cv@gmail.com', 1, 'admin', ''),
(2, 'admin', 'irfan shidqi laksono', 'guramin01@gmail.com', 2, '$2y$10$NFH9ImQAg8J2a99bPUQF6OmhkYBKQeHayILD60w9HJDuANyaQvQES', ''),
(3, 'admin2', 'ini', 'halo@galo.com', 2, '$2y$10$dEo885oSE15jL0Rx0yqCF.yZCMhQXv9l8zFyXqcxvtjcbNfDDtjWS', ''),
(4, 'admin2', 'ini', 'halo@galo.com', 2, '$2y$10$PPSyof2/n3Xi0o02toNrT.tWW1MTBO9CS9HaO3wveyMCB7zju5qE2', '');

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
(1, 'BCA', '019258258258', 'Muhammad irfan shidqi laksono', '2019-05-18 04:13:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_denda`
--

CREATE TABLE `tb_denda` (
  `id_denda` int(11) NOT NULL,
  `id_detail_transaksi` int(11) NOT NULL,
  `jumlah_hari` int(11) NOT NULL,
  `total_denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(13, 'Kawasaki'),
(14, 'Kia'),
(15, 'KTM'),
(16, 'Lambhorgini'),
(17, 'Lexus'),
(18, 'Mazda'),
(19, 'Mercedes Benz'),
(20, 'Mitsubishi'),
(21, 'Nissan'),
(22, 'Piaggio'),
(23, 'Porsche'),
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
(32, 7, 'WARNER', 'MANTAP... BISA PESAN PSK', '2019', 11, '250000', 'PUTIHwwww', 1, 'P 1 RI', 1, 'gambar2019_05_20_05_18_26.png', 1, '2019-05-20 10:13:25', 1, '2019-05-20 10:20:14'),
(33, 7, '    EVOQUE  ', 'BONUS DRUGS', '2018', 6, '10000000', '   PUTIH', 2, '   L 1 RI', 2, 'gambar2019_05_16_10_47_211.png', 1, '2019-05-16 15:47:21', 1, '0000-00-00 00:00:00'),
(36, 10, ' LANCER EVO ', 'Mobil mantap jiwa hahahahahahahhaa', '2011', 4, '2000000', '  PUTIH', 1, '  H2015 2', 1, 'gambar2019_05_19_16_24_511.png', 1, '2019-05-19 21:24:51', 1, '0000-00-00 00:00:00'),
(37, 8, ' Ducati EvoZ ', 'Mobil Ter GG yang pernah ada di dunia waw', '2021', 7, '12000000', '  Hitam', 1, '  H2015 22', 1, 'gambar2019_05_16_10_58_191.png', 1, '2019-05-16 15:58:19', 1, '0000-00-00 00:00:00');

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

INSERT INTO `tb_supir` (`id_supir`, `nama_supir`, `nik`, `no_ktp`, `no_hp`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `umur`, `foto`, `created`, `last_update`) VALUES
(1, 'IRFAN', '3529253959359', '35933054049629329', '0864035945', '1', 'JL delima putin no 8 jalan yg sangan toantnag', '2019-05-14', 17, 'jrnrjnrjg.jpg', '2019-05-15 00:00:00', '2019-05-31 00:00:00'),
(2, 'avicenna maulai', '3259011102010006', '12553523522352', '0854543534', '1', 'New South Wales,NSW', '2019-05-07', 25, 'foto2019_05_19_08_53_211.jpg', '2019-05-19 13:53:21', '0000-00-00 00:00:00'),
(3, 'Athok Fajariano', '325901110201000625', '35205938358', '06524241424', '1', 'New South Wales,NSW', '2019-05-14', 23, 'foto2019_05_21_05_23_121.jpeg', '2019-05-21 10:23:12', '0000-00-00 00:00:00'),
(4, 'Irfan shidiq', '352482912939', '324591252389', '08133063065', '2', 'New South Wales,NSWwrwrw', '2019-05-18', 98, 'foto2019_05_23_05_43_131.jpeg', '2019-05-23 10:43:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `id_mobil` int(5) NOT NULL,
  `id_merek` int(5) NOT NULL,
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
  `bukti_pembayaran` varchar(100) NOT NULL,
  `id_bank` int(5) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_mobil`, `id_merek`, `status_transaksi`, `nama`, `no_hp`, `email`, `tujuan`, `tgl_order`, `waktu_order`, `tgl_akhir`, `lama_peminjaman`, `harga`, `total_harga`, `denda`, `bukti_pembayaran`, `id_bank`, `created`) VALUES
('TR19052200001', 33, 7, 0, 'Muhammad irfan Shidqi Laksono', '08133063065', 'valve@gmail.com', 'Magelang', '2019-05-18', '22:22:00', '0000-00-00', 0, 20000, 0, 0, '', 0, '2019-05-22 23:24:48'),
('TR19052200002', 32, 7, 0, '', '', '', '', '0000-00-00', '00:00:00', '0000-00-00', 0, 20000, 0, 0, '', 0, '2019-05-22 23:25:27'),
('TR19052300003', 33, 7, 1, 'Muhammad irfan Shidqi Laksono', '5235235235', 'guramin01@gmail.com', 'Alexandria', '2019-05-10', '22:22:00', '0000-00-00', 0, 10000000, 0, 0, '', 0, '2019-05-23 10:33:05'),
('TR19052300004', 32, 7, 1, 'Muhammad irfan Shidqi Laksono', '5235235235', 'guramin07@gmail.com', 'Magelang', '2019-05-15', '05:55:00', '0000-00-00', 0, 250000, 0, 0, '', 0, '2019-05-23 10:47:41'),
('TR19052400005', 32, 7, 1, 'Muhammad irfan Shidqi Laksono', '5235235235', 'admin@gmail.com', 'Alexandria', '2019-05-09', '04:04:00', '1970-01-05', 4, 250000, 0, 0, '', 0, '2019-05-24 10:29:34'),
('TR19052400006', 33, 7, 1, 'Irfan Shdiqi', '08133063065', 'triplets.cv@gmail.com', 'Magelang', '2019-05-21', '05:05:00', '2019-05-25', 4, 10000000, 0, 0, '', 0, '2019-05-24 10:32:03'),
('TR19052400007', 33, 7, 1, 'Muhammad irfan Shidqi Laksono', '08133063065', 'triplets.cv@gmail.com', 'Magelang', '2019-05-09', '20:00:00', '2019-05-13', 4, 10000000, 0, 0, '', 0, '2019-05-24 12:23:33'),
('TR19052400008', 33, 7, 1, 'Irfan Shdiqi', '5235235235', 'guramin07@gmail.com', 'Magelang', '2019-05-10', '05:05:00', '2019-05-15', 5, 10000000, 0, 0, '', 0, '2019-05-24 20:29:59'),
('TR19052400009', 32, 7, 1, 'Irfan Shdiqi', '08133063065', 'valve@gmail.com', 'Magelang', '2019-05-24', '05:05:00', '2019-05-29', 5, 10000000, 50000000, 0, '', 1, '2019-05-24 21:39:58');

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
(5, '  irfan', 'Muhammad irfan Shidqi Laksono', '3259011102010006', 'guramin07@gmail.com', '253525345', '1', 'New South Wales,NSW', '$2y$10$ZNt07g8GtAAgUMhXpwGkyO4cKegcVIaqdZg8IV2199iGmLdYnVChy', 2, '2019-05-16 10:35:35', '2019-05-23 06:04:34', '2019-05-18 14:48:42', ''),
(6, 'guramin03', 'Athok', '352925822323', 'markipul01@gmail.com', '0853305454', 'P', 'JLP TESNA GNRnO.12EQ', '$2y$10$2A.UxSXqcKktV/s9HxcbZuLFCYpMg7Rtfi/Be7Fk/ymVukjg/x9xK', 1, '2019-05-20 10:39:04', '2019-05-23 06:07:10', '0000-00-00 00:00:00', '');

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
  ADD PRIMARY KEY (`id_transaksi`);

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
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_denda`
--
ALTER TABLE `tb_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_merek_mobil`
--
ALTER TABLE `tb_merek_mobil`
  MODIFY `id_merek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_supir`
--
ALTER TABLE `tb_supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD CONSTRAINT `tb_mobil_ibfk_1` FOREIGN KEY (`id_merek`) REFERENCES `tb_merek_mobil` (`id_merek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
