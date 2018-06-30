-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 07:42 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ggits_alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(128) NOT NULL,
  `from_id` int(128) NOT NULL,
  `title` longtext NOT NULL,
  `msg` longtext NOT NULL,
  `date_created` datetime NOT NULL,
  `likes` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `from_id`, `title`, `msg`, `date_created`, `likes`) VALUES
(13, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 1),
(113, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 5),
(123, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 3),
(1113, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 1),
(1123, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 9),
(11213, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 1),
(11253, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 1),
(112123, 123123, '1231231231', '123123', '2018-06-06 00:00:00', 1),
(362876, 1, 'asdasd', '<p>asdasd</p>\r\n', '2018-06-29 15:22:13', 0),
(495210, 1, 'asdsadgsdfh', '<p>sfdgdsafhsdetgfhsdgh</p>\r\n', '2018-06-29 15:22:24', 0),
(652356, 1, 'Test Announcement', '<p>Hello World</p>\r\n', '2018-06-28 17:33:17', 1),
(720577, 1, 'sfrgasfhsefh', '<p>dfghsdfghsdfghsdgh</p>\r\n', '2018-06-29 15:22:32', 0),
(741441, 1, 'asd', '<p>asd</p>\r\n', '2018-06-29 15:22:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `e_id` int(100) NOT NULL,
  `u_id` int(50) NOT NULL,
  `eventName` longtext NOT NULL,
  `eventDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`e_id`, `u_id`, `eventName`, `eventDate`) VALUES
(5, 467023, 'Joined GGITS', '2007-05-15'),
(3, 1, 'Joined GGITS', '2017-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `u_id` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `session` varchar(128) NOT NULL,
  `course` varchar(255) NOT NULL,
  `isAdmin` int(10) NOT NULL DEFAULT '0',
  `startYear` int(10) NOT NULL,
  `endYear` int(10) NOT NULL,
  `curr_pos` varchar(255) NOT NULL,
  `curr_com` varchar(255) NOT NULL,
  `curr_loc` varchar(255) NOT NULL,
  `curr_phn` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`u_id`, `username`, `password`, `fname`, `lname`, `email`, `session`, `course`, `isAdmin`, `startYear`, `endYear`, `curr_pos`, `curr_com`, `curr_loc`, `curr_phn`, `branch`, `college`) VALUES
(1, 'pavitra14', '35264fd61ce03be24bac8250b3f521a0', 'Pavitra', 'Behre', 'pavitra.behre@gmail.com', '2017-2021', 'B.Tech', 1, 2017, 2021, 'Freelancer', 'Student', 'Jabalpur, Madhya Pradesh', '+919424995580', 'CSE', 'Gyan Ganga Institute of Technology and Sciences'),
(123, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'User', 'testing@pbehre.in', '2003-2007', 'B.E.', 0, 2003, 2007, 'Marketing', 'Google', 'Hyderabad, India', '+91 9421346592', 'CSE', 'Gyan Ganga Institute of Technology and Sciences'),
(1232, 'test2', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'User', 'testing@pbehre.in', '2003-2007', 'B.E.', 0, 2007, 2011, 'Marketing', 'Google', 'Hyderabad, India', '+91 9421346592', 'CSE', 'Gyan Ganga Institute of Technology and Sciences'),
(2232, 'test3', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'User', 'testing@pbehre.in', '2003-2007', 'B.E.', 0, 2012, 2016, 'Marketing', 'Google', 'Hyderabad, India', '+91 9421346592', 'CSE', 'Gyan Ganga Institute of Technology and Sciences'),
(22132, 'test4', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'User', 'testing@pbehre.in', '2003-2007', 'B.E.', 0, 2018, 2022, 'Marketing', 'Google', 'Hyderabad, India', '+91 9421346592', 'CSE', 'Gyan Ganga Institute of Technology and Sciences'),
(467023, 'test5', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'User5', 'test@test.com', '2004-2008', 'B.Tech', 0, 2004, 2008, 'Freenlancer', 'Google', 'California, USA', '1111111111', 'CSE', 'Gyan Ganga Institute of Technology and Sciences');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `e_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
