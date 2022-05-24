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
        $user = $this->input->post("username");
        $pass = $this->input->post("password");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,            "http://paperless.suryayudha.id/API/useribsy.php" );
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch, CURLOPT_POST,           1 );
        curl_setopt($ch, CURLOPT_POSTFIELDS,     '{"username": "'.$user.'","password": "'.$pass.'"}' );
        curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain'));
        $result=curl_exec ($ch);
        $respon = (array)json_decode($result);

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_URL,            "http://119.252.169.156/share-json/public/api" );
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt($ch1, CURLOPT_POST,           1 );
        curl_setopt($ch1, CURLOPT_POSTFIELDS,     '{"nama": "'.$user.'","password": "'.$pass.'"}' );
        curl_setopt($ch1, CURLOPT_HTTPHEADER,     array('Content-Type: application/json'));
        $result1=curl_exec ($ch1);
        $respon1 = (array)json_decode($result1);

        $data = [
          'sukses'=> false,
          'pesan'=> "Username atau password salah",
          'data'=> []
        ];

        if($respon['sukses'] == true){
          $detail = (array)$respon['data'];
          $data = [
            'sukses'=> true,
            'pesan'=> $respon['pesan'],
            'data'=> [
              'key' => hash('sha256',($detail['username'].$detail['password'])),
              'wilayah' => 'bna',
              'nik' => $detail['nik'],
              'nama_lengkap' => $detail['nama_lengkap'],
              'username' => $detail['username'],
              'level' => $detail['level']
            ]
          ];

        }
        // var_dump($respon1); die;
        if(count($respon1) != 0){
          if($respon1['sukses'] == "true"){
            $detail1 = (array)$respon1['data'];
            if($respon1['status'] == "A"){
              $data = [
                'sukses'=> true,
                'pesan'=> $respon1['pesan'],
                'data'=> [
                  // 'key' => hash('sha256',($detail1['nama'].$respon1['password'])),
                  'key' => hash('sha256',($detail1['nama'])),
                  'wilayah' => 'wsb',
                  'nik' => $detail1['nik'],
                  'nama_lengkap' => $detail1['nama_lengkap'],
                  'username' => $detail1['nama'],
                  'level' => "2"
                ]
              ];
            }
          }
        }


        echo json_encode($data);
    }

}

/* End of file Auth.php */
/* Location: ./application/controllers/api/Auth.php */
