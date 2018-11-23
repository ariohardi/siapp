<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mobile_model');
	}

	public function push_chat_notification()
	{
		$devices = $this->db->where('id_personil',$this->input->post('id_penerima',true))->get('device')->result();
		foreach ($devices as $key => $value) {
			$pushdata = array(
				'notification' => array(
					'title'=>$this->input->post('nama_pengirim',true),
					'text'=>$this->input->post('pesan'),
					'PushID'=>rand(1000000,9999999),
					'click_action'=>$this->input->post('onclick'),
					'time_to_live'=>60 * 1,
					'icon'=>'chat',
					'sound'=>'blop',
					'tag'=>$this->input->post('onclick').'_'.$this->input->post('id_pengirim')
					),
				'data' => array(
					'DataPushID'=>rand(1000000,9999999),
					'type'=>strtolower($this->input->post('onclick')),
					'id_relasi'=>$this->input->post('id_pengirim'),
					'id_regu'=>$this->input->post('id_regu'),
					'nama_relasi'=>$this->input->post('nama_pengirim'),
					'upload_foto'=>$this->input->post('upload_foto') ? $this->input->post('upload_foto') : 1,
					'md5_id'=>md5(md5($this->input->post('id_pengirim')))
					),
				'to' => $value->firebase,
				'priority'=> 'normal'
			);
			// file_put_contents('debug.txt', json_encode($pushdata));
			$this->aang->pushNotification($pushdata);
		}	
	}

	public function do_login()
	{
		$data = $this->Mobile_model->do_login();
		exit(json_encode($data));
	}

	public function generate_kode_absen()
	{
		$data = $this->Mobile_model->generate_kode_absen();
		exit(json_encode($data));
	}

	public function generate_kode_patroli()
	{
		$data = $this->Mobile_model->generate_kode_patroli();
		exit(json_encode($data));
	}

	public function baca_kode_patroli()
	{
		$data = $this->Mobile_model->baca_kode_patroli();
		exit(json_encode($data));
	}

	public function store_location()
	{
		$data = $this->Mobile_model->store_location();
		exit(json_encode($data));
	}

	public function data_satpam_anggota_regu()
	{
		$data = $this->Mobile_model->data_satpam_anggota_regu();
		exit(json_encode($data));
	}

	public function panic_button()
	{
		$data = $this->Mobile_model->panic_button();
		exit(json_encode($data));
	}

	public function panic_button_selesai()
	{
		$data = $this->Mobile_model->panic_button_selesai();
		exit(json_encode($data));
	}

	public function firebase_register()
	{
		$data = $this->Mobile_model->firebase_register();
		exit(json_encode($data));
	}

	public function ganti_password()
	{
		$data = $this->Mobile_model->ganti_password();
		exit(json_encode($data));	
	}

	public function laporan_isu_keamanan_submit()
	{
		$path = "lampiran/{$_POST['id_personil']}/";
		$lampiran = array();
		if(!file_exists($path)){
			mkdir($path);
			chmod($path, 0777);
			file_put_contents($path."index.html", "Bad request!!!");
		}
		if($this->input->post('base64_1')){
			$uniqid = uniqid();
			$lampiran[] = $path.$uniqid.".png";
			$this->aang->save_base64($_POST['base64_1'], $path.$uniqid.".png");
			$this->aang->save_base64($_POST['base64_1_thumb'], $path.$uniqid."_thumb.png");
		}
		if($this->input->post('base64_2')){
			$uniqid = uniqid();
			$lampiran[] = $path.$uniqid.".png";
			$this->aang->save_base64($_POST['base64_2'], $path.$uniqid.".png");
			$this->aang->save_base64($_POST['base64_2_thumb'], $path.$uniqid."_thumb.png");
		}
		if($this->input->post('base64_3')){
			$uniqid = uniqid();
			$lampiran[] = $path.$uniqid.".png";
			$this->aang->save_base64($_POST['base64_3'], $path.$uniqid.".png");
			$this->aang->save_base64($_POST['base64_3_thumb'], $path.$uniqid."_thumb.png");
		}
		exit(json_encode($this->Mobile_model->laporan_isu_keamanan_submit($lampiran)));
	}

	public function upload_thumbnail()
	{
		$this->aang->save_base64($_POST['base64'], "foto/thumb/".$_POST['md5_id'].".png");
		exit(json_encode($_POST));
	}

	public function proses_absensi()
	{
		file_put_contents('debug1.txt', json_encode($_POST));
		$data = (object) $this->input->post(null, true);
		if(!file_exists("absensi/index.html")){
			mkdir("absensi");
			chmod("absensi", 0777);
			file_put_contents("absensi/index.html", "Bad request!!!");
		}
		if(!file_exists("absensi/".date("Y")."/index.html")){
			mkdir("absensi/".date("Y"));
			chmod("absensi/".date("Y"), 0777);
			file_put_contents("absensi/".date("Y")."/index.html", "Bad request!!!");	
		}
		if(!file_exists("absensi/".date("Y/m")."/index.html")){
			mkdir("absensi/".date("Y/m"));
			chmod("absensi/".date("Y/m"), 0777);
			file_put_contents("absensi/".date("Y/m")."/index.html", "Bad request!!!");	
		}
		$data->foto_masuk = "absensi/".date("Y/m")."/".uniqid().".png";
		$data->foto_pulang = $data->foto_masuk;
		$data->tanggal = date("Y-m-d");
		$data->jam_masuk = date("Y-m-d H:i:s",strtotime("-45 seconds"));
		$data->jam_pulang = date("Y-m-d H:i:s",strtotime("+45 seconds"));
		$this->aang->save_base64($_POST['base64'], $data->foto_masuk);
		exit(json_encode($this->Mobile_model->proses_absensi($data)));
	}

	public function laporan_isu_keamanan_data()
	{
		$data = $this->Mobile_model->laporan_isu_keamanan_data();
		exit(json_encode($data));
	}

	public function inbox_perpesanan()
	{
		$data = $this->Mobile_model->inbox_perpesanan();
		exit(json_encode($data));
	}

	public function detail_perpesanan()
	{
		$data = $this->Mobile_model->detail_perpesanan();
		exit(json_encode($data));
	}

	public function absen_terakhir_saya()
	{
		$data = $this->Mobile_model->absen_terakhir_saya();
		exit(json_encode($data));
	}

	public function data_absensi_satpam()
	{
		$data = $this->Mobile_model->data_absensi_satpam();
		exit(json_encode($data));
	}

	public function panic_detail()
	{
		$data = $this->Mobile_model->panic_detail();
		exit(json_encode($data));
	}

	public function simpan_foto_chat()
	{
		$postdata = $this->input->post(null,true);
		$dir = "chatting_foto/{$postdata['id_pengirim']}/";
		if(!file_exists($dir . "index.html")){
			mkdir($dir);
			chmod($dir, 0777);
			file_put_contents($dir . "index.html", "Bad request");
		}
		$filename = $dir . uniqid() . ".png";
		$base64 = explode('||', $_POST['base64']);
		$this->aang->save_base64($base64[0], $filename);
		$this->aang->save_base64($base64[1], str_replace('.png', '_thumb.png', $filename));
		exit(json_encode(array(
			'thumb'=>str_replace('.png', '_thumb.png', $filename),
			'file'=>$filename
			)));
	}

	public function kirim_chat()
	{
		$expl = explode("/", $_POST['filename']);
		$path = $expl[0] . "/" . $expl[1];
		if(!file_exists($path . "/index.html")){
			mkdir($path);
			chmod($path, 0777);
			file_put_contents($path . "/index.html", "Bad request");
		}
		if(!file_exists($_POST['filename'])){
			file_put_contents($_POST['filename'], "[]");
		}
		$datachat = file_get_contents($_POST['filename']);
		$datachatarray = json_decode($datachat);
		$filename = $_POST['filename'];
		$postdata = $this->input->post(null, true);
		file_put_contents('debug.txt', json_encode($_POST));
		$postdata['t'] = date("Y-m-d H:i:s");
		$postdata['p'] = intval($postdata['p']);
		$postdata['m'] = strip_tags($postdata['m']);
		unset($postdata['filename']);
		unset($postdata['relasi']);
		if(!$postdata['j']) unset($postdata['j']);
		else {
			if($postdata['j']==="foto"){
				$text = "Membagikan foto kepada Anda";
			} else if($postdata['j']==="lokasi") {
				$text = "Membagikan lokasinya kepada Anda";
			} else {
				$text = $postdata['m'];
			}
		}
		if($postdata['j']==="foto"){
			$dir = "chatting_foto/{$postdata['p']}/";
			if(!file_exists($dir . "index.html")){
				mkdir($dir);
				chmod($dir, 0777);
				file_put_contents($dir . "index.html", "Bad request");
			}
			$postdata['m'] = $dir . uniqid() . ".png";
			$base64 = explode('||', $_POST['m']);
			$this->aang->save_base64($base64[0], $postdata['m']);
			$this->aang->save_base64($base64[1], str_replace('.png', '_thumb.png', $postdata['m']));
		}

		$datachatarray[] = $postdata;
		if(file_put_contents($filename, json_encode($datachatarray))){
			$pengirim = $this->Mobile_model->get_personil($postdata['p']);
			$devices = $this->db->where('id_personil',$_POST['relasi'])->get('device')->result();
			foreach ($devices as $key => $value) {
				$pushdata = array(
					'notification' => array(
						'title'=>$pengirim->nama_personil,
						'text'=>isset($text) ? $text : $postdata['m'],
						'PushID'=>rand(1000000,9999999),
						'click_action'=>'SINGLE_CHAT',
						'time_to_live'=>60 * 1,
						'icon'=>'chat',
						'sound'=>'blop',
						'tag'=>'chat_'.$postdata['p']
						),
					'data' => array(
						'DataPushID'=>rand(1000000,9999999),
						'type'=>'single_chat',
						'id_relasi'=>$postdata['p'],
						'nama_relasi'=>$pengirim->nama_personil,
						'upload_foto'=>$pengirim->upload_foto,
						'md5_id'=>md5(md5($pengirim->ID))
						),
					'to' => $value->firebase,
					'priority'=> 'normal'
				);
				// file_put_contents('debug.txt', json_encode($pushdata));
				$this->aang->pushNotification($pushdata);
			}
			exit(json_encode(array("status"=>true,"resp"=>"OK","data"=>$postdata)));
		}
		exit(json_encode(array("status"=>false)));
	}

	public function kirim_chat_regu()
	{
		$expl = explode("/", $_POST['filename']);
		$path = $expl[0] . "/" . $expl[1];
		// if(!file_exists($path . "/index.html")){
		// 	mkdir($path);
		// 	chmod($path, 0777);
		// 	file_put_contents($path . "/index.html", "Bad request");
		// }
		if(!file_exists($_POST['filename'])){
			file_put_contents($_POST['filename'], "[]");
		}
		$datachat = file_get_contents($_POST['filename']);
		$datachatarray = json_decode($datachat);
		$filename = $_POST['filename'];
		$postdata = $this->input->post(null, true);
		file_put_contents('debug.txt', json_encode($_POST));
		$postdata['t'] = date("Y-m-d H:i:s");
		$postdata['p'] = intval($postdata['p']);
		$postdata['m'] = strip_tags($postdata['m']);
		unset($postdata['filename']);
		// unset($postdata['relasi']);
		if(!$postdata['j']) unset($postdata['j']);
		else {
			if($postdata['j']==="foto"){
				$text = "Membagikan foto kepada Anda";
			} else if($postdata['j']==="lokasi") {
				$text = "Membagikan lokasinya kepada Anda";
			} else {
				$text = $postdata['m'];
			}
		}
		if($postdata['j']==="foto"){
			$dir = "chatting_foto/{$postdata['p']}/";
			if(!file_exists($dir . "index.html")){
				mkdir($dir);
				chmod($dir, 0777);
				file_put_contents($dir . "index.html", "Bad request");
			}
			$postdata['m'] = $dir . uniqid() . ".png";
			$base64 = explode('||', $_POST['m']);
			$this->aang->save_base64($base64[0], $postdata['m']);
			$this->aang->save_base64($base64[1], str_replace('.png', '_thumb.png', $postdata['m']));
		}

		$datachatarray[] = $postdata;
		if(file_put_contents($filename, json_encode($datachatarray))){
			$pengirim = $this->Mobile_model->get_personil($postdata['p']);
			$devices = array();
			$anggota = $this->db->where('regu',$this->input->post('id_regu',true))->get('regu_anggota')->result();
			foreach ($anggota as $key => $value) {
				if(intval($value->satpam)!==intval($postdata['p'])){
					$device = $this->db->where('id_personil',$value->satpam)->get('device')->result();
					foreach ($device as $skey => $svalue) {
						$devices[] = $svalue;
					}
				}
			}
			foreach ($devices as $key => $value) {
				$pushdata = array(
					'notification' => array(
						'title'=>$pengirim->nama_personil,
						'text'=>isset($text) ? $text : $postdata['m'],
						'PushID'=>rand(1000000,9999999),
						'click_action'=>'REGU_CHAT',
						'time_to_live'=>60 * 1,
						'icon'=>'chat',
						'sound'=>'blop',
						'tag'=>'chat_regu_'.$postdata['p']
						),
					'data' => array(
						'DataPushID'=>rand(1000000,9999999),
						'type'=>'regu_chat',
						'id_regu'=>$this->input->post('id_regu',true)
						),
					'to' => $value->firebase,
					'priority'=> 'normal'
				);
				$this->aang->pushNotification($pushdata);
			}
			exit(json_encode(array("status"=>true,"resp"=>"OK","data"=>$postdata)));
		}
		exit(json_encode(array("status"=>false)));
	}

	public function chatting_data()
	{
		if(file_exists($_POST['filename'])) exit(file_get_contents($_POST['filename']));
		else exit("[]");
	}

	public function chatting_data_regu()
	{
		if(file_exists($_POST['filename'])) exit(file_get_contents($_POST['filename']));
		else exit("[]");
	}

	public function cek_saldo()
	{
		$saldo = $this->Mobile_model->cek_saldo();
		if($saldo) $saldo->saldo = number_format(intval($saldo->deposit_pulsa));
		exit(json_encode($saldo));
	}

	public function harga_pulsa()
	{
		$harga = $this->Mobile_model->harga_pulsa();
		foreach ($harga as $key => $value) {
			$harga[$key]->modal = number_format(intval($value->harga_jual));
		}
		exit(json_encode($harga)); 
	}

	public function submit_transaksi_pulsa()
	{
		$data = $this->Mobile_model->submit_transaksi_pulsa();
		exit(json_encode($data));
	}

	public function sosmed_update_status()
	{
		$personil = $this->Mobile_model->get_personil_by_md5_id();
		if($personil){
			$resource = false;
			if($this->input->post('base64')){
				$uniqid = uniqid();
				$dir = "sosmed_foto/{$personil->ID}/";
				if(!file_exists($dir . "index.html")){
					mkdir($dir);
					file_put_contents($dir . "index.html", "");
				}
				$expl = explode("||", $_POST['base64']);
				$resource = $dir . $uniqid . ".png";
				$this->aang->save_base64($expl[0], $resource);
				$this->aang->save_base64($expl[1], str_replace('.png', '_.png', $resource));
			}
			$update = $this->Mobile_model->sosmed_update_status($personil, $resource);
			if($update){
				exit(json_encode(array('status'=>true,'resp'=>'Status anda telah diterbitkan.')));
			} else {
				exit(json_encode(array('status'=>false,'resp'=>'Status anda gagal diterbitkan.')));
			}
		}
	}

	public function sosmed_get_status()
	{
		$data = $this->Mobile_model->sosmed_get_status();
		exit(json_encode($data));
	}

	public function sosmed_status_detail()
	{
		$data = $this->Mobile_model->sosmed_status_detail();
		exit(json_encode($data));
	}

	public function kirim_komentar()
	{
		$data = $this->Mobile_model->kirim_komentar();
		exit(json_encode($data));
	}

	public function sinyal_panik()
	{
		$data = $this->Mobile_model->sinyal_panik();
		exit(json_encode($data));	
	}

}
