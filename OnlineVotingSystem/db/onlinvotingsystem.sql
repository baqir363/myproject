-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinvotingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidatedetails`
--

CREATE TABLE `candidatedetails` (
  `id` int(11) NOT NULL,
  `numberid` int(11) DEFAULT NULL,
  `candidatename` varchar(255) DEFAULT NULL,
  `candidatedetailed` text DEFAULT NULL,
  `candidatephoto` text DEFAULT NULL,
  `insertedby` varchar(255) DEFAULT NULL,
  `insertedon` date DEFAULT NULL,
  `noofvotes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidatedetails`
--

INSERT INTO `candidatedetails` (`id`, `numberid`, `candidatename`, `candidatedetailed`, `candidatephoto`, `insertedby`, `insertedon`, `noofvotes`) VALUES
(32, 10, 'Malkani', 'nm,nm,nmnm,nm,n', '../assets/images/candidate_photos/3222333046_28897543610WIN_20241107_21_30_01_Pro.jpg', 'baqir', '2024-11-11', 2),
(33, 10, 'pathan', 'patatpaptptptapt', '../assets/images/candidate_photos/83369533144_60287505767WIN_20241107_21_29_53_Pro.jpg', 'baqir', '2024-11-11', 3),
(34, 9, 'Bhatti', 'bhttbbhtbhtt', '../assets/images/candidate_photos/97788863215_55878394939WIN_20241107_21_30_01_Pro.jpg', 'baqir', '2024-11-11', 3),
(35, 9, 'langah', 'nglgnlgnlgnlgnl', '../assets/images/candidate_photos/89920955741_31089214924WIN_20241107_21_29_53_Pro.jpg', 'baqir', '2024-11-11', 2);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `id` int(11) NOT NULL,
  `electiontopic` varchar(255) DEFAULT NULL,
  `noofcandidates` int(11) DEFAULT NULL,
  `startingdate` date DEFAULT NULL,
  `endingdate` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `insertedby` varchar(255) DEFAULT NULL,
  `insertedon` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `electiontopic`, `noofcandidates`, `startingdate`, `endingdate`, `status`, `insertedby`, `insertedon`) VALUES
(9, 'MNA', 2, '2024-11-09', '2024-11-11', 'Expired', 'baqir', '2024-11-09'),
(10, 'Class Moniter', 2, '2024-11-11', '2024-11-12', 'Expired', 'baqir', '2024-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contactno` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `userrole` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `contactno`, `password`, `userrole`) VALUES
(2, 'baqir', '123', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'Admin'),
(30, 'ppo', '00009', 'cd202e3ae6a91189696e70ff6e50e76dec6bf469', 'Voter'),
(31, 'uhb', '0333', '2c796bbeb6b60a084ae84436081ee75091017dae', 'Voter'),
(32, 'tyu', '567', '0310e5c5e7fd71475d94f72deb8e0a1f48031aaa', 'Voter'),
(33, 'asd', '321', '5f6955d227a320c7f1f6c7da2a6d96a851a8118f', 'Voter'),
(34, 'ert', '345', '35139ef894b28b73bea022755166a23933c7d9cb', 'Voter'),
(35, 'esz', '333', '05f96b9cc2f26364ef7ab9879bd9c85382a98afb', 'Voter'),
(36, 'poi', '890', 'd1d1aa47a79fd596d8297d0e058f5b65118858f6', 'Voter'),
(37, 'lkj', '897', '3279f04351a1a9cbe85672a68c451266efde739e', 'Voter'),
(38, 'afd', '777', 'a6dfde0ec5c5124d26ab0cb4f9ab9a758dee1d6f', 'Voter'),
(39, 'hun', '566', '431d5d8e3f5d1477c57e33e173d9eda3a2fe9cc0', 'Voter'),
(40, 'nhu', '878', '4cd4a80a06a7aab4e825302453175a91b9d2b00c', 'Voter'),
(41, 'nnbv', '766', 'f10e2821bbbea527ea02200352313bc059445190', 'Voter');

-- --------------------------------------------------------

--
-- Table structure for table `votings`
--

CREATE TABLE `votings` (
  `id` int(11) NOT NULL,
  `elctionid` int(11) DEFAULT NULL,
  `votersid` int(11) DEFAULT NULL,
  `candidateid` int(11) DEFAULT NULL,
  `votedate` date DEFAULT NULL,
  `votetime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votings`
--

INSERT INTO `votings` (`id`, `elctionid`, `votersid`, `candidateid`, `votedate`, `votetime`) VALUES
(95, 9, 30, 34, '2024-11-11', '09:40:34'),
(96, 10, 30, 33, '2024-11-11', '09:40:39'),
(97, 9, 31, 35, '2024-11-11', '09:56:38'),
(98, 10, 31, 33, '2024-11-11', '09:56:42'),
(99, 9, 32, 34, '2024-11-11', '10:04:58'),
(100, 10, 32, 32, '2024-11-11', '10:05:01'),
(101, 9, 33, 35, '2024-11-11', '10:47:21'),
(102, 10, 33, 33, '2024-11-11', '10:47:25'),
(103, 9, 34, 35, '2024-11-11', '07:00:14'),
(104, 10, 34, 32, '2024-11-11', '07:00:18'),
(105, 9, 35, 35, '2024-11-11', '07:06:33'),
(106, 10, 35, 32, '2024-11-11', '07:06:38'),
(107, 9, 36, 34, '2024-11-11', '07:17:23'),
(108, 10, 36, 33, '2024-11-11', '07:17:27'),
(109, 9, 37, 34, '2024-11-11', '07:52:24'),
(110, 10, 37, 33, '2024-11-11', '07:52:36'),
(111, 9, 38, 35, '2024-11-11', '07:58:31'),
(112, 10, 38, 32, '2024-11-11', '07:58:35'),
(113, 9, 39, 35, '2024-11-11', '02:34:23'),
(114, 10, 39, 33, '2024-11-11', '02:34:28'),
(115, 10, 40, 32, '2024-11-11', '02:37:13'),
(116, 9, 40, 34, '2024-11-11', '02:37:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatedetails`
--
ALTER TABLE `candidatedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votings`
--
ALTER TABLE `votings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatedetails`
--
ALTER TABLE `candidatedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `votings`
--
ALTER TABLE `votings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
