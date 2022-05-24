<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wilayah extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_kota');
		$this->load->model('M_kas');
		$this->load->model('M_cabang');
		$this->load->model('M_wilayah');
	}

	public function grid()
	{
		$data['kota'] = $this->M_kota->get_by(array('STATUS' => 1, 'DELETED' => 0));
		$data['wilayah'] = $this->M_wilayah->get_data();
		$data['content'] = $this->load->view('wilayah/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_wilayah='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_wilayah)){				

				$data = $this->M_wilayah->get($id_wilayah);
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

	public function get_by_kota()
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($this->input->post('id_kota'))){				
				$id_kota = $this->input->post('id_kota');

				$kota = $this->M_kota->get($id_kota);
				if(!empty($kota)){
					$wilayah = $this->M_wilayah->get_by_kota($id_kota);
					$data = '<option value="">Pilih Wilayah</option>';
					$counter=0;
					foreach ($wilayah as $value) {
						$counter++;
						$data .= '<option value="'.$value['ID_WILAYAH'].'">'.$value['WILAYAH'].'</option>';
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

	public function delete_wilayah($id_wilayah='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_wilayah)){				

				$data = $this->M_wilayah->get($id_wilayah);
				if(!empty($data)){
					$get_cabang = $this->M_cabang->get_by(array('ID_WILAYAH' => $id_wilayah));
					foreach ($get_cabang as $cabang) {
						$get_kas = $this->M_kas->get_by(array('ID_CABANG' => $cabang['ID_CABANG']));
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
					}
					$this->M_cabang->save(array('DELETED' => 1), array('ID_WILAYAH' => $id_wilayah));
					$this->M_wilayah->save(array('DELETED' => 1), $id_wilayah);
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

	public function save($id_wilayah='')
	{
		$this->form_validation->set_rules("wilayah","Nama Wilayah","required");
		$this->form_validation->set_rules("kota","Kota","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"wilayah"=>form_error("wilayah"),
				"kota"=>form_error("kota"),
				);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('WILAYAH' => $post['wilayah'], 'ID_KOTA' => $post['kota'], 'STATUS' => $status);

			if(!empty($id_wilayah)){
				$current_id = $this->M_wilayah->save($data, $id_wilayah);
			}else{
				$current_id = $this->M_wilayah->save($data);
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
    //overide wilayah
	public function grid_baru($id=null)
	{
		if(!empty($id)){
			$kota = $this->M_kota->get_by(array('STATUS' => 1, 'DELETED' => 0,'ID_KOTA'=>$id));
			if(!empty($kota)){
				$data['kota'] = $kota;
				$data['wilayah'] = $this->M_wilayah->get_by(array("ID_KOTA"=>$id, 'DELETED' => 0));
				$data['content'] = $this->load->view('wilayah/grid_baru',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$this->load->view('errors/error_404');
		}
	}
}
