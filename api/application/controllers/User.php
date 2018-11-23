<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function do_login()
	{
		$this->load->model('User_model');
		$data = $this->User_model->do_login();
		exit(json_encode($data));
	}

}
