-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2021 at 01:35 PM
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
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Shivam jaiswal', 'sonu kumar', 500, '2021-05-18 14:17:59'),
(2, 'Chandan Maurya', 'rahul kumar', 1000, '2021-05-18 14:18:22'),
(3, 'harshit kumar', 'Laxman Kumar', 500, '2021-05-18 16:16:46'),
(4, 'rahul kumar', 'sonu kumar', 500, '2021-05-18 19:23:01'),
(5, 'Shivam jaiswal', 'Laxman Kumar', 1000, '2021-05-25 17:53:03'),
(6, 'Arvind Kumar Singh', 'Chandan Maurya', 1000, '2021-06-17 19:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Arvind Kumar Singh', 'b190125@nitsikkim.ac.in', 1000),
(2, 'sonu kumar', 'b190038@nitsikkim.ac.in', 1500),
(3, 'Shivam jaiswal', 'b190034@nitsikkim.ac.in', 3000),
(4, 'rahul kumar', 'b190126@gmail.com', 1000),
(5, 'harshit kumar', 'b190132@nitsikkim.ac.in', 500),
(6, 'Chandan Maurya', 'b190129@gmail.com', 19000),
(7, 'Anshu Kumari', 'anshu@gmail.com', 1500),
(8, 'Laxman Kumar', 'laxman123@gmail.com', 3500),
(9, 'Rinku Kumari', 'rinkukr@gmail.com', 1000),
(10, 'Anurag Kumar Pandey', 'anurag@gmail.com', 5000),
(11, 'Mahi Kumar', 'mahi@gmail.com', 2000);

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
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
