-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 05:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse499`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `doc_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `avadar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`doc_id`, `f_name`, `l_name`, `avadar`, `email`, `username`, `gender`, `phone`, `password`) VALUES
(7, 'absur', 'kazi', '', 'kaziar42@gmail.com', '1711298', 'm', '01834920142', '$2y$10$V3ECMlVOZhpCtD.qP2AJ3uWGLcSozxxefs4N42JWmxXbY7ZFjjW2i'),
(8, 'ami', 'tmi', '', 'art@gmail.com', 'admin8900', 'm', '01834920142', '$2y$10$WcGxKy700QsqxrVdbGF5RueXRxflTqMvJue1rku/WsNCDOiywdD2K'),
(9, 'Sayed', 'Fahim', '', 'sayedfahim@gmail.com', 'sayed', 'm', '01985445740', '$2y$10$Bywd7bgGyHmAHOrvxg4LNeNnZSZHYvg6lHpqdXPw7HAtI59kVyNVy');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `ambu_id` int(11) NOT NULL,
  `hos_id` int(11) NOT NULL,
  `ambu_name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `locations` varchar(200) NOT NULL,
  `sub_locations` varchar(200) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`ambu_id`, `hos_id`, `ambu_name`, `mobile`, `locations`, `sub_locations`, `price`) VALUES
(1, 1, 'Sql hospitals', '012122343', 'Dhaka', 'Dohar', 3000),
(2, 1, 'raniga Tre', '324324123', 'Dhaka', 'Nawabganj', 4000),
(3, 2, 'Lwerty hospitals', '123423423', 'Gazipur', 'Kaliakair', 3000),
(4, 2, 'Liar hos', '2342342342', 'Gazipur', 'Kaliakair', 4000),
(5, 2, 'Sql hospitals', '012122343', 'Dhaka', 'Dohar', 3000),
(6, 2, 'raniga Tre', '324324123', 'Dhaka', 'Nawabganj', 4000),
(7, 1, 'Lwerty hospitals', '123423423', 'Gazipur', 'Kaliakair', 3000),
(8, 1, 'Liar hos', '2342342342', 'Gazipur', 'Kaliakair', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `appoitment`
--

CREATE TABLE `appoitment` (
  `app_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `cmr_id` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoitment`
--

INSERT INTO `appoitment` (`app_id`, `doctor_id`, `cmr_id`, `serial_no`, `status`) VALUES
(8, 1, 1, 707028383, 2),
(9, 1, 1, 1528104725, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `blood_group` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `last_donate` varchar(200) NOT NULL,
  `present_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_id`, `name`, `blood_group`, `mobile`, `last_donate`, `present_address`) VALUES
(1, 'abdur rahman kazi', 'B+', '01834920142', '18 feb 2022', 'Khilkhet, Dhaka-1229'),
(2, 'sayed fahim', 'AB+', '01744555434', '21 March 2021', 'Khilkhet, Dhaka-1229'),
(3, 'md tamim', 'B-', '01521210824', '08 april 2021', 'nikunjo, Dhaka-1229'),
(4, 'afti era', 'O-', '01944555434', '12 june 2021', 'Assura, Dhaka-1229'),
(5, 'abdur rahman', 'A+', '01834920142', '12 feb 2021', 'khilher'),
(6, 'abdur rahman', 'AB+', '01834920142', '12 feb 2021', 'dresye'),
(7, 'abdur rahman', 'A+', '01834920142', '12 feb 2021', 'dresye');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cmr_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cmr_id`, `quantity`, `product_id`, `type`) VALUES
(5, 1, 2, 1, 0),
(6, 1, 6, 2, 0),
(7, 1, 6, 3, 0),
(8, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'medicine'),
(2, 'ambulance'),
(3, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `avadar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `f_name`, `l_name`, `avadar`, `email`, `username`, `gender`, `phone`, `password`) VALUES
(1, 'fname', 'lname', '', 'kazi@gmail.com', 'a.rahmansravon', 'm', '23423434534', '123456'),
(3, 'abdur rahman', 'kazi', '', 'kazi0099@gmail.com', 'a.rahmansravon', 'm', '4546546323', '123456'),
(4, 'abdur rahman', 'abdur rahman', '', 'weet@gmail.com', 'kaziar42@gmail.com', 'm', '4546546323', '12345678'),
(5, 'gfdgds', 'singer', '', 'admin4@gmail.com', 'admin4', 'm', '5233453454', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cylinder`
--

CREATE TABLE `cylinder` (
  `cylinder_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cylinder_type` int(11) NOT NULL,
  `cylinder_price` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cylinder`
--

INSERT INTO `cylinder` (`cylinder_id`, `name`, `cylinder_type`, `cylinder_price`, `img`) VALUES
(1, 'China Medical Oxygen Cylinder Price in Bangladesh', 2, 10500, 'oxy.jpg'),
(2, 'Linde Oxygen Cylinder Price in Bangladesh', 2, 20500, 'oxy1.jpg'),
(3, 'Portable Oxygen Can Price in BD', 2, 1500, 'oxy2.jpg'),
(4, ' Folee Oxygen Concentrator Price in Bangladesh', 1, 92000, 'fol.jpg'),
(5, '10 Liter Dynmed Oxygen Concentrator Price in Bangladesh', 2, 82000, 'dyn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cylinder_type`
--

CREATE TABLE `cylinder_type` (
  `type_id` int(11) NOT NULL,
  `cylinder_name` varchar(200) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cylinder_type`
--

INSERT INTO `cylinder_type` (`type_id`, `cylinder_name`, `seller_id`) VALUES
(1, 'Oxygen concentrator', 1),
(2, 'Oxygen Cylinder', 4),
(3, 'cyli', 4),
(4, 'swert', 5);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `dept_name`) VALUES
(1, 'Anesthetics'),
(2, 'Ear, nose and throat (ENT) '),
(3, 'Cardiology'),
(4, 'Gastroenterology'),
(5, 'Obstetrics and gynecology unit '),
(6, 'Oncology'),
(7, ' Ophthalmology'),
(8, 'Orthopedics');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int(11) NOT NULL,
  `doc_name` varchar(200) NOT NULL,
  `dept_id` varchar(200) NOT NULL,
  `doc_image` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `doc_qualification` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `doc_name`, `dept_id`, `doc_image`, `time`, `doc_qualification`) VALUES
(1, 'abdur Rahman Kazi', '1', 'c2ffc32722.png', '10.00pm-12.00am', 'Mbbs,Fcc,Dcccccccccc'),
(2, 'shrabon rudra', '2', 'doc2.jpg', '11.00pm-12.00am', 'Fcc,Dcc'),
(3, 'fahim sikder', '3', '35fa56c0af.png', '1.00pm-3.00am', 'Mbbs,Fcc,Dcc,rdd'),
(4, 'sifat khan', '4', 'doc4.jpg', '3.00pm-3.00am', 'Fcc,Dcc,kll'),
(5, 'auntor sheikh', '1', 'doc1.png', '10.00pm-12.00am', 'Mbbs,Fcc,Dcc');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hos_id` int(11) NOT NULL,
  `hos_name` varchar(200) NOT NULL,
  `loca_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hos_id`, `hos_name`, `loca_id`, `image`) VALUES
(1, 'sql hospitals', 1, 'amu1.jpg'),
(2, 'werti hospitals', 1, 'amu2.jpg'),
(3, 'bmw hospitals', 2, 'amu3.jpg'),
(4, 'cbr hospitalsssssssss', 1, 'd2fb59cc71.png'),
(6, 'eee ospitals', 1, 'a792da3d01.png');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`loc_id`, `loc_name`) VALUES
(1, 'dhaka'),
(5, 'gazipur'),
(6, 'chottogram'),
(7, 'chottogram');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medi_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `indredi` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `phar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medi_id`, `name`, `unit`, `image`, `indredi`, `company`, `price`, `phar_id`) VALUES
(1, '1stCef', '500mg', 'medi1.jfif', 'Cefadroxil Monohydrate', 'Medimet Phaarmaceuticals Ltd', 35, 1),
(2, 'efdfdfd', '500mg', 'medi2.jpg\r\n', 'roxil hydrate', 'met ceuticals Ltd', 50, 2),
(3, 'Rtyuef', '700mg', 'medi3.jpg\r\n', 'Coxil Rate', 'Dimet Eicals Ltd', 40, 1),
(4, 'tyraet', '900mg', 'medi4.jpg\r\n', 'Weroxil Werhydrate', 'Euticals Ltd', 50, 2),
(8, 'fdhdf', 'unuit', '954e3046d6.png', 'era', 'sql', 820, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cmr_id` int(11) NOT NULL,
  `price` varchar(200) NOT NULL,
  `pay_type` varchar(200) DEFAULT NULL,
  `product_type` int(11) NOT NULL DEFAULT 0,
  `transaction_id` varchar(200) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `order_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `quantity`, `cmr_id`, `price`, `pay_type`, `product_type`, `transaction_id`, `order_date`, `payment_status`, `order_status`) VALUES
(3, 1, 2, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(4, 2, 4, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(5, 1, 2, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(6, 2, 4, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(7, 1, 0, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(8, 1, 0, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(9, 1, 2, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(10, 2, 1, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(11, 1, 2, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(12, 2, 1, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(13, 1, 4, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(14, 2, 3, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(15, 1, 4, 1, '35', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(16, 2, 4, 1, '50', 'BKASH-BKash', 0, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0),
(22, 4, 1, 1, '92000', 'BKASH-BKash', 1, 'SSLCZ_TEST_62026b200ec83', '2022-02-08 19:07:49', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `phar_id` int(11) NOT NULL,
  `phar_name` varchar(200) NOT NULL,
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`phar_id`, `phar_name`, `seller_id`) VALUES
(1, 'Laaz Pharma', 4),
(2, 'madrilihga', 2),
(10, 'Aid Pharma', 4),
(11, 'maa pharmacy', 4),
(12, 'Vai vai pharmacy', 4),
(13, 'Healthmart', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `avadar` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `f_name`, `l_name`, `avadar`, `email`, `username`, `gender`, `phone`, `password`) VALUES
(1, 'abdur', 'Rahman', '', 'kaziar42@gmail.com', 'kaziar42@gmail.com', 'm', '01834920142', '12345678'),
(3, 'jakir', 'malton', '', 'ami@gmail.com', 'kazi@gmail.com', 'm', '01521210824', '12345678'),
(4, 'walton', 'devid', '', 'arr@gmail.com', 'arr@gmail.com', 'm', '01356950134', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`ambu_id`);

--
-- Indexes for table `appoitment`
--
ALTER TABLE `appoitment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cylinder`
--
ALTER TABLE `cylinder`
  ADD PRIMARY KEY (`cylinder_id`);

--
-- Indexes for table `cylinder_type`
--
ALTER TABLE `cylinder_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hos_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medi_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`phar_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `ambu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appoitment`
--
ALTER TABLE `appoitment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cylinder`
--
ALTER TABLE `cylinder`
  MODIFY `cylinder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cylinder_type`
--
ALTER TABLE `cylinder_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `phar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
