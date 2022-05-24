<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'transaksi';
		$this->primary_key  = 'ID_TRANSAKSI';
		$this->order_by     = 'ID_TRANSAKSI DESC';
	}

	public function empty_table()
	{
		return $this->db->query("DELETE from transaksi");
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("
			TRUNCATE transaksi");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `transaksi` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");
		
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

	public function get_realisasi($group=FALSE)
	{
		return $this->db->query("SELECT
			brc.ID_BRANCH,
			tsk.BULAN,
			tsk.TAHUN,
			(
			SELECT
			sum(AMOUNT_TOTAL)
			FROM
			transaksi
			JOIN type tp ON tp.TYPE = transaksi.TYPE
			WHERE
			tp.`CODE` = 'LN'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KREDIT_REALISASI,
			(
			SELECT
			sum(AMOUNT_TOTAL)
			FROM
			transaksi
			JOIN type tp ON tp.TYPE = transaksi.TYPE
			WHERE
			tp.`CODE` = 'RT'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TABUNGAN_REALISASI,
			(
			SELECT
			sum(AMOUNT_TOTAL)
			FROM
			transaksi
			JOIN type tp ON tp.TYPE = transaksi.TYPE
			WHERE
			tp.`CODE` = 'DP'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS DEPOSITO_REALISASI
			FROM
			transaksi tsk
			JOIN `group` grp ON grp.`GROUP` = tsk.`GROUP`
			JOIN branch brc ON brc.BRANCH = tsk.BRANCH
			JOIN type tp ON tp.TYPE = tsk.TYPE
			WHERE
			brc.ID_GROUP = grp.ID_GROUP
			AND grp.`GROUP` = '$group'
			GROUP BY
			brc.ID_BRANCH,
			tsk.BULAN,
			tsk.TAHUN;")->result_array();
	}

	public function get_transaksi($group=FALSE)
	{
		return $this->db->query("SELECT
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
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KRED_UMUM,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '131'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KRED_PEG,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '132'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KRED_MOTOR,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '135'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KRED_URK,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '141'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS KRED_MOBIL,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '210'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_SURYA,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '211'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS ATM_KHUSUS,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '212'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_PENSIUN,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '213'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAS,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '214'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_KU,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '215'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS ATM_SURYA,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '216'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_UMROH,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '217'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS THT_UMUM,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '218'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_SIMPEL,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '231'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS TAB_PIKNIK,
			(
			SELECT
			AMOUNT_TOTAL
			FROM
			transaksi
			WHERE
			TYPE = '220'
			AND `GROUP` = '$group'
			AND transaksi.BRANCH = brc.BRANCH
			) AS DEP_1
			FROM
			transaksi tsk
			JOIN `group` grp ON grp.`GROUP` = tsk.`GROUP`
			JOIN branch brc ON brc.BRANCH = tsk.BRANCH
			JOIN type tp ON tp.TYPE = tsk.TYPE
			WHERE
			brc.ID_GROUP = grp.ID_GROUP
			AND grp.`GROUP` = '$group'
			GROUP BY
			brc.ID_BRANCH,
			tsk.BULAN,
			tsk.TAHUN;")->result_array();
	}


}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */