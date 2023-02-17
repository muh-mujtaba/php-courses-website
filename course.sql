-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 01:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(10) NOT NULL,
  `card_id` int(255) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `ct_id` int(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `s_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `card_id`, `card_name`, `cvv`, `ct_id`, `expiry_date`, `user_id`, `s_id`) VALUES
(7, 123, 'mujtaba', '078', 1, '2022-07-21', '7', 1),
(24, 3454, 'error', '123', 5, '2022-07-30', '14', 6),
(25, 235243, 'error', '134', 2, '2022-07-15', '14', 9),
(26, 12344, 'error2', '123', 1, '2022-07-27', '14', 5),
(27, 129, 'mj', '1233', 1, '2022-08-24', '27', 6),
(28, 0, 'mujtaba', 'wdx', 5, '2022-09-01', '27', 5),
(29, 23456787, 'mj', '1234', 1, '2022-08-25', '11', 5),
(30, 12344, 'mj', '12', 1, '2022-08-25', '28', 5),
(31, 0, 'demo', '122', 1, '2022-08-24', '28', 1),
(33, 0, 'ijin', 'n', 1, '2022-09-22', '32', 5),
(34, 0, 'ihbj ', 'johiuvh', 1, '2022-09-13', '33', 5),
(35, 0, 'demo1', 'okj', 1, '2022-09-24', '33', 1),
(36, 88889, 'temp', '899', 1, '2022-09-22', '111809885457943241632', 5),
(38, 0, 'mujtaba', 'jk', 1, '2022-09-28', '111809885457943241632', 9),
(39, 0, 'mj', '24', 1, '2022-12-22', '111809885457943241632', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contries`
--

CREATE TABLE `contries` (
  `ct_id` int(255) NOT NULL,
  `ct_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contries`
--

INSERT INTO `contries` (`ct_id`, `ct_name`) VALUES
(1, 'pakistan'),
(2, 'china'),
(5, 'united kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `google`
--

CREATE TABLE `google` (
  `id` int(11) NOT NULL,
  `google_id` varchar(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_name` text NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_name`, `user_email`, `user_pass`, `user_id`, `status`) VALUES
('hash', 'hash@email.com', '$2y$10$IoobPsoUO68jMREFAxoqd.DecxFEQF0dE8lvd6e1zozhVUHviVKqq', 31, 'admin'),
('temp', 'temp@gmail.com', '$2y$10$gT8b9/Bb2vxKkBbGLuCCA.WbigXs8pFAFWsw9FwnYouE8gA82yjBu', 33, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_disc` varchar(100) NOT NULL,
  `s_price` int(100) NOT NULL,
  `s_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `s_name`, `s_disc`, `s_price`, `s_img`) VALUES
(1, 'Fundamental of UX for Application design', 'The automated process all your website tasks. Discover tools and techniques to engage effectively wi', 135, 'xtopic3.png.pagespeed.ic.n8ulHI4rIb.webp'),
(2, 'Fundamental of Web Programming', 'The automated process all your website tasks. Discover tools and techniques to engage effectively wi', 120, 'xabout2.png.pagespeed.ic.N3ytPGt7yu.webp'),
(5, 'Artificial Intellegence', 'The automated process all your website tasks. Discover tools and techniques to engage effectively', 159, 'xtopic4.png.pagespeed.ic.vf7TnG-Tx3.webp'),
(6, 'Data Science', 'The automated process all your website tasks. Discover tools and techniques to engage effectively', 199, 'xfeatured3.png.pagespeed.ic.hYf7aL-I4_.webp'),
(9, 'digital marketing', 'new skill to develop', 149, 'xabout3.png.pagespeed.ic.nc8f2vikQH.webp');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `gender` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`gender`, `address`, `user_id`, `id`, `user_img`) VALUES
('female', 'grt', 10, 1, ''),
('male', 'jpj,gujrat', 7, 3, 'aron-visuals-4zxSWESyZio-unsplash.jpg'),
('male', 'punjab', 11, 4, ''),
('male', 'error', 14, 5, 'randy-tarampi-U2eUlPEKIgU-unsplash.jpg'),
('male', '', 26, 6, 'tom-barrett-_41WmEwi8Ok-unsplash.jpg'),
('male', 'joikl,m', 27, 7, '5452006.jpg'),
('', '', 28, 8, 'aron-visuals-4zxSWESyZio-unsplash.jpg'),
('male', '', 32, 9, 'aron-visuals-4zxSWESyZio-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vedio`
--

CREATE TABLE `vedio` (
  `v_id` int(255) NOT NULL,
  `v_name` varchar(255) NOT NULL,
  `s_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vedio`
--

INSERT INTO `vedio` (`v_id`, `v_name`, `s_id`) VALUES
(3, 'Achha Lagta HaI ( Perfectly Slowed ).mp4', 5),
(4, 'Tum Jo Aaye,_Prashant.00_Rahat-Fateh Ali Khan ...mp4', 6),
(5, 'Tum Jo Aaye,_Prashant.00_Rahat-Fateh Ali Khan ...mp4', 2),
(6, 'Chaar Kadam [slowed+reverb] -- REJOICE.mp4', 9),
(7, 'Ecommerce Memes Pro Max.mp4', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contries`
--
ALTER TABLE `contries`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `google`
--
ALTER TABLE `google`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vedio`
--
ALTER TABLE `vedio`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contries`
--
ALTER TABLE `contries`
  MODIFY `ct_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `google`
--
ALTER TABLE `google`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vedio`
--
ALTER TABLE `vedio`
  MODIFY `v_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
