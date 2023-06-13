-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 11:02 AM
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
(1, 'C01', 'I', 'A', 'nanzy', '2023-06-12 09:44:39', 1),
(2, 'C02', 'I', 'B', 'Admin', '2023-06-12 10:29:02', 1),
(3, 'C03', 'II', 'A', 'Admin', '2023-06-12 10:34:23', 1),
(4, 'C04', 'II', 'B', 'Admin', '2023-06-12 10:34:33', 1);

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
-- Table structure for table `students`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'TY01', '2022-2023', 'Admin', '2023-06-12 13:06:22', 1);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teaching_year`
--
ALTER TABLE `teaching_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
