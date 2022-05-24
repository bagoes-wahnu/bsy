<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		// $this->load->model('M_kota');
		$this->load->model('M_kota');
	}
	public function bagan()
	{
		$data['data']	 = $this->M_kota->get();
		$data['content'] = $this->load->view('struktur_modal/add_bagan',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function struk()
	{
		$data['data']	 = $this->M_kota->get();
		$data['content'] = $this->load->view('struktur_modal/add',$data,true);
		$this->load->view('dashboard',$data);
	}

	function save_struktur_modal(){
		$responseCode = 200;
		$responseStatus = '';
		$responseMessage = 'Data berhasil disimpan';
		$responseData = [];

		$post = $this->input->post();
		$mod_inti_1 		= $post['mod_inti_1'];
		$mod_pelengkap_1 	= $post['mod_pelengkap_1'];
		$tot_modal_1 		= $post['tot_modal_1'];
		$mod_inti_2 		= $post['mod_inti_2'];
		$mod_pelengkap_2 	= $post['mod_pelengkap_2'];
		$tot_modal_2 		= $post['tot_modal_2'];
		$data1 = array(
			'MODAL_INTI'=>$mod_inti_1 ,
			'MODAL_PELENGKAP'=>$mod_pelengkap_1,
			'TOTAL_MODAL'=>$tot_modal_1
			);
		$data2 = array(
			'MODAL_INTI'=>$mod_inti_2 ,
			'MODAL_PELENGKAP'=>$mod_pelengkap_2,
			'TOTAL_MODAL'=>$tot_modal_2
			);

		if($this->session->userdata('kota') == 1){
			$this->M_kota->save($data1,1);
			// $responseData['struktur_modal'] = $data1;
		}else{
			$this->M_kota->save($data2,2);
			// $responseData['struktur_modal'] = $data2;
		}

		$response = helpResponse($responseCode, $responseData, $responseMessage, $responseStatus);

		echo json_encode($response);
	}

	function save_foto($current_id=null)
	{
		$id = md5($current_id);
		if($_FILES['file']['name']){
			if(!is_dir("./ffdwjws/struktur")){
				mkdir("./ffdwjws/struktur");
			}

			if(!is_dir("./ffdwjws/struktur/".$id )){
				mkdir("./ffdwjws/struktur/".$id);
			}

			if(!is_dir("./ffdwjws/struktur/".$id )){
				mkdir("./ffdwjws/struktur/".$id);
			}

			$directory = "./ffdwjws/struktur/".$id;

			$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

			$uploadfile = $_FILES['file']['name'];

			$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
			$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);
			chmod($directory."/".$file_name,0644);

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

				$get_old_file = $this->M_kota->get($current_id);
				if(file_exists($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI'])){
					unlink($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI']);
					if(file_exists($directory.'/thumb100x100_'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/thumb100x100_'.$get_old_file['STRUKTUR_ORGANISASI'])){
						unlink($directory.'/thumb100x100_'.$get_old_file['STRUKTUR_ORGANISASI']);
					}

					if(file_exists($directory.'/thumb300x300_'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/thumb300x300_'.$get_old_file['STRUKTUR_ORGANISASI'])){
						unlink($directory.'/thumb300x300_'.$get_old_file['STRUKTUR_ORGANISASI']);
					}

					if(file_exists($directory.'/thumb50x50_'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/thumb50x50_'.$get_old_file['STRUKTUR_ORGANISASI'])){
						unlink($directory.'/thumb50x50_'.$get_old_file['STRUKTUR_ORGANISASI']);
					}
				}

				$configs = array();
				$configs[] = array('source_image' => $data['file_name'], 'new_image' => 'thumb100x100_'.$data['file_name'], 'width' => 100, 'height' => 100, 'maintain_ratio' => FALSE);
				$configs[] = array('source_image' => $data['file_name'], 'new_image' => 'thumb300x300_'.$data['file_name'], 'width' => 300, 'height' => 300, 'maintain_ratio' => FALSE);
				$configs[] = array('source_image' => $data['file_name'], 'new_image' => 'thumb50x50_'.$data['file_name'], 'width' => 50, 'height' => 50, 'maintain_ratio' => FALSE);
				
				$this->load->library('image_lib');
				foreach ($configs as $config) {
					$this->image_lib->thumb($config, FCPATH . $directory.'/');
				}
			    // clear //
				$this->image_lib->clear();

				$this->M_kota->save(array(
					'STRUKTUR_ORGANISASI'=>$data['file_name']
					),$current_id);
				redirect('struktur/bagan');
			}
		}
		redirect('struktur/bagan');
	}
}
