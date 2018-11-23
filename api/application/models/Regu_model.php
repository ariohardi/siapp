<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regu_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){

			# BEBAS TUGASKAN KOMANDAN REGU SEBELUMNYA MESKIPUN TERNYATA SAMA ID PERSONILNYA
			$this->db->where('ID',$this->input->post('ID',true));
			$regu = $this->db->get('regu')->row();
			$this->aang->bebas_tugaskan($regu->komandan_regu);

			# TUGASKAN KOMANDAN REGU
			if($this->input->post('komandan_regu')) $this->aang->tugaskan($this->input->post('komandan_regu'));

			$this->db->where('ID',$regu->ID);
			$update = $this->db->update('regu',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data regu berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data regu');
		} else {
			$p = $this->input->post(null,true);
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert('regu',$p);

			if($insert){
				# TUGASKAN KOMANDAN REGU
				if($this->input->post('komandan_regu')) $this->aang->tugaskan($this->input->post('komandan_regu'));
			 	return array('status'=>true,'message'=>'Data regu berhasil disimpan');
			}
			return array('status'=>false,'message'=>'Gagal menyimpan data regu');
		}
	}

	public function data()
	{
		$this->db->select('md5(md5('.$this->db->dbprefix.'regu.ID)) AS md5_id',false);
		$this->db->select('regu.*,nama_klien,nama_proyek');
		$this->db->select('personil.nama_personil,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('klien','regu.klien=klien.ID');
		$this->db->join('proyek','regu.proyek=proyek.ID');
		$this->db->join('personil','regu.komandan_regu=personil.ID','LEFT');
		if($this->input->post('keyword')){
			$this->db->like('nama_regu',$this->input->post('keyword',true));
		}
		$this->db->where('regu.status',1);
		if($this->input->post('id_klien')) $this->db->where('regu.klien',$this->input->post('id_klien',true));
		$this->db->order_by('nama_regu');
		$data = $this->db->get('regu')->result();
		foreach ($data as $key => $value) {
			$data[$key]->anggota = $this->db->where(array(
				'regu'=>$value->ID,
				'status'=>1
				))->get('regu_anggota')->num_rows();
		}
		return $data;
	}

	public function anggota_regu()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('regu_anggota','regu_anggota.satpam=personil.ID');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('regu',$this->input->post('regu',true));
		$this->db->where('regu_anggota.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('regu')->row();
	}

	public function tambah_anggota()
	{
		$data = (object) $this->input->post(null,true);
		$data->pembuat = $this->session->ID;
		$data->tgl_buat = date("Y-m-d H:i:s");
		$insert = $this->db->insert('regu_anggota',(array) $data);
		if($insert){
			return $this->aang->tugaskan($data->satpam);
		} else {
			// return $this->db->last_query();
			return false;
		}
	}

	public function hapus_anggota()
	{
		$this->db->where($this->input->post(null,true));
		$update = $this->db->update('regu_anggota',array('status'=>0));
		if($update){
			return $this->aang->bebas_tugaskan($this->input->post('satpam',true));
		} else {
			// return $this->db->last_query();
			return false;
		}
	}

	public function detail_by_md5id()
	{
		$this->db->where('md5(md5(`ID`))',"'{$this->input->post('md5_id',true)}'",false);
		$data = $this->db->get('regu')->row();
		// return $this->db->last_query();
		return $data;
	}

	public function full_detail()
	{
		$this->db->select('regu.*nama_klien');
		$this->db->select('personil.nama_personil as komandan_regu,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('klien','regu.klien=klien.ID');
		$this->db->join('personil','regu.komandan_regu=personil.ID','LEFT');
		$this->db->where('regu.ID',$this->input->post('ID',true));
		return $this->db->get('regu')->row();
	}

	public function dataprint()
	{
		$this->db->select('regu.*,nama_klien,nama_proyek,komandan_regu');
		$this->db->select('personil.nama_personil as komandan_regu,personil.jenis_kelamin,personil.tanggal_lahir');
		$this->db->join('klien','regu.klien=klien.ID');
		$this->db->join('proyek','regu.proyek=proyek.ID');
		$this->db->join('personil','regu.komandan_regu=personil.ID','LEFT');
		if($this->input->get('keyword')){
			$this->db->like('nama_regu',$this->input->get('keyword',true));
		}
		$this->db->order_by("nama_regu", "desc");
		$personil = $this->db->get('regu');
		return $personil->result();
	}

}
