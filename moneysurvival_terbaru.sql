-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 05.49
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneysurvival`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_pengguna1` int(10) NOT NULL,
  `id_pengguna2` int(10) NOT NULL,
  `jumlah_hutang` int(10) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `id_hutang` int(10) NOT NULL,
  `tanggal_hutang` date NOT NULL,
  `tanggal_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelola_member`
--

CREATE TABLE `kelola_member` (
  `id_pengguna` int(10) NOT NULL,
  `status_sebelum` varchar(15) NOT NULL,
  `status_sesudah` varchar(15) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `tanggal_ubah` datetime NOT NULL,
  `id_perubahan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id_pengguna1` int(10) NOT NULL,
  `id_pengguna2` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `status_keuangan` varchar(20) NOT NULL,
  `id_kelompok` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_harian`
--

CREATE TABLE `pemasukan_harian` (
  `id_pengguna` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_pemasukan` varchar(255) NOT NULL,
  `jumlah_pemasukan` int(10) NOT NULL,
  `id_pemasukanharian` int(10) NOT NULL,
  `tanggal_pemasukan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan_harian`
--

INSERT INTO `pemasukan_harian` (`id_pengguna`, `kategori`, `nama_pemasukan`, `jumlah_pemasukan`, `id_pemasukanharian`, `tanggal_pemasukan`) VALUES
(4, 'Makan', '', 123456, 1, '2019-11-22'),
(4, 'Makan', '', 123456, 2, '2019-11-19'),
(4, 'fira', '', 1233123, 3, '2019-11-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan_rutin`
--

CREATE TABLE `pemasukan_rutin` (
  `id_pengguna` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_pemasukan` varchar(255) NOT NULL,
  `jumlah_pemasukan` int(10) NOT NULL,
  `id_pemasukanrutin` int(10) NOT NULL,
  `tanggal_pemasukan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan_rutin`
--

INSERT INTO `pemasukan_rutin` (`id_pengguna`, `kategori`, `nama_pemasukan`, `jumlah_pemasukan`, `id_pemasukanrutin`, `tanggal_pemasukan`) VALUES
(4, '', '', 1000000, 1, '2019-12-01'),
(4, 'Gaji', '', 1000000, 2, '2019-11-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_harian`
--

CREATE TABLE `pengeluaran_harian` (
  `id_pengguna` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` int(10) NOT NULL,
  `id_pengeluaranharian` int(10) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran_rutin`
--

CREATE TABLE `pengeluaran_rutin` (
  `id_pengguna` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` int(10) NOT NULL,
  `id_pengeluaranrutin` int(10) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `request`
--

CREATE TABLE `request` (
  `id_pengguna1` int(10) NOT NULL,
  `id_pengguna2` int(10) NOT NULL,
  `status_request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `request`
--

INSERT INTO `request` (`id_pengguna1`, `id_pengguna2`, `status_request`) VALUES
(4, 5, 'requested'),
(5, 4, 'requested');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_pengguna` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `saldo_awal` int(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `foto_profil` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_pengguna`, `nama`, `email`, `username`, `password`, `saldo_awal`, `status`, `foto_profil`) VALUES
(4, 'Fira Sukmanisa', 'firaayui26@gmail.com', 'firasukmanisa', '$2y$10$tvpqJa64RJs/ROMlZ.nQA.qsuhV61Y2c6SllD7IfS4ie/MBcW0KPK', 240000, 'active', 'default.png'),
(5, 'Dicky Fauzan', 'dickyfh@gmail.com', 'dickyfauzanh', '$2y$10$9aqQWPrrI466r8QO6Akw/Omq19pgqQqljZ1c9U73sRl.1ahdTuo9K', 120000, 'active', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD UNIQUE KEY `id_hutang` (`id_hutang`),
  ADD KEY `id_pengguna1` (`id_pengguna1`),
  ADD KEY `id_pengguna2` (`id_pengguna2`);

--
-- Indeks untuk tabel `kelola_member`
--
ALTER TABLE `kelola_member`
  ADD PRIMARY KEY (`id_perubahan`),
  ADD UNIQUE KEY `id_perubahan` (`id_perubahan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD UNIQUE KEY `id_kelompok` (`id_kelompok`),
  ADD KEY `id_pengguna1` (`id_pengguna1`),
  ADD KEY `id_pengguna2` (`id_pengguna2`);

--
-- Indeks untuk tabel `pemasukan_harian`
--
ALTER TABLE `pemasukan_harian`
  ADD PRIMARY KEY (`id_pemasukanharian`),
  ADD UNIQUE KEY `id_pemasukanrutin` (`id_pemasukanharian`),
  ADD KEY `fkidpengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pemasukan_rutin`
--
ALTER TABLE `pemasukan_rutin`
  ADD PRIMARY KEY (`id_pemasukanrutin`),
  ADD KEY `fk_id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengeluaran_harian`
--
ALTER TABLE `pengeluaran_harian`
  ADD PRIMARY KEY (`id_pengeluaranharian`),
  ADD UNIQUE KEY `id_pengeluaranharian` (`id_pengeluaranharian`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pengeluaran_rutin`
--
ALTER TABLE `pengeluaran_rutin`
  ADD PRIMARY KEY (`id_pengeluaranrutin`),
  ADD KEY `fk_idpengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id_kelompok` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasukan_harian`
--
ALTER TABLE `pemasukan_harian`
  MODIFY `id_pemasukanharian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pemasukan_rutin`
--
ALTER TABLE `pemasukan_rutin`
  MODIFY `id_pemasukanrutin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_harian`
--
ALTER TABLE `pengeluaran_harian`
  MODIFY `id_pengeluaranharian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran_rutin`
--
ALTER TABLE `pengeluaran_rutin`
  MODIFY `id_pengeluaranrutin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_ibfk_1` FOREIGN KEY (`id_pengguna1`) REFERENCES `user` (`id_pengguna`),
  ADD CONSTRAINT `hutang_ibfk_2` FOREIGN KEY (`id_pengguna2`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `kelola_member`
--
ALTER TABLE `kelola_member`
  ADD CONSTRAINT `kelola_member_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_pengguna`),
  ADD CONSTRAINT `kelola_member_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`id_pengguna1`) REFERENCES `user` (`id_pengguna`),
  ADD CONSTRAINT `kelompok_ibfk_2` FOREIGN KEY (`id_pengguna2`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pemasukan_harian`
--
ALTER TABLE `pemasukan_harian`
  ADD CONSTRAINT `fkidpengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pemasukan_rutin`
--
ALTER TABLE `pemasukan_rutin`
  ADD CONSTRAINT `fk_id_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran_harian`
--
ALTER TABLE `pengeluaran_harian`
  ADD CONSTRAINT `pengeluaran_harian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran_rutin`
--
ALTER TABLE `pengeluaran_rutin`
  ADD CONSTRAINT `fk_idpengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `user` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
