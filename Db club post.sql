-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 10:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uiucms`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_info`
--

CREATE TABLE `club_info` (
  `club_id` varchar(10) NOT NULL,
  `dept_id` varchar(10) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `post_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `comment` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `user_id` varchar(10) NOT NULL,
  `club_id` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `person` varchar(10) NOT NULL,
  `person_to` varchar(10) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `post_text` varchar(10000) NOT NULL,
  `post_picture` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_reaction` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user`, `post_text`, `post_picture`, `time`, `total_reaction`, `status`) VALUES
(1, '011191156', 'Member Recruitment Coming Soon!', '[null]', '2022-08-15 06:23:10', 109, 'permited'),
(2, 'UIURobotic', 'Innobotics 2020 was a hit!', '', '2022-08-15 20:41:38', 546, 'permited'),
(3, 'UIURobotic', 'Congratulations UIU Mars Rover!\r\n#mavencrew', '', '2022-08-15 20:43:21', 0, 'pending'),
(4, 'UIURobotic', 'Congratulations UIU Mars Rover!\r\n#mavencrew', '', '2022-08-15 20:43:01', 322, 'permitted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `dept` varchar(8) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `cover_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `dept`, `profile_pic`, `cover_pic`) VALUES
('011191116', 'korim', 'akarim191116@bscse.uiu.ac.bd', 'abcdefghij', 'CSE', '', ''),
('011191117', 'Sharita Rahman', 'srahman191117@bscse.uiu.ac.bd', 'abcdefghij', 'CSE', '', ''),
('011191156', 'Shahariar Tasin Rifat', 'srifat191156@bscse.uiu.ac.bd', '011191156', 'CSE', 'img1.png', 'img1.png'),
('DeptCSE', 'Department of Computer Science and Engineering', 'cse.uiu.ac.bd', 'DeptCSE', '', 'img1.png', 'img1.png'),
('UIURobotic', 'UIU Robotics Club', 'uiurobotics@uiu.ac.bd', '12345', 'CSE, EEE', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_info`
--
ALTER TABLE `club_info`
  ADD KEY `club_id` (`club_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD KEY `person` (`person`),
  ADD KEY `person_to` (`person_to`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_info`
--
ALTER TABLE `club_info`
  ADD CONSTRAINT `club_info_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `club_info_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `membership_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`person`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`person_to`) REFERENCES `users` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
