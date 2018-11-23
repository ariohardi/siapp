<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function data()
	{
		$this->db->select('SUM(1) AS total, level',false);
		$this->db->where('personil.status',1);
		$this->db->group_by('level');
		$level = $this->db->get('personil')->result();
		$data['level'] = array();
		foreach ($level as $key => $value) {
			$data['level'][$value->level] = $value->total;
		}
		$this->db->select('SUM(1) AS total, jenis_kelamin',false);
		$this->db->where('personil.status',1);
		$this->db->group_by('jenis_kelamin');
		$jenis_kelamin = $this->db->get('personil')->result();
		$data['jenis_kelamin'] = array();
		foreach ($jenis_kelamin as $key => $value) {
			$data['jenis_kelamin'][$value->jenis_kelamin] = $value->total;
		}
		$this->db->select('COUNT(*) AS y',false);
		$this->db->select('kualifikasi AS name');
		$this->db->group_by('kualifikasi');
		$this->db->where('status',1);
		$data['kualifikasi'] = $this->db->get('personil')->result();
		foreach ($data['kualifikasi'] as $key => $value) {
			$data['kualifikasi'][$key]->y = intval($value->y);
			if($value->name==="NONE"){
				$data['kualifikasi'][$key]->name = "Blm ada kualifikasi";
			}
		}

		$data['klien'] = $this->db->where('status',1)->get('klien')->num_rows();
		$this->db->select('COUNT(*) AS total',false);
		$this->db->select('nama_propinsi');
		$this->db->join('propinsi','propinsi.ID=proyek.propinsi');
		$this->db->group_by('proyek.propinsi');
		$proyek = $this->db->where('status',1)->get('proyek')->result();
		$data['propinsi'] = array(array(),array());
		foreach ($proyek as $key => $value) {
			$data['propinsi'][0][] = $value->nama_propinsi;
			$data['propinsi'][1][] = intval($value->total);
		}
		$kategori_laporan = $this->db->select('SUM(1) AS total, kategori', false)->group_by('kategori')->get('laporan_isu_keamanan')->result();
		$kategori_panik = $this->db->select('SUM(1) AS total, kategori', false)->group_by('kategori')->get('panic_button')->result();
		$kategori_kejadian = array();
		foreach ($kategori_laporan as $key => $value) {
			if(!isset($kategori_kejadian[$value->kategori])){
				$kategori_kejadian[$value->kategori] = intval($value->total);
			} else {
				$kategori_kejadian[$value->kategori] += intval($value->total);
			}
		}
		foreach ($kategori_panik as $key => $value) {
			if(!isset($kategori_kejadian[$value->kategori])){
				$kategori_kejadian[$value->kategori] = intval($value->total);
			} else {
				$kategori_kejadian[$value->kategori] += intval($value->total);
			}
		}
		$kategori_kejadian_values = array();
		foreach (array_values($kategori_kejadian) as $key => $value) {
			$kategori_kejadian_values[] = array(
				"y"=>$value,
				"color"=>"#CF4647"
				);
		}
		$data['kategori_kejadian'] = array(
			array_keys($kategori_kejadian),
			$kategori_kejadian_values
			);
		$data['cabang'] = $this->db->where('status',1)->get('cabang')->result();
		$data['proyek'] = $this->db->where('status',1)->get('proyek')->result();
		$data['klien'] = $this->db->where('status',1)->get('klien')->result();
		$id_propinsi = array();
		foreach ($data['cabang'] as $key => $value) if(!in_array($value->propinsi, $id_propinsi)) $id_propinsi[] = $value->propinsi;
		foreach ($data['proyek'] as $key => $value) if(!in_array($value->propinsi, $id_propinsi)) $id_propinsi[] = $value->propinsi;
		foreach ($data['klien'] as $key => $value) if(!in_array($value->propinsi, $id_propinsi)) $id_propinsi[] = $value->propinsi;
		$data['peta_propinsi'] = $this->db->where_in('ID',$id_propinsi)->order_by('nama_propinsi','ASC')->get('propinsi')->result();
		// $data['umur'] = $this->db->query("SELECT CASE
		// 				    WHEN datediff(now(), tanggal_lahir) / 365.25 > 50 THEN '51 Th Keatas'
		// 				    WHEN datediff(now(), tanggal_lahir) / 365.25 > 40 THEN '41-50 Th'
		// 				    WHEN datediff(now(), tanggal_lahir) / 365.25 > 30 THEN '31-40 Th'
		// 				    WHEN datediff(now(), tanggal_lahir) / 365.25 > 19 THEN '20-30 Th'
		// 				    ELSE 'Dibawah 20 Th'
		// 				END AS umur,
		// 				COUNT(*) AS total
		// 				FROM {$this->db->dbprefix}personil GROUP BY umur ORDER BY umur")->result();
		return $data;
	}

}
