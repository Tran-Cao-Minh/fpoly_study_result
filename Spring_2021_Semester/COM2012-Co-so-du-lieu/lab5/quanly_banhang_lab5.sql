-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: quanly_banhang
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoadon` (
  `maHoadon` int NOT NULL,
  `ngayMuahang` date NOT NULL,
  `maKhachhang` char(5) NOT NULL,
  `trangThai` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`maHoadon`),
  KEY `fk_khachhang_idx` (`maKhachhang`),
  CONSTRAINT `fk_khachhang` FOREIGN KEY (`maKhachhang`) REFERENCES `khachhang` (`maKhachhang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (120954,'2016-03-23','KH001','Đã thanh toán'),(120955,'2016-04-02','KH002','Đã thanh toán'),(120956,'2016-07-12','KH001','chưa thanh toán'),(125957,'2016-12-04','KH004','chưa thanh toán');
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadonchitiet`
--

DROP TABLE IF EXISTS `hoadonchitiet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hoadonchitiet` (
  `maHoadonChitiet` int NOT NULL AUTO_INCREMENT,
  `maHoadon` int NOT NULL,
  `maSanpham` int NOT NULL,
  `soLuong` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`maHoadonChitiet`),
  UNIQUE KEY `maHoadonChitiet_UNIQUE` (`maHoadonChitiet`),
  KEY `fk_mahoadon_idx` (`maHoadon`),
  KEY `fk_masanpham_idx` (`maSanpham`),
  CONSTRAINT `fk_mahoadon` FOREIGN KEY (`maHoadon`) REFERENCES `hoadon` (`maHoadon`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_masanpham` FOREIGN KEY (`maSanpham`) REFERENCES `sanpham` (`maSanpham`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadonchitiet`
--

LOCK TABLES `hoadonchitiet` WRITE;
/*!40000 ALTER TABLE `hoadonchitiet` DISABLE KEYS */;
INSERT INTO `hoadonchitiet` VALUES (1,120954,3,40),(2,120954,1,20),(3,120955,2,100),(4,120956,4,6),(5,120956,2,60),(6,120956,1,10),(7,125957,2,50);
/*!40000 ALTER TABLE `hoadonchitiet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `maKhachhang` char(5) NOT NULL,
  `hoLot` varchar(50) NOT NULL,
  `ten` varchar(10) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dienThoai` varchar(13) NOT NULL,
  PRIMARY KEY (`maKhachhang`),
  UNIQUE KEY `maKhachhang_UNIQUE` (`maKhachhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` VALUES ('KH001','Nguyễn Thị','Nga','15 Quang Trung TP Đà Nẵng','ngant@gamil.com','0912345670'),('KH002','Trần Công','Thành','234 Lê Lợi Quảng Nam','thanhtc@gmail.com','16109423443'),('KH003','Lê Hoàng','Nam','23 Trần Phú TP Huế','namlt@yahoo.com','0989354556'),('KH004','Vũ Ngọc','Hiền','37 Nguyễn Thị Thập TP Đà Nẵng','hienvn@gmail.com','0894545435');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `maSanpham` int NOT NULL AUTO_INCREMENT,
  `tenSP` text,
  `soLuong` int unsigned NOT NULL,
  `donGia` float unsigned NOT NULL,
  `moTa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`maSanpham`),
  UNIQUE KEY `maSanpham_UNIQUE` (`maSanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Samsung Galaxy J7 Pro là một chiếc smartphone phù hợp với những người yêu thích một sản phẩm pin tốt, thích hệ điều hành mới cùng những tính năng đi kèm độc quyền',800,6600000,'Samsung Galaxy J7 Pro'),(2,'iPhone 6 là một trong những smartphone được yêu thích nhất. Lắng nghe nhu cầu về thiết kế, khả\nnăng lưu trữ và giá cả, iPhone 6 32GB được chính thức phân phối chính hãng tại Việt Nam hứa hẹn sẽ\nlà một sản phẩm rất \"Hot\"',500,8990000,'iPhone 6 32GB'),(3,'Dell Inspiron 3467 i3 7100U/4GB/1TB/Win10/(M20NR21)',507,11290000,'Laptop Dell Inspiron 3467'),(4,'Pin sạc dự phòng Polymer 5.000 mAh eSaver JP85',600,200000,'Pin sạc dự phòng'),(5,'Nokia 3100 phù hợp với SINH VIÊN',100,700000,'Nokia 3100');
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

-- Dump completed on 2021-04-02  9:18:42
