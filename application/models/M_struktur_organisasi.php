<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_struktur_organisasi extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'jabatan_dir';
        $this->primary_key  = 'ID_JABATAN_DIR';
        $this->order_by     = 'URUTAN ASC';
    }

    public function get_by_jabatan($id_jabatan)
    {
		$id_kota = $this->session->userdata('kota');
        $query = $this->db->query("
            SELECT
                jabatan_dir.*
            FROM 
                jabatan_dir
            LEFT JOIN jabatan ON jabatan_dir.ID_JABATAN = jabatan.ID_JABATAN
            LEFT JOIN direksi ON jabatan_dir.ID_DIREKSI = direksi.ID_DIREKSI
            WHERE 
                jabatan_dir.ID_JABATAN = $id_jabatan 
                AND direksi.`STATUS` = 1 
                AND jabatan_dir.ID_KOTA = $id_kota
            ORDER BY URUTAN ASC
        ");

        return $query->result_array();
    }
}

