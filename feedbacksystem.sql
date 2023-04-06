-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 03:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedbacksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`category_id`, `category_name`, `category_desc`) VALUES
(2, 'Guidance Feedback', 'Guidance feedback is a term used to describe the process of giving and receiving feedback in a constructive manner.'),
(3, 'Encouragement Feedback', 'Encouragement feedback is a type of feedback that focuses on strengths, contributions, and value.'),
(4, 'Forward Feedback', 'Feedback refers to the information given to an individual about their performance after they have completed a task3.\r\nFeedforward, on the other hand, refers to the information given to an individual before they have completed a task.'),
(5, 'Coaching Feedback', 'Coaching feedback is a technique that involves asking people to give themselves feedback instead of, or before, giving one’s own.'),
(6, 'Informal feedback', 'Informal feedback is spontaneous and less rigidly structured feedback that can occur at any time or location in real-time. It can be a casual conversation with a person regarding their performance, behaviours or interactions.'),
(7, 'Formal Feedback', 'Formal feedback is usually planned and predetermined and fixed arbitrarily. It is a type of feedback that is given by a manager to an employee to improve performance and effectiveness.');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tb`
--

CREATE TABLE `comment_tb` (
  `comment_id` int(11) NOT NULL,
  `comment_content` varchar(10000) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `contact_id` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deparment_tb`
--

CREATE TABLE `deparment_tb` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `department_desc` varchar(500) NOT NULL,
  `state_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deparment_tb`
--

INSERT INTO `deparment_tb` (`department_id`, `department_name`, `department_desc`, `state_code`) VALUES
(1, 'Quality Assurance', 'Quality Assurance department is responsible for ensuring that software products and services meet quality standards and customer requirements.', 2),
(2, 'Testing', 'Testing department is responsible for designing and executing product testing plans to ensure that products meet quality standards and customer requirements.', 2),
(3, 'Quality Control', 'Quality Control department is responsible for inspecting products and services to ensure that quality standards and customer requirements are met.', 2),
(4, 'Software Development', 'Software Development department is responsible for creating software products and services.', 2),
(5, 'Information Technology', 'Information Technology department is responsible for managing the technology and infrastructure needed to develop and deliver products and services.', 2),
(6, 'Quality Assurance', 'Quality Assurance department is responsible for ensuring that software products and services meet quality standards and customer requirements.', 1),
(7, 'Testing', 'Testing department is responsible for designing and executing product testing plans to ensure that products meet quality standards and customer requirements.', 1),
(8, 'Quality Control', 'Quality Control department is responsible for inspecting products and services to ensure that quality standards and customer requirements are met.', 1),
(9, 'Software Development', 'Software Development department is responsible for creating software products and services.', 1),
(10, 'Information Technology', 'Information Technology department is responsible for managing the technology and infrastructure needed to develop and deliver products and services.', 1),
(11, 'Customer Support', 'Customer Support department is responsible for providing support and assistance to users of the feedback website.', 0),
(12, 'Information Technology', 'Information Technology department is responsible for managing the technology and infrastructure needed to develop and deliver products and services.', 0),
(13, 'Operations', 'Operations department manages the day-to-day operations and maintenance of the feedback website.', 0),
(14, 'Student Services', 'Student Services department is responsible for providing services to students, including support for the feedback website.', 0),
(15, 'Academic Affairs', 'Academic Affairs department is responsible for managing academic programs and services, including support for the feedback website.', 0),
(16, 'Admin', 'Administrator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `feedback_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `feedback_content` varchar(10000) NOT NULL,
  `document` varchar(1000) NOT NULL,
  `category_id` int(11) NOT NULL,
  `started_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `post_state` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification_tb`
--

CREATE TABLE `notification_tb` (
  `notify_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `notify_desc` varchar(500) NOT NULL,
  `notify_time` datetime NOT NULL,
  `notify_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position_tb`
--

CREATE TABLE `position_tb` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  `position_desc` varchar(500) NOT NULL,
  `state_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position_tb`
--

INSERT INTO `position_tb` (`position_id`, `position_name`, `position_desc`, `state_code`) VALUES
(11, 'Quality Assurance Manager', 'Quality Assurance Manager would be responsible for ensuring that all academic programs meet the required standards of quality and that they are delivered effectively and efficiently.', 2),
(12, 'Testing Manager', 'Testing Manager leads the testing team and is responsible for the overall testing process and test plans.', 2),
(13, 'Test Lead', 'Test Lead oversees a group of testers and is responsible for ensuring that testing is done accurately and efficiently.', 2),
(14, 'Quality Control Manager', 'Quality Control Manager oversees the quality control process and ensures that products and services meet quality standards and customer requirements.', 2),
(15, 'Quality Assurance Coordinator', 'Quality Assurance Coordinator supports the Quality Assurance team in executing its responsibilities.', 1),
(16, 'Testing Coordinator', 'Testing Coordinator supports the Testing team in executing its responsibilities.', 1),
(17, 'Quality Control Coordinator', 'Quality Control Coordinator supports the Quality Control team in executing its responsibilities.', 1),
(18, 'Customer Support Representative', 'Customer Support Representative helps users with any issues or questions they have regarding the feedback website.', 0),
(19, 'Technical Support Representative', 'Technical Support Representative helps users with any technical issues they are experiencing while using the feedback website.', 0),
(20, 'Help Desk Technician', 'Help Desk Technician provides technical support to users who are encountering problems with the feedback website.', 0),
(21, 'IT Specialist', 'IT Specialist maintains and oversees the computer and technology systems used by the feedback website.', 0),
(22, 'Admin', 'Administrator', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `deparment_id` int(11) DEFAULT NULL,
  `avatar` int(200) DEFAULT NULL,
  `state_code` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`email`, `password`, `fullname`, `dob`, `tel`, `position_id`, `address`, `deparment_id`, `avatar`, `state_code`) VALUES
('fb.uni.nguyenvannam@st.com', '7e70ff216b64eded4024b6c557299740', 'Nguyen Van Nam', '1900-01-01', '099096568', 18, '100A, Smart Street, Cornwall district', 11, 0, 0),
('fb.uni.qa@co.com', '9102b27d1a5f8a943af23aaa792f8b04', 'QA Coordinator', '1900-01-01', '099363733', 15, NULL, 6, 0, 1),
('fb.uni.qa@manager.com', 'e4cb3ce7f992a18c1ec57ea4f80c4dfb', 'QA Manager', '1900-01-01', '099151716', 11, NULL, 1, 0, 2),
('fb.uni@admin.com', '03d5434f055992e8dd67202ba05d8ad4', 'Administrator', '1900-01-01', '099585656', 22, NULL, 16, 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `deparment_tb`
--
ALTER TABLE `deparment_tb`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `email` (`email`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `notification_tb`
--
ALTER TABLE `notification_tb`
  ADD PRIMARY KEY (`notify_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `position_tb`
--
ALTER TABLE `position_tb`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`email`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `deparment_id` (`deparment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment_tb`
--
ALTER TABLE `comment_tb`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deparment_tb`
--
ALTER TABLE `deparment_tb`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_tb`
--
ALTER TABLE `notification_tb`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `position_tb`
--
ALTER TABLE `position_tb`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_tb`
--
ALTER TABLE `comment_tb`
  ADD CONSTRAINT `comment_tb_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_tb` (`email`);

--
-- Constraints for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD CONSTRAINT `feedback_tb_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_tb` (`email`),
  ADD CONSTRAINT `feedback_tb_ibfk_10` FOREIGN KEY (`department_id`) REFERENCES `deparment_tb` (`department_id`),
  ADD CONSTRAINT `feedback_tb_ibfk_11` FOREIGN KEY (`position_id`) REFERENCES `position_tb` (`position_id`),
  ADD CONSTRAINT `feedback_tb_ibfk_7` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`category_id`),
  ADD CONSTRAINT `feedback_tb_ibfk_8` FOREIGN KEY (`comment_id`) REFERENCES `comment_tb` (`comment_id`),
  ADD CONSTRAINT `feedback_tb_ibfk_9` FOREIGN KEY (`contact_id`) REFERENCES `contact_tb` (`contact_id`);

--
-- Constraints for table `notification_tb`
--
ALTER TABLE `notification_tb`
  ADD CONSTRAINT `notification_tb_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_tb` (`email`);

--
-- Constraints for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD CONSTRAINT `user_tb_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position_tb` (`position_id`),
  ADD CONSTRAINT `user_tb_ibfk_2` FOREIGN KEY (`deparment_id`) REFERENCES `deparment_tb` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
