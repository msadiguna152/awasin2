-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Mar 2022 pada 02.02
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awasin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(100) NOT NULL,
  `jenis_golongan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id_golongan`, `nama_golongan`, `jenis_golongan`) VALUES
(1, 'Golongan 1', 'Jenis 1'),
(2, 'Golongan 2', 'Jenis 2'),
(3, 'Golongan 3', 'Jenis 3'),
(4, 'mmm', 'mmm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pemberi_izin` int(11) DEFAULT NULL,
  `tujuan` text NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(100) NOT NULL,
  `sampai` varchar(100) NOT NULL,
  `catatan` text,
  `foto` text,
  `lat` varchar(100) DEFAULT NULL,
  `long` varchar(100) DEFAULT NULL,
  `status_izin` varchar(100) NOT NULL,
  `waktu_pengajuan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin`
--

INSERT INTO `izin` (`id_izin`, `id_pegawai`, `id_pemberi_izin`, `tujuan`, `tanggal`, `dari`, `sampai`, `catatan`, `foto`, `lat`, `long`, `status_izin`, `waktu_pengajuan`) VALUES
(1, 17, 10, 'Periksa Kesehatan', '2022-03-17', '00:25', '00:25', 'Tidak Ada Catatan', NULL, NULL, NULL, 'Diterima', '2022-03-17 00:25:23'),
(2, 17, 9, 'Periksa Kesehatan', '2022-03-17', '01:17', '01:18', 'Tidak Ada Catatan', '11.jpg', NULL, NULL, 'Diterima', '2022-03-17 01:18:06'),
(3, 21, 10, 'belajar', '2022-03-17', '01:37', '07:37', 'Tidak Ada Catatan', NULL, NULL, NULL, 'Diterima', '2022-03-17 01:37:08'),
(4, 21, 7, 'belajar', '2022-03-17', '01:39', '01:39', NULL, NULL, NULL, NULL, '0', '2022-03-17 01:39:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `kd_jabatan` varchar(5) DEFAULT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `kd_jabatan`, `nama_jabatan`) VALUES
(1, 'KD01', 'Ketua Pengadilan Negeri Cikarang Kelas II'),
(2, 'KD01', 'Wakil Ketua Pengadilan Negeri Cikarang Kelas II'),
(3, 'KD02', 'Sekretaris'),
(4, 'KD02', 'Panitera'),
(5, 'KD03', 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `id_izin` int(11) NOT NULL,
  `lat` text,
  `long` text,
  `waktu` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` text NOT NULL,
  `no_hp` text NOT NULL,
  `keterangan_pegawai` varchar(50) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_golongan`, `id_jabatan`, `nip`, `nama_pegawai`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`, `no_hp`, `keterangan_pegawai`, `unit_kerja`) VALUES
(7, 1, 3, '19790528 200212 1 00', 'Eddy Daulatta Sembiring, Sh., Mh.', 'Laki-laki', 'Banjarmasin', '2022-03-15', '123', 'Aktif', '123', NULL, NULL),
(8, 1, 2, '19800410 200212 2 00', 'Asyrotun Mugiastuti, Sh.,Mh.', 'Perempuan', 'Banjarmasin', '2022-03-15', '111', 'Aktif', '111', NULL, NULL),
(9, 1, 1, '19650929 199003 1 00', 'Eddy Wiyono, Sh.,Mh.', 'Laki-laki', 'Banjarmasin', '2022-03-15', '11', 'Aktif', '11', NULL, NULL),
(10, 1, 4, '198204192002122001', 'Nurma Saofiane, Sh.', 'Perempuan', 'Banjarmasin', '2022-03-15', '111', 'Aktif', '111', NULL, NULL),
(17, 1, 5, '22', 'Muhammad Syahbani Adiguna', 'Laki-laki', 'Banjarmasin', '1996-11-23', 'Kurau', 'Aktif', '111', NULL, '111'),
(21, 1, 5, '33', 'Syahbani Adiguna', 'Laki-laki', 'Banjarmasin', '2022-03-17', 'Jln. Bina Bersama', 'Aktif', '6285245462942', NULL, 'Pengadilan Negeri Cikarang Kelas II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberi_izin`
--

CREATE TABLE `pemberi_izin` (
  `id_pemberi_izin` int(11) NOT NULL,
  `id_pegawai` varchar(100) NOT NULL,
  `status_izin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemberi_izin`
--

INSERT INTO `pemberi_izin` (`id_pemberi_izin`, `id_pegawai`, `status_izin`) VALUES
(1, '7', 'Aktif'),
(2, '8', 'Aktif'),
(3, '9', 'Aktif'),
(4, '10', 'Aktif'),
(5, '15', 'Aktif'),
(6, '16', 'Non Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto_pengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_pegawai`, `nama_pengguna`, `username`, `password`, `level`, `foto_pengguna`) VALUES
(1, NULL, 'Adiguna', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin', '1043605.jpg'),
(6, 7, 'Eddy Daulatta Sembiring, Sh., Mh.', '19790528 200212 1 001', 'cf9f88d6891e31c26034c5a49375cbdc', 'Pemberi Izin', 'default.png'),
(7, 8, 'Asyrotun Mugiastuti, Sh.,Mh.', '19800410 200212 2 002', '46e7e16bc1d16ec06696557bc7cc8677', 'Pemberi Izin', '11.jpg'),
(8, 9, 'Eddy Wiyono, Sh.,Mh.', '19650929 199003 1 001', '68a9bbf5b988a3156ebb248aa58dd43b', 'Pemberi Izin', 'default.png'),
(9, 10, 'Nurma Saofiane, Sh.', '198204192002122001', 'e73759aeb8335e010d1013069def6727', 'Pemberi Izin', '11.jpg'),
(10, 17, 'Muhammad Syahbani Adiguna', '22', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Pegawai', 'default.png'),
(14, 21, 'Syahbani Adiguna', '33', '182be0c5cdcd5072bb1864cdee4d3d6e', 'Pegawai', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pemberi_izin`
--
ALTER TABLE `pemberi_izin`
  ADD PRIMARY KEY (`id_pemberi_izin`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pemberi_izin`
--
ALTER TABLE `pemberi_izin`
  MODIFY `id_pemberi_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
