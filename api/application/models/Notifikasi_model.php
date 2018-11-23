<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi_model extends CI_Model {

	public function cek()
	{
		$admin = $this->db->where('ID',$this->session->ID)->get('admin')->row();
		$this->db->where('ID >',$admin->notifikasi_pertama);
		$data['notifikasi_baru'] = $this->db->where('ID >',$admin->notifikasi_terakhir)->get('notifikasi')->num_rows();
		$this->db->where('ID >',$admin->notifikasi_pertama);
		$data['notifikasi_terakhir'] = $this->db->order_by('ID','desc')->limit(10)->get('notifikasi')->result();
		return $data;
	}

	public function clear()
	{
		$admin = $this->db->where('ID',$this->session->ID)->get('admin')->row();
		$notif_terakhir = $this->db->where('ID >',$admin->notifikasi_terakhir)->order_by('ID','desc')->limit(1)->get('notifikasi')->row();
		if(isset($notif_terakhir->ID)){
			return $this->db->where('ID',$admin->ID)->update('admin',array(
				'notifikasi_terakhir'=>$notif_terakhir->ID
				));
		} else {
			return false;
		}
	}

}
