<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graph extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->model('M_import_kota');
	}

	public function index()
	{
		$data['last_krt'] = $this->M_import_kota->get_last_data(2);
		$data['last_konsolidasi'] = $this->M_import_kota->get_last_data();
		$data['content'] = $this->load->view('home',$data,true);
		$this->load->view('dashboard',$data);
	}	

	public function tabungan($id_kota='all', $group=false, $branch=false)
	{
		$arr_kota = array('all' => 'Konsolidasi', '1' => 'Banjarnegara', '2' => 'Wonosobo');

		$data['id_kota'] = $id_kota;
		$data['group'] = 'A';
		$data['branch'] = '0000';
		$data['kota'] = $arr_kota[$id_kota];

		if($id_kota == 'all'){
			$id_kota = '';
		}

		$data['latest'] = $this->M_import_kota->get_last_data($id_kota);
		$data['content'] = $this->load->view('graphic/tabungan',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get_tabungan($year='', $month='', $id_kota='all')
	{
		$result = array();
		if($this->input->is_ajax_request()){
			$group = 'A';
			$branch = '0000';

			$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
			if($month != '0'){
				$month = (array_search($month, $arr_bulan) + 1);
			}

			if($id_kota == 'all'){
				$id_kota = '';
			}

			$arr_bar = array();

			$oldest_month = $month + 1;
			$oldest_year = $year - 1;
			if($oldest_month == 0){
				$oldest_month = 12;
			}

			if($oldest_month == 13){
				$oldest_year = $year;
				$oldest_month = 1;
			}

			for ($i=0; $i < 12; $i++) {
				$get_data = $this->M_import_kota->graph_tabungan($oldest_year, $oldest_month, $id_kota, $group, $branch);
				$arr_bar[$i] = array(
					'BULAN' => $oldest_month, 
					'TAHUN' => $oldest_year, 
					'TARGET' => empty($get_data['TABUNGAN_TARGET'])? 0: round(($get_data['TABUNGAN_TARGET'] / 1000000000), 2), 
					'REALISASI' => empty($get_data['TABUNGAN_REALISASI'])? 0: round(($get_data['TABUNGAN_REALISASI'] / 1000000000), 2));

				$oldest_month++;
				if($oldest_month == 13){
					$oldest_month = 1;
					$oldest_year = $year;
				}
			}

			$get_nominal = $this->M_import_kota->graph_tabungan($year, $month, $id_kota, $group, $branch);
			$get_pie = $this->M_import_kota->get_pie($year, $month, $id_kota, $group, $branch);

			$nominal = empty($get_nominal['TABUNGAN_REALISASI'])? 0 : $get_nominal['TABUNGAN_REALISASI'];
			$nominal = helpCurrency($nominal);
			$chart['bar'] = $arr_bar;
			$chart['pie'] = $get_pie;
			$get['id_kota'] = $id_kota;
			$merge = $chart + $get;
			$data = $this->load->view('graphic/graph_tabungan',$merge,true);
			$result = array('status' => 'OK', 'data' => $data, 'nominal' => $nominal);
		}else{
			$result = array('status' => 'FORBIDDEN');
		}

		echo json_encode($result);
	}

	public function deposito($id_kota='all', $group=false, $branch=false)
	{
		$arr_kota = array('all' => 'Konsolidasi', '1' => 'Banjarnegara', '2' => 'Wonosobo');

		$data['id_kota'] = $id_kota;
		$data['group'] = 'A';
		$data['branch'] = '0000';
		$data['kota'] = $arr_kota[$id_kota];

		if($id_kota == 'all'){
			$id_kota = '';
		}

		$data['latest'] = $this->M_import_kota->get_last_data($id_kota);
		$data['content'] = $this->load->view('graphic/deposito',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get_deposito($year='', $month='', $id_kota='all')
	{
		$result = array();
		$group = 'A';
		$branch = '0000';
		if($this->input->is_ajax_request()){
			$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
			$arr_jangka_waktu = array('1','3','6','12');

			if($month != '0'){
				$month = (array_search($month, $arr_bulan) + 1);
			}

			if($id_kota == 'all'){
				$id_kota = '';
			}

			$arr_bar = array();
			$arr_pie = array();

			$oldest_month = $month + 1;
			$oldest_year = $year - 1;
			if($oldest_month == 0){
				$oldest_month = 12;
			}

			if($oldest_month == 13){
				$oldest_year = $year;
				$oldest_month = 1;
			}

			for ($i=0; $i < 12; $i++) {
				$get_data = $this->M_import_kota->graph_deposito($oldest_year, $oldest_month, $id_kota, $group, $branch);
				$arr_bar[$i] = array(
					'BULAN' => $oldest_month, 
					'TAHUN' => $oldest_year, 
					'TARGET' => empty($get_data['DEPOSITO_TARGET'])? 0: round(($get_data['DEPOSITO_TARGET'] / 1000000000), 2), 
					'REALISASI' => empty($get_data['DEPOSITO_REALISASI'])? 0: round(($get_data['DEPOSITO_REALISASI'] / 1000000000), 2));

				$oldest_month++;
				if($oldest_month == 13){
					$oldest_month = 1;
					$oldest_year = $year;
				}
			}

			$get_nominal = $this->M_import_kota->graph_deposito($year, $month, $id_kota, $group, $branch);
			$get_pie = $this->M_import_kota->get_pie_deposito($year, $month, $id_kota, $group, $branch);

			$nominal = empty($get_nominal['DEPOSITO_REALISASI'])? 0 : $get_nominal['DEPOSITO_REALISASI'];
			$nominal = helpCurrency($nominal);
			$chart['bar'] = $arr_bar;
			$chart['pie'] = $get_pie;
			$chart['arr_jangka_waktu'] = $arr_jangka_waktu;
			$data = $this->load->view('graphic/graph_deposito',$chart,true);
			$result = array('status' => 'OK', 'data' => $data, 'nominal' => $nominal);
		}else{
			$result = array('status' => 'FORBIDDEN');
		}

		echo json_encode($result);
	}

	public function kredit($id_kota='all', $group=false, $branch=false)
	{
		$arr_kota = array('all' => 'Konsolidasi', '1' => 'Banjarnegara', '2' => 'Wonosobo');

		$data['id_kota'] = $id_kota;
		$data['group'] = 'A';
		$data['branch'] = '0000';
		$data['kota'] = $arr_kota[$id_kota];

		if($id_kota == 'all'){
			$id_kota = '';
		}

		$data['latest'] = $this->M_import_kota->get_last_data($id_kota);
		$data['content'] = $this->load->view('graphic/kredit',$data,true);
		$this->load->view('dashboard',$data);
	}

	public function get_kredit($year='', $month='', $id_kota='all')
	{
		$result = array();
		$group = 'A';
			$branch = '0000';
		if($this->input->is_ajax_request()){
			$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');
			$arr_jenis_kredit = array('KREDIT UMUM','KREDIT PEGAWAI','KREDIT MOTOR','KREDIT URK','KREDIT MOBIL');

			if($month != '0'){
				$month = (array_search($month, $arr_bulan) + 1);
			}

			if($id_kota == 'all'){
				$id_kota = '';
			}

			$arr_bar = array();
			$arr_pie = array();

			$oldest_month = $month + 1;
			$oldest_year = $year - 1;
			if($oldest_month == 0){
				$oldest_month = 12;
			}

			if($oldest_month == 13){
				$oldest_year = $year;
				$oldest_month = 1;
			}

			for ($i=0; $i < 12; $i++) {
				$get_data = $this->M_import_kota->graph_kredit($oldest_year, $oldest_month, $id_kota, $group, $branch);
				$arr_bar[$i] = array(
					'BULAN' => $oldest_month, 
					'TAHUN' => $oldest_year, 
					'TARGET' => empty($get_data['KREDIT_TARGET'])? 0: round(($get_data['KREDIT_TARGET'] / 1000000000), 2), 
					'REALISASI' => empty($get_data['KREDIT_REALISASI'])? 0: round(($get_data['KREDIT_REALISASI'] / 1000000000), 2));

				$oldest_month++;
				if($oldest_month == 13){
					$oldest_month = 1;
					$oldest_year = $year;
				}
			}

			$get_nominal = $this->M_import_kota->graph_kredit($year, $month, $id_kota, $group, $branch);
			$get_pie = $this->M_import_kota->get_pie_kredit($year, $month, $id_kota, $group, $branch);

			$nominal = empty($get_nominal['KREDIT_REALISASI'])? 0 : $get_nominal['KREDIT_REALISASI'];
			$nominal = helpCurrency($nominal);
			$chart['bar'] = $arr_bar;
			$chart['pie'] = $get_pie;
			$chart['arr_jenis_kredit'] = $arr_jenis_kredit;
			$data = $this->load->view('graphic/graph_kredit',$chart,true);
			$result = array('status' => 'OK', 'data' => $data, 'nominal' => $nominal);
		}else{
			$result = array('status' => 'FORBIDDEN');
		}

		echo json_encode($result);
	}

	public function bar($jenis, $id_kota='all', $group=false, $branch=false)
	{
		$arr_kota = array('all' => 'Konsolidasi', '1' => 'Banjarnegara', '2' => 'Wonosobo');
		$arr_jenis = array('tabungan', 'kredit', 'deposito', 'aset', 'laba', 'biaya', 'pendapatan', 'car', 'roa', 'roe', 'bopo', 'cr', 'ldr', 'kap', 'npl_gross', 'npl_net', 'nim');
		$arr_label = array('tabungan' => 'Tabungan', 'kredit' => 'Kredit', 'deposito' => 'Deposito', 'aset' => 'Aset', 'laba' => 'Laba', 'biaya' => 'Biaya', 'pendapatan' => 'Pendapatan', 'car' => 'CAR', 'roa' => 'ROA', 'roe' => 'ROE', 'bopo' => 'BOPO', 'cr' => 'CR', 'ldr' => 'LDR', 'kap' => 'KAP', 'npl_gross' => 'NPL Gross', 'npl_net' => 'NPL Net', 'nim' => 'NIM');

		if(in_array(strtolower($jenis), $arr_jenis)){

			$data['jenis'] = $jenis;
			$data['label'] = $arr_label[strtolower($jenis)];
			$data['id_kota'] = $id_kota;
			$data['group'] = 'A';
			$data['branch'] = '0000';
			$data['kota'] = $arr_kota[$id_kota];

			if($id_kota == 'all'){
				$id_kota = '';
			}

			$data['latest'] = $this->M_import_kota->get_last_data($id_kota);
			$data['content'] = $this->load->view('graphic/bar',$data,true);
			$this->load->view('dashboard',$data);
		}else{
			$this->load->view('errors/error_404');
		}
	}

	public function get_bar($jenis='', $year='', $month='', $id_kota='all', $group=false, $branch=false)
	{
		$result = array('status' => 'FORBIDDEN');
		$group = 'A';
		$branch = '0000';
		if($this->input->is_ajax_request()){
			$run = FALSE;
			$arr_label = array('tabungan' => 'Tabungan', 'kredit' => 'Kredit', 'deposito' => 'Deposito', 'aset' => 'Aset', 'laba' => 'Laba', 'biaya' => 'Biaya', 'pendapatan' => 'Pendapatan', 'car' => 'CAR', 'roa' => 'ROA', 'roe' => 'ROE', 'bopo' => 'BOPO', 'cr' => 'CR', 'ldr' => 'LDR', 'kap' => 'KAP', 'npl_gross' => 'NPL Gross', 'npl_net' => 'NPL Net', 'nim' => 'NIM');
			$arr_bulan = array('January','February','March','April','May','June','July','August','September','October','November','December');

			if($month != '0'){
				$month = (array_search($month, $arr_bulan) + 1);
			}

			if($id_kota == 'all'){
				$id_kota = '';
			}

			$arr_bar = array();

			$oldest_month = $month + 1;
			$oldest_year = $year - 1;
			if($oldest_month == 0){
				$oldest_month = 12;
			}

			if($oldest_month == 13){
				$oldest_year = $year;
				$oldest_month = 1;
			}

			if(strtolower($jenis) == 'tabungan'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_tabungan($oldest_year, $oldest_month, $id_kota, $group, $branch);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['TABUNGAN_TARGET'])? 0: round(($get_data['TABUNGAN_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['TABUNGAN_REALISASI'])? 0: round(($get_data['TABUNGAN_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_tabungan($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['TABUNGAN_REALISASI'])? 0 : $get_nominal['TABUNGAN_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'kredit'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_kredit($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['KREDIT_TARGET'])? 0: round(($get_data['KREDIT_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['KREDIT_REALISASI'])? 0: round(($get_data['KREDIT_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_kredit($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['KREDIT_REALISASI'])? 0 : $get_nominal['KREDIT_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'deposito'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_deposito($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['DEPOSITO_TARGET'])? 0: round(($get_data['DEPOSITO_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['DEPOSITO_REALISASI'])? 0: round(($get_data['DEPOSITO_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_deposito($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['DEPOSITO_REALISASI'])? 0 : $get_nominal['DEPOSITO_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'aset'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_aset($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['ASET_TARGET'])? 0: round(($get_data['ASET_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['ASET_REALISASI'])? 0: round(($get_data['ASET_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_aset($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['ASET_REALISASI'])? 0 : $get_nominal['ASET_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'laba'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_laba($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['LABA_TARGET'])? 0: round(($get_data['LABA_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['LABA_REALISASI'])? 0: round(($get_data['LABA_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_laba($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['LABA_REALISASI'])? 0 : $get_nominal['LABA_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'biaya'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_biaya($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['BIAYA_TARGET'])? 0: round(($get_data['BIAYA_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['BIAYA_REALISASI'])? 0: round(($get_data['BIAYA_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_biaya($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['BIAYA_REALISASI'])? 0 : $get_nominal['BIAYA_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'pendapatan'){
				$run = TRUE;
				$satuan = 'currency';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_pendapatan($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['PENDAPATAN_TARGET'])? 0: round(($get_data['PENDAPATAN_TARGET'] / 1000000000), 2), 
						'REALISASI' => empty($get_data['PENDAPATAN_REALISASI'])? 0: round(($get_data['PENDAPATAN_REALISASI'] / 1000000000), 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_pendapatan($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['PENDAPATAN_REALISASI'])? 0 : $get_nominal['PENDAPATAN_REALISASI'];
				$nominal = helpCurrency($nominal);
			}elseif(strtolower($jenis) == 'car'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_car($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['CAR_TARGET'])? 0: round($get_data['CAR_TARGET'], 2), 
						'REALISASI' => empty($get_data['CAR_REALISASI'])? 0: round($get_data['CAR_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_car($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['CAR_REALISASI'])? 0 : $get_nominal['CAR_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'roa'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_roa($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['ROA_TARGET'])? 0: round($get_data['ROA_TARGET'], 2), 
						'REALISASI' => empty($get_data['ROA_REALISASI'])? 0: round($get_data['ROA_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_roa($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['ROA_REALISASI'])? 0 : $get_nominal['ROA_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'roe'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_roe($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['ROE_TARGET'])? 0: round($get_data['ROE_TARGET'], 2), 
						'REALISASI' => empty($get_data['ROE_REALISASI'])? 0: round($get_data['ROE_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_roe($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['ROE_REALISASI'])? 0 : $get_nominal['ROE_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'bopo'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_bopo($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['BOPO_TARGET'])? 0: round($get_data['BOPO_TARGET'], 2), 
						'REALISASI' => empty($get_data['BOPO_REALISASI'])? 0: round($get_data['BOPO_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_bopo($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['BOPO_REALISASI'])? 0 : $get_nominal['BOPO_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'cr'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_cr($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['CR_TARGET'])? 0: round($get_data['CR_TARGET'], 2), 
						'REALISASI' => empty($get_data['CR_REALISASI'])? 0: round($get_data['CR_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_cr($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['CR_REALISASI'])? 0 : $get_nominal['CR_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'ldr'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_ldr($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['LDR_TARGET'])? 0: round($get_data['LDR_TARGET'], 2), 
						'REALISASI' => empty($get_data['LDR_REALISASI'])? 0: round($get_data['LDR_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_ldr($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['LDR_REALISASI'])? 0 : $get_nominal['LDR_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'kap'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_kap($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['KAP_TARGET'])? 0: round($get_data['KAP_TARGET'], 2), 
						'REALISASI' => empty($get_data['KAP_REALISASI'])? 0: round($get_data['KAP_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_kap($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['KAP_REALISASI'])? 0 : $get_nominal['KAP_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'npl_gross'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_npl_gross($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['NPL_GROSS_TARGET'])? 0: round($get_data['NPL_GROSS_TARGET'], 2), 
						'REALISASI' => empty($get_data['NPL_GROSS_REALISASI'])? 0: round($get_data['NPL_GROSS_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_npl_gross($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['NPL_GROSS_REALISASI'])? 0 : $get_nominal['NPL_GROSS_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'npl_net'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_npl_net($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['NPL_NET_TARGET'])? 0: round($get_data['NPL_NET_TARGET'], 2), 
						'REALISASI' => empty($get_data['NPL_NET_REALISASI'])? 0: round($get_data['NPL_NET_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_npl_net($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['NPL_NET_REALISASI'])? 0 : $get_nominal['NPL_NET_REALISASI'];
				$nominal = $nominal .'%';
			}elseif(strtolower($jenis) == 'nim'){
				$run = TRUE;
				$satuan = 'percent';
				for ($i=0; $i < 12; $i++) {
					$get_data = $this->M_import_kota->graph_nim($oldest_year, $oldest_month, $id_kota);
					$arr_bar[$i] = array(
						'BULAN' => $oldest_month, 
						'TAHUN' => $oldest_year, 
						'TARGET' => empty($get_data['NIM_TARGET'])? 0: round($get_data['NIM_TARGET'], 2), 
						'REALISASI' => empty($get_data['NIM_REALISASI'])? 0: round($get_data['NIM_REALISASI'], 2));

					$oldest_month++;
					if($oldest_month == 13){
						$oldest_month = 1;
						$oldest_year = $year;
					}
				}

				$get_nominal = $this->M_import_kota->graph_nim($year, $month, $id_kota, $group, $branch);

				$nominal = empty($get_nominal['NIM_REALISASI'])? 0 : $get_nominal['NIM_REALISASI'];
				$nominal = $nominal .'%';
			}

			if($run == TRUE){
				$chart['satuan'] = $satuan;
				$chart['bar'] = $arr_bar;
				$chart['label'] = $arr_label[strtolower($jenis)];
				$data = $this->load->view('graphic/graph_bar',$chart,true);
				$result = array('status' => 'OK', 'data' => $data, 'nominal' => $nominal);
			}
		}

		echo json_encode($result);
	}
}
