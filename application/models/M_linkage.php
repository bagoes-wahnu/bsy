<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_linkage extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'linkage';
        $this->primary_key  = 'ID_LINKAGE';
        $this->order_by     = 'ID_LINKAGE ASC';
    }    

    public function detail($id_linkage)
    {
        $query = $this->db->query("
            SELECT
                *
            FROM 
                detail_linkage
            WHERE 
                DELETED = 0 AND detail_linkage.ID_LINKAGE = $id_linkage
            ORDER BY TGL_PENCARIAN DESC
        ");

        return $query->result_array();
    }
}

/* End of file M_linkage.php */
/* Location: ./application/models/M_linkage.php */