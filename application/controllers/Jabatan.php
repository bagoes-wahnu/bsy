<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends E_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->model('M_jabatan');
    }

	public function grid()
	{
		$data['jabatan'] = $this->M_jabatan->get();
		$data['content'] = $this->load->view('jabatan/grid',$data,true);
		$this->load->view('dashboard',$data);
	}
	public function get($id_jabatan='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_jabatan)){				

				$data = $this->M_jabatan->get($id_jabatan);
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

	// public function delete_jabatan($id_jabatan='')
	// {
	// 	$result = array();
	// 	if($this->input->is_ajax_request()){
	// 		if(!empty($id_jabatan)){				

	// 			$data = $this->M_jabatan->get($id_jabatan);
	// 			if(!empty($data)){
	// 				$this->M_jabatan->save(array('DELETED' => 1), $id_jabatan);
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

	public function save($id_jabatan='')
	{
		$this->form_validation->set_rules("jabatan","Jabatan","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"jabatan"=>form_error("jabatan")
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('JABATAN' => $post['jabatan'], 'STATUS' => $status);

			if(!empty($id_jabatan)){
				$this->M_jabatan->save($data, $id_jabatan);
			}else{
				$urutan = $this->M_jabatan->get(false,1,false,'ORDER DESC');
				
				if($urutan!=NULL){
					$SELANJUTNYA = $urutan['ORDER'] + 1;
				}else{
					$SELANJUTNYA = 1 ;
				}
				$id_baru = $this->M_jabatan->save($data);
				$this->M_jabatan->save(array('ORDER'=>$SELANJUTNYA),$id_baru);
			}

			echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));
		}
	}
	function up_down($jenis,$id_jabatan)
	{
		$data = $this->M_jabatan->get($id_jabatan);
		$urutan =  $data['ORDER'];
		if ($jenis=='up') {
			if ($urutan!='1') {
				$urutan_baru = ($urutan - 1);
				$data_tmp = $this->M_jabatan->get_by(array('ORDER'=>$urutan_baru));
				$this->M_jabatan->save(array('ORDER'=>$urutan_baru), $id_jabatan);
				$urutan_tmp = ($data_tmp[0]['ORDER']+1);
				$this->M_jabatan->save(array('ORDER'=>$urutan_tmp), $data_tmp[0]['ID_JABATAN']);
			}
		}else{
			if ($jenis=='down') {
				$urutan_baru = ($urutan + 1);
				$data_tmp2 = $this->M_jabatan->get_by(array('ORDER'=>$urutan_baru),false,false,true);
				
				if ($data_tmp2!=null) {
					$this->M_jabatan->save(array('ORDER'=>$urutan_baru), $id_jabatan);
					//echo "string";
					$urutan_tmp = ($data_tmp2['ORDER']-1);
					$this->M_jabatan->save(array('ORDER'=>$urutan_tmp), $data_tmp2['ID_JABATAN']);
				}
				
				
			}
		}
		redirect('jabatan/grid');
	}
}
