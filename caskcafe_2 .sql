-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 10:01 PM
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
(9, 'Mario', 'happiness', 'inemesitusen6@gmail.com', 'Mohbad is dead and there is alot of protest concerning his death'),
(10, 'Tiamiyu', 'Aisha', 'tiamiyuaisha@gmail.com', 'I love your product so much'),
(11, 'Tiamiyu', 'Aisha', 'tiamiyuaisha@gmail.com', 'I love your product so much'),
(12, 'aishah', 'tiamiyu', 'aishahtiamiyu@gmail.com', 'fgghghhhjjh'),
(15, 'cyrol', 'tester', 'inemesitusen6@gmail.com', '122323232'),
(16, 'Mirror', 'owen', 'inemesitusen6@gmail.com', 'scanning'),
(17, 'Oliver', 'Hongxin2023', 'abdulazeezj@assiniboine.net', '1234');

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
  `hashed_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `f_name`, `l_name`, `cust_email`, `cust_phone`, `hashed_pass`) VALUES
(13, 'Sumonu', 'idriss owasina', 'sumonuidriss@hotmail.com', '00000022', '$2y$10$Ahjvv1GFuxY0..fDaJSP4.junBrBl5BbCTWK3h0N/Md.D/CNEHKV2'),
(24, 'Tusix', 'Tusix1', 'testytester@me.net', '4122142212', '$2y$10$GPap/pbANOoys9bjObvVjO7KQJYi0P7v7TS8J42kotRlDo01DIxau'),
(26, 'Mohbad', 'ileri', 'ilerioluwa@yahoo.com', '7654321123', '$2y$10$oI7Cm9PtL43o9nCwh78vIejOSbJ6pxW1DO.Ls4Z20GED8SISerdDG'),
(37, 'Jessy', 'Testy', 'testyjessy@gmail.com', '4315413325', '$2y$10$3f6hSdKpAP/9LJkJ9ENbm.5qNnuW1tTaqWl4yGoD5./8KyP3iUwd.'),
(38, 'Jamal', 'Testy', 'lawal.djamal68@yahoo.com', '4315413325', '$2y$10$Vud2dq7OEO5a3p7UEwzQyuan/XYO3KSX7zqK.tno.yBoAefEfH/vS'),
(39, 'Testy', 'tester', 'testy@yahoo.com', '4315413325', '$2y$10$VFWu2FNfruPsqRnxBIfjSeg2s73bZtVB94CHX8BLQlFkNixd22rAq'),
(40, 'Mary', 'rahman', 'marry@yahoo.com', '4122142212', '$2y$10$FUorRfxZzjRQQDTNJ3E6F.DgfAG9/LN5naQMi2JV7RhFklXKbbMje'),
(41, 'Lawal', 'Jamaldeen', 'lawal.djamal@yahoo.com', '5413215512', '$2y$10$B3DWSqX9QF7CNcwMRCEqmOcVf86hwTaPLBXvds.C2z5Zuv.6hBxou');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `item_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `ordernum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `prod_id`, `order_date`, `quantity`, `total`, `ordernum`) VALUES
(116, 2, '2023-10-09 18:19:11', 0, 0.00, 0),
(117, 2, '2023-10-09 10:19:11', 2, 17.98, 0),
(123, 2, '2023-10-09 18:38:06', 0, 0.00, 0),
(124, 2, '2023-10-09 10:38:06', 1, 8.99, 0),
(126, 3, '2023-10-09 10:51:20', 1, 14.99, 0),
(127, 3, '2023-10-09 10:51:52', 1, 14.99, 0),
(128, 3, '2023-10-09 10:54:59', 6, 89.94, 1),
(129, 5, '2023-10-09 10:57:04', 1, 7.99, 2),
(130, 8, '2023-10-09 10:57:04', 1, 8.99, 2),
(131, 3, '2023-10-09 10:57:04', 1, 14.99, 2),
(132, 3, '2023-10-09 10:57:24', 3, 44.97, 3),
(133, 8, '2023-10-09 13:58:41', 2, 17.98, 4),
(134, 9, '2023-10-09 13:58:41', 4, 24.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pro_info`
--

CREATE TABLE `pro_info` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
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
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `CustomerID` (`prod_id`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `pro_info`
--
ALTER TABLE `pro_info`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `pro_info` (`prod_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
