<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends E_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->model('M_kantor', 'kantor');
    }

    public function index()
    {
        $result = array('status' => 'FORBIDDEN');
        $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));

        $this->form_validation->set_rules('id_kota', 'Kota', 'required');
        $this->form_validation->set_rules('group', 'Group', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $keyword = $this->input->post('keyword');

            $get_data = $this->kantor->search($id_kota, $group, $keyword);

            if(!empty($get_data)){
                $result = array('status' => 'OK', 'data' => $get_data);
            }else{
                if(!empty($keyword)){
                    $result = array('status' => 'NOT_FOUND');
                }else{
                    $result = array('status' => 'EMPTY');
                }
            }
        }

        echo json_encode($result);
    }

}

/* End of file Auth.php */
/* Location: ./application/controllers/api/Auth.php */