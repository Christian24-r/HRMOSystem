-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 06:21 AM
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
-- Database: `db_hrmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_document`
--

CREATE TABLE `tbl_document` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_document`
--

INSERT INTO `tbl_document` (`id`, `name`, `image`) VALUES
(11, '123123123', 'sad.pdf'),
(14, '123', 'Role-of-Descriptive-Predictive-and-Prescriptive-Data-Analytics-in-HR_-A-Deep-Insight-into-Talent-Management.pdf'),
(16, '1232', 'IJMDES_V2_I6_9.pdf'),
(18, 'PESO-User', 'SHANG-RESUME.pdf'),
(19, 'Job Fair 2023', 'margie rocha.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `fam_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mid_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `last_execution_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `contact_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `pos_id` int(11) NOT NULL DEFAULT 0,
  `req_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `fam_name`, `first_name`, `mid_name`, `birth_date`, `gender`, `address`, `age`, `last_execution_date`, `contact_no`, `status`, `pos_id`, `req_id`) VALUES
(1, 'Ragrag', 'Jasmin', 'Cospada', '1963-11-24', 'female', 'jaro, leyte', '60', '2023-11-23 23:05:31', '098472648', 'regular', 67, 44),
(2, 'Adrales', 'Maris', 'Esternon', '1963-11-24', 'female', 'Barugo', '60', '2023-11-23 23:05:31', '094344464674', 'regular', 68, 45),
(3, 'Rotairo', 'Christian Kit', 'Velarde', '1963-11-24', 'male', '123', '65', '2023-11-23 23:05:31', '123', 'contractual', 69, 47),
(4, 'Rotairo', 'Christian Kit', 'Velarde', '1963-11-24', 'male', '123', '65', '2023-11-23 23:05:31', '123', 'contractual', 70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flowchart`
--

CREATE TABLE `tbl_flowchart` (
  `id` int(11) NOT NULL,
  `office` varchar(255) NOT NULL,
  `drawio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pos`
--

CREATE TABLE `tbl_pos` (
  `u_id` int(11) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `salary_grade` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `ee_no` varchar(255) NOT NULL,
  `years_of_service` varchar(255) NOT NULL,
  `date_started` varchar(255) NOT NULL,
  `tin` varchar(255) NOT NULL,
  `gsis_no` varchar(255) NOT NULL,
  `phic` varchar(255) NOT NULL,
  `pag_ibig` varchar(255) NOT NULL,
  `educ_attain` varchar(255) NOT NULL,
  `eligibility` varchar(255) NOT NULL,
  `masteral` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pos`
--

INSERT INTO `tbl_pos` (`u_id`, `dept`, `salary_grade`, `rate`, `position`, `ee_no`, `years_of_service`, `date_started`, `tin`, `gsis_no`, `phic`, `pag_ibig`, `educ_attain`, `eligibility`, `masteral`, `employee_id`) VALUES
(0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0),
(65, 'PESO', '123244', '123244', 'Asawa ni Mayor', '2322', '12', '2010-02-12', '2331', '86238', '2172517', '22612', 'College', 'CSE', 'N/A', 1),
(66, 'HRMO', '132424', '2324', 'Assistant', '22425', '6', '2013-02-12', '3435', '324', '53536', '2145', 'College', 'CSE Passer', 'N/A', 1),
(67, 'HRMO', '43535', '564', 'Assistant', '2324', '11', '2021-11-12', '2135', '324124', '35325', '222342', 'College', 'CSE Passer', 'N/A', 1),
(68, '123', '123', '123', '123', '123', '123', '0123-03-12', '123', '123', '123', '123', '123', '123', '123', 2),
(69, 'HRMO', 'Salary 5/8', '500', 'Head', '123', '123', '0123-03-12', '123', '123', '123', '123', '123', '123', '123', 3),
(70, 'HRMO', '123', '123', '123', '123', '123', '0123-03-12', '123', '123', '123', '123', '123', '123', '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `u_id` int(11) NOT NULL,
  `requirement1` varchar(255) NOT NULL,
  `requirement2` varchar(255) NOT NULL,
  `requirement3` varchar(255) NOT NULL,
  `requirement4` varchar(255) NOT NULL,
  `requirement5` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`u_id`, `requirement1`, `requirement2`, `requirement3`, `requirement4`, `requirement5`, `employee_id`) VALUES
(0, '', '', '', '', '', 0),
(35, 'Seminar 1101', '123', '', '', '', 26),
(36, 'Seminar 210', 'Training 5001', '', '', '', 29),
(37, 'Seminar 300', 'Seminar 200', '', '', '', 26),
(38, 'Seminar 200', 'Training 300', '', '', '', 30),
(39, 'Seminar 200', 'Training 300', '', 'Seminar 303', '', 30),
(40, '123', '123', '', '', '', 32),
(41, '1', '1', '', '', '12312', 32),
(42, 'peso-user', 'peso-user', 'peso-user', '', '', 36),
(43, 'Seminar 300', '', '', '', '', 1),
(44, 'Seminar 300', '', '', '', '', 1),
(45, 'Seminar 300', '', '', '', '', 2),
(46, 'Seminar 300', '', '', '', '', 3),
(47, 'Seminar 1', 'Seminar 3', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` enum('HRMO','PESO','ADMIN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `usertype`) VALUES
(36, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(44, 'PESO', '7854efe8872e7f5aef07f6c344930197', 'PESO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_images`
--

CREATE TABLE `tb_images` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_images`
--

INSERT INTO `tb_images` (`id`, `name`, `image`) VALUES
(13, 'Job Fair 2020', '[\"6560170d3d7fb.png\",\"6560170d3dd90.png\",\"6560170d3ec27.png\",\"6560170d3f176.png\",\"6560170d3f61a.png\",\"6560170d3faa6.png\",\"6560170d3ff2f.png\",\"6560170d403b6.png\",\"6560170d40859.png\",\"6560170d40ce9.png\",\"6560170d41178.png\",\"6560170d41604.png\",\"6560170d41a92.png\",\"6560170d41f25.png\",\"6560170d42ec8.png\",\"6560170d43563.png\",\"6560170d43ae4.png\",\"6560170d4405a.png\",\"6560170d445d0.png\",\"6560170d44b68.png\"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_document`
--
ALTER TABLE `tbl_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pos` (`pos_id`),
  ADD KEY `reuirements` (`req_id`);

--
-- Indexes for table `tbl_flowchart`
--
ALTER TABLE `tbl_flowchart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_images`
--
ALTER TABLE `tb_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_document`
--
ALTER TABLE `tbl_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_flowchart`
--
ALTER TABLE `tbl_flowchart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_pos`
--
ALTER TABLE `tbl_pos`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_images`
--
ALTER TABLE `tb_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `pos` FOREIGN KEY (`pos_id`) REFERENCES `tbl_pos` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reuirements` FOREIGN KEY (`req_id`) REFERENCES `tbl_requirements` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
