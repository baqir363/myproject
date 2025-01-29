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
-- Database: `smartattendencesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `atendance`
--

CREATE TABLE `atendance` (
  `id` int(11) NOT NULL,
  `studentid` int(11) DEFAULT NULL,
  `currdate` date DEFAULT NULL,
  `attendancemonth` varchar(45) DEFAULT NULL,
  `attendanceyear` varchar(45) DEFAULT NULL,
  `attendanc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendancetable`
--

CREATE TABLE `attendancetable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rollno` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `session` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance` varchar(45) DEFAULT NULL,
  `attendancemonth` varchar(45) DEFAULT NULL,
  `attendanceyear` varchar(45) DEFAULT NULL,
  `attended` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendancetable`
--

INSERT INTO `attendancetable` (`id`, `name`, `rollno`, `class`, `session`, `semester`, `date`, `attendance`, `attendancemonth`, `attendanceyear`, `attended`) VALUES
(1, 'asd', '1', 'IET', '2019-2023', 'Semester 2', '2024-05-06', 'P', 'May', '2024', NULL),
(2, 'qwe', '23', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'P', 'May', '2024', 1),
(3, 'iuy', '65', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 1),
(4, 'poi', '09', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 0),
(5, 'poi', '09', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 0),
(6, 'asdasd', '234', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'P', 'May', '2024', 1),
(7, 'dfs', '43', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 0),
(8, 'rty', '456', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', NULL),
(9, 'oip', '89', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'P', 'May', '2024', NULL),
(10, 'mnb', '034', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 0),
(11, 'bvn', '77', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'P', 'May', '2024', 1),
(12, 'dsa', '32', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'A', 'May', '2024', 0),
(13, 'zxc', '44', 'IET', '2019-2023', 'Semester 2', '2024-05-05', 'P', 'May', '2024', 1),
(14, 'Muhammad Baqir', '07', 'IET', '2019-2023', 'Semester 2', '2024-05-06', 'P', 'May', '2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendencestudents`
--

CREATE TABLE `attendencestudents` (
  `id` int(11) NOT NULL,
  `studentname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentuser`
--

CREATE TABLE `studentuser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `rollno` varchar(45) DEFAULT NULL,
  `class` varchar(45) DEFAULT NULL,
  `session` varchar(45) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `userrole` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentuser`
--

INSERT INTO `studentuser` (`id`, `name`, `fathername`, `rollno`, `class`, `session`, `semester`, `cnic`, `dob`, `userrole`) VALUES
(1, 'Muhammad Amir', 'abdul majeed', '1221', 'It cs', '2023', '4', '3210206002481', '01/04/1995', 'Student'),
(2, 'Ali', 'Shahid', '8', 'BSIET', '2020-2024', '4th Semester', '32104', '098', 'Student'),
(3, 'Muhammad', 'Zahid', '9', 'BSCS', '2021-2025', '3rd Semester', '32105', '456', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `teacheruser`
--

CREATE TABLE `teacheruser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `cnic` varchar(45) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `userrole` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacheruser`
--

INSERT INTO `teacheruser` (`id`, `name`, `fathername`, `cnic`, `dob`, `userrole`) VALUES
(1, 'mohsin', 'abdul saeed', '3210234434430', '1990-1-2', 'Teacher'),
(2, 'Aoun', 'Talib', '3210211325737', '17/02/1998', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `totalclasses`
--

CREATE TABLE `totalclasses` (
  `id` int(11) NOT NULL,
  `studentdid` int(11) DEFAULT NULL,
  `totalclases` int(11) NOT NULL,
  `presentclases` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `userrole` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fathername`, `cnic`, `dob`, `userrole`) VALUES
(1, 'baqir', 'abdul majeed', '3210238891449', '10122003', 'Admin'),
(4, 'malkani', 'malkani dad', '32102', '345', 'Teacher'),
(5, 'Balooch', 'Baloochdad', '32103', '321', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atendance`
--
ALTER TABLE `atendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendancetable`
--
ALTER TABLE `attendancetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendencestudents`
--
ALTER TABLE `attendencestudents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentuser`
--
ALTER TABLE `studentuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacheruser`
--
ALTER TABLE `teacheruser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `totalclasses`
--
ALTER TABLE `totalclasses`
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
-- AUTO_INCREMENT for table `atendance`
--
ALTER TABLE `atendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendancetable`
--
ALTER TABLE `attendancetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attendencestudents`
--
ALTER TABLE `attendencestudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentuser`
--
ALTER TABLE `studentuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacheruser`
--
ALTER TABLE `teacheruser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `totalclasses`
--
ALTER TABLE `totalclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
