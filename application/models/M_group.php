<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_group extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'group';
        $this->primary_key  = 'ID_GROUP';
        $this->order_by     = 'ID_GROUP ASC';
    }
    

}

/* End of file M_group.php */
/* Location: ./application/models/M_group.php */