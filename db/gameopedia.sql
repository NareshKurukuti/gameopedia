
--
-- Database: `gameopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS admin;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$L2VXE1Z6n4Up64J92VAsSep9QOYiCGUtAqDExg9lRNSaIL4P2vkm6', 'Naresh', 'K', 'FB_IMG_1496657816542.jpg', '2021-05-14 21:10:01');


DROP TABLE IF EXISTS employees;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `employee_id` (`employee_id`)
);

INSERT INTO `employees` (`id`, `employee_id`, `email`, `password`, `firstname`, `lastname`, `photo`, `created`) VALUES
(1, 'yzuJpx1KNRTcYSD', 'nk@gmail.com', '$2y$10$vVjA6ewpX1w2W66Upg919e8O0JkpCXQfkowuV8uS8j6KpuD8sre6y', 'Naresh', 'K', 'FB_IMG_1500367687837.jpg', '2021-05-14 21:02:41'),
(2, '5nlpkfUaJ8Ed6iH', 'e1@gmail.com', '$2y$10$HCElzy1zSWcsCakgrIh9H.3S5ybUJKAD941LcBDxKt9Ph0xX3Z.Mm', 'Employee', 'One', '', '2021-05-14 21:03:02'),
(4, '4OQnHiLdzxkSVYq', 'e2@gmail.com', '$2y$10$DNzFPV43iYokCEV6RYfEFu8Vn5DqMdd0qTDnojXsd6SErKneelmBK', 'Employee', 'Two', '', '2021-05-14 21:09:07'),
(5, 'hT1DlIXPRjgHCrp', 'e3@gmail.com', '$2y$10$F2ZNl1DnSb2YrPNSPr5EDOK4tPf977Ji4jCnonNVh7rHzjIStnaWC', 'Employee', 'Three', '', '2021-05-14 21:24:00');

DROP TABLE IF EXISTS messages;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `priority` int(11) NOT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `messages` (`id`, `description`, `priority`, `created`) VALUES
(1, 'Who is your Fav hero?', 1, '2021-05-14 21:06:26'),
(2, 'Who is Indian PM?', 2, '2021-05-14 21:07:17');


DROP TABLE IF EXISTS options;
CREATE TABLE `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `option_data` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `options` (`id`, `message_id`, `option_data`, `photo`, `created`) VALUES
(1, 1, 'Megastart', '', '2021-05-14 21:07:35'),
(2, 1, 'Balayya', '', '2021-05-14 21:07:49'),
(3, 2, 'Modi', '', '2021-05-14 21:08:02'),
(4, 2, 'Rahul', '', '2021-05-14 21:08:09'),
(5, 2, 'KCR', '', '2021-05-14 21:08:17');



DROP TABLE IF EXISTS votes_list;
CREATE TABLE `votes_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

INSERT INTO `votes_list` (`id`, `employee_id`, `message_id`, `option_id`, `created`) VALUES
(1, 1, 2, 3, '2021-05-14 21:10:36'),
(2, 4, 1, 1, '2021-05-14 21:11:24'),
(3, 4, 2, 3, '2021-05-14 21:11:24'),
(4, 2, 1, 2, '2021-05-14 21:21:15'),
(5, 2, 2, 3, '2021-05-14 21:23:07');