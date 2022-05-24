<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends E_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->model('M_pendidikan');
        $this->load->model('M_kota');
    }

	public function grid()
	{
		$data['pendidikan'] = $this->M_pendidikan->get_by(array('DELETED'=>0));
		//var_dump($data['pendidikan']);
		$data['content'] = $this->load->view('pendidikan/grid',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function sdm()
	{
		$data['data']	 	= $this->M_kota->get();
		$data['content'] 	= $this->load->view('pendidikan/sdm',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get($id_pendidikan='')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			if(!empty($id_pendidikan)){				

				$data = $this->M_pendidikan->get($id_pendidikan);
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

	// public function delete_pendidikan($id_pendidikan='')
	// {
	// 	$result = array();
	// 	if($this->input->is_ajax_request()){
	// 		if(!empty($id_pendidikan)){				

	// 			$data = $this->M_pendidikan->get($id_pendidikan);
	// 			if(!empty($data)){
	// 				$this->M_pendidikan->save(array('DELETED' => 1), $id_pendidikan);
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

	public function save($id_pendidikan='')
	{
		$this->form_validation->set_rules("pendidikan","Pendidikan","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"pendidikan"=>form_error("pendidikan")
				);
			echo json_encode($res);
		} else {
			$post = $this->input->post();
			$status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
			$data = array('PENDIDIKAN' => $post['pendidikan'], 'STATUS' => $status);

			if(!empty($id_pendidikan)){
				$this->M_pendidikan->save($data, $id_pendidikan);
			}else{
				$this->M_pendidikan->save($data);
			}

			echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));
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
    function save_pendidikan()
    {
    	
		$post = $this->input->post();
		//var_dump($post);
		$laki_laki_1 = $post['laki_laki_1'];
		$perempuan_1 = $post['perempuan_1'];
		$sdsmp_1 = $post['sdsmp_1'];
		$smak_1 = $post['smak_1'];
		$d3_1 = $post['d3_1'];
		$s1_1 = $post['s1_1'];
		$s2_1 = $post['s2_1'];
		$laki_laki_2 = $post['laki_laki_2'];
		$perempuan_2 = $post['perempuan_2'];
		$sdsmp_2 = $post['sdsmp_2'];
		$smak_2 = $post['smak_2'];
		$d3_2 = $post['d3_2'];
		$s1_2 = $post['s1_2'];
		$s2_2 = $post['s2_2'];
		$data1 = array(
			"L"=>$laki_laki_1,
			"P"=>$perempuan_1,
			"SD"=>$sdsmp_1,
			"SMA"=>$smak_1,
			"D3"=>$d3_1,
			"S1"=>$s1_1,
			"S2"=>$s2_1
		);
		$data2 = array(
			"L"=>$laki_laki_2,
			"P"=>$perempuan_2,
			"SD"=>$sdsmp_2,
			"SMA"=>$smak_2,
			"D3"=>$d3_2,
			"S1"=>$s1_2,
			"S2"=>$s2_2
		);
		//var_dump($data1);
		$this->M_kota->save($data1,1);
		$this->M_kota->save($data2,2);
		//var_dump($post);
	
    }
}
