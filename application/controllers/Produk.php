<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends E_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->cekLogin();
        $this->load->model('M_produk');
        $this->load->model('M_sub_produk');
    }

    public function index()
    {
        $data['res'] = $this->M_produk->get_by('DELETED = 0', false);
        $data['content'] = $this->load->view('produk/grid', $data, true);
        $this->load->view('dashboard', $data);
    }

    public function sub_produk($id_produk='')
    {
        $data['id_produk'] = $id_produk;
        $data['res'] = $this->M_sub_produk->get_by(array('DELETED' => 0, 'ID_PRODUK' => $id_produk));
        $data['content'] = $this->load->view('produk/sub_produk', $data, true);
        $this->load->view('dashboard', $data);
    }

    function urutan_sub_produk($jenis,$id_sub_produk)
    {
        $data = $this->M_sub_produk->get($id_sub_produk);
        //get_by(array('ID_JABATAN'=>$post['jabatan']),false,false,true,false,'URUTAN DESC');
        $urutan =  $data['URUTAN'];
        if ($jenis=='up') {
            if ($urutan!='1') {
                $urutan_baru = ($urutan - 1);
                $data_tmp = $this->M_sub_produk->get_by(array('URUTAN'=>$urutan_baru));
                $this->M_sub_produk->save(array('URUTAN'=>$urutan_baru), $id_sub_produk);
                $urutan_tmp = ($data_tmp[0]['URUTAN']+1);
                $this->M_sub_produk->save(array('URUTAN'=>$urutan_tmp), $data_tmp[0]['ID_SUB_PRODUK']);
            }
        }else{
            if ($jenis=='down') {
                $urutan_baru = ($urutan + 1);
                $data_tmp = $this->M_sub_produk->get_by(array('URUTAN'=>$urutan_baru),false,false,true);
                if ($data_tmp!=null) {
                    $this->M_sub_produk->save(array('URUTAN'=>$urutan_baru), $id_sub_produk);
                    $urutan_tmp = ($data_tmp['URUTAN']-1);
                    $this->M_sub_produk->save(array('URUTAN'=>$urutan_tmp), $data_tmp['ID_SUB_PRODUK']);
                }
                //var_dump($data_tmp);
                
            }
        }
        redirect('produk/sub_produk/'.$data['ID_PRODUK']);
    }

    public function json()
    {
        $draw = $this->input->post('draw');
        $length = $this->input->post('length');
        $start = $this->input->post('start');

        $search = $this->input->post('search');
        $search = $search['value'];
        $pattern = '/[^a-zA-Z0-9 !@#$%^&*\/\.\,\(\)-_:;?\+=]/u';
        $search = preg_replace($pattern, '', $search);
        
        $get_order = $this->input->post('order');
        $column = $this->input->post('columns');
        $colsorting = $column[$get_order[0]['column']]['data'];
        $sorting = $get_order[0]['dir'];

        $res = $this->M_produk->grid_json($start, $length, $search, false, $sorting, $colsorting);
        $count = $this->M_produk->grid_json($start, $length, $search, true, $sorting, $colsorting);
        
        
        $data = array("sEcho"=>$draw,"iTotalRecords"=>$count,"iTotalDisplayRecords"=>$count,"aaData"=>$res);
        echo json_encode($data);
    }

    public function json_sub($value='')
    {
        # code...
    }

    public function get($id_produk='')
    {
        $result = array();
        if($this->input->is_ajax_request()){
            if(!empty($id_produk)){                

                $data = $this->M_produk->get($id_produk);
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

    public function get_sub($id_sub_produk='')
    {
        $result = array();
        if($this->input->is_ajax_request()){
            if(!empty($id_sub_produk)){                

                $data = $this->M_sub_produk->get($id_sub_produk);
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

    public function save($id_produk='')
    {
        $this->form_validation->set_rules("nama_produk","Nama Produk","required");
        if($this->form_validation->run() == false){
            $res = array(
                "status"=>"ERROR",
                "msg" => "Silahkan lengkapi form terlebih dahulu",
                "nama_produk"=>form_error("nama_produk")
            );
            echo json_encode($res);
        } else {
            $post = $this->input->post();
            $status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;

            $data = array(
                'NAMA_PRODUK' => $post['nama_produk'],
                'STATUS' => $status
            );

            if(!empty($id_produk)){
                $this->M_produk->save($data, $id_produk);
            }else{
                $this->M_produk->save($data);
            }

            $id = md5($id_produk);

            if($_FILES['bunga']['name']){
                if(!is_dir("./ffdwjws/suku_bunga")){
                    mkdir("./ffdwjws/suku_bunga");
                }

                if(!is_dir("./ffdwjws/suku_bunga/".$id )){
                    mkdir("./ffdwjws/suku_bunga/".$id);
                }

                $directory = "./ffdwjws/suku_bunga/".$id;

                $forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

                $uploadfile = $_FILES['bunga']['name'];
                $replaced_file_name = str_replace(' ', '_', $_FILES["bunga"]["name"]);
                $file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


                $config['upload_path']      = $directory;
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = 10000000;
                $config['encrypt_name']     = FALSE;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('bunga')){
                    $err++;
                }else{
                    $data = $this->upload->data();

                    $get_old_file = $this->M_produk->get($id_produk);

                    if(!empty($get_old_file)){
                        if(file_exists($directory.'/'.$get_old_file['FILE_SUKU_BUNGA']) and !is_dir($directory.'/'.$get_old_file['FILE_SUKU_BUNGA'])){
                            unlink($directory.'/'.$get_old_file['FILE_SUKU_BUNGA']);
                        }

                        $this->M_produk->save(array(
                            'FILE_SUKU_BUNGA'=>$data['file_name']
                        ),$id_produk);
                    }
                }
            }

            echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));

        }
    }

    public function save_sub_produk($id_sub_produk='')
    {
        $this->form_validation->set_rules("nama_sub_produk","Nama Sub Produk","required");
        if($this->form_validation->run() == false){
            $res = array(
                "status"=>"ERROR",
                "msg" => "Silahkan lengkapi form terlebih dahulu",
                "nama_sub_produk"=>form_error("nama_sub_produk"),
                "suku_bunga"=>form_error("suku_bunga"),
                "ketentuan"=>form_error("ketentuan"),
            );
            echo json_encode($res);
        } else {
            $err=0;
            $post = $this->input->post();
            $status = (isset($post['status']))? (($post['status'] == 1)? 1 : 0):0;
            $data = array(
                'ID_PRODUK' => $post['id_produk'], 
                'NAMA_SUB' => $post['nama_sub_produk'], 
                'SUKU_BUNGA' => $post['suku_bunga'], 
                'KETENTUAN' => $post['ketentuan'], 
                'STATUS' => $status
            );

            if(!empty($id_sub_produk)){
                $current_id = $this->M_sub_produk->save($data, $id_sub_produk);
            }else{
                $current_id = $this->M_sub_produk->save($data);

                $get_data = $this->M_sub_produk->get_by(array('ID_PRODUK' => $post['id_produk'], 'DELETED' => 0));
                $urutan = count($get_data);
                $this->M_sub_produk->save(array('URUTAN' => $urutan), $current_id);
            }

            // echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil disimpan'));

            $id = md5($post['id_produk']);

            if($_FILES['file']['name']){
                if(!is_dir("./ffdwjws/ikon")){
                    mkdir("./ffdwjws/ikon");
                }

                if(!is_dir("./ffdwjws/ikon/".$id )){
                    mkdir("./ffdwjws/ikon/".$id);
                }

                if(!is_dir("./ffdwjws/ikon/".$id )){
                    mkdir("./ffdwjws/ikon/".$id);
                }

                $directory = "./ffdwjws/ikon/".$id;

                $forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

                $uploadfile = $_FILES['file']['name'];
                $replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
                $file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


                $config['upload_path']      = $directory;
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = 10000000;
                $config['encrypt_name']     = FALSE;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('file')){
                    $err++;
                }else{
                    $data = $this->upload->data();

                    $get_old_file = $this->M_sub_produk->get($current_id);
                    if(file_exists($directory.'/'.$get_old_file['IKON']) and !is_dir($directory.'/'.$get_old_file['IKON'])){
                        unlink($directory.'/'.$get_old_file['IKON']);
                    }

                    $this->M_sub_produk->save(array(
                        'IKON'=>$data['file_name']
                    ),$current_id);
                }
            }

            // if($_FILES['bunga']['name']){
            //     if(!is_dir("./ffdwjws/suku_bunga")){
            //         mkdir("./ffdwjws/suku_bunga");
            //     }

            //     if(!is_dir("./ffdwjws/suku_bunga/".$id )){
            //         mkdir("./ffdwjws/suku_bunga/".$id);
            //     }

            //     if(!is_dir("./ffdwjws/suku_bunga/".$id )){
            //         mkdir("./ffdwjws/suku_bunga/".$id);
            //     }

            //     $directory = "./ffdwjws/suku_bunga/".$id;

            //     $forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

            //     $uploadfile = $_FILES['bunga']['name'];
            //     $replaced_file_name = str_replace(' ', '_', $_FILES["bunga"]["name"]);
            //     $file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


            //     $config['upload_path']      = $directory;
            //     $config['allowed_types']    = 'jpeg|jpg|png';
            //     $config['max_size']         = 10000000;
            //     $config['encrypt_name']     = FALSE;
            //     $config['file_name'] = $file_name;
            //     $this->load->library('upload', $config);
            //     if (!$this->upload->do_upload('bunga')){
            //         $err++;
            //     }else{
            //         $data = $this->upload->data();

            //         $get_old_file = $this->M_sub_produk->get($current_id);
            //         if(file_exists($directory.'/'.$get_old_file['FILE_SUKU_BUNGA']) and !is_dir($directory.'/'.$get_old_file['FILE_SUKU_BUNGA'])){
            //             unlink($directory.'/'.$get_old_file['FILE_SUKU_BUNGA']);
            //         }

            //         $this->M_sub_produk->save(array(
            //             'FILE_SUKU_BUNGA'=>$data['file_name']
            //             ),$current_id);
            //     }
            // }

            if($err > 0){
                $msg = 'Data berhasil disimpan. Namun, ikon tidak berhasil diupload';
            }else{
                $msg = 'Data berhasil disimpan';
            }

            echo json_encode(array('status' => 'OK', 'msg' => $msg));
        }
    }

    public function delete_produk($id_produk='')
    {
        $result = array();
        if($this->input->is_ajax_request()){
            if(!empty($id_produk)){                

                $data = $this->M_produk->get($id_produk);
                if(!empty($data)){
                    $this->M_produk->save(array('DELETED' => 1), $id_produk);
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

    public function delete_sub_produk($id_sub_produk='')
    {
        $result = array();
        if($this->input->is_ajax_request()){
            if(!empty($id_sub_produk)){                

                $data = $this->M_sub_produk->get($id_sub_produk);
                if(!empty($data)){
                    $this->M_sub_produk->save(array('DELETED' => 1, 'URUTAN' => '9999'), $id_sub_produk);
                    $get_data = $this->M_sub_produk->get_by(array("ID_PRODUK = '{$data['ID_PRODUK']}' AND URUTAN > " => $data['URUTAN']));
                    foreach ($get_data as $value) {
                        $this->M_sub_produk->save(array('URUTAN' => ($value['URUTAN'] - 1) ), $value['ID_SUB_PRODUK']);
                    }

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

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */