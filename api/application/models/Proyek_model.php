<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){

			# BEBAS TUGASKAN CHIEF SECURITY SEBELUMNYA MESKIPUN TERNYATA SAMA ID PERSONILNYA
			$this->db->where('ID',$this->input->post('ID',true));
			$proyek = $this->db->get('proyek')->row();
			$this->aang->bebas_tugaskan($proyek->chief_security);

			# TUGASKAN CHIEF SECURITY
			if($this->input->post('chief_security')) $this->aang->tugaskan($this->input->post('chief_security'));

			$this->db->where('ID',$proyek->ID);
			$update = $this->db->update('proyek',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data proyek berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data proyek');
		} else {
			$p = $this->input->post(null,true);
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert('proyek',$p);

			if($insert){
				# TUGASKAN CHIEF SECURITY
				if($this->input->post('chief_security')) $this->aang->tugaskan($this->input->post('chief_security'));
			 	return array('status'=>true,'message'=>'Data proyek berhasil disimpan');
			}
			return array('status'=>false,'message'=>'Gagal menyimpan data proyek');
		}
	}

	public function data()
	{
		$this->db->select('proyek.*,nama_propinsi,nama_kabupaten,nama_klien');
		$this->db->select('personil.nama_personil,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('propinsi','proyek.propinsi=propinsi.ID');
		$this->db->join('kabupaten','proyek.kabupaten=kabupaten.ID');
		$this->db->join('klien','proyek.klien=klien.ID');
		$this->db->join('personil','proyek.chief_security=personil.ID','LEFT');
		if($this->input->post('keyword')){
			$this->db->like('nama_proyek',$this->input->post('keyword',true));
		}
		$this->db->where('proyek.status',1);
		if($this->input->post('id_klien')) $this->db->where('proyek.klien',$this->input->post('id_klien',true));
		$this->db->order_by('nama_proyek');
		return $this->db->get('proyek')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('proyek')->row();
	}

	public function full_detail()
	{
		$this->db->select('proyek.*,nama_propinsi,nama_kabupaten,nama_klien');
		$this->db->select('personil.nama_personil as chief_security,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('propinsi','proyek.propinsi=propinsi.ID');
		$this->db->join('kabupaten','proyek.kabupaten=kabupaten.ID');
		$this->db->join('klien','proyek.klien=klien.ID');
		$this->db->join('personil','proyek.chief_security=personil.ID','LEFT');
		$this->db->where('proyek.ID',$this->input->post('ID',true));
		return $this->db->get('proyek')->row();
	}

	public function dataprint()
	{
		$this->db->select('proyek.*,nama_klien,nama_propinsi,nama_kabupaten');
		$this->db->select('personil.nama_personil as chief_security,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('klien','proyek.klien=klien.ID');
		$this->db->join('propinsi','proyek.propinsi=propinsi.ID');
		$this->db->join('kabupaten','proyek.kabupaten=kabupaten.ID');
		$this->db->join('personil','proyek.chief_security=personil.ID','LEFT');
		if($this->input->get('keyword')){
			$this->db->like('nama_proyek',$this->input->get('keyword',true));
		}
		$this->db->order_by("nama_proyek", "desc");
		$personil = $this->db->get('proyek');
		return $personil->result();
	}

}
