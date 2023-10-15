-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2023 at 02:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laboratory3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category`, `quantity`) VALUES
(11, 'Strawberry', 'This is a description.', 'product-img-1.jpg', 9.01, 'Berries', 100),
(17, 'Grapes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'product-img-2.jpg', 9.99, 'Exotic', 150),
(18, 'Apple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'product-img-5.jpg', 9.01, 'Pome', 200),
(19, 'Lemon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'product-img-3.jpg', 7.01, 'Citrus', 150),
(20, 'Kiwi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'product-img-4.jpg', 9.99, 'Berries', 100),
(21, 'Raspberry', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'product-img-6.jpg', 7.01, 'Berries', 150),
(22, 'Jessica', 'ay maganda', 'photo1695209882.jpeg', 1000.00, 'human', 1),
(23, 'Jessica', 'ay maganda', 'photo1695209882.jpeg', 1000.00, 'human', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'jecaish', 'jecaish@gmail.com', '$2y$10$PvvrH8Sc.Iy5Y1O76Ltq8Oq13ilRkze/yJGfWHsgdOe7QR4DIvjuy', 'user', '2023-10-01 08:46:20', '2023-10-01 08:46:20'),
(2, 'jec', 'jec@gmail.com', 'jecjec', 'admin', '2023-10-01 08:58:34', '2023-10-15 14:38:42'),
(3, 'milko', 'milko@gmail.com', '$2y$10$.Ch1cB1UApa39nw89HepTu1xghRsUA7VZNxAxYSExfns0YdTnX2aC', 'user', '2023-10-03 09:50:06', '2023-10-03 09:50:06'),
(4, 'admin', 'admin@gmail.com', '$2y$10$Dgc/GfbsqOiKL6fWGKjNGuQ9cteBfqcElEmDJ/bFWhOkG4Fi3R0aK', 'user', '2023-10-15 14:37:41', '2023-10-15 14:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product_name` (`name`),
  ADD KEY `idx_product_category` (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
