-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 04:28 PM
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
-- Database: `gonft`
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
  `referral_bonus` varchar(255) NOT NULL,
  `current_plan` varchar(255) NOT NULL DEFAULT 'none',
  `password` varchar(255) NOT NULL,
  `reflink` varchar(255) NOT NULL,
  `referred_by` varchar(255) DEFAULT 'None',
  `deposit_status` varchar(255) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `username`, `email`, `walletaddress`, `balance`, `earnings`, `referral_bonus`, `current_plan`, `password`, `reflink`, `referred_by`, `deposit_status`) VALUES
(3, 'Ebuka', 'Onyekwere', 'ebukaonyekwere', 'onyekwereebuka200@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktRx1', '8100', '-67.5', '14', 'Basic', 'ebuka200', '', NULL, 'yes'),
(5, 'Godfrey', 'Odenigbo', 'gopro200', 'odenigbogodfrey@yahoo.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '1500', '55', '30', 'Basic', 'godpro200', '', 'ebukaonyekwere', 'yes'),
(6, 'Adaeze', 'Onyekwere', 'ada200', 'oliviaonyekwere16@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '700', '94.5', '', 'Basic', 'adaada', '', NULL, 'yes'),
(8, 'David', 'Ogbonna', 'david200', 'david200@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '500', '0', '', 'Basic', 'david2001', '', NULL, 'yes'),
(9, 'Ella', 'Dingings', 'elladings', 'oliviaonyekwere16@gmail.com', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '0', '0', '', 'none', 'elladi@', 'https://www.gonft.allansacuityltd.com/dashboard/register.php?username=ebukaonyekwere', NULL, 'no'),
(10, 'Ellason', 'Dickson', 'ellason', 'ellasonsonjunior', '3FZbgi29cpjq2GjdwV8eyHuJJnkLtktZc5', '0', '0', '', 'none', 'ellasonjnr', 'https://www.gonft.allansacuityltd.com/dashboard/register.php?username=ebukaonyekwere', NULL, 'no'),
(16, 'Ebdwjnfj', 'fjgnenger', 'frjbnf', 'fngfb', 'fgrij', '0', '0', '', 'none', 'dfhbdb', 'https://www.gonft.allansacuityltd.com/dashboard/register.php?username=ebukaonyekwere', 'gopro200', 'no');

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
(69, '2022-08-20 08:39:04', 'ebukaonyekwere'),
(70, '2022-08-20 08:40:26', 'gopro200'),
(71, '2022-08-20 08:40:27', 'gopro200'),
(72, '2022-08-20 08:41:21', 'ebukaonyekwere'),
(73, '2022-08-20 08:41:21', 'ebukaonyekwere'),
(74, '2022-08-20 08:42:57', 'ebukaonyekwere'),
(75, '2022-08-20 08:43:43', 'ebukaonyekwere'),
(76, '2022-08-20 08:44:40', 'ebukaonyekwere'),
(77, '2022-08-20 08:44:40', 'ebukaonyekwere'),
(78, '2022-08-20 08:46:07', 'ebukaonyekwere'),
(79, '2022-08-26 09:50:43', 'gopro200'),
(80, '2022-08-26 09:50:44', 'gopro200'),
(81, '2022-08-26 10:00:33', 'gopro200'),
(82, '2022-08-26 10:06:42', 'gopro200'),
(83, '2022-08-26 10:57:23', 'gopro200'),
(84, '2022-08-26 10:57:59', 'gopro200'),
(85, '2022-08-26 10:58:26', 'gopro200'),
(86, '2022-08-26 10:59:39', 'gopro200'),
(87, '2022-08-26 11:00:21', 'gopro200'),
(88, '2022-08-26 11:01:08', 'gopro200'),
(89, '2022-08-26 11:01:40', 'gopro200'),
(90, '2022-08-26 11:15:02', 'gopro200'),
(91, '2022-08-26 11:15:03', 'gopro200'),
(92, '2022-08-26 11:18:00', 'gopro200'),
(93, '2022-08-26 11:18:17', 'gopro200'),
(94, '2022-08-26 11:24:42', 'gopro200'),
(95, '2022-08-26 11:25:19', 'gopro200'),
(96, '2022-08-26 11:25:51', 'gopro200'),
(97, '2022-08-26 11:26:22', 'gopro200'),
(98, '2022-08-26 11:28:21', 'gopro200'),
(99, '2022-08-26 11:28:55', 'gopro200'),
(100, '2022-08-26 11:29:32', 'gopro200'),
(101, '2022-08-26 11:31:50', 'gopro200'),
(102, '2022-08-26 11:33:30', 'gopro200'),
(103, '2022-08-26 11:34:29', 'gopro200'),
(104, '2022-08-26 11:35:10', 'gopro200'),
(105, '2022-08-26 11:35:27', 'gopro200'),
(106, '2022-08-26 11:58:54', 'gopro200'),
(107, '2022-08-26 11:59:21', 'gopro200'),
(108, '2022-08-30 14:27:43', 'gopro200'),
(109, '2022-08-30 14:27:43', 'gopro200');

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
(2, 'ebukaonyekwere', 'Early Minting', '', 'ioerjoi ');

-- --------------------------------------------------------

--
-- Table structure for table `nfts`
--

CREATE TABLE `nfts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `token_standard` varchar(255) NOT NULL,
  `last_sold` varchar(255) NOT NULL,
  `last_price_sold` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `asset_contract` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nfts`
--

INSERT INTO `nfts` (`id`, `name`, `description`, `token_standard`, `last_sold`, `last_price_sold`, `source`, `asset_contract`, `category`, `link`, `image`, `artist`) VALUES
(6, 'Mokey_Aliens', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', '', '', '', '', '', 'Arts/Paintings', 'example.com', '../nfts/nfts165947504093.jpeg', 'Ezrapaints'),
(8, 'Ape', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', '', '', '', '', '', 'Music', 'example.com', '../nfts/nfts165947631678.jpeg', 'Ezrapaints'),
(9, 'Mokey_Ape', 'At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.', '', '', '', '', '', 'Photography', 'example.com', '../nfts/nfts165947709136.jpeg', 'Ezrapaints'),
(10, 'admin', 'print_r($newstring);\r\n                    print($newstring[1]);', '', '', '', '', '', 'Collectibles', 'example.com', '../nfts/nfts165960521014.jpeg', 'Ezrapaints');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `referred_by` varchar(255) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ammount` int(255) NOT NULL,
  `package` varchar(255) NOT NULL DEFAULT 'no package',
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `username`, `image`, `ammount`, `package`, `status`) VALUES
(56, 'ebukaonyekwere', 'images/receipt165850070182.png', 1500, 'no package', 'pending'),
(57, 'ebukaonyekwere', 'images/receipt165850301314.png', 1500, 'no package', 'pending'),
(58, 'ebukaonyekwere', 'images/receipt165851683633.png', 1500, 'no package', 'pending'),
(59, 'ebukaonyekwere', 'images/receipt165859232417.png', 1500, 'no package', 'pending'),
(60, 'gopro200', 'images/receipt165869290350.png', 1000, 'no package', 'pending'),
(61, 'ada200', 'images/receipt165883174425.png', 700, 'no package', 'pending'),
(64, 'david200', 'images/receipt165884468020.png', 1000, 'no package', 'approved'),
(65, 'gopro200', 'images/receipt166151494534.png', 1000, 'Basic', 'approved');

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
(12, '2022-08-26', 'CREDIT', '1000', 'gopro200'),
(13, '2022-08-30', 'WITHDRAWAL', '900', 'ebukaonyekwere');

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
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `minting`
--
ALTER TABLE `minting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nfts`
--
ALTER TABLE `nfts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
