-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food fest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminName`, `adminEmail`, `password`) VALUES
(1, 'Abinash', 'abi@foodfest.com', 'foodFEST@admin2'),
(2, 'Samir', 'samir@foodfest.com', 'foodFEST@admin2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(20) NOT NULL,
  `food_id` int(20) NOT NULL,
  `quantity` int(3) NOT NULL,
  `user_id` int(100) NOT NULL,
  `total_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `food_id`, `quantity`, `user_id`, `total_price`) VALUES
(17, 2, 1, 1, 160),
(18, 19, 1, 1, 130);

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`category_id`, `category_name`, `category_img_path`) VALUES
(1, 'Burger', 'burger.jpg'),
(2, 'Biryani', 'biryani.jpg'),
(3, 'Rolls', 'roll.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `food_Id` int(20) NOT NULL,
  `food_Name` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `food_Desc` text NOT NULL,
  `item_Available` varchar(20) NOT NULL DEFAULT 'Yes',
  `category_id` int(20) NOT NULL,
  `food_Item_img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`food_Id`, `food_Name`, `price`, `food_Desc`, `item_Available`, `category_id`, `food_Item_img_path`) VALUES
(1, 'Veg Burger', 110, 'Veg patty stuffed in between bun with fresh vegetable and served with best quality sauces.', 'No', 1, 'veg burger.jpg'),
(2, 'Chicken Burger', 160, 'Chicken patty stuffed in between bun, served with sauces.', 'Yes', 1, 'chicken burger.jpg'),
(3, 'Veg Premium Burger', 150, 'Veg patty, onion, fresh vegetable stuffed in between best quality bun served with tomato sauce, hot sauce and mayonnaise.', 'Yes', 1, 'veg premium burger.jpg'),
(4, 'Special Chicken Burger', 200, 'Chicken patty, cheese, onion, fresh vegetables stuffed in between best quality bun served with tomato sauce, hot sauce and mayonnaise.', 'Yes', 1, 'Special Chicken Burger.jpg'),
(5, 'Chicken Cheese Burger', 180, 'Chicken patty, cheese stuffed in between bun served with sauces.', 'Yes', 1, 'chicken cheese burger.jpg'),
(6, 'Veg Cheese Burger', 130, 'Veg patty, cheese stuffed in between bun and served with best quality sauces.', 'Yes', 1, 'veg cheese burger.jpg'),
(7, 'Paneer Cheese Burger', 170, 'Paneer patty, cheese, fresh vegetable stuffed in between bun.', 'Yes', 1, 'Paneer Cheese Burger.jpg'),
(8, 'Egg Burger', 140, 'Patty and omelet stuffed in between bun and served with best quality sauces.', 'Yes', 1, 'egg burger.jpg'),
(9, 'Paneer Burger', 150, 'paneer burger with one paneer patty and sauces .', 'Yes', 1, 'paneer Burger.jpg'),
(10, 'Veg Biryani', 170, 'Vegetables and rice cooked in layers and flavored with ghee and spices.', 'Yes', 2, 'veg biryani.jpg'),
(11, 'Paneer Biryani', 210, 'Paneer [6 pieces], served with gravy.', 'Yes', 2, 'paneer biryani.jpg'),
(12, 'Egg Biryani', 190, 'Egg [2], vegetables and rice cooked and flavored with ghee.', 'Yes', 2, 'Egg Biryani.jpg'),
(13, 'Fish Biryani', 220, 'Fish Biryani with basmati rice.', 'Yes', 2, 'fish biryani.jpg'),
(14, 'Chicken Biryani', 240, 'Chicken and rice cooked in layers and flavored with spices, chicken [3 pieces, large], 2 boiled egg, chicken gravy and green salad.', 'No', 2, 'chicken biryani.jpg'),
(15, 'Special Chicken Biryani', 260, 'Food Fest special chicken biryani. Served with gravy.', 'Yes', 2, 'special chicken biryani.jpg'),
(16, 'Mutton Biryani', 280, 'Mutton with rice cooked in layers, mutton [3 pieces], 2 boiled egg, mutton gravy.', 'Yes', 2, 'mutton biryani.jpg'),
(17, 'Veg Roll', 60, 'Veg roll made with fresh vegetable and onion. Served with sauces.', 'Yes', 3, 'veg roll.jpg'),
(18, 'Paneer Roll', 90, 'Paneer roll with fresh salad, cheese and onions', 'Yes', 3, 'paneer roll.jpg'),
(19, 'Paneer Tikka Roll', 130, 'Fresh paneer tikka roll with fresh tomatos, salad, cheese and onions. ', 'Yes', 3, 'Paneer Tikka Roll.jpg'),
(20, 'Egg Roll', 80, '2 egg omelet with mix vegetable served with sauces.', 'Yes', 3, 'Egg roll.jpg'),
(21, 'Chicken Roll', 125, 'Fried chicken, fresh vegetable wrap in roti.', 'Yes', 3, 'chicken roll.jpg'),
(22, 'Special Chicken Roll', 140, '2 egg omelet, fry chicken with mix vegetable green garden, kaju and kismis.', 'Yes', 3, 'special chicken roll.jpg'),
(23, 'Special Chicken Tikka Roll', 150, 'Fresh chicken tikka roll with fresh tomatos, salad, cheese and onions. Served with good quality sauces and green chatni.', 'Yes', 3, 'Special Chicken Tikka Roll.jpg'),
(24, 'Special Baba Roll', 130, 'Roll made with fresh vegetables, chicken, fries and mayonnaise. Served with green and red sauces.', 'Yes', 3, 'special baba roll.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_list`
--

CREATE TABLE `ordered_list` (
  `orderedItem_id` int(20) NOT NULL,
  `food_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_price` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordered_list`
--

INSERT INTO `ordered_list` (`orderedItem_id`, `food_id`, `quantity`, `total_price`, `order_id`, `user_id`) VALUES
(1, 2, 1, 160, 1, 1),
(2, 3, 1, 150, 1, 1),
(3, 9, 1, 150, 2, 1),
(4, 8, 1, 140, 2, 1),
(5, 6, 1, 130, 2, 1),
(6, 2, 1, 160, 2, 1),
(7, 15, 1, 260, 3, 1),
(8, 16, 1, 280, 3, 1),
(9, 21, 1, 125, 4, 1),
(10, 22, 1, 140, 4, 1),
(11, 15, 1, 260, 5, 1),
(12, 2, 1, 160, 6, 6),
(13, 2, 1, 160, 7, 1),
(14, 3, 1, 150, 7, 1),
(15, 2, 1, 160, 8, 1),
(16, 2, 4, 640, 9, 7),
(17, 22, 4, 560, 9, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(100) NOT NULL DEFAULT 'new',
  `user_id` int(20) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `grand_total`, `order_time`, `order_status`, `user_id`, `feedback`) VALUES
(1, 356, '2022-12-24 12:36:38', 'Delivered', 1, ''),
(2, 336, '2022-12-24 12:45:08', 'Delivered', 1, 'very nice foods. i love the rolls\r\n'),
(3, 565, '2022-12-24 12:48:22', 'Delivered', 1, ''),
(4, 311, '2022-12-24 12:48:34', 'Delivered', 1, 'very nice foods. i love the rolls'),
(5, 283, '2022-12-24 12:49:19', 'new', 1, ''),
(6, 183, '2022-12-28 11:42:38', 'Delivered', 6, ''),
(7, 356, '2022-12-28 11:43:04', 'Out for delivery', 1, ''),
(8, 183, '2022-12-29 13:29:52', 'Preparing', 1, ''),
(9, 1174, '2023-02-05 21:29:36', 'Delivered', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `ph_No` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `email`, `password`, `time`, `address`, `ph_No`) VALUES
(1, 'abinash', 'abik03691@gmail.com', '$2y$10$eE7nbc5OKQ5zvesXDiO0xeWOUMhMmzdyvShIz2Ka1h.2NO2MGvYnm', '2022-12-19 17:42:38', 'nalbari', '6006006006'),
(7, 'Abinash Kalita', 'abi6000kalita@gmail.com', '$2y$10$/7BikZxOeTAkSRWaC22dKuQ8E53xRXMv2aKcpePVG3RXHWjEVLzjG', '2023-02-05 15:37:11', 'Nalbari College, Nalbari', '8756754367');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`food_Id`);
ALTER TABLE `food_items` ADD FULLTEXT KEY `food_Name` (`food_Name`);
ALTER TABLE `food_items` ADD FULLTEXT KEY `food_Desc` (`food_Desc`);
ALTER TABLE `food_items` ADD FULLTEXT KEY `food_Name_2` (`food_Name`,`food_Desc`);

--
-- Indexes for table `ordered_list`
--
ALTER TABLE `ordered_list`
  ADD PRIMARY KEY (`orderedItem_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `food_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ordered_list`
--
ALTER TABLE `ordered_list`
  MODIFY `orderedItem_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
