<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_kas');
		$this->load->model('M_cabang');
		$this->load->model('M_wilayah');
	}
	public function grid_baru($id=null)
	{
		if(!empty($id)){
			$cabang = $this->M_cabang->get($id);
			if(!empty($cabang) and $cabang['DELETED'] == 0){
				$data['cabang'] = $cabang;
				$data['kas'] = $this->M_kas->get_by(array('ID_CABANG'=>$id));
				$data['content'] = $this->load->view('kas/grid_baru',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$this->load->view('errors/error_404');
		}
	}
	public function get($id_kas='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kas)){				
				$data = $this->M_kas->get($id_kas);
				// dump($data);
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

	// function fsmodify($obj) {
 //       $chunks = explode('/', $obj);
 //       chmod($obj, is_dir($obj) ? 0777 : 0644);
 //       chown($obj, 'demo');
 //       // chgrp($obj, $chunks[2]);
 //    }


 //    function fsmodifyr($dir) 
 //    {
 //       if($objs = glob($dir."/*")) {        
 //           foreach($objs as $obj) {
 //               fsmodify($obj);
 //               if(is_dir($obj)) fsmodifyr($obj);
 //           }
 //       }

 //       return fsmodify($dir);
 //    }

	public function save($id_kas='')
	{
		$out = 0;
		$this->form_validation->set_rules("kas","Kas","required");
		$this->form_validation->set_rules("id_cabang","id_cabang","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"kas"=>form_error("kas"),
				"id_cabang"=>form_error("id_cabang")
				);
			echo json_encode($res);
		} else {
			$err=0;
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('KAS' => $post['kas'], 'ALAMAT' => $post['alamat'],'KECAMATAN' => $post['kecamatan'],'NO_TELP' => $post['no_telp'],'ID_CABANG' => $post['id_cabang'], 'STATUS' => $status, 'KATEGORI' => $post['kategori']);

			if(!empty($id_kas)){
				$current_id = $this->M_kas->save($data, $id_kas);
			}else{
				$current_id = $this->M_kas->save($data);
			}
			$id = md5($current_id);

			if($_FILES['file']['name']){
				if(!is_dir("ffdwjws/kas")){
					mkdir("ffdwjws/kas", 0777);
					// chown();
				}

				if(!is_dir("ffdwjws/kas/".$id )){
					mkdir("ffdwjws/kas/".$id, 0777);
					// $this->fsmodifyr("ffdwjws/kas/".$id);
					// chown("ffdwjws/kas/".$id, 'demo');
					// chmod("ffdwjws/kas/".$id, 0777);
				}

				// if(!is_dir("./ffdwjws/kas/".$id."/thumbs" )){
				// 	mkdir("./ffdwjws/kas/".$id."/thumbs");
				// }

				$directory = "ffdwjws/kas/".$id;

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'jpeg|jpg|png';
				$config['max_size'] 		= 1000000;
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;

				$response = [];
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$err++;
				}else{
					$data = $this->upload->data();

					$get_old_file = $this->M_kas->get($current_id);
					$ext = pathinfo($directory.'/'.$get_old_file['FOTO'], PATHINFO_EXTENSION);
					if(file_exists($directory.'/'.$get_old_file['FOTO']) and !is_dir($directory.'/'.$get_old_file['FOTO'])){
						unlink($directory.'/'.$get_old_file['FOTO']);
						$raw_name = explode('.'.$ext, $get_old_file['FOTO']);
						$out++;
						if(file_exists($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext)){
							unlink($directory.'/'.$raw_name[0].'_thumb100x100.'.$ext);
							// $out++;
						}

						if(file_exists($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext)){
							unlink($directory.'/'.$raw_name[0].'_thumb300x300.'.$ext);
						}

						if(file_exists($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext) and !is_dir($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext)){
							unlink($directory.'/'.$raw_name[0].'_thumb50x50.'.$ext);
						}

					}

					$configs = array();
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb100x100'.$data['file_ext'], 'width' => 100, 'height' => 100, 'maintain_ratio' => FALSE);
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb300x300'.$data['file_ext'], 'width' => 300, 'height' => 300, 'maintain_ratio' => FALSE);
					$configs[] = array('source_image' => $data['file_name'], 'new_image' => $data['raw_name'].'_thumb50x50'.$data['file_ext'], 'width' => 50, 'height' => 50, 'maintain_ratio' => FALSE);
					
					$this->load->library('image_lib');
					
					foreach ($configs as $config) {
						$this->image_lib->thumb($config, FCPATH . $directory.'/');
						// $this->image_lib->thumb($config, FCPATH.'/');
						$response[] = [$config,FCPATH.$directory.'/'];
						$this->image_lib->display_errors();
						$out++;
					}
				    // clear //
					$this->image_lib->clear();

					$this->M_kas->save(array(
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

	public function delete_kas($id_kas='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kas)){				

				$data = $this->M_kas->get($id_kas);
				if(!empty($data)){
					$directory = "./ffdwjws/kas/".md5($id_kas);

					$ext = pathinfo($directory.'/'.$data['FOTO'], PATHINFO_EXTENSION);

					if(file_exists($directory.'/'.$data['FOTO']) and !is_dir($directory.'/'.$data['FOTO'])){
						unlink($directory.'/'.$data['FOTO']);
						$raw_name = explode('.'.$ext, $data['FOTO']);

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

					$this->M_kas->delete($id_kas);
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
}