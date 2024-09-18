-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 17, 2024 at 09:23 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`) VALUES
(1, '1896', 1),
(2, '1900', 1),
(3, '1912', 1),
(4, '1924', 1),
(5, 'Physics, Chemistry', 2),
(6, 'Physiology', 2),
(7, 'Medicine', 2),
(8, 'All of the above', 2),
(9, 'Labour Party', 3),
(10, 'Nazi Party', 3),
(11, 'Ku-Klux-Klan', 3),
(12, 'Democratic Party', 3),
(13, 'Bamboo', 4),
(14, 'Eucalyptus', 4),
(15, 'Aloe Vera', 4),
(16, 'Banana', 4),
(17, 'Rajagopalachari', 5),
(18, 'Bal Gangadhar Tilak', 5),
(19, 'Tatya Tope', 5),
(20, 'Sundar Pichai', 5),
(21, '245', 6),
(22, '248', 6),
(23, '246', 6),
(24, '145', 6),
(25, 'Rajya Sabha', 7),
(26, 'High Court', 7),
(27, ' Lok Sabha', 7),
(28, 'Supreme Court', 7),
(29, 'Delhi', 8),
(30, 'Hyderabad', 8),
(31, 'Rajasthan', 8),
(32, 'Mumbai', 8),
(33, 'Lata Mangeshkar', 9),
(34, 'Asha Bhosle', 9),
(35, ' Bhupen Hazarika ', 9),
(36, ' Manna Dey ', 9),
(37, 'Japan', 10),
(38, 'Asia', 10),
(39, 'South Korea', 10),
(40, 'Malaysia', 10),
(41, 'Lycopene', 11),
(42, 'Papain', 11),
(43, 'Carotene', 11),
(44, 'Caricaxanthin', 11),
(45, 'Salman Rushdie', 12),
(46, 'Arundhati Roy', 12),
(47, 'V.S. Naipaul', 12),
(48, 'Kiran Desai', 12),
(49, 'Punjab National Bank', 13),
(50, 'Indian Bank', 13),
(51, 'Bank of Baroda ', 13),
(52, 'Dena Bank', 13),
(53, 'Seismic ', 14),
(54, 'Cosmic', 14),
(55, 'Formic', 14),
(56, 'Anaemic', 14),
(57, 'Delhi', 15),
(58, 'Hyderabad', 15),
(59, 'Rajasthan', 15),
(60, 'Mumbai', 15),
(61, ' Lata Mangeshkar', 16),
(62, 'Asha Bhosle', 16),
(63, 'Bhupen Hazarika ', 16),
(64, 'Manna Dey ', 16),
(65, '2017', 17),
(66, '2015', 17),
(67, '2019', 17),
(68, '2020', 17),
(69, 'UK', 18),
(70, 'USA', 18),
(71, 'India', 18),
(72, 'Fiji', 18),
(73, 'Differential Research and Documentation Laboratory', 19),
(74, 'Department of Research and Development Laboratory', 19),
(75, 'Defense Research and Development Laboratory', 19),
(76, 'None of the above', 19),
(77, 'Mars', 20),
(78, 'Uranus', 20),
(79, 'Venus', 20),
(80, 'Earth', 20),
(81, 'Dr Homi Bhabha', 21),
(82, 'Dr Chidambaram', 21),
(83, 'Dr U.R. Rao', 21),
(84, 'Dr A.P.J. Abdul Kalam', 21),
(85, 'they produce high pitched sounds called ultrasonics', 22),
(86, 'the light startles them', 22),
(87, 'they have a perfect vision in the dark', 22),
(88, 'none of the above', 22),
(89, 'Jute industry', 23),
(90, 'Paper Industry', 23),
(91, 'Textile Industry', 23),
(92, 'Handloom Industry', 23),
(93, 'Cassia', 24),
(94, 'Legumes', 24),
(95, 'Pea', 24),
(96, 'Mulberry', 24),
(97, 'Equator', 25),
(98, 'Poles', 25),
(99, 'Prime Meridian', 25),
(100, 'Nowhere', 25);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `question`, `ans_id`) VALUES
(1, 'In what year was the first international modern Olympiad held?', 1),
(2, 'For which of these disciplines Nobel Prize is awarded?', 8),
(3, 'Hitler party is known as', 10),
(4, 'What do Koalas usually eat?', 14),
(5, 'Who was the last Governor-General of independent India?', 17),
(6, 'How many members are there in the Rajya Sabha?', 21),
(7, 'What is the term for the lower house of Parliament?', 27),
(8, 'Where was India\'s first national Museum opened?', 32),
(9, 'In 2019, Which popular singer was awarded the Bharat Ratna award?', 35),
(10, 'The world’s nation 5G mobile network was launched by which country?', 39),
(11, 'Why is the color of papaya yellow?', 44),
(12, 'What is the name of the first Indian woman who wins the Man Booker Prize?', 46),
(13, 'Which of the three banks will be merged with the other two to create India’s third-largest bank?', 50),
(14, 'What is the name of the weak zone of the earth’s crust?', 53),
(15, 'Where was India’s first national Museum opened?', 60),
(16, 'In 2019, Which popular singer was awarded the Bharat Ratna award?', 63),
(17, 'When was Pravasi Bhartiya Divas held in Varanasi?', 67),
(18, 'Vijay Singh (golf player) is from which country?', 72),
(19, 'What is the full form of DRDL?', 74),
(20, 'The green planet in the solar system is?', 78),
(21, 'The father of Indian missile technology is _________________?', 84),
(22, 'What is the reason behind the Bats flying in the dark?', 85),
(23, 'Which of these is the small-scale industry in India?', 92),
(24, 'Which of these is the plant important in sericulture?', 96),
(25, 'At which place on earth are there days & nights of equal length always?', 97);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_Id` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `total_question` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `time_taken` varchar(50) NOT NULL,
  `entry_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_Id`, `email`, `mobile`, `password`, `total_question`, `score`, `time_taken`, `entry_on`) VALUES
(10, 'kshitiz kumar', '1726604246', '', '9006042011', '', '', '0', '479613 hours, 7 minutes, 26 seconds', '2024-09-17 21:20:36'),
(11, 'kshitiz', '1726607865', '', '9006042011', '', '25', '6', '0 hours, 1 minutes, 43 seconds', '2024-09-17 21:20:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
