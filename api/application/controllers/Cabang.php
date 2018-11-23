<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Cabang_model');
		$data = $this->Cabang_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Cabang_model');
		$data = $this->Cabang_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Cabang_model');
		$data = $this->Cabang_model->detail();
		exit(json_encode($data));
	}

}
