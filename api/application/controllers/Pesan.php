<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Pesan_model');
		$data = $this->Pesan_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Pesan_model');
		$data = $this->Pesan_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Pesan_model');
		$data = $this->Pesan_model->detail();
		exit(json_encode($data));
	}

	public function tambah_lampiran()
	{
		$path = "lampiran_instruksi/{$this->session->ID}/";
		if(!file_exists($path . "index.html")){
			mkdir($path); 
			chmod($path, 0777);
			file_put_contents($path . "index.html", 'Bad request!!!');
		}
		$unique = uniqid();
		$filename = $path . $unique . '_' . $_FILES['file']['name'];
		if(move_uploaded_file($_FILES['file']['tmp_name'], $filename)){
			$this->resize_image($filename, 450, 450);
			exit(json_encode(array('status'=>true,'file'=>$_FILES['file'],'target'=>$filename)));
		} else {
			exit(json_encode(array('status'=>false,$_FILES['file'])));
		}
	}

	private function resize_image($file, $w, $h) {
		$this->load->library('image_lib');
	    $config['image_library'] = 'gd2';
	    $config['source_image'] = $file;
	    $config['create_thumb'] = false;
	    $config['maintain_ratio'] = true;
	    $config['width'] = $w;
	    $config['height'] = $h;
	    $this->image_lib->initialize($config);
	    $this->image_lib->resize();
	}

}
