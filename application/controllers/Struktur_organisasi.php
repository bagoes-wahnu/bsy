<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_struktur_organisasi');
		$this->load->model('M_jabatan');
		$this->load->model('M_direksi');
	}

	public function grid()
	{
		$id_kota = $this->session->userdata('kota');
		$data['direksi'] = $this->M_direksi->get_by(array('STATUS'=>1));
		$data['jabatan'] = $this->M_jabatan->get_by(array('STATUS'=>1));
		$data['content'] = $this->load->view('struktur_organisasi/grid',$data,true);
		
		$this->load->view('dashboard',$data);
	}
	public function get($id_struktur_organisasi='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_struktur_organisasi)){				

				$data = $this->M_struktur_organisasi->get($id_struktur_organisasi);
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

	public function delete_struktur_organisasi($id_struktur_organisasi='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_struktur_organisasi)){				

				$data = $this->M_struktur_organisasi->get($id_struktur_organisasi);
				if(!empty($data)){
					$this->M_struktur_organisasi->delete($id_struktur_organisasi);
					// $this->M_struktur_organisasi->save(array('DELETED' => 1), $id_struktur_organisasi);
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

	public function save($id_struktur_organisasi='')
	{
		$this->form_validation->set_rules("direksi","Direksi","required");
		$this->form_validation->set_rules("jabatan","Jabatan","required");


		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"jabatan"=>form_error("jabatan"),
				"direksi"=>form_error("direksi")
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();
			// $status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$kota = $this->session->userdata('kota');
			$data = array(
				'ID_JABATAN'=>$post['jabatan'],
				'ID_KOTA'=>$kota,
				'ID_DIREKSI'=>$post['direksi'],
				'KETERANGAN'=>$post['keterangan']
				);

			if(!empty($id_struktur_organisasi)){
				$this->M_struktur_organisasi->save($data, $id_struktur_organisasi);
				$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
			}else{
				$cek_data = $this->M_struktur_organisasi->get_by(array('ID_JABATAN' => $post['jabatan'], 'ID_DIREKSI' => $post['direksi'], 'ID_KOTA' => $kota), false, false, true);

				if(!empty($cek_data)){
					$result = array('status' => 'DATA_IS_ALREADY_EXIST', 'msg' => 'Data sudah ada');
				}else{
					$urutan = $this->M_struktur_organisasi->get_by(array('ID_JABATAN'=>$post['jabatan']),false,false,true,false,'URUTAN DESC');
						//echo "urutan = ";
						//var_dump($urutan);
					if($urutan!=NULL){
						$SELANJUTNYA = $urutan['URUTAN'] + 1;
					}else{
						$SELANJUTNYA = 1 ;
					}
					$id_baru = $this->M_struktur_organisasi->save($data);
					//echo "id =".$id_baru;

					$this->M_struktur_organisasi->save(array('URUTAN'=>$SELANJUTNYA),$id_baru);
					$result = array('status' => 'OK', 'msg' => 'Data berhasil disimpan');
				}

			}

			echo json_encode($result);
		}
	}
	
	function up_down($jenis,$id_struktur_organisasi)
	{
		$data = $this->M_struktur_organisasi->get($id_struktur_organisasi);
		$data_by_jabatan = $this->M_struktur_organisasi->get_by_jabatan($data['ID_JABATAN']);
		
		$current_index = null;
		$up_index = null;
		$down_index = null;
		
		$arr_urutan = [];
		foreach ($data_by_jabatan as $index => $value) {
			$arr_urutan[$index] = ['id'=>$value['ID_JABATAN_DIR'],'urutan'=>$value['URUTAN'],'default_urutan'=>$index+1];
			if($value['ID_JABATAN_DIR'] == $id_struktur_organisasi){
				$current_index = $index;
			}
		}

		$up_index  = $current_index-1;
		$down_index  = $current_index+1;

		if ($jenis=='up') 
		{
			if($current_index != 0){
				$this->M_struktur_organisasi->save(array('URUTAN'=>$arr_urutan[$up_index]['default_urutan']), $id_struktur_organisasi);
				$this->M_struktur_organisasi->save(array('URUTAN'=>$arr_urutan[$current_index]['default_urutan']), $arr_urutan[$up_index]['id']);
			}
		}
		else
		{
			if((count($data_by_jabatan)-1) !== $current_index)
			{
				$this->M_struktur_organisasi->save(array('URUTAN'=>$arr_urutan[$down_index]['default_urutan']), $id_struktur_organisasi);
				$this->M_struktur_organisasi->save(array('URUTAN'=>$arr_urutan[$current_index]['default_urutan']), $arr_urutan[$down_index]['id']);
			}
		}
		
		redirect('struktur_organisasi/grid');
	}
}
