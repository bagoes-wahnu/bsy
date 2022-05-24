<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tabungan extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'tabungan';
        $this->primary_key  = 'ID_TABUNGAN';
        $this->order_by     = 'NAMA_TABUNGAN ASC';
    }
    
    public function all($id_kota = null)
    {
        $this->db->select('*')
        ->from('d_tabungan')
        ->join('tabungan', 'd_tabungan.ID_TABUNGAN = tabungan.ID_TABUNGAN');
        if (isset($id_kota)) {
            $this->db->where('ID_KOTA', $id_kota);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file M_tabungan.php */
/* Location: ./application/models/M_tabungan.php */