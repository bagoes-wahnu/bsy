<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_import_cabang extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'import_cabang';
        $this->primary_key  = 'ID_IMPORT';
        $this->order_by     = 'ID_CABANG ASC';
    }
    

}

/* End of file M_import_cabang.php */
/* Location: ./application/models/M_import_cabang.php */