<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_linkage extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'detail_linkage';
		$this->primary_key  = 'ID_DETAIL_LINKAGE';
		$this->order_by     = 'TGL_PENCARIAN DESC';
	}

	public function get_data($id_kota=false, $id_linkage=false)
	{
		$query = "
		SELECT
		lk.*, kt.KOTA,
		lkg.NAMA_BANK,
		lkg.TYPE,
		lkg.LOGO,
		lkg.`STATUS`,
		dlk.TGL_PENCARIAN,
		dlk.JATUH_TEMPO,
		dlk.PLATFOND_BANK,
		dlk.BAKI_DEBIT,
		dlk.KELONGGARAN_TARIK,
		dlk.BUNGA
		FROM
		linkage_kota lk
		JOIN kota kt ON lk.ID_KOTA = kt.ID_KOTA
		JOIN linkage lkg ON lkg.ID_LINKAGE = lk.ID_LINKAGE
		JOIN detail_linkage dlk ON dlk.ID_LINKAGE = lk.ID_LINKAGE
		WHERE
		lkg. STATUS = 1
		AND lkg.DELETED = 0
		AND kt.DELETED = 0
		AND dlk.DELETED = 0";

		if($id_kota == TRUE AND $id_kota != 0){
			$query .= " AND lk.ID_KOTA = '{$id_kota}'";
		}

		if($id_linkage == TRUE AND $id_linkage != 0){
			$query .= " AND dlk.ID_LINKAGE = '{$id_linkage}'";
		}

		return $this->db->query($query)->result_array();
	}
}

