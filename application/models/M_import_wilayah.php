<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_wilayah extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'import_wilayah';
        $this->primary_key  = 'ID_IMPORT';
        $this->order_by     = 'ID_WILAYAH ASC';
    }
    
    public function grid()
	{
		return $this->db->query(
			"SELECT
			wly.ID_WILAYAH,
			wly.WILAYAH,
			kt.KOTA,
			imw.BULAN,
			imw.TAHUN
			FROM
			import_wilayah imw
			JOIN wilayah wly ON wly.ID_WILAYAH = imw.ID_WILAYAH
			JOIN kota kt ON kt.ID_KOTA = wly.ID_KOTA
			GROUP BY
			wly.ID_WILAYAH,
			wly.WILAYAH,
			kt.KOTA,
			imw.BULAN,
			imw.TAHUN;")->result_array();
	}

	public function grid_kota($id_kota)
	{
		return $this->db->query(
			"SELECT
			wly.ID_WILAYAH,
			wly.WILAYAH,
			kt.KOTA,
			imw.BULAN,
			imw.TAHUN
			FROM
			import_wilayah imw
			JOIN wilayah wly ON wly.ID_WILAYAH = imw.ID_WILAYAH
			JOIN kota kt ON kt.ID_KOTA = wly.ID_KOTA
			WHERE wly.ID_KOTA = '$id_kota'
			GROUP BY
			wly.ID_WILAYAH,
			wly.WILAYAH,
			kt.KOTA,
			imw.BULAN,
			imw.TAHUN;")->result_array();
	}

}

/* End of file M_import_wilayah.php */
/* Location: ./application/models/M_import_wilayah.php */