-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 08:17 AM
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
('KNS', 'kỹ năng sống', '2021-07-18'),
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
('VH', '1', 'Bồ công anh nhỏ', 52000, 'Quyển sách', 'NXB Văn Hóa', './images/products/boconganhnho.jpg', 'Tình bạn là nụ cười ấm áp nhất, là cái nắm tay trìu mến nhất, là bầu trời thênh thang nhất, là một loài hoa, truyền đi ước mơ tuổi học trò đẹp đẽ nhất. Và mình nghĩ rằng, tình bạn chính là loài hoa bồ công anh, mà mỗi khi chúng ta thổi nhẹ từng cánh hoa bay vào trong gió, là gửi đi những suy nghĩ cần sẻ chia nhất, những lời nhỏ to thầm kín, là những ước nguyện cho tương lai, cho ngày mai. ', '2021-07-08'),
('VH', '2', 'Cà Phê cùng Tony', 63000, 'Quyển sách', 'NXB Trẻ', './images/products/cafecungtony.jpg', 'Chúng tôi tin rằng những người trẻ tuổi luôn mang trong mình khát khao vươn lên và tấm lòng hướng thiện, và có nhiều cách để động viên họ biến điều đó thành hành động. Nếu như tập sách nhỏ này có thể khơi gợi trong lòng bạn đọc trẻ một cảm hứng tốt đẹp, như tách cà phê thơm vào đầu ngày nắng mới, thì đó là niềm vui lớn của tác giả Tony Buổi Sáng.', '2021-07-09'),
('KNS', '3', 'Gieo niềm tin cuộc sống', 59000, 'Quyển sách', 'NXB Tổng Hợp', './images/products/gieoniemtincuocsong.jpg', 'Chắc hẳn ai trong chúng ta cũng từng trải qua khó khăn và thất bại. Đứng trước những thử thách của cuộc đời, một số người mau chóng đánh mất niềm tin và bỏ cuộc, nhưng cũng có người vững vàng và kiên trì vượt qua mọi nghịch cảnh. Điểm mấu chốt nằm ở thái độ và cách chúng ta nhìn nhận về cuộc sống.', '2021-07-05'),
('KNS', '4', 'Tâm hồn cao thượng', 44600, 'Quyển sách', 'NXB Thanh Niên', './images/products/tamhoncaothuong.jpg', 'Ngày 18/10 hằng năm là ngày khai trường truyền thống ở Ý. Vào ngày này năm 1886, Tâm hồn cao thượng (nguyên tác Cuore, nghĩa là Trái tim) cuốn tiểu thuyết trẻ em của nhà văn người Ý Edmondo De Amicis chính thức ra mắt. Ngay lập tức, nó chinh phục trái tim bạn đọc, không chỉ ở Ý mà còn lan khắp các châu lục khác. Đến tận bây giờ, Tâm hồn cao thượng vẫn là một trong những tác phẩm có sức sống bền bỉ trong đời sống xuất bản của nhiều quốc gia.', '2021-07-20'),
('VH', '5', 'Nhà giả kim', 67000, 'Quyển sách', 'NXB Hội Nhà Văn', './images/products/nhagiakim.jpg', 'Tiểu thuyết Nhà giả kim của Paulo Coelho như một câu chuyện cổ tích giản dị, nhân ái, giàu chất thơ, thấm đẫm những minh triết huyền bí của phương Đông. Trong lần xuất bản đầu tiên tại Brazil vào năm 1988, sách chỉ bán được 900 bản. Nhưng, với số phận đặc biệt của cuốn sách dành cho toàn nhân loại, vượt ra ngoài biên giới quốc gia, Nhà giả kim đã làm rung động hàng triệu tâm hồn, trở thành một trong những cuốn sách bán chạy nhất mọi thời đại, và có thể làm thay đổi cuộc đời người đọc.', '2021-07-08'),
('VH', '6', 'Sẽ có cách đừng lo', 60030, 'Quyển sách', 'NXB Văn Học', './images/products/secocachdunglo.jpg', 'TOP 100 BEST SELLER - Tản văn “Sẽ có cách, đừng lo” với lối viết gần gũi, những tự sự, trăn trở về tình yêu, chuyện đời- chuyện người. Cuốn sách như một người bạn động viên tác giả cũng như đem lại niềm tha thiết yêu cuộc sống cho độc giả, thể hiện năng lượng sống tích cực khi đứng trước những điều tưởng chừng như rất khó vượt qua.', '2021-07-17'),
('KNS', '7', 'Tuổi trẻ đáng giá bao nhiêu', 78300, 'Quyển sách', 'NXB Hội Nhà Văn', './images/products/tuoitredanggiabaonhieu.jpg', 'Hãy đọc sách, nếu bạn đọc sách một cách bền bỉ, sẽ đến lúc bạn bị thôi thúc không ngừng bởi ý muốn viết nên cuốn sách của riêng mình.\r\nNếu tôi còn ở tuổi đôi mươi, hẳn là tôi sẽ đọc Tuổi trẻ đáng giá bao nhiêu? nhiều hơn một lần.”', '2021-07-12'),
('KNS', '8', 'Hiểu về trái tim', 124200, 'Quyển sách', 'NXB Tổng Hợp', './images/products/hieuvetraitim.jpg', 'Xuất bản lần đầu tiên vào năm 2011, Hiểu Về Trái Tim trình làng cũng lúc với kỷ lục: cuốn sách có số lượng in lần đầu lớn nhất: 100.000 bản. Trung tâm sách kỷ lục Việt Nam công nhận kỳ tích ấy nhưng đến nay, con số phát hành của Hiểu về trái tim vẫn chưa có dấu hiệu chậm lại.', '2021-07-20');

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
('1', 86, 23, 21, 26),
('2', 34, 36, 37, 40),
('3', 58, 12, 11, 10),
('4', 51, 17, 21, 54),
('5', 73, 14, 35, 21),
('6', 45, 16, 26, 13),
('7', 45, 26, 29, 19),
('8', 12, 22, 62, 12);

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
