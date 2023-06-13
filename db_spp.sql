-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2023 pada 15.43
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

--
-- Dumping data untuk tabel `classrooms`
--

INSERT INTO `classrooms` (`id`, `code_class`, `name_class`, `type_class`, `created_by`, `created_at`, `isactive`) VALUES
(1, 'C01', 'I', 'A', 'USR04', '2023-06-13 16:41:09', 1),
(2, 'C02', 'I', 'B', 'USR04', '2023-06-13 16:41:15', 1),
(3, 'C03', 'I', 'C', 'USR03', '2023-06-13 16:41:45', 1),
(4, 'C04', 'II', 'B', 'USR03', '2023-06-13 16:41:58', 1),
(5, 'C05', 'III', 'A', 'USR03', '2023-06-13 16:42:06', 1),
(6, 'C06', 'II', 'A', 'USR02', '2023-06-13 16:42:47', 1),
(7, 'C07', 'III', 'B', 'USR02', '2023-06-13 16:44:50', 1),
(8, 'C08', 'II', 'C', 'USR02', '2023-06-13 16:45:03', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `code_payment` varchar(10) NOT NULL,
  `type_payment` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(10) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `code_payment`, `type_payment`, `description`, `nominal`, `created_at`, `created_by`, `isactive`) VALUES
(1, 'PY01', 'wajib', 'SPP', 250000, '2023-06-13 09:57:00', 'USR01', 1),
(3, 'PY03', 'optional', 'Iuaran', 5500, '2023-06-13 10:13:55', 'USR01', 1),
(4, 'PY04', 'optional', 'Buku LKS', 10000, '2023-06-13 11:11:30', 'USR01', 1);

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

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `code_student`, `code_class`, `code_year`, `name_student`, `nisn_student`, `parent_student`, `phone_student`, `address_student`, `date_birth_student`, `gender_student`, `password`, `created_by`, `created_at`, `isactive`) VALUES
(1, '', 'C01', 'TY01', 'naufal amajid', '12345', 'nanzy', '89523041741', 'Solo', '2000-03-02', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-13 18:11:59', 1),
(2, '', 'C02', 'TY01', 'Ridwan', '098123', 'Parno', '86213813123', 'Skh', '2023-06-12', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-13 18:14:35', 1),
(3, '', 'C04', 'TY02', 'test', '76512112', 'waw', '4353453453', 'Solo', '2023-06-06', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-13 18:16:32', 1),
(4, '', 'C06', 'TY02', 'awdasda', '12dsdasd', 'awdawd', '123123123', '123123asd', '2023-06-02', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-13 18:18:37', 1),
(5, '', 'C06', 'TY01', 'Test', '81256378', 'awdaw', '12321334342', 'asdwadawsadzcasdqewq12', '2023-06-12', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:14:45', 0),
(6, '', 'C05', 'TY02', 'dwd123', 'awda', '123sadasd', '1243423324', '12ssolo', '2023-06-12', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:15:28', 1),
(7, '', 'C05', 'TY02', 'dwd123', 'awd1132', '123sadasd', '1243423324', '12ssolo', '2023-06-12', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:16:01', 1),
(8, '', 'C03', 'TY01', '3123213213123', 'dasdqwd1', '12dasd', '323121243', 'ssdadwdqdqwd', '2023-06-06', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:18:03', 1),
(9, '', 'C03', 'TY01', 'asdwdwqd', 'awdwdawd', 'qwdqwdasd', '344234', '23423asd', '2023-06-06', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:18:54', 1),
(10, '', 'C03', 'TY01', 'asdwdwqd', '12323asdasd', 'qwdqwdasd', '344234', '23423asd', '2023-06-06', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-13 20:19:36', 1);

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
-- Dumping data untuk tabel `teaching_year`
--

INSERT INTO `teaching_year` (`id`, `code_year`, `description`, `created_by`, `created_at`, `isactive`) VALUES
(1, 'TY01', '2022-2023', 'USR01', '2023-06-13 16:38:07', 1),
(2, 'TY02', '2023-2024', 'USR04', '2023-06-13 16:38:44', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `code_users` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(15) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `code_users`, `fullname`, `username`, `password`, `role`, `created_by`, `created_at`, `isactive`) VALUES
(1, 'USR01', 'Nanzy', 'nanzy', '202cb962ac59075b964b07152d234b70', 'master', 'MariaDB', '2023-06-12 10:50:58', 1),
(2, 'USR02', 'Naufal Amajid', 'naufal', '202cb962ac59075b964b07152d234b70', 'admin', 'USR01', '2023-06-12 14:13:58', 1),
(3, 'USR03', 'Rengoku', 'kyojuro', '250cf8b51c773f3f8dc8b4be867a9a02', 'kepsek', 'USR01', '2023-06-12 14:15:08', 1),
(4, 'USR04', 'Hinata', 'shoyo', '202cb962ac59075b964b07152d234b70', 'admin', 'USR01', '2023-06-12 14:18:33', 1);

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
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code payment` (`code_payment`);

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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `teaching_year`
--
ALTER TABLE `teaching_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
