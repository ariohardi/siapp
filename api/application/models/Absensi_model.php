<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

	public function data_absensi_harian($tanggalnya=false)
	{
		$this->db->select('personil.*,personil.ID AS personil_id,klien.jam_kerja,nama_klien');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('regu_anggota','regu_anggota.satpam=personil.ID');
		$this->db->join('klien','klien.ID=regu_anggota.klien');
		if($this->input->post('id_regu')) $this->db->where('regu',$this->input->post('id_regu',true));
		$this->db->where('regu_anggota.status',1);
		if($this->input->post('level')) $this->db->where('level',$this->input->post('level',true));
		$this->db->order_by('nama_personil');
		$data = $this->db->get('personil')->result();
		foreach ($data as $key => $value) {
			$tanggal = $this->input->post('tanggal') ? $this->input->post('tanggal',true) : date("Y-m-d");
			$tanggal = $tanggalnya ? $tanggalnya : $tanggal;
			$absensi = $this->db->where(array(
				'id_personil'=>$value->ID,
				'tanggal'=>$tanggal
			))->get('absensi')->row();
			if($absensi) {
				$data[$key]->jam_masuk = $absensi->jam_masuk;
				$data[$key]->jam_pulang = $absensi->jam_pulang;
				$data[$key]->status = $absensi->status;
				$data[$key]->durasi = $this->aang->selisihJam($absensi->jam_masuk, $absensi->jam_pulang);
				if(intval($data[$key]->durasi) > intval($value->jam_kerja)){
					if(intval($absensi->lembur) == 0) $data[$key]->durasi = $value->jam_kerja;
					else $data[$key]->jam_lembur = intval($data[$key]->durasi) - $value->jam_kerja;
				}
				$data[$key]->absensi = $absensi;
			} else {
				$data[$key]->jam_masuk = "0000-00-00 00:00:00";
				$data[$key]->jam_pulang = "0000-00-00 00:00:00";
				$data[$key]->status = "";
			}
		}
		return $data;
	}

	public function dataprint()
	{
		$this->db->select('*');
		$this->db->join('personil','personil.ID=absensi.id_personil');
		$this->db->join('regu','personil.id_regu=regu.ID');
		if($this->input->get('keyword')){
			$this->db->like('nama_personil',$this->input->get('keyword',true));
		}
		if($this->input->get('tanggal_awal')){
			$this->db->where('tanggal >=',$this->input->get('tanggal_awal',true));
		}
		if($this->input->get('tanggal_akhir')){
			$this->db->where('tanggal <=',$this->input->get('tanggal_akhir',true));
		}
		$this->db->order_by("tanggal", "desc");
		$personil = $this->db->get('absensi');
		return $personil->result();
	}
}
