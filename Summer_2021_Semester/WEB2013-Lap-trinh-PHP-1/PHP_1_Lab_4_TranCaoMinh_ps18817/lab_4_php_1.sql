-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 01:32 PM
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
-- Database: `lab_4_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_danh_muc` varchar(10) NOT NULL,
  `ten_danh_muc` varchar(100) NOT NULL,
  `Ngày tạo` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_danh_muc`, `ten_danh_muc`, `Ngày tạo`) VALUES
('GK', 'giáo khoa', '2021-07-19'),
('KH', 'khoa học', '2021-07-18'),
('KNS', 'kỹ năng sống', '2021-07-18'),
('KT', 'kinh tế', '2021-07-18'),
('LS', 'lịch sử', '2021-07-18'),
('NN', 'ngoại ngữ', '2021-07-18'),
('NT', 'nghệ thuật', '2021-07-18'),
('TN', 'thiếu nhi', '2021-07-18'),
('VH', 'văn học', '2021-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_danh_muc` varchar(10) NOT NULL,
  `ma_san_pham` varchar(10) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `don_gia` int(11) NOT NULL,
  `don_vi_tinh` varchar(100) NOT NULL DEFAULT 'Quyển sách',
  `nha_cung_cap` varchar(100) NOT NULL,
  `link_anh` varchar(100) NOT NULL,
  `mo_ta` varchar(500) NOT NULL,
  `ngay_them` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_danh_muc`, `ma_san_pham`, `ten_san_pham`, `don_gia`, `don_vi_tinh`, `nha_cung_cap`, `link_anh`, `mo_ta`, `ngay_them`) VALUES
('GK', '1', 'Bồ công anh nhỏ', 52000, 'Quyển sách', 'NXB 1', './images/products/boconganhnho.png', '.', '2021-07-08'),
('GK', '2', 'Cà Phê cùng Tony', 49000, 'Quyển sách', '.', './images/products/cafecungtony.png', '.', '2021-07-09'),
('GK', '3', 'Gieo niềm tin cuộc sống', 59000, 'Quyển sách', '.', './images/products/gieoniemtincuocsong.png', '.', '2021-07-05'),
('KNS', 'KNS_001', 'Tâm Hồn Cao Thượng', 44600, 'Quyển sách', 'NXB Thanh Niên', './images/products/tamhoncaothuong.png', 'Ngày 18/10 hằng năm là ngày khai trường truyền thống ở Ý. Vào ngày này năm 1886, Tâm hồn cao thượng (nguyên tác Cuore, nghĩa là Trái tim) cuốn tiểu thuyết trẻ em của nhà văn người Ý Edmondo De Amicis chính thức ra mắt. Ngay lập tức, nó chinh phục trái tim bạn đọc, không chỉ ở Ý mà còn lan khắp các châu lục khác. Đến tận bây giờ, Tâm hồn cao thượng vẫn là một trong những tác phẩm có sức sống bền bỉ trong đời sống xuất bản của nhiều quốc gia.', '2021-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `so_lieu_san_pham`
--

CREATE TABLE `so_lieu_san_pham` (
  `ma_san_pham` varchar(10) NOT NULL,
  `so_luot_xem` int(11) NOT NULL DEFAULT 0,
  `so_luong_ban_trong_thang` int(11) NOT NULL DEFAULT 0,
  `so_luong_ban_toan_thoi_gian` int(11) NOT NULL DEFAULT 0,
  `so_luong_con_lai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `so_lieu_san_pham`
--

INSERT INTO `so_lieu_san_pham` (`ma_san_pham`, `so_luot_xem`, `so_luong_ban_trong_thang`, `so_luong_ban_toan_thoi_gian`, `so_luong_con_lai`) VALUES
('1', 25, 23, 21, 26),
('2', 32, 36, 37, 40),
('3', 52, 12, 11, 5),
('KNS_001', 15, 17, 210, 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_danh_muc`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_san_pham`),
  ADD KEY `sp_dm` (`ma_danh_muc`);

--
-- Indexes for table `so_lieu_san_pham`
--
ALTER TABLE `so_lieu_san_pham`
  ADD PRIMARY KEY (`ma_san_pham`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `sp_dm` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`ma_danh_muc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `so_lieu_san_pham`
--
ALTER TABLE `so_lieu_san_pham`
  ADD CONSTRAINT `slsp_sp` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
