-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2023 pada 03.01
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `no_daftar` varchar(255) DEFAULT NULL,
  `nama_daftar` varchar(255) DEFAULT NULL,
  `email_daftar` varchar(255) DEFAULT NULL,
  `pass_daftar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `barang_id`, `id_kategori`, `serial_number`, `nama_barang`, `tgl_masuk`, `foto`, `tipe`, `label`, `no_daftar`, `nama_daftar`, `email_daftar`, `pass_daftar`) VALUES
(1, 'BK001', 2, '81265446774', 'OrbitCCAN_103', '2023-07-02 20:28:59', '0', 'H1', 'OR-103', '081326917092', 'Kevin Arya Pradana', 'kevinaryapradana@gmail.com', 'CCANsmg103'),
(2, 'BK002', 2, '082182166392', 'OrbitCCAN_104', '2023-07-02 20:30:05', '0', 'A1', 'OR-104', '081363851540', 'SENO', 'zeno.zell@gmail.com', 'CCANsmg104'),
(3, 'BK003', 2, '081338862339', 'OrbitCCAN_111', '2023-07-02 20:31:02', '0', 'Z1', 'OR-111', '081228122071', 'JUNEDI', 'pradhista3@gmail.com', 'CCANsmg111'),
(4, 'BK004', 2, '081338862325', 'Tselhome-E834', '2023-07-02 20:32:13', '0', 'Z1', 'OR-112', '082133185558', 'MEKA PRIAMBUDHI', 'meksnayama@gmail.com', '53301368'),
(5, 'BK005', 2, '081338862210', 'Tselhome-E84D', '2023-07-02 20:33:08', '0', 'Z1', 'OR-113', '082142727536', 'RIO PRASETYO SANDY', 'riioprasetyo89@gmail.com', '53301616'),
(6, 'BK006', 2, '081226930102', 'Tselhome-7584', '2023-07-02 20:33:53', '0', 'Lite', 'OR-106', '', '', '', '81804369'),
(8, 'BK008', 2, '081338862972', 'Tselhome-D453', '2023-07-02 20:35:41', '0', 'Z1', 'OR-116', '082121299924', 'RIFDA AYU SARTIKA', '', '53250474'),
(9, 'BK009', 2, '081338862964', 'Tselhome-D422', '2023-07-02 20:36:43', '0', 'Z1', 'OR-117', '085100642626', 'ITA GAYUH GIYANTI', '', '53249989'),
(10, 'BK0010', 1, '', '', '2023-07-02 20:37:42', '0', '', 'MK-102', '', '', '', ''),
(11, 'BK0011', 1, '', '', '2023-07-02 20:37:56', '0', '', 'MK-103', '', '', '', ''),
(12, 'BK0012', 1, '', '', '2023-07-02 20:38:11', '0', '', 'MK-111', '', '', '', ''),
(13, 'BK0013', 1, '', '', '2023-07-02 20:38:33', '0', '', 'MK-112', '', '', '', ''),
(14, 'BK0014', 1, '', '', '2023-07-02 20:38:46', '0', '', 'MK-113', '', '', '', ''),
(15, 'BK0015', 1, '', '', '2023-07-02 20:39:07', '0', '', 'MK-114', '', '', '', ''),
(17, 'BK0016', 1, '', '', '2023-07-02 20:41:15', '0', '', 'MK-115', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Mikrotik'),
(2, 'Orbit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `no_inet` varchar(255) NOT NULL,
  `lok_pasang` varchar(255) NOT NULL,
  `alasan_pasang` varchar(255) NOT NULL,
  `no_tiket` varchar(255) NOT NULL,
  `no_pelanggan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `pinjam_id`, `id_anggota`, `barang_id`, `status`, `tgl_pinjam`, `tgl_kembali`, `nama_pelanggan`, `alamat_pelanggan`, `no_inet`, `lok_pasang`, `alasan_pasang`, `no_tiket`, `no_pelanggan`) VALUES
(11, 'PJ0011', '20840040', 'or-117', 'Di Kembalikan', '13-07-2023 11:15:14', '2023-07-13 11:19:06', 'Bambang Yudha', 'Jalan Taman Tawang', '4700074-0001614380', 'ATM Bank Mandiri', 'Gangguan Masal', 'IN157130563', '082225283295'),
(12, 'PJ0011', '20840040', 'MK-113', 'Di Kembalikan', '13-07-2023 11:15:14', '2023-07-13 11:19:06', 'Bambang Yudha', 'Jalan Taman Tawang', '4700074-0001614380', 'ATM Bank Mandiri', 'Gangguan Masal', 'IN157130563', '082225283295'),
(13, 'PJ0013', '20840040', 'OR-106', 'Di Kembalikan', '25-07-2023 14:31:10', '2023-07-25 14:34:10', 'Bambang Yudha', 'Jalan Taman Tawang', '4700074-0001614380', 'ATM Bank Mandiri', 'Gangguan Masal', 'IN157130563', '082225283295'),
(14, 'PJ0013', '20840040', 'MK-115', 'Di Kembalikan', '25-07-2023 14:31:10', '2023-07-25 14:34:10', 'Bambang Yudha', 'Jalan Taman Tawang', '4700074-0001614380', 'ATM Bank Mandiri', 'Gangguan Masal', 'IN157130563', '082225283295');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `id_anggota` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_gabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `id_anggota`, `username`, `password`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `nip`, `email`, `tgl_gabung`, `foto`) VALUES
(1, 'AG001', 'zenozell', '21232f297a57a5a743894a0e4a801fc3', 'Team Leader', 'SENO WAWAN BUDI SANTOSO', 'Semarang', '1984-11-20', 'Laki-Laki', 'GENUK', '081363851540', '20840040', 'zeno.zell@gmail.com', '2023-07-02', 'user_1688304382.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
