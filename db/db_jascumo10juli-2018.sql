-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07 Jul 2018 pada 16.13
-- Versi Server: 10.1.22-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jascumo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `harga_layanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `jenis_layanan`, `harga_layanan`) VALUES
('LYN044', 'Cuci Mobil + Wax', '50000'),
('LYN446', 'Poles Jamur Kaca', '90000'),
('LYN662', 'Poles Body', '60000'),
('LYN900', 'Cuci Mobil', '35000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` varchar(30) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `email_member` varchar(30) NOT NULL,
  `notelp_member` varchar(12) NOT NULL,
  `alamat_member` text NOT NULL,
  `password_member` varchar(100) NOT NULL,
  `status_member` enum('aktif','blokir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `email_member`, `notelp_member`, `alamat_member`, `password_member`, `status_member`) VALUES
('CRWN0431', 'kika', 'kikaestaneda@gmail.com ', '0898978', 'Jln Ciremai Raya Cirebon\r\n\r\nhayy sayaaang\r\n', '202cb962ac59075b964b07152d234b70', 'aktif'),
('CRWN2091', 'fauzan', 'emerfauzan@gmail.com', '089238234', 'testing', '202cb962ac59075b964b07152d234b70', 'aktif'),
('CRWN5118', 'aris', 'arisprasetiyo15@gmail.com', '08345345345', 'perumsdsa', '202cb962ac59075b964b07152d234b70', 'aktif'),
('CRWN7481', 'ibnu', 'ibnuabdillah484@yahoo.com', '08456456', 'testing mailer', '202cb962ac59075b964b07152d234b70', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek_mobil`
--

CREATE TABLE `merek_mobil` (
  `id_merek_mobil` varchar(100) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek_mobil`
--

INSERT INTO `merek_mobil` (`id_merek_mobil`, `nama_kendaraan`) VALUES
('198-BMW   ', 'BMW   '),
('221-AUDI   ', 'AUDI   '),
('511-MITSUBISHI', 'MITSUBISHI'),
('517-TOYOTA   ', 'TOYOTA   '),
('526-NISSAN   ', 'NISSAN   '),
('560-MERCEDES   ', 'MERCEDES   '),
('628-CHEVROLET   ', 'CHEVROLET   '),
('645-HONDA', 'HONDA'),
('664-SUZUKI   ', 'SUZUKI   '),
('799-KIA   ', 'KIA   '),
('804-VOLVO   ', 'VOLVO   '),
('880-PEUGEOT   ', 'PEUGEOT   '),
('887-HYUNDAI   ', 'HYUNDAI   '),
('918-MAZDA   ', 'MAZDA   ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkos_jemput`
--

CREATE TABLE `ongkos_jemput` (
  `id_ongkos` int(10) NOT NULL,
  `nama_wilayah` varchar(20) NOT NULL,
  `biaya_jemput` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkos_jemput`
--

INSERT INTO `ongkos_jemput` (`id_ongkos`, `nama_wilayah`, `biaya_jemput`) VALUES
(1, 'Bantul', 9000),
(2, 'Sleman', 45000),
(3, 'Kulon Progo', 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_mobil`
--

CREATE TABLE `tipe_mobil` (
  `id_tipe_mobil` varchar(20) NOT NULL,
  `id_merek_mobil` varchar(100) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `ukuran_mobil` varchar(10) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_mobil`
--

INSERT INTO `tipe_mobil` (`id_tipe_mobil`, `id_merek_mobil`, `nama_mobil`, `ukuran_mobil`, `keterangan`) VALUES
('011-OPTRA', '628-CHEVROLET   ', 'OPTRA', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('108-GT-R', '526-NISSAN   ', 'GT-R', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('286-COROLLA ', '517-TOYOTA   ', 'COROLLA ', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('311-MINI PEUGEOT', '880-PEUGEOT   ', 'MINI PEUGEOT', 'Kecil', 'Testing Relation'),
('413-CRUZE', '628-CHEVROLET   ', 'CRUZE', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('554-COUPE', '887-HYUNDAI   ', 'COUPE', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('613-ACCORD PRESTIGE', '645-HONDA', 'ACCORD PRESTIGE', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('635-NEW BALENO', '664-SUZUKI   ', 'NEW BALENO', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('739-CORONA ', '517-TOYOTA   ', 'CORONA  (TT, Twincam)', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('841-ALL NEW CIVIC', '645-HONDA', 'ALL NEW CIVIC', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)'),
('996-ALTIS', '517-TOYOTA   ', 'ALTIS', 'Sedang', 'MEDIUM SEDAN (4.5 â€“ 4.9 Meter)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_booking`
--

CREATE TABLE `transaksi_booking` (
  `no_nota` varchar(20) NOT NULL,
  `id_layanan` varchar(10) NOT NULL,
  `id_member` varchar(30) DEFAULT NULL,
  `id_tipe_mobil` varchar(20) NOT NULL,
  `id_ongkos` varchar(20) DEFAULT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `notelp_pemesan` varchar(12) NOT NULL,
  `email_pemesan` varchar(20) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `no_antrian` varchar(50) NOT NULL,
  `checkin_noantrian` varchar(100) DEFAULT NULL,
  `status_pemesanan` enum('pesan','konfrimasi','cancel','lunas','progress') NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `kembali` varchar(10) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_booking`
--

INSERT INTO `transaksi_booking` (`no_nota`, `id_layanan`, `id_member`, `id_tipe_mobil`, `id_ongkos`, `id_user`, `nama_pemesan`, `alamat_pemesan`, `notelp_pemesan`, `email_pemesan`, `tanggal_pesan`, `no_antrian`, `checkin_noantrian`, `status_pemesanan`, `bayar`, `kembali`, `total`) VALUES
('GEI7J', 'LYN044', 'CRWN5118', '841-ALL NEW CIVIC', '', '', '-', '-', '-', '-', '2018-07-07 13:47:43', '2', '', 'konfrimasi', '0', '0', '60000'),
('W2ENL', 'LYN044', 'CRWN7481', '841-ALL NEW CIVIC', '', '', '-', '-', '-', '-', '2018-07-07 10:46:38', '1', '', 'cancel', '0', '0', '90000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `alamat_user` text NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `nohp_user` int(12) NOT NULL,
  `level_akses` enum('0','1') NOT NULL,
  `status_pengguna` enum('1','2') NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `alamat_user`, `nama_user`, `nohp_user`, `level_akses`, `status_pengguna`, `created_at`, `update_at`) VALUES
(5, 'kasir', '202cb962ac59075b964b07152d234b70', 'Lorem Ipsum', 'sulastri', 891283213, '0', '1', '2018-06-02 00:26:44', '2018-06-02 00:26:44'),
(6, 'manajer', '202cb962ac59075b964b07152d234b70', 'testing', 'ibnu', 2147483647, '1', '1', '2018-06-02 00:30:27', '2018-06-02 00:30:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_member`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_member` (
`id_member` varchar(30)
,`nama_member` varchar(100)
,`email_member` varchar(30)
,`notelp_member` varchar(12)
,`alamat_member` text
,`password_member` varchar(100)
,`status_member` enum('aktif','blokir')
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_member`
--
DROP TABLE IF EXISTS `vw_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_member`  AS  select `member`.`id_member` AS `id_member`,`member`.`nama_member` AS `nama_member`,`member`.`email_member` AS `email_member`,`member`.`notelp_member` AS `notelp_member`,`member`.`alamat_member` AS `alamat_member`,`member`.`password_member` AS `password_member`,`member`.`status_member` AS `status_member` from `member` order by `member`.`id_member` desc ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `merek_mobil`
--
ALTER TABLE `merek_mobil`
  ADD PRIMARY KEY (`id_merek_mobil`);

--
-- Indexes for table `ongkos_jemput`
--
ALTER TABLE `ongkos_jemput`
  ADD PRIMARY KEY (`id_ongkos`);

--
-- Indexes for table `tipe_mobil`
--
ALTER TABLE `tipe_mobil`
  ADD PRIMARY KEY (`id_tipe_mobil`);

--
-- Indexes for table `transaksi_booking`
--
ALTER TABLE `transaksi_booking`
  ADD PRIMARY KEY (`no_nota`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ongkos_jemput`
--
ALTER TABLE `ongkos_jemput`
  MODIFY `id_ongkos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
