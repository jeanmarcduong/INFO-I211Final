-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 10:19 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i211 fcp`
--
DROP DATABASE IF EXISTS `i211 fcp`;
CREATE DATABASE IF NOT EXISTS `i211 fcp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `i211 fcp`;

-- --------------------------------------------------------

--
-- Table structure for table `critics`
--

CREATE TABLE `critics` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `critics`
--

INSERT INTO `critics` (`id`, `firstName`, `lastName`, `company`) VALUES
(1, 'Coonar', 'Shoemaker', 'Yelp'),
(2, 'Jas\'on', 'Vor Hees', 'FoodFast'),
(3, 'Jessie', 'Palace', 'Food Crossing'),
(4, 'Kay', 'Farm', 'Food Reviews'),
(5, 'Lily', 'Goughton', 'Food Art');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `hours_of_operation` varchar(255) NOT NULL,
  `famous_dish` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `phone_number`, `address`, `hours_of_operation`, `famous_dish`) VALUES
(1, 'Bluebeard', '317-686-1580', '653 Virginia Ave', 'Lunch- Mon-Fri: 11AM-2PM, Dinner- Mon-Sat: 5PM-11PM Sun: 5PM-10PM, Bar- Mon-Thu: 11AM-Midnight, Fri: 11AM-1AM, Sat: 5PM-1AM, Sun:5PM-Midnight', 'Grilled Chicken Thigh, Mac & Cheese'),
(2, 'Bru Burger Bar', '317-635-4278', '410 Massachusetts Avenue', 'Mon-Thu 11AM - 10PM, Fri-Sat 11AM - 11PM, Sunday 11AM - 9PM', 'Bru Burger'),
(3, 'BurgerHaus', '317-434-4287', '335 West 9th Street, Suite D', 'Mon – Thu 11 AM – 9PM,Fri-Sat 11 AM – 10 PM, Sun 11 AM – 9 PM', 'The HAUS Burger'),
(4, 'Burger Study', '317-777-7770', '28W. Georgia St', 'TEMPORARILY CLOSED', 'Homecoming Burger'),
(5, 'The Eagle\'s Nest Restaurant', '317-231-7566', 'Hyatt Regency', 'Mon-Thu 5PM - 10PM', 'Signature Herb-Crusted Prime Rib'),
(6, 'District Tap', '317-632-0202', '141 S. Meridian', 'Sun – Wed 11AM - 12AM, Thu – Sat 11AM - 2AM', 'The District Burger'),
(7, 'Harry and Izzy\'s', '317-635-9594', '153 South Illinois Street', 'TEMPORARILY CLOSED', 'New York Strip'),
(8, 'Hedge Row American Bistro', '317-643-2754', '350 Massachusetts Ave.', 'Mon – Fri 12PM – 7PM, Sat – Sun 10 AM – 1 PM', 'Mole Braised Short Rib'),
(9, 'Hyde Park Prime Steakhouse', '317-536-0270', '51 North Illinois Street', 'Mon – Thu 4:30PM – 10 PM, Fri 4:30PM – 10:30PM, Sat 5PM – 10:30PM, Sun – Closed', 'Filet Mignon'),
(10, 'Kumas Corner', '317-929-1287', '1127 Prospect St.', 'Sun – Fri 12PM – 8PM, Sat 12PM – 1AM', 'Our Famous Kuma Burger'),
(11, 'Loughmillers Pub and Eatery', '317-638-7380', '301 West Washington Street', 'Mon-Sat 11AM-12 AM, Sun-Closed', 'Loughmiller\'s CheeseBurger'),
(12, 'Mesh', '317-955-9600', '725 Massachusetts Avenue', 'Mon – Thu 11AM – 11PM, Fri – Sat 11AM – 12AM, Sun 10AM – 10PM', 'Loch Duart Salmon'),
(13, 'Mimi Blue Meatballs', '317-737-2625', '870 Massachusetts Ave', 'Mon – Fri 11AM – 10PM, Sat 10AM – 10PM, Sun 10AM – 9PM', '3 Classic Balls, Creamy polenta served under marinara'),
(14, 'The Oceanaire Seafood Room', '317-955-2277', '30 South Meridian Street, Suite 100', 'Mon – Fri 12PM – 8PM, Sat - Sun 3PM – 8PM', 'Iceland Haddock'),
(15, 'Pier 48 Fish House and Oyster Bar', '317-560-4848', '130 S. Pennsylvania', 'Sun – Thu 11AM – 7PM, Fri – Sat 11AM – 8PM', 'Grilled Halibut'),
(16, 'Prime 47', '317-624-0720', '47 S. Pennsylvania', 'Mon – Sat 5PM – 9PM, Sun – Closed', 'Chilean Sea Bass'),
(17, 'Punch Burger', '317-426-5280', '137 East Ohio Street', 'Sun – Wed 11AM – 9PM, Thu – Sat 11AM – 10PM', 'Punch Cheeseburger'),
(18, 'Pure Eatery', '317-602-5724', '1043 Virginia Avenue', 'Sun – Sat 11AM – 3AM', 'Southwest Black Bean Wrap'),
(19, 'Ram Restaurant and Brewery', '317-955-9900', '140 South Illinois Street', 'Sun – Thu 11AM – 11PM, Fri – Sat 11AM – 12AM', 'Impossible Burger'),
(20, 'Repeal Restaurant', '317-672-7514', '630 Virginia Avenue', 'Tue – Sat 11AM- 10PM, Sun 11AM – 8PM, Mon – Closed', 'Repeal Smokehouse Burger'),
(21, 'Rooster\'s Kitchen', '317-426-2020', '888 Massachusetts Avenue', 'Tue – Sun 11AM – 7PM, Mon – Closed', 'Mamma\'s Brisket'),
(22, 'Sahm\'s Tavern and Big Lug Taproom', '317-822-9903', '433 North Capitol Ave', 'TEMPORARILY CLOSED', 'Nashville Chicken'),
(23, 'Salt on Mass', '317-638-6565', '505 Massachusetts Avenue', 'Mon – Thu 4:30PM – 10PM, Fri – Sat 4:30PM – 11PM, Sun – Closed', 'Hawaiian Poke'),
(24, 'Shapiro\'s', '317-631-4041', '808 S. Meridian St.', 'Mon – Sun 10AM – 7PM', 'Corned Beef Dinner'),
(25, 'Slippery Noodle Inn', '317-631-6974', '372 S. Meridian Street', 'Mon – Tue 11AM – 12AM, Wed – Thu 11AM – 1AM, Fri – Sat 11AM – 3AM, Sun – 4PM – 12AM', 'Ribeye Steak'),
(26, 'St. Elmo Steak House', '317-635-0636', '127 South Illinois Street', 'Mon – Fri 4PM- 11PM, Sat 3PM – 11PM, Sun 4PM – 10PM', 'Porterhouse Steak'),
(27, 'St. Joseph Brewery and Public House', '317-602-5670', '540 North College Avenue', 'Tue – Fri 3PM – 8PM, Sat – Sun 11AM – 8PM, Mon – Closed', 'Jambalaya'),
(28, 'Tavern at the Point', '317-756-6909', '401 Massachusetts Avenue', 'TEMPORARILY CLOSED', 'Big Fontana Burger'),
(29, 'Tavern on South', '317-602-3115', '423 West South Street', 'Mon – Thu 11AM – 9PM, Fri 11AM – 10PM, Sat 12PM – 10PM, Sun – Closed', 'Blackened Cod Tacos'),
(30, 'Taxman Cityway', '317-734-3107', '310 S. Delaware', 'Thu 4PM – 7PM, Fri – Wed – Closed', 'Cityway Smash Burger'),
(31, 'Three Carrots', '317-403-5867', '222 East Market Street', 'Mon - Fri 9AM – 6PM, Sat 10AM - 2PM', 'Seitan High Fives'),
(32, 'Union 50', '317-610-0234', '620 North East Street', 'TEMPORARILY CLOSED', 'Cioppino'),
(33, 'Vida', '317-420-2323', '601 East New York Street', 'TEMPORARILY CLOSED', 'Yellowfin Tuna'),
(34, 'Yats', '317-423-0518', '885 Massachusetts Ave', 'Mon ï¿½ Sat 11AM ï¿½ 9PM, Sun 11AM ï¿½ 7PM', 'Chili Cheese ï¿½touffï¿½e with Crafish'),
(43, 'Pizza Hut', '317-222-1111', 'Emerson Ave', 'Everyday', 'Pepperoni Pizza');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `critics`
--
ALTER TABLE `critics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `critics`
--
ALTER TABLE `critics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
