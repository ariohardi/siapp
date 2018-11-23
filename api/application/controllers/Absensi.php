<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function data_absensi_harian()
	{
		$this->load->model('Absensi_model');
		$data = $this->Absensi_model->data_absensi_harian();
		exit(json_encode($data));
	}

}
