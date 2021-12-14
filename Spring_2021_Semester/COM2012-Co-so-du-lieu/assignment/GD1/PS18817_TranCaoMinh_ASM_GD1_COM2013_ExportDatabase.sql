-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ps18817_trancaominh_asm_gd1_com2013
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
-- Table structure for table `loaisach`
--

DROP TABLE IF EXISTS `loaisach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loaisach` (
  `maloai` varchar(5) NOT NULL,
  `tenloai` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaisach`
--

LOCK TABLES `loaisach` WRITE;
/*!40000 ALTER TABLE `loaisach` DISABLE KEYS */;
INSERT INTO `loaisach` VALUES ('loai1','Van hoc'),('loai2','Thieu nhi'),('loai3','Kinh te'),('loai4','Ky nang song'),('loai5','Giao duc');
/*!40000 ALTER TABLE `loaisach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lop` (
  `malop` varchar(5) NOT NULL,
  `tenlop` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`malop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lop`
--

LOCK TABLES `lop` WRITE;
/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
INSERT INTO `lop` VALUES ('lop01','WD16306'),('lop02','UD16307'),('lop03','LT16308'),('lop04','DH16309');
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phieumuon`
--

DROP TABLE IF EXISTS `phieumuon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phieumuon` (
  `sophieu` int NOT NULL AUTO_INCREMENT,
  `ngaymuon` date DEFAULT NULL,
  `ngaytra` date DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `masach` varchar(5) DEFAULT NULL,
  `masv` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`sophieu`),
  KEY `pm_s` (`masach`),
  KEY `pm_tsv` (`masv`),
  CONSTRAINT `pm_s` FOREIGN KEY (`masach`) REFERENCES `sach` (`masach`),
  CONSTRAINT `pm_tsv` FOREIGN KEY (`masv`) REFERENCES `thesinhvien` (`masv`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phieumuon`
--

LOCK TABLES `phieumuon` WRITE;
/*!40000 ALTER TABLE `phieumuon` DISABLE KEYS */;
INSERT INTO `phieumuon` VALUES (1,'2021-02-15','2021-02-18','Tra dung han',1,'s08','sv02'),(2,'2021-02-16','2021-02-19','Tra dung han',1,'s09','sv04'),(3,'2021-02-15','2021-02-17','Tra dung han',1,'s01','sv05'),(4,'2021-02-14','2021-02-20','Tra muon',1,'s02','sv05'),(5,'2021-02-15','2021-02-16','Tra dung han',1,'s05','sv07'),(6,'2021-02-14','2021-02-15','Tra dung han',1,'s05','sv09'),(7,'2021-02-16','2021-02-18','Tra dung han',1,'s04','sv12'),(8,'2021-02-16','2021-02-22','Tra muon',1,'s03','sv11'),(9,'2021-02-16','2021-02-19','Tra dung han',1,'s10','sv05'),(10,'2021-02-14','2021-02-17','Tra dung han',1,'s10','sv01'),(11,'2021-02-15','2021-02-17','Tra dung han',1,'s07','sv03'),(12,'2021-02-14','2021-02-19','Tra muon',1,'s06','sv10');
/*!40000 ALTER TABLE `phieumuon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sach`
--

DROP TABLE IF EXISTS `sach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sach` (
  `masach` varchar(5) NOT NULL,
  `tensach` varchar(255) DEFAULT NULL,
  `nhaxuatban` varchar(255) DEFAULT NULL,
  `tacgia` varchar(255) DEFAULT NULL,
  `sotrang` int DEFAULT NULL,
  `sobansao` int DEFAULT NULL,
  `gia` varchar(255) DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `vitri` varchar(255) DEFAULT NULL,
  `maloai` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`masach`),
  KEY `s_ls` (`maloai`),
  CONSTRAINT `s_ls` FOREIGN KEY (`maloai`) REFERENCES `loaisach` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sach`
--

LOCK TABLES `sach` WRITE;
/*!40000 ALTER TABLE `sach` DISABLE KEYS */;
INSERT INTO `sach` VALUES ('s01','Mat biec','NXB Tre','Nguyen Nhat Anh',300,2,'88.000 VND','2013-05-19','Ke 01','loai1'),('s02','Dao mong mo','NXB Tre','Nguyen Nhat Anh',254,1,'39.000 VND','2012-09-29','Ke 02','loai1'),('s03','De men phieu luu ky','NXB Kim Dong','To Hoai',48,3,'54.000 VND','2015-12-10','Ke 01','loai2'),('s04','Phu thuy xu OZ','NXB Lao Dong','Frank Baum',386,1,'95.200 VND','2011-10-16','Ke 04','loai2'),('s05','Tai chinh doanh nghiep','NXB Kinh Te','Westerfield Jafee',1095,0,'659.000 VND','2014-01-25','Ke 02','loai3'),('s06','Khoi nghiep tinh gon','NXB Tong Hop','Eric Ries',335,0,'116.000 VND','2012-08-14','Ke 03','loai3'),('s07','Dac nhan tam','NXB Tong Hop','Dale Carnegie',320,1,'59.280 VND','2011-12-01','Ke 03','loai4'),('s08','Tuoi tre dang gia bao nhieu','NXB Hoi Nha Van','Rosie Nguyen',292,2,'66.400 VND','2013-02-14','Ke 01','loai4'),('s09','Giao duc gioi tinh','NXB Phu Nu','Moon Ju-Yeong',34,1,'35.000 VND','2011-06-17','Ke 04','loai5'),('s10','Vo cung tan nhan, vo cung yeu thuong','NXB Dan Tri','Sara Imas',420,0,'131.820 VND','2015-02-21','Ke 04','loai5');
/*!40000 ALTER TABLE `sach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesinhvien`
--

DROP TABLE IF EXISTS `thesinhvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thesinhvien` (
  `masv` varchar(5) NOT NULL,
  `tensv` varchar(255) DEFAULT NULL,
  `ngayhethan` date DEFAULT NULL,
  `chuyennganh` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `malop` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`masv`),
  KEY `tsv_l` (`malop`),
  CONSTRAINT `tsv_l` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesinhvien`
--

LOCK TABLES `thesinhvien` WRITE;
/*!40000 ALTER TABLE `thesinhvien` DISABLE KEYS */;
INSERT INTO `thesinhvien` VALUES ('sv01','Tran Cao Minh','2022-12-25','Thiet ke trang web','minhtc@gmail.com','0332340012','lop01'),('sv02','Nguyen Si Vuong','2022-06-25','Thiet ke trang web','vuongns@gmail.com','0938554624','lop01'),('sv03','Truong Vinh Nghi','2022-07-12','Thiet ke trang web','nghivt@gmail.com','0162895447','lop01'),('sv04','Ho Thanh Dat','2022-04-27','Ung dung phan mem','datht@gmail.com','033564235','lop02'),('sv05','Nguyen Thanh Trung','2022-09-02','Ung dung phan mem','trungnt@gmail.com','0956457855','lop02'),('sv06','Nguyen Phuong Tin','2022-10-14','Ung dung phan mem','tinnp@gmail.com','0937232139','lop02'),('sv07','Nguyen Huu Tu','2022-12-09','Lap trinh may tinh','tunh@gmail.com','035658985','lop03'),('sv08','Nguyen Quang Vu','2022-01-22','Lap trinh may tinh','vunq@gmail.com','0165248597','lop03'),('sv09','Trinh Dinh Dat','2022-08-17','Lap trinh may tinh','dattd@gmail.com','0935269987','lop03'),('sv10','Le Thanh Tu','2022-03-23','Thiet ke do hoa','tult@gmail.com','0165549321','lop04'),('sv11','Le Minh Khang','2022-04-16','Thiet ke do hoa','khangml@gmail.com','033256894','lop04'),('sv12','Nguyen Trung Kien','2022-07-28','Thiet ke do hoa','kiennt@gmail.com','035479236','lop04');
/*!40000 ALTER TABLE `thesinhvien` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-31 13:23:01
