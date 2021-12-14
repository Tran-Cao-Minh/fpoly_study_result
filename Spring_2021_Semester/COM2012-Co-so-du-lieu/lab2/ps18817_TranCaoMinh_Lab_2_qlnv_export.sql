-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ps18817_qlnv_lab2
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
-- Table structure for table `duan`
--

DROP TABLE IF EXISTS `duan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `duan` (
  `mada` varchar(5) NOT NULL,
  `tenda` varchar(255) DEFAULT NULL,
  `ngay_bdau` date DEFAULT NULL,
  `ngay_kthuc` date DEFAULT NULL,
  `mapb` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`mada`),
  KEY `da_pb` (`mapb`),
  CONSTRAINT `da_pb` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duan`
--

LOCK TABLES `duan` WRITE;
/*!40000 ALTER TABLE `duan` DISABLE KEYS */;
/*!40000 ALTER TABLE `duan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `manv` int NOT NULL,
  `honv` varchar(255) DEFAULT NULL,
  `tennv` varchar(10) DEFAULT NULL,
  `namsinh` date DEFAULT NULL,
  `gioitinh` varchar(8) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `luong` float DEFAULT NULL,
  `mapb` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`manv`),
  KEY `nv_pb` (`mapb`),
  CONSTRAINT `nv_pb` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhanvien`
--

LOCK TABLES `nhanvien` WRITE;
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phancong`
--

DROP TABLE IF EXISTS `phancong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phancong` (
  `ngay_thamgia` date DEFAULT NULL,
  `ngay_ketthuc` date DEFAULT NULL,
  `sogio` int DEFAULT NULL,
  `vaitro` varchar(255) DEFAULT NULL,
  `mada` varchar(5) DEFAULT NULL,
  `manv` int DEFAULT NULL,
  KEY `pc_da` (`mada`),
  KEY `pc_nv` (`manv`),
  CONSTRAINT `pc_da` FOREIGN KEY (`mada`) REFERENCES `duan` (`mada`),
  CONSTRAINT `pc_nv` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phancong`
--

LOCK TABLES `phancong` WRITE;
/*!40000 ALTER TABLE `phancong` DISABLE KEYS */;
/*!40000 ALTER TABLE `phancong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phongban`
--

DROP TABLE IF EXISTS `phongban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phongban` (
  `mapb` varchar(5) NOT NULL,
  `tenpb` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mapb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phongban`
--

LOCK TABLES `phongban` WRITE;
/*!40000 ALTER TABLE `phongban` DISABLE KEYS */;
/*!40000 ALTER TABLE `phongban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truongphong`
--

DROP TABLE IF EXISTS `truongphong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truongphong` (
  `mapb` varchar(5) NOT NULL,
  `manv` int NOT NULL,
  PRIMARY KEY (`mapb`,`manv`),
  KEY `tp_nv` (`manv`),
  CONSTRAINT `tp_nv` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`),
  CONSTRAINT `tp_pb` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truongphong`
--

LOCK TABLES `truongphong` WRITE;
/*!40000 ALTER TABLE `truongphong` DISABLE KEYS */;
/*!40000 ALTER TABLE `truongphong` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-23 10:20:39
