-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 04:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loanstracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_requests`
--

CREATE TABLE `api_requests` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(11) NOT NULL,
  `account_name` text NOT NULL,
  `account_number` int(10) NOT NULL,
  `branch` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `account_name`, `account_number`, `branch`) VALUES
(1, 'David Omadi', 1003004559, 'Makerere'),
(2, 'Anne Mwebe Nassimbwa', 1003004560, 'Makerere'),
(4, 'Ivan Odur', 1003004561, 'Makerere'),
(5, 'Mable Birungi', 1003004562, 'Makerere');

-- --------------------------------------------------------

--
-- Table structure for table `bank_loans`
--

CREATE TABLE `bank_loans` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `account_number` int(11) NOT NULL,
  `amount` int(10) NOT NULL,
  `due_date` date NOT NULL,
  `date_disbursed` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_loans`
--

INSERT INTO `bank_loans` (`id`, `description`, `account_number`, `amount`, `due_date`, `date_disbursed`, `status`) VALUES
(1, 'Salary Loan', 1003004559, 5000000, '2023-07-31', '2023-04-11 14:43:51', 'OUTSTANDING'),
(2, 'Motgage', 1003004562, 50000000, '2030-03-30', '2023-04-11 14:43:51', ''),
(5, 'Student Loan', 1003004561, 450000, '1970-01-01', '2023-04-11 14:58:14', ''),
(6, 'Agriculture Loan', 1003004559, 2000000, '2024-05-31', '2023-04-11 15:02:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank_loan_payments`
--

CREATE TABLE `bank_loan_payments` (
  `id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `ammount_paid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `pwd2` varchar(100) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `pwd`, `pwd2`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ACTIVE'),
(2, 'david', '172522ec1028ab781d9dfd17eaca4427', 'david', 'ACTIVE'),
(3, 'mable', 'a849dee520c2c020b32a5ee20b1da4ee', 'mable', 'ACTIVE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_requests`
--
ALTER TABLE `api_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_loans`
--
ALTER TABLE `bank_loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_loan_payments`
--
ALTER TABLE `bank_loan_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_requests`
--
ALTER TABLE `api_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_loans`
--
ALTER TABLE `bank_loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_loan_payments`
--
ALTER TABLE `bank_loan_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
