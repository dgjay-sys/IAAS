-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 02:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sfms`
--

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `store_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `date_uploaded` varchar(100) NOT NULL,
  `stud_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` int(11) NOT NULL,
  `stud_no` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `department` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `major` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cabinet` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_no`, `firstname`, `lastname`, `gender`, `department`, `course`, `major`, `year`, `status`, `cabinet`, `password`) VALUES
(25, 1100, 'Cardo', 'Dalisay', 'Male', 'CAS', 'BSINFOTECH', '', '3B', 'Active', '3', '1e6e0a04d20f50967c64dac2d639a577'),
(26, 1101, 'Carla', 'Abellana', 'Female', 'CBA', 'BSBA', 'Marketing-Management', '1A', 'Active', '1', 'b8c37e33defde51cf91e1e03e51657da'),
(27, 1102, 'Juan ', 'Dela Cruz', 'Male', 'CEd', 'BSE', 'Mathematics', '4C', 'Active', '4', 'c667d53acd899a97a85de0c201ba99be'),
(28, 1103, 'Jane', 'Santos', 'Female', 'CBA', 'BSBA', 'Marketing-Management', '2B', 'Active', '2', 'aace49c7d80767cffec0e513ae886df0'),
(29, 1104, 'Drake', 'Cruz', 'Male', 'CEd', 'BSE', 'Science', '3C', 'Active', '3', '4da04049a062f5adfe81b67dd755cecc'),
(30, 1105, 'Juan', 'Dela Cruz', 'Male', 'CAS', 'BSINFOTECH', '', '1A', 'Active', '1', 'af21d0c97db2e27e13572cbf59eb343d'),
(31, 1106, 'Anne', 'Crame', 'Female', 'CEd', 'BSNEd', '', '2C', 'Active', '2', 'c9f95a0a5af052bffce5c89917335f67'),
(32, 1107, 'Christine', 'Pangilinan', 'Female', 'CEd', 'BTLE', 'Home-Economics', '3A', 'Active', '3', 'e58cc5ca94270acaceed13bc82dfedf7'),
(33, 1108, 'Benedict', 'Corpuz', 'Male', 'CEd', 'BSNEd', 'Industrial-Arts', '1B', 'Active', '1', 'b9d487a30398d42ecff55c228ed5652b'),
(34, 1109, 'Liam', 'Uy', 'Male', 'CAFA', 'BFA', 'Visual-Communication', '3C', 'Active', '2', '8f1d43620bc6bb580df6e80b0dc05c48'),
(35, 1110, 'Joaquin', 'Lopez', 'Male', 'CEd', 'BSE', 'Mathematics', '3A', 'Active', '3', '2cbca44843a864533ec05b321ae1f9d1'),
(36, 1111, 'Nica', 'Menor', 'Female', 'CHM', 'BSHM', '', '1A', 'Inactive', '1', 'b59c67bf196a4758191e42f76670ceba'),
(37, 1112, 'Patrick', 'Depaz', 'Male', 'CIT', 'BSIT', 'Electrical-Technology', '2B', 'Inactive', '2', '20d135f0f28185b84a4cf7aa51f29500'),
(38, 1113, 'Cecilia', 'Rosales', 'Female', 'CIT', 'BSIT', 'Automotive-Technology', '3C', 'Inactive', '3', '73278a4a86960eeb576a8fd4c9ec6997'),
(39, 1114, 'Hanna', 'Bueno', 'Female', 'CIT', 'BSIT', 'Drafting-Technology', '4A', 'Inactive', '4', 'd6ef5f7fa914c19931a55bb262ec879c'),
(40, 1115, 'Angela', 'Pangan', 'Female', 'CIT', 'BST', 'Food-Technology', '1B', 'Inactive', '1', 'e19347e1c3ca0c0b97de5fb3b690855a'),
(41, 1116, 'Alex', 'Monde', 'Female', 'CAS', 'BSINFOTECH', '', '4A', 'Graduate', '4', 'dd77279f7d325eec933f05b1672f6a1f'),
(42, 1117, 'Janwen', 'Que', 'Male', 'CIT', 'BSIT', 'Fashion-and-Apparel-Technology', '2C', 'Inactive', '2', '0eec27c419d0fe24e53c90338cdc8bc6'),
(43, 1118, 'Oliver', 'De leon', 'Male', 'CAS', 'BSINFOTECH', '', '4A', 'Graduate', '4', 'c60d060b946d6dd6145dcbad5c4ccf6f'),
(44, 1119, 'Erika', 'Gome', 'Female', 'CEd', 'BSE', 'Mathematics', '4C', 'Graduate', '4', '8597a6cfa74defcbde3047c891d78f90');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `status`) VALUES
(1, 'Administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator'),
(3, 'test', 'admin', 'testadmin', '9283a03246ef2dacdc21a9b137817ec1', 'Regular'),
(4, 'try', 'me', 'tryme', 'fa4d61dc44a17eb83df48e904ac228b0', 'Regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
