-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 10:12 AM
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
-- Database: `artisanforyou`
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
(1, 1, 'bf48a137398e12f578d12314d69174571704fa8b'),
(2, 1, '127fddbdc7f2c4b69f97b26c053155a448a67702'),
(3, 1, 'a918e1342e939cb6c815595dbbd2ff7bdf9c9663');

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
(1, 'admin', '$2y$10$u46ZG95b1z/6OReRUWv6Ve.k6VVCm9Ub0nn0ux9fgXavSG2wm/.6.');

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
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artisans`
--

INSERT INTO `artisans` (`id`, `name`, `email`, `telephone`, `gender`, `category_id`, `profile`, `password`) VALUES
(6, 'Stiles Abel', 'stiles@gmail.com', '0783332000', 'Male', 2, 'locks-on-the-metal-fence.jpg', '$2y$10$nyz4BCEwcNOM2efgIum2duoZnyAi1fRxnCVjjTPsHY3/2Kfo3WJ4y'),
(7, 'Niyindagiye Abel', 'abelstilesnani280@gmail.com', '', 'female', 1, 'default.png', '$2y$10$nyz4BCEwcNOM2efgIum2duoZnyAi1fRxnCVjjTPsHY3/2Kfo3WJ4y');

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
(1, 6, 1),
(2, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `artisan_login`
--

CREATE TABLE `artisan_login` (
  `id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `tokens` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artisan_login`
--

INSERT INTO `artisan_login` (`id`, `artisan_id`, `tokens`) VALUES
(5, 6, '82e5326d649b5cb7ed309eb3d3485db2032fe55a'),
(6, 6, '25a9821b80c61019322fafef29dfd4495b78ae5c'),
(7, 6, '316b4bd2a61e829754377bc135a798547a4ab4bf'),
(8, 6, '298e5ccdbc85eb798fb6a7f34891b9f82f8bf097');

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
(1, 'Plumber'),
(2, 'Carpenter');

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

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `artisan_id`, `file`) VALUES
(1, 6, 'indoor-brick-wall-texture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

CREATE TABLE `id` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `artisan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Lagos', 'lagos'),
(2, 'Ebonyi', 'Ebonyi');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artisan_id` int(11) NOT NULL,
  `star` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `artisan_id`, `star`) VALUES
(5, 2, 7, '10');

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
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `gender`, `mobile`, `password`, `location_id`, `profile`) VALUES
(2, 'delice', 'delice@gmail.com', 'female', '0783332000', '$2y$10$0Gm2nY036NoReKWkYUb6hOorS6WGymwfBfSatgVjjunlWOBIgTeMO', 1, 'default.png');

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
(2, 2, '5414ee330d3608c2bcb836b9d3ad162b49ff75f3'),
(4, 2, 'b1cd485eb2d1c7de589a3e0b9f7c059e12ba743c'),
(5, 2, '9a79610c8d7d937ed372498e9d05dbf2d60b311e');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artisans`
--
ALTER TABLE `artisans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `artisan_location`
--
ALTER TABLE `artisan_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artisan_login`
--
ALTER TABLE `artisan_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favoriet`
--
ALTER TABLE `favoriet`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `id`
--
ALTER TABLE `id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `favoriet`
--
ALTER TABLE `favoriet`
  ADD CONSTRAINT `favoriet_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`),
  ADD CONSTRAINT `favoriet_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `id`
--
ALTER TABLE `id`
  ADD CONSTRAINT `id_ibfk_1` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`artisan_id`) REFERENCES `artisans` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`);

--
-- Constraints for table `users_login`
--
ALTER TABLE `users_login`
  ADD CONSTRAINT `users_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
