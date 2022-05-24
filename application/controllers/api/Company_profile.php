<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_profile extends E_Controller {
    private static $key     = '';
    private static $role    = '';
    private static $status  = '';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kota');
        $this->load->model('M_wilayah');
        $this->load->model('M_cabang');
        $this->load->model('M_kas');
        $this->load->model('M_linkage');
        $this->load->model('M_pendidikan');
        $this->load->model('M_jabatan');
        $this->load->model('M_direksi');
        $this->load->model('M_user');
        $this->load->model('M_award');
        $this->load->model('M_direksi_timeline');

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

    public function jaringan_kantor()
    {
        $res = $this->M_wilayah->get_by(array('STATUS' => 1, 'DELETED' => 0), false);
        $data = array();
        foreach ($res as $row) {
         
         

            $data[] = array(
                'ID_KOTA' => $row['ID_KOTA'],
                'ID_WILAYAH' => $row['ID_WILAYAH'],
                'WILAYAH'=> $row['WILAYAH'],
                // 'KANTOR_CABANG' => count($kantor_cabang),
                // 'KAS_KELILING' => count($kas_keliling),
                // 'KANTOR_KAS' => count($kantor_kas),
                // 'PAYMENT_POINT' => count($paymeny_point),
            );
        }
        
        echo json_encode($data); 
    }

    public function jumlah_kantor()
    {
        
        $id_kota = $this->input->post('id_kota');

        $res1 = $this->M_cabang->hitung_cabang($id_kota);
        $res2 = $this->M_cabang->hitung_kas($id_kota);
        $res3 = $this->M_cabang->hitung_per_kantor('Kantor Kas',$id_kota);
        $res4 = $this->M_cabang->hitung_per_kantor('Kas Keliling',$id_kota);
        $res5 = $this->M_cabang->hitung_per_kantor('Payment Point',$id_kota);
        $data = array();
        
        $data[] = array(
            'JUMLAH_CABANG' => $res1['JUMLAH_CABANG'],
            'JUMLAH_SEMUA_KANTOR'    => $res2['JUMLAH_KAS'],
            'JUMLAH_KANTOR_KAS'    => $res3['JUMLAH_KANTOR'],
            'JUMLAH_KAS_KELILING'    => $res4['JUMLAH_KANTOR'],
            'JUMLAH_PAYMENT_POINT'    => $res5['JUMLAH_KANTOR'],
        );
        
        echo json_encode($data);
        
    }

    public function get_cabang()
    {
        $id_wilayah = $this->input->post('id_wilayah');

        $res = $this->M_cabang->get_by(array(
            'STATUS' => 1, 
            'DELETED' => 0,
            'ID_WILAYAH' => $id_wilayah), false);
        $response = array();
        $arr_data = array();
        
        $kantor_cabang = $this->M_cabang->get_by(array('ID_WILAYAH' => $id_wilayah, 'STATUS' => 1, 'DELETED' => 0));
        $paymeny_point = $this->M_wilayah->get_kantor($id_wilayah, 'Payment Point');
        $kas_keliling = $this->M_wilayah->get_kantor($id_wilayah, 'Kas Keliling');
        $kantor_kas = $this->M_wilayah->get_kantor($id_wilayah, 'Kantor Kas');
        foreach ($res as $row) {
            if ($row['FOTO']==NULL) {
                $b  = null;
                $c  = null;
                $d  = null;
            }else{
                $a = $row['FOTO'];
                $a = explode(".",$a);
                $b =  $a[0].'_thumb100x100.'.$a[1];
                $c =  $a[0].'_thumb300x300.'.$a[1];
                $d =  $a[0].'_thumb50x50.'.$a[1];
            }

            $kas = $this->M_kas->get_by(array('STATUS' => 1, 'ID_CABANG' => $row['ID_CABANG']), false);
            
            $imgurl = base_url().'Image/Handler?url=cabang/'.md5($row['ID_CABANG']).'/';

            $arr_data[] = array(
                'ID_CABANG' => $row['ID_CABANG'],
                'CABANG'    => $row['CABANG'],
                'ALAMAT'    => $row['ALAMAT'],
                'KECAMATAN' => $row['KECAMATAN'],
                'NO_TELP'   => $row['NO_TELP'],
                'FOTO'      => $row['FOTO'],
                // 'DIR'       => base_url().'watch/cabang?src='.$row['FOTO'].'&id='.$row['ID_CABANG'],
                'DIR'       => ($row['FOTO']!=NULL)?$imgurl.$row['FOTO']:'',
                'SMALL'     => $d,
                'MED'       => $b,
                'LARGE'     => $c,
                'KAS'       => count($kas)
            );
        }

        $response['data']['cabang'] = $arr_data;
        $response['data']['total'] = [
            'KANTOR_CABANG' => count($kantor_cabang),
            'KAS_KELILING' => count($kas_keliling),
            'KANTOR_KAS' => count($kantor_kas),
            'PAYMENT_POINT' => count($paymeny_point),
        ];
        $response['status'] = 'OK';
        echo json_encode($response);
        
    }

    public function get_kas()
    {
        $id_cabang = $this->input->post('id_cabang');

        
        $res = $this->M_kas->get_by(array(
            'STATUS' => 1, 
            'ID_CABANG' => $id_cabang), false);
        $response = array();
        $data = array();
        foreach ($res as $row) {

            if ($row['FOTO']==NULL) {
                $b  = null;
                $c  = null;
                $d  = null;
            }else{
                $a = $row['FOTO'];
                $a = explode(".",$a);
                $b =  $a[0].'_thumb100x100.'.$a[1];
                $c =  $a[0].'_thumb300x300.'.$a[1];
                $d =  $a[0].'_thumb50x50.'.$a[1];
            }
            
            $imgurl = base_url().'Image/Handler?url=kas/'.md5($row['ID_KAS']).'/';
            
            $data[] = array(
                'ID_KAS'    => $row['ID_KAS'],
                'KAS'       => $row['KAS'],
                'ALAMAT'    => $row['ALAMAT'],
                'KECAMATAN' => $row['KECAMATAN'],
                'NO_TELP'   => $row['NO_TELP'],
                'FOTO'      => $row['FOTO'],
                // 'DIR'       => base_url().'watch/kas?src='.$row['FOTO'].'&id='.$row['ID_KAS'],
                'DIR'       => ($row['FOTO']!=NULL)?$imgurl.$row['FOTO']:'',
                'SMALL'     => $d,
                'MED'       => $b,
                'LARGE'     => $c
            );
        }

        $response['data']['kas'] = $data;
        $response['data']['total'] = count($data);
        $response['status'] = 'OK';
        echo json_encode($response);
        
    }


    public function linkage_profil()
    {
        $res = $this->M_wilayah->get_linkage();
        $data = array();
        foreach($res as $row){
            $imgurl = base_url().'Image/Handler?url=logo/'.md5($row['ID_LINKAGE']).'/';
            $data[] = array(
                'ID_LINKAGE'=> $row['ID_LINKAGE'],
                'ID_KOTA'=> $row['ID_KOTA'],
                'NAMA_BANK'=> $row['NAMA_BANK'],
                'BAKI_DEBET'=> ($row['BAKI_DEBET']!=NULL)?$row['BAKI_DEBET']:'',
                'TYPE'=> ($row['TYPE']!=NULL)?$row['TYPE']:'',
                'LOGO'=> ($row['LOGO']!=NULL)?$imgurl.$row['LOGO']:'',
                'STATUS'=> ($row['STATUS']!=NULL)?$row['STATUS']:''
            );
        }

        echo json_encode($data);
    }

    public function detail_linkage()
    {
        $id_linkage = $this->input->post('id_linkage');
        $res = $this->M_linkage->detail($id_linkage);
        
        $data = array();
        // dump($res);
        foreach($res as $row){

            $data[] = array(
                'ID_LINKAGE'=> $row['ID_LINKAGE'],
                'ID_KOTA'=> $row['ID_KOTA'],
                'TGL_PENCAIRAN'=> ($row['TGL_PENCARIAN']!=NULL)?date('d-m-Y', strtotime($row['TGL_PENCARIAN'])):'',
                'TGL_JATUH_TEMPO'=> ($row['JATUH_TEMPO']!=NULL)?date('d-m-Y', strtotime($row['JATUH_TEMPO'])):'',
                'SUKU_BUNGA'=> ($row['BUNGA']!=NULL)?$row['BUNGA']:'',
                'PLAFOND'=> ($row['PLATFOND_BANK']!=NULL)?$row['PLATFOND_BANK']:'',
                'BAKI_DEBET'=> ($row['BAKI_DEBIT']!=NULL)?$row['BAKI_DEBIT']:'',
                'KELONGGARAN_TARIK'=> ($row['KELONGGARAN_TARIK']!=NULL)?$row['KELONGGARAN_TARIK']:''
            );
        }
        echo json_encode($data); 
    }

    public function sdm_profil()
    {
        $res = $this->M_kota->get();
        $data = array();

        foreach($res as $row){
            $data[] = array(
                'ID_KOTA'=> $row['ID_KOTA'],
                'JUMLAH_PEGAWAI'=> ($row['P']+$row['L']),
                'P'=> ($row['P']!=NULL)?$row['P']:'',
                'L'=> ($row['L']!=NULL)?$row['L']:'',
                'SD'=> ($row['SD']!=NULL)?$row['SD']:'',
                // 'SMP'=> ($row['SMP']!=NULL)?$row['SMP']:'',
                'D3'=> ($row['D3']!=NULL)?$row['D3']:'',
                'SMA'=> ($row['SMA']!=NULL)?$row['SMA']:'',
                'S1'=> ($row['S1']!=NULL)?$row['S1']:'',
                'S2'=> ($row['S2']!=NULL)?$row['S2']:'',
                // 'JUMLAH'=> ($row['JUMLAH']!=NULL)?$row['JUMLAH']:''
            );
        }

        echo json_encode($data);
    }

    public function struktur_modal()
    {
        $res = $this->M_kota->get_by(array('STATUS'=>1));
        $data = array();
        foreach($res as $row){
            $imgurl = base_url().'Image/Handler?url=struktur/'.md5($row['ID_KOTA']).'/';

            if ($row['STRUKTUR_ORGANISASI']==NULL) {
                $b  = null;
                $c  = null;
                $d  = null;
            }else{
                $a = $row['STRUKTUR_ORGANISASI'];
                $b =  'thumb100x100_'.$a;
                $c =  'thumb300x300_'.$a;
                $d =  'thumb50x50_'.$a;
            }

            $data[] = array(
                'ID_KOTA'=> $row['ID_KOTA'],
                'KOTA'=> ($row['KOTA']!=NULL)?$row['KOTA']:'',
                'STRUKTUR_ORGANISASI'=> ($row['STRUKTUR_ORGANISASI']!=NULL)?$imgurl.$row['STRUKTUR_ORGANISASI']:'',
                'SMALL'     => $d,
                'MED'       => $b,
                'LARGE'     => $c,
                'L'=> ($row['L']!=NULL)?$row['L']:'',
                'P'=> ($row['P']!=NULL)?$row['P']:'',
                'MODAL_INTI'=> ($row['MODAL_INTI']!=NULL)?$row['MODAL_INTI']:'',
                'MODAL_PELENGKAP'=> ($row['MODAL_PELENGKAP']!=NULL)?$row['MODAL_PELENGKAP']:'',
                'TOTAL_MODAL'=> ($row['TOTAL_MODAL']!=NULL)?$row['TOTAL_MODAL']:'',
                'STATUS'=> ($row['STATUS']!=NULL)?$row['STATUS']:''
            );
        }

        echo json_encode($data);
    }

    public function struktur_organisasi()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $res = $this->M_direksi->get_direksi_by_kota($id_jabatan);
        $data = array();

        foreach($res as $row){
            if($row['STATUS'] == 1){
                $imgurl = base_url().'Image/Handler?url=direksi/'.md5($row['ID_DIREKSI']).'/';
                $data[] = array(
                    'ID_JABATAN'=> $row['JABATAN_ID'],
                    'ID_KOTA'=> $row['KOTA_ID'],
                    'ID_DIREKSI'=> $row['ID_DIREKSI'],
                    'JABATAN'=> ($row['JABATAN']!=NULL)?$row['JABATAN']:'',
                    'NAMA'=> ($row['NAMA']!=NULL)?$row['NAMA']:'',
                    'FOTO'=> ($row['FOTO']!=NULL)?$imgurl.$row['FOTO']:'',
                    'DESKRIPSI'=> ($row['DESKRIPSI']!=NULL)?$row['DESKRIPSI']:'',
                    'KETERANGAN'=> ($row['KETERANGAN']!=NULL)?$row['KETERANGAN']:'',
                );
            }
        }

        echo json_encode($data);
    }

    public function total_pendidikan()
    {
        $res = $this->M_direksi->get_direksi_by_kota();
        $data = array();
    }

    public function timeline($value='')
    {
        $id_direksi = $this->input->post('id_direksi');
        $res = $this->M_direksi_timeline->get_by('ID_DIREKSI',$id_direksi);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_TIMELINE'=> $row['ID_TIMELINE'],
                'ID_DIREKSI'=> $row['ID_DIREKSI'],
                'ID_RIWAYAT'=> $row['ID_RIWAYAT'],
                'LOKASI'=> ($row['LOKASI']!=NULL)?$row['LOKASI']:'',
                'DETAIL'=> ($row['DETAIL']!=NULL)?$row['DETAIL']:'',
                'AWAL'=> ($row['AWAL']!=NULL)?$row['AWAL']:'',
                'AKHIR'=> ($row['AKHIR']!=NULL)?$row['AKHIR']:'',
                'KETERANGAN'=> ($row['KETERANGAN']!=NULL)?$row['KETERANGAN']:'',
                'TIME'=> ($row['TIME']!=NULL)?$row['TIME']:''
            );
        }

        echo json_encode($data);
    }

    public function award($value='')
    {
        $id_direksi = $this->input->post('id_direksi');
        $res = $this->M_award->get_by(['DELETED' => 0, 'STATUS' => 1],false,false,false,false,'TGL_AWARD DESC');
        // dump($res);
        $data = array();
        foreach ($res as $row) {
            $imgurl = base_url().'Image/Handler?url=award/'.md5($row['ID_AWARD']).'/';
            $data[] = array(
                'ID_AWARD'=> $row['ID_AWARD'],
                'ID_KOTA'=> $row['ID_KOTA'],
                'KETERANGAN'=> ($row['KETERANGAN']!=NULL)?$row['KETERANGAN']:'',
                'TGL_AWARD' => $row['TGL_AWARD'],
                'FILE'=> ($row['FILE']!=NULL)?$imgurl.$row['FILE']:''
            );
        }

        echo json_encode($data);
    }

    public function master_jabatan()
    {
        $res = $this->M_jabatan->get_by('STATUS',1);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_JABATAN'=> $row['ID_JABATAN'],
                'JABATAN'=> ($row['JABATAN']!=NULL)?$row['JABATAN']:'',
                'ORDER'=> ($row['ORDER']!=NULL)?$row['ORDER']:''
            );
        }

        echo json_encode($data);
    }
}

/* End of file Company_profile.php */
/* Location: ./application/controllers/api/Company_profile.php */