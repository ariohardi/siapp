<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Klien_model');
		$data = $this->Klien_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Klien_model');
		$data = $this->Klien_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Klien_model');
		$data = $this->Klien_model->detail();
		exit(json_encode($data));
	}

}
