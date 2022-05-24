<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_target_tks extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'import_target_tks';
	}

	public function empty_table($id_kota)
	{
		return $this->db->query("DELETE from import_target_tks WHERE ID_KOTA='$id_kota';");
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("
			TRUNCATE import_target_tks");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `import_target_tks` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return 'ERROR';
		}
		else
		{
			$this->db->trans_commit();
			return 'OK';
		}
	}

	public function move_data()
	{
		$query = "INSERT INTO import_kota (ID_KOTA, `GROUP`, BRANCH, BULAN, TAHUN, ASET_TARGET, BIAYA_TARGET, PENDAPATAN_TARGET, LABA_TARGET, CAR_TARGET, ROA_TARGET, ROE_TARGET, BOPO_TARGET, CR_TARGET, LDR_TARGET, KAP_TARGET, NPL_GROSS_TARGET, NPL_NET_TARGET)
		SELECT * FROM (SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'1' AS BULAN,
		TAHUN,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'2' AS BULAN,
		TAHUN,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'3' AS BULAN,
		TAHUN,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'4' AS BULAN,
		TAHUN,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'5' AS BULAN,
		TAHUN,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'6' AS BULAN,
		TAHUN,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'7' AS BULAN,
		TAHUN,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'8' AS BULAN,
		TAHUN,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'9' AS BULAN,
		TAHUN,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'10' AS BULAN,
		TAHUN,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'11' AS BULAN,
		TAHUN,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'12' AS BULAN,
		TAHUN,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL) AS table_1
		ON DUPLICATE KEY UPDATE
		ASET_TARGET=table_1.ASET_TARGET, 
		BIAYA_TARGET=table_1.BIAYA_TARGET, 
		PENDAPATAN_TARGET=table_1.PENDAPATAN_TARGET, 
		LABA_TARGET=table_1.LABA_TARGET, 
		CAR_TARGET=table_1.CAR_TARGET, 
		ROA_TARGET=table_1.ROA_TARGET, 
		ROE_TARGET=table_1.ROE_TARGET, 
		BOPO_TARGET=table_1.BOPO_TARGET, 
		CR_TARGET=table_1.CR_TARGET, 
		LDR_TARGET=table_1.LDR_TARGET, 
		KAP_TARGET=table_1.KAP_TARGET, 
		NPL_GROSS_TARGET=table_1.NPL_GROSS_TARGET, 
		NPL_NET_TARGET=table_1.NPL_NET_TARGET";
		
		$this->db->query($query);
	}

	public function get_data($id_kota, $tahun)
	{
		$query = "SELECT * FROM (SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'1' AS BULAN,
		TAHUN,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'2' AS BULAN,
		TAHUN,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'3' AS BULAN,
		TAHUN,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'4' AS BULAN,
		TAHUN,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'5' AS BULAN,
		TAHUN,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'6' AS BULAN,
		TAHUN,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'7' AS BULAN,
		TAHUN,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'8' AS BULAN,
		TAHUN,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'9' AS BULAN,
		TAHUN,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'10' AS BULAN,
		TAHUN,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'11' AS BULAN,
		TAHUN,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		UNION ALL
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		'12' AS BULAN,
		TAHUN,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ASET'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ASET_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BIAYA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BIAYA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'PENDAPATAN'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS PENDAPATAN_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LABA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LABA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CAR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CAR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROA'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROA_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'ROE'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS ROE_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'BOPO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS BOPO_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'CASH RATIO'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS CR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'LDR'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS LDR_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'KAP'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS KAP_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Gross'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_GROSS_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tks itks1
		WHERE
		itks1.TYPE = 'NPL Net'
		AND itks1.`GROUP` = a.`GROUP`
		AND itks1.BRANCH = a.BRANCH
		) AS NPL_NET_TARGET
		FROM
		import_target_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL) AS table_a
		WHERE ID_KOTA='$id_kota' AND TAHUN='$tahun';";
		
		$this->db->query($query)->result_array();
	}

}

/* End of file M_import_target_tks.php */
/* Location: ./application/models/M_import_target_tks.php */