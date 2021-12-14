-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ps18817_qlbds_lab4
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
-- Table structure for table `batdongsan`
--

DROP TABLE IF EXISTS `batdongsan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batdongsan` (
  `mabds` varchar(5) NOT NULL,
  `diachibds` varchar(255) DEFAULT NULL,
  `mavp` varchar(5) DEFAULT NULL,
  `macsh` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`mabds`),
  KEY `macsh` (`macsh`),
  CONSTRAINT `batdongsan_ibfk_1` FOREIGN KEY (`macsh`) REFERENCES `chusohuu` (`macsh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batdongsan`
--

LOCK TABLES `batdongsan` WRITE;
/*!40000 ALTER TABLE `batdongsan` DISABLE KEYS */;
INSERT INTO `batdongsan` VALUES ('bds1','Thai Binh','vp1','csh5'),('bds2','Son La','vp3','csh2'),('bds3','Hoa Binh','vp4','csh1'),('bds4','Yen Bai','vp2','csh3'),('bds5','Buon Me Thuot','vp5','csh4'),('bds6','Thanh Hoa','vp4','csh3'),('bds7','Hue','vp2','csh5');
/*!40000 ALTER TABLE `batdongsan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chusohuu`
--

DROP TABLE IF EXISTS `chusohuu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chusohuu` (
  `macsh` varchar(5) NOT NULL,
  `hocsh` varchar(255) DEFAULT NULL,
  `tencsh` varchar(15) DEFAULT NULL,
  `diachicsh` varchar(255) DEFAULT NULL,
  `sdtcsh` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`macsh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chusohuu`
--

LOCK TABLES `chusohuu` WRITE;
/*!40000 ALTER TABLE `chusohuu` DISABLE KEYS */;
INSERT INTO `chusohuu` VALUES ('csh1','Tran Cao','Minh','Dong Nai','0332340012'),('csh2','Than Hoang','Loc','TP Ho Chi Minh','0936547899'),('csh3','Chau Kim','Phuong','Da Nang','033785442'),('csh4','Doan Cong','Khanh','Ba Ria - Vung Tau','0937236125'),('csh5','Ha Van','Cu','Nghe An','0164568778');
/*!40000 ALTER TABLE `chusohuu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `manv` int NOT NULL DEFAULT '0',
  `honv` varchar(255) DEFAULT NULL,
  `tennv` varchar(15) DEFAULT NULL,
  `mavp` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`manv`),
  KEY `mavp` (`mavp`),
  CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`mavp`) REFERENCES `vanphong` (`mavp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` VALUES (1,'Le Vinh','Ky','vp1'),(2,'Hoang Phuoc','Nguyen','vp2'),(3,'Nguyen Phi','Hung','vp3'),(4,'Tran Minh','Tri','vp4'),(5,'Nguyen Hung','Huy','vp5');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thannhan`
--

DROP TABLE IF EXISTS `thannhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thannhan` (
  `matn` varchar(5) NOT NULL,
  `hotn` varchar(255) DEFAULT NULL,
  `tentn` varchar(15) DEFAULT NULL,
  `ngaysinhtn` date DEFAULT NULL,
  `moilienhe` varchar(255) DEFAULT NULL,
  `manv` int DEFAULT NULL,
  PRIMARY KEY (`matn`),
  KEY `manv` (`manv`),
  CONSTRAINT `thannhan_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thannhan`
--

LOCK TABLES `thannhan` WRITE;
/*!40000 ALTER TABLE `thannhan` DISABLE KEYS */;
INSERT INTO `thannhan` VALUES ('tn1','Le Vinh','Long','1987-05-12','Cha',1),('tn2','Pham Dang','Hoa','1985-12-15','Me',2),('tn3','Nguyen Phu','Nhan','1989-04-29','Chu',3),('tn4','Le Thi','Tuyet','1954-02-13','Ba Ngoai',4),('tn5','Nguyen Long','Phu','1988-08-18','Cha Nuoi',5);
/*!40000 ALTER TABLE `thannhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truongphong`
--

DROP TABLE IF EXISTS `truongphong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truongphong` (
  `manv` int NOT NULL,
  `mavp` varchar(5) NOT NULL,
  PRIMARY KEY (`manv`,`mavp`),
  KEY `mavp` (`mavp`),
  CONSTRAINT `truongphong_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  CONSTRAINT `truongphong_ibfk_2` FOREIGN KEY (`mavp`) REFERENCES `vanphong` (`mavp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truongphong`
--

LOCK TABLES `truongphong` WRITE;
/*!40000 ALTER TABLE `truongphong` DISABLE KEYS */;
INSERT INTO `truongphong` VALUES (1,'vp1'),(2,'vp2'),(3,'vp3'),(4,'vp4'),(5,'vp5');
/*!40000 ALTER TABLE `truongphong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vanphong`
--

DROP TABLE IF EXISTS `vanphong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vanphong` (
  `mavp` varchar(5) NOT NULL,
  `diadiemvp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mavp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vanphong`
--

LOCK TABLES `vanphong` WRITE;
/*!40000 ALTER TABLE `vanphong` DISABLE KEYS */;
INSERT INTO `vanphong` VALUES ('vp1','Ha Noi'),('vp2','TP Ho Chi Minh'),('vp3','Da Nang'),('vp4','Hai Phong'),('vp5','Can Tho');
/*!40000 ALTER TABLE `vanphong` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-31 14:51:31
