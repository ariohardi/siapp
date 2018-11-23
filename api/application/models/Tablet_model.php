<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tablet_model extends CI_Model {

	public function get_personil(){
		$this->db->select('ID, nama_personil, jenis_kelamin, level, kualifikasi, upload_foto');
		if($this->input->post('level')){
			$this->db->where('level',$this->input->post('level',true));
		}
		if($this->input->post('jenis_kelamin')){
			$this->db->where('jenis_kelamin',$this->input->post('jenis_kelamin',true));
		}
		if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

}	