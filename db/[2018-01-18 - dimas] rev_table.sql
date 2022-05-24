ALTER TABLE `detail_linkage`
ADD COLUMN `ID_KOTA`  int NULL AFTER `ID_LINKAGE`;

ALTER TABLE `detail_linkage` ADD FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`);

ALTER TABLE `award`
MODIFY COLUMN `ID_AWARD`  tinyint(11) NOT NULL AUTO_INCREMENT FIRST ,
ADD COLUMN `ID_KOTA`  int NULL AFTER `ID_AWARD`;

ALTER TABLE `award` ADD FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`);

ALTER TABLE `linkage`
ADD COLUMN `ID_KOTA`  int NULL AFTER `ID_LINKAGE`;

ALTER TABLE `linkage` ADD FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`);

ALTER TABLE `history_import`
ADD COLUMN `DELETED`  int NULL DEFAULT 0 AFTER `WAKTU`;

ALTER TABLE `sub_produk`
MODIFY COLUMN `SUKU_BUNGA`  varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL AFTER `NAMA_SUB`,
MODIFY COLUMN `KETENTUAN`  text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL AFTER `SUKU_BUNGA`;

ALTER TABLE `import_kota`
ADD COLUMN `KRED_MOTOR_BT`  varchar(255) NULL AFTER `KRED_MOTOR`;

ALTER TABLE `sub_produk`
ADD COLUMN `FILE_SUKU_BUNGA`  varchar(255) NULL AFTER `KETENTUAN`;

