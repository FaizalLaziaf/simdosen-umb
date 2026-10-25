-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql109.infinityfree.com
-- Waktu pembuatan: 25 Okt 2026 pada 03.48
-- Versi server: 11.4.13-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_43151354_simdosen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nomor_registrasi` varchar(30) DEFAULT NULL,
  `nuptk` varchar(20) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `kepangkatan_id` int(11) DEFAULT NULL,
  `pendidikan_id` int(11) DEFAULT NULL,
  `rumpun_id` int(11) DEFAULT NULL,
  `serdos_id` int(11) DEFAULT NULL,
  `status_pegawai_id` int(11) DEFAULT NULL,
  `ikatan_id` int(11) DEFAULT NULL,
  `aktivitas_id` int(11) DEFAULT NULL,
  `penempatan_id` int(11) DEFAULT NULL,
  `fakultas_id` int(11) DEFAULT NULL,
  `prodi_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nomor_registrasi`, `nuptk`, `nama`, `nip`, `jabatan_id`, `kepangkatan_id`, `pendidikan_id`, `rumpun_id`, `serdos_id`, `status_pegawai_id`, `ikatan_id`, `aktivitas_id`, `penempatan_id`, `fakultas_id`, `prodi_id`) VALUES
(1, 'REG-0001', '1234567890120001', 'Contoh Dosen Satu, M.Kom', '198501012010011001', 3, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'REG-0002', '1234567890120002', 'Contoh Dosen Dua, M.T', '198702022012012002', 2, 2, 1, 2, 2, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama`) VALUES
(1, 'Teknik'),
(2, 'Ekonomi dan Bisnis'),
(3, 'Keguruan dan Ilmu Pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikatan_kerja`
--

CREATE TABLE `ikatan_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ikatan_kerja`
--

INSERT INTO `ikatan_kerja` (`id`, `nama`) VALUES
(1, 'Dosen Tetap'),
(2, 'Dosen Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_fungsional`
--

CREATE TABLE `jabatan_fungsional` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jabatan_fungsional`
--

INSERT INTO `jabatan_fungsional` (`id`, `nama`) VALUES
(1, 'Tenaga Pengajar'),
(2, 'Asisten Ahli'),
(3, 'Lektor'),
(4, 'Lektor Kepala'),
(5, 'Guru Besar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepangkatan`
--

CREATE TABLE `kepangkatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kepangkatan`
--

INSERT INTO `kepangkatan` (`id`, `nama`) VALUES
(1, 'III/a - Penata Muda'),
(2, 'III/b - Penata Muda Tk.I'),
(3, 'III/c - Penata'),
(4, 'III/d - Penata Tk.I'),
(5, 'IV/a - Pembina');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `nama`) VALUES
(1, 'S2'),
(2, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penempatan`
--

CREATE TABLE `penempatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `penempatan`
--

INSERT INTO `penempatan` (`id`, `nama`) VALUES
(1, 'Universitas Muhammadiyah Bengkulu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `nama`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Sipil'),
(3, 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumpun_ilmu`
--

CREATE TABLE `rumpun_ilmu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `rumpun_ilmu`
--

INSERT INTO `rumpun_ilmu` (`id`, `nama`) VALUES
(1, 'Ilmu Komputer'),
(2, 'Sistem Informasi'),
(3, 'Teknik Elektro'),
(4, 'Teknik Sipil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_aktivitas`
--

CREATE TABLE `status_aktivitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `status_aktivitas`
--

INSERT INTO `status_aktivitas` (`id`, `nama`) VALUES
(1, 'Aktif'),
(2, 'Tugas Belajar'),
(3, 'Cuti'),
(4, 'Pensiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pegawai`
--

CREATE TABLE `status_pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `status_pegawai`
--

INSERT INTO `status_pegawai` (`id`, `nama`) VALUES
(1, 'Dosen Tetap Yayasan'),
(2, 'PNS DPK'),
(3, 'Dosen Tidak Tetap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_serdos`
--

CREATE TABLE `status_serdos` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `status_serdos`
--

INSERT INTO `status_serdos` (`id`, `nama`) VALUES
(1, 'Sudah Serdos'),
(2, 'Belum Serdos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','operator','viewer') NOT NULL DEFAULT 'viewer',
  `api_key` char(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`, `api_key`, `created_at`) VALUES
(1, 'admin', '$2y$10$s8zL/glULl9D.569NjxdzuKW476au8JUfKuoaTm5v8AO08y6XtoQ6', 'Administrator', 'admin', '3f5bb50c1b68a348f322d5bd16457f3be007c1b0', '2026-10-25 07:12:59'),
(2, 'operator', '$2y$10$PSR9ZdKoOVCDDEJFnaYUyubf3Dw2YtnNOtT1fnyQem8D4TqRJcB0S', 'Operator Prodi', 'operator', '0557471ca87f306364ab1611efdb9b8ba94a640a', '2026-10-25 07:12:59'),
(3, 'viewer', '$2y$10$37shnPSC3RrEocJfKrDCtexNKErK9xCCGgqSkfkRvAKKNsTRkW4cW', 'Pimpinan (Viewer)', 'viewer', '25be536311bb0e07d250158995bbce6e33e16c96', '2026-10-25 07:12:59'),
(4, 'faizal', '$2y$12$OXQgo5hXKFfGyL1DlCKHpul1UjfELj2LUbOS9EWsUgGDHUCAlPo.y', 'faizalanugrah', 'admin', '13ccaaf2aa08902b95175da586b40c538f2d3f54', '2026-10-25 07:42:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomor_registrasi` (`nomor_registrasi`),
  ADD UNIQUE KEY `nuptk` (`nuptk`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `jabatan_id` (`jabatan_id`),
  ADD KEY `kepangkatan_id` (`kepangkatan_id`),
  ADD KEY `pendidikan_id` (`pendidikan_id`),
  ADD KEY `rumpun_id` (`rumpun_id`),
  ADD KEY `serdos_id` (`serdos_id`),
  ADD KEY `status_pegawai_id` (`status_pegawai_id`),
  ADD KEY `ikatan_id` (`ikatan_id`),
  ADD KEY `aktivitas_id` (`aktivitas_id`),
  ADD KEY `penempatan_id` (`penempatan_id`),
  ADD KEY `fakultas_id` (`fakultas_id`),
  ADD KEY `prodi_id` (`prodi_id`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `ikatan_kerja`
--
ALTER TABLE `ikatan_kerja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `kepangkatan`
--
ALTER TABLE `kepangkatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `rumpun_ilmu`
--
ALTER TABLE `rumpun_ilmu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `status_aktivitas`
--
ALTER TABLE `status_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `status_pegawai`
--
ALTER TABLE `status_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `status_serdos`
--
ALTER TABLE `status_serdos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `api_key` (`api_key`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ikatan_kerja`
--
ALTER TABLE `ikatan_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kepangkatan`
--
ALTER TABLE `kepangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `rumpun_ilmu`
--
ALTER TABLE `rumpun_ilmu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_aktivitas`
--
ALTER TABLE `status_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `status_pegawai`
--
ALTER TABLE `status_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_serdos`
--
ALTER TABLE `status_serdos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
