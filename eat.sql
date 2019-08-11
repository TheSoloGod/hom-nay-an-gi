-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2019 at 01:31 PM
-- Server version: 5.7.21-1ubuntu1
-- PHP Version: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataUsers`
--

CREATE TABLE `dataUsers` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataUsers`
--

INSERT INTO `dataUsers` (`userID`, `userName`, `userPassword`, `email`, `height`, `weight`, `gender`) VALUES
(1, 'thuyC0619I1', '123456', 'ahihi@gmail.com', 123, 43, 'female'),
(2, 'Duc0619K1', 'abc123', 'ahihi@gmail.com', 123, 43, 'male'),
(3, 'DuongDua', 'ahihi123', '', 150, 50, 'Female'),
(4, 'root', '123', 'ahihi@gmail.com', 321, 654, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `feedBacks`
--

CREATE TABLE `feedBacks` (
  `feedBackNumber` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `feedBack` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `calories` float NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`foodID`, `foodName`, `calories`, `type`) VALUES
(10, 'Bắp rang', 374, 'TB'),
(11, 'Cơm', 130, 'TB'),
(12, 'Yến mạch', 150, 'TB'),
(13, 'Đậu xanh', 328, 'X'),
(14, 'Hạt quinoa', 400, 'TB'),
(16, 'Chuối', 250, 'TB'),
(17, 'Khoai lang', 350, 'TB'),
(18, 'Đậu đen', 325, 'X'),
(19, 'Đậu nành', 400, 'X'),
(20, 'Cải xoăn', 170, 'TB'),
(21, 'Hạnh nhân', 600, 'X'),
(23, 'Hạt điều', 600, 'X'),
(25, 'Ớt chuông', 27, 'X'),
(27, 'Bầu', 14, 'X'),
(28, 'Bí', 16, 'X'),
(30, 'Hạt chia', 34, 'X'),
(33, 'Thịt gà', 240, 'D'),
(36, 'Cá', 200, 'D'),
(39, 'Pho mai', 200, 'D'),
(40, 'Thăn heo', 250, 'D'),
(41, 'Thịt bò', 300, 'D'),
(42, 'Củ cải đường', 220, 'X'),
(43, 'Thịt bê', 289, 'D'),
(44, 'Mâm xôi', 226, 'X'),
(45, 'Đậu hũ', 210, 'D'),
(46, 'Bông cải xanh', 187, 'X'),
(47, 'Dâu tằm', 265, 'X'),
(48, 'Đậu lăng', 100, 'D'),
(49, 'Cà chua', 100, 'X'),
(50, 'Trứng', 150, 'D'),
(51, 'Dưa chuột', 88, 'X'),
(52, 'Dưa muối', 123, 'X'),
(53, 'Rau muống', 77, 'X'),
(54, 'Rau đay', 60, 'X'),
(55, 'Rau mồng tơi', 45, 'X'),
(56, 'Dọc mùng', 38, 'X'),
(57, 'Nấm thường tươi', 70, 'X'),
(58, 'Mướp', 38, 'X'),
(59, 'Tôm', 100, 'D'),
(60, 'Óc lợn', 265, 'D'),
(61, 'Bia', 141, 'P'),
(62, 'Rượu', 158, 'P'),
(63, 'Cocktail trái cây', 180, 'p'),
(64, 'Nước cam vắt', 256, 'P'),
(65, 'Nước chanh', 174, 'P'),
(66, 'Nước ép trái cây đóng hộp', 88, 'P'),
(67, 'Nước mía', 126, 'P'),
(68, 'Nước ngọt có gaz', 146, 'P'),
(69, 'Nước rau má', 191, 'P'),
(70, 'Nước sâm', 78, 'P'),
(71, 'Sinh tố', 284, 'P'),
(72, 'Sữa chua uống Yo-Most', 144, 'P'),
(73, 'Sữa chua Yoghurt Vinamilk', 152, 'P'),
(74, 'Sữa đậu nành Tribeco', 166, 'P'),
(75, 'Sữa hộp Cô gái Hà lan', 155, 'P'),
(76, 'Trái dừa tươi', 128, 'P'),
(77, 'Cà phê đen phin', 44, 'P'),
(78, 'Cà phê sữa gói tan', 88, 'P'),
(79, 'Măng cụt', 22, 'P'),
(80, 'Sầu riêng', 36, 'P'),
(81, 'Xoài', 171, 'P'),
(82, 'Táo', 224, 'P'),
(83, 'Quýt', 58, 'P'),
(84, 'Cóc', 35, 'P'),
(85, 'Nho Mỹ (đỏ/xanh)', 74, 'P'),
(86, 'Dưa hấu', 25, 'P'),
(87, 'Mãng cầu ta', 55, 'P'),
(88, 'Bưởi', 88, 'P'),
(89, 'Lê', 91, 'P'),
(90, 'Táo tây', 198, 'P'),
(91, 'Khế', 14, 'P'),
(92, 'Mãng cầu xiêm', 200, 'P'),
(93, 'Đu đủ', 125, 'P'),
(94, 'Hồng đỏ', 32, 'P'),
(95, 'Cam', 73, 'P'),
(96, 'Ổi', 66, 'P'),
(97, 'Thanh long	', 225, 'P'),
(98, 'Mận đỏ	', 12, 'P'),
(99, 'Đậu xanh', 272, 'P'),
(100, 'Chuối Chín', 77, 'P'),
(101, 'Tai lợn', 234, 'D'),
(102, 'Tim lợn', 128, 'D'),
(103, 'Thận lợn', 112, 'D'),
(104, 'Lá lách', 100, 'D'),
(105, 'Đuôi lợn', 378, 'D'),
(106, 'Ruột non', 205, 'D'),
(107, 'Lưỡi bò', 226, 'D'),
(108, 'Óc bò', 156, 'D'),
(109, 'Thịt chuột', 322, 'D'),
(110, 'Móng lợn', 212, 'D'),
(111, 'Chân giò', 266, 'D'),
(112, 'Trứng vịt lộn', 226, 'D'),
(113, 'Cơm rang', 159, 'TB'),
(114, 'Cơm cuộn', 190, 'TB'),
(115, 'Mỳ tôm', 98, 'TB'),
(116, 'Miến xào', 169, 'TB'),
(117, 'Cơm niêu', 220, 'TB'),
(118, 'Bành mì gối', 102, 'TB'),
(119, 'Bánh mì đặc', 227, 'TB'),
(120, 'Bánh mì ngọt', 147, 'TB'),
(121, 'Bún bò huế', 479, 'TB'),
(122, 'Bún thịt nướng	', 451, 'TB'),
(123, 'Bánh bao chay', 125, 'TB'),
(124, 'Bún mọc', 514, 'TB'),
(125, 'Bún riêu cua	', 414, 'TB'),
(126, 'Cháo đậu đỏ', 322, 'TB'),
(127, 'Cháo vây cá mập', 398, 'TB'),
(128, 'Bún vây cá mập', 449, 'TB'),
(129, 'Cháo lòng', 412, 'TB'),
(130, 'Tiết canh', 356, 'D'),
(131, 'Mì quảng	', 541, 'TB'),
(132, 'Bánh khoai mì nướng	', 392, 'TB'),
(133, 'Bánh chưng', 745, 'TB'),
(134, 'Bánh dày', 852, 'TB'),
(135, 'Xôi đậu phộng	', 562, 'TB'),
(136, 'Xôi gấc	', 589, 'TB'),
(137, 'Cari', 446, 'D'),
(138, 'Vú sữa	', 83, 'P'),
(139, 'Mít tố nữ	', 10, 'P'),
(140, 'Nhãn tiêu	', 2, 'P'),
(141, 'Cá mú kho	', 184, 'D'),
(142, 'Cá lóc chiên	', 169, 'D'),
(143, 'Cá ngừ kho	', 122, 'D'),
(144, 'Cá trê chiên	', 219, 'D'),
(145, 'Cá mập đại dương', 266, 'D'),
(146, 'Cá mập kiếm', 336, 'D'),
(147, 'Chuột rim mắm', 227, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `userID` int(11) NOT NULL,
  `dateEat` date NOT NULL,
  `timeInDay` varchar(50) COLLATE utf8_bin NOT NULL,
  `tinhBot` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dam` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `xo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `monPhu` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`userID`, `dateEat`, `timeInDay`, `tinhBot`, `dam`, `xo`, `monPhu`) VALUES
(1, '2019-08-07', 'Chiều', 'Bắp rang', 'Thịt gà', 'Dâu tằm', 'Mâm xôi'),
(1, '2019-08-07', 'Sáng', 'Bắp rang', 'Thịt gà', 'Củ cải đường', 'Mâm xôi'),
(1, '2019-08-08', 'Chiều', 'Bún thịt nướng', 'Cá mập kiếm', 'Dâu tằm', 'Mâm xôi'),
(1, '2019-08-08', 'Sáng', 'Bắp rang', 'Lưỡi bò', 'Bông cải xanh', 'Đu đủ'),
(1, '2019-08-09', 'Chiều', 'Bắp rang', 'Đuôi lợn', 'Dâu tằm', 'Mâm xôi'),
(1, '2019-08-09', 'Sáng', 'Xôi đậu phộng', 'Cá mập đại dương', 'Dâu tằm', 'Cóc'),
(1, '2019-08-10', 'Chiều', 'Bún bò huế', 'Thận lợn', 'Dâu tằm', 'Mãng cầu xiêm'),
(1, '2019-08-10', 'Sáng', 'Xôi đậu phộng', 'Thận lợn', 'Mâm xôi', 'Mãng cầu xiêm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataUsers`
--
ALTER TABLE `dataUsers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `feedBacks`
--
ALTER TABLE `feedBacks`
  ADD PRIMARY KEY (`feedBackNumber`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`userID`,`dateEat`,`timeInDay`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataUsers`
--
ALTER TABLE `dataUsers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedBacks`
--
ALTER TABLE `feedBacks`
  MODIFY `feedBackNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
