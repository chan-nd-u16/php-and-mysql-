-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2023 at 06:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `profile`, `phone`, `email`, `password`) VALUES
(18, 'jai', 'jai_admin', '9625-blackking.png', '7448901606', 'jaichandru1606@gmail.com', '1234'),
(19, 'sailesh', 'sailesh', '6963-whiteking.png', '7824847809', 'sailesh@gmail.com', '1234'),
(20, 'gokul', 'gokul', '3363-whiteking.png', '1234567890', 'gokul@gmail.com', '1234'),
(22, 'sooraj', 'sooraj', '2747-whiteking.png', '1234567890vcvb ', 'sooraj@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity_incart` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity_incart`, `date`) VALUES
(33, 10, 29, 3, '2023-09-30 15:43:58'),
(33, 10, 37, 3, '2023-09-30 15:44:11'),
(33, 10, 39, 2, '2023-09-30 15:44:19'),
(33, 10, 32, 3, '2023-09-30 15:44:34'),
(33, 10, 41, 3, '2023-09-30 15:44:50'),
(33, 10, 33, 2, '2023-09-30 15:44:54'),
(33, 10, 35, 2, '2023-09-30 15:44:58'),
(37, 14, 29, 5, '2023-09-30 16:28:30'),
(35, 12, 30, 1, '2023-10-05 10:39:53'),
(35, 12, 29, 1, '2023-10-05 12:23:00'),
(35, 12, 47, 2, '2023-11-03 19:20:20'),
(35, 12, 31, 1, '2023-11-04 10:48:23'),
(35, 12, 32, 2, '2023-11-04 10:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `newuserdata`
--

CREATE TABLE `newuserdata` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newuserdata`
--

INSERT INTO `newuserdata` (`id`, `name`, `username`, `profile`, `phone`, `email`, `password`, `orderid`) VALUES
(10, 'chandru', 'chandru_17', '9022-chandruphoto.jpeg', '7824847809', 'schandru16203@gmail.com', '1234', 0),
(12, 'magnus', 'magnus', '9071-magnus.png', '1234567890', 'magnus@gmail.com', '1234', 0),
(14, 'haris', 'haris', '6973-whiteking.png', '1234557890', 'haris@gmail.com', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `productname` varchar(500) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `country` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zip` int(11) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `product_id`, `productname`, `name`, `email`, `adress`, `country`, `state`, `zip`, `order_date`, `quantity`, `status`, `total_price`) VALUES
(4981912, 14, NULL, 'Boat Air podsOPPO F23CAMERA', 'haris', 'schandru16203@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-09-25', 11, '', 168993),
(5759719, 12, NULL, 'CAMERA,', 'haris', 'dannn@rocketmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-10-03', 1, '', 45000),
(13991340, 12, NULL, 'OPPO F23CAMERAHead Phones', 'magnus', 'magnus@gmail.com', 'plot no:70,sathish avenue,thiruvanchery,chennai-600126', 'INDIA', 'TAMIL NADU', 600126, '2023-09-26', 13, '', 251997),
(22454314, 12, NULL, '', 'chandru', 'schandru16203@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-11-03', 0, '', 0),
(29639692, 12, NULL, '', 'chandru', 'magnus@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-10-03', 0, '', 0),
(41742806, 12, NULL, '', 'chandru', 'schandru16203@gmail.com', 'plot no:70,sathish avenue,thiruvanchery,chennai-600126,', 'INDIA', 'TAMIL NADU', 600126, '2023-10-18', 0, '', 0),
(47315053, 12, NULL, '', 'chandru', 'magnus@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-10-03', 0, '', 0),
(48316750, 12, NULL, 'Boat Air podswatchesOPPO F23', 'om', 'ohm@gmail.com', 'qwertyuiolksdfghjxcvbnm,', 'INDIA', 'TAMIL NADU', 600126, '2023-09-29', 14, '', 127990),
(48541544, 12, NULL, 'CAMERA,', 'haris', 'dannn@rocketmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-10-03', 1, '', 45000),
(50414966, 14, NULL, 'OPPO F23 ,', 'sooraj', 'dannn@rocketmail.com', 'last order', 'INDIA', 'TAMIL NADU', 600126, '2023-09-30', 5, '', 110000),
(52809592, 12, NULL, '', '', '', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-10-03', 0, '', 0),
(60084543, 10, NULL, 'OPPO F23 Boat Air pods watches Sports Sheo CAMERA bags Wallet Tourist bags Head Phones slipper ', 'venkatesh', 'venkatesh@gmail', 'plot no:70,sathish avenue,thiruvanchery,chennai-600126,', 'INDIA', 'TAMIL NADU', 600126, '2023-09-30', 26, '', 244053),
(63498642, 12, NULL, 'OPPO F23CAMERAHead Phones', 'magnus', 'magnus@gmail.com', 'plot no:70,sathish avenue,thiruvanchery,chennai-600126', 'INDIA', 'TAMIL NADU', 600126, '2023-09-26', 13, '', 251997),
(75764896, 12, NULL, 'Boat Air podswatchesCAMERA', 'daniel', 'danny@gmail.com', 'plot no jnejvnkjvnfjkjnjnfkjnjknfjkwe,chbchbwwemewkew,chennai', 'INDIA', 'TAMIL NADU', 600126, '2023-09-26', 10, '', 119992),
(76518045, 12, NULL, '', 'chandru', 'jaichandru1606@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-11-04', 0, '', 0),
(77761848, 14, NULL, 'Boat Air podsOPPO F23CAMERA', 'haris', 'schandru16203@gmail.com', 'Arjunan street', 'INDIA', 'TAMIL NADU', 600126, '2023-09-25', 11, '', 168993),
(97488369, 10, NULL, 'CAMERAHead Phoneswatches', 'venkatesh', 'venkat@gmail.com', 'plot no 77,3rd cross,cholurpalya,banglore-23', 'INDIA', 'ANDHRA PRADESH', 860023, '2023-09-26', 13, '', 332994);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(150) NOT NULL,
  `productdesc` varchar(250) NOT NULL,
  `productimage` varchar(250) NOT NULL,
  `productprice` int(11) NOT NULL,
  `stockstatus` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `last_modified` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `productdesc`, `productimage`, `productprice`, `stockstatus`, `quantity`, `last_modified`) VALUES
(29, 'OPPO F23 update1', 'Oppo new model of speces 128GB ROM and 8GB RAM', '8356-OPPO F23 5G.jpg', 45000, 'OUT OF STOCK', 45000, 'gokul'),
(30, 'CAMERA', 'It is a premium product can alo be customized', '2125-camera.jpg', 45000, 'INSTOCK', 12, ''),
(31, 'wifirouter', 'It has good wavelength and high speed internet', '6941-wifirouter.jpg', 4999, 'INSTOCK', 20, ''),
(32, 'bags', 'thsesnccncertyuiosdfghj', '5354-bags.jpg', 1299, 'INSTOCK', 25, ''),
(33, 'Head Phones', 'Bluetooth In-Ear Wireless head phones', '2810-head phones.jpg', 2999, 'INSTOCK', 2, ''),
(35, 'slipper', 'qwertyuiopasdfg', '3013-slipper.jpg', 499, 'OUT OF STOCK', 121, 'gokul'),
(36, 'sheos', 'A foot covering that is often made of leather, has a firm sole', '8855-sheos.jpg', 1999, 'INSTOCK', 20, ''),
(37, 'watches', 'portable timepiece that has a movement driven either by spring', '6360-watch.jpg', 2999, 'INSTOCK', 21, ''),
(39, 'Sports Sheo', 'A shoe designed for sporting and physical activities', '9562-sportssheo.jpg', 799, 'INSTOCK', 10, ''),
(40, 'Wallet', 'A Wallet designed for keeping money and credit cards', '4971-wallet.jpg', 299, 'INSTOCK', 31, ''),
(41, 'Tourist bags', ' A Tourist bag designed for traveling purpose and be compact', '8231-toristbag.jpg', 1990, 'INSTOCK', 21, ''),
(47, 'Airpods', 'Meet AirPods (3rd generation). All-new design featuring spatial audio with dynamic head tracking.', '4236-Airpods.jpeg', 15000, 'INSTOCK', 90, 'gokul'),
(48, 'new product', 'some description', '3984-Airpods.jpeg', 67089, 'INSTOCK', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `newuserdata`
--
ALTER TABLE `newuserdata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `newuserdata`
--
ALTER TABLE `newuserdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `newuserdata` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `newuserdata` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
