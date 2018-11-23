<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function isu_keamanan_detail_by_md5id()
	{
		$this->load->model('Laporan_model');
		$data = $this->Laporan_model->isu_keamanan_detail_by_md5id();
		exit(json_encode($data));
	}

	public function laporan_personil()
	{
		$this->load->model('Laporan_model');
		$data = $this->Laporan_model->laporan_personil();
		exit(json_encode($data));
	}

}
