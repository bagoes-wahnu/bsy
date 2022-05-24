<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_kantor');
	}

	public function index()
	{
		$id_kota = $this->session->userdata('kota');
		if(!empty($id_kota)){
			$data['kantor'] = $this->M_kantor->get_by(array('ID_KOTA' => $id_kota, '`STATUS`' => 1));
			$data['content'] = $this->load->view('kantor/grid',$data,true);
			$this->load->view('dashboard',$data);
		}else{
			$this->load->view('errors/error_404');
		}
	}

	public function get($group='', $branch='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($group) and !empty($branch)){
				$id_kota = $this->session->userdata('kota');			
				$data = $this->M_kantor->get_by(array('`GROUP`' => $group, 'BRANCH' => $branch, 'ID_KOTA' => $id_kota, '`STATUS`' => 1), false, false, true);
				
				if(!empty($data)){
					$result = array('status' => 'OK', 'data' => $data);
				}else{
					$result = array('status' => 'NOT_FOUND', 'msg' => 'Data tidak tersedia');
				}
			}else{
				$result = array('status' => 'DATA_IS_REQUIRED', 'msg' => 'Ada parameter yang tidak terkirim');
			}
		}else{
			$result = array('status' => 'FORBIDDEN', 'msg' => 'Anda tidak memiliki hak untuk melakukan tindakan ini');
		}

		echo json_encode($result);
	}

	public function save($group='', $branch='')
	{
		$this->form_validation->set_rules("group","Kantor","required");
		$this->form_validation->set_rules("cabang","cabang","required");
		$this->form_validation->set_rules("kantor","kantor","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu"
				);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$id_kota = $this->session->userdata('kota');
			$data = array('`GROUP`' => $post['group'], 'BRANCH' => $post['cabang'],'KETERANGAN' => strip_tags(strtoupper($post['kantor'])), 'ID_KOTA' => $id_kota, '`STATUS`' => 1);

			if($this->cek_group_and_branch(array('`GROUP`' => $post['group'], 'BRANCH' => $post['cabang'], 'ID_KOTA' => $id_kota), array('GROUP' => $group, 'BRANCH' => $branch, 'ID_KOTA' => $id_kota)) == true){

				if(!empty($group) && !empty($branch)){
					$current_id = $this->M_kantor->save($data, array('`GROUP`' => $group, 'BRANCH' => $branch, 'ID_KOTA' => $id_kota));
				}else{
					$current_id = $this->M_kantor->save($data);
				}

				$msg = 'Data berhasil disimpan';
				echo json_encode(array('status' => 'OK', 'msg' => $msg));
			}else{
				echo json_encode(array('status' => 'ERROR', 'msg' => 'Kode <b>'.$post['cabang'].'</b> telah digunakan di grup <b>'.$post['group'].'</b>'));
			}
		}
	}

	public function delete_kantor($group='', $branch='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($group) and !empty($branch)){
				$id_kota = $this->session->userdata('kota');
				$data = $this->M_kantor->get_by(array('`GROUP`' => $group, 'BRANCH' => $branch), false, false, true);
				if(!empty($data)){
					$this->M_kantor->delete_by(array('`GROUP`' => $group, 'BRANCH' => $branch, 'ID_KOTA' => $id_kota));
					// $this->M_kantor->save(array('`STATUS`' => 0), array('`GROUP`' => $group, 'BRANCH' => $branch, 'ID_KOTA' => $id_kota));
					$result = array('status' => 'OK', 'msg' => 'Data berhasil dihapus');
				}else{
					$result = array('status' => 'NOT_FOUND', 'msg' => 'Data tidak tersedia');
				}
			}else{
				$result = array('status' => 'DATA_IS_REQUIRED', 'msg' => 'Ada parameter yang tidak terkirim');
			}
		}else{
			$result = array('status' => 'FORBIDDEN', 'msg' => 'Anda tidak memiliki hak untuk melakukan tindakan ini');
		}

		echo json_encode($result);
	}

	public function cek_group_and_branch($group_and_branch=array(), $current_group_and_branch=array())
	{
		$result = false;
		if(!empty($group_and_branch)){
			$get = $this->M_kantor->get_by($group_and_branch, false, false, true);
			if(!empty($get)){
				if(!empty($current_group_and_branch)){
					if($get['GROUP'] == $current_group_and_branch['GROUP'] and $get['BRANCH'] == $current_group_and_branch['BRANCH'] and $get['ID_KOTA'] == $current_group_and_branch['ID_KOTA']){
						$result = true;
					}
				}
			}else{
				$result = true;
			}
		}

		return $result;
	}
}