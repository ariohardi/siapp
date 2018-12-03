<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function simpan_komponen()
	{
		$data = array(
			"nama"=>$this->input->post("nama_komponen", true),
			"tipe"=>$this->input->post("tipe_komponen", true),
			"detail"=>$this->input->post("detail_komponen", true)
			);
		$exists = $this->db->where("nama", $data["nama"])->get("hr_komponen_gaji")->num_rows();
		if(!$this->input->post("id_komponen")) if($exists) return array("status"=>0,"message"=>"Kompone gaji : \"{$data["nama"]}\" sudah terdaftar dalam database");
		if(!$this->input->post("id_komponen"))
			$eksekusi = $this->db->insert("hr_komponen_gaji", $data);
		else 
			$eksekusi = $this->db->where("ID", $this->input->post("id_komponen", true))->update("hr_komponen_gaji", $data);
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil disimpan");
		else return array("status"=>0,"message"=>"Data gagal disimpan");
	}

	public function simpan_divisi($operasi)
	{
		$data = $this->input->post(null, true);
		if($operasi==="insert"){
			$exists = $this->db->where("kode", $data["kode_divisi"])->get("hr_divisi")->num_rows();
			if($exists) return array("status"=>0,"message"=>"Divisi : \"{$data["kode_divisi"]}\" sudah terdaftar dalam database");			
			$eksekusi = $this->db->insert("hr_divisi", array(
				"kode"=>strtoupper($this->input->post("kode_divisi", true)),
				"nama"=>$this->input->post("nama_divisi", true)
				));
		} else if($operasi==="update"){
			$eksekusi = $this->db->where("kode", $data["kode_divisi"])->update("hr_divisi", array(
				"nama"=>$this->input->post("nama_divisi", true)
				));
		}
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil disimpan");
		else return array("status"=>0,"message"=>"Data gagal disimpan");
	}

	public function simpan_shift()
	{
		$shifts = $this->input->post("shift", true);
		$terproses = 0;
		foreach ($shifts as $key => $shift) {
			$ID = intval($shift["ID"]);
			unset($shift["ID"]);
			if($ID==0) {
				if($this->db->insert("hr_shift", $shift)) $terproses++;
			} else {
				$this->db->where("ID", $ID);
				if($this->db->update("hr_shift", $shift)) $terproses++;
			}
		}
		if($terproses==count($shifts)) return array("status"=>200,"message"=>"Data shift berhasil disimpan");
		else return array("status"=>0,"message"=>"Satu atau beberapa data shift tidaik tersimpan");
	}

	public function simpan_jadwal()
	{
		$this->db->where(array(
			"tanggal"=>$this->input->post("tanggal", true),
			"nip"=>$this->input->post("nip", true)
			))->delete("hr_jadwal_kerja");
		$this->db->insert("hr_jadwal_kerja", $this->input->post(null,true));
	}

	public function jadwal_kerja($tanggal)
	{
		$this->db->order_by("nama_lengkap","asc");
		$jadwal = $this->db->get("hr_karyawan")->result();
		foreach ($jadwal as $key => $value) {
			$this->db->where("tanggal", $tanggal);
			$this->db->where("nip", $value->nip);
			$this->db->select("hr_jadwal_kerja.*, hr_shift.nama as nama_shift, hr_shift.*");
			$this->db->join("hr_shift", "hr_shift.ID=hr_jadwal_kerja.id_shift");
			$jdw = $this->db->get("hr_jadwal_kerja")->row();
			$jadwal[$key]->shift = $jdw ? $jdw->id_shift : "";
			$jadwal[$key]->nama_shift = $jdw ? $jdw->nama_shift : "";
			$jadwal[$key]->jam_masuk = $jdw ? $jdw->jam_masuk : "";
			$jadwal[$key]->jam_pulang = $jdw ? $jdw->jam_pulang : "";
		}
		return $jadwal;
	}

	public function shift()
	{
		return $this->db->order_by("nama", "asc")->get("hr_shift")->result();
	}

	public function simpan_absensi()
	{
		$nip = $this->input->post("nip", true);
		$tanggal = $this->input->post("tanggal", true);
		$jam_masuk = $this->input->post("jam_masuk", true);
		$jam_pulang = $this->input->post("jam_pulang", true);
		$status = $this->input->post("status", true);
		$keterangan = $this->input->post("keterangan", true);
		if($status==="N/A") die();
		$personil = $this->db->where("nip", $nip)->get("personil")->row();
		if($personil){
			$this->db->where(array(
				"id_personil"=>$personil->ID,
				"tanggal"=>$tanggal,
				))->delete("absensi");
			$this->db->insert("absensi",array(
				"id_personil"=>$personil->ID,
				"tanggal"=>$tanggal,
				"status"=>$status,
				// "keterangan"=>$keterangan,
				"jam_masuk"=>"{$tanggal} {$jam_masuk}",
				"jam_pulang"=>"{$tanggal} {$jam_pulang}",
				));
		}
		$karyawan = $this->db->where("nip", $nip)->get("hr_karyawan")->row();
		if($karyawan){
			$this->db->where(array(
				"nip"=>$nip,
				"tanggal"=>$tanggal,
				))->delete("hr_absensi");
			$this->db->insert("hr_absensi",array(
				"nip"=>$nip,
				"tanggal"=>$tanggal,
				"status"=>$status,
				// "keterangan"=>$keterangan,
				"jam_masuk"=>$jam_masuk,
				"jam_pulang"=>$jam_pulang,
				));
		}
	}

	public function absensi()
	{
		 $this->db->select('*');
		 $this->db->from('absensi');
		 $this->db->join('personil','personil.ID=absensi.id_personil');
		/* $this->db->join('regu','personil.id_regu=regu.ID'); */
		 if($this->input->post('keyword')){
			$this->db->like('nama_personil',$this->input->post('keyword',true));
		 }
		 if($this->input->post('tanggal_awal')){
			$this->db->where('tanggal >=',$this->input->post('tanggal_awal',true));
		 }
		 if($this->input->post('tanggal_akhir')){
			$this->db->where('tanggal <=',$this->input->post('tanggal_akhir',true));
		 }
		 $this->db->order_by("tanggal", "desc");
		 $personil = $this->db->get();
		 $n=0;
		 return $personil->result();
		
		
		
		
	}

	public function simpan_departemen($operasi)
	{
		$data = $this->input->post(null, true);
		if($operasi==="insert"){
			$exists = $this->db->where("kode", $data["kode_departemen"])->get("hr_departemen")->num_rows();
			if($exists) return array("status"=>0,"message"=>"Departemen : \"{$data["kode_departemen"]}\" sudah terdaftar dalam database");			
			$eksekusi = $this->db->insert("hr_departemen", array(
				"kode"=>strtoupper($this->input->post("kode_departemen", true)),
				"nama"=>$this->input->post("nama_departemen", true),
				"kode_divisi"=>$this->input->post("kode_divisi", true)
				));
		} else if($operasi==="update"){
			$eksekusi = $this->db->where("kode", $data["kode_departemen"])->update("hr_departemen", array(
				"nama"=>$this->input->post("nama_departemen", true),
				"kode_divisi"=>$this->input->post("kode_divisi", true)
				));
		}
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil disimpan");
		else return array("status"=>0,"message"=>"Data gagal disimpan");
	}

	public function divisi()
	{
		return $this->db->order_by("kode", "asc")->get("hr_divisi")->result();
	}

	public function karyawan()
	{
		$data = $this->db->order_by("nama_lengkap", "asc")->get("hr_karyawan")->result();
		return $data;
	}

	public function departemen($divisi)
	{
		if($divisi) $this->db->where("kode_divisi", $divisi);
		return $this->db->order_by("kode", "asc")->get("hr_departemen")->result();
	}

	public function hapus_komponen()
	{
		$eksekusi = $this->db->where("ID", $this->input->post("ID", true))->delete("hr_komponen_gaji");
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil dihapus");
		else return array("status"=>0,"message"=>"Data gagal dihapus");
	}

	public function hapus_divisi()
	{
		$eksekusi = $this->db->where("kode", $this->input->post("kode", true))->delete("hr_divisi");
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil dihapus");
		else return array("status"=>0,"message"=>"Data gagal dihapus");
	}

	public function hapus_departemen()
	{
		$eksekusi = $this->db->where("kode", $this->input->post("kode", true))->delete("hr_departemen");
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil dihapus");
		else return array("status"=>0,"message"=>"Data gagal dihapus");
	}

	public function komponen_gaji()
	{
		return $this->db->order_by("nama", "asc")->get("hr_komponen_gaji")->result();
	}

	public function simpan_karyawan($operasi)
	{
		$data["nip"] = $this->input->post("kry_nip",true);
		$data["nama_lengkap"] = $this->input->post("kry_nama_lengkap",true);
		$data["nama_panggilan"] = $this->input->post("kry_nama_panggilan",true);
		$data["tanggal_masuk"] = $this->sysdate($this->input->post("kry_tanggal_masuk",true));
		$data["status"] = $this->input->post("kry_status",true);
		$data["jabatan"] = $this->input->post("kry_jabatan",true);
		$data["divisi"] = $this->input->post("kry_divisi",true);
		$data["departemen"] = $this->input->post("kry_departemen",true);
		$data["tempat_lahir"] = $this->input->post("kry_tempat_lahir",true);
		$data["tanggal_lahir"] = $this->sysdate($this->input->post("kry_tanggal_lahir",true));
		$data["nomor_ktp"] = $this->input->post("kry_nomor_ktp",true);
		$data["alamat_ktp"] = $this->input->post("kry_alamat_ktp",true);
		$data["alamat_sekarang"] = $this->input->post("kry_alamat_sekarang",true);
		$data["alamat_propinsi"] = $this->input->post("kry_alamat_propinsi",true);
		$data["alamat_kabupaten"] = $this->input->post("kry_alamat_kabupaten",true);
		$data["alamat_kecamatan"] = $this->input->post("kry_alamat_kecamatan",true);
		$data["kontak"] = serialize($this->input->post("kontak",true));
		$data["riwayat_pendidikan"] = serialize($this->input->post("riwayat_pendidikan",true));
		if($operasi==="insert"){
			$exists = $this->db->where("nip", $data["nip"])->get("hr_karyawan")->num_rows();
			if($exists) return array("status"=>0,"message"=>"Karyawan dengan nip : \"{$data["nip"]}\" sudah terdaftar dalam database");			
			$eksekusi = $this->db->insert("hr_karyawan", $data);
		} else if($operasi==="update"){
			$eksekusi = $this->db->where("nip", $data["nip"])->update("hr_karyawan", $data);
		}
		if($eksekusi) return array("status"=>200,"message"=>"Data berhasil disimpan");
		else return array("status"=>0,"message"=>"Data gagal disimpan");
	}

	private function sysdate($tanggal)
	{
		$arr = explode("/", $tanggal);
		return "{$arr[2]}-{$arr[0]}-{$arr[1]}";
	}
	
}
