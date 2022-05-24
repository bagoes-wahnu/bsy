<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_produk extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'sub_produk';
        $this->primary_key  = 'ID_SUB_PRODUK';
        $this->order_by     = 'URUTAN ASC';
    }
    
    public function find($search=null)
    {
        if (isset($search)) {
            $this->db->select('*')
            ->from('sub_produk')
            ->like('NAMA_SUB', $search)
            ->or_like('SUKU_BUNGA', $search)
            ->or_like('KETENTUAN', $search);

            $query = $this->db->get();
        } else {

        }

        return $query->result_array();
    }
}

/* End of file M_sub_produk.php */
/* Location: ./application/models/M_sub_produk.php */