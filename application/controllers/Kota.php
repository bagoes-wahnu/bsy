<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_kota');
		$this->load->model('M_linkage');
		$this->load->model('M_linkage_kota');
		$this->load->model('M_d_linkage_kota');
	}

	public function grid()
	{
		$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0));
		$data['content'] = $this->load->view('kota/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function linkage($id_kota='')
	{
		if(!empty($id_kota)){				
			$get_data = $this->M_kota->get($id_kota);
			if(!empty($get_data)){
				$linkage = $this->M_linkage->get_by(array('STATUS' => 1, 'DELETED' => 0));
				$data['id_kota'] = $id_kota;
				$data['kota'] = $get_data;
				$data['linkage'] = $linkage;
				$data['linkage_kota'] = $this->M_linkage_kota->get_data($id_kota);
				$data['content'] = $this->load->view('kota/linkage',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$this->load->view('errors/error_404');
		}
	}

	public function detail_linkage($id_kota='', $id_linkage ='')
	{
		if(!empty($id_kota) AND !empty($id_linkage)){				
			$get_data = $this->M_linkage_kota->get_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
			if(!empty($get_data)){
				$kota = $this->M_kota->get($id_kota);
				if(($kota['STATUS'] == 1) and ($kota['DELETED'] == 0)){
					$linkage = $this->M_linkage->get($id_linkage);
					if(($linkage['STATUS'] == 1) and ($linkage['DELETED'] == 0)){
						$data['id_kota'] = $id_kota;
						$data['id_linkage'] = $id_linkage;
						$data['kota'] = $kota;
						$data['linkage'] = $linkage;
						$data['d_linkage_kota'] = $this->M_d_linkage_kota->get_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
						$data['content'] = $this->load->view('kota/detail_linkage',$data,true);
						$this->load->view('dashboard',$data);
					}else{
						$this->load->view('errors/error_404');
					}
				}else{
					$this->load->view('errors/error_404');
				}
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$this->load->view('errors/error_404');
		}
	}

	public function get($id_kota='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kota)){				

				$data = $this->M_kota->get($id_kota);
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

	public function get_detail_linkage_kota($id_d_linkage_kota='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_d_linkage_kota)){				

				$data = $this->M_d_linkage_kota->get($id_d_linkage_kota);
				if(!empty($data)){
					$data['TGL_PENCAIRAN'] = date('d-m-Y', strtotime($data['TGL_PENCAIRAN']));
					$data['TGL_JATUH_TEMPO'] = date('d-m-Y', strtotime($data['TGL_JATUH_TEMPO']));
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

	public function get_linkage_kota($id_kota='', $id_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kota) and !empty($id_linkage)){				

				$data = $this->M_linkage_kota->get_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
				if(!empty($data)){
					$data = $data[0];
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

	public function delete_kota($id_kota='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kota)){				

				$data = $this->M_kota->get($id_kota);
				if(!empty($data)){
					$this->M_kota->save(array('DELETED' => 1), $id_kota);
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

	public function delete_linkage_kota($id_kota='', $id_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_kota) and !empty($id_linkage)){				

				$data = $this->M_linkage_kota->get_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
				if(!empty($data)){
					$this->M_linkage_kota->delete_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
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

	public function delete_detail_linkage_kota($id_d_linkage_kota='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_d_linkage_kota)){				

				$data = $this->M_d_linkage_kota->get($id_d_linkage_kota);
				if(!empty($data)){
					$this->M_d_linkage_kota->delete($id_d_linkage_kota);
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

	public function save($id_kota='')
	{
		$this->form_validation->set_rules("kota","Kota","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"kota"=>form_error("kota")
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('KOTA' => $post['kota'], 'STATUS' => $status);

			if(!empty($id_kota)){
				$this->M_kota->save($data, $id_kota);
			}else{
				$this->M_kota->save($data);
			}

			echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));
		}
	}

	public function save_linkage_kota($id_kota='', $id_linkage='')
	{
		$result = array();
		$this->form_validation->set_rules("linkage","Nama Bank","required");
		$this->form_validation->set_rules("nominal","Nominal","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"linkage"=>form_error("linkage"),
				"nominal"=>form_error("nominal"),
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();

			if(!empty($id_linkage)){
				$this->M_linkage_kota->save(array('NOMINAL' => $post['nominal']), array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $id_linkage));
				$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
			}else{
				$cek = $this->M_linkage_kota->get_by(array('ID_KOTA' => $id_kota, 'ID_LINKAGE' => $post['linkage']));
				if(!empty($cek)){
					$result = array('status' => 'ERROR', 'msg' => 'Data sudah ada');
				}else{
					$this->M_linkage_kota->save(array('NOMINAL' => $post['nominal'], 'ID_KOTA' => $id_kota, 'ID_LINKAGE' => $post['linkage']));
					$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
				}
			}

			echo json_encode($result);
		}
	}

	public function save_detail_linkage_kota($id_d_linkage_kota='')
	{
		$result = array();
		$this->form_validation->set_rules("tgl_pencairan","Tanggal Pencairan","required");
		$this->form_validation->set_rules("tgl_jatuh_tempo","Tanggal Jatuh Tempo","required");
		$this->form_validation->set_rules("suku_bunga","Suku Bunga","required");
		$this->form_validation->set_rules("platfond","Platform","required");
		$this->form_validation->set_rules("baki_debet","Baki Debet","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"tgl_pencairan"=>form_error("tgl_pencairan"),
				"tgl_jatuh_tempo"=>form_error("tgl_jatuh_tempo"),
				"suku_bunga"=>form_error("suku_bunga"),
				"platfond"=>form_error("platfond"),
				"baki_debet"=>form_error("baki_debet"),
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();

			if(!empty($id_d_linkage_kota)){
				$data = array(
					'ID_KOTA' => $post['id_kota'],
					'ID_LINKAGE' => $post['id_linkage'],
					'TGL_PENCAIRAN' => date('Y-m-d', strtotime($post['tgl_pencairan'])), 
					'TGL_JATUH_TEMPO' => date('Y-m-d',strtotime($post['tgl_jatuh_tempo'])), 
					'SUKU_BUNGA' => $post['suku_bunga'],
					'PLATFOND' => $post['platfond'], 
					'BAKI_DEBET' => $post['baki_debet']);
				$this->M_d_linkage_kota->save($data, $id_d_linkage_kota);
				$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
			}else{
				$data = array(
					'ID_KOTA' => $post['id_kota'],
					'ID_LINKAGE' => $post['id_linkage'],
					'TGL_PENCAIRAN' => date('Y-m-d', strtotime($post['tgl_pencairan'])), 
					'TGL_JATUH_TEMPO' => date('Y-m-d',strtotime($post['tgl_jatuh_tempo'])), 
					'SUKU_BUNGA' => $post['suku_bunga'], 
					'PLATFOND' => $post['platfond'], 
					'BAKI_DEBET' => $post['baki_debet'], 
					'TIMESTAMP' => date('Y-m-d H:i:s'));
				$this->M_d_linkage_kota->save($data);
				$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
			}

			echo json_encode($result);
		}
	}

	public function save_modal($id_kota='')
	{
		$this->form_validation->set_rules("modal_inti","Modal Inti","required");
		$this->form_validation->set_rules("modal_pelengkap","Modal Pelengkap","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"modal_inti"=>form_error("modal_inti"),
				"modal_pelengkap"=>form_error("modal_pelengkap"),
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();
			$modal_inti =  str_replace('.', '', $post['modal_inti']);
			$modal_pelengkap =  str_replace('.', '', $post['modal_pelengkap']);
			$total_modal = $modal_inti + $modal_pelengkap;
			$data = array('MODAL_INTI' => $modal_inti, 'MODAL_PELENGKAP' => $modal_pelengkap, 'TOTAL_MODAL' => $total_modal);

			if(!empty($id_kota)){
				$this->M_kota->save($data, $id_kota);
			}else{
				$this->M_kota->save($data);
			}

			echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));
		}
	}

	public function save_struktur($id_kota='')
	{
		if(!empty($id_kota)){
			$kota = $this->M_kota->get($id_kota);
			if(!empty($kota)){
				$err=0;

				$id = md5($id_kota);

				if($_FILES['file']['name']){
					if(!is_dir("./ffdwjws/struktur_organisasi")){
						mkdir("./ffdwjws/struktur_organisasi");
					}

					if(!is_dir("./ffdwjws/struktur_organisasi/".$id )){
						mkdir("./ffdwjws/struktur_organisasi/".$id);
					}

					if(!is_dir("./ffdwjws/struktur_organisasi/".$id )){
						mkdir("./ffdwjws/struktur_organisasi/".$id);
					}

					$directory = "./ffdwjws/struktur_organisasi/".$id;

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

						$get_old_file = $this->M_kota->get($id_kota);
						if(file_exists($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI'])){
							unlink($directory.'/'.$get_old_file['STRUKTUR_ORGANISASI']);
							if(file_exists($directory.'/thumb400x400_'.$get_old_file['STRUKTUR_ORGANISASI']) and !is_dir($directory.'/thumb400x400_'.$get_old_file['STRUKTUR_ORGANISASI'])){
								unlink($directory.'/thumb400x400_'.$get_old_file['STRUKTUR_ORGANISASI']);
							}
						}

						$this->M_kota->save(array(
							'STRUKTUR_ORGANISASI'=>$data['file_name']
							),$id_kota);
					}

					if($err > 0){
						$result = array('status' => 'ERROR', 'msg' => 'File TIDAK berhasil diupload');
					}else{
						$result = array('status' => 'OK', 'msg' => 'File berhasil diupload');
					}

					echo json_encode($result);
				}else{
					$res = array(
						"status"=>"ERROR",
						"msg" => "Silahkan lengkapi form terlebih dahulu",
						"file"=>form_error("file")
						);
					echo json_encode($res);
				}

			}else{
				echo json_encode(array('status' => 'NOT_FOUND', 'msg' => 'Data tidak tersedia'));
			}
		}else{
			echo json_encode(array('status' => 'DATA_IS_REQUIRED', 'msg' => 'Ada parameter yang tidak terkirim'));
		}
	}
}
