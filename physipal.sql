-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 07:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `physipal`
--

-- --------------------------------------------------------

--
-- Table structure for table `physipal_add_products`
--

CREATE TABLE `physipal_add_products` (
  `pid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `pname` varchar(50) DEFAULT NULL,
  `images` varchar(50) NOT NULL,
  `description` varchar(1250) DEFAULT NULL,
  `category` varchar(30) CHARACTER SET utf16 NOT NULL,
  `price` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_add_products`
--

INSERT INTO `physipal_add_products` (`pid`, `vid`, `pname`, `images`, `description`, `category`, `price`, `quantity`, `slug`) VALUES
(4, 6, 'Febrex Plus', '1670765132.jpg', 'Febrex Plus Tablet is a medicine used in the treatment of common cold symptoms. It provides relief from symptoms such as headache, sore throat, runny nose, muscular pain, and fever.\n\nFebrex Plus Tablet can be taken with or without food. The dose and duration will depend on the severity of your condition. You should keep taking the medicine even if you feel better until the doctor says it is alright to stop using it.', 'tablet', '53', 10, 'sd'),
(5, 6, 'Dolo', 'tp.jpg', 'Dolo 650 Tablet helps relieve pain and fever by blocking the release of certain chemical messengers responsible for fever and pain. It is used to treat headaches, migraine, nerve pain, toothache, sore throat, period (menstrual) pains, arthritis, muscle aches, and the common cold.', 'tablet', '30', 15, 'dolo'),
(7, 6, 'Crocin', 'cro0023.jpg', 'Crocin Advance Tablet helps relieve pain and fever by blocking the release of certain chemical messengers responsible for fever and pain. It is used to treat headaches, migraine, nerve pain, toothache, sore throat, period (menstrual) pains, arthritis, muscle aches, and the common cold.\n\nCrocin Advance Tablet may be prescribed alone or in combination with another medicine. You should take it regularly as advised by your doctor. It is usually best taken with food otherwise it may upset your stomach. Do not take more or use it for longer than recommended.', 'tablet', '22', 20, 'crocin'),
(8, 6, 'Combiflam', 'combiflam-plus-tablet-650mg-10-s-655.jpg', 'Combiflam Tablet contains two painkiller medicines. They work together to reduce pain, fever, and inflammation. It is used to treat many conditions such as headache, muscle pain, pain during periods, toothache, and joint pain.\n\nCombiflam Tablet is best taken with food to reduce side effects. The dose and how often you need it will be decided by your doctor. You should take it regularly as advised by your doctor. Medicines used to treat pain are usually best taken at the first sign of pain. It is meant for short-term use only. Consult your doctor if the symptoms persist or worsen or if the medicine is required for use beyond 3 days.', 'tablet', '46', 20, 'combiflame'),
(19, 7, 'Lomotil', '1673027875.webp', 'Lomotil Tablet is a combination medicine used in the treatment of diarrhea. It manages the symptoms of diarrhea such as stomach pain, cramps, and loose stools.  Lomotil Tablet is taken with or without food in a dose and duration as advised by the doctor. The dose you are given will depend on your condition and how you respond to the medicine. You should keep taking this medicine for as long as your doctor recommends. If you stop treatment too early your symptoms may come back and your condition may worsen. Let your healthcare team know about all other medications you are taking as some may affect, or be affected by this medicine.', 'tablet', '24', 20, 'Lomotil'),
(20, 7, 'Nicip Plus', '1673029244.jpg', 'Nicip Plus Tablet is a combination medicine that helps in relieving pain. It is used to relieve pain and inflammation in conditions like rheumatoid arthritis, ankylosing spondylitis, and osteoarthritis. It is also used to relieve fever, muscle pain, back pain, toothache, or pain in the ear and throat.  Nicip Plus Tablet should be taken with food. This will prevent you from getting an upset stomach. The dose will depend on what you are taking it for and how well it helps your symptoms. You should take it as advised by your doctor. Do not take more or use it for a longer duration than recommended by the doctor.', 'tablet', '52', 10, 'Nicip-Plus'),
(21, 7, 'Eno Powder Lemon Bottle (100mg)', '1673029674.jpg', 'Eno Powder provides quick relief from acidity. It works on all the symptoms of acidity, including a sour taste in the mouth, burning in the throat, burning in the chest, stomach discomfort,  heaviness and burning in the stomach. Eno powder gets to work on acidity in just 6 seconds. ', 'powder', '134', 1, 'Eno-Powder-Lemon-Bottle-(100mg)');

-- --------------------------------------------------------

--
-- Table structure for table `physipal_admin`
--

CREATE TABLE `physipal_admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `adminmail` varchar(50) NOT NULL,
  `adpassword` varchar(100) NOT NULL,
  `profit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_admin`
--

INSERT INTO `physipal_admin` (`adminid`, `adminname`, `adminmail`, `adpassword`, `profit`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$13$nyzdHaRRNvC4sygtJgwqf..Fumw9hXrGpGU96Gnn2dTklJ61GSqcO', 117);

-- --------------------------------------------------------

--
-- Table structure for table `physipal_allusers`
--

CREATE TABLE `physipal_allusers` (
  `aid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `ucat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_allusers`
--

INSERT INTO `physipal_allusers` (`aid`, `name`, `email`, `phone`, `password`, `ucat`) VALUES
(7, 'Treasa Janet', 'treasajanet@gmail.com', '9074538898', '$2y$13$qxVSRB7ntf1TnnTl9UqteO23UJnXL4cAaNRzdQJJB5OjdCaf.z02y', 'vendor'),
(10, 'Prateek Shinde', 'pratik.shinde2102@gmail.com', '7020140066', '$2y$13$Gz108I0shq0JxvVB8Vjb8eZMCZUGHCbRB4vtFM8TCKHzNj23hQmRi', 'medibuddy'),
(11, 'Mayesh Dani', 'mayeshdani2108@gmail.com', '8956790002', '$2y$13$VqAdXiPfKm.hSFVivzzPceBzjOQwq9eUDeTdz/JH/VPLFOh1EasFi', 'customer'),
(12, 'Mriganki Agarwal', 'mrigankiagarwal@gmail.com', '8208576212', '$2y$13$b0k4nmcieFGxEXa0hFbzWeMKEYiXxBfMHb//N4jI5gYFNZnPA0K.6', 'vendor'),
(13, 'prarteek', 'pratik@gmail.com', '9999999999', '$2y$13$vGHBmTk/gGu8ARXCo0/81.jggNUrUHxFRSMAPBEiOgO6GsR7P0Yvy', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `physipal_card`
--

CREATE TABLE `physipal_card` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cardno` bigint(17) NOT NULL,
  `expm` int(2) NOT NULL,
  `expy` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_card`
--

INSERT INTO `physipal_card` (`uid`, `uname`, `phone`, `email`, `address`, `cardno`, `expm`, `expy`) VALUES
(1, 'Mayesh Dani', 8956790002, 'mayeshdani2108@gmail.com', 'Ahmednagar, India', 1234567891234567, 12, 23);

-- --------------------------------------------------------

--
-- Table structure for table `physipal_cart`
--

CREATE TABLE `physipal_cart` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `physipal_medibuddy`
--

CREATE TABLE `physipal_medibuddy` (
  `mid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `medibuddyname` varchar(30) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `profit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_medibuddy`
--

INSERT INTO `physipal_medibuddy` (`mid`, `aid`, `medibuddyname`, `username`, `email`, `phone`, `address`, `profit`) VALUES
(1, 10, 'Prateek Shinde', 'Prateek21', 'pratik.shinde2102@gmail.com', '7020140066', 'Pune', 58);

-- --------------------------------------------------------

--
-- Table structure for table `physipal_orders`
--

CREATE TABLE `physipal_orders` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `tprice` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `vendorname` varchar(30) NOT NULL,
  `pharmname` varchar(30) NOT NULL,
  `mid` int(11) DEFAULT 0,
  `vid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `apro` int(11) NOT NULL DEFAULT 0,
  `vpro` int(11) NOT NULL DEFAULT 0,
  `mpro` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_orders`
--

INSERT INTO `physipal_orders` (`oid`, `uid`, `pid`, `pname`, `image`, `quantity`, `rate`, `tprice`, `status`, `vendorname`, `pharmname`, `mid`, `vid`, `uname`, `apro`, `vpro`, `mpro`) VALUES
(1, 1, 5, 'Dolo', 'tp.jpg', 15, 30, 450, 'exchanging', 'Treasa Janet', 'treasapharm', 1, 6, 'Mayesh Dani', 90, 315, 45),
(4, 1, 5, 'Dolo', 'tp.jpg', 1, 30, 30, 'cancelled', 'Treasa Janet', 'treasapharm', 1, 6, 'Mayesh Dani', 0, 0, 0),
(5, 1, 8, 'Combiflam', 'combiflam-plus-tablet-650mg-10-s-655.jpg', 1, 46, 46, 'cancelled', 'Treasa Janet', 'treasapharm', 1, 6, 'Mayesh Dani', 0, 0, 0),
(6, 1, 21, 'Eno Powder Lemon Bottle (100mg)', '1673029674.jpg', 1, 134, 134, 'delivered', 'Mriganki Agarwal', 'Prayagraj Pharm', 1, 7, 'Mayesh Dani', 27, 94, 13),
(7, 1, 4, 'Febrex Plus', '1670765132.jpg', 1, 53, 53, 'pending', 'Treasa Janet', 'treasapharm', 0, 6, 'Mayesh Dani', 0, 0, 0),
(8, 1, 4, 'Febrex Plus', '1670765132.jpg', 1, 53, 53, 'pending', 'Treasa Janet', 'treasapharm', 0, 6, 'Mayesh Dani', 0, 0, 0),
(9, 1, 20, 'Nicip Plus', '1673029244.jpg', 1, 52, 52, 'pending', 'Mriganki Agarwal', 'Prayagraj Pharm', 0, 7, 'Mayesh Dani', 0, 0, 0),
(10, 1, 4, 'Febrex Plus', '1670765132.jpg', 1, 53, 53, 'pending', 'Treasa Janet', 'treasapharm', 0, 6, 'Mayesh Dani', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `physipal_users`
--

CREATE TABLE `physipal_users` (
  `uid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `joinedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `country` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_users`
--

INSERT INTO `physipal_users` (`uid`, `aid`, `username`, `name`, `email`, `phone`, `joinedAt`, `updatedAt`, `country`, `city`) VALUES
(1, 11, 'Mayesh2108', 'Mayesh Dani', 'mayeshdani2108@gmail.com', '8956790002', '2022-12-11 10:50:35', '2022-12-11 10:50:35', 'India', 'Ahmednagar'),
(2, 13, 'prateeek', 'prarteek', 'pratik@gmail.com', '9999999999', '2023-01-10 04:37:52', '2023-01-10 04:37:52', 'India', 'Ahmednagar');

-- --------------------------------------------------------

--
-- Table structure for table `physipal_vendor`
--

CREATE TABLE `physipal_vendor` (
  `vid` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `vendorname` varchar(30) DEFAULT NULL,
  `pharmacyname` varchar(25) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `profit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physipal_vendor`
--

INSERT INTO `physipal_vendor` (`vid`, `aid`, `vendorname`, `pharmacyname`, `email`, `phone`, `location`, `profit`) VALUES
(6, 7, 'Treasa Janet', 'treasapharm', 'treasajanet@gmail.com', '9074538898', 'kochi', 315),
(7, 12, 'Mriganki Agarwal', 'Prayagraj Pharm', 'mrigankiagarwal@gmail.com', '8208576212', 'Prayagraj', 94);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `physipal_add_products`
--
ALTER TABLE `physipal_add_products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `physipal_admin`
--
ALTER TABLE `physipal_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `physipal_allusers`
--
ALTER TABLE `physipal_allusers`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `physipal_card`
--
ALTER TABLE `physipal_card`
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `physipal_cart`
--
ALTER TABLE `physipal_cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `physipal_medibuddy`
--
ALTER TABLE `physipal_medibuddy`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `physipal_orders`
--
ALTER TABLE `physipal_orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `physipal_users`
--
ALTER TABLE `physipal_users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `physipal_vendor`
--
ALTER TABLE `physipal_vendor`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `physipal_add_products`
--
ALTER TABLE `physipal_add_products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `physipal_admin`
--
ALTER TABLE `physipal_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `physipal_allusers`
--
ALTER TABLE `physipal_allusers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `physipal_cart`
--
ALTER TABLE `physipal_cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `physipal_medibuddy`
--
ALTER TABLE `physipal_medibuddy`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `physipal_orders`
--
ALTER TABLE `physipal_orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `physipal_users`
--
ALTER TABLE `physipal_users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `physipal_vendor`
--
ALTER TABLE `physipal_vendor`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
