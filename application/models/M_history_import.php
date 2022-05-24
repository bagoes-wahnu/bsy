<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_history_import extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'history_import';
		$this->primary_key  = 'ID_KOTA';
		$this->order_by     = 'ID_KOTA ASC, TAHUN DESC, BULAN DESC, WAKTU DESC';
	}

	function json_grid($start, $length, $where, $search='', $count, $sorting, $colsorting)
	{
        // select database
		$this->db->select('*')
		->from('history_import');

		if($where == TRUE){
			$this->db->where($where);
		}

        // search area
		if($search != '') $this->db->where("(TAHUN LIKE '%{$search}%')");

        // urutan data
		$this->db->order_by($colsorting,$sorting);

        // limit data
		if($count == false) $this->db->limit($length,$start);

		$query = $this->db->get();

		if($count == false){
			return $query->result_array();
		}else{
			return $query->num_rows();
		}
	}

}

/* End of file M_history_import.php */
/* Location: ./application/models/M_history_import.php */