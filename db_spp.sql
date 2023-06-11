-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2023 pada 15.56
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `code_class` varchar(10) NOT NULL,
  `name_class` varchar(10) NOT NULL,
  `type_class` varchar(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `code_student` varchar(10) NOT NULL,
  `code_class` varchar(10) NOT NULL,
  `code_year` varchar(10) NOT NULL,
  `name_student` varchar(50) NOT NULL,
  `nisn_student` varchar(20) NOT NULL,
  `parent_student` varchar(20) NOT NULL,
  `phone_student` varchar(15) NOT NULL,
  `address_student` text NOT NULL,
  `date_birth_student` date NOT NULL,
  `gender_student` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teaching_year`
--

CREATE TABLE `teaching_year` (
  `id` int(11) NOT NULL,
  `code_year` varchar(10) NOT NULL,
  `description` varchar(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code_class`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms` (`code_class`),
  ADD KEY `teaching_year` (`code_year`);

--
-- Indeks untuk tabel `teaching_year`
--
ALTER TABLE `teaching_year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code_year`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `teaching_year`
--
ALTER TABLE `teaching_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `classrooms` FOREIGN KEY (`code_class`) REFERENCES `classrooms` (`code_class`),
  ADD CONSTRAINT `teaching_year` FOREIGN KEY (`code_year`) REFERENCES `teaching_year` (`code_year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
