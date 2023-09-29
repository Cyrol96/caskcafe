-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 03:44 PM
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
-- Database: `caskcafe_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_commenet`
--

CREATE TABLE `contact_commenet` (
  `id` int(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_commenet`
--

INSERT INTO `contact_commenet` (`id`, `f_name`, `l_name`, `Email`, `Comment`) VALUES
(2, 'inemesit', 'happiness', 'inemesitusen6@gmail.com', 'I love your product and i will like to get more of it probably next time'),
(3, 'inemesit', 'happiness', 'inemesitusen6@gmail.com', 'I love your product and i will like to get more of it probably next time'),
(4, 'cyrol', 'tester', 'mariobabyt@gmail.com', 'inesssrxfgdhmfmhc,jhyjfyjdthd,'),
(5, 'Mario', 'laver', 'Lawal.djamal68@yahoo.com', 'booomboomm  fhkhjdfbdf'),
(6, 'Lawal', 'Hongxin', 'Lawal.djamal68@yahoo.com', 'oy eyshhsjd bddhhhk'),
(7, 'Lawal', 'Hongxin', 'Lawal.djamal68@yahoo.com', 'oy eyshhsjd bddhhhk'),
(8, 'Oliver', 'owen', 'Lawal.djamal68@yahoo.com', 'hello my man '),
(9, 'Mario', 'happiness', 'inemesitusen6@gmail.com', 'Mohbad is dead and there is alot of protest concerning his death');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_address` varchar(200) NOT NULL,
  `hashed_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `cust_email`, `cust_phone`, `cust_address`, `hashed_pass`) VALUES
(1, 'Malay', 'lawal', 'Lawal.djamal68@yahoo.com', '4315413326', '2005 stracy steet apt 13', '$2y$10$aIJhp2RBCGO9KvSIKKorRex0KmWP8WtRpsyR3MR44EadvjCS7S/aO'),
(2, 'Malay', 'Naira', 'abibatasabi5@gmail.com', '234809641', '202 richmond, Brandon, MB', '$2y$10$m5VlXaq3E726kZ7zZdpMueclZJnBTtdE0ZsWfhdpASrVqFTEAo6oK'),
(3, 'Malay', 'lawal', 'Lawal.djamal68@yahoo.com', '4315413326', '2005 stracy steet apt 13', '$2y$10$sBjhU5ctYGeizqGVaoyB6uoEqmp6gMA/3aba./QDMQTApeBeUig7O'),
(4, 'zeno', 'zee', 'Lawal.djamal68@yahoo.com', '4315413326', '2005 stracy steet apt 13', '$2y$10$PPCv72rj7dAy89IDJ6fY0.kLwoTZaoTVB3oD57ANzh5Mmo8lO6Lfu'),
(5, 'j', 'g', 'jg@jg.com', '204', '123 123 street', '$2y$10$lnzL03jCMESGKvUweWX22.naQJTqjSXPTX06fY/S5I4j2q4yRQKqu'),
(6, 'yuu', 'dhdhh', 'd@dhdg.com', '', '', '$2y$10$f7eNjxf03jXxLTux68khkOAnYEWrUgdEP697PkNpSHu4QJXp7y8/a'),
(7, 'Malay', 'lawal', 'Lawal.djamal68@yahoo.com', '4315413326', '2005 stracy steet apt 13', '$2y$10$X0HvunOD1C3WJLmutYpdH.wODyS1GAO3Sl/k1o3do5p30awQIMbg2'),
(8, 'Testy', 'Tester', 'testy@tester.ca', '2047258700', '1430 Victoria Avenue East', '$2y$10$cSXRUMgucG5w2yPQasXSCuzqtIr0e.skQMAuSe8BKhCNpI6zrKoju'),
(9, 'tundex', 'rahman', 'lawal.djamal68@yahoo.com', '4315413325', '', '$2y$10$8vbI/2uKe9MPg2X9UtGLdurzOkRbY/vzXLj6cdD8PzCJxv1adU18m'),
(10, 'Oliver', 'rahman', 'lawal.djamal68@yahoo.com', '4315413325', 'tundex', '$2y$10$6PnGgBdbMTKoowD/K8iX1u/G1C2sOOZgFBUqoA6W3EaSjF.wytgyG'),
(11, 'tundex', 'rahman', 'lawal.djamal68@yahoo.com', '4315413325', '', '$2y$10$G.8wLSEsi0zE.t5g15655uh1zQfv4ZCZY0QeHArPVhhLL5X.2Ld16'),
(12, 'Henry', 'tien', 'coco01@gmail.com', '00000000', '', '$2y$10$BqsbvJqSZJFBmUvRB43q.uI0zjJaQTmY1ymzUlOvAHqK3bPtYahsy'),
(13, 'Sumonu', 'idriss owasina', 'sumonuidriss@hotmail.com', '00000022', '', '$2y$10$Ahjvv1GFuxY0..fDaJSP4.junBrBl5BbCTWK3h0N/Md.D/CNEHKV2'),
(15, 'tundex', 'rahman', 'lawal.djamal68@yahoo.com', '4315413325', '', '$2y$10$45tRsf7Q9EuwkMuTOB5DXeC03Hs8GmBIbWzrSLXnUuqZ.0.B9NY1O');

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_info`
--

INSERT INTO `order_info` (`OrderID`, `CustomerID`, `OrderDate`, `Quantity`, `Total`) VALUES
(5, 227383, '2023-04-03 21:49:54', 5, 45.03),
(6, 227384, '2023-04-03 21:49:54', 6, 62.01),
(7, 227385, '2023-04-03 21:51:35', 10, 105.00),
(8, 227395, '2023-04-03 21:51:35', 3, 40.50),
(9, 227396, '2023-04-03 21:51:35', 2, 25.60),
(10, 227397, '2023-04-03 21:53:51', 2, 14.00),
(11, 227398, '2023-04-03 21:53:51', 3, 55.00),
(12, 227399, '2023-04-03 21:55:17', 12, 40.50),
(13, 227400, '2023-04-03 21:55:17', 70, 40.00),
(14, 227401, '2023-04-03 22:00:11', 4, 18.20);

-- --------------------------------------------------------

--
-- Table structure for table `pro_info`
--

CREATE TABLE `pro_info` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(225) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `prod_img` text NOT NULL,
  `prod_disc` varchar(500) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_info`
--

INSERT INTO `pro_info` (`prod_id`, `prod_name`, `price`, `Quantity`, `prod_img`, `prod_disc`, `category`) VALUES
(1, 'Fresh and organic bananas from local farms.', 2.99, 1, './image/parf/bab.jpg', 'Fresh and organic bananas from local farms.', 1),
(2, 'Grass-fed Ground Beef', 8.99, 1, './image/parf/berry cake.jpg', 'Lean and delicious grass-fed ground beef.', 2),
(3, 'Wild-caught Alaskan Salmon', 14.99, 3, './image/parf/strawberry Jell-o.jpeg\r\n', 'Sustainably harvested wild-caught Alaskan salmon.', 3),
(4, 'Organic Mixed Greens', 3.49, 2, './image/parf/chocolate cake.jpg', 'Nutrient-rich organic mixed greens.', 4),
(5, 'Fresh Avocado', 7.99, 1, './image/parf/image 2.jpeg', 'Perfectly ripe and creamy fresh avocados.', 5),
(6, 'Organic Whole Milk', 4.99, 1, './image/parf/image 3.jpeg', 'Creamy and delicious organic whole milk from local farms.', 7),
(7, 'Organic Fuji Apples', 5.49, 1, './image/parf/image 4.jpeg', 'Crisp and sweet organic Fuji apples.', 8),
(8, 'Organic Spinach', 8.99, 10, './image/parf/images pairfait.jpeg', 'Tender and flavorful organic spinach leaves.', 9),
(9, 'Cold Smoothies on Glass Cups\r\n', 6.00, 3, './image/parf/smoothie_2.jpg', 'Cold smoothie glass cups made with special fruit', 10),
(10, 'Strawberry and Banana Moothie', 12.60, 4, './image/parf/Smoothie_3.jpg', 'Chill strawberry Banana Smoothie', 11),
(11, 'pineapple ingredient Smoothie ', 8.90, 3, './image/parf/Smoothie_4.jpg', 'Pineapple Cold glass Smoothie', 12),
(12, 'Plate Cake', 13.00, 2, './image/parf/plate Cake.jpg', 'Plate sweetie Cake', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(50) DEFAULT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_commenet`
--
ALTER TABLE `contact_commenet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `pro_info`
--
ALTER TABLE `pro_info`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_commenet`
--
ALTER TABLE `contact_commenet`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pro_info`
--
ALTER TABLE `pro_info`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
