-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 08:12 AM
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
-- Database: `lab_7_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_tin`
--

CREATE TABLE `loai_tin` (
  `id_lt` int(11) NOT NULL,
  `lang` char(2) DEFAULT 'vi',
  `ten` varchar(100) NOT NULL,
  `thu_tu` tinyint(2) NOT NULL DEFAULT 0,
  `an_hien` tinyint(1) NOT NULL DEFAULT 1,
  `id_tl` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_tin`
--

INSERT INTO `loai_tin` (`id_lt`, `lang`, `ten`, `thu_tu`, `an_hien`, `id_tl`) VALUES
(1, 'vi', 'Thể thao', 2, 1, 1),
(3, 'vi', 'Du lịch', 2, 1, 1),
(4, 'vi', 'Khoa học', 4, 1, 1),
(9, 'vi', 'Xã hội', 3, 1, 1),
(10, 'vi', 'Văn hóa', 6, 1, 1),
(11, 'vi', 'Pháp luật', 9, 1, 1),
(12, 'vi', 'Sống đẹp', 3, 1, 3),
(24, 'vi', 'Mẹo vặt', 17, 1, 6),
(28, 'vi', 'Thơ hay', 8, 1, 7),
(40, 'en', 'Tools', 10, 1, 9),
(41, 'vi', 'Website hữu ích', 11, 1, 9),
(42, 'vi', 'Scripts hữu dụng', 13, 1, 9),
(77, 'vi', 'Chia sẻ', 15, 1, 3),
(78, 'vi', 'Giáo dục', 18, 1, 1),
(79, 'vi', 'Sức khỏe', 7, 1, 6),
(82, 'vi', 'Tin tức Web', 12, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `the_loai`
--

CREATE TABLE `the_loai` (
  `id_tl` int(11) NOT NULL,
  `lang` char(2) DEFAULT 'vi',
  `ten_tl` varchar(255) NOT NULL,
  `thu_tu` int(11) DEFAULT 0,
  `an_hien` tinyint(1) DEFAULT 1,
  `hien_menu` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_loai`
--

INSERT INTO `the_loai` (`id_tl`, `lang`, `ten_tl`, `thu_tu`, `an_hien`, `hien_menu`) VALUES
(1, 'vi', 'Tin xã hội', 0, 0, 1),
(2, 'vi', 'Việc làm', 4, 0, 1),
(3, 'vi', 'Nghệ thuật sống', 2, 1, 1),
(6, 'vi', 'Thưởng thức', 6, 1, 1),
(7, 'vi', 'Thư giãn', 5, 1, 0),
(9, 'vi', 'Thế giới Web', 1, 1, 1),
(11, 'en', 'Travel', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ngay` date NOT NULL COMMENT 'Ngày đăng ký',
  `id_group` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Quy ước 0 là thành viên, 1 là admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `pass`, `email`, `ngay`, `id_group`) VALUES
(0, 'tran_cao_minh', '123456', 'tcm@gmail.com', '2021-08-05', 1),
(1, 'mai_thanh_tam', '123456', 'mtt@gmail.com', '2021-08-06', 1),
(2, 'tran_minh_cuong', '123456', 'tmc@gmail.com', '2021-08-07', 0),
(3, 'dao_duc_minh_khoi', '123456', 'ddmk@gmail.com', '2021-08-08', 0),
(4, 'nguyen_dang_thanh', '123456', 'ndt@gmail.com', '2021-08-09', 0),
(5, '0', '0', '0', '2021-08-09', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loai_tin`
--
ALTER TABLE `loai_tin`
  ADD PRIMARY KEY (`id_lt`),
  ADD KEY `lt_tl` (`id_tl`);

--
-- Indexes for table `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`id_tl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loai_tin`
--
ALTER TABLE `loai_tin`
  MODIFY `id_lt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `id_tl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loai_tin`
--
ALTER TABLE `loai_tin`
  ADD CONSTRAINT `lt_tl` FOREIGN KEY (`id_tl`) REFERENCES `the_loai` (`id_tl`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
