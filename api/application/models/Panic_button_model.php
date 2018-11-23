<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panic_button_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function emergency_status()
	{
		$this->db->select('panic_button.*,personil.*,regu_anggota.regu,regu.nama_regu,klien.nama_klien');
		$this->db->join('personil','personil.ID=panic_button.id_personil');
		$this->db->join('regu_anggota','personil.ID=regu_anggota.satpam');
		$this->db->join('regu','regu_anggota.regu=regu.ID');
		$this->db->join('klien','regu.klien=klien.ID');
		$this->db->where('panic_button.status',1);
		$this->db->order_by('waktu_mulai','DESC');
		return $this->db->get('panic_button')->result();
	}

	public function history()
	{
		$this->db->select('panic_button.*,personil.*,regu_anggota.regu,regu.nama_regu,klien.nama_klien');
		$this->db->join('personil','personil.ID=panic_button.id_personil');
		$this->db->join('regu_anggota','personil.ID=regu_anggota.satpam');
		$this->db->join('regu','regu_anggota.regu=regu.ID');
		$this->db->join('klien','regu.klien=klien.ID');
		$this->db->where('panic_button.status',2);
		$this->db->order_by('waktu_mulai','DESC');
		return $this->db->get('panic_button')->result();
	}

}