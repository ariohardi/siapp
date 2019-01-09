-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2018 pada 08.25
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_absensi`
--

CREATE TABLE `ganusa_absensi` (
  `ID` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `id_danru_masuk` int(11) NOT NULL,
  `id_danru_pulang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` datetime NOT NULL,
  `jam_pulang` datetime NOT NULL,
  `lokasi_masuk` text NOT NULL,
  `lokasi_pulang` text NOT NULL,
  `foto_masuk` text NOT NULL,
  `foto_pulang` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'MASUK',
  `lembur` int(1) DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_absensi`
--

INSERT INTO `ganusa_absensi` (`ID`, `id_personil`, `id_danru_masuk`, `id_danru_pulang`, `tanggal`, `jam_masuk`, `jam_pulang`, `lokasi_masuk`, `lokasi_pulang`, `foto_masuk`, `foto_pulang`, `status`, `lembur`, `keterangan`) VALUES
(1, 1, 1, 1, '2018-07-06', '2018-07-06 19:01:52', '2018-07-11 22:04:18', '-6.2554817,106.6201084', '-6.2551991,106.6198902', 'absensi/2018/07/5b3f5a5d919ba.png', 'absensi/2018/07/5b461c4597ba1.png', 'MASUK', 0, ''),
(2, 2, 1, 1, '2018-07-11', '2018-05-11 08:59:44', '2018-05-11 22:04:18', '-6.2541424,106.6181406', '', 'absensi/2018/07/5b4564bdd0b5e.png', '', 'MASUK', 0, ''),
(3, 3, 1, 1, '2018-07-12', '2018-07-12 08:26:45', '2018-07-13 08:52:21', '-6.255592,106.6039271', '-6.255269,106.6198269', 'absensi/2018/07/5b46ae8297574.png', 'absensi/2018/07/5b4805a8db3d1.png', 'MASUK', 0, ''),
(4, 4, 1, 1, '2018-07-12', '2018-07-12 08:38:16', '2018-07-13 08:51:42', '0.0,0.0', '0.0,0.0', 'absensi/2018/07/5b46b135d159b.png', 'absensi/2018/07/5b480581aa223.png', 'MASUK', 0, ''),
(5, 5, 1, 1, '2018-07-13', '2018-07-13 08:51:53', '2018-07-13 19:52:16', '-6.2552883,106.6198266', '-6.2554508,106.6198504', 'absensi/2018/07/5b4805e62ccef.png', 'absensi/2018/07/5b48a05373d51.png', 'MASUK', 0, ''),
(6, 6, 1, 1, '2018-07-16', '2018-05-13 08:51:53', '2018-05-16 02:52:00', '', '', '', '', 'MASUK', 0, ''),
(7, 7, 1, 1, '2018-07-24', '2018-07-24 12:18:49', '2018-07-24 12:22:11', '-6.2553331,106.6199019', '-6.2553109,106.6198887', 'absensi/2018/07/5b56b6e6edc68.png', 'absensi/2018/07/5b56b756b0734.png', 'MASUK', 0, ''),
(8, 8, 1, 1, '2018-11-28', '2018-11-28 15:00:56', '2018-11-29 16:06:42', '-6.2554381,106.6199391', '-6.2553725,106.6199185', 'absensi/2018/11/5bfe4b6589273.png', 'absensi/2018/11/5bfe4c65bf084.png', 'MASUK', 0, ''),
(9, 9, 1, 1, '2018-11-29', '2018-11-29 17:37:46', '2018-11-29 17:40:16', '0.0,0.0', '0.0,0.0', 'absensi/2018/11/5bffc1a72a96e.png', 'absensi/2018/11/5bffc1e381497.png', 'MASUK', 0, ''),
(10, 10, 1, 1, '2018-11-29', '2018-11-29 17:45:34', '2018-11-29 17:47:43', '0.0,0.0', '0.0,0.0', 'absensi/2018/11/5bffc37b1832d.png', 'absensi/2018/11/5bffc3a206d24.png', 'MASUK', 0, ''),
(11, 11, 1, 1, '2018-11-29', '2018-11-29 17:53:06', '2018-11-29 18:00:10', '0.0,0.0', '0.0,0.0', 'absensi/2018/11/5bffc53f3010c.png', 'absensi/2018/11/5bffc68d19004.png', 'MASUK', 0, ''),
(12, 12, 1, 1, '2018-11-29', '2018-11-29 18:00:42', '2018-11-29 18:39:26', '0.0,0.0', '-6.2554204,106.6199361', 'absensi/2018/11/5bffc707caa15.png', 'absensi/2018/11/5bffcfc1cf11e.png', 'MASUK', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_admin`
--

CREATE TABLE `ganusa_admin` (
  `ID` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_user_group` int(3) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `notifikasi_pertama` int(11) NOT NULL,
  `notifikasi_terakhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_admin`
--

INSERT INTO `ganusa_admin` (`ID`, `id_cabang`, `nama`, `kode_user_group`, `email`, `password`, `level`, `tgl_buat`, `status`, `notifikasi_pertama`, `notifikasi_terakhir`) VALUES
(1, 1, 'Cilly Raymond', 1, 'ray_punya@yahoo.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '2016-11-29 10:21:37', 0, 0, 8),
(2, 1, 'Yusup Saprudin', 2, 'yusupsaprudin@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 1, '2016-11-28 06:25:28', 1, 0, 17),
(3, 1, 'Emil Muttakin', 3, 'emilmuttakin88garut@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '2016-12-02 10:00:00', 0, 0, 15),
(4, 1, 'George', 4, 'george@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 9),
(5, 1, 'Yazid', 5, 'yazidalkhais@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0),
(6, 2, 'Nanda', 6, 'nanda@janusa.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(7, 2, 'Test admin', 7, 'test.admin@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 22),
(8, 2, 'Test admin', 8, 'test.admin@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 30),
(9, 2, 'kapolres belu', 9, 'polresbelu@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(10, 2, 'Wibowo', 10, 'wibowo@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(11, 1, 'Ario Hardi', 0, 'ariohardi@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(12, 2, 'Emil', 11, 'emil@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(13, 1, 'Adi Bambang Sutedja', 1, 'bujp.pimpinan@bujp.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '2016-11-29 10:21:37', 0, 0, 8),
(14, 1, 'Lestari', 2, 'bujp.keuangan@bujp.co.id', '92e78fe14870e88ea730d7dc978c69ca', 1, '2016-11-28 06:25:28', 1, 0, 17),
(15, 1, 'Nastalim Liu', 3, 'bujp.admin@bujp.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '2016-12-02 10:00:00', 0, 0, 15),
(16, 1, 'Sriwidadi', 4, 'bujp.operasional@bujp.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 9),
(17, 1, 'Indah Kusnadi', 5, 'bujp.hrd@bujp.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0),
(18, 2, 'Ary Raja Iskandar', 6, 'wilayah.pimpinan@wilayah.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(19, 2, 'Yuliana Devi', 7, 'wilayah.keuangan@wilayah.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 22),
(20, 2, 'Inge Cahya Hardja', 8, 'wilayah.admin@wilayah.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 29),
(21, 2, 'Ridwan Wibawa', 9, 'wilayah.operasional@wilayah.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(22, 2, 'Elisha Hutabarat', 10, 'wilayah.hrd@wilayah.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(23, 1, 'Susila Agus Yuwono', 0, 'Jn1.superadmin@jn1.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(24, 2, 'Jason Tarihoran', 11, 'klien.x.managerkeamanan@klien.x.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(25, 3, 'Tirto Indra', 11, 'klien.y.managerkeamanan@klien.y.co.id', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(26, 0, 'Iqbal Arighi', 0, 'iqbal@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(27, 0, 'Jaya', 0, 'jaya@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0),
(28, 0, 'Jaya', 0, 'jaya@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0),
(29, 0, 'jaya', 0, 'jaya@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0),
(30, 0, 'Jaya', 0, 'jaya@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 1, 0, 0),
(31, 0, 'Jono', 0, 'jono@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 2, '0000-00-00 00:00:00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_cabang`
--

CREATE TABLE `ganusa_cabang` (
  `ID` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `map_address` varchar(100) NOT NULL,
  `map_latitude` varchar(12) NOT NULL DEFAULT '0.0',
  `map_longitude` varchar(12) NOT NULL DEFAULT '0.0',
  `tgl_buat` datetime NOT NULL,
  `pembuat` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_cabang`
--

INSERT INTO `ganusa_cabang` (`ID`, `nama_cabang`, `manager`, `alamat`, `propinsi`, `kabupaten`, `telepon`, `fax`, `map_address`, `map_latitude`, `map_longitude`, `tgl_buat`, `pembuat`, `status`) VALUES
(1, 'Head Office', 'Safwin Rambe', 'Jalan Taruma No. 17AA, Petisah Tengah, Medan Petisah, Sumatera Utara (20122).', 12, 1275, '081362177037', NULL, 'Jalan Taruma No. 17AA, Petisah Tengah, Medan Petisah, Sumatera Utara (', '3.5877021311', '98.671073408', '2017-04-13 21:52:26', 2, 0),
(2, 'Jawa Barat', 'Bastari Rahmat', 'Jalan Cimanuk No 204\nDesa Jayaraga\nKecamatan Tarogong\nKabupaten Garut\nJawa Barat', 32, 3205, '085323333878', NULL, 'Jl. Cimanuk No.204, Jayaraga, Tarogong Kidul, Kabupaten Garut, Jawa Barat 44151, Indonesia', '-7.2065514', '107.89410290', '2017-04-21 19:16:04', 2, 0),
(3, 'Yogyakarta', 'Harry Eko', 'Jalan Sadewo Rt 04 Rw 20 \nBanuwitan Plakaran \nDesa Baturetno \nKecamatan Banguntapan \nKabupaten Bantul\nProvinsi DI Yogyakarta', 34, 3402, '082138320696', NULL, 'Jalan sadewa bangun tapan gunung kidul yogyakarta', '-7.953594', '110.58949800', '2017-04-21 19:27:08', 2, 0),
(4, 'JN1- Banten', 'Lenyus', 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua. Klp. Dua, Tangerang, Banten 15810, Indonesia', 36, 3671, '1234', NULL, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Kl', '-6.2555742', '106.61990489', '2018-01-23 18:18:56', 6, 1),
(5, 'JN1-Bandung', 'Asep Sudrahat', 'Jl. Cijawura Girang II No. 18, Sekejati, Buahbatu, Kota Bandung, Jawa Barat', 32, 3273, NULL, NULL, 'Jl. Cijawura Girang II No.18, Sekejati, Buahbatu, Kota Bandung, Jawa Barat 40286, Indonesia', '-6.944285515', '107.64826005', '2018-07-11 09:51:45', 8, 1),
(6, 'JN1- Medan', 'Daha Sitorus', 'jl. Stella Raya, Simpang Selayang, Medan Tungtungan, Kota Medan, Sumatera Utara', 12, 1275, NULL, NULL, 'Jl. Stella Raya, Simpang Selayang, Medan Tuntungan, Kota Medan, Sumatera Utara 20135, Indonesia', '3.5297945', '98.615995500', '2018-07-11 09:55:38', 8, 1),
(7, 'JN1- Lombok', 'Adimas', 'Jl. Saleh Sungkar, Nusa Tenggara Barat, Indonesia', 52, 5201, '', NULL, 'Jl. Saleh Sungkar, Nusa Tenggara Bar., Indonesia', '-8.559109', '116.07489550', '2018-07-11 09:58:37', 8, 1),
(8, 'JN1- Jakarta', 'Seno', 'Jalan Pandu Senjaya Kabupaten kotawaringin', 62, 6201, NULL, NULL, 'Unnamed Road, Pandu Senjaya, Pangkalan Lada, Kabupaten Kotawaringin Barat, Kalimantan Tengah 74113, ', '-2.50633979', '111.76142888', '2018-07-11 10:02:01', 8, 1),
(9, 'JN1- Makassar', 'Rudi', 'qwewewew', 73, 7371, '1234', NULL, 'JL. Pongtiku, No. 10, Karassik, Bua Kana, Toraja, Kota Makassar, Sulawesi Selatan 90222, Indonesia', '-5.160983223', '119.43688579', '2018-11-22 09:51:05', 23, 0),
(10, 'JN1- Makassar', 'Rudi', 'qwwewwe', 73, 7371, '2321', NULL, 'Pengayoman Blok F8/8, Masale, Panakkukang, Makassar City, South Sulawesi 90231, Indonesia', '-5.157268613', '119.43833456', '2018-11-22 09:58:02', 23, 1),
(11, 'JN1- Malang', 'Widodo', 'weqweqwe', 35, 3507, '', NULL, 'Malang, Malang City, East Java, Indonesia', '-7.9666204', '112.63263210', '2018-11-22 17:28:03', 23, 0),
(12, 'JN1- Malang', 'Widodo', 'wewqeqw', 35, 3507, '1234', NULL, 'Malang, Malang City, East Java, Indonesia', '37.09024', '-95.71289100', '2018-11-22 17:29:22', 23, 1),
(13, 'Cahaya Terang, PT', 'Suryo', 'qweqwe', 11, 1107, '1243', NULL, 'Aceh, Indonesia', '4.695135', '96.749399300', '2018-11-27 11:42:13', 23, 1),
(14, 'Batu Keras, PT', 'Andi', 'qwertyuiop', 73, 7322, NULL, NULL, 'Masamba, North Luwu Regency, South Sulawesi, Indonesia', '-2.3646416', '120.29741990', '2018-11-28 11:51:44', 23, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_device`
--

CREATE TABLE `ganusa_device` (
  `device_id` varchar(20) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `firebase` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_harga_pulsa`
--

CREATE TABLE `ganusa_harga_pulsa` (
  `ID` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `kode` text NOT NULL,
  `harga_beli` int(11) NOT NULL DEFAULT '0',
  `harga_jual` int(11) NOT NULL DEFAULT '0',
  `provider` text NOT NULL,
  `tipe` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_harga_pulsa`
--

INSERT INTO `ganusa_harga_pulsa` (`ID`, `nominal`, `kode`, `harga_beli`, `harga_jual`, `provider`, `tipe`, `keterangan`) VALUES
(1, 5000, 'ST5', 5700, 5800, 'TELKOMSEL', 'PULSA', '5,000'),
(2, 10000, 'ST10', 10500, 10600, 'TELKOMSEL', 'PULSA', '10,000'),
(3, 20000, 'ST20', 20500, 20600, 'TELKOMSEL', 'PULSA', '20,000'),
(4, 25000, 'ST25', 25500, 25600, 'TELKOMSEL', 'PULSA', '25,000'),
(5, 50000, 'ST50', 49500, 49600, 'TELKOMSEL', 'PULSA', '50,000'),
(6, 100000, 'ST100', 9700, 9800, 'TELKOMSEL', 'PULSA', '100,000'),
(7, 5000, 'XD5', 5800, 5900, 'XL', 'PULSA', '5,000'),
(8, 10000, 'XD10', 10850, 10950, 'XL', 'PULSA', '10,000'),
(9, 25000, 'XD25', 49750, 49850, 'XL', 'PULSA', '25,000'),
(10, 50000, 'XD50', 99800, 99900, 'XL', 'PULSA', '50,000'),
(11, 100000, 'XD100', 9700, 9800, 'XL', 'PULSA', '100,000'),
(12, 5000, 'I5', 5750, 5850, 'INDOSAT', 'PULSA', '5,000'),
(13, 10000, 'I10', 10800, 10900, 'INDOSAT', 'PULSA', '10,000'),
(14, 25000, 'I25', 25700, 25800, 'INDOSAT', 'PULSA', '25,000'),
(15, 50000, 'I50', 49850, 49950, 'INDOSAT', 'PULSA', '50,000'),
(16, 100000, 'I100', 97950, 98050, 'INDOSAT', 'PULSA', '100,000'),
(17, 5000, 'SM5', 6350, 6450, 'SMARTFREN', 'PULSA', '5,000'),
(18, 10000, 'SM10', 10400, 10500, 'SMARTFREN', 'PULSA', '10,000'),
(19, 20000, 'SM20', 20600, 20700, 'SMARTFREN', 'PULSA', '20,000'),
(20, 25000, 'SM25', 25700, 25800, 'SMARTFREN', 'PULSA', '25,000'),
(21, 50000, 'SM50', 50800, 50900, 'SMARTFREN', 'PULSA', '50,000'),
(22, 100000, 'SM100', 100950, 101050, 'SMARTFREN', 'PULSA', '100,000'),
(23, 5000, 'AD5', 5800, 5900, 'AXIS', 'PULSA', '5,000'),
(24, 10000, 'AD10', 10850, 10950, 'AXIS', 'PULSA', '10,000'),
(25, 25000, 'AD25', 25100, 25200, 'AXIS', 'PULSA', '25,000'),
(26, 50000, 'AD50', 49750, 49850, 'AXIS', 'PULSA', '50,000'),
(27, 100000, 'AD100', 99800, 99900, 'AXIS', 'PULSA', '100,000'),
(28, 5000, 'T5', 5200, 5300, 'THREE', 'PULSA', '5,000'),
(29, 10000, 'T10', 10300, 10400, 'THREE', 'PULSA', '10,000'),
(30, 20000, 'T20', 20550, 20650, 'THREE', 'PULSA', '20,000'),
(31, 30000, 'T30', 30550, 30650, 'THREE', 'PULSA', '30,000'),
(32, 50000, 'T50', 50550, 50650, 'THREE', 'PULSA', '50,000'),
(33, 100000, 'T100', 99500, 99600, 'THREE', 'PULSA', '100,000'),
(34, 25000, 'B25', 25100, 25200, 'BOLT', 'PULSA', '25,000'),
(35, 50000, 'B50', 49400, 49500, 'BOLT', 'PULSA', '50,000'),
(36, 100000, 'B100', 98000, 98100, 'BOLT', 'PULSA', '100,000'),
(37, 150000, 'B150', 146800, 146900, 'BOLT', 'PULSA', '150,000'),
(38, 200000, 'B200', 195000, 195100, 'BOLT', 'PULSA', '200,000'),
(39, 5000, 'PLN5', 5350, 5450, 'PLN', 'PLN PRABAYAR', '5,000'),
(40, 10000, 'PLN10', 10400, 10500, 'PLN', 'PLN PRABAYAR', '10,000'),
(41, 20000, 'PLN20', 20600, 20700, 'PLN', 'PLN PRABAYAR', '20,000'),
(42, 25000, 'PLN25', 25700, 25800, 'PLN', 'PLN PRABAYAR', '25,000'),
(43, 50000, 'PLN50', 50800, 50900, 'PLN', 'PLN PRABAYAR', '50,000'),
(44, 100000, 'PLN100', 100850, 100950, 'PLN', 'PLN PRABAYAR', '100,000'),
(45, 5000, 'SD5', 5700, 5800, 'TELKOMSEL', 'PAKET DATA', '35MB'),
(46, 10000, 'SD10', 10500, 10600, 'TELKOMSEL', 'PAKET DATA', '100MB'),
(47, 20000, 'SD20', 20500, 20600, 'TELKOMSEL', 'PAKET DATA', '420MB'),
(48, 25000, 'SD25', 25500, 25600, 'TELKOMSEL', 'PAKET DATA', '550MB'),
(49, 50000, 'SD50', 49500, 49600, 'TELKOMSEL', 'PAKET DATA', '1,2+2GB 4G+3GB'),
(50, 100000, 'SD100', 97000, 97100, 'TELKOMSEL', 'PAKET DATA', '1,5+5GB 4G+5GB'),
(51, 0, 'XL D800', 30800, 30900, 'XL', 'PAKET DATA', '800 MB'),
(52, 0, 'XL D1', 46300, 46400, 'XL', 'PAKET DATA', '1,5 GB'),
(53, 0, 'XL D3', 55300, 55400, 'XL', 'PAKET DATA', '3 GB'),
(54, 0, 'XL D6', 92300, 92400, 'XL', 'PAKET DATA', '6 GB'),
(55, 0, 'XL D8', 120300, 120400, 'XL', 'PAKET DATA', '8 GB'),
(56, 0, 'XL D16', 200300, 200400, 'XL', 'PAKET DATA', '16 GB'),
(57, 0, 'ID1', 29300, 29400, 'INDOSAT', 'PAKET DATA', '1GB+2GB 4G'),
(58, 0, 'ID2', 42300, 42400, 'INDOSAT', 'PAKET DATA', '2GB+3GB 4G'),
(59, 0, 'ID3', 52500, 52600, 'INDOSAT', 'PAKET DATA', '3GB+5GB 4G'),
(60, 0, 'ID6', 78500, 78600, 'INDOSAT', 'PAKET DATA', '5GB+8GB 4G'),
(61, 0, 'IDF1', 50700, 50800, 'INDOSAT', 'PAKET DATA', '2GB+10GB 4G'),
(62, 0, 'IDF2', 85500, 85600, 'INDOSAT', 'PAKET DATA', '4GB+20GB 4G'),
(63, 0, 'IDF3', 122500, 122600, 'INDOSAT', 'PAKET DATA', '8GB+30GB 4G'),
(64, 0, 'IDF4', 172000, 172100, 'INDOSAT', 'PAKET DATA', '12GB + UNL4G'),
(65, 0, 'IDX2', 34000, 34100, 'INDOSAT', 'PAKET DATA', '2GB'),
(66, 0, 'IDX4', 51500, 51600, 'INDOSAT', 'PAKET DATA', '4GB'),
(67, 0, 'IDX6', 68700, 68800, 'INDOSAT', 'PAKET DATA', '4GB'),
(68, 0, 'AXD1', 19800, 19900, 'AXIS', 'PAKET DATA', '1GB'),
(69, 0, 'AXD2', 27500, 27600, 'AXIS', 'PAKET DATA', '2GB'),
(70, 0, 'AXD3', 37500, 37600, 'AXIS', 'PAKET DATA', '3GB'),
(71, 0, 'AXD5', 55500, 55600, 'AXIS', 'PAKET DATA', '5GB'),
(72, 0, 'BD1', 29500, 29600, 'BOLT', 'PAKET DATA', '1GB'),
(73, 0, 'BD3', 48500, 48600, 'BOLT', 'PAKET DATA', '3GB'),
(74, 0, 'BD8', 96500, 96600, 'BOLT', 'PAKET DATA', '8GB'),
(75, 0, 'BD13', 145500, 145600, 'BOLT', 'PAKET DATA', '13GB'),
(76, 0, 'BD17', 194500, 194600, 'BOLT', 'PAKET DATA', '17GB'),
(77, 0, 'TK5', 5200, 5300, 'THREE', 'PAKET DATA', '80MB'),
(78, 0, 'TK10', 10200, 10300, 'THREE', 'PAKET DATA', '300MB'),
(79, 0, 'TD1', 20300, 20400, 'THREE', 'PAKET DATA', '1GB'),
(80, 0, 'TD2', 37800, 37900, 'THREE', 'PAKET DATA', '2GB'),
(81, 0, 'TD3', 53800, 53900, 'THREE', 'PAKET DATA', '3GB'),
(82, 0, 'TD4', 65300, 65400, 'THREE', 'PAKET DATA', '4GB'),
(83, 0, 'TD5', 79800, 79900, 'THREE', 'PAKET DATA', '5GB'),
(84, 0, 'TD6', 93300, 93400, 'THREE', 'PAKET DATA', '6GB'),
(85, 0, 'TD8', 122000, 122100, 'THREE', 'PAKET DATA', '8GB'),
(86, 0, 'TD10', 151300, 151400, 'THREE', 'PAKET DATA', '10GB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_absensi`
--

CREATE TABLE `ganusa_hr_absensi` (
  `ID` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `durasi` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_absensi`
--

INSERT INTO `ganusa_hr_absensi` (`ID`, `nip`, `tanggal`, `jam_masuk`, `jam_pulang`, `status`, `durasi`, `overtime`, `keterangan`) VALUES
(5, '0123456789', '2017-06-13', '09:00:00', '18:00:00', 'MASUK', 0, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_departemen`
--

CREATE TABLE `ganusa_hr_departemen` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode_divisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_departemen`
--

INSERT INTO `ganusa_hr_departemen` (`kode`, `nama`, `kode_divisi`) VALUES
('INV', 'Inventory Control', 'LOG'),
('PCH', 'Purchasing', 'LOG'),
('PPIC', 'Production Planning and Inventory Control', 'LOG'),
('PR', 'Public Relations', 'HR'),
('TRN', 'Training', 'HR'),
('WH', 'Warehouse', 'LOG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_divisi`
--

CREATE TABLE `ganusa_hr_divisi` (
  `kode` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_divisi`
--

INSERT INTO `ganusa_hr_divisi` (`kode`, `nama`) VALUES
('ACC', 'Akunting'),
('FIN', 'Finansial'),
('HR', 'Human Resources'),
('LOG', 'Logistik'),
('MKT', 'Marketing'),
('SCR', 'Security');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_jadwal_kerja`
--

CREATE TABLE `ganusa_hr_jadwal_kerja` (
  `ID` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nip` varchar(20) NOT NULL,
  `id_shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_jadwal_kerja`
--

INSERT INTO `ganusa_hr_jadwal_kerja` (`ID`, `tanggal`, `nip`, `id_shift`) VALUES
(28, '2017-06-14', '0123456789', 2),
(38, '2017-06-01', '1234567890', 2),
(39, '2017-06-01', '0123456789', 3),
(40, '2017-06-12', '0123456789', 2),
(41, '2017-06-13', '1234567890', 3),
(44, '2017-06-02', '1234567890', 2),
(45, '2017-06-02', '0123456789', 3),
(46, '2017-06-03', '0123456789', 2),
(47, '2017-06-03', '1234567890', 1),
(48, '2017-06-10', '0123456789', 2),
(49, '2017-06-10', '1234567890', 1),
(50, '2017-06-13', '0123456789', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_karyawan`
--

CREATE TABLE `ganusa_hr_karyawan` (
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `departemen` varchar(20) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nomor_ktp` varchar(255) DEFAULT NULL,
  `alamat_ktp` varchar(255) DEFAULT NULL,
  `alamat_sekarang` varchar(255) DEFAULT NULL,
  `alamat_propinsi` varchar(255) DEFAULT NULL,
  `alamat_kabupaten` varchar(255) DEFAULT NULL,
  `alamat_kecamatan` varchar(255) DEFAULT NULL,
  `kontak` text,
  `riwayat_pendidikan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_karyawan`
--

INSERT INTO `ganusa_hr_karyawan` (`nip`, `nama_lengkap`, `nama_panggilan`, `tanggal_masuk`, `status`, `jabatan`, `divisi`, `departemen`, `tempat_lahir`, `tanggal_lahir`, `nomor_ktp`, `alamat_ktp`, `alamat_sekarang`, `alamat_propinsi`, `alamat_kabupaten`, `alamat_kecamatan`, `kontak`, `riwayat_pendidikan`) VALUES
('0123456789', 'Aang Kunaefi', 'Aang', '2016-12-14', 'KK', 'Kepala Gudang', 'LOG', 'WH', 'Brebes', '1991-01-21', '01233588978888', 'Desa Losari Lor RT 002/001', 'Desa Losari Lor RT 002/001', '32', '3205', '3205181', 'N;', 'N;'),
('1234567890', 'Emil Muttakin', 'Kang Emil', '2016-12-23', 'KT', 'Kepala HRD', 'HR', 'PR', 'Garut', '1979-08-14', '05458748745415', 'Jalan Cibatu Blok S65, Garut', 'Jalan Cibatu Blok S65, Garut', '32', '3205', '3205260', 'N;', 'N;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_komponen_gaji`
--

CREATE TABLE `ganusa_hr_komponen_gaji` (
  `ID` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tipe` varchar(3) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_komponen_gaji`
--

INSERT INTO `ganusa_hr_komponen_gaji` (`ID`, `nama`, `tipe`, `detail`) VALUES
(12, 'Gaji Pokok', 'GP', 'Gaji pokok karyawan'),
(13, 'Tunjangan Hari Raya', 'TJ', 'Tunjangan hari raya umat muslim (THR)'),
(14, 'Uang Makan', 'TJ', ''),
(15, 'Uang Transportasi', 'TJ', ''),
(17, 'Jamsostek', 'PT', ''),
(18, 'PPH 21', 'PT', ''),
(19, 'Tunjangan Jabatan', 'TJ', 'Tunjangan untuk jabatan'),
(20, 'Gaji ke-13', 'TJ', 'Bonus tahunan, dibayarkan bersamaan gaji bulan desember'),
(21, 'Insentif', 'TJ', 'Bonus prestasi penjualan marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_hr_shift`
--

CREATE TABLE `ganusa_hr_shift` (
  `ID` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jam_masuk` varchar(5) NOT NULL,
  `jam_pulang` varchar(5) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_hr_shift`
--

INSERT INTO `ganusa_hr_shift` (`ID`, `nama`, `jam_masuk`, `jam_pulang`, `keterangan`) VALUES
(1, 'Shift 1', '08:00', '15:00', 'Shift Pagi'),
(2, 'Shift 2', '14:00', '22:00', 'Shift Siang'),
(3, 'Shift 3', '22:00', '08:00', 'Shit Malam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_kabupaten`
--

CREATE TABLE `ganusa_kabupaten` (
  `ID` int(4) NOT NULL,
  `id_propinsi` varchar(2) NOT NULL,
  `nama_kabupaten` varchar(100) NOT NULL,
  `uri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Struktur dari tabel `ganusa_klien`
--

CREATE TABLE `ganusa_klien` (
  `ID` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `nama_klien` varchar(255) NOT NULL,
  `direktur` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `map_address` varchar(100) NOT NULL,
  `map_latitude` varchar(12) NOT NULL DEFAULT '0.0',
  `map_longitude` varchar(12) NOT NULL DEFAULT '0.0',
  `email` text NOT NULL,
  `pola_jam_kerja` int(11) NOT NULL,
  `shift_kerja` int(11) NOT NULL,
  `hari_kerja` int(11) NOT NULL,
  `jam_kerja` int(11) NOT NULL,
  `gaji_chief` int(11) NOT NULL,
  `gaji_danru` int(11) NOT NULL,
  `gaji_satpam` int(11) NOT NULL,
  `overtime_chief` int(11) NOT NULL,
  `overtime_danru` int(11) NOT NULL,
  `overtime_satpam` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `pembuat` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_klien`
--

INSERT INTO `ganusa_klien` (`ID`, `id_cabang`, `nama_klien`, `direktur`, `alamat`, `propinsi`, `kabupaten`, `telepon`, `fax`, `map_address`, `map_latitude`, `map_longitude`, `email`, `pola_jam_kerja`, `shift_kerja`, `hari_kerja`, `jam_kerja`, `gaji_chief`, `gaji_danru`, `gaji_satpam`, `overtime_chief`, `overtime_danru`, `overtime_satpam`, `tgl_buat`, `pembuat`, `status`) VALUES
(1, 1, 'Management PT Garda Nusantara Satu', 'Safwin Rambe', 'Jalan Taruma No. 17AA, Petisah Tengah, Medan Petisah, Sumatera Utara (20122).', 12, 1275, '085319751996', NULL, 'Jl. Taruma, Petisah Tengah, Medan Petisah, Kota Medan, Sumatera Utara 20112, Indonesia', '3.5826801878', '98.675817410', 'safwin@gardanusa.net', 12, 2, 26, 12, 5000000, 3500000, 2500000, 50000, 35000, 25000, '2017-04-13 21:59:31', 2, 0),
(2, 1, 'All Stars', 'Sofyan Gas', 'Jalan mahoni', 31, 3173, NULL, NULL, '', '-6.175392', '106.82715299', '', 8, 3, 30, 12, 5000000, 7000000, 4500000, 135000, 150000, 110000, '2017-04-21 01:43:13', 2, 0),
(3, 1, 'Bravo Satria Perkasa', 'Pak Joko', 'Perum Permata Buah Batu No.12', 31, 3171, '02128828888', '0213848477', 'Jl. Komp. Permata Buah Batu Blok E No.11, Lengkong, Bojongsoang, Bandung, Jawa Barat 40287, Indonesi', '-6.9725148', '107.63937799', 'bravo@gmail.com', 8, 3, 26, 8, 5000000, 4000000, 3000000, 16000, 14000, 12000, '2017-06-13 04:26:10', 2, 0),
(4, 1, 'Cahaya Pelita Andika, PT', 'Edi Baskoro', 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Tangerang, Banten 15810, Indonesia', 12, 1276, '', NULL, 'Jl. Teko No.7, Nangka, Binjai Utara, Kota Binjai, Sumatera Utara 20351, Indonesia', '3.6134090024', '98.503376178', 'info@cahaya.pelita andika', 8, 3, 24, 8, 8000000, 5000000, 3000000, 1000000, 500000, 299999, '2018-01-23 18:21:46', 6, 1),
(5, 1, 'Cakradenta Agung Pertiwi, PT', 'Santoso', 'Jl. S Parman Kav. 107', 31, 3173, NULL, NULL, 'Jl. Jelambar Barat No.107, Jelambar Baru, Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibuko', '-6.1453441', '106.78496589', '', 8, 3, 30, 8, 8000000, 4500000, 2800000, 300000, 100000, 75000, '2018-07-11 10:27:16', 8, 1),
(6, 1, 'Cakung Permata Nusa, PT', 'wawan darmawan', 'Jl.Pulo Ayang raya,Blok OR Kav.1 Kawasan industri Pulogadung Jakarta13930', 31, 3173, NULL, NULL, 'Jl. Pulo Buaran Raya Blok EE Kav. 1 No. 04 Kawasan Industri Pulogadung, RW.9, Jatinegara, Cakung, Ko', '-6.20928', '106.91778499', '', 12, 2, 28, 8, 7000000, 5000000, 3500000, 300000, 200000, 100000, '2018-07-11 10:38:54', 8, 1),
(7, 1, 'Cipta Futura, PT', 'Setiansyah', 'Jl.Mayor Ruslan No.4465 Palermbang South Sumatera', 16, 1671, NULL, NULL, 'Jl. Mayor Ruslan No.4465, 9 Ilir, Ilir Tim. II, Kota Palembang, Sumatera Selatan 30114, Indonesia', '-2.9714283', '104.76083510', '', 8, 3, 30, 6, 12000000, 6000000, 3500000, 400000, 150000, 100000, '2018-07-11 10:42:39', 8, 1),
(8, 1, 'Citramandiri Widyanusa, PT', 'Weni Rahman', 'Jl.Veteran,No.23,Padang,West Sumatra', 13, 1371, NULL, NULL, 'Jl. Veteran No.23, Purus, Padang Bar., Kota Padang, Sumatera Barat 25115, Indonesia', '-0.94033', '100.35431970', '', 8, 3, 28, 7, 7000000, 4000000, 2500000, 300000, 150000, 75000, '2018-07-11 10:44:55', 8, 1),
(9, 1, 'KPSG', 'Ibu Vita', 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Klp. Dua, Tangerang, Banten 15810, Indonesia', 36, 3671, NULL, NULL, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Kl', '-6.2555742', '106.61990489', '', 12, 2, 26, 8, 9000000, 5000000, 35000000, 250000, 150000, 100000, '2018-07-11 11:52:00', 8, 1),
(10, 1, 'Pt. Intac Bras Indonesia', 'Rudi Jiantoro', 'Kawasan Berikat Rukti Mukti Bawana Jalan Raya Semarang Kendal Km. 12 Block A No. 2 KITW Technopark Central Java', 33, 3320, NULL, NULL, 'Semarang, Semarang City, Central Java, Indonesia', '-7.0051453', '110.43812539', '', 8, 3, 28, 8, 7000000, 4000000, 1500000, 200000, 100000, 50000, '2018-07-12 12:08:31', 8, 1),
(11, 1, 'PT. Shunchang Indonesia', 'Sutedjo', 'Jl. Raya Wates – Purworejo Km. 2, Desa Triharjo, Wates – Kulonprogo, Yogyakarta', 32, 3209, NULL, NULL, 'Jl.Raya Wates - Purworejo(Jl. Ahmad Dahlan) Km 2,6, Triharjo, Wates, Kulonprogo, Kulon Progo Regency', '-7.873683499', '110.13667080', '', 12, 2, 12, 28, 7000000, 4500000, 2250000, 300000, 200000, 150000, '2018-07-12 12:10:49', 8, 1),
(12, 1, 'PT. Primatexco Indonesia', 'Bambang Sugiarto', '(Jl. DR. Rum No.16, Pasir Kaliki, Cicendo, Kota Bandung, Jawa Barat 40171). Bhumidana Indonesia. PT, Jalan Doktor Rum, Pasirkaliki, Bandung City, West Java, Indonesia', 15, 1503, '1234', NULL, 'Jl. DR. Rum No.16, Pasir Kaliki, Cicendo, Kota Bandung, Jawa Barat 40171, Indonesia', '-6.905114999', '107.59902498', '', 12, 2, 28, 8, 7000000, 4500000, 2250000, 250000, 200000, 120000, '2018-07-12 12:13:39', 8, 1),
(13, 1, 'PT. KUBOTA INDONESIA', 'Gunawan', 'Jl.Raya Curug km.1.1, Desa Kadu jaya curug 15810, Tangerang, Banten', 61, 6103, NULL, NULL, 'JL. Raya Curug, Km.1.1, Desa Kadu Jaya, Tangerang, 15810, Kadu Jaya, Curug, Tangerang, Banten 15810,', '-6.228436899', '106.55900500', '', 8, 3, 28, 8, 7000000, 4000000, 2250000, 300000, 200000, 100000, '2018-07-12 12:18:22', 8, 1),
(14, 0, 'Cahaya Terang Gemilang, PT', 'Tono', 'qwwwewqe', 17, 1708, '', NULL, 'Bengkulu, Indonesia', '-3.5778471', '102.34638747', 'cahaya@terang.co.id', 12, 2, 6, -8, 100000, 121212, 12121, 10000, 12121, 1212, '2018-11-22 10:07:47', 23, 1),
(15, 0, 'Satu dua tiga, PT', 'Nomoto', 'qwqweqweqwe', 35, 3573, '', NULL, 'Malang, Malang City, East Java, Indonesia', '37.09024', '-95.71289100', 'satudua@tiga.com', 12, 2, 28, 10, 1234, 1231232, 123123, 12213, 2131232, 123123, '2018-11-22 17:32:00', 23, 0),
(16, 0, 'bang bangan', 'bambang', 'qwertyu', 32, 3273, NULL, NULL, 'Bandung, Kota Bandung, Jawa Barat, Indonesia', '-6.9174639', '107.61912280', '', 8, 3, 26, 8, 1000000, 12345678, 12345678, 1234567890, 123456786, 1234563, '2018-11-29 12:36:05', 23, 0),
(17, 0, 'sadasds', 'asadsda', 'sdasda', 36, 3602, NULL, NULL, '', '-6.175392', '106.82715299', '', 8, 3, 32, 1232, 2312323, 21323, 3213213, 23123, 23123, 3123, '2018-11-29 16:26:17', 23, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_kode_absensi`
--

CREATE TABLE `ganusa_kode_absensi` (
  `device_id` varchar(100) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `text` text NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_kode_absensi`
--

INSERT INTO `ganusa_kode_absensi` (`device_id`, `kode`, `id_personil`, `text`, `tgl_buat`) VALUES
('e4c7a7ded1911ba4', '11fa15dbbffaf4920efedf6c6b3656f7', 59, '0.0,0.0', '2018-06-29 16:35:21'),
('a039c1c561558d87', '11fabe680713fc490f68e6ff88c644cd', 48, '-6.2557094,106.6197029', '2018-04-10 14:33:07'),
('7ae1d100f5affb05', '7c29955f659d6cfb21fd29cce6df2e1c', 2, '-6.266794,106.8216156', '2017-04-20 15:03:22'),
('ce223d0329bdfab7', '7c2dd2e15f5a88b986d70dc243381b66', 20, '-6.2550348,106.6193962', '2018-05-13 10:15:14'),
('2f83b56269e79d80', '8418a73ff7bb6d20044c71e324fe48bb', 88, '-6.2554096,106.6199251', '2018-11-27 11:07:44'),
('31857c1aef018ef0', '8466bc45d99d3be07ee7745070eb9e4b', 53, '0.0,0.0', '2018-11-22 11:07:25'),
('5e2198c8ac3f5ce8', '8c76fd92aca41f49aa81305e660eb875', 93, '-6.2552686,106.6197925', '2018-07-12 14:15:47'),
('2f83b56269e79d80', 'a8f9165a96653c5a14f42578f7971215', 63, '-6.2556971,106.6037921', '2018-07-11 09:08:52'),
('31857c1aef018ef0', 'bfde915654c4561ab9424971b79c2664', 68, '-6.2553201,106.619907', '2018-11-27 11:50:16'),
('2f83b56269e79d80', 'c906c7d5ec5898355087869000fd9404', 67, '0.0,0.0', '2018-11-27 10:43:01'),
('db1b6d197169839b', 'd62d8dcd363fc03cabc06a31d358bff6', 85, '-6.2392776,106.5121299', '2018-07-12 11:33:27'),
('4fe7e3852c80387e', 'f1776a0696608f12981c05132947f368', 61, '0.0,0.0', '2018-07-24 12:18:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_kode_patroli`
--

CREATE TABLE `ganusa_kode_patroli` (
  `device_id` varchar(100) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `text` text NOT NULL,
  `tgl_buat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_kode_patroli`
--

INSERT INTO `ganusa_kode_patroli` (`device_id`, `kode`, `id_personil`, `text`, `tgl_buat`) VALUES
('e4c7a7ded1911ba4', '11fa15dbbffaf4920efedf6c6b3656f7', 59, '0.0,0.0', '2018-06-29 16:35:21'),
('a039c1c561558d87', '11fabe680713fc490f68e6ff88c644cd', 48, '-6.2557094,106.6197029', '2018-04-10 14:33:07'),
('2f83b56269e79d80', '330fe4278b55f9579520cd1d336937d8', 67, '-6.2555812,106.6200251', '2018-07-26 19:59:38'),
('7ae1d100f5affb05', '7c29955f659d6cfb21fd29cce6df2e1c', 2, '-6.266794,106.8216156', '2017-04-20 15:03:22'),
('ce223d0329bdfab7', '7c2dd2e15f5a88b986d70dc243381b66', 20, '-6.2550348,106.6193962', '2018-05-13 10:15:14'),
('5e2198c8ac3f5ce8', '8c76fd92aca41f49aa81305e660eb875', 93, '-6.2552686,106.6197925', '2018-07-12 14:15:47'),
('2f83b56269e79d80', 'a8f9165a96653c5a14f42578f7971215', 63, '-6.2556971,106.6037921', '2018-07-11 09:08:52'),
('ace225f55682d9b7', 'cc4a35b0a7b4a800742d1d10a0696142', 64, '-6.255134,106.6196791', '2018-07-11 15:21:30'),
('c782423ce1e5906a', 'd3aadbaea4486ed2565e3b52cda3fe05', 53, '0.0,0.0', '2018-07-17 13:25:03'),
('db1b6d197169839b', 'd62d8dcd363fc03cabc06a31d358bff6', 85, '-6.2392776,106.5121299', '2018-07-12 11:33:27'),
('4fe7e3852c80387e', 'f1776a0696608f12981c05132947f368', 61, '0.0,0.0', '2018-07-24 12:18:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_laporan_isu_keamanan`
--

CREATE TABLE `ganusa_laporan_isu_keamanan` (
  `ID` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `lampiran` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_laporan_isu_keamanan`
--

INSERT INTO `ganusa_laporan_isu_keamanan` (`ID`, `id_personil`, `kategori`, `perihal`, `deskripsi`, `lampiran`, `tanggal`, `status`) VALUES
(1, 1, 'Laporan Rutin', 'test aplikasi', 'saya sedang melakukan tes atas aplikasi SiAPP terbaru pada 2 Mei 2018.\n\nsemoga berhasil', '', '2018-05-03 16:34:58', 1),
(2, 2, 'Kebakaran', 'konsleting listrik', 'timm pln bersama dengan karyawan kantor membantu perbaikan listrik', 'lampiran/62/5b3dce5f02fcf.png', '2018-07-05 14:53:03', 1),
(3, 2, 'Kebakaran', 'patroli rutin area basemen', 'mengelilingi area basemen dengan prosedur baru ', 'lampiran/62/5b3f0c96776f6.png', '2018-07-06 13:30:46', 1),
(4, 3, 'Lainnya', 'aplikasi siapp hampir selesai', 'dikerjakan bersama tim IT Janusa', 'lampiran/66/5b3f27f62ee63.png', '2018-07-06 15:27:34', 1),
(5, 3, 'Penganiayaan', 'Penganiayaan mahasiswa', 'Telah terjadi penganiayaan seorang mahasiswa UMN di area jl. scienta ', '', '2018-07-12 11:29:33', 1),
(6, 4, 'Unjuk Rasa', 'unjuk rasa didepan gerbang masuk', 'izin melaporkan komandan sedang berlangsung unjuk rasa didepan pintu masuk, situasi kondusif, butiran terpantau lengkap 8 personil\ndemikian laporan dari saya 86', '', '2018-07-12 11:30:04', 1),
(7, 5, 'Kerusuhan', 'Laporan pencurian', 'Izin komandan telah terjadi pencurian didepan ruko newton. Kembang lanjut akan di 87 kan. Demikian 86', '', '2018-07-12 11:30:53', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_notifikasi`
--

CREATE TABLE `ganusa_notifikasi` (
  `ID` int(11) NOT NULL,
  `judul` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_notifikasi`
--

INSERT INTO `ganusa_notifikasi` (`ID`, `judul`, `link`) VALUES
(1, 'Laporan Leni Sofyan Yusup : tes gadget', '#/lap_isu_keamanan/detail/28c8edde3d61a0411511d3b1866f0636'),
(2, 'Laporan Senior Advisor : ffgghhjjjjjkkkkk', '#/lap_isu_keamanan/detail/665f644e43731ff9db3d341da5c827e1'),
(3, 'Laporan Senior Advisor : sdghjjklkhggff', '#/lap_isu_keamanan/detail/38026ed22fc1a91d92b5d2ef93540f20'),
(4, 'Laporan Senior Advisor : patroli di gudang', '#/lap_isu_keamanan/detail/011ecee7d295c066ae68d4396215c3d0'),
(5, 'Laporan Senior Advisor : zxxxcvbbbbnnnmn', '#/lap_isu_keamanan/detail/4e44f1ac85cd60e3caa56bfd4afb675e'),
(6, 'Laporan Senior Advisor : ssdffghhjjkkkll', '#/lap_isu_keamanan/detail/3d2f8900f2e49c02b481c2f717aa9020'),
(7, 'Laporan Senior Advisor : patroli di area gudang', '#/lap_isu_keamanan/detail/cd7fd1517e323f26c6f1b0b6b96e3b3d'),
(8, 'Laporan Sihol Manik : Supervisi/Pengawasan Security', '#/lap_isu_keamanan/detail/815e6212def15fe76ed27cec7a393d59'),
(9, 'Laporan Senior Advisor : pencurian di gudang', '#/lap_isu_keamanan/detail/4c0d13d3ad6cc317017872e51d01b238'),
(10, 'Laporan Senior Advisor : xccvbbnnjcghhjjj', '#/lap_isu_keamanan/detail/8d8e353b98d5191d5ceea1aa3eb05d43'),
(11, 'Laporan Emil Muttakin : jaga malam', '#/lap_isu_keamanan/detail/7bfc85c0d74ff05806e0b5a0fa0c1df1'),
(12, 'Laporan Adam Taopik : padam listrik malam hari', '#/lap_isu_keamanan/detail/c8b2f17833a4c73bb20f88876219ddcd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_panic_button`
--

CREATE TABLE `ganusa_panic_button` (
  `ID` int(11) NOT NULL,
  `id_regu` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `lokasi` text NOT NULL,
  `lokasi_alamat` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `kategori` varchar(30) NOT NULL,
  `masalahnya` text NOT NULL,
  `solusinya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_panic_button`
--

INSERT INTO `ganusa_panic_button` (`ID`, `id_regu`, `id_personil`, `lokasi`, `lokasi_alamat`, `waktu_mulai`, `waktu_akhir`, `status`, `kategori`, `masalahnya`, `solusinya`) VALUES
(3, 4, 1, '-6.2337522,106.8052553', 'Tidak dikenali', '2017-04-14 11:25:19', '0000-00-00 00:00:00', 1, '', '', ''),
(4, 4, 2, '-6.2337601,106.8053332', 'Tidak dikenali', '2017-04-14 11:30:30', '2017-04-14 11:31:05', 2, 'Laporan Rutin', 'tes panik', 'berhasil'),
(5, 4, 2, '-6.2337522,106.7940561', 'Tidak dikenali', '2017-04-14 11:44:01', '0000-00-00 00:00:00', 1, '', '', ''),
(6, 4, 2, '-6.2337522,106.8052553', 'Tidak dikenali', '2017-04-14 11:45:31', '2017-04-14 11:45:51', 2, 'Laporan Rutin', 'tes panik', 'sukses'),
(7, 4, 1, '-6.2452581,106.7940561', 'Jalan Barito I No.31\nKramat Pela\nKebayoran Baru\nKota Jakarta Selatan\nDKI Jakarta 12130', '2017-04-14 13:08:09', '2017-04-14 13:09:11', 2, 'Laporan Rutin', 'tes panik jakarta', 'alhamdulillah sdh ok semua'),
(8, 4, 1, '-7.2116833,107.9018817', 'Jalan Guntur No.18\nPaminggir\nGarut Kota\nKabupaten Garut\nJawa Barat 44118', '2017-04-15 20:23:00', '2017-04-15 20:23:59', 2, 'Lainnya', 'bensin habis', 'telp dodi minta dibawakan bensin'),
(9, 4, 3, '-7.2084181,107.8986557', 'Tidak dikenali', '2017-04-16 13:25:27', '2017-04-16 13:25:59', 2, 'Padam Listrik', 'fgggg', 'cvgg'),
(10, 4, 3, '-7.2085606,107.8985685', 'Jalan Cimanuk No.361\nJayawaras\nTarogong Kidul\nKabupaten Garut\nJawa Barat 44151', '2017-04-16 13:28:24', '2017-04-16 13:28:58', 2, 'Unjuk Rasa', 'vjgj', 'ncnc'),
(11, 4, 3, '-7.2085636,107.8985711', 'Jalan Cimanuk No.361\nJayawaras\nTarogong Kidul\nKabupaten Garut\nJawa Barat 44151', '2017-04-16 13:29:05', '2017-04-16 13:29:34', 2, 'Laporan Rutin', 'test', 'panik'),
(12, 4, 3, '-7.2085646,107.8985725', 'Jalan Cimanuk No.361\nJayawaras\nTarogong Kidul\nKabupaten Garut\nJawa Barat 44151', '2017-04-16 13:30:29', '2017-04-16 13:30:56', 2, 'Kebakaran', 'Ok', 'Ok'),
(13, 4, 3, '-7.2085624,107.8985992', 'Jalan Cimanuk No.361\nJayawaras\nTarogong Kidul\nKabupaten Garut\nJawa Barat 44151', '2017-04-16 13:32:01', '2017-04-16 13:35:37', 2, 'Kebakaran', 'ffggh', 'dfgg'),
(14, 4, 2, '-7.2085249,107.8985513', 'Tidak dikenali', '2017-04-16 13:32:35', '2017-04-20 15:01:56', 2, 'Perampokan', 'lapor', 'polisi'),
(15, 5, 9, '-8.5947426,116.0836713', 'Jalan Majapahit No.40\nPagesangan\nKecamatan Mataram\nKota Mataram\nNusa Tenggara Barat 83127', '2017-04-16 22:11:07', '2017-04-16 22:11:58', 2, 'Lainnya', 'test', 'tes'),
(16, 5, 10, '-8.5949033,116.0836559', 'Tidak dikenali', '2017-04-16 22:12:11', '2017-04-16 22:13:25', 2, 'Laporan Rutin', 'uji coba', 'sudah selesai'),
(17, 4, 3, '-7.2083966,107.8985334', 'Tidak dikenali', '2017-04-17 12:29:20', '2017-04-18 13:05:14', 2, 'Perampokan', 'ok', 'ok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_patroli`
--

CREATE TABLE `ganusa_patroli` (
  `id_patroli` int(50) NOT NULL,
  `map_latitude` varchar(12) NOT NULL DEFAULT '0.0',
  `map_longitude` varchar(12) NOT NULL DEFAULT '0.0',
  `waktu` datetime NOT NULL,
  `nama_bujp` varchar(75) NOT NULL,
  `wilayah` int(11) NOT NULL,
  `lokasi` int(11) NOT NULL,
  `zona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_patroli`
--

INSERT INTO `ganusa_patroli` (`id_patroli`, `map_latitude`, `map_longitude`, `waktu`, `nama_bujp`, `wilayah`, `lokasi`, `zona`) VALUES
(1, '-6.2555742', '106.61990489', '2018-11-09 08:25:30', 'PT JAGA NUSANTARA SATU', 8, 3, 1),
(2, '-6.2555742', '106.61990489', '2018-11-09 13:36:30', 'PT JAGA NUSANTARA SATU', 8, 3, 2),
(3, '-6.2555742', '106.61990489', '2018-11-09 18:31:30', 'PT JAGA NUSANTARA SATU', 8, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_pcp_regu`
--

CREATE TABLE `ganusa_pcp_regu` (
  `id_regu` int(11) NOT NULL,
  `kode_unit` varchar(4) NOT NULL,
  `nama_regu` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_pcp_regu`
--

INSERT INTO `ganusa_pcp_regu` (`id_regu`, `kode_unit`, `nama_regu`) VALUES
(1, '0001', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_pcp_unit`
--

CREATE TABLE `ganusa_pcp_unit` (
  `kode_unit` varchar(4) NOT NULL,
  `nama_unit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_pcp_unit`
--

INSERT INTO `ganusa_pcp_unit` (`kode_unit`, `nama_unit`, `alamat`) VALUES
('0001', 'medang lestari', 'Tangerang Kabupaten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_perpesanan`
--

CREATE TABLE `ganusa_perpesanan` (
  `ID` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '0',
  `unread` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_personil`
--

CREATE TABLE `ganusa_personil` (
  `ID` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_regu` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `divisi` varchar(10) NOT NULL DEFAULT 'SCR',
  `firebase_id` text NOT NULL,
  `token` text NOT NULL,
  `nama_personil` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `nomor_handphone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `level` varchar(1) DEFAULT NULL,
  `kualifikasi` varchar(30) NOT NULL,
  `pendidikan` text NOT NULL,
  `pelatihan` text NOT NULL,
  `pengalaman_kerja` text NOT NULL,
  `keahlian` text NOT NULL,
  `upload_foto` int(1) NOT NULL DEFAULT '0',
  `lokasi_terbaru` text NOT NULL,
  `alamat_lokasi` text NOT NULL,
  `gaji` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `pembuat` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `sedang_tugas` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_personil`
--

INSERT INTO `ganusa_personil` (`ID`, `id_cabang`, `id_proyek`, `id_regu`, `nip`, `divisi`, `firebase_id`, `token`, `nama_personil`, `jenis_kelamin`, `tanggal_lahir`, `tempat_lahir`, `berat_badan`, `tinggi_badan`, `alamat`, `propinsi`, `kabupaten`, `nomor_handphone`, `email`, `password`, `level`, `kualifikasi`, `pendidikan`, `pelatihan`, `pengalaman_kerja`, `keahlian`, `upload_foto`, `lokasi_terbaru`, `alamat_lokasi`, `gaji`, `overtime`, `pembuat`, `tgl_buat`, `status`, `sedang_tugas`) VALUES
(1, 1, 1, 0, '', 'SCR', '', '', 'Emil Mutaqin', 'L', '1990-04-18', 'Garut', 65, 175, 'bonang', 32, 3205, '085220666685', 'emil@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA MADYA', '', 'a:2:{i:0;a:4:{s:7:\"tingkat\";s:4:\"true\";s:8:\"instansi\";s:23:\"PT. Jaga Nusantara Satu\";s:4:\"kota\";s:10:\"Tanggerang\";s:5:\"tahun\";s:4:\"2017\";}i:1;a:4:{s:7:\"tingkat\";s:4:\"true\";s:8:\"instansi\";s:23:\"PT. Jaga Nusantara Satu\";s:4:\"kota\";s:10:\"Tanggerang\";s:5:\"tahun\";s:4:\"2018\";}}', '', 'a:1:{i:0;a:2:{s:13:\"nama_keahlian\";s:15:\"Bela Diri Silat\";s:10:\"keterangan\";s:37:\"Pernah mengikuti silat selama 3 tahun\";}}', 1, '-6.2553232,106.6198973,2018-07-26 12:07:00', '', 123456, 200000, 8, '2018-07-06 15:17:24', 1, 1),
(2, 1, 2, 0, '', 'SCR', '', '', 'Nanda Ramdana', 'L', '1990-04-18', 'garut', 72, 172, 'garut', 32, 3204, '0812456213', 'nanda@janusa.co.id', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA MADYA', '', '', '', '', 1, '-6.2555591,106.6199108,2018-07-26 19:58:26', '', 1234567, 0, 8, '2018-07-06 15:35:46', 1, 1),
(3, 1, 1, 0, '', 'SCR', '', '', 'Said', 'L', '1990-04-18', 'langsa', 172, 70, 'bonang', 11, 1173, '081234567845', 'said@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 1, '-6.2539527,106.6180928,2018-07-07 23:29:46', '', 1234567, 0, 8, '2018-07-06 15:37:52', 1, 1),
(4, 1, 3, 0, '', 'SCR', '', '', 'Danru', 'L', '1990-04-18', 'tangerang', 80, 180, 'garut', 32, 3205, '08997654072611', 'danru@janusa.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA UTAMA', '', '', '', '', 0, '', '', 1234567, 0, 8, '2018-07-06 15:52:46', 1, 1),
(5, 1, 4, 0, '', 'SCR', '', '', 'Bu Leny', 'P', '1990-04-18', 'Tanjung balai sumatera utara', 60, 165, 'tanjung balai medan sumatera utara indonesia', 12, 1272, '082288199996', 'siapp.satpam@gmail.com', '92e78fe14870e88ea730d7dc978c69ca', 'C', 'GADA UTAMA', '', '', '', '', 1, '-6.2555723,106.6200999,2018-07-16 15:17:53', '', 75000000, 200000, 8, '2018-07-09 12:21:09', 1, 0),
(6, 1, 1, 0, '', 'SCR', '', '', 'saya', 'L', '1990-04-18', 'banjar', 80, 177, 'ciwaruga banjar ciamis', 32, 3207, '08528878787', 'TukimanTeruna.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA MADYA', '', 'a:1:{i:1;a:4:{s:7:\"tingkat\";s:4:\"true\";s:8:\"instansi\";s:3:\"JN1\";s:4:\"kota\";s:10:\"tanggerabg\";s:5:\"tahun\";s:4:\"2012\";}}', '', '', 0, '', '', 8000000, 2089989, 8, '2018-07-11 11:19:57', 1, 1),
(7, 1, 5, 0, '', 'SCR', '', '', 'kamu', 'L', '1990-04-18', 'kota wetan', 68, 170, 'jombang', 35, 3517, '08137687676', 'lasse.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 4000000, 128888, 8, '2018-07-11 11:22:25', 1, 1),
(8, 1, 5, 0, '', 'SCR', '', '', 'Tukiman Teruna', 'L', '1981-03-19', 'ponorogo', 73, 177, 'grobongan', 33, 3315, '0856889878', 'tukimanteruna.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA MADYA', '', '', '', '', 0, '', '', 8000000, 174997, 8, '2018-07-11 11:27:08', 1, 1),
(9, 1, 2, 0, '', 'SCR', '', '', 'Lasse', 'L', '1993-07-22', 'waringin', 65, 168, 'gunung kidul', 34, 3403, '08783933739', 'lasse.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 4200000, 80000, 8, '2018-07-11 11:29:59', 1, 1),
(10, 1, 4, 0, '', 'SCR', '', '', 'Urip Karya', 'L', '1993-04-09', 'brebes', 70, 0, 'brebes', 33, 3329, '081287465758', 'urip.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA MADYA', '', '', '', '', 0, '', '', 4350000, 100000, 8, '2018-07-11 11:32:16', 1, 1),
(11, 1, 4, 0, '', 'SCR', '', '', 'Bambang As', 'L', '1992-04-09', 'pekalongan', 91, 168, 'Kp bencongan', 36, 3603, '081213891063', 'bambang.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 411999, 60000, 8, '2018-07-11 11:34:38', 1, 1),
(12, 1, 2, 0, '', 'SCR', '', '', 'M. Sulton', 'L', '1990-04-18', 'makasar', 65, 167, 'makasar', 71, 7106, '081287484748', 'sulton.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 345000, 56000, 8, '2018-07-11 11:37:03', 1, 1),
(13, 1, 1, 0, '', 'SCR', '', '', 'Dadi S', 'L', '1985-04-11', 'bandung', 75, 175, 'bandung', 32, 3273, '08520001234', 'dadi.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '-6.2257066,106.6196839,2018-07-12 05:20:57', '', 4300000, 125000, 8, '2018-07-11 11:39:30', 1, 1),
(14, 1, 8, 0, '', 'SCR', '', '', 'Pahrul Riadi', 'L', '1990-04-18', 'garut', 74, 172, 'garut', 32, 3205, '0812974668747', 'pahrul.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 3500000, 225000, 8, '2018-07-11 11:41:44', 1, 1),
(15, 2, 8, 0, '', 'SCR', '', '', 'Suratno A', 'L', '1990-04-18', 'banyumas', 68, 168, 'jember', 35, 3509, '087836345629776', 'suratno.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA MADYA', '', '', '', '', 0, '', '', 7800000, 244997, 8, '2018-07-11 11:59:21', 1, 1),
(16, 2, 8, 0, '', 'SCR', '', '', 'Maryadi', 'L', '1990-04-18', 'garut', 58, 170, 'sukabumi', 32, 3202, '08137565835446', 'maryadi.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 4300000, 224998, 8, '2018-07-11 12:01:05', 1, 1),
(17, 2, 6, 0, '', 'SCR', '', '', 'Bobby Andika', 'L', '1990-04-18', 'banten', 65, 172, 'cilegon', 36, 3672, '0786676508787', 'bobby.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 4300786, 220000, 8, '2018-07-11 12:03:14', 1, 1),
(18, 2, 7, 0, '', 'SCR', '', '', 'Irwan Sidik', 'L', '1990-04-01', 'tasikmalaya', 73, 170, 'bekasi', 32, 3216, '085115308772', 'irwan.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '-6.2559538,106.6196667,2018-07-12 00:05:20', '', 4300000, 225000, 8, '2018-07-11 12:18:57', 1, 1),
(19, 2, 7, 0, '', 'SCR', '', '', 'Heriyanto A', 'L', '1990-04-18', 'garut', 62, 172, 'jawa tengah', 33, 3321, '0878847483998', 'heriyanto.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'NONE', '', '', '', '', 0, '', '', 4000000, 180000, 8, '2018-07-11 12:23:04', 1, 1),
(20, 3, 9, 0, '', 'SCR', '', '', 'Dani Mulyana', 'L', '1986-11-17', 'bandung', 68, 172, 'garut', 36, 3603, '081285647077', 'dani.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '-6.2392573,106.5121037,2018-07-14 13:23:32', '', 3600000, 250000, 8, '2018-07-11 12:26:44', 1, 1),
(21, 3, 9, 0, '', 'SCR', '', '', 'Hadi Murdodo', 'L', '1990-04-18', 'karawang', 68, 173, 'karawang', 32, 3215, '08786474767', 'hadi.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'NONE', '', '', '', '', 0, '', '', 3400000, 125000, 8, '2018-07-11 12:28:53', 1, 1),
(22, 3, 9, 0, '', 'SCR', '', '', 'Sukrin', 'L', '1990-04-18', 'jakarta', 58, 170, 'jakarta', 31, 3173, '081275631345', 'sukrin.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA MADYA', '', '', '', '', 0, '', '', 8000000, 250000, 8, '2018-07-11 14:21:33', 1, 1),
(23, 3, 4, 0, '', 'SCR', '', '', 'Hidayat', 'L', '1990-04-18', 'bandung', 62, 175, 'bandung', 32, 3217, '085268341652', 'hidayat.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 3800000, 200000, 8, '2018-07-11 14:28:19', 1, 1),
(24, 3, 3, 0, '', 'SCR', '', '', 'Dorlan Mindo Rintonga', 'L', '1990-04-18', 'Bogor', 63, 171, 'bogor', 32, 3201, '085279546823', 'dorlan.abb@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 0, '', '', 4300000, 300000, 8, '2018-07-11 14:31:36', 1, 1),
(25, 3, 1, 0, '', 'SCR', '', '', 'Yusup', 'L', '1990-04-10', 'garut', 75, 175, 'Jakarta', 31, 3171, '085319751996', 'yusup@janusa.id', '92e78fe14870e88ea730d7dc978c69ca', 'D', 'GADA UTAMA', '', '', '', '', 0, '', '', 25000000, 60000, 8, '2018-07-11 19:05:57', 1, 0),
(26, 0, 0, 0, '', 'SCR', '', '', 'Achmad Yanuar', 'L', '1975-05-21', 'Jakarta', 70, 170, 'Jl. Pisangan lama III', 31, 3172, '081281543456', 'yanuar.aab@siapp.com', '92e78fe14870e88ea730d7dc978c69ca', 'S', 'GADA PRATAMA', '', '', '', '', 1, '-6.2149722,106.8768839,2018-07-17 10:05:21', '', 3500000, 50000, 2, '2018-07-12 11:25:59', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_pesan`
--

CREATE TABLE `ganusa_pesan` (
  `ID` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `penerima` int(1) NOT NULL,
  `total_penerima` int(11) NOT NULL,
  `isi_pesan` text NOT NULL,
  `lampiran` text NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `pembuat` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_pesan`
--

INSERT INTO `ganusa_pesan` (`ID`, `perihal`, `penerima`, `total_penerima`, `isi_pesan`, `lampiran`, `tgl_buat`, `pembuat`, `status`) VALUES
(8, 'CCTV  Basement', 1, 7, 'CCTV basement 1 timur tidak terpantau, harap diperiksa', '', '2018-05-09 07:21:56', 8, 1),
(9, 'Kunci Area Gudang', 1, 7, 'Harap untuk selalu memeriksa kembali area gudang, agar selalu terkunci setelah jam kerja', '', '2018-05-09 07:27:18', 8, 1),
(13, 'demo SiAPP', 1, 29, 'Berdoa dan bersiap siap untuk lakukan yang terbaik. \nSemoga demo aplikasi SiAPP berjalan sukses.', '', '2018-07-11 18:42:01', 8, 1),
(14, 'Demo Aplikasi SiAPP', 1, 29, 'Mohon kerjasamanya kepada seluruh tim yang sudah menggunakan aplikasi siapp-satpam untuk memberikan laporan sebagai bentuk bahwa aplikasi ini sudah terpasang. \n\nTerima kasih atas atensinya.', '', '2018-07-12 11:06:50', 8, 1),
(15, 'Test aplikasi modul instruksi', 5, 8, 'Modul instruksi adalah arahan, perintah, atau petunjuk dalam melaksanakan suatu pekerjaan atau tugas. Instruksi hendaknya disampaikan dengan jelas sehingga penerima instruksi dapat memahami dan melaksanakannya dengan baik.', 'image:lampiran_instruksi/8/5b46d5a632932_Screenshot_2018-06-19-16-41-01-19.png', '2018-07-12 11:15:05', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_propinsi`
--

CREATE TABLE `ganusa_propinsi` (
  `ID` int(4) NOT NULL,
  `nama_propinsi` varchar(100) NOT NULL,
  `uri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_propinsi`
--

INSERT INTO `ganusa_propinsi` (`ID`, `nama_propinsi`, `uri`) VALUES
(11, 'ACEH', 'aceh'),
(12, 'SUMATERA UTARA', 'sumatera-utara'),
(13, 'SUMATERA BARAT', 'sumatera-barat'),
(14, 'RIAU', 'riau'),
(15, 'JAMBI', 'jambi'),
(16, 'SUMATERA SELATAN', 'sumatera-selatan'),
(17, 'BENGKULU', 'bengkulu'),
(18, 'LAMPUNG', 'lampung'),
(19, 'KEPULAUAN BANGKA BELITUNG', 'kepulauan-bangka-belitung'),
(21, 'KEPULAUAN RIAU', 'kepulauan-riau'),
(31, 'DKI JAKARTA', 'dki-jakarta'),
(32, 'JAWA BARAT', 'jawa-barat'),
(33, 'JAWA TENGAH', 'jawa-tengah'),
(34, 'DI YOGYAKARTA', 'di-yogyakarta'),
(35, 'JAWA TIMUR', 'jawa-timur'),
(36, 'BANTEN', 'banten'),
(51, 'BALI', 'bali'),
(52, 'NUSA TENGGARA BARAT', 'nusa-tenggara-barat'),
(53, 'NUSA TENGGARA TIMUR', 'nusa-tenggara-timur'),
(61, 'KALIMANTAN BARAT', 'kalimantan-barat'),
(62, 'KALIMANTAN TENGAH', 'kalimantan-tengah'),
(63, 'KALIMANTAN SELATAN', 'kalimantan-selatan'),
(64, 'KALIMANTAN TIMUR', 'kalimantan-timur'),
(65, 'KALIMANTAN UTARA', 'kalimantan-utara'),
(71, 'SULAWESI UTARA', 'sulawesi-utara'),
(72, 'SULAWESI TENGAH', 'sulawesi-tengah'),
(73, 'SULAWESI SELATAN', 'sulawesi-selatan'),
(74, 'SULAWESI TENGGARA', 'sulawesi-tenggara'),
(75, 'GORONTALO', 'gorontalo'),
(76, 'SULAWESI BARAT', 'sulawesi-barat'),
(81, 'MALUKU', 'maluku'),
(82, 'MALUKU UTARA', 'maluku-utara'),
(91, 'PAPUA BARAT', 'papua-barat'),
(94, 'PAPUA', 'papua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_proyek`
--

CREATE TABLE `ganusa_proyek` (
  `ID` int(11) NOT NULL,
  `nama_proyek` varchar(255) NOT NULL,
  `klien` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `propinsi` int(11) NOT NULL,
  `kabupaten` int(11) NOT NULL,
  `chief_security` int(11) NOT NULL DEFAULT '0',
  `map_address` varchar(100) NOT NULL,
  `map_latitude` varchar(12) NOT NULL DEFAULT '0.0',
  `map_longitude` varchar(12) NOT NULL DEFAULT '0.0',
  `tgl_buat` datetime NOT NULL,
  `pembuat` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_proyek`
--

INSERT INTO `ganusa_proyek` (`ID`, `nama_proyek`, `klien`, `lokasi`, `propinsi`, `kabupaten`, `chief_security`, `map_address`, `map_latitude`, `map_longitude`, `tgl_buat`, `pembuat`, `status`) VALUES
(1, 'Tenaga kerja satpam', 2, 'Jalan Taruma No. 17AA, Petisah Tengah, Medan Petisah, Sumatera Utara (20122).', 12, 1275, 0, 'Jl. Taruma, Petisah Tengah, Medan Petisah, Kota Medan, Sumatera Utara 20112, Indonesia', '3.586792', '98.669879000', '2017-04-13 22:00:43', 2, 1),
(2, 'Pengamanan Produksi PT. Sukamaju', 3, 'Jl. IR H. Juanda No 5', 31, 3173, 0, 'Jl. Batu Tulis X No.5, Kb. Klp., Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10120, In', '-6.165397320', '106.82602110', '2017-06-13 04:27:22', 2, 1),
(3, 'JN1', 4, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Klp. Dua, Tangerang, Banten 15810, Indonesia', 36, 3603, 1, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Kl', '-6.2555742', '106.61990489', '2018-01-23 18:26:36', 6, 1),
(4, 'Polres Belu', 4, 'Jl. Ahmad Yani, Atambua, Kabupaten Belu, Nusa Tenggara Tim. 85711, Indonesia', 53, 5306, 0, 'Jl. Ahmad Yani, Atambua, Kabupaten Belu, Nusa Tenggara Tim. 85711, Indonesia', '-9.1070283', '124.89906109', '2018-06-29 15:24:16', 8, 1),
(5, 'Pengamanan Site TOP Lembaga Pebankan Indonesia', 4, 'Jl. Kemang Raya No.35, RT.3/RW.2, Bangka, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730, Indonesia', 31, 3171, 0, 'Jl. Kemang Raya No.35, RT.3/RW.2, Bangka, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota', '-6.2548917', '106.81029050', '2018-07-11 10:55:30', 8, 1),
(6, 'Mall Serpong', 6, 'Jl. Palem Putri Blok B36 No.3, Cipete, Pinang, Kota Tangerang, Banten 15142, Indonesia', 36, 3671, 0, 'Jl. Palem Putri Blok B36 No.3, Cipete, Pinang, Kota Tangerang, Banten 15142, Indonesia', '-6.200238', '106.6567599', '2018-07-11 10:59:16', 8, 1),
(7, 'Asuransi Bintang Tbk', 5, 'Jl. Kemang Timur XVI No.12, Bangka, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12730, Indonesia', 31, 3171, 0, 'Jl. Kemang Timur XVI No.12, Bangka, Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakar', '-6.2698715', '106.82255199', '2018-07-11 11:03:49', 8, 1),
(8, 'Roda Vivatex Sawit', 8, 'Jl. Beverly Boulevard, Belian, Batam Kota, Kota Batam, Kepulauan Riau, Indonesia', 21, 2171, 0, 'Jl. Beverly Boulevard, Belian, Batam Kota, Kota Batam, Kepulauan Riau, Indonesia', '1.1231272', '104.06108740', '2018-07-11 11:09:47', 8, 1),
(9, 'Golden Eagle Energy', 6, 'Aranday, Kabupaten Teluk Bintuni, Papua Bar., Indonesia', 91, 9104, 0, 'Aranday, Kabupaten Teluk Bintuni, Papua Bar., Indonesia', '-2.0822104', '133.25215070', '2018-07-11 11:11:08', 8, 1),
(10, 'PT. Esteka Binaindustrindo', 5, 'Kanikeh, Seram Utara, Kabupaten Maluku Tengah, Maluku, Indonesia', 81, 8103, 0, 'Unnamed Road, Kanikeh, Seram Utara, Kabupaten Maluku Tengah, Maluku, Indonesia', '-3.1131541', '129.44502809', '2018-07-11 11:13:15', 8, 1),
(11, 'Pengamanan Kantor Anabatic Technologies PT', 9, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Klp. Dua, Tangerang, Banten 15810, Indonesia', 36, 3671, 0, 'Jl. Scientia Boulevard Kav. U2, Summarecon Serpong, Curug Sangereng, Kelapa Dua, Curug Sangereng, Kl', '-6.2555742', '106.61990489', '2018-07-11 11:54:34', 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_regu`
--

CREATE TABLE `ganusa_regu` (
  `ID` int(11) NOT NULL,
  `nama_regu` varchar(255) NOT NULL,
  `klien` int(11) NOT NULL,
  `proyek` int(11) NOT NULL,
  `komandan_regu` int(11) NOT NULL,
  `pembuat` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_regu`
--

INSERT INTO `ganusa_regu` (`ID`, `nama_regu`, `klien`, `proyek`, `komandan_regu`, `pembuat`, `tgl_buat`, `status`) VALUES
(1, 'Regu Medan', 1, 1, 0, 2, '2017-04-13 22:01:11', 1),
(2, 'Regu Jawa Barat', 1, 1, 0, 2, '2017-04-13 22:02:14', 1),
(3, 'Regu Padang', 1, 1, 0, 2, '2017-04-13 22:02:25', 1),
(4, 'Regu Jakarta', 1, 1, 0, 2, '2017-04-13 22:02:55', 0),
(5, 'Regu Lombok', 1, 1, 0, 2, '2017-04-14 11:51:55', 1),
(29, 'Regu Jakarta', 4, 5, 0, 26, '2018-11-30 14:01:34', 1),
(30, 'regu baru', 4, 4, 0, 26, '2018-11-30 14:12:39', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_regu_anggota`
--

CREATE TABLE `ganusa_regu_anggota` (
  `ID` int(11) NOT NULL,
  `klien` int(11) NOT NULL,
  `proyek` int(11) NOT NULL,
  `regu` int(11) NOT NULL,
  `satpam` int(11) NOT NULL,
  `pembuat` int(11) NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_regu_anggota`
--

INSERT INTO `ganusa_regu_anggota` (`ID`, `klien`, `proyek`, `regu`, `satpam`, `pembuat`, `tgl_buat`, `status`) VALUES
(1, 1, 1, 4, 1, 2, '2017-04-13 22:35:14', 0),
(2, 1, 1, 4, 2, 2, '2017-04-13 22:35:18', 0),
(3, 1, 1, 4, 3, 2, '2017-04-13 22:35:23', 0),
(4, 1, 1, 1, 4, 2, '2017-04-13 22:35:37', 0),
(5, 1, 1, 1, 7, 2, '2017-04-13 22:35:38', 0),
(6, 1, 1, 1, 5, 2, '2017-04-13 22:35:39', 0),
(7, 1, 1, 1, 8, 2, '2017-04-13 22:35:40', 0),
(8, 1, 1, 1, 6, 2, '2017-04-13 22:35:41', 0),
(9, 1, 1, 5, 9, 2, '2017-04-14 11:52:03', 0),
(10, 1, 1, 5, 10, 2, '2017-04-14 11:52:04', 0),
(11, 1, 1, 3, 11, 2, '2017-04-14 11:52:09', 0),
(12, 1, 1, 3, 13, 2, '2017-04-14 11:52:11', 0),
(13, 1, 1, 3, 12, 2, '2017-04-14 11:52:12', 0),
(14, 1, 1, 7, 16, 4, '2017-04-18 18:14:46', 0),
(15, 1, 1, 7, 17, 4, '2017-04-18 18:14:48', 0),
(16, 1, 1, 7, 18, 4, '2017-04-18 18:14:50', 0),
(17, 1, 1, 6, 14, 4, '2017-04-18 18:14:57', 0),
(18, 1, 1, 6, 15, 4, '2017-04-18 18:14:59', 0),
(19, 1, 1, 2, 21, 3, '2017-05-09 22:39:17', 0),
(20, 1, 1, 2, 19, 3, '2017-05-09 22:39:18', 0),
(21, 1, 1, 2, 20, 3, '2017-05-09 22:39:19', 0),
(22, 1, 1, 2, 22, 3, '2017-05-09 23:01:04', 0),
(23, 1, 1, 8, 25, 3, '2017-05-10 09:10:36', 0),
(24, 1, 1, 8, 23, 3, '2017-05-10 09:10:37', 0),
(25, 1, 1, 8, 24, 3, '2017-05-10 09:10:37', 0),
(26, 1, 1, 4, 21, 2, '2017-05-22 10:11:28', 0),
(27, 1, 1, 4, 22, 2, '2017-05-22 10:11:29', 0),
(28, 1, 1, 4, 19, 2, '2017-05-22 10:11:30', 0),
(29, 1, 1, 4, 20, 2, '2017-05-22 10:11:31', 0),
(30, 1, 1, 4, 27, 2, '2017-05-22 10:30:30', 1),
(31, 1, 1, 4, 26, 2, '2017-05-22 10:30:32', 0),
(32, 2, 1, 9, 29, 2, '2017-05-23 11:24:53', 1),
(33, 2, 1, 9, 28, 2, '2017-05-23 11:24:54', 0),
(34, 2, 1, 9, 30, 2, '2017-05-23 11:24:55', 1),
(35, 2, 1, 9, 31, 2, '2017-05-23 11:24:56', 1),
(135, 2, 1, 9, 22, 11, '2018-11-30 11:04:17', 0),
(136, 4, 4, 15, 1, 11, '2018-11-30 13:27:50', 0),
(137, 4, 4, 15, 22, 11, '2018-11-30 13:27:53', 0),
(138, 4, 4, 15, 1, 26, '2018-11-30 13:36:50', 1),
(139, 3, 2, 10, 22, 26, '2018-11-30 13:37:04', 1),
(140, 3, 2, 11, 15, 26, '2018-11-30 13:37:10', 1),
(141, 3, 2, 12, 8, 26, '2018-11-30 13:37:16', 0),
(142, 4, 3, 17, 25, 26, '2018-11-30 13:37:23', 1),
(143, 4, 4, 15, 26, 26, '2018-11-30 13:37:43', 0),
(144, 4, 4, 15, 11, 26, '2018-11-30 13:37:45', 0),
(145, 4, 4, 15, 13, 26, '2018-11-30 13:37:46', 0),
(146, 4, 4, 15, 17, 26, '2018-11-30 13:37:49', 0),
(147, 3, 2, 10, 20, 26, '2018-11-30 13:37:54', 0),
(148, 3, 2, 10, 4, 26, '2018-11-30 13:37:55', 0),
(149, 3, 2, 10, 24, 26, '2018-11-30 13:37:57', 0),
(150, 3, 2, 10, 21, 26, '2018-11-30 13:37:59', 0),
(151, 3, 2, 11, 19, 26, '2018-11-30 13:38:03', 0),
(152, 3, 2, 11, 23, 26, '2018-11-30 13:38:05', 0),
(153, 3, 2, 11, 18, 26, '2018-11-30 13:38:06', 0),
(154, 3, 2, 11, 9, 26, '2018-11-30 13:38:08', 0),
(155, 3, 2, 12, 12, 26, '2018-11-30 13:38:13', 0),
(156, 3, 2, 12, 16, 26, '2018-11-30 13:38:14', 0),
(157, 3, 2, 12, 2, 26, '2018-11-30 13:38:17', 0),
(158, 4, 3, 17, 14, 26, '2018-11-30 13:38:21', 0),
(159, 4, 3, 17, 3, 26, '2018-11-30 13:38:23', 0),
(160, 4, 3, 17, 10, 26, '2018-11-30 13:38:24', 0),
(161, 3, 2, 12, 8, 26, '2018-11-30 13:44:46', 1),
(162, 0, 0, 0, 4, 26, '2018-11-30 13:48:06', 1),
(163, 4, 4, 30, 4, 26, '2018-11-30 14:17:19', 1),
(164, 4, 4, 30, 26, 26, '2018-11-30 14:17:24', 1),
(165, 4, 4, 30, 11, 26, '2018-11-30 14:17:29', 1),
(166, 4, 4, 30, 17, 26, '2018-11-30 14:17:31', 1),
(167, 4, 5, 29, 1, 26, '2018-11-30 14:17:40', 1),
(168, 4, 5, 29, 13, 26, '2018-11-30 14:17:42', 1),
(169, 4, 5, 29, 20, 26, '2018-11-30 14:17:43', 1),
(170, 4, 5, 29, 24, 26, '2018-11-30 14:17:45', 1),
(171, 1, 1, 2, 6, 26, '2018-11-30 14:17:50', 1),
(172, 1, 1, 2, 21, 26, '2018-11-30 14:17:53', 1),
(173, 1, 1, 2, 19, 26, '2018-11-30 14:17:54', 1),
(174, 1, 1, 2, 23, 26, '2018-11-30 14:17:56', 1),
(175, 1, 1, 5, 22, 26, '2018-11-30 14:18:01', 1),
(176, 1, 1, 5, 18, 26, '2018-11-30 14:18:05', 1),
(177, 1, 1, 5, 7, 26, '2018-11-30 14:18:06', 1),
(178, 1, 1, 5, 9, 26, '2018-11-30 14:18:07', 1),
(179, 1, 1, 1, 15, 26, '2018-11-30 14:18:16', 1),
(180, 1, 1, 1, 12, 26, '2018-11-30 14:18:18', 1),
(181, 1, 1, 1, 16, 26, '2018-11-30 14:18:19', 1),
(182, 1, 1, 1, 2, 26, '2018-11-30 14:18:20', 1),
(183, 1, 1, 3, 8, 26, '2018-11-30 14:18:26', 1),
(184, 1, 1, 3, 14, 26, '2018-11-30 14:18:28', 1),
(185, 1, 1, 3, 3, 26, '2018-11-30 14:18:29', 1),
(186, 1, 1, 3, 10, 26, '2018-11-30 14:18:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_sosmed_komentar`
--

CREATE TABLE `ganusa_sosmed_komentar` (
  `ID` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_string` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_sosmed_komentar`
--

INSERT INTO `ganusa_sosmed_komentar` (`ID`, `id_status`, `id_personil`, `id_admin`, `komentar`, `tanggal`, `tanggal_string`) VALUES
(1, 1, 2, 0, 'hape dodi buatan cibaduyut', '2017-04-14 11:34:47', '14/04/2017, 11:34'),
(2, 3, 16, 0, 'mantaps bg', '2017-04-21 00:15:09', '21/04/2017, 00:15'),
(3, 4, 1, 0, 'asik  euy Di Garut', '2017-05-08 15:05:34', '08/05/2017, 15:05'),
(4, 5, 16, 0, 'mantapppssss', '2017-05-11 13:28:28', '11/05/2017, 13:28'),
(5, 7, 53, 0, 'sudah lama ya...', '2018-06-28 14:30:39', '28/06/2018, 14:30'),
(6, 10, 53, 0, 'bener2 abstrak', '2018-07-05 17:56:13', '05/07/2018, 17:56'),
(7, 17, 67, 0, 'gahhabbaajanana', '2018-11-29 18:40:14', '29/11/2018, 18:40'),
(8, 18, 67, 0, 'wkwkwkwkwkwk', '2018-11-29 21:37:06', '29/11/2018, 21:37'),
(9, 18, 67, 0, '123344455666', '2018-11-29 21:37:58', '29/11/2018, 21:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_sosmed_status`
--

CREATE TABLE `ganusa_sosmed_status` (
  `ID` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `tipe` text NOT NULL,
  `text` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_string` text NOT NULL,
  `resource` text NOT NULL,
  `jml_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_sosmed_status`
--

INSERT INTO `ganusa_sosmed_status` (`ID`, `id_personil`, `id_admin`, `is_admin`, `tipe`, `text`, `tanggal`, `tanggal_string`, `resource`, `jml_komentar`) VALUES
(1, 1, 0, 0, 'TEXT', 'Persiapan menuju Garut', '2017-04-14 11:32:39', '14/04/2017, 11:32', '0', 1),
(2, 1, 0, 0, 'FOTO', 'Dodi lagi bingung kok di app store hape nya ndak ada aplikasi PT Garda Nusantara Satu', '2017-04-14 11:33:53', '14/04/2017, 11:33', 'sosmed_foto/1/58f051319f212.png', 0),
(3, 1, 0, 0, 'FOTO', 'persiapan perjalanan jauh makan sop kambing favorit. yummy ????', '2017-04-14 12:42:45', '14/04/2017, 12:42', 'sosmed_foto/1/58f061551e584.png', 1),
(4, 1, 0, 0, 'FOTO', 'Naik motor pinjaman,  tiba tiba bensin habis sekarang terpaksa menunggu bantuan bensin datang....', '2017-04-15 20:26:10', '15/04/2017, 20:26', 'sosmed_foto/1/58f21f721574c.png', 1),
(5, 19, 0, 0, 'FOTO', 'lenovo ghjjjkk', '2017-05-10 01:30:33', '10/05/2017, 01:30', 'sosmed_foto/19/59120ac9a8748.png', 1),
(6, 1, 0, 0, 'TEXT', 'perjalanan ke cikeas', '2017-07-15 16:20:16', '15/07/2017, 16:20', '0', 0),
(7, 49, 0, 0, 'FOTO', 'ayo sukseskan Inpamindo 2018', '2018-01-23 23:24:59', '23/01/2018, 23:24', 'sosmed_foto/49/5a6761db9c2ee.png', 1),
(8, 53, 0, 0, 'FOTO', 'Alhamdulillah sehat wal afiat', '2018-06-28 14:30:03', '28/06/2018, 14:30', 'sosmed_foto/53/5b348e7b9b7d2.png', 0),
(9, 53, 0, 0, 'TEXT', 'Tessssssssssds', '2018-07-04 10:12:50', '04/07/2018, 10:12', '0', 0),
(10, 53, 0, 0, 'FOTO', 'Belajar foto abstrak ????????????', '2018-07-05 09:46:26', '05/07/2018, 09:46', 'sosmed_foto/53/5b3d8682b754c.png', 1),
(11, 62, 0, 0, 'TEXT', 'selamat pagi indonenesi,  semoga alloh selalu melindungi kita semua', '2018-07-06 08:08:00', '06/07/2018, 08:08', '0', 0),
(12, 62, 0, 0, 'TEXT', 'selamat pagi indonesia semangat berjuang indonesia tetap jaya', '2018-07-06 08:09:39', '06/07/2018, 08:09', '0', 0),
(13, 62, 0, 0, 'FOTO', 'pagi indonesia selamat bekerja', '2018-07-06 08:43:27', '06/07/2018, 08:43', 'sosmed_foto/62/5b3ec93f17f25.png', 0),
(14, 66, 0, 0, 'TEXT', 'selamat sore indonesia', '2018-07-06 15:22:23', '06/07/2018, 15:22', '0', 0),
(15, 64, 0, 0, 'TEXT', 'test1234567', '2018-07-06 15:23:17', '06/07/2018, 15:23', '0', 0),
(16, 66, 0, 0, 'TEXT', 'testhshsjsjsj', '2018-07-06 19:13:42', '06/07/2018, 19:13', '0', 0),
(17, 19, 0, 0, 'TEXT', 'testgrgerggegreg', '2018-07-30 11:56:14', '30/07/2018, 11:56', '0', 1),
(18, 101, 0, 0, 'TEXT', 'tes tes tes tes', '2018-11-29 21:36:00', '29/11/2018, 21:36', '0', 2),
(19, 101, 0, 0, 'FOTO', 'R.A.P.T.O.R  T.E.A.M', '2018-11-29 21:40:05', '29/11/2018, 21:40', 'sosmed_foto/101/5bfffa456df35.png', 0),
(20, 101, 0, 0, 'FOTO', 'raptor team', '2018-11-29 21:43:15', '29/11/2018, 21:43', 'sosmed_foto/101/5bfffb03ed163.png', 0),
(21, 67, 0, 0, 'TEXT', 'test dan komandan', '2018-11-29 21:45:18', '29/11/2018, 21:45', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_sosmed_status_subscribe`
--

CREATE TABLE `ganusa_sosmed_status_subscribe` (
  `ID` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_sosmed_status_subscribe`
--

INSERT INTO `ganusa_sosmed_status_subscribe` (`ID`, `id_status`, `id_personil`, `id_admin`) VALUES
(1, 1, 2, 0),
(2, 3, 16, 0),
(3, 4, 1, 0),
(4, 5, 16, 0),
(5, 7, 53, 0),
(6, 10, 53, 0),
(7, 17, 67, 0),
(9, 18, 67, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_user_grouping`
--

CREATE TABLE `ganusa_user_grouping` (
  `kode_user_group` int(3) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `id_level` varchar(10) NOT NULL,
  `leveling` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_user_grouping`
--

INSERT INTO `ganusa_user_grouping` (`kode_user_group`, `user_role`, `id_level`, `leveling`) VALUES
(0, 'Admin JN1', '0', 'Super Admin'),
(1, 'BUJP', '1', 'Pimpinan'),
(2, 'BUJP', '2', 'Finance'),
(3, 'BUJP', '3', 'Admin'),
(4, 'BUJP', '4', 'Operasional Staff'),
(5, 'BUJP', '5', 'HRD Staff'),
(6, 'Korwil', '6', 'Pimpinan'),
(7, 'Korwil', '7', 'Finance'),
(8, 'Korwil', '8', 'Admin'),
(9, 'Korwil', '9', 'Operasional Staff'),
(10, 'Korwil', '10', 'HRD Staff'),
(11, 'Manager Security', '11', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganusa_zona`
--

CREATE TABLE `ganusa_zona` (
  `id_zona` int(20) NOT NULL,
  `id_proyek` varchar(75) NOT NULL,
  `zona` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganusa_zona`
--

INSERT INTO `ganusa_zona` (`id_zona`, `id_proyek`, `zona`) VALUES
(1, '11', 'Pos Satpam Depan'),
(2, '11', 'Lantai 7 Graha Anabatic'),
(3, '11', 'Toilet Lantai 3');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ganusa_absensi`
--
ALTER TABLE `ganusa_absensi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_admin`
--
ALTER TABLE `ganusa_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_cabang`
--
ALTER TABLE `ganusa_cabang`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_device`
--
ALTER TABLE `ganusa_device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indeks untuk tabel `ganusa_harga_pulsa`
--
ALTER TABLE `ganusa_harga_pulsa`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_hr_absensi`
--
ALTER TABLE `ganusa_hr_absensi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_hr_departemen`
--
ALTER TABLE `ganusa_hr_departemen`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `kode_divisi` (`kode_divisi`);

--
-- Indeks untuk tabel `ganusa_hr_divisi`
--
ALTER TABLE `ganusa_hr_divisi`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `ganusa_hr_jadwal_kerja`
--
ALTER TABLE `ganusa_hr_jadwal_kerja`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_hr_karyawan`
--
ALTER TABLE `ganusa_hr_karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `ganusa_hr_komponen_gaji`
--
ALTER TABLE `ganusa_hr_komponen_gaji`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_hr_shift`
--
ALTER TABLE `ganusa_hr_shift`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_kabupaten`
--
ALTER TABLE `ganusa_kabupaten`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_kecamatan`
--
ALTER TABLE `ganusa_kecamatan`
  ADD PRIMARY KEY (`KecamatanID`);

--
-- Indeks untuk tabel `ganusa_kelurahan`
--
ALTER TABLE `ganusa_kelurahan`
  ADD PRIMARY KEY (`KelurahanID`);

--
-- Indeks untuk tabel `ganusa_klien`
--
ALTER TABLE `ganusa_klien`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_kode_absensi`
--
ALTER TABLE `ganusa_kode_absensi`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `ganusa_kode_patroli`
--
ALTER TABLE `ganusa_kode_patroli`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `ganusa_laporan_isu_keamanan`
--
ALTER TABLE `ganusa_laporan_isu_keamanan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_notifikasi`
--
ALTER TABLE `ganusa_notifikasi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_panic_button`
--
ALTER TABLE `ganusa_panic_button`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_patroli`
--
ALTER TABLE `ganusa_patroli`
  ADD PRIMARY KEY (`id_patroli`);

--
-- Indeks untuk tabel `ganusa_pcp_regu`
--
ALTER TABLE `ganusa_pcp_regu`
  ADD PRIMARY KEY (`id_regu`);

--
-- Indeks untuk tabel `ganusa_pcp_unit`
--
ALTER TABLE `ganusa_pcp_unit`
  ADD PRIMARY KEY (`kode_unit`);

--
-- Indeks untuk tabel `ganusa_perpesanan`
--
ALTER TABLE `ganusa_perpesanan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_personil`
--
ALTER TABLE `ganusa_personil`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_pesan`
--
ALTER TABLE `ganusa_pesan`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_propinsi`
--
ALTER TABLE `ganusa_propinsi`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_proyek`
--
ALTER TABLE `ganusa_proyek`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_regu`
--
ALTER TABLE `ganusa_regu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_regu_anggota`
--
ALTER TABLE `ganusa_regu_anggota`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_sosmed_komentar`
--
ALTER TABLE `ganusa_sosmed_komentar`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_sosmed_status`
--
ALTER TABLE `ganusa_sosmed_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_sosmed_status_subscribe`
--
ALTER TABLE `ganusa_sosmed_status_subscribe`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ganusa_user_grouping`
--
ALTER TABLE `ganusa_user_grouping`
  ADD PRIMARY KEY (`kode_user_group`);

--
-- Indeks untuk tabel `ganusa_zona`
--
ALTER TABLE `ganusa_zona`
  ADD PRIMARY KEY (`id_zona`);

--
-- Indeks untuk tabel `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indeks untuk tabel `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indeks untuk tabel `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indeks untuk tabel `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indeks untuk tabel `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indeks untuk tabel `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indeks untuk tabel `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indeks untuk tabel `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indeks untuk tabel `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indeks untuk tabel `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indeks untuk tabel `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indeks untuk tabel `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ganusa_absensi`
--
ALTER TABLE `ganusa_absensi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT untuk tabel `ganusa_admin`
--
ALTER TABLE `ganusa_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `ganusa_cabang`
--
ALTER TABLE `ganusa_cabang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ganusa_harga_pulsa`
--
ALTER TABLE `ganusa_harga_pulsa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `ganusa_hr_absensi`
--
ALTER TABLE `ganusa_hr_absensi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ganusa_hr_jadwal_kerja`
--
ALTER TABLE `ganusa_hr_jadwal_kerja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `ganusa_hr_komponen_gaji`
--
ALTER TABLE `ganusa_hr_komponen_gaji`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ganusa_hr_shift`
--
ALTER TABLE `ganusa_hr_shift`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ganusa_kabupaten`
--
ALTER TABLE `ganusa_kabupaten`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9473;

--
-- AUTO_INCREMENT untuk tabel `ganusa_kecamatan`
--
ALTER TABLE `ganusa_kecamatan`
  MODIFY `KecamatanID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9471042;

--
-- AUTO_INCREMENT untuk tabel `ganusa_kelurahan`
--
ALTER TABLE `ganusa_kelurahan`
  MODIFY `KelurahanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10081887;

--
-- AUTO_INCREMENT untuk tabel `ganusa_klien`
--
ALTER TABLE `ganusa_klien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `ganusa_laporan_isu_keamanan`
--
ALTER TABLE `ganusa_laporan_isu_keamanan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `ganusa_notifikasi`
--
ALTER TABLE `ganusa_notifikasi`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `ganusa_panic_button`
--
ALTER TABLE `ganusa_panic_button`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT untuk tabel `ganusa_patroli`
--
ALTER TABLE `ganusa_patroli`
  MODIFY `id_patroli` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ganusa_pcp_regu`
--
ALTER TABLE `ganusa_pcp_regu`
  MODIFY `id_regu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ganusa_perpesanan`
--
ALTER TABLE `ganusa_perpesanan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ganusa_personil`
--
ALTER TABLE `ganusa_personil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `ganusa_pesan`
--
ALTER TABLE `ganusa_pesan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `ganusa_propinsi`
--
ALTER TABLE `ganusa_propinsi`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `ganusa_proyek`
--
ALTER TABLE `ganusa_proyek`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ganusa_regu`
--
ALTER TABLE `ganusa_regu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `ganusa_regu_anggota`
--
ALTER TABLE `ganusa_regu_anggota`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT untuk tabel `ganusa_sosmed_komentar`
--
ALTER TABLE `ganusa_sosmed_komentar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ganusa_sosmed_status`
--
ALTER TABLE `ganusa_sosmed_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `ganusa_sosmed_status_subscribe`
--
ALTER TABLE `ganusa_sosmed_status_subscribe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3559;

--
-- AUTO_INCREMENT untuk tabel `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ganusa_hr_departemen`
--
ALTER TABLE `ganusa_hr_departemen`
  ADD CONSTRAINT `fk_departemen_divisi` FOREIGN KEY (`kode_divisi`) REFERENCES `ganusa_hr_divisi` (`kode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
