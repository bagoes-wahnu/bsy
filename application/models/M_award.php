<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_award extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'award';
        $this->primary_key  = 'ID_AWARD';
        $this->order_by     = 'ID_AWARD ASC';
    }
}

/* End of file M_deposit.php */
/* Location: ./application/models/M_deposit.php */