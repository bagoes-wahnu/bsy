<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Import extends E_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->cekLogin();
		$this->load->library('PHPExcel');
		$this->load->model('M_group', 'group');
		$this->load->model('M_branch', 'branch');
		$this->load->model('M_import_kota', 'import_kota');
		$this->load->model('M_history_import', 'history_import');
		$this->load->model('M_import_target', 'import_target');
		$this->load->model('M_import_realisasi_tks', 'import_realisasi_tks');
		$this->load->model('M_import_target_tks', 'import_target_tks');
		$this->load->model('M_import_realisasi_tdk', 'import_realisasi_tdk');
		$this->load->model('M_import_target_tdk', 'import_target_tdk');
	}

	public function index()
	{
		$id_kota = $this->session->userdata('kota');
		$data['id_kota'] = $id_kota;
		$data['content'] = $this->load->view('import/grid.php', '', true);
		$this->load->view('dashboard', $data);
	}

	public function tutorial($jenis = 'target')
	{
		$id_kota = $this->session->userdata('kota');
		$data['id_kota'] = $id_kota;

		$data['content'] = $this->load->view('import/tutorial.php', '', true);
		$this->load->view('dashboard', $data);


		// if($jenis == 'target'){
		// 	$data['content'] = $this->load->view('import/tutorial_target.php','',true);
		// 	$this->load->view('dashboard',$data);
		// }elseif($jenis == 'realisasi'){
		// 	$data['content'] = $this->load->view('import/tutorial_realisasi.php','',true);
		// 	$this->load->view('dashboard',$data);
		// }else{
		// 	$this->load->view('errors/error_404');
		// }
	}

	public function template($action = FALSE)
	{
		if (strtolower($action) == 'download') {
			$this->load->helper('download');
			force_download('./ffdwjws/import/Template.zip', NULL);
		} else {
			$this->load->view('errors/error_404');
		}
	}

	public function keuangan_target()
	{
		$id_kota = $this->session->userdata('kota');
		if (!empty($id_kota)) {
			$data['id_kota'] = $id_kota;
			$data['history_import'] = $this->history_import->get_by(array('JENIS' => 'target', 'ID_KOTA' => $id_kota, 'DELETED' => '0'));
			$data['content'] = $this->load->view('import/keuangan_target.php', $data, true);
			$this->load->view('dashboard', $data);
		} else {
			$this->page_not_found();
		}
	}

	public function json_grid_target()
	{
		$id_kota = $this->session->userdata('kota');
		$where = array('JENIS' => 'target', 'ID_KOTA' => $id_kota, 'DELETED' => '0');

		$numbcol = $this->input->get('iSortCol_0');

		$echo = $this->input->get('sEcho');
		$start = $this->input->get('iDisplayStart');
		$length = $this->input->get('iDisplayLength');

		$search = $this->input->get('sSearch');
		$pattern = '/[^a-zA-Z0-9 !@#$%^&*\/\.\,\(\)-_:;?\+=]/u';
		$search = preg_replace($pattern, '', $search);

		$sorting = $this->input->get('sSortDir_0');
		$colsorting = $this->input->get('mDataProp_' . $numbcol);

		$res = $this->history_import->json_grid($start, $length, $where, $search, false, $sorting, $colsorting);
		$count = $this->history_import->json_grid($start, $length, $where, $search, true, $sorting, $colsorting);

		$data = array("sEcho" => $echo, "iTotalRecords" => $count, "iTotalDisplayRecords" => $count, "aaData" => $res);
		echo json_encode($data);
	}

	public function keuangan_realisasi()
	{
		$id_kota = $this->session->userdata('kota');
		if (!empty($id_kota)) {
			$data['id_kota'] = $id_kota;
			$data['history_import'] = $this->history_import->get_by(array('JENIS' => 'realisasi', 'ID_KOTA' => $id_kota, 'DELETED' => '0'));
			$data['content'] = $this->load->view('import/keuangan_realisasi.php', $data, true);
			$this->load->view('dashboard', $data);
		} else {
			$this->page_not_found();
		}
	}

	public function json_grid_realisasi()
	{
		$id_kota = $this->session->userdata('kota');
		$where = array('JENIS' => 'realisasi', 'ID_KOTA' => $id_kota, 'DELETED' => '0');

		$numbcol = $this->input->get('iSortCol_0');

		$echo = $this->input->get('sEcho');
		$start = $this->input->get('iDisplayStart');
		$length = $this->input->get('iDisplayLength');

		$search = $this->input->get('sSearch');
		$pattern = '/[^a-zA-Z0-9 !@#$%^&*\/\.\,\(\)-_:;?\+=]/u';
		$search = preg_replace($pattern, '', $search);

		$sorting = $this->input->get('sSortDir_0');
		$colsorting = $this->input->get('mDataProp_' . $numbcol);

		$res = $this->history_import->json_grid($start, $length, $where, $search, false, $sorting, $colsorting);
		$count = $this->history_import->json_grid($start, $length, $where, $search, true, $sorting, $colsorting);

		$data = array("sEcho" => $echo, "iTotalRecords" => $count, "iTotalDisplayRecords" => $count, "aaData" => $res);
		echo json_encode($data);
	}

	public function target()
	{
		$this->form_validation->set_rules("tahun", "Tahun", "required");
		$this->form_validation->set_rules("jenis", "Jenis", "required");
		if ($this->form_validation->run() == false) {
			$result = array(
				"status" => "ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu!"
			);
			echo json_encode($result);
		} else {
			$id_kota = $this->session->userdata('kota');
			$jenis = $this->input->post('jenis');
			$tahun = $this->input->post('tahun');

			$cek_exist = $this->history_import->get_by(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'DELETED' => '0'));
			if (empty($cek_exist)) {
				if ($jenis == 'target') {
					$this->import_target();
				} else {
					echo json_encode(array('status' => 'FORBIDDEN', 'msg' => 'Tindakan dicekal.'));
				}
			} else {
				echo json_encode(array('status' => 'DATA_IS_ALREADY_EXIST', 'msg' => 'Data sudah ada.'));
			}
		}
	}

	public function import_target()
	{
		$result = array('status' => 'ERROR', 'msg' => 'Silahkan lengkapi form terlebih dahulu!');

		$err = 0;
		// $id_kota = $this->input->post('id_kota');
		$id_kota = $this->session->userdata('kota');
		$jenis = $this->input->post('jenis');
		$tahun = $this->input->post('tahun');

		if ($_FILES['file']['name']) {

			if (!is_dir("./ffdwjws/temp")) {
				mkdir("./ffdwjws/temp");
			}

			$directory = "./ffdwjws/temp";

			$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

			$uploadfile = $_FILES['file']['name'];
			$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
			$file_name = date('YmdHis') . '_' . str_replace($forbidden_char, '', $replaced_file_name);


			$config['upload_path'] 		= $directory;
			$config['allowed_types'] 	= 'csv';
			$config['encrypt_name'] 	= FALSE;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array(
					"status" => "ERROR",
					"msg" => "File TIDAK berhasil diupload"
				);
			} else {
				$data = $this->upload->data();

				$file = $directory . '/' . $data['file_name'];

				$this->import_target->empty_table($id_kota);

				$this->import_target->import_data($file);

				$this->import_target->save(array('BRANCH' => '0000'), array('BRANCH' => '0'));

				// $this->import_target->save(array('ID_KOTA' => $id_kota, 'TAHUN' => $tahun), array('TAHUN' => NULL, 'ID_KOTA' => NULL));
				// $this->import_target->save(array('ID_KOTA' => $id_kota, 'TAHUN' => $tahun), array('TAHUN' => '', 'ID_KOTA' => ''));
				$this->import_target->delete_by(array('TAHUN' => NULL, 'ID_KOTA' => NULL));
				$this->import_target->save(array('TAHUN' => "", 'ID_KOTA' => ""));

				$this->import_target->update_all(array('ID_KOTA' => $id_kota, 'TAHUN' => $tahun));

				// $this->import_target->move_data($tahun, $id_kota);

				$this->history_import->save(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'WAKTU' => date('Y-m-d H:i:s')));

				// $this->import_target->update_status_progress($id_kota, $tahun);

				unlink($file);

				$result = array(
					"status" => "OK",
					"msg" => "Data berhasil diimport"
				);
			}
		}
		echo json_encode($result);
	}
	public function realisasi()
	{
		$this->form_validation->set_rules("bulan", "Bulan", "required");
		$this->form_validation->set_rules("tahun", "Tahun", "required");
		$this->form_validation->set_rules("jenis", "Jenis", "required");
		$this->form_validation->set_rules("kategori", "Kategori", "required");
		if ($this->form_validation->run() == false) {
			$result = array(
				"status" => "ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu!"
			);
			echo json_encode($result);
		} else {
			$id_kota = $this->session->userdata('kota');
			$jenis = $this->input->post('jenis');
			$kategori = $this->input->post('kategori');
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');

			$cek_exist = $this->history_import->get_by(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'KATEGORI' => $kategori, 'TAHUN' => $tahun, 'BULAN' => $bulan, 'DELETED' => '0'));
			if (empty($cek_exist)) {
				if ($jenis == 'realisasi') {
					if ($kategori == 'tks') {
						$this->import_realisasi_tks();
					} elseif ($kategori == 'tdk') {
						$this->import_realisasi_tdk();
					} else {
						echo json_encode(array('status' => 'FORBIDDEN', 'msg' => 'Tindakan dicekal.'));
					}
				} else {
					echo json_encode(array('status' => 'FORBIDDEN', 'msg' => 'Tindakan dicekal.'));
				}
			} else {
				echo json_encode(array('status' => 'DATA_IS_ALREADY_EXIST', 'msg' => 'Data sudah ada.'));
			}
		}
	}

	public function import_realisasi_tks()
	{
		$result = array('status' => 'ERROR', 'msg' => 'Silahkan lengkapi form terlebih dahulu!');

		$err = 0;
		// $id_kota = $this->input->post('id_kota');
		$id_kota = $this->session->userdata('kota');
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('kategori');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if ($_FILES['file']['name']) {

			if (!is_dir("./ffdwjws/temp")) {
				mkdir("./ffdwjws/temp");
			}

			$directory = "./ffdwjws/temp";

			$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

			$uploadfile = $_FILES['file']['name'];
			$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
			$file_name = date('YmdHis') . '_' . str_replace($forbidden_char, '', $replaced_file_name);


			$config['upload_path'] 		= $directory;
			$config['allowed_types'] 	= 'csv';
			$config['encrypt_name'] 	= FALSE;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array(
					"status" => "ERROR",
					"msg" => "File TIDAK berhasil diupload"
				);
			} else {
				$data = $this->upload->data();

				$file = $directory . '/' . $data['file_name'];

				$this->import_realisasi_tks->empty_table($id_kota);

				$abc = $this->import_realisasi_tks->import_data($file);

				$this->import_realisasi_tks->save(array('BRANCH' => '0000'), array('BRANCH' => '0'));

				$this->import_realisasi_tks->delete_by(array('BRANCH' => NULL));
				$this->import_realisasi_tks->delete_by(array('BRANCH' => ""));

				$this->import_realisasi_tks->update_all(array('ID_KOTA' => $id_kota, 'BULAN' => $bulan, 'TAHUN' => $tahun));

				//$this->import_realisasi_tks->move_data();

				$this->history_import->save(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'KATEGORI' => $kategori, 'BULAN' => $bulan, 'TAHUN' => $tahun, 'WAKTU' => date('Y-m-d H:i:s')));

				unlink($file);

				$result = array(
					"status" => "OK",
					"msg" => "Data berhasil diimport",
					'abc' => $abc
				);
			}
		}
		echo json_encode($result);
	}

	public function import_realisasi_tdk()
	{
		$result = array('status' => 'ERROR', 'msg' => 'Silahkan lengkapi form terlebih dahulu!');

		$err = 0;
		// $id_kota = $this->input->post('id_kota');
		$id_kota = $this->session->userdata('kota');
		$jenis = $this->input->post('jenis');
		$kategori = $this->input->post('kategori');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		if ($_FILES['file']['name']) {

			if (!is_dir("./ffdwjws/temp")) {
				mkdir("./ffdwjws/temp");
			}

			$directory = "./ffdwjws/temp";

			$forbidden_char = array('[', ']', '(', ')', '?', '\'', '′');

			$uploadfile = $_FILES['file']['name'];
			$replaced_file_name = str_replace(' ', '_', $_FILES["file"]["name"]);
			$file_name = date('YmdHis') . '_' . str_replace($forbidden_char, '', $replaced_file_name);


			$config['upload_path'] 		= $directory;
			$config['allowed_types'] 	= 'csv';
			$config['encrypt_name'] 	= FALSE;
			$config['file_name'] = $file_name;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('file')) {
				$result = array(
					"status" => "ERROR",
					"msg" => "File TIDAK berhasil diupload"
				);
			} else {
				$data = $this->upload->data();

				$file = $directory . '/' . $data['file_name'];

				$this->import_realisasi_tdk->empty_table($id_kota);

				$abc = $this->import_realisasi_tdk->import_data($file);

				$this->import_realisasi_tdk->save(array('BRANCH' => '0000'), array('BRANCH' => '0'));

				$this->import_realisasi_tdk->delete_by(array('BRANCH' => NULL));
				// $this->import_realisasi_tdk->delete_by(array('BRANCH' => ""));
				$this->import_realisasi_tdk->save(array('BRANCH' => ""));

				// $this->import_realisasi_tdk->save(array('ID_KOTA' => $id_kota, 'BULAN' => $bulan, 'TAHUN' => $tahun), array('BULAN' => NULL, 'TAHUN' => NULL, 'ID_KOTA' => NULL));
				// $this->import_realisasi_tdk->save(array('ID_KOTA' => $id_kota, 'BULAN' => $bulan, 'TAHUN' => $tahun), array('BULAN' => '', 'TAHUN' => '', 'ID_KOTA' => ''));
				$this->import_realisasi_tdk->update_all(array('ID_KOTA' => $id_kota, 'BULAN' => $bulan, 'TAHUN' => $tahun));
				//$this->import_realisasi_tdk->move_data();

				$this->history_import->save(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'KATEGORI' => $kategori, 'BULAN' => $bulan, 'TAHUN' => $tahun, 'WAKTU' => date('Y-m-d H:i:s')));

				unlink($file);

				$result = array(
					"status" => "OK",
					"msg" => "Data berhasil diimport",
					'abc' => $abc
				);
			}
		}
		echo json_encode($result);
	}

	public function delete_target($tahun = NULL)
	{

		if ($tahun == false) {
			$result = array(
				"status" => "ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu!"
			);
			echo json_encode($result);
		} else {
			$id_kota = $this->session->userdata('kota');
			$jenis = 'target';

			$cek_exist = $this->history_import->get_by(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'DELETED' => '0'));
			if (!empty($cek_exist)) {
				$data = array('ASET_TARGET' => 0, 'LABA_TARGET' => 0, 'BIAYA_TARGET' => 0, 'PENDAPATAN_TARGET' => 0, 'TABUNGAN_TARGET' => 0, 'DEPOSITO_TARGET' => 0, 'KREDIT_TARGET' => 0, 'CAR_TARGET' => 0, 'ROA_TARGET' => 0, 'ROE_TARGET' => 0, 'BOPO_TARGET' => 0, 'CR_TARGET' => 0, 'LDR_TARGET' => 0, 'KAP_TARGET' => 0, 'NPL_GROSS_TARGET' => 0, 'NPL_NET_TARGET' => 0, 'NIM_TARGET' => 0);

				$this->import_kota->save($data, array('TAHUN' => $tahun, 'ID_KOTA' => $id_kota));
				$this->history_import->save(array('DELETED' => '1'), array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'DELETED' => '0'));
				echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil dihapus.'));
			} else {
				echo json_encode(array('status' => 'NOT_FOUND', 'msg' => 'Data TIDAK tersedia.'));
			}
		}
	}

	public function delete_realisasi($param = NULL)
	{
		if ($param == false) {
			$result = array(
				"status" => "ERROR",
				"msg" => "Silahkan lengkapi form terlebih dahulu!"
			);
			echo json_encode($result);
		} else {
			$id_kota = $this->session->userdata('kota');
			$param_explode = explode('-', $param);
			if (count($param_explode) == 3) {
				$tahun = $param_explode[0];
				$bulan = $param_explode[1];
				$kategori = $param_explode[2];
				$jenis = 'realisasi';

				$cek_exist = $this->history_import->get_by(array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'BULAN' => $bulan, 'KATEGORI' => $kategori, 'DELETED' => '0'));
				if (!empty($cek_exist)) {
					if ($kategori == 'tks') {
						$data = array('ASET_REALISASI' => 0, 'LABA_REALISASI' => 0, 'BIAYA_REALISASI' => 0, 'PENDAPATAN_REALISASI' => 0, 'TABUNGAN_REALISASI' => 0, 'DEPOSITO_REALISASI' => 0, 'KREDIT_REALISASI' => 0, 'CAR_REALISASI' => 0, 'ROA_REALISASI' => 0, 'ROE_REALISASI' => 0, 'BOPO_REALISASI' => 0, 'CR_REALISASI' => 0, 'LDR_REALISASI' => 0, 'KAP_REALISASI' => 0, 'NPL_GROSS_REALISASI' => 0, 'NPL_NET_REALISASI' => 0, 'NIM_REALISASI' => 0);

						$this->import_kota->save($data, array('TAHUN' => $tahun, 'BULAN' => $bulan, 'ID_KOTA' => $id_kota));
					} elseif ($kategori == 'tdk') {
						$data = array('TAB_SURYA' => 0, 'ATM_KHUSUS' => 0, 'ATM_SURYA' => 0, 'TAB_PENSIUN' => 0, 'TAS' => 0, 'TAB_KU' => 0, 'TAB_UMROH' => 0, 'THT_UMUM' => 0, 'TAB_SIMPEL' => 0, 'TAB_PIKNIK' => 0, 'KRED_UMUM' => 0, 'KRED_PEG' => 0, 'KRED_MOTOR' => 0, 'KRED_URK' => 0, 'KRED_MOBIL' => 0, 'DEP_1' => 0, 'DEP_3' => 0, 'DEP_6' => 0, 'DEP_12' => 0);

						$this->import_kota->save($data, array('TAHUN' => $tahun, 'BULAN' => $bulan, 'ID_KOTA' => $id_kota));
					}

					$this->history_import->save(array('DELETED' => '1'), array('ID_KOTA' => $id_kota, 'JENIS' => $jenis, 'TAHUN' => $tahun, 'BULAN' => $bulan, 'KATEGORI' => $kategori, 'DELETED' => '0'));
					echo json_encode(array('status' => 'OK', 'msg' => 'Data berhasil dihapus.'));
				} else {
					echo json_encode(array('status' => 'NOT_FOUND', 'msg' => 'Data TIDAK tersedia.'));
				}
			} else {
				echo json_encode(array('status' => 'FORBIDDEN', 'msg' => 'Tindakan dicekal.'));
			}
		}
	}

	public function harian()
	{
		$data['content'] = $this->load->view('import/keuangan_harian.php', '', true);
		$this->load->view('dashboard', $data);
	}
}
