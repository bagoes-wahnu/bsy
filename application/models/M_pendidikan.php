<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendidikan extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'pendidikan';
        $this->primary_key  = 'ID_PENDIDIKAN';
        $this->order_by     = 'ID_PENDIDIKAN ASC';
    }
    
    public function get_sdm()
    {
        $query = $this->db->query("
            SELECT
                kota.ID_KOTA,
                pendidikan.ID_PENDIDIKAN,
                (P+L)AS JUMLAH_PEGAWAI,
                P,
                L,
                PENDIDIKAN,
                JUMLAH
            FROM
                pendidikan_kota
            JOIN pendidikan ON pendidikan_kota.ID_PENDIDIKAN = pendidikan.ID_PENDIDIKAN
            JOIN kota ON pendidikan_kota.ID_KOTA = kota.ID_KOTA
        ");
        
        return $query->result_array();
    }
}

/* End of file M_pendidikan.php */
/* Location: ./application/models/M_pendidikan.php */