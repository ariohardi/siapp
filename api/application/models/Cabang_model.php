<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){
			$this->db->where('ID',$this->input->post('ID',true));
			$update = $this->db->update('cabang',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data cabang berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data cabang');
		} else {
			$p = $this->input->post(null,true);
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert('cabang',$p);
			if($insert) return array('status'=>true,'message'=>'Data cabang berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data cabang');
		}
	}

	public function data()
	{
		$this->db->select('cabang.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','cabang.propinsi=propinsi.ID');
		$this->db->join('kabupaten','cabang.kabupaten=kabupaten.ID');
		$this->db->where('cabang.status',1);
		$this->db->order_by('nama_cabang');
		if($this->input->post('keyword')){
			$this->db->like('nama_cabang',$this->input->post('keyword',true));
		}
		return $this->db->get('cabang')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('cabang')->row();
	}

	public function dataprint()
	{
		$this->db->select('cabang.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','cabang.propinsi=propinsi.ID');
		$this->db->join('kabupaten','cabang.kabupaten=kabupaten.ID');
		if($this->input->get('keyword')){
			$this->db->like('nama_cabang',$this->input->get('keyword',true));
		}
		$this->db->order_by("nama_cabang", "desc");
		$personil = $this->db->get('cabang');
		return $personil->result();
	}

}