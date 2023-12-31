-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 04:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(11) NOT NULL,
  `code_bill` varchar(100) NOT NULL,
  `code_class` varchar(20) NOT NULL,
  `code_payment` varchar(20) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `code_bill`, `code_class`, `code_payment`, `created_by`, `created_at`, `isactive`) VALUES
(4, 'C04PY01-202306|202308', 'C04', 'PY01', 'USR01', '2023-06-23 23:11:13', 1),
(5, 'C01PY03-202306|202306', 'C01', 'PY03', 'USR02', '2023-06-25 09:35:09', 1),
(6, 'C02PY01-202306|202312', 'C02', 'PY01', 'USR02', '2023-06-25 09:49:18', 1),
(7, 'C02PY04-202306|202306', 'C02', 'PY04', 'USR01', '2023-06-25 19:04:22', 1),
(8, 'C08PY04-202306|202306', 'C08', 'PY04', 'USR02', '2023-06-26 09:54:23', 1);

--
-- Triggers `billing`
--
DELIMITER $$
CREATE TRIGGER `delete_all_transactions` AFTER DELETE ON `billing` FOR EACH ROW BEGIN
    DELETE FROM transactions
    WHERE transactions.code_bill LIKE CONCAT('%', OLD.code_bill, '%');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `code_class` varchar(10) NOT NULL,
  `name_class` varchar(10) NOT NULL,
  `type_class` varchar(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classrooms`
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
-- Table structure for table `payments`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `code_payment`, `type_payment`, `description`, `nominal`, `created_at`, `created_by`, `isactive`) VALUES
(1, 'PY01', 'wajib', 'SPP', 250000, '2023-06-13 09:57:00', 'USR01', 1),
(3, 'PY03', 'optional', 'Iuaran', 5500, '2023-06-13 10:13:55', 'USR01', 1),
(4, 'PY04', 'optional', 'Buku LKS', 10000, '2023-06-13 11:11:30', 'USR01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name_school` varchar(25) NOT NULL,
  `logo_school` text NOT NULL,
  `address_school` text NOT NULL,
  `since_school` varchar(5) NOT NULL,
  `message_dependent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name_school`, `logo_school`, `address_school`, `since_school`, `message_dependent`) VALUES
('SMP SAMPLE 1 SUKOHARJO', '', '', '2000', '\r\nAssalamualaikum Wr. Wb.\r\n\r\nSalam yang terhormat,\r\nBpk/Ibu (parent_student)\r\nSelaku wali murid dari Ananda (name_student) ((nisn_student))\r\nKelas (name_class) Tahun Ajaran (teaching_year)\r\n\r\n                        Kami berharap Anda dalam keadaan sehat dan sejahtera. Melalui pesan ini, kami ingin mengingatkan bahwa pembayaran biaya pendidikan untuk (name_student) belum diselesaikan.\r\nBerikut tagihan yang perlu diselesaikan :\r\n\r\n(content)\r\n\r\n                        Kami mengerti bahwa setiap orang memiliki keterbatasan dan kesibukan masing-masing, namun kami juga mengingatkan bahwa pembayaran ini penting untuk kelancaran kegiatan pendidikan dan peningkatan kualitas pembelajaran bagi (name_student).\r\n\r\n                        Kami sangat menghargai perhatian dan kerjasama Anda dalam menyelesaikan pembayaran ini secepatnya. Jika ada kendala atau pertanyaan terkait pembayaran, kami siap membantu Anda dengan senang hati.\r\n\r\nTerima kasih atas perhatian dan kerjasama Anda.\r\n\r\nWassalamualaikum Wr. Wb.\r\n\r\nHormat kami,\r\n(Administrasi (name_school))');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `code_student` varchar(30) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
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
(17, 'STD349875', 'C06', 'TY02', 'Jagaraga Wibisono', '1172829966', 'Nilam Widiastuti H.', '(+62) 614 0183 ', 'Ki. Sunaryo No. 534, Sukabumi 41098, Kalteng', '1997-02-05', '2', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'USR04', '2023-06-20 18:44:15', 1),
(18, 'STD260325', 'C06', 'TY02', 'Zaenab Widodo', '3427851573', 'Galiono Hasanah Dr.', '0932 4204 683', 'Kpg. Jagakarsa No. 582, Tarakan 15365, Jateng', '2003-03-27', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:15', 1),
(19, 'STD554765', 'C02', 'TY01', 'Rafid Haryanto', '4929541659', 'Ulva Firgantoro Dr.', '0360 1569 2283', 'Jr. Tentara Pelajar No. 885, Pematangsiantar 38912, Bali', '2023-02-12', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:16', 1),
(20, 'STD894809', 'C07', 'TY02', 'Makara Rajata', '9757334708', 'Latif Hastuti dr.', '(+62) 22 0667 9', 'Psr. Pahlawan No. 368, Pekanbaru 86987, NTT', '1987-02-24', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:16', 1),
(21, 'STD267144', 'C08', 'TY02', 'Arsipatra Lailasari', '9647779738', 'Agus Hastuti drg.', '0766 3355 277', 'Kpg. Lumban Tobing No. 917, Tidore Kepulauan 69550, Babel', '2010-06-13', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:16', 1),
(22, 'STD233932', 'C05', 'TY02', 'Gabriella Simanjuntak', '9551079488', 'Darimin Pratama Dr.', '(+62) 856 229 2', 'Kpg. R.M. Said No. 344, Palu 12785, Sulteng', '2009-04-09', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-20 18:44:16', 1),
(23, 'STD286278', 'C06', 'TY01', 'Ibrani Sinaga', '9338006666', 'Jessica Suwarno Dr.', '0922 8249 213', 'Gg. Pattimura No. 247, Bandung 16128, NTB', '2021-05-05', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:16', 1),
(24, 'STD569877', 'C07', 'TY02', 'Raden Thamrin', '5018495413', 'Zaenab Haryanti dr.', '022 4339 4197', 'Dk. Rajawali Timur No. 115, Langsa 80079, Sultra', '2015-08-09', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-20 18:44:17', 1),
(25, 'STD999110', 'C03', 'TY01', 'Sabrina Mansur', '7373875006', 'Joko Haryanti Dr.', '0915 8963 981', 'Kpg. Batako No. 851, Tual 50798, Gorontalo', '2001-01-09', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-20 18:44:17', 1),
(26, 'STD445377', 'C03', 'TY02', 'Rahmat Mulyani', '2119232235', 'Radika Pertiwi drg.', '(+62) 22 6779 2', 'Ki. Muwardi No. 729, Langsa 28814, Kaltara', '2003-05-20', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-23 23:03:28', 1),
(27, 'STD110658', 'C04', 'TY02', 'Lanang Andriani', '8692728332', 'Puspa Palastri dr.', '0624 8751 6096', 'Ki. Barasak No. 84, Tidore Kepulauan 21647, Kepri', '1983-12-01', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-23 23:03:28', 1),
(28, 'STD685510', 'C02', 'TY02', 'Artawan Purnawati', '2245709606', 'Kasiran Wahyudin Dr.', '(+62) 650 1101 ', 'Kpg. Baung No. 655, Semarang 27230, Sulut', '2010-03-03', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-23 23:03:28', 1),
(29, 'STD740716', 'C01', 'TY01', 'Mursita Wasita', '5744909096', 'Mahesa Novitasari dr', '0859 6904 747', 'Jr. B.Agam Dlm No. 320, Gunungsitoli 24349, NTT', '1993-01-19', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-23 23:03:29', 1),
(30, 'STD647843', 'C06', 'TY02', 'Dodo Lazuardi', '4635847077', 'Genta Mandasari Dr.', '020 1788 2717', 'Ki. Bakin No. 599, Banda Aceh 79463, Sumsel', '2008-09-28', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR01', '2023-06-23 23:03:30', 1),
(31, 'STD212962', 'C08', 'TY02', 'Hilda Aryani', '8989535958', 'Reksa Kusumo dr.', '0761 2273 8784', 'Ds. Suniaraja No. 972, Jambi 26379, Pabar', '1973-12-08', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-23 23:03:31', 1),
(32, 'STD331888', 'C07', 'TY02', 'Kairav Laksita', '2611830736', 'Muni Hardiansyah Drs', '(+62) 888 6342 ', 'Ds. Baabur Royan No. 920, Bontang 69331, Maluku', '2015-09-25', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-23 23:03:31', 1),
(33, 'STD818635', 'C02', 'TY01', 'Tami Laksita', '2448534877', 'Elvina Adriansyah dr', '0670 7879 300', 'Ki. Bagis Utama No. 613, Prabumulih 54562, Jabar', '1989-12-22', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-23 23:03:32', 1),
(34, 'STD843755', 'C08', 'TY01', 'Galang Sihombing', '7233257076', 'Aswani Astuti drg.', '(+62) 572 8365 ', 'Psr. Perintis Kemerdekaan No. 190, Sorong 72462, Kalsel', '2019-03-18', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-23 23:03:32', 1),
(35, 'STD786977', 'C07', 'TY02', 'Yahya Rajasa', '2960917251', 'Ayu Kurniawan Ir.', '0292 3254 713', 'Kpg. Daan No. 667, Subulussalam 95668, Kalbar', '1978-03-01', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR04', '2023-06-23 23:03:32', 1),
(36, 'STD183701', 'C03', 'TY01', 'Darmaji Budiman', '7427736089', 'Irma Irawan dr.', '(+62) 664 8287 ', 'Kpg. Padma No. 807, Tomohon 35148, Jambi', '1978-11-09', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-27 14:03:30', 1),
(37, 'STD618190', 'C07', 'TY01', 'Sadina Tamba', '2076530527', 'Simon Waluyo drg.', '(+62) 686 4787 ', 'Dk. Cemara No. 458, Tasikmalaya 42708, Kalteng', '1999-07-09', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-06-27 14:03:30', 1),
(38, 'STD425540', 'C01', 'TY02', 'Tina Usamah', '7350816964', 'Nadine Hassanah dr.', '0423 7806 3376', 'Psr. Kyai Gede No. 401, Surakarta 88698, Jambi', '1979-05-02', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-27 14:03:30', 1),
(39, 'STD483147', 'C03', 'TY02', 'Hasan Najmudin', '6626344979', 'Johan Saputra H.', '(+62) 609 6529 ', 'Psr. Kartini No. 253, Pekanbaru 53730, DKI', '1971-04-24', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-27 14:03:38', 1),
(40, 'STD301207', 'C08', 'TY02', 'Elisa Mardhiyah', '6046001814', 'Lutfan Latupono Drs.', '(+62) 812 611 8', 'Dk. Juanda No. 986, Padangsidempuan 85471, Kaltim', '1970-01-28', '1', '827ccb0eea8a706c4c34a16891f84e7b', 'USR03', '2023-06-27 14:03:38', 1),
(41, 'STD2023071', 'C02', 'TY01', 'Test ', '0987654321', 'Mr. Sample', '87623134534', 'Solo', '2020-01-10', '2', '827ccb0eea8a706c4c34a16891f84e7b', 'USR02', '2023-07-10 21:11:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teaching_year`
--

CREATE TABLE `teaching_year` (
  `id` int(11) NOT NULL,
  `code_year` varchar(10) NOT NULL,
  `description` varchar(10) NOT NULL,
  `created_by` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaching_year`
--

INSERT INTO `teaching_year` (`id`, `code_year`, `description`, `created_by`, `created_at`, `isactive`) VALUES
(1, 'TY01', '2022-2023', 'USR01', '2023-06-13 16:38:07', 1),
(2, 'TY02', '2023-2024', 'USR04', '2023-06-13 16:38:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `code_bill` varchar(100) NOT NULL,
  `code_payment` varchar(20) NOT NULL,
  `code_class` varchar(20) NOT NULL,
  `code_student` varchar(20) NOT NULL,
  `status_bill` int(11) NOT NULL DEFAULT 0,
  `payment_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `code_bill`, `code_payment`, `code_class`, `code_student`, `status_bill`, `payment_date`, `created_at`) VALUES
(38, 'C04PY01-202306|202308_06', 'PY01', 'C04', 'STD746811', 1, '0000-00-00 00:00:00', '2023-06-23 23:11:13'),
(39, 'C04PY01-202306|202308_07', 'PY01', 'C04', 'STD746811', 0, '0000-00-00 00:00:00', '2023-06-23 23:11:13'),
(40, 'C04PY01-202306|202308_08', 'PY01', 'C04', 'STD746811', 0, '0000-00-00 00:00:00', '2023-06-23 23:11:13'),
(41, 'C04PY01-202306|202308_06', 'PY01', 'C04', 'STD110658', 0, '0000-00-00 00:00:00', '2023-06-23 23:11:13'),
(42, 'C04PY01-202306|202308_07', 'PY01', 'C04', 'STD110658', 0, '0000-00-00 00:00:00', '2023-06-23 23:11:13'),
(43, 'C04PY01-202306|202308_08', 'PY01', 'C04', 'STD110658', 0, '0000-00-00 00:00:00', '2023-06-23 23:11:14'),
(44, 'C01PY03-202306|202306_06', 'PY03', 'C01', 'STD203818', 0, '0000-00-00 00:00:00', '2023-06-25 09:35:09'),
(45, 'C01PY03-202306|202306_06', 'PY03', 'C01', 'STD313446', 0, '0000-00-00 00:00:00', '2023-06-25 09:35:09'),
(46, 'C01PY03-202306|202306_06', 'PY03', 'C01', 'STD852875', 0, '0000-00-00 00:00:00', '2023-06-25 09:35:09'),
(47, 'C01PY03-202306|202306_06', 'PY03', 'C01', 'STD740716', 0, '0000-00-00 00:00:00', '2023-06-25 09:35:09'),
(48, 'C02PY01-202306|202312_06', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(49, 'C02PY01-202306|202312_07', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(50, 'C02PY01-202306|202312_08', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(51, 'C02PY01-202306|202312_09', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(52, 'C02PY01-202306|202312_10', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(53, 'C02PY01-202306|202312_11', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(54, 'C02PY01-202306|202312_12', 'PY01', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(55, 'C02PY01-202306|202312_06', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(56, 'C02PY01-202306|202312_07', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(57, 'C02PY01-202306|202312_08', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(58, 'C02PY01-202306|202312_09', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(59, 'C02PY01-202306|202312_10', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(60, 'C02PY01-202306|202312_11', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(61, 'C02PY01-202306|202312_12', 'PY01', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(62, 'C02PY01-202306|202312_06', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(63, 'C02PY01-202306|202312_07', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(64, 'C02PY01-202306|202312_08', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(65, 'C02PY01-202306|202312_09', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(66, 'C02PY01-202306|202312_10', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(67, 'C02PY01-202306|202312_11', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(68, 'C02PY01-202306|202312_12', 'PY01', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:18'),
(69, 'C02PY01-202306|202312_06', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(70, 'C02PY01-202306|202312_07', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(71, 'C02PY01-202306|202312_08', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(72, 'C02PY01-202306|202312_09', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(73, 'C02PY01-202306|202312_10', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(74, 'C02PY01-202306|202312_11', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(75, 'C02PY01-202306|202312_12', 'PY01', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(76, 'C02PY01-202306|202312_06', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(77, 'C02PY01-202306|202312_07', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(78, 'C02PY01-202306|202312_08', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(79, 'C02PY01-202306|202312_09', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(80, 'C02PY01-202306|202312_10', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(81, 'C02PY01-202306|202312_11', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:19'),
(82, 'C02PY01-202306|202312_12', 'PY01', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 09:49:20'),
(83, 'C02PY04-202306|202306_06', 'PY04', 'C02', 'STD990601', 0, '0000-00-00 00:00:00', '2023-06-25 19:04:22'),
(84, 'C02PY04-202306|202306_06', 'PY04', 'C02', 'STD223267', 0, '0000-00-00 00:00:00', '2023-06-25 19:04:22'),
(85, 'C02PY04-202306|202306_06', 'PY04', 'C02', 'STD554765', 0, '0000-00-00 00:00:00', '2023-06-25 19:04:22'),
(86, 'C02PY04-202306|202306_06', 'PY04', 'C02', 'STD685510', 0, '0000-00-00 00:00:00', '2023-06-25 19:04:22'),
(87, 'C02PY04-202306|202306_06', 'PY04', 'C02', 'STD818635', 0, '0000-00-00 00:00:00', '2023-06-25 19:04:22'),
(88, 'C08PY04-202306|202306_06', 'PY04', 'C08', 'STD248098', 0, '0000-00-00 00:00:00', '2023-06-26 09:54:23'),
(89, 'C08PY04-202306|202306_06', 'PY04', 'C08', 'STD267144', 1, '2023-06-27 14:05:39', '2023-06-26 09:54:23'),
(90, 'C08PY04-202306|202306_06', 'PY04', 'C08', 'STD212962', 1, '0000-00-00 00:00:00', '2023-06-26 09:54:23'),
(91, 'C08PY04-202306|202306_06', 'PY04', 'C08', 'STD843755', 1, '0000-00-00 00:00:00', '2023-06-26 09:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
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
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code_class`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code payment` (`code_payment`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`name_school`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms` (`code_class`),
  ADD KEY `teaching_year` (`code_year`);

--
-- Indexes for table `teaching_year`
--
ALTER TABLE `teaching_year`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code_year`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `teaching_year`
--
ALTER TABLE `teaching_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `classrooms` FOREIGN KEY (`code_class`) REFERENCES `classrooms` (`code_class`),
  ADD CONSTRAINT `teaching_year` FOREIGN KEY (`code_year`) REFERENCES `teaching_year` (`code_year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
