/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.11-MariaDB : Database - db_datasekolah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_datasekolah` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_datasekolah`;

/*Table structure for table `tb_golongan` */

DROP TABLE IF EXISTS `tb_golongan`;

CREATE TABLE `tb_golongan` (
  `kode_golongan` char(20) NOT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_golongan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_golongan` */

insert  into `tb_golongan`(`kode_golongan`,`pangkat`,`golongan`) values 
('GL01','Kepala Sekolah','1A'),
('GL02','Guru Kelas','1B');

/*Table structure for table `tb_guru` */

DROP TABLE IF EXISTS `tb_guru`;

CREATE TABLE `tb_guru` (
  `nip_guru` char(20) NOT NULL,
  `nama_guru` varchar(100) DEFAULT NULL,
  `tmp_lahir_guru` varchar(100) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `alamat_guru` varchar(100) DEFAULT NULL,
  `telp_guru` varchar(100) DEFAULT NULL,
  `jenkel_guru` varchar(100) DEFAULT NULL,
  `agama_guru` varchar(100) DEFAULT NULL,
  `status_guru` varchar(100) DEFAULT NULL,
  `jabatan_guru` varchar(100) DEFAULT NULL,
  `masa_jabatan_guru` varchar(100) DEFAULT NULL,
  `ren_pensiun_guru` int(11) DEFAULT NULL,
  `nip_lama_guru` varchar(100) DEFAULT NULL,
  `nama_diklat_guru` varchar(100) DEFAULT NULL,
  `thn_diklat_guru` varchar(100) DEFAULT NULL,
  `kode_sekolah_guru` char(20) DEFAULT NULL,
  `kode_jenis_guru` char(20) DEFAULT NULL,
  `tgl_diangkat_guru` date DEFAULT NULL,
  `no_sk_guru` varchar(100) DEFAULT NULL,
  `kode_golongan_guru` char(20) DEFAULT NULL,
  `kode_pegawai_guru` char(20) DEFAULT NULL,
  PRIMARY KEY (`nip_guru`),
  KEY `kode_golongan_guru` (`kode_golongan_guru`),
  KEY `kode_pegawai_guru` (`kode_pegawai_guru`),
  KEY `kode_sekolah_guru` (`kode_sekolah_guru`),
  KEY `kode_jenis_guru` (`kode_jenis_guru`),
  CONSTRAINT `tb_guru_ibfk_1` FOREIGN KEY (`kode_golongan_guru`) REFERENCES `tb_golongan` (`kode_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_guru_ibfk_2` FOREIGN KEY (`kode_pegawai_guru`) REFERENCES `tb_kepegawaian` (`kode_pegawai`),
  CONSTRAINT `tb_guru_ibfk_3` FOREIGN KEY (`kode_sekolah_guru`) REFERENCES `tb_sekolah` (`kode_sekolah`),
  CONSTRAINT `tb_guru_ibfk_4` FOREIGN KEY (`kode_jenis_guru`) REFERENCES `tb_jenisguru` (`kode_matapelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_guru` */

insert  into `tb_guru`(`nip_guru`,`nama_guru`,`tmp_lahir_guru`,`tgl_lahir_guru`,`alamat_guru`,`telp_guru`,`jenkel_guru`,`agama_guru`,`status_guru`,`jabatan_guru`,`masa_jabatan_guru`,`ren_pensiun_guru`,`nip_lama_guru`,`nama_diklat_guru`,`thn_diklat_guru`,`kode_sekolah_guru`,`kode_jenis_guru`,`tgl_diangkat_guru`,`no_sk_guru`,`kode_golongan_guru`,`kode_pegawai_guru`) values 
('NIP01','Rahmat','Padang','2020-05-07','Kataping','081246','L','Islam','PNS','Guru Kelas','8 Tahun',2,'N01','5 Bulan','2002','SKL2','MP01','2020-05-28','SK01','GL02','PG-02'),
('NIP02','Mawar','Solok','2020-05-30','Alahan Panjang','094756','P','Kong Hucu','Kawin','Kepala Sekolah','6 Tahun',4,'N02','7 bulan','2001','SKL1','MP01','2020-05-13','SK02','GL01','PG-01');

/*Table structure for table `tb_jenisguru` */

DROP TABLE IF EXISTS `tb_jenisguru`;

CREATE TABLE `tb_jenisguru` (
  `kode_matapelajaran` char(20) NOT NULL,
  `nama_matapelajaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_matapelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenisguru` */

insert  into `tb_jenisguru`(`kode_matapelajaran`,`nama_matapelajaran`) values 
('MP01','Bahasa Indonesia'),
('MP02','IPA');

/*Table structure for table `tb_kelurahan` */

DROP TABLE IF EXISTS `tb_kelurahan`;

CREATE TABLE `tb_kelurahan` (
  `kode_lurah` char(20) NOT NULL,
  `nama_lurah` varchar(100) DEFAULT NULL,
  `jumlah_sd` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_lurah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelurahan` */

insert  into `tb_kelurahan`(`kode_lurah`,`nama_lurah`,`jumlah_sd`) values 
('LR01','Pauah',4),
('LR02','Katapiang',5);

/*Table structure for table `tb_kepegawaian` */

DROP TABLE IF EXISTS `tb_kepegawaian`;

CREATE TABLE `tb_kepegawaian` (
  `kode_pegawai` char(20) NOT NULL,
  `status_pegawai` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kepegawaian` */

insert  into `tb_kepegawaian`(`kode_pegawai`,`status_pegawai`) values 
('PG-01','PNS'),
('PG-02','Honorer');

/*Table structure for table `tb_pend_guru` */

DROP TABLE IF EXISTS `tb_pend_guru`;

CREATE TABLE `tb_pend_guru` (
  `nip_pend_guru` char(20) DEFAULT NULL,
  `instansi_pend_guru` varchar(100) DEFAULT NULL,
  `prodi_pend_guru` varchar(100) DEFAULT NULL,
  `thn_lulus_pend_guru` varchar(100) DEFAULT NULL,
  KEY `nip_pend_guru` (`nip_pend_guru`),
  CONSTRAINT `tb_pend_guru_ibfk_1` FOREIGN KEY (`nip_pend_guru`) REFERENCES `tb_guru` (`nip_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_pend_guru` */

/*Table structure for table `tb_sekolah` */

DROP TABLE IF EXISTS `tb_sekolah`;

CREATE TABLE `tb_sekolah` (
  `kode_sekolah` char(20) NOT NULL,
  `nama_sekolah` varchar(100) DEFAULT NULL,
  `alamat_sekolah` varchar(100) DEFAULT NULL,
  `telp_sekolah` varchar(100) DEFAULT NULL,
  `jml_guru_honor` int(11) DEFAULT NULL,
  `jml_guru_pns` int(11) DEFAULT NULL,
  `jml_siswa_lk` int(11) DEFAULT NULL,
  `jml_siswa_pr` int(11) DEFAULT NULL,
  `kode_lurah_sekolah` char(20) DEFAULT NULL,
  PRIMARY KEY (`kode_sekolah`),
  KEY `kode_lurah_sekolah` (`kode_lurah_sekolah`),
  CONSTRAINT `tb_sekolah_ibfk_1` FOREIGN KEY (`kode_lurah_sekolah`) REFERENCES `tb_kelurahan` (`kode_lurah`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_sekolah` */

insert  into `tb_sekolah`(`kode_sekolah`,`nama_sekolah`,`alamat_sekolah`,`telp_sekolah`,`jml_guru_honor`,`jml_guru_pns`,`jml_siswa_lk`,`jml_siswa_pr`,`kode_lurah_sekolah`) values 
('SKL1','SDN 01','Padang barat','08123123',5,8,55,45,'LR01'),
('SKL2','SDN 31','Paguah','0845764',3,7,53,33,'LR02');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `username` char(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`username`,`password`) values 
('01','202cb962ac59075b964b07152d234b70');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
