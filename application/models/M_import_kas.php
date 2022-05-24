<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_kas extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'import_kas';
        $this->primary_key  = 'ID_IMPORT';
        $this->order_by     = 'ID_KAS ASC';
    }
    

}

/* End of file M_import_kas.php */
/* Location: ./application/models/M_import_kas.php */