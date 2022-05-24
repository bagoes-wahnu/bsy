<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Direksi extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_direksi');
		$this->load->model('M_direksi_timeline');
		$this->load->model('M_jabatan');
		date_default_timezone_set("Asia/Jakarta");
	}
	public function grid()
	{
		$data['direksi'] = $this->M_direksi->get();
		$data['jabatan'] = $this->M_jabatan->get_by(array('STATUS'=>1));
		// var_dump($data['jabatan']);
		$data['content'] = $this->load->view('direksi/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function timeline($id=null)
	{
		$data['id']		= $id;
		$data['data']	= $this->M_direksi_timeline->get_by(array('ID_DIREKSI'=>$id));
		$data['content'] = $this->load->view('direksi/timeline',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_direksi='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_direksi)){				

				$data = $this->M_direksi->get($id_direksi);
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

	// public function delete_linkage($id_direksi='')
	// {
	// 	$result = array();
	// 	if($this->input->is_ajax_request()){
	// 		if(!empty($id_direksi)){				

	// 			$data = $this->M_direksi->get($id_direksi);
	// 			if(!empty($data)){
	// 				$this->M_direksi->save(array('DELETED' => 1), $id_direksi);
	// 				$result = array('status' => 'OK', 'msg' => 'Data berhasil dihapus');
	// 			}else{
	// 				$result = array('status' => 'NOT_FOUND', 'msg' => 'Data tidak tersedia');
	// 			}
	// 		}else{
	// 			$result = array('status' => 'DATA_IS_REQUIRED', 'msg' => 'Ada parameter yang tidak terkirim');
	// 		}
	// 	}else{
	// 		$result = array('status' => 'FORBIDDEN', 'msg' => 'Anda tidak memiliki hak untuk melakukan tindakan ini');
	// 	}

	// 	echo json_encode($result);
	// }

	public function save($id_direksi='')
	{
		$this->form_validation->set_rules("nama","Nama ","required");
		// $this->form_validation->set_rules("jabatan","Jabatan ","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"nama"=>form_error("nama"),
				// "jabatan"=>form_error("jabatan"),
				);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$narasi = (isset($post['narasi']))? $post['narasi'] : NULL;
			$data = array('NAMA' => $post['nama'], 'STATUS' => $status, 'DESKRIPSI' => $narasi);

			if(!empty($id_direksi)){
				$current_id = $this->M_direksi->save($data, $id_direksi);
			}else{
				$current_id = $this->M_direksi->save($data);
			}

			$id = md5($current_id);

			if($_FILES['file']['name']){
				if(!is_dir("./ffdwjws/direksi")){
					mkdir("./ffdwjws/direksi");
				}

				if(!is_dir("./ffdwjws/direksi/".$id )){
					mkdir("./ffdwjws/direksi/".$id);
				}

				if(!is_dir("./ffdwjws/direksi/".$id )){
					mkdir("./ffdwjws/direksi/".$id);
				}

				$directory = "./ffdwjws/direksi/".$id;

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

					$get_old_file = $this->M_direksi->get($current_id);
					if(file_exists($directory.'/'.$get_old_file['FOTO']) and !is_dir($directory.'/'.$get_old_file['FOTO'])){
						unlink($directory.'/'.$get_old_file['FOTO']);
						if(file_exists($directory.'/thumb400x400_'.$get_old_file['FOTO']) and !is_dir($directory.'/thumb400x400_'.$get_old_file['FOTO'])){
							unlink($directory.'/thumb400x400_'.$get_old_file['FOTO']);
						}
					}

					$this->M_direksi->save(array(
						'FOTO'=>$data['file_name']
						),$current_id);
				}
			}

			if($err > 0){
				$msg = 'Data berhasil disimpan. Namun, foto tidak berhasil diupload';
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
    function save_timeline($id_direksi=null)
    {
    	$post = $this->input->post();
    	$periodeAwal = $post['periodeAwal'];
		$periodeAwal =  date('Y-m-d', strtotime($periodeAwal));

		if(isset($post['periodeAkhir']) and !empty($post['periodeAkhir'])){
			$periodeAkhir = $post['periodeAkhir'];
			$periodeAkhir =  date('Y-m-d', strtotime($periodeAkhir));
		}else{
			$periodeAkhir = NULL;
		}

    	$data = array(
			"ID_DIREKSI"=>$id_direksi,
			"ID_RIWAYAT"=>$post['riwayat'],
			"LOKASI"=>$post['lokasi'],
			"DETAIL"=>$post['detail'],
			"AWAL"=>$periodeAwal,
			"AKHIR"=>$periodeAkhir ,
			"KETERANGAN"=>$post['editor2'],
			"TIME"=>date("Y-m-d H:i:s")
    	);
		$this->M_direksi_timeline->save($data);
		redirect('direksi/timeline/'.$id_direksi);
    }
    function edit_timeline($id=false)
    {
    	//echo "string";
    	$data['id']		=$id;
    	$data['data']	= $this->M_direksi_timeline->get($id);
		 $this->load->view('direksi/edit_timeline',$data,false);
    }
    
    function update_timeline($id=null)
    {
    	$post = $this->input->post();
    	$periodeAwal = $post['periodeAwal'];
		$periodeAwal =  date('Y-m-d', strtotime($periodeAwal));

		if(isset($post['periodeAkhir']) and !empty($post['periodeAkhir'])){
			$periodeAkhir = $post['periodeAkhir'];
			$periodeAkhir =  date('Y-m-d', strtotime($periodeAkhir));
			// $periodeAkhir = 'a';
		}else{
			$periodeAkhir = NULL;
		}

    	$data = array(
			"ID_RIWAYAT"=>$post['riwayat'],
			"LOKASI"=>$post['lokasi'],
			"DETAIL"=>$post['detail'],
			"AWAL"=>$periodeAwal,
			"AKHIR"=>$periodeAkhir ,
			"KETERANGAN"=>$post['editor2']
    	);
		$this->M_direksi_timeline->save($data,$id);
		$id_direksi = $this->M_direksi_timeline->get($id);
		//echo $id_direksi['ID_DIREKSI'];
		redirect('direksi/timeline/'.$id_direksi['ID_DIREKSI']);
    }
}
