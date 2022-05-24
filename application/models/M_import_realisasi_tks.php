<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_realisasi_tks extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'import_realisasi_tks';
	}

	public function empty_table($id_kota)
	{
		return $this->db->query("DELETE from import_realisasi_tks WHERE ID_KOTA='$id_kota';");
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("
			TRUNCATE import_realisasi_tks");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `import_realisasi_tks` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");
		
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
		$query = "INSERT INTO import_kota (ID_KOTA, `GROUP`, BRANCH, BULAN, TAHUN, TABUNGAN_REALISASI, KREDIT_REALISASI, DEPOSITO_REALISASI, ASET_REALISASI, BIAYA_REALISASI, PENDAPATAN_REALISASI, LABA_REALISASI, CAR_REALISASI, ROA_REALISASI, ROE_REALISASI, BOPO_REALISASI, CR_REALISASI, LDR_REALISASI, KAP_REALISASI, NPL_GROSS_REALISASI, NPL_NET_REALISASI, NIM_REALISASI)
		SELECT * FROM (
		SELECT DISTINCT
		ID_KOTA,
		REPLACE (
		REPLACE (`GROUP`, CHAR(13), ''),
		CHAR (10),
		''
		) AS `GROUP`,
		BRANCH,
		BULAN,
		TAHUN,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '200'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS TABUNGAN_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '100'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS KREDIT_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '220'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS DEPOSITO_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '600'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS ASET_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '410'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS BIAYA_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '310'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS PENDAPATAN_REALISASI,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '510'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS LABA_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '601'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS CAR_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '602'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS ROA_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '603'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS ROE_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '604'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS BOPO_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '605'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS CR_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '606'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS LDR_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '607'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS KAP_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '608'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS NPL_GROSS_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '609'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS NPL_NET_REALISASI,
		COALESCE((
		SELECT
		(REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '%', ''), ',', '.'),')',''),'(','-') / 100)
		FROM
		import_realisasi_tks irks1
		WHERE
		irks1.TYPE = '610'
		AND irks1.`GROUP` = a.`GROUP`
		AND irks1.BRANCH = a.BRANCH
		AND irks1.TAHUN = a.TAHUN
		AND irks1.BULAN = a.BULAN
		), 0) AS NIM_REALISASI
		FROM
		import_realisasi_tks a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		) AS table_1
		ON DUPLICATE KEY UPDATE
		TABUNGAN_REALISASI=table_1.TABUNGAN_REALISASI,
		KREDIT_REALISASI=table_1.KREDIT_REALISASI,
		DEPOSITO_REALISASI=table_1.DEPOSITO_REALISASI,
		ASET_REALISASI=table_1.ASET_REALISASI,
		BIAYA_REALISASI=table_1.BIAYA_REALISASI, 
		PENDAPATAN_REALISASI=table_1.PENDAPATAN_REALISASI, 
		LABA_REALISASI=table_1.LABA_REALISASI, 
		CAR_REALISASI=table_1.CAR_REALISASI, 
		ROA_REALISASI=table_1.ROA_REALISASI, 
		ROE_REALISASI=table_1.ROE_REALISASI, 
		BOPO_REALISASI=table_1.BOPO_REALISASI, 
		CR_REALISASI=table_1.CR_REALISASI, 
		LDR_REALISASI=table_1.LDR_REALISASI, 
		KAP_REALISASI=table_1.KAP_REALISASI, 
		NPL_GROSS_REALISASI=table_1.NPL_GROSS_REALISASI, 
		NPL_NET_REALISASI=table_1.NPL_NET_REALISASI,
		NIM_REALISASI=table_1.NIM_REALISASI";

		$this->db->query($query);
	}
}

/* End of file M_import_realisasi_tks.php */
/* Location: ./application/models/M_import_realisasi_tks.php */