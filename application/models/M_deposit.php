<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_deposit extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'deposit';
        $this->primary_key  = 'ID_DEPOSIT';
        $this->order_by     = 'ID_KOTA ASC';
    }
}

/* End of file M_deposit.php */
/* Location: ./application/models/M_deposit.php */