<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Geo_model extends CI_Model {

	public function propinsi()
	{
		$this->db->order_by('nama_propinsi');
		$data = $this->db->get('propinsi')->result();
		return $data;
	}

	public function kabupaten($id_propinsi=false)
	{
		if($id_propinsi)
			$this->db->where("id_propinsi", $id_propinsi);
		else	
			$this->db->where( $this->input->post(null,true) );
		$this->db->order_by('nama_kabupaten');
		$data = $this->db->get('kabupaten')->result();
		if($id_propinsi) foreach ($data as $key => $value) {
			$data[$key]->nama_kabupaten = str_replace(array("KABUPATEN","KOTA "), array("KAB.",""), $value->nama_kabupaten);
		}
		return $data;
	}

	public function kecamatan($id_kabupaten=false)
	{
		if($id_kabupaten)
			$this->db->where("id_kabupaten", $id_kabupaten);
		else	
			$this->db->where( $this->input->post(null,true) );
		$this->db->order_by('nama_kecamatan');
		$data = $this->db->get('kecamatan')->result();
		if($id_kabupaten) foreach ($data as $key => $value) {
			$data[$key]->nama_kecamatan = str_replace(array("KECAMATAN"), array("KAB."), $value->nama_kecamatan);
		}
		return $data;
	}

}
