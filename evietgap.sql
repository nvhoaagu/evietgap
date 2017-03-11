-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for evietgap
DROP DATABASE IF EXISTS `evietgap`;
CREATE DATABASE IF NOT EXISTS `evietgap` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `evietgap`;

-- Dumping structure for table evietgap.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `idTaiKhoan` int(11) NOT NULL,
  `HoTen` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DonVi` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.aonuoi
DROP TABLE IF EXISTS `aonuoi`;
CREATE TABLE IF NOT EXISTS `aonuoi` (
  `id` int(11) NOT NULL,
  `MaAo` varchar(255) NOT NULL,
  `DienTichAo` int(11) DEFAULT NULL,
  `ToaDo` varchar(100) DEFAULT NULL,
  `LoaiAo` varchar(100) DEFAULT 'Ao nuôi',
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCoSoSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idCoSoSanXuat`),
  KEY `fk_AoNuoi_cososanxuat1_idx` (`idCoSoSanXuat`),
  CONSTRAINT `fk_AoNuoi_cososanxuat1` FOREIGN KEY (`idCoSoSanXuat`) REFERENCES `cososanxuat` (`idCoSoSanXuat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cachxulytomchet
DROP TABLE IF EXISTS `cachxulytomchet`;
CREATE TABLE IF NOT EXISTS `cachxulytomchet` (
  `idCachXuLyTomChet` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCachXuLyTomChet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.chucnang
DROP TABLE IF EXISTS `chucnang`;
CREATE TABLE IF NOT EXISTS `chucnang` (
  `idChucNang` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idParentChucNang` int(11) DEFAULT NULL,
  `idLoaiTaiKhoan` int(11) DEFAULT NULL,
  PRIMARY KEY (`idChucNang`),
  KEY `idChucNang` (`idChucNang`) USING BTREE,
  KEY `idParentChucNang` (`idParentChucNang`) USING BTREE,
  KEY `fk_ChucNang_LoaiTaiKhoan1_idx` (`idLoaiTaiKhoan`),
  CONSTRAINT `fk_ChucNang_LoaiTaiKhoan1` FOREIGN KEY (`idLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`idLoaiTaiKhoan`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.code_list
DROP TABLE IF EXISTS `code_list`;
CREATE TABLE IF NOT EXISTS `code_list` (
  `idCode` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(20) NOT NULL,
  `idNhatKyThuHoach` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  `idCoSoSanXuat` int(11) NOT NULL,
  `idCoSoThuMua` int(11) NOT NULL,
  `idCoSoGiong` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `lock` tinyint(4) DEFAULT '0',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cosogiong
DROP TABLE IF EXISTS `cosogiong`;
CREATE TABLE IF NOT EXISTS `cosogiong` (
  `idCoSoGiong` int(11) NOT NULL AUTO_INCREMENT,
  `TenCoSo` varchar(45) DEFAULT NULL,
  `MaSoKinhDoanh` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCoSoGiong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cososanxuat
DROP TABLE IF EXISTS `cososanxuat`;
CREATE TABLE IF NOT EXISTS `cososanxuat` (
  `idCoSoSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `idTaiKhoan` int(11) NOT NULL,
  `MaSoVietGap` varchar(20) DEFAULT NULL,
  `TenCoSoSanXuat` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idCoSoSanXuat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cosothumua
DROP TABLE IF EXISTS `cosothumua`;
CREATE TABLE IF NOT EXISTS `cosothumua` (
  `idCoSoThuMua` int(11) NOT NULL AUTO_INCREMENT,
  `TenCoSo` varchar(45) NOT NULL,
  `MaSoThue` varchar(45) DEFAULT NULL,
  `DienThoai` varchar(45) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `NguoiDaiDien` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCoSoThuMua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.danhmucracthai
DROP TABLE IF EXISTS `danhmucracthai`;
CREATE TABLE IF NOT EXISTS `danhmucracthai` (
  `idDanhMucRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDanhMucRacThai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.dauhieu
DROP TABLE IF EXISTS `dauhieu`;
CREATE TABLE IF NOT EXISTS `dauhieu` (
  `idDauHieu` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDauHieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.donvitinh
DROP TABLE IF EXISTS `donvitinh`;
CREATE TABLE IF NOT EXISTS `donvitinh` (
  `idDonViTinh` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDonViTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.donvixulyvatlieuquahan
DROP TABLE IF EXISTS `donvixulyvatlieuquahan`;
CREATE TABLE IF NOT EXISTS `donvixulyvatlieuquahan` (
  `idDonViXuLyVatLieuQuaHan` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) DEFAULT NULL,
  `DiaChi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDonViXuLyVatLieuQuaHan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.hoachatkhangsinhcam
DROP TABLE IF EXISTS `hoachatkhangsinhcam`;
CREATE TABLE IF NOT EXISTS `hoachatkhangsinhcam` (
  `id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `CamSuDung` tinyint(4) DEFAULT '1',
  `HanCheSuDung` tinyint(4) DEFAULT '0',
  `DuLuongToiDa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.hoachatkhangsinhsudung
DROP TABLE IF EXISTS `hoachatkhangsinhsudung`;
CREATE TABLE IF NOT EXISTS `hoachatkhangsinhsudung` (
  `id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `DuLuongToiDa` varchar(255) DEFAULT NULL,
  `CongDung` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.kythuatvien
DROP TABLE IF EXISTS `kythuatvien`;
CREATE TABLE IF NOT EXISTS `kythuatvien` (
  `idKyThuatVien` int(11) NOT NULL AUTO_INCREMENT,
  `idTaiKhoan` int(11) NOT NULL,
  `HoTen` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `DonVi` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idKyThuatVien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.loaimucdichsudungthuoc
DROP TABLE IF EXISTS `loaimucdichsudungthuoc`;
CREATE TABLE IF NOT EXISTS `loaimucdichsudungthuoc` (
  `idLoaiMucDichSuDungThuoc` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idLoaiMucDichSuDungThuoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.loaitaikhoan
DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE IF NOT EXISTS `loaitaikhoan` (
  `idLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `active` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idLoaiTaiKhoan`),
  KEY `idLoaiTaiKhoan` (`idLoaiTaiKhoan`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.loaithucan
DROP TABLE IF EXISTS `loaithucan`;
CREATE TABLE IF NOT EXISTS `loaithucan` (
  `idLoaiThucAn` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idLoaiThucAn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nguyennhan
DROP TABLE IF EXISTS `nguyennhan`;
CREATE TABLE IF NOT EXISTS `nguyennhan` (
  `idNguyenNhan` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNguyenNhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhancong
DROP TABLE IF EXISTS `nhancong`;
CREATE TABLE IF NOT EXISTS `nhancong` (
  `idNhanCong` int(11) NOT NULL AUTO_INCREMENT,
  `idTaiKhoan` int(11) NOT NULL,
  `HoTen` varchar(100) DEFAULT NULL,
  `DienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `DonVi` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNhanCong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkycaitaoao
DROP TABLE IF EXISTS `nhatkycaitaoao`;
CREATE TABLE IF NOT EXISTS `nhatkycaitaoao` (
  `idNhatKyCaiTaoAo` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL,
  `PhuongPhapCaiTao` varchar(255) NOT NULL,
  `TayTrung` varchar(255) NOT NULL,
  `BunThai` varchar(255) NOT NULL,
  `ThoiGianCaiTao` int(11) NOT NULL,
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) DEFAULT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyCaiTaoAo`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkycaitaoao_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkycaitaoao_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkychoan
DROP TABLE IF EXISTS `nhatkychoan`;
CREATE TABLE IF NOT EXISTS `nhatkychoan` (
  `idNhatKyChoAn` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL,
  `TenThucAn` varchar(255) NOT NULL,
  `MaSoLo` varchar(255) NOT NULL,
  `Loai` varchar(255) NOT NULL,
  `TongLuong` int(11) NOT NULL,
  `Lan1` float NOT NULL DEFAULT '0',
  `Lan2` float NOT NULL DEFAULT '0',
  `Lan3` float NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyChoAn`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkygiaiquyetcongdong
DROP TABLE IF EXISTS `nhatkygiaiquyetcongdong`;
CREATE TABLE IF NOT EXISTS `nhatkygiaiquyetcongdong` (
  `idNhatKyGiaiQuyetCongDong` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKhieuNai` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NguoiKhieuNai` varchar(255) DEFAULT NULL,
  `NoiDungKhieuNai` varchar(255) DEFAULT NULL,
  `NgayGiaiQuyet` datetime DEFAULT CURRENT_TIMESTAMP,
  `NguoiGiaiQuyet` varchar(255) DEFAULT NULL,
  `CachGiaiQuyet` varchar(255) DEFAULT NULL,
  `KetQua` varchar(45) DEFAULT NULL,
  `DaiDienChinhQuyen` varchar(45) DEFAULT NULL,
  `DonViDaiDien` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyGiaiQuyetCongDong`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkykiemke
DROP TABLE IF EXISTS `nhatkykiemke`;
CREATE TABLE IF NOT EXISTS `nhatkykiemke` (
  `idNhatKyKiemKe` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKiemKe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SoLuongNhap` int(11) NOT NULL DEFAULT '0',
  `MaSoLo` varchar(255) DEFAULT NULL,
  `HanSuDung` datetime DEFAULT NULL,
  `ThoiGianXuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TonTruocKhiXuat` float NOT NULL DEFAULT '0',
  `SoLuongXuat` tinyint(4) NOT NULL DEFAULT '0',
  `Ton` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyKiemKe`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkykiemkehethan
DROP TABLE IF EXISTS `nhatkykiemkehethan`;
CREATE TABLE IF NOT EXISTS `nhatkykiemkehethan` (
  `idNhatKyKiemKeHetHan` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKiemKe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `NguyenNhan` varchar(45) DEFAULT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SoLuongNhap` int(11) NOT NULL DEFAULT '0',
  `MaSoLo` varchar(255) DEFAULT NULL,
  `HanSuDung` datetime DEFAULT NULL,
  `BienPhapXuLy` varchar(255) DEFAULT NULL,
  `SoLuongXuLy` int(11) NOT NULL DEFAULT '0',
  `Ton` int(11) NOT NULL DEFAULT '0',
  `NguoiThucHien` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyKiemKeHetHan`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkynhapkho
DROP TABLE IF EXISTS `nhatkynhapkho`;
CREATE TABLE IF NOT EXISTS `nhatkynhapkho` (
  `idNhatKyNhapKho` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL,
  `Loai` varchar(255) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `HanSuDung` datetime NOT NULL,
  `MaSoLo` varchar(20) DEFAULT NULL,
  `NhaSanXuat` varchar(255) DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyNhapKho`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkysuckhoe
DROP TABLE IF EXISTS `nhatkysuckhoe`;
CREATE TABLE IF NOT EXISTS `nhatkysuckhoe` (
  `idNhatKySucKhoe` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DauHieu` varchar(255) DEFAULT NULL,
  `NguyenNhan` varchar(255) DEFAULT NULL,
  `SoLuongBenh` int(11) NOT NULL DEFAULT '0',
  `SoLuongChet` int(11) DEFAULT '0',
  `PhuongPhapXuLy` varchar(255) DEFAULT NULL,
  `CachXuLyTomChet` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKySucKhoe`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkysudungthuoc
DROP TABLE IF EXISTS `nhatkysudungthuoc`;
CREATE TABLE IF NOT EXISTS `nhatkysudungthuoc` (
  `idNhatKySuDungThuoc` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `MaSoLo` varchar(255) NOT NULL,
  `LieuLuong` varchar(255) NOT NULL,
  `MucDich` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKySuDungThuoc`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkytangtruong
DROP TABLE IF EXISTS `nhatkytangtruong`;
CREATE TABLE IF NOT EXISTS `nhatkytangtruong` (
  `idNhatKyTangTruong` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `KhoiLuongTrungBinh` float DEFAULT '2',
  `TiLeSong` float DEFAULT '100',
  `TongKhoiLuongUocTinh` float NOT NULL DEFAULT '30',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyTangTruong`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkythagiong
DROP TABLE IF EXISTS `nhatkythagiong`;
CREATE TABLE IF NOT EXISTS `nhatkythagiong` (
  `idNhatKyThaGiong` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL,
  `DienTichTha` int(11) NOT NULL,
  `MatDo` int(11) NOT NULL,
  `KichCo` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `CoSoGiong` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyThaGiong`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkythagiong_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkythagiong_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkytheodoimoitruong
DROP TABLE IF EXISTS `nhatkytheodoimoitruong`;
CREATE TABLE IF NOT EXISTS `nhatkytheodoimoitruong` (
  `idTheoDoiMoiTruong` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NguoiKiemTra` varchar(255) DEFAULT NULL,
  `PH` float DEFAULT '7',
  `NhietDo` int(11) NOT NULL DEFAULT '30',
  `DO` int(11) DEFAULT '3',
  `KetQua` varchar(255) DEFAULT 'Tốt',
  `CachXuLy` varchar(255) DEFAULT 'Không',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idTheoDoiMoiTruong`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkytheodoinuoccap
DROP TABLE IF EXISTS `nhatkytheodoinuoccap`;
CREATE TABLE IF NOT EXISTS `nhatkytheodoinuoccap` (
  `idTheoDoiNuocCap` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LuongNuocLayVao` int(11) DEFAULT '1000',
  `NguoiTheoDoi` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idTheoDoiNuocCap`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkytheodoinuocthai
DROP TABLE IF EXISTS `nhatkytheodoinuocthai`;
CREATE TABLE IF NOT EXISTS `nhatkytheodoinuocthai` (
  `idNhatKyTheoDoiNuocThai` int(11) NOT NULL AUTO_INCREMENT,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NguoiKiemTra` varchar(255) DEFAULT NULL,
  `PH` float DEFAULT '7',
  `NhietDo` float NOT NULL DEFAULT '29',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `DO` int(11) DEFAULT '3',
  `KetQua` varchar(45) DEFAULT 'Tốt',
  `CachXuLy` varchar(45) DEFAULT 'Không',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyTheoDoiNuocThai`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkythugomracthai
DROP TABLE IF EXISTS `nhatkythugomracthai`;
CREATE TABLE IF NOT EXISTS `nhatkythugomracthai` (
  `idNhatKyThuGomRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `SoLuong` float NOT NULL DEFAULT '0',
  `PhuongPhapThuGom` varchar(255) NOT NULL DEFAULT 'Gom bỏ vào thùng chứa vỏ thuốc hóa chất',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyThuGomRacThai`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkythuhoach
DROP TABLE IF EXISTS `nhatkythuhoach`;
CREATE TABLE IF NOT EXISTS `nhatkythuhoach` (
  `idNhatKyThuHoach` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SanLuong` int(11) DEFAULT '0',
  `KichCo` float NOT NULL DEFAULT '0',
  `PhuongTienVanChuyen` varchar(255) NOT NULL DEFAULT 'Xe',
  `PhuongPhapThuHoach` varchar(255) DEFAULT NULL,
  `TinhTrangDungCuVeSinh` varchar(255) DEFAULT 'Sạch sẽ',
  `TinhTrangVeSinhCongNhan` varchar(255) NOT NULL DEFAULT 'Sạch sẽ',
  `CoSoThuMua` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyThuHoach`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkyxulydongvatgayhai
DROP TABLE IF EXISTS `nhatkyxulydongvatgayhai`;
CREATE TABLE IF NOT EXISTS `nhatkyxulydongvatgayhai` (
  `idNhatKyXuLyDongVatGayHai` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TenDongVat` varchar(255) DEFAULT NULL,
  `SoLuong` float NOT NULL DEFAULT '0',
  `PhuongPhapThuGom` varchar(255) NOT NULL DEFAULT 'Gom bỏ vào thùng chứa vỏ thuốc hóa chất',
  `ThuocDang` varchar(45) DEFAULT 'Gây hại',
  `NguyenNhan` varchar(45) DEFAULT 'Mắt bẩy chuột',
  `PhuongPhapXuLy` varchar(45) DEFAULT 'Giết chết, chôn, rải vôi',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyXuLyDongVatGayHai`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkyxulykiemkehethan
DROP TABLE IF EXISTS `nhatkyxulykiemkehethan`;
CREATE TABLE IF NOT EXISTS `nhatkyxulykiemkehethan` (
  `idNhatKyXuLyKiemKeHetHan` int(11) NOT NULL AUTO_INCREMENT,
  `NgayKiemKe` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `NguyenNhan` varchar(255) DEFAULT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SoLuongNhap` int(11) DEFAULT NULL,
  `MaSoLo` varchar(255) DEFAULT NULL,
  `HanSuDung` datetime DEFAULT NULL,
  `BienPhapXuLy` varchar(45) DEFAULT NULL,
  `SoLuongXuLy` int(11) DEFAULT NULL,
  `Ton` int(11) DEFAULT NULL,
  `NguoiKiemKe` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyXuLyKiemKeHetHan`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkyxulyracthai
DROP TABLE IF EXISTS `nhatkyxulyracthai`;
CREATE TABLE IF NOT EXISTS `nhatkyxulyracthai` (
  `idNhatKyXuLyRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ngay` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `SoLuong` float NOT NULL DEFAULT '0',
  `PhuongPhapThuGom` varchar(255) NOT NULL DEFAULT 'Gom bỏ vào thùng chứa vỏ thuốc hóa chất',
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyXuLyRacThai`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.nhatkyxulythucanthuocquahan
DROP TABLE IF EXISTS `nhatkyxulythucanthuocquahan`;
CREATE TABLE IF NOT EXISTS `nhatkyxulythucanthuocquahan` (
  `idNhatKyXuLyThucAnThuocQuaHan` int(11) NOT NULL AUTO_INCREMENT,
  `NgayXuLy` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Ten` varchar(255) DEFAULT NULL,
  `NguyenNhan` varchar(255) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT '0',
  `PhuongPhapXuLy` varchar(255) DEFAULT NULL,
  `DonViNhanXuLy` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `lock` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idTaiKhoan` int(11) NOT NULL,
  `idVuNuoi` int(11) NOT NULL,
  `idAoNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyXuLyThucAnThuocQuaHan`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.phuongphapcaitao
DROP TABLE IF EXISTS `phuongphapcaitao`;
CREATE TABLE IF NOT EXISTS `phuongphapcaitao` (
  `idPhuongPhapCaiTao` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(45) NOT NULL,
  PRIMARY KEY (`idPhuongPhapCaiTao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.phuongphaptaytrung
DROP TABLE IF EXISTS `phuongphaptaytrung`;
CREATE TABLE IF NOT EXISTS `phuongphaptaytrung` (
  `idPhuongPhapTayTrung` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(45) NOT NULL,
  PRIMARY KEY (`idPhuongPhapTayTrung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.phuongphapthugomracthai
DROP TABLE IF EXISTS `phuongphapthugomracthai`;
CREATE TABLE IF NOT EXISTS `phuongphapthugomracthai` (
  `idPhuongPhapThuGomRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPhuongPhapThuGomRacThai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.phuongphapxuly
DROP TABLE IF EXISTS `phuongphapxuly`;
CREATE TABLE IF NOT EXISTS `phuongphapxuly` (
  `idPhuongPhapXuLy` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPhuongPhapXuLy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.taikhoan
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `idTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idLoaiTaiKhoan` int(11) NOT NULL,
  PRIMARY KEY (`idTaiKhoan`,`code`,`idLoaiTaiKhoan`),
  UNIQUE KEY `Code_UNIQUE` (`code`),
  KEY `idTaiKhoan` (`idTaiKhoan`,`code`) USING BTREE,
  KEY `fk_TaiKhoan_LoaiTaiKhoan_idx` (`idLoaiTaiKhoan`),
  CONSTRAINT `fk_TaiKhoan_LoaiTaiKhoan` FOREIGN KEY (`idLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`idLoaiTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.thucan
DROP TABLE IF EXISTS `thucan`;
CREATE TABLE IF NOT EXISTS `thucan` (
  `idThucAn` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(255) NOT NULL,
  `SoCongBoChatLuong` varchar(255) DEFAULT NULL,
  `ThanhPhan` varchar(255) DEFAULT NULL,
  `HamLuong` varchar(255) DEFAULT NULL,
  `NhaSanXuat` varchar(255) DEFAULT NULL,
  `CongDung` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `use` tinyint(4) DEFAULT '0',
  `idLoaiThucAn` int(11) NOT NULL,
  PRIMARY KEY (`idThucAn`,`idLoaiThucAn`),
  KEY `fk_ThucAn_LoaiThucAn1_idx` (`idLoaiThucAn`),
  CONSTRAINT `fk_ThucAn_LoaiThucAn1` FOREIGN KEY (`idLoaiThucAn`) REFERENCES `loaithucan` (`idLoaiThucAn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.vunuoi
DROP TABLE IF EXISTS `vunuoi`;
CREATE TABLE IF NOT EXISTS `vunuoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MaVuNuoi` varchar(255) NOT NULL,
  `BatDau` datetime DEFAULT CURRENT_TIMESTAMP,
  `KetThuc` datetime DEFAULT NULL,
  `SoLuongGiong` int(10) DEFAULT '10000',
  `SoLuongThuHoach` int(10) DEFAULT '0',
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idAoNuoi` int(11) NOT NULL,
  `idNhanCong` int(11) NOT NULL,
  `idKyThuatVien` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idAoNuoi`,`idNhanCong`,`idKyThuatVien`),
  KEY `fk_VuNuoi_AoNuoi1_idx` (`idAoNuoi`),
  KEY `fk_VuNuoi_NhanCong1_idx` (`idNhanCong`),
  KEY `fk_vunuoi_kythuatvien1_idx` (`idKyThuatVien`),
  CONSTRAINT `fk_VuNuoi_AoNuoi1` FOREIGN KEY (`idAoNuoi`) REFERENCES `aonuoi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VuNuoi_NhanCong1` FOREIGN KEY (`idNhanCong`) REFERENCES `nhancong` (`idNhanCong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vunuoi_kythuatvien1` FOREIGN KEY (`idKyThuatVien`) REFERENCES `kythuatvien` (`idKyThuatVien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
