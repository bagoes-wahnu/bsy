<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class E_Controller extends CI_controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function model($file){
		$this->load->model($file);
	}
	public function view($file,$dat="",$condition=false){
		$this->load->view($file,$dat,$condition);
	}

	public function cekLogin()
	{
		if ( ! $this->session->userdata('statusLogin'))
        {
        	$this->session->set_flashdata('message', 'Lakukan login terlebih dahulu'); 
            redirect('auth');
        }
		// $a = $this->session->userdata('username');
		// var_dump($a);
	}

	public function page_not_found()
	{
		$this->load->view("errors/error_404");
	}
}