<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managemen_arsip extends CI_Controller {

	public function index()
	{
		$this->load->model('Managemen_arsip_model','mam');
		$data[] = array(
			'id'=>'Daftar Personil',
			'pId'=>0,
			'name'=>'Daftar Personil',
			'isParent'=>true
			);
		$data[] = array(
			'id'=>'daftar_hadir',
			'pId'=>0,
			'name'=>'Daftar Hadir',
			'isParent'=>true
			);
		$tahun_exist = array();
		$bulan_exist = array();
		$nama_bulan = array(
			"01"=>"Januari",
			"02"=>"Februari",
			"03"=>"Maret",
			"04"=>"April",
			"05"=>"Mei",
			"06"=>"Juni",
			"07"=>"Juli",
			"08"=>"Agustus",
			"09"=>"September",
			"10"=>"Oktober",
			"11"=>"November",
			"12"=>"Desember",
			);
		$absensi = $this->mam->absensi();
		foreach ($absensi as $key => $value) {
			$tahun = substr($value->tanggal, 0, 4);
			$bulan = substr($value->tanggal, 0, 7);
			if(!in_array($tahun, $tahun_exist)){
				$data[] = array(
					'id'=>'daftar_hadir_'.$tahun,
					'pId'=>'daftar_hadir',
					'name'=>$tahun,
					'isParent'=>true
				);
				$tahun_exist[] = $tahun;
			}
			if(!in_array($bulan, $bulan_exist)){
				$data[] = array(
					'id'=>'daftar_hadir_'.$bulan,
					'pId'=>'daftar_hadir_'.$tahun,
					'name'=>$nama_bulan[substr($bulan, 5, 2)],
					'isParent'=>true
				);
				$bulan_exist[] = $bulan;
			}
			$data[] = array(
				'id'=>'absensi_'.$value->tanggal.'_'.$nama_bulan[substr($bulan, 5, 2)],
				'pId'=>'daftar_hadir_'.$bulan,
				'name'=>date("d",strtotime($value->tanggal)),
				'isParent'=>false
			);

		}


		$data[] = array(
			'id'=>'gaji',
			'pId'=>0,
			'name'=>'Laporan Penggajian',
			'isParent'=>true
			);
		$data[] = array(
			'id'=>'kantor_cabang',
			'pId'=>0,
			'name'=>'Daftar Kantor Cabang',
			'isParent'=>true
			);
		$data[] = array(
			'id'=>'daftar_klien',
			'pId'=>0,
			'name'=>'Daftar Klien',
			'isParent'=>true
			);
		$data[] = array(
			'id'=>'daftar_proyek',
			'pId'=>0,
			'name'=>'Daftar Proyek',
			'isParent'=>true
			);
		$data[] = array(
			'id'=>'tombol_panik',
			'pId'=>0,
			'name'=>'Rekapitulasi Tombol Panik',
			'isParent'=>true
			);
		exit(json_encode($data));
	}

}