<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_kas');
		$this->load->model('M_cabang');
		$this->load->model('M_wilayah');
	}

	public function grid()
	{
		$data['wilayah'] = $this->M_wilayah->get_data_active();
		$data['cabang'] = $this->M_cabang->get_data();
		$data['content'] = $this->load->view('cabang/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_cabang='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_cabang)){				

				$data = $this->M_cabang->get($id_cabang);
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

	public function get_by_wilayah()
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($this->input->post('id_wilayah'))){				
				$id_wilayah = $this->input->post('id_wilayah');

				$wilayah = $this->M_wilayah->get($id_wilayah);
				if(!empty($wilayah)){
					$cabang = $this->M_cabang->get_by_wilayah($id_wilayah);
					$data = '<option value="">Pilih Cabang</option>';
					$counter=0;
					foreach ($cabang as $value) {
						$counter++;
						$data .= '<option value="'.$value['ID_CABANG'].'">'.$value['CABANG'].'</option>';
					}
					$result = array('status' => 'OK', 'data' => $data, 'counter' => $counter);
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

	public function delete_cabang($id_cabang='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_cabang)){				

				$data = $this->M_cabang->get($id_cabang);
				if(!empty($data)){
					$this->M_cabang->save(array('DELETED' => 1), $id_cabang);
					$get_kas = $this->M_kas->get_by(array('ID_CABANG' => $id_cabang));
					foreach ($get_kas as $value) {
						$directory = "./ffdwjws/kas/".md5($value['ID_KAS']);

						$ext = pathinfo($directory.'/'.$value['FOTO'], PATHINFO_EXTENSION);

						if(file_exists($directory.'/'.$value['FOTO']) and !is_dir($directory.'/'.$value['FOTO'])){
							unlink($directory.'/'.$value['FOTO']);
							$raw_name = explode('.'.$ext, $value['FOTO']);

							if(file_exists($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext)){
								unlink($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext);
							}

							if(file_exists($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext)){
								unlink($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext);
							}

							if(file_exists($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext)){
								unlink($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext);
							}
						}

						if(is_dir($directory)){
							rmdir($directory);
						}

						$this->M_kas->delete($value['ID_KAS']);
					}

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

	public function save($id_cabang='')
	{
		$this->form_validation->set_rules("cabang","Nama Cabang","required");
		$this->form_validation->set_rules("wilayah","Wilayah","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"cabang"=>form_error("cabang"),
				"wilayah"=>form_error("wilayah"),
				);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('CABANG' => $post['cabang'], 'ID_WILAYAH' => $post['wilayah'], 'STATUS' => $status,'ALAMAT' => $post['alamat'],'KECAMATAN' => $post['kecamatan'],'NO_TELP' => $post['no_telp']);

			if(!empty($id_cabang)){
				$current_id = $this->M_cabang->save($data, $id_cabang);
			}else{
				$current_id = $this->M_cabang->save($data);
			}
			$id = md5($current_id);

			if($_FILES['file']['name']){
				if(!is_dir("./ffdwjws/cabang")){
					mkdir("./ffdwjws/cabang");
				}

				if(!is_dir("./ffdwjws/cabang/".$id )){
					mkdir("./ffdwjws/cabang/".$id);
				}

				// if(!is_dir("./ffdwjws/cabang/".$id."/thumbs" )){
				// 	mkdir("./ffdwjws/cabang/".$id."/thumbs");
				// }

				$directory = "./ffdwjws/cabang/".$id;

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size'] 		= 1000000;
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$err++;
				}else{
					$data = $this->upload->data();


					$get_old_file = $this->M_cabang->get($current_id);
					if(file_exists($directory.'/'.$get_old_file['FOTO']) and !is_dir($directory.'/'.$get_old_file['FOTO'])){
						unlink($directory.'/'.$get_old_file['FOTO']);
						if(file_exists($directory.'/thumb400x400_'.$get_old_file['FOTO']) and !is_dir($directory.'/thumb400x400_'.$get_old_file['FOTO'])){
							unlink($directory.'/thumb400x400_'.$get_old_file['FOTO']);
						}
					}

					$configs = array();
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb100x100'.$data['file_ext'], 'width' => 100, 'height' => 100, 'maintain_ratio' => FALSE);
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb300x300'.$data['file_ext'], 'width' => 300, 'height' => 300, 'maintain_ratio' => FALSE);
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb50x50'.$data['file_ext'], 'width' => 50, 'height' => 50, 'maintain_ratio' => FALSE);
					
					$this->load->library('image_lib');
					foreach ($configs as $config) {
						$this->image_lib->thumb($config, FCPATH . $directory.'/');
					}
				    // clear //
					$this->image_lib->clear();

					$this->M_cabang->save(array(
						'FOTO'=>$data['file_name']
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
	public function grid_baru($id=null)
	{
		if(!empty($id)){
			$wilayah = $this->M_wilayah->get_by(array('ID_WILAYAH'=>$id, 'DELETED' => 0));
			if(!empty($wilayah)){
				$data['wilayah'] = $wilayah;
				$data['cabang'] = $this->M_cabang->get_by(array('ID_WILAYAH'=>$id, 'DELETED' => 0));
				$data['content'] = $this->load->view('cabang/grid_baru',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$this->load->view('errors/error_404');
		}
	}
}
