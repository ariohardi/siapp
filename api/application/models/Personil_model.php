<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personil_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){
			$p = $this->input->post(null,true);
			$p['nama_personil'] = ucwords(strtolower($p['nama_personil']));
			if($this->input->post('pengalaman_kerja')) $p['pengalaman_kerja'] = serialize($this->input->post('pengalaman_kerja',true));
			if($this->input->post('keahlian')) $p['keahlian'] = serialize($this->input->post('keahlian',true));
			if($this->input->post('pendidikan')) $p['pendidikan'] = serialize($this->input->post('pendidikan',true));
			if($this->input->post('pelatihan')) $p['pelatihan'] = serialize($this->input->post('pelatihan',true));
			$base64 = $p['base64'];
			if(strlen($base64) > 100) $p['upload_foto'] = "1";
			unset($p['base64'], $p['md5_id']);
			$this->db->where('ID',$this->input->post('ID',true));
			$update = $this->db->update('personil',$p);
			if($update) {
				if(strlen($base64) > 100) {
					$this->aang->save_base64($base64, "foto/".$this->input->post('md5_id').".png");
					$config['image_library'] = 'gd2';
					$config['source_image'] = "foto/".md5(md5($p['ID'])).".png";
					$config['create_thumb'] = false;
					$config['maintain_ratio'] = true;
					$config['width'] = 258;
					$config['height'] = 258;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$this->image_lib->clear();
				}
				return array('status'=>true,'message'=>'Data personil berhasil disimpan');
			}
			return array('status'=>false,'message'=>'Gagal menyimpan data personil');
		} else {
			$p = $this->input->post(null,true);
			$p['nama_personil'] = ucwords(strtolower($p['nama_personil']));
			if($this->input->post('pengalaman_kerja')) $p['pengalaman_kerja'] = serialize($this->input->post('pengalaman_kerja',true));
			if($this->input->post('keahlian')) $p['keahlian'] = serialize($this->input->post('keahlian',true));
			if($this->input->post('pendidikan')) $p['pendidikan'] = serialize($this->input->post('pendidikan',true));
			if($this->input->post('pelatihan')) $p['pelatihan'] = serialize($this->input->post('pelatihan',true));
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			unset($p['password2']);
			$p['password'] = $this->aang->superhash($p['password']);
			$base64 = $p['base64'];
			if(strlen($base64) > 100) $p['upload_foto'] = "1";
			unset($p['base64']);
			$insert = $this->db->insert('personil',$p);
			if($insert) {
				if(strlen($base64) > 100) {
					$last_id = $this->db->insert_id();
					$this->aang->save_base64($base64, "foto/".md5(md5($last_id)).".png");
					$config['image_library'] = 'gd2';
					$config['source_image'] = "foto/".md5(md5($last_id)).".png";
					$config['create_thumb'] = false;
					$config['maintain_ratio'] = true;
					$config['width'] = 258;
					$config['height'] = 258;
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$this->image_lib->clear();
				}
				return array('status'=>true,'message'=>'Data personil berhasil disimpan');
			}
			return array('status'=>false,'message'=>'Gagal menyimpan data personil');
		}
	}

	public function hapus()
	{
		if($this->input->post('ID')){
			$p = $this->input->post(null,true);
			$this->db->where('ID',$this->input->post('ID',true));
			$p['status'] = "0";
			$update = $this->db->update('personil',$p);
			if($update) {
				return array('status'=>true,'message'=>'Data personil berhasil dihapus');
			}
		} 
	}

	public function data()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		if($this->input->post('level')){
			$this->db->where('level',$this->input->post('level',true));
		}
		if($this->input->post('jenis_kelamin')){
			$this->db->where('jenis_kelamin',$this->input->post('jenis_kelamin',true));
		}
		if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		}
		if($this->input->post('tinggi_badan')){
			$this->db->where('tinggi_badan',$this->input->post('tinggi_badan',true));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function dataprint()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		if($this->input->get('level')){
			$this->db->where('level',$this->input->get('level',true));
		}
		if($this->input->get('jenis_kelamin')){
			$this->db->where('jenis_kelamin',$this->input->get('jenis_kelamin',true));
		}
		if($this->input->get('keyword')){
			$this->db->like('nama_personil',$this->input->get('keyword',true));
		}
		if($this->input->get('tinggi_badan')){
			$this->db->where('tinggi_badan',$this->input->get('tinggi_badan',true));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function autocomplete()
	{
		$this->db->select('personil.nama_personil, personil.ID');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		if($this->input->get('level')){
			$this->db->where('level',$this->input->get('level',true));
		}
		if($this->input->get('s')){
			$this->db->like('nama_personil',$this->input->get('s',true));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function satpam()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('level','S');
		if(intval($this->input->post('sedang_tugas'))==0){
			$this->db->where('sedang_tugas',0);
		}
		if($this->input->post('jenis_kelamin')){
			$this->db->where('jenis_kelamin',$this->input->post('jenis_kelamin',true));
		}
		if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		}
		if($this->input->post('id_not_in')){
			$this->db->where_not_in('personil.ID',explode(',', $this->input->post('id_not_in',true)));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function satpam_danru()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		if(intval($this->input->post('sedang_tugas'))==0){
			$this->db->where('sedang_tugas',0);
		}
		if(intval($this->input->post('level'))){
			$this->db->where('level',$this->input->post('level',true));
		} else {
			$this->db->where_in('level',array('S','D'));
		}
		if($this->input->post('jenis_kelamin')){
			$this->db->where('jenis_kelamin',$this->input->post('jenis_kelamin',true));
		}
		if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		}
		if($this->input->post('id_not_in')){
			$this->db->where_not_in('personil.ID',explode(',', $this->input->post('id_not_in',true)));
		}
		$this->db->where('personil.status',1);
		$this->db->order_by('level');
		$this->db->order_by('nama_personil');
		return $this->db->get('personil')->result();
	}

	public function chief_security()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('level','C');
		// if(intval($this->input->post('sedang_tugas'))==0){
		// 	$this->db->where('sedang_tugas',0);
		// }
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

	public function komandan_regu()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('level','D');
		if(intval($this->input->post('sedang_tugas'))==0){
			$this->db->where('sedang_tugas',0);
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

	public function detail($md5_id=false)
	{
		$this->db->select('personil.*');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		if($md5_id){
			$this->db->select('nama_propinsi, nama_kabupaten');
			$this->db->join('propinsi','personil.propinsi=propinsi.ID');
			$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		}
		if($md5_id) $this->db->where('md5(md5('.$this->db->dbprefix.'personil.ID))',"'{$md5_id}'", false);
		else  $this->db->where('md5(md5('.$this->db->dbprefix.'personil.ID))',"'{$this->input->post('ID',true)}'", false);
		$data = $this->db->get('personil')->row();
		if($data){
			if(strlen($data->pengalaman_kerja)>10){
				$data->pengalaman_kerja = unserialize($data->pengalaman_kerja);
			} else {
				$data->pengalaman_kerja = array();
			}
			if(strlen($data->keahlian)>10){
				$data->keahlian = unserialize($data->keahlian);
			} else {
				$data->keahlian = array();
			}
			if(strlen($data->pendidikan)>10){
				$data->pendidikan = unserialize($data->pendidikan);
			} else {
				$data->pendidikan = array();
			}
			if(strlen($data->pelatihan)>10){
				$data->pelatihan = unserialize($data->pelatihan);
			} else {
				$data->pelatihan = array();
			}
		}
		return $data;
	}

	public function detail_by_md5id()
	{
		$this->db->select('personil.*,nama_propinsi,nama_kabupaten');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('personil.status',1);
		$this->db->where('md5(md5('.$this->db->dbprefix.'personil.ID))',"'{$this->input->post('md5_id',true)}'",false);
		$data = $this->db->get('personil')->row();
		return $data;
	}

}
