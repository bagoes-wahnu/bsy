<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kantor extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'kantor';
        $this->primary_key     = 'BRANCH';
        $this->order_by     = '`GROUP`, BRANCH';
    }

    public function search($id_kota=false, $group=false, $keyword=false, $count=false)
    {
    	$this->db->select('*')
    	->from("(SELECT * FROM kantor WHERE KETERANGAN <> 'KONSOLIDASI') as kantor");

    	if($id_kota == true){
            $this->db->where('ID_KOTA', $id_kota);
        }

        if($group == true){
    		$this->db->where('`GROUP`', $group);
    	}

    	if($keyword == true){
    		$this->db->where("KETERANGAN LIKE '%{$keyword}%'");
    	}

    	if($count == true){
    		return $this->db->get()->num_rows();
    	}else{
    		return $this->db->get()->result_array();
    	}
    }


}

/* End of file M_kantor.php */
/* Location: ./application/models/M_kantor.php */
