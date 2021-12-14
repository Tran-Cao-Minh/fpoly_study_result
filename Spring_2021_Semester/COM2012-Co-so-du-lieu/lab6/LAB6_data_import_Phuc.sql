-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: qlbanhang
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `ngayMuaHang` date DEFAULT NULL,
  `trangThai` tinytext COLLATE utf8_lithuanian_ci,
  `maKhachHang` varchar(5) COLLATE utf8_lithuanian_ci NOT NULL,
  PRIMARY KEY (`maHoaDon`),
  KEY `fk_HoaDon_KhachHang1_idx` (`maKhachHang`),
  CONSTRAINT `fk_HoaDon_KhachHang1` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`makhachhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (1001,'2020-02-04','Đã thanh toán','KH001'),(1002,'2020-01-13','Đã thanh toán','KH001'),(1003,'2020-03-15','Chưa thanh toán','KH002'),(1004,'2019-05-23','Đã thanh toán','KH003'),(1005,'2020-04-06','Chưa thanh toán','KH004'),(1006,'2019-12-25','Chưa thanh toán','KH005'),(1007,'2019-12-20','Chưa thanh toán','KH003');
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadonchitiet`
--

DROP TABLE IF EXISTS `hoadonchitiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `hoadonchitiet` (
  `soLuong` int(11) DEFAULT NULL,
  `maHoaDonChiTiet` int(11) NOT NULL AUTO_INCREMENT,
  `maSanPham` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  PRIMARY KEY (`maHoaDonChiTiet`),
  KEY `fk_HoaDonChiTiet_SanPham1_idx` (`maSanPham`),
  KEY `fk_HoaDonChiTiet_HoaDon1_idx` (`maHoaDon`),
  CONSTRAINT `fk_HoaDonChiTiet_HoaDon1` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`mahoadon`),
  CONSTRAINT `fk_HoaDonChiTiet_SanPham1` FOREIGN KEY (`maSanPham`) REFERENCES `sanpham` (`masanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadonchitiet`
--

LOCK TABLES `hoadonchitiet` WRITE;
/*!40000 ALTER TABLE `hoadonchitiet` DISABLE KEYS */;
INSERT INTO `hoadonchitiet` VALUES (20,1,1,1001),(30,2,2,1001),(2,3,3,1001),(3,4,1,1002),(5,5,4,1002),(2,6,5,1003),(3,7,3,1004),(6,8,2,1005),(7,9,4,1001),(2,10,5,1001),(35,11,4,1006),(40,12,5,1007),(20,13,2,1007);
/*!40000 ALTER TABLE `hoadonchitiet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `khachhang` (
  `maKhachHang` varchar(5) COLLATE utf8_lithuanian_ci NOT NULL,
  `hoVaTenLot` tinytext COLLATE utf8_lithuanian_ci,
  `Ten` tinytext COLLATE utf8_lithuanian_ci,
  `diaChi` text COLLATE utf8_lithuanian_ci,
  `Email` tinytext COLLATE utf8_lithuanian_ci,
  `dienThoai` tinytext COLLATE utf8_lithuanian_ci,
  PRIMARY KEY (`maKhachHang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES ('KH001','Nguyễn Thị','Hồng','15 Quang Trung, TpHCM','hongnt@gmail.com','0912345678'),('KH002','Nguyễn Thị Tường','Vy','12 Tô Ngoc Van, Q12. HCM','vyntt@gmail.com','0903936117'),('KH003','Lê Văn','Hùng','Hộ Diêm, Ninh Thuận','phungsts@gmail.com','0903414749'),('KH004','Lê Hiếu','Kiên','Nha Trang','kienlh@gmail.com','0903494949'),('KH005','Lê Hiếu','An','12 Nguyễn Trãi, Đà Nẵng','anlh@gmail.com','0903474747'),('KH006','Phan Thị','Ngân','Phan Rang','hanhpt@gmail.com','0903555556');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `moTa` text COLLATE utf8_lithuanian_ci,
  `soLuong` int(11) DEFAULT NULL,
  `donGia` float DEFAULT NULL,
  `tenSP` tinytext COLLATE utf8_lithuanian_ci,
  PRIMARY KEY (`maSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Samsung Galaxy J7 Pro la smarthome thông minh với nhiều tính năng',200,6600000,'Samsung Galaxy J7'),(2,'iPhone 11',300,9000000,'iPhone 11 64G'),(3,'Dell Inspiron 6650 ị/RAM 4G, SDD 1T/ Win10',20,11000000,'Laptop Dell Inspison 6550'),(4,'Pin sac dự phòng 20000mma',100,200000,'Pin sạc dự phòng'),(5,'Nokia 3100 bình dân',100,5000000,'Nokia 3100');
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-10 13:07:36
