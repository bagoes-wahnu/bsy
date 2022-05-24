<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_direksi_timeline extends E_Model {
    public function __construct()
    {
        parent::__construct();
        $this->table_name   = 'direksi_timeline';
        $this->primary_key  = 'ID_TIMELINE';
        $this->order_by     = 'AWAL DESC';
    }

}
