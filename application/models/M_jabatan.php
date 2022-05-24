<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'jabatan';
        $this->primary_key  = 'ID_JABATAN';
        $this->order_by     = 'ORDER ASC';
    }
    

}

/* End of file M_jabatan.php */
/* Location: ./application/models/M_jabatan.php */