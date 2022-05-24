<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Award extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_award');
	}

	public function detail_link($id=null)
	{
		$data['content'] = $this->load->view('award/detail','',true);
		$this->load->view('dashboard',$data);
	}

	public function grid()
	{
		$id_kota = $this->session->userdata('kota');
		$data['award'] = $this->M_award->get_by(array('DELETED' => 0, 'ID_KOTA' => $id_kota));
		$data['content'] = $this->load->view('award/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_award='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_award)){				

				$data = $this->M_award->get($id_award);
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

	public function delete_award($id_award='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_award)){				

				$data = $this->M_award->get($id_award);
				if(!empty($data)){
					$this->M_award->save(array('DELETED' => 1), $id_award);
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

	public function save($id_award='')
	{
		$this->form_validation->set_rules("keterangan","Keterangan","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"keterangan"=>form_error("keterangan"),
				
				);
			echo json_encode($res);
		} else {
			$id_kota = $this->session->userdata('kota');
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;

			$data = array('ID_KOTA' => $id_kota, 'KETERANGAN' => $post['keterangan'], 'TGL_AWARD' => date('Y-m-d', strtotime($post['tgl_award'])), 'STATUS' => $status);

			if(!empty($id_award)){
				$current_id = $this->M_award->save($data, $id_award);
			}else{
				$current_id = $this->M_award->save($data);
			}

			$id = md5($current_id);

			if($_FILES['file']['name']){
				if(!is_dir("./ffdwjws/award")){
					mkdir("./ffdwjws/award");
				}

				if(!is_dir("./ffdwjws/award/".$id )){
					mkdir("./ffdwjws/award/".$id);
				}

				if(!is_dir("./ffdwjws/award/".$id )){
					mkdir("./ffdwjws/award/".$id);
				}

				$directory = "./ffdwjws/award/".$id;

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size'] 		= 10000000;
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$err++;
				}else{
					$data = $this->upload->data();


					$get_old_file = $this->M_award->get($current_id);
					if(file_exists($directory.'/'.$get_old_file['FILE']) and !is_dir($directory.'/'.$get_old_file['FILE'])){
						unlink($directory.'/'.$get_old_file['FILE']);
						if(file_exists($directory.'/thumb400x400_'.$get_old_file['FILE']) and !is_dir($directory.'/thumb400x400_'.$get_old_file['FILE'])){
							unlink($directory.'/thumb400x400_'.$get_old_file['FILE']);
						}
					}

					$this->M_award->save(array(
						'FILE'=>$data['file_name']
						),$current_id);
				}
			}

			if($err > 0){
				$msg = 'Data berhasil disimpan. Namun, award tidak berhasil diupload';
			}else{
				$msg = 'Data berhasil disimpan';
			}

			echo json_encode(array('status' => 'OK', 'msg' => $msg));
		}
	}


}
