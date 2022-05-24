<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_linkage extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_detail_linkage');
	}

	public function grid($id=null)
	{
		$id_kota = $this->session->userdata('kota');
		$data['id'] = $id;
		$data['id_kota'] = $id_kota;
		$data['linkage'] = $this->M_detail_linkage->get_by(array('DELETED' => 0,'ID_LINKAGE'=>$id, 'ID_KOTA' => $id_kota));
		$data['content'] = $this->load->view('linkage/grid_detail',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_detail_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_detail_linkage)){				

				$data = $this->M_detail_linkage->get($id_detail_linkage);
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

	public function delete_linkage($id_detail_linkage='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_detail_linkage)){				

				$data = $this->M_detail_linkage->get($id_detail_linkage);
				if(!empty($data)){
					$this->M_detail_linkage->save(array('DELETED' => 1), $id_detail_linkage);
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
		//echo $id_detail_linkage;
		echo json_encode($result);
	}

	public function save($id_linkage=null,$id_detail_linkage='')
	{
		$this->form_validation->set_rules("tgl_pencarian","Nama Bank","required");
		$this->form_validation->set_rules("jatuh_tempo","Tipe Bank","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"tgl_pencarian"=>form_error("tgl_pencarian"),
				"jatuh_tempo"=>form_error("jatuh_tempo"),
				);
			echo json_encode($res);
		} else {
			$err=0;
			$id_kota = $this->session->userdata('kota');
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$tgl_pencarian = $post['tgl_pencarian'];
			// $tgl_pencarian = str_replace('/', '-', $ab);
			$tgl_pencarian =  date('Y-m-d', strtotime($tgl_pencarian));

			$jatuh_tempo = $post['jatuh_tempo'];
			// $jatuh_tempo = str_replace('/', '-', $cd);
			$jatuh_tempo =  date('Y-m-d', strtotime($jatuh_tempo));

			$plaf_nilai = str_replace('.', '', $post['plaf_nilai']);
			$baki_debet = str_replace('.', '', $post['baki_debet']);


			$data = array(
				'ID_LINKAGE'=>$id_linkage,
				'ID_KOTA' => $id_kota,
				'TGL_PENCARIAN'=>$tgl_pencarian,
				'JATUH_TEMPO'=>$jatuh_tempo,
				'PLATFOND_BANK'=>$plaf_nilai,
				'BAKI_DEBIT'=>$baki_debet,
				'KELONGGARAN_TARIK'=>$post['kelong_tarik'],
				'BUNGA'=>$post['bunga']
			);

			if(!empty($id_detail_linkage)){
				$current_id = $this->M_detail_linkage->save($data, $id_detail_linkage);
			}else{
				$current_id = $this->M_detail_linkage->save($data);
			}

			
				$msg = 'Data berhasil disimpan';
			

			echo json_encode(array('status' => 'OK', 'msg' => $msg));
		}
	}
}
