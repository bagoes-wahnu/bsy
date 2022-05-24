<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kredit extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'kredit';
        $this->primary_key  = 'ID_KREDIT';
        $this->order_by     = 'ID_KOTA ASC';
    }
    

}

/* End of file M_kredit.php */
/* Location: ./application/models/M_kredit.php */