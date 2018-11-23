<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function cek()
	{
		$this->load->model('Notifikasi_model');
		$data = $this->Notifikasi_model->cek();
		exit(json_encode($data));
	}

	public function clear()
	{
		$this->load->model('Notifikasi_model');
		$data = $this->Notifikasi_model->clear();
	}

}
