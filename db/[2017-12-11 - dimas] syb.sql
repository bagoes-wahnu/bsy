/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 100128
Source Host           : localhost:3306
Source Database       : syb

Target Server Type    : MYSQL
Target Server Version : 100128
File Encoding         : 65001

Date: 2017-12-11 08:39:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for award
-- ----------------------------
DROP TABLE IF EXISTS `award`;
CREATE TABLE `award` (
  `ID_AWARD` int(11) NOT NULL AUTO_INCREMENT,
  `KETERANGAN` text,
  `STATUS` int(11) DEFAULT NULL,
  `FILE` varchar(255) DEFAULT NULL,
  `DELETED` int(11) NOT NULL,
  PRIMARY KEY (`ID_AWARD`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of award
-- ----------------------------
INSERT INTO `award` VALUES ('1', '1', '1', null, '1');
INSERT INTO `award` VALUES ('2', '111', '1', '20171117101019_macbook-1.jpg', '1');
INSERT INTO `award` VALUES ('3', 'keterangan', '1', '20171117110441_macbook-1.jpg', '0');
INSERT INTO `award` VALUES ('4', 'Best Day are Awaydays', '1', '20171120135136_CU_2.jpg', '0');
INSERT INTO `award` VALUES ('5', 'testing', '1', '20171122163925_4__Juli.jpg', '0');

-- ----------------------------
-- Table structure for bendera_persentase
-- ----------------------------
DROP TABLE IF EXISTS `bendera_persentase`;
CREATE TABLE `bendera_persentase` (
  `ID_BENDERA_PENSENTASE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `ID_WILAYAH` int(11) DEFAULT NULL,
  `ID_CABANG` int(11) DEFAULT NULL,
  `ID_KAS` int(11) DEFAULT NULL,
  `TABUNGAN` varchar(7) DEFAULT NULL,
  `DEPOSITO` varchar(7) DEFAULT NULL,
  `KREDIT` varchar(7) DEFAULT NULL,
  `LABA` varchar(7) DEFAULT NULL,
  `ASSET` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`ID_BENDERA_PENSENTASE`),
  KEY `fk_bendera_id_cabang` (`ID_CABANG`) USING BTREE,
  KEY `fk_bendera_id_wilayaha` (`ID_WILAYAH`) USING BTREE,
  KEY `fk_bendera_id_kas` (`ID_KAS`) USING BTREE,
  KEY `fk_bendera_id_kota` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `bendera_persentase_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bendera_persentase_ibfk_2` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bendera_persentase_ibfk_3` FOREIGN KEY (`ID_KAS`) REFERENCES `kas` (`ID_KAS`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bendera_persentase_ibfk_4` FOREIGN KEY (`ID_WILAYAH`) REFERENCES `wilayah` (`ID_WILAYAH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of bendera_persentase
-- ----------------------------
INSERT INTO `bendera_persentase` VALUES ('1', '1', '1', null, null, '73.89', '106.11', '90.89', '71.26', '91.57');
INSERT INTO `bendera_persentase` VALUES ('2', '1', null, '1', null, '82.2', '113.1', '92.2', '69.3', '92.1');
INSERT INTO `bendera_persentase` VALUES ('3', '1', null, '2', null, '86.75', '91.01', '75.2', '99.36', '77.36');
INSERT INTO `bendera_persentase` VALUES ('4', '1', null, '3', null, '92.64', '93.6', '96.02', '98.72', '96.22');
INSERT INTO `bendera_persentase` VALUES ('5', '1', null, '4', null, '85.61', '78.91', '91.46', '73.06', '92.9');
INSERT INTO `bendera_persentase` VALUES ('6', '2', '10', null, null, '88.69', '132.38', '101.64', '88.45', '102.93');
INSERT INTO `bendera_persentase` VALUES ('7', '2', null, '25', null, '91.34', '208.35', '110.73', '130.72', '110.73');

-- ----------------------------
-- Table structure for branch
-- ----------------------------
DROP TABLE IF EXISTS `branch`;
CREATE TABLE `branch` (
  `ID_BRANCH` int(11) NOT NULL AUTO_INCREMENT,
  `ID_GROUP` int(11) DEFAULT NULL,
  `BRANCH` varchar(255) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`ID_BRANCH`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of branch
-- ----------------------------
INSERT INTO `branch` VALUES ('1', '1', '0000', 'KONSOLIDASI', '1');
INSERT INTO `branch` VALUES ('2', '2', '8000', 'KONSOLIDASI', '1');
INSERT INTO `branch` VALUES ('3', '2', '8001', 'WILAYAH 1', '1');
INSERT INTO `branch` VALUES ('4', '2', '8002', 'WILAYAH 2', '1');
INSERT INTO `branch` VALUES ('5', '2', '8003', 'WILAYAH 3', '1');
INSERT INTO `branch` VALUES ('6', '2', '8004', 'WILAYAH 4', '1');
INSERT INTO `branch` VALUES ('7', '2', '8005', 'WILAYAH 5', '1');
INSERT INTO `branch` VALUES ('8', '2', '8006', 'WILAYAH 6', '1');
INSERT INTO `branch` VALUES ('9', '2', '8007', 'WILAYAH 7', '1');
INSERT INTO `branch` VALUES ('10', '2', '8008', 'WILAYAH 8', '1');
INSERT INTO `branch` VALUES ('11', '2', '8009', 'WILAYAH 9', '1');
INSERT INTO `branch` VALUES ('12', '3', '1011', 'KANTOR PUSAT BANJARNEGARA', '1');
INSERT INTO `branch` VALUES ('13', '3', '1012', 'KANTOR CABANG UTAMA', '1');
INSERT INTO `branch` VALUES ('14', '3', '1013', 'BAGIAN PHBKIS', '1');
INSERT INTO `branch` VALUES ('15', '3', '1014', 'KANTOR CABANG PASAR BESAR', '1');
INSERT INTO `branch` VALUES ('16', '3', '1021', 'KANTOR CABANG KLAMPOK', '1');
INSERT INTO `branch` VALUES ('17', '3', '1031', 'KANTOR CABANG PURWONEGORO', '1');
INSERT INTO `branch` VALUES ('18', '3', '1032', 'KANTOR CABANG MANDIRAJA', '1');
INSERT INTO `branch` VALUES ('19', '3', '1041', 'KANTOR CABANG KALIBENING', '1');
INSERT INTO `branch` VALUES ('20', '3', '1051', 'KANTOR CABANG WANADADI', '1');
INSERT INTO `branch` VALUES ('21', '3', '1052', 'KANTOR CABANG PUNGGELAN', '1');
INSERT INTO `branch` VALUES ('22', '3', '1061', 'KANTOR CABANG KARANGKOBAR', '1');
INSERT INTO `branch` VALUES ('23', '3', '1064', 'KANTOR CABANG PAGENTAN', '1');
INSERT INTO `branch` VALUES ('24', '3', '1071', 'KANTOR CABANG PURBALINGGA', '1');
INSERT INTO `branch` VALUES ('25', '3', '1074', 'KANTOR CABANG REMBANG', '1');
INSERT INTO `branch` VALUES ('26', '3', '1081', 'KANTOR CABANG PURWOKERTO', '1');
INSERT INTO `branch` VALUES ('27', '3', '1091', 'KANTOR CABANG BATUR', '1');
INSERT INTO `branch` VALUES ('28', '3', '1101', 'KANTOR CABANG SINGAMERTA', '1');
INSERT INTO `branch` VALUES ('29', '3', '1103', 'KANTOR CABANG MADUKARA', '1');
INSERT INTO `branch` VALUES ('30', '3', '1111', 'KANTOR CABANG BOBOTSARI', '1');
INSERT INTO `branch` VALUES ('31', '3', '1112', 'KANTOR CABANG KARANGREJA', '1');
INSERT INTO `branch` VALUES ('32', '3', '1121', 'KANTOR CABANG DIENG', '1');
INSERT INTO `branch` VALUES ('33', '3', '1131', 'KANTOR CABANG CILACAP', '1');
INSERT INTO `branch` VALUES ('34', '3', '1132', 'KANTOR CABANG KROYA', '1');
INSERT INTO `branch` VALUES ('35', '3', '1141', 'KANTOR CABANG PEKALONGAN', '1');
INSERT INTO `branch` VALUES ('36', '3', '1282', 'KANTOR CABANG AJIBARANG', '1');
INSERT INTO `branch` VALUES ('37', '3', '1283', 'KANTOR CABANG BANYUMAS', '1');
INSERT INTO `branch` VALUES ('38', '4', '1011', 'KANTOR PUSAT BANJARNEGARA', '1');
INSERT INTO `branch` VALUES ('39', '4', '1012', 'KANTOR CABANG UTAMA', '1');
INSERT INTO `branch` VALUES ('40', '4', '1013', 'BAGIAN PHBKIS', '1');
INSERT INTO `branch` VALUES ('41', '4', '1014', 'KANTOR CABANG PASAR BESAR', '1');
INSERT INTO `branch` VALUES ('42', '4', '1016', 'KANTOR KAS PAGEDONGAN', '1');
INSERT INTO `branch` VALUES ('43', '4', '1017', 'KANTOR KAS BANJARMANGU', '1');
INSERT INTO `branch` VALUES ('44', '4', '1021', 'KANTOR CABANG KLAMPOK', '1');
INSERT INTO `branch` VALUES ('45', '4', '1022', 'KANTOR KAS SUSUKAN', '1');
INSERT INTO `branch` VALUES ('46', '4', '1031', 'KANTOR CABANG PURWONEGORO', '1');
INSERT INTO `branch` VALUES ('47', '4', '1032', 'KANTOR CABANG MANDIRAJA', '1');
INSERT INTO `branch` VALUES ('48', '4', '1033', 'KANTOR KAS BAWANG', '1');
INSERT INTO `branch` VALUES ('49', '4', '1034', 'KANTOR KAS WANADRI', '1');
INSERT INTO `branch` VALUES ('50', '4', '1041', 'KANTOR CABANG KALIBENING', '1');
INSERT INTO `branch` VALUES ('51', '4', '1042', 'KANTOR KAS PANDANARUM', '1');
INSERT INTO `branch` VALUES ('52', '4', '1051', 'KANTOR CABANG WANADADI', '1');
INSERT INTO `branch` VALUES ('53', '4', '1052', 'KANTOR CABANG PUNGGELAN', '1');
INSERT INTO `branch` VALUES ('54', '4', '1053', 'KANTOR KAS RAKIT', '1');
INSERT INTO `branch` VALUES ('55', '4', '1061', 'KANTOR CABANG KARANGKOBAR', '1');
INSERT INTO `branch` VALUES ('56', '4', '1064', 'KANTOR CABANG PAGENTAN', '1');
INSERT INTO `branch` VALUES ('57', '4', '1066', 'KANTOR KAS WANAYASA', '1');
INSERT INTO `branch` VALUES ('58', '4', '1067', 'KANTOR KAS PEJAWARAN', '1');
INSERT INTO `branch` VALUES ('59', '4', '1071', 'KANTOR CABANG PURBALINGGA', '1');
INSERT INTO `branch` VALUES ('60', '4', '1072', 'KANTOR KAS BOJONGSARI', '1');
INSERT INTO `branch` VALUES ('61', '4', '1073', 'KANTOR KAS KUTASARI', '1');
INSERT INTO `branch` VALUES ('62', '4', '1074', 'KANTOR CABANG REMBANG', '1');
INSERT INTO `branch` VALUES ('63', '4', '1075', 'KANTOR KAS KALIGONDANG', '1');
INSERT INTO `branch` VALUES ('64', '4', '1076', 'KANTOR KAS SEGAMAS', '1');
INSERT INTO `branch` VALUES ('65', '4', '1077', 'KANTOR KAS PADAMARA', '1');
INSERT INTO `branch` VALUES ('66', '4', '1078', 'KANTOR KAS KARANGMONCOL', '1');
INSERT INTO `branch` VALUES ('67', '4', '1079', 'KANTOR KAS KEMANGKON', '1');
INSERT INTO `branch` VALUES ('68', '4', '1081', 'KANTOR CABANG PURWOKERTO', '1');
INSERT INTO `branch` VALUES ('69', '4', '1082', 'KANTOR KAS PASAR WAGE', '1');
INSERT INTO `branch` VALUES ('70', '4', '1083', 'KANTOR KAS KARANGLEWAS', '1');
INSERT INTO `branch` VALUES ('71', '4', '1084', 'KANTOR KAS SOKARAJA', '1');
INSERT INTO `branch` VALUES ('72', '4', '1085', 'KANTOR KAS PABUARAN', '1');
INSERT INTO `branch` VALUES ('73', '4', '1086', 'KANTOR KAS RAWALO', '1');
INSERT INTO `branch` VALUES ('74', '4', '1087', 'KANTOR KAS CILONGOK', '1');
INSERT INTO `branch` VALUES ('75', '4', '1088', 'KANTOR KAS PATIKRAJA', '1');
INSERT INTO `branch` VALUES ('76', '4', '1089', 'KANTOR KAS DUKUHWALUH', '1');
INSERT INTO `branch` VALUES ('77', '4', '1091', 'KANTOR CABANG BATUR', '1');
INSERT INTO `branch` VALUES ('78', '4', '1101', 'KANTOR CABANG SINGAMERTA', '1');
INSERT INTO `branch` VALUES ('79', '4', '1102', 'KANTOR KAS TUNGGARA', '1');
INSERT INTO `branch` VALUES ('80', '4', '1103', 'KANTOR CABANG MADUKARA', '1');
INSERT INTO `branch` VALUES ('81', '4', '1111', 'KANTOR CABANG BOBOTSARI', '1');
INSERT INTO `branch` VALUES ('82', '4', '1112', 'KANTOR CABANG KARANGREJA', '1');
INSERT INTO `branch` VALUES ('83', '4', '1113', 'KANTOR KAS KARANGANYAR', '1');
INSERT INTO `branch` VALUES ('84', '4', '1114', 'KANTOR KAS MREBET', '1');
INSERT INTO `branch` VALUES ('85', '4', '1121', 'KANTOR CABANG DIENG', '1');
INSERT INTO `branch` VALUES ('86', '4', '1131', 'KANTOR CABANG CILACAP', '1');
INSERT INTO `branch` VALUES ('87', '4', '1132', 'KANTOR CABANG KROYA', '1');
INSERT INTO `branch` VALUES ('88', '4', '1133', 'KANTOR KAS KESUGIHAN', '1');
INSERT INTO `branch` VALUES ('89', '4', '1134', 'KANTOR KAS PASAR GEDE', '1');
INSERT INTO `branch` VALUES ('90', '4', '1135', 'KANTOR KAS JERUKLEGI', '1');
INSERT INTO `branch` VALUES ('91', '4', '1136', 'KANTOR KAS NUSAWUNGU', '1');
INSERT INTO `branch` VALUES ('92', '4', '1141', 'KANTOR CABANG PEKALONGAN', '1');
INSERT INTO `branch` VALUES ('93', '4', '1142', 'KANTOR KAS PANINGGARAN', '1');
INSERT INTO `branch` VALUES ('94', '4', '1143', 'KANTOR KAS KESESI', '1');
INSERT INTO `branch` VALUES ('95', '4', '1144', 'KANTOR KAS WONOPRINGGO', '1');
INSERT INTO `branch` VALUES ('96', '4', '1145', 'KANTOR KAS DORO', '1');
INSERT INTO `branch` VALUES ('97', '4', '1171', 'KANTOR KAS BUKATEJA', '1');
INSERT INTO `branch` VALUES ('98', '4', '1172', 'KANTOR KAS KALIKAJAR', '1');
INSERT INTO `branch` VALUES ('99', '4', '1173', 'KANTOR KAS KEJOBONG', '1');
INSERT INTO `branch` VALUES ('100', '4', '1181', 'KANTOR KAS KEDUNGWULUH', '1');
INSERT INTO `branch` VALUES ('101', '4', '1182', 'KANTOR KAS BATURADEN', '1');
INSERT INTO `branch` VALUES ('102', '4', '1282', 'KANTOR CABANG AJIBARANG', '1');
INSERT INTO `branch` VALUES ('103', '4', '1283', 'KANTOR CABANG BANYUMAS', '1');
INSERT INTO `branch` VALUES ('104', '4', '1284', 'KANTOR KAS PEKUNCEN', '1');
INSERT INTO `branch` VALUES ('105', '4', '1285', 'KANTOR KAS JATILAWANG', '1');

-- ----------------------------
-- Table structure for cabang
-- ----------------------------
DROP TABLE IF EXISTS `cabang`;
CREATE TABLE `cabang` (
  `ID_CABANG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_WILAYAH` int(11) DEFAULT NULL,
  `CABANG` varchar(200) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `KECAMATAN` varchar(200) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_CABANG`),
  KEY `cabang_ID_WILAYAH_idx` (`ID_WILAYAH`) USING BTREE,
  CONSTRAINT `cabang_ibfk_1` FOREIGN KEY (`ID_WILAYAH`) REFERENCES `wilayah` (`ID_WILAYAH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES ('1', '1', 'Cabang Utama', 'Rejasa 003/003', 'Kec. Madukara Kab. Banjarnegara 53482', '(0286) 591662 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('2', '1', 'Cabang Pasar Besar', 'Jl. Letjend. Karjono No.43', 'Parakancanggah 5/9 Banjarnegara', '(0286) 592315 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('3', '1', 'Cabang Singamerta', 'Desa Singamerta Rt.04 Rw.02', 'Kec. Sigaluh Kab. Banjarnegara', '(0286) 593802 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('4', '1', 'Cabang Madukara', 'Desa Madukara RT 03 RW 03', 'Kecamatan Madukara Kabupaten Banjarnegara', '-', '1', '0');
INSERT INTO `cabang` VALUES ('5', '2', 'Cabang Klampok', 'Jl. Raya Purwareja Klampok Rt. 01 Rw. 01', 'Purwareja Klampok Banjarnegara', '(0286) 479217 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('6', '2', 'Cabang Purwonegoro', 'Jl. Raya Purwonegoro 1/1 Purwonegoro ', 'Banjarnegara', '(0286) 5988607 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('7', '2', 'Cabang Mandiraja', 'Desa Mandiraja Kulon Rt.02 Rw. 03', 'Kec. Mandiraja Kab. Banjarnegara', '(0286) 411443 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('8', '2', 'Cabang Wanadadi', 'Kemantren 1/3 Wanadadi', 'Banjarnegara', '(0286) 3398765 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('9', '2', 'Cabang Punggelan', 'Desa Karangsari RT 004 RW 001', 'Kec. Punggelan Kab. Banjarnegara', '-', '1', '0');
INSERT INTO `cabang` VALUES ('10', '3', 'Cabang Karangkobar', 'Desa Leksana 3/5', 'Karangkobar Banjarnegara', '(0286) 5988020 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('11', '3', 'Cabang Kalibening', 'Jl. Raya Kalibening RT 02/Rw.03', 'Kec. Kalibening Kab. Banjarnegara', '(0285) 522304 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('12', '4', 'Cabang Batur', 'Jl. Raya Batur Rt 02 Rw 01', 'Batur Banjarnegara', '(0286) 5986229 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('13', '4', 'Cabang Pagentan', 'Jl. Raya Pagentan Rt.3 Rw.7', 'Desa Pagentan Kec. Pagentan Kab. Banjarnegara', '082892031747', '1', '0');
INSERT INTO `cabang` VALUES ('14', '4', 'Cabang Dieng', 'Ds.Dieng Kulon Rt.01 Rw.01', 'Kec.Batur Kab. Banjarnegara', '(0286) 3342090 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('15', '5', 'Cabang Pekalongan', 'Jl. Raya Mandurorejo No. 504 Desa Nyamok', 'Kecamatan Kajen Kab. Pekalongan', '(0285) 385322 & \'(02', '1', '0');
INSERT INTO `cabang` VALUES ('16', '6', 'Cabang Purbalingga', 'Jl. S Parman No. 129 Kedungmenjangan', 'Purbalingga', '(0281) 894380/ 89484', '1', '0');
INSERT INTO `cabang` VALUES ('17', '6', 'Cabang Bobotsari', 'Jl. Kolonel Soegiri Rt. 03 Rw. 04 Desa Gandasuli', 'Kec. Bobotsari Kab. Purbalingga', '(0281) 759403 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('18', '6', 'Cabang Rembang', 'Jl. Raya Rembang-Purbalingga Rt.01 Rw.01 Ds.Losari', 'Kec.Rembang Kab. Purbalingga', '(0281) 6590538 & (02', '1', '0');
INSERT INTO `cabang` VALUES ('19', '6', 'Cabang Karangreja', 'Desa Karangreja Rt 04 Rw 01 ', 'Kecamatan Karangreja Kab. Purbalingga', '(0281) 7700099', '1', '0');
INSERT INTO `cabang` VALUES ('20', '7', 'Cabang Purwokerto', 'Jl. Jend Sudirman Timur No. 1, Rt.05/Rw.03', 'Kel. Berkoh, Kec. Purwokerto Selatan, Kab. Banyumas', '(0281) 643582 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('21', '7', 'Cabang Ajibarang', 'Jl. Raya Ajibarang – Pancasan Rt.002 Rw.001', 'Kecamatan Ajibarang', '(0281) 571459', '1', '0');
INSERT INTO `cabang` VALUES ('22', '8', 'Cabang Banyumas', 'Jl. Gatot Subroto RT.05/RW.01 Desa Kedunguter ', 'Kec. Banyumas Kab. Banyumas', '(0281) 796113 & - (0', '1', '0');
INSERT INTO `cabang` VALUES ('23', '9', 'Cabang Cilacap', 'Jl. Perintis Kemerdekaan Rt.01 Rw. 12', 'Kel. Gumilir Kec. Cilacap Utara Kab. Cilacap 53231', '(0282) 542294 & (028', '1', '0');
INSERT INTO `cabang` VALUES ('24', '9', 'Cabang Kroya', 'Jl. Raya Mujur Rt.06 Rw.03 Desa Mujur', 'Kec. Kroya Kab. Cilacap 53282', '(0282) 5295188', '1', '0');
INSERT INTO `cabang` VALUES ('25', '10', 'Cabang Utama', 'Jl. Raya Kertek Wonosobo, Sidomukti, Rt 05/ Rw 06 ', 'Kecamatan Kertek, Kabupaten Wonosobo 56371', '(0286) 3399244, 3329', '1', '0');
INSERT INTO `cabang` VALUES ('26', '10', 'Cabang Wonosobo', 'Kyai Muntang No. 170 B, Rt. 04 Rw. 11 Jaraksari, ', 'Kab. Wonosobo 56314', '(0286) 321737', '1', '0');
INSERT INTO `cabang` VALUES ('27', '10', 'Cabang Sapuran', 'Kp. Lempongsari Rt. 21 Rw. 12, ', 'Kec. Sapuran Kab. Wonsoobo 56373', '(0286) 611153', '1', '0');
INSERT INTO `cabang` VALUES ('28', '10', 'Cabang Kaliwiro', 'Jalan Kaliwiro – Wadaslintang, Rt. 02 Rw. 06 Kelurahan Kaliwiro, ', 'Kec. Kaliwiro Kab. Wonosobo 56364', '-', '1', '0');
INSERT INTO `cabang` VALUES ('29', '10', 'Cabang Selomerto', 'Jl. Raya Banyumas Km 6 Rt. 01 Rw. 01, Desa Campursari', 'Kecamatan Selomerto, Kabupaten Wonosobo 56361', '(0286) 3320123', '1', '0');
INSERT INTO `cabang` VALUES ('30', '11', 'Cabang Temanggung', 'Jl. Jend Sudirman 120 B Rejosari', 'Rejosari, Temanggung 56218', '(0293) 493813, 49387', '1', '0');
INSERT INTO `cabang` VALUES ('31', '11', 'Cabang Ngadirejo', 'Jln. Raya Petirejo Rt. 03 Rw. 02, Desa Petirejo', 'Ngadirejo 56255, Kab. Temanggung', '(0293) 591042', '1', '0');
INSERT INTO `cabang` VALUES ('32', '11', 'Cabang Parakan', 'Jln. Diponegoro No. 100 A, Rt. 02 Rw. 04', 'Kec. Parakan, Kab. Temanggung 56254', '(0293) 596784', '1', '0');
INSERT INTO `cabang` VALUES ('33', '12', '12', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('34', '13', 'Cabang A1', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('35', '14', 'Cabang 1', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('36', '14', 'Cabang 2', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('37', '14', 'Cabang 3', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('38', '14', 'Cabang 4', null, null, null, '0', '0');
INSERT INTO `cabang` VALUES ('39', '15', 'Cabang I', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('40', '15', 'Cabang II', null, null, null, '1', '0');
INSERT INTO `cabang` VALUES ('41', '15', 'Cabang III', null, null, null, '1', '0');

-- ----------------------------
-- Table structure for cp_struktur_modal
-- ----------------------------
DROP TABLE IF EXISTS `cp_struktur_modal`;
CREATE TABLE `cp_struktur_modal` (
  `ID_STRUKTUR_MODAL` int(11) NOT NULL AUTO_INCREMENT COMMENT '1, banjarnegara, 2 kretek',
  `MODAL_INTI` double(32,0) DEFAULT NULL,
  `MODAL_PELENGKAP` double(32,0) DEFAULT NULL,
  `TOTAL_MODAL` double(32,0) DEFAULT NULL,
  `FOTO` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_STRUKTUR_MODAL`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cp_struktur_modal
-- ----------------------------
INSERT INTO `cp_struktur_modal` VALUES ('1', '0', '0', '0', '20171114071727_macbook-1.jpg');
INSERT INTO `cp_struktur_modal` VALUES ('2', '0', '0', '0', '20171114071733_macbook-1.jpg');

-- ----------------------------
-- Table structure for deposit
-- ----------------------------
DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit` (
  `ID_DEPOSITO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `JANGKA_WAKTU` int(11) DEFAULT NULL,
  `TOTAL_NASABAH` varchar(100) DEFAULT NULL,
  `NOMINAL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_DEPOSITO`),
  KEY `fk_deposit_id_kota` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of deposit
-- ----------------------------
INSERT INTO `deposit` VALUES ('1', '1', '1', '3675', '241380568113');
INSERT INTO `deposit` VALUES ('2', '1', '3', '2056', '189510655542');
INSERT INTO `deposit` VALUES ('3', '1', '6', '980', '90828705106');
INSERT INTO `deposit` VALUES ('4', '1', '12', '2580', '239980845790');
INSERT INTO `deposit` VALUES ('5', '2', '1', '552', '50625826051');
INSERT INTO `deposit` VALUES ('6', '2', '3', '324', '68362537261');
INSERT INTO `deposit` VALUES ('7', '2', '6', '143', '18214924195');
INSERT INTO `deposit` VALUES ('8', '2', '12', '489', '35910070457');

-- ----------------------------
-- Table structure for detail_linkage
-- ----------------------------
DROP TABLE IF EXISTS `detail_linkage`;
CREATE TABLE `detail_linkage` (
  `ID_DETAIL_LINKAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LINKAGE` int(11) DEFAULT NULL,
  `TGL_PENCARIAN` date DEFAULT NULL,
  `JATUH_TEMPO` date DEFAULT NULL,
  `PLATFOND_BANK` varchar(255) DEFAULT NULL,
  `BAKI_DEBIT` varchar(255) DEFAULT NULL,
  `KELONGGARAN_TARIK` varchar(255) DEFAULT NULL,
  `BUNGA` decimal(11,2) DEFAULT NULL,
  `DELETED` int(11) NOT NULL,
  PRIMARY KEY (`ID_DETAIL_LINKAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detail_linkage
-- ----------------------------

-- ----------------------------
-- Table structure for direksi
-- ----------------------------
DROP TABLE IF EXISTS `direksi`;
CREATE TABLE `direksi` (
  `ID_DIREKSI` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(2) DEFAULT NULL,
  `NAMA` varchar(200) DEFAULT NULL,
  `DESKRIPSI` text,
  `FOTO` varchar(100) DEFAULT NULL,
  `ID_JABATAN` int(11) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  `DELETED` int(11) NOT NULL,
  PRIMARY KEY (`ID_DIREKSI`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of direksi
-- ----------------------------
INSERT INTO `direksi` VALUES ('1', null, 'H. Satriyo YudiartoA', 'Lahir pada tahun 1947 di Majenang dengan kewarganegaraan Indonesia. Meraih lulusan terbaik dari Sekolah Tinggi Ilmu Perbankan (STIKUBANK) pada tahun 1971. Beliau memulai karirnya di The Bank of Tokyo, Ltd pada tahun 1972-2000 dan mencapai puncak karir sebagai Senior Assistant General Manager dan merangkap sebagai Senior Operation Manager.\nSaat ini Satriyo Yudiarto menjabat sebagai Komisaris Utama PT. BPR Surya Yudhakencana Banjarnegara, Komisaris Utama BPR Surya Yudha Wonosobo, Komisaris Utama Surya Yudha Park/ Hotel, dan Komisaris Utama PT Kusuma Agung Sejahtera (Pemilik Hotel Santika Purwokerto). Satriyo Yudiarto juga merupakan Pemegang Saham Mayoritas Perseroan dari PT BPR Surya Yudhakencana.', '20171124165504_Satriyo_Y_Komisaris_2.jpg', null, '1', '0');
INSERT INTO `direksi` VALUES ('2', null, 'Milla Feryanti', 'Memiliki latar belakang pendidikan Fakultas Ekonomi Jurusan Manajemen di Universitas Airlangga Surabaya dan Fakultas Sastra Jurusan Bahasa Jepang di Universitas Indonesia dengan meraih lulusan terbaik sehingga mendapat beasiswa untuk belajar di Universitas Soka, Tokyo, Jepang. Beliau kemudian melanjutkan pendidikannya di bidang Manajemen Bisnis di Sydney, Australia dan sempat menuntut ilmu di Boulder Institute of Microfinance di Turin-Italia atas beasiswa dari MasterCard Foundation.\nMemiliki pengalaman kerja di The Industrial Bank of Japan, Jakarta selama 6 tahun dan Bank Mizuho Indonesia selama 5.5 tahun sebagai Sekretaris Direksi WN Jepang (Ekspatriat), Bagian Business Development/ Marketing dan juga bagian General Affairs (Umum).\nSaat ini Milla Feryanti aktif dalam kepengurusan beberapa organisasi, diantaranya sebagai Ketua Komite Tetap Perbankan KADIN Jakarta Barat, Ketua kompartemen Koperasi BPD HIPMI Jaya (Himpunan Pengusaha Muda Indonesia), Dept. Hub. Luar Negeri DPP Perbarindo (Perhimpunan BPR se-Indonesia), BOD IMA (Indonesia Microfinance Association), National Vice President dari Junior Chamber International (JCI) Indonesia-Jakarta yang merupakan Organisasi Kewirausahaan dan Pemimpin-pemimpin Muda Dunia dan aktif pula di beberapa kepengurusan organisasi pengusaha lainnya. Sempat terpilih oleh AusAid/ Pemerintah Australia untuk mewakili Indonesia dalam ajang Asia Microfinance Forum di Colombo-Srilanka. Di tahun 2011 Milla Feryanti terpilih sebagai finalis Tokoh Pengusaha Muda Indonesia yang diselenggarakan oleh HIPMI (Himpunan Pengusaha Muda Indonesia)', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('3', null, 'Ananta Yudha', 'Berstatus sebagai Pilot lulusan dari Australian Aviation College Adelaide, Australia melalui beasiswa penuh dari Merpati Nusantara Airlines dan Dinas Perhubungan. Beliau pernah bekerja di Merpati Nusantara Airlines selama 10 tahun yang diselingi kontrak selama 2 tahun di Pelita Air dengan rating pesawat Fokker 28 sebagai First Officer (FO), Bar 3.\nSaat ini bekerja di Lion Air dengan rating pesawat MD 82 dan MD 90 sebagai Captain Pilot, Bar 4. Beliau pernah mengambil studi di STAN (Sekolah Tinggi Akuntansi Negara) dan Fakultas Ekonomi Universitas Terbuka, namun lebih memilih untuk mengambil beasiswa penuh pendidikan Pilot di Adelaide, Australia. Beliau pernah memenangkan Kejuaraan Tenis Remaja se-Jawa Timur dan hingga saat ini tetap aktif bermain Tennis Lapangan, baik sebagai hobi maupun prestasi.\ndibagikan dengan satu orang, nonaktif - hanya orang tertentu yang bisa mengakses.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('4', null, 'Tenny Yanutriana, MBA', 'Lahir pada tahun 1981 di Jakarta dengan kewarganegaraan Indonesia. Memiliki latarbelakang pendidikan Fakultas Ilmu Sosial dan Ilmu Politik (FISIP) di Universitas Indonesia pada tahun 2004. Mendapatkan gelar Master of Business Administration (MBA) di Universitas Gadjah Mada Yogyakarta sebagai lulusan terbaik, dan menjalani satu semester abroad di Fachhochschule Köln, Jerman.  Pada di tahun 2010, The MasterCard Foundation memberikan beasiswa kepada beliau untuk mengikuti pendidikan Boulder Institute of Microfinance “Microfinance Management” concentration di Turin Italia dan di tahun 2011 beasiswa untuk mengikuti pendidikan Harvard Business School Executive Education “Strategic Leadership for Microfinance.” Beliau merupakan satu-satu lulusan iLab Entrepreneur Institute yang berasal dari Indonesia pada tahun 2015.\nMengawali karirnya di BPR Bank Surya Yudha sebagai Kepala Divisi Non-Operasional II yang membawahi Divisi Pembukuan, Sekretariat dan Personalia. Kini Beliau menjabat sebagai Komisaris di BPR Bank Surya Yudha sejak tahun 2005. Selain itu, beliau juga menjabat sebagai Komisaris di BPR Surya Yudha Wonosobo dan Ketua Departemen Bidang Luar Negeri di DPP Perbarindo.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('5', null, 'Dra.Ec. Emila Hayati', 'Lahir pada tahun 1965 di Surabaya dengan kewarganegaraan Indonesia. Lulusan Universitas Katolik Widya Mandala Surabaya, Fakultas Ekonomi Jurusan Manajemen tahun 1989. Mengawali karirnya di Bank of Tokyo, Ltd Surabaya pada bagian Operasional tahun 1989-1993. Kemudian di Sanwa Indonesia Bank Jakarta pada bagian ekspor impor dan bagian operasional sebagai Supervisor tahun 1993-2001. Dan bergabung dengan BPR Bank Surya Yudha sebagai Kepala Divisi Non-Operasional II yang membawahi Divisi Pembukuan, Sekretariat dan Personalia. Kini beliau menjabat sebagai Komisaris di BPR Bank Surya Yudha sejak April 2010 dan juga merupakan Komisaris di BPR Surya Yudha Wonosobo. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 08 Mei 2015, masa jabatan berlaku hingga 19 Maret 2020.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('6', null, 'Margono, S.E.', 'Lahir pada tahun 1950 di Klaten dengan kewarganegaraan Indonesia. Memulai karir pada tahun 1975-1976 sebagai Kepala Unit Desa PT Bank Rakyat Indonesia. Kemudian tahun 1976-1999 bekerja di PT Bank Dagang Negara dengan jabatan tertinggi sebagai Assistant Relationship Manager Kredit Corporate di Cabang Surabaya Gentengkali. Setelah itu pada tahun 1999-2005 bergabung dengan Bank Mandiri dengan jabatan tertinggi sebagai Pemegang Kewenangan di Regional Risk Management VII Semarang. Kemudian pada tahun 2007-2011 beliau dikontrak oleh Lembaga Penjamin Simpanan (LPS) sebagai Ketua Tim Likuidasi PT BPR Anugerah Arta Niaga di Pati. Beliau bergabung dengan BPR Bank Surya Yudha pada bulan Juli 2013 sebagai Kepala Bagian Pendidikan yang kemudian mutasi menjadi Kepala Bagian Kepatuhan pada bulan September 2014. Pada bulan November 2014, beliau menjabat sebagai Kepala Divisi Kepatuhan. Dan kini, beliau diangkat sebagai Komisaris Independen sejak bulan November 2016. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 03 November 2016, dengan masa jabatan berlaku hingga 26 September 2021.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('7', null, 'Sugeng Riyanto, S.E', 'Lahir pada tahun 1974 di Banjarnegara dengan kewarganegaraan Indonesia. Meniti karir di BSY sejak tahun 1995-1997 sebagai Staf Marketing Cabang Karangkobar, tahun 1997-1999 sebagai Kepala Seksi, tahun 1999-2000 sebagai Wakil Kepala Cabang Mandiraja, tahun 2000-2002 sebagai Kepala Cabang Utama, tahun 2002-2006 sebagai Kepala Cabang Karangkobar, tahun 2006-2010 sebagai Wakil Kepala Divisi Kredit. Menjabat sebagai Kepala Wilayah I (2010-2015). Kini beliau menjabat sebagai Direktur Utama sejak Agustus 2015. Dasar pengngkatan pada Akte Notaris No. 70 tanggal 07 Juli 2015, masa jabatan berlaku hingga 07 Juli 2020.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('8', null, 'Dra. Ec. Sri Wahyu Utami, Ak', 'Lahir pada tahun 1965 di Surabaya dengan kewarganegaraan Indonesia. Lulusan Sekolah Tinggi Ilmu Ekonomi Indonesia (STIESIA) Surabaya tahun 1989 dan lulus pendidikan profesi akuntan di Universitas Jenderal Soedirman (UNSOED) pada tahun 2007. Memulai karirnya sebagai staf pengajar SMP PGRI 32 Surabaya tahun 1988-1989. Kemudian pada tahun 1989-1990 sebagai Auditor di Kantor Akuntan Publik Subandi Surabaya, tahun 1990 Applied Computer Management Indonesia, dan bekerja di PT BPR Artha Senapati Bangil Pasuruan Jawa Timur pada tahun 1990-1992. Bergabung dengan BPR Bank Surya Yudha sejak tahun 1992 sebagai Direktur Utama tahun 1992-1999 dan Direktur tahun 1999-2009. Kini beliau menjabat sebagai Direktur Umum sejak tahun 2009. Dasar pengangkatan pada Akte Notaris No. 46 tanggal 09 November 2014, masa jabatan berlaku hingga 09 November 2019. Beliau kini juga menjabat sebagai Bendahara Perbarindo DPK Banyumas dimana sebelumnya pernah menjabat sebagai Bendahara di DPD Perbarindo Jawa Tengah.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('9', null, 'Abdul Choir Maradika Putra, S.H', 'Lahir pada tahun 1971 di Jakarta dengan kewarganegaraan Indonesia. Lulusan Fakultas Hukum Universitas Wijaya Kusuma Purwokerto tahun 2002. Mengawali karir di BPR Pilar Niaga Jakarta sebagai Marketing pada tahun 1993-1994. Kemudian bergabung dengan BPR Bank Surya Yudha pada tahun 1994-1997 sebagai Staf Marketing, tahun 1997-2001 sebagai Kepala Cabang Karangkobar, tahun 2001-2008 sebagai Wakil Kepala Divisi Kredit, tahun 2008-2009 sebagau Kepala Wilayah IV yang Cabang Purwokerto, Purbalingga, dan Klampok. Menjabat sebagai Direktur Kredit pada tahun 2009-2016. Kini beliau menjabat sebagai Direktur Kepatuhan sejak November 2016. Dasar Pengangkatan pada Akte Notaris No. 46 tanggal 09 November 2014, masa jabatan berlaku hingga 09 November 2019.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('10', null, 'Achmad Supriyono, S.E.', 'Lahir pada tahun 1978 di Banjarnegara dengan kewarganegaraan Indonesia. Memulai karir pada tahun 1998-1999 sebagai staf TU MTS Muhammadiyah Petambakan Madukara Banjarnegara. Kemudian bergabung dengan BPR Bank Surya Yudha pada tahun 1999-2003 sebagai Kepala Seksi Kredit di Cabang Utama. Kemudian menjabat sebagai Kepala Seksi Kredit di Cabang Karangkobar (2003), Wakil Kepala Cabang Karangkobar (2004), Wakil Kepala Cabang Purbalingga (2005-2006), Kepala Kas Pasar Besar (2006), Kepala Cabang Karangkobar (2006-2008), Kepala Cabang batur (2008-2010), Kepala Cabang Purwokerto (2010-2012), Kepala Wilayah V (2012-2013), Kepala Divisi Kredit Wilayah V (2013), Kepala Wilayah V (2015), Kepala Wilayah VI (2015), dan Kepala Divisi Kredit (2016). Kini beliau telah diangkat menjadi Direktur Kredit, sejak bulan November 2016. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 03 November 2016, masa jabatan berlaku hingga 26 September 2021.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('11', null, 'Nurhadi, S.E.', 'Lahir pada tahun 1967 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Nurhadi, S.E. bergabung dengan BPR Bank Surya Yudha sejak tahun 1995 sebagai staf marketing, kemudian di tahun 1997 s/d 2006 diangkat menjadi Wakil Kepala Cabang Wanadadi dan di tahun 2006 – 2008 diangkat menjadi Kepala Cabang Wanadadi. Pada tahun 2008 beliau dimutasi ke Cabang Purwonegoro sebagai Kepala Cabang dan tahun 2009 beliau kembali dimutasikan ke Cabang Purbalingga dan menjabat sebagai Kepala Cabang. Pada tahun 2010 beliau menjabat sebagai Kepala Wilayah III yang membawahi Cabang Wanadadi, Purwonegoro dan Cabang Purworejo Klampok. Sejak tahun 2011 beliau menjabat sebagai Kepala Wilayah I yang membawahi Bag. PHBKIS kantor pusat, Cabang Utama, Singamerta dan Pasar besar. Sedangkan saat ini beliau menjabat sebagai Kepala Wilayah II yang membawahi Cabang Klampok, Mandiraja, Purwonegoro dan Wanadadi. Saat ini beliau menjabat sebagai Kepala Wilayah I yang membawahi Cabang Utama, Cabang Pasar Besar dan Cabang Singamerta sejak tanggal 15 Mei 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('12', null, 'Sutarjo, S.E', 'Lahir pada tahun 1973 di Banjarnegara, memiliki latar belakang pendidikan S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Sutarjo, S.E. merintis karir sebagai Staf Marketing mulai tanggal 13 Maret 1997 di PT. BPR Surya Yudhakencana Banjarnegara Cabang Mandiraja. Pada bulan Mei 2003, Sutarjo, S.E. diangkat sebagai Kepala Kantor Kas Mandiraja. Kemudian pada bulan Mei 2006, Sutarjo, S.E. diangkat sebagai Wakil Kepala Cabang Purwonegoro. Pada bulan Agustus 2009, Sutarjo, S.E. dimutasi ke Kas Dieng Cabang Batur sebagai Ketua Pokja untuk persiapan kenaikan status menjadi Kantor Cabang. Namun pada tanggal 14 September 2009, Sutarjo, S.E. kembali dimutasi ke Cabang Purwonegoro sebagai Kepala Cabang dan saat ini Sutarjo, S.E dimutasi kembali ke Cabang Purwokerto mulai tanggal 02 Februari 2012. Pada tanggal 28 Juli 2016, beliau dimutasi ke Kantor Cabang Purbalingga sebagai Kepala Cabang. Pada tanggal 12 Mei 2017 dipromosikan sebagai Kepala Wilayah II yang membawahi Cabang Wanadadi, Cabang Purwonegoro, Cabang Mandiraja dan Cabang Klampok.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('13', null, 'Tisto Yuwono', 'Lahir pada tahun 1972 di Banjarnegara, berpendidikan terakhir lulusan SMA N 1 Banjarnegara dan lulus tahun 1992. Tidak melanjutkan ke Perguruan Tinggi karena mempunyai keinginan untuk langsung bekerja. Dan untuk lebih meningkatkan ketrampilan dan daya saing maka dikurun waktu tahun 1993 mengikuti berbagai pendidikan ketrampilan anatara lain computer, Bahasa Inggris dan mengetik. Setelah selesai mengikuti berbagai pendidikan non formal langsung merantau ke Jakarta dan diterima di Bank Papan Sejahtera Cabang Jakarta dan ditempatkan sebagai Staf Administrasi Kredit, bank tersebut ber alamat di Jl.HR.Rasuna Said dan merupakan bank yang bergerak khusus untuk pelemparan kredit Kepemilikan Rumah / KPR. Bekerja di Bank Papan Sejahtera dari tahun 1994 s/d 1996. Pada tahun 1997 kembali ke Banjarnegara dan pada akhirnya di bulan Juni 1999 mulai bergabung dengan Bank Surya Yudha Banjarnegara. Awal karir dimulai sebagai staf marketing di Pasar Banjarnegara dan tahun 2000 dimutasikan ke kantor Cabang Wanadadi kemudian di tahun 2005 dimutasikan ke Kantor Kas Singamerta. Pada tahun 2008 dipercaya menjabat sebagai Kepala Kantor Kas Singamerta, dan seiring dengan peningkatan status kantor Kas Singamerta menjadi kantor Cabang pada tahun 2009 dipercaya menjabat sebagai Wakil Kepala Cabang dan pada tahun 2010 dipromosikan sebagai Kepala Cabang Bank Surya Yudha Cabang Singamerta dan saat ini beliau dimutasikan ke Cabang Pekalongan sebagai Kepala Cabang per tanggal 01 Maret 2012. Pada tanggal 13 Juli 2016, dipromosikan menjadi Kepala Wilayah III yang membawahi Cabang Karangkobar dan Cabang Kalibening.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('14', null, 'Eko Hartono, S.E', 'Lahir pada tahun 1973 lahir di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Eko Hartono, S.E. bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tanggal 2 Desember 1996 Sebagai Staff Marketing di Cabang Wanadadi sampai dengan tanggal 1 Juni 1998. kemudian tanggal 1 Juni 1998 s/d 24 Maret 2003 sebagai staff marketing Cabang Utama Banjarnegara, Selanjutnya tanggal 25 Maret 2003 s/d 23 September 2003 Menjabat sebagai Kasie Kredit di Bagian PHBKIS. Tanggal 23 September 2003 s/d 8 Juli 2006 Mutasi Ke Cabang Utama Sebagai Kasie Kredit. Tanggal 8 Juli 2006 s/d 4 Februari 2008 Menjabat Sebagai Wakil Kepala Cabang Utama Banjarnegara. Tanggal 4 Februari 2008 s/d 30 Januari 2010 dimutasi ke Cabang Purwokerto Menjabat Wakil Kepala Cabang. Pada tanggal 30 Maret 2010 dimutasi ke Cabang Klampok sebagai Kepala Cabang. Saat ini beliau menjabat menjadi Kepala Cabang Singamerta per tanggal 17 Februari 2012. Pada tanggal 13 Juli 2016 dipromosikan menjadi Kepala Wilayah IV, yang membawahi Cabang Pagentan, Cabang Batur dan Cabang Dieng.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('15', null, 'Purnawan, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Purnawan, S.E. mengawali karirnya di BPR Bank Surya Yudha Cabang Karangkobar Kas Kalibening sebagai staf Marketing sejak 1997 hingga 2001, dengan kegigihan serta keuletan beliau di bulan Februari 2001 diangkat sebagai Kepala Seksi di BPR Bank Surya Yudha Cabang Karangkobar Kas Kalibening, menjabat sebagai Pjs Kepala Cabang di BPR Bank Surya Yudha Cabang Kalibening pun pernah beliau lakoni, hingga di awal bulan tahun 2007 beliau dipercaya untuk menjabat sebagai Kepala Cabang Kalibening, Di tahun 2011 ini beliau mencoba mengukir sejarah dengan mengepalai cabang baru BPR Bank Surya Yudha di Pekalongan. Pada beberapa tahun terakhir, Purnawan atau akrab dipanggil wawan, Saat ini beliau dipromosikan menjadi Kepala Wilayah IV per tanggal 8 Maret 2012 dengan membawahi Cabang Kalibening dan Pekalongan.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('16', null, 'Wahyu Rukmono, S.E', 'Lahir pada tahun 1967 di Surabaya, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Putra Bangsa Surabaya. Wahyu Rukmono, S.E. lahir di Surabaya tanggal 31 Maret 1967. Latar belakang pendidikan S1 fakultas ekonomi di Universitas Putra Bangsa Surabaya. Beliau pernah menjadi sales representative di PT Bina Swdya Surabaya pada tahun 1998 dan ditahun yang sama beliau pindah dan bekerja sebagai kolektor di PT. BPR Dau Anugrah Malang. Wahyu Rukmono, S.E. bergabung dengan PT. BPR Surya Yudha pada tahun 2000 dengan jabatan staf PPKB hingga tahun 2001. Dan pada tahun 2001 beliau dipromosikan menjadi Kepala Seksi PPKB hingga tahun 2002. Pada tahun 2003 beliau diangkat menjadi Kepala Cabang Utama PT. BPR Bank Surya Yudha. Pada tahun tersebut pula beliau dimutasikan ke Cabang Wanadadi dan menjabat sebagai Kepala Cabang hingga tahun 2006. Pada tahun 2006 beliau dimutasikan kembali menjadi Kepala Cabang Purwokerto. Dan pada tahun 2010 beliau diangkat menjadi Kepala Wilayah IV yang membawahi Cabang Purwokerto, Purbalingga dan Bobotsari. Namun karena adanya penataan ulang wilayah sehingga saat ini beliau menjabat menjadi Kepala Wilayah VI dengan membawahi Cabang Purwokerto dan Cilacap. Pada tanggal 16 November 2015, beliau dipercaya menjadi Kepala Wilayah V yang membawahi Cabang Purbalingga, Cabang Bobotsari dan Cabang Rembang. Pada Tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Wilayah VI yang membawahi Cabang Purbalingga, Cabang Rembang dan Cabang Bobotsari.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('17', null, 'Gurita Nursetyawan, S.Hut.', 'Lahir pada tahun 1979 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1jurusan Kehutanan di INSTIPER Yogyakarta pada tahun 2003. Gurita Nursetyawan, S.Hut. bergabung di BPR Bank Surya Yudha mulai tanggal 10 Desember 2003 sebagai staff Marketing di Cabang Utama Kantor Pusat dan pada tahun 2007 dimutasikan ke Cabang Purwokerto. Meniti karir sebagai Kepala Kantor Kas Pabuaran sejak 2009 s.d 2012. Sebelum beliau menjabat Kepala Cabang Bobotsari seperti saat ini yang terhitung sejak 27 Agustus 2012, beliau menjabat sebagai Wakil Kepala Cabang Purwokerto selama 2 tahun dari Maret 2010 s.d Agustus 2012. Mulai bulan Maret 2014 beliau dimutasikan ke Cabang Cilacap sebagai Kepala Cabang. Pada tanggal 09 November 2015, beliau dipromosikan menjadi Kepala Wilayah III yang membawahi Cabang Karangkobar, Cabang Pagentan, Cabang Batur dan Cabang Dieng. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Wilayah VII, yang membawahi Cabang Purwokerto, dan Cabang Ajibarang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('18', null, 'Kondang, S.H', 'Lahir pada 1973 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Hukum di Universitas Wijaya Kusuma Purwokerto. Kondang, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 1995-2001 sebagai staf marketing Kantor Cabang Klampok. Beliau dipromosikan menjadi Kepala Seksi Kredit Cabang Klampok pada tahun 2001-2007. Beliau dipercaya menjadi Kepala Kantor Kas Susukan pada tahun 2007-2008. Pada 2008-2009, beliau dipercaya sebagai Wakil Kepala Cabang Purbalingga. Pada 2015, beliau dipercaya menjadi Kepala Cabang Banyumas. Dan pada tanggal 8 September 2017, beliau dipercaya menjadi Kepala Wilayah VIII hingga saat ini, yang membawahi Cabang Banyumas.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('19', null, 'Eling Sucipto, S.E', 'Lahir pada tahun 1971 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Eling Sucipto, S.E. mulai bekerja tahun 1993 sebagaiAccount Officer(AO) di PT. BPR Surya Yudhakencana Banjarnegara. Kemudian perjalanan karir lainnya yaitu, Pada tahun 2004 menjabat sebagai Wakil Kepala Cabang Purbalingga, tahun 2016 sebagai Wakil Kepala Cabang Klampok, tahun 2008 sebagai Kepala Cabang Wanadadi, tahun 2013 sebagai Kepala Cabang Purbalingga dan tahun 2016 beliau dipercaya menjabat sebagai Kepala Wilayah VIII, yang membawahi Cabang Cilacap dan Cabang Kroya. Sementara pada tanggal 9 September 2017, Wilayah VIII berubah menjadi Wilayah IX dengan membawahi cabang yang sama dan masih dipimpin oleh Eling Sucipto, S.E hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('20', null, 'Prapto Oktarianto', 'Lahir pada tahun 1969 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir di SMUN I Banjarnegara tahun 1989. Beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada bulan Juli 1993 dan bekerja sebagai AO(Account Officer)di Kantor Pusat. Terhitung sejak tanggal 01 Februai 1995, beliau dimutasikan ke Cabang Wanadadi dan Pada tanggal 01 Februai 1996 diangkat sebagai Wakil Kepala Cabang Wanadadi. Namun tidak berselang lama, beliau dimutasikan ke Cabang Karangkobar sejak 01 Agustus 2001. Pada tanggal 02 Oktober 2006 diangkat sebagai Kepala Cabang Karangkobar. Sejak tanggal 26 Desember 2007 Prapto Oktarianto dipercaya manajemen sebagai Kepala Bagian SKAI. Pada akhir bulan Februari 2012 beliau resmi menjabat sebagai Kepala Divisi Audit, Pendidikan dan Litbang kemudian beliau menjabat sebagai Kepala Divisi P3L [Personalia & Pendidikan, Pembukuan, Penelitian & Pengembangan (Litbang)] terhitung sejak Juli 2012, kemudian beliau dipercaya sebagai Kepala Divisi PPS (Personalia, Pendiikan dan Security) kemudian mulai bulan Maret 2014 beliau dipercaya menjadi Kepala Divisi USO (Umum, Security & Operasional). Mulai 23 Februari 2015 beliau dipercaya menjadi Kepala Divisi Operasional, Dana & Security. Beliau menajabat sebagai Kepala Divisi ODD (Operasional dan Dana) sejak tanggal 14 November 2016. Saat ini beliau menjabat sebagai Kepala Divisi Kredit Kendaraan Bermotor dan Asuransi (KKA) sejak tanggal 15 Mei 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('21', null, 'Siti Fauziyah, S.E', 'Lahir pada tahun 1978 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir S1 Jurusan Ekonomi di Universitas Jendral Soedirman Purwokerto. Siti Fauziyah, S.E. bergabung dengan BPR Bank Surya Yudha pada tahun 1999 dan ditempatkan di Kantor Cabang Mandiraja sebagai Staf Marketing, tahun 2001 dimutasi ke Kantor Kas Pasar Besar Banjarnegara dengan jabatan yang sama, tahun 2001 dimutasi ke Bagian Operasional Kantor Pusat sebagai staf administrasi kredit, tahun 2001 dimutasi ke Bagian Internal Audit sebagai staf, tahun 2001 dimutasi ke Bagian Pembukuan, Sekretariat dan Personalia sebagai staf, tahun 2004 dimutasi ke bagian Internal Audit sebagai staf, 2005 sebagai sebagai Wakil Kepala Seksi Bagian Internal Audit, tahun 2006 sebagai sebagai Kepala Seksi di Bagian Internal Audit, tahun 2006 sebagai Koordinator Satuan Pengawas Intern, tahun 2007 sebagai Kepala Seksi Senior di Bagian Satuan Pengawas Intern, tahun 2010 sebagai sebagai Wakil Kepala Bagian di Bagian SKAI, tahun 2011 sebagai Wakabag di Bagian SKAI, tahun 2011 sebagai Kepala Bagian Teknologi Sistem Informasi (TSI) dan tahun 2011 dipercaya sebagai Kabag Pendidikan dan Litbang. Semenjak 22 Juli 2013 beliau dipercaya sebagai kepala bagian personalia dan pada bulan Maret 2014 beliau dipromosikan sebagai Kepala Divisi PPP (Personalia, Pembukuan & Pendidikan. Mulai 23 Februari 2015 beliau dipercaya menjabat sebagai Wakil Kepala Divisi IT. Pada tangal 10 Desmber 2015, beliau dipercaya sebagai Wakil Kepala Divisi Non Operasional. Saat ini beliau menjabat sebagai Kepala Divisi Non Operasional sejak tanggal 17 Desember 2016.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('22', null, 'Agus Budi Santoso, S.E.', 'Lahir pada tahun 1964 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Agus Budi Santoso, S.E. bergabung dengan BPR Bank Surya Yudha sejak tahun 1992 sebagai staf marketing, kemudian di tahun 1993 sebagai Kepala Seksi Kas Pasar Besar. Pada tahun 1994 beliau dimutasi ke Kas Mandiraja. Pada tahun 1996 beliau dipromosikan ke Bagian PHBKIS. Dan pada tahun 1999 Beliau dipercaya menjabat sebagai Direktur dan pada tahun 2009 beliau dipromosikan menjadi Direktur Utama hingga Juli 2015. Mulai bulan Agustus 2015 beliau ditugaskan menjadi Kepala WIlayah I. Saat ini beliau dipercaya sebagai Kepala Divisi Operasional, Dana danTreasury(ODT) sejak 15 Mei 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('23', null, 'Anindita Alisia A., S.Kom', 'Lahir pada tahun 1992 di Makasar, memiliki latar belakang pendidikan terakhir S1 Jurusan Teknik Informatika di Institut Teknologi Sepuluh Nopember Surabaya. Beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada November 2014 dan menjabat sebagai Kepala BagianElectronic Banking and Product Development. Pada 2016, beliau dipercaya menjabat sebagai Kepala BagianMarketing Communication. Pada 2017, beliau menjabat sebagai Wakil Kepala DivisiMarketing Communication, Satuan Kerja Kepatuhan & Manajemen Resiko, dan Pendidikan.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('24', null, 'Ashar Fathudi, S.E', 'Lahir pada tahun 1972 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Jendra Soedirman Purwokerto. Ahar Fathudi, S.E. bergabung dengan BPR Bank Surya Yudha pada Mei 1995 sebagai staf marketing Cabang Wanadadi. Pada tahun 2000, beliau dipercaya sebagai Wakil Kepala Cabang Utama sampai dengan tahun 2006, kemudian dimutasi ke Kantor Cabang Klampok sebagai Wakil Kepala Cabang sampai dengan tahun 2009. Pada Oktober 2009 dipromosikan sebagai Kepala Cabang Dieng. Pada 03 Maret 2017, beliau dipromosikan sebagai Kepala Cabang Utama sampai saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('25', null, 'Drs. Yudhi Saptana', 'Lahir pada tahun 1963 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 di Universitas Widya Mataram Yogyakarta. Drs. Yudhi Saptana mengawali karirnya di BPR Bank Surya Yudha sebagai tenaga marketing di wilayah Wanadadi. Pada tahun 1998 beliau menjabat sebagai Kepala Seksi Dana dan Kredit Kantor Pusat, dan dua tahun kemudian di tahun 2000 jabatannya meningkat menjadi Kepala Cabang Utama. Drs. Yudhi Saptana pada tahun 2002-2003 dimutasi ke BPR Surya Yudha Wonosobo sebagai Kepala Bagian Kredit, kemudian di bulan Oktober 2003 dimutasi kembali ke PT. BPR Surya Yudhakencana Banjarnegara untuk menjabat sebagai Kepala Cabang Utama. Pada 1 Juli 2016, beliau dimutasi ke Bagian PHBKIS sebagai Kepala Bagian. Saat ini Beliau menjabat sebagai Kepala Cabang Pasar Besar sejak tanggal 01 Maret 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('26', null, 'Ariyanto, S.E.', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Widyawiwaha Yogyakarta. Ariyanto, S.E. mulai bergabung dengan BPR Bank Surya Yudha pada Maret 2005 staf Bagian PHBKIS. Setelah itu dimutasi ke Cabang Singamerta. Karir beliau mulai meningkat pada tahun 2010 dengan menjabat sebagai Kepala Kas Madukara dan pada tahun 2011 beliau diangkat sebagai Wakil Kepala Cabang Singamerta. Pada bulan November 2014 beliau diangkat menjadi Kepala Cabang Mandiraja. Pada tanggal 13 Juli 2016, beliau dimutasi ke kantor Cabang Singamerta sebagai Kepala Cabang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('27', null, 'Thoufik Hidayat, S.H', 'Lahir pada tahun 1977 di Banjarnegaram memiliki latar belakang pendidikan S1 Hukum di Universitas Wijaya Kusuma Purwokerto lulus pada tahun 2016. Thoufik Hidayat, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 2001 di Kantor Cabang Mandiraja. Pada tahun 2003, dimutasi ke Kantor Cabang Purwonegoro. Pada tahun 2007 dipromosikan sebagai Wakil Kepala Seksi di Kantor Cabang Purbalingga. Dipromosikan menjadi Kepala Kas Tunggara pada tahun 2008. Dipromosikan menjadi Wakil Kepala Cabang Singamerta pada tahun 2010. Pada tahun 2011 dimutasi ke Kantor Cabang Batur sebagai Wakil Kepala Cabang. Pada tahun 2012 dimutasi sebagai Wakil Kepala Cabang di Kantor Cabang Klampok. Pada tahun 2015 dimuatsi ke Kantor Cabang Pasar Besar sebagai Wakil Kepala Cabang. Pada tahun 2016 dimutasi ke Kantor Cabang Mandiraja dan pada 19 Mei 2016 dimutasi ke Kantor Cabang Purwonegoro sebagai Wakil Kepala Cabang. Beliau dipromosikan sebagai Kepala Cabang Pasar Besar sejak 13 Juli 2016. Saat ini beliau dipercaya sebagai Kepala Cabang Purwonegoro sejak 01 Maret 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('28', null, 'Saryono, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman. Saryono, S.E. mulai bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tahun 1997 dan dipercaya sebagai Staff Marketing Cabang Wanadadi. Terhitung sejak tanggal 21 Maret 2001, beliau diangkat sebagai Kasi Dana di Cabang Wanadadi. Setelah hampir 3 tahun menjabat sebagai Kasi Dana di Cabang Wanadadi, beliau dipromosikan sebagai Kasi Kredit di Cabang Wanadadi. Kemudian beliau diangkat sebagai Kasi Senior di Cabang Wanadadi dan menjabat kurang lebih 3 tahun. Setelah hampir 10 tahun, beliau diangkat sebagai Wakil Kepala Cabang di BPR Bank Surya Yudha Cabang Wanadadi. Pada tanggal 16 Maret 2009, beliau dipercaya sebagai Kepala Kantor Kas Pasar Besar Banjarnegara. Dan pada tanggal 07 September 2009 sampai 08 Februari 2010, beliau dipercaya sebagai Kepala Cabang Singamerta. Tanggal 08 Februari 2010 dimutasi ke Cabang Batur sebagai Kepala Cabang. Sejak 27 September 2010 Saryono, S.E. telah dipercaya kembali oleh manajemen sebagai Kepala Cabang Pasar Besar Banjarnegara. Pada tanggal 01 April 2015 beliau dimutasi ke Bagian PHBKIS sebagai Kepala Bagian. Pada tanggal 23 Oktober 2015, beliau dipercaya kembali sebagai Kepala Cabang Pasar Besar. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Cabang Klampok.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('29', null, 'M. Makhmuri., S.E', 'Lahir pada tahun 1985 di Banjarnegara, memiliki latar belakang pendidikan S1 Fakultas Ekonomi di STIE Cendekia Karya Utama. M. Makhmuri, S.E. memulai karir di BPR Bank Surya Yudha sebagai AO (Account Officer). Pada tahun 2011 dipromosikan sebagai Wakil Kepala Kas Sokaraja Cabang Purwokerto. Beliau dimutasi ke Kantor Kas Pasar Wage Cabang Purwokerto sebagai Wakil Kepala Kas pada tahun 2012. Pada tahun 2014 M. Makhmuri, S.E. dipercaya sebagai Kepala Kas Banyumas pada Mei 2012. Pada 2015 beliau dipromiskan menjadi Wakil Kepala Cabang Banyumas. Pada tahun 2016 beliau dimutasi ke Kantor Cabang Purbalingga sebagai Wakil Kepala Cabang. Dan saat ini beliau menjabat sebagai Kepala Cabang Mandiraja sejak 02 November 2016.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('30', null, 'Bondan Wahyu Nirboyo, S.E.', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir di STIE Widya Wiwaha Yogyakarta. Bondan Wahyu Nirboyo, S.E. bergabung dengan BPR Bank Surya Yudha sejak Mei 2006 sebagai Staf marketing Cabang Utama kemudian pada Juli 2010 beliau dipromosikan sebagai Kepala Kas Bawang dan pada tahun 2011 beliau dipromosikan menjadi Wakil Kepala Cabang Purwonegoro. Pada tanggal 7 Oktober 2013 beliau diberi kepercayaan untuk menjadi Kepala Cabang Mandiraja. Mulai bulan April 2014 beliau dimutasikan ke Cabang Bobotsari sebagai Kepala Cabang. Pada tahun 2015, beliau dipercaya sebagai Kepala Cabang Wanadadi sejak tanggal 26 Oktober 2015.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('31', null, 'Sigit Dwi Sarwoko', 'Lahir pada tahun 1991 di Banjarnegara, memiliki latar belakang pendidikan terakhir SMK Cokroaminoto 2 Banjarnegara lulus pada tahun 2009. Sigit Dwi Sarwoko bergabung dengan BPR Bank Surya Yudha sejak November 2009 sebagai Staf Bagian Operasional danElectronic Data ProcessingKantor Pusat. Pada bulan Maret 2010 dimutasi sebagai Marketing di Kantor Cabang Utama. Pada bulan Februari 2012 dimutasi ke Kantor Cabang Wanadadi sebagaiAccount OfficerKantor Cabang Wanadadi. Pada bulan Maret 2014, beliau dipromosikan sebagai Wakil Kepala Seksi Kantor Cabang Wanadadi. Pada bulan Maret 2015, beliau dipercaya sebagai Wakil Kepala Kas Rakit Cabang Wanadadi. Pada bulan April 2015 dipromosikan sebagai Kepala Kas Punggelan Cabang Wanadadi. Pada bulan Juli 2016 dipromosikan sebagai Wakil Kepala Cabang Wanadadi. Pada bulan Maret 2017 dipercaya sebagai Ketua Kelompok Kerja Punggelan. Saat ini beliau menjabat sebagai Kepala Cabang Punggelan sejak 09 Juni 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('32', null, 'Zaenal Abidin, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas di STIE Widya Wiwaha Yogyakarta. Zaenal Abidin, S.E. masuk sebagai Staff Marketing di Cabang Mandiraja tahun 1999 dan pada tahun 2003 sebagai Wakil Kepala Seksi, tahun 2005 sebagai Kepala Seksi (Kasi), tahun 2009 sebagai Wakil Kepala Cabang Purwonegoro, kemudian menduduki jabatan sebagai Wakil Kepala Cabang Wanadadi dan dimutasikan menjadi Kepala Cabang Puwonegoro per tanggal 27 April 2015. Saat ini beliau dipercaya sebagai Kepala Cabang Karangkobar sejak tanggal 06 Maret 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('33', null, 'Noor Alam Rudwiansyah, S.E', 'Lahir di Banjarnegara 05 Desember 1982. Memiliki latar belakang pendidikan S1 Ekonomi di Universitas Jendral Soedirman lulus pada tahun 2006. Bergabung dengan BPR Bank Surya Yudha pada 03 April 2006 sebagai staf Marketing di Kantor Kas Pasar Besar. Pada Juli 2010 dipercaya menjadi Wakil Kepala Kas di Kantor Kas Rembang. Pada November 2010 dipromosikan menjadi Kepala Kas Karangmoncol. Bulan Maret 2013 dimutasi ke Kantor Kas Rembang sebagai Kepala Kas. Pada Bulan Maret 2014, dipromosikan menjadi Wakil Kepala Cabang Karangkobar. Pada bulan Mei 2016 dimutasi ke Kantor Cabang Wanadadi sebagai Wakil Kepala Cabang. Saat ini beliau dipercaya menjadi Kepala Cabang Kalibening sejak 13 Juli 2016.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('34', null, 'Agung Sindhi Nugroho, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir di Universitas Jenderal Soedirman Purwokerto. Agung Sindhi Nugroho, S.E. pada tanggal 10 Desember 2003 bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara sebagai Staf Bagian Umum Kantor Pusat. Dan karirnya mulai meningkat pada tahun 2006 dengan diangkat menjadi Wakil Kepala Seksi Cabang Karangkobar. Dan pada tahun 2008 beliau dipromosikan menjadi Koordinator Kas Pagentan Cabang Karangkobar. Kemudian pada tahun 2009 – 2010 beliau menjabat menjadi Wakil Kepala Cabang Karangkobar. Dan pada tahun 2011 beliau dimutasikan ke Cabang Dieng dan menjabat sebagai Kepala Cabang. Dan beliau dimutasikan lagi pada akhir tahun 2011 menjadi Kepala Cabang Karangkobar. Mulai bulan April 2014 beliau dimutasikan ke Cabang Pagentan sebagai Kepala Cabang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('35', null, 'Agus Budiyanto, A.Md.', 'Lahir pada tahun 1975 di Banjarnegara, memliki latar belakang pendidikan terakhirD3 Sekolah Tinggi Pembangunan Masyarakat Desa Yogyakarta.Agus Budiyanto, A.Md. bergabung dengan BPR Bank Surya Yudha sejak Maret 2008 sebagai Staf marketing di Cabang Karangkobar. Pada bulan April 2009 Beliau dipromosikan menjadi Kepala Kas Pejawaran. Pada Januari 2011 Beliau diangkat menjadi Wakil Kepala Cabang Batur hingga Desember 2011, kemudian Beliau dimutasi ke Cabang Pekalongan dan pada bulan Februari 2012 beliau dimutasi ke Cabang Karangkobar. Pada bulan Juni 2015 beliau dipromosikan menjadi Kepala Cabang Kalibening. Mulai bulan September 2015 beliau dimutasi ke Cabang Batur sebagai Kepala Cabang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('36', null, 'Teguh Miswanto', 'Lahir pada tahun 1988 di Banjarnegara. Memiliki pendidikan terakhir SMK Pancha Bhakti lulus pada tahun 2007. Memulai karir di BPR Bank Surya Yudha bulan September 2011 di Kantor Kas Pagedongan Cabang Pasar Besar. Pada bulan April 2015, beliau dipromosikan sebagai Kepala Kas Pagedongan Cabang Pasar Besar. Pada bulan November 2016, beliau dipromosikan sebagai Wakil Kepala Cabang Singamerta. Saat ini beliau menjabat sebagai Kepala Cabang Dieng sejak 03 Mei 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('37', null, 'Darminto', 'Lahir pada tahun 1983 di Pekalongan, memiliki latar belakang pendidikan terakhir di SMU PGRI 2 Kajen. Darminto bergabung dengan BPR Bank Surya Yudha sebagai marketing di Kantor Kas Kalibening pada tahun 2004. Pada tahun 2006 beliau menjadi AO Kas Kalibening. Pada tahun 2009, beliau dipromosikan menjadi Wakil Kepala Seksi Yunior Kantor Cabang Kalibening dan pada tahun 2011 beliau dimutasi ke Kantor Cabang Pekalongan sebagai Wakil Kepala Seksi. Pada tahun 2013 beliau dipercaya menjadi Wakil Kepala Cabang Pekalongan. Pada 01 September 2015 beliau dipromosikan menjadi Kepala Cabang Kalibening. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Cabang Pekalongan.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('38', null, 'Handi Ria Purnama Putra, S.E', 'Lahir pada tahun 1983 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE STIKUBANK Semarang. Handi Ria Purnama Putra, S.E. bergabung dengan BPR Bank Surya Yudha dimulai pada bulan Oktober 2007 sebagai staff di Kantor Cabang Purbalingga. Bulan Maret 2008 beliau menjadi marketing di Kantor Cabang Purbalingga. Pada bulan Maret 2010 beliau menjadi AO di Kantor Kas Kemangkon Cabang Purbalingga. Bulan Juli 2010 beliau diangkat menjadi Wakil Kepala Kantor Kas Kemangkon. Pada bulan September 2014 beliau menjadi Wakil Kepala Cabang Purbalingga. Dan pada Oktober 2015 beliau dipromosikan menjadi Kepala Cabang Bobotsari.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('39', null, 'Dian Agung Sasongko, S.E', 'Lahir pada tahun 1983 di Purbalingga, memiliki latar belakang pendidikan terakhir S1 Ekonomi di Universitas Muhammadiyah Yogyakarta. Dian Agung Sasongko, S.E. memulai karir di BPR Bank Surya Yudha pada tahun 2009 sebagai marketing di Kantor Cabang Bobotsari. Pada tahun 2012 dipromosikan sebagai Wakil Kepala Seksi di Cabang Bobotsari. Pada tahun 2013 dimutasi ke Kantor Kas Karangreja sebagai Wakil Kepala Kas. Pada tahun 2014 dipercaya sebagai Kepala Kas Karangreja. Pada 2015 dipromiskan menjadi Wakil Kepala Cabang Bobotsari. Menjabat sebagai Kepala Cabang Mandiraja sejak 09 Agustus 2016. Saat ini beliau menjabat sebagai Kepala Cabang Karangreja sejak tanggal 20 Februari 2017.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('40', null, 'Supriyadi, A.Md', 'Lahir pada tahun 1974 di Purbalingga, memiliki latar belakang pendidikan terakhir D3 Universitas Negeri Jendral Soedirman Purwokerto. Supriyadi, A.Md bergabung dengan BPR Bank Surya Yudha sejak Juli 2001, pada bulan September 2005 beliau dipromosikan menjadi Kepala Kas di Bobotsari, pada April 2009 beliau diangkat menjadi Wakil Kepala Cabang Bobotsari dan pada 16 Juni 2014 beliau dipromosikan menjadi Kepala Cabang Rembang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('41', null, 'Joko Prasetyo, S.E', 'Lahir pada tahun 1982 di Banjarnegara, memiliki latar belakang pendidikan S1 Ekonomi Universitas Wijaya Kusuma Purwokerto. Joko Prasetyo bergabung dengan BPR Bank Surya Yudha pada 02 November 2009 sebagai AO Kantor Cabang Pasar Besar. Pada tahun 2013, beliau dipromosikan menjadi Kepala Kas Pagedongan. Pada tahun 2014, beliau dipercaya menjadi Wakil Kepala Cabang Madiraja. Pada tahun 2015 hingga sekarang beliau dipercaya sebagai Kepala Cabang Dieng. Pada bulan Mei 2017 dimutasi ke Kantor Cabang Purbalingga sebagai Kepala Cabang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('42', null, 'Muhamad Nur', 'Lahir pada tahun 1977 di Jakarta, memiliki latar belakang pendidikan SMA Bina Kusuma Pesanggrahan Jakarta Selatan. Muhamad Nur bergabung dengan BPR Bank Surya Yudha pada 01 Juni 2002 sebagai staf Kantor Cabang Klampok. Pada Desember 2007 beliau dipromosikan menjadi Kepala Kas Karanglewas Cabang Purwokerto. Pada Januari 2011 dipercaya sebagai Wakil Kepala Cabang Klampok. Pada November 2014 beliau dimutasi ke Kantor Cabang Purbalingga sebagai Wakil Kepala Cabang. Pada Oktober 2015 dimutasi ke Kantor Cabang Purwokerto. Pada Juli 2016 beliau dimutasi ke Kantor Cabang Banyumas sebagai Wakil Kepala Cabang. Mulai 08 September 2017 beliau dipercaya sebagai Kepala Cabang Banyumas.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('43', null, 'Wahyu Adi Wibowo, S.H', 'Lahir pada tahun 1983 di Purbalingga, memiliki latar belakang pendidikan S1 Hukum di Universitas Jendral Soedirman Purwokerto. Wahyu Adi Wibowo, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 2008 di Kantor PHBKIS sebagai marketing. Pada tahun 2012 dipromosikan menjadi Wakil Kepala Seksi PHBKIS. Pada tahun 2013 dipromosikan menjadi Kepala Kas Dukuhwaluh. Pada tahun 2015 dipromosikan menjadi Wakil Kepala Cabang Purwokerto. Pada tahun 2016 dimutasi ke Kantor Kelompok Kerja Kroya sebagai Kepala Kelompok Kerja. Pada tanggal 13 Juli 2016, dipromosikan menjadi Kepala Cabang Purwokerto.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('44', null, 'Tri Budiyanto, S.P', 'Lahir pada tahun 1982 di Cilacap, memiliki latar belakang terakhir S1 Fakultas Peternakan di Universitas Jendral Soedirman Purwokerto. Tri Budiyanto, S.Pt. Bergabung dengan BPR Bank Surya Yudha sebagai marketing Cabang Purwokerto pada Mei 2006. Pada Maret 2010 dipromosikan menjadi Kepala Kas Pabuaran Cabang Purwokerto. Pada April 2013 dipercaya menjadi Wakil Kepala Cabang Purwokerto. Pada Oktober 2015 dipromosikan menjadi Ketua Kelompok Kerja Ajibarang. Pada Mei 2016 beliau menjabat sebagai Kepala Cabang Ajibarang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('45', null, 'Zaenal Arifin', 'Lahir pada tahun 1985 di Banjarnegara, latar belakang pendidikan terakhir SMK Cokroaminoto 2 Banjarnegara. Zaenal Arifin bergabung dengan BPR Bank Surya Yudha sejak Juni 2004 sebagai Account Officer Cabang Wanadadi kemudian pada April 2007 beliau dipromosikan sebagai Wakil Kepala Kas Punggelan dan pada Januari 2010 beliau dipromosikan menjadi Kepala Kas Punggelan. Pada tahun 2011 beliau diberi kepercayaan untuk menjadi Wakil Kepala Cabang Wanadadi dan pada Maret 2013 beliau menjabat sebagai Kepala Cabang Wanadadi. Tahun 2015 beliau dipercaya sebagai Kepala Cabang Cilacap per tanggal 02 November 2015.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('46', null, 'Zaenal Faidzin, A.Md.', 'Lahir di Purbalingga, 05 Agustus 1982. Memiliki latar belakang pendidikan D3 Jurusan Manajemen Informatika di AMIK Veteran Purwokerto lulus pada tahun 2004. Bergabung dengan BPR Bank Surya Yudha sejak bulan Mei 2013 di Bagian PHBKIS. Pada bulan Februari 2015 sebagai Kepala Kas Rawalo Cabang Banyumas. Pada bulan November 2015 dipromosikan sebagai Wakil Kepala Cabang Cilacap. Saat ini beliau dipercaya sebagai Kepala Cabang Kroya sejak 14 November 2016.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('47', null, 'Andi Pratiswo', 'Lahir pada tahun 1978 di Banjarnegara, memiliki latar belakang Pendidikan terakhir SMK Cokroaminoto Banjarnegara lulus pada tahun 1999. Bergabung dengan BPR Bank Surya Yudha mulai 13 Maret 200 sebagai marketing di Pasar Besar selama 2 tahun (2000 s/d 2002). Kemudian dimutasikan ke Bagian PHBKIS pada tahun 2002 kemudian dimutasikan ke Bagian Internal Audit dan pada tahun 2008 dipromosikan sebagai Wakil Kepala Bagian SKAI. Pada tanggal 13 Februari 2013 beliau diberi kepercayaan menjadi Kepala Bagian SKAI dan menjabat sampai dengan sekarang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('48', null, 'Wirasto, S.E', 'Lahir pada tahun 1978 di Sragen, memiliki latar belakang pendidikan terkahir S1 Fakultas Ekonomi di STIE LPI Makasar. Wirasto, S.E. bergabung dengan BPR Bank Surya Yudha sejak Mei 2007 sebagai staf Kredit Motor. Pada tahun 2011 beliau dipromosikan menjadi Wakil Kepala Seksi Bagian PHBKIS. Pada tahun 2013 dipromosikan sebagai Wakil Kepala Bagian PHBKIS. Pada tahun 2014, beliau dimutasi ke Bagian PHBKIS. Saat ini beliau manjabat sebagai Kepala Bagian SKAI Tim A sejak 14 April 2016.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('49', null, 'Rendra Eka Wijaya, A.Md.', 'Lahir pada tahun 1973 di Jakarta, memiliki latar belakang pendidikan terkahir D3 di Akademi Keuangan dan Perbankan LPI Jakarta. Rendra Eka Wijaya, A.Md. bergabung dengan BPR. Bank Surya Yudha pada tahun 1997 dengan menjabat sebagai marketing. Sempat dimutasi dan dipromosikan di berbagai bagian, Rendra Eka Wijaya sempat menjabat sebagai Kepala Seksi Umum Cabang Pasar Besar, kepala seksi Internal Audit , Kepala Seksi Bagian Umum, Kepala Seksi Bagian PKB dan SKAI. Kemudian beliau dipromosikan menjadi Kepala Bagian Umum dan pada tanggal 21 Oktober 2013 beliau dimutasikan ke Bagian Pendidikan sebagai Kepala Bagian. Mulai September 2014 beliau dimutasi ke Bagian SKAI Tim B sebagai Kepala Bagian.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('50', null, 'Susi Faiqoh, A.Md', 'Lahir pada tahun 1978 di Banjarnegara, memiliki latar belakang pendidikan terakhir D3Administrasi Niaga di Politeknik Negeri Semarang.Susi Faiqoh, A.Md. bergabung dengan BPR Bank Surya Yudha pada tahun 2000 sebagai marketing di Kantor Cabang Wanadadi. Pada tanggal 11 Februari 2002, dimutasi ke Bagian Operasional sebagai Kasir. Pada tanggal 24 Januari 2007,beliau dimutasi menjadi Wakil Kepala Seksi Bagian SPI (Satuan Pengawas Intern). Pada tanggal 27 April 2010, beliau dimutasi menjadi Wakil Kepala Seksi Yunior di Kantor Cabang Pasar Besar. Pada tanggal 16 Mei 2011, beliau dimutasi dari Cabang Pasar Besar ke Bagian Pembukuan Kantor Pusat. Beliau dimutasi dari Bagian Pembukuan ke Bagian Personalia per tanggal 22 September 2011 sebagai Wakil Kepala Seksi Yunior. Pada 23 Maret 2013, beliau dipromosikan menjadi Wakil Kepala Seksi Senior Bagian Personalia, dan menjadi Kepala Seksi Yunior Personalia pada tanggal 16 Oktober 2013. Beliau dipromosikan sebagai Wakil Kepala Bagian Personalia pada tanggal 17 Maret 2014. Saat ini beliau menjadi Kepala Bagian Personalia sejak 22 Juni 2015 hingga sekarang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('51', null, 'Eni Mulyati, S.E', 'Lahir pada tahun 1973 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE Widya Wiwaha Yogyakarta. Eni Mulyati, S.E. bergabung dengan BPR Bank Surya Yudha pada bulan Desember tahun 1996 sebagai petugas marketing di Cabang Wanadadi. Pada tahun 2009 beliau diangkat menjadi Wakil Kepala Seksi Cabang Wanadadi. Pada Tahun 2011 beliau dimutasi ke Bagian SKAI. dan Pada tahun 2014 beliau dirpomosikan menjadi Kepala Bagian Pembukuan Kantor Pusat. Mulai bulan Februari 2015 beliau dipercaya menjadi Kepala Bagian Pendidikan. Kemudian mulai bulan Juli 2015 beliau dimutasi kembali ke Bagian Pembukuan sebagai Kepala Bagian.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('52', null, 'Aunur Rofiq', 'Lahir pada tahun 1975 di Surabaya, memiliki latar belakang pendidikan terakhir SMA PGRI 7 Surabaya. Aunur Rofiq bergabung dengan BPR Bank Surya Yudha sejak November 2004 sebagai Staf Bagian Umum kemudian tahun 2009 beliau dipromosikan sebagai Wakil Kepala Seksi dan pada tahun 2012 beliau dipromosikan menjadi Kepala Seksi. Pada bulan Maret 2013 beliau diberi kepercayaan untuk menjadi Wakil Kepala Bagian Umum dan mulai bulan Oktober 2013 beliau dipercaya sebagai Kepala Bagian Umum.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('53', null, 'Roni Good Andiyasa, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Widya Wiwaha Yogyakarta. Rony Good Andiyasa, S.E. Bergabung dengan BPR Bank Surya Yudha pada tahun 1995 dan menjadi staf marketing di Kas Keliling Karangkobar. Beliau juga pernah menjabat sebagai staf EDP pada tahun 1998 – 2001 dan pada tahun 2001 beliau dipromosikan menjadi Kepala Seksi Bagian EDP hingga tahun 2007. Karirnya semakin menanjak pada tahun 2009 dengan diangkat menjadi Kepala Cabang Singomerto. Belum genap satu tahun beliau dimutasikan ke Kas Pasar Besar yang akhirnya pada tahun 2010 menjadi Cabang Pasar Besar Banjarnegara dan beliau menduduki sebagai Kepala Cabang. Pada bulan September 2010 beliau dimutasikan kembali ke Cabang Karangkobar dan menjabat sebagai Wakil Kepala Cabang dan ditahun 2011 beliau diangkat menjadi Kepala Cabang Pokja Cabang Pagentan. Pada bulan Oktober 2011 beliau dimutasikan ke Cabang Kalibening sebagai Kepala Cabang dan mulai 15 Juni 2015 beliau dimutasi ke Bagian EDP Kantor Pusat sebagai Kepala Bagian.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('54', null, 'Sri Murwati, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE Widya Wiwaha Yogyakarta. Sri Murwati, S.E. bergabung dengan BPR Bank Surya Yudha pada bulan Juli tahun 2001 sebagai petugas marketing di Kas Pasar Besar. Pada tahun 2002 sampai dengan tahun 2003 menjabat sebagai marketing di Cabang Utama, pada tahun 2003 dimutasi ke Kas Singamerta sebagai petugas Pembukuan. Pada tahun 2005 dimutasi ke Bagian Operasional Kantor Pusat. Pada tahun 2011 beliau dipromosikan menjadi Wakil kepala Seksi Bagian Operasional dan pada tahun 2013 diangkat menjadi Kepala Seksi Bagian Operasional. Pada bulan Maret 2014 beliau diangkat menjadi kepala Bagian Operasional.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('55', null, 'Jacoeb Rs', 'Lahir pada tahun 1949 di Banjarnegara, Jacoeb RS. bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada 02 Mei 2011 sebagai Kepala seksi Security Kantor Pusat. Pada tanggal 02 Agustus 2011, beliau dipromosikan menjadi Kepala Bagian Satpam Kantor Pusat hingga sekarang.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('56', null, 'Teguh Santosa, A.Md.', 'Lahir pada tahun 1984 di Banjarnegara, memiliki latar belakang pendidikan terakhir D3 Ekonomi Akuntasi di Universitas Teknologi Yogyakarta. Teguh Santosa, A.Md. Mulai bergabung dengan BPR Bank Surya Yudha pada November 2010 sebagai staf marketing di Bagian PHBKIS. Pada bulan Juli 2011dipercaya menjadiAccount OfficerBagian PHBKIS. Pada tahun 2014 beliau dipromosikan menjadi Kepala Seksi Kredit Bagian PHBKIS. Pada September 2016 beliau kembali dipromosikan sebagai Wakil Kepala Bagian PHBKIS. Saat ini beliau menjabat Kepala Bagian PHBKIS sejak tanggal 01 Maret 207.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('57', null, 'Agus Sudiyanto', 'Lahir pada tahun 1963 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang bekerja di VINLUX IN’L CORP, Jakarta sebagai Computer Operator pada tahun 1988-1989, merangkap bekerja pada salah satu BPR di Sidoarjo Surabaya hingga tahun 1991. Beliau mulai bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tahun 1991-2003 dan menduduki jabatan sebagai Kepala Divisi Kredit, pada tahun 2003-2010 Agus Sudiyanto menjabat sebagai Kepala Bagian Internal Audit di PT. BPR Surya Yudha Kertek – Wonosobo. Saat ini Agus Sudiyanto menjabat sebagai Pemegang Saham PT. BPR Surya Yudha Kertek – Wonosobo dan Direktur PT. Sarana Dewa Putra.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('58', null, 'Saptono Setyartoyo', 'Lahir pada tahun 1968 di Brebes dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan Fakultas Peternakan Universitas Diponegoro Semarang pada tahun 1993. Memulai karir pada tahun 1997-2010 bekerja di PT. BPR Surya Yudhakencana Banjarnegara dengan jabatan terakhir sebagai Kepala Wilayah. Setelah itu beliau bergabung dengan PT. BPR Surya Yudha pada Maret 2010 dan ditugaskan sebagai Kadiv Kredit sampai dengan 25 Mei 2010. Pada Juni 2010 beliau menjabat sebagai Direktur Utama PT. BPR Surya Yudha.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('59', null, 'Amin Sutrisno', 'Lahir pada tahun 1971 di Wonosobo dengan kewarganegaraan Indonesia. Memiliki latarbelakang pendidikan STIE Kerjasama Yogyakarta pada tahun 1995. Pada tahun 1998- 2008 beliau bergabung dengan PT. BPR Surya Yudha dengan menjabat sebagai Wakil Kepala Cabang Temanggung, tahun 2008-2009 beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara dengan jabatan terakhir sebagai Kepala Cabang Singamerta, kemudian bergabung kembali dengan PT. BPR Surya Yudha menjabat sebagai Kepala Cabang Temanggung dan sejak tahun 2011 hingga bulan Agustus 2012 jabatan beliau sebagai Kepala Divisi Kredit. Saat ini beliau menjabat sebagai Direktur PT. BPR Surya Yudha sejak 23 Agustus 2012.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('60', null, 'Sucipto', 'Sucipto bergabung dengan PT. BPR Surya Yudhakencana sejak tahun 1996 sebagai Staf Marketing dan tahun 1997 sebagai Account Officer. Pada tahun 1998 beliau dimutasikan ke PT. BPR Surya Yudha sebagai Account Officer. Tahun 2001 sampai dengan tahun 2003 beliau menjabat sebagai Kepala Seksi Kantor pelayanan Kas Pasar Wonosobo. Pada pertengahan tahun 2003 beliau dipromosikan sebagai Wakil Kepala bagian Kredit dan di tahun 2005 diangkat sebagai Kepala Bagian Kredit. Dengan adanya pembukaan Kantor Cabang Wonosobo yang beroperasional sejak tanggal 02 Agustus 2010, beliau dipercaya untuk menduduki jabatan sebagai kepala Cabang Wonosobo. Pada bulan Mei 2010 beliau diangkat sebagai Kepala Cabang Temanggung. Bulan Februari 2012 hingga 22 September 2012 beliau menjabat sebagai Wakil Kepala Divisi Kredit, selanjutnya beliau menjabat sebagai Kepala Divisi Kredit dan saat ini beliau dipercaya menjabat sebagai Kepala Wilayah I.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('61', null, 'Swasta Dwi Martono', 'Beliau bergabung dengan PT. BPR Surya Yudha mulai tahun 2000 sebagai staf marketing, pada tahun 2005 beliau menjadi Account Officer di Kantor Pelayanan Kas Sapuran. Pada tahun 2006 beliau dipromosikan sebagai Kepala Seksi Kantor Pusat Kertek dan pada tahun 2010 beliau dipercaya menduduki Wakil Kepala Cabang Wonosobo serta selanjutnya beliau menjabat sebagai Kepala Cabang Wonosobo. Tahun 2014 hingga sekarang beliau dipercaya menjabat sebagai kepala Wilayah II yang membawahi Kantor Cabang Temanggung, Kantor Cabang Ngadirejo dan Kantor Cabang Parakan.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('62', null, 'Atik Handayani', 'Lahir pada tahun 1976 di Wonosobo kewarganegaran Indonesia. Atik Handayani mengawali karirnya di PT. BPR Surya Yudha sejak tanggal 8 Maret 1999 sebagai staf Marketing, tahun 2000 dimutasikan ke Bagian Operasional sebagai staf Administrasi Kredit, tahun 2002 dimutasikan ke Bagian Accounting sebagai staf sampai dengan tahun 2005. Kemudian tahun 2006 beliau dipromosikan menjadi Wakasi PSPU sampai dengan tahun 2010, pada tahun 2011 dipromosikan menjadi Kasi Yr di Bagian PSPU. Pada bulan Februari 2012 beliau dipercaya managemen untuk menjabat sebagai Kepala Bagian PSPU (Personalia, Sekretariat, Pembukuan dan Umum) di Kantor Pusat. Dan mulai tanggal 25 April 2015 beliau menjabat sebagai Wakil Devisi Non Operasional. Pada tanggal 25 Mei 2016 beliau dipercaya managemen untuk menjabat sebagai Kepala Divisi Non Operasional.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('63', null, 'Bagus Anom Warsito', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2003 sebagai staf marketing. Pada tahun 2006 beliau dipromosikan sebagai koordinator Pelayanan Kas Sapuran dan pada tahun 2008-2009 beliau menjabat sebagai Kepala Kantor Kas Sapuran. Pada pertengahan tahun 2009, beliau dipromosikan sebagai Wakil Kepala Cabang Sapuran dan tahun 2010 beliau dimutasikan sebagai Wakil Kepala Bagian Kredit di Kantor Pusat Kertek. Pada tahun 2011 beliau dimutasikan sebagai Wakil Kepala Bagian Internal Audit dan 2012-2014 dimutasikan sebagai Wakil Kepala Cabang Utama. Dengan adanya pembukaan Kantor Cabang Kaliwiro yang beropersional mulai bulan Juni 2016 beliau dipercaya untuk menduduki jabatan sebagai Kepala Cabang Kaliwiro. Pada bulan Januari 2017 beliau dimutasikan sebagai Kepala Cabang Utama hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('64', null, 'Haris Gunawan', 'Haris Gunawan bergabung dengan PT. BPR Surya Yudha sejak tahun 2000 sebagai staf Marketing dan tahun 2002 sebagai Account Officer. Pada tahun 2004 beliau diangkat menjadi Wakil kepala Seksi Kredit PT. BPR Surya Yudha. Tahun 2005-2006 beliau menjabat sebagai Kepala Kas Pasar Induk Wonosobo. Pada pertengahan tahun 2008 beliau dimutasikan ke Cabang Temanggung menduduki jabatan sebagai Wakil kepala Cabang Temanggung. April 2013 beliau dipromosikan sebagai Kepala Cabang Temanggung. Pada tahun 2014 beliau di mutasikan dan menjabat sebagai Kepala Cabang Wonosobo hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('65', null, 'Winarno', 'Tahun 2006 Winarno bergabung dengan PT. BPR Surya Yudha dan ditugaskan sebagai Staf Marketing Kantor Pusat Kertek. Pada tahun 2010 beliau diangkat menjadi Kepala Kas Kepil. Tahun 2012 beliau menjabat sebagai wakil kepala Cabang Utama. Sejak tahun 2014 beliau di promosikan menjadi kepala cabang Temanggung dan bulan Mei 2015 dipercaya menduduki Kepala Cabang Sapuran hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('66', null, 'Mara Yoki Firmansyah', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2008 sebagau staf EDP dan tahun 2010 dimutasikan ke Kantor Kas Pasar Wonosobo sebagai Account Officer. Pada bulan Juni 2011 menjabat sebagai Kepala Kas Pasar Wonosobo sampai dengan bulan April 2014 kemudian beliau dimutasikan ke Kantor Kas Selomerto dan menduduki Jabatan sebagai Kepala Kantor Kas Selomerto. Pada bulan Desember 2014 beliau dipromosikan sebagai Wakil Kepala Cabang Sapuran, tahun 2015 beliau dimutasikan ke Kantor Cabang Wonosobo sebagai Wakil Kepala Cabang hingga tahun 2016. Seiring dengan adanya pembukaan Kantor Cabang Selomerto yang beroperasional mulai tanggal 28 Desember 2016, beliau dipercaya menduduki Jabatan Kepala Cabang di Kantor Cabang Selomerto hingga saat ini', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('67', null, 'Aris Saifudin', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2003 sebagai staf marketing di Kantor Pelayanan Kas Pasar Wonosobo. Pada tahun 2006 beliau dimutasi menjadi staf marketing di Kantor Kas Kaliwiro. Pada tahun 2010 beliau dipromosikan menjadi Kepala Kantor Kas Wadaslintang dan pada tahun 2011 beliau dimutasi sebagai Kepala Kantor Kas Kaliwiro. Tahun 2012-2016 beliau dipromosikan sebagai Wakil kepala Cabang Wonosobo dan pada awal tahun 2017 beliau dipercaya menduduki Jabatan sebabai Kepala Cabang Kaliwiro hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('68', null, 'Bowo Wardiyanto', 'Mulai bergabung dengan PT. BPR Surya Yudha pada bulan Oktober 1999 dengan mengawali karir sebagai OB di Kantor Pusat Kertek. Dan pada tahun 2001 beliau di angkat sebagai staf untuk diperbantukan di bagian EDP hingga tahun 2002, kemudian pada tahun yang sama beliau di pindah ke bagian Marketing dan Account Officer di Cabang Utama Kertek hingga kurang lebih 3 tahun dan pada tahun 2005-2008 diangkat sebagai Koordinator cabang Utama. Pada tahun 2008-2009 beliau diangkat sebagai Wakil kepala Kantor Kas Sapuran, tahun 2009 beliau diangkat sebagai Kepala Kantor Kas Kepil dan pada bulan Agustus 2010 beliau kembali di pindah ke Sapuran menjabat sebagai Wakil Kepala cabang Sapuran. Pada bulan Mei 2015 beliau menjadi Kepala Cabang Temanggung hingga saat ini', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('69', null, 'Mukhammad Budiyanto', 'Mukhammad Budiyanto bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai staf Marketing dan tahun 2009 sebagai Account Officer. Pada tahun 2010 beliau diangkat menjadi kepala Kas Garung PT. BPR Surya Yudha. Tahun 2012-2014 beliau menjabat sebagai Wakil Kepala Cabang Wonosobo. Pada akhir tahun 2014 beliau dimutasikan ke Cabang Utama, beliau menduduki jabatan sebagai kepala Cabang Utama dan sekarang beliau menjabat sebagai Kepala Cabang Ngadirejo hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('70', null, 'Agus Kiswoto', 'Agus Kiswoto S.T memiliki latarbelakang pendidikan teknik perminyakan UPN Yogakarta. Beliau bergabung dengan PT. BPR Surya Yudha sejak bulan Mei 2007 sebagai staff marketing. Pada tahun 2010 dengan adanya pembukaan Kantor Pelayanan Kas Paponan beliau dipromosikan sebagai Kepala Seksi Kantor Pelayanan Kas Paponan. Pada awal tahun 2011 beliau dimutasikan sebagai Kepala Pelayanan Kas Parakan sampai dengan tahun 2013 dan dipromosikan sebagai Wakil Kepala Cabang Sapuran. Pada tahun 2014 beliau dimutasi ke Kantor Cabang Temanggung sebagai Wakil Kepala Cabang. Dengan adanya pembukaan Kantor Cabang Parakan yang mulai beroperasional mulai tanggal 14 Oktober 2016 beliau dipercaya menduduki jabatan sebagai Kepala Cabang Parakan hingga saat ini.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('71', null, 'Adhias Gumala (', 'Pada tanggal 24 Desember 1997 Adhias Gumala bergabung dengan PT. BPR Surya Yudha dengan mengawali karirnya sebagai staf Marketing. Pada tahun 1999 beliau diangkat menjadi staf EDP, tahun 2004 diangkat menjadi Wakasi EDP dan tahun 2006 menjadi Kasi EDP. Pada tahun 2008 beliau dimutasikan ke Cabang Temanggung dan dipercaya untuk menjabat sebagai Wakil Kepala Cabang Temanggung. Pada tahun 2009 dengan adanya peningkatan status Kas Sapuran menjadi Cabang Sapuran pada bulan September 2009, beliau diangkat sebagai Kepala Cabang Sapuran. Mulai tanggal 22 September 2012 beliau menjabat sebagai Kepala Bagian Kepatuhan dan per tanggal 25 Oktober 2013 hingga saat ini beliau menjabat sebagai Kepala Bagian Internal Audit PT. BPR Surya Yudha.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('72', null, 'Rabindra Akhmad Riza', 'Rabindra Akhmad Riza memiliki latarbelakang pendidikan di Universitas Islam Indonesia tahun 2002. Rabindra Ahmad Riza bergabung dengan PT. BPR Surya Yudha tahun 2013 dengan mengawali karirnya sebagai staf marketing di Kantor Pusat Kertek. Pada tahun 2008 beliau diangkat menjadi Wakil Kepala Seksi Kantor Kas Pasar Wonosobo, tahun 2009 beliau diangkat menjadi Kepala Kantor Kas Pasar Wonosobo kurang lebih 2 tahun dan Juni 2011 beliau diangkat sebagai Kepala Kas Selomerto. Beliau menjabat sebagai Wakil Kepala Cabang Wonosobo mulai November 2011 sampai dengan September 2012. Pada 22 September 2012 beliau dipromosikan menjadi Kepala Cabang Utama Kertek dan mulai 1 Januari 2015 beliau dimutasi sebagai Kepala Bagian Kepatuhan, kini beliau dipercaya menjabat sebagai Kepala Bagian Kepatuhan dan Manajemen Risiko.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('73', null, 'Sri Rianasari Hermawati', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai marketing di bagian PHBKIS. Pada tahun 2008 diangkat sebagai Wakil Kepala Seksi di Kantor Cabang Temanggung dan pada bulan Januari 2011 dipromosikan sebagai Kepala Seksi pada cabang yang sama. Dengan dibukanya Kantor Cabang Ngadirejo, kemudian pada bulan Mei 2011 beliau dipromosikan sebagai Wakil Kepala Cabang Ngadirejo. Selanjutnya pada bulan Februari 2012 beliau dimutasikan ke Kantor Cabang Temanggung sebagai Wakil Kepala Cabang dan selanjutnya pada bulan Oktober 2012 beliau ditugaskan sebagai Wakil Kepala Bagian Kepatuhan Pengendalian Risiko di Kantor Pusat PT. BPR Surya Yudha. Bulan April 2014, beliau kemudian ditugaskan sebagau Wakil Kepala Cabang di Kantor Cabang Temangung dan sejak bulan Oktober 2015 hingga saat ini beliau dipercaya menjabat sebagai Kepala Bagian Dana.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('74', null, 'Fitria Yulianingsih', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2002 sebagai Staf Marketing di Kantor Kas Pasar Wonosobo. Pada tahun 2009 dimutasi ke Kantor Kas Selomerto dan bulan Agustus 2010 dimutasi ke Kantor Cabang Wonosobo. Kemudian pada Bulan Oktober 2010 beliau dimutasi ke Kantor Pusat Kertek sebagai staf bagian Pembukuan. Diangkat menjadi Wakil Kepala Seksi Yunior pada bulan Februari 2012, tahun 2014-2015 menjabat sebagai Kepala Seksi Bagian Personalia, Pembukuan dan Pendidikan. Pada bulan April tahun 2015 dipromosikan sebagai Wakil Kepala Bagian Pembukuan dan April 2016 beliau dipercaya menduduki jabatan sebagai Kepala Bagian Pembukuan Kantor Pusat.', null, null, '1', '0');
INSERT INTO `direksi` VALUES ('75', null, 'Nova Artanto Mahardani', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai Back Office di Kantor Cabang Temanggung. Pada tahun 2012 diangkat sebagai Wakil Kepala Seksi Bagian PDE di Kantor Pusat Kertek dan pada tahun 2013 dipromosikan sebagai Kepala Seksi pada kantor yang sama. Pada April 2015 beliau dipromosikan sebagai Wakil Kepala Kepala Bagian PDE, April 2016 beliau dipercaya menjabat sebagai Kepala Bagian PDE. Dengan digabungnya bagian EDP dan EBD maka beliau dipercaya membawahi bagian tersebut hingga saat ini.', null, null, '1', '0');

-- ----------------------------
-- Table structure for direksi_timeline
-- ----------------------------
DROP TABLE IF EXISTS `direksi_timeline`;
CREATE TABLE `direksi_timeline` (
  `ID_TIMELINE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DIREKSI` int(11) DEFAULT NULL,
  `ID_RIWAYAT` int(11) DEFAULT NULL,
  `LOKASI` varchar(255) DEFAULT NULL,
  `DETAIL` varchar(255) DEFAULT NULL,
  `AWAL` date DEFAULT NULL,
  `AKHIR` date DEFAULT NULL,
  `KETERANGAN` text,
  `TIME` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_TIMELINE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of direksi_timeline
-- ----------------------------

-- ----------------------------
-- Table structure for d_linkage_kota
-- ----------------------------
DROP TABLE IF EXISTS `d_linkage_kota`;
CREATE TABLE `d_linkage_kota` (
  `ID_D_LINKAGE_KOTA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_LINKAGE` int(11) DEFAULT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `TGL_PENCAIRAN` date DEFAULT NULL,
  `TGL_JATUH_TEMPO` date DEFAULT NULL,
  `SUKU_BUNGA` double DEFAULT NULL,
  `PLATFOND` varchar(255) DEFAULT NULL,
  `BAKI_DEBET` varchar(255) DEFAULT NULL,
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_D_LINKAGE_KOTA`),
  KEY `ID_LINKAGE` (`ID_LINKAGE`,`ID_KOTA`) USING BTREE,
  CONSTRAINT `d_linkage_kota_ibfk_1` FOREIGN KEY (`ID_LINKAGE`, `ID_KOTA`) REFERENCES `linkage_kota` (`ID_LINKAGE`, `ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of d_linkage_kota
-- ----------------------------
INSERT INTO `d_linkage_kota` VALUES ('1', '3', '1', '2014-07-07', '2019-07-07', '9.5', '16.000.000.000', '5.866.666.661', '2017-10-30 09:24:38');
INSERT INTO `d_linkage_kota` VALUES ('2', '3', '1', '2015-08-28', '2020-08-28', '9.5', '10.000.000.000', '5.833.333.325', '2017-10-30 09:28:29');
INSERT INTO `d_linkage_kota` VALUES ('3', '3', '2', '2015-06-18', '2020-07-18', '9.5', '5.000.000.000', '2.750.000.004', '2017-10-30 09:29:48');
INSERT INTO `d_linkage_kota` VALUES ('4', '3', '2', '2015-09-28', '2018-09-28', '9.5', '5.000.000.000', '1.527.777.775', '2017-10-30 09:30:54');
INSERT INTO `d_linkage_kota` VALUES ('5', '4', '2', '2013-09-28', '2018-09-27', '10.25', '5.000.000.000', '1.130.862.174', '2017-10-30 09:32:01');
INSERT INTO `d_linkage_kota` VALUES ('6', '6', '1', '2016-01-14', '2021-01-25', '5', '30.000.000.000', '20.000.000.000', '2017-10-30 09:33:21');

-- ----------------------------
-- Table structure for d_tabungan
-- ----------------------------
DROP TABLE IF EXISTS `d_tabungan`;
CREATE TABLE `d_tabungan` (
  `ID_KOTA` int(11) NOT NULL,
  `ID_TABUNGAN` int(11) NOT NULL AUTO_INCREMENT,
  `NOMINAL` varchar(50) DEFAULT NULL,
  KEY `fk_d_tabungan_id_kota` (`ID_KOTA`) USING BTREE,
  KEY `fk_d_tabungan_id_tabungan` (`ID_TABUNGAN`) USING BTREE,
  CONSTRAINT `d_tabungan_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `d_tabungan_ibfk_2` FOREIGN KEY (`ID_TABUNGAN`) REFERENCES `tabungan` (`ID_TABUNGAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of d_tabungan
-- ----------------------------
INSERT INTO `d_tabungan` VALUES ('1', '1', '29.309.600.000');
INSERT INTO `d_tabungan` VALUES ('1', '2', '18.012.268.971');
INSERT INTO `d_tabungan` VALUES ('1', '3', '8.635.154.595');

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `ID_GROUP` int(11) NOT NULL AUTO_INCREMENT,
  `GROUP` varchar(255) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`ID_GROUP`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES ('1', 'A', 'DATA KONSOLIDASI', '1');
INSERT INTO `group` VALUES ('2', 'B', 'DATA PER WILAYAH', '1');
INSERT INTO `group` VALUES ('3', 'C', 'DATA PER CABANG', '1');
INSERT INTO `group` VALUES ('4', 'D', 'DATA PER KANTOR', '1');

-- ----------------------------
-- Table structure for import_cabang
-- ----------------------------
DROP TABLE IF EXISTS `import_cabang`;
CREATE TABLE `import_cabang` (
  `ID_IMPORT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CABANG` int(11) DEFAULT NULL,
  `ASET_REALISASI` varchar(45) DEFAULT NULL,
  `ASET_TARGET` varchar(45) DEFAULT NULL,
  `LABA_REALISASI` varchar(45) DEFAULT NULL,
  `LABA_TARGET` varchar(45) DEFAULT NULL,
  `BIAYA_REALISASI` varchar(45) DEFAULT NULL,
  `BIAYA_TARGET` varchar(45) DEFAULT NULL,
  `PENDAPATAN_REALISASI` varchar(45) DEFAULT NULL,
  `PENDAPATAN_TARGET` varchar(45) DEFAULT NULL,
  `TABUNGAN_REALISASI` varchar(45) DEFAULT NULL,
  `TABUNGAN_TARGET` varchar(45) DEFAULT NULL,
  `DEPOSITO_REALISASI` varchar(45) DEFAULT NULL,
  `DEPOSITO_TARGET` varchar(45) DEFAULT NULL,
  `KREDIT_REALISASI` varchar(45) DEFAULT NULL,
  `KREDIT_TARGET` varchar(45) DEFAULT NULL,
  `CAR` varchar(45) DEFAULT NULL,
  `ROA` varchar(45) DEFAULT NULL,
  `ROE` varchar(45) DEFAULT NULL,
  `BOPO` varchar(45) DEFAULT NULL,
  `CR` varchar(45) DEFAULT NULL,
  `LDR` varchar(45) DEFAULT NULL,
  `KAP` varchar(45) DEFAULT NULL,
  `NPL_GROSS` varchar(45) DEFAULT NULL,
  `NPL_NET` varchar(45) DEFAULT NULL,
  `NIM` varchar(45) DEFAULT NULL,
  `BULAN` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMPORT`),
  KEY `fk_import_cabang_cabang` (`ID_CABANG`) USING BTREE,
  CONSTRAINT `import_cabang_ibfk_1` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1091 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_cabang
-- ----------------------------
INSERT INTO `import_cabang` VALUES ('1001', '2', '51574902147', '51902819000', '146007580', '284605000', '633457375', '640431000', '633457375', '640431000', '17070938731', '18200693000', '11622180736', '11572563000', '51496038054', '52189943000', '-', '7.86', '-', '62,.1', '42797', '100.53', '3.46', '4.56', '3.63', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1002', '2', '52146375895', '52872545000', '340872593', '558995000', '1236485642', '1281112000', '1236485642', '1281112000', '16780488745', '18406872000', '11033257934', '11728898000', '51.654.472.25', '53293249000', '-', '7.47', '-', '63.05', '3.78', '98.44', '3.45', '4.46', '3.57', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1003', '2', '52923877602', '53992602000', '543045175', '846485000', '1901176450', '1928090000', '1901176450', '1928090000', '15861016264', '18649191000', '10527922577', '11884452000', '52208347069', '54330428000', '-', '7.16', '-', '63.94', '4.58', '100.57', '3.48', '4.42', '3.45', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1004', '2', '53614034880', '54895504000', '725328963', '1143593000', '2563496644', '2583667000', '2563496644', '2583667000', '16311900926', '18925904000', '10162671579', '12047465000', '52824008924', '55301044000', '-', '6.91', '-', '64.67', '4.67', '101.04', '3.78', '4.44', '3.49', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1005', '2', '48095950759', '56155372000', '971736333', '1444502000', '3185124099', '3427374000', '3185124099', '3427374000', '15687698706', '19222952222', '9457842730', '12222764000', '54345018296', '56.620.149.00', '-', '6.69', '-', '65.14', '2.74', '102.74', '04/06/2017', '4.86', '4.00', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1006', '2', '49642857130', '57478477000', '1171312733', '1711219000', '3847081956', '3962081000', '3847081956', '3962081000', '14518575076', '19522354000', '9867083520', '12344954000', '55450843284', '57870394000', '-', '6.34', '-', '66.35', '42950', '102.42', '3.88', '4.59', '3.76', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1007', '2', '37977041912', '58751286000', '1986791680', '1933540000', '4582417753', '4709667000', '4582417753', '4709667000', '17730929870', '19843198000', '11007952689', '12551644000', '45173592953', '59123979000', '-', '7.96', '-', '61.29', '03/03/2017', '105.17', '4.59', '5.31', '4.29', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1008', '2', '37326504710', '59214072000', '2211563436', '2212396000', '5168503391', '5457710000', '5168503391', '5457710000', '17318182391', '20171748000', '11707674551', '12777128000', '45049495977', '59309175000', '-', '8.00', '-', '61.41', '42796', '106.41', '4.89', '5.77', '42920', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1009', '2', '37685563629', '59921157000', '2447694245', '2463375000', '5698096444', '6205082000', '5698096444', '6205082000', '14074632978', '20505894000', '8857859069', '13005857000', '28277102619', '60225503000', '-', '8,01', '-', '61.34', '3.54', '106.1', '4.65', '5.36', '4.29', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1010', '3', '61910278318', '62585451000', '220450157', '288622000', '905385089', '910522000', '1125835246', '1199144000', '13424713869', '13661818000', '8234183806', '8220712000', '62328000817', '63205352000', '-', '8.42', '-', '63.51', '-', '103.68', '2.99', '03/07/2017', '1.21', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1011', '3', '62179976861', '64117062', '431175553', '583768000', '1798733187', '1836252000', '2229908740', '2420020000', '13183491211', '13903131000', '8374469784', '8369797000', '62155531721', '64374477000', '-', '8.16', '-', '64.38', '-', '104.13', '03/02/2017', '42738', '1.25', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1012', '3', '61665664352', '65322127000', '795139609', '879490000', '2705010930', '2782786000', '3500150539', '3662276000', '13107151852', '14148763000', '8604426919', '85158005', '61930908042', '65422408000', '-', '42774', '-', '64.23', '0', '104.94', '3.00', '03/05/2017', '1.21', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1013', '3', '64166461190', '66646347000', '1044839680', '1181958000', '3606548934', '3739817000', '4651388614', '4921775000', '13491406091', '14398794000', '8398779549', '8665112000', '64311763406', '66456450000', '-', '7.93', '-', '64.68', '0', '105.35', '2.85', '42980', '01/04/2017', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1014', '3', '65184626643', '67672299000', '1252190002', '1498204000', '4596313591', '4702749000', '5848503593', '6200953000', '12405997531', '14653301000', '7643371445', '8812419000', '64672527424', '67313061000', '-', '7.49', '-', '66.29', '0', '106.09', '42980', '42949', '01/01/2017', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1015', '3', '67136616235', '68662076000', '1532621643', '1825766000', '5536191194', '5671723000', '7068812837', '7497489000', '12423201110', '14912368000', '7770279949', '8962230000', '66510470734', '68191721000', '-', '7.36', '-', '66.45', '0', '105.67', '2.81', '2.84', '0.99', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1016', '3', '40785753994', '42131770000', '883498100', '930618000', '4049158381', '4170140000', '4932656481', '5100758000', '9024463318', '10490248000', '6623331794', '6933075000', '39832852042', '41818774000', '-', '7.45', '-', '65.9', '-', '106.6', '2.84', '2.84', '0.99', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1017', '3', '39996523118', '42325249000', '1102097044', '1080369000', '4631928080', '4786600000', '5734025124', '5866969000', '9142378725', '10667241000', '6669386237', '7047374000', '39912563014', '42012238000', '-', '07/08/2017', '-', '67.25', '0', '107.07', '2.83', '2.83', '0.99', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1018', '3', '41038217676', '42651273000', '1222106986', '1238030000', '5219768786', '5401639000', '6441875772', '6639669000', '10048930383', '10847250000', '6704552862', '7163217000', '40743178762', '42341869000', '-', '6.93', '-', '67.84', '-', '107.73', '2.81', '2.81', '0.78', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1019', '4', '25227704439', '24760163000', '115955543', '175507000', '324766560', '336492000', '440722103', '511999000', '4375870344', '4253140000', '1978351603', '1955967000', '25628017388', '25026347000', '-', '42957', '-', '53.61', '0', '102.56', '2.36', '2.74', '1.94', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1020', '4', '25415341845', '25368668000', '248395186', '353548000', '661002706', '680994000', '909397892', '1034542000', '4308121911', '4343175000', '1992162772', '1992720000', '25756080762', '25232200000', '-', '10.63', '-', '54.15', '0', '103.15', '2.24', '2.52', '1.72', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1021', '4', '24686175572', '25592914000', '433544502', '522313000', '1002420795', '1036652000', '1435965297', '1558965000', '4236415167', '4435389000', '1934774778', '2029967000', '24950001178', '25395484000', '-', '10.52', '-', '54.28', '0', '104.13', '-', '42737', '1.18', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1022', '4', '24810410996', '25874441000', '574776974', '694089000', '1316366893', '1392882000', '1891143867', '2086971000', '4252867542', '4514250000', '1956178186', '2067912000', '25011722826', '25609810000', '-', '10.17', '-', '55.05', '0', '104.89', '1.82', '1.98', '01/07/2017', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1023', '4', '24858088566', '26416413000', '706284449', '865900000', '1665944080', '1753772000', '2372228529', '2619672000', '3967330277', '4564530000', '1583541980', '2104725000', '24775996970', '26090247000', '-', '42956', '-', '56.41', '0', '104.43', '2.34', '2.95', '1.99', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1024', '4', '25986002404', '26809908000', '853972515', '1044625000', '2032807974', '2116921000', '2886780489', '3161546000', '4465531525', '4610228000', '1727613484', '2142037000', '25608003123', '26410823000', '-', '9.72', '-', '56.81', '0', '101', '2.29', '2.88', '1.95', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1025', '4', '25899182732', '27500882000', '966063783', '1216255000', '2409911630', '2487871000', '3375975413', '3704126000', '3897847673', '4661134000', '1713874381', '2182928000', '25180744023', '27029038000', '-', '9.33', '-', '58.26', '42861', '102.91', '2.34', '2.58', '1.62', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1026', '4', '26005915421', '28109459000', '1053632324', '1395641000', '2777666844', '2862900000', '3831299168', '3704126000', '3945173336', '4747783000', '1705011924', '2224322000', '25282693043', '27560762000', '-', '8.78', '-', '60.26', '42891', '103.37', '2.32', '2.56', '1.61', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1027', '4', '26583822954', '28616278000', '1154990743', '1580758000', '3133250388', '3242436000', '4288241131', '4823194000', '4140179442', '4836067000', '1790490546', '2268809000', '25602879681', '27994986000', '-', '8.34', '-', '61.8', '42863', '102.93', '2.29', '42857', '1.56', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1028', '5', '44782487008', '46874293000', '205758687', '260667000', '581647770', '569979000', '787406457', '830646000', '21822368176', '22895928000', '20469863698', '21471483000', '41889984614', '43685541000', '-', '7.33', '-', '65.6', '1.37', '94.66', '2.97', '2.97', '1.14', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1029', '5', '44153655438', '48118426000', '366657932', '523645000', '1108126430', '1151560000', '1474784362', '1675205000', '21216250257', '23304362000', '20173444713', '21833894000', '41719919264', '44982315000', '-', '42773', '-', '65.92', '1.16', '96.23', '2.94', '2.94', '1.17', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1030', '5', '43932484591', '49381438000', '554582349', '786707000', '1669362701', '1705437000', '2223945050', '2492144000', '21291662240', '23720526000', '19529349676', '22207341000', '41526040702', '46069391000', '-', '07/06/2017', '-', '66.21', '1.87', '97.06', '2.92', '2.94', '1.16', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1031', '5', '44916426482', '50467496000', '741216195', '1052446000', '2207342832', '2274913000', '2948559027', '3327359000', '22019392677', '23953936000', '19393424224', '22583020000', '41982959620', '46972177000', '-', '07/01/2017', '-', '66.5', '42826', '96.79', '2.87', '2.88', '1.15', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1032', '5', '44535025428', '51443990000', '889203445', '1329945000', '2785998290', '2846974000', '3675201735', '4176919000', '21076627632', '24198807000', '18700601628', '22904659000', '44728941734', '47790951000', '-', '6.83', '-', '66.94', '1.37', '104.7', '2.64', '2.64', '01/07/2017', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1033', '5', '45016636163', '52385767000', '1076477290', '1578130000', '3278092500', '3403718000', '4354569790', '4981848000', '19779592886', '24640690000', '18560181900', '23173782000', '45142805444', '48525713000', '-', '6.88', '-', '66.07', '0.98', '105.28', '2.59', '2.59', '01/05/2017', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1034', '5', '45758363694', '53404873000', '1265220663', '1819868000', '3794395996', '4031120000', '5059616659', '5850988000', '23112808258', '25098942000', '18611100056', '23446570000', '44503633903', '49439269000', '-', '6.95', '-', '65.67', '1.67', '102.24', '2.62', '2.64', '01/09/2017', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1035', '5', '47234316194', '54730748000', '1499060198', '2080984000', '4313149531', '4661615000', '5812209729', '6742599000', '22931503539', '25565998000', '19927920712', '23919945000', '44789062242', '50109090000', '-', '6.87', '-', '65.96', '01/08/2017', '100.28', '2.55', '2.57', '01/09/2017', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1036', '5', '51215887116', '55883264000', '1730668777', '2309503000', '4822045609', '5281573000', '6552714386', '7591076000', '25884521048', '26042031000', '20796498145', '24326249000', '45758957291', '50542585000', '-', '07/01/2017', '-', '65.22', '42737', '94.68', '2.54', '2.62', '1.19', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1037', '7', '27693739761', '28818778000', '137643899', '182272000', '356050071', '384951000', '493693970', '567223000', '13092508067', '13496703000', '10204926967', '10481586000', '28193907696', '29329086000', '-', '09/06/2017', '-', '59.68', '0.7', '102.97', '4.51', '4.53', '42768', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1038', '7', '30452185527', '29490943000', '211741676', '363535000', '738543950', '773693000', '950285626', '1137228000', '13122194350', '13223184000', '9778634604', '10682987000', '30369726849', '29966930000', '-', '8.63', '-', '60.73', '42769', '99.36', '4.31', '4.46', '2.29', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1039', '7', '29751211424', '30255453000', '239894570', '562932000', '1242034967', '1169282000', '1481929537', '1732214000', '13133472379', '13547559000', '9065971530', '10875000000', '29889294112', '30677437000', '-', '08/02/2017', '-', '63.07', '2.72', '100.46', '4.29', '4.39', '1.65', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1040', '7', '31281672527', '30820198000', '355411981', '744360000', '1662481507', '1566027000', '2017893488', '2310387000', '13278577966', '13255525000', '8030180131', '11013153000', '31313269756', '31249069000', '-', '7.64', '-', '64.24', '3.22', '100.76', '04/08/2017', '4.18', '1.51', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1041', '7', '31354544477', '32126994000', '491217487', '918541000', '2047587936', '1990898000', '2538805423', '2909439000', '12935717656', '13092105000', '7685133324', '10679056000', '31784099930', '32535468000', '-', '7.35', '-', '64.9', '1.26', '102.87', '04/05/2017', '43043', '1.48', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1042', '7', '32339188091', '32387114000', '617894845', '1108832000', '2443846623', '2410155000', '3061741468', '3518987000', '12774992136', '12492976000', '7542653765', '10684135000', '32494022873', '32768457000', '-', '7.24', '-', '65.01', '1.91', '102.49', '3.96', '04/01/2017', '1.44', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1043', '7', '31492484934', '31886302000', '783629899', '1306118000', '2791693411', '2829580000', '3575323310', '4135698000', '15715096932', '13959052000', '8422475891', '11089422000', '31422942953', '32212732000', '-', '7.19', '-', '65.02', '2.66', '102.25', '04/06/2017', '43043', '1.47', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1044', '7', '31103565312', '32546864000', '913288935', '1481845000', '3164561010', '3238918000', '4077849945', '4720763000', '15613638042', '14342442000', '8740099696', '11376574000', '31254416520', '32854656000', '-', '07/07/2017', '-', '65.26', '42948', '103.8', '04/05/2017', '42739', '1.32', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1045', '7', '30769869559', '33559702000', '1096370582', '1657618000', '3507303276', '3656982000', '4603673858', '5314600000', '16182247297', '14738809000', '8769578908', '11650935000', '30475546359', '33859653000', '-', '7.22', '-', '64.65', '3.45', '103.22', '4.23', '42859', '1.66', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1046', '8', '35599484108', '36321923000', '129733615', '285789000', '635204446', '502241000', '764938061', '788030000', '18961510521', '18962947000', '11199589899', '11429097000', '35354919846', '36350017', '-', '9.95', '-', '56.26', '1.59', '100.27', '0.82', '0.84', '0.22', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1047', '8', '36609895007', '37223481000', '244696542', '562026000', '1272237286', '1025879000', '1516933828', '1587905000', '18762970049', '19422487000', '11463336561', '11624556000', '35964903014', '37135572', '-', '9.47', '-', '57.53', '2.67', '99.81', '0.74', '0.82', '0.22', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1048', '8', '38354713309', '38097188000', '399085423', '872299000', '1957577475', '1541359000', '2356662898', '2413658000', '18585704422', '19205442000', '11887695855', '11823369000', '37917818059', '37897132000', '-', '8.95', '-', '59.09', '1,96', '98.84', '0.78', '0.78', '0.2', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1049', '8', '39505517001', '38910083000', '484472938', '1166440000', '2664980393', '2082079000', '3149453331', '3248519000', '17740514481', '19299918000', '11809566568', '12021358000', '39050897237', '38618422000', '-', '08/04/2017', '-', '61.56', '1.74', '101.63', '0.76', '0.75', '0.2', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1050', '8', '41059282855', '39841002000', '597561703', '1479292000', '3369162165', '2620366000', '3966723868', '4099658000', '17601188306', '19773915000', '9263101723', '11082900000', '40379893425', '39474383000', '-', '7.75', '-', '62.22', '2,24', '101.61', '0.72', '0.72', '0.19', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1051', '8', '40978381221', '40438670000', '747152112', '1706204000', '3973816232', '3136915000', '4720968344', '4843119000', '17089248929', '18268444000', '9082945991', '11274284000', '40583336202', '40086972000', '-', '8.62', '-', '60.21', '0.9', '102.71', '0.72', '0.71', '0.19', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1052', '8', '41533527007', '40040375000', '922486420', '1937130000', '4460173363', '3668308000', '5382659783', '5605438000', '19274463307', '19193411000', '10498066542', '11531290000', '40357855033', '40653951000', '-', '8.42', '-', '60.86', '3.27', '101.08', '0.74', '0.76', '0.22', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1053', '8', '42042515504', '41519555000', '1075229391', '2188435000', '4977260053', '4189639000', '6052489444', '6378073000', '18986769379', '19739912000', '10867659645', '11740887000', '41042871854', '41170302000', '-', '43047', '-', '62.17', '2.25', '102.13', '0.72', '0.73', '0.22', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1054', '8', '42279948734', '41936095000', '1254047794', '2435879000', '5477670527', '4705519000', '6731718321', '7141398000', '20353137083', '20334907000', '10962222127', '11944497000', '40432252193', '41635545000', '-', '7.68', '-', '63.54', '4.84', '100.64', '0.72', '0.73', '0.19', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1055', '9', '25118868576', '26334960000', '105803828', '183289000', '351536632', '551167000', '457340460', '734456000', '4815053576', '4738026000', '1624919869', '1710840000', '25320823863', '26429244000', '-', '11.44', '-', '52.64', '0', '101.65', '0.83', '0.89', '0.34', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1056', '9', '25999049861', '27687379000', '219466612', '380529000', '699915024', '1125656000', '919381636', '1506185000', '4809403497', '4855766000', '1577104447', '1795489000', '26190447388', '27753123000', '-', '43050', '-', '53.48', '0', '102.21', '0.8', '0.86', '0.33', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1057', '9', '26472425110', '28717357000', '377961016', '588109000', '1040201385', '1726274000', '1418162401', '2314383000', '4111145244', '4692621000', '1498700939', '1844796000', '26643679849', '28755188000', '-', '10.69', '-', '54.45', '0', '103.08', '0.78', '0.85', '0.32', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1058', '9', '27278518098', '29777371000', '491637085', '797686000', '1371865117', '2355009000', '1863502202', '3152695000', '3973897679', '4851917000', '1511414530', '1979036000', '27263781986', '29634883000', '-', '10.21', '-', '55.43', '0', '103.21', '0.77', '0.83', '0.31', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1059', '9', '28968120191', '30994086000', '627848995', '1008691000', '1727287122', '3013346000', '2355136117', '4022037000', '3834994461', '4780637000', '1454106953', '1958649000', '28774419457', '30869291000', '-', '9.89', '-', '56.15', '0', '103.00', '0.73', '0.78', '0.3', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1060', '9', '30004657093', '31370900000', '726569646', '1251300000', '2119866620', '3670200000', '2846436266', '4921500000', '3718418342', '4866800000', '1464896810', '1892500000', '29497816360', '31218800000', '-', '42895', '-', '56.94', '1.97', '102.46', '0.71', '0.76', '0.29', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1061', '9', '29712082022', '31900500000', '818716564', '1485300000', '2534470387', '4339800000', '3353186951', '5825100000', '3967772663', '5071400000', '1834112684', '1984400000', '29010269033', '31677200000', '-', '09/09/2017', '-', '58.69', '07/01/2017', '101.9.', '0.78', '0.78', '0.15', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1062', '9', '29480510700', '32198800000', '879739821', '1750600000', '2937345371', '5002000000', '3817085192', '6752700000', '4414576122', '5204900000', '1748317748', '2081300000', '28848556354', '31917400000', '-', '8.47', '-', '61.22', '3.39', '102.47', '0.78', '0.78', '0.15', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1063', '9', '30081923911', '32233800000', '945055123', '2005200000', '3336056804', '3702800000', '4281111927', '5708100000', '4361569148', '5384200000', '2041920674', '2183600000', '29173805207', '31916500000', '-', '7.47', '-', '64.61', '7.63', '101.8', '0.78', '0.77', '0.15', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1064', '10', '75388792990', '76934569000', '332905971', '485954000', '970944035', '885482000', '1303850006', '1371436000', '21946737856', '21675929000', '25005842537', '25391337000', '74118629474', '74754906000', '-', '8.13', '-', '63.26', '1.81', '99.4', '-', '3.22', '2.33', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1065', '10', '77227576789', '78871759000', '629289222', '894200000', '1899347866', '1811212000', '2528637088', '2705412000', '21032461061', '21938094000', '23763135401', '25812834000', '75720667962', '76595018000', '-', '7.97', '-', '63.13', '2.28', '99.74', '-', '3.38', '2.52', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1066', '10', '77479295505', '80498134000', '1102008009', '1366937000', '2894506377', '2728543000', '3996514386', '4095480000', '21085290189', '22221601000', '24374107025', '26241328000', '75607240101', '78309872000', '-', '08/06/2017', '-', '62.14', '2.62', '100.28', '-', '2.89', '02/05/2017', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1067', '10', '78691597336', '82173205000', '1461862602', '1861084000', '3897366723', '3654444000', '5359229325', '5515528000', '20562175821', '22527232000', '23307494563', '26676933000', '76583822804', '79899468000', '-', '8.16', '-', '61.07', '2.85', '100.88', '-', '2.88', '02/03/2017', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1068', '10', '79180260606', '83602889000', '1784731664', '2370179000', '4907118885', '4594400000', '6691850549', '6964579000', '19246335169', '22855849000', '22432572253', '27107715000', '77703569904', '81363806000', '-', '08/02/2017', '-', '61.42', '1.21', '102.34', '-', '2.76', '1.92', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1069', '10', '80827100380', '85189632000', '2125995315', '2926142000', '5872122035', '5513834000', '7998117350', '8439976000', '21542263058', '23208385000', '22342461366', '27649868000', '78988926352', '82702886000', '-', '08/02/2017', '-', '61.29', '42859', '102.67', '-', '2.69', '1.88', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1070', '10', '81563161853', '86427626000', '2488207862', '3443588000', '6861413396', '6441301000', '9349621258', '9884889000', '21494819521', '23605104000', '24094634974', '28154800000', '79242433987', '83955605000', '-', '8.00', '-', '61.3', '02/07/2017', '102.12', '-', '2.69', '1.84', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1071', '10', '82826830965', '87598745000', '2905824592', '4066212000', '7849705520', '7364863000', '10755530112', '11431075000', '20791612197', '24009014000', '26135524288', '28717896000', '80056916056', '85082150000', '-', '7.95', '-', '61.56', '2.56', '102.34', '-', '2.77', '1.94', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1072', '10', '82708118434', '88637580000', '3267278923', '4630201000', '8816684024', '8294642000', '12083962947', '12924843000', '22933086319', '24422246000', '26550808568', '29194614000', '79482312027', '86082521000', '-', '7.83', '-', '61.82', '2.51', '102.4', '-', '2.66', '1.89', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1073', '11', '34905255049', '37518365000', '209463189', '183503000', '535881521', '551408000', '745344710', '734911000', '9787400977', '10676435000', '6772497725', '6750824000', '34529541409', '37570174000', '-', '8.97', '-', '61.42', '4.28', '100.15', '01/06/2017', '01/06/2017', '0.19', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1074', '11', '34973082843', '38336771000', '338827274', '371681000', '1035846271', '1106044000', '1374673545', '1477725000', '9918775376', '10889963000', '6023253945', '688584000', '34481521244', '38336912000', '-', '8.52', '-', '62.68', '4.95', '100.48', '01/05/2017', '01/05/2017', '0.18', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1075', '11', '35676863509', '39203971000', '521800637', '590840000', '1541180413', '1673904000', '2062981050', '2264744000', '10043096571', '11107762000', '5756901518', '7161274000', '35237337358', '39103650000', '-', '8.44', '-', '62.81', '4.17', '99.42', '01/03/2017', '01/03/2017', '0.18', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1076', '11', '38178341672', '4005219000', '678185605', '817544000', '2100845355', '2247953000', '2779030960', '3065497000', '10444639543', '11583499000', '5657165181', '7304500000', '37729731719', '39870388000', '-', '42802', '-', '63.34', '3.92', '100.2', '0.96', '0.96', '0.16', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1077', '11', '39172637609', '40842765000', '873211368', '1052605000', '2642717902', '2836195000', '3515929270', '3888800000', '9690123071', '10730857000', '5195804581', '7450589000', '38724309033', '40637087000', '-', '8.39', '-', '62.89', '3.98', '103.16', '0.93', '0.93', '0.15', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1078', '11', '40192010627', '4166601000', '1065544726', '1279554000', '3203134303', '3426007000', '4268679029', '4705561000', '9405293830', '10945475000', '5168179198', '7525095000', '39496845976', '41403802000', '-', '8.59', '-', '62.06', '4.22', '103.25', '0.9', '0.9', '0.09', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1079', '11', '40183980744', '42521712000', '1298740252', '1524874000', '3719452946', '4030567000', '5018193198', '5555441000', '11178046304', '11273840000', '5503176990', '7675597000', '39193656779', '42170424000', '-', '8.63', '-', '61.73', '6.00', '102.89', '0.88', '0.88', '0.09', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1080', '11', '39679877664', '43477926000', '1498814510', '1773516000', '4250808304', '4641149000', '5749622814', '6414665000', '10190979379', '11499317000', '5066342183', '7829109000', '38763957437', '42937578000', '-', '8.58', '-', '62.17', '5.61', '103.96', '0.88', '0.88', '0.09', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1081', '11', '40336527526', '44393669000', '1720405479', '2109677000', '4790268672', '5181668000', '6510674151', '7291345000', '11625616424', '11729303000', '5916551094', '7985690000', '39409201294', '43704289000', '-', '8.61', '-', '62.11', '4.87', '104.76', '0.85', '0.85', '0.09', '-', '9', '2017', null);
INSERT INTO `import_cabang` VALUES ('1082', '12', '23693750636', '2354702000', '131192807', '128694000', '289816677', '286621000', '421009484', '415315000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '1', '2017', null);
INSERT INTO `import_cabang` VALUES ('1083', '12', '25022340438', '24080448000', '217456890', '259508000', '603242041', '575193000', '820698931', '834701000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '2', '2017', null);
INSERT INTO `import_cabang` VALUES ('1084', '12', '24892865397', '24688080000', '338565762', '430726000', '940637999', '871898000', '1279203761', '1302624000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '3', '2017', null);
INSERT INTO `import_cabang` VALUES ('1085', '12', '25304451610', '25220176000', '530234729', '519181000', '1190674722', '1196248000', '1720909451', '1715429000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '4', '2017', null);
INSERT INTO `import_cabang` VALUES ('1086', '12', '25123604733', '25843271000', '634543649', '680974000', '1544706850', '1496050000', '2179250499', '2177024000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '5', '2017', null);
INSERT INTO `import_cabang` VALUES ('1087', '12', '25523905159', '26553671000', '800487060', '902839000', '1859844969', '1806396000', '2660332029', '2709235000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '6', '2017', null);
INSERT INTO `import_cabang` VALUES ('1088', '12', '27592840507', '27049556000', '971023666', '1108841000', '2164129781', '2123778000', '3135153447', '3232619000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '7', '2017', null);
INSERT INTO `import_cabang` VALUES ('1089', '12', '28061861833', '27614009000', '1130135414', '1273546000', '2473154689', '2442993000', '3603290103', '3716540000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '8', '2017', null);
INSERT INTO `import_cabang` VALUES ('1090', '12', '29241850121', '28214744000', '1298393360', '1457746000', '2766636790', '2750234', '4065030150', '4207980000', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '9', '2017', null);

-- ----------------------------
-- Table structure for import_kas
-- ----------------------------
DROP TABLE IF EXISTS `import_kas`;
CREATE TABLE `import_kas` (
  `ID_IMPORT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KAS` int(11) DEFAULT NULL,
  `ASET_REALISASI` varchar(45) DEFAULT NULL,
  `ASET_TARGET` varchar(45) DEFAULT NULL,
  `LABA_REALISASI` varchar(45) DEFAULT NULL,
  `LABA_TARGET` varchar(45) DEFAULT NULL,
  `BIAYA_REALISASI` varchar(45) DEFAULT NULL,
  `BIAYA_TARGET` varchar(45) DEFAULT NULL,
  `PENDAPATAN_REALISASI` varchar(45) DEFAULT NULL,
  `PENDAPATAN_TARGET` varchar(45) DEFAULT NULL,
  `TABUNGAN_REALISASI` varchar(45) DEFAULT NULL,
  `TABUNGAN_TARGET` varchar(45) DEFAULT NULL,
  `DEPOSITO_REALISASI` varchar(45) DEFAULT NULL,
  `DEPOSITO_TARGET` varchar(45) DEFAULT NULL,
  `KREDIT_REALISASI` varchar(45) DEFAULT NULL,
  `KREDIT_TARGET` varchar(45) DEFAULT NULL,
  `CAR` varchar(45) DEFAULT NULL,
  `ROA` varchar(45) DEFAULT NULL,
  `ROE` varchar(45) DEFAULT NULL,
  `BOPO` varchar(45) DEFAULT NULL,
  `CR` varchar(45) DEFAULT NULL,
  `LDR` varchar(45) DEFAULT NULL,
  `KAP` varchar(45) DEFAULT NULL,
  `NPL_GROSS` varchar(45) DEFAULT NULL,
  `NPL_NET` varchar(45) DEFAULT NULL,
  `NIM` varchar(45) DEFAULT NULL,
  `BULAN` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMPORT`),
  KEY `fk_import_kas_kas` (`ID_KAS`) USING BTREE,
  CONSTRAINT `import_kas_ibfk_1` FOREIGN KEY (`ID_KAS`) REFERENCES `kas` (`ID_KAS`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1063 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_kas
-- ----------------------------
INSERT INTO `import_kas` VALUES ('1000', '2', '24932201525', '24605200000', '53009995', '68800000', '312545352', '351700000', '365555347', '420500000', '3467131085', '3683300000', '1947358927', '2046400000', '25197958507', '29405088000', '-', '6.73', '-', '66.5', '0.00', '101.58', '0.63', '0.73', '0.35', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1001', '2', '25004600592', '25040210000', '105395374', '208750000', '910488125', '476927000', '731368255', '685677000', '3421612879', '3753844000', '2079182401', '2079644000', '25265012893', '28734024000', '-', '6.18', '-', '68.42', '0.00', '99.9', '0.66', '0.72', '0.34', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1002', '2', '25129846408', '25357004000', '214627922', '401378000', '1384194822', '732752000', '835182692', '1134130000', '3275097859', '3823009000', '2021045208', '2120215000', '25332958584', '28672731000', '-', '42741', '-', '68.48', '0.00', '102.39', '0.66', '0.71', '0.33', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1003', '2', '25274261650', '26074443000', '276551308', '402480000', '1830987167', '818995000', '1099861122', '1221475000', '3339396898', '3893342000', '2024413594', '2161578000', '25442039495', '27708633000', '-', '5.73', '-', '69.83', '0.00', '102.69', '0.69', '0.79', '0.4', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1004', '2', '25829250785', '26474471000', '358043783', '404141000', '2283792311', '1093953000', '1380592011', '1498094000', '3272783182', '3964978000', '2641970030', '2203755000', '25982052520', '26680368000', '-', '5.41', '-', '70.9', '0.00', '103.16', '01/01/2017', '1.45', '01/07/2017', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1005', '2', '27001071251', '27472753000', '463149898', '507916000', '2790105498', '1240302000', '1703819348', '1748218000', '3196067382', '4037591000', '2605046650', '2234710000', '26994184167', '26231536000', '-', '5.16', '-', '71.73', '0.00', '103.28', '0.7', '01/01/2017', '0.65', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1006', '2', '17563423840', '28411015000', '1146707192', '614710000', '3937420602', '1522649000', '2733181762', '2137359000', '3575393623', '4114997000', '2757930634', '2278310000', '17501854863', '25554037000', '-', '8.78', '-', '60.05', '0.00', '109.98', '42795', '1.81', '1.23', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1007', '2', '17436781839', '28449669000', '1239358631', '751647000', '4244974105', '1709546000', '2948726140', '2461194000', '3682822187', '4194266000', '2866705303', '2322769000', '17361956593', '25312371000', '-', '8.93', '-', '60.2', '0.00', '110.91', '2.00', '03/02/2017', '2.36', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1008', '2', '17131550411', '29155895000', '1364002740', '887911000', '4577058739', '1933205000', '3197864529', '2821115000', '3713919172', '4275076000', '2979246201', '2368091000', '17011359065', '25006500000', '-', '9.62', '-', '57.77', '0.00', '112,25', '1.45', '1.92', '1.34', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1009', '3', '14088807895', '14693092000', '72302999', '69560000', '212337237', '205785000', '284640236', '275345000', '2655992194', '2814502000', '942568850', '1015365000', '14433201292', '14955581000', '-', '8.42', '-', '63.51', '-', '103.68', '2.99', '03/07/2017', '1.21', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1010', '3', '14014852951', '15059509000', '119758342', '138184000', '413415080', '418463000', '533173422', '556647000', '2679317010', '2874748000', '1092799513', '1040598000', '14337266158', '15295706000', '-', '8.16', '-', '64.38', '-', '104.13', '03/02/2017', '42738', '1.25', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1011', '3', '14100628253', '15328582000', '196273971', '210835000', '609321288', '632977000', '805595259', '843812000', '2765267349', '2945285000', '1239247347', '1068412000', '14401526235', '15533231000', '-', '42774', '-', '64.23', '0', '104.94', '3.00', '03/05/2017', '1.21', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1012', '3', '14897920050', '15686095000', '252383265', '284553000', '814771930', '850976000', '1067155195', '1135529000', '2997369238', '3017495000', '1197141350', '1095800000', '15169273091', '15867258000', '-', '7.93', '-', '64.68', '0', '105.35', '2.85', '42980', '1.15', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1013', '3', '14832002656', '16016966000', '302503931', '363184000', '1040194854', '1070231000', '1342698785', '1433415000', '2318362587', '3091809000', '1081320236', '1125104000', '16171840000', '16171840000', '-', '7.49', '-', '66.29', '0', '106.09', '42980', '42980', '01/04/2017', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1014', '3', '15466833840', '16284972000', '365297319', '450257000', '1230379505', '1288990000', '1595676824', '1739247000', '2073479248', '3167879000', '1039803851', '1155198000', '15658642693', '16404704000', '-', '7.36', '-', '66.45', '0', '105.67', '2.81', '42949', '01/01/2017', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1015', '3', '14836461179', '16534341000', '443549359', '530392000', '1414744125', '1515239000', '1858293484', '2045631000', '2171782624', '3245579000', '1096470840', '1188028000', '15080769532', '16617531000', '-', '7.45', '-', '65.9', '-', '106.6', '2.84', '2.84', '0.99', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1016', '3', '14879008472', '17275007000', '495789286', '602343000', '1609102981', '1754650000', '2104892267', '2356993000', '2386782624', '3314882000', '1108219214', '1227703', '15104099565', '17334497000', '-', '07/08/2017', '-', '67.25', '0', '107.07', '2.83', '2.83', '0.99', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1017', '3', '14931228813', '17629474000', '540743647', '690564000', '1822015976', '1990508000', '2362759623', '2681072000', '2497074241', '11928979000', '1207520025', '1270703000', '15176492409', '17652680000', '-', '6.93', '-', '67.84', '-', '107.73', '2.81', '2.81', '0.78', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1018', '4', '11063184524', '11589794000', '43845398', '88885000', '158915427', '172546000', '202760825', '261431000', '3652531061', '3650350000', '1424100000', '1886765000', '11291074523', '11532146000', '-', '7.91', '-', '67.33', '-', '103.1', '2.97', '2.97', '1.14', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1019', '4', '11058187108', '11952320000', '59598165', '167160000', '311460693', '346919000', '371058858', '514079000', '3658847067', '3730449000', '1381100000', '1920818000', '11257053084', '11825881000', '-', '7.24', '-', '68.7', '-', '103.23', '1.16', '1.16', '0.29', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1020', '4', '11052426132', '12156845000', '106836413', '260224000', '466290996', '524612000', '573127409', '784836000', '3354885846', '3812443000', '1318600000', '1955695000', '11229669239', '12022794000', '-', '7.19', '-', '68.6', '-', '103.88', '1.15', '1.14', '0.28', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1021', '4', '11373794402', '12377081000', '139204154', '326854000', '619011538', '694605000', '758215692', '1021459000', '3450130728', '3865695000', '1206600000', '1991049000', '11534982961', '12271059000', '-', '6.92', '-', '69.39', '-', '104.62', '43070', '43040', '0.28', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1022', '4', '11380691965', '12837191000', '186917922', '403691000', '770986312', '873367000', '957904234', '1277058000', '3361294632', '3921411000', '1021600000', '2021173000', '11543773623', '12710496000', '-', '6.83', '-', '66.94', '-', '104.7', '2.64', '2.64', '01/07/2017', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1023', '4', '11619961684', '13336671000', '241536815', '471994000', '917764374', '1055106000', '1159301189', '1527100000', '3293587836', '3977938000', '986600000', '2047469000', '11719675330', '13222950000', '-', '6.88', '-', '66.07', '-', '105.28', '2.59', '2.59', '01/05/2017', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1024', '4', '11271839686', '13586375000', '287429643', '515345000', '1058678127', '1238012000', '1346107770', '1753357000', '3783470197', '4040230000', '1061100000', '2074140000', '11399049389', '13491741000', '-', '6.95', '-', '65.67', '-', '102.24', '2.62', '2.64', '1,09', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1025', '4', '11081726773', '13972730000', '335051380', '595339000', '1203685454', '1435623000', '1538736834', '2030962000', '3853478938', '4132844000', '1672100000', '2158781000', '11193717319', '13834293000', '-', '6.87', '-', '65.96', '-', '100.28', '2.55', '2.57', '01/09/2017', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1026', '4', '11116798268', '14269970000', '396667887', '665538000', '1341226939', '1630244000', '1737894826', '2295782000', '4121897493', '4227658000', '1672100000', '2158781000', '11225635245', '14146334000', '-', '07/01/2017', '-', '65.22', '-', '94.68', '2.54', '2.62', '1.19', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1027', '7', '11401862227', '11949089000', '61886270', '87103000', '137308253', '161405000', '199194523', '248508000', '5228250565', '5030921000', '4278274763', '4260749000', '11567915826', '12070978000', '-', '11.24', '-', '50.63', '-', '102.66', '0.68', '0.67', '0.47', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1028', '7', '11737389769', '12438995000', '106724702', '174376000', '270148504', '329185000', '376873206', '503561000', '5038884165', '5157684000', '4144560119', '4472225000', '11892035357', '12557770000', '-', '42896', '-', '52.06', '-', '103.19', '0.65', '0.65', '0.46', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1029', '7', '11966154192', '129270020000', '180610548', '276391000', '417318220', '498399000', '597928768', '774790000', '5244322893', '5318857000', '4317581932', '4695683000', '12095479124', '13023389000', '-', '10.14', '-', '53.33', '-', '104.03', '0.78', '0.8', '0.25', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1030', '7', '13189828006', '13353174000', '220275296', '373299000', '586396343', '676198000', '806671639', '1049497000', '4920458036', '5335418000', '4096135120', '4931831000', '13286315120', '13431166000', '-', '42834', '-', '55.6', '-', '104.09', '0.57', '0.57', '0.4', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1031', '7', '13336725493', '13803127000', '275976861', '470233000', '741837348', '861622000', '1017814209', '1331855000', '5036455313', '5303968000', '3096482030', '4638353000', '13410904540', '13877141000', '-', '9.15', '-', '61.33', '-', '104.53', '0.56', '0.55', '0.39', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1032', '7', '13577644531', '14232300000', '334098640', '575099000', '900561211', '1047530000', '1234659851', '1622629000', '4857012993', '5367299000', '3094583672', '4696332000', '13547921605', '14295196000', '-', '09/05/2017', '-', '61.69', '-', '104.37', '0.54', '0.54', '0.38', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1033', '7', '13211092213', '14643025000', '410190991', '679895000', '1058773478', '1236654000', '1468964469', '1916549000', '4994295134', '5554355000', '4214789452', '4854728000', '14685521000', '14472105000', '-', '09/07/2017', '-', '62.16', '-', '104.94', '0.55', '0.55', '0.39', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1034', '7', '13482660741', '15026471000', '461727280', '789780000', '1225627772', '1427989000', '1687355052', '2217769000', '5338697821', '5749186000', '4167938609', '4925121000', '13315892242', '15045090000', '-', '8.78', '-', '57.25', '-', '104.48', '0.54', '0.53', '0.38', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1035', '7', '14281255658', '15334866000', '554788068', '905986000', '1402912571', '1619872000', '1957700639', '2525858000', '5890420084', '55951303000', '3912674690', '5019172000', '14128195098', '15348007000', '-', '8.79', '-', '57.57', '-', '105.46', '0.5', '0.49', '0.36', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1036', '8', '20469120338', '21370053000', '121459318', '83575000', '239355999', '267404000', '360815317', '350979000', '7039775988', '7076100000', '7312647416', '7677689000', '20797776019', '21828661000', '-', '10.22', '-', '50.21', '-', '103.08', '-', '2.36', '02/03/2017', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1037', '8', '21102092340', '21997041000', '221512918', '195909000', '470256191', '515565000', '691769109', '711474000', '6976896585', '7160156000', '7274720633', '7819726000', '21388147463', '22467681000', '-', '43079', '-', '50.54', '-', '103.62', '-', '42796', '1.98', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1038', '8', '21326742360', '22593366000', '345045362', '324930000', '711784026', '766376000', '1056829388', '1091306000', '6921672092', '7250857000', '7227105297', '7964392000', '21534350855', '23069746000', '-', '10/03/2017', '-', '50.68', '-', '104.1', '-', '2.28', '1.96', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1039', '8', '21845917493', '23321230000', '473396383', '448927000', '971689192', '1030742000', '1445085575', '1479669000', '6378436304', '7348446000', '6867905359', '8111734000', '21996133261', '23634856000', '-', '10.19', '-', '50.09', '-', '104.95', '-', '2.23', '1.92', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1040', '8', '22024752832', '23835736000', '571893460', '582960000', '1220675760', '1296234000', '1792569220', '1879194000', '5719840599', '7453188000', '6870069575', '8261801000', '22091571396', '24163011000', '-', '10/04/2017', '-', '50.46', '-', '105.28', '-', '2.22', '1.91', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1041', '8', '22365159456', '24313421000', '660342474', '731454000', '1465532624', '1556061000', '2125875098', '2287515000', '5831153984', '7565378000', '6813875867', '8418775000', '22252131603', '24654211000', '-', '9.84', '-', '50.95', '-', '105.06', '-', '42768', '42979', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1042', '8', '22672246369', '24746556000', '758655003', '889484000', '1754259025', '1817325000', '\'2512914028', '2706809000', '6751308065', '7691302000', '6866186717', '8595570000', '22581975452', '25099456000', '-', '9.71', '-', '51.81', '-', '105.26', '-', '2.17', '1.87', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1043', '8', '22836233573', '25148930000', '894152925', '1052439000', '2023790285', '2079240000', '2917943210', '3131679000\'', '6194846084', '7819481000', '7511956443', '8758885000', '22690401065', '25514204000', '-', '9.69', '-', '52.19', '-', '105.95', '-', '2.16', '1.86', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1044', '8', '23175900707', '25516671000', '998747588', '1222281000', '2270657208', '2341405000', '3269404796', '3563686000', '7299964157', '7950572000', '8118904432', '8925304000', '22699883527', '25892059000', '-', '9.34', '-', '53.24', '-', '104.95', '-', '2.15', '1.86', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1045', '9', '14733140413', '18498841000', '83640948', '100613000', '221964797', '229257000', '5605745', '329870000', '2282167171', '2490866000', '7675968391', '3708960000', '15112708974', '16376885000', '-', '8.68', '-', '62.65', '-', '103.77', '-', '2.65', '1', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1046', '9', '15284345899', '18177132000', '163424564', '169105000', '430601517', '461177000', '594026081', '630282000', '2586797589', '2558119000', '3783085314', '3801684000', '15657476494', '16821144000', '-', '8.64', '-', '62.64', '-', '104.45', '-', '2.56', '0.97', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1047', '9', '16276571163', '17826338000', '278145224', '249261000', '648464036', '694704000', '926609260', '943965000', '2672551382', '2634863000', '3911779382', '3896726000', '16612116407', '17236687000', '-', '8.82', '-', '61.97', '-', '105.18', '-', '42857', '1', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1048', '9', '16539738457', '17497390000', '352982389', '333023000', '863167457', '930702000', '1216149846', '1263725000', '2844893110', '2716543000', '3292550179', '3994145000', '16814600897', '17623514000', '-', '8.61', '-', '62.15', '-', '105.53', '-', '42918', '1.25', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1049', '9', '16948651788', '17142041000', '438017660', '423102000', '1087537907', '1168624000', '1525555567', '1591726000', '1992478591', '2800755000', '3054483155', '4103985000', '17235899214', '17981625000', '-', '8.48', '-', '62.28', '-', '106.31', '-', '2.47', '01/07/2017', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1050', '9', '17549224972', '16760190000', '522668687', '526092000', '1309107323', '1399804000', '1831776010', '1925896000', '2054343340', '2895981000', '2965986029', '4227104000', '17689461677', '18313020000', '-', '8.43', '-', '62.19', '-', '106.08', '-', '2.36', '0.99', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1051', '9', '18039120243', '16348439000', '606311927', '614595000', '1550663359', '1632913000', '2156975286', '2247508000', '2065933876', '2994444000', '3395055223', '4353917000', '18266637319', '18665666000', '-', '8.57', '-', '61.57', '-', '106.83', '-', '2.32', '0.86', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1052', '9', '18574133769', '15911950000', '694374698', '710273000', '1779757488', '1867596000', '2474132186', '2577869000', '1950956319', '3096254000', '3431795859', '4484535000', '18762712114', '18987025000', '-', '8.31', '-', '62.29', '-', '107.18', '-', '2.25', '0.83', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1053', '9', '18552670596', '18792266000', '777191588', '812478000', '1793856903', '2103236000\'', '2571048491', '2915714000', '2037274827', '3201527000', '3448163516', '4619072000', '18648622264', '19279130000', '-', '8.24', '-', '62.38', '-', '107.71', '-', '2.25', '0.83', '-', '9', '2017', null);
INSERT INTO `import_kas` VALUES ('1054', '10', '9561706351', '10527957000', '50861544', '69376000', '146255508', '154261000', '197117052', '223637000', '2241465556', '2489734000', '2140788806', '2067188000', '9605830156', '10197558000', '-', '42865', '-', '57.22', '-', '101.75', '0.35', '0.35', '0.04', '-', '1', '2017', null);
INSERT INTO `import_kas` VALUES ('1055', '10', '9517141076', '10770750000', '117719783', '141706000', '291930032', '310108000', '409649815', '451814000', '2286237729', '2527411000', '2017097430', '2111315000', '9546222380', '10437563000', '-', '10.36', '-', '57.58', '-', '102.71', '0.36', '0.36', '0.05', '-', '2', '2017', null);
INSERT INTO `import_kas` VALUES ('1056', '10', '9511397066', '1101265800', '187661995', '215711000', '432433854', '468449000', '620095849', '684160000', '2315532936', '2565676000', '1955023923', '2157501000', '9489902344', '10662041000', '-', '42865', '-', '57.16', '-', '101.18', '0.36', '0.36', '0.05', '-', '3', '2017', null);
INSERT INTO `import_kas` VALUES ('1057', '10', '9733688517', '11222672000', '262413539', '290452000', '574722195', '629944000', '837135734', '920396000', '2459729046', '2604537000', '1926172951', '2204804000', '9713295956', '10870892000', '-', '10.68', '-', '56.64', '-', '102.55', '0.35', '0.35', '0.04', '-', '4', '2017', null);
INSERT INTO `import_kas` VALUES ('1058', '10', '10146090645', '11422007000', '336854922', '367825000', '724018613', '792421000', '1060873535', '1160246000', '2273066296', '2644006000', '1888566838', '2253252000', '10105370798', '11068979000', '-', '10.91', '-', '56.04', '-', '105.77', '0.33', '0.33', '0.04', '-', '5', '2017', null);
INSERT INTO `import_kas` VALUES ('1059', '10', '10462093088', '11611467000', '416157834', '447489000', '867957933', '956038000', '1284115767', '1403527000', '2289004270', '2684091000', '1872684592', '2309778000', '10361107324', '11251035000', '-', '11.13', '-', '55.36', '-', '106.27', '0.3', '0.3', '0.02', '-', '6', '2017', null);
INSERT INTO `import_kas` VALUES ('1060', '10', '10588444335', '11779703000', '499969049', '520657000', '1007547680', '1120673000', '1507516729', '1641330000', '2286391200', '2724802000', '1917087967', '2359134000', '10490409014', '11416087000', '-', '11.39', '-', '54.64', '-', '106.8', '0.21', '0.21', '0.02', '-', '7', '2017', null);
INSERT INTO `import_kas` VALUES ('1061', '10', '10159230511', '11930887000', '573573001', '595952000', '1153235556', '1286004000', '1726808557', '1881956000', '2366692436', '2766582000', '1675278186', '2409640000', '10026616693', '11566299000', '-', '11.48', '-', '54.59', '-', '107.84', '0.19', '0.19', '0.02', '-', '8', '2017', null);
INSERT INTO `import_kas` VALUES ('1062', '10', '10611579731', '12067089000', '650167310', '674038000', '1302203345', '1451147000', '1952370655', '2125185000', '2592612783', '2809685000', '1870874397', '2461325000', '10461489345', '11700745000', '-', '11.67', '-', '54.26', '-', '108.53', '0.12', '0.12', '0.02', '-', '9', '2017', null);

-- ----------------------------
-- Table structure for import_kota
-- ----------------------------
DROP TABLE IF EXISTS `import_kota`;
CREATE TABLE `import_kota` (
  `ID_IMPORT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `ASET_REALISASI` varchar(45) DEFAULT NULL,
  `ASET_TARGET` varchar(45) DEFAULT NULL,
  `LABA_REALISASI` varchar(45) DEFAULT NULL,
  `LABA_TARGET` varchar(45) DEFAULT NULL,
  `BIAYA_REALISASI` varchar(45) DEFAULT NULL,
  `BIAYA_TARGET` varchar(45) DEFAULT NULL,
  `PENDAPATAN_REALISASI` varchar(45) DEFAULT NULL,
  `PENDAPATAN_TARGET` varchar(45) DEFAULT NULL,
  `TABUNGAN_REALISASI` varchar(45) DEFAULT NULL,
  `TABUNGAN_TARGET` varchar(45) DEFAULT NULL,
  `DEPOSITO_REALISASI` varchar(45) DEFAULT NULL,
  `DEPOSITO_TARGET` varchar(45) DEFAULT NULL,
  `KREDIT_REALISASI` varchar(45) DEFAULT NULL,
  `KREDIT_TARGET` varchar(45) DEFAULT NULL,
  `CAR` varchar(45) DEFAULT NULL,
  `ROA` varchar(45) DEFAULT NULL,
  `ROE` varchar(45) DEFAULT NULL,
  `BOPO` varchar(45) DEFAULT NULL,
  `CR` varchar(45) DEFAULT NULL,
  `LDR` varchar(45) DEFAULT NULL,
  `KAP` varchar(45) DEFAULT NULL,
  `NPL_GROSS` varchar(45) DEFAULT NULL,
  `NPL_NET` varchar(45) DEFAULT NULL,
  `NIM` varchar(45) DEFAULT NULL,
  `BULAN` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `TAB_SURYA` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN SURYA (UMUM)             ',
  `ATM_KHUSUS` varchar(255) DEFAULT NULL COMMENT 'ATM TABUNGAN SURYA KHUSUS         ',
  `ATM_SURYA` varchar(255) DEFAULT NULL COMMENT 'ATM TABUNGAN SURYA UMUM           ',
  `TAB_PENSIUN` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN PENSIUN',
  `TAS` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN TAS CERIA                ',
  `TAB_KU` varchar(255) DEFAULT NULL COMMENT 'TABUNGANKU                        ',
  `TAB_UMROH` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN UMROH                    ',
  `THT_UMUM` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN THT UMUM                 ',
  `TAB_SIMPEL` varchar(255) DEFAULT NULL COMMENT 'TABUNGAN SIMPANAN PELAJAR (SIMPEL)',
  `KRED_UMUM` varchar(255) DEFAULT NULL COMMENT 'KREDIT UMUM                       ',
  `KRED_PEG` varchar(255) DEFAULT NULL COMMENT 'KREDIT PEGAWAI                    ',
  `KRED_MOTOR` varchar(255) DEFAULT NULL COMMENT 'KREDIT MOTOR                      ',
  `KRED_URK` varchar(255) DEFAULT NULL COMMENT 'KREDIT UMUM REKENING KORAN        ',
  `KRED_MOBIL` varchar(255) DEFAULT NULL COMMENT 'KREDIT MOBIL                      ',
  `DEP_1` varchar(255) DEFAULT NULL COMMENT 'DEPOSIT 1 BULAN',
  `DEP_3` varchar(255) DEFAULT NULL COMMENT 'DEPOSIT 3 BULAN',
  `DEP_6` varchar(255) DEFAULT NULL COMMENT 'DEPOSIT 6 BULAN',
  `DEP_12` varchar(255) DEFAULT NULL COMMENT 'DEPOSIT 12 BULAN',
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMPORT`),
  KEY `fk_import_kota_kota` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `import_kota_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `branch` (`ID_BRANCH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_kota
-- ----------------------------
INSERT INTO `import_kota` VALUES ('1', '1', '149563207502', '1508789329000', '4108602554', '5258361000', '18432758453', '17430691000', '2254136100', '22689052000', '380463364261', '398562582000', '681385858969', '681166398000', '1224426931859', '1210630568000', '20.66', '5.71', '39.88', '69.50', '42959', '83.14', '0.0266', '3.35', '42857', '12.22', '1', '2017', '301723304147', '16911261621', '8337242823', '19708056432', '64215624006', '7654962662', '1566904090', '6068961289', '6567392801', '960226943365', '227681039431', '8278146996', '322133765775', '1861169450', '788592251146', null, null, null, null);
INSERT INTO `import_kota` VALUES ('2', '1', '1492285324610', '1530162466000', '8260413257', '10885677000', '35874925124', '34976863000', '44135338381', '45862540000', '369873459095', '401458764000', '681489021977', '682768741000', '1256314653582', '1217347082000', '20.40', '5.64', '39.27', '69.63', '11.69', '85.72', '0.0269', '3.31', '42796', '11.94', '2', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('3', '1', '1514852519802', '1554896289000', '13055140832', '16332406000', '55160722452', '52866285000', '68215863284', '69198691000', '370683046714', '404829455000', '681316470216', '683448044000', '1297093674078', '1241335569000', '42786', '5.54', '38.56', '69.97', '13.27', '87.48', '0.0272', '3.19', '1.94', '11.87', '3', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('4', '1', '1552401312494', '1562895398000', '16300020588', '21858775000', '74713813928', '70878801000', '91013834516', '92737576000', '395171321460', '408515870000', '690676608249', '686847958000', '1361152638342', '1266766304000', '19.28', '5.34', '36.69', '70.74', '12.83', '89.83', '0.0258', '42797', '1.74', '11.75', '4', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('5', '1', '1545173241028', '1592085872000', '20638899160', '27611123000', '94375216294', '89144982000', '115014115454', '116756105000', '372663119026', '412240776000', '716270351383', '690264872000', '1383065909849', '1291301219000', '15.22', '5.27', '36.51', '71.03', '11.63', '91.86', '0.0271', '42981', '1.80', '11.71', '5', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('6', '1', '1582257263948', '1613230136000', '26243541374', '33675724000', '112488241400', '107596331000', '138731782774', '141272055000', '360539315277', '416423185000', '694971144159', '693698871000', '1409748044234', '1306233606000', '17.53', '5.28', '36.54', '70.87', '12.93', '91.85', '0.0263', '2.91', '1.65', '11.86', '6', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('7', '1', '1647093237262', '1637006201000', '32380170934', '39593947000', '131875911142', '125938191000', '164256082076', '165532138000', '399876120455', '423120351000', '724716997221', '706756736000', '1448639529341', '1329955439000', '17.17', '5.32', '36.82', '70.74', '12.68', '90.39', '0.0256', '2.85', '1.59', '11.86', '7', '2017', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('8', '1', '1674917105485', '1661799837000', '38235558761', '45772524000', '151323358080', '144520423000', '189558916841', '190292947000', '398456330281', '429193013000', '749512587735', '718742537000', '1467417563744', '1334827867000', '17.18', '5.31', '36.73', '70.70', '12.62', '90.32', '0.0258', '42980', '1.65', '11.91', '8', '2017', '275202856724', '19336141495', '8029069882', '19058435027', '61984048170', '7197059194', '1625569231', '5443166418', '579984140', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('9', '1', '1714254905862', '1686323646000', '44044543648', '51992000000', '170606747744', '163199032000', '214651291392', '215191032000', '417357641472', '435197955000', '761700774551', '729471699000', '1487860324649', '1351330511000', '42903', '5.28', '36.54', '70.85', '12.39', '89.71', '0.0254', '2.92', '1.67', '11.91', '9', '2017', '293095760782', '18012268971', '8635154595', '19358568272', '62779432190', '7467832738', '1633792838', '5757963356', '616867730', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `import_kota` VALUES ('10', '1', null, null, null, null, null, null, null, null, '426843056350', null, '788592251146', null, '1520181065017', null, null, null, null, null, null, null, null, null, null, null, '10', '2017', '301723304147', '16911261621', '8337242823', '19708056432', '64215624006', '7654962662', '1566904090', '6068961289', '656739280', '960226943365', '227681039431', '8278146996', '322133765775', '1861169450', '788592251146', null, null, null, null);

-- ----------------------------
-- Table structure for import_wilayah
-- ----------------------------
DROP TABLE IF EXISTS `import_wilayah`;
CREATE TABLE `import_wilayah` (
  `ID_IMPORT` int(11) NOT NULL,
  `ID_WILAYAH` int(11) DEFAULT NULL,
  `ASET_REALISASI` varchar(45) DEFAULT NULL,
  `ASET_TARGET` varchar(45) DEFAULT NULL,
  `LABA_REALISASI` varchar(45) DEFAULT NULL,
  `LABA_TARGET` varchar(45) DEFAULT NULL,
  `BIAYA_REALISASI` varchar(45) DEFAULT NULL,
  `BIAYA_TARGET` varchar(45) DEFAULT NULL,
  `PENDAPATAN_REALISASI` varchar(45) DEFAULT NULL,
  `PENDAPATAN_TARGET` varchar(45) DEFAULT NULL,
  `TABUNGAN_REALISASI` varchar(45) DEFAULT NULL,
  `TABUNGAN_TARGET` varchar(45) DEFAULT NULL,
  `DEPOSITO_REALISASI` varchar(45) DEFAULT NULL,
  `DEPOSITO_TARGET` varchar(45) DEFAULT NULL,
  `KREDIT_REALISASI` varchar(45) DEFAULT NULL,
  `KREDIT_TARGET` varchar(45) DEFAULT NULL,
  `CAR` varchar(45) DEFAULT NULL,
  `ROA` varchar(45) DEFAULT NULL,
  `ROE` varchar(45) DEFAULT NULL,
  `BOPO` varchar(45) DEFAULT NULL,
  `CR` varchar(45) DEFAULT NULL,
  `LDR` varchar(45) DEFAULT NULL,
  `KAP` varchar(45) DEFAULT NULL,
  `NPL_GROSS` varchar(45) DEFAULT NULL,
  `NPL_NET` varchar(45) DEFAULT NULL,
  `NIM` varchar(45) DEFAULT NULL,
  `BULAN` int(11) DEFAULT NULL,
  `TAHUN` int(11) DEFAULT NULL,
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMPORT`),
  KEY `fk_import_wilayah_wilayah` (`ID_WILAYAH`) USING BTREE,
  CONSTRAINT `import_wilayah_ibfk_1` FOREIGN KEY (`ID_WILAYAH`) REFERENCES `wilayah` (`ID_WILAYAH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_wilayah
-- ----------------------------

-- ----------------------------
-- Table structure for jabatan
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `ID_JABATAN` int(11) NOT NULL AUTO_INCREMENT,
  `JABATAN` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `ORDER` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_JABATAN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('1', 'DEWAN KOMISARIS', '1', '1');
INSERT INTO `jabatan` VALUES ('2', 'DIREKSI', '1', '2');
INSERT INTO `jabatan` VALUES ('3', 'KABAG / KACAB', '1', '3');
INSERT INTO `jabatan` VALUES ('4', 'KADIV / KAWIL', '1', '4');
INSERT INTO `jabatan` VALUES ('5', 'PEMEGANG SAHAM', '1', '5');

-- ----------------------------
-- Table structure for jabatan_dir
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_dir`;
CREATE TABLE `jabatan_dir` (
  `ID_JABATAN_DIR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JABATAN` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `ID_DIREKSI` int(11) NOT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `URUTAN` int(255) DEFAULT NULL,
  PRIMARY KEY (`ID_JABATAN_DIR`),
  KEY `jabatan_dir_ID_DIREKSI_idx` (`ID_DIREKSI`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan_dir
-- ----------------------------
INSERT INTO `jabatan_dir` VALUES ('1', '1', '1', '1', 'Pemegang Saham dan Komisaris Utama', '1');
INSERT INTO `jabatan_dir` VALUES ('2', '2', '1', '7', 'Direktur Utama', '1');
INSERT INTO `jabatan_dir` VALUES ('3', '3', '1', '25', 'Kepala Cabang Pasar Besar', '1');
INSERT INTO `jabatan_dir` VALUES ('4', '4', '1', '21', 'Kepala Divisi Non Operasional', '1');
INSERT INTO `jabatan_dir` VALUES ('5', '5', '1', '4', 'Pemegang Saham dan Komisaris', '1');

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis` (
  `ID_JENIS` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES ('1', 'Pemegang Saham');
INSERT INTO `jenis` VALUES ('2', 'Komisaris');
INSERT INTO `jenis` VALUES ('3', 'Direksi');
INSERT INTO `jenis` VALUES ('4', 'Divisi');
INSERT INTO `jenis` VALUES ('5', 'Kepala Wilayah');
INSERT INTO `jenis` VALUES ('6', 'Kepala Cabang');
INSERT INTO `jenis` VALUES ('7', 'Kepala Bagian');

-- ----------------------------
-- Table structure for kas
-- ----------------------------
DROP TABLE IF EXISTS `kas`;
CREATE TABLE `kas` (
  `ID_KAS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CABANG` int(11) DEFAULT NULL,
  `KAS` varchar(45) DEFAULT NULL,
  `ALAMAT` varchar(200) DEFAULT NULL,
  `KECAMATAN` varchar(200) DEFAULT NULL,
  `NO_TELP` varchar(20) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_KAS`),
  KEY `kas_ID_CABANG_idx` (`ID_CABANG`) USING BTREE,
  CONSTRAINT `kas_ibfk_1` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kas
-- ----------------------------
INSERT INTO `kas` VALUES ('1', '1', 'Banjarmangu', 'Jl. Sunan Gripit, Desa Gripit RT 01/ RW 01', 'Kec. Banjarmangu Kab. Banjarnegara', '082322297212', '1');
INSERT INTO `kas` VALUES ('2', '2', 'Kas Pagedongan', 'Desa Pagedongan Rt. 04 Rw. 01 ', 'Kec. Pagedongan Kab. Banjarnegara', '082322297252', '1');
INSERT INTO `kas` VALUES ('3', '3', 'Kas Tunggoro', 'Ds.Tunggara RT .05/RW.02 ', 'Kec. Sigaluh Kab. Banjarnegara', '(0286) 3399155', '1');
INSERT INTO `kas` VALUES ('4', '5', 'Kas Susukan', 'Ds.Pakikiran RT 03 RW 01', 'Kec.Susukan Kab. Banjarnegara', '082892031716', '1');
INSERT INTO `kas` VALUES ('5', '6', 'Kas Bawang', 'Desa Bawang Rt. 03 Rw. 05 ', 'Kec. Bawang Kab. Banjarnegara', '(0286) 5985636', '1');
INSERT INTO `kas` VALUES ('6', '6', 'Kas Wanadri', 'Desa Wanadri Rt. 02 Rw. 02 ', 'Kec. Bawang Kab. Banjarnegara', '082136249944', '1');
INSERT INTO `kas` VALUES ('7', '8', 'Kas Rakit', 'Jl. Raya Rakit RT 02 RW 03 Desa Rakit Kecamatan Rakit', 'Kab. Banjarnegara', '(0286) 5988946', '1');
INSERT INTO `kas` VALUES ('8', '10', 'Kas Wanayas', 'Ds.Wanayasa RT.05 RW.02', 'Wanayasa Banjarnegar', '08122673479', '1');
INSERT INTO `kas` VALUES ('9', '10', 'Kas Pejawaran', 'Desa Penusupan Rt.02/04', 'Kec. Pejawaran Kab. Banjarnegara', '08112615212', '1');
INSERT INTO `kas` VALUES ('10', '11', 'Pandanarum', 'Desa Pringamba RT.01/01', 'Kec. Pandanarum Kab. Banjarnegara', '08112604662', '1');
INSERT INTO `kas` VALUES ('11', '15', 'Paninggaran', 'Jl. Raya Paninggaran, Perum Griya Paninggaran Permai Desa Paninggaran', 'Kec. Paninggaran Kab. Pekalongan', '0811273114', '1');
INSERT INTO `kas` VALUES ('12', '15', 'Kas KesesI', 'Jl. Raya Kesesi Rt.06/Rw.09 Desa Kesesi', 'Kec. Kesesi Kab. Pekalongan', '(0285) 3830010', '1');
INSERT INTO `kas` VALUES ('13', '15', 'Wonopringgo', 'Jl. Raya Wonopringgo Rt.11/Rw.05 Desa Rowokembu', 'Kec. Wonopringgo Kab. Pekalongan', '(0285) 7830177', '1');
INSERT INTO `kas` VALUES ('14', '15', 'Kas Doro', 'Jl. Ki Hajar Dewantoro RT 01 RW 03 ', 'Kec. Doro Kab. Pekalongan 51191', '(0285) 4483815', '1');
INSERT INTO `kas` VALUES ('15', '16', 'Kas Kutasari', 'Jl. Raya Purbalingga-Tobong Kutasari 7/4', 'Kutasari Purbalingga', '(0281) 6599295', '1');
INSERT INTO `kas` VALUES ('16', '16', 'Kas Kaligondang', 'Ds.Sinduraja Rt.02 Rw.03 ', 'Kec. Kaligondang Kab.Purbalingga', '(0281) 6591042', '1');
INSERT INTO `kas` VALUES ('17', '16', 'Kas Padamara', 'Jl. Raya Padamara Ds. Padamara Rt.3/1', 'Kec. Padamara Kab. Purbalingga', '(0281) 6598542', '1');
INSERT INTO `kas` VALUES ('18', '16', 'Kas Segamas', 'Kios K1 Blok A Pasar Segamas Purbalingga, Jl. Mayjend Sungkono, Kalikobang, Kalimanah, Purbalingga', '-', '(0281) 6597744', '1');
INSERT INTO `kas` VALUES ('19', '16', 'Kas Kemangkon', 'Desa Panican RT.07/02 Kec. Kemangkon', 'Kab. Purbalingga', '(0281) 6591656', '1');
INSERT INTO `kas` VALUES ('20', '16', 'Kas Bojongsari', 'Desa Bojongsari Rt.01/Rw.01', 'Kec. Bojongsari Kab. Purbalingga', '(0281) 6597021', '1');
INSERT INTO `kas` VALUES ('21', '16', 'Kas Bukateja', 'Jl. Purwandaru No.27 RT 05 RW 03 Desa Bukateja', 'Kec. Bukateja Kab. Purbalingga', '(0286) 5211664', '1');
INSERT INTO `kas` VALUES ('22', '16', 'Kas Kalikajar', 'Jl. Raya Kalikajar RT 02 RW 06 Desa Kalikajar Kecamatan Kaligondang Kabupaten Purbalingga', '-', '(0281) 8901521', '1');
INSERT INTO `kas` VALUES ('23', '17', 'Kas Karanganyar', 'Desa Karanganyar RT.01/02', 'Kec. Karanganyar Kab. Purbalingga', '082322297215', '1');
INSERT INTO `kas` VALUES ('24', '17', 'Kas Mrebet', 'Jl. Raya Pengalusan Rt.05/Rw.01 Desa Pengalusan', 'Kec. Mrebet Kab. Purbalingga', '082.138.480.998', '1');
INSERT INTO `kas` VALUES ('25', '18', 'Kas Karangmoncol', 'Desa Pekiringan Rt.03 Rw.09', 'Kec. Karangmoncol Kab. Purbalingga', '(0281) 6590171', '1');
INSERT INTO `kas` VALUES ('26', '20', 'Kas Pasarwage', 'Jl.Komb. Bambang Suprapto No.92 Rt.02/ Rw.02 Purwokerto Wetan', 'Kec. Purwokerto Timur Kab.Banyumas', '(0281) 630661', '1');
INSERT INTO `kas` VALUES ('27', '20', 'Kas Karanglewas', 'Jln. Kerta Wibawa Rt 02/Rw.03 Desa Pasir wetan ', 'Kec. Karanglewas Kab Banyumas', '(0281) 642462', '1');
INSERT INTO `kas` VALUES ('28', '20', 'Kas Pabuwaran', 'Jl. Raya Baturaden No.228, Kelurahan Pabuwaran Rt.03/02', 'Kec. Purwokerto Utara Kab. Banyumas', '(0281) 6573139', '1');
INSERT INTO `kas` VALUES ('29', '20', 'Kas Sokaraja', 'Jl. Ahmad Yani, Ruko Pasar Sokaraja, Desa Sokaraja Kidul Rt. 02 Rw. 03', 'Kec. Sokaraja, Kab. Banyumas', '(0281) 6441563', '1');
INSERT INTO `kas` VALUES ('30', '20', 'Kas Dukuhwaluh', 'Jl. Raden Patah Desa Dukuhwaluh Rt.02 Rw.04 ', 'Kec. Kembaran Kab. Banyumas', '(0281) 6843749', '1');
INSERT INTO `kas` VALUES ('31', '20', 'Kas Kedungwuluh', 'Jl. Jenderal Sutoyo RT 04 RW 01 Kelurahan Kedungwuluh, Purwokerto Barat', '-', '(0281) 7773867', '1');
INSERT INTO `kas` VALUES ('32', '20', 'Kas Baturaden', 'Karangtengah RT 04 RW 05 ', 'Kec. Baturraden Kab. Banyumas', '(0281) 6871129', '1');
INSERT INTO `kas` VALUES ('33', '21', 'Kas Cilongok', 'Jl. Raya Cilongok No.9 Desa Pernasidi Rt.03/Rw.03 ', 'Kec. Cilongok Kab. Banyumas', '(0281) 655795', '1');
INSERT INTO `kas` VALUES ('34', '21', 'Kas Pekuncen', 'Desa Banjaranyar Rt.003/Rw.007 ', 'Kec. Pekuncen Kab. Banyumas', '(0281) 5705009', '1');
INSERT INTO `kas` VALUES ('35', '22', 'Kas Patikraja', 'Jl. Raya Banyumas, Desa Patikraja Rt.02 Rw.03', 'Kec. Patikraja Kab. Banyumas', '(0281) 6844895', '1');
INSERT INTO `kas` VALUES ('36', '22', 'Kas Rawalo', 'Jl. HM. Bahrun Desa Rawalo RT 01/ RW 01 ', 'Kec. Rawalo Kab. Banyumas', '(0281) 6848120', '1');
INSERT INTO `kas` VALUES ('37', '23', 'Kas Kesugihan', 'Jl. Gerilya No.31 Rt.01 Rw.07 Desa Kuripan', 'Kec. Kesugihan Kab. Cilacap', '(0282) 5071431', '1');
INSERT INTO `kas` VALUES ('38', '23', 'Kas Pasar Gede', 'Jl. Kapt. P. Tendean Komplek Ruko Pelangi No.9 Kel. Tegalreja ', 'Kec. Cilacap Selatan Kab. Cilacap', '(0282) 5561835', '1');
INSERT INTO `kas` VALUES ('39', '23', 'Kas Jeruklegi', 'Jl. Raya Jeruklegi Rt 001 Rw 005 Desa Jeruklegi Wetan ', 'Kec. Jeruklegi Kab. Cilacap', '(0282) 5565665', '1');
INSERT INTO `kas` VALUES ('40', '24', 'Kas Nusawungu', 'Jl. Raya Kroya-Nusawungu RT 01 RW 03 Desa Danasri Kecamatan Nusawungu Kabupaten Cilacap', 'Kabupaten Cilacap', '(0282) 5296911', '1');
INSERT INTO `kas` VALUES ('41', '25', 'Kas Kalikajar', 'Dusun Madusari Rt. 04 Rw. 05, Desa Maduretno, ', 'Kec Kalikajar, Kab. Wonosobo 56372', '(0286) 3301176', '1');
INSERT INTO `kas` VALUES ('42', '26', 'Kas Pasar Wonosobo', 'Jln. Resimen Blok 4', 'Kab. Wonosobo', '(0286) 324852', '1');
INSERT INTO `kas` VALUES ('43', '26', 'Kas Garung', 'Jl. Raya Dieng No. 78 Km. 9, Rt. 01 Rw. 02 ', 'Kec. Garung, Kab. Wonosobo 56354 ', '(0286) 3325739', '1');
INSERT INTO `kas` VALUES ('44', '26', 'Kas Mojotengah', 'Jl. Raya Kalibeber Km. 3 Sarimulyo, Rt. 03 Rw. 10 Kel. Kalibeber, ', 'Kec. Mojotengah Kab. Wonosobo ', '(0286) 3326020', '1');
INSERT INTO `kas` VALUES ('45', '27', 'Kas Kepil', 'Dsn. Sumpet Rt. 01 Rw. 04', 'Kec. Kepil Kab. Wonosobo 56374', '(0286) 3399034', '1');
INSERT INTO `kas` VALUES ('46', '27', 'Kas Randusari', 'Margosari, Rt 08/ Rw 03, Kel. Randusari, ', 'Kec. Kepil, Kab Wonosobo 56374', '085225888829', '1');
INSERT INTO `kas` VALUES ('47', '27', 'Kas Kalibawang', 'Dusun Kalibawang Rt. 01 Rw. 01, Desa Karangsambung, ', 'Kecamatan Kalibawang, Kabupaten Wonosobo 56375', '082243330360', '1');
INSERT INTO `kas` VALUES ('48', '28', 'Kas Wadaslintang', 'Dsn. Wadaslintang Rt. 02 Rw. 01', 'Kec. Wadaslintang, Kab. Wonosobo 56365', '085227242544', '1');
INSERT INTO `kas` VALUES ('49', '29', '1.5.1 Kas Watumalang', 'Jl. Raya Watumalang Km. 5, Desa Gondang Rt. 17B Rw. 04, ', 'Kec. Watumalang, Kab. Wonosobo 56352', '(0286) 321107', '1');
INSERT INTO `kas` VALUES ('50', '29', '1.5.2 Kas Leksono', 'Dusun Jlamprang Rt. 03 Rw. 03, Desa Jlamprang ', 'Kecamatan Leksono, Kabupaten Wonosobo 56362', '(0286) 3301878', '1');
INSERT INTO `kas` VALUES ('51', '29', '1.5.3 Kas Balekambang', 'Dusun Balekambang Rt. 15 Rw. 04, Desa Balekambang, ', 'Kecamatan Selomerto, Kabupaten Wonosobo', '-', '1');
INSERT INTO `kas` VALUES ('52', '30', 'Kas Pringsurat', 'Ds. Ngebong Rt. 02 Rw. 08', 'Kec. Pringsurat, Kab. Temanggung 56272', '(0293) 599626', '1');
INSERT INTO `kas` VALUES ('53', '30', 'Kas Kranggan', 'Dsn. Ngepoh Rt. 03 Rw. 01', 'Kec. Kranggan, Kab. Temanggung 56271', '(0293) 4901343', '1');
INSERT INTO `kas` VALUES ('54', '30', 'Kas Tembarak', 'Dusun Kamal Timur Rt. 03 Rw. 09, Menggoro ', 'Kec. Tembarak, Kab. Temanggung 56261', '(0293) 4903377', '1');
INSERT INTO `kas` VALUES ('55', '30', 'Kas Kaloran', 'Dusun Mengor Rt. 03 Rw. 04, Desa Kaloran ', 'Kecamatan Kaloran, Kabupaten Temanggung 56282', '081385090778', '1');
INSERT INTO `kas` VALUES ('56', '31', 'kas Candiroto', 'Dusun Kauman Rt. 01 Rw. 02, Ds. Candiroto', 'Kec. Candiroto, Kab. Temanggung 56257', '085290677787', '1');
INSERT INTO `kas` VALUES ('57', '31', 'Kas Jumo', 'Dusun Jamusan, Rt 09/ Rw 01, Desa Jamusan, ', 'Kec. Jumo, Kab. Temanggung 56256', '(0293) 5915135', '1');
INSERT INTO `kas` VALUES ('58', '31', 'Kas Bejen', 'Dusun Ngloji Rt. 03 Rw. 01, Desa Bejen, ', 'Kecamatan Bejen, Kabupaten Temanggung', '(0294) 3652860', '1');
INSERT INTO `kas` VALUES ('59', '32', 'kas Paponan', 'Dsn Paponan Rt. 01 Rw. 01, Paponan', 'Kec. Kledung, Kab. Temanggung 56264', '082134580163', '1');

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota` (
  `ID_KOTA` int(11) NOT NULL AUTO_INCREMENT,
  `KOTA` varchar(200) DEFAULT NULL,
  `STRUKTUR_ORGANISASI` varchar(200) DEFAULT NULL,
  `L` varchar(255) DEFAULT NULL,
  `P` varchar(255) DEFAULT NULL,
  `SD` varchar(255) DEFAULT NULL,
  `SMA` varchar(255) DEFAULT NULL,
  `D3` varchar(255) DEFAULT NULL,
  `S1` varchar(255) DEFAULT NULL,
  `S2` varchar(255) DEFAULT NULL,
  `MODAL_INTI` varchar(255) DEFAULT NULL,
  `MODAL_PELENGKAP` varchar(255) DEFAULT NULL,
  `TOTAL_MODAL` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_KOTA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES ('1', 'Banjarnegara', null, '15', '22', '22', '13', '32', '65', '2', '0', '0', '0', '1', '0');
INSERT INTO `kota` VALUES ('2', 'Wonosobo', null, '23', '11', '21', '17', '38', '45', '1', '0', '0', '0', '1', '0');

-- ----------------------------
-- Table structure for kredit
-- ----------------------------
DROP TABLE IF EXISTS `kredit`;
CREATE TABLE `kredit` (
  `ID_KREDIT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `BULAN` int(2) DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `JENIS_KREDIT` enum('KREDIT MOTOR','KREDIT PEGAWAI','KREDIT UMUM','KREDIT MOBIL') DEFAULT NULL,
  `PLAFOND` varchar(100) DEFAULT NULL,
  `BAKI_DEBET` varchar(100) DEFAULT NULL,
  `JML_NASABAH` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_KREDIT`),
  KEY `fk_kredit_id_kota` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `kredit_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kredit
-- ----------------------------
INSERT INTO `kredit` VALUES ('1', '1', '1', '2017', 'KREDIT MOTOR', '346783818', '346783818', ' 35 \r\n');
INSERT INTO `kredit` VALUES ('2', '1', '1', '2017', 'KREDIT PEGAWAI', '6101733718', '6101733718', ' 105 \r\n');
INSERT INTO `kredit` VALUES ('3', '1', '1', '2017', 'KREDIT UMUM', '44290000000', '23905448550', ' 24 \r\n');
INSERT INTO `kredit` VALUES ('4', '1', '2', '2017', 'KREDIT MOTOR', '453293167', '453293167', ' 40 \r\n');
INSERT INTO `kredit` VALUES ('5', '1', '2', '2017', 'KREDIT PEGAWAI', '7709955150', '7709955150', ' 134 \r\n');
INSERT INTO `kredit` VALUES ('6', '1', '2', '2017', 'KREDIT UMUM', '30445000000', '28430321300', ' 28 \r\n');
INSERT INTO `kredit` VALUES ('8', '1', '3', '2017', 'KREDIT MOTOR', '308208796', '308208796', '27');
INSERT INTO `kredit` VALUES ('9', '1', '3', '2017', 'KREDIT PEGAWAI', '8464459266', '8464459266', '134');
INSERT INTO `kredit` VALUES ('10', '1', '3', '2017', 'KREDIT UMUM', '23815000000', '22170905000', ' 31 \r\n');
INSERT INTO `kredit` VALUES ('11', '1', '4', '2017', 'KREDIT MOTOR', '253218740', '253218740', '21 ');
INSERT INTO `kredit` VALUES ('12', '1', '4', '2017', 'KREDIT PEGAWAI', '6500888090', '6500888090', '139 ');
INSERT INTO `kredit` VALUES ('13', '1', '4', '2017', 'KREDIT UMUM', '39640000000', '38364589048', '41 ');
INSERT INTO `kredit` VALUES ('14', '1', '5', '2017', 'KREDIT MOTOR', '333321121', '333321121', '27 ');
INSERT INTO `kredit` VALUES ('15', '1', '5', '2017', 'KREDIT PEGAWAI', '6813898168', '6813898168', '120 ');
INSERT INTO `kredit` VALUES ('16', '1', '5', '2017', 'KREDIT UMUM', '31935000000', '25977174550', '41 ');
INSERT INTO `kredit` VALUES ('17', '1', '6', '2017', 'KREDIT MOTOR', '375438247', '375438247', '27 ');
INSERT INTO `kredit` VALUES ('18', '1', '6', '2017', 'KREDIT PEGAWAI', '4769250508', '4769250508', '98 ');
INSERT INTO `kredit` VALUES ('19', '1', '6', '2017', 'KREDIT UMUM', '44540000000', '41072504600', '35 ');
INSERT INTO `kredit` VALUES ('20', '1', '7', '2017', 'KREDIT MOTOR', '525549850', '525549850', '34 ');
INSERT INTO `kredit` VALUES ('21', '1', '7', '2017', 'KREDIT PEGAWAI', '5700789468', '5700789468', '88 ');
INSERT INTO `kredit` VALUES ('22', '1', '7', '2017', 'KREDIT UMUM', '57180000000', '56379302500', '19 ');
INSERT INTO `kredit` VALUES ('23', '1', '8', '2017', 'KREDIT MOTOR', '827456731', '827456731', '40 ');
INSERT INTO `kredit` VALUES ('24', '1', '8', '2017', 'KREDIT PEGAWAI', '6931031929', '6931031929', '129 ');
INSERT INTO `kredit` VALUES ('25', '1', '8', '2017', 'KREDIT UMUM', '12500000000', '12153992000', '11 ');
INSERT INTO `kredit` VALUES ('26', '1', '9', '2017', 'KREDIT MOTOR', '921119466', '921119466', '53 ');
INSERT INTO `kredit` VALUES ('27', '1', '9', '2017', 'KREDIT PEGAWAI', '6507128450', '6507128450', '119 ');
INSERT INTO `kredit` VALUES ('28', '1', '9', '2017', 'KREDIT UMUM', '22650000000', '20020898000', '20 ');

-- ----------------------------
-- Table structure for linkage
-- ----------------------------
DROP TABLE IF EXISTS `linkage`;
CREATE TABLE `linkage` (
  `ID_LINKAGE` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_BANK` varchar(45) DEFAULT NULL,
  `TYPE` enum('1','0') DEFAULT NULL COMMENT '1 : Bank\n0 : Non Bank',
  `NOMINAL` varchar(45) DEFAULT NULL,
  `LOGO` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_LINKAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of linkage
-- ----------------------------
INSERT INTO `linkage` VALUES ('1', 'Bank Mandiri', '1', null, '20171124140937_ic_mandiri.png', '1', '0');
INSERT INTO `linkage` VALUES ('2', 'CIMB Niaga', '1', null, '20171124141202_ic_cimb.png', '1', '0');
INSERT INTO `linkage` VALUES ('3', 'BJB', '1', null, '20171124141250_ic_bjb.png', '1', '0');
INSERT INTO `linkage` VALUES ('4', 'BNI', '1', null, '20171124141316_ic_bni.png', '1', '0');
INSERT INTO `linkage` VALUES ('5', 'Bank Jateng', '1', null, '20171124141450_ic_bank_jateng.png', '1', '0');
INSERT INTO `linkage` VALUES ('6', 'LPDB', '0', null, 'ic_lpdb.png', '1', '1');
INSERT INTO `linkage` VALUES ('7', 'Bank Danamon', '1', null, '20171124141501_ic_bank_danamon.png', '1', '0');
INSERT INTO `linkage` VALUES ('8', 'Bank Mayapada', '1', null, '20171120134340_cu_4.jpg', '1', '0');

-- ----------------------------
-- Table structure for linkage_kota
-- ----------------------------
DROP TABLE IF EXISTS `linkage_kota`;
CREATE TABLE `linkage_kota` (
  `ID_LINKAGE` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `NOMINAL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_LINKAGE`,`ID_KOTA`),
  KEY `linkage_kota_ID_KOTA_idx` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `linkage_kota_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `linkage_kota_ibfk_2` FOREIGN KEY (`ID_LINKAGE`) REFERENCES `linkage` (`ID_LINKAGE`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of linkage_kota
-- ----------------------------
INSERT INTO `linkage_kota` VALUES ('1', '1', '20.000.000.000');
INSERT INTO `linkage_kota` VALUES ('1', '2', '8.418.079.100');
INSERT INTO `linkage_kota` VALUES ('2', '1', '115.000.000.000');
INSERT INTO `linkage_kota` VALUES ('2', '2', '56.388.888.914 ');
INSERT INTO `linkage_kota` VALUES ('3', '1', '116.000.000.000');
INSERT INTO `linkage_kota` VALUES ('3', '2', '24.277.777.778');
INSERT INTO `linkage_kota` VALUES ('4', '1', '10.000.000.000');
INSERT INTO `linkage_kota` VALUES ('4', '2', '10.000.000.000');
INSERT INTO `linkage_kota` VALUES ('5', '1', '5.000.000.000');
INSERT INTO `linkage_kota` VALUES ('6', '1', '60.000.000.000');
INSERT INTO `linkage_kota` VALUES ('6', '2', '6.666.664.000');
INSERT INTO `linkage_kota` VALUES ('7', '2', '4.921.650.935');

-- ----------------------------
-- Table structure for notif
-- ----------------------------
DROP TABLE IF EXISTS `notif`;
CREATE TABLE `notif` (
  `ID_NOTIF` int(11) NOT NULL AUTO_INCREMENT,
  `NOTIF` varchar(100) DEFAULT NULL,
  `JENIS` enum('Android','Web') DEFAULT NULL,
  `WAKTU` datetime DEFAULT NULL,
  `SEEN` enum('0','1') DEFAULT NULL,
  `NEW` enum('0','1') DEFAULT NULL,
  `LINK` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_NOTIF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notif
-- ----------------------------

-- ----------------------------
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT,
  `PENDIDIKAN` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) NOT NULL,
  PRIMARY KEY (`ID_PENDIDIKAN`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES ('1', 'SD-SMP', '1', '0');
INSERT INTO `pendidikan` VALUES ('2', 'SMA/SMK', '1', '0');
INSERT INTO `pendidikan` VALUES ('3', 'D3', '1', '0');
INSERT INTO `pendidikan` VALUES ('4', 'S1', '1', '0');
INSERT INTO `pendidikan` VALUES ('5', 'S2', '1', '0');
INSERT INTO `pendidikan` VALUES ('6', 'pens', '0', '0');
INSERT INTO `pendidikan` VALUES ('7', 's', '0', '0');
INSERT INTO `pendidikan` VALUES ('8', 'aaa', '1', '0');
INSERT INTO `pendidikan` VALUES ('9', 'D1', '1', '0');
INSERT INTO `pendidikan` VALUES ('10', 'D2', '1', '0');
INSERT INTO `pendidikan` VALUES ('11', 'Paket C', '1', '0');

-- ----------------------------
-- Table structure for pendidikan_kota
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan_kota`;
CREATE TABLE `pendidikan_kota` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PENDIDIKAN`,`ID_KOTA`),
  KEY `pendidikan_kota_ID_KOTA_idx` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `pendidikan_kota_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pendidikan_kota_ibfk_2` FOREIGN KEY (`ID_PENDIDIKAN`) REFERENCES `pendidikan` (`ID_PENDIDIKAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan_kota
-- ----------------------------
INSERT INTO `pendidikan_kota` VALUES ('1', '1', '21');
INSERT INTO `pendidikan_kota` VALUES ('1', '2', '9');
INSERT INTO `pendidikan_kota` VALUES ('2', '1', '580');
INSERT INTO `pendidikan_kota` VALUES ('2', '2', '162');
INSERT INTO `pendidikan_kota` VALUES ('3', '1', '118');
INSERT INTO `pendidikan_kota` VALUES ('3', '2', '34');
INSERT INTO `pendidikan_kota` VALUES ('4', '1', '312');
INSERT INTO `pendidikan_kota` VALUES ('4', '2', '105');
INSERT INTO `pendidikan_kota` VALUES ('5', '1', '1');
INSERT INTO `pendidikan_kota` VALUES ('5', '2', '0');

-- ----------------------------
-- Table structure for tabungan
-- ----------------------------
DROP TABLE IF EXISTS `tabungan`;
CREATE TABLE `tabungan` (
  `ID_TABUNGAN` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_TABUNGAN` varchar(50) DEFAULT NULL,
  `STATUS` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID_TABUNGAN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tabungan
-- ----------------------------
INSERT INTO `tabungan` VALUES ('1', 'Tabungan Surya', '1');
INSERT INTO `tabungan` VALUES ('2', 'ATM Khusus', '1');
INSERT INTO `tabungan` VALUES ('3', 'ATM Surya', '1');
INSERT INTO `tabungan` VALUES ('4', 'Tabungan Pensiun', '1');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `NO` varchar(11) DEFAULT NULL,
  `GROUP` varchar(255) DEFAULT NULL,
  `BRANCH` varchar(255) DEFAULT NULL,
  `TYPE` varchar(255) DEFAULT NULL,
  `AMOUNT_TOTAL` varchar(255) DEFAULT NULL,
  `COUNT` varchar(255) DEFAULT NULL,
  `BULAN` int(255) DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  KEY `ID_GROUP` (`GROUP`),
  KEY `ID_BRANCH` (`BRANCH`),
  KEY `ID_TYPE` (`TYPE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('\n1', 'A', '0000', '130', '960226943365', '17062', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n2', 'A', '0000', '131', '227681039431', '3777', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n3', 'A', '0000', '132', '8278146996', '883', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n4', 'A', '0000', '135', '322133765775', '292', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n5', 'A', '0000', '141', '1861169450', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n6', 'A', '0000', '210', '301723304147', '143759', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n7', 'A', '0000', '211', '16911261621', '1098', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n8', 'A', '0000', '212', '19708056432', '674', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n9', 'A', '0000', '213', '64215624006', '44756', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n10', 'A', '0000', '214', '7654962662', '3980', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n11', 'A', '0000', '215', '8337242823', '3981', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n12', 'A', '0000', '216', '1566904090', '227', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n13', 'A', '0000', '217', '6068961289', '2827', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n14', 'A', '0000', '218', '656739280', '4314', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n15', 'A', '0000', '220', '788592251146', '9175', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n16', 'B', '8000', '210', '10539781511', '800', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n17', 'B', '8000', '211', '15613142273', '477', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n18', 'B', '8000', '212', '19708056432', '674', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n19', 'B', '8000', '214', '142002328', '78', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n20', 'B', '8000', '215', '661247446', '282', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n21', 'B', '8000', '217', '48818454', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n22', 'B', '8000', '220', '140277354521', '1393', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n23', 'B', '8001', '130', '168392475375', '3240', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n24', 'B', '8001', '131', '68325476883', '873', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n25', 'B', '8001', '132', '1265287548', '137', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n26', 'B', '8001', '135', '45382377000', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n27', 'B', '8001', '141', '1016926900', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n28', 'B', '8001', '210', '54415235647', '26586', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n29', 'B', '8001', '211', '211453090', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n30', 'B', '8001', '213', '11257484514', '6469', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n31', 'B', '8001', '214', '1856290788', '807', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n32', 'B', '8001', '215', '1278009294', '640', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n33', 'B', '8001', '216', '240900812', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n34', 'B', '8001', '217', '822279223', '387', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n35', 'B', '8001', '218', '211706500', '1086', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n36', 'B', '8001', '220', '70986309250', '1141', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n37', 'B', '8002', '130', '143536630271', '3293', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n38', 'B', '8002', '131', '32039269992', '557', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n39', 'B', '8002', '132', '2510337221', '291', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n40', 'B', '8002', '135', '10465649777', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n41', 'B', '8002', '141', '182212350', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n42', 'B', '8002', '210', '65467596557', '30406', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n43', 'B', '8002', '211', '221919648', '115', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n44', 'B', '8002', '213', '18161844089', '11626', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n45', 'B', '8002', '214', '1916226331', '873', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n46', 'B', '8002', '215', '1188948386', '448', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n47', 'B', '8002', '216', '188564859', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n48', 'B', '8002', '217', '1747839037', '746', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n49', 'B', '8002', '218', '167920300', '1413', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n50', 'B', '8002', '220', '56869290514', '1830', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n51', 'B', '8003', '130', '91011180881', '2064', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n52', 'B', '8003', '131', '10043428517', '133', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n53', 'B', '8003', '132', '863967055', '118', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n54', 'B', '8003', '135', '18017526632', '54', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n55', 'B', '8003', '141', '168698800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n56', 'B', '8003', '210', '28669090682', '11970', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n57', 'B', '8003', '211', '154152624', '58', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n58', 'B', '8003', '213', '4295836184', '2873', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n59', 'B', '8003', '214', '836799999', '314', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n60', 'B', '8003', '215', '502347567', '510', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n61', 'B', '8003', '216', '116074832', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n62', 'B', '8003', '217', '516054899', '287', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n63', 'B', '8003', '218', '93199700', '213', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n64', 'B', '8003', '220', '34626530490', '628', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n65', 'B', '8004', '130', '74653328983', '1486', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n66', 'B', '8004', '131', '2989457100', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n67', 'B', '8004', '132', '600967205', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n68', 'B', '8004', '135', '8350552700', '36', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n69', 'B', '8004', '141', '211189800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n70', 'B', '8004', '210', '29340673102', '10820', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n71', 'B', '8004', '211', '128625128', '55', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n72', 'B', '8004', '213', '4671301384', '3317', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n73', 'B', '8004', '214', '951058337', '583', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n74', 'B', '8004', '215', '652877636', '230', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n75', 'B', '8004', '216', '231517909', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n76', 'B', '8004', '217', '518479729', '256', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n77', 'B', '8004', '218', '23702000', '267', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n78', 'B', '8004', '220', '19570041128', '338', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n79', 'B', '8005', '130', '55994017387', '1139', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n80', 'B', '8005', '131', '21029065168', '411', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n81', 'B', '8005', '132', '464035543', '57', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n82', 'B', '8005', '135', '19741317816', '25', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n83', 'B', '8005', '210', '14074150530', '7734', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n84', 'B', '8005', '211', '76283852', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n85', 'B', '8005', '213', '1756160536', '2055', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n86', 'B', '8005', '214', '251106198', '171', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n87', 'B', '8005', '215', '387285486', '312', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n88', 'B', '8005', '216', '202647542', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n89', 'B', '8005', '217', '236666974', '108', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n90', 'B', '8005', '218', '8422000', '116', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n91', 'B', '8005', '220', '20750846140', '424', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n92', 'B', '8006', '130', '196863224785', '3239', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n93', 'B', '8006', '131', '35909032676', '831', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n94', 'B', '8006', '132', '1142701790', '111', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n95', 'B', '8006', '135', '36283360950', '36', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n96', 'B', '8006', '141', '35145200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n97', 'B', '8006', '210', '49062582857', '25934', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n98', 'B', '8006', '211', '310245948', '139', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n99', 'B', '8006', '213', '13072326580', '8796', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n100', 'B', '8006', '214', '490896330', '309', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n101', 'B', '8006', '215', '1102902838', '629', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n102', 'B', '8006', '216', '349831546', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n103', 'B', '8006', '217', '1009253395', '502', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n104', 'B', '8006', '218', '25464000', '442', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n105', 'B', '8006', '220', '120480900452', '1134', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n106', 'B', '8007', '130', '150695732333', '1531', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n107', 'B', '8007', '131', '35622525986', '550', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n108', 'B', '8007', '132', '880191066', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n109', 'B', '8007', '135', '84710953100', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n110', 'B', '8007', '141', '196248200', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n111', 'B', '8007', '210', '29193999209', '17809', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n112', 'B', '8007', '211', '93874203', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n113', 'B', '8007', '213', '5968825338', '5430', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n114', 'B', '8007', '214', '928249335', '400', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n115', 'B', '8007', '215', '1389563689', '660', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n116', 'B', '8007', '216', '83717171', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n117', 'B', '8007', '217', '773872361', '339', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n118', 'B', '8007', '218', '25043000', '273', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n119', 'B', '8007', '220', '226230739172', '1483', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n120', 'B', '8008', '130', '26029470160', '387', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n121', 'B', '8008', '131', '10834484780', '235', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n122', 'B', '8008', '132', '166355350', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n123', 'B', '8008', '135', '90620000000', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n124', 'B', '8008', '141', '50748200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n125', 'B', '8008', '210', '10069941105', '5939', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n126', 'B', '8008', '211', '36367806', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n127', 'B', '8008', '213', '1998384450', '1723', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n128', 'B', '8008', '214', '25113479', '86', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n129', 'B', '8008', '215', '754119643', '102', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n130', 'B', '8008', '216', '122394599', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n131', 'B', '8008', '217', '229164574', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n132', 'B', '8008', '218', '51507500', '259', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n133', 'B', '8008', '220', '13106817715', '256', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n134', 'B', '8009', '130', '53050883190', '683', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n135', 'B', '8009', '131', '10888298329', '145', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n136', 'B', '8009', '132', '384304218', '38', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n137', 'B', '8009', '135', '8562027800', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n138', 'B', '8009', '210', '10890252947', '5761', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n139', 'B', '8009', '211', '65197049', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n140', 'B', '8009', '213', '3033460931', '2467', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n141', 'B', '8009', '214', '257219537', '359', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n142', 'B', '8009', '215', '419940838', '168', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n143', 'B', '8009', '216', '31254820', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n144', 'B', '8009', '217', '166532643', '91', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n145', 'B', '8009', '218', '49774280', '245', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n146', 'B', '8009', '220', '85693421764', '548', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n147', 'C', '1011', '210', '10539781511', '800', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n148', 'C', '1011', '211', '15613142273', '477', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n149', 'C', '1011', '212', '19708056432', '674', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n150', 'C', '1011', '214', '142002328', '78', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n151', 'C', '1011', '215', '661247446', '282', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n152', 'C', '1011', '217', '48818454', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n153', 'C', '1011', '220', '140277354521', '1393', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n154', 'C', '1012', '130', '71579272517', '837', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n155', 'C', '1012', '132', '294847194', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n156', 'C', '1012', '135', '28697750000', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n157', 'C', '1012', '141', '461758500', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n158', 'C', '1012', '210', '15268238061', '7426', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n159', 'C', '1012', '213', '2511500110', '1604', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n160', 'C', '1012', '214', '538807189', '234', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n161', 'C', '1012', '215', '340301341', '98', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n162', 'C', '1012', '216', '50536984', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n163', 'C', '1012', '217', '180508613', '89', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n164', 'C', '1012', '218', '77140000', '372', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n165', 'C', '1012', '220', '38208664509', '371', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n166', 'C', '1013', '130', '5768227100', '172', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n167', 'C', '1013', '131', '64306913267', '818', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n168', 'C', '1013', '132', '112710946', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n169', 'C', '1013', '210', '12508232507', '4007', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n170', 'C', '1013', '213', '4628504323', '2125', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n171', 'C', '1013', '214', '257539560', '138', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n172', 'C', '1013', '215', '260618671', '233', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n173', 'C', '1013', '216', '59548675', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n174', 'C', '1013', '217', '237904185', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n175', 'C', '1013', '218', '86925000', '403', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n176', 'C', '1013', '220', '12127852794', '244', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n177', 'C', '1014', '130', '35855215996', '939', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n178', 'C', '1014', '131', '1107024166', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n179', 'C', '1014', '132', '461599478', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n180', 'C', '1014', '135', '7710627000', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n181', 'C', '1014', '141', '93716600', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n182', 'C', '1014', '210', '15149538986', '6236', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n183', 'C', '1014', '211', '165246158', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n184', 'C', '1014', '213', '1671026258', '877', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n185', 'C', '1014', '214', '195907131', '105', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n186', 'C', '1014', '215', '587750062', '165', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n187', 'C', '1014', '216', '81023067', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n188', 'C', '1014', '217', '198244283', '97', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n189', 'C', '1014', '218', '14385500', '101', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n190', 'C', '1014', '220', '11926565762', '245', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n191', 'C', '1021', '130', '27963812864', '679', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n192', 'C', '1021', '131', '17124071615', '301', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n193', 'C', '1021', '132', '654121152', '71', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n194', 'C', '1021', '135', '1600000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n195', 'C', '1021', '210', '20167123212', '9046', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n196', 'C', '1021', '211', '65591299', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n197', 'C', '1021', '213', '4229034026', '2374', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n198', 'C', '1021', '214', '450526355', '201', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n199', 'C', '1021', '215', '383589515', '105', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n200', 'C', '1021', '216', '59316015', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n201', 'C', '1021', '217', '318797185', '130', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n202', 'C', '1021', '218', '80935500', '826', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n203', 'C', '1021', '220', '20315479224', '546', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n204', 'C', '1031', '130', '34126890611', '1147', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n205', 'C', '1031', '131', '5266114993', '92', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n206', 'C', '1031', '132', '543073840', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n207', 'C', '1031', '135', '550000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n208', 'C', '1031', '210', '14597380167', '8306', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n209', 'C', '1031', '211', '56516191', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n210', 'C', '1031', '213', '5480099319', '3932', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n211', 'C', '1031', '214', '528982583', '203', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n212', 'C', '1031', '215', '157659605', '89', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n213', 'C', '1031', '216', '60700086', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n214', 'C', '1031', '217', '603288306', '266', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n215', 'C', '1031', '218', '45904800', '261', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n216', 'C', '1031', '220', '14152067155', '488', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n217', 'C', '1032', '130', '26092219332', '632', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n218', 'C', '1032', '131', '2305604252', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n219', 'C', '1032', '132', '718512700', '79', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n220', 'C', '1032', '135', '2000000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n221', 'C', '1032', '210', '10801213624', '4370', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n222', 'C', '1032', '211', '57291903', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n223', 'C', '1032', '213', '4025647644', '2062', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n224', 'C', '1032', '214', '576166747', '115', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n225', 'C', '1032', '215', '434802452', '97', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n226', 'C', '1032', '216', '50173988', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n227', 'C', '1032', '217', '315131138', '153', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n228', 'C', '1032', '218', '28098000', '195', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n229', 'C', '1032', '220', '9287912914', '331', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n230', 'C', '1041', '130', '33687001122', '1004', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n231', 'C', '1041', '131', '2679625385', '39', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n232', 'C', '1041', '132', '292387937', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n233', 'C', '1041', '135', '3620233700', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n234', 'C', '1041', '210', '9333575704', '4960', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n235', 'C', '1041', '211', '7005908', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n236', 'C', '1041', '213', '2103680479', '1186', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n237', 'C', '1041', '214', '241772670', '107', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n238', 'C', '1041', '215', '150246669', '210', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n239', 'C', '1041', '216', '28676471', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n240', 'C', '1041', '217', '249172467', '123', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n241', 'C', '1041', '218', '54244200', '77', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n242', 'C', '1041', '220', '6363171360', '235', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n243', 'C', '1051', '130', '33815767906', '537', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n244', 'C', '1051', '131', '5219337082', '77', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n245', 'C', '1051', '132', '440440836', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n246', 'C', '1051', '135', '700000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n247', 'C', '1051', '141', '88192800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n248', 'C', '1051', '210', '16386944937', '6109', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n249', 'C', '1051', '211', '42520255', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n250', 'C', '1051', '213', '3375080739', '2384', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n251', 'C', '1051', '214', '324058352', '313', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n252', 'C', '1051', '215', '129445996', '92', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n253', 'C', '1051', '216', '16237612', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n254', 'C', '1051', '217', '410936342', '130', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n255', 'C', '1051', '218', '7987000', '48', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n256', 'C', '1051', '220', '11004755711', '380', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n257', 'C', '1052', '130', '21537939558', '298', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n258', 'C', '1052', '131', '2124142050', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n259', 'C', '1052', '132', '154188693', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n260', 'C', '1052', '135', '5615649777', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n261', 'C', '1052', '141', '94019550', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n262', 'C', '1052', '210', '3514934617', '2575', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n263', 'C', '1052', '213', '1051982361', '874', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n264', 'C', '1052', '214', '36492294', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n265', 'C', '1052', '215', '83450818', '65', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n266', 'C', '1052', '216', '2137158', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n267', 'C', '1052', '217', '99686066', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n268', 'C', '1052', '218', '4995000', '83', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n269', 'C', '1052', '220', '2109075510', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n270', 'C', '1061', '130', '57324179759', '1060', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n271', 'C', '1061', '131', '7363803132', '94', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n272', 'C', '1061', '132', '571579118', '81', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n273', 'C', '1061', '135', '14397292932', '45', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n274', 'C', '1061', '141', '168698800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n275', 'C', '1061', '210', '19335514978', '7010', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n276', 'C', '1061', '211', '147146716', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n277', 'C', '1061', '213', '2192155705', '1687', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n278', 'C', '1061', '214', '595027329', '207', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n279', 'C', '1061', '215', '352100898', '300', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n280', 'C', '1061', '216', '87398361', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n281', 'C', '1061', '217', '266882432', '164', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n282', 'C', '1061', '218', '38955500', '136', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n283', 'C', '1061', '220', '28263359130', '393', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n284', 'C', '1064', '130', '34497173695', '621', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n285', 'C', '1064', '131', '1134196300', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n286', 'C', '1064', '132', '414140050', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n287', 'C', '1064', '141', '211189800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n288', 'C', '1064', '210', '3881156097', '3184', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n289', 'C', '1064', '211', '103643925', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n290', 'C', '1064', '213', '1819945797', '1262', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n291', 'C', '1064', '214', '468008563', '290', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n292', 'C', '1064', '215', '110760691', '69', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n293', 'C', '1064', '216', '35106638', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n294', 'C', '1064', '217', '174648687', '91', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n295', 'C', '1064', '218', '20432000', '220', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n296', 'C', '1064', '220', '3154831665', '163', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n297', 'C', '1071', '130', '89762805734', '1532', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n298', 'C', '1071', '131', '23197524580', '613', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n299', 'C', '1071', '132', '911432135', '84', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n300', 'C', '1071', '135', '19670551000', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n301', 'C', '1071', '141', '35145200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n302', 'C', '1071', '210', '27249211067', '14267', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n303', 'C', '1071', '211', '170091899', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n304', 'C', '1071', '213', '6744693779', '4323', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n305', 'C', '1071', '214', '388766077', '201', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n306', 'C', '1071', '215', '627066922', '191', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n307', 'C', '1071', '216', '86872020', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n308', 'C', '1071', '217', '619386345', '298', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n309', 'C', '1071', '218', '25464000', '442', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n310', 'C', '1071', '220', '77052747445', '735', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n311', 'C', '1074', '130', '37241072904', '994', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n312', 'C', '1074', '131', '4530336830', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n313', 'C', '1074', '132', '171062492', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n314', 'C', '1074', '135', '4395000000', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n315', 'C', '1074', '210', '7009265794', '4328', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n316', 'C', '1074', '211', '72553781', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n317', 'C', '1074', '213', '3574436837', '2214', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n318', 'C', '1074', '214', '10548887', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n319', 'C', '1074', '215', '182894022', '186', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n320', 'C', '1074', '216', '26032229', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n321', 'C', '1074', '217', '205378106', '105', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n322', 'C', '1074', '220', '25637286904', '135', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n323', 'C', '1081', '130', '122155001067', '1098', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n324', 'C', '1081', '131', '30968315974', '433', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n325', 'C', '1081', '132', '672250872', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n326', 'C', '1081', '135', '66137385450', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n327', 'C', '1081', '210', '24372099905', '13560', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n328', 'C', '1081', '211', '93874203', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n329', 'C', '1081', '213', '4574752792', '3822', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n330', 'C', '1081', '214', '801912954', '332', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n331', 'C', '1081', '215', '1155079705', '557', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n332', 'C', '1081', '216', '49094474', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n333', 'C', '1081', '217', '560353476', '238', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n334', 'C', '1081', '218', '25043000', '273', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n335', 'C', '1081', '220', '214241530243', '1323', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n336', 'C', '1091', '130', '19663693013', '401', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n337', 'C', '1091', '131', '816521000', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n338', 'C', '1091', '132', '69295355', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n339', 'C', '1091', '135', '4930000000', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n340', 'C', '1091', '210', '13231763673', '4016', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n341', 'C', '1091', '211', '9306209', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n342', 'C', '1091', '213', '2079826424', '1303', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n343', 'C', '1091', '214', '194230525', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n344', 'C', '1091', '215', '441477229', '111', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n345', 'C', '1091', '216', '101722086', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n346', 'C', '1091', '217', '167212069', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n347', 'C', '1091', '218', '3270000', '47', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n348', 'C', '1091', '220', '10115049825', '89', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n349', 'C', '1101', '130', '33518139471', '817', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n350', 'C', '1101', '131', '2911539450', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n351', 'C', '1101', '132', '212702000', '27', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n352', 'C', '1101', '135', '4874000000', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n353', 'C', '1101', '141', '461451800', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n354', 'C', '1101', '210', '8473536173', '5934', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n355', 'C', '1101', '211', '46206932', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n356', 'C', '1101', '213', '1489565527', '1098', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n357', 'C', '1101', '214', '797303757', '268', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n358', 'C', '1101', '215', '72581360', '113', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n359', 'C', '1101', '216', '47290610', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n360', 'C', '1101', '217', '189980573', '96', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n361', 'C', '1101', '220', '6905467530', '191', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n362', 'C', '1103', '130', '21671620291', '475', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n363', 'C', '1103', '132', '183427930', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n364', 'C', '1103', '135', '4100000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n365', 'C', '1103', '210', '3015689920', '2983', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n366', 'C', '1103', '213', '956888296', '765', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n367', 'C', '1103', '214', '66733151', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n368', 'C', '1103', '215', '16757860', '31', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n369', 'C', '1103', '216', '2501476', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n370', 'C', '1103', '217', '15641569', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n371', 'C', '1103', '218', '33256000', '210', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n372', 'C', '1103', '220', '1817758655', '90', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n373', 'C', '1111', '130', '44178135689', '528', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n374', 'C', '1111', '131', '4745740466', '122', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n375', 'C', '1111', '132', '58907463', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n376', 'C', '1111', '135', '2577809950', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n377', 'C', '1111', '210', '12193894189', '5292', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n378', 'C', '1111', '211', '67600268', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n379', 'C', '1111', '213', '2139820317', '1672', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n380', 'C', '1111', '214', '78497376', '70', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n381', 'C', '1111', '215', '214609430', '182', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n382', 'C', '1111', '216', '150779265', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n383', 'C', '1111', '217', '145013043', '64', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n384', 'C', '1111', '220', '16553074495', '210', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n385', 'C', '1112', '130', '25681210458', '185', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n386', 'C', '1112', '131', '3435430800', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n387', 'C', '1112', '132', '1299700', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n388', 'C', '1112', '135', '9640000000', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n389', 'C', '1112', '210', '2610211807', '2047', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n390', 'C', '1112', '213', '613375647', '587', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n391', 'C', '1112', '214', '13083990', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n392', 'C', '1112', '215', '78332464', '70', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n393', 'C', '1112', '216', '86148032', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n394', 'C', '1112', '217', '39475901', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n395', 'C', '1112', '220', '1237791608', '54', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n396', 'C', '1121', '130', '20492462275', '464', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n397', 'C', '1121', '131', '1038739800', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n398', 'C', '1121', '132', '117531800', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n399', 'C', '1121', '135', '3420552700', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n400', 'C', '1121', '210', '12227753332', '3620', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n401', 'C', '1121', '211', '15674994', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n402', 'C', '1121', '213', '771529163', '752', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n403', 'C', '1121', '214', '288819249', '208', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n404', 'C', '1121', '215', '100639716', '50', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n405', 'C', '1121', '216', '94689185', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n406', 'C', '1121', '217', '176618973', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n407', 'C', '1121', '220', '6300159638', '86', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n408', 'C', '1131', '130', '32578805428', '379', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n409', 'C', '1131', '131', '9573127979', '130', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n410', 'C', '1131', '132', '130931968', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n411', 'C', '1131', '135', '8062027800', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n412', 'C', '1131', '210', '8224159589', '4223', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n413', 'C', '1131', '211', '65197049', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n414', 'C', '1131', '213', '2632045551', '1867', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n415', 'C', '1131', '214', '225247401', '337', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n416', 'C', '1131', '215', '282097472', '118', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n417', 'C', '1131', '216', '31254820', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n418', 'C', '1131', '217', '151023347', '75', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n419', 'C', '1131', '218', '49774280', '245', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n420', 'C', '1131', '220', '82304585772', '455', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n421', 'C', '1132', '130', '20472077762', '304', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n422', 'C', '1132', '131', '1315170350', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n423', 'C', '1132', '132', '253372250', '25', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n424', 'C', '1132', '135', '500000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n425', 'C', '1132', '210', '2666093358', '1538', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n426', 'C', '1132', '213', '401415380', '600', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n427', 'C', '1132', '214', '31972136', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n428', 'C', '1132', '215', '137843366', '50', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n429', 'C', '1132', '217', '15509296', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n430', 'C', '1132', '220', '3388835992', '93', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n431', 'C', '1141', '130', '55994017387', '1139', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n432', 'C', '1141', '131', '21029065168', '411', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n433', 'C', '1141', '132', '464035543', '57', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n434', 'C', '1141', '135', '19741317816', '25', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n435', 'C', '1141', '210', '14074150530', '7734', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n436', 'C', '1141', '211', '76283852', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n437', 'C', '1141', '213', '1756160536', '2055', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n438', 'C', '1141', '214', '251106198', '171', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n439', 'C', '1141', '215', '387285486', '312', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n440', 'C', '1141', '216', '202647542', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n441', 'C', '1141', '217', '236666974', '108', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n442', 'C', '1141', '218', '8422000', '116', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n443', 'C', '1141', '220', '20750846140', '424', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n444', 'C', '1282', '130', '28540731266', '433', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n445', 'C', '1282', '131', '4654210012', '117', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n446', 'C', '1282', '132', '207940194', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n447', 'C', '1282', '135', '18573567650', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n448', 'C', '1282', '141', '196248200', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n449', 'C', '1282', '210', '4821899304', '4249', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n450', 'C', '1282', '213', '1394072546', '1608', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n451', 'C', '1282', '214', '126336381', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n452', 'C', '1282', '215', '234483984', '103', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n453', 'C', '1282', '216', '34622697', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n454', 'C', '1282', '217', '213518885', '101', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n455', 'C', '1282', '220', '11989208929', '160', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n456', 'C', '1283', '130', '26029470160', '387', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n457', 'C', '1283', '131', '10834484780', '235', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n458', 'C', '1283', '132', '166355350', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n459', 'C', '1283', '135', '90620000000', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n460', 'C', '1283', '141', '50748200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n461', 'C', '1283', '210', '10069941105', '5939', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n462', 'C', '1283', '211', '36367806', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n463', 'C', '1283', '213', '1998384450', '1723', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n464', 'C', '1283', '214', '25113479', '86', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n465', 'C', '1283', '215', '754119643', '102', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n466', 'C', '1283', '216', '122394599', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n467', 'C', '1283', '217', '229164574', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n468', 'C', '1283', '218', '51507500', '259', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n469', 'C', '1283', '220', '13106817715', '256', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n470', 'D', '1011', '210', '10539781511', '800', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n471', 'D', '1011', '211', '15613142273', '477', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n472', 'D', '1011', '212', '19708056432', '674', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n473', 'D', '1011', '214', '142002328', '78', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n474', 'D', '1011', '215', '661247446', '282', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n475', 'D', '1011', '217', '48818454', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n476', 'D', '1011', '220', '140277354521', '1393', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n477', 'D', '1012', '130', '56441346886', '400', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n478', 'D', '1012', '132', '153447765', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n479', 'D', '1012', '135', '28697750000', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n480', 'D', '1012', '141', '302187950', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n481', 'D', '1012', '210', '11384129477', '5117', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n482', 'D', '1012', '213', '2288792096', '1265', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n483', 'D', '1012', '214', '346789813', '151', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n484', 'D', '1012', '215', '325959773', '65', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n485', 'D', '1012', '216', '8105717', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n486', 'D', '1012', '217', '142993530', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n487', 'D', '1012', '218', '6263500', '135', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n488', 'D', '1012', '220', '36049652660', '301', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n489', 'D', '1013', '130', '5768227100', '172', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n490', 'D', '1013', '131', '64306913267', '818', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n491', 'D', '1013', '132', '112710946', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n492', 'D', '1013', '210', '12508232507', '4007', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n493', 'D', '1013', '213', '4628504323', '2125', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n494', 'D', '1013', '214', '257539560', '138', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n495', 'D', '1013', '215', '260618671', '233', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n496', 'D', '1013', '216', '59548675', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n497', 'D', '1013', '217', '237904185', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n498', 'D', '1013', '218', '86925000', '403', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n499', 'D', '1013', '220', '12127852794', '244', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n500', 'D', '1014', '130', '20632601835', '377', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n501', 'D', '1014', '131', '66666000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n502', 'D', '1014', '132', '255977722', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n503', 'D', '1014', '135', '7010627000', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n504', 'D', '1014', '210', '12008575620', '4344', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n505', 'D', '1014', '211', '165246158', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n506', 'D', '1014', '213', '1201111372', '594', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n507', 'D', '1014', '214', '95971914', '81', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n508', 'D', '1014', '215', '253835266', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n509', 'D', '1014', '216', '75513235', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n510', 'D', '1014', '217', '179210589', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n511', 'D', '1014', '220', '8893871732', '187', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n512', 'D', '1016', '130', '15222614161', '562', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n513', 'D', '1016', '131', '1040358166', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n514', 'D', '1016', '132', '205621756', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n515', 'D', '1016', '135', '700000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n516', 'D', '1016', '141', '93716600', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n517', 'D', '1016', '210', '3140963366', '1892', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n518', 'D', '1016', '213', '469914886', '283', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n519', 'D', '1016', '214', '99935217', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n520', 'D', '1016', '215', '333914796', '97', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n521', 'D', '1016', '216', '5509832', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n522', 'D', '1016', '217', '19033694', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n523', 'D', '1016', '218', '14385500', '101', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n524', 'D', '1016', '220', '3032694030', '58', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n525', 'D', '1017', '130', '15137925631', '437', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n526', 'D', '1017', '132', '141399429', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n527', 'D', '1017', '141', '159570550', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n528', 'D', '1017', '210', '3884108584', '2309', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n529', 'D', '1017', '213', '222708014', '339', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n530', 'D', '1017', '214', '192017376', '83', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n531', 'D', '1017', '215', '14341568', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n532', 'D', '1017', '216', '42431267', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n533', 'D', '1017', '217', '37515083', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n534', 'D', '1017', '218', '70876500', '237', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n535', 'D', '1017', '220', '2159011849', '70', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n536', 'D', '1021', '130', '18757439464', '424', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n537', 'D', '1021', '131', '14585471915', '248', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n538', 'D', '1021', '132', '398934402', '49', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n539', 'D', '1021', '135', '1600000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n540', 'D', '1021', '210', '16666046551', '6744', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n541', 'D', '1021', '211', '65591299', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n542', 'D', '1021', '213', '3182888615', '1840', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n543', 'D', '1021', '214', '440438845', '167', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n544', 'D', '1021', '215', '339685198', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n545', 'D', '1021', '216', '59316015', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n546', 'D', '1021', '217', '263004547', '104', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n547', 'D', '1021', '218', '48011500', '269', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n548', 'D', '1021', '220', '18820379224', '490', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n549', 'D', '1022', '130', '9206373400', '255', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n550', 'D', '1022', '131', '2538599700', '53', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n551', 'D', '1022', '132', '255186750', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n552', 'D', '1022', '210', '3501076661', '2302', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n553', 'D', '1022', '213', '1046145411', '534', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n554', 'D', '1022', '214', '10087510', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n555', 'D', '1022', '215', '43904317', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n556', 'D', '1022', '217', '55792638', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n557', 'D', '1022', '218', '32924000', '557', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n558', 'D', '1022', '220', '1495100000', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n559', 'D', '1031', '130', '14348710455', '562', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n560', 'D', '1031', '131', '2111073478', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n561', 'D', '1031', '132', '226280190', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n562', 'D', '1031', '135', '550000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n563', 'D', '1031', '210', '8648047622', '4554', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n564', 'D', '1031', '211', '56516191', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n565', 'D', '1031', '213', '3452177761', '2233', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n566', 'D', '1031', '214', '460429445', '108', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n567', 'D', '1031', '215', '109397912', '60', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n568', 'D', '1031', '216', '58475690', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n569', 'D', '1031', '217', '478523729', '206', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n570', 'D', '1031', '218', '13032500', '50', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n571', 'D', '1031', '220', '9361177351', '323', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n572', 'D', '1032', '130', '26092219332', '632', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n573', 'D', '1032', '131', '2305604252', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n574', 'D', '1032', '132', '718512700', '79', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n575', 'D', '1032', '135', '2000000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n576', 'D', '1032', '210', '10801213624', '4370', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n577', 'D', '1032', '211', '57291903', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n578', 'D', '1032', '213', '4025647644', '2062', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n579', 'D', '1032', '214', '576166747', '115', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n580', 'D', '1032', '215', '434802452', '97', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n581', 'D', '1032', '216', '50173988', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n582', 'D', '1032', '217', '315131138', '153', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n583', 'D', '1032', '218', '28098000', '195', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n584', 'D', '1032', '220', '9287912914', '331', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n585', 'D', '1033', '130', '13362313150', '299', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n586', 'D', '1033', '131', '2447502665', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n587', 'D', '1033', '132', '186862150', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n588', 'D', '1033', '210', '4312940031', '2331', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n589', 'D', '1033', '213', '1591930431', '1116', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n590', 'D', '1033', '214', '56280971', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n591', 'D', '1033', '215', '42858057', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n592', 'D', '1033', '217', '108775973', '50', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n593', 'D', '1033', '220', '3885647647', '126', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n594', 'D', '1034', '130', '6415867006', '286', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n595', 'D', '1034', '131', '707538850', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n596', 'D', '1034', '132', '129931500', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n597', 'D', '1034', '210', '1636392514', '1421', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n598', 'D', '1034', '213', '435991127', '583', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n599', 'D', '1034', '214', '12272167', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n600', 'D', '1034', '215', '5403636', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n601', 'D', '1034', '216', '2224396', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n602', 'D', '1034', '217', '15988604', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n603', 'D', '1034', '218', '32872300', '211', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n604', 'D', '1034', '220', '905242157', '39', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n605', 'D', '1041', '130', '25421607904', '580', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n606', 'D', '1041', '131', '1120414535', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n607', 'D', '1041', '132', '148743590', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n608', 'D', '1041', '135', '3370233700', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n609', 'D', '1041', '210', '7701073807', '3372', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n610', 'D', '1041', '211', '7005908', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n611', 'D', '1041', '213', '1581063073', '899', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n612', 'D', '1041', '214', '149395141', '36', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n613', 'D', '1041', '215', '131056079', '142', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n614', 'D', '1041', '216', '27676453', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n615', 'D', '1041', '217', '209423291', '106', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n616', 'D', '1041', '218', '53660200', '57', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n617', 'D', '1041', '220', '4220506336', '166', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n618', 'D', '1042', '130', '8265393218', '424', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n619', 'D', '1042', '131', '1559210850', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n620', 'D', '1042', '132', '143644347', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n621', 'D', '1042', '135', '250000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n622', 'D', '1042', '210', '1632501897', '1588', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n623', 'D', '1042', '213', '522617406', '287', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n624', 'D', '1042', '214', '92377529', '71', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n625', 'D', '1042', '215', '19190590', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n626', 'D', '1042', '216', '1000018', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n627', 'D', '1042', '217', '39749176', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n628', 'D', '1042', '218', '584000', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n629', 'D', '1042', '220', '2142665024', '69', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n630', 'D', '1051', '130', '22106110249', '268', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n631', 'D', '1051', '131', '3929706115', '53', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n632', 'D', '1051', '132', '267293569', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n633', 'D', '1051', '210', '11915639842', '3759', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n634', 'D', '1051', '211', '42520255', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n635', 'D', '1051', '213', '2387818511', '1597', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n636', 'D', '1051', '214', '128183584', '256', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n637', 'D', '1051', '215', '125329968', '77', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n638', 'D', '1051', '216', '16237612', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n639', 'D', '1051', '217', '253109510', '75', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n640', 'D', '1051', '218', '4449000', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n641', 'D', '1051', '220', '7057679552', '253', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n642', 'D', '1052', '130', '21537939558', '298', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n643', 'D', '1052', '131', '2124142050', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n644', 'D', '1052', '132', '154188693', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n645', 'D', '1052', '135', '5615649777', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n646', 'D', '1052', '141', '94019550', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n647', 'D', '1052', '210', '3514934617', '2575', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n648', 'D', '1052', '213', '1051982361', '874', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n649', 'D', '1052', '214', '36492294', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n650', 'D', '1052', '215', '83450818', '65', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n651', 'D', '1052', '216', '2137158', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n652', 'D', '1052', '217', '99686066', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n653', 'D', '1052', '218', '4995000', '83', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n654', 'D', '1052', '220', '2109075510', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n655', 'D', '1053', '130', '11709657657', '269', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n656', 'D', '1053', '131', '1289630967', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n657', 'D', '1053', '132', '173147267', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n658', 'D', '1053', '135', '700000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n659', 'D', '1053', '141', '88192800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n660', 'D', '1053', '210', '4471305095', '2350', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n661', 'D', '1053', '213', '987262228', '787', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n662', 'D', '1053', '214', '195874768', '57', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n663', 'D', '1053', '215', '4116028', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n664', 'D', '1053', '217', '157826832', '55', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n665', 'D', '1053', '218', '3538000', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n666', 'D', '1053', '220', '3947076159', '127', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n667', 'D', '1061', '130', '26683381409', '389', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n668', 'D', '1061', '131', '1248228550', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n669', 'D', '1061', '132', '302590618', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n670', 'D', '1061', '135', '10133476482', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n671', 'D', '1061', '141', '168698800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n672', 'D', '1061', '210', '11629332315', '3312', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n673', 'D', '1061', '211', '147146716', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n674', 'D', '1061', '213', '1181674750', '890', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n675', 'D', '1061', '214', '116285615', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n676', 'D', '1061', '215', '135804946', '159', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n677', 'D', '1061', '216', '19972263', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n678', 'D', '1061', '217', '146492995', '95', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n679', 'D', '1061', '218', '38955500', '136', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n680', 'D', '1061', '220', '16419722006', '204', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n681', 'D', '1064', '130', '34497173695', '621', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n682', 'D', '1064', '131', '1134196300', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n683', 'D', '1064', '132', '414140050', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n684', 'D', '1064', '141', '211189800', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n685', 'D', '1064', '210', '3881156097', '3184', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n686', 'D', '1064', '211', '103643925', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n687', 'D', '1064', '213', '1819945797', '1262', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n688', 'D', '1064', '214', '468008563', '290', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n689', 'D', '1064', '215', '110760691', '69', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n690', 'D', '1064', '216', '35106638', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n691', 'D', '1064', '217', '174648687', '91', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n692', 'D', '1064', '218', '20432000', '220', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n693', 'D', '1064', '220', '3154831665', '163', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n694', 'D', '1066', '130', '14613273294', '258', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n695', 'D', '1066', '131', '5404506700', '55', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n696', 'D', '1066', '132', '151068250', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n697', 'D', '1066', '135', '2157247250', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n698', 'D', '1066', '210', '6070233380', '2183', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n699', 'D', '1066', '213', '607431856', '564', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n700', 'D', '1066', '214', '408733259', '117', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n701', 'D', '1066', '215', '122126663', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n702', 'D', '1066', '216', '47654884', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n703', 'D', '1066', '217', '39910785', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n704', 'D', '1066', '220', '8383352131', '94', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n705', 'D', '1067', '130', '16027525056', '413', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n706', 'D', '1067', '131', '711067882', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n707', 'D', '1067', '132', '117920250', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n708', 'D', '1067', '135', '2106569200', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n709', 'D', '1067', '210', '1635949283', '1515', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n710', 'D', '1067', '213', '403049099', '233', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n711', 'D', '1067', '214', '70008455', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n712', 'D', '1067', '215', '94169289', '73', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n713', 'D', '1067', '216', '19771214', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n714', 'D', '1067', '217', '80478652', '48', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n715', 'D', '1067', '220', '3460284993', '95', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n716', 'D', '1071', '130', '15289228708', '101', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n717', 'D', '1071', '131', '14829354270', '459', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n718', 'D', '1071', '132', '137229998', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n719', 'D', '1071', '135', '10060000000', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n720', 'D', '1071', '210', '11062785136', '4052', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n721', 'D', '1071', '211', '170091899', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n722', 'D', '1071', '213', '2263151524', '1278', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n723', 'D', '1071', '214', '60012404', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n724', 'D', '1071', '215', '233347426', '59', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n725', 'D', '1071', '216', '12525420', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n726', 'D', '1071', '217', '235086066', '108', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n727', 'D', '1071', '220', '46246231482', '313', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n728', 'D', '1072', '130', '8831291967', '152', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n729', 'D', '1072', '131', '1122176950', '27', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n730', 'D', '1072', '132', '30228550', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n731', 'D', '1072', '135', '550000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n732', 'D', '1072', '210', '1331076659', '1118', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n733', 'D', '1072', '213', '102760381', '221', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n734', 'D', '1072', '214', '72606341', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n735', 'D', '1072', '215', '21073233', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n736', 'D', '1072', '217', '37741645', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n737', 'D', '1072', '218', '8750500', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n738', 'D', '1072', '220', '3837927546', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n739', 'D', '1073', '130', '11408270496', '337', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n740', 'D', '1073', '131', '1608549000', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n741', 'D', '1073', '132', '178706400', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n742', 'D', '1073', '135', '520000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n743', 'D', '1073', '141', '35145200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n744', 'D', '1073', '210', '2548698143', '1994', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n745', 'D', '1073', '213', '1196200618', '762', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n746', 'D', '1073', '214', '21081437', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n747', 'D', '1073', '215', '125969095', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n748', 'D', '1073', '216', '42038864', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n749', 'D', '1073', '217', '75748738', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n750', 'D', '1073', '220', '2431612390', '61', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n751', 'D', '1074', '130', '21823054443', '544', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n752', 'D', '1074', '131', '2419126300', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n753', 'D', '1074', '132', '103675777', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n754', 'D', '1074', '135', '3030000000', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n755', 'D', '1074', '210', '2794047800', '2709', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n756', 'D', '1074', '211', '72553781', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n757', 'D', '1074', '213', '2579226788', '1758', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n758', 'D', '1074', '214', '10516149', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n759', 'D', '1074', '215', '69736043', '119', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n760', 'D', '1074', '216', '20524900', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n761', 'D', '1074', '217', '173185805', '87', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n762', 'D', '1074', '220', '20414186904', '92', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n763', 'D', '1075', '130', '7786648503', '200', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n764', 'D', '1075', '131', '1067765650', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n765', 'D', '1075', '132', '70702352', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n766', 'D', '1075', '135', '200000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n767', 'D', '1075', '210', '2566129287', '1694', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n768', 'D', '1075', '213', '1075084200', '548', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n769', 'D', '1075', '214', '83535977', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n770', 'D', '1075', '215', '180786642', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n771', 'D', '1075', '217', '22292750', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n772', 'D', '1075', '218', '3938000', '95', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n773', 'D', '1075', '220', '6162188724', '68', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n774', 'D', '1076', '130', '11383281648', '233', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n775', 'D', '1076', '131', '595164560', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n776', 'D', '1076', '132', '101140870', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n777', 'D', '1076', '210', '3651718137', '1517', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n778', 'D', '1076', '213', '785874276', '409', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n779', 'D', '1076', '214', '4300326', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n780', 'D', '1076', '215', '35809651', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n781', 'D', '1076', '217', '113750091', '31', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n782', 'D', '1076', '218', '8518000', '269', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n783', 'D', '1076', '220', '6892012129', '105', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n784', 'D', '1077', '130', '10575461927', '146', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n785', 'D', '1077', '131', '2267520550', '57', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n786', 'D', '1077', '132', '20899365', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n787', 'D', '1077', '210', '1829980926', '1595', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n788', 'D', '1077', '213', '472146358', '379', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n789', 'D', '1077', '214', '80391433', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n790', 'D', '1077', '215', '8592294', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n791', 'D', '1077', '216', '31807472', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n792', 'D', '1077', '217', '66759158', '45', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n793', 'D', '1077', '220', '3783432946', '60', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n794', 'D', '1078', '130', '15418018461', '450', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n795', 'D', '1078', '131', '2111210530', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n796', 'D', '1078', '132', '67386715', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n797', 'D', '1078', '135', '1365000000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n798', 'D', '1078', '210', '4215217994', '1619', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n799', 'D', '1078', '213', '995210049', '456', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n800', 'D', '1078', '214', '32738', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n801', 'D', '1078', '215', '113157979', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n802', 'D', '1078', '216', '5507329', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n803', 'D', '1078', '217', '32192301', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n804', 'D', '1078', '220', '5223100000', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n805', 'D', '1079', '130', '9880299607', '252', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n806', 'D', '1079', '131', '718204900', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n807', 'D', '1079', '132', '167611350', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n808', 'D', '1079', '210', '3252219293', '1797', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n809', 'D', '1079', '213', '768110893', '470', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n810', 'D', '1079', '214', '57147094', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n811', 'D', '1079', '215', '21433081', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n812', 'D', '1079', '216', '500264', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n813', 'D', '1079', '217', '59780375', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n814', 'D', '1079', '218', '4257500', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n815', 'D', '1079', '220', '5593895659', '66', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n816', 'D', '1081', '130', '60552235749', '136', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n817', 'D', '1081', '131', '24747933432', '308', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n818', 'D', '1081', '132', '119224400', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n819', 'D', '1081', '135', '52838169100', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n820', 'D', '1081', '210', '9600995052', '4800', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n821', 'D', '1081', '211', '93874203', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n822', 'D', '1081', '213', '1640902974', '1296', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n823', 'D', '1081', '214', '398263660', '93', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n824', 'D', '1081', '215', '757106801', '191', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n825', 'D', '1081', '216', '27267708', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n826', 'D', '1081', '217', '174908341', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n827', 'D', '1081', '218', '6453000', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n828', 'D', '1081', '220', '167889676808', '785', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n829', 'D', '1082', '130', '13070928268', '223', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n830', 'D', '1082', '132', '202730832', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n831', 'D', '1082', '135', '4667342700', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n832', 'D', '1082', '210', '2298392714', '1831', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n833', 'D', '1082', '213', '798134234', '547', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n834', 'D', '1082', '214', '128732855', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n835', 'D', '1082', '215', '145479630', '108', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n836', 'D', '1082', '216', '9916141', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n837', 'D', '1082', '217', '69515233', '48', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n838', 'D', '1082', '220', '10850444696', '143', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n839', 'D', '1083', '130', '6014718259', '140', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n840', 'D', '1083', '131', '742230700', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n841', 'D', '1083', '132', '16821900', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n842', 'D', '1083', '135', '1200000000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n843', 'D', '1083', '210', '2875976379', '1866', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n844', 'D', '1083', '213', '768165504', '548', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n845', 'D', '1083', '214', '95015993', '64', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n846', 'D', '1083', '215', '28091617', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n847', 'D', '1083', '216', '11910625', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n848', 'D', '1083', '217', '125888326', '48', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n849', 'D', '1083', '218', '5732500', '178', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n850', 'D', '1083', '220', '6730861410', '87', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n851', 'D', '1084', '130', '10525788584', '152', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n852', 'D', '1084', '131', '1050411900', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n853', 'D', '1084', '132', '9658080', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n854', 'D', '1084', '135', '502000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n855', 'D', '1084', '210', '3821930582', '1495', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n856', 'D', '1084', '213', '492224590', '372', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n857', 'D', '1084', '214', '13382323', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n858', 'D', '1084', '215', '15367206', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n859', 'D', '1084', '217', '51701573', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n860', 'D', '1084', '220', '4774429756', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n861', 'D', '1085', '130', '10492078371', '147', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n862', 'D', '1085', '131', '1716507050', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n863', 'D', '1085', '132', '41308000', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n864', 'D', '1085', '135', '900000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n865', 'D', '1085', '210', '2851321023', '1351', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n866', 'D', '1085', '213', '665526454', '562', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n867', 'D', '1085', '214', '104071294', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n868', 'D', '1085', '215', '25016383', '55', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n869', 'D', '1085', '217', '104740935', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n870', 'D', '1085', '218', '12857500', '79', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n871', 'D', '1085', '220', '13923828565', '145', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n872', 'D', '1086', '130', '2876395668', '83', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n873', 'D', '1086', '131', '580173250', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n874', 'D', '1086', '132', '25373950', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n875', 'D', '1086', '135', '12100000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n876', 'D', '1086', '141', '50748200', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n877', 'D', '1086', '210', '1869023819', '1277', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n878', 'D', '1086', '213', '707793177', '464', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n879', 'D', '1086', '214', '16609433', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n880', 'D', '1086', '215', '6333396', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n881', 'D', '1086', '216', '15480866', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n882', 'D', '1086', '217', '39513016', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n883', 'D', '1086', '220', '1002069358', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n884', 'D', '1087', '130', '15264794042', '169', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n885', 'D', '1087', '131', '1509764551', '27', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n886', 'D', '1087', '132', '114655523', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n887', 'D', '1087', '135', '1015567650', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n888', 'D', '1087', '141', '98773900', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n889', 'D', '1087', '210', '2067697482', '1347', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n890', 'D', '1087', '213', '583692842', '780', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n891', 'D', '1087', '214', '2195063', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n892', 'D', '1087', '215', '209269254', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n893', 'D', '1087', '216', '6039054', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n894', 'D', '1087', '217', '65403642', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n895', 'D', '1087', '220', '4778670604', '59', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n896', 'D', '1088', '130', '13426568093', '123', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n897', 'D', '1088', '131', '2662395120', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n898', 'D', '1088', '132', '104320950', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n899', 'D', '1088', '135', '5200000000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n900', 'D', '1088', '210', '2232901293', '1693', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n901', 'D', '1088', '213', '266552377', '386', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n902', 'D', '1088', '214', '1007135', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n903', 'D', '1088', '215', '673530769', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n904', 'D', '1088', '217', '36879307', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n905', 'D', '1088', '218', '7654000', '40', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n906', 'D', '1088', '220', '1368051216', '81', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n907', 'D', '1089', '130', '14063403757', '171', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n908', 'D', '1089', '131', '1260791400', '27', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n909', 'D', '1089', '132', '79260300', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n910', 'D', '1089', '135', '4529538450', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n911', 'D', '1089', '210', '1415067478', '1213', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n912', 'D', '1089', '213', '169243028', '280', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n913', 'D', '1089', '214', '59415887', '55', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n914', 'D', '1089', '215', '74519646', '72', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n915', 'D', '1089', '217', '21889858', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n916', 'D', '1089', '220', '2190210072', '38', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n917', 'D', '1091', '130', '19663693013', '401', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n918', 'D', '1091', '131', '816521000', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n919', 'D', '1091', '132', '69295355', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n920', 'D', '1091', '135', '4930000000', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n921', 'D', '1091', '210', '13231763673', '4016', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n922', 'D', '1091', '211', '9306209', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n923', 'D', '1091', '213', '2079826424', '1303', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n924', 'D', '1091', '214', '194230525', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n925', 'D', '1091', '215', '441477229', '111', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n926', 'D', '1091', '216', '101722086', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n927', 'D', '1091', '217', '167212069', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n928', 'D', '1091', '218', '3270000', '47', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n929', 'D', '1091', '220', '10115049825', '89', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n930', 'D', '1101', '130', '19723595578', '468', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n931', 'D', '1101', '131', '2278473700', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n932', 'D', '1101', '132', '135486650', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n933', 'D', '1101', '135', '3494000000', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n934', 'D', '1101', '141', '111299500', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n935', 'D', '1101', '210', '5910324978', '3373', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n936', 'D', '1101', '211', '46206932', '37', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n937', 'D', '1101', '213', '969594799', '681', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n938', 'D', '1101', '214', '733738568', '205', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n939', 'D', '1101', '215', '58736557', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n940', 'D', '1101', '216', '47290610', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n941', 'D', '1101', '217', '157801562', '77', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n942', 'D', '1101', '220', '5582794421', '138', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n943', 'D', '1102', '130', '13794543893', '349', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n944', 'D', '1102', '131', '633065750', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n945', 'D', '1102', '132', '77215350', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n946', 'D', '1102', '135', '1380000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n947', 'D', '1102', '141', '350152300', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n948', 'D', '1102', '210', '2563211195', '2561', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n949', 'D', '1102', '213', '519970728', '417', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n950', 'D', '1102', '214', '63565189', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n951', 'D', '1102', '215', '13844803', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n952', 'D', '1102', '217', '32179011', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n953', 'D', '1102', '220', '1322673109', '53', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n954', 'D', '1103', '130', '21671620291', '475', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n955', 'D', '1103', '132', '183427930', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n956', 'D', '1103', '135', '4100000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n957', 'D', '1103', '210', '3015689920', '2983', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n958', 'D', '1103', '213', '956888296', '765', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n959', 'D', '1103', '214', '66733151', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n960', 'D', '1103', '215', '16757860', '31', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n961', 'D', '1103', '216', '2501476', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n962', 'D', '1103', '217', '15641569', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n963', 'D', '1103', '218', '33256000', '210', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n964', 'D', '1103', '220', '1817758655', '90', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n965', 'D', '1111', '130', '23227081675', '141', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n966', 'D', '1111', '131', '2807754766', '97', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n967', 'D', '1111', '132', '6146432', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n968', 'D', '1111', '210', '5221979725', '2405', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n969', 'D', '1111', '211', '67600268', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n970', 'D', '1111', '213', '1364992496', '871', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n971', 'D', '1111', '214', '61556560', '43', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n972', 'D', '1111', '215', '116661715', '65', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n973', 'D', '1111', '216', '96600670', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n974', 'D', '1111', '217', '96718012', '45', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n975', 'D', '1111', '220', '12068556291', '123', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n976', 'D', '1112', '130', '25681210458', '185', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n977', 'D', '1112', '131', '3435430800', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n978', 'D', '1112', '132', '1299700', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n979', 'D', '1112', '135', '9640000000', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n980', 'D', '1112', '210', '2610211807', '2047', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n981', 'D', '1112', '213', '613375647', '587', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n982', 'D', '1112', '214', '13083990', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n983', 'D', '1112', '215', '78332464', '70', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n984', 'D', '1112', '216', '86148032', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n985', 'D', '1112', '217', '39475901', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n986', 'D', '1112', '220', '1237791608', '54', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n987', 'D', '1113', '130', '11932380688', '278', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n988', 'D', '1113', '131', '424897550', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n989', 'D', '1113', '132', '37393762', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n990', 'D', '1113', '210', '3062650280', '1689', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n991', 'D', '1113', '213', '745708904', '609', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n992', 'D', '1113', '214', '5811114', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n993', 'D', '1113', '215', '4397951', '70', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n994', 'D', '1113', '216', '11399309', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n995', 'D', '1113', '217', '29825562', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n996', 'D', '1113', '220', '1866000000', '51', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n997', 'D', '1114', '130', '9018673326', '109', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n998', 'D', '1114', '131', '1513088150', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n999', 'D', '1114', '132', '15367269', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1000', 'D', '1114', '135', '2577809950', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1001', 'D', '1114', '210', '3909264184', '1198', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1002', 'D', '1114', '213', '29118917', '192', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1003', 'D', '1114', '214', '11129702', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1004', 'D', '1114', '215', '93549764', '47', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1005', 'D', '1114', '216', '42779286', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1006', 'D', '1114', '217', '18469469', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1007', 'D', '1114', '220', '2618518204', '36', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1008', 'D', '1121', '130', '20492462275', '464', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1009', 'D', '1121', '131', '1038739800', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1010', 'D', '1121', '132', '117531800', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1011', 'D', '1121', '135', '3420552700', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1012', 'D', '1121', '210', '12227753332', '3620', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1013', 'D', '1121', '211', '15674994', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1014', 'D', '1121', '213', '771529163', '752', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1015', 'D', '1121', '214', '288819249', '208', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1016', 'D', '1121', '215', '100639716', '50', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1017', 'D', '1121', '216', '94689185', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1018', 'D', '1121', '217', '176618973', '80', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1019', 'D', '1121', '220', '6300159638', '86', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1020', 'D', '1131', '130', '15986828813', '144', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1021', 'D', '1131', '131', '8822728125', '120', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1022', 'D', '1131', '132', '27224835', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1023', 'D', '1131', '135', '5647027800', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1024', 'D', '1131', '210', '5694054773', '2926', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1025', 'D', '1131', '211', '65197049', '42', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1026', 'D', '1131', '213', '2585282046', '1634', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1027', 'D', '1131', '214', '152703448', '277', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1028', 'D', '1131', '215', '232308318', '82', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1029', 'D', '1131', '216', '22494468', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1030', 'D', '1131', '217', '109259680', '53', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1031', 'D', '1131', '218', '8359880', '90', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1032', 'D', '1131', '220', '75662718536', '315', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1033', 'D', '1132', '130', '14760879188', '216', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1034', 'D', '1132', '131', '1286141900', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1035', 'D', '1132', '132', '207056200', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1036', 'D', '1132', '210', '1913908536', '1152', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1037', 'D', '1132', '213', '398014779', '571', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1038', 'D', '1132', '214', '31884216', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1039', 'D', '1132', '215', '134996299', '40', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1040', 'D', '1132', '217', '15006771', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1041', 'D', '1132', '220', '3067320243', '77', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1042', 'D', '1133', '130', '8803993376', '120', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1043', 'D', '1133', '131', '2724450', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1044', 'D', '1133', '132', '53709133', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1045', 'D', '1133', '135', '1855000000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1046', 'D', '1133', '210', '885469912', '537', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1047', 'D', '1133', '213', '31761796', '141', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1048', 'D', '1133', '214', '40196115', '27', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1049', 'D', '1133', '215', '30808214', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1050', 'D', '1133', '217', '17080197', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1051', 'D', '1133', '218', '41414400', '155', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1052', 'D', '1133', '220', '2451194211', '46', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1053', 'D', '1134', '130', '5153019018', '79', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1054', 'D', '1134', '131', '9612900', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1055', 'D', '1134', '132', '49998000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1056', 'D', '1134', '135', '560000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1057', 'D', '1134', '210', '1414994517', '632', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1058', 'D', '1134', '213', '12101709', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1059', 'D', '1134', '214', '28039435', '30', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1060', 'D', '1134', '215', '11289325', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1061', 'D', '1134', '217', '21933075', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1062', 'D', '1134', '220', '3980869445', '83', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1063', 'D', '1135', '130', '2634964221', '36', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1064', 'D', '1135', '131', '738062504', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1065', 'D', '1135', '210', '229640387', '128', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1066', 'D', '1135', '213', '2900000', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1067', 'D', '1135', '214', '4308403', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1068', 'D', '1135', '215', '7691615', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1069', 'D', '1135', '216', '8760352', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1070', 'D', '1135', '217', '2750395', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1071', 'D', '1135', '220', '209803580', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1072', 'D', '1136', '130', '5711198574', '88', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1073', 'D', '1136', '131', '29028450', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1074', 'D', '1136', '132', '46316050', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1075', 'D', '1136', '135', '500000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1076', 'D', '1136', '210', '752184822', '386', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1077', 'D', '1136', '213', '3400601', '29', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1078', 'D', '1136', '214', '87920', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1079', 'D', '1136', '215', '2847067', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1080', 'D', '1136', '217', '502525', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1081', 'D', '1136', '220', '321515749', '16', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1082', 'D', '1141', '130', '17446394088', '385', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1083', 'D', '1141', '131', '16854921169', '309', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1084', 'D', '1141', '132', '146673422', '24', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1085', 'D', '1141', '135', '11639035316', '17', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1086', 'D', '1141', '210', '8484884270', '4288', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1087', 'D', '1141', '211', '76283852', '41', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1088', 'D', '1141', '213', '1489136786', '1403', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1089', 'D', '1141', '214', '187849593', '132', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1090', 'D', '1141', '215', '208564648', '166', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1091', 'D', '1141', '216', '200638507', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1092', 'D', '1141', '217', '207537757', '85', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1093', 'D', '1141', '218', '4823000', '40', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1094', 'D', '1141', '220', '17628648772', '184', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1095', 'D', '1142', '130', '16325001964', '366', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1096', 'D', '1142', '131', '418334899', '25', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1097', 'D', '1142', '132', '75729400', '9', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1098', 'D', '1142', '210', '2235191460', '1516', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1099', 'D', '1142', '213', '145263072', '290', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1100', 'D', '1142', '214', '56450', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1101', 'D', '1142', '215', '55012237', '73', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1102', 'D', '1142', '217', '7225940', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1103', 'D', '1142', '218', '3599000', '76', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1104', 'D', '1142', '220', '666956913', '25', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1105', 'D', '1143', '130', '11079074179', '190', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1106', 'D', '1143', '131', '1988715800', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1107', 'D', '1143', '132', '43591200', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1108', 'D', '1143', '135', '4947950000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1109', 'D', '1143', '210', '1064067663', '898', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1110', 'D', '1143', '213', '67861084', '202', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1111', 'D', '1143', '214', '44167274', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1112', 'D', '1143', '215', '93004617', '44', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1113', 'D', '1143', '216', '2009035', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1114', 'D', '1143', '217', '21288447', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1115', 'D', '1143', '220', '1767788270', '173', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1116', 'D', '1144', '130', '7411506525', '107', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1117', 'D', '1144', '131', '266964250', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1118', 'D', '1144', '132', '147612587', '14', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1119', 'D', '1144', '135', '3154332500', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1120', 'D', '1144', '210', '2041464178', '753', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1121', 'D', '1144', '213', '51199419', '134', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1122', 'D', '1144', '214', '18644218', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1123', 'D', '1144', '215', '26951127', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1124', 'D', '1144', '217', '614830', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1125', 'D', '1144', '220', '628452185', '38', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1126', 'D', '1145', '130', '3732040631', '91', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1127', 'D', '1145', '131', '1500129050', '32', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1128', 'D', '1145', '132', '50428934', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1129', 'D', '1145', '210', '248542959', '279', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1130', 'D', '1145', '213', '2700175', '26', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1131', 'D', '1145', '214', '388663', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1132', 'D', '1145', '215', '3752857', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1133', 'D', '1145', '220', '59000000', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1134', 'D', '1171', '130', '1922311000', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1135', 'D', '1171', '131', '198367700', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1136', 'D', '1171', '132', '103429700', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1137', 'D', '1171', '210', '365935655', '191', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1138', 'D', '1171', '213', '3776046', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1139', 'D', '1171', '215', '55500', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1140', 'D', '1171', '220', '1503067472', '18', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1141', 'D', '1172', '130', '7131094278', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1142', 'D', '1172', '131', '103041400', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1143', 'D', '1172', '132', '52303450', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1144', 'D', '1172', '135', '7340551000', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1145', 'D', '1172', '210', '338444485', '111', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1146', 'D', '1172', '213', '75089364', '208', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1147', 'D', '1172', '214', '5001235', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1148', 'D', '1172', '217', '2107895', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1149', 'D', '1172', '220', '326829450', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1150', 'D', '1173', '130', '5554917600', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1151', 'D', '1173', '131', '687379600', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1152', 'D', '1173', '132', '49180100', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1153', 'D', '1173', '135', '1000000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1154', 'D', '1173', '210', '302223346', '198', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1155', 'D', '1173', '213', '2500119', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1156', 'D', '1173', '214', '4689830', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1157', 'D', '1173', '217', '6119627', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1158', 'D', '1173', '220', '275549647', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1159', 'D', '1181', '130', '2930716088', '47', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1160', 'D', '1181', '131', '1213714242', '20', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1161', 'D', '1181', '132', '40155660', '4', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1162', 'D', '1181', '135', '1312335200', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1163', 'D', '1181', '210', '692535832', '554', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1164', 'D', '1181', '213', '1950028', '19', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1165', 'D', '1181', '214', '3030942', '11', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1166', 'D', '1181', '215', '32659246', '22', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1167', 'D', '1181', '217', '4556484', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1168', 'D', '1181', '220', '6068142940', '48', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1169', 'D', '1182', '130', '4505131991', '82', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1170', 'D', '1182', '131', '236727250', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1171', 'D', '1182', '132', '163091700', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1172', 'D', '1182', '135', '188000000', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1173', 'D', '1182', '210', '815880845', '450', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1174', 'D', '1182', '213', '38605980', '198', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1175', 'D', '1182', '215', '76839176', '23', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1176', 'D', '1182', '217', '7152726', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1177', 'D', '1182', '220', '1813935996', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1178', 'D', '1282', '130', '9175116385', '165', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1179', 'D', '1282', '131', '1315088871', '56', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1180', 'D', '1282', '132', '2170450', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1181', 'D', '1282', '135', '7058000000', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1182', 'D', '1282', '210', '2167148592', '2178', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1183', 'D', '1282', '213', '724336548', '633', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1184', 'D', '1282', '214', '124141318', '63', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1185', 'D', '1282', '215', '23340372', '72', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1186', 'D', '1282', '216', '28583643', '10', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1187', 'D', '1282', '217', '143951418', '67', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1188', 'D', '1282', '220', '6810728717', '89', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1189', 'D', '1283', '130', '6146244459', '123', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1190', 'D', '1283', '131', '6093569015', '163', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1191', 'D', '1283', '132', '18238750', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1192', 'D', '1283', '135', '71600000000', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1193', 'D', '1283', '210', '5360387278', '2416', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1194', 'D', '1283', '211', '36367806', '28', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1195', 'D', '1283', '213', '1019287966', '835', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1196', 'D', '1283', '214', '5867334', '35', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1197', 'D', '1283', '215', '46626847', '33', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1198', 'D', '1283', '216', '90866265', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1199', 'D', '1283', '217', '139945351', '62', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1200', 'D', '1283', '218', '43853500', '219', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1201', 'D', '1283', '220', '10342359566', '118', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1202', 'D', '1284', '130', '4100820839', '99', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1203', 'D', '1284', '131', '1829356590', '34', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1204', 'D', '1284', '132', '91114221', '8', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1205', 'D', '1284', '135', '10500000000', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1206', 'D', '1284', '141', '97474300', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1207', 'D', '1284', '210', '587053230', '724', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1208', 'D', '1284', '213', '86043156', '195', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1209', 'D', '1284', '215', '1874358', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1210', 'D', '1284', '217', '4163825', '5', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1211', 'D', '1284', '220', '399809608', '12', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1212', 'D', '1285', '130', '3580261940', '58', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1213', 'D', '1285', '131', '1498347395', '21', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1214', 'D', '1285', '132', '18421700', '1', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1215', 'D', '1285', '135', '1720000000', '3', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1216', 'D', '1285', '210', '607628715', '553', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1217', 'D', '1285', '213', '4750930', '38', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1218', 'D', '1285', '214', '1629577', '6', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1219', 'D', '1285', '215', '27628631', '13', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1220', 'D', '1285', '216', '16047468', '2', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1221', 'D', '1285', '217', '12826900', '7', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n1222', 'D', '1285', '220', '394337575', '15', '10', '2017');
INSERT INTO `transaksi` VALUES ('\n', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `ID_TYPE` int(11) NOT NULL AUTO_INCREMENT,
  `TYPE` int(11) DEFAULT NULL,
  `CODE` varchar(255) DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`ID_TYPE`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '130', 'LN', 'KREDIT UMUM                       ', '1');
INSERT INTO `type` VALUES ('2', '131', 'LN', 'KREDIT PEGAWAI                    ', '1');
INSERT INTO `type` VALUES ('3', '132', 'LN', 'KREDIT MOTOR                      ', '1');
INSERT INTO `type` VALUES ('4', '135', 'LN', 'KREDIT UMUM REKENING KORAN        ', '1');
INSERT INTO `type` VALUES ('5', '141', 'LN', 'KREDIT MOBIL                      ', '1');
INSERT INTO `type` VALUES ('6', '210', 'RT', 'TABUNGAN SURYA (UMUM)             ', '1');
INSERT INTO `type` VALUES ('7', '211', 'RT', 'ATM TABUNGAN SURYA KHUSUS         ', '1');
INSERT INTO `type` VALUES ('8', '212', 'RT', 'TABUNGAN PENSIUN', '1');
INSERT INTO `type` VALUES ('9', '213', 'RT', 'TABUNGAN TAS CERIA                ', '1');
INSERT INTO `type` VALUES ('10', '214', 'RT', 'TABUNGANKU                        ', '1');
INSERT INTO `type` VALUES ('11', '215', 'RT', 'ATM TABUNGAN SURYA UMUM           ', '1');
INSERT INTO `type` VALUES ('12', '216', 'RT', 'TABUNGAN UMROH                    ', '1');
INSERT INTO `type` VALUES ('13', '217', 'RT', 'TABUNGAN THT UMUM                 ', '1');
INSERT INTO `type` VALUES ('14', '218', 'RT', 'TABUNGAN SIMPANAN PELAJAR (SIMPEL)', '1');
INSERT INTO `type` VALUES ('15', '220', 'DP', 'DEPOSITO BERJANGKA', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(255) DEFAULT NULL,
  `NAMA_PANGGILAN` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `KEY` varchar(100) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '1', 'Admin', null, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '68fc61f6fd79afe9607a3ec58f2e6ad1', '1', '0');
INSERT INTO `user` VALUES ('21', '2', 'Admin Wonosobo', '', 'admin_wonosobo', '21232f297a57a5a743894a0e4a801fc3', '1', null, '1', '0');
INSERT INTO `user` VALUES ('22', '2', '', '', 'kinerja_k_wonosobo', '2efa2de366fd1c145828b9fdf1f30521', '2', null, '1', '0');
INSERT INTO `user` VALUES ('23', '2', '', '', 'pembukuan_wonosobo', '14528d59da0203b1f8afd0eaf5354b8c', '3', null, '1', '0');
INSERT INTO `user` VALUES ('24', '2', '', '', 'personalia_wonosobo', 'a9e7fc73443338389398137e512d52bd', '4', null, '1', '0');
INSERT INTO `user` VALUES ('25', '2', '', '', 'sekretaris_wonosobo', '7cd255a809ff2475430624fdd7b4678e', '5', null, '1', '0');
INSERT INTO `user` VALUES ('26', '2', 'Android Wonosobo', 'Wonosobo', 'android_wonosobo', '47bf10d4c1dff89df56845fcea390e8c', '6', null, '1', '0');
INSERT INTO `user` VALUES ('28', '1', '', '', 'kinerja_k_banjar', 'd0d7c2ceb53d1e1270b8f12df228e734', '2', null, '1', '0');
INSERT INTO `user` VALUES ('29', '1', '', '', 'pembukuan_banjar', '53f2c4814bcc1cdb9777dff19157433d', '3', null, '1', '0');
INSERT INTO `user` VALUES ('30', '1', '', '', 'personalia_banjar', 'c2aa25bd6b8518dd060bc6336a3224e2', '4', null, '1', '0');
INSERT INTO `user` VALUES ('31', '1', '', '', 'sekretaris_banjar', 'bf9474b8e88f6db135562091b5b1492f', '5', null, '1', '0');
INSERT INTO `user` VALUES ('32', '1', 'Android Banjar', 'Banjar', 'android_banjar', '968263f236cd063f753f3b3c728e53ce', '6', null, '1', '0');

-- ----------------------------
-- Table structure for wilayah
-- ----------------------------
DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `ID_WILAYAH` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `WILAYAH` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DELETED` int(11) DEFAULT '0',
  PRIMARY KEY (`ID_WILAYAH`),
  KEY `wilayah_ID_KOTA_idx` (`ID_KOTA`) USING BTREE,
  CONSTRAINT `wilayah_ibfk_1` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wilayah
-- ----------------------------
INSERT INTO `wilayah` VALUES ('1', '1', 'Wilayah II', '1', '0');
INSERT INTO `wilayah` VALUES ('2', '1', 'Wilayah II', '1', '0');
INSERT INTO `wilayah` VALUES ('3', '1', 'Wilayah III', '1', '0');
INSERT INTO `wilayah` VALUES ('4', '1', 'Wilayah IV', '1', '0');
INSERT INTO `wilayah` VALUES ('5', '1', 'Wilayah V', '1', '0');
INSERT INTO `wilayah` VALUES ('6', '1', 'Wilayah VI', '1', '0');
INSERT INTO `wilayah` VALUES ('7', '1', 'Wilayah VII', '1', '0');
INSERT INTO `wilayah` VALUES ('8', '1', 'Wilayah VIII', '1', '0');
INSERT INTO `wilayah` VALUES ('9', '1', 'Wilayah IX', '1', '0');
INSERT INTO `wilayah` VALUES ('10', '2', 'Wilayah I', '1', '0');
INSERT INTO `wilayah` VALUES ('11', '2', 'Wilayah II', '1', '0');
INSERT INTO `wilayah` VALUES ('12', '1', '2', '1', '0');
INSERT INTO `wilayah` VALUES ('13', '1', 'A1', '1', '0');
INSERT INTO `wilayah` VALUES ('14', '2', 'Wilayah III', '1', '0');
INSERT INTO `wilayah` VALUES ('15', '2', 'Wilayah IV', '1', '0');

-- ----------------------------
-- View structure for v_transaksi_a
-- ----------------------------
DROP VIEW IF EXISTS `v_transaksi_a`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_transaksi_a` AS SELECT
	brc.ID_BRANCH,
	tsk.BULAN,
	tsk.TAHUN,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '130'
		AND `GROUP` = 'A'
	) AS KRED_UMUM,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '131'
		AND `GROUP` = 'A'
	) AS KRED_PEG,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '132'
		AND `GROUP` = 'A'
	) AS KRED_MOTOR,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '135'
		AND `GROUP` = 'A'
	) AS KRED_URK,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '141'
		AND `GROUP` = 'A'
	) AS KRED_MOBIL,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '210'
		AND `GROUP` = 'A'
	) AS TAB_SURYA,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '211'
		AND `GROUP` = 'A'
	) AS ATM_KHUSUS,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '212'
		AND `GROUP` = 'A'
	) AS TAB_PENSIUN,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '213'
		AND `GROUP` = 'A'
	) AS TAS,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '214'
		AND `GROUP` = 'A'
	) AS TAB_KU,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '215'
		AND `GROUP` = 'A'
	) AS ATM_SURYA,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '216'
		AND `GROUP` = 'A'
	) AS TAB_UMROH,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '217'
		AND `GROUP` = 'A'
	) AS THT_UMUM,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '218'
		AND `GROUP` = 'A'
	) AS TAB_SIMPEL,
	(
		SELECT
			AMOUNT_TOTAL
		FROM
			transaksi
		WHERE
			TYPE = '220'
		AND `GROUP` = 'A'
	) AS DEP_1
FROM
	transaksi tsk
JOIN branch brc ON brc.BRANCH = tsk.BRANCH
JOIN `group` grp ON grp.ID_GROUP = brc.ID_GROUP
JOIN type tp ON tp.TYPE = tsk.TYPE
WHERE
	grp.`GROUP` = 'A'
GROUP BY
	brc.ID_BRANCH,
	tsk.BULAN,
	tsk.TAHUN ;
