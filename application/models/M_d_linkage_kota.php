<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_d_linkage_kota extends E_Model {
	public function __construct()
	{
		parent::__construct();
		$this->table_name   = 'd_linkage_kota';
		$this->primary_key  = 'ID_D_LINKAGE_KOTA';
		$this->order_by     = 'ID_D_LINKAGE_KOTA DESC';
	}

}