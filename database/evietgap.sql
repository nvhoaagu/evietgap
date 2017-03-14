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
CREATE DATABASE IF NOT EXISTS `evietgap` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `evietgap`;

-- Dumping structure for table evietgap.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `chucnang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(4) DEFAULT '1' COMMENT '1. Đang sử dụng; 0 Đã xóa',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cms_baiviet
CREATE TABLE IF NOT EXISTS `cms_baiviet` (
  `MaBaiViet` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TenBaiViet` text COLLATE utf8_unicode_ci NOT NULL,
  `MaTheLoai` int(11) NOT NULL,
  `NoiDungBaiViet` longtext COLLATE utf8_unicode_ci NOT NULL,
  `AnhDaiDien` text COLLATE utf8_unicode_ci,
  `MaFile` text COLLATE utf8_unicode_ci,
  `slide` tinyint(4) DEFAULT '0',
  `TrangThai` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `update_at` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaBaiViet`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cms_file
CREATE TABLE IF NOT EXISTS `cms_file` (
  `MaFile` int(11) NOT NULL AUTO_INCREMENT,
  `TenFile` text NOT NULL,
  `UrlFile` text NOT NULL,
  `SizeFile` text NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaFile`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cms_page
CREATE TABLE IF NOT EXISTS `cms_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TitlePage` text NOT NULL,
  `TenPage` text NOT NULL,
  `NoiDung` longtext NOT NULL,
  `MaFile` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `update_at` date NOT NULL,
  `LoaiPage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cms_theloai
CREATE TABLE IF NOT EXISTS `cms_theloai` (
  `MaTheLoai` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TenTheLoai` text COLLATE utf8_unicode_ci NOT NULL,
  `TheLoaiCha` int(11) NOT NULL DEFAULT '0' COMMENT '0 Mục gốc',
  `TrangThai` int(11) NOT NULL DEFAULT '1' COMMENT '0: Xóa; 1: Đang dùng',
  PRIMARY KEY (`MaTheLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.cms_theloai_page
CREATE TABLE IF NOT EXISTS `cms_theloai_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TenTheLoai` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_barcode
CREATE TABLE IF NOT EXISTS `evietgap_barcode` (
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
  `idVatNuoi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_chucnang
CREATE TABLE IF NOT EXISTS `evietgap_chucnang` (
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
  CONSTRAINT `fk_ChucNang_LoaiTaiKhoan1` FOREIGN KEY (`idLoaiTaiKhoan`) REFERENCES `evietgap_loaitaikhoan` (`idLoaiTaiKhoan`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_cosogiong
CREATE TABLE IF NOT EXISTS `evietgap_cosogiong` (
  `idCoSoGiong` int(11) NOT NULL AUTO_INCREMENT,
  `TenCoSo` varchar(45) DEFAULT NULL,
  `MaSoKinhDoanh` varchar(45) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(2) DEFAULT '1',
  `status` tinyint(2) DEFAULT '1',
  `idVatNuoi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCoSoGiong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_cososanxuat
CREATE TABLE IF NOT EXISTS `evietgap_cososanxuat` (
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
  `idVatNuoi` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`idCoSoSanXuat`),
  KEY `FK_evietgap_cososanxuat_evietgap_taikhoan` (`idTaiKhoan`),
  CONSTRAINT `FK_evietgap_cososanxuat_evietgap_taikhoan` FOREIGN KEY (`idTaiKhoan`) REFERENCES `evietgap_taikhoan` (`idTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_cosothumua
CREATE TABLE IF NOT EXISTS `evietgap_cosothumua` (
  `idCoSoThuMua` int(11) NOT NULL AUTO_INCREMENT,
  `TenCoSo` varchar(45) NOT NULL,
  `MaSoThue` varchar(45) DEFAULT NULL,
  `DienThoai` varchar(45) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `NguoiDaiDien` varchar(45) DEFAULT NULL,
  `idVatNuoi` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCoSoThuMua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_danhmucracthai
CREATE TABLE IF NOT EXISTS `evietgap_danhmucracthai` (
  `idDanhMucRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDanhMucRacThai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_donvitinh
CREATE TABLE IF NOT EXISTS `evietgap_donvitinh` (
  `idDonViTinh` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idDonViTinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_kythuatvien
CREATE TABLE IF NOT EXISTS `evietgap_kythuatvien` (
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
  PRIMARY KEY (`idKyThuatVien`),
  KEY `FK_evietgap_kythuatvien_evietgap_taikhoan` (`idTaiKhoan`),
  CONSTRAINT `FK_evietgap_kythuatvien_evietgap_taikhoan` FOREIGN KEY (`idTaiKhoan`) REFERENCES `evietgap_taikhoan` (`idTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_loaihinhgap
CREATE TABLE IF NOT EXISTS `evietgap_loaihinhgap` (
  `idLoaiHinhGap` int(11) NOT NULL AUTO_INCREMENT,
  `Ma` varchar(20) NOT NULL DEFAULT '0',
  `TenGoi` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idLoaiHinhGap`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_loaitaikhoan
CREATE TABLE IF NOT EXISTS `evietgap_loaitaikhoan` (
  `idLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `active` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idLoaiTaiKhoan`),
  KEY `idLoaiTaiKhoan` (`idLoaiTaiKhoan`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_nhancong
CREATE TABLE IF NOT EXISTS `evietgap_nhancong` (
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
-- Dumping structure for table evietgap.evietgap_phuongphapthugomracthai
CREATE TABLE IF NOT EXISTS `evietgap_phuongphapthugomracthai` (
  `idPhuongPhapThuGomRacThai` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPhuongPhapThuGomRacThai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_phuongphapxuly
CREATE TABLE IF NOT EXISTS `evietgap_phuongphapxuly` (
  `idPhuongPhapXuLy` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPhuongPhapXuLy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_quantri
CREATE TABLE IF NOT EXISTS `evietgap_quantri` (
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
-- Dumping structure for table evietgap.evietgap_taikhoan
CREATE TABLE IF NOT EXISTS `evietgap_taikhoan` (
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
  CONSTRAINT `fk_TaiKhoan_LoaiTaiKhoan` FOREIGN KEY (`idLoaiTaiKhoan`) REFERENCES `evietgap_loaitaikhoan` (`idLoaiTaiKhoan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.evietgap_vatnuoi
CREATE TABLE IF NOT EXISTS `evietgap_vatnuoi` (
  `idVatNuoi` int(11) NOT NULL AUTO_INCREMENT,
  `MaVatNuoi` varchar(50) NOT NULL DEFAULT '0',
  `TenTiengAnh` varchar(50) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(2) NOT NULL DEFAULT '1',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `idLoaiHinhGap` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVatNuoi`),
  UNIQUE KEY `MaVatNuoi` (`MaVatNuoi`),
  KEY `FK_evietgap_vatnuoi_evietgap_loaihinhgap` (`idLoaiHinhGap`),
  CONSTRAINT `FK_evietgap_vatnuoi_evietgap_loaihinhgap` FOREIGN KEY (`idLoaiHinhGap`) REFERENCES `evietgap_loaihinhgap` (`idLoaiHinhGap`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.sys_chucnang
CREATE TABLE IF NOT EXISTS `sys_chucnang` (
  `MaChucNang` varchar(20) NOT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`MaChucNang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.sys_phanhe
CREATE TABLE IF NOT EXISTS `sys_phanhe` (
  `idPhanHe` int(11) NOT NULL AUTO_INCREMENT,
  `MaPhanHe` varchar(50) NOT NULL DEFAULT '0',
  `TenPhanHe` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPhanHe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_aonuoi
CREATE TABLE IF NOT EXISTS `tcx_aonuoi` (
  `idAoNuoi` int(11) NOT NULL,
  `MaAo` varchar(255) NOT NULL,
  `DienTichAo` int(11) DEFAULT NULL,
  `ToaDo` varchar(100) DEFAULT NULL,
  `LoaiAo` varchar(100) DEFAULT 'Ao nuôi',
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCoSoSanXuat` int(11) NOT NULL,
  PRIMARY KEY (`idAoNuoi`,`idCoSoSanXuat`),
  KEY `fk_AoNuoi_cososanxuat1_idx` (`idCoSoSanXuat`),
  CONSTRAINT `fk_AoNuoi_cososanxuat1` FOREIGN KEY (`idCoSoSanXuat`) REFERENCES `evietgap_cososanxuat` (`idCoSoSanXuat`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_cachxulytomchet
CREATE TABLE IF NOT EXISTS `tcx_cachxulytomchet` (
  `idCachXuLyTomChet` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCachXuLyTomChet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_dauhieu
CREATE TABLE IF NOT EXISTS `tcx_dauhieu` (
  `idDauHieu` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDauHieu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_hoachatkhangsinhcam
CREATE TABLE IF NOT EXISTS `tcx_hoachatkhangsinhcam` (
  `id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `CamSuDung` tinyint(4) DEFAULT '1',
  `HanCheSuDung` tinyint(4) DEFAULT '0',
  `DuLuongToiDa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_kythuatvien
CREATE TABLE IF NOT EXISTS `tcx_kythuatvien` (
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
-- Dumping structure for table evietgap.tcx_loaimucdichsudungthuoc
CREATE TABLE IF NOT EXISTS `tcx_loaimucdichsudungthuoc` (
  `idLoaiMucDichSuDungThuoc` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idLoaiMucDichSuDungThuoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_loaithucan
CREATE TABLE IF NOT EXISTS `tcx_loaithucan` (
  `idLoaiThucAn` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`idLoaiThucAn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_nguyennhan
CREATE TABLE IF NOT EXISTS `tcx_nguyennhan` (
  `idNguyenNhan` int(11) NOT NULL AUTO_INCREMENT,
  `TenGoi` varchar(45) DEFAULT NULL,
  `MoTa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idNguyenNhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_nhatkycaitaoao
CREATE TABLE IF NOT EXISTS `tcx_nhatkycaitaoao` (
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
-- Dumping structure for table evietgap.tcx_nhatkychoan
CREATE TABLE IF NOT EXISTS `tcx_nhatkychoan` (
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
-- Dumping structure for table evietgap.tcx_nhatkygiaiquyetcongdong
CREATE TABLE IF NOT EXISTS `tcx_nhatkygiaiquyetcongdong` (
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
-- Dumping structure for table evietgap.tcx_nhatkykiemke
CREATE TABLE IF NOT EXISTS `tcx_nhatkykiemke` (
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
  `idVatNuoi` int(11) NOT NULL,
  PRIMARY KEY (`idNhatKyKiemKe`,`idVuNuoi`,`idAoNuoi`),
  KEY `fk_nhatkynhapkho_vunuoi1_idx` (`idVuNuoi`),
  KEY `fk_nhatkynhapkho_aonuoi1_idx` (`idAoNuoi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_nhatkykiemkehethan
CREATE TABLE IF NOT EXISTS `tcx_nhatkykiemkehethan` (
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
-- Dumping structure for table evietgap.tcx_nhatkynhapkho
CREATE TABLE IF NOT EXISTS `tcx_nhatkynhapkho` (
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
-- Dumping structure for table evietgap.tcx_nhatkysuckhoe
CREATE TABLE IF NOT EXISTS `tcx_nhatkysuckhoe` (
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
-- Dumping structure for table evietgap.tcx_nhatkysudungthuoc
CREATE TABLE IF NOT EXISTS `tcx_nhatkysudungthuoc` (
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
-- Dumping structure for table evietgap.tcx_nhatkytangtruong
CREATE TABLE IF NOT EXISTS `tcx_nhatkytangtruong` (
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
-- Dumping structure for table evietgap.tcx_nhatkythagiong
CREATE TABLE IF NOT EXISTS `tcx_nhatkythagiong` (
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
-- Dumping structure for table evietgap.tcx_nhatkytheodoimoitruong
CREATE TABLE IF NOT EXISTS `tcx_nhatkytheodoimoitruong` (
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
-- Dumping structure for table evietgap.tcx_nhatkytheodoinuoccap
CREATE TABLE IF NOT EXISTS `tcx_nhatkytheodoinuoccap` (
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
-- Dumping structure for table evietgap.tcx_nhatkytheodoinuocthai
CREATE TABLE IF NOT EXISTS `tcx_nhatkytheodoinuocthai` (
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
-- Dumping structure for table evietgap.tcx_nhatkythugomracthai
CREATE TABLE IF NOT EXISTS `tcx_nhatkythugomracthai` (
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
-- Dumping structure for table evietgap.tcx_nhatkythuhoach
CREATE TABLE IF NOT EXISTS `tcx_nhatkythuhoach` (
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
-- Dumping structure for table evietgap.tcx_nhatkyxulydongvatgayhai
CREATE TABLE IF NOT EXISTS `tcx_nhatkyxulydongvatgayhai` (
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
-- Dumping structure for table evietgap.tcx_nhatkyxulykiemkehethan
CREATE TABLE IF NOT EXISTS `tcx_nhatkyxulykiemkehethan` (
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
-- Dumping structure for table evietgap.tcx_nhatkyxulyracthai
CREATE TABLE IF NOT EXISTS `tcx_nhatkyxulyracthai` (
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
-- Dumping structure for table evietgap.tcx_nhatkyxulythucanthuocquahan
CREATE TABLE IF NOT EXISTS `tcx_nhatkyxulythucanthuocquahan` (
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
-- Dumping structure for table evietgap.tcx_phuongphapcaitao
CREATE TABLE IF NOT EXISTS `tcx_phuongphapcaitao` (
  `idPhuongPhapCaiTao` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(45) NOT NULL,
  PRIMARY KEY (`idPhuongPhapCaiTao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_phuongphaptaytrung
CREATE TABLE IF NOT EXISTS `tcx_phuongphaptaytrung` (
  `idPhuongPhapTayTrung` int(11) NOT NULL AUTO_INCREMENT,
  `Ten` varchar(255) NOT NULL,
  `MoTa` varchar(45) NOT NULL,
  PRIMARY KEY (`idPhuongPhapTayTrung`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tcx_vunuoi
CREATE TABLE IF NOT EXISTS `tcx_vunuoi` (
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
  CONSTRAINT `fk_VuNuoi_AoNuoi1` FOREIGN KEY (`idAoNuoi`) REFERENCES `tcx_aonuoi` (`idAoNuoi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VuNuoi_NhanCong1` FOREIGN KEY (`idNhanCong`) REFERENCES `evietgap_nhancong` (`idNhanCong`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vunuoi_kythuatvien1` FOREIGN KEY (`idKyThuatVien`) REFERENCES `tcx_kythuatvien` (`idKyThuatVien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tsx_hoachatkhangsinhsudung
CREATE TABLE IF NOT EXISTS `tsx_hoachatkhangsinhsudung` (
  `id` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `DuLuongToiDa` varchar(255) DEFAULT NULL,
  `CongDung` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '1',
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.tsx_thucan
CREATE TABLE IF NOT EXISTS `tsx_thucan` (
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
  CONSTRAINT `fk_ThucAn_LoaiThucAn1` FOREIGN KEY (`idLoaiThucAn`) REFERENCES `tcx_loaithucan` (`idLoaiThucAn`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.
-- Dumping structure for table evietgap.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` varchar(5) COLLATE utf8_unicode_ci DEFAULT 'TRUE',
  `id_group` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
