<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_import_kota');
	}

	public function index()
	{
		$data['last_bna'] = $this->M_import_kota->get_last_data(1);
		$data['last_krt'] = $this->M_import_kota->get_last_data(2);
		$data['last_konsolidasi'] = $this->M_import_kota->get_last_data();
		$data['content'] = $this->load->view('home',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get_graph_data()
	// public function get_graph_data($year='', $month='', $id_kota=false, $group=false, $branch=false)
	{
		$result = array();

		if($this->input->is_ajax_request()){
			$year 		= ($this->input->post('year'))? $this->input->post('year') : false;
			$month 		= ($this->input->post('month'))? $this->input->post('month') : false;
			$id_kota 	= ($this->input->post('id_kota'))? $this->input->post('id_kota') : false;
			$group 		= ($this->input->post('group'))? $this->input->post('group') : false;
			$branch 	= ($this->input->post('branch'))? $this->input->post('branch') : false;

			$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
			// $arr_bulan = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
			
			if($month != '0'){
				$month = (array_search($month, $arr_bulan) + 1);
			}

			// if($id_kota != 1 and $id_kota != 2){
			// 	$id_kota = false;
			// }

			if(($id_kota == 1) or($id_kota == 2)){
				$graph['graph'] = $this->M_import_kota->get_graph($year, $month, $id_kota, $group, $branch);
			}else{
				$graph['graph'] = $this->M_import_kota->get_graph($year, $month, false, $group, $branch);
			}

			$graph['id_kota'] = $id_kota;
			$data = $this->load->view('graph',$graph,true);
			$result = array('status' => 'OK', 'data' => $data, 'id_kota' => $id_kota, 'group' => $group, 'branch' => $branch);
			// $result = array('status' => 'OK', 'data' => $year.' - '. $month.' - '. $id_kota);
		}else{
			$result = array('status' => 'FORBIDDEN');
		}

		echo json_encode($result);
	}

	public function info_graph()
	{
		$data['content'] = $this->load->view('graphic/informasi','',true);
		$this->load->view('dashboard',$data);
	}
	
	function test()
	{
		$a = 'aaaaaa.jpg';
		$a = explode(".",$a);
		$b =  $a[0].'_thub.'.$a[1];
		echo $b;
	}
}
