<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_branch extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'branch';
        $this->primary_key  = 'ID_BRANCH';
        $this->order_by     = 'ID_BRANCH ASC';
    }
    

}

/* End of file M_branch.php */
/* Location: ./application/models/M_branch.php */