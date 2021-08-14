-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 02:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artisansforyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `tokens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `admin_id`, `tokens`) VALUES
(6, 1, '951b8899bb40c29e71b42fe700ac3305b39060fe'),
(7, 1, '5ee5416e27f935ec73713c101d71f239e5b0b235');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `password`) VALUES
(1, 'artisansforyou', '$2y$10$omH.phhm.b7sMyKU4cmPZOFPdyKXeDFLIH.WozVomk3oIRptte9iy');

-- --------------------------------------------------------

--
-- Table structure for table `artisans`
--

CREATE TABLE `artisans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `telephone` text NOT NULL,
  `gender` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `password` text NOT NULL,
  `vkey` text NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `name`, `email`, `telephone`, `gender`, `category_id`, `profile`, `password`, `vkey`, `verified`) VALUES
(13, 'Niyindagiye Abel tony', 'abeltony03@gmail.com', '0783332000', 'Male', 13, 'default.png', '$2y$10$rcaKrhE3FzgFB17Oiv0.W.Fj7SNdAGPY68YTBMvbOtSf3uxIQsZva', 'ITJCqO', 0),
(14, 'Niyindagiye Abel', 'abelstilenani280@gmail.com', '0783332000', 'Male', 13, 'default.png', '$2y$10$PZVl3slEwzMxao7hd9TsI.zFxaeHw6CVmagy7fN8YVvf36YWFIlke', '6uCx8', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artisan_location`
--

CREATE TABLE `artisan_location` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artisan_location`
--

INSERT INTO `artisan_location` (`id`, `artisan_id`, `location_id`) VALUES
(1, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `artisan_login`
--

CREATE TABLE `artisan_login` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `tokens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `file` text NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(3, 'Plumber'),
(4, 'Carpenter'),
(5, 'Electrician'),
(6, 'Hair Dresser'),
(7, 'Mechanic'),
(8, 'Bricklayer'),
(9, 'Tailors/Clothe Designers'),
(10, 'Painters'),
(11, 'Interior Decorators'),
(12, 'Vulcanizer'),
(13, 'Barbers'),
(14, 'Shoe Repairer'),
(15, 'Gardener'),
(16, 'Cake Bakers');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(110) NOT NULL,
  `artisan_id` int(116) NOT NULL,
  `comment` text NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favoriet`
--

CREATE TABLE `favoriet` (
  `id` int(110) NOT NULL,
  `artisan_id` int(110) NOT NULL,
  `user_id` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `artisan_id` int(110) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE `id` (
  `id` int(11) NOT NULL,
  `file` text NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `artisan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `id`
--

INSERT INTO `id` (`id`, `file`, `nationality`, `artisan_id`) VALUES
(2, 'Osepcca - NGO.pdf', 'Nigerian', 14);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `state` text NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `state`, `city`) VALUES
(3, 'Lagos', 'Ikeja LGA'),
(4, 'Lagos', 'Agege LGA'),
(5, 'Lagos', 'Alimosho Ifelodun LGA'),
(7, 'Lagos', 'Amuwo-Odofin LGA'),
(8, 'Lagos', 'Apapa LGA'),
(9, 'Lagos', 'Badagry LGA'),
(10, 'Lagos', 'Epe LGA'),
(11, 'Lagos', 'Eti-Osa LGA'),
(12, 'Lagos', 'Ibeju- Lekki LGA'),
(13, 'Lagos', 'Apapa LGA'),
(14, 'Lagos', 'Badagry LGA'),
(15, 'Lagos', 'Epe LGA'),
(16, 'Lagos', 'Epe LGA'),
(17, 'Lagos', 'Eti-Osa '),
(18, 'Federal Capital Territory', 'Abaji LGA '),
(19, 'Federal Capital Territory', 'Abuja Municipa LGA'),
(20, 'Federal Capital Territory', 'Gwagwalada LGA '),
(21, 'Federal Capital Territory', 'Kuje LGA'),
(22, 'Federal Capital Territory', 'Bwari LGA '),
(23, 'Federal Capital Territory', 'Kwali LGA '),
(24, 'Rivers', 'Abua-Odual LGA');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `msg`, `artisan_id`, `users_id`, `posted_at`) VALUES
(6, 'You Have a New Message', 13, 3, '2021-07-09 05:04:10'),
(7, 'You Have a New Message', 13, 3, '2021-07-22 07:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `star` text NOT NULL,
  `people` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(110) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `gender` text NOT NULL,
  `mobile` text NOT NULL,
  `password` text NOT NULL,
  `location_id` int(11) NOT NULL,
  `profile` text NOT NULL,
  `vkey` text NOT NULL,
  `verified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `gender`, `mobile`, `password`, `location_id`, `profile`, `vkey`, `verified`) VALUES
(3, 'abelstilesnani280@gmail.com', 'ishimwedelice@mutware.ac', 'Female', '0783332000', '$2y$10$Gio4eyS.CAv3LkNGw0D4DOSi4NjgHT5mZv3hYrBuuuarF4G1Sc83i', 14, 'istockphoto-1160027332-612x612.jpg', '33311', 1),
(4, 'james', 'ijessie07@aol.com', 'female', '234567890', '', 0, '', 'uh2s6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` int(110) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tokens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `user_id`, `tokens`) VALUES
(24, 3, 'c873c10be49336c3b8bf4f4d45789b59562e93ce'),
(25, 3, 'd3f07c82fabca66efc0d6859481507f9b9c2635e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artisans`
--
ALTER TABLE `artisans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `artisan_location`
--
ALTER TABLE `artisan_location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `artisan_login`
--
ALTER TABLE `artisan_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `favoriet`
--
ALTER TABLE `favoriet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `id`
--
ALTER TABLE `id`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artisan_id` (`artisan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `artisan_location`
--
ALTER TABLE `artisan_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artisan_login`
--
ALTER TABLE `artisan_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favoriet`
--
ALTER TABLE `favoriet`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `id`
--
ALTER TABLE `id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD CONSTRAINT `admin_logins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin_user` (`id`);

--
-- Constraints for table `artisans`
--
ALTER TABLE `artisans`
  ADD CONSTRAINT `artisans_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `artisan_location`
--
ALTER TABLE `artisan_location`
  ADD CONSTRAINT `artisan_location_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`),
  ADD CONSTRAINT `artisan_location_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `artisan_login`
--
ALTER TABLE `artisan_login`
  ADD CONSTRAINT `artisan_login_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `favoriet`
--
ALTER TABLE `favoriet`
  ADD CONSTRAINT `favoriet_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`),
  ADD CONSTRAINT `favoriet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
