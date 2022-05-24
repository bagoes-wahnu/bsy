<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends E_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    
	public function index()
	{
		if ($this->session->userdata('id_user')) {
            redirect(base_url('beranda'));
        } else {
            $this->load->view('login');
        }
	}

    public function login()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required|md5');

        if ($this->form_validation->run() != FALSE) {
            $loginUser  = $this->input->post('username');
            $passUser   = $this->input->post('password');

            $query = $this->M_user->get_by(array('USERNAME' => $loginUser, 'PASSWORD' => $passUser));
            if (!empty($query)) {
                if($query[0]['ID_KOTA']!=NULL){
                    $kota = $query[0]['ID_KOTA'];
                }else{
                    $kota = 0;
                }
                $this->session->set_userdata('id_user', $query[0]['ID_USER']);
                $this->session->set_userdata('username', $query[0]['USERNAME']);
                $this->session->set_userdata('role', $query[0]['ROLE']);
                $this->session->set_userdata('kota', $kota);
                $this->session->set_userdata('nama_lengkap', $query[0]['NAMA_LENGKAP']);

                $this->session->set_userdata('statusLogin',TRUE);

                // $kunci = hash('sha256',($key['USERNAME'].$key['PASSWORD']));
                // $file = [
                //     'KEY' => $kunci
                // ];
                // array_push($response, $file); 

                // $this->M_user->save($file, $query[0]['ID_USER']);

                if ($this->session->userdata('role') == 1)
                    redirect('beranda');
                else
                    redirect('beranda');
            }else{
                $alerts[] = array('danger', 'Username atau Password salah');
                $this->session->set_flashdata('alerts', $alerts);
                redirect('auth');
            }
        } else{
            
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
