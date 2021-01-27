-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 11:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastform`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `date` datetime NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `answer`, `date`, `id_session`, `form_id`) VALUES
(28, 9, 'Farid Maulana', '2020-12-15 07:31:00', 'ijd046iilbm1m0mi2hdbps9k80', 9),
(29, 10, '1941720012', '2020-12-15 07:31:00', 'ijd046iilbm1m0mi2hdbps9k80', 9),
(30, 11, 'Malang', '2020-12-15 07:31:00', 'ijd046iilbm1m0mi2hdbps9k80', 9),
(31, 1, 'Farlan', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(32, 4, '1941720012', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(33, 5, 'TI', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(34, 6, 'D4', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(35, 7, '089682327185', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(36, 8, 'malang', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2),
(37, 13, '123', '2020-12-27 11:12:00', 'ieukku8asvtobpugjjge3gg5p7', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `form_name` varchar(100) NOT NULL,
  `form_desc` text DEFAULT NULL,
  `form_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `user_id`, `form_name`, `form_desc`, `form_url`) VALUES
(1, 1, 'Absensi Kelas', 'Absensi kelas TI 4 Desember 2020', 'form/1'),
(2, 1, 'Kepuasan Mahasiswa Baru Terhadap Pra-Studi Online', 'Saya Farlan mahasiswa Jurusan Teknologi Informasi semester 3 meminta bantuannya untuk mengisi kuisioner ini guna memenuhi tugas saya di mata kuliah Statistik Komputasi', 'form/2'),
(3, 1, 'Absensi WRI Crew', NULL, 'form/3'),
(4, 1, 'Kepuasan Kuliah Online', NULL, 'form/4'),
(5, 3, 'Survey Penduduk', '', ''),
(6, 3, 'Registrasi Maba', '', ''),
(7, 3, 'Absensi Matkul UI', '', ''),
(8, 1, 'Pembagian Kelas Berdasarkan Domisili', 'Menilai kepuasan mahasiswa terhadap pembagian kelas berdasarkan domisili mahasiswa selama pandemi.', ''),
(9, 1, 'Kepuasan Mata Kuliah Desain Interface', 'adfsdafdsafd', '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `question_type` int(11) NOT NULL COMMENT '1 = short answer, 2 = long answer, 3 = radio, 4 = checkbox, 5 = dropdown, 6 = file, 7 = date, 8 = time',
  `required` int(11) NOT NULL DEFAULT 0 COMMENT '0 = no, 1 = yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `form_id`, `question`, `question_type`, `required`) VALUES
(1, 2, 'Nama Lengkap', 1, 1),
(3, 1, 'NIM', 1, 1),
(4, 2, 'NIM', 1, 1),
(5, 2, 'Jurusan', 1, 1),
(6, 2, 'Prodi', 1, 1),
(7, 2, 'No. Telp', 1, 0),
(8, 2, 'Alamat', 2, 1),
(9, 9, 'Nama', 1, 1),
(10, 9, 'NIM', 1, 1),
(11, 9, 'Alamat', 2, 0),
(12, 9, 'Jurusan', 1, 1),
(13, 2, 'Gatau', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`) VALUES
(1, 'Farlan', 'farlan@mail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Farid Maulana', 'farid@mail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
