<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_realisasi_tdk extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'import_realisasi_tdk';
	}

	public function empty_table($id_kota)
	{
		return $this->db->query("DELETE from import_realisasi_tdk WHERE ID_KOTA='$id_kota';");
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("
			TRUNCATE import_realisasi_tdk");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `import_realisasi_tdk` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");
		
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
		$query = "INSERT INTO import_kota (ID_KOTA, `GROUP`, BRANCH, BULAN, TAHUN, KRED_UMUM, KRED_PEG, KRED_MOTOR, KRED_URK, KRED_MOBIL, TAB_SURYA, ATM_KHUSUS, TAB_PENSIUN, TAS, TAB_KU, ATM_SURYA, TAB_UMROH, THT_UMUM, TAB_SIMPEL, TAB_PIKNIK, DEP_1, DEP_3, DEP_6, DEP_12, KRED_MOTOR_BT)
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
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '130'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_UMUM,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '131'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_PEG,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '132'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_MOTOR,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '135'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_URK,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '141'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_MOBIL,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '210'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_SURYA,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '211'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS ATM_KHUSUS,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '212'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_PENSIUN,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '213'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAS,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '214'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_KU,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '215'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS ATM_SURYA,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '216'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_UMROH,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '217'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS THT_UMUM,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '218'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_SIMPEL,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '231'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS TAB_PIKNIK,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '221'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS DEP_1,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '222'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS DEP_3,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '223'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS DEP_6,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '224'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS DEP_12,
		COALESCE((
		SELECT
		REPLACE(REPLACE(REPLACE(REPLACE(AMOUNT, '.', ''), ',', '.'),')',''),'(','-')
		FROM
		import_realisasi_tdk irtdk1
		WHERE
		irtdk1.TYPE = '134'
		AND irtdk1.`GROUP` = a.`GROUP`
		AND irtdk1.BRANCH = a.BRANCH
		AND irtdk1.TAHUN = a.TAHUN
		AND irtdk1.BULAN = a.BULAN
		LIMIT 1
		), 0) AS KRED_MOTOR_BT
		FROM
		import_realisasi_tdk a
		WHERE
		`GROUP` IS NOT NULL
		AND BRANCH IS NOT NULL
		) AS table_1
		ON DUPLICATE KEY UPDATE
		KRED_UMUM=table_1.KRED_UMUM, 
		KRED_PEG=table_1.KRED_PEG, 
		KRED_MOTOR=table_1.KRED_MOTOR, 
		KRED_URK=table_1.KRED_URK, 
		KRED_MOBIL=table_1.KRED_MOBIL, 
		TAB_SURYA=table_1.TAB_SURYA, 
		ATM_KHUSUS=table_1.ATM_KHUSUS, 
		TAB_PENSIUN=table_1.TAB_PENSIUN, 
		TAS=table_1.TAS, 
		TAB_KU=table_1.TAB_KU, 
		ATM_SURYA=table_1.ATM_SURYA, 
		TAB_UMROH=table_1.TAB_UMROH, 
		THT_UMUM=table_1.THT_UMUM, 
		TAB_SIMPEL=table_1.TAB_SIMPEL, 
		TAB_PIKNIK=table_1.TAB_PIKNIK, 
		DEP_1=table_1.DEP_1, 
		DEP_3=table_1.DEP_3, 
		DEP_6=table_1.DEP_6, 
		DEP_12=table_1.DEP_12, 
		KRED_MOTOR_BT=table_1.KRED_MOTOR_BT";

		return $this->db->query($query);
	}
}

/* End of file M_import_realisasi_tdk.php */
/* Location: ./application/models/M_import_realisasi_tdk.php */