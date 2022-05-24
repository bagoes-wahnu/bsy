<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'user';
        $this->primary_key  = 'ID_USER';
        $this->order_by     = 'ID_USER ASC';
    }
    

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */