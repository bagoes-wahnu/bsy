<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends E_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->library('PHPExcel');
		$this->load->model('M_kota');
		$this->load->model('M_import_kota');
		$this->load->model('M_wilayah');
		$this->load->model('M_import_wilayah');
		$this->load->model('M_cabang');
		$this->load->model('M_import_cabang');
		$this->load->model('M_kas');
		$this->load->model('M_import_kas');
		$this->load->model('M_branch');
	}

	public function index()
	{
		$data['content'] = $this->load->view('keuangan/utama','',true);
		$this->load->view('dashboard',$data);
	}

	public function kota($id_kota='')
	{
		if(!empty($id_kota)){
			$get_kota = $this->M_kota->get($id_kota);
			if(!empty($get_kota) AND ($get_kota['DELETED'] != 1) AND ($get_kota['STATUS'] == 1)){
				$data['id_kota'] = $id_kota;
				$data['detail_kota'] = $get_kota;
				$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
				$data['keuangan'] = $this->M_import_kota->grid_kota($id_kota);
				$data['content'] = $this->load->view('keuangan/kota',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
			$data['keuangan'] = $this->M_import_kota->grid();
			$data['content'] = $this->load->view('keuangan/kota',$data,true);
			$this->load->view('dashboard',$data);
		}
	}

	public function import_kota()
	{
		// $this->form_validation->set_rules("kota","Kota","required");
		// if($this->form_validation->run() == false){
		// 	$res = array(
		// 		"status"=>"ERROR",
		// 		"msg" => "Silahkan lengkapi form terlebih dahulu",
		// 		"kota"=>form_error("kota")
		// 		);
		// 	echo json_encode($res);
		// } else {
			$err=0;
			if($_FILES['file']['name']){
				// $id_kota = $this->input->post('kota');
				$arr_kolom_import = array('KODE', 'ASET_REALISASI', 'ASET_TARGET', 'LABA_REALISASI', 'LABA_TARGET', 'BIAYA_REALISASI', 'BIAYA_TARGET', 'PENDAPATAN_REALISASI', 'PENDAPATAN_TARGET', 'TABUNGAN_REALISASI', 'TABUNGAN_TARGET', 'DEPOSITO_REALISASI', 'DEPOSITO_TARGET', 'KREDIT_REALISASI', 'KREDIT_TARGET', 'CAR', 'ROA', 'ROE', 'BOPO', 'CR', 'LDR', 'KAP', 'NPL_GROSS', 'NPL_NET', 'NIM', 'BULAN', 'TAHUN');

				if(!is_dir("./ffdwjws/temp")){
					mkdir("./ffdwjws/temp");
				}

				$directory = "./ffdwjws/temp";

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'xlsx';
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$res = array(
						"status"=>"ERROR",
						"msg" => "File TIDAK berhasil diupload"
						);
				}else{
					$data = $this->upload->data();

					$file = FCPATH.$directory.'/'.$data['file_name'];

					$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(TRUE);
					$objPHPExcel = $objReader->load($file);

					$objWorksheet = $objPHPExcel->getActiveSheet();

					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

					$now = date('Y-m-d H:i:s');
					$arr_id_branch = array();

					for ($row = 2; $row <= $highestRow; $row++) {
						$data = array();
						$first_value = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
						if(!empty($first_value)){
							// $current_id = $this->M_import_kota->save(array('ID_KOTA' => $id_kota, 'TIMESTAMP' => $now));
							for ($col = 0; $col <= $highestColumnIndex; $col++) {
								$value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
								if(!empty($value)){
									$kolom = $arr_kolom_import[$col];
									// $this->M_import_kota->save(array($kolom => $value), $current_id);
									if($kolom == 'KODE'){
										$kolom = 'ID_KOTA';
										if(in_array($value, $arr_id_branch)){
											$value = $arr_id_branch[$value];
										}else{
											$temp_id_branch = $this->M_branch->get_by(array('BRANCH' => $value), FALSE, FALSE, TRUE);
											if(!empty($temp_id_branch)){
												$arr_id_branch[$value] = $temp_id_branch['ID_BRANCH'];
												$value = $temp_id_branch['ID_BRANCH'];
											}else{
												$value = '';
											}
										}
									}

									$data[$kolom] = $value;
								}
							}

							if(!empty($data)){
								$get_id = $this->M_import_kota->get_by(array('ID_KOTA' => $data['ID_KOTA'], 'BULAN' => $data['BULAN'], 'TAHUN' => $data['TAHUN']), false, false, true);
								if(!empty($get_id)){
									$this->M_import_kota->save($data, $get_id['ID_IMPORT']);
								}else{
									$this->M_import_kota->save($data);
								}
							}
						}
					}

					unlink($file);

					$res = array(
						"status"=>"OK",
						"msg" => "Data berhasil diimport"
						);
				}
				echo json_encode($res);				
			}else{
				$res = array(
					"status"=>"ERROR",
					"msg" => "Tidak ada file untuk diimport"
					);
				echo json_encode($res);
			}
		// }
	}
	
	public function wilayah($id_kota='')
	{
		if(!empty($id_kota)){
			$get_kota = $this->M_kota->get($id_kota);
			if(!empty($get_kota) AND ($get_kota['DELETED'] != 1) AND ($get_kota['STATUS'] == 1)){
				$data['id_kota'] = $id_kota;
				$data['detail_kota'] = $get_kota;
				$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
				$data['keuangan'] = $this->M_import_wilayah->grid_kota($id_kota);
				$data['content'] = $this->load->view('keuangan/wilayah',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
			$data['keuangan'] = $this->M_import_wilayah->grid();
			$data['content'] = $this->load->view('keuangan/wilayah',$data,true);
			$this->load->view('dashboard',$data);
		}
	}

	public function import_wilayah()
	{
		$this->form_validation->set_rules("wilayah","Nama Wilayah","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"wilayah"=>form_error("wilayah")
				);
			echo json_encode($res);
		} else {
			$err=0;
			if($_FILES['file']['name']){
				$id_wilayah = $this->input->post('wilayah');
				$arr_kolom_import = array('ASET_REALISASI', 'ASET_TARGET', 'LABA_REALISASI', 'LABA_TARGET', 'BIAYA_REALISASI', 'BIAYA_TARGET', 'PENDAPATAN_REALISASI', 'PENDAPATAN_TARGET', 'TABUNGAN_REALISASI', 'TABUNGAN_TARGET', 'DEPOSITO_REALISASI', 'DEPOSITO_TARGET', 'KREDIT_REALISASI', 'KREDIT_TARGET', 'CAR', 'ROA', 'ROE', 'BOPO', 'CR', 'LDR', 'KAP', 'NPL_GROSS', 'NPL_NET', 'NIM', 'BULAN', 'TAHUN');

				if(!is_dir("./ffdwjws/temp")){
					mkdir("./ffdwjws/temp");
				}

				$directory = "./ffdwjws/temp";

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'xlsx';
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$res = array(
						"status"=>"ERROR",
						"msg" => "File TIDAK berhasil diupload"
						);
				}else{
					$data = $this->upload->data();

					$file = FCPATH.$directory.'/'.$data['file_name'];

					$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(TRUE);
					$objPHPExcel = $objReader->load($file);

					$objWorksheet = $objPHPExcel->getActiveSheet();

					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

					$now = date('Y-m-d H:i:s');

					for ($row = 2; $row <= $highestRow; $row++) {
						$first_value = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
						if(!empty($first_value)){
							$current_id = $this->M_import_wilayah->save(array('ID_WILAYAH' => $id_wilayah, 'TIMESTAMP' => $now));
							for ($col = 0; $col <= $highestColumnIndex; $col++) {
								$value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
								if(!empty($value)){
									$kolom = $arr_kolom_import[$col];
									$this->M_import_wilayah->save(array($kolom => $value), $current_id);
								}
							}
						}
					}

					unlink($file);

					$res = array(
						"status"=>"OK",
						"msg" => "Data berhasil diimport"
						);
				}
				echo json_encode($res);				
			}else{
				$res = array(
					"status"=>"ERROR",
					"msg" => "Silahkan lengkapi form terlebih dahulu"
					);
				echo json_encode($res);
			}
		}
	}

	public function cabang($id_wilayah='')
	{
		$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
		if(!empty($id_wilayah)){
			$get_wilayah = $this->M_wilayah->get($id_wilayah);
			if(!empty($get_wilayah)){
				$data['id_wilayah'] = $id_wilayah;
				$data['detail_wilayah'] = $get_wilayah;
				// $data['wilayah'] = $this->M_wilayah->get_data();
				// $data['keuangan'] = $this->M_import_cabang->grid_wilayah($id_wilayah);
				$data['content'] = $this->load->view('keuangan/cabang',$data,true);
				$this->load->view('dashboard',$data);
			}else{
				$this->load->view('errors/error_404');
			}
		}else{
			// $data['wilayah'] = $this->M_wilayah->get_data();
			// $data['keuangan'] = $this->M_import_cabang->grid();
			$data['content'] = $this->load->view('keuangan/cabang',$data,true);
			$this->load->view('dashboard',$data);
		}
	}

	public function import_cabang()
	{
		$this->form_validation->set_rules("cabang","Nama Cabang","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"cabang"=>form_error("cabang")
				);
			echo json_encode($res);
		} else {
			$err=0;
			if($_FILES['file']['name']){
				$id_cabang = $this->input->post('cabang');
				$arr_kolom_import = array('ASET_REALISASI', 'ASET_TARGET', 'LABA_REALISASI', 'LABA_TARGET', 'BIAYA_REALISASI', 'BIAYA_TARGET', 'PENDAPATAN_REALISASI', 'PENDAPATAN_TARGET', 'TABUNGAN_REALISASI', 'TABUNGAN_TARGET', 'DEPOSITO_REALISASI', 'DEPOSITO_TARGET', 'KREDIT_REALISASI', 'KREDIT_TARGET', 'CAR', 'ROA', 'ROE', 'BOPO', 'CR', 'LDR', 'KAP', 'NPL_GROSS', 'NPL_NET', 'NIM', 'BULAN', 'TAHUN');

				if(!is_dir("./ffdwjws/temp")){
					mkdir("./ffdwjws/temp");
				}

				$directory = "./ffdwjws/temp";

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'xlsx';
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$res = array(
						"status"=>"ERROR",
						"msg" => "File TIDAK berhasil diupload"
						);
				}else{
					$data = $this->upload->data();

					$file = FCPATH.$directory.'/'.$data['file_name'];

					$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(TRUE);
					$objPHPExcel = $objReader->load($file);

					$objWorksheet = $objPHPExcel->getActiveSheet();

					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

					$now = date('Y-m-d H:i:s');

					for ($row = 2; $row <= $highestRow; $row++) {
						$first_value = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
						if(!empty($first_value)){
							$current_id = $this->M_import_cabang->save(array('ID_CABANG' => $id_cabang, 'TIMESTAMP' => $now));
							for ($col = 0; $col <= $highestColumnIndex; $col++) {
								$value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
								if(!empty($value)){
									$kolom = $arr_kolom_import[$col];
									$this->M_import_cabang->save(array($kolom => $value), $current_id);
								}
							}
						}
					}

					unlink($file);

					$res = array(
						"status"=>"OK",
						"msg" => "Data berhasil diimport"
						);
				}
				echo json_encode($res);				
			}else{
				$res = array(
					"status"=>"ERROR",
					"msg" => "Silahkan lengkapi form terlebih dahulu"
					);
				echo json_encode($res);
			}
		}
	}

	public function kas()
	{
		$data['kota'] = $this->M_kota->get_by(array('DELETED' => 0, 'STATUS' => 1));
		$data['wilayah'] = $this->M_wilayah->get_data();
		$data['wilayah'] = $this->M_kas->get_data();
		$data['content'] = $this->load->view('keuangan/kas',$data,true);
		$this->load->view('dashboard',$data);		
	}

	public function import_kas()
	{
		$this->form_validation->set_rules("kas","Nama Cabang","required");
		if($this->form_validation->run() == false){
			$res = array(
				"status"=>"ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu",
				"kas"=>form_error("kas")
				);
			echo json_encode($res);
		} else {
			$err=0;
			if($_FILES['file']['name']){
				$id_kas = $this->input->post('kas');
				$arr_kolom_import = array('ASET_REALISASI', 'ASET_TARGET', 'LABA_REALISASI', 'LABA_TARGET', 'BIAYA_REALISASI', 'BIAYA_TARGET', 'PENDAPATAN_REALISASI', 'PENDAPATAN_TARGET', 'TABUNGAN_REALISASI', 'TABUNGAN_TARGET', 'DEPOSITO_REALISASI', 'DEPOSITO_TARGET', 'KREDIT_REALISASI', 'KREDIT_TARGET', 'CAR', 'ROA', 'ROE', 'BOPO', 'CR', 'LDR', 'KAP', 'NPL_GROSS', 'NPL_NET', 'NIM', 'BULAN', 'TAHUN');

				if(!is_dir("./ffdwjws/temp")){
					mkdir("./ffdwjws/temp");
				}

				$directory = "./ffdwjws/temp";

				$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

				$uploadfile = $_FILES['file']['name'];
				$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
				$file_name = date('YmdHis').'_'.str_replace($forbidden_char, '', $replaced_file_name);


				$config['upload_path'] 		= $directory;
				$config['allowed_types'] 	= 'xlsx';
				$config['encrypt_name'] 	= FALSE;
				$config['file_name'] = $file_name;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('file')){
					$res = array(
						"status"=>"ERROR",
						"msg" => "File TIDAK berhasil diupload"
						);
				}else{
					$data = $this->upload->data();

					$file = FCPATH.$directory.'/'.$data['file_name'];

					$objReader = PHPExcel_IOFactory::createReader('Excel2007');
					$objReader->setReadDataOnly(TRUE);
					$objPHPExcel = $objReader->load($file);

					$objWorksheet = $objPHPExcel->getActiveSheet();

					$highestRow = $objWorksheet->getHighestRow();
					$highestColumn = $objWorksheet->getHighestColumn();
					$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

					$now = date('Y-m-d H:i:s');

					for ($row = 2; $row <= $highestRow; $row++) {
						$first_value = $objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
						if(!empty($first_value)){
							$current_id = $this->M_import_kas->save(array('ID_KAS' => $id_kas, 'TIMESTAMP' => $now));
							for ($col = 0; $col <= $highestColumnIndex; $col++) {
								$value = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
								if(!empty($value)){
									$kolom = $arr_kolom_import[$col];
									$this->M_import_kas->save(array($kolom => $value), $current_id);
								}
							}
						}
					}

					unlink($file);

					$res = array(
						"status"=>"OK",
						"msg" => "Data berhasil diimport"
						);
				}
				echo json_encode($res);				
			}else{
				$res = array(
					"status"=>"ERROR",
					"msg" => "Silahkan lengkapi form terlebih dahulu"
					);
				echo json_encode($res);
			}
		}
	}











	public function hal()
	{
		$data['content'] = $this->load->view('keuangan/halaman','',true);
		$this->load->view('dashboard',$data);
	}

	public function wil()
	{
		$data['content'] = $this->load->view('keuangan/wilayah','',true);
		$this->load->view('dashboard',$data);
	}

	public function cab()
	{
		$data['content'] = $this->load->view('keuangan/cabang','',true);
		$this->load->view('dashboard',$data);
	}

	public function kas2()
	{
		$data['content'] = $this->load->view('keuangan/kas','',true);
		$this->load->view('dashboard',$data);
	}
}
