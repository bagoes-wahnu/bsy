<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_user');
	}
	public function halaman()
	{
		$data['content'] = $this->load->view('user/halaman','',true);
		$this->load->view('dashboard',$data);
	}	

	public function grid($id_kota=null)
	{
		$data['id']		= $id_kota;
		$data['data'] = $this->M_user->get_by(array('DELETED' => 0,'ID_KOTA'=>$id_kota));
		$data['content'] = $this->load->view('user/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_user='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_user)){				

				$data = $this->M_user->get($id_user);
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

	public function delete_linkage($id_user='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_user)){				

				$data = $this->M_user->get($id_user);
				if(!empty($data)){
					$this->M_user->save(array('DELETED' => 1), $id_user);
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

	public function save($id_kota=null,$id_user='')
	{

		$this->form_validation->set_rules("hak","Hak","required");
		$this->form_validation->set_rules("namauser","User","required");
		if ($id_user=='') {
			$this->form_validation->set_rules("password","password","required");
		}
		
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu"
				
			);
			echo json_encode($res);

		} else {
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;

			$username = $this->input->post('namauser');

			if($this->cek_username($username, $id_user) == false){
				echo json_encode(array('status' => 'ERROR', 'msg' => 'User sudah ada'));
			}else{
				
				$data = array(
					'ID_KOTA'=>$id_kota,
					'STATUS'=>$status,
					'ROLE'=>$post['hak'],
					'USERNAME'=>$post['namauser'],
					'NAMA_LENGKAP'=>$post['namalengkap'],
					'NAMA_PANGGILAN'=>$post['namaPanggilan']
				);
				
				if(!empty($id_user)){
					$current_id = $this->M_user->save($data, $id_user);
				}else{
					$data['PASSWORD'] = md5($post['password']);
					$current_id = $this->M_user->save($data);
				}
				echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));

			}
		}
	}
	public function save_pass($id_kota=null,$id_user='')
	{

		$this->form_validation->set_rules("password_lama","password","required");
		$this->form_validation->set_rules("password_baru","password","required");
		$this->form_validation->set_rules("password_baru2","password","required");
		
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"password_lama"=>form_error("tgl_pencarian")
			);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$cek = $this->M_user->get($id_user);
			if ($cek['PASSWORD']==md5($post['password_lama'])) {
				if($post['password_baru']==$post['password_baru2']){
					$data = array(
						'PASSWORD'=>md5($post['password_baru2'])
					);
					$current_id = $this->M_user->save($data, $id_user);

					$msg = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
				}else{
					$msg = array('status' => 'PASSWORD', 'msg' => 'Password baru tidak sama');
				}
			}else{
				$msg = array('status' => 'PASSWORD', 'msg' => 'Password lama tidak valid');
			}

			echo json_encode($msg);
		}
	}

	private function cek_username($username, $id_user=null)
	{
		$result = false;            

		$cek = $this->M_user->get_by(['USERNAME' => $username], false, false, true);

		if(!empty($id_user)){
			if(!empty($cek) and $id_user != $cek['ID_USER']){
				$result = false;
			}else{
				$result = true;
			}
		}else{
			if(!empty($cek)){
				$result = false;
			}else{
				$result = true;
			}
		}

		return $result;
	}
}