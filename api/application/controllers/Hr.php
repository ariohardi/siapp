<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hr_model', 'hrm');
	}

	public function simpan_komponen()
	{
		$data = $this->hrm->simpan_komponen();
		exit(json_encode($data));
	}

	public function simpan_shift()
	{
		$data = $this->hrm->simpan_shift();
		exit(json_encode($data));
	}

	public function simpan_divisi($operasi)
	{
		if($operasi) $data = $this->hrm->simpan_divisi($operasi);
		if($operasi) exit(json_encode($data));
	}

	public function simpan_departemen($operasi)
	{
		if($operasi) $data = $this->hrm->simpan_departemen($operasi);
		if($operasi) exit(json_encode($data));
	}

	public function simpan_karyawan($operasi)
	{
		if($operasi) $data = $this->hrm->simpan_karyawan($operasi);
		if($operasi) exit(json_encode($data));
	}

	public function hapus_komponen()
	{
		$data = $this->hrm->hapus_komponen();
		exit(json_encode($data));
	}

	public function hapus_divisi()
	{
		$data = $this->hrm->hapus_divisi();
		exit(json_encode($data));
	}

	public function hapus_departemen()
	{
		$data = $this->hrm->hapus_departemen();
		exit(json_encode($data));
	}

	public function divisi()
	{
		$data = $this->hrm->divisi();
		foreach ($data as $key => $value) {
			$data[$key]->text = "{$value->nama} ({$value->kode})";
		}
		exit(json_encode($data));
	}

	public function jadwal_kerja($tanggal)
	{
		$data = $this->hrm->jadwal_kerja($tanggal);
		exit(json_encode($data));
	}

	public function simpan_jadwal()
	{
		$this->hrm->simpan_jadwal();
	}

	public function simpan_absensi()
	{
		$this->hrm->simpan_absensi();
	}

	public function shift()
	{
		$data = $this->hrm->shift();
		exit(json_encode($data));
	}

	public function absensi()
	{
		$data = $this->hrm->absensi();
		exit(json_encode($data));
	}

	public function karyawan()
	{
		$data = $this->hrm->karyawan();
		foreach ($data as $key => $value) {
			$data[$key]->text = "{$value->nama_lengkap} ({$value->nip})";
		}
		exit(json_encode($data));
	}

	public function departemen($divisi=false)
	{
		$data = $this->hrm->departemen($divisi);
		foreach ($data as $key => $value) {
			$data[$key]->text = "{$value->nama} ({$value->kode})";
		}
		exit(json_encode($data));
	}

	public function komponen_gaji()
	{
		$data = $this->hrm->komponen_gaji();
		foreach ($data as $key => $value) {
			if($value->tipe==="GP") $data[$key]->tipe = "Gaji Pokok";
			if($value->tipe==="TJ") $data[$key]->tipe = "Tunjangan";
			if($value->tipe==="PT") $data[$key]->tipe = "Potongan";
		}
		exit(json_encode($data));
	}

}
