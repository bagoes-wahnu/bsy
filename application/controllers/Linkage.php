<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Linkage extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_linkage');
		$this->load->model('M_linkage_kota', 'linkage_kota');
	}

	public function detail_link($id=null)
	{
		$data['content'] = $this->load->view('linkage/detail','',true);
		$this->load->view('dashboard',$data);
	}

	public function grid()
	{
		$id_kota = $this->session->userdata('kota');
		// $data['linkage'] = $this->linkage_kota->get_data($id_kota);
		// if($id_kota == 0){
			// $data['linkage'] = $this->M_linkage->get_by(array('DELETED' => 0));
		// }else{
			$data['linkage'] = $this->M_linkage->get_by(array('ID_KOTA' => $id_kota, 'DELETED' => 0));
		// }

		$data['content'] = $this->load->view('linkage/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_linkage)){

				$data = $this->M_linkage->get($id_linkage);
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

	public function delete_linkage($id_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_linkage)){				

				$data = $this->M_linkage->get($id_linkage);
				if(!empty($data)){
					$this->M_linkage->save(array('DELETED' => 1), $id_linkage);
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

	public function save($id_linkage='')
	{
		$this->form_validation->set_rules("nama_bank","Nama Bank","required");
		$this->form_validation->set_rules("tipe","Tipe Bank","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"nama_bank"=>form_error("nama_bank"),
				"tipe"=>form_error("tipe"),
				);
			echo json_encode($res);
		} else {
			$err=0;
			$id_kota = $this->session->userdata('kota');
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('ID_KOTA' => $id_kota, 'NAMA_BANK' => $post['nama_bank'], 'TYPE' => $post['tipe'], 'STATUS' => $status);

			if(!empty($id_linkage)){
				$current_id = $this->M_linkage->save($data, $id_linkage);
			}else{
				$current_id = $this->M_linkage->save($data);
			}

			$id = md5($current_id);

			if($_FILES['file']['name']){
				if(!is_dir("./ffdwjws/logo")){
					mkdir("./ffdwjws/logo");
				}

				if(!is_dir("./ffdwjws/logo/".$id )){
					mkdir("./ffdwjws/logo/".$id);
				}

				if(!is_dir("./ffdwjws/logo/".$id )){
					mkdir("./ffdwjws/logo/".$id);
				}

				$directory = "./ffdwjws/logo/".$id;

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

					// $configs = array();
					// $configs[] = array('source_image' => $data['file_name'], 'new_image' => 'thumb400x400_'.$data['file_name'], 'width' => 400, 'height' => 400, 'maintain_ratio' => FALSE);

					// $this->load->library('image_lib');
					// foreach ($configs as $config) {
					// 	$this->image_lib->thumb($config, FCPATH.$directory.'/');
					// }

					$get_old_file = $this->M_linkage->get($current_id);
					if(file_exists($directory.'/'.$get_old_file['LOGO']) and !is_dir($directory.'/'.$get_old_file['LOGO'])){
						unlink($directory.'/'.$get_old_file['LOGO']);
						if(file_exists($directory.'/thumb400x400_'.$get_old_file['LOGO']) and !is_dir($directory.'/thumb400x400_'.$get_old_file['LOGO'])){
							unlink($directory.'/thumb400x400_'.$get_old_file['LOGO']);
						}
					}

					$this->M_linkage->save(array(
						'LOGO'=>$data['file_name']
						),$current_id);
				}
			}

			if($err > 0){
				$msg = 'Data berhasil disimpan. Namun, logo tidak berhasil diupload';
			}else{
				$msg = 'Data berhasil disimpan';
			}

			echo json_encode(array('status' => 'OK', 'msg' => $msg));
		}
	}

	public function kirim_notif($token=null, $notif_id, $message, $jenis)
    {
        $message_status = array();
        $tokens[] = "c37pqMBRSSc:APA91bFQRixKiJ2-N7Q2cg2wHNj-1TaNzrB_kE5mCgF7XzMRp0Dn9NvZ70Vce5K8L5T81MAThlTh2YBKEY78QdcVdFPYYDhpdXYNqMTYyQiA7PH9ja97EE1sT6Ct4FWwz0uXQiHu3cQx";

        $firebase_message =  array(
            "notif_id"  => $notif_id,
            "title"     => "Suryayudha Bank",
            "message"   => $message,
            "jenis"     => $jenis
            );

        $response = $this->fcm->send_notification($tokens, $firebase_message);
        $message_status[] = array('notif'=>$firebase_message,'response'=>$response);    
        
        echo "<pre>";
        var_dump($message_status);
        echo "</pre>";
    }
}
