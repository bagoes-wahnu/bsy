<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_target extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'import_target';
	}

	public function empty_table($id_kota)
	{
		return $this->db->query("DELETE from import_target WHERE ID_KOTA='$id_kota';");
	}

	public function empty_table_kota($tahun, $kota)
	{
		return $this->db->query("DELETE from import_kota WHERE ID_KOTA='$id_kota';");
	}


	public function update_status_progress($id_kota, $tahun) 
	{
		$this->db->update('history_import', array('PROGRESS' => 2), array("ID_KOTA" => $id_kota, "TAHUN" => $tahun, "DELETED" => 0, "KATEGORI" => NULL));
	}

	public function import_data($dir)
	{

		$this->db->trans_start();
		$this->db->query("TRUNCATE import_target");
		$this->db->query("
			LOAD DATA LOCAL INFILE '".$dir."' INTO TABLE `import_target` fields terminated by ';' lines terminated by '\r' IGNORE 1 ROWS;");

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

	public function get_import_target($tahun, $id_kota) 
	{
		$sql = "SELECT REPLACE (REPLACE (`GROUP`, CHAR(13), ''),CHAR (10),'') AS `GROUP`, BRANCH, TYPE, JAN, FEB, MAR, APR, MEI, JUN, JUL, AGU, SEP, OKT, NOV, DES, TAHUN, ID_KOTA
				FROM import_target
				WHERE import_target.ID_KOTA = $id_kota
				AND import_target.TAHUN = $tahun
				AND import_target.TYPE != '';";

        return $this->db->query($sql)->result_array();
	}

	public function get_import_target_group($tahun, $id_kota) 
	{
		$sql = "SELECT ID_KOTA, REPLACE (REPLACE (`GROUP`, CHAR(13), ''),CHAR (10),'') AS `GROUP`, BRANCH, TAHUN
				FROM import_target
				WHERE import_target.ID_KOTA = $id_kota
				AND import_target.TAHUN = $tahun
				AND import_target.TYPE != ''
				GROUP BY ID_KOTA, `GROUP`, BRANCH, TAHUN;";

        return $this->db->query($sql)->result_array();
	}


	public function format_number($val, $ct)
	{
		switch ($ct) {
			case 'des':
			  	return (string)(str_replace(',', '.',str_replace('-', '0',str_replace('.', '',$val))));
			  	break;
			case 'p':
				return (string)(floatval(str_replace(',', '.',str_replace('%', '', $val))) / 100);
			  	break;
			case 'pmin':
				return (string)(floatval(str_replace(',', '.',str_replace('-', '0',str_replace('%', '',$val)))) / 100);
			  	break;
			default:
				return (string)floatval(str_replace(',', '.',str_replace('-', '0',str_replace('.', '',$val))));
		  }
	}
	
	public function format_type($type)
	{
		switch ($type) {
			case 200:
			  	return "des";
			  	break;
			case 100:
				return "des";
			  	break;
			case 220:
				return "des";
			  	break;
			case 600:
				return "des";
			  	break;
			case 410:
				return "des";
			  	break;
			case 310:
				return "des";
			  	break;
			case 510:
				return "des";
			  	break;
			case 601:
				return "p";
			  	break;
			case 602:
				return "p";
			  	break;
			case 603:
				return "p";
			  	break;
			case 604:
				return "p";
			  	break;
			case 605:
				return "p";
			  	break;
			case 606:
				return "p";
			  	break;
			case 607:
				return "p";
			  	break;
			case 608:
				return "p";
			  	break;
			case 609:
				return "p";
			  	break;
			case 610:
				return "pmin";
			  	break;
			default:
				return "des";
		  }
	}
	public function move_data($tahun, $id_kota)
	{
        $data_import_target = $this->get_import_target($tahun, $id_kota);
		
		$data_array = [];
		foreach ($data_import_target as $key => $value) {
			$index = "KT".$value['ID_KOTA']."TH".$value['TAHUN']."GR".$value['GROUP']."BR".$value['BRANCH']."TY".$value['TYPE'];
			$format_type = $this->format_type($value['TYPE']);
			$data_array[$index.'BL1'] = $this->format_number($value['JAN'], $format_type);
			$data_array[$index.'BL2'] = $this->format_number($value['FEB'], $format_type);
			$data_array[$index.'BL3'] = $this->format_number($value['MAR'], $format_type);
			$data_array[$index.'BL4'] = $this->format_number($value['APR'], $format_type);
			$data_array[$index.'BL5'] = $this->format_number($value['MEI'], $format_type);
			$data_array[$index.'BL6'] = $this->format_number($value['JUN'], $format_type);
			$data_array[$index.'BL7'] = $this->format_number($value['JUL'], $format_type);
			$data_array[$index.'BL8'] = $this->format_number($value['AGU'], $format_type);
			$data_array[$index.'BL9'] = $this->format_number($value['SEP'], $format_type);
			$data_array[$index.'BL10'] = $this->format_number($value['OKT'], $format_type);
			$data_array[$index.'BL11'] = $this->format_number($value['NOV'], $format_type);
			$data_array[$index.'BL12'] = $this->format_number($value['DES'], $format_type);
		}

        $data_import_target = $this->get_import_target_group($tahun, $id_kota);
		$data_import_kota = [];
		foreach ($data_import_target as $key => $value) {
			for ($i=1; $i <= 12; $i++) { 
				$index = "KT".$value['ID_KOTA']."TH".$value['TAHUN']."GR".$value['GROUP']."BR".$value['BRANCH'];
				$data_import_kota = [
					"ID_KOTA" => $value['ID_KOTA'],
					"GROUP" => $value['GROUP'],
					"BRANCH" => $value['BRANCH'],
					"BULAN" => $i,
					"TAHUN" => $value['TAHUN'],
					"TABUNGAN_TARGET" => $this->replaceNol($data_array,$index.'TY200BL'.$i),
					"KREDIT_TARGET" => $this->replaceNol($data_array,$index.'TY100BL'.$i),
					"DEPOSITO_TARGET" => $this->replaceNol($data_array,$index.'TY220BL'.$i),
					"ASET_TARGET" => $this->replaceNol($data_array,$index.'TY600BL'.$i),
					"BIAYA_TARGET" => $this->replaceNol($data_array,$index.'TY410BL'.$i),
					"PENDAPATAN_TARGET" => $this->replaceNol($data_array,$index.'TY310BL'.$i),
					"LABA_TARGET" => $this->replaceNol($data_array,$index.'TY510BL'.$i),
					"CAR_TARGET" => $this->replaceNol($data_array,$index.'TY601BL'.$i),
					"ROA_TARGET" => $this->replaceNol($data_array,$index.'TY602BL'.$i),
					"ROE_TARGET" => $this->replaceNol($data_array,$index.'TY603BL'.$i),
					"BOPO_TARGET" => $this->replaceNol($data_array,$index.'TY604BL'.$i),
					"CR_TARGET" => $this->replaceNol($data_array,$index.'TY605BL'.$i),
					"LDR_TARGET" => $this->replaceNol($data_array,$index.'TY606BL'.$i),
					"KAP_TARGET" => $this->replaceNol($data_array,$index.'TY607BL'.$i),
					"NPL_GROSS_TARGET" => $this->replaceNol($data_array,$index.'TY608BL'.$i),
					"NPL_NET_TARGET" => $this->replaceNol($data_array,$index.'TY609BL'.$i),
					"NIM_TARGET" => $this->replaceNol($data_array,$index.'TY610BL'.$i)
				];

				$sql = 'INSERT INTO import_kota (ID_KOTA, `GROUP`, BRANCH, BULAN, TAHUN, TABUNGAN_TARGET, KREDIT_TARGET, DEPOSITO_TARGET, ASET_TARGET, BIAYA_TARGET, PENDAPATAN_TARGET, LABA_TARGET, CAR_TARGET, ROA_TARGET, ROE_TARGET, BOPO_TARGET, CR_TARGET, LDR_TARGET, KAP_TARGET, NPL_GROSS_TARGET, NPL_NET_TARGET, NIM_TARGET)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
						ON DUPLICATE KEY UPDATE 
						TABUNGAN_TARGET=VALUES(TABUNGAN_TARGET), 
						KREDIT_TARGET=VALUES(KREDIT_TARGET), 
						KREDIT_TARGET=VALUES(KREDIT_TARGET), 
						DEPOSITO_TARGET=VALUES(DEPOSITO_TARGET), 
						ASET_TARGET=VALUES(ASET_TARGET), 
						BIAYA_TARGET=VALUES(BIAYA_TARGET), 
						PENDAPATAN_TARGET=VALUES(PENDAPATAN_TARGET), 
						LABA_TARGET=VALUES(LABA_TARGET), 
						CAR_TARGET=VALUES(CAR_TARGET), 
						ROA_TARGET=VALUES(ROA_TARGET), 
						ROE_TARGET=VALUES(ROE_TARGET), 
						BOPO_TARGET=VALUES(BOPO_TARGET), 
						CR_TARGET=VALUES(CR_TARGET), 
						LDR_TARGET=VALUES(LDR_TARGET), 
						KAP_TARGET=VALUES(KAP_TARGET), 
						NPL_GROSS_TARGET=VALUES(NPL_GROSS_TARGET), 
						NPL_NET_TARGET=VALUES(NPL_NET_TARGET),
						NIM_TARGET=VALUES(NIM_TARGET)';

				$query = $this->db->query($sql, $data_import_kota);

			}
		}
	}

	public function replaceNol($data_array,$val) {
		if(array_key_exists($val,$data_array))
		return $data_array[$val];
		else
		return 0;
	}
}

/* End of file M_import_target.php */
/* Location: ./application/models/M_import_target.php */