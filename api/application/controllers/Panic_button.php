<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panic_button extends CI_Controller {

	# Status sama dengan 1
	public function emergency_status()
	{
		$this->load->model('Panic_button_model');
		$data = $this->Panic_button_model->emergency_status();
		exit(json_encode($data));
	}

	public function history()
	{
		$this->load->model('Panic_button_model');
		$data = $this->Panic_button_model->history();
		exit(json_encode($data));	
	}

}
