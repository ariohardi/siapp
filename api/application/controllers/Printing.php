<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printing extends CI_Controller {

	public function absensi_harian($tanggal)
	{
		$this->load->model('Absensi_model');
		$data['judul'] = "Absensi Harian ".date("d/m/Y",strtotime($tanggal));
		$data['data'] = $this->Absensi_model->data_absensi_harian($tanggal);
		$this->load->view('printing/absensi_harian',$data);
	}

	public function cv($md5_id)
	{
		$this->load->model('Personil_model');
		$data['personil'] = $this->Personil_model->detail($md5_id);
		$this->load->view('printing/cv',$data);	
	}

	public function data_personil()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-personil-".date("d-m-Y").".xls");
		}
		$this->load->model('Personil_model');
		$data['judul'] = "Data Personil";
		$data['data'] = $this->Personil_model->dataprint();
		$this->load->view('printing/data_personil',$data);	
	}

	public function data_absensi()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-absensi-".date("d-m-Y").".xls");
		}
		$this->load->model('Absensi_model');
		$data['judul'] = "Data Absensi";
		$data['data'] = $this->Absensi_model->dataprint();
		$this->load->view('printing/data_absensi',$data);	
	}

public function data_cabang()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-cabang-".date("d-m-Y").".xls");
		}
		$this->load->model('Cabang_model');
		$data['judul'] = "Data Cabang";
		$data['data'] = $this->Cabang_model->dataprint();
		$this->load->view('printing/data_cabang',$data);	
	}

	public function data_klien()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-klien-".date("d-m-Y").".xls");
		}
		$this->load->model('Klien_model');
		$data['judul'] = "Data Klien";
		$data['data'] = $this->Klien_model->dataprint();
		$this->load->view('printing/data_klien',$data);	
	}

	public function data_proyek()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-proyek-".date("d-m-Y").".xls");
		}
		$this->load->model('Proyek_model');
		$data['judul'] = "Data Proyek";
		$data['data'] = $this->Proyek_model->dataprint();
		$this->load->view('printing/data_proyek',$data);	
	}

	public function data_regu()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-regu-".date("d-m-Y").".xls");
		}
		$this->load->model('Regu_model');
		$data['judul'] = "Data Regu";
		$data['data'] = $this->Regu_model->dataprint();
		$this->load->view('printing/data_regu',$data);	
	}

	public function data_pesan()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-pesan-".date("d-m-Y").".xls");
		}
		$this->load->model('Pesan_model');
		$data['judul'] = "Data Pesan";
		$data['data'] = $this->Pesan_model->dataprint();
		$this->load->view('printing/data_pesan',$data);	
	}

	public function data_admin()
	{
		if($this->input->get('export')==="excel"){
			header("Content-type: application/vnd-ms-excel");
			header("Content-Disposition: attachment; filename=data-admin-".date("d-m-Y").".xls");
		}
		$this->load->model('Admin_model');
		$data['judul'] = "Data Admin";
		$data['data'] = $this->Admin_model->dataprint();
		$this->load->view('printing/data_admin',$data);	
	}
}
