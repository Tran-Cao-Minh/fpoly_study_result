-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: ps18817_qlbds_lab3
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
  `maBDS` varchar(5) DEFAULT NULL,
  `diaChiBDS` varchar(255) DEFAULT NULL,
  `maVP` varchar(5) DEFAULT NULL,
  `maCSH` varchar(5) DEFAULT NULL,
  KEY `bds_vp` (`maVP`),
  KEY `bds_csh` (`maCSH`),
  CONSTRAINT `bds_csh` FOREIGN KEY (`maCSH`) REFERENCES `chusohuu` (`maCSH`),
  CONSTRAINT `bds_vp` FOREIGN KEY (`maVP`) REFERENCES `vanphong` (`maVP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batdongsan`
--

LOCK TABLES `batdongsan` WRITE;
/*!40000 ALTER TABLE `batdongsan` DISABLE KEYS */;
/*!40000 ALTER TABLE `batdongsan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chusohuu`
--

DROP TABLE IF EXISTS `chusohuu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chusohuu` (
  `maCSH` varchar(5) NOT NULL,
  `hoCSH` varchar(255) DEFAULT NULL,
  `tenCSH` varchar(15) DEFAULT NULL,
  `diaChiCSH` varchar(255) DEFAULT NULL,
  `sdtCSH` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`maCSH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chusohuu`
--

LOCK TABLES `chusohuu` WRITE;
/*!40000 ALTER TABLE `chusohuu` DISABLE KEYS */;
/*!40000 ALTER TABLE `chusohuu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhanvien` (
  `maNV` int NOT NULL AUTO_INCREMENT,
  `hoNV` varchar(255) DEFAULT NULL,
  `tenNV` varchar(15) DEFAULT NULL,
  `maVP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`maNV`),
  KEY `nv_vp` (`maVP`),
  CONSTRAINT `nv_vp` FOREIGN KEY (`maVP`) REFERENCES `vanphong` (`maVP`)
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
-- Table structure for table `thannhan`
--

DROP TABLE IF EXISTS `thannhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thannhan` (
  `maTN` varchar(5) NOT NULL,
  `hoTN` varchar(255) DEFAULT NULL,
  `tenTN` varchar(15) DEFAULT NULL,
  `ngaySinhTN` date DEFAULT NULL,
  `moiLienHe` varchar(255) DEFAULT NULL,
  `maNV` int DEFAULT NULL,
  PRIMARY KEY (`maTN`),
  KEY `tn_nv` (`maNV`),
  CONSTRAINT `tn_nv` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thannhan`
--

LOCK TABLES `thannhan` WRITE;
/*!40000 ALTER TABLE `thannhan` DISABLE KEYS */;
/*!40000 ALTER TABLE `thannhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truongphong`
--

DROP TABLE IF EXISTS `truongphong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truongphong` (
  `maNV` int NOT NULL,
  `maVP` varchar(5) NOT NULL,
  PRIMARY KEY (`maNV`,`maVP`),
  KEY `tp_vp` (`maVP`),
  CONSTRAINT `tp_nv` FOREIGN KEY (`maNV`) REFERENCES `nhanvien` (`maNV`),
  CONSTRAINT `tp_vp` FOREIGN KEY (`maVP`) REFERENCES `vanphong` (`maVP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truongphong`
--

LOCK TABLES `truongphong` WRITE;
/*!40000 ALTER TABLE `truongphong` DISABLE KEYS */;
/*!40000 ALTER TABLE `truongphong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vanphong`
--

DROP TABLE IF EXISTS `vanphong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vanphong` (
  `maVP` varchar(5) NOT NULL,
  `diaDiemVP` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`maVP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vanphong`
--

LOCK TABLES `vanphong` WRITE;
/*!40000 ALTER TABLE `vanphong` DISABLE KEYS */;
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

-- Dump completed on 2021-03-24 20:24:38
