-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 05:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'ishwar', 'ishwar'),
(2, 'ishu', 'ishu');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `about` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `name`, `role`, `about`, `phone`, `email`, `address`, `profile_image`, `time`) VALUES
(1, 'Ishwar Nishad', 'Admin', 'Hello , I am Ishwar Nishad. Bs', '9111944963', 'ishuvinayak01@gmail.com', 'tulsi nagar khushalpur raipur chhattisgarh', 'images/admin profile.jpg', '2023-08-30 11:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_category` varchar(30) NOT NULL,
  `c_email` varchar(30) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `c_name`, `c_category`, `c_email`, `c_phone`, `c_address`, `date`) VALUES
(52, 'Ishwar nishad', 'owner', 'ishuvinayak01@gmail.com', '+915111944', 'Tulsi nagar khushalpur Raipur', '2023-08-25 12:15:59'),
(54, 'Ramesh Sahu', 'distributer', 'ramesh01@gmail.com', '987654321', 'Ramesh House', '2023-08-26 04:40:33'),
(55, 'Suresh Sahu', 'distributer', 'suresh01@gmail.com', '9987654321', 'Ramesh ke saath hi rhta hai', '2023-08-26 04:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer_category`
--

CREATE TABLE `customer_category` (
  `id` int(10) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_category`
--

INSERT INTO `customer_category` (`id`, `category_name`) VALUES
(1, 'supplier'),
(2, 'distributer'),
(3, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `details` varchar(50) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `details`, `amount`, `category`, `status`, `Date`) VALUES
(9, 'new laptops', '150000', 'Office Accessories', 'due', '2023-08-21 10:13:58'),
(14, 'office rent', '25000', 'Rent', 'paid', '2023-08-30 10:36:54'),
(15, 'Employee Salary', '50000', 'Salary', 'paid', '2023-09-03 07:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_message` varchar(30) NOT NULL,
  `to_message` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `time`, `from_message`, `to_message`, `message`) VALUES
(5, '2023-08-21 11:30:02', 'admin', 'user', 'aaj sbko late chutti milegi👀😆🎉'),
(9, '2023-08-23 02:45:58', 'admin', 'user', 'it was very long story...\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `code` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `category` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `code`, `image`, `quantity`, `category`, `date`) VALUES
(21, 'Hp 15s laptop', '40000', '104', 'images/hp 15s.jfif', '10', 'laptop', '2023-08-26 04:21:12'),
(22, 'Dell Laptop', '45000', '106', 'images/Dell laptop.jfif', '10', 'laptop', '2023-09-02 15:59:18'),
(24, 'Redmi Note 10', '18000', '107', 'images/redmi note 10.jfif', '8', 'mobile', '2023-09-03 08:11:37'),
(25, 'LG A3 55 inch', '35000', '112', 'images/lg tv.jfif', '8', 'tv', '2023-09-01 14:31:36'),
(26, 'Samsung Smart TV', '40000', '113', 'images/samsung tv.jfif', '10', 'tv', '2023-09-03 08:03:26'),
(27, 'LG AC', '35000', '203', '../Admin/images/lg ac.jfif', '6', 'ac', '2023-09-03 09:13:46'),
(28, 'panasonic AC', '45000', '204', 'images/panasonic ac.jfif', '10', 'ac', '2023-09-03 09:04:38'),
(30, 'Mi A2', '12000', '109', '../Admin/images/mi a2.jfif', '10', 'mobile', '2023-09-03 09:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `id` int(10) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`id`, `category`) VALUES
(1, 'laptop'),
(2, 'mobile'),
(3, 'TV'),
(4, 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `warehouse` varchar(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `product_category` varchar(30) NOT NULL,
  `total_price` int(10) NOT NULL,
  `biller_name` varchar(50) NOT NULL,
  `advance_amount` int(10) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_name`, `price`, `quantity`, `warehouse`, `customer_name`, `product_category`, `total_price`, `biller_name`, `advance_amount`, `note`, `date`) VALUES
(15, 'panasonic AC', 45000, 4, '1', 'Ramesh Sahu', 'AC', 180000, 'leena', 100000, 'abc', '2023-09-02 04:25:45'),
(16, 'Mi A2', 12000, 10, '1', 'Ramesh Sahu', 'mobile', 120000, 'parthav', 100000, 'for shop', '2023-09-02 04:29:09'),
(17, 'Mi A2', 12000, 10, '1', 'Ramesh Sahu', 'mobile', 120000, 'Ishwar', 200000, 'for shop', '2023-09-03 07:40:54'),
(18, 'Redmi Note 10', 12000, 2, '1', 'Ramesh Sahu', 'mobile', 24000, 'leena', 5000, 'for donate', '2023-09-03 08:11:37'),
(19, 'Mi A2', 12000, 1, '1', 'Ramesh Sahu', 'mobile', 12000, 'leena', 12000, 'for donate', '2023-09-03 08:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login`
--

CREATE TABLE `staff_login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff_login`
--

INSERT INTO `staff_login` (`id`, `username`, `password`) VALUES
(1, 'leena', 'leena');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `gender`, `image`, `phone`, `email`, `date`) VALUES
(19, 'leena', 'leena', 'female', 'images/female.png', '987654321', 'leena@gmail.com', '2023-09-04 03:23:13'),
(20, 'parthav', '1111', 'male', 'images/male.png', '2262587', 'parthav@gmail.com', '2023-09-04 03:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `about` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `name`, `role`, `about`, `address`, `phone`, `email`, `date`) VALUES
(1, 'Leena', 'staff', 'I am Leena ', 'Leena House', 987654321, 'leena@gmail.com', '2023-09-04 02:59:20'),
(2, 'parthav', 'staff', 'Hello , I am parthav kumar.', 'Parthav House', 987654000, 'parthav@gmail.com', '2023-09-04 03:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id` int(10) NOT NULL,
  `warehouse_no` int(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id`, `warehouse_no`, `phone`, `email`, `address`) VALUES
(3, 1, '9111944963', 'warehouse1@gmail.com', 'Raipur Chhattisgarh India\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_phone` (`c_phone`);

--
-- Indexes for table `customer_category`
--
ALTER TABLE `customer_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_login`
--
ALTER TABLE `staff_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `warehouse_no` (`warehouse_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `customer_category`
--
ALTER TABLE `customer_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `products_category`
--
ALTER TABLE `products_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `staff_login`
--
ALTER TABLE `staff_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
