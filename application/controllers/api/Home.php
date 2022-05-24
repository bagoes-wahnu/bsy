<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		// $sesi = $this->session->userdata("qc_session");
		// if(!empty($sesi)){
			$this->load->view('api');
		// }else{
		// 	$this->session->set_flashdata(array("qc_alert" => "<div class=\"alert alert-danger\"><strong>Bahaya!</strong> Anda tidak memiliki hak untuk mengakses halaman tersebut.</div>"));
		// 	redirect(base_url());
		// }
	}

}