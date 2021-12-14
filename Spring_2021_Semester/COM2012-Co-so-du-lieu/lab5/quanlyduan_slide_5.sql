-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: quanlyduan
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
-- Table structure for table `du_an`
--

DROP TABLE IF EXISTS `du_an`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `du_an` (
  `ma_duan` char(5) NOT NULL,
  `ten_duan` varchar(255) DEFAULT NULL,
  `ngay_batdau` date DEFAULT NULL,
  `ngay_ketthuc` date DEFAULT NULL,
  PRIMARY KEY (`ma_duan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `du_an`
--

LOCK TABLES `du_an` WRITE;
/*!40000 ALTER TABLE `du_an` DISABLE KEYS */;
INSERT INTO `du_an` VALUES ('DA001','Library System','2017-01-01','2017-03-08'),('DA002','Employee System','2017-03-03','2017-08-14'),('DA003','Travel Website','2017-07-19','2017-08-26'),('DA004','Lee Fashion Website','2017-02-08','2016-01-06'),('DA005','Du an a','2019-01-23','2019-01-30'),('DA006','Du an 6',NULL,NULL);
/*!40000 ALTER TABLE `du_an` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhan_vien` (
  `id_nhanvien` int NOT NULL AUTO_INCREMENT,
  `ho_nv` varchar(255) NOT NULL,
  `ten_nv` varchar(10) NOT NULL,
  `nam_sinh` date DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT NULL,
  `luong` int DEFAULT NULL,
  `phg` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_nhanvien`),
  KEY `phg` (`phg`),
  CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`phg`) REFERENCES `phong_ban` (`ma_pb`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_vien`
--

LOCK TABLES `nhan_vien` WRITE;
/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` VALUES (1,'Nguyen','An','1987-01-01','15 Quang Trung Da Nang',1,1000,'PB001'),(2,'Le','Bao','1982-02-03','16 Le Loi',0,800,'PB002'),(3,'Tran','Cuong','1988-06-05','24 Tran Cao Van',1,1200,'PB001'),(4,'Hoang','Lan','1982-03-04','137 Nguyen Thi Thap Da Nang',0,900,'PB002'),(5,'Van','Toan','1984-04-02','34 Yen Bai',1,1500,'PB003'),(6,'Nguyen','Thi','1988-03-12','67 Yen Bai',0,700,'PB003'),(7,'Le','Loi','1987-04-23','90 Ngo Van So',1,900,'PB004'),(8,'Hoang','Nga','1992-05-05','70 Nguyen Du',0,1000,'PB005'),(9,'Tran','Thuy','1998-06-09','123 Nguyen Troi',1,1200,'PB001'),(10,'Hoang văn','Chinh','1990-06-05','23 Hoang Dieu',0,1200,'PB004'),(11,'Le','Hoang','1987-05-04','13 Hoang Van Thu',0,1000,NULL),(12,'Hoang','Quan','1990-06-07','46 Ngo Thua Nham',1,700,NULL);
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phong_ban`
--

DROP TABLE IF EXISTS `phong_ban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phong_ban` (
  `ma_pb` char(5) NOT NULL,
  `ten_pb` varchar(255) NOT NULL,
  `ma_tp` int DEFAULT NULL,
  PRIMARY KEY (`ma_pb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phong_ban`
--

LOCK TABLES `phong_ban` WRITE;
/*!40000 ALTER TABLE `phong_ban` DISABLE KEYS */;
INSERT INTO `phong_ban` VALUES ('PB001','San xuat 1',1),('PB002','San xuat 2',2),('PB003','Quan Ly Chat Luong',5),('PB004','Thiet ke',7),('PB005','Nghien cuu cong nghe',8),('PB006','Kinh Doanh',NULL),('PB007','Truyen Thong',NULL),('PB008','Hanh Chinh',NULL),('PB009','Cong Nghe',NULL);
/*!40000 ALTER TABLE `phong_ban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quanly_duan`
--

DROP TABLE IF EXISTS `quanly_duan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quanly_duan` (
  `ma_duan` char(5) NOT NULL,
  `ma_nhanvien` int NOT NULL,
  `ngay_thamgia` date DEFAULT NULL,
  `ngay_ketthuc` date DEFAULT NULL,
  `sogio` int DEFAULT NULL,
  `vai_tro` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ma_duan`,`ma_nhanvien`),
  KEY `ma_nhanvien` (`ma_nhanvien`),
  CONSTRAINT `quanly_duan_ibfk_1` FOREIGN KEY (`ma_nhanvien`) REFERENCES `nhan_vien` (`id_nhanvien`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `quanly_duan_ibfk_2` FOREIGN KEY (`ma_duan`) REFERENCES `du_an` (`ma_duan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quanly_duan`
--

LOCK TABLES `quanly_duan` WRITE;
/*!40000 ALTER TABLE `quanly_duan` DISABLE KEYS */;
INSERT INTO `quanly_duan` VALUES ('DA001',1,'2017-01-01','2017-03-08',300,'Dev'),('DA001',7,'2017-01-01','2017-03-08',50,'Designer'),('DA001',8,'2017-01-01','2017-03-08',60,'QA');
/*!40000 ALTER TABLE `quanly_duan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-02 10:06:40
