-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2023 pada 15.18
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
-- Struktur dari tabel `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `code_bill` varchar(100) NOT NULL,
  `code_class` varchar(20) NOT NULL,
  `code_student` varchar(20) NOT NULL,
  `code_payment` varchar(20) NOT NULL,
  `status_bill` int(11) NOT NULL DEFAULT 0,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `billing`
--

INSERT INTO `billing` (`id`, `code_bill`, `code_class`, `code_student`, `code_payment`, `status_bill`, `created_by`, `created_at`) VALUES
(1, 'C01PY01-202306|202312_06', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:31'),
(2, 'C01PY01-202306|202312_07', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:31'),
(3, 'C01PY01-202306|202312_08', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:31'),
(4, 'C01PY01-202306|202312_09', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:31'),
(5, 'C01PY01-202306|202312_10', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:32'),
(6, 'C01PY01-202306|202312_11', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:32'),
(7, 'C01PY01-202306|202312_12', 'C01', '', 'PY01', 0, 'USR01', '2023-06-20 19:50:32');

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
(1, 'STD203818', 'C01', 'TY02', 'Kartika Hariyah', '3809635917', 'Patricia Agustina H.', '0406 3360 8029', 'Gg. Baranang Siang No. 9, Pangkal Pinang 13647, Malut', '2012-08-02', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:07', 1),
(2, 'STD313446', 'C01', 'TY02', 'Laila Haryanti', '2731254863', 'Darimin Puspasari Ir', '(+62) 617 1818 ', 'Jln. Raden No. 670, Pekalongan 77447, NTT', '1996-05-04', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:07', 1),
(3, 'STD924230', 'C07', 'TY02', 'Jagaraga Simanjuntak', '8780109451', 'Nabila Astuti drg.', '(+62) 662 6643 ', 'Kpg. Lumban Tobing No. 384, Binjai 24114, Kaltim', '1994-11-15', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:07', 1),
(4, 'STD746811', 'C04', 'TY01', 'Betania Mayasari', '4800860529', 'Sarah Sinaga Hj.', '0812 9795 213', 'Gg. Baranang Siang No. 853, Madiun 28176, Aceh', '2012-10-09', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:08', 1),
(5, 'STD164301', 'C07', 'TY02', 'Putri Usada', '3847637903', 'Karna Agustina dr.', '0730 4013 372', 'Kpg. Bah Jaya No. 568, Tangerang 70914, NTB', '2018-11-21', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:09', 1),
(6, 'STD248098', 'C08', 'TY01', 'Oliva Namaga', '5630828920', 'Prayitna Nainggolan ', '(+62) 324 2973 ', 'Jr. Veteran No. 247, Bukittinggi 28756, Jabar', '1978-12-05', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:10', 1),
(7, 'STD214167', 'C06', 'TY02', 'Rahmi Sinaga', '3826467829', 'Yuni Wahyudin Drs.', '0238 7118 795', 'Jr. Ciumbuleuit No. 506, Pariaman 30080, Kalsel', '2015-03-30', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:10', 1),
(8, 'STD993729', 'C07', 'TY02', 'Digdaya Winarsih', '6152150956', 'Alika Purwanti dr.', '0742 7887 594', 'Jr. Zamrud No. 786, Gunungsitoli 14325, Kepri', '2012-10-21', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:12', 1),
(9, 'STD527029', 'C05', 'TY02', 'Viktor Oktaviani', '3797807221', 'Rahman Pudjiastuti d', '023 4791 3357', 'Kpg. Bahagia  No. 358, Bitung 57091, Sumsel', '2016-07-24', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-20 18:44:13', 1),
(10, 'STD573085', 'C03', 'TY02', 'Karya Anggriawan', '3749626140', 'Mustika Setiawan Drs', '(+62) 603 2160 ', 'Psr. Yos No. 407, Tangerang 91006, Aceh', '1992-03-25', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:14', 1),
(11, 'STD419482', 'C07', 'TY01', 'Johan Rahimah', '8756514159', 'Devi Wahyudin Hj.', '0943 0259 0555', 'Kpg. Wahid No. 233, Manado 39051, Lampung', '1986-11-27', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-20 18:44:14', 1),
(12, 'STD990601', 'C02', 'TY01', 'Dagel Nasyidah', '1047726114', 'Zaenab Palastri dr.', '(+62) 967 0606 ', 'Jr. Moch. Toha No. 807, Tebing Tinggi 86516, Riau', '2005-01-03', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-20 18:44:14', 1),
(13, 'STD515564', 'C06', 'TY02', 'Cinta Pratiwi', '1069452091', 'Simon Zulkarnain Dr.', '026 0377 393', 'Dk. Suryo Pranoto No. 255, Cilegon 16236, NTT', '2007-03-16', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:14', 1),
(14, 'STD852875', 'C01', 'TY02', 'Ibrani Thamrin', '3816155802', 'Edi Wahyuni drg.', '0878 1070 228', 'Gg. Abang No. 101, Tanjungbalai 56263, Sultra', '2003-04-18', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:15', 1),
(15, 'STD223267', 'C02', 'TY02', 'Jumadi Siregar', '4547930625', 'Rama Mustofa Dr.', '021 2003 5631', 'Gg. Kebonjati No. 274, Samarinda 84567, Kepri', '1993-12-10', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:15', 1),
(16, 'STD446701', 'C06', 'TY01', 'Cinthia Aryani', '5391986903', 'Sadina Zulaika drg.', '(+62) 848 621 6', 'Dk. Honggowongso No. 223, Pontianak 87584, Sultra', '2011-02-01', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:15', 1),
(17, 'STD349875', 'C06', 'TY02', 'Jagaraga Wibisono', '1172829966', 'Nilam Widiastuti H.', '(+62) 614 0183 ', 'Ki. Sunaryo No. 534, Sukabumi 41098, Kalteng', '1997-02-05', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:15', 1),
(18, 'STD260325', 'C06', 'TY02', 'Zaenab Widodo', '3427851573', 'Galiono Hasanah Dr.', '0932 4204 683', 'Kpg. Jagakarsa No. 582, Tarakan 15365, Jateng', '2003-03-27', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:15', 1),
(19, 'STD554765', 'C02', 'TY01', 'Rafid Haryanto', '4929541659', 'Ulva Firgantoro Dr.', '0360 1569 2283', 'Jr. Tentara Pelajar No. 885, Pematangsiantar 38912, Bali', '2023-02-12', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:16', 1),
(20, 'STD894809', 'C07', 'TY02', 'Makara Rajata', '9757334708', 'Latif Hastuti dr.', '(+62) 22 0667 9', 'Psr. Pahlawan No. 368, Pekanbaru 86987, NTT', '1987-02-24', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:16', 1),
(21, 'STD267144', 'C08', 'TY02', 'Arsipatra Lailasari', '9647779738', 'Agus Hastuti drg.', '0766 3355 277', 'Kpg. Lumban Tobing No. 917, Tidore Kepulauan 69550, Babel', '2010-06-13', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:16', 1),
(22, 'STD233932', 'C05', 'TY02', 'Gabriella Simanjuntak', '9551079488', 'Darimin Pratama Dr.', '(+62) 856 229 2', 'Kpg. R.M. Said No. 344, Palu 12785, Sulteng', '2009-04-09', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:16', 1),
(23, 'STD286278', 'C06', 'TY01', 'Ibrani Sinaga', '9338006666', 'Jessica Suwarno Dr.', '0922 8249 213', 'Gg. Pattimura No. 247, Bandung 16128, NTB', '2021-05-05', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:16', 1),
(24, 'STD569877', 'C07', 'TY02', 'Raden Thamrin', '5018495413', 'Zaenab Haryanti dr.', '022 4339 4197', 'Dk. Rajawali Timur No. 115, Langsa 80079, Sultra', '2015-08-09', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:17', 1),
(25, 'STD999110', 'C03', 'TY01', 'Sabrina Mansur', '7373875006', 'Joko Haryanti Dr.', '0915 8963 981', 'Kpg. Batako No. 851, Tual 50798, Gorontalo', '2001-01-09', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:17', 1);

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
-- Indeks untuk tabel `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
