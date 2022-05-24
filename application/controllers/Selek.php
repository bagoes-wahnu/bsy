<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Selek extends CI_Controller {

	public function grid()
	{
		$data['content'] = $this->load->view('selekt','',true);
		$this->load->view('dashboard',$data);
	}
}