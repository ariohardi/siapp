<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){
			$p = array(
				'nama'=>$this->input->post('nama',true),
				'email'=>$this->input->post('email',true),
				'password'=>$this->aang->superhash($this->input->post('p1'))
				);
			if(!$this->input->post('p1')) unset($p['password']);
			$this->db->where('ID',$this->input->post('ID',true));
			$update = $this->db->update('admin',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data admin berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data admin');
		} else {
			$exist = $this->db->where(array(
				'email'=>$this->input->post('email',true),
				'status'=>1
				))->get('admin')->row();
			if($exist) return array('status'=>false,'message'=>'Admin dengan alamat email '.$_POST['email'].' sudah ada.');
			$p = array(
				'nama'=>$this->input->post('nama',true),
				'email'=>$this->input->post('email',true),
				'password'=>$this->aang->superhash($this->input->post('p1')),
				'level'=>2
				);
			// $p['pembuat'] = $this->session->ID;
			// $p['tgl_buat'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert('admin',$p);
			if($insert) return array('status'=>true,'message'=>'Data admin berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data admin');
		}
	}

	public function data()
	{
		// $this->db->select('admin.*,nama_propinsi,nama_kabupaten');
		// $this->db->join('propinsi','admin.propinsi=propinsi.ID');
		// $this->db->join('kabupaten','admin.kabupaten=kabupaten.ID');
		$this->db->where('admin.status',1);
		if($this->input->post('keyword')){
			$this->db->like('nama',$this->input->post('keyword',true));
		}
		$this->db->order_by('level');
		$this->db->order_by('nama');
		return $this->db->get('admin')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('admin')->row();
	}

	public function dataprint()
	{
		$this->db->select('*');
		if($this->input->get('keyword')){
			$this->db->like('nama',$this->input->get('keyword',true));
		}
		$this->db->order_by("nama", "desc");
		$personil = $this->db->get('admin');
		return $personil->result();
	}

}
