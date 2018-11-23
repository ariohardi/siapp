<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function data()
	{
		$this->load->model('Dashboard_model');
		$data = $this->Dashboard_model->data();
		exit(json_encode($data));
	}

}
