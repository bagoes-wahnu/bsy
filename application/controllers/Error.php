<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {
	public function e_404()
	{
		$this->load->view("errors/e_404.html");
	}
	public function e_403()
	{
		$this->load->view("errors/e_403.html");
	}
}
