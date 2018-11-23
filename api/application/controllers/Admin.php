<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function simpan()
	{
		$this->load->model('Admin_model');
		$data = $this->Admin_model->simpan();
		exit(json_encode($data));
	}

	public function data()
	{
		$this->load->model('Admin_model');
		$data = $this->Admin_model->data();
		exit(json_encode($data));
	}

	public function detail()
	{
		$this->load->model('Admin_model');
		$data = $this->Admin_model->detail();
		exit(json_encode($data));
	}

}
