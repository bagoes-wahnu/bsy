<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kas extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'kas';
        $this->primary_key  = 'ID_KAS';
        $this->order_by     = 'KAS ASC';
    }

     public function get_data()
    {
        return $this->db->query("
            SELECT 
            cbg.*, wly.WILAYAH, wly.STATUS AS STATUS_WILAYAH, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM kas
            JOIN cabang cbg ON kas.ID_CABANG = cbg.ID_CABANG
            JOIN wilayah wly ON wly.ID_WILAYAH = cbg.ID_WILAYAH
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND cbg.DELETED=0;")->result_array();
    }

    public function get_by_wilayah($id_cabang)
    {
        return $this->db->query("
             SELECT 
            cbg.*, wly.WILAYAH, wly.STATUS AS STATUS_WILAYAH, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM kas
            JOIN cabang cbg ON kas.ID_CABANG = cbg.ID_CABANG
            JOIN wilayah wly ON wly.ID_WILAYAH = cbg.ID_WILAYAH
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND cbg.DELETED=0
            AND kas.ID_CABANG='$id_cabang';")->result_array();
    }
    
    public function search($id_kota=null,$kas=null)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM
                kas
            JOIN cabang ON kas.ID_CABANG = cabang.ID_CABANG
            JOIN wilayah ON cabang.ID_WILAYAH = wilayah.ID_WILAYAH
            WHERE
                ID_KOTA = $id_kota AND KAS LIKE '%$kas%'    
        ");
        return $query->result_array();
    }
}

/* End of file M_kas.php */
/* Location: ./application/models/M_kas.php */
