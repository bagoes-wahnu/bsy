<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cp_struktur_modal extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'cp_struktur_modal';
        $this->primary_key  = 'ID_STRUKTUR_MODAL';
        $this->order_by     = 'ID_STRUKTUR_MODAL ASC';
    }
    

}

/* End of file M_kredit.php */
/* Location: ./application/models/M_kredit.php */