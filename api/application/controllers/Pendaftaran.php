<?php
	/**
	* 
	*/
	class Pendaftaran extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		public function submit()
		{
			print_r($_POST);
			print_r($_FILES);
		}
	
	}