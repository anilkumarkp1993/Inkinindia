-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inkinindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT 'India',
  `province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_default` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `first_name`, `last_name`, `company`, `address`, `city`, `country`, `province`, `postal_code`, `phone`, `image`, `is_default`, `created_at`) VALUES
(7, 3, 'Anil', 'Kumar', 'anilambady\'s', 'Karutha vadasseril (H), puramattom p. o, mallappally, Pathanamthitta district\r\nPuramattom', 'Mallappally', 'India', 'Kerala', '689543', '09074009413', '', 1, '2025-03-19 17:04:21'),
(14, 1, NULL, NULL, NULL, NULL, NULL, 'India', NULL, NULL, NULL, 'uploads/profile_1_1742538432.jpg', 0, '2025-03-21 06:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `trending_gift_category`
--

CREATE TABLE `trending_gift_category` (
  `id` int(11) NOT NULL,
  `trend_gift_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cate_banner_image` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending_gift_category`
--

INSERT INTO `trending_gift_category` (`id`, `trend_gift_id`, `name`, `cate_banner_image`, `category_image`, `created_at`) VALUES
(1, 2, 'UV Photo frame', 'PERSONALIZED.jpg', 'PERSONALIZED_banner.jpg', '2025-03-21 10:21:18'),
(3, 3, 'wedding', 'uv list.jpg', 'uv list.jpg', '2025-03-21 15:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `trending_gift_master`
--

CREATE TABLE `trending_gift_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `list_image` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending_gift_master`
--

INSERT INTO `trending_gift_master` (`id`, `name`, `list_image`, `banner_image`, `created_at`) VALUES
(2, 'PERSONALIZED ', 'uploads/trending_gifts1742547778_list_PERSONALIZED.jpg', 'uploads/trending_gifts1742547500_banner_PERSONALIZED_banner.jpg', '2025-03-21 07:50:23'),
(3, 'CORPORATE', 'uploads/trending_gifts1742547525_list_PERSONALIZED.jpg', 'uploads/trending_gifts1742547525_banner_PERSONALIZED_banner.jpg', '2025-03-21 08:42:22'),
(4, 'MEMENTOS', 'uploads/trending_gifts1742547537_list_PERSONALIZED.jpg', 'uploads/trending_gifts1742547537_banner_PERSONALIZED_banner.jpg', '2025-03-21 08:42:48'),
(5, 'HOME DECOR', 'uploads/trending_gifts1742547550_list_PERSONALIZED.jpg', 'uploads/trending_gifts1742547550_banner_PERSONALIZED_banner.jpg', '2025-03-21 08:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0:super admin,1:admin,2:customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Anil', 'Kumar', 'anilkumarkp093@gmail.com', '$2y$10$0QoZU6qNfmJs5qYODzB0Q.uRV41zumnCGv1ggRm3jwFiVy8v6aMb.', 0, '2025-03-17 17:48:11'),
(3, 'cust', '2', 'cust@gmail.com', '$2y$10$.jXiN7n.6NHNqSQkg1gx.efDZksq9q2cgNMttAKoElM64uWZn8CEK', 2, '2025-03-17 18:27:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trending_gift_category`
--
ALTER TABLE `trending_gift_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trend_gift_id` (`trend_gift_id`);

--
-- Indexes for table `trending_gift_master`
--
ALTER TABLE `trending_gift_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trending_gift_category`
--
ALTER TABLE `trending_gift_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trending_gift_master`
--
ALTER TABLE `trending_gift_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trending_gift_category`
--
ALTER TABLE `trending_gift_category`
  ADD CONSTRAINT `trending_gift_category_ibfk_1` FOREIGN KEY (`trend_gift_id`) REFERENCES `trending_gift_master` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
