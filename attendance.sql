-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 05:13 AM
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
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE `attendance_details` (
  `attendance_id` int(100) NOT NULL,
  `serial` int(100) NOT NULL,
  `student_roll` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `course_code` varchar(55) NOT NULL,
  `dept_name` varchar(55) NOT NULL,
  `session` varchar(55) NOT NULL,
  `semester` int(100) NOT NULL,
  `status` varchar(55) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`attendance_id`, `serial`, `student_roll`, `name`, `course_code`, `dept_name`, `session`, `semester`, `status`, `date`) VALUES
(109, 1, 'MUH2025001M', 'Fardin Alam Alif', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(110, 2, 'BFH2025002F', 'Fazilater Jahan', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(111, 3, 'MUH2025003M', 'Shoriful Habib', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(112, 4, 'MUH2025004M', 'Md. Asif Mahmud', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-20'),
(113, 5, 'MUH2025005M', 'Md. Rabiul Islam Santo', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(114, 6, 'BKH2025006F', 'Nure Jannat', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-20'),
(115, 7, 'MUH2025007M', 'Mir Mohammad Tahsin', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-20'),
(116, 8, 'MUH2025008M', 'Kazi Ashikur Rahman', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(117, 9, 'BFH2025009F', 'Jannatun Nur Etu', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(118, 10, 'BFH2025010F', 'Sanjida Akter Samanta', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(119, 11, 'MUH2025011M', 'Md. Mahbub Hasan Talukder', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(120, 15, 'MUH2003001M', 'Imtiaz Chowdhury', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(121, 16, 'MUH2003002M', 'Faysal Mahmud', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(122, 17, 'MUH2003003M', 'Jahid Hasan', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-20'),
(129, 1, 'MUH2025001M', 'Fardin Alam Alif', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(130, 2, 'BFH2025002F', 'Fazilater Jahan', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(131, 3, 'MUH2025003M', 'Shoriful Habib', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(132, 4, 'MUH2025004M', 'Md. Asif Mahmud', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(133, 5, 'MUH2025005M', 'Md. Rabiul Islam Santo', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(134, 6, 'BKH2025006F', 'Nure Jannat', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(135, 7, 'MUH2025007M', 'Mir Mohammad Tahsin', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(136, 8, 'MUH2025008M', 'Kazi Ashikur Rahman', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(137, 9, 'BFH2025009F', 'Jannatun Nur Etu', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(138, 10, 'BFH2025010F', 'Sanjida Akter Samanta', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(139, 11, 'MUH2025011M', 'Md. Mahbub Hasan Talukder', 'BUS 3107', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-15'),
(140, 1, 'MUH2025001M', 'Fardin Alam Alif', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-11'),
(141, 2, 'BFH2025002F', 'Fazilater Jahan', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(142, 3, 'MUH2025003M', 'Shoriful Habib', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-11'),
(143, 4, 'MUH2025004M', 'Md. Asif Mahmud', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(144, 5, 'MUH2025005M', 'Md. Rabiul Islam Santo', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(145, 6, 'BKH2025006F', 'Nure Jannat', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(146, 7, 'MUH2025007M', 'Mir Mohammad Tahsin', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'absent', '2023-09-11'),
(147, 8, 'MUH2025008M', 'Kazi Ashikur Rahman', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(148, 9, 'BFH2025009F', 'Jannatun Nur Etu', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(149, 10, 'BFH2025010F', 'Sanjida Akter Samanta', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(150, 11, 'MUH2025011M', 'Md. Mahbub Hasan Talukder', 'CSE 3103', 'Software Engineering', '2019-2020', 5, 'present', '2023-09-11'),
(154, 15, 'MUH2003001M', 'Imtiaz Chowdhury', 'CSE 3107', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(155, 16, 'MUH2003002M', 'Faysal Mahmud', 'CSE 3107', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(156, 17, 'MUH2003003M', 'Jahid Hasan', 'CSE 3107', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(157, 12, 'MUH2001001M', 'Fahim Chowdhury', 'CSE 3207', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(158, 13, 'MUH2001002M', 'Al Latif', 'CSE 3207', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(159, 14, 'MUH2001003M', 'Imtiaz Chowdhury', 'CSE 3207', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-21'),
(160, 15, 'MUH2003001M', 'Imtiaz Chowdhury', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-24'),
(161, 16, 'MUH2003002M', 'Faysal Mahmud', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'present', '2023-09-24'),
(162, 17, 'MUH2003003M', 'Jahid Hasan', 'CSE 3102', 'Information And Communication Engineering', '2019-2020', 5, 'absent', '2023-09-24'),
(166, 12, 'MUH2001001M', 'Fahim Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'absent', '2023-09-08'),
(167, 13, 'MUH2001002M', 'Al Latif', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-08'),
(168, 14, 'MUH2001003M', 'Imtiaz Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-08'),
(169, 12, 'MUH2001001M', 'Fahim Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-13'),
(170, 13, 'MUH2001002M', 'Al Latif', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'absent', '2023-09-13'),
(171, 14, 'MUH2001003M', 'Imtiaz Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-09-13'),
(172, 12, 'MUH2001001M', 'Fahim Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-08-30'),
(173, 13, 'MUH2001002M', 'Al Latif', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-08-30'),
(174, 14, 'MUH2001003M', 'Imtiaz Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-08-30'),
(175, 12, 'MUH2001001M', 'Fahim Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'absent', '2023-08-27'),
(176, 13, 'MUH2001002M', 'Al Latif', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-08-27'),
(177, 14, 'MUH2001003M', 'Imtiaz Chowdhury', 'CSE 3203', 'Computer Science And Engineering', '2019-2020', 5, 'present', '2023-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` varchar(55) NOT NULL,
  `course_name` varchar(55) NOT NULL,
  `dept_name` varchar(55) NOT NULL,
  `session` varchar(55) NOT NULL,
  `semester` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `dept_name`, `session`, `semester`) VALUES
('BUS 3107', 'Business Communications', 'Software Engineering', '2019-2020', 5),
('CSE 3101', 'Professional Ethics for Information Systems', 'Software Engineering', '2019-2020', 5),
('CSE 3102', 'Structured Programming', 'Information And Communication Engineering', '2019-2020', 5),
('CSE 3103', 'Web Technology', 'Software Engineering', '2019-2020', 5),
('CSE 3105', 'Data Science and Analytics – DBMS II', 'Software Engineering', '2019-2020', 5),
('CSE 3107', 'Web Technology', 'Information And Communication Engineering', '2019-2020', 5),
('CSE 3203', 'Theory of Computation', 'Computer Science And Engineering', '2019-2020', 5),
('CSE 3206', 'Data Science and Analytics – DBMS II', 'Computer Science And Engineering', '2019-2020', 5),
('CSE 3207', 'Artificial Intelligence', 'Computer Science And Engineering', '2019-2020', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_code` varchar(55) NOT NULL,
  `dept_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_code`, `dept_name`) VALUES
('CSE', 'Computer Science And Engineering'),
('ICE', 'Information And Communication Engineering'),
('SE', 'Software Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `serial` int(100) NOT NULL,
  `roll_number` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `dept_name` varchar(55) NOT NULL,
  `session` varchar(55) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`serial`, `roll_number`, `name`, `dept_name`, `session`, `semester`) VALUES
(1, 'MUH2025001M', 'Fardin Alam Alif', 'Software Engineering', '2019-2020', 5),
(2, 'BFH2025002F', 'Fazilater Jahan', 'Software Engineering', '2019-2020', 5),
(3, 'MUH2025003M', 'Shoriful Habib', 'Software Engineering', '2019-2020', 5),
(4, 'MUH2025004M', 'Md. Asif Mahmud', 'Software Engineering', '2019-2020', 5),
(5, 'MUH2025005M', 'Md. Rabiul Islam Santo', 'Software Engineering', '2019-2020', 5),
(6, 'BKH2025006F', 'Nure Jannat', 'Software Engineering', '2019-2020', 5),
(7, 'MUH2025007M', 'Mir Mohammad Tahsin', 'Software Engineering', '2019-2020', 5),
(8, 'MUH2025008M', 'Kazi Ashikur Rahman', 'Software Engineering', '2019-2020', 5),
(9, 'BFH2025009F', 'Jannatun Nur Etu', 'Software Engineering', '2019-2020', 5),
(10, 'BFH2025010F', 'Sanjida Akter Samanta', 'Software Engineering', '2019-2020', 5),
(11, 'MUH2025011M', 'Md. Mahbub Hasan Talukder', 'Software Engineering', '2019-2020', 5),
(12, 'MUH2001001M', 'Fahim Chowdhury', 'Computer Science And Engineering', '2019-2020', 5),
(13, 'MUH2001002M', 'Al Latif', 'Computer Science And Engineering', '2019-2020', 5),
(14, 'MUH2001003M', 'Imtiaz Chowdhury', 'Computer Science And Engineering', '2019-2020', 5),
(15, 'MUH2003001M', 'Imtiaz Chowdhury', 'Information And Communication Engineering', '2019-2020', 5),
(16, 'MUH2003002M', 'Faysal Mahmud', 'Information And Communication Engineering', '2019-2020', 5),
(17, 'MUH2003003M', 'Jahid Hasan', 'Information And Communication Engineering', '2019-2020', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_details`
--
ALTER TABLE `attendance_details`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_code`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_details`
--
ALTER TABLE `attendance_details`
  MODIFY `attendance_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
