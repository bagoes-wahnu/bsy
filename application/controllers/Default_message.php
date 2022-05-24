<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Default_message extends CI_Controller {
	public function index()
	{
		$this->load->view('default_message');
	}
}
