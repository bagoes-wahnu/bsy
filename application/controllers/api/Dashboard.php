<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends E_Controller {
    private static $key     = '';
    private static $role    = '';
    private static $status  = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_import_cabang');
        $this->load->model('M_import_kas');
        $this->load->model('M_import_kota');
        $this->load->model('M_import_wilayah');
        $this->load->model('M_user');
        $this->load->model('M_kota');
        $this->load->model('M_wilayah');
        $this->load->model('M_cabang');
        $this->load->model('M_kas');
        $this->load->model('M_deposit');
        $this->load->model('M_kredit');
        $this->load->model('M_tabungan');
        $this->load->model('M_bendera_persentase');

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
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATAIS_REQUIRED');
        }else{

            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));

            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            $get_data = $this->M_import_kota->get_graph($year, $month, $id_kota, $group, $branch);

            if(!empty($get_data)){
                $result = array('status' => 'OK', 'data' => $get_data);
            }else{
                $result = array('status' => 'EMPTY');
            }
        }

        echo json_encode($result);

    }

    public function detail()
    {
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');
        $this->form_validation->set_rules('group', 'Group', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));
            $run = FALSE;

            $jenis = $this->input->post('jenis');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            if($jenis == 'tabungan'){
                $run = TRUE;
                $graph = $this->M_import_kota->graph_tabungan($year, $month, $id_kota, $group, $branch);
                $pie = $this->M_import_kota->get_pie($year, $month, $id_kota, $group, $branch);
            }elseif ($jenis == 'kredit') {
                $run = TRUE;
                $graph = $this->M_import_kota->graph_deposito($year, $month, $id_kota, $group, $branch);
                $pie = $this->M_import_kota->get_pie_kredit($year, $month, $id_kota, $group, $branch);
            }elseif ($jenis == 'deposito') {
                $run = TRUE;
                $graph = $this->M_import_kota->graph_kredit($year, $month, $id_kota, $group, $branch);
                $pie = $this->M_import_kota->get_pie_deposito($year, $month, $id_kota, $group, $branch);
            }

            if($run == TRUE){
                if(!empty($graph) and !empty($pie)){
                    $result = array('status' => 'OK', 'data' => array('kategori' => $jenis, 'graph' => $pie));
                }else{
                    $result = array('status' => 'EMPTY');
                }
            }

        }

        echo json_encode($result);

    }

    public function get_bar_graph()
    {
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $result = array('status' => 'ERROR');
            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));
            $run = FALSE;

            $jenis = $this->input->post('jenis');
            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            // $arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
            // if($month != '0'){
            //     $month = (array_search($month, $arr_bulan) + 1);
            // }

            $arr_bar = array();

            $oldest_month = $month + 1;
            $oldest_month = $month + 1;
            $oldest_year = $year - 1;
            if($oldest_month == 0){
                $oldest_month = 12;
            }

            if($oldest_month == 13){
                $oldest_year = $year;
                $oldest_month = 1;
            }

            if($jenis == 'tabungan'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_tabungan($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['TABUNGAN_TARGET'])? 0: $get_data['TABUNGAN_TARGET'], 
                        'REALISASI' => empty($get_data['TABUNGAN_REALISASI'])? 0: $get_data['TABUNGAN_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'kredit'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_kredit($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['KREDIT_TARGET'])? 0: $get_data['KREDIT_TARGET'], 
                        'REALISASI' => empty($get_data['KREDIT_REALISASI'])? 0: $get_data['KREDIT_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'deposito'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_deposito($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['DEPOSITO_TARGET'])? 0: $get_data['DEPOSITO_TARGET'], 
                        'REALISASI' => empty($get_data['DEPOSITO_REALISASI'])? 0: $get_data['DEPOSITO_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'aset'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_aset($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['ASET_TARGET'])? 0: $get_data['ASET_TARGET'], 
                        'REALISASI' => empty($get_data['ASET_REALISASI'])? 0: $get_data['ASET_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'laba'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_laba($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['LABA_TARGET'])? 0: $get_data['LABA_TARGET'], 
                        'REALISASI' => empty($get_data['LABA_REALISASI'])? 0: $get_data['LABA_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'biaya'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_biaya($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['BIAYA_TARGET'])? 0: $get_data['BIAYA_TARGET'], 
                        'REALISASI' => empty($get_data['BIAYA_REALISASI'])? 0: $get_data['BIAYA_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'pendapatan'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_pendapatan($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['PENDAPATAN_TARGET'])? 0: $get_data['PENDAPATAN_TARGET'], 
                        'REALISASI' => empty($get_data['PENDAPATAN_REALISASI'])? 0: $get_data['PENDAPATAN_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'car'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_car($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['CAR_TARGET'])? 0: $get_data['CAR_TARGET'], 
                        'REALISASI' => empty($get_data['CAR_REALISASI'])? 0: $get_data['CAR_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'roa'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_roa($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['ROA_TARGET'])? 0: $get_data['ROA_TARGET'], 
                        'REALISASI' => empty($get_data['ROA_REALISASI'])? 0: $get_data['ROA_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'roe'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_roe($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['ROE_TARGET'])? 0: $get_data['ROE_TARGET'], 
                        'REALISASI' => empty($get_data['ROE_REALISASI'])? 0: $get_data['ROE_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'bopo'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_bopo($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['BOPO_TARGET'])? 0: $get_data['BOPO_TARGET'], 
                        'REALISASI' => empty($get_data['BOPO_REALISASI'])? 0: $get_data['BOPO_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'cr'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_cr($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['CR_TARGET'])? 0: $get_data['CR_TARGET'], 
                        'REALISASI' => empty($get_data['CR_REALISASI'])? 0: $get_data['CR_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'ldr'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_ldr($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['LDR_TARGET'])? 0: $get_data['LDR_TARGET'], 
                        'REALISASI' => empty($get_data['LDR_REALISASI'])? 0: $get_data['LDR_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'kap'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_kap($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['KAP_TARGET'])? 0: $get_data['KAP_TARGET'], 
                        'REALISASI' => empty($get_data['KAP_REALISASI'])? 0: $get_data['KAP_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'npl_gross'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_npl_gross($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['NPL_GROSS_TARGET'])? 0: $get_data['NPL_GROSS_TARGET'], 
                        'REALISASI' => empty($get_data['NPL_GROSS_REALISASI'])? 0: $get_data['NPL_GROSS_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'npl_net'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_npl_net($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['NPL_NET_TARGET'])? 0: $get_data['NPL_NET_TARGET'], 
                        'REALISASI' => empty($get_data['NPL_NET_REALISASI'])? 0: $get_data['NPL_NET_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }elseif($jenis == 'nim'){
                $run = TRUE;
                for ($i=0; $i < 12; $i++) {
                    $get_data = $this->M_import_kota->graph_nim($oldest_year, $oldest_month, $id_kota, $group, $branch);
                    $arr_bar[$i] = array(
                        'BULAN' => $oldest_month, 
                        'TAHUN' => $oldest_year, 
                        'TARGET' => empty($get_data['NIM_TARGET'])? 0: $get_data['NIM_TARGET'], 
                        'REALISASI' => empty($get_data['NIM_REALISASI'])? 0: $get_data['NIM_REALISASI']);

                    $oldest_month++;
                    if($oldest_month == 13){
                        $oldest_month = 1;
                        $oldest_year = $year;
                    }
                }
            }

            if($run == TRUE){
                $result = array('status' => 'OK', 'data' => array('kategori' => $jenis, 'graph' => $arr_bar));
            }

        }

        echo json_encode($result);

    }

    public function get_year()
    {
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        // $this->form_validation->set_rules('id_kota', 'Kota', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")), false, false, TRUE);

            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            $get_year = $this->M_import_kota->get_year($id_kota, $group, $branch);
            
            if(!empty($get_year)){
                $result = array('status' => 'OK', 'data' => $get_year);
            }else{
                $result = array('status' => 'EMPTY');
            }
        }

        echo json_encode($result);
    }

    public function get_month()
    {
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        // $this->form_validation->set_rules('id_kota', 'Kota', 'required');
        $this->form_validation->set_rules('year', 'Tahun', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")), false, false, TRUE);
            $id_kota = $this->input->post('id_kota');
            $year = $this->input->post('year');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            $get_month = $this->M_import_kota->get_month($id_kota, $year, $group, $branch);
            
            if(!empty($get_month)){
                $result = array('status' => 'OK', 'data' => $get_month);
            }else{
                $result = array('status' => 'EMPTY');
            }
        }

        echo json_encode($result);
    }



    // public function index()
    // {
    //     $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));

    //     $id_kota = $this->input->post('id_kota');
    //     if (!isset($id_kota)) {
    //         $res = $this->M_kota->get_data_konsolidasi();
    //         $data = array();

    //         $data = array(
    //             'ASET_REALISASI'        => $res['ASET_REALISASI'],
    //             'ASET_TARGET'           => $res['ASET_TARGET'],
    //             'TABUNGAN_REALISASI'    => $res['TABUNGAN_REALISASI'],
    //             'TABUNGAN_TARGET'       => $res['TABUNGAN_TARGET'],
    //             'DEPOSITO_REALISASI'    => $res['DEPOSITO_REALISASI'],
    //             'DEPOSITO_TARGET'       => $res['DEPOSITO_TARGET'],
    //             'KREDIT_REALISASI'      => $res['KREDIT_REALISASI'],
    //             'KREDIT_TARGET'         => $res['KREDIT_TARGET'],
    //             'PENDAPATAN_REALISASI'  => $res['PENDAPATAN_REALISASI'],
    //             'PENDAPATAN_TARGET'     => $res['PENDAPATAN_TARGET'],
    //             'BIAYA_REALISASI'       => $res['BIAYA_REALISASI'],
    //             'BIAYA_TARGET'          => $res['BIAYA_TARGET'],
    //             'LABA_REALISASI'        => $res['LABA_REALISASI'],
    //             'LABA_TARGET'           => $res['LABA_TARGET'],
    //             'CAR'                   => $res['CAR'],
    //             'ROA'                   => $res['ROA'],
    //             'ROE'                   => $res['ROE'],
    //             'BOPO'                  => $res['BOPO'],
    //             'CR'                    => $res['CR'],
    //             'LDR'                   => $res['LDR'],
    //             'KAP'                   => $res['KAP'],
    //             'NPL_GROSS'             => $res['NPL_GROSS'],
    //             'NPL_NET'               => $res['NPL_NET'],
    //             'NIM'                   => $res['NIM']
    //         );
    //     } else {
    //         $res = $this->M_kota->get_data_konsolidasi($id_kota);
    //         $data = array();

    //         $data = array(
    //             'ASET_REALISASI'        => $res['ASET_REALISASI'],
    //             'ASET_TARGET'           => $res['ASET_TARGET'],
    //             'TABUNGAN_REALISASI'    => $res['TABUNGAN_REALISASI'],
    //             'TABUNGAN_TARGET'       => $res['TABUNGAN_TARGET'],
    //             'DEPOSITO_REALISASI'    => $res['DEPOSITO_REALISASI'],
    //             'DEPOSITO_TARGET'       => $res['DEPOSITO_TARGET'],
    //             'KREDIT_REALISASI'      => $res['KREDIT_REALISASI'],
    //             'KREDIT_TARGET'         => $res['KREDIT_TARGET'],
    //             'PENDAPATAN_REALISASI'  => $res['PENDAPATAN_REALISASI'],
    //             'PENDAPATAN_TARGET'     => $res['PENDAPATAN_TARGET'],
    //             'BIAYA_REALISASI'       => $res['BIAYA_REALISASI'],
    //             'BIAYA_TARGET'          => $res['BIAYA_TARGET'],
    //             'LABA_REALISASI'        => $res['LABA_REALISASI'],
    //             'LABA_TARGET'           => $res['LABA_TARGET'],
    //             'CAR'                   => $res['CAR'],
    //             'ROA'                   => $res['ROA'],
    //             'ROE'                   => $res['ROE'],
    //             'BOPO'                  => $res['BOPO'],
    //             'CR'                    => $res['CR'],
    //             'LDR'                   => $res['LDR'],
    //             'KAP'                   => $res['KAP'],
    //             'NPL_GROSS'             => $res['NPL_GROSS'],
    //             'NPL_NET'               => $res['NPL_NET'],
    //             'NIM'                   => $res['NIM']
    //         );
    //     }


    //     echo json_encode($data);

    // }

    public function get_by_kota()
    {
        $id_kota = $this->input->post('id_kota');
        if (isset($id_kota)) {
            $res = $this->M_import_kota->get_by('ID_KOTA', $id_kota);
        } else {
            $res = $this->M_import_kota->get();
        }
        $data = array();
        foreach($res as $row){
            $data[] = array(
                'ID_KOTA'               => $row['ID_KOTA'],
                'BULAN'                 => $row['BULAN'],
                'TAHUN'                 => $row['TAHUN'],
                'ASET_REALISASI'        => $row['ASET_REALISASI'],
                'ASET_TARGET'           => $row['ASET_TARGET'],
                'TABUNGAN_REALISASI'    => $row['TABUNGAN_REALISASI'],
                'TABUNGAN_TARGET'       => $row['TABUNGAN_TARGET'],
                'DEPOSITO_REALISASI'    => $row['DEPOSITO_REALISASI'],
                'DEPOSITO_TARGET'       => $row['DEPOSITO_TARGET'],
                'KREDIT_REALISASI'      => $row['KREDIT_REALISASI'],
                'KREDIT_TARGET'         => $row['KREDIT_TARGET'],
                'PENDAPATAN_REALISASI'  => $row['PENDAPATAN_REALISASI'],
                'PENDAPATAN_TARGET'     => $row['PENDAPATAN_TARGET'],
                'BIAYA_REALISASI'       => $row['BIAYA_REALISASI'],
                'BIAYA_TARGET'          => $row['BIAYA_TARGET'],
                'LABA_REALISASI'        => $row['LABA_REALISASI'],
                'LABA_TARGET'           => $row['LABA_TARGET'],
                'CAR'                   => $row['CAR'],
                'ROA'                   => $row['ROA'],
                'ROE'                   => $row['ROE'],
                'BOPO'                  => $row['BOPO'],
                'CR'                    => $row['CR'],
                'LDR'                   => $row['LDR'],
                'KAP'                   => $row['KAP'],
                'NPL_GROSS'             => $row['NPL_GROSS'],
                'NPL_NET'               => $row['NPL_NET'],
                'NIM'                   => $row['NIM']
                );
        }
        echo json_encode($data);
        

    }

    public function get_by_cabang()
    {
        $id_cabang = $this->input->post('id_cabang');

        $res = $this->M_import_cabang->get_by('ID_CABANG', $id_cabang);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_CABANG'             => $row['ID_CABANG'],
                'BULAN'                 => $row['BULAN'],
                'TAHUN'                 => $row['TAHUN'],
                'ASET_REALISASI'        => $row['ASET_REALISASI'],
                'ASET_TARGET'           => $row['ASET_TARGET'],
                'TABUNGAN_REALISASI'    => $row['TABUNGAN_REALISASI'],
                'TABUNGAN_TARGET'       => $row['TABUNGAN_TARGET'],
                'DEPOSITO_REALISASI'    => $row['DEPOSITO_REALISASI'],
                'DEPOSITO_TARGET'       => $row['DEPOSITO_TARGET'],
                'KREDIT_REALISASI'      => $row['KREDIT_REALISASI'],
                'KREDIT_TARGET'         => $row['KREDIT_TARGET'],
                'PENDAPATAN_REALISASI'  => $row['PENDAPATAN_REALISASI'],
                'PENDAPATAN_TARGET'     => $row['PENDAPATAN_TARGET'],
                'BIAYA_REALISASI'       => $row['BIAYA_REALISASI'],
                'BIAYA_TARGET'          => $row['BIAYA_TARGET'],
                'LABA_REALISASI'        => $row['LABA_REALISASI'],
                'LABA_TARGET'           => $row['LABA_TARGET'],
                'CAR'                   => $row['CAR'],
                'ROA'                   => $row['ROA'],
                'ROE'                   => $row['ROE'],
                'BOPO'                  => $row['BOPO'],
                'CR'                    => $row['CR'],
                'LDR'                   => $row['LDR'],
                'KAP'                   => $row['KAP'],
                'NPL_GROSS'             => $row['NPL_GROSS'],
                'NPL_NET'               => $row['NPL_NET'],
                'NIM'                   => $row['NIM']
                );
        }

        echo json_encode($data);
        
    }
    
    public function get_by_kas()
    {
        $id_kas = $this->input->post('id_kas');

        $res = $this->M_import_kas->get_by('ID_KAS', $id_kas);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_KAS'                => $row['ID_KAS'],
                'BULAN'                 => $row['BULAN'],
                'TAHUN'                 => $row['TAHUN'],
                'ASET_REALISASI'        => $row['ASET_REALISASI'],
                'ASET_TARGET'           => $row['ASET_TARGET'],
                'TABUNGAN_REALISASI'    => $row['TABUNGAN_REALISASI'],
                'TABUNGAN_TARGET'       => $row['TABUNGAN_TARGET'],
                'DEPOSITO_REALISASI'    => $row['DEPOSITO_REALISASI'],
                'DEPOSITO_TARGET'       => $row['DEPOSITO_TARGET'],
                'KREDIT_REALISASI'      => $row['KREDIT_REALISASI'],
                'KREDIT_TARGET'         => $row['KREDIT_TARGET'],
                'PENDAPATAN_REALISASI'  => $row['PENDAPATAN_REALISASI'],
                'PENDAPATAN_TARGET'     => $row['PENDAPATAN_TARGET'],
                'BIAYA_REALISASI'       => $row['BIAYA_REALISASI'],
                'BIAYA_TARGET'          => $row['BIAYA_TARGET'],
                'LABA_REALISASI'        => $row['LABA_REALISASI'],
                'LABA_TARGET'           => $row['LABA_TARGET'],
                'CAR'                   => $row['CAR'],
                'ROA'                   => $row['ROA'],
                'ROE'                   => $row['ROE'],
                'BOPO'                  => $row['BOPO'],
                'CR'                    => $row['CR'],
                'LDR'                   => $row['LDR'],
                'KAP'                   => $row['KAP'],
                'NPL_GROSS'             => $row['NPL_GROSS'],
                'NPL_NET'               => $row['NPL_NET'],
                'NIM'                   => $row['NIM']
                );
        }
        echo json_encode($data);
        
    }

    public function get_by_wilayah()
    {
        $id_wilayah = $this->input->post('id_wilayah');

        $res = $this->M_import_wilayah->get_by('ID_WILAYAH', $id_wilayah);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_WILAYAH'            => $row['ID_WILAYAH'],
                'BULAN'                 => $row['BULAN'],
                'TAHUN'                 => $row['TAHUN'],
                'ASET_REALISASI'        => $row['ASET_REALISASI'],
                'ASET_TARGET'           => $row['ASET_TARGET'],
                'TABUNGAN_REALISASI'    => $row['TABUNGAN_REALISASI'],
                'TABUNGAN_TARGET'       => $row['TABUNGAN_TARGET'],
                'DEPOSITO_REALISASI'    => $row['DEPOSITO_REALISASI'],
                'DEPOSITO_TARGET'       => $row['DEPOSITO_TARGET'],
                'KREDIT_REALISASI'      => $row['KREDIT_REALISASI'],
                'KREDIT_TARGET'         => $row['KREDIT_TARGET'],
                'PENDAPATAN_REALISASI'  => $row['PENDAPATAN_REALISASI'],
                'PENDAPATAN_TARGET'     => $row['PENDAPATAN_TARGET'],
                'BIAYA_REALISASI'       => $row['BIAYA_REALISASI'],
                'BIAYA_TARGET'          => $row['BIAYA_TARGET'],
                'LABA_REALISASI'        => $row['LABA_REALISASI'],
                'LABA_TARGET'           => $row['LABA_TARGET'],
                'CAR'                   => $row['CAR'],
                'ROA'                   => $row['ROA'],
                'ROE'                   => $row['ROE'],
                'BOPO'                  => $row['BOPO'],
                'CR'                    => $row['CR'],
                'LDR'                   => $row['LDR'],
                'KAP'                   => $row['KAP'],
                'NPL_GROSS'             => $row['NPL_GROSS'],
                'NPL_NET'               => $row['NPL_NET'],
                'NIM'                   => $row['NIM']
                );
        }
        echo json_encode($data);
        
    }

    public function cari_wilayah()
    {
        $id_kota = $this->input->post('id_kota');
        $keyword = $this->input->post('keyword');

        $res = $this->M_wilayah->search($id_kota,$keyword);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_WILAYAH'    => $row['ID_WILAYAH'],
                'WILAYAH'       => $row['WILAYAH']
                );
        }
        echo json_encode($data);
        
    }

    public function cari_cabang()
    {
        $id_kota = $this->input->post('id_kota');
        $keyword = $this->input->post('keyword');

        $res = $this->M_cabang->search($id_kota,$keyword);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_CABANG'    => $row['ID_CABANG'],
                'CABANG'       => $row['CABANG']
                );
        }
        echo json_encode($data);
        
    }

    public function cari_kas()
    {
        $id_kota = $this->input->post('id_kota');
        $keyword = $this->input->post('keyword');

        $res = $this->M_kas->search($id_kota,$keyword);
        $data = array();
        foreach ($res as $row) {
            $data[] = array(
                'ID_KAS'    => $row['ID_KAS'],
                'KAS'       => $row['KAS']
                );
        }
        echo json_encode($data);
        
    }

    public function deposit()
    {
        $id_kota = $this->input->post('id_kota');

        if (isset($id_kota)) {
            $res = $this->M_deposit->get_by('ID_KOTA', $id_kota);
        } else {
            $res = $this->M_deposit->get();
        }
        
        $data = array();
        foreach($res as $row){
            $data[] = array(
                'ID_KOTA'=> $row['ID_KOTA'],
                'JANGKA_WAKTU'=> ($row['JANGKA_WAKTU']!=NULL)?$row['JANGKA_WAKTU']:'',
                'TOTAL_NASABAH'=> ($row['TOTAL_NASABAH']!=NULL)?$row['TOTAL_NASABAH']:'',
                'NOMINAL'=> ($row['NOMINAL']!=NULL)?$row['NOMINAL']:''
                );
        }
        echo json_encode($data); 
    }

    public function kredit()
    {
        $id_kota = $this->input->post('id_kota');
        if (isset($id_kota)) {
            $res = $this->M_kredit->get_by('ID_KOTA', $id_kota);
        } else {
            $res = $this->M_kredit->get();
        }
        $data = array();
        foreach ($res as $key) {
            $data[] = array(
                'ID_KOTA'=> $key['ID_KOTA'],
                'BULAN'=> ($key['BULAN']!=NULL)?$key['BULAN']:'',
                'JENIS_KREDIT'=> ($key['JENIS_KREDIT']!=NULL)?$key['JENIS_KREDIT']:'',
                'PLAFOND'=> ($key['PLAFOND']!=NULL)?$key['PLAFOND']:'',
                'BAKI_DEBET'=> ($key['BAKI_DEBET']!=NULL)?$key['BAKI_DEBET']:'',
                'JML_NASABAH'=> ($key['JML_NASABAH']!=NULL)?$key['JML_NASABAH']:''
                );
        }
        echo json_encode($data); 
    }

    public function tabungan()
    {
        $id_kota = $this->input->post('id_kota');
        if (isset($id_kota)) {
            $res = $this->M_tabungan->all($id_kota);
        } else {
            $res = $this->M_tabungan->all();
        }

        $data = array();
        foreach($res as $row){
            $data[] = array(
                'ID_KOTA'=> $row['ID_KOTA'],
                'ID_TABUNGAN'=> $row['ID_TABUNGAN'],
                'NOMINAL'=> ($row['NOMINAL']!=NULL)?$row['NOMINAL']:''
                );
        }
        echo json_encode($data);
    }

    // public function bendera_persentase()
    // {   
    //     $id_kota = $this->input->post('id_kota');
    //     if (isset($id_kota)) {
    //         $res = $this->M_bendera_persentase->get_for_all($id_kota);
    //     } else {
    //         $res = $this->M_bendera_persentase->get_for_all();
    //     }
    //     $data = array();
    //     foreach ($res as $key) {
    //         if ($key['ID_KAS'] != NULL) {
    //             $data[] = array(
    //                 'ID_KOTA' => $key['ID_KOTA'],
    //                 'ID_KAS'=> $key['ID_KAS'],
    //                 'CABANG/BAGIAN/KAS' => $key['KAS'],
    //                 'TABUNGAN'=> ($key['TABUNGAN']!=NULL)?$key['TABUNGAN']:'',
    //                 'DEPOSITO'=> ($key['DEPOSITO']!=NULL)?$key['DEPOSITO']:'',
    //                 'KREDIT'=> ($key['KREDIT']!=NULL)?$key['KREDIT']:'',
    //                 'LABA'=> ($key['LABA']!=NULL)?$key['LABA']:'',
    //                 'ASSET'=> ($key['ASSET']!=NULL)?$key['ASSET']:''
    //                 );

    //         } else if ($key['ID_CABANG'] != NULL) {
    //             $data[] = array(
    //                 'ID_KOTA' => $key['ID_KOTA'],
    //                 'ID_CABANG'=> $key['ID_CABANG'],
    //                 'CABANG/BAGIAN/KAS' => $key['WILAYAH'],
    //                 'TABUNGAN'=> ($key['TABUNGAN']!=NULL)?$key['TABUNGAN']:'',
    //                 'DEPOSITO'=> ($key['DEPOSITO']!=NULL)?$key['DEPOSITO']:'',
    //                 'KREDIT'=> ($key['KREDIT']!=NULL)?$key['KREDIT']:'',
    //                 'LABA'=> ($key['LABA']!=NULL)?$key['LABA']:'',
    //                 'ASSET'=> ($key['ASSET']!=NULL)?$key['ASSET']:''
    //                 );
    //         } else if ($key['ID_WILAYAH'] != NULL) {
    //             $data[] = array(
    //                 'ID_KOTA' => $key['ID_KOTA'],
    //                 'ID_WILAYAH'=> $key['ID_WILAYAH'],
    //                 'CABANG/BAGIAN/KAS' => $key['CABANG'],
    //                 'TABUNGAN'=> ($key['TABUNGAN']!=NULL)?$key['TABUNGAN']:'',
    //                 'DEPOSITO'=> ($key['DEPOSITO']!=NULL)?$key['DEPOSITO']:'',
    //                 'KREDIT'=> ($key['KREDIT']!=NULL)?$key['KREDIT']:'',
    //                 'LABA'=> ($key['LABA']!=NULL)?$key['LABA']:'',
    //                 'ASSET'=> ($key['ASSET']!=NULL)?$key['ASSET']:''
    //                 );
    //         } else {
    //             $data[] = array(
    //                 'ID_KOTA' => $key['ID_KOTA'],
    //                 'TABUNGAN'=> ($key['TABUNGAN']!=NULL)?$key['TABUNGAN']:'',
    //                 'DEPOSITO'=> ($key['DEPOSITO']!=NULL)?$key['DEPOSITO']:'',
    //                 'KREDIT'=> ($key['KREDIT']!=NULL)?$key['KREDIT']:'',
    //                 'LABA'=> ($key['LABA']!=NULL)?$key['LABA']:'',
    //                 'ASSET'=> ($key['ASSET']!=NULL)?$key['ASSET']:''
    //                 );
    //         }
    //     }
    //     echo json_encode($data); 
    // }

    public function bendera_persentase()
    {
        $result = array('status' => 'FORBIDDEN');
        $this->form_validation->set_rules('key', 'Key', 'required');
        $this->form_validation->set_rules('year', 'Year', 'required');
        $this->form_validation->set_rules('month', 'Month', 'required');

        if($this->form_validation->run() == FALSE){
            $result = array('status' => 'DATA_IS_REQUIRED');
        }else{
            $cek = $this->M_user->get_by(array('KEY'=>$this->input->post("key")));

            $year = $this->input->post('year');
            $month = $this->input->post('month');
            $id_kota = $this->input->post('id_kota');
            $group = $this->input->post('group');
            $branch = $this->input->post('branch');

            $graph = $this->M_import_kota->get_graph($year, $month, $id_kota, $group, $branch);
            $data = array();

            $aset_target = empty($graph['ASET_TARGET'])? 0 : $graph['ASET_TARGET'];
            $aset_realisasi = empty($graph['ASET_REALISASI'])? 0 : $graph['ASET_REALISASI'];
            $laba_target = empty($graph['LABA_TARGET'])? 0 : $graph['LABA_TARGET'];
            $laba_realisasi = empty($graph['LABA_REALISASI'])? 0 : $graph['LABA_REALISASI'];
            $biaya_target = empty($graph['BIAYA_TARGET'])? 0 : $graph['BIAYA_TARGET'];
            $biaya_realisasi = empty($graph['BIAYA_REALISASI'])? 0 : $graph['BIAYA_REALISASI'];
            $pendapatan_target = empty($graph['PENDAPATAN_TARGET'])? 0 : $graph['PENDAPATAN_TARGET'];
            $pendapatan_realisasi = empty($graph['PENDAPATAN_REALISASI'])? 0 : $graph['PENDAPATAN_REALISASI'];
            $tabungan_target = empty($graph['TABUNGAN_TARGET'])? 0 : $graph['TABUNGAN_TARGET'];
            $tabungan_realisasi = empty($graph['TABUNGAN_REALISASI'])? 0 : $graph['TABUNGAN_REALISASI'];
            $deposito_target = empty($graph['DEPOSITO_TARGET'])? 0 : $graph['DEPOSITO_TARGET'];
            $deposito_realisasi = empty($graph['DEPOSITO_REALISASI'])? 0 : $graph['DEPOSITO_REALISASI'];
            $kredit_target = empty($graph['KREDIT_TARGET'])? 0 : $graph['KREDIT_TARGET'];
            $kredit_realisasi = empty($graph['KREDIT_REALISASI'])? 0 : $graph['KREDIT_REALISASI'];

            if($year == TRUE){
                $data['TAHUN'] = $year;
            }

            if($month == TRUE){
                $data['BULAN'] = $month;
            }

            if($id_kota == TRUE){
                $data['ID_KOTA'] = $id_kota;
            }

            if($group == TRUE){
                $data['GROUP'] = $group;
            }

            if($group == TRUE){
                $data['BRANCH'] = $branch;
            }

            if(($aset_target == 0) or $aset_realisasi == 0){
                $aset = 0;
            }else{
                $aset = ($aset_realisasi / $aset_target) * 100;
            }

            if(($laba_target == 0) or $laba_realisasi == 0){
                $laba = 0;
            }else{
                $laba = ($laba_realisasi / $laba_target) * 100;
            }

            if(($biaya_target == 0) or $biaya_realisasi == 0){
                $biaya = 0;
            }else{
                $biaya = ($biaya_realisasi / $biaya_target) * 100;
            }

            if(($pendapatan_target == 0) or $pendapatan_realisasi == 0){
                $pendapatan = 0;
            }else{
                $pendapatan = ($pendapatan_realisasi / $pendapatan_target) * 100;
            }

            if(($tabungan_target == 0) or $tabungan_realisasi == 0){
                $tabungan = 0;
            }else{
                $tabungan = ($tabungan_realisasi / $tabungan_target) * 100;
            }

            if(($deposito_target == 0) or $deposito_realisasi == 0){
                $deposito = 0;
            }else{
                $deposito = ($deposito_realisasi / $deposito_target) * 100;
            }

            if(($kredit_target == 0) or $kredit_realisasi == 0){
                $kredit = 0;
            }else{
                $kredit = ($kredit_realisasi / $kredit_target) * 100;
            }

            $data['ASET'] = round($aset, 2);
            $data['LABA'] = round($laba, 2);
            $data['BIAYA'] = round($biaya, 2);
            $data['PENDAPATAN'] = round($pendapatan, 2);
            $data['TABUNGAN'] = round($tabungan, 2);
            $data['DEPOSITO'] = round($deposito, 2);
            $data['KREDIT'] = round($kredit, 2);
                    
            if(!empty($data)){
                $result = array('status' => 'OK', 'data' => $data);
            }else{
                $result = array('status' => 'EMPTY');
            }
        }

        echo json_encode($result);

    }
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/api/Dashboard.php */