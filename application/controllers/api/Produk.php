<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends E_Controller {
    private static $key     = '';
    private static $role    = '';
    private static $status  = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_produk');
        $this->load->model('M_sub_produk');
        $this->load->model('M_user');
        self::check();
    }

    private function check()
    {
        self::$key = $this->input->post("key");
        if (self::$key === '') {
            self::$status = ['STATUS'=>'Key is empty'];
            echo json_encode(self::$status);
            exit(0);
        } else {
            $user = $this->M_user->get_by(['KEY' => self::$key]);
            if (count($user) > 0) {
                self::$role = $user[0]['ROLE'];
            } else {
                self::$status = ['STATUS' => 'Key is invalid'];
                echo json_encode(self::$status);
                exit(0);
            }
        }
    }

    public function index()
    {
        $res = $this->M_produk->get_by(array('DELETED' => 0, 'STATUS' => 1));   

        foreach ($res as $row) {
            $imgurl = base_url().'Image/Handler?url=suku_bunga/'.md5($row['ID_PRODUK']).'/';
            $data[] = array(
                'ID_PRODUK'=> $row['ID_PRODUK'],
                'NAMA_PRODUK'=> ($row['NAMA_PRODUK']!=NULL)?$row['NAMA_PRODUK']:'',
                'FILE_SUKU_BUNGA'=> ($row['FILE_SUKU_BUNGA']!=NULL)?$imgurl.$row['FILE_SUKU_BUNGA']:''
                );
        }
        
        echo json_encode($data);
    }

    public function sub_produk()
    {

        $id_produk = $this->input->post('id_produk');
        $data = array();
        if (isset($id_produk)) {
            $res = $this->M_sub_produk->get_by(['ID_PRODUK' => $id_produk, 'DELETED' => 0, 'STATUS' => 1]);
            foreach($res as $row){
                $imgurl = base_url().'Image/Handler?url=ikon/'.md5($row['ID_PRODUK']).'/';
                $data[] = array(
                    'ID_SUB_PRODUK'=> $row['ID_SUB_PRODUK'],
                    'ID_PRODUK'=> $row['ID_PRODUK'],
                    'NAMA_SUB'=> ($row['NAMA_SUB']!=NULL)?$row['NAMA_SUB']:'',
                    'SUKU_BUNGA'=> ($row['SUKU_BUNGA']!=NULL)?$row['SUKU_BUNGA']:'',
                    'URUTAN'=> ($row['URUTAN']!=NULL)?$row['URUTAN']:'',
                    'IKON'=> ($row['IKON']!=NULL)?$imgurl.$row['IKON']:'',
                    'KETENTUAN'=> ($row['KETENTUAN']!=NULL)?$row['KETENTUAN']:''
                    );
            }
            // $produk = $this->M_sub_produk->get_by('ID_PRODUK', $id_produk);
        } else {
            $res = $this->M_sub_produk->get_by(['DELETED' => 0, 'STATUS' => 1]);
            foreach($res as $row){
                $imgurl = base_url().'Image/Handler?url=ikon/'.md5($row['ID_PRODUK']).'/';
                $data[] = array(
                    'ID_SUB_PRODUK'=> $row['ID_SUB_PRODUK'],
                    'ID_PRODUK'=> $row['ID_PRODUK'],
                    'NAMA_SUB'=> ($row['NAMA_SUB']!=NULL)?$row['NAMA_SUB']:'',
                    'SUKU_BUNGA'=> ($row['SUKU_BUNGA']!=NULL)?$row['SUKU_BUNGA']:'',
                    'IKON'=> ($row['IKON']!=NULL)?$imgurl.$row['IKON']:'',
                    'KETENTUAN'=> ($row['KETENTUAN']!=NULL)?$row['KETENTUAN']:''
                    );
            }

        }
        
        echo json_encode($data);
    }

    public function find_produk()
    {

        $search = clean($this->input->post('search'));
        if (isset($search)) {
            $produk = $this->M_produk->find($search);
        } else {
            $produk = $this->M_produk->get();
        }
        
        echo json_encode($produk);
    }

    public function find_sub_produk()
    {

        $search = clean($this->input->post('search'));
        if (isset($search)) {
            $sub_produk = $this->M_sub_produk->find($search);
        } else {
            $sub_produk = $this->M_sub_produk->get();
        }
        

        echo json_encode($sub_produk);
    }

    public function save_sub_produk($id_sub_produk=false)
    {
        if (isset($id_sub_produk)) {
            $result = $this->M_sub_produk->get($id_sub_produk);
            if (count($result) > 0) {
                $suku_bunga = strip_tags($this->input->post('suku_bunga'));
                $ketentuan  = strip_tags($this->input->post('ketentuan'));
                $data = [
                'SUKU_BUNGA'    => $suku_bunga,
                'KETENTUAN'     => $ketentuan
                ];

                $this->M_sub_produk->save($data, $id_sub_produk);

                $status = [
                'STATUS' => 'success'
                ];
            } else {
                $status = [
                'STATUS' => 'id is invalid'
                ];
            }

            echo json_encode($status);
        } else {

        }
    }
}

/* End of file Produk.php */
/* Location: ./application/controllers/api/Produk.php */