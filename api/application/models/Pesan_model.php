<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan_model extends CI_Model {

	public function simpan()
	{
		if($this->input->post('ID')){
			$this->db->where('ID',$this->input->post('ID',true));
			$update = $this->db->update('pesan',$this->input->post(null,true));
			if($update) return array('status'=>true,'message'=>'Data pesan berhasil disimpan');
			return array('status'=>false,'message'=>'Gagal menyimpan data pesan');
		} else {
			$p = $this->input->post(null,true);
			$p['pembuat'] = $this->session->ID;
			$p['tgl_buat'] = date("Y-m-d H:i:s");
			$p['lampiran'] = isset($p['lampiran']) ? implode(',', $p['lampiran']) : '';
			if(!$p['lampiran']) unset($p['lampiran']);
			$penerima = false;
			switch (intval($p['penerima'])) {
				case 1:
					$array_penerima = $this->db->select('ID')->where('status',1)->get('personil')->result();
					$p['total_penerima'] = count($array_penerima);
					$penerima = "/topics/SIAPP";
					break;
				
				case 2:
					$this->db->where('level','S');
					$array_penerima = $this->db->select('ID')->where('status',1)->get('personil')->result();
					$p['total_penerima'] = count($array_penerima);
					$penerima = "/topics/SIAPP/S";
					break;
				
				case 3:
					$this->db->where('level','D');
					$array_penerima = $this->db->select('ID')->where('status',1)->get('personil')->result();
					$p['total_penerima'] = count($array_penerima);
					$penerima = "/topics/SIAPP/D";
					break;
				
				case 4:
					$this->db->where('level','C');
					$array_penerima = $this->db->select('ID')->where('status',1)->get('personil')->result();
					$p['total_penerima'] = count($array_penerima);
					$penerima = "/topics/SIAPP/C";
					break;
				
				case 5:
					$this->db->where_in('level',array('D','C'));
					$array_penerima = $this->db->select('ID')->where('status',1)->get('personil')->result();
					$p['total_penerima'] = count($array_penerima);
					$penerima = "/topics/SIAPP/D";
					break;
				default:
					$penerima = array();
					break;
			}
			$insert = $this->db->insert('pesan',$p);
			if($insert) {
				foreach ($array_penerima as $key => $value) {
					$filename = "perpesanan/".md5(md5($value->ID).".txt");
					if(!file_exists($filename)) file_put_contents($filename, $this->db->insert_id());
					else {
						$id_pesan = explode(',', file_get_contents($filename));
						$id_pesan[] = $this->db->insert_id();
						file_put_contents($filename,implode(',', $id_pesan));
					}
				}
				$this->load->helper('text');
				if($penerima) {
					$data = array(
						'notification' => array(
							'icon'=>'notif_pesan',
							'sound'=>'simple_notif',
							'time_to_live'=>60 * 30,
							'title'=>$p['perihal'],
							'text'=>word_limiter($p['isi_pesan'], 10),
							'click_action'=>'PESAN_DETAIL'
							),
						'data' => array(
							'DataPushID'=>rand(1000000,9999999),
							'type'=>'messaging',
							'id_pesan'=>$this->db->insert_id()
							),
						'to' => $penerima,
						"priority"=> "high"
						);
					if($penerima) $this->aang->pushNotification($data);
				}
				return array('status'=>true,'message'=>'Pesan berhasil dikirimkan');
			}
			return array('status'=>false,'message'=>'Gagal menyimpan data pesan');
		}
	}

	public function data()
	{
		$this->db->where('pesan.status',1);
		if($this->input->post('keyword')){
			$this->db->like('perihal',$this->input->post('keyword',true));
		}
		$this->db->order_by('tgl_buat','desc');
		return $this->db->get('pesan')->result();
	}

	public function detail()
	{
		$this->db->where('ID',$this->input->post('ID',true));
		return $this->db->get('pesan')->row();
	}

	public function dataprint()
	{
		$this->db->select('*');
		if($this->input->get('keyword')){
			$this->db->like('tgl_buat',$this->input->get('keyword',true));
		}
		$this->db->order_by("tgl_buat", "desc");
		$personil = $this->db->get('pesan');
		return $personil->result();
	}

}
