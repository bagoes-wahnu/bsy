<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_msg extends CI_Controller {
	public function e_404()
	{
		$this->load->view("errors/error_404");
	}
	public function e_403()
	{
		$this->load->view("errors/e_403.html");
	}
}
