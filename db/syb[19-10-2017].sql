/*
Navicat MariaDB Data Transfer

Source Server         : localhost
Source Server Version : 100116
Source Host           : localhost:3306
Source Database       : syb

Target Server Type    : MariaDB
Target Server Version : 100116
File Encoding         : 65001

Date: 2017-10-19 13:01:16
*/

SET FOREIGN_KEY_CHECKS=0;

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
  PRIMARY KEY (`ID_CABANG`),
  KEY `cabang_ID_WILAYAH_idx` (`ID_WILAYAH`),
  CONSTRAINT `cabang_ID_WILAYAH` FOREIGN KEY (`ID_WILAYAH`) REFERENCES `wilayah` (`ID_WILAYAH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cabang
-- ----------------------------
INSERT INTO `cabang` VALUES ('1', '1', 'Cabang Utama', 'Rejasa 003/003', 'Kec. Madukara Kab. Banjarnegara 53482', '(0286) 591662 & (028', '1');
INSERT INTO `cabang` VALUES ('2', '1', 'Cabang Pasar Besar', 'Jl. Letjend. Karjono No.43', 'Parakancanggah 5/9 Banjarnegara', '(0286) 592315 & (028', '1');
INSERT INTO `cabang` VALUES ('3', '1', 'Cabang Singamerta', 'Desa Singamerta Rt.04 Rw.02', 'Kec. Sigaluh Kab. Banjarnegara', '(0286) 593802 & (028', '1');
INSERT INTO `cabang` VALUES ('4', '1', 'Cabang Madukara', 'Desa Madukara RT 03 RW 03', 'Kecamatan Madukara Kabupaten Banjarnegara', '-', '1');
INSERT INTO `cabang` VALUES ('5', '2', 'Cabang Klampok', 'Jl. Raya Purwareja Klampok Rt. 01 Rw. 01', 'Purwareja Klampok Banjarnegara', '(0286) 479217 & (028', '1');
INSERT INTO `cabang` VALUES ('6', '2', 'Cabang Purwonegoro', 'Jl. Raya Purwonegoro 1/1 Purwonegoro ', 'Banjarnegara', '(0286) 5988607 & (02', '1');
INSERT INTO `cabang` VALUES ('7', '2', 'Cabang Mandiraja', 'Desa Mandiraja Kulon Rt.02 Rw. 03', 'Kec. Mandiraja Kab. Banjarnegara', '(0286) 411443 & (028', '1');
INSERT INTO `cabang` VALUES ('8', '2', 'Cabang Wanadadi', 'Kemantren 1/3 Wanadadi', 'Banjarnegara', '(0286) 3398765 & (02', '1');
INSERT INTO `cabang` VALUES ('9', '2', 'Cabang Punggelan', 'Desa Karangsari RT 004 RW 001', 'Kec. Punggelan Kab. Banjarnegara', '-', '1');
INSERT INTO `cabang` VALUES ('10', '3', 'Cabang Karangkobar', 'Desa Leksana 3/5', 'Karangkobar Banjarnegara', '(0286) 5988020 & (02', '1');
INSERT INTO `cabang` VALUES ('11', '3', 'Cabang Kalibening', 'Jl. Raya Kalibening RT 02/Rw.03', 'Kec. Kalibening Kab. Banjarnegara', '(0285) 522304 & (028', '1');
INSERT INTO `cabang` VALUES ('12', '4', 'Cabang Batur', 'Jl. Raya Batur Rt 02 Rw 01', 'Batur Banjarnegara', '(0286) 5986229 & (02', '1');
INSERT INTO `cabang` VALUES ('13', '4', 'Cabang Pagentan', 'Jl. Raya Pagentan Rt.3 Rw.7', 'Desa Pagentan Kec. Pagentan Kab. Banjarnegara', '082892031747', '1');
INSERT INTO `cabang` VALUES ('14', '4', 'Cabang Dieng', 'Ds.Dieng Kulon Rt.01 Rw.01', 'Kec.Batur Kab. Banjarnegara', '(0286) 3342090 & (02', '1');
INSERT INTO `cabang` VALUES ('15', '5', 'Cabang Pekalongan', 'Jl. Raya Mandurorejo No. 504 Desa Nyamok', 'Kecamatan Kajen Kab. Pekalongan', '(0285) 385322 & \'(02', '1');
INSERT INTO `cabang` VALUES ('16', '6', 'Cabang Purbalingga', 'Jl. S Parman No. 129 Kedungmenjangan', 'Purbalingga', '(0281) 894380/ 89484', '1');
INSERT INTO `cabang` VALUES ('17', '6', 'Cabang Bobotsari', 'Jl. Kolonel Soegiri Rt. 03 Rw. 04 Desa Gandasuli', 'Kec. Bobotsari Kab. Purbalingga', '(0281) 759403 & (028', '1');
INSERT INTO `cabang` VALUES ('18', '6', 'Cabang Rembang', 'Jl. Raya Rembang-Purbalingga Rt.01 Rw.01 Ds.Losari', 'Kec.Rembang Kab. Purbalingga', '(0281) 6590538 & (02', '1');
INSERT INTO `cabang` VALUES ('19', '6', 'Cabang Karangreja', 'Desa Karangreja Rt 04 Rw 01 ', 'Kecamatan Karangreja Kab. Purbalingga', '(0281) 7700099', '1');
INSERT INTO `cabang` VALUES ('20', '7', 'Cabang Purwokerto', 'Jl. Jend Sudirman Timur No. 1, Rt.05/Rw.03', 'Kel. Berkoh, Kec. Purwokerto Selatan, Kab. Banyumas', '(0281) 643582 & (028', '1');
INSERT INTO `cabang` VALUES ('21', '7', 'Cabang Ajibarang', 'Jl. Raya Ajibarang – Pancasan Rt.002 Rw.001', 'Kecamatan Ajibarang', '(0281) 571459', '1');
INSERT INTO `cabang` VALUES ('22', '8', 'Cabang Banyumas', 'Jl. Gatot Subroto RT.05/RW.01 Desa Kedunguter ', 'Kec. Banyumas Kab. Banyumas', '(0281) 796113 & - (0', '1');
INSERT INTO `cabang` VALUES ('23', '9', 'Cabang Cilacap', 'Jl. Perintis Kemerdekaan Rt.01 Rw. 12', 'Kel. Gumilir Kec. Cilacap Utara Kab. Cilacap 53231', '(0282) 542294 & (028', '1');
INSERT INTO `cabang` VALUES ('24', '9', 'Cabang Kroya', 'Jl. Raya Mujur Rt.06 Rw.03 Desa Mujur', 'Kec. Kroya Kab. Cilacap 53282', '(0282) 5295188', '1');
INSERT INTO `cabang` VALUES ('25', '10', 'Cabang Utama', 'Jl. Raya Kertek Wonosobo, Sidomukti, Rt 05/ Rw 06 ', 'Kecamatan Kertek, Kabupaten Wonosobo 56371', '(0286) 3399244, 3329', '1');
INSERT INTO `cabang` VALUES ('26', '10', 'Cabang Wonosobo', 'Kyai Muntang No. 170 B, Rt. 04 Rw. 11 Jaraksari, ', 'Kab. Wonosobo 56314', '(0286) 321737', '1');
INSERT INTO `cabang` VALUES ('27', '10', 'Cabang Sapuran', 'Kp. Lempongsari Rt. 21 Rw. 12, ', 'Kec. Sapuran Kab. Wonsoobo 56373', '(0286) 611153', '1');
INSERT INTO `cabang` VALUES ('28', '10', 'Cabang Kaliwiro', 'Jalan Kaliwiro – Wadaslintang, Rt. 02 Rw. 06 Kelurahan Kaliwiro, ', 'Kec. Kaliwiro Kab. Wonosobo 56364', '-', '1');
INSERT INTO `cabang` VALUES ('29', '10', 'Cabang Selomerto', 'Jl. Raya Banyumas Km 6 Rt. 01 Rw. 01, Desa Campursari', 'Kecamatan Selomerto, Kabupaten Wonosobo 56361', '(0286) 3320123', '1');
INSERT INTO `cabang` VALUES ('30', '11', 'Cabang Temanggung', 'Jl. Jend Sudirman 120 B Rejosari', 'Rejosari, Temanggung 56218', '(0293) 493813, 49387', '1');
INSERT INTO `cabang` VALUES ('31', '11', 'Cabang Ngadirejo', 'Jln. Raya Petirejo Rt. 03 Rw. 02, Desa Petirejo', 'Ngadirejo 56255, Kab. Temanggung', '(0293) 591042', '1');
INSERT INTO `cabang` VALUES ('32', '11', 'Cabang Parakan', 'Jln. Diponegoro No. 100 A, Rt. 02 Rw. 04', 'Kec. Parakan, Kab. Temanggung 56254', '(0293) 596784', '1');

-- ----------------------------
-- Table structure for direksi
-- ----------------------------
DROP TABLE IF EXISTS `direksi`;
CREATE TABLE `direksi` (
  `ID_DIREKSI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(200) DEFAULT NULL,
  `DESKRIPSI` text,
  `FOTO` varchar(100) DEFAULT NULL,
  `STATUS` int(11) DEFAULT '1',
  PRIMARY KEY (`ID_DIREKSI`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of direksi
-- ----------------------------
INSERT INTO `direksi` VALUES ('1', 'H. Satriyo Yudiarto', 'Lahir pada tahun 1947 di Majenang dengan kewarganegaraan Indonesia. Meraih lulusan terbaik dari Sekolah Tinggi Ilmu Perbankan (STIKUBANK) pada tahun 1971. Beliau memulai karirnya di The Bank of Tokyo, Ltd pada tahun 1972-2000 dan mencapai puncak karir sebagai Senior Assistant General Manager dan merangkap sebagai Senior Operation Manager.\nSaat ini Satriyo Yudiarto menjabat sebagai Komisaris Utama PT. BPR Surya Yudhakencana Banjarnegara, Komisaris Utama BPR Surya Yudha Wonosobo, Komisaris Utama Surya Yudha Park/ Hotel, dan Komisaris Utama PT Kusuma Agung Sejahtera (Pemilik Hotel Santika Purwokerto). Satriyo Yudiarto juga merupakan Pemegang Saham Mayoritas Perseroan dari PT BPR Surya Yudhakencana.', null, '1');
INSERT INTO `direksi` VALUES ('2', 'Milla Feryanti', 'Memiliki latar belakang pendidikan Fakultas Ekonomi Jurusan Manajemen di Universitas Airlangga Surabaya dan Fakultas Sastra Jurusan Bahasa Jepang di Universitas Indonesia dengan meraih lulusan terbaik sehingga mendapat beasiswa untuk belajar di Universitas Soka, Tokyo, Jepang. Beliau kemudian melanjutkan pendidikannya di bidang Manajemen Bisnis di Sydney, Australia dan sempat menuntut ilmu di Boulder Institute of Microfinance di Turin-Italia atas beasiswa dari MasterCard Foundation.\nMemiliki pengalaman kerja di The Industrial Bank of Japan, Jakarta selama 6 tahun dan Bank Mizuho Indonesia selama 5.5 tahun sebagai Sekretaris Direksi WN Jepang (Ekspatriat), Bagian Business Development/ Marketing dan juga bagian General Affairs (Umum).\nSaat ini Milla Feryanti aktif dalam kepengurusan beberapa organisasi, diantaranya sebagai Ketua Komite Tetap Perbankan KADIN Jakarta Barat, Ketua kompartemen Koperasi BPD HIPMI Jaya (Himpunan Pengusaha Muda Indonesia), Dept. Hub. Luar Negeri DPP Perbarindo (Perhimpunan BPR se-Indonesia), BOD IMA (Indonesia Microfinance Association), National Vice President dari Junior Chamber International (JCI) Indonesia-Jakarta yang merupakan Organisasi Kewirausahaan dan Pemimpin-pemimpin Muda Dunia dan aktif pula di beberapa kepengurusan organisasi pengusaha lainnya. Sempat terpilih oleh AusAid/ Pemerintah Australia untuk mewakili Indonesia dalam ajang Asia Microfinance Forum di Colombo-Srilanka. Di tahun 2011 Milla Feryanti terpilih sebagai finalis Tokoh Pengusaha Muda Indonesia yang diselenggarakan oleh HIPMI (Himpunan Pengusaha Muda Indonesia)', null, '1');
INSERT INTO `direksi` VALUES ('3', 'Ananta Yudha', 'Berstatus sebagai Pilot lulusan dari Australian Aviation College Adelaide, Australia melalui beasiswa penuh dari Merpati Nusantara Airlines dan Dinas Perhubungan. Beliau pernah bekerja di Merpati Nusantara Airlines selama 10 tahun yang diselingi kontrak selama 2 tahun di Pelita Air dengan rating pesawat Fokker 28 sebagai First Officer (FO), Bar 3.\nSaat ini bekerja di Lion Air dengan rating pesawat MD 82 dan MD 90 sebagai Captain Pilot, Bar 4. Beliau pernah mengambil studi di STAN (Sekolah Tinggi Akuntansi Negara) dan Fakultas Ekonomi Universitas Terbuka, namun lebih memilih untuk mengambil beasiswa penuh pendidikan Pilot di Adelaide, Australia. Beliau pernah memenangkan Kejuaraan Tenis Remaja se-Jawa Timur dan hingga saat ini tetap aktif bermain Tennis Lapangan, baik sebagai hobi maupun prestasi.\ndibagikan dengan satu orang, nonaktif - hanya orang tertentu yang bisa mengakses.', null, '1');
INSERT INTO `direksi` VALUES ('4', 'Tenny Yanutriana, MBA', 'Lahir pada tahun 1981 di Jakarta dengan kewarganegaraan Indonesia. Memiliki latarbelakang pendidikan Fakultas Ilmu Sosial dan Ilmu Politik (FISIP) di Universitas Indonesia pada tahun 2004. Mendapatkan gelar Master of Business Administration (MBA) di Universitas Gadjah Mada Yogyakarta sebagai lulusan terbaik, dan menjalani satu semester abroad di Fachhochschule Köln, Jerman.  Pada di tahun 2010, The MasterCard Foundation memberikan beasiswa kepada beliau untuk mengikuti pendidikan Boulder Institute of Microfinance “Microfinance Management” concentration di Turin Italia dan di tahun 2011 beasiswa untuk mengikuti pendidikan Harvard Business School Executive Education “Strategic Leadership for Microfinance.” Beliau merupakan satu-satu lulusan iLab Entrepreneur Institute yang berasal dari Indonesia pada tahun 2015.\nMengawali karirnya di BPR Bank Surya Yudha sebagai Kepala Divisi Non-Operasional II yang membawahi Divisi Pembukuan, Sekretariat dan Personalia. Kini Beliau menjabat sebagai Komisaris di BPR Bank Surya Yudha sejak tahun 2005. Selain itu, beliau juga menjabat sebagai Komisaris di BPR Surya Yudha Wonosobo dan Ketua Departemen Bidang Luar Negeri di DPP Perbarindo.', null, '1');
INSERT INTO `direksi` VALUES ('5', 'Dra.Ec. Emila Hayati', 'Lahir pada tahun 1965 di Surabaya dengan kewarganegaraan Indonesia. Lulusan Universitas Katolik Widya Mandala Surabaya, Fakultas Ekonomi Jurusan Manajemen tahun 1989. Mengawali karirnya di Bank of Tokyo, Ltd Surabaya pada bagian Operasional tahun 1989-1993. Kemudian di Sanwa Indonesia Bank Jakarta pada bagian ekspor impor dan bagian operasional sebagai Supervisor tahun 1993-2001. Dan bergabung dengan BPR Bank Surya Yudha sebagai Kepala Divisi Non-Operasional II yang membawahi Divisi Pembukuan, Sekretariat dan Personalia. Kini beliau menjabat sebagai Komisaris di BPR Bank Surya Yudha sejak April 2010 dan juga merupakan Komisaris di BPR Surya Yudha Wonosobo. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 08 Mei 2015, masa jabatan berlaku hingga 19 Maret 2020.', null, '1');
INSERT INTO `direksi` VALUES ('6', 'Margono, S.E.', 'Lahir pada tahun 1950 di Klaten dengan kewarganegaraan Indonesia. Memulai karir pada tahun 1975-1976 sebagai Kepala Unit Desa PT Bank Rakyat Indonesia. Kemudian tahun 1976-1999 bekerja di PT Bank Dagang Negara dengan jabatan tertinggi sebagai Assistant Relationship Manager Kredit Corporate di Cabang Surabaya Gentengkali. Setelah itu pada tahun 1999-2005 bergabung dengan Bank Mandiri dengan jabatan tertinggi sebagai Pemegang Kewenangan di Regional Risk Management VII Semarang. Kemudian pada tahun 2007-2011 beliau dikontrak oleh Lembaga Penjamin Simpanan (LPS) sebagai Ketua Tim Likuidasi PT BPR Anugerah Arta Niaga di Pati. Beliau bergabung dengan BPR Bank Surya Yudha pada bulan Juli 2013 sebagai Kepala Bagian Pendidikan yang kemudian mutasi menjadi Kepala Bagian Kepatuhan pada bulan September 2014. Pada bulan November 2014, beliau menjabat sebagai Kepala Divisi Kepatuhan. Dan kini, beliau diangkat sebagai Komisaris Independen sejak bulan November 2016. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 03 November 2016, dengan masa jabatan berlaku hingga 26 September 2021.', null, '1');
INSERT INTO `direksi` VALUES ('7', 'Sugeng Riyanto, S.E', 'Lahir pada tahun 1974 di Banjarnegara dengan kewarganegaraan Indonesia. Meniti karir di BSY sejak tahun 1995-1997 sebagai Staf Marketing Cabang Karangkobar, tahun 1997-1999 sebagai Kepala Seksi, tahun 1999-2000 sebagai Wakil Kepala Cabang Mandiraja, tahun 2000-2002 sebagai Kepala Cabang Utama, tahun 2002-2006 sebagai Kepala Cabang Karangkobar, tahun 2006-2010 sebagai Wakil Kepala Divisi Kredit. Menjabat sebagai Kepala Wilayah I (2010-2015). Kini beliau menjabat sebagai Direktur Utama sejak Agustus 2015. Dasar pengngkatan pada Akte Notaris No. 70 tanggal 07 Juli 2015, masa jabatan berlaku hingga 07 Juli 2020.', null, '1');
INSERT INTO `direksi` VALUES ('8', 'Dra. Ec. Sri Wahyu Utami, Ak', 'Lahir pada tahun 1965 di Surabaya dengan kewarganegaraan Indonesia. Lulusan Sekolah Tinggi Ilmu Ekonomi Indonesia (STIESIA) Surabaya tahun 1989 dan lulus pendidikan profesi akuntan di Universitas Jenderal Soedirman (UNSOED) pada tahun 2007. Memulai karirnya sebagai staf pengajar SMP PGRI 32 Surabaya tahun 1988-1989. Kemudian pada tahun 1989-1990 sebagai Auditor di Kantor Akuntan Publik Subandi Surabaya, tahun 1990 Applied Computer Management Indonesia, dan bekerja di PT BPR Artha Senapati Bangil Pasuruan Jawa Timur pada tahun 1990-1992. Bergabung dengan BPR Bank Surya Yudha sejak tahun 1992 sebagai Direktur Utama tahun 1992-1999 dan Direktur tahun 1999-2009. Kini beliau menjabat sebagai Direktur Umum sejak tahun 2009. Dasar pengangkatan pada Akte Notaris No. 46 tanggal 09 November 2014, masa jabatan berlaku hingga 09 November 2019. Beliau kini juga menjabat sebagai Bendahara Perbarindo DPK Banyumas dimana sebelumnya pernah menjabat sebagai Bendahara di DPD Perbarindo Jawa Tengah.', null, '1');
INSERT INTO `direksi` VALUES ('9', 'Abdul Choir Maradika Putra, S.H', 'Lahir pada tahun 1971 di Jakarta dengan kewarganegaraan Indonesia. Lulusan Fakultas Hukum Universitas Wijaya Kusuma Purwokerto tahun 2002. Mengawali karir di BPR Pilar Niaga Jakarta sebagai Marketing pada tahun 1993-1994. Kemudian bergabung dengan BPR Bank Surya Yudha pada tahun 1994-1997 sebagai Staf Marketing, tahun 1997-2001 sebagai Kepala Cabang Karangkobar, tahun 2001-2008 sebagai Wakil Kepala Divisi Kredit, tahun 2008-2009 sebagau Kepala Wilayah IV yang Cabang Purwokerto, Purbalingga, dan Klampok. Menjabat sebagai Direktur Kredit pada tahun 2009-2016. Kini beliau menjabat sebagai Direktur Kepatuhan sejak November 2016. Dasar Pengangkatan pada Akte Notaris No. 46 tanggal 09 November 2014, masa jabatan berlaku hingga 09 November 2019.', null, '1');
INSERT INTO `direksi` VALUES ('10', 'Achmad Supriyono, S.E.', 'Lahir pada tahun 1978 di Banjarnegara dengan kewarganegaraan Indonesia. Memulai karir pada tahun 1998-1999 sebagai staf TU MTS Muhammadiyah Petambakan Madukara Banjarnegara. Kemudian bergabung dengan BPR Bank Surya Yudha pada tahun 1999-2003 sebagai Kepala Seksi Kredit di Cabang Utama. Kemudian menjabat sebagai Kepala Seksi Kredit di Cabang Karangkobar (2003), Wakil Kepala Cabang Karangkobar (2004), Wakil Kepala Cabang Purbalingga (2005-2006), Kepala Kas Pasar Besar (2006), Kepala Cabang Karangkobar (2006-2008), Kepala Cabang batur (2008-2010), Kepala Cabang Purwokerto (2010-2012), Kepala Wilayah V (2012-2013), Kepala Divisi Kredit Wilayah V (2013), Kepala Wilayah V (2015), Kepala Wilayah VI (2015), dan Kepala Divisi Kredit (2016). Kini beliau telah diangkat menjadi Direktur Kredit, sejak bulan November 2016. Dasar pengangkatan pada Akte Notaris No. 49 tanggal 03 November 2016, masa jabatan berlaku hingga 26 September 2021.', null, '1');
INSERT INTO `direksi` VALUES ('11', 'Nurhadi, S.E.', 'Lahir pada tahun 1967 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Nurhadi, S.E. bergabung dengan BPR Bank Surya Yudha sejak tahun 1995 sebagai staf marketing, kemudian di tahun 1997 s/d 2006 diangkat menjadi Wakil Kepala Cabang Wanadadi dan di tahun 2006 – 2008 diangkat menjadi Kepala Cabang Wanadadi. Pada tahun 2008 beliau dimutasi ke Cabang Purwonegoro sebagai Kepala Cabang dan tahun 2009 beliau kembali dimutasikan ke Cabang Purbalingga dan menjabat sebagai Kepala Cabang. Pada tahun 2010 beliau menjabat sebagai Kepala Wilayah III yang membawahi Cabang Wanadadi, Purwonegoro dan Cabang Purworejo Klampok. Sejak tahun 2011 beliau menjabat sebagai Kepala Wilayah I yang membawahi Bag. PHBKIS kantor pusat, Cabang Utama, Singamerta dan Pasar besar. Sedangkan saat ini beliau menjabat sebagai Kepala Wilayah II yang membawahi Cabang Klampok, Mandiraja, Purwonegoro dan Wanadadi. Saat ini beliau menjabat sebagai Kepala Wilayah I yang membawahi Cabang Utama, Cabang Pasar Besar dan Cabang Singamerta sejak tanggal 15 Mei 2017.', null, '1');
INSERT INTO `direksi` VALUES ('12', 'Sutarjo, S.E', 'Lahir pada tahun 1973 di Banjarnegara, memiliki latar belakang pendidikan S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Sutarjo, S.E. merintis karir sebagai Staf Marketing mulai tanggal 13 Maret 1997 di PT. BPR Surya Yudhakencana Banjarnegara Cabang Mandiraja. Pada bulan Mei 2003, Sutarjo, S.E. diangkat sebagai Kepala Kantor Kas Mandiraja. Kemudian pada bulan Mei 2006, Sutarjo, S.E. diangkat sebagai Wakil Kepala Cabang Purwonegoro. Pada bulan Agustus 2009, Sutarjo, S.E. dimutasi ke Kas Dieng Cabang Batur sebagai Ketua Pokja untuk persiapan kenaikan status menjadi Kantor Cabang. Namun pada tanggal 14 September 2009, Sutarjo, S.E. kembali dimutasi ke Cabang Purwonegoro sebagai Kepala Cabang dan saat ini Sutarjo, S.E dimutasi kembali ke Cabang Purwokerto mulai tanggal 02 Februari 2012. Pada tanggal 28 Juli 2016, beliau dimutasi ke Kantor Cabang Purbalingga sebagai Kepala Cabang. Pada tanggal 12 Mei 2017 dipromosikan sebagai Kepala Wilayah II yang membawahi Cabang Wanadadi, Cabang Purwonegoro, Cabang Mandiraja dan Cabang Klampok.', null, '1');
INSERT INTO `direksi` VALUES ('13', 'Tisto Yuwono', 'Lahir pada tahun 1972 di Banjarnegara, berpendidikan terakhir lulusan SMA N 1 Banjarnegara dan lulus tahun 1992. Tidak melanjutkan ke Perguruan Tinggi karena mempunyai keinginan untuk langsung bekerja. Dan untuk lebih meningkatkan ketrampilan dan daya saing maka dikurun waktu tahun 1993 mengikuti berbagai pendidikan ketrampilan anatara lain computer, Bahasa Inggris dan mengetik. Setelah selesai mengikuti berbagai pendidikan non formal langsung merantau ke Jakarta dan diterima di Bank Papan Sejahtera Cabang Jakarta dan ditempatkan sebagai Staf Administrasi Kredit, bank tersebut ber alamat di Jl.HR.Rasuna Said dan merupakan bank yang bergerak khusus untuk pelemparan kredit Kepemilikan Rumah / KPR. Bekerja di Bank Papan Sejahtera dari tahun 1994 s/d 1996. Pada tahun 1997 kembali ke Banjarnegara dan pada akhirnya di bulan Juni 1999 mulai bergabung dengan Bank Surya Yudha Banjarnegara. Awal karir dimulai sebagai staf marketing di Pasar Banjarnegara dan tahun 2000 dimutasikan ke kantor Cabang Wanadadi kemudian di tahun 2005 dimutasikan ke Kantor Kas Singamerta. Pada tahun 2008 dipercaya menjabat sebagai Kepala Kantor Kas Singamerta, dan seiring dengan peningkatan status kantor Kas Singamerta menjadi kantor Cabang pada tahun 2009 dipercaya menjabat sebagai Wakil Kepala Cabang dan pada tahun 2010 dipromosikan sebagai Kepala Cabang Bank Surya Yudha Cabang Singamerta dan saat ini beliau dimutasikan ke Cabang Pekalongan sebagai Kepala Cabang per tanggal 01 Maret 2012. Pada tanggal 13 Juli 2016, dipromosikan menjadi Kepala Wilayah III yang membawahi Cabang Karangkobar dan Cabang Kalibening.', null, '1');
INSERT INTO `direksi` VALUES ('14', 'Eko Hartono, S.E', 'Lahir pada tahun 1973 lahir di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Eko Hartono, S.E. bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tanggal 2 Desember 1996 Sebagai Staff Marketing di Cabang Wanadadi sampai dengan tanggal 1 Juni 1998. kemudian tanggal 1 Juni 1998 s/d 24 Maret 2003 sebagai staff marketing Cabang Utama Banjarnegara, Selanjutnya tanggal 25 Maret 2003 s/d 23 September 2003 Menjabat sebagai Kasie Kredit di Bagian PHBKIS. Tanggal 23 September 2003 s/d 8 Juli 2006 Mutasi Ke Cabang Utama Sebagai Kasie Kredit. Tanggal 8 Juli 2006 s/d 4 Februari 2008 Menjabat Sebagai Wakil Kepala Cabang Utama Banjarnegara. Tanggal 4 Februari 2008 s/d 30 Januari 2010 dimutasi ke Cabang Purwokerto Menjabat Wakil Kepala Cabang. Pada tanggal 30 Maret 2010 dimutasi ke Cabang Klampok sebagai Kepala Cabang. Saat ini beliau menjabat menjadi Kepala Cabang Singamerta per tanggal 17 Februari 2012. Pada tanggal 13 Juli 2016 dipromosikan menjadi Kepala Wilayah IV, yang membawahi Cabang Pagentan, Cabang Batur dan Cabang Dieng.', null, '1');
INSERT INTO `direksi` VALUES ('15', 'Purnawan, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Purnawan, S.E. mengawali karirnya di BPR Bank Surya Yudha Cabang Karangkobar Kas Kalibening sebagai staf Marketing sejak 1997 hingga 2001, dengan kegigihan serta keuletan beliau di bulan Februari 2001 diangkat sebagai Kepala Seksi di BPR Bank Surya Yudha Cabang Karangkobar Kas Kalibening, menjabat sebagai Pjs Kepala Cabang di BPR Bank Surya Yudha Cabang Kalibening pun pernah beliau lakoni, hingga di awal bulan tahun 2007 beliau dipercaya untuk menjabat sebagai Kepala Cabang Kalibening, Di tahun 2011 ini beliau mencoba mengukir sejarah dengan mengepalai cabang baru BPR Bank Surya Yudha di Pekalongan. Pada beberapa tahun terakhir, Purnawan atau akrab dipanggil wawan, Saat ini beliau dipromosikan menjadi Kepala Wilayah IV per tanggal 8 Maret 2012 dengan membawahi Cabang Kalibening dan Pekalongan.', null, '1');
INSERT INTO `direksi` VALUES ('16', 'Wahyu Rukmono, S.E', 'Lahir pada tahun 1967 di Surabaya, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Putra Bangsa Surabaya. Wahyu Rukmono, S.E. lahir di Surabaya tanggal 31 Maret 1967. Latar belakang pendidikan S1 fakultas ekonomi di Universitas Putra Bangsa Surabaya. Beliau pernah menjadi sales representative di PT Bina Swdya Surabaya pada tahun 1998 dan ditahun yang sama beliau pindah dan bekerja sebagai kolektor di PT. BPR Dau Anugrah Malang. Wahyu Rukmono, S.E. bergabung dengan PT. BPR Surya Yudha pada tahun 2000 dengan jabatan staf PPKB hingga tahun 2001. Dan pada tahun 2001 beliau dipromosikan menjadi Kepala Seksi PPKB hingga tahun 2002. Pada tahun 2003 beliau diangkat menjadi Kepala Cabang Utama PT. BPR Bank Surya Yudha. Pada tahun tersebut pula beliau dimutasikan ke Cabang Wanadadi dan menjabat sebagai Kepala Cabang hingga tahun 2006. Pada tahun 2006 beliau dimutasikan kembali menjadi Kepala Cabang Purwokerto. Dan pada tahun 2010 beliau diangkat menjadi Kepala Wilayah IV yang membawahi Cabang Purwokerto, Purbalingga dan Bobotsari. Namun karena adanya penataan ulang wilayah sehingga saat ini beliau menjabat menjadi Kepala Wilayah VI dengan membawahi Cabang Purwokerto dan Cilacap. Pada tanggal 16 November 2015, beliau dipercaya menjadi Kepala Wilayah V yang membawahi Cabang Purbalingga, Cabang Bobotsari dan Cabang Rembang. Pada Tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Wilayah VI yang membawahi Cabang Purbalingga, Cabang Rembang dan Cabang Bobotsari.', null, '1');
INSERT INTO `direksi` VALUES ('17', 'Gurita Nursetyawan, S.Hut.', 'Lahir pada tahun 1979 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1jurusan Kehutanan di INSTIPER Yogyakarta pada tahun 2003. Gurita Nursetyawan, S.Hut. bergabung di BPR Bank Surya Yudha mulai tanggal 10 Desember 2003 sebagai staff Marketing di Cabang Utama Kantor Pusat dan pada tahun 2007 dimutasikan ke Cabang Purwokerto. Meniti karir sebagai Kepala Kantor Kas Pabuaran sejak 2009 s.d 2012. Sebelum beliau menjabat Kepala Cabang Bobotsari seperti saat ini yang terhitung sejak 27 Agustus 2012, beliau menjabat sebagai Wakil Kepala Cabang Purwokerto selama 2 tahun dari Maret 2010 s.d Agustus 2012. Mulai bulan Maret 2014 beliau dimutasikan ke Cabang Cilacap sebagai Kepala Cabang. Pada tanggal 09 November 2015, beliau dipromosikan menjadi Kepala Wilayah III yang membawahi Cabang Karangkobar, Cabang Pagentan, Cabang Batur dan Cabang Dieng. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Wilayah VII, yang membawahi Cabang Purwokerto, dan Cabang Ajibarang.', null, '1');
INSERT INTO `direksi` VALUES ('18', 'Kondang, S.H', 'Lahir pada 1973 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Hukum di Universitas Wijaya Kusuma Purwokerto. Kondang, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 1995-2001 sebagai staf marketing Kantor Cabang Klampok. Beliau dipromosikan menjadi Kepala Seksi Kredit Cabang Klampok pada tahun 2001-2007. Beliau dipercaya menjadi Kepala Kantor Kas Susukan pada tahun 2007-2008. Pada 2008-2009, beliau dipercaya sebagai Wakil Kepala Cabang Purbalingga. Pada 2015, beliau dipercaya menjadi Kepala Cabang Banyumas. Dan pada tanggal 8 September 2017, beliau dipercaya menjadi Kepala Wilayah VIII hingga saat ini, yang membawahi Cabang Banyumas.', null, '1');
INSERT INTO `direksi` VALUES ('19', 'Eling Sucipto, S.E', 'Lahir pada tahun 1971 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Eling Sucipto, S.E. mulai bekerja tahun 1993 sebagaiAccount Officer(AO) di PT. BPR Surya Yudhakencana Banjarnegara. Kemudian perjalanan karir lainnya yaitu, Pada tahun 2004 menjabat sebagai Wakil Kepala Cabang Purbalingga, tahun 2016 sebagai Wakil Kepala Cabang Klampok, tahun 2008 sebagai Kepala Cabang Wanadadi, tahun 2013 sebagai Kepala Cabang Purbalingga dan tahun 2016 beliau dipercaya menjabat sebagai Kepala Wilayah VIII, yang membawahi Cabang Cilacap dan Cabang Kroya. Sementara pada tanggal 9 September 2017, Wilayah VIII berubah menjadi Wilayah IX dengan membawahi cabang yang sama dan masih dipimpin oleh Eling Sucipto, S.E hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('20', 'Prapto Oktarianto', 'Lahir pada tahun 1969 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir di SMUN I Banjarnegara tahun 1989. Beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada bulan Juli 1993 dan bekerja sebagai AO(Account Officer)di Kantor Pusat. Terhitung sejak tanggal 01 Februai 1995, beliau dimutasikan ke Cabang Wanadadi dan Pada tanggal 01 Februai 1996 diangkat sebagai Wakil Kepala Cabang Wanadadi. Namun tidak berselang lama, beliau dimutasikan ke Cabang Karangkobar sejak 01 Agustus 2001. Pada tanggal 02 Oktober 2006 diangkat sebagai Kepala Cabang Karangkobar. Sejak tanggal 26 Desember 2007 Prapto Oktarianto dipercaya manajemen sebagai Kepala Bagian SKAI. Pada akhir bulan Februari 2012 beliau resmi menjabat sebagai Kepala Divisi Audit, Pendidikan dan Litbang kemudian beliau menjabat sebagai Kepala Divisi P3L [Personalia & Pendidikan, Pembukuan, Penelitian & Pengembangan (Litbang)] terhitung sejak Juli 2012, kemudian beliau dipercaya sebagai Kepala Divisi PPS (Personalia, Pendiikan dan Security) kemudian mulai bulan Maret 2014 beliau dipercaya menjadi Kepala Divisi USO (Umum, Security & Operasional). Mulai 23 Februari 2015 beliau dipercaya menjadi Kepala Divisi Operasional, Dana & Security. Beliau menajabat sebagai Kepala Divisi ODD (Operasional dan Dana) sejak tanggal 14 November 2016. Saat ini beliau menjabat sebagai Kepala Divisi Kredit Kendaraan Bermotor dan Asuransi (KKA) sejak tanggal 15 Mei 2017.', null, '1');
INSERT INTO `direksi` VALUES ('21', 'Siti Fauziyah, S.E', 'Lahir pada tahun 1978 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir S1 Jurusan Ekonomi di Universitas Jendral Soedirman Purwokerto. Siti Fauziyah, S.E. bergabung dengan BPR Bank Surya Yudha pada tahun 1999 dan ditempatkan di Kantor Cabang Mandiraja sebagai Staf Marketing, tahun 2001 dimutasi ke Kantor Kas Pasar Besar Banjarnegara dengan jabatan yang sama, tahun 2001 dimutasi ke Bagian Operasional Kantor Pusat sebagai staf administrasi kredit, tahun 2001 dimutasi ke Bagian Internal Audit sebagai staf, tahun 2001 dimutasi ke Bagian Pembukuan, Sekretariat dan Personalia sebagai staf, tahun 2004 dimutasi ke bagian Internal Audit sebagai staf, 2005 sebagai sebagai Wakil Kepala Seksi Bagian Internal Audit, tahun 2006 sebagai sebagai Kepala Seksi di Bagian Internal Audit, tahun 2006 sebagai Koordinator Satuan Pengawas Intern, tahun 2007 sebagai Kepala Seksi Senior di Bagian Satuan Pengawas Intern, tahun 2010 sebagai sebagai Wakil Kepala Bagian di Bagian SKAI, tahun 2011 sebagai Wakabag di Bagian SKAI, tahun 2011 sebagai Kepala Bagian Teknologi Sistem Informasi (TSI) dan tahun 2011 dipercaya sebagai Kabag Pendidikan dan Litbang. Semenjak 22 Juli 2013 beliau dipercaya sebagai kepala bagian personalia dan pada bulan Maret 2014 beliau dipromosikan sebagai Kepala Divisi PPP (Personalia, Pembukuan & Pendidikan. Mulai 23 Februari 2015 beliau dipercaya menjabat sebagai Wakil Kepala Divisi IT. Pada tangal 10 Desmber 2015, beliau dipercaya sebagai Wakil Kepala Divisi Non Operasional. Saat ini beliau menjabat sebagai Kepala Divisi Non Operasional sejak tanggal 17 Desember 2016.', null, '1');
INSERT INTO `direksi` VALUES ('22', 'Agus Budi Santoso, S.E.', 'Lahir pada tahun 1964 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman Purwokerto. Agus Budi Santoso, S.E. bergabung dengan BPR Bank Surya Yudha sejak tahun 1992 sebagai staf marketing, kemudian di tahun 1993 sebagai Kepala Seksi Kas Pasar Besar. Pada tahun 1994 beliau dimutasi ke Kas Mandiraja. Pada tahun 1996 beliau dipromosikan ke Bagian PHBKIS. Dan pada tahun 1999 Beliau dipercaya menjabat sebagai Direktur dan pada tahun 2009 beliau dipromosikan menjadi Direktur Utama hingga Juli 2015. Mulai bulan Agustus 2015 beliau ditugaskan menjadi Kepala WIlayah I. Saat ini beliau dipercaya sebagai Kepala Divisi Operasional, Dana danTreasury(ODT) sejak 15 Mei 2017.', null, '1');
INSERT INTO `direksi` VALUES ('23', 'Anindita Alisia A., S.Kom', 'Lahir pada tahun 1992 di Makasar, memiliki latar belakang pendidikan terakhir S1 Jurusan Teknik Informatika di Institut Teknologi Sepuluh Nopember Surabaya. Beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada November 2014 dan menjabat sebagai Kepala BagianElectronic Banking and Product Development. Pada 2016, beliau dipercaya menjabat sebagai Kepala BagianMarketing Communication. Pada 2017, beliau menjabat sebagai Wakil Kepala DivisiMarketing Communication, Satuan Kerja Kepatuhan & Manajemen Resiko, dan Pendidikan.', null, '1');
INSERT INTO `direksi` VALUES ('24', 'Ashar Fathudi, S.E', 'Lahir pada tahun 1972 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Jendra Soedirman Purwokerto. Ahar Fathudi, S.E. bergabung dengan BPR Bank Surya Yudha pada Mei 1995 sebagai staf marketing Cabang Wanadadi. Pada tahun 2000, beliau dipercaya sebagai Wakil Kepala Cabang Utama sampai dengan tahun 2006, kemudian dimutasi ke Kantor Cabang Klampok sebagai Wakil Kepala Cabang sampai dengan tahun 2009. Pada Oktober 2009 dipromosikan sebagai Kepala Cabang Dieng. Pada 03 Maret 2017, beliau dipromosikan sebagai Kepala Cabang Utama sampai saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('25', 'Drs. Yudhi Saptana', 'Lahir pada tahun 1963 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 di Universitas Widya Mataram Yogyakarta. Drs. Yudhi Saptana mengawali karirnya di BPR Bank Surya Yudha sebagai tenaga marketing di wilayah Wanadadi. Pada tahun 1998 beliau menjabat sebagai Kepala Seksi Dana dan Kredit Kantor Pusat, dan dua tahun kemudian di tahun 2000 jabatannya meningkat menjadi Kepala Cabang Utama. Drs. Yudhi Saptana pada tahun 2002-2003 dimutasi ke BPR Surya Yudha Wonosobo sebagai Kepala Bagian Kredit, kemudian di bulan Oktober 2003 dimutasi kembali ke PT. BPR Surya Yudhakencana Banjarnegara untuk menjabat sebagai Kepala Cabang Utama. Pada 1 Juli 2016, beliau dimutasi ke Bagian PHBKIS sebagai Kepala Bagian. Saat ini Beliau menjabat sebagai Kepala Cabang Pasar Besar sejak tanggal 01 Maret 2017.', null, '1');
INSERT INTO `direksi` VALUES ('26', 'Ariyanto, S.E.', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Widyawiwaha Yogyakarta. Ariyanto, S.E. mulai bergabung dengan BPR Bank Surya Yudha pada Maret 2005 staf Bagian PHBKIS. Setelah itu dimutasi ke Cabang Singamerta. Karir beliau mulai meningkat pada tahun 2010 dengan menjabat sebagai Kepala Kas Madukara dan pada tahun 2011 beliau diangkat sebagai Wakil Kepala Cabang Singamerta. Pada bulan November 2014 beliau diangkat menjadi Kepala Cabang Mandiraja. Pada tanggal 13 Juli 2016, beliau dimutasi ke kantor Cabang Singamerta sebagai Kepala Cabang.', null, '1');
INSERT INTO `direksi` VALUES ('27', 'Thoufik Hidayat, S.H', 'Lahir pada tahun 1977 di Banjarnegaram memiliki latar belakang pendidikan S1 Hukum di Universitas Wijaya Kusuma Purwokerto lulus pada tahun 2016. Thoufik Hidayat, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 2001 di Kantor Cabang Mandiraja. Pada tahun 2003, dimutasi ke Kantor Cabang Purwonegoro. Pada tahun 2007 dipromosikan sebagai Wakil Kepala Seksi di Kantor Cabang Purbalingga. Dipromosikan menjadi Kepala Kas Tunggara pada tahun 2008. Dipromosikan menjadi Wakil Kepala Cabang Singamerta pada tahun 2010. Pada tahun 2011 dimutasi ke Kantor Cabang Batur sebagai Wakil Kepala Cabang. Pada tahun 2012 dimutasi sebagai Wakil Kepala Cabang di Kantor Cabang Klampok. Pada tahun 2015 dimuatsi ke Kantor Cabang Pasar Besar sebagai Wakil Kepala Cabang. Pada tahun 2016 dimutasi ke Kantor Cabang Mandiraja dan pada 19 Mei 2016 dimutasi ke Kantor Cabang Purwonegoro sebagai Wakil Kepala Cabang. Beliau dipromosikan sebagai Kepala Cabang Pasar Besar sejak 13 Juli 2016. Saat ini beliau dipercaya sebagai Kepala Cabang Purwonegoro sejak 01 Maret 2017.', null, '1');
INSERT INTO `direksi` VALUES ('28', 'Saryono, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi Universitas Jendral Soedirman. Saryono, S.E. mulai bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tahun 1997 dan dipercaya sebagai Staff Marketing Cabang Wanadadi. Terhitung sejak tanggal 21 Maret 2001, beliau diangkat sebagai Kasi Dana di Cabang Wanadadi. Setelah hampir 3 tahun menjabat sebagai Kasi Dana di Cabang Wanadadi, beliau dipromosikan sebagai Kasi Kredit di Cabang Wanadadi. Kemudian beliau diangkat sebagai Kasi Senior di Cabang Wanadadi dan menjabat kurang lebih 3 tahun. Setelah hampir 10 tahun, beliau diangkat sebagai Wakil Kepala Cabang di BPR Bank Surya Yudha Cabang Wanadadi. Pada tanggal 16 Maret 2009, beliau dipercaya sebagai Kepala Kantor Kas Pasar Besar Banjarnegara. Dan pada tanggal 07 September 2009 sampai 08 Februari 2010, beliau dipercaya sebagai Kepala Cabang Singamerta. Tanggal 08 Februari 2010 dimutasi ke Cabang Batur sebagai Kepala Cabang. Sejak 27 September 2010 Saryono, S.E. telah dipercaya kembali oleh manajemen sebagai Kepala Cabang Pasar Besar Banjarnegara. Pada tanggal 01 April 2015 beliau dimutasi ke Bagian PHBKIS sebagai Kepala Bagian. Pada tanggal 23 Oktober 2015, beliau dipercaya kembali sebagai Kepala Cabang Pasar Besar. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Cabang Klampok.', null, '1');
INSERT INTO `direksi` VALUES ('29', 'M. Makhmuri., S.E', 'Lahir pada tahun 1985 di Banjarnegara, memiliki latar belakang pendidikan S1 Fakultas Ekonomi di STIE Cendekia Karya Utama. M. Makhmuri, S.E. memulai karir di BPR Bank Surya Yudha sebagai AO (Account Officer). Pada tahun 2011 dipromosikan sebagai Wakil Kepala Kas Sokaraja Cabang Purwokerto. Beliau dimutasi ke Kantor Kas Pasar Wage Cabang Purwokerto sebagai Wakil Kepala Kas pada tahun 2012. Pada tahun 2014 M. Makhmuri, S.E. dipercaya sebagai Kepala Kas Banyumas pada Mei 2012. Pada 2015 beliau dipromiskan menjadi Wakil Kepala Cabang Banyumas. Pada tahun 2016 beliau dimutasi ke Kantor Cabang Purbalingga sebagai Wakil Kepala Cabang. Dan saat ini beliau menjabat sebagai Kepala Cabang Mandiraja sejak 02 November 2016.', null, '1');
INSERT INTO `direksi` VALUES ('30', 'Bondan Wahyu Nirboyo, S.E.', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir di STIE Widya Wiwaha Yogyakarta. Bondan Wahyu Nirboyo, S.E. bergabung dengan BPR Bank Surya Yudha sejak Mei 2006 sebagai Staf marketing Cabang Utama kemudian pada Juli 2010 beliau dipromosikan sebagai Kepala Kas Bawang dan pada tahun 2011 beliau dipromosikan menjadi Wakil Kepala Cabang Purwonegoro. Pada tanggal 7 Oktober 2013 beliau diberi kepercayaan untuk menjadi Kepala Cabang Mandiraja. Mulai bulan April 2014 beliau dimutasikan ke Cabang Bobotsari sebagai Kepala Cabang. Pada tahun 2015, beliau dipercaya sebagai Kepala Cabang Wanadadi sejak tanggal 26 Oktober 2015.', null, '1');
INSERT INTO `direksi` VALUES ('31', 'Sigit Dwi Sarwoko', 'Lahir pada tahun 1991 di Banjarnegara, memiliki latar belakang pendidikan terakhir SMK Cokroaminoto 2 Banjarnegara lulus pada tahun 2009. Sigit Dwi Sarwoko bergabung dengan BPR Bank Surya Yudha sejak November 2009 sebagai Staf Bagian Operasional danElectronic Data ProcessingKantor Pusat. Pada bulan Maret 2010 dimutasi sebagai Marketing di Kantor Cabang Utama. Pada bulan Februari 2012 dimutasi ke Kantor Cabang Wanadadi sebagaiAccount OfficerKantor Cabang Wanadadi. Pada bulan Maret 2014, beliau dipromosikan sebagai Wakil Kepala Seksi Kantor Cabang Wanadadi. Pada bulan Maret 2015, beliau dipercaya sebagai Wakil Kepala Kas Rakit Cabang Wanadadi. Pada bulan April 2015 dipromosikan sebagai Kepala Kas Punggelan Cabang Wanadadi. Pada bulan Juli 2016 dipromosikan sebagai Wakil Kepala Cabang Wanadadi. Pada bulan Maret 2017 dipercaya sebagai Ketua Kelompok Kerja Punggelan. Saat ini beliau menjabat sebagai Kepala Cabang Punggelan sejak 09 Juni 2017.', null, '1');
INSERT INTO `direksi` VALUES ('32', 'Zaenal Abidin, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas di STIE Widya Wiwaha Yogyakarta. Zaenal Abidin, S.E. masuk sebagai Staff Marketing di Cabang Mandiraja tahun 1999 dan pada tahun 2003 sebagai Wakil Kepala Seksi, tahun 2005 sebagai Kepala Seksi (Kasi), tahun 2009 sebagai Wakil Kepala Cabang Purwonegoro, kemudian menduduki jabatan sebagai Wakil Kepala Cabang Wanadadi dan dimutasikan menjadi Kepala Cabang Puwonegoro per tanggal 27 April 2015. Saat ini beliau dipercaya sebagai Kepala Cabang Karangkobar sejak tanggal 06 Maret 2017.', null, '1');
INSERT INTO `direksi` VALUES ('33', 'Noor Alam Rudwiansyah, S.E', 'Lahir di Banjarnegara 05 Desember 1982. Memiliki latar belakang pendidikan S1 Ekonomi di Universitas Jendral Soedirman lulus pada tahun 2006. Bergabung dengan BPR Bank Surya Yudha pada 03 April 2006 sebagai staf Marketing di Kantor Kas Pasar Besar. Pada Juli 2010 dipercaya menjadi Wakil Kepala Kas di Kantor Kas Rembang. Pada November 2010 dipromosikan menjadi Kepala Kas Karangmoncol. Bulan Maret 2013 dimutasi ke Kantor Kas Rembang sebagai Kepala Kas. Pada Bulan Maret 2014, dipromosikan menjadi Wakil Kepala Cabang Karangkobar. Pada bulan Mei 2016 dimutasi ke Kantor Cabang Wanadadi sebagai Wakil Kepala Cabang. Saat ini beliau dipercaya menjadi Kepala Cabang Kalibening sejak 13 Juli 2016.', null, '1');
INSERT INTO `direksi` VALUES ('34', 'Agung Sindhi Nugroho, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir di Universitas Jenderal Soedirman Purwokerto. Agung Sindhi Nugroho, S.E. pada tanggal 10 Desember 2003 bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara sebagai Staf Bagian Umum Kantor Pusat. Dan karirnya mulai meningkat pada tahun 2006 dengan diangkat menjadi Wakil Kepala Seksi Cabang Karangkobar. Dan pada tahun 2008 beliau dipromosikan menjadi Koordinator Kas Pagentan Cabang Karangkobar. Kemudian pada tahun 2009 – 2010 beliau menjabat menjadi Wakil Kepala Cabang Karangkobar. Dan pada tahun 2011 beliau dimutasikan ke Cabang Dieng dan menjabat sebagai Kepala Cabang. Dan beliau dimutasikan lagi pada akhir tahun 2011 menjadi Kepala Cabang Karangkobar. Mulai bulan April 2014 beliau dimutasikan ke Cabang Pagentan sebagai Kepala Cabang.', null, '1');
INSERT INTO `direksi` VALUES ('35', 'Agus Budiyanto, A.Md.', 'Lahir pada tahun 1975 di Banjarnegara, memliki latar belakang pendidikan terakhirD3 Sekolah Tinggi Pembangunan Masyarakat Desa Yogyakarta.Agus Budiyanto, A.Md. bergabung dengan BPR Bank Surya Yudha sejak Maret 2008 sebagai Staf marketing di Cabang Karangkobar. Pada bulan April 2009 Beliau dipromosikan menjadi Kepala Kas Pejawaran. Pada Januari 2011 Beliau diangkat menjadi Wakil Kepala Cabang Batur hingga Desember 2011, kemudian Beliau dimutasi ke Cabang Pekalongan dan pada bulan Februari 2012 beliau dimutasi ke Cabang Karangkobar. Pada bulan Juni 2015 beliau dipromosikan menjadi Kepala Cabang Kalibening. Mulai bulan September 2015 beliau dimutasi ke Cabang Batur sebagai Kepala Cabang.', null, '1');
INSERT INTO `direksi` VALUES ('36', 'Teguh Miswanto', 'Lahir pada tahun 1988 di Banjarnegara. Memiliki pendidikan terakhir SMK Pancha Bhakti lulus pada tahun 2007. Memulai karir di BPR Bank Surya Yudha bulan September 2011 di Kantor Kas Pagedongan Cabang Pasar Besar. Pada bulan April 2015, beliau dipromosikan sebagai Kepala Kas Pagedongan Cabang Pasar Besar. Pada bulan November 2016, beliau dipromosikan sebagai Wakil Kepala Cabang Singamerta. Saat ini beliau menjabat sebagai Kepala Cabang Dieng sejak 03 Mei 2017.', null, '1');
INSERT INTO `direksi` VALUES ('37', 'Darminto', 'Lahir pada tahun 1983 di Pekalongan, memiliki latar belakang pendidikan terakhir di SMU PGRI 2 Kajen. Darminto bergabung dengan BPR Bank Surya Yudha sebagai marketing di Kantor Kas Kalibening pada tahun 2004. Pada tahun 2006 beliau menjadi AO Kas Kalibening. Pada tahun 2009, beliau dipromosikan menjadi Wakil Kepala Seksi Yunior Kantor Cabang Kalibening dan pada tahun 2011 beliau dimutasi ke Kantor Cabang Pekalongan sebagai Wakil Kepala Seksi. Pada tahun 2013 beliau dipercaya menjadi Wakil Kepala Cabang Pekalongan. Pada 01 September 2015 beliau dipromosikan menjadi Kepala Cabang Kalibening. Pada tanggal 13 Juli 2016, beliau dipercaya menjadi Kepala Cabang Pekalongan.', null, '1');
INSERT INTO `direksi` VALUES ('38', 'Handi Ria Purnama Putra, S.E', 'Lahir pada tahun 1983 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE STIKUBANK Semarang. Handi Ria Purnama Putra, S.E. bergabung dengan BPR Bank Surya Yudha dimulai pada bulan Oktober 2007 sebagai staff di Kantor Cabang Purbalingga. Bulan Maret 2008 beliau menjadi marketing di Kantor Cabang Purbalingga. Pada bulan Maret 2010 beliau menjadi AO di Kantor Kas Kemangkon Cabang Purbalingga. Bulan Juli 2010 beliau diangkat menjadi Wakil Kepala Kantor Kas Kemangkon. Pada bulan September 2014 beliau menjadi Wakil Kepala Cabang Purbalingga. Dan pada Oktober 2015 beliau dipromosikan menjadi Kepala Cabang Bobotsari.', null, '1');
INSERT INTO `direksi` VALUES ('39', 'Dian Agung Sasongko, S.E', 'Lahir pada tahun 1983 di Purbalingga, memiliki latar belakang pendidikan terakhir S1 Ekonomi di Universitas Muhammadiyah Yogyakarta. Dian Agung Sasongko, S.E. memulai karir di BPR Bank Surya Yudha pada tahun 2009 sebagai marketing di Kantor Cabang Bobotsari. Pada tahun 2012 dipromosikan sebagai Wakil Kepala Seksi di Cabang Bobotsari. Pada tahun 2013 dimutasi ke Kantor Kas Karangreja sebagai Wakil Kepala Kas. Pada tahun 2014 dipercaya sebagai Kepala Kas Karangreja. Pada 2015 dipromiskan menjadi Wakil Kepala Cabang Bobotsari. Menjabat sebagai Kepala Cabang Mandiraja sejak 09 Agustus 2016. Saat ini beliau menjabat sebagai Kepala Cabang Karangreja sejak tanggal 20 Februari 2017.', null, '1');
INSERT INTO `direksi` VALUES ('40', 'Supriyadi, A.Md', 'Lahir pada tahun 1974 di Purbalingga, memiliki latar belakang pendidikan terakhir D3 Universitas Negeri Jendral Soedirman Purwokerto. Supriyadi, A.Md bergabung dengan BPR Bank Surya Yudha sejak Juli 2001, pada bulan September 2005 beliau dipromosikan menjadi Kepala Kas di Bobotsari, pada April 2009 beliau diangkat menjadi Wakil Kepala Cabang Bobotsari dan pada 16 Juni 2014 beliau dipromosikan menjadi Kepala Cabang Rembang.', null, '1');
INSERT INTO `direksi` VALUES ('41', 'Joko Prasetyo, S.E', 'Lahir pada tahun 1982 di Banjarnegara, memiliki latar belakang pendidikan S1 Ekonomi Universitas Wijaya Kusuma Purwokerto. Joko Prasetyo bergabung dengan BPR Bank Surya Yudha pada 02 November 2009 sebagai AO Kantor Cabang Pasar Besar. Pada tahun 2013, beliau dipromosikan menjadi Kepala Kas Pagedongan. Pada tahun 2014, beliau dipercaya menjadi Wakil Kepala Cabang Madiraja. Pada tahun 2015 hingga sekarang beliau dipercaya sebagai Kepala Cabang Dieng. Pada bulan Mei 2017 dimutasi ke Kantor Cabang Purbalingga sebagai Kepala Cabang.', null, '1');
INSERT INTO `direksi` VALUES ('42', 'Muhamad Nur', 'Lahir pada tahun 1977 di Jakarta, memiliki latar belakang pendidikan SMA Bina Kusuma Pesanggrahan Jakarta Selatan. Muhamad Nur bergabung dengan BPR Bank Surya Yudha pada 01 Juni 2002 sebagai staf Kantor Cabang Klampok. Pada Desember 2007 beliau dipromosikan menjadi Kepala Kas Karanglewas Cabang Purwokerto. Pada Januari 2011 dipercaya sebagai Wakil Kepala Cabang Klampok. Pada November 2014 beliau dimutasi ke Kantor Cabang Purbalingga sebagai Wakil Kepala Cabang. Pada Oktober 2015 dimutasi ke Kantor Cabang Purwokerto. Pada Juli 2016 beliau dimutasi ke Kantor Cabang Banyumas sebagai Wakil Kepala Cabang. Mulai 08 September 2017 beliau dipercaya sebagai Kepala Cabang Banyumas.', null, '1');
INSERT INTO `direksi` VALUES ('43', 'Wahyu Adi Wibowo, S.H', 'Lahir pada tahun 1983 di Purbalingga, memiliki latar belakang pendidikan S1 Hukum di Universitas Jendral Soedirman Purwokerto. Wahyu Adi Wibowo, S.H. bergabung dengan BPR Bank Surya Yudha pada tahun 2008 di Kantor PHBKIS sebagai marketing. Pada tahun 2012 dipromosikan menjadi Wakil Kepala Seksi PHBKIS. Pada tahun 2013 dipromosikan menjadi Kepala Kas Dukuhwaluh. Pada tahun 2015 dipromosikan menjadi Wakil Kepala Cabang Purwokerto. Pada tahun 2016 dimutasi ke Kantor Kelompok Kerja Kroya sebagai Kepala Kelompok Kerja. Pada tanggal 13 Juli 2016, dipromosikan menjadi Kepala Cabang Purwokerto.', null, '1');
INSERT INTO `direksi` VALUES ('44', 'Tri Budiyanto, S.P', 'Lahir pada tahun 1982 di Cilacap, memiliki latar belakang terakhir S1 Fakultas Peternakan di Universitas Jendral Soedirman Purwokerto. Tri Budiyanto, S.Pt. Bergabung dengan BPR Bank Surya Yudha sebagai marketing Cabang Purwokerto pada Mei 2006. Pada Maret 2010 dipromosikan menjadi Kepala Kas Pabuaran Cabang Purwokerto. Pada April 2013 dipercaya menjadi Wakil Kepala Cabang Purwokerto. Pada Oktober 2015 dipromosikan menjadi Ketua Kelompok Kerja Ajibarang. Pada Mei 2016 beliau menjabat sebagai Kepala Cabang Ajibarang.', null, '1');
INSERT INTO `direksi` VALUES ('45', 'Zaenal Arifin', 'Lahir pada tahun 1985 di Banjarnegara, latar belakang pendidikan terakhir SMK Cokroaminoto 2 Banjarnegara. Zaenal Arifin bergabung dengan BPR Bank Surya Yudha sejak Juni 2004 sebagai Account Officer Cabang Wanadadi kemudian pada April 2007 beliau dipromosikan sebagai Wakil Kepala Kas Punggelan dan pada Januari 2010 beliau dipromosikan menjadi Kepala Kas Punggelan. Pada tahun 2011 beliau diberi kepercayaan untuk menjadi Wakil Kepala Cabang Wanadadi dan pada Maret 2013 beliau menjabat sebagai Kepala Cabang Wanadadi. Tahun 2015 beliau dipercaya sebagai Kepala Cabang Cilacap per tanggal 02 November 2015.', null, '1');
INSERT INTO `direksi` VALUES ('46', 'Zaenal Faidzin, A.Md.', 'Lahir di Purbalingga, 05 Agustus 1982. Memiliki latar belakang pendidikan D3 Jurusan Manajemen Informatika di AMIK Veteran Purwokerto lulus pada tahun 2004. Bergabung dengan BPR Bank Surya Yudha sejak bulan Mei 2013 di Bagian PHBKIS. Pada bulan Februari 2015 sebagai Kepala Kas Rawalo Cabang Banyumas. Pada bulan November 2015 dipromosikan sebagai Wakil Kepala Cabang Cilacap. Saat ini beliau dipercaya sebagai Kepala Cabang Kroya sejak 14 November 2016.', null, '1');
INSERT INTO `direksi` VALUES ('47', 'Andi Pratiswo', 'Lahir pada tahun 1978 di Banjarnegara, memiliki latar belakang Pendidikan terakhir SMK Cokroaminoto Banjarnegara lulus pada tahun 1999. Bergabung dengan BPR Bank Surya Yudha mulai 13 Maret 200 sebagai marketing di Pasar Besar selama 2 tahun (2000 s/d 2002). Kemudian dimutasikan ke Bagian PHBKIS pada tahun 2002 kemudian dimutasikan ke Bagian Internal Audit dan pada tahun 2008 dipromosikan sebagai Wakil Kepala Bagian SKAI. Pada tanggal 13 Februari 2013 beliau diberi kepercayaan menjadi Kepala Bagian SKAI dan menjabat sampai dengan sekarang.', null, '1');
INSERT INTO `direksi` VALUES ('48', 'Wirasto, S.E', 'Lahir pada tahun 1978 di Sragen, memiliki latar belakang pendidikan terkahir S1 Fakultas Ekonomi di STIE LPI Makasar. Wirasto, S.E. bergabung dengan BPR Bank Surya Yudha sejak Mei 2007 sebagai staf Kredit Motor. Pada tahun 2011 beliau dipromosikan menjadi Wakil Kepala Seksi Bagian PHBKIS. Pada tahun 2013 dipromosikan sebagai Wakil Kepala Bagian PHBKIS. Pada tahun 2014, beliau dimutasi ke Bagian PHBKIS. Saat ini beliau manjabat sebagai Kepala Bagian SKAI Tim A sejak 14 April 2016.', null, '1');
INSERT INTO `direksi` VALUES ('49', 'Rendra Eka Wijaya, A.Md.', 'Lahir pada tahun 1973 di Jakarta, memiliki latar belakang pendidikan terkahir D3 di Akademi Keuangan dan Perbankan LPI Jakarta. Rendra Eka Wijaya, A.Md. bergabung dengan BPR. Bank Surya Yudha pada tahun 1997 dengan menjabat sebagai marketing. Sempat dimutasi dan dipromosikan di berbagai bagian, Rendra Eka Wijaya sempat menjabat sebagai Kepala Seksi Umum Cabang Pasar Besar, kepala seksi Internal Audit , Kepala Seksi Bagian Umum, Kepala Seksi Bagian PKB dan SKAI. Kemudian beliau dipromosikan menjadi Kepala Bagian Umum dan pada tanggal 21 Oktober 2013 beliau dimutasikan ke Bagian Pendidikan sebagai Kepala Bagian. Mulai September 2014 beliau dimutasi ke Bagian SKAI Tim B sebagai Kepala Bagian.', null, '1');
INSERT INTO `direksi` VALUES ('50', 'Susi Faiqoh, A.Md', 'Lahir pada tahun 1978 di Banjarnegara, memiliki latar belakang pendidikan terakhir D3Administrasi Niaga di Politeknik Negeri Semarang.Susi Faiqoh, A.Md. bergabung dengan BPR Bank Surya Yudha pada tahun 2000 sebagai marketing di Kantor Cabang Wanadadi. Pada tanggal 11 Februari 2002, dimutasi ke Bagian Operasional sebagai Kasir. Pada tanggal 24 Januari 2007,beliau dimutasi menjadi Wakil Kepala Seksi Bagian SPI (Satuan Pengawas Intern). Pada tanggal 27 April 2010, beliau dimutasi menjadi Wakil Kepala Seksi Yunior di Kantor Cabang Pasar Besar. Pada tanggal 16 Mei 2011, beliau dimutasi dari Cabang Pasar Besar ke Bagian Pembukuan Kantor Pusat. Beliau dimutasi dari Bagian Pembukuan ke Bagian Personalia per tanggal 22 September 2011 sebagai Wakil Kepala Seksi Yunior. Pada 23 Maret 2013, beliau dipromosikan menjadi Wakil Kepala Seksi Senior Bagian Personalia, dan menjadi Kepala Seksi Yunior Personalia pada tanggal 16 Oktober 2013. Beliau dipromosikan sebagai Wakil Kepala Bagian Personalia pada tanggal 17 Maret 2014. Saat ini beliau menjadi Kepala Bagian Personalia sejak 22 Juni 2015 hingga sekarang.', null, '1');
INSERT INTO `direksi` VALUES ('51', 'Eni Mulyati, S.E', 'Lahir pada tahun 1973 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE Widya Wiwaha Yogyakarta. Eni Mulyati, S.E. bergabung dengan BPR Bank Surya Yudha pada bulan Desember tahun 1996 sebagai petugas marketing di Cabang Wanadadi. Pada tahun 2009 beliau diangkat menjadi Wakil Kepala Seksi Cabang Wanadadi. Pada Tahun 2011 beliau dimutasi ke Bagian SKAI. dan Pada tahun 2014 beliau dirpomosikan menjadi Kepala Bagian Pembukuan Kantor Pusat. Mulai bulan Februari 2015 beliau dipercaya menjadi Kepala Bagian Pendidikan. Kemudian mulai bulan Juli 2015 beliau dimutasi kembali ke Bagian Pembukuan sebagai Kepala Bagian.', null, '1');
INSERT INTO `direksi` VALUES ('52', 'Aunur Rofiq', 'Lahir pada tahun 1975 di Surabaya, memiliki latar belakang pendidikan terakhir SMA PGRI 7 Surabaya. Aunur Rofiq bergabung dengan BPR Bank Surya Yudha sejak November 2004 sebagai Staf Bagian Umum kemudian tahun 2009 beliau dipromosikan sebagai Wakil Kepala Seksi dan pada tahun 2012 beliau dipromosikan menjadi Kepala Seksi. Pada bulan Maret 2013 beliau diberi kepercayaan untuk menjadi Wakil Kepala Bagian Umum dan mulai bulan Oktober 2013 beliau dipercaya sebagai Kepala Bagian Umum.', null, '1');
INSERT INTO `direksi` VALUES ('53', 'Roni Good Andiyasa, S.E', 'Lahir pada tahun 1976 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di Universitas Widya Wiwaha Yogyakarta. Rony Good Andiyasa, S.E. Bergabung dengan BPR Bank Surya Yudha pada tahun 1995 dan menjadi staf marketing di Kas Keliling Karangkobar. Beliau juga pernah menjabat sebagai staf EDP pada tahun 1998 – 2001 dan pada tahun 2001 beliau dipromosikan menjadi Kepala Seksi Bagian EDP hingga tahun 2007. Karirnya semakin menanjak pada tahun 2009 dengan diangkat menjadi Kepala Cabang Singomerto. Belum genap satu tahun beliau dimutasikan ke Kas Pasar Besar yang akhirnya pada tahun 2010 menjadi Cabang Pasar Besar Banjarnegara dan beliau menduduki sebagai Kepala Cabang. Pada bulan September 2010 beliau dimutasikan kembali ke Cabang Karangkobar dan menjabat sebagai Wakil Kepala Cabang dan ditahun 2011 beliau diangkat menjadi Kepala Cabang Pokja Cabang Pagentan. Pada bulan Oktober 2011 beliau dimutasikan ke Cabang Kalibening sebagai Kepala Cabang dan mulai 15 Juni 2015 beliau dimutasi ke Bagian EDP Kantor Pusat sebagai Kepala Bagian.', null, '1');
INSERT INTO `direksi` VALUES ('54', 'Sri Murwati, S.E', 'Lahir pada tahun 1980 di Banjarnegara, memiliki latar belakang pendidikan terakhir S1 Fakultas Ekonomi di STIE Widya Wiwaha Yogyakarta. Sri Murwati, S.E. bergabung dengan BPR Bank Surya Yudha pada bulan Juli tahun 2001 sebagai petugas marketing di Kas Pasar Besar. Pada tahun 2002 sampai dengan tahun 2003 menjabat sebagai marketing di Cabang Utama, pada tahun 2003 dimutasi ke Kas Singamerta sebagai petugas Pembukuan. Pada tahun 2005 dimutasi ke Bagian Operasional Kantor Pusat. Pada tahun 2011 beliau dipromosikan menjadi Wakil kepala Seksi Bagian Operasional dan pada tahun 2013 diangkat menjadi Kepala Seksi Bagian Operasional. Pada bulan Maret 2014 beliau diangkat menjadi kepala Bagian Operasional.', null, '1');
INSERT INTO `direksi` VALUES ('55', 'Jacoeb Rs', 'Lahir pada tahun 1949 di Banjarnegara, Jacoeb RS. bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada 02 Mei 2011 sebagai Kepala seksi Security Kantor Pusat. Pada tanggal 02 Agustus 2011, beliau dipromosikan menjadi Kepala Bagian Satpam Kantor Pusat hingga sekarang.', null, '1');
INSERT INTO `direksi` VALUES ('56', 'Teguh Santosa, A.Md.', 'Lahir pada tahun 1984 di Banjarnegara, memiliki latar belakang pendidikan terakhir D3 Ekonomi Akuntasi di Universitas Teknologi Yogyakarta. Teguh Santosa, A.Md. Mulai bergabung dengan BPR Bank Surya Yudha pada November 2010 sebagai staf marketing di Bagian PHBKIS. Pada bulan Juli 2011dipercaya menjadiAccount OfficerBagian PHBKIS. Pada tahun 2014 beliau dipromosikan menjadi Kepala Seksi Kredit Bagian PHBKIS. Pada September 2016 beliau kembali dipromosikan sebagai Wakil Kepala Bagian PHBKIS. Saat ini beliau menjabat Kepala Bagian PHBKIS sejak tanggal 01 Maret 207.', null, '1');
INSERT INTO `direksi` VALUES ('57', 'Agus Sudiyanto', 'Lahir pada tahun 1963 di Banjarnegara dengan kewarganegaraan Indonesia. Memiliki latar belakang bekerja di VINLUX IN’L CORP, Jakarta sebagai Computer Operator pada tahun 1988-1989, merangkap bekerja pada salah satu BPR di Sidoarjo Surabaya hingga tahun 1991. Beliau mulai bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara pada tahun 1991-2003 dan menduduki jabatan sebagai Kepala Divisi Kredit, pada tahun 2003-2010 Agus Sudiyanto menjabat sebagai Kepala Bagian Internal Audit di PT. BPR Surya Yudha Kertek – Wonosobo. Saat ini Agus Sudiyanto menjabat sebagai Pemegang Saham PT. BPR Surya Yudha Kertek – Wonosobo dan Direktur PT. Sarana Dewa Putra.', null, '1');
INSERT INTO `direksi` VALUES ('58', 'Saptono Setyartoyo', 'Lahir pada tahun 1968 di Brebes dengan kewarganegaraan Indonesia. Memiliki latar belakang pendidikan Fakultas Peternakan Universitas Diponegoro Semarang pada tahun 1993. Memulai karir pada tahun 1997-2010 bekerja di PT. BPR Surya Yudhakencana Banjarnegara dengan jabatan terakhir sebagai Kepala Wilayah. Setelah itu beliau bergabung dengan PT. BPR Surya Yudha pada Maret 2010 dan ditugaskan sebagai Kadiv Kredit sampai dengan 25 Mei 2010. Pada Juni 2010 beliau menjabat sebagai Direktur Utama PT. BPR Surya Yudha.', null, '1');
INSERT INTO `direksi` VALUES ('59', 'Amin Sutrisno', 'Lahir pada tahun 1971 di Wonosobo dengan kewarganegaraan Indonesia. Memiliki latarbelakang pendidikan STIE Kerjasama Yogyakarta pada tahun 1995. Pada tahun 1998- 2008 beliau bergabung dengan PT. BPR Surya Yudha dengan menjabat sebagai Wakil Kepala Cabang Temanggung, tahun 2008-2009 beliau bergabung dengan PT. BPR Surya Yudhakencana Banjarnegara dengan jabatan terakhir sebagai Kepala Cabang Singamerta, kemudian bergabung kembali dengan PT. BPR Surya Yudha menjabat sebagai Kepala Cabang Temanggung dan sejak tahun 2011 hingga bulan Agustus 2012 jabatan beliau sebagai Kepala Divisi Kredit. Saat ini beliau menjabat sebagai Direktur PT. BPR Surya Yudha sejak 23 Agustus 2012.', null, '1');
INSERT INTO `direksi` VALUES ('60', 'Sucipto', 'Sucipto bergabung dengan PT. BPR Surya Yudhakencana sejak tahun 1996 sebagai Staf Marketing dan tahun 1997 sebagai Account Officer. Pada tahun 1998 beliau dimutasikan ke PT. BPR Surya Yudha sebagai Account Officer. Tahun 2001 sampai dengan tahun 2003 beliau menjabat sebagai Kepala Seksi Kantor pelayanan Kas Pasar Wonosobo. Pada pertengahan tahun 2003 beliau dipromosikan sebagai Wakil Kepala bagian Kredit dan di tahun 2005 diangkat sebagai Kepala Bagian Kredit. Dengan adanya pembukaan Kantor Cabang Wonosobo yang beroperasional sejak tanggal 02 Agustus 2010, beliau dipercaya untuk menduduki jabatan sebagai kepala Cabang Wonosobo. Pada bulan Mei 2010 beliau diangkat sebagai Kepala Cabang Temanggung. Bulan Februari 2012 hingga 22 September 2012 beliau menjabat sebagai Wakil Kepala Divisi Kredit, selanjutnya beliau menjabat sebagai Kepala Divisi Kredit dan saat ini beliau dipercaya menjabat sebagai Kepala Wilayah I.', null, '1');
INSERT INTO `direksi` VALUES ('61', 'Swasta Dwi Martono', 'Beliau bergabung dengan PT. BPR Surya Yudha mulai tahun 2000 sebagai staf marketing, pada tahun 2005 beliau menjadi Account Officer di Kantor Pelayanan Kas Sapuran. Pada tahun 2006 beliau dipromosikan sebagai Kepala Seksi Kantor Pusat Kertek dan pada tahun 2010 beliau dipercaya menduduki Wakil Kepala Cabang Wonosobo serta selanjutnya beliau menjabat sebagai Kepala Cabang Wonosobo. Tahun 2014 hingga sekarang beliau dipercaya menjabat sebagai kepala Wilayah II yang membawahi Kantor Cabang Temanggung, Kantor Cabang Ngadirejo dan Kantor Cabang Parakan.', null, '1');
INSERT INTO `direksi` VALUES ('62', 'Atik Handayani', 'Lahir pada tahun 1976 di Wonosobo kewarganegaran Indonesia. Atik Handayani mengawali karirnya di PT. BPR Surya Yudha sejak tanggal 8 Maret 1999 sebagai staf Marketing, tahun 2000 dimutasikan ke Bagian Operasional sebagai staf Administrasi Kredit, tahun 2002 dimutasikan ke Bagian Accounting sebagai staf sampai dengan tahun 2005. Kemudian tahun 2006 beliau dipromosikan menjadi Wakasi PSPU sampai dengan tahun 2010, pada tahun 2011 dipromosikan menjadi Kasi Yr di Bagian PSPU. Pada bulan Februari 2012 beliau dipercaya managemen untuk menjabat sebagai Kepala Bagian PSPU (Personalia, Sekretariat, Pembukuan dan Umum) di Kantor Pusat. Dan mulai tanggal 25 April 2015 beliau menjabat sebagai Wakil Devisi Non Operasional. Pada tanggal 25 Mei 2016 beliau dipercaya managemen untuk menjabat sebagai Kepala Divisi Non Operasional.', null, '1');
INSERT INTO `direksi` VALUES ('63', 'Bagus Anom Warsito', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2003 sebagai staf marketing. Pada tahun 2006 beliau dipromosikan sebagai koordinator Pelayanan Kas Sapuran dan pada tahun 2008-2009 beliau menjabat sebagai Kepala Kantor Kas Sapuran. Pada pertengahan tahun 2009, beliau dipromosikan sebagai Wakil Kepala Cabang Sapuran dan tahun 2010 beliau dimutasikan sebagai Wakil Kepala Bagian Kredit di Kantor Pusat Kertek. Pada tahun 2011 beliau dimutasikan sebagai Wakil Kepala Bagian Internal Audit dan 2012-2014 dimutasikan sebagai Wakil Kepala Cabang Utama. Dengan adanya pembukaan Kantor Cabang Kaliwiro yang beropersional mulai bulan Juni 2016 beliau dipercaya untuk menduduki jabatan sebagai Kepala Cabang Kaliwiro. Pada bulan Januari 2017 beliau dimutasikan sebagai Kepala Cabang Utama hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('64', 'Haris Gunawan', 'Haris Gunawan bergabung dengan PT. BPR Surya Yudha sejak tahun 2000 sebagai staf Marketing dan tahun 2002 sebagai Account Officer. Pada tahun 2004 beliau diangkat menjadi Wakil kepala Seksi Kredit PT. BPR Surya Yudha. Tahun 2005-2006 beliau menjabat sebagai Kepala Kas Pasar Induk Wonosobo. Pada pertengahan tahun 2008 beliau dimutasikan ke Cabang Temanggung menduduki jabatan sebagai Wakil kepala Cabang Temanggung. April 2013 beliau dipromosikan sebagai Kepala Cabang Temanggung. Pada tahun 2014 beliau di mutasikan dan menjabat sebagai Kepala Cabang Wonosobo hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('65', 'Winarno', 'Tahun 2006 Winarno bergabung dengan PT. BPR Surya Yudha dan ditugaskan sebagai Staf Marketing Kantor Pusat Kertek. Pada tahun 2010 beliau diangkat menjadi Kepala Kas Kepil. Tahun 2012 beliau menjabat sebagai wakil kepala Cabang Utama. Sejak tahun 2014 beliau di promosikan menjadi kepala cabang Temanggung dan bulan Mei 2015 dipercaya menduduki Kepala Cabang Sapuran hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('66', 'Mara Yoki Firmansyah', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2008 sebagau staf EDP dan tahun 2010 dimutasikan ke Kantor Kas Pasar Wonosobo sebagai Account Officer. Pada bulan Juni 2011 menjabat sebagai Kepala Kas Pasar Wonosobo sampai dengan bulan April 2014 kemudian beliau dimutasikan ke Kantor Kas Selomerto dan menduduki Jabatan sebagai Kepala Kantor Kas Selomerto. Pada bulan Desember 2014 beliau dipromosikan sebagai Wakil Kepala Cabang Sapuran, tahun 2015 beliau dimutasikan ke Kantor Cabang Wonosobo sebagai Wakil Kepala Cabang hingga tahun 2016. Seiring dengan adanya pembukaan Kantor Cabang Selomerto yang beroperasional mulai tanggal 28 Desember 2016, beliau dipercaya menduduki Jabatan Kepala Cabang di Kantor Cabang Selomerto hingga saat ini', null, '1');
INSERT INTO `direksi` VALUES ('67', 'Aris Saifudin', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2003 sebagai staf marketing di Kantor Pelayanan Kas Pasar Wonosobo. Pada tahun 2006 beliau dimutasi menjadi staf marketing di Kantor Kas Kaliwiro. Pada tahun 2010 beliau dipromosikan menjadi Kepala Kantor Kas Wadaslintang dan pada tahun 2011 beliau dimutasi sebagai Kepala Kantor Kas Kaliwiro. Tahun 2012-2016 beliau dipromosikan sebagai Wakil kepala Cabang Wonosobo dan pada awal tahun 2017 beliau dipercaya menduduki Jabatan sebabai Kepala Cabang Kaliwiro hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('68', 'Bowo Wardiyanto', 'Mulai bergabung dengan PT. BPR Surya Yudha pada bulan Oktober 1999 dengan mengawali karir sebagai OB di Kantor Pusat Kertek. Dan pada tahun 2001 beliau di angkat sebagai staf untuk diperbantukan di bagian EDP hingga tahun 2002, kemudian pada tahun yang sama beliau di pindah ke bagian Marketing dan Account Officer di Cabang Utama Kertek hingga kurang lebih 3 tahun dan pada tahun 2005-2008 diangkat sebagai Koordinator cabang Utama. Pada tahun 2008-2009 beliau diangkat sebagai Wakil kepala Kantor Kas Sapuran, tahun 2009 beliau diangkat sebagai Kepala Kantor Kas Kepil dan pada bulan Agustus 2010 beliau kembali di pindah ke Sapuran menjabat sebagai Wakil Kepala cabang Sapuran. Pada bulan Mei 2015 beliau menjadi Kepala Cabang Temanggung hingga saat ini', null, '1');
INSERT INTO `direksi` VALUES ('69', 'Mukhammad Budiyanto', 'Mukhammad Budiyanto bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai staf Marketing dan tahun 2009 sebagai Account Officer. Pada tahun 2010 beliau diangkat menjadi kepala Kas Garung PT. BPR Surya Yudha. Tahun 2012-2014 beliau menjabat sebagai Wakil Kepala Cabang Wonosobo. Pada akhir tahun 2014 beliau dimutasikan ke Cabang Utama, beliau menduduki jabatan sebagai kepala Cabang Utama dan sekarang beliau menjabat sebagai Kepala Cabang Ngadirejo hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('70', 'Agus Kiswoto', 'Agus Kiswoto S.T memiliki latarbelakang pendidikan teknik perminyakan UPN Yogakarta. Beliau bergabung dengan PT. BPR Surya Yudha sejak bulan Mei 2007 sebagai staff marketing. Pada tahun 2010 dengan adanya pembukaan Kantor Pelayanan Kas Paponan beliau dipromosikan sebagai Kepala Seksi Kantor Pelayanan Kas Paponan. Pada awal tahun 2011 beliau dimutasikan sebagai Kepala Pelayanan Kas Parakan sampai dengan tahun 2013 dan dipromosikan sebagai Wakil Kepala Cabang Sapuran. Pada tahun 2014 beliau dimutasi ke Kantor Cabang Temanggung sebagai Wakil Kepala Cabang. Dengan adanya pembukaan Kantor Cabang Parakan yang mulai beroperasional mulai tanggal 14 Oktober 2016 beliau dipercaya menduduki jabatan sebagai Kepala Cabang Parakan hingga saat ini.', null, '1');
INSERT INTO `direksi` VALUES ('71', 'Adhias Gumala (', 'Pada tanggal 24 Desember 1997 Adhias Gumala bergabung dengan PT. BPR Surya Yudha dengan mengawali karirnya sebagai staf Marketing. Pada tahun 1999 beliau diangkat menjadi staf EDP, tahun 2004 diangkat menjadi Wakasi EDP dan tahun 2006 menjadi Kasi EDP. Pada tahun 2008 beliau dimutasikan ke Cabang Temanggung dan dipercaya untuk menjabat sebagai Wakil Kepala Cabang Temanggung. Pada tahun 2009 dengan adanya peningkatan status Kas Sapuran menjadi Cabang Sapuran pada bulan September 2009, beliau diangkat sebagai Kepala Cabang Sapuran. Mulai tanggal 22 September 2012 beliau menjabat sebagai Kepala Bagian Kepatuhan dan per tanggal 25 Oktober 2013 hingga saat ini beliau menjabat sebagai Kepala Bagian Internal Audit PT. BPR Surya Yudha.', null, '1');
INSERT INTO `direksi` VALUES ('72', 'Rabindra Akhmad Riza', 'Rabindra Akhmad Riza memiliki latarbelakang pendidikan di Universitas Islam Indonesia tahun 2002. Rabindra Ahmad Riza bergabung dengan PT. BPR Surya Yudha tahun 2013 dengan mengawali karirnya sebagai staf marketing di Kantor Pusat Kertek. Pada tahun 2008 beliau diangkat menjadi Wakil Kepala Seksi Kantor Kas Pasar Wonosobo, tahun 2009 beliau diangkat menjadi Kepala Kantor Kas Pasar Wonosobo kurang lebih 2 tahun dan Juni 2011 beliau diangkat sebagai Kepala Kas Selomerto. Beliau menjabat sebagai Wakil Kepala Cabang Wonosobo mulai November 2011 sampai dengan September 2012. Pada 22 September 2012 beliau dipromosikan menjadi Kepala Cabang Utama Kertek dan mulai 1 Januari 2015 beliau dimutasi sebagai Kepala Bagian Kepatuhan, kini beliau dipercaya menjabat sebagai Kepala Bagian Kepatuhan dan Manajemen Risiko.', null, '1');
INSERT INTO `direksi` VALUES ('73', 'Sri Rianasari Hermawati', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai marketing di bagian PHBKIS. Pada tahun 2008 diangkat sebagai Wakil Kepala Seksi di Kantor Cabang Temanggung dan pada bulan Januari 2011 dipromosikan sebagai Kepala Seksi pada cabang yang sama. Dengan dibukanya Kantor Cabang Ngadirejo, kemudian pada bulan Mei 2011 beliau dipromosikan sebagai Wakil Kepala Cabang Ngadirejo. Selanjutnya pada bulan Februari 2012 beliau dimutasikan ke Kantor Cabang Temanggung sebagai Wakil Kepala Cabang dan selanjutnya pada bulan Oktober 2012 beliau ditugaskan sebagai Wakil Kepala Bagian Kepatuhan Pengendalian Risiko di Kantor Pusat PT. BPR Surya Yudha. Bulan April 2014, beliau kemudian ditugaskan sebagau Wakil Kepala Cabang di Kantor Cabang Temangung dan sejak bulan Oktober 2015 hingga saat ini beliau dipercaya menjabat sebagai Kepala Bagian Dana.', null, '1');
INSERT INTO `direksi` VALUES ('74', 'Fitria Yulianingsih', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2002 sebagai Staf Marketing di Kantor Kas Pasar Wonosobo. Pada tahun 2009 dimutasi ke Kantor Kas Selomerto dan bulan Agustus 2010 dimutasi ke Kantor Cabang Wonosobo. Kemudian pada Bulan Oktober 2010 beliau dimutasi ke Kantor Pusat Kertek sebagai staf bagian Pembukuan. Diangkat menjadi Wakil Kepala Seksi Yunior pada bulan Februari 2012, tahun 2014-2015 menjabat sebagai Kepala Seksi Bagian Personalia, Pembukuan dan Pendidikan. Pada bulan April tahun 2015 dipromosikan sebagai Wakil Kepala Bagian Pembukuan dan April 2016 beliau dipercaya menduduki jabatan sebagai Kepala Bagian Pembukuan Kantor Pusat.', null, '1');
INSERT INTO `direksi` VALUES ('75', 'Nova Artanto Mahardani', 'Bergabung dengan PT. BPR Surya Yudha sejak tahun 2006 sebagai Back Office di Kantor Cabang Temanggung. Pada tahun 2012 diangkat sebagai Wakil Kepala Seksi Bagian PDE di Kantor Pusat Kertek dan pada tahun 2013 dipromosikan sebagai Kepala Seksi pada kantor yang sama. Pada April 2015 beliau dipromosikan sebagai Wakil Kepala Kepala Bagian PDE, April 2016 beliau dipercaya menjabat sebagai Kepala Bagian PDE. Dengan digabungnya bagian EDP dan EBD maka beliau dipercaya membawahi bagian tersebut hingga saat ini.', null, '1');

-- ----------------------------
-- Table structure for import_cabang
-- ----------------------------
DROP TABLE IF EXISTS `import_cabang`;
CREATE TABLE `import_cabang` (
  `ID_IMPORT` int(11) NOT NULL,
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
  KEY `fk_import_cabang_cabang` (`ID_CABANG`),
  CONSTRAINT `fk_import_cabang_cabang` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_cabang
-- ----------------------------

-- ----------------------------
-- Table structure for import_kas
-- ----------------------------
DROP TABLE IF EXISTS `import_kas`;
CREATE TABLE `import_kas` (
  `ID_IMPORT` int(11) NOT NULL,
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
  KEY `fk_import_kas_kas` (`ID_KAS`),
  CONSTRAINT `fk_import_kas_kas` FOREIGN KEY (`ID_KAS`) REFERENCES `kas` (`ID_KAS`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_kas
-- ----------------------------

-- ----------------------------
-- Table structure for import_kota
-- ----------------------------
DROP TABLE IF EXISTS `import_kota`;
CREATE TABLE `import_kota` (
  `ID_IMPORT` int(11) NOT NULL,
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
  `TIMESTAMP` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_IMPORT`),
  KEY `fk_import_kota_kota` (`ID_KOTA`),
  CONSTRAINT `fk_import_kota_kota` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of import_kota
-- ----------------------------

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
  KEY `fk_import_wilayah_wilayah` (`ID_WILAYAH`),
  CONSTRAINT `fk_import_wilayah_wilayah` FOREIGN KEY (`ID_WILAYAH`) REFERENCES `wilayah` (`ID_WILAYAH`) ON DELETE CASCADE ON UPDATE CASCADE
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
  PRIMARY KEY (`ID_JABATAN`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('1', 'Pemegang Saham', '1');
INSERT INTO `jabatan` VALUES ('2', 'Komisaris Utama', '1');
INSERT INTO `jabatan` VALUES ('3', 'Komisaris', '1');
INSERT INTO `jabatan` VALUES ('4', 'Komisaris Independen', '1');
INSERT INTO `jabatan` VALUES ('5', 'Direktur Utama', '1');
INSERT INTO `jabatan` VALUES ('6', 'Direktur Umum', '1');
INSERT INTO `jabatan` VALUES ('7', 'Direktur Kepatuhan', '1');
INSERT INTO `jabatan` VALUES ('8', 'Direktur Kredit', '1');
INSERT INTO `jabatan` VALUES ('9', 'Kepala Wilayah I', '1');
INSERT INTO `jabatan` VALUES ('10', 'Kepala Wilayah II', '1');
INSERT INTO `jabatan` VALUES ('11', 'Kepala Wilayah III', '1');
INSERT INTO `jabatan` VALUES ('12', 'Kepala Wilayah IV', '1');
INSERT INTO `jabatan` VALUES ('13', 'Kepala Wilayah V', '1');
INSERT INTO `jabatan` VALUES ('14', 'Kepala Wilayah VI', '1');
INSERT INTO `jabatan` VALUES ('15', 'Kepala Wilayah VII', '1');
INSERT INTO `jabatan` VALUES ('16', 'Kepala Wilayah VIII', '1');
INSERT INTO `jabatan` VALUES ('17', 'Kepala Wilayah IX', '1');
INSERT INTO `jabatan` VALUES ('18', 'epala Divisi Kredit Kendaraan Bermotor dan Asuransi (KDA)', '1');
INSERT INTO `jabatan` VALUES ('19', 'Kepala Divisi Non Operasional (DNO)', '1');
INSERT INTO `jabatan` VALUES ('20', 'Kepala Divisi Operasional, Dana dan Treasury (ODT)', '1');
INSERT INTO `jabatan` VALUES ('21', 'Wakil Kepala Divisi Marketing Communication, Satuan Kerja Kepatuhan & Manajemen Resiko, dan Pendidikan (MSP)', '1');
INSERT INTO `jabatan` VALUES ('22', 'Kepala Cabang Utama', '1');
INSERT INTO `jabatan` VALUES ('23', 'Kepala Cabang Pasar Besar', '1');
INSERT INTO `jabatan` VALUES ('24', 'Kepala Cabang Singamerta', '1');
INSERT INTO `jabatan` VALUES ('25', 'Kepala Cabang Purwonegoro', '1');
INSERT INTO `jabatan` VALUES ('26', 'Kepala Cabang Klampok', '1');
INSERT INTO `jabatan` VALUES ('27', 'Kepala Cabang Mandiraja', '1');
INSERT INTO `jabatan` VALUES ('28', 'Kepala Cabang Wanadadi', '1');
INSERT INTO `jabatan` VALUES ('29', 'Kepala Cabang Punggelan', '1');
INSERT INTO `jabatan` VALUES ('30', 'Kepala Cabang Karangkobar', '1');
INSERT INTO `jabatan` VALUES ('31', 'Kepala Cabang Kalibening', '1');
INSERT INTO `jabatan` VALUES ('32', 'Kepala Cabang Pagentan', '1');
INSERT INTO `jabatan` VALUES ('33', 'Kepala Cabang Batur', '1');
INSERT INTO `jabatan` VALUES ('34', 'Kepala Cabang Dieng', '1');
INSERT INTO `jabatan` VALUES ('35', 'Kepala Cabang Pekalongan', '1');
INSERT INTO `jabatan` VALUES ('36', 'Kepala Cabang Bobotsari', '1');
INSERT INTO `jabatan` VALUES ('37', 'Kepala Cabang Karangreja', '1');
INSERT INTO `jabatan` VALUES ('38', 'Kepala Cabang Rembang', '1');
INSERT INTO `jabatan` VALUES ('39', 'Kepala Cabang Purbalingga', '1');
INSERT INTO `jabatan` VALUES ('40', 'Kepala Cabang Banyumas', '1');
INSERT INTO `jabatan` VALUES ('41', 'Kepala Cabang Purwokerto', '1');
INSERT INTO `jabatan` VALUES ('42', 'Kepala Cabang Ajibarang', '1');
INSERT INTO `jabatan` VALUES ('43', 'Kepala Cabang Cilacap', '1');
INSERT INTO `jabatan` VALUES ('44', 'Kepala Cabang Kroya', '1');
INSERT INTO `jabatan` VALUES ('45', 'Kepala Bagian Satuan Kerja Audit Internal (SKAI)', '1');
INSERT INTO `jabatan` VALUES ('46', 'Kepala Bagian Satuan Kerja Audit Internal (SKAI) Tim A', '1');
INSERT INTO `jabatan` VALUES ('47', 'Kepala Bagian Satuan Kerja Audit Internal (SKAI) Tim B', '1');
INSERT INTO `jabatan` VALUES ('48', 'Kepala Bagian Personalia', '1');
INSERT INTO `jabatan` VALUES ('49', 'Kepala Bagian Pembukuan', '1');
INSERT INTO `jabatan` VALUES ('50', 'Kepala Bagian Umum', '1');
INSERT INTO `jabatan` VALUES ('51', 'Kepala Bagian Electronic Data Processing (EDP)', '1');
INSERT INTO `jabatan` VALUES ('52', 'Kepala Bagian Operasional', '1');
INSERT INTO `jabatan` VALUES ('53', 'Kepala Bagian Satpam', '1');
INSERT INTO `jabatan` VALUES ('54', 'Kepala Bagian Pengembangan Hubungan Bank, Kelompok, Instansi dan Sekolah (PHBKIS)', '1');
INSERT INTO `jabatan` VALUES ('55', 'Pemegang Saham', '1');
INSERT INTO `jabatan` VALUES ('56', 'Dewan Komisaris', '1');
INSERT INTO `jabatan` VALUES ('57', 'Direktur', '1');
INSERT INTO `jabatan` VALUES ('58', 'Kepala Divisi Non Operasional', '1');
INSERT INTO `jabatan` VALUES ('59', 'Kepala Cabang Utama', '1');
INSERT INTO `jabatan` VALUES ('60', 'Kepala Cabang Wonosobo', '1');
INSERT INTO `jabatan` VALUES ('61', 'Kepala Cabang Sapuran', '1');
INSERT INTO `jabatan` VALUES ('62', 'Kepala Cabang Selomerto', '1');
INSERT INTO `jabatan` VALUES ('63', 'Kepala Cabang Kaliwiro', '1');
INSERT INTO `jabatan` VALUES ('64', 'Kepala Cabang Temanggung', '1');
INSERT INTO `jabatan` VALUES ('65', 'Kepala Cabang Ngadirejo', '1');
INSERT INTO `jabatan` VALUES ('66', 'Kepala Cabang Parakan', '1');
INSERT INTO `jabatan` VALUES ('67', 'Kepala Bagian Internal Audit', '1');
INSERT INTO `jabatan` VALUES ('68', 'Kepala Bagian Kepatuhan dan Manajemen Resiko', '1');
INSERT INTO `jabatan` VALUES ('69', 'Kepala Bagian Dana', '1');
INSERT INTO `jabatan` VALUES ('70', 'Kepala Bagian EDP dan EBD', '1');

-- ----------------------------
-- Table structure for jabatan_dir
-- ----------------------------
DROP TABLE IF EXISTS `jabatan_dir`;
CREATE TABLE `jabatan_dir` (
  `ID_JABATAN` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `ID_DIREKSI` int(11) NOT NULL,
  PRIMARY KEY (`ID_JABATAN`,`ID_KOTA`,`ID_DIREKSI`),
  KEY `jabatan_dir_ID_DIREKSI_idx` (`ID_DIREKSI`),
  CONSTRAINT `jabatan_dir_ID_DIREKSI` FOREIGN KEY (`ID_DIREKSI`) REFERENCES `direksi` (`ID_DIREKSI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jabatan_dir_ID_JABATAN` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jabatan_dir
-- ----------------------------
INSERT INTO `jabatan_dir` VALUES ('1', '1', '1');
INSERT INTO `jabatan_dir` VALUES ('1', '1', '2');
INSERT INTO `jabatan_dir` VALUES ('1', '1', '3');
INSERT INTO `jabatan_dir` VALUES ('1', '1', '4');
INSERT INTO `jabatan_dir` VALUES ('2', '1', '1');
INSERT INTO `jabatan_dir` VALUES ('3', '1', '4');
INSERT INTO `jabatan_dir` VALUES ('3', '1', '5');
INSERT INTO `jabatan_dir` VALUES ('4', '1', '6');
INSERT INTO `jabatan_dir` VALUES ('5', '1', '7');
INSERT INTO `jabatan_dir` VALUES ('5', '2', '58');
INSERT INTO `jabatan_dir` VALUES ('6', '1', '8');
INSERT INTO `jabatan_dir` VALUES ('7', '1', '9');
INSERT INTO `jabatan_dir` VALUES ('8', '1', '10');
INSERT INTO `jabatan_dir` VALUES ('9', '1', '11');
INSERT INTO `jabatan_dir` VALUES ('9', '2', '60');
INSERT INTO `jabatan_dir` VALUES ('10', '1', '12');
INSERT INTO `jabatan_dir` VALUES ('10', '2', '61');
INSERT INTO `jabatan_dir` VALUES ('11', '1', '13');
INSERT INTO `jabatan_dir` VALUES ('12', '1', '14');
INSERT INTO `jabatan_dir` VALUES ('13', '1', '15');
INSERT INTO `jabatan_dir` VALUES ('14', '1', '16');
INSERT INTO `jabatan_dir` VALUES ('15', '1', '17');
INSERT INTO `jabatan_dir` VALUES ('16', '1', '18');
INSERT INTO `jabatan_dir` VALUES ('17', '1', '19');
INSERT INTO `jabatan_dir` VALUES ('18', '1', '20');
INSERT INTO `jabatan_dir` VALUES ('19', '1', '21');
INSERT INTO `jabatan_dir` VALUES ('20', '1', '22');
INSERT INTO `jabatan_dir` VALUES ('21', '1', '23');
INSERT INTO `jabatan_dir` VALUES ('22', '1', '24');
INSERT INTO `jabatan_dir` VALUES ('23', '1', '25');
INSERT INTO `jabatan_dir` VALUES ('24', '1', '26');
INSERT INTO `jabatan_dir` VALUES ('25', '1', '27');
INSERT INTO `jabatan_dir` VALUES ('26', '1', '28');
INSERT INTO `jabatan_dir` VALUES ('27', '1', '29');
INSERT INTO `jabatan_dir` VALUES ('28', '1', '30');
INSERT INTO `jabatan_dir` VALUES ('29', '1', '31');
INSERT INTO `jabatan_dir` VALUES ('30', '1', '32');
INSERT INTO `jabatan_dir` VALUES ('31', '1', '33');
INSERT INTO `jabatan_dir` VALUES ('32', '1', '34');
INSERT INTO `jabatan_dir` VALUES ('33', '1', '35');
INSERT INTO `jabatan_dir` VALUES ('34', '1', '36');
INSERT INTO `jabatan_dir` VALUES ('35', '1', '37');
INSERT INTO `jabatan_dir` VALUES ('36', '1', '38');
INSERT INTO `jabatan_dir` VALUES ('37', '1', '39');
INSERT INTO `jabatan_dir` VALUES ('38', '1', '40');
INSERT INTO `jabatan_dir` VALUES ('39', '1', '41');
INSERT INTO `jabatan_dir` VALUES ('40', '1', '42');
INSERT INTO `jabatan_dir` VALUES ('41', '1', '43');
INSERT INTO `jabatan_dir` VALUES ('42', '1', '44');
INSERT INTO `jabatan_dir` VALUES ('43', '1', '45');
INSERT INTO `jabatan_dir` VALUES ('44', '1', '46');
INSERT INTO `jabatan_dir` VALUES ('45', '1', '47');
INSERT INTO `jabatan_dir` VALUES ('46', '1', '48');
INSERT INTO `jabatan_dir` VALUES ('47', '1', '49');
INSERT INTO `jabatan_dir` VALUES ('48', '1', '50');
INSERT INTO `jabatan_dir` VALUES ('49', '1', '51');
INSERT INTO `jabatan_dir` VALUES ('49', '2', '74');
INSERT INTO `jabatan_dir` VALUES ('50', '1', '52');
INSERT INTO `jabatan_dir` VALUES ('51', '1', '53');
INSERT INTO `jabatan_dir` VALUES ('52', '1', '54');
INSERT INTO `jabatan_dir` VALUES ('53', '1', '55');
INSERT INTO `jabatan_dir` VALUES ('54', '1', '56');
INSERT INTO `jabatan_dir` VALUES ('55', '2', '1');
INSERT INTO `jabatan_dir` VALUES ('55', '2', '57');
INSERT INTO `jabatan_dir` VALUES ('56', '2', '1');
INSERT INTO `jabatan_dir` VALUES ('56', '2', '5');
INSERT INTO `jabatan_dir` VALUES ('57', '2', '59');
INSERT INTO `jabatan_dir` VALUES ('58', '2', '62');
INSERT INTO `jabatan_dir` VALUES ('59', '2', '63');
INSERT INTO `jabatan_dir` VALUES ('60', '2', '64');
INSERT INTO `jabatan_dir` VALUES ('61', '2', '65');
INSERT INTO `jabatan_dir` VALUES ('62', '2', '66');
INSERT INTO `jabatan_dir` VALUES ('63', '2', '67');
INSERT INTO `jabatan_dir` VALUES ('64', '2', '68');
INSERT INTO `jabatan_dir` VALUES ('65', '2', '69');
INSERT INTO `jabatan_dir` VALUES ('66', '2', '70');
INSERT INTO `jabatan_dir` VALUES ('67', '2', '71');
INSERT INTO `jabatan_dir` VALUES ('68', '2', '72');
INSERT INTO `jabatan_dir` VALUES ('69', '2', '73');
INSERT INTO `jabatan_dir` VALUES ('70', '2', '75');

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
  KEY `kas_ID_CABANG_idx` (`ID_CABANG`),
  CONSTRAINT `kas_ID_CABANG` FOREIGN KEY (`ID_CABANG`) REFERENCES `cabang` (`ID_CABANG`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `L` varchar(45) DEFAULT NULL,
  `P` varchar(45) DEFAULT NULL,
  `MODAL_INTI` varchar(45) DEFAULT NULL,
  `MODAL_PELENGKAP` varchar(45) DEFAULT NULL,
  `TOTAL_MODAL` varchar(45) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_KOTA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES ('1', 'Banjarnegara', 'struktur_organisasi.jpg', '337', '695', '0', '0', '0', '1');
INSERT INTO `kota` VALUES ('2', 'Kertek', 'strukt.jpg', '115', '195', '53489266769', '1988418995', '55477685764', '1');

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
  PRIMARY KEY (`ID_LINKAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of linkage
-- ----------------------------
INSERT INTO `linkage` VALUES ('1', 'Bank Mandiri', '1', null, 'mandiri_logo.png', '1');
INSERT INTO `linkage` VALUES ('2', 'CIMB Niaga', '1', null, 'CIMB_Niaga_logo.png', '1');
INSERT INTO `linkage` VALUES ('3', 'BJB', '1', null, 'Logo-Bank-BJB-png96dpi.png', '1');
INSERT INTO `linkage` VALUES ('4', 'BNI', '1', null, 'Logo_Bank_BNI_PNG.png', '1');
INSERT INTO `linkage` VALUES ('5', 'Bank Jateng', '1', null, 'Logo-Bank-Jateng-png96dpi.png', '1');
INSERT INTO `linkage` VALUES ('6', 'LPDB', '0', null, 'Ct57bBFVMAAIYvg.png', '1');
INSERT INTO `linkage` VALUES ('7', 'Bank Danamon', '1', null, 'Logo_Bank_Danamon.png', '1');

-- ----------------------------
-- Table structure for linkage_kota
-- ----------------------------
DROP TABLE IF EXISTS `linkage_kota`;
CREATE TABLE `linkage_kota` (
  `ID_LINKAGE` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `NOMINAL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_LINKAGE`,`ID_KOTA`),
  KEY `linkage_kota_ID_KOTA_idx` (`ID_KOTA`),
  CONSTRAINT `linkage_kota_ID_KOTA` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `linkage_kota_ID_LINKAGE` FOREIGN KEY (`ID_LINKAGE`) REFERENCES `linkage` (`ID_LINKAGE`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
-- Table structure for pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT,
  `PENDIDIKAN` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PENDIDIKAN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pendidikan
-- ----------------------------
INSERT INTO `pendidikan` VALUES ('1', 'SD-SMP', '1');
INSERT INTO `pendidikan` VALUES ('2', 'SMA/SMK', '1');
INSERT INTO `pendidikan` VALUES ('3', 'D3', '1');
INSERT INTO `pendidikan` VALUES ('4', 'S1', '1');
INSERT INTO `pendidikan` VALUES ('5', 'S2', '1');

-- ----------------------------
-- Table structure for pendidikan_kota
-- ----------------------------
DROP TABLE IF EXISTS `pendidikan_kota`;
CREATE TABLE `pendidikan_kota` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PENDIDIKAN`,`ID_KOTA`),
  KEY `pendidikan_kota_ID_KOTA_idx` (`ID_KOTA`),
  CONSTRAINT `pendidikan_kota_ID_KOTA` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pendidikan_kota_ID_PENDIDIKAN` FOREIGN KEY (`ID_PENDIDIKAN`) REFERENCES `pendidikan` (`ID_PENDIDIKAN`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_LENGKAP` varchar(100) DEFAULT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `ROLE` enum('1','2') DEFAULT NULL,
  `KEY` varchar(100) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Admin Ganteng', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '68fc61f6fd79afe9607a3ec58f2e6ad1', '1');

-- ----------------------------
-- Table structure for wilayah
-- ----------------------------
DROP TABLE IF EXISTS `wilayah`;
CREATE TABLE `wilayah` (
  `ID_WILAYAH` int(11) NOT NULL AUTO_INCREMENT,
  `ID_KOTA` int(11) DEFAULT NULL,
  `WILAYAH` varchar(200) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_WILAYAH`),
  KEY `wilayah_ID_KOTA_idx` (`ID_KOTA`),
  CONSTRAINT `wilayah_ID_KOTA` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wilayah
-- ----------------------------
INSERT INTO `wilayah` VALUES ('1', '1', 'Wilayah I', '1');
INSERT INTO `wilayah` VALUES ('2', '1', 'Wilayah II', '1');
INSERT INTO `wilayah` VALUES ('3', '1', 'Wilayah III', '1');
INSERT INTO `wilayah` VALUES ('4', '1', 'Wilayah IV', '1');
INSERT INTO `wilayah` VALUES ('5', '1', 'Wilayah V', '1');
INSERT INTO `wilayah` VALUES ('6', '1', 'Wilayah VI', '1');
INSERT INTO `wilayah` VALUES ('7', '1', 'Wilayah VII', '1');
INSERT INTO `wilayah` VALUES ('8', '1', 'Wilayah VIII', '1');
INSERT INTO `wilayah` VALUES ('9', '1', 'Wilayah IX', '1');
INSERT INTO `wilayah` VALUES ('10', '2', 'Wilayah I', '1');
INSERT INTO `wilayah` VALUES ('11', '2', 'Wilayah II', '1');
SET FOREIGN_KEY_CHECKS=1;
