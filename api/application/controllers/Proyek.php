<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Proyek_model');
		$data = $this->Proyek_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Proyek_model');
		$data = $this->Proyek_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Proyek_model');
		$data = $this->Proyek_model->detail();
		exit(json_encode($data));
	}

	public function full_detail()
	{
		$this->load->model('Proyek_model');
		$data = $this->Proyek_model->full_detail();
		exit(json_encode($data));
	}

}
