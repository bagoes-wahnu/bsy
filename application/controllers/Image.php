<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends E_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function index()
	{
		
	}

	public function Handler()
	{
		// if ($this->session->userdata('id_user') == NULL) {
		// 	redirect('Error/e_404');
		// } else {
			$url	= $_GET["url"];
			$file	= $_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME'])."/ffdwjws/" . $url;
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
		// }
		
	}

}

/* End of file Image.php */
/* Location: ./application/controllers/Image.php */