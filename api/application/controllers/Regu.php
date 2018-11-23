<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regu extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->detail();
		exit(json_encode($data));
	}

	public function detail_by_md5id()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->detail_by_md5id();
		exit(json_encode($data));
	}

	public function anggota_regu()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->anggota_regu();
		exit(json_encode($data));
	}

	public function tambah_anggota()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->tambah_anggota();
		exit(json_encode($data));
	}

	public function hapus_anggota()
	{
		$this->load->model('Regu_model');
		$data = $this->Regu_model->hapus_anggota();
		exit(json_encode($data));
	}

}
