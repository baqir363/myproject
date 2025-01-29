-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 04:00 AM
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
-- Database: `letter`
--

-- --------------------------------------------------------

--
-- Table structure for table `dynamic`
--

CREATE TABLE `dynamic` (
  `id` int(11) NOT NULL,
  `listofoffice` varchar(255) DEFAULT NULL,
  `tos` varchar(45) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `number` int(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `froms` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `cc` text DEFAULT NULL,
  `currdate` date DEFAULT NULL,
  `lettermonth` varchar(45) DEFAULT NULL,
  `letteryear` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dynamic`
--

INSERT INTO `dynamic` (`id`, `listofoffice`, `tos`, `subject`, `number`, `message`, `froms`, `designation`, `cc`, `currdate`, `lettermonth`, `letteryear`) VALUES
(1, 'IET', 'Dr.shafiq', 'Compose/Types', NULL, 'qweqweqweqwe', 'm.arif', 'registrar', 'sec', '2024-05-14', 'May', '2024'),
(2, 'registrar', 'Ali', 'request to conduct online meeting', NULL, 'it requested to you kindly conduct a online meeting at confernce hall', 'Dr.shafiq', 'hod', 'sec', '2024-07-09', 'Jul', '2024'),
(3, 'BS IET', 'sir shafiq', 'asdasdasdasdaqweqweqweqwezxczxczxc', 321321, 'poiqwep[rib[qpa;mlfsd\'fvk;sdv\r\nas;lvdfa;jsjm\r\na;msldvkma;sdm\r\na;vlsdkf;masdfvma\r\n;lavksjd;fj', 'admin', 'HOD', 'Secretary to Vice Chancellor, MCUT DG Khan.,Treasurer MCUT DG Khan.,Resident Auditor, MCUT DG Khan.,Controller Examination MCUT DG Khan.,Incharge/HOD Computing & Information Technology.', '2024-08-10', 'Aug', '2024'),
(4, 'BS IET', 'ijnnniinniinj', 'jninijjnijnininiinjnii', 123321, 'ijninjinijnijnijnniinniiijni injni ni jni jni  in i ni ni jni n', 'admin', 'HOD', 'Secretary to Vice Chancellor, MCUT DG Khan.,Treasurer MCUT DG Khan.,Resident Auditor, MCUT DG Khan.,Controller Examination MCUT DG Khan.,Incharge/HOD Computing & Information Technology.,Transport Officer MCUT DG Khan.,Estate Officer, MCUT DG Khan.,Securit', '2024-12-19', 'Dec', '2024'),
(5, 'BS IET', 'mkokmomko', 'mkommkokmkomkomko', 345345, 'kmommkomkmk mokmkomkomk mkomkomomk', 'admin', 'Registrar', 'Secretary to Vice Chancellor MCUT DG Khan.,Treasurer MCUT DG Khan.,Resident Auditor MCUT DG Khan.,Controller Examination MCUT DG Khan.,Incharge/HOD Computing & Information Technology.,Transport Officer MCUT DG Khan.,Estate Officer MCUT DG Khan.,Security O', '2024-12-19', 'Dec', '2024'),
(6, 'BS IET', 'pmlpml', 'lmmplmllpmmplplm', 678876, 'mplpmlmplmlpmlpml ml pml ml pml pmlp mpl  pml', 'admin', 'Vice Chancellor', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. \nIncharg/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security O', '2024-12-19', 'Dec', '2024'),
(7, 'BS IET', 'bjibjibji', 'bjiibjbjbijjjii', 111111, 'ibjbjiibjibjbijibjbijjbjibjibj bbji bjiiiiiiiii bjibjibjibji ', 'admin', 'Registrar', 'Array', '2024-12-19', 'Dec', '2024'),
(8, 'BS IET', 'nkonkonnnkkokok', 'nkoononkokko', 444333, 'nkokokonknkonkonkonko n ko nkonko nko nko nkonk k n\r\n nk no n n\r\n no nonkk', 'admin', 'Registrar', 'Array', '2024-12-21', 'Dec', '2024'),
(9, 'BS IET', 'ubhubuhb', 'buhuhbuhbuhbuhbuhuh', 555444, 'buhbuhubuhubh uh uhb buh buh buhhb ', 'admin', 'HOD', 'Secretary to Vice Chancellor MCUT DG Khan..Treasurer MCUT DG Khan..Resident Auditor MCUT DG Khan..Controller Examination MCUT DG Khan..Incharge/HOD Computing & Information Technology..Transport Officer MCUT DG Khan..Estate Officer MCUT DG Khan..Security Officer MCUT DG Khan..Office Copy.', '2024-12-21', 'Dec', '2024'),
(10, 'BS IET', 'gvygvyv', 'gvygvgvgvyy', 666777, 'vgyygvgvy vgygyvgvy gvygv ', 'admin', 'Vice Chancellor', 'Secretary to Vice Chancellor MCUT DG Khan.Treasurer MCUT DG Khan.Resident Auditor MCUT DG Khan.Controller Examination MCUT DG Khan.Incharge/HOD Computing & Information Technology.Transport Officer MCUT DG Khan.Estate Officer MCUT DG Khan.Security Officer MCUT DG Khan.Office Copy.', '2024-12-21', 'Dec', '2024'),
(11, 'BS IET', 'jhkjjhhjh', 'jhkjhjhkjhkjhkjk', 78787, 'jkjhkjkjkjjjk', 'admin', 'Registrar', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024'),
(12, 'BS IET', 'yututuu', 'yuuyuyuuuyttuyutuytuytuyt', 2147483647, 'yuttutytyutuytuytu tyu tuy tuy t uyt uy tuy tuy', 'admin', 'Vice Chancellor', ' Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024'),
(13, 'BS IET', 'jhggjjjjgjjjj', 'jhgjjhgjhjghjgjhgjh', 2147483647, 'jhjhgjhgjhgjhgghjh gj gh jgh j j   gjh', 'admin', 'Vice Chancellor', 'Array', '2024-12-21', 'Dec', '2024'),
(14, 'BS IET', 'mnbnbmmbmnbmnb', 'mnbmnbmnbmnbmnb', 2147483647, 'nmbmnbmnbmnbm bm bm nbm', 'admin', 'Vice Chancellor', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024'),
(15, 'BS IET', 'dfdgdfgfdfdfg', 'dfgdfgdfgdfgdgfdg', 2147483647, 'dfgdgdfdffgdgdfgfdg', 'admin', 'Registrar', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024'),
(16, 'BS IET', 'nvnnnnvnbbnbvnbv', 'nbvnbvnbvnbv', 2147483647, 'bvnbvnbvnbvnbvn nb b vn bvn bv n bv nbv', 'admin', 'HOD', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024'),
(17, 'BS IET', 'nvnnnnvnbbnbvnbv', 'nbvnbvnbvnbv', 2147483647, 'bvnbvnbvnbvnbvn nb b vn bvn bv n bv nbv', 'admin', 'HOD', 'Secretary to Vice Chancellor MCUT DG Khan. Treasurer MCUT DG Khan. Resident Auditor MCUT DG Khan. Controller Examination MCUT DG Khan. Incharge/HOD Computing & Information Technology. Transport Officer MCUT DG Khan. Estate Officer MCUT DG Khan. Security Officer MCUT DG Khan. Office Copy.', '2024-12-21', 'Dec', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `department` varchar(11) DEFAULT NULL,
  `user_role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `designation`, `department`, `user_role`) VALUES
(1, 'qwerty', 'admin', 'admin@live.com', '$2y$10$eIfxmMXvXUzWh5SwsiQTfeLLkDcXHdtkEycFRUhGulEu//VJr/v1K', 'student', 'BS IET', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dynamic`
--
ALTER TABLE `dynamic`
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
-- AUTO_INCREMENT for table `dynamic`
--
ALTER TABLE `dynamic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
