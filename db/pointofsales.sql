-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 07:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pointofsales`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_act` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `login_time` datetime DEFAULT current_timestamp(),
  `logout_time` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_act`, `id`, `login_time`, `logout_time`) VALUES
(1, 2, '2022-07-19 13:12:58', '2019-07-22 07:13:00'),
(2, 2, '2022-07-19 13:13:14', '2019-07-22 07:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` enum('foods','drinks','detergents') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'foods'),
(2, 'drinks'),
(3, 'detergents');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `customer_status` enum('active','archieve') NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `address`, `contact_no`, `customer_status`, `date_created`) VALUES
(1, 'Christian Jay', 'Villante', 'Binan Laguna', '09384625212', 'active', '2022-07-16'),
(2, 'JohnLlyod', 'Malabanan', 'Magdalena, laguna', '094726253421', 'active', '2022-07-15'),
(3, 'John Richard', 'Santos', 'Sitio Uno Brgy. Mabait, Santa Cruz', '09475625231', 'archieve', '2022-07-14'),
(4, 'john Elmar', 'Mercurio', 'santa cruz, Laguna', '09485762512', 'active', '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` bigint(11) NOT NULL,
  `bar_code` bigint(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `orignal_price` double NOT NULL,
  `profit` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `stock_in` date NOT NULL,
  `date_expired` date NOT NULL,
  `status` enum('active','archive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `bar_code`, `item_name`, `quantity`, `price`, `orignal_price`, `profit`, `category_id`, `supplier_id`, `stock_in`, `date_expired`, `status`) VALUES
(1, 331589415, 'Hansel Chocolate Snacks', 200, 7, 10, 3, 1, 2, '2022-03-11', '2023-02-20', 'active'),
(2, 165794712, 'Loaded Snacks', 100, 5, 8, 3, 1, 2, '2022-05-11', '2022-08-11', 'active'),
(3, 165794834, 'Joy Detergent', 200, 30, 35, 5, 3, 8, '2022-01-11', '2023-08-30', 'active'),
(4, 331591243, 'Spirte', 100, 10, 15, 5, 2, 5, '2022-08-11', '2022-07-16', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `province`, `city`) VALUES
(1, 'Makati', 'santa cruz'),
(2, 'Makati', 'Calauan'),
(3, 'Cebu', 'Clex'),
(4, 'Makati', 'santa cruz'),
(5, 'Laguna', 'Pagsanjan Purok 3'),
(7, 'Laguna', 'Santa Rosa'),
(8, 'Laguna', 'Binan');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `item_id` bigint(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `invoice_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sales_price` double NOT NULL,
  `sales_profit` double NOT NULL,
  `sales_quantity` double NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `item_id`, `product_code`, `invoice_code`, `product_name`, `sales_price`, `sales_profit`, `sales_quantity`, `Total`) VALUES
(1, 3, '165794834', 'RS-8220626', 'Joy Detergent', 30, 5, 3, 90),
(2, 3, '165794834', 'RS-0233224', 'Joy Detergent', 30, 5, 1, 90),
(3, 3, '165794834', 'RS-2220', 'Joy Detergent', 30, 5, 5, 90),
(4, 2, '165794712', 'RS-3232933', 'Loaded Snacks', 5, 3, 1, 5),
(5, 3, '165794834', 'RS-42260372', 'Joy Detergent', 30, 5, 4, 90),
(6, 3, '165794834', 'RS-052022', 'Joy Detergent', 30, 5, 3, 90);

-- --------------------------------------------------------

--
-- Table structure for table `sales_detail`
--

CREATE TABLE `sales_detail` (
  `transac_id` int(11) NOT NULL,
  `transac_code` varchar(255) NOT NULL,
  `transac_subtotal` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transac_tax` double NOT NULL,
  `transac_total` double NOT NULL,
  `transac_profit` double NOT NULL,
  `cash` double NOT NULL,
  `sales_change` double NOT NULL,
  `date_purchase` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_detail`
--

INSERT INTO `sales_detail` (`transac_id`, `transac_code`, `transac_subtotal`, `customer_id`, `transac_tax`, `transac_total`, `transac_profit`, `cash`, `sales_change`, `date_purchase`) VALUES
(1, 'RS-2220', 150, 1, 18, 168, 5, 300, 132, '2022-07-16'),
(2, 'RS-42260372', 120, 4, 14.4, 134.4, 5, 200, 65.6, '2022-07-16'),
(3, 'RS-052022', 90, 1, 10.8, 100.8, 5, 200, 99.2, '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `location_id` int(255) NOT NULL,
  `phone_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `location_id`, `phone_no`) VALUES
(1, 'Accenture Tech Corp.', 1, 2147483647),
(2, 'bisquit Corporation LT.', 2, 2147483647),
(3, 'ALASKA', 3, 938465231),
(4, 'rebisco', 4, 2147483647),
(5, 'Red Horse Corporation', 5, 938465231),
(7, 'Chocolate Factory Corporation', 7, 949352634),
(8, 'Detergents Corporation', 8, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `position` enum('admin','cashier') NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email_address`, `password`, `contact_no`, `position`, `status`) VALUES
(1, 'ralphvincent', 'ralphvincent.p11@gmail.com', '0192023a7bbd73250516f069df18b500', '0947574632', 'admin', 'active'),
(2, 'Chadwick', 'chadwick@yahoo.com', 'dbb8c54ee649f8af049357a5f99cede6', '0947574632', 'cashier', 'active'),
(3, 'NeilArthur', 'neil.pornela@yahoo.com', '0192023a7bbd73250516f069df18b500', '0947574632', 'cashier', 'active'),
(4, 'richard', 'richard.ramos@yahoo.com', '0192023a7bbd73250516f069df18b500', '0948567', 'cashier', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `inventory_ibfk_2` (`supplier_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `sales_ibfk_1` (`item_id`);

--
-- Indexes for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`transac_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_detail`
--
ALTER TABLE `sales_detail`
  MODIFY `transac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `inventory` (`item_id`);

--
-- Constraints for table `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `sales_detail_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
