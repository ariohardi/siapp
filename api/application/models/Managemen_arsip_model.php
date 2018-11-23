<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Managemen_arsip_model extends CI_Model {

	public function absensi()
	{
		$data = $this->db->select('tanggal')->group_by('tanggal')->get('absensi')->result();
		return $data;
	}

}
