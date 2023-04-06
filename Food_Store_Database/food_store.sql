-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 06, 2023 at 08:42 PM
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
-- Database: `food_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerNumber` int(11) NOT NULL,
  `customerName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `loyalty_card` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeNumber` int(11) NOT NULL,
  `employeeName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `storeId` int(4) NOT NULL,
  `managerId` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeNumber`, `employeeName`, `gender`, `birthday`, `email`, `phone`, `storeId`, `managerId`, `jobTitle`, `start_date`) VALUES
(1, 'Nguyen Minh Ngoc', 'Female', '2003-04-15', 'minhngoc@gmail.com', '+84 359 683 221', 1, 1, 'Manager', '2022-11-01'),
(2, 'Luong Mai Phuong', 'Female', '2003-07-07', 'luongmaiphuong772003@gmail.com', '+84 989 861 287', 1, 1, 'Cashier', '2022-11-01'),
(3, 'Tran Dieu Anh', 'Female', '2003-09-13', 'minhtam@gmail.com', '+84 989 083 107', 1, 1, 'Chef', '2022-11-01'),
(4, 'Dinh Mai Linh', 'Female', '2003-07-25', 'mailinh@gmail.com', '+84 855 222 771', 1, 1, 'Chef', '2022-11-01'),
(5, 'Phan Thi Nha Phuong', 'Female', '2003-03-28', 'thanhhien@gmail.com', '+84 966 712 698', 1, 1, 'Packer', '2022-11-01'),
(6, 'Vu Quoc Trung', 'Male', '2003-12-28', 'quoctrung@gmail.com', '+84 867 021 999', 1, 1, 'Packer', '2022-11-01'),
(7, 'Bui Truong Quoc Bao', 'Male', '2003-11-21', 'quocbao@gmail.com', '+84 867 731 103', 1, 1, 'Janitor', '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderNumber` int(11) NOT NULL,
  `productCode` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `priceEach` decimal(10,2) NOT NULL,
  `orderLineNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderNumber` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `customerNumber` int(11) NOT NULL,
  `orderPrice` decimal(10,2) NOT NULL,
  `storeId` int(4) NOT NULL DEFAULT 1,
  `payment_method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productline`
--

CREATE TABLE `productline` (
  `productLine` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `productline`
--

INSERT INTO `productline` (`productLine`, `description`, `image_path`) VALUES
('Canh', '', NULL),
('Com', '', NULL),
('Do uong', '', NULL),
('Ga', '', NULL),
('Kimbap', '', NULL),
('My', '', NULL),
('Tokbokki', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productCode` varchar(15) NOT NULL,
  `productName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `productLine` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` tinyint(1) NOT NULL,
  `productDescription` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productCode`, `productName`, `productLine`, `price`, `available`, `productDescription`, `image_path`) VALUES
('CA_001', 'Canh rong biển', 'Canh', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Canh rong bien.jpg'),
('CA_002', 'Canh kim chi', 'Canh', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Canh kim chi.jpg'),
('CA_003', 'Canh đậu tương', 'Canh', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Canh dau tuong.jpg'),
('CA_004', 'Canh sườn bò', 'Canh', '60000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Canh suon bo.jpg'),
('C_001', 'Cơm thịt nướng', 'Com', '50000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Com thit nuong.png'),
('C_002', 'Cơm Bibimbap', 'Com', '70000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Com bibimbap.jpg'),
('C_003', 'Cơm rang kim chi', 'Com', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Com rang kim chi.png'),
('C_004', 'Cơm cuộn trứng', 'Com', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Com cuon trung.jpg'),
('DU_001', 'Rượu Soju', 'Do uong', '70000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Ruou soju.jpg'),
('DU_002', 'Coca Cola', 'Do uong', '15000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Coca Cola.jpg'),
('DU_003', 'Nước éo táo', 'Do uong', '25000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Nuoc ep tao.jpg'),
('DU_004', 'Nước ép lê', 'Do uong', '25000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Nuoc ep le.jpg'),
('DU_005', 'Nước ép cam', 'Do uong', '25000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Nuoc ep cam.jpg'),
('G_001', 'Đùi gà rán', 'Ga', '30000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Dui ga ran.jpg'),
('G_002', 'Cánh gà mật ong', 'Ga', '60000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Canh ga mat ong.jpg'),
('G_003', 'Gà rán sốt cay', 'Ga', '60000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Ga ran sot cay.jpg'),
('G_004', 'Gà xào phô mai', 'Ga', '50000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Ga xao pho mai.jpg'),
('KB_001', 'Kimbap truyền thống', 'Kimbap', '35000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Kimbap truyen thong.jpg'),
('KB_002', 'Kimbap thịt nướng', 'Kimbap', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Kimbap thit nuong.jpg'),
('KB_003', 'Kimbap chiên', 'Kimbap', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Kimbap chien.jpg'),
('KB_004', 'Kimbap cuộn trứng', 'Kimbap', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Kimbap cuon trung.jpg'),
('M_001', 'Mỳ cay trộn', 'My', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/My cay tron.jpg'),
('M_002', 'Mỳ lạnh', 'My', '50000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/My lanh.jpg'),
('M_003', 'Mỳ tương đen', 'My', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/My tuong den.png'),
('M_004', 'Mỳ Ý', 'My', '50000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/My y.jpeg'),
('T_001', 'Tokbokki xào cay', 'Tokbokki', '35000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Tokbokki xao cay.png'),
('T_002', 'Tokbokki phô mai', 'Tokbokki', '40000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Tokbokki pho mai.jpg'),
('T_003', 'Tokbokki chiên', 'Tokbokki', '30000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Tokbokki chien.png'),
('T_004', 'Tokbokki xào bò', 'Tokbokki', '45000.00', 1, '', 'http://localhost/Food_Store/food_store_web/img/menu/Tokbokki xao bo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeId` int(4) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(50) NOT NULL,
  `managerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeId`, `address`, `phone`, `managerId`) VALUES
(1, '144 Xuan Thuy, Cau Giay, HN, Viet Nam', '+84 986 015 847', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerNumber`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeNumber`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `employees_store_fk` (`storeId`),
  ADD KEY `employees_fk` (`managerId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderNumber`,`productCode`),
  ADD KEY `orderdetails_products_fk` (`productCode`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNumber`),
  ADD KEY `orders_customer_fk` (`customerNumber`),
  ADD KEY `orders_store_fk` (`storeId`);

--
-- Indexes for table `productline`
--
ALTER TABLE `productline`
  ADD PRIMARY KEY (`productLine`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productCode`),
  ADD KEY `products_productline_fk` (`productLine`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeId`),
  ADD KEY `store_employees_fk` (`managerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_fk` FOREIGN KEY (`managerId`) REFERENCES `employees` (`employeeNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_store_fk` FOREIGN KEY (`storeId`) REFERENCES `store` (`storeId`) ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_products_fk` FOREIGN KEY (`productCode`) REFERENCES `products` (`productCode`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ordetails_orders_fk` FOREIGN KEY (`orderNumber`) REFERENCES `orders` (`orderNumber`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_fk` FOREIGN KEY (`customerNumber`) REFERENCES `customer` (`customerNumber`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_store_fk` FOREIGN KEY (`storeId`) REFERENCES `store` (`storeId`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_productline_fk` FOREIGN KEY (`productLine`) REFERENCES `productline` (`productLine`) ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_employees_fk` FOREIGN KEY (`managerId`) REFERENCES `employees` (`employeeNumber`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
