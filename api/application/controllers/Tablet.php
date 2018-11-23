<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tablet_model');
	}

	public function get_personil()
	{
		exit(json_encode($this->Tablet_model->get_personil()));
	}

}	