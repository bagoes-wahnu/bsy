<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Watch extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		$this->load->view('errors/error_404');
	}

	public function logo()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/logo/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}

	public function ikon()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/ikon/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}

	public function suku_bunga()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/suku_bunga/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}
	public function direksi()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/direksi/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}
	public function cabang()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/cabang/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}
	public function kas()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["src"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/kas/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}
	public function struktur_organisasi()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["source"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/struktur_organisasi/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
		
	}

	public function struktur()
	{
		if ($this->session->userdata('id_user') == NULL) {
			// redirect('Error_msg/e_404');
			$this->load->view('errors/error_404');
		} else {
			$url	= $_GET["source"];
			$id 	= $_GET["id"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/struktur/" . md5($id). "/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				// echo "<h2>File Not Found 404</h2>";
				$this->load->view('errors/error_404');
			}	
		}
	}

	public function Handler()
	{
		if ($this->session->userdata('id_user') == NULL) {
			redirect('Error_msg/e_404');
		} else {
			$url	= $_GET["url"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/djhduiwd/files/" . $url;
			if(file_exists($file) && !is_dir($file)){
				$type	= 'image';
				$image = array(
					'jpg', 'jpeg', 'png'
					);
				$ext	= explode(".",$file);
				if(in_array($ext,$image)){
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					header('Content-Type:' . finfo_file( finfo_open( FILEINFO_MIME_TYPE ), $file ));
					header('Content-Length: ' . filesize($file));
					readfile($file);
				}
			} else {
				echo "<h2>File Not Found 404</h2>";
			}	
		}
		
	}

}