-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 08:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `id` int(5) DEFAULT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `id`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 3, 'Shivam jaiswal', 'harshit kumar', 100, '2021-07-23 01:19:02'),
(2, 3, 'Shivam jaiswal', 'Arvind Kumar Singh', 500, '2021-07-23 01:16:48'),
(16, 4, 'rahul kumar', 'sonu kumar', 100, '2021-07-23 01:21:07'),
(17, 1, 'Arvind Kumar Singh', 'sonu kumar', 100, '2021-07-28 23:50:45'),
(18, 2, 'sonu kumar', 'Mahi Kumar', 100, '2021-07-28 23:56:52'),
(19, 5, 'harshit kumar', 'Anurag Kumar Pandey', 100, '2021-07-28 23:57:48'),
(20, 6, 'Chandan Maurya', 'Anshu Kumari', 400, '2021-07-28 23:58:32'),
(21, 7, 'Anshu Kumari', 'Rinku Kumari', 100, '2021-07-28 23:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`, `password`) VALUES
(1, 'Arvind Kumar Singh', 'b190125@nitsikkim.ac.in', 1100, 'arvi123'),
(2, 'sonu kumar', 'b190038@nitsikkim.ac.in', 2500, 'sonu#01'),
(3, 'Shivam jaiswal', 'b190034@nitsikkim.ac.in', 1400, 'shiv90'),
(4, 'rahul kumar', 'b190126@gmail.com', 900, '9012345@#'),
(5, 'harshit kumar', 'b190132@nitsikkim.ac.in', 500, 'harsh786'),
(6, 'Chandan Maurya', 'b190129@gmail.com', 18600, 'chandu321'),
(7, 'Anshu Kumari', 'anshu@gmail.com', 2000, 'ansh#23'),
(8, 'Laxman Kumar', 'laxman123@gmail.com', 3600, 'Lakshy23#23'),
(9, 'Rinku Kumari', 'rinkukr@gmail.com', 1100, '123456'),
(10, 'Anurag Kumar Pandey', 'anurag@gmail.com', 5200, 'anuragpandey'),
(11, 'Mahi Kumar', 'mahi@gmail.com', 2100, 'captaincool'),
(12, 'Admin', 'adminmybank@mybank.com', 1000000, 'mybankadmin#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
