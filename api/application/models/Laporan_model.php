<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function isu_keamanan_detail_by_md5id()
	{
		$this->db->select('personil.*,laporan_isu_keamanan.*');
		$this->db->join('personil','personil.ID=laporan_isu_keamanan.id_personil');
		$this->db->where('personil.status',1);
		$this->db->where('md5(md5('.$this->db->dbprefix.'laporan_isu_keamanan.ID))',"'{$this->input->post('md5_id',true)}'",false);
		$this->db->order_by("tanggal", "desc");
		$data = $this->db->get('laporan_isu_keamanan')->row();
		return $data;
	}

	public function laporan_personil()
	{
		$this->db->select('personil.*,laporan_isu_keamanan.*');
		$this->db->select('md5(md5('.$this->db->dbprefix.'laporan_isu_keamanan.ID)) AS md5_id_laporan', false);
		$this->db->join('personil','personil.ID=laporan_isu_keamanan.id_personil');
		if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		}
		$this->db->order_by("tanggal", "desc");
		$data = $this->db->get('laporan_isu_keamanan')->result();
		return $data;
	}

}
