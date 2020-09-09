-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 05:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_desk`
--
CREATE DATABASE IF NOT EXISTS `help_desk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `help_desk`;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `path_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `ticket_id`, `caption`, `path_name`) VALUES
(22, 10, 'more image', '5de443223896d.png'),
(23, 7, 'monitor issue', '5de54175ad59c.jpg'),
(25, 16, 'error message', '5dea9ed7d062d.png'),
(26, 18, 'windows key message', '5df199d8bbcd7.png'),
(33, 6, 'mouse broken', '5df1ba53eb49d.jpg'),
(34, 11, 'wifi', '5df1bab020ebd.png');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `creation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`note_id`, `user_id`, `note`, `creation_time`) VALUES
(1, 4, 'hdf', '0000-00-00 00:00:00'),
(2, 4, 'hdf', '2009-12-14 00:00:00'),
(3, 4, 'hello', '2009-12-19 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `message` tinytext NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `status` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `message`, `receiver_id`, `sender_id`, `status`, `type`) VALUES
(4, 'Ticket 7 has been assigned to you.', 17, 4, 'unread', 'reassign'),
(5, 'Ticket 7 has been assigned to you.', 4, 17, 'read', 'reassign'),
(6, 'Ticket 7 has been assigned to you.', 17, 4, 'read', 'reassign'),
(7, 'Ticket 10 has been assigned to you.', 4, 4, 'read', 'reassign'),
(14, 'Ticket 6 has been assigned to you.', 41, 14, 'read', 'reassign'),
(15, 'Ticket 11 has been assigned to you.', 19, 14, 'unread', 'reassign'),
(16, 'Ticket 12 has been assigned to you.', 17, 17, 'read', 'reassign'),
(17, 'Ticket 13 has been assigned to you.', 4, 4, 'unread', 'reassign'),
(18, 'Ticket 15 has been assigned to you.', 4, 4, 'unread', 'reassign'),
(19, 'Ticket 16 has been assigned to you.', 4, 4, 'unread', 'reassign'),
(21, 'Ticket 7 has been assigned to you.', 4, 17, 'unread', 'reassign'),
(29, 'Ticket 14 has been assigned to you.', 4, 4, 'unread', 'reassign'),
(30, 'Ticket 17 has been assigned to you.', 17, 4, 'unread', 'reassign'),
(31, 'Ticket 21 has been assigned to you.', 19, 4, 'unread', 'reassign');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `ticket_status` varchar(50) NOT NULL,
  `urgency` varchar(50) DEFAULT NULL,
  `priority` varchar(50) DEFAULT NULL,
  `closed_on` datetime DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `title`, `description`, `created_by`, `created_on`, `ticket_status`, `urgency`, `priority`, `closed_on`, `assigned_to`) VALUES
(6, 'broken mouse', ' my mouse is broken very bad', 5, '2019-11-20 07:17:01', 'open', NULL, NULL, NULL, 41),
(7, 'laptop very slow', ' laptop is slow. applications take a lot of time to load', 5, '2019-11-20 09:12:00', 'open', NULL, NULL, NULL, 4),
(8, 'Need license for Office', ' Need license to use Office applications like Word and Excel. Please this is urgent', 16, '2019-11-22 08:29:17', 'open', NULL, NULL, NULL, NULL),
(10, 'monitor screen black', ' monitor screen is black. seemed to have not power', 16, '2019-11-25 08:10:11', 'open', '1', '1', NULL, 4),
(11, 'wifi not working', ' my wifi not working', 5, '2019-11-27 08:42:12', 'open', NULL, NULL, NULL, 19),
(12, 'monitor', ' it is damaged', 17, '2019-12-02 06:24:10', 'open', NULL, NULL, NULL, 17),
(13, 'Out of memory space in hard drive', ' Need more space in hard drive. Would like to get SSD', 4, '2019-12-02 08:22:31', 'closed', '', '', '2019-12-04 09:40:30', 4),
(14, 'keyboard arrow keys issue', ' all of the arrow keys on the keyboard are not working', 5, '2019-12-02 08:46:12', 'open', NULL, NULL, NULL, 4),
(15, 'excel crashing again', '   my excel application crashed a month ago and it was fixed. now I have the same issue happening again.', 5, '2019-12-06 07:26:45', 'closed', '', '', '2019-12-06 07:29:44', 4),
(16, 'powerpoint issue', ' powerpoint is crashing', 5, '2019-12-06 07:31:34', 'closed', '1', '2', '2019-12-12 01:53:14', 4),
(17, 'broken Logitech mouse', '  my mouse is broken very bad', 5, '2019-12-11 10:18:41', 'open', '1', '1', NULL, 17),
(18, 'Windows Product key', ' my windows is saying product key expired. would you provide me a new key?', 5, '2019-12-12 02:36:27', 'open', '3', '3', NULL, NULL),
(19, 'powerpoint issue AGAIN', '   powerpoint had problems 2 months ago. the same issue is happening again. it crashes down completely. Whenever I try to open a powerpoint file, the program runs and crashes.', 5, '2019-12-12 03:02:35', 'open', '3', '3', NULL, NULL),
(21, 'samepl', ' sample ticket', 5, '2019-12-12 03:37:50', 'open', '3', '3', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_detail`
--

CREATE TABLE `ticket_detail` (
  `ticket_detail_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `detail_message` tinytext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_detail`
--

INSERT INTO `ticket_detail` (`ticket_detail_id`, `ticket_id`, `detail_message`, `created_by`, `created_on`) VALUES
(2, 6, 'will ship a new mouse', 4, '2019-11-20 05:16:17'),
(31, 6, ' shipped mouse', 5, '2019-11-22 09:46:16'),
(34, 8, ' need it ugrent', 16, '2019-11-23 07:47:52'),
(35, 7, ' unable to start laptop today', 5, '2019-11-23 07:48:31'),
(36, 6, ' ok', 5, '2019-11-25 02:19:23'),
(37, 6, ' work in progress', 41, '2019-11-27 08:43:53'),
(38, 10, ' Can you provide more information? Thank you', 4, '2019-11-29 05:52:39'),
(39, 10, ' test image', 4, '2019-11-29 06:03:36'),
(40, 10, ' ssss', 4, '2019-11-29 08:25:02'),
(41, 10, ' kk', 4, '2019-11-29 08:30:45'),
(42, 7, ' please provide additional details', 17, '2019-11-29 09:53:17'),
(43, 16, ' Can you please upload error message?\r\n', 4, '2019-12-06 07:33:11'),
(44, 17, ' Hello,\r\nWould you be able to provide more information? Please attach any images if you have.\r\nThank you.', 17, '2019-12-12 02:27:53'),
(45, 18, ' Hello,\r\nI have images regarding this issue. I will upload them', 5, '2019-12-12 02:37:07'),
(46, 18, ' My computer also crashes and shows a blue screen. is this related to the windows key. please look at the image attached', 5, '2019-12-12 02:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `email`, `phone_number`, `address`, `job_type`, `user_type`, `status`) VALUES
(4, 'tech1', '$2y$10$HIZMTYnwnLk8aE3WbKdKreDuwRrcQ1A228E5uOIPBdYOc0Sqn3Dwu', 'Tech 1', 'tech1@gmail.com', '55', '34 ryan street', 'help desk support', 'tech', 'approved'),
(5, 'koko', '$2y$10$ytojNbtwDh4bFH7CbtE2NO8cGuwGhoPMcxc38sPCK41/zem9I5Kj6', 'ko', 'koko@gmail.com', '1234677462', '24 arthur', 'analyst', 'end user', 'approved'),
(14, 'supervisor', '$2y$10$oIAU2qcLv.9FYf2jmHdUIOGk8KNwvx/r45zg9nzCCxAihFh1iabni', 'supervisor', 'supervisor@gmail.com', '1111111111', '11 sunny st', 'supervisor', 'supervisor', 'approved'),
(15, 'alan', '$2y$10$g3U7ifjsBiU2781BkjMfQeOBqxhLhjHDNGL3PYtMlPWThfC1yoUHu', 'Alan Grimes', 'alan@gmail.com', '456-7895', '95 riverside', 'supervisor', 'supervisor', 'pending'),
(16, 'sam', '$2y$10$Y/tgpkScF.REM94B0UgnqeTvoA4rgXMBUMy0U69VyusXyvIWfqajm', 'Sam', 'sam@gmail.com', '444-888-5554', '34 water', 'receptionist', 'end user', 'approved'),
(17, 'tech2', '$2y$10$kQpngaOKCHBFo4Vb5v2rQeDpK6pX7xY..PJt1PKa7G1lBLCZkyF2W', 'Tech2', 'tech2@gmail.com', '444444444', '44 james str', 'network tech', 'tech', 'approved'),
(18, 'tech3', '$2y$10$R6oNwUIWqp87Wpz5bDZMv.kwUF77bFvFZG5rZ/srUvKy5zpexjkmC', 'Tech 3', 'tech3@gmail.com', '963852', '96 ruiz str', 'cloud technician', 'tech', 'pending'),
(19, 'Tech Rambo', '$2y$10$2E5UY7hditSxMIMnYR55nubekEWzt190b/WCyQsdsQMMg7Oq.aXYG', 'Mr Rambo', 'rambo@gmail.com', '232-3234', '7 riden', 'hardware support', 'tech', 'approved'),
(20, 'supervisor networking', '$2y$10$qPNS9wTIbCfVxWi0B50xbuOlkmZ6VC6TR1w4f9T6r3rZ72pZWwWdO', 'James Collen', 'jamescollen@gmail.com', '243-3123', '265 elisabeth street', 'networking supervisor', 'supervisor', 'approved'),
(40, 'qw', '$2y$10$xZ0closAyK9xiHmdoLa.1OxOldGESp0TGg548xXSYIPd7u1ks0K1e', 'qw', 'qw', 'qwqw', 'qwqw', 'qwww', 'tech', 'pending'),
(41, 'sd', '$2y$10$3sYky/Wo5i7Vsy17cS1X5e0JmtW8NUZzkwL1mqgP3rn7BXiqozxVG', 'sd', 'sd', 'sd', 'sdsd', 'sds', 'tech', 'approved'),
(42, 'pk', '$2y$10$0tSP4RmG7i2w8LtZFTLvueD8iAd0OkcaJ4Rs/EdT/NZD1J1/X5AWu', 'pk', 'pk', 'pk', 'pk', 'pk', 'supervisor', 'pending'),
(43, 'tech5', '$2y$10$CvMode5rV8EPhVx1bK0FOOwFSS3VEbVuuJmbXmnlTV/iJoiv5lfCy', 'tech5', 'tech5', '334343', '34 strrr', 'techn', 'tech', 'pending'),
(45, 'er', '$2y$10$oBiagCzWdjxVAtemjZH1tOHToY4eyufcPA28RnuFIKQqqxOQg.lFO', 'er', 'er', '44', 'err', 'err', 'end user', 'approved'),
(50, 'tech10', '$2y$10$s5aIithnE/8It4MEn0wUduAyaAhsJOIJ6Ghn2amMF/je0AwUFVrzy', 'tech10', 'tech10@gmail.com', '345-3344', '45 garison', 'cloud tech', 'tech', 'pending'),
(61, 'jack', '$2y$10$s2TczZkaCxAUy4iNxmgi0e3m.AqMTVhCob6o1Ov2RLwnp803SkfQ2', 'Jack', 'jack@gmail.com', '', '', '', 'end user', 'approved'),
(62, 'tech13', '$2y$10$JdxrWDTQlypsGvz32sq7muz3Gvn4KBV0YLFJRH6c/nHWYCH9vj9AO', 'Tech13', '', '', '', '', 'tech', 'approved'),
(63, 'morgan', '$2y$10$IygZSEWPc5y06dSm13cGuuY/NyHY/H2dthcoygwxpJyibryp8mACG', 'Morgan', '', '', '', '', 'supervisor', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `Image_ticket_id_FK` (`ticket_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`note_id`),
  ADD KEY `message_user_id_FK` (`user_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_receiver_id_FK` (`receiver_id`),
  ADD KEY `notification_sender_id_FK` (`sender_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD PRIMARY KEY (`ticket_detail_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  MODIFY `ticket_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `Image_ticket_id_FK` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_receiver_id_FK` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_sender_id_FK` FOREIGN KEY (`sender_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_assigned_to_FK` FOREIGN KEY (`assigned_to`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_created_by_FK` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket_detail`
--
ALTER TABLE `ticket_detail`
  ADD CONSTRAINT `ticket_detail_created_by_FK` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_detail_ticket_id_FK` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`ticket_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
