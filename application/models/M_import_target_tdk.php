<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_target_tdk extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'import_target_tdk';
	}

	public function empty_table($id_kota)
	{
		return $this->db->query("DELETE from import_target_tdk WHERE ID_KOTA='$id_kota';");
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("
			TRUNCATE import_target_tdk");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `import_target_tdk` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");
		
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
		$query = "INSERT INTO import_kota (ID_KOTA, `GROUP`, BRANCH, BULAN, TAHUN, KREDIT_TARGET, TABUNGAN_TARGET, DEPOSITO_TARGET)
		SELECT
		*
		FROM
		(
		SELECT DISTINCT
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		) AS table_1
		ON DUPLICATE KEY UPDATE
		KREDIT_TARGET=table_1.KREDIT_TARGET, 
		TABUNGAN_TARGET=table_1.TABUNGAN_TARGET, 
		DEPOSITO_TARGET=table_1.DEPOSITO_TARGET";

		return $this->db->query($query);
	}

	public function get_data()
	{
		$query = "SELECT
		*
		FROM
		(
		SELECT DISTINCT
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		) AS table_1";

		return $this->db->query($query)->result_array();
	}

	public function get_data_join()
	{
		$query = "SELECT
		*
		FROM
		(
		SELECT DISTINCT
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JAN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		FEB
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MAR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		APR
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		MEI
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUN
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		JUL
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		AGU
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		SEP
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		OKT
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		NOV
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
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
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '100'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS KREDIT_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '200'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS TABUNGAN_TARGET,
		(
		SELECT
		DES
		FROM
		import_target_tdk itdk1
		WHERE
		itdk1.TYPE = '220'
		AND itdk1.`GROUP` = a.`GROUP`
		AND itdk1.BRANCH = a.BRANCH
		) AS DEPOSITO_TARGET
		FROM
		import_target_tdk a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		) AS table_1
		JOIN import_kota ikt ON (
		ikt.`GROUP` = table_1.`GROUP`
		AND ikt.BRANCH = table_1.BRANCH
		AND ikt.ID_KOTA = table_1.ID_KOTA
		AND ikt.TAHUN = table_1.TAHUN
		AND ikt.BULAN = table_1.BULAN
		)";

		return $this->db->query($query)->result_array();
	}
}

/* End of file M_import_target_tdk.php */
/* Location: ./application/models/M_import_target_tdk.php */