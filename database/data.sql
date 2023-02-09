/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.27 : Database - unibookstore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`unibookstore` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `unibookstore`;

/*Table structure for table `buku` */

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id_buku` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_penerbit` varchar(4) NOT NULL,
  `kategori` enum('Bisnis','Keilmuan','Novel') CHARACTER SET dec8 NOT NULL,
  `nama_buku` varchar(191) CHARACTER SET dec8 NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `penerbit_buku` (`id_penerbit`),
  CONSTRAINT `penerbit_buku` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `buku` */

insert  into `buku`(`id_buku`,`id_penerbit`,`kategori`,`nama_buku`,`harga`,`stok`) values 
('B1001','SP01','Bisnis','Bisnis Online',75000,9),
('B1002','SP01','Bisnis','Etika Bisnis dan Tanggung Jawab Sosial',67500,20),
('K1001','SP01','Keilmuan','Analisis & Perancangan Sistem Informasi',50000,60),
('K1002','SP01','Keilmuan','Artificial Intelligence',45000,60),
('K2003','SP01','Keilmuan','Autocad 3 Dimensi',40000,25),
('K3004','SP01','Keilmuan','Cloud Computing Technology',85000,15),
('N1001','SP02','Novel','Cahaya Di Penjuru Hati',68000,10),
('N1002','SP03','Novel','Aku Ingin Cerita',48000,12),
('N1003','SP03','Novel','Nanti Kita Cerita Tentang Hari Ini',95000,20);

/*Table structure for table `penerbit` */

DROP TABLE IF EXISTS `penerbit`;

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `kota` varchar(191) NOT NULL,
  `telepon` varchar(191) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `penerbit` */

insert  into `penerbit`(`id_penerbit`,`nama`,`alamat`,`kota`,`telepon`) values 
('SP01','Penerbit Informatika','Jl. Buah Batu No. 121','Bandung','0813-2220-1946'),
('SP02','Andi Offset','Jl. Suryalaya IX No.3','Bandung','0878-3903-0688'),
('SP03','Danendra','Jl Moch. Toha 44','Bandung','022-5201215');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
