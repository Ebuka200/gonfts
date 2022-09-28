-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2022 at 05:54 AM
-- Server version: 10.3.36-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `writiqut_gonft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `walletaddress` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL DEFAULT '0',
  `earnings` varchar(255) NOT NULL DEFAULT '0',
  `royalties` varchar(255) NOT NULL DEFAULT '0',
  `current_plan` varchar(255) NOT NULL DEFAULT 'none',
  `password` varchar(255) NOT NULL,
  `last_earned_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `username`, `email`, `walletaddress`, `balance`, `earnings`, `royalties`, `current_plan`, `password`, `last_earned_date`) VALUES
(3, 'Ebuka', 'Onyekwere', 'ebukaonyekwere', 'onyekwereebuka200@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktRx1', '9580', '0', '', 'Pro', 'ebuka200', ''),
(5, 'Godfrey', 'Odenigbo', 'gopro200', 'odenigbogodfrey@yahoo.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '1100', '218', '0', 'Premium', 'godpro200', ''),
(6, 'Adaeze', 'Onyekwere', 'ada200', 'oliviaonyekwere16@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '700', '94.5', '', 'Basic', 'adaada', ''),
(8, 'David', 'Ogbonna', 'david200', 'david200@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '500', '0', '', 'Basic', 'david2001', ''),
(9, 'Femi', 'Kuti', '@femikuti', 'jarmorasi@tutanota.com', 'WeWillRemoveThisInput', '0', '0', '', 'none', 'admin@password', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin@password');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `date`, `username`) VALUES
(1, '2022-07-20 20:46:34', 'gopro200'),
(30, '2022-07-24 22:32:07', 'gopro200'),
(33, '2022-07-26 09:50:14', 'gopro200'),
(35, '2022-07-26 09:59:55', 'gopro200'),
(36, '2022-07-26 10:04:54', 'gopro200'),
(37, '2022-07-26 10:05:06', 'gopro200'),
(38, '2022-07-24 10:09:37', 'ada200'),
(39, '2022-07-26 10:38:48', 'ada200'),
(41, '2022-07-26 13:34:12', 'david200'),
(42, '2022-07-26 13:34:25', 'david200'),
(43, '2022-07-26 14:09:58', 'david200'),
(44, '2022-07-26 14:10:15', 'david200'),
(46, '2022-07-27 11:14:43', 'gopro200'),
(47, '2022-07-27 11:14:43', 'gopro200'),
(53, '2022-07-29 11:20:09', 'gopro200'),
(54, '2022-07-29 11:20:09', 'gopro200'),
(59, '2022-07-29 11:35:48', 'gopro200'),
(60, '2022-07-29 11:46:30', 'gopro200'),
(61, '2022-07-29 11:57:58', 'gopro200'),
(62, '2022-08-02 14:09:45', 'admin'),
(63, '2022-08-02 14:09:58', 'admin'),
(64, '2022-08-04 10:06:46', 'gopro200'),
(65, '2022-08-04 10:06:46', 'gopro200'),
(66, '2022-08-04 20:00:13', 'gopro200'),
(67, '2022-08-04 20:00:13', 'gopro200'),
(68, '2022-08-04 21:36:26', 'gopro200'),
(69, '2022-08-06 11:42:22', 'admin'),
(70, '2022-08-06 20:04:11', 'gopro200'),
(71, '2022-08-06 20:04:11', 'gopro200'),
(72, '2022-08-08 11:03:52', 'admin'),
(73, '2022-08-08 11:05:17', 'jarmorasi@tutanota.com'),
(74, '2022-08-08 11:05:26', '@femikuti'),
(75, '2022-08-08 18:52:12', 'Admin'),
(76, '2022-08-08 18:54:59', 'gopro200'),
(77, '2022-08-08 18:55:00', 'gopro200'),
(78, '2022-08-08 19:02:02', 'Gopro200'),
(79, '2022-08-08 19:02:02', 'gopro200'),
(80, '2022-08-08 19:03:57', 'gopro200'),
(81, '2022-08-08 19:04:36', 'gopro200'),
(82, '2022-08-08 20:29:28', 'gopro200'),
(83, '2022-08-08 20:29:28', 'gopro200'),
(84, '2022-09-26 18:16:55', 'gopro200'),
(85, '2022-09-26 18:16:56', 'gopro200'),
(86, '2022-09-26 18:35:32', 'gopro200'),
(87, '2022-09-26 18:35:58', 'gopro200'),
(88, '2022-09-26 18:36:31', 'gopro200'),
(89, '2022-09-26 18:37:37', 'gopro200'),
(90, '2022-09-26 18:38:34', 'gopro200'),
(91, '2022-09-26 18:38:48', 'gopro200'),
(92, '2022-09-26 18:39:57', 'gopro200'),
(93, '2022-09-26 18:41:10', 'gopro200'),
(94, '2022-09-26 18:41:36', 'gopro200'),
(95, '2022-09-26 19:15:54', 'gopro200'),
(96, '2022-09-26 19:16:17', 'gopro200'),
(97, '2022-09-27 14:06:55', 'gopro200'),
(98, '2022-09-27 14:06:55', 'gopro200'),
(99, '2022-09-27 21:24:48', 'gopro200'),
(100, '2022-09-27 21:24:49', 'gopro200'),
(101, '2022-09-27 21:29:30', 'gopro200'),
(102, '2022-09-27 21:29:41', 'gopro200'),
(103, '2022-09-27 21:29:41', 'gopro200'),
(104, '2022-09-27 21:32:16', 'gopro200'),
(105, '2022-09-27 21:33:02', 'gopro200'),
(106, '2022-09-27 21:33:32', 'gopro200'),
(107, '2022-09-27 21:34:28', 'gopro200'),
(108, '2022-09-27 21:38:01', 'gopro200'),
(109, '2022-09-27 21:48:37', 'gopro200'),
(110, '2022-09-27 22:17:55', 'gopro200'),
(111, '2022-09-27 22:52:57', 'gopro200'),
(112, '2022-09-27 22:55:02', 'gopro200'),
(113, '2022-09-27 22:56:07', 'gopro200'),
(114, '2022-09-28 03:47:24', 'gopro200'),
(115, '2022-09-28 03:47:25', 'gopro200'),
(116, '2022-09-28 03:47:26', 'gopro200'),
(117, '2022-09-28 03:47:27', 'gopro200'),
(118, '2022-09-28 08:09:02', 'gopro200'),
(119, '2022-09-28 08:09:02', 'gopro200'),
(120, '2022-09-28 08:25:21', 'gopro200'),
(121, '2022-09-28 08:44:00', 'gopro200'),
(122, '2022-09-28 08:48:38', 'gopro200'),
(123, '2022-09-28 08:48:48', 'gopro200'),
(124, '2022-09-28 08:48:56', 'gopro200'),
(125, '2022-09-28 08:49:00', 'gopro200'),
(126, '2022-09-28 08:49:51', 'gopro200'),
(127, '2022-09-28 08:49:57', 'gopro200'),
(128, '2022-09-28 08:50:04', 'gopro200'),
(129, '2022-09-28 08:50:08', 'gopro200'),
(130, '2022-09-28 09:21:53', 'gopro200'),
(131, '2022-09-28 09:31:36', 'gopro200'),
(132, '2022-09-28 09:33:20', 'gopro200');

-- --------------------------------------------------------

--
-- Table structure for table `minting`
--

CREATE TABLE `minting` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `package` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `walletaddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minting`
--

INSERT INTO `minting` (`id`, `username`, `package`, `percentage`, `walletaddress`) VALUES
(1, '', 'Early Minting', '', 'ioerjoi '),
(2, 'ebukaonyekwere', 'Early Minting', '', 'ioerjoi '),
(3, 'gopro200', 'Early Minting', '', 'Idudhsnsndb');

-- --------------------------------------------------------

--
-- Table structure for table `nfts`
--

CREATE TABLE `nfts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nfts`
--

INSERT INTO `nfts` (`id`, `name`, `description`, `category`, `link`, `image`, `artist`) VALUES
(6, 'Mokey_Aliens', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', 'Arts/Paintings', 'https://www.pexels.com/search/man%20sitting%20with...', '../nfts/nfts165947504093.jpeg', 'Ezrapaints'),
(8, 'Ape', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', 'Music', 'https://www.pexels.com/search/man%20sitting%20with...', '../nfts/nfts165947631678.jpeg', 'Ezrapaints'),
(9, 'Mokey_Ape', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', 'Photography', 'https://www.pexels.com/search/man%20sitting%20with...', '../nfts/nfts165947709136.jpeg', 'Ezrapaints'),
(10, 'admin', 'hello', 'Collectibles', 'example.com', '../nfts/nfts165960521014.jpeg', 'Ezrapaints'),
(11, 'Mokey_Aliens', 'hello', 'Arts/Paintings', 'example.com', '../nfts/nfts165998543017.png', 'Ezrapaints'),
(12, 'Monalisa', 'Real Monalisa Artwork', 'Arts/Paintings', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapaints'),
(13, 'Polythene', ' Copyright 2022', 'Music', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapainting'),
(14, 'polythene', 'opfgo goep ge', 'Music', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapainting'),
(15, 'Monalisa', 'pprer ertkroeptetet  trtrt rett', 'Music', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapainting'),
(16, 'Mokey_Aliens', 'kokpm kfmmgdmg g,g gr', 'Trading Cards', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapainting'),
(17, 'Mokey_Aliens', 'pointus', 'Photography', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '../nfts/nfts166004545077.png', 'Ezrapainting'),
(18, 'Ape', 'r', 'Sport', 'https://www.pexels.com/search/man%20sitting%20with%20a%20laptop/', '', 'Ezrapaintinggf'),
(19, 'Mokey_Ape', '', 'Arts/Paintings', '', '', ''),
(20, 'eze', '', 'Arts/Paintings', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ammount` int(255) NOT NULL,
  `package` varchar(255) NOT NULL DEFAULT 'no package'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `username`, `image`, `ammount`, `package`) VALUES
(56, 'ebukaonyekwere', 'images/receipt165850070182.png', 1500, 'no package'),
(57, 'ebukaonyekwere', 'images/receipt165850301314.png', 1500, 'no package'),
(58, 'ebukaonyekwere', 'images/receipt165851683633.png', 1500, 'no package'),
(59, 'ebukaonyekwere', 'images/receipt165859232417.png', 1500, 'no package'),
(60, 'gopro200', 'images/receipt165869290350.png', 600, 'no package'),
(64, 'david200', 'images/receipt165884468020.png', 1000, 'no package'),
(65, 'gopro200', 'images/receipt165998543382.jpeg', 0, 'no package'),
(66, 'gopro200', 'images/receipt166435343782.png', 0, 'no package');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `username` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `description`, `amount`, `username`) VALUES
(1, '2022-07-22', 'WITHDRAWAL', '500', ''),
(2, '2022-07-22', 'CREDIT', '500', ''),
(3, '2022-07-23', 'CREDIT', '500', ''),
(4, '2022-07-23', 'WITHDRAWAL', '1000', ''),
(5, '2022-07-23', 'CREDIT', '1500', ''),
(6, '2022-07-24', 'CREDIT', '600', 'gopro200'),
(7, '2022-07-24', 'WITHDRAWAL', '100', 'gopro200'),
(8, '2022-07-26', 'CREDIT', '700', 'ada200'),
(10, '2022-07-26', 'CREDIT', '1000', 'david200'),
(11, '2022-07-26', 'WITHDRAWAL', '500', 'david200'),
(12, '2022-08-06', 'WITHDRAWAL', '900', 'ebukaonyekwere'),
(13, '2022-08-06', 'WITHDRAWAL', '20', 'ebukaonyekwere'),
(14, '2022-08-08', 'CREDIT', '1500', 'ebukaonyekwere'),
(15, '2022-08-08', 'CREDIT', '600', 'gopro200');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ammount` varchar(255) NOT NULL,
  `walletaddress` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `username`, `ammount`, `walletaddress`, `status`) VALUES
(38, 'ebukaonyekwere', '900', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(42, 'ebukaonyekwere', '180', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(43, 'ebukaonyekwere', '20', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(44, 'ebukaonyekwere', '800', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(45, 'ebukaonyekwere', '500', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(46, 'ebukaonyekwere', '1000', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(47, 'gopro200', '100', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved'),
(48, 'david200', '500', '1DHfKVMiB8XJqUZFUGkfETLteZoJPN5cUa', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minting`
--
ALTER TABLE `minting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfts`
--
ALTER TABLE `nfts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `minting`
--
ALTER TABLE `minting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nfts`
--
ALTER TABLE `nfts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
