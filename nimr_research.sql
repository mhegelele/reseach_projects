-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 09:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nimr_research`
--

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `c_id` int(11) NOT NULL,
  `center_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE `institution` (
  `id` int(11) NOT NULL,
  `inst_name` text,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `inst_name`, `p_id`) VALUES
(1, 'Publication database is the application', 1),
(2, 'Publication ', 1),
(3, 'ssssssssssssssssssssssssssssssssss', 1),
(4, 'ssssssssssssssssssssssssssssssssss', 1),
(5, 'sssssssssssssssssssss', 4),
(8, 'sssssssssssssssssss', 15),
(9, 'ggggggggggggggggg', 15),
(10, 'sssssssssssssssssss', 16),
(11, 'ggggggggggggggggg', 16),
(12, 'ggggggggggggggggg', 17),
(13, 'sssssssssssssssssss', 17),
(14, 'Ardhi University', 20),
(15, 'University of Dar es Salaam', 20),
(17, 'University of Dar es Salaam', 21),
(21, 'Ardhi University', 21),
(22, 'University of Dar es Salaam', 13),
(23, 'University of Dar es Salaam', 13),
(24, 'Ardhi University', 13);

-- --------------------------------------------------------

--
-- Table structure for table `investigator`
--

CREATE TABLE `investigator` (
  `i_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `title` text,
  `iname` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investigator`
--

INSERT INTO `investigator` (`i_id`, `fname`, `lname`, `sname`, `title`, `iname`, `role`, `p_id`) VALUES
(1, 'vvvvvvvvvvvv', NULL, 'gggggggggg', NULL, NULL, 'Principal Investigator', 18),
(2, 'gggggggg', NULL, 'gggggggggg', NULL, NULL, 'Co Investigators', 18),
(3, 'vvvvvvvvvvvv', NULL, 'gggggggggg', NULL, NULL, 'Principal Investigator', 19),
(4, 'gggggggg', NULL, 'gggggggggg', NULL, NULL, 'Co Investigators', 19),
(5, 'Alice', 'Jonathan', 'Mtarubukwa', 'Co Investigator', NULL, 'Co Investigator', 1),
(6, 'Kelvin', 'Thomas', 'Mbise', NULL, NULL, 'Principle Investigator', 1),
(9, 'Alice', 'Jonathan', 'Mtarubukwa', NULL, NULL, 'Co Investigators', 20),
(10, 'Kelvin', 'Thomas', 'Mbise', NULL, NULL, 'Principal Investigator', 20),
(15, 'Alice', 'Jonathan', 'Mutarubukwa', NULL, NULL, 'Co Investigators', 21),
(17, 'Kelvin', 'Thomas', 'Mbise', NULL, NULL, 'Principal Investigator', 21),
(18, 'Kelvin', 'Thomas', 'Mbise', NULL, NULL, 'Principal Investigator', 13),
(19, 'Alice', 'Jonathan', 'Mtarubukwa', NULL, NULL, 'Co Investigators', 13);

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE `objective` (
  `o_id` int(11) NOT NULL,
  `name_objective` text,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`o_id`, `name_objective`, `p_id`) VALUES
(1, 'bbbbbbbbbbbbbbbbbb', 1),
(2, 'ggggggggggggggggg', 1),
(3, 'bbbbbbbbbbbbbbbbbb', 1),
(5, 'ddddddddddddddddddddd', 13),
(7, 'ddddddddddddddddddddd', 15),
(8, 'dddddddddddddddddd', 15),
(9, 'gggggggggggggggggg', 16),
(10, 'bbbbbbbbbbbbbbbbbbbb', 16),
(13, 'bbbbbbbbbbbbbbbbbbbbbbbbbb', 17),
(15, 'dddddddddddddddddddddd', 19),
(16, 'dddddddddddddddddddddddddd', 19),
(17, 'dddddddddddddddddddddd', 19),
(18, 'dddddddddddddddddddddddddd', 19),
(28, 'Junko Sato\r\nDirector for Risk Management, Office of Safety\r\nPharmaceuticals and Medical Devices Agency\r\n(PMDA)', 20),
(29, 'Junko Sato\r\nDirector for Risk Management, Office of Safety\r\nPharmaceuticals and Medical Devices Agency\r\n(PMDA)', 20),
(30, 'Director for Risk Management, Office of Safety\r\nPharmaceuticals and Medical Devices Agency (PMDA)', 21);

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `q_id` int(11) NOT NULL,
  `name_progress` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`q_id`, `name_progress`, `p_id`, `created_at`) VALUES
(1, 'Alice Jonathan or Mama Kelvin I know you can make it know matter what GOD is still in the throne', 1, '2020-08-26 13:34:14'),
(2, 'Alice Jonathan or Mama Kelvin I know you can make it know matter what GOD is still in the throne', 1, '2020-08-26 13:34:20'),
(3, 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 1, '2020-08-26 13:40:21'),
(4, 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 1, '2020-08-26 13:40:26'),
(5, 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 20, '2020-08-26 12:20:42'),
(6, 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 20, '2020-08-26 12:20:42'),
(7, 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Panel', 21, '2020-09-01 14:17:12'),
(8, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:24:56'),
(9, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:25:21'),
(10, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:25:26'),
(11, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:25:35'),
(12, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:25:47'),
(13, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:26:51'),
(14, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:26:59'),
(15, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 13, '2020-09-02 11:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pro_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `centre` varchar(255) NOT NULL,
  `theme` text NOT NULL,
  `background` text NOT NULL,
  `objective` text NOT NULL,
  `methodology` text NOT NULL,
  `budget` text NOT NULL,
  `duration` int(11) NOT NULL,
  `summary` text NOT NULL,
  `date_of_report` date DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `level_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `approved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `title`, `centre`, `theme`, `background`, `objective`, `methodology`, `budget`, `duration`, `summary`, `date_of_report`, `level`, `level_date`, `created_at`, `status`, `approved_date`) VALUES
(1, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', '300000000000000', 1, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', '2020-09-05', 0, NULL, '2020-08-19 18:31:02', 'approved', NULL),
(2, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'ddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddd', 'ddddddddddddddddddddddddddddd', '300000000000000', 3, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2020-08-28', 0, NULL, '2020-08-17 03:06:07', 'approved', NULL),
(3, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'ddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddd', 'ddddddddddddddddddddddddddddd', '300000000000000', 3, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2020-08-28', 0, NULL, '2020-08-17 03:06:13', 'approved', NULL),
(4, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Tanga', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssss', 'ssssssssssssssssssssssssssssss', 'dddddddddddddddddddddddddd', '300000000000000', 2, 'ssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 06:28:38', 'approved', NULL),
(5, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssss', 'ssssssssssssssssssssssssssssss', 'dddddddddddddddddddddddddd', '300000000000000', 2, 'ssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 03:06:26', 'approved', NULL),
(6, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssss', 'ssssssssssssssssssssssssssssss', 'dddddddddddddddddddddddddd', '300000000000000', 2, 'ssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 03:06:54', 'approved', NULL),
(7, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Ngongongare', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssss', 'ssssssssssssssssssssssssssssss', 'dddddddddddddddddddddddddd', '300000000000000', 2, 'ssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 06:28:01', 'approved', NULL),
(9, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssss', 'ssssssssssssssssssssssssssssss', 'dddddddddddddddddddddddddd', '300000000000000', 2, 'ssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 03:07:16', 'approved', NULL),
(12, 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'Mwanza', 'NIMR Publication database is the application that manages all publications information in organization where by the process of uploading and manage publication information is done by scientist themselves.', 'sssssssssssssssssssssssssss', 'sssssssssssssssssssssssssss', 'ddddddddddddddddddddddddddddddddddddddd', '300000000000000', 3, 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2020-09-05', 0, NULL, '2020-08-17 03:08:33', 'approved', NULL),
(13, 'Alice Jonathan Alice Jonathan Alice Jonathan Alice Jonathan', 'Mwanza', 'Doing this this this', 'Wazohili wazohili', 'Main objectives main objectives', 'Rostam rostam', '2000000000', 2, 'Down down down down', '2020-08-07', 0, NULL, '2020-09-02 12:02:12', 'approved', '2020-09-02'),
(15, 'Research Project Uploading Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Uploading', 'Mbeya', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', '23000000', 2, 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', '2020-08-13', 0, NULL, '2020-08-28 13:17:48', 'pending', NULL),
(16, 'bbbbbbbbbbbbbbbbbbbbbb', 'Mwanza', 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'vvvvvvvvvvvvvvvvvvvvvvvvvv', 'bbbbbbbbbbbbbbbbbbbbb', '300000000000000', 3, 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2020-08-13', 0, NULL, '2020-08-16 22:06:11', 'pending', NULL),
(17, 'ggggggggggggggggggggg', 'Mwanza', 'ggggggggggggggggggggggg', 'bbbbbbbbbbbbbbbbbbbbb', 'ggggggggggggggggggg', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', '300000000000000', 3, 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', '2020-09-01', 0, NULL, '2020-08-16 22:06:11', 'pending', NULL),
(18, 'ddddddddddddddddddddddddddddd', 'Mwanza', 'dddddddddddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddd', '300000000000000', 3, 'ddddddddddddddddddddddddddddddddddddddd', '2020-08-29', 0, NULL, '2020-08-17 06:30:07', 'approved', NULL),
(19, 'ddddddddddddddddddddddddddddd', 'Mwanza', 'dddddddddddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddd', '300000000000000', 3, 'ddddddddddddddddddddddddddddddddddddddd', '2020-08-29', 0, NULL, '2020-08-17 06:29:59', 'approved', NULL),
(20, 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 'Mwanza', 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA) Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', 'Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA) Junko Sato Director for Risk Management, Office of Safety Pharmaceuticals and Medical Devices Agency(PMDA)', '2300000', 1, 'Pharmaceuticals and Medical Devices AgencyPharmaceuticals and Medical Devices AgencyPharmaceuticals and Medical Devices AgencyPharmaceuticals and Medical Devices Agency Pharmaceuticals and Medical Devices AgencyPharmaceuticals and Medical Devices Agency', '2020-08-13', 0, NULL, '2020-08-26 09:22:43', 'pending', NULL),
(21, 'Research Project Uploading Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Uploading', 'Muhimbili', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading Uploading', 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', '23000000', 2, 'Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel Research Project Uploading Panel', '2020-08-13', 0, NULL, '2020-08-28 11:40:43', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `publication` text,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id`, `publication`, `p_id`) VALUES
(2, 'ggggggggggggggggggg', 13),
(4, 'Pharmaceuticals and Medical Devices Agency', 20),
(5, 'Pharmaceuticals and Medical Devices Agency', 20),
(10, 'Pharmaceuticals and Medical Devices Agency', 21),
(11, 'Pharmaceuticals and Medical Devices Agency', 21),
(12, 'Pharmaceuticals and Medical Devices Agency', 13),
(13, 'Pharmaceuticals and Medical Devices Agency', 13);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `s_id` int(11) NOT NULL,
  `sponsor` text,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`s_id`, `sponsor`, `p_id`) VALUES
(1, 'dddddddddddddddddd', 13),
(2, 'ddddddddddddddddddddddd', 13),
(3, 'sssssssssssssssssssssssssss', 1),
(4, 'sssssssssssssssssssssssssss', 1),
(5, 'sssssssssssssssssssssssssss', 1),
(6, 'sssssssssssssssssssssssssss', 1),
(7, 'sssssssssssssssssssssssssss', 4),
(10, 'Pharmaceuticals and Medical Devices Agency', 20),
(11, 'Pharmaceuticals and Medical Devices Agency', 20),
(12, 'Golden Von', 21),
(17, 'Mama Kelvin', 21),
(18, 'Licy Kingdom', 21),
(19, 'Mama Kelvin', 21),
(20, 'Licy Kingdom', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL DEFAULT 'User',
  `center_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` varchar(255) DEFAULT NULL,
  `update_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mname`, `lname`, `username`, `password`, `level`, `center_id`, `email`, `email_verified_at`, `update_at`) VALUES
(3, 'Mwanza', NULL, NULL, 'mwanza2020!', '$2y$10$Sd43r9oRwP0ze8NkRNSpLuWiES0KDDt0KzlLxP68/jD7UaFrvP5Cu', 'Admin', NULL, NULL, NULL, NULL),
(4, 'Muhimbili', NULL, NULL, 'muhimbili2020!', '$2y$10$Sd43r9oRwP0ze8NkRNSpLuWiES0KDDt0KzlLxP68/jD7UaFrvP5Cu', 'User', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investigator`
--
ALTER TABLE `investigator`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `objective`
--
ALTER TABLE `objective`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institution`
--
ALTER TABLE `institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `investigator`
--
ALTER TABLE `investigator`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `objective`
--
ALTER TABLE `objective`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
