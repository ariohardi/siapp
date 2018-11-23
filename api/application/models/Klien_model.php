<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klien_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){
			$this->db->where('ID',$this->input->post('ID',true));
			$update = $this->db->update('klien',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data klien berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data klien');
		} else {
			$p = $this->input->post(null,true);
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert('klien',$p);
			if($insert) return array('status'=>true,'message'=>'Data klien berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data klien');
		}
	}

	public function data()
	{
		$this->db->select('klien.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','klien.propinsi=propinsi.ID');
		$this->db->join('kabupaten','klien.kabupaten=kabupaten.ID');
		if($this->input->post('keyword')){
			$this->db->like('nama_klien',$this->input->post('keyword',true));
		}
		$this->db->where('klien.status',1);
		$this->db->order_by('nama_klien');
		return $this->db->get('klien')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('klien')->row();
	}

	public function dataprint()
	{
		$this->db->select('klien.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','klien.propinsi=propinsi.ID');
		$this->db->join('kabupaten','klien.kabupaten=kabupaten.ID');
		if($this->input->get('keyword')){
			$this->db->like('nama_klien',$this->input->get('keyword',true));
		}
		$this->db->order_by("nama_klien", "desc");
		$personil = $this->db->get('klien');
		return $personil->result();
	}

}
