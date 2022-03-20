-- MariaDB dump 10.19  Distrib 10.6.4-MariaDB, for osx10.16 (x86_64)
--
-- Host: localhost    Database: awasin
-- ------------------------------------------------------
-- Server version	10.6.4-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `golongan`
--

DROP TABLE IF EXISTS `golongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_golongan` varchar(100) NOT NULL,
  `jenis_golongan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_golongan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golongan`
--

LOCK TABLES `golongan` WRITE;
/*!40000 ALTER TABLE `golongan` DISABLE KEYS */;
INSERT INTO `golongan` VALUES (1,'Golongan 1','Jenis 1'),(2,'Golongan 2','Jenis 2'),(3,'Golongan 3','Jenis 3'),(4,'mmm','mmm');
/*!40000 ALTER TABLE `golongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `izin`
--

DROP TABLE IF EXISTS `izin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_pemberi_izin` int(11) DEFAULT NULL,
  `tujuan` text NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(100) NOT NULL,
  `sampai` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `long` varchar(100) DEFAULT NULL,
  `status_izin` varchar(100) NOT NULL,
  `waktu_pengajuan` datetime NOT NULL DEFAULT current_timestamp(),
  `status_perjalanan` enum('BERLANGSUNG','SELESAI') DEFAULT NULL,
  PRIMARY KEY (`id_izin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `izin`
--

LOCK TABLES `izin` WRITE;
/*!40000 ALTER TABLE `izin` DISABLE KEYS */;
INSERT INTO `izin` VALUES (1,17,10,'Periksa Kesehatan','2022-03-17','00:25','00:25','Tidak Ada Catatan','11.jpg',NULL,NULL,'Diterima','2022-03-17 00:25:23',NULL),(2,17,9,'Periksa Kesehatan','2022-03-17','01:17','01:18','Tidak Ada Catatan','11.jpg','-3.7984414','114.7793633','Diterima','2022-03-17 01:18:06',NULL),(3,21,10,'Vaksinasi ke puskesmas','2022-03-17','01:37','01:59','Tidak Ada Catatan','11.jpg','-3.7984414','114.7793633','Ditolak','2022-03-17 01:39:58',NULL),(4,21,7,'Pergi memancing','2022-03-17','01:39','01:39',NULL,'11.jpg','-3.7984414','114.7793633','Selesai','2022-03-17 01:39:58','SELESAI'),(5,21,7,'Perjalanan Dinas ke Mars','2022-03-17','01:39','01:39',NULL,'11.jpg','-3.7984414','114.7793633','Selesai','2022-03-17 01:39:58','SELESAI'),(6,21,7,'Belajar diperpustakaan','2022-03-17','01:39','01:39',NULL,'11.jpg','-3.7984414','114.7793633','Selesai','2022-03-17 01:39:58','SELESAI'),(7,21,7,'Family Gathering','2022-03-17','01:39','01:39',NULL,'11.jpg','-3.7984414','114.7793633','Ditolak','2022-03-17 01:39:58',NULL);
/*!40000 ALTER TABLE `izin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jabatan` varchar(5) DEFAULT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'KD01','Ketua Pengadilan Negeri Cikarang Kelas II'),(2,'KD01','Wakil Ketua Pengadilan Negeri Cikarang Kelas II'),(3,'KD02','Sekretaris'),(4,'KD02','Panitera'),(5,'KD03','Pegawai');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lokasi`
--

DROP TABLE IF EXISTS `lokasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_izin` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `long` double DEFAULT NULL,
  `waktu` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB AUTO_INCREMENT=342 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lokasi`
--

LOCK TABLES `lokasi` WRITE;
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
INSERT INTO `lokasi` VALUES (100,3,-3.7981214,114.7493633,'2022-03-19 23:11:16'),(101,3,-3.7984314,114.7713633,'2022-03-19 23:11:18'),(102,3,-3.7982323,114.7732333,'2022-03-19 23:11:20'),(103,3,-3.734414,114.773333633,'2022-03-19 23:11:22'),(230,4,-3.762632,114.779401,'2022-03-20 15:01:13'),(231,4,-3.762636,114.7794037,'2022-03-20 15:01:22'),(232,4,-3.7626367,114.7794042,'2022-03-20 15:01:33'),(233,4,-3.7626327,114.779402,'2022-03-20 15:01:43'),(334,6,-3.7626387,114.7794048,'2022-03-20 16:12:09'),(335,6,-3.7626373,114.7794043,'2022-03-20 16:12:19'),(336,6,-3.762637,114.7794042,'2022-03-20 16:12:29'),(337,6,-3.7626377,114.7794046,'2022-03-20 16:12:39'),(338,6,-3.7626375,114.7794045,'2022-03-20 16:12:49'),(339,6,-3.762637,114.7794042,'2022-03-20 16:12:59'),(340,6,-3.7626372,114.7794043,'2022-03-20 16:13:09'),(341,6,-3.7626381,114.7794048,'2022-03-20 16:13:19');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` text NOT NULL,
  `no_hp` text NOT NULL,
  `keterangan_pegawai` varchar(50) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (7,1,3,'19790528 200212 1 00','Eddy Daulatta Sembiring, Sh., Mh.','Laki-laki','Banjarmasin','2022-03-15','123','Aktif','123',NULL,NULL),(8,1,2,'19800410 200212 2 00','Asyrotun Mugiastuti, Sh.,Mh.','Perempuan','Banjarmasin','2022-03-15','111','Aktif','111',NULL,NULL),(9,1,1,'19650929 199003 1 00','Eddy Wiyono, Sh.,Mh.','Laki-laki','Banjarmasin','2022-03-15','11','Aktif','11',NULL,NULL),(10,1,4,'198204192002122001','Nurma Saofiane, Sh.','Perempuan','Banjarmasin','2022-03-15','111','Aktif','111',NULL,NULL),(17,1,5,'22','Muhammad Syahbani Adiguna','Laki-laki','Banjarmasin','1996-11-23','Kurau','Aktif','111',NULL,'111'),(21,1,5,'33','Syahbani Adiguna','Laki-laki','Banjarmasin','2022-03-17','Jln. Bina Bersama','Aktif','6285245462942',NULL,'Pengadilan Negeri Cikarang Kelas II');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pemberi_izin`
--

DROP TABLE IF EXISTS `pemberi_izin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pemberi_izin` (
  `id_pemberi_izin` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(100) NOT NULL,
  `status_izin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pemberi_izin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pemberi_izin`
--

LOCK TABLES `pemberi_izin` WRITE;
/*!40000 ALTER TABLE `pemberi_izin` DISABLE KEYS */;
INSERT INTO `pemberi_izin` VALUES (1,'7','Aktif'),(2,'8','Aktif'),(3,'9','Aktif'),(4,'10','Aktif'),(5,'15','Aktif'),(6,'16','Non Aktif');
/*!40000 ALTER TABLE `pemberi_izin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) DEFAULT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `foto_pengguna` varchar(100) NOT NULL,
  `token` text DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES (1,NULL,'Adiguna','1','c4ca4238a0b923820dcc509a6f75849b','Admin','1043605.jpg','f719565fa2a3d99dacf8a7d9768935db'),(6,7,'Eddy Daulatta Sembiring, Sh., Mh.','19790528 200212 1 001','cf9f88d6891e31c26034c5a49375cbdc','Pemberi Izin','default.png',NULL),(7,8,'Asyrotun Mugiastuti, Sh.,Mh.','19800410 200212 2 002','46e7e16bc1d16ec06696557bc7cc8677','Pemberi Izin','11.jpg',NULL),(8,9,'Eddy Wiyono, Sh.,Mh.','19650929 199003 1 001','68a9bbf5b988a3156ebb248aa58dd43b','Pemberi Izin','default.png',NULL),(9,10,'Nurma Saofiane, Sh.','198204192002122001','e73759aeb8335e010d1013069def6727','Pemberi Izin','11.jpg',NULL),(10,17,'Muhammad Syahbani Adiguna','22','b6d767d2f8ed5d21a44b0e5886680cb9','Pegawai','default.png',NULL),(14,21,'Syahbani Adiguna','33','21232f297a57a5a743894a0e4a801fc3','Pegawai','default.png','2361f3e30a5ba4db74e5a046d6187852');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-20 16:16:53
