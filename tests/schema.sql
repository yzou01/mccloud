-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2022 at 02:08 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `mccloudshoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `additionalcosts`
--

CREATE TABLE `additionalcosts` (
`id` int NOT NULL,
`name` varchar(30) NOT NULL,
`amount` float NOT NULL,
`invoice_id` int NOT NULL,
`comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factories`
--

CREATE TABLE `factories` (
`id` int NOT NULL,
`name` varchar(25) NOT NULL,
`currency` varchar(20) NOT NULL,
`archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
`id` int NOT NULL,
`number` varchar(10) NOT NULL,
`date` date NOT NULL,
`currency_of_origin` varchar(20) NOT NULL,
`currency_rate` decimal(7,4) NOT NULL,
`gst` varchar(250) DEFAULT NULL,
`factory_id` int NOT NULL,
`discount` decimal(6,3) DEFAULT NULL,
`archive` tinyint(1) NOT NULL DEFAULT '0',
`total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
`id` int NOT NULL,
`invoice_id` int DEFAULT NULL,
`sku_id` int NOT NULL,
`quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skus`
--

CREATE TABLE `skus` (
`id` int NOT NULL,
`name` varchar(30) NOT NULL,
`price` float NOT NULL,
`type_id` int NOT NULL,
`factory_id` int NOT NULL,
`archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
`id` int NOT NULL,
`name` varchar(25) NOT NULL,
`archive` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int NOT NULL,
`username` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`name` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additionalcosts`
--
ALTER TABLE `additionalcosts`
ADD PRIMARY KEY (`id`),
ADD KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `factories`
--
ALTER TABLE `factories`
ADD PRIMARY KEY (`id`),
ADD KEY `id` (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
ADD PRIMARY KEY (`id`),
ADD KEY `id` (`id`),
ADD KEY `factory_id` (`factory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
ADD PRIMARY KEY (`id`),
ADD KEY `invoice_id` (`invoice_id`,`sku_id`),
ADD KEY `sku_id` (`sku_id`);

--
-- Indexes for table `skus`
--
ALTER TABLE `skus`
ADD PRIMARY KEY (`id`),
ADD KEY `id` (`id`,`type_id`),
ADD KEY `type_id` (`type_id`),
ADD KEY `factory_id` (`factory_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
ADD PRIMARY KEY (`id`),
ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additionalcosts`
--
ALTER TABLE `additionalcosts`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factories`
--
ALTER TABLE `factories`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skus`
--
ALTER TABLE `skus`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additionalcosts`
--
ALTER TABLE `additionalcosts`
ADD CONSTRAINT `additionalcosts_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`factory_id`) REFERENCES `factories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`sku_id`) REFERENCES `skus` (`id`);

--
-- Constraints for table `skus`
--
ALTER TABLE `skus`
ADD CONSTRAINT `skus_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
ADD CONSTRAINT `skus_ibfk_2` FOREIGN KEY (`factory_id`) REFERENCES `factories` (`id`);
COMMIT;


INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'admin', '$2y$10$7nNzyVI1GoVztLsLcIDhnOL6HgQpeXGotpDH5GGI2ozbLtuHxEp7e', 'admin', 'admin@mccloudshoes.com');
