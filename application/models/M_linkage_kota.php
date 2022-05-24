<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_linkage_kota extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'linkage_kota';
		$this->primary_key  = 'ID_LINKAGE';
		$this->order_by     = 'ID_LINKAGE ASC';
	}

	public function get_data($id_kota=false)
	{
		$query = "
			SELECT
			lk.*, kt.KOTA,
			lkg.NAMA_BANK,
			lkg.TYPE,
			lkg.LOGO,
			lkg.`STATUS`
			FROM
			linkage_kota lk
			JOIN kota kt ON lk.ID_KOTA = kt.ID_KOTA
			JOIN linkage lkg ON lkg.ID_LINKAGE = lk.ID_LINKAGE
			WHERE
			lkg. STATUS = 1
			AND lkg.DELETED = 0
			AND kt.DELETED = 0";

		if($id_kota == TRUE AND $id_kota != 0){
			$query .= " AND lk.ID_KOTA = '{$id_kota}'";
		}

		return $this->db->query($query)->result_array();
	}
}

/* End of file M_linkage.php */
/* Location: ./application/models/M_linkage.php */