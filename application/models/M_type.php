<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_type extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'type';
        $this->primary_key  = 'ID_TYPE';
        $this->order_by     = 'ID_TYPE ASC';
    }
    

}

/* End of file M_type.php */
/* Location: ./application/models/M_type.php */