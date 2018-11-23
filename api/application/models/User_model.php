<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function do_login()
	{
		$this->db->select('admin.*, ug.user_role, ug.leveling, ug.id_level');
		$this->db->join('user_grouping as ug','admin.kode_user_group = ug.kode_user_group');
		$this->db->where(array(
			'email'=>$this->input->post('email',true),
			'password'=>$this->aang->superhash($_POST['password'])
			));
		$user = $this->db->get('admin')->row();
		if($user){
			$this->session->set_userdata((array) $user);
			return array(
				'status'=>true,
				'message'=>'Login berhasil, mohon tunggu sebentar.',
				'ID'=>$user->ID,
				'role'=>$user->kode_user_group,
				'id_level'=>$user->id_level,
                'roleText'=>$user->user_role,
                'nama'=>$user->nama,
                'leveling'=>$user->leveling,
				'user'=>$user);
		} return array('status'=>false,'message'=>'Login gagal, alamat email atau password salah.');
	}

}
