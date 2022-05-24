<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import_transaksi extends E_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->library('PHPExcel');
		$this->load->model('M_group');
		$this->load->model('M_branch');
		$this->load->model('M_transaksi');
		$this->load->model('M_import_kota');
	}

	public function import_data()
	{
		$result = array('status' => 'ERROR', 'msg' => 'Silahkan lengkapi form terlebih dahulu!');
		$arr_kolom_realisasi = array('LN' => 'KREDIT_REALISASI', 'RT' => 'TABUNGAN_REALISASI', 'DP' => 'DEPOSITO_REALISASI');

		$err=0;
		if($_FILES['file']['name']){
			
			if(!is_dir("./ffdwjws/temp")){
				mkdir("./ffdwjws/temp");
			}

			$directory = "./ffdwjws/temp";

			$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

			$uploadfile = $_FILES['file']['name'];
			$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
			$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


			$config['upload_path'] 		= $directory;
			$config['allowed_types'] 	= 'csv';
			$config['encrypt_name'] 	= FALSE;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')){
				$result = array(
					"status"=>"ERROR",
					"msg" => "File TIDAK berhasil diupload"
					);
			}else{
				$data = $this->upload->data();

				$file = $directory.'/'.$data['file_name'];				

				$now = date('Y-m-d H:i:s');

				$this->M_transaksi->empty_table();

				$this->M_transaksi->import_data($file);
				
				// insert or update realisasi keuangan kota
				$get_realisasi = $this->M_transaksi->get_realisasi('A');
				foreach ($get_realisasi as $key => $value) {
					$where = array('ID_KOTA' => $value['ID_BRANCH'], 'BULAN' => $value['BULAN'], 'TAHUN' => $value['TAHUN']);
					$cek_id = $this->M_import_kota->get_by($where, FALSE, FALSE, TRUE);
					$data = array(
						'ID_KOTA' => $value['ID_BRANCH'],
						'BULAN' => $value['BULAN'],
						'TAHUN' => $value['TAHUN'],
						'KREDIT_REALISASI' => $value['KREDIT_REALISASI'],
						'TABUNGAN_REALISASI' => $value['TABUNGAN_REALISASI'],
						'DEPOSITO_REALISASI' => $value['DEPOSITO_REALISASI']);

					if(!empty($cek_id)){
						$this->M_import_kota->save($data, $cek_id['ID_IMPORT']);
					}else{
						$this->M_import_kota->save($data);
					}
				}

				// insert or update detail transaksi keuangan kota
				$get_transaksi = $this->M_transaksi->get_transaksi('A');
				foreach ($get_transaksi as $key => $value) {
					$where = array('ID_KOTA' => $value['ID_BRANCH'], 'BULAN' => $value['BULAN'], 'TAHUN' => $value['TAHUN']);
					$cek_id = $this->M_import_kota->get_by($where, FALSE, FALSE, TRUE);
					$data = array(
						'ID_KOTA' => $value['ID_BRANCH'],
						'BULAN' => $value['BULAN'],
						'TAHUN' => $value['TAHUN'],
						'KRED_UMUM' => $value['KRED_UMUM'],
						'KRED_PEG' => $value['KRED_PEG'],
						'KRED_MOTOR' => $value['KRED_MOTOR'],
						'KRED_URK' => $value['KRED_URK'],
						'KRED_MOBIL' => $value['KRED_MOBIL'],
						'TAB_SURYA' => $value['TAB_SURYA'],
						'ATM_KHUSUS' => $value['ATM_KHUSUS'],
						'TAB_PENSIUN' => $value['TAB_PENSIUN'],
						'TAS' => $value['TAS'],
						'TAB_KU' => $value['TAB_KU'],
						'ATM_SURYA' => $value['ATM_SURYA'],
						'TAB_UMROH' => $value['TAB_UMROH'],
						'THT_UMUM' => $value['THT_UMUM'],
						'TAB_SIMPEL' => $value['TAB_SIMPEL'],
						'TAB_PIKNIK' => $value['TAB_PIKNIK'],
						'DEP_1' => $value['DEP_1']);

					if(!empty($cek_id)){
						$this->M_import_kota->save($data, $cek_id['ID_IMPORT']);
					}else{
						$this->M_import_kota->save($data);
					}
				}


				unlink($file);

				$result = array(
					"status"=>"OK",
					"msg" => "Data berhasil diimport"
					);
			}
		}
		echo json_encode($result);				
	}
}