<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cabang extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'cabang';
        $this->primary_key  = 'ID_CABANG';
        $this->order_by     = 'ID_CABANG ASC';
    }

    public function get_data()
    {
        return $this->db->query("
            SELECT 
            cbg.*, wly.WILAYAH, wly.STATUS AS STATUS_WILAYAH, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM cabang cbg
            JOIN wilayah wly ON wly.ID_WILAYAH = cbg.ID_WILAYAH
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND cbg.DELETED=0;")->result_array();
    }

    public function get_by_wilayah($id_wilayah)
    {
        return $this->db->query("
            SELECT 
            cbg.*, wly.WILAYAH, wly.STATUS AS STATUS_WILAYAH, kt.KOTA, kt.STATUS AS STATUS_KOTA
            FROM cabang cbg
            JOIN wilayah wly ON wly.ID_WILAYAH = cbg.ID_WILAYAH
            JOIN kota kt ON wly.ID_KOTA = kt.ID_KOTA
            WHERE kt.DELETED=0
            AND wly.DELETED=0
            AND cbg.DELETED=0
            AND cbg.ID_WILAYAH='$id_wilayah';")->result_array();
    }
    
    public function hitung_cabang($id_kota)
    {
        $query = $this->db->query("
            SELECT
                count(*) as JUMLAH_CABANG
            FROM
                cabang
            JOIN wilayah ON cabang.ID_WILAYAH = wilayah.ID_WILAYAH
            WHERE
                ID_KOTA = $id_kota AND cabang.STATUS = 1 AND cabang.DELETED = 0 AND wilayah. STATUS = 1
                AND wilayah. DELETED = 0
        ");

        return $query->row_array();
         
    }

    public function hitung_kas($id_kota)
    {
         $query = $this->db->query("
            SELECT
                count(*) as JUMLAH_KAS
            FROM
                kas
            JOIN cabang ON kas.ID_CABANG = cabang.ID_CABANG AND cabang.STATUS = 1 AND cabang.DELETED = 0
            JOIN wilayah ON cabang.ID_WILAYAH = wilayah.ID_WILAYAH AND wilayah.STATUS = 1 AND wilayah.DELETED = 0
            WHERE
                ID_KOTA = $id_kota AND kas.STATUS = 1 AND cabang.STATUS = 1
        ");
        
        return $query->row_array();
    }

    public function hitung_per_kantor($kategori,$id_kota)
    {
        $query = $this->db->query("
            SELECT
                count(*) AS JUMLAH_KANTOR
            FROM
                kas
            JOIN cabang ON kas.ID_CABANG = cabang.ID_CABANG AND cabang.STATUS = 1 AND cabang.DELETED = 0
            JOIN wilayah ON cabang.ID_WILAYAH = wilayah.ID_WILAYAH AND wilayah.STATUS = 1 AND wilayah.DELETED = 0
            WHERE
                KATEGORI = '$kategori' AND kas.STATUS = 1 AND wilayah.ID_KOTA = $id_kota
        ");

        return $query->row_array();
    }

    public function search($id_kota=null,$cabang=null)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM
                cabang
            JOIN wilayah ON cabang.ID_WILAYAH = wilayah.ID_WILAYAH
            WHERE
                ID_KOTA = $id_kota AND CABANG LIKE '%$cabang%'    
        ");

        return $query->result_array();
    }
}

/* End of file M_cabang.php */
/* Location: ./application/models/M_cabang.php */