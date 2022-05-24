<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_direksi extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'direksi';
        $this->primary_key  = 'ID_DIREKSI';
        $this->order_by     = 'ID_DIREKSI ASC';
    }
    
    public function get_direksi_by_kota($id_jabatan='')
    {
        $where = '';
        if ($id_jabatan != '') {
            $where = 'jabatan_dir.ID_JABATAN = '.$id_jabatan.'  AND';
        }

        $query = $this->db->query("
            SELECT
                *,jabatan_dir.ID_JABATAN as JABATAN_ID,jabatan_dir.ID_KOTA as KOTA_ID
            FROM
                jabatan_dir
            JOIN jabatan ON jabatan_dir.ID_JABATAN = jabatan.ID_JABATAN
            JOIN direksi ON jabatan_dir.ID_DIREKSI = direksi.ID_DIREKSI
            WHERE
                $where direksi.DELETED = 0 AND direksi.STATUS = 1 AND jabatan.STATUS = 1
            ORDER BY jabatan.`ORDER`, jabatan_dir.URUTAN ASC
        ");

        return $query->result_array();
    }
}

/* End of file M_direksi.php */
/* Location: ./application/models/M_direksi.php */