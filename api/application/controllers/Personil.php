<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personil extends CI_Controller {
 
	public function simpan()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->simpan();
		exit(json_encode($data));
	}

	public function hapus()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->hapus();
		exit(json_encode($data));
	}

	public function autocomplete()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->autocomplete();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->data();
		exit(json_encode($data));
	}

	public function satpam()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->satpam();
		exit(json_encode($data));
	}

	public function satpam_danru()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->satpam_danru();
		exit(json_encode($data));
	}

	public function chief_security()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->chief_security();
		exit(json_encode($data));
	}

	public function komandan_regu()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->komandan_regu();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->detail();
		exit(json_encode($data));
	}

	public function detail_by_md5id()
	{
		$this->load->model('Personil_model');
		$data = $this->Personil_model->detail_by_md5id();
		exit(json_encode($data));
	}

}
