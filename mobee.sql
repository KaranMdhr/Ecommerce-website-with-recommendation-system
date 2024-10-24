-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 08:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `email`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(6, 'admin@gmail.com', 'karan123');

-- --------------------------------------------------------

--
-- Table structure for table `catrgories`
--

CREATE TABLE `catrgories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `catrgories`
--

INSERT INTO `catrgories` (`category_id`, `category_name`, `category_image`) VALUES
(15, 'Apple Phones', '7229f32248ecc2b58a919f13027df2b9.jpg'),
(16, 'Samsung phones', '3cc303202d5f40dc8a2cadb4efae58f3.jpg'),
(17, 'Redmi Phones', 'd85a70e1c4172d6643f0fe4c09b1f249.jpg'),
(18, 'Nokia phones', '97461d74954118259505eac7d38d858d.jpg'),
(20, 'OnePlus phones', 'googlebanner.jpg'),
(21, 'Huawei phones', 'huaweibanner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cod_location`
--

CREATE TABLE `cod_location` (
  `location_id` int(11) NOT NULL,
  `pin` int(6) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `collection_id` int(11) NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `collection_banner` varchar(255) NOT NULL,
  `collection_thumble` varchar(255) NOT NULL,
  `collection_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `front_banner`
--

CREATE TABLE `front_banner` (
  `banner_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobee_cart`
--

CREATE TABLE `mobee_cart` (
  `Cart_ID` int(11) NOT NULL,
  `User_ID` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobee_cart`
--

INSERT INTO `mobee_cart` (`Cart_ID`, `User_ID`, `product_id`, `product_price`, `qty`, `status`) VALUES
(84, '49303572560d0730de4d1f4.63736893', 28, 63000, 1, 'pending'),
(85, '15390459260d074b789a166.63460185', 49, 44000, 1, 'pending'),
(86, '44158105360d07c0e1aa878.84306782', 18, 99500, 1, 'pending'),
(87, '195581218166b6f83fa39ba2.33242692', 25, 338000, 1, 'pending'),
(88, '186237170166babace837519.35315290', 37, 128000, 1, 'pending'),
(89, '143055081566bac265c72035.27317819', 18, 99500, 1, 'pending'),
(90, '98851242166bd65f14aaa34.91596433', 18, 99500, 1, 'pending'),
(91, '15195434466bd6f0195f109.27210134', 54, 50500, 1, 'pending'),
(92, '47850915166bea8454a86c6.28765064', 24, 298000, 1, 'pending'),
(93, '109268013166bea9eb21d418.26590082', 16, 73000, 1, 'pending'),
(94, '24110896766beb62c10ebf6.20019633', 48, 38000, 1, 'pending'),
(95, '120143777966beb6c6e0e200.07271395', 28, 63000, 1, 'pending'),
(96, '13465495266bedd82d37bf9.38764733', 57, 42500, 1, 'pending'),
(97, '16571806766cdea836595e4.62197699', 42, 38000, 1, 'pending'),
(98, '181490680466efef47661f54.58077077', 49, 44000, 1, 'pending'),
(99, '21745371166f0c8c1cf0964.42501649', 26, 103000, 1, 'pending'),
(100, '21745371166f0c8c1cf0964.42501649', 40, 28000, 1, 'pending'),
(101, '56957047966f0dc8735f027.94576024', 22, 160000, 1, 'pending'),
(102, '79912835866f11faa8d0fd0.27368007', 33, 90500, 1, 'pending'),
(103, '39057264466f123642ae983.54680365', 27, 113000, 1, 'pending'),
(104, '120668336966f15d25067177.53643034', 49, 44000, 1, 'pending'),
(105, '48886066166f15e1b7333d2.31727691', 49, 44000, 1, 'pending'),
(106, '211745627666f21c417045e8.95346460', 19, 101100, 1, 'pending'),
(107, '204453367766f21cca0d0c38.16397619', 49, 44000, 1, 'pending'),
(108, '38627382966f2224d5e0ca0.19187627', 26, 103000, 1, 'pending'),
(109, '20733068066f22a2f4181d2.60062368', 22, 160000, 1, 'pending'),
(110, '129852715266f2908842e073.46017417', 65, 38000, 1, 'pending'),
(111, '119653873466f299a9b5c8e0.37522417', 28, 63000, 1, 'pending'),
(112, '189910660766fe181ab3acb9.37463895', 47, 33000, 1, 'pending'),
(113, '214349021266fe1933abebc5.72776076', 65, 38000, 1, 'pending'),
(114, '88941746466ff7477ac6b05.95083408', 18, 99500, 1, 'pending'),
(115, '175071696766ff8a51897f98.90130566', 32, 84000, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `mobee_newsletter`
--

CREATE TABLE `mobee_newsletter` (
  `request_id` int(11) NOT NULL,
  `request_by` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobee_order`
--

CREATE TABLE `mobee_order` (
  `order_id` int(11) NOT NULL,
  `cart_id` varchar(255) NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `pin` varchar(6) NOT NULL,
  `province` varchar(255) NOT NULL,
  `totalamount` float NOT NULL,
  `deliverycharge` float NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `mode` varchar(255) NOT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `current_status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobee_order`
--

INSERT INTO `mobee_order` (`order_id`, `cart_id`, `order_by`, `email`, `phone`, `address`, `landmark`, `pin`, `province`, `totalamount`, `deliverycharge`, `date`, `time`, `mode`, `payment`, `current_status`) VALUES
(66, '98851242166bd65f14aaa34.91596433', 'karan', 'ritik.rauniyer22@gmail.com', '9813855465', 'indrachowk', 'makhantol', '12354', 'Kathmandu', 99500, 50, '2024-08-15', '08:14:00', 'Cash On Delivery', 1, 'Pending'),
(67, '15195434466bd6f0195f109.27210134', 'ram', 'nvwns1@gmail.com', '9812345789', 'sadf', 'sdf', '100100', 'Kathmandu', 50500, 50, '2024-08-15', '08:30:00', 'Cash On Delivery', 1, 'Pending'),
(68, '47850915166bea8454a86c6.28765064', 'dipesh', 'dipeshshrestha910@gmail.com', '9849965245', 'nayabazzar', 'classic buffet', '100100', 'Kathmandu', 298000, 50, '2024-08-16', '06:47:00', 'Cash On Delivery', 1, 'Pending'),
(69, '109268013166bea9eb21d418.26590082', 'ram', 'angilbohora@gmail.com', '9813855465', 'karan', 'sdf', '100100', 'Kathmandu', 73000, 50, '2024-08-16', '06:53:00', 'Cash On Delivery', 1, 'Pending'),
(70, '24110896766beb62c10ebf6.20019633', 'suman', 'nvwns1@gmail.com', '9813855465', 'dakkku', 'makhantol', '100100', 'Kathmandu', 38000, 50, '2024-08-16', '07:45:00', 'Cash On Delivery', 1, 'Pending'),
(71, '120143777966beb6c6e0e200.07271395', 'dipesh', 'angilbohora@gmail.com', '9813855465', 'panitanki', 'makhantol', '100100', 'Kathmandu', 63000, 50, '2024-08-16', '07:48:00', 'Cash On Delivery', 1, 'Pending'),
(72, '120143777966beb6c6e0e200.07271395', 'dipesh', 'angilbohora@gmail.com', '9813855465', 'panitanki', 'makhantol', '100100', 'Kathmandu', 63000, 50, '2024-08-16', '08:00:00', 'Cash On Delivery', 1, 'Pending'),
(73, '16571806766cdea836595e4.62197699', 'ina', 'inadangol2@gmail.com', '9808968271', 'baneshwor', 'petrolpump', '100100', 'Kathmandu', 38000, 50, '2024-08-27', '20:33:00', 'Cash On Delivery', 1, 'Pending'),
(74, '16571806766cdea836595e4.62197699', 'ina', 'inadangol2@gmail.com', '9808968271', 'baneshwor', 'petrolpump', '100100', 'Kathmandu', 38000, 50, '2024-08-27', '20:36:00', 'Cash On Delivery', 1, 'Pending'),
(75, '181490680466efef47661f54.58077077', 'karan', 'angilbohora@gmail.com', '9849965245', 'shorakhutta', 'makhantol', '100100', 'Kathmandu', 44000, 50, '2024-09-22', '15:50:00', 'khalti', 1, 'Pending'),
(80, '211745627666f21c417045e8.95346460', 'aavash ranjit', 'aavash321@gmail.com', '9812345789', 'manjushree', 'mandir', '100100', 'Kathmandu', 101100, 50, '2024-09-24', '07:27:00', 'Cash On Delivery', 1, 'Pending'),
(81, '204453367766f21cca0d0c38.16397619', 'aavash ranjit', 'aavash321@gmail.com', '9808968271', 'manjushree', 'mandir', '100100', 'Kathmandu', 44000, 50, '2024-09-24', '07:29:00', 'Cash On Delivery', 1, 'Pending'),
(86, '119653873466f299a9b5c8e0.37522417', 'Karan Manandhar', 'admin', '9849965145', 'shorakhutta', 'mandir', '100100', 'Kathmandu', 63000, 50, '2024-09-24', '16:21:00', 'Cash On Delivery', 1, 'Pending'),
(88, '214349021266fe1933abebc5.72776076', 'Karan Manandhar', 'gurungmanoj767@gmail.com', '9849965145', 'shorakhutta', 'petrolpump', '12400', 'Kathmandu', 38000, 50, '2024-10-03', '09:40:00', 'Cash On Delivery', 1, 'Delivered'),
(89, '175071696766ff8a51897f98.90130566', 'Karan Manandhar', 'karan123@gmail.com', '9849965145', 'shorakhutta', 'petrolpump', '100100', 'Kathmandu', 84000, 50, '2024-10-04', '11:55:00', 'Cash On Delivery', 1, 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `mobee_product`
--

CREATE TABLE `mobee_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `selling` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `special` tinyint(1) DEFAULT NULL,
  `SKU` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobee_product`
--

INSERT INTO `mobee_product` (`product_id`, `product_name`, `description`, `image`, `price`, `selling`, `quantity`, `special`, `SKU`) VALUES
(16, 'I Phone 7', 'I Phone 7', 'i7.jpg', 78000, 73000, 0, 1, 'MSIP001'),
(17, 'I Phone 7Plus', 'I Phone 7Plus', 'i7+.jpg', 95000, 89000, 0, 1, 'MSIP002'),
(18, 'I Phone 8', 'I Phone 8', 'i8.png', 101000, 99500, 0, 1, 'MSIP003'),
(19, 'I Phone 8+', 'I Phone 8Plus', 'i8+.jpg', 112000, 101100, 0, 1, 'MSIP004'),
(20, 'I Phone 11', 'I Phone 11', 'i11.jpg', 148000, 134000, 0, 1, 'MSIP005'),
(21, 'I Phone 11 MAX', 'I Phone 11 MAX', 'i11max.jpg', 154000, 150100, 0, 1, 'MSIP006'),
(22, 'I Phone 11 Pro', 'I Phone 11 Pro', 'i11pro.jpeg', 168020, 160000, 0, 1, 'MSIP007'),
(23, 'I Phone 12', 'I Phone 12', 'i12.jpg', 220000, 210000, 0, 1, 'MSIP008'),
(24, 'I Phone 12 Pro', 'I Phone 12 Pro', 'i12pro.jpg', 310000, 298000, 0, 1, 'MSIP009'),
(25, 'I Phone 12 Pro Max', 'I Phone 12 Pro Max', 'i12promax.jpeg', 350000, 338000, 0, 1, 'MSIP010'),
(26, 'I phone x', 'I Phone x', 'ix.jpg', 115000, 103000, 0, 1, 'MSIP011'),
(27, 'I Phone XR', 'I Phone XR', 'ixr.jpg', 115000, 113000, 0, 1, 'MSIP012'),
(28, 'Samsung A51', 'Samsung A51', 'sa51.jpg', 68000, 63000, 0, 1, 'MSS001'),
(29, 'Samsung A52', 'Samsung A52', 'sa52.jpg', 74000, 69000, 0, 1, 'MSS002'),
(30, 'Samsung A71', 'Samsung A71', 'sa71.jpg', 79000, 75000, 0, 1, 'MSS003'),
(31, 'Samsung A80', 'Samsung A80', 'sa80.jpg', 84000, 80000, 0, 1, 'MSS004'),
(32, 'Samsung Note 9', 'Samsung Note 9', 'snote9.jpg', 88000, 84000, 0, 1, 'MSS005'),
(33, 'Samsung Note10', 'Samsung Note10', 'snote10.jpg', 94000, 90500, 0, 1, 'MSS006'),
(34, 'Samsung S 8', 'Samsung S 8', 'ss8.jpg', 68000, 63000, 0, 1, 'MSS007'),
(35, 'Samsung S 9', 'Samsung S 9', 'ss9.jpg', 88000, 84000, 0, 1, 'MSS008'),
(36, 'Samsung S 10', 'Samsung S 10', 'ss10.jpg', 88000, 84000, 0, 1, 'MSS009'),
(37, 'Samsung S 20', 'Samsung S 20', 'ss20.jpg', 132000, 128000, 0, 1, 'MSS010'),
(38, 'Samsung S 21', 'Samsung S 21', 'ss21.jpg', 198000, 176000, 0, 1, 'MSS011'),
(40, 'Redmi Note 7', 'Redmi Note 7', 'rnote7.jpg', 32000, 28000, 0, 1, 'MSR001'),
(41, 'Redmi Note 8', 'Redmi Note 8', 'rnote8.jpg', 36000, 34000, 0, 1, 'MSR002'),
(42, 'Redmi Note 9', 'Redmi Note 9', 'rnote9.jpg', 42000, 38000, 0, 1, 'MSR003'),
(43, 'Redmi Note 9 Pro', 'Redmi Note 9 Pro', 'rnote9pro.jpg', 49000, 44500, 0, 1, 'MSR004'),
(44, 'Redmi Note 9s', 'Redmi Note 9s', 'rnote9s.jpg', 54000, 50500, 0, 1, 'MSR005'),
(45, 'Nokia 3.2', 'Nokia 3.2', 'n3.2.jpg', 24000, 21500, 0, 1, 'MSN001'),
(46, 'Nokia 2.3', 'Nokia 2.3', 'n2.3.jpg', 22000, 19000, 0, 1, 'MSN002'),
(47, 'Nokia 4.2', 'Nokia 4.2', 'n4.2.jpg', 38000, 33000, 0, 1, 'MSN003'),
(48, 'Nokia 5', 'Nokia 5', 'n5.jpg', 42000, 38000, 0, 1, 'MSN004'),
(49, 'Nokia 6', 'Nokia 6', 'n6.jpg', 48000, 44000, 0, 1, 'MSN005'),
(54, 'Nokia 7', 'Nokia 7', 'n7.jpg', 55000, 50500, 0, 1, 'MSN006'),
(55, 'Nokia 8', 'Nokia 8', 'n8.jpg', 68000, 63000, 0, 1, 'MSN007'),
(56, 'OnePlus 3T', 'OnePlus 3T', '03t.jpg', 30500, 28500, 0, 1, 'MSO001'),
(57, 'OnePlus 5T', 'OnePlus 5T', 'o5t.jpg', 45000, 42500, 0, 1, 'MSO002'),
(58, 'OnePlus 6T', 'OnePlus 6T', 'o6t.jpg', 52000, 49000, 0, 1, 'MSO003'),
(59, 'OnePlus 7T', 'OnePlus 7T', 'o7t.jpg', 72000, 69000, 0, 1, 'MSO004'),
(60, 'OnePlus 9T', 'OnePlus 9T', 'o9t.jpg', 98000, 92000, 0, 1, 'MSO005'),
(61, 'Huawei Nova 8', 'Huawei Nova 8', 'hnova8.jpg', 24000, 22000, 0, 1, 'MSH001'),
(62, 'Huawei P 30', 'Huawei P 30', 'hp30.jpg', 29000, 25000, 0, 1, 'MSH002'),
(63, 'Huawei Y7', 'Huawei Y7', 'hy7.jpg', 30000, 25000, 0, 1, 'MSH003'),
(64, 'Huawei Y9', 'Huawei Y9', 'hy9.jpg', 32000, 29000, 0, 1, 'MSH004'),
(65, 'Huawei Y9 PRO', 'Huawei Y9 PRO', 'hy9pro.jpg', 42000, 38000, 0, 1, 'MSH005');

-- --------------------------------------------------------

--
-- Table structure for table `mobee_productimage`
--

CREATE TABLE `mobee_productimage` (
  `image_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobee_productimage`
--

INSERT INTO `mobee_productimage` (`image_id`, `product_id`, `image_path`) VALUES
(30, 16, 'i7.jpg'),
(31, 16, 'i7.jpg'),
(32, 17, 'i7+.jpg'),
(33, 17, 'i7+.jpg'),
(34, 18, 'i8.png'),
(35, 18, 'i8.png'),
(36, 19, 'i8+.jpg'),
(37, 19, 'i8+.jpg'),
(38, 20, 'i11.jpg'),
(39, 20, 'i11.jpg'),
(40, 21, 'i11max.jpg'),
(41, 21, 'i11max.jpg'),
(42, 22, 'i11pro.jpeg'),
(43, 22, 'i11pro.jpeg'),
(44, 23, 'i12.jpg'),
(45, 23, 'i12.jpg'),
(46, 24, 'i12pro.jpg'),
(47, 24, 'i12pro.jpg'),
(48, 25, 'i12promax.jpeg'),
(49, 25, 'i12promax.jpeg'),
(50, 26, 'ix.jpg'),
(51, 26, 'ix.jpg'),
(52, 27, 'ixr.jpg'),
(53, 27, 'ixr.jpg'),
(54, 28, 'sa51.jpg'),
(55, 28, 'sa51.jpg'),
(56, 29, 'sa52.jpg'),
(57, 29, 'sa52.jpg'),
(58, 30, 'sa71.jpg'),
(59, 30, 'sa71.jpg'),
(60, 31, 'sa80.jpg'),
(61, 31, 'sa80.jpg'),
(62, 32, 'snote9.jpg'),
(63, 32, 'snote9.jpg'),
(64, 33, 'snote10.jpg'),
(65, 33, 'snote10.jpg'),
(66, 34, 'ss8.jpg'),
(67, 34, 'ss8.jpg'),
(68, 35, 'ss9.jpg'),
(69, 35, 'ss9.jpg'),
(70, 36, 'ss10.jpg'),
(71, 36, 'ss10.jpg'),
(72, 37, 'ss20.jpg'),
(73, 37, 'ss20.jpg'),
(74, 38, 'ss21.jpg'),
(75, 38, 'ss21.jpg'),
(82, 40, 'rnote7.jpg'),
(83, 40, 'rnote7.jpg'),
(84, 47, 'n4.2.jpg'),
(85, 47, 'n4.2.jpg'),
(86, 41, 'rnote8.jpg'),
(87, 41, 'rnote8.jpg'),
(88, 42, 'rnote9.jpg'),
(89, 42, 'rnote9.jpg'),
(90, 43, 'rnote9pro.jpg'),
(91, 43, 'rnote9pro.jpg'),
(92, 44, 'rnote9s.jpg'),
(93, 44, 'rnote9s.jpg'),
(94, 45, 'n3.2.jpg'),
(95, 45, 'n3.2.jpg'),
(96, 46, 'n2.3.jpg'),
(97, 46, 'n2.3.jpg'),
(98, 48, 'n5.jpg'),
(99, 48, 'n5.jpg'),
(100, 49, 'n6.jpg'),
(101, 49, 'n6.jpg'),
(110, 54, 'n7.jpg'),
(111, 54, 'n7.jpg'),
(112, 55, 'n8.jpg'),
(113, 55, 'n8.jpg'),
(114, 56, '03t.jpg'),
(115, 56, '03t.jpg'),
(116, 57, 'o5t.jpg'),
(117, 57, 'o5t.jpg'),
(118, 58, 'o6t.jpg'),
(119, 58, 'o6t.jpg'),
(120, 59, 'o7t.jpg'),
(121, 59, 'o7t.jpg'),
(122, 60, 'o9t.jpg'),
(123, 60, 'o9t.jpg'),
(124, 61, 'hnova8.jpg'),
(125, 61, 'hnova8.jpg'),
(126, 62, 'hp30.jpg'),
(127, 62, 'hp30.jpg'),
(128, 63, 'hy7.jpg'),
(129, 63, 'hy7.jpg'),
(130, 64, 'hy9.jpg'),
(131, 64, 'hy9.jpg'),
(132, 65, 'hy9pro.jpg'),
(133, 65, 'hy9pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mobee_user`
--

CREATE TABLE `mobee_user` (
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mobee_user`
--

INSERT INTO `mobee_user` (`customer_id`, `customer_email`, `customer_name`, `customer_number`, `password`, `billing_address`, `shipping_address`) VALUES
(17, 'karan123@gmail.com', 'karan', '9849965145', '038e74c873365275da5999d0eeceed6c', NULL, NULL),
(18, 'nepaliranger@gmail.com', 'Atul Rajopadhyaya', '9860382013', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL),
(19, 'sidduupreti@gmail.com', 'Siddhartha', '9823524178', '8a93c1255729040071b24fa50f123d21', NULL, NULL),
(20, 'angilbohora@gmail.com', 'k', 'abcd', '0cc175b9c0f1b6a831c399e269772661', NULL, NULL),
(24, 'gurungmanoj767@gmail.com', 'Karan Manandhar', '9849965145', '038e74c873365275da5999d0eeceed6c', NULL, NULL),
(25, 'admin@gmail.com', 'Siddhartha', '9847564', 'c4ca4238a0b923820dcc509a6f75849b', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `record_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`record_id`, `product_id`, `category_id`) VALUES
(108, 54, 18),
(109, 55, 18),
(110, 56, 20),
(113, 57, 20),
(116, 61, 21),
(117, 62, 21),
(118, 63, 21),
(119, 64, 21),
(120, 65, 21),
(216, 40, 17),
(224, 48, 18),
(226, 58, 20),
(227, 59, 20),
(230, 17, 15),
(231, 18, 15),
(233, 19, 15),
(234, 20, 15),
(235, 21, 15),
(236, 22, 15),
(237, 23, 15),
(238, 24, 15),
(239, 25, 15),
(240, 26, 15),
(241, 27, 15),
(243, 28, 16),
(244, 29, 16),
(245, 30, 16),
(246, 31, 16),
(247, 32, 16),
(248, 33, 16),
(249, 34, 16),
(250, 35, 16),
(251, 36, 16),
(252, 37, 16),
(253, 38, 16),
(254, 41, 17),
(255, 42, 17),
(256, 43, 17),
(257, 44, 17),
(258, 45, 18),
(259, 46, 18),
(260, 47, 18),
(261, 49, 18),
(262, 60, 20),
(298, 16, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_collection`
--

CREATE TABLE `product_collection` (
  `record_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review_by(email)` varchar(255) NOT NULL,
  `review_by(name)` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `rate` float NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `product_id`, `review_by(email)`, `review_by(name)`, `title`, `details`, `rate`, `publish`) VALUES
(3, 49, 'karan123@gmail.com', 'karan', 'nice ', 'good', 3, 1),
(4, 22, 'karan123@gmail.com', 'karan', 'nice ', 'good', 3, 1),
(5, 65, 'gurungmanoj767@gmail.com', 'Karan Manandhar', 'nice product', 'good job', 5, 0),
(6, 32, 'karan123@gmail.com', 'karan', 'nice ', 'very good', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_history`
--

INSERT INTO `user_history` (`customer_id`, `product_id`, `timestamp`) VALUES
(17, 1, '2024-08-11 14:00:41'),
(17, 1, '2024-08-11 14:00:45'),
(17, 1, '2024-08-11 14:00:50'),
(17, 1, '2024-08-11 14:00:55'),
(17, 25, '2024-08-11 14:05:15'),
(17, 58, '2024-08-11 14:05:21'),
(17, 47, '2024-08-11 14:05:30'),
(17, 47, '2024-08-11 14:18:32'),
(17, 47, '2024-08-11 14:20:23'),
(17, 47, '2024-08-11 14:24:35'),
(17, 47, '2024-08-11 14:25:45'),
(17, 47, '2024-08-11 14:27:41'),
(17, 47, '2024-08-11 14:31:01'),
(17, 47, '2024-08-11 14:41:28'),
(17, 47, '2024-08-11 14:45:16'),
(17, 47, '2024-08-11 14:46:00'),
(17, 43, '2024-08-12 03:24:45'),
(17, 17, '2024-08-12 03:28:50'),
(17, 17, '2024-08-12 03:29:42'),
(17, 17, '2024-08-12 03:30:43'),
(17, 17, '2024-08-12 03:30:55'),
(17, 17, '2024-08-12 03:31:32'),
(17, 17, '2024-08-12 03:31:57'),
(17, 17, '2024-08-12 03:32:55'),
(17, 17, '2024-08-12 03:33:08'),
(17, 17, '2024-08-12 03:34:24'),
(17, 17, '2024-08-12 03:35:33'),
(17, 17, '2024-08-12 03:36:23'),
(17, 17, '2024-08-12 03:37:42'),
(17, 17, '2024-08-12 03:38:15'),
(17, 17, '2024-08-12 03:39:24'),
(17, 17, '2024-08-12 03:39:40'),
(17, 17, '2024-08-12 03:40:13'),
(17, 17, '2024-08-12 03:40:30'),
(17, 17, '2024-08-12 03:41:08'),
(17, 17, '2024-08-12 03:42:01'),
(17, 17, '2024-08-12 03:42:22'),
(17, 17, '2024-08-12 03:43:14'),
(17, 17, '2024-08-12 03:43:22'),
(17, 17, '2024-08-12 03:43:41'),
(17, 20, '2024-08-12 03:43:56'),
(17, 20, '2024-08-12 03:44:29'),
(17, 20, '2024-08-12 03:44:42'),
(17, 20, '2024-08-12 03:45:46'),
(17, 20, '2024-08-12 03:46:46'),
(17, 20, '2024-08-12 03:47:32'),
(17, 20, '2024-08-12 03:48:02'),
(17, 20, '2024-08-12 03:48:19'),
(17, 20, '2024-08-12 03:48:49'),
(17, 20, '2024-08-12 03:49:21'),
(17, 20, '2024-08-12 03:49:46'),
(17, 20, '2024-08-12 03:50:24'),
(17, 20, '2024-08-12 03:52:46'),
(17, 20, '2024-08-12 03:54:59'),
(17, 17, '2024-08-12 03:55:18'),
(17, 28, '2024-08-12 03:55:30'),
(17, 57, '2024-08-12 03:56:09'),
(17, 57, '2024-08-12 03:57:27'),
(20, 37, '2024-08-13 01:45:47'),
(17, 59, '2024-08-13 01:55:47'),
(17, 23, '2024-08-13 01:56:03'),
(17, 60, '2024-08-13 02:13:20'),
(17, 23, '2024-08-13 02:13:47'),
(17, 18, '2024-08-13 02:17:59'),
(17, 18, '2024-08-13 02:18:01'),
(17, 18, '2024-08-13 02:18:33'),
(17, 18, '2024-08-13 02:19:49'),
(17, 54, '2024-08-14 06:37:40'),
(17, 64, '2024-08-14 06:38:11'),
(17, 19, '2024-08-15 01:10:17'),
(17, 19, '2024-08-15 01:10:59'),
(17, 19, '2024-08-15 01:12:08'),
(17, 19, '2024-08-15 01:13:18'),
(17, 19, '2024-08-15 01:13:56'),
(17, 19, '2024-08-15 01:14:26'),
(17, 19, '2024-08-15 01:14:52'),
(17, 19, '2024-08-15 01:15:36'),
(17, 19, '2024-08-15 01:16:22'),
(17, 19, '2024-08-15 01:16:57'),
(17, 19, '2024-08-15 01:17:50'),
(17, 19, '2024-08-15 01:20:09'),
(17, 19, '2024-08-15 01:20:17'),
(17, 19, '2024-08-15 01:20:55'),
(17, 19, '2024-08-15 01:22:12'),
(17, 19, '2024-08-15 01:23:02'),
(17, 45, '2024-08-15 01:23:06'),
(17, 21, '2024-08-15 01:23:15'),
(17, 21, '2024-08-15 01:23:30'),
(17, 21, '2024-08-15 01:23:32'),
(17, 49, '2024-08-15 01:23:40'),
(17, 61, '2024-08-15 01:23:51'),
(17, 17, '2024-08-15 01:24:10'),
(17, 22, '2024-08-15 01:24:14'),
(17, 22, '2024-08-15 01:32:39'),
(17, 47, '2024-08-15 01:32:43'),
(17, 22, '2024-08-15 01:32:48'),
(17, 37, '2024-08-15 01:32:53'),
(17, 22, '2024-08-15 01:32:57'),
(17, 16, '2024-08-15 01:33:52'),
(17, 16, '2024-08-15 01:33:54'),
(17, 42, '2024-08-15 01:34:37'),
(17, 18, '2024-08-15 01:34:41'),
(17, 22, '2024-08-15 01:36:03'),
(17, 22, '2024-08-15 01:36:41'),
(17, 22, '2024-08-15 01:39:08'),
(17, 22, '2024-08-15 01:40:04'),
(17, 22, '2024-08-15 01:40:40'),
(17, 22, '2024-08-15 01:42:05'),
(17, 22, '2024-08-15 01:44:40'),
(17, 61, '2024-08-15 01:46:54'),
(17, 22, '2024-08-15 01:46:57'),
(17, 22, '2024-08-15 01:46:59'),
(17, 43, '2024-08-15 01:47:02'),
(17, 22, '2024-08-15 01:47:05'),
(17, 22, '2024-08-15 01:47:20'),
(17, 59, '2024-08-15 01:47:24'),
(17, 59, '2024-08-15 01:47:45'),
(17, 54, '2024-08-15 01:47:49'),
(17, 18, '2024-08-15 01:50:43'),
(17, 33, '2024-08-15 01:50:48'),
(17, 18, '2024-08-15 01:50:51'),
(17, 59, '2024-08-15 01:50:57'),
(17, 24, '2024-08-15 01:52:23'),
(17, 24, '2024-08-15 01:52:26'),
(17, 24, '2024-08-15 01:55:22'),
(17, 24, '2024-08-15 01:56:59'),
(17, 47, '2024-08-15 01:57:08'),
(17, 24, '2024-08-15 01:57:24'),
(17, 60, '2024-08-15 01:57:28'),
(17, 60, '2024-08-15 01:58:04'),
(17, 54, '2024-08-15 01:58:30'),
(17, 54, '2024-08-15 02:00:04'),
(17, 54, '2024-08-15 02:00:28'),
(17, 17, '2024-08-15 02:00:37'),
(17, 17, '2024-08-15 02:02:56'),
(17, 17, '2024-08-15 02:03:55'),
(17, 17, '2024-08-15 02:04:11'),
(17, 17, '2024-08-15 02:04:44'),
(17, 54, '2024-08-15 02:05:34'),
(17, 17, '2024-08-15 02:06:23'),
(17, 17, '2024-08-15 02:06:40'),
(17, 17, '2024-08-15 02:07:07'),
(17, 17, '2024-08-15 02:08:45'),
(17, 17, '2024-08-15 02:09:31'),
(17, 17, '2024-08-15 02:16:14'),
(17, 40, '2024-08-15 02:16:19'),
(17, 17, '2024-08-15 02:16:36'),
(17, 18, '2024-08-15 02:16:40'),
(17, 54, '2024-08-15 02:59:10'),
(17, 19, '2024-08-16 01:10:19'),
(17, 32, '2024-08-16 01:10:42'),
(17, 32, '2024-08-16 01:11:39'),
(17, 24, '2024-08-16 01:11:51'),
(17, 16, '2024-08-16 01:22:47'),
(17, 40, '2024-08-16 01:24:33'),
(17, 33, '2024-08-16 01:25:03'),
(17, 17, '2024-08-16 01:28:42'),
(17, 17, '2024-08-16 01:29:30'),
(17, 17, '2024-08-16 01:30:07'),
(17, 17, '2024-08-16 01:30:31'),
(17, 17, '2024-08-16 01:31:12'),
(17, 17, '2024-08-16 01:32:42'),
(17, 17, '2024-08-16 01:34:38'),
(17, 17, '2024-08-16 01:34:57'),
(17, 17, '2024-08-16 01:36:03'),
(17, 17, '2024-08-16 01:36:25'),
(17, 17, '2024-08-16 01:38:36'),
(17, 17, '2024-08-16 01:38:45'),
(17, 17, '2024-08-16 01:38:53'),
(17, 17, '2024-08-16 01:39:22'),
(17, 17, '2024-08-16 01:39:39'),
(17, 18, '2024-08-16 01:39:43'),
(17, 17, '2024-08-16 01:40:21'),
(17, 17, '2024-08-16 01:40:34'),
(17, 17, '2024-08-16 01:40:49'),
(17, 17, '2024-08-16 01:46:30'),
(17, 17, '2024-08-16 01:47:08'),
(17, 17, '2024-08-16 01:49:20'),
(17, 17, '2024-08-16 02:03:45'),
(17, 17, '2024-08-16 02:04:02'),
(17, 17, '2024-08-16 02:08:03'),
(17, 17, '2024-08-16 02:08:22'),
(17, 17, '2024-08-16 02:09:33'),
(17, 38, '2024-08-16 02:09:42'),
(17, 29, '2024-08-16 02:09:59'),
(17, 40, '2024-08-16 02:10:09'),
(17, 55, '2024-08-16 02:10:18'),
(17, 19, '2024-08-16 02:11:55'),
(17, 57, '2024-08-16 02:12:51'),
(17, 48, '2024-08-16 02:13:49'),
(17, 28, '2024-08-16 02:17:40'),
(17, 17, '2024-08-16 04:01:18'),
(17, 17, '2024-08-16 04:06:56'),
(17, 17, '2024-08-16 04:07:39'),
(17, 56, '2024-08-16 04:44:07'),
(17, 56, '2024-08-16 04:45:21'),
(17, 56, '2024-08-16 04:46:07'),
(17, 56, '2024-08-16 04:46:34'),
(17, 56, '2024-08-16 04:49:20'),
(17, 56, '2024-08-16 04:50:15'),
(17, 56, '2024-08-16 04:52:35'),
(17, 56, '2024-08-16 04:54:37'),
(17, 56, '2024-08-16 04:55:00'),
(17, 56, '2024-08-16 04:55:33'),
(17, 56, '2024-08-16 04:56:11'),
(17, 56, '2024-08-16 05:01:42'),
(17, 56, '2024-08-16 05:01:54'),
(17, 56, '2024-08-16 05:02:14'),
(17, 56, '2024-08-16 05:02:37'),
(17, 57, '2024-08-16 05:02:46'),
(17, 58, '2024-08-16 05:02:52'),
(17, 57, '2024-08-16 05:02:55'),
(17, 38, '2024-08-16 05:03:57'),
(17, 29, '2024-08-16 05:04:01'),
(17, 35, '2024-08-16 05:04:07'),
(17, 47, '2024-08-16 05:04:12'),
(17, 16, '2024-08-19 06:09:23'),
(17, 16, '2024-08-19 06:09:56'),
(17, 16, '2024-08-19 06:10:21'),
(17, 16, '2024-08-19 06:10:45'),
(17, 16, '2024-08-19 06:11:10'),
(17, 16, '2024-08-19 06:11:35'),
(17, 16, '2024-08-19 06:12:08'),
(17, 16, '2024-08-19 06:12:55'),
(17, 16, '2024-08-19 06:13:09'),
(17, 16, '2024-08-19 06:13:10'),
(17, 16, '2024-08-19 06:14:26'),
(17, 16, '2024-08-19 06:18:31'),
(17, 16, '2024-08-19 06:20:40'),
(17, 16, '2024-08-19 06:21:09'),
(17, 16, '2024-08-19 06:23:02'),
(17, 48, '2024-08-27 04:24:27'),
(17, 48, '2024-08-27 04:27:00'),
(17, 48, '2024-08-27 04:27:21'),
(17, 48, '2024-08-27 04:27:29'),
(17, 48, '2024-08-27 04:27:40'),
(17, 48, '2024-08-27 04:28:08'),
(17, 48, '2024-08-27 04:28:55'),
(17, 60, '2024-08-27 04:30:15'),
(17, 60, '2024-08-27 04:30:51'),
(17, 60, '2024-08-27 04:31:34'),
(17, 60, '2024-08-27 04:39:33'),
(17, 60, '2024-08-27 04:42:09'),
(17, 60, '2024-08-27 04:43:31'),
(17, 34, '2024-08-27 04:43:40'),
(17, 34, '2024-08-27 04:46:31'),
(17, 34, '2024-08-27 04:47:35'),
(17, 30, '2024-08-27 04:47:39'),
(17, 30, '2024-08-27 04:48:37'),
(17, 30, '2024-08-27 04:51:39'),
(17, 30, '2024-08-27 04:51:56'),
(17, 30, '2024-08-27 04:55:00'),
(17, 30, '2024-08-27 04:56:08'),
(17, 30, '2024-08-27 04:57:05'),
(17, 30, '2024-08-27 04:57:17'),
(17, 30, '2024-08-27 04:58:49'),
(17, 30, '2024-08-27 04:59:13'),
(17, 30, '2024-08-27 04:59:21'),
(17, 30, '2024-08-27 05:00:07'),
(17, 30, '2024-08-27 05:02:17'),
(17, 38, '2024-08-27 05:02:32'),
(17, 28, '2024-08-27 05:02:43'),
(17, 33, '2024-08-27 05:02:53'),
(17, 33, '2024-08-27 05:06:17'),
(17, 38, '2024-08-27 05:06:22'),
(17, 38, '2024-08-27 05:06:53'),
(17, 33, '2024-08-27 05:07:04'),
(17, 37, '2024-08-27 05:07:09'),
(17, 29, '2024-08-27 05:07:25'),
(17, 59, '2024-08-27 05:07:29'),
(17, 60, '2024-08-27 05:07:36'),
(17, 33, '2024-08-27 05:07:42'),
(17, 18, '2024-08-27 05:07:49'),
(17, 20, '2024-08-27 05:07:56'),
(17, 27, '2024-08-27 05:08:03'),
(17, 61, '2024-08-27 05:08:22'),
(17, 61, '2024-08-27 05:10:05'),
(17, 61, '2024-08-27 05:10:24'),
(17, 61, '2024-08-27 05:12:02'),
(17, 61, '2024-08-27 05:14:26'),
(17, 22, '2024-08-27 05:14:36'),
(17, 27, '2024-08-27 05:14:41'),
(17, 27, '2024-08-27 05:15:52'),
(17, 22, '2024-08-27 05:15:59'),
(17, 38, '2024-08-27 05:16:03'),
(17, 37, '2024-08-27 05:16:11'),
(17, 38, '2024-08-27 05:16:15'),
(17, 22, '2024-08-27 05:16:17'),
(17, 27, '2024-08-27 05:16:20'),
(17, 27, '2024-08-27 05:17:45'),
(17, 27, '2024-08-27 05:18:05'),
(17, 27, '2024-08-27 05:18:30'),
(17, 37, '2024-08-27 05:18:40'),
(17, 38, '2024-08-27 05:18:44'),
(17, 38, '2024-08-27 05:19:50'),
(17, 38, '2024-08-27 05:20:08'),
(17, 38, '2024-08-27 05:21:14'),
(17, 38, '2024-08-27 05:23:33'),
(17, 38, '2024-08-27 05:23:54'),
(17, 38, '2024-08-27 05:25:01'),
(17, 38, '2024-08-27 05:31:12'),
(17, 48, '2024-08-27 05:31:18'),
(17, 22, '2024-08-27 05:31:24'),
(17, 42, '2024-08-27 05:31:33'),
(17, 59, '2024-08-27 05:32:47'),
(17, 26, '2024-08-27 05:34:46'),
(17, 26, '2024-08-27 05:38:15'),
(17, 27, '2024-08-27 05:38:41'),
(17, 42, '2024-08-27 15:01:33'),
(17, 55, '2024-08-27 15:07:35'),
(17, 32, '2024-08-28 03:21:12'),
(17, 28, '2024-08-28 03:23:20'),
(17, 32, '2024-08-28 03:24:19'),
(17, 62, '2024-09-18 08:43:13'),
(17, 23, '2024-09-18 08:43:35'),
(17, 25, '2024-09-18 08:44:08'),
(17, 65, '2024-09-18 08:44:36'),
(17, 49, '2024-09-22 10:19:41'),
(17, 26, '2024-09-23 01:47:01'),
(17, 17, '2024-09-23 01:52:01'),
(17, 19, '2024-09-23 01:52:04'),
(17, 17, '2024-09-23 01:52:15'),
(17, 24, '2024-09-23 01:52:24'),
(17, 42, '2024-09-23 01:52:31'),
(17, 43, '2024-09-23 01:52:36'),
(17, 57, '2024-09-23 01:52:40'),
(17, 40, '2024-09-23 01:52:46'),
(17, 17, '2024-09-23 01:52:52'),
(17, 65, '2024-09-23 01:53:01'),
(17, 34, '2024-09-23 01:53:08'),
(17, 40, '2024-09-23 01:56:01'),
(17, 27, '2024-09-23 02:21:11'),
(17, 27, '2024-09-23 02:39:23'),
(17, 27, '2024-09-23 02:39:46'),
(17, 27, '2024-09-23 02:43:43'),
(17, 27, '2024-09-23 02:44:20'),
(17, 27, '2024-09-23 02:47:22'),
(17, 27, '2024-09-23 02:48:07'),
(17, 27, '2024-09-23 02:52:04'),
(17, 27, '2024-09-23 02:54:00'),
(17, 27, '2024-09-23 02:55:18'),
(17, 27, '2024-09-23 02:55:43'),
(17, 27, '2024-09-23 02:56:01'),
(17, 27, '2024-09-23 02:56:32'),
(17, 27, '2024-09-23 03:00:16'),
(17, 27, '2024-09-23 03:01:07'),
(17, 43, '2024-09-23 03:01:26'),
(17, 30, '2024-09-23 03:01:51'),
(17, 30, '2024-09-23 03:02:41'),
(17, 30, '2024-09-23 03:02:57'),
(17, 30, '2024-09-23 03:06:59'),
(17, 43, '2024-09-23 03:09:02'),
(17, 33, '2024-09-23 03:11:22'),
(17, 22, '2024-09-23 03:11:53'),
(17, 22, '2024-09-23 05:46:23'),
(17, 22, '2024-09-23 05:46:40'),
(17, 54, '2024-09-23 05:50:23'),
(17, 54, '2024-09-23 05:54:17'),
(17, 26, '2024-09-23 05:54:32'),
(17, 33, '2024-09-23 07:58:31'),
(17, 27, '2024-09-23 08:13:48'),
(17, 45, '2024-09-23 08:53:18'),
(17, 45, '2024-09-23 08:55:36'),
(17, 65, '2024-09-23 09:06:50'),
(17, 65, '2024-09-23 09:11:02'),
(17, 65, '2024-09-23 09:11:33'),
(17, 65, '2024-09-23 09:11:51'),
(17, 65, '2024-09-23 09:12:03'),
(17, 28, '2024-09-23 09:14:07'),
(17, 28, '2024-09-23 09:14:09'),
(17, 59, '2024-09-23 09:14:31'),
(17, 49, '2024-09-23 09:16:15'),
(17, 49, '2024-09-23 12:20:43'),
(17, 49, '2024-09-23 12:24:56'),
(17, 18, '2024-09-23 12:37:56'),
(17, 62, '2024-09-23 12:38:48'),
(17, 25, '2024-09-24 01:55:27'),
(17, 19, '2024-09-24 01:55:50'),
(17, 49, '2024-09-24 01:58:30'),
(17, 26, '2024-09-24 02:22:02'),
(17, 22, '2024-09-24 02:55:36'),
(17, 22, '2024-09-24 02:55:39'),
(17, 22, '2024-09-24 02:55:46'),
(17, 22, '2024-09-24 03:14:09'),
(17, 38, '2024-09-24 03:24:31'),
(17, 38, '2024-09-24 03:24:57'),
(17, 29, '2024-09-24 03:25:11'),
(17, 30, '2024-09-24 03:25:23'),
(17, 29, '2024-09-24 03:31:16'),
(17, 61, '2024-09-24 03:31:54'),
(17, 61, '2024-09-24 04:00:35'),
(17, 61, '2024-09-24 04:01:49'),
(17, 22, '2024-09-24 04:02:04'),
(17, 22, '2024-09-24 04:04:29'),
(17, 22, '2024-09-24 04:05:42'),
(17, 22, '2024-09-24 04:06:10'),
(17, 22, '2024-09-24 04:08:04'),
(17, 22, '2024-09-24 04:08:24'),
(17, 63, '2024-09-24 10:10:54'),
(17, 62, '2024-09-24 10:11:11'),
(17, 63, '2024-09-24 10:11:17'),
(17, 65, '2024-09-24 10:11:22'),
(17, 65, '2024-09-24 10:12:21'),
(17, 28, '2024-09-24 10:51:19'),
(17, 47, '2024-09-24 12:23:03'),
(23, 47, '2024-10-03 04:05:19'),
(24, 65, '2024-10-03 04:09:56'),
(24, 65, '2024-10-03 04:14:19'),
(17, 49, '2024-10-04 04:48:28'),
(17, 32, '2024-10-04 04:49:10'),
(17, 18, '2024-10-04 04:52:05'),
(17, 49, '2024-10-04 06:24:52'),
(17, 32, '2024-10-04 06:25:08'),
(17, 32, '2024-10-04 06:27:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `catrgories`
--
ALTER TABLE `catrgories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cod_location`
--
ALTER TABLE `cod_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `front_banner`
--
ALTER TABLE `front_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `mobee_cart`
--
ALTER TABLE `mobee_cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `mobee_newsletter`
--
ALTER TABLE `mobee_newsletter`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `mobee_order`
--
ALTER TABLE `mobee_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mobee_product`
--
ALTER TABLE `mobee_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `mobee_productimage`
--
ALTER TABLE `mobee_productimage`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `mobee_user`
--
ALTER TABLE `mobee_user`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `product_collection`
--
ALTER TABLE `product_collection`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catrgories`
--
ALTER TABLE `catrgories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cod_location`
--
ALTER TABLE `cod_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `collection_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `front_banner`
--
ALTER TABLE `front_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mobee_cart`
--
ALTER TABLE `mobee_cart`
  MODIFY `Cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `mobee_newsletter`
--
ALTER TABLE `mobee_newsletter`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobee_order`
--
ALTER TABLE `mobee_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `mobee_product`
--
ALTER TABLE `mobee_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `mobee_productimage`
--
ALTER TABLE `mobee_productimage`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;

--
-- AUTO_INCREMENT for table `mobee_user`
--
ALTER TABLE `mobee_user`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `product_collection`
--
ALTER TABLE `product_collection`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
