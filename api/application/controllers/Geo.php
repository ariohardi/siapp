<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geo extends CI_Controller {

	public function propinsi()
	{
		$this->load->model('Geo_model');
		$data = $this->Geo_model->propinsi();
		exit(json_encode($data));
	}

	public function kabupaten($id_propinsi=false)
	{
		$this->load->model('Geo_model');
		$data = $this->Geo_model->kabupaten($id_propinsi);
		exit(json_encode($data));
	}

	public function kecamatan($id_kabupaten=false)
	{
		$this->load->model('Geo_model');
		$data = $this->Geo_model->kecamatan($id_kabupaten);
		exit(json_encode($data));
	}

}
