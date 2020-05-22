/*
SQLyog Enterprise v12.09 (32 bit)
MySQL - 10.4.6-MariaDB : Database - db_datasekolah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tb_golongan` */

CREATE TABLE `tb_golongan` (
  `kode_golongan` char(20) NOT NULL,
  `pangkat` varchar(100) DEFAULT NULL,
  `golongan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_golongan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_guru` */

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

/*Table structure for table `tb_jenisguru` */

CREATE TABLE `tb_jenisguru` (
  `kode_matapelajaran` char(20) NOT NULL,
  `nama_matapelajaran` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_matapelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kelurahan` */

CREATE TABLE `tb_kelurahan` (
  `kode_lurah` char(20) NOT NULL,
  `nama_lurah` varchar(100) DEFAULT NULL,
  `jumlah_sd` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_lurah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_kepegawaian` */

CREATE TABLE `tb_kepegawaian` (
  `kode_pegawai` char(20) NOT NULL,
  `status_pegawai` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_pend_guru` */

CREATE TABLE `tb_pend_guru` (
  `nip_pend_guru` char(20) DEFAULT NULL,
  `instansi_pend_guru` varchar(100) DEFAULT NULL,
  `prodi_pend_guru` varchar(100) DEFAULT NULL,
  `thn_lulus_pend_guru` varchar(100) DEFAULT NULL,
  KEY `nip_pend_guru` (`nip_pend_guru`),
  CONSTRAINT `tb_pend_guru_ibfk_1` FOREIGN KEY (`nip_pend_guru`) REFERENCES `tb_guru` (`nip_guru`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tb_sekolah` */

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

/*Table structure for table `tb_user` */

CREATE TABLE `tb_user` (
  `username` char(20) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
