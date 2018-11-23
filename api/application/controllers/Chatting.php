<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatting extends CI_Controller {

	public function __construct()
	{
		
	}

	public function kirim()
	{
		exit(json_encode($_POST));
	}

}
