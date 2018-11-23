<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobile_model extends CI_Model {

	public function do_login()
	{
		$this->db->select('personil.*,kabupaten.nama_kabupaten,propinsi.nama_propinsi');
		$this->db->select('md5(md5(`'.$this->db->dbprefix.'personil`.`ID`)) AS md5_id',false);
		$this->db->select('regu.nama_regu, regu.ID AS id_regu');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->join('regu_anggota','personil.ID=regu_anggota.satpam','LEFT');
		$this->db->join('regu','regu.ID=regu_anggota.regu','LEFT');
		$this->db->where(array(
			'email'=>$this->input->post('email',true),
			'password'=>$this->aang->superhash($this->input->post('password'))
			));
		$user = $this->db->get('personil')->row();
		if($user){
			$user->umur = $this->aang->ageCalculator($user->tanggal_lahir);
			$user->tanggal_lahir = date("d/m/Y",strtotime($user->tanggal_lahir));
			switch ($user->level) {
				case 'C':
					$user->level = "Chief Security";
					break;
				
				case 'D':
					$user->level = "Komandan Regu";
					break;
				
				default:
					$user->level = "Satpam";
					break;
			}
			$device = $this->db->where('device_id',$this->input->post('device_id',true))->get('device')->row();
			if(!$device){
				$this->db->insert('device',array(
					'device_id'=>$this->input->post('device_id',true),
					'firebase'=>'',
					'id_personil'=>$user->ID
					));
			} else {
				$this->db->where('device_id',$device->device_id);
				$this->db->update('device',array(
					'id_personil'=>$user->ID
					));	
			}
			return array(
				'status'=>true,
				'message'=>'Login berhasil, mohon tunggu sebentar.',
				'ID'=>$user->ID,
				'user'=>$user
				);
		}
		return array('status'=>false,'message'=>'Login gagal, alamat email atau password salah.');
	}

	public function store_location()
	{
		$location = $this->input->post('coordinates',true);
		$location_address = $this->input->post('lokasi',true);
		file_put_contents('debug.txt', $location);
		if($location){
			$location .= ",".date("Y-m-d H:i:s");
			return $this->db->where('ID',$this->input->post('ID',true))->update('personil',array('lokasi_terbaru'=>$location,'alamat_lokasi'=>$location_address));
		}
	}


	public function baca_kode_absen()
	{
		$this->db->select('kode_absensi.*, personil.nama_personil, personil.upload_foto');
		$this->db->join('personil','personil.ID=kode_absensi.id_personil');
		$data = $this->db->where('kode',preg_replace("/[^A-Za-z0-9 ]/", '', $this->input->post('kode',true)))->get('kode_absensi')->row();
		if($data) $data->md5_id = md5(md5($data->id_personil));
		return $data;
		// return $this->db->last_query();
	}

	public function baca_kode_patroli()
	{
		$this->db->select('kode_patroli.*, personil.nama_personil, personil.upload_foto');
		$this->db->join('personil','personil.ID=kode_patroli.id_personil');
		$data = $this->db->where('kode',preg_replace("/[^A-Za-z0-9 ]/", '', $this->input->post('kode',true)))->get('kode_patroli')->row();
		if($data) $data->md5_id = md5(md5($data->id_personil));
		return $data;
		// return $this->db->last_query();
	}

	public function proses_absensi($data)
	{
		unset($data->base64);
		$sedang_masuk = $this->db->where(array(
			'id_personil'=>$data->id_personil,
			'jam_pulang'=>'0000-00-00 00:00:00',
			'status'=>'MASUK'
			))->get('absensi')->row();
		$kode_absensi = $this->db->where('id_personil',$data->id_personil)->get('kode_absensi')->row();
		$this->db->where('id_personil',$data->id_personil)->delete('kode_absensi');
		if($sedang_masuk){
			$data->id_danru_pulang = $data->id_danru;
			unset($data->id_danru);
			$data->lokasi_pulang = $kode_absensi->text;
			unset($data->jam_masuk, $data->foto_masuk, $data->tanggal);
			$update = $this->db->where('ID',$sedang_masuk->ID)->update('absensi',(array)$data);
			if($update) return 'OUT'; 
			else return 'FAIL';
		} else {
			$data->id_danru_masuk = $data->id_danru;
			unset($data->id_danru);
			$data->lokasi_masuk = $kode_absensi->text;
			unset($data->jam_pulang, $data->foto_pulang);
			$insert = $this->db->insert('absensi',(array)$data);
			if($insert) return 'IN'; 
			else return 'FAIL';
		}
	}

	public function generate_kode_absen()
	{
		$kode = md5(uniqid());
		$this->db->where('id_personil',$this->input->post('id_personil',true))->delete('kode_absensi');
		$insert = $this->db->insert('kode_absensi',array(
			'device_id'=>$this->input->post('device_id',true),
			'kode'=>$kode,
			'id_personil'=>$this->input->post('id_personil',true),
			'text'=>$this->input->post('text',true),
			'tgl_buat'=>date("Y-m-d H:i:s")
			));
		if($insert) return $kode;
		else return "failed";
	}

	public function generate_kode_patroli()
	{
		$kode = md5(uniqid());
		$this->db->where('id_personil',$this->input->post('id_personil',true))->delete('kode_patroli');
		$insert = $this->db->insert('kode_patroli',array(
			'device_id'=>$this->input->post('device_id',true),
			'kode'=>$kode,
			'id_personil'=>$this->input->post('id_personil',true),
			'text'=>$this->input->post('text',true),
			'tgl_buat'=>date("Y-m-d H:i:s")
			));
		if($insert) return $kode;
		else return "failed";
	}

	public function panic_button()
	{
		$personil = $this->db->where('ID',$this->input->post('ID',true) ? $this->input->post('ID',true) : 0)->get('personil')->row();
		if($personil) $id_regu = $this->db->where('status',1)->where('satpam',$personil->ID)->get('regu_anggota')->row();
		if(isset($id_regu)&&$id_regu){
			$data['id_regu'] = $id_regu->regu;
		}
		$data['id_personil'] = $this->input->post('ID',true) ? $this->input->post('ID',true) : 0;
		$data['lokasi'] = $this->input->post('coordinates',true) ? $this->input->post('coordinates',true) : "0.0,0.0";
		$data['lokasi_alamat'] = $this->input->post('alamat',true) ? $this->input->post('alamat',true) : "Tidak dikenali";
		$data['waktu_mulai'] = date("Y-m-d H:i:s");
		$insert = $this->db->insert('panic_button',$data);
		if($insert){
			$id_panic = $this->db->insert_id();
			if(isset($id_regu)&&$id_regu){
				$anggota = $this->db->where('status',1)->where('regu',$id_regu->regu)->get('regu_anggota')->result();
				$id_anggota = array(0);
				foreach ($anggota as $key => $value) {
					$id_anggota[] = intval($value->satpam);
				}
				$data_firebase = $this->db->where_in('id_personil',$id_anggota)->get('device')->result();
				foreach ($data_firebase as $key => $value) {
					if(intval($value->id_personil)!=intval($personil->ID)){
						$pushdata = array(
							'notification' => array(
								'title'=>'Sinyal Tombol Panik',
								'text'=>$personil->nama_personil . ' menekan tombol panik, mohon periksa apa yang terjadi.',
								'PushID'=>rand(1000000,9999999),
								'click_action'=>'PANIC_DETAIL',
								'time_to_live'=>60 * 5,
								'icon'=>'error',
								'sound'=>'siren'
								),
							'data' => array(
								'DataPushID'=>rand(1000000,9999999),
								'type'=>'panic_signal',
								'id_panic'=>$id_panic
								),
							'to' => $value->firebase,
							'priority'=> 'high'
						);
						$this->aang->pushNotification($pushdata);
					}	
				}	
			}
		}
		return $insert;
	}

	public function panic_button_selesai()
	{
		$data['kategori'] = $this->input->post('kategori',true);
		$data['masalahnya'] = $this->input->post('masalahnya',true);
		$data['solusinya'] = $this->input->post('solusinya',true);
		$data['status'] = 2;
		$data['waktu_akhir'] = date("Y-m-d H:i:s");
		$update = $this->db->where(array(
			'id_personil'=>$this->input->post('personil_id',true),
			'status'=>1
			))->update('panic_button',$data);
		return true;
		// if($update){
		// 	$panic_detail = $this->db->where(array(
		// 		'id_personil'=>$this->input->post('personil_id',true),
		// 		'status'=>1
		// 	))->order_by('ID','DESC')->limit(1)->get('panic_button')->row();
		// 	$id_panic = $panic_detail->ID;
		// 	$personil = $this->db->where('ID',$this->input->post('personil_id',true) ? $this->input->post('personil_id',true) : 0)->get('personil')->row();
		// 	if($personil){
		// 		$regu = $this->db->where('status',1)->where('satpam',$personil->ID)->get('regu_anggota')->row();
		// 		if($regu){
		// 			$anggota = $this->db->where('status',1)->where('regu',$regu->regu)->get('regu_anggota')->result();
		// 			$id_anggota = array(0);
		// 			foreach ($anggota as $key => $value) {
		// 				$id_anggota[] = intval($value->satpam);
		// 			}
		// 			$data_firebase = $this->db->where_in('id_personil',$id_anggota)->get('device')->result();
		// 			foreach ($data_firebase as $key => $value) {
		// 				// if(intval($value->id_personil)!=intval($personil->ID)){
		// 					$pushdata = array(
		// 						'notification' => array(
		// 							'title'=>'Sinyal Panik Selesai',
		// 							'text'=>$personil->nama_personil . ' telah menyelesaikan status paniknya.',
		// 							'PushID'=>rand(1000000,9999999),
		// 							'click_action'=>'PANIC_DETAIL',
		// 							'time_to_live'=>60 * 5,
		// 							'icon'=>'green_tick',
		// 							'sound'=>'blop'
		// 							),
		// 						'data' => array(
		// 							'DataPushID'=>rand(1000000,9999999),
		// 							'type'=>'panic_signal_resolved',
		// 							'id_panic'=>$id_panic
		// 							),
		// 						'to' => $value->firebase,
		// 						'priority'=> 'medium'
		// 					);
		// 					$this->aang->pushNotification($pushdata);
		// 				// }	
		// 			}
		// 		}
		// 	}
		// }
		// return $update;

	}

	public function firebase_register()
	{
		$this->db->where('device_id', $this->input->post('device_id',true));
		return $this->db->update("device", $this->input->post(null, true));
	}

	public function data_satpam_anggota_regu()
	{
		$this->db->select('personil.*,personil.ID AS personil_id,nama_propinsi,nama_kabupaten');
		$this->db->select('md5(md5('.$this->db->dbprefix.'personil.ID)) as md5_id',false);
		$this->db->join('regu_anggota','regu_anggota.satpam=personil.ID');
		$this->db->join('propinsi','personil.propinsi=propinsi.ID');
		$this->db->join('kabupaten','personil.kabupaten=kabupaten.ID');
		$this->db->where('regu',$this->input->post('id_regu',true));
		$this->db->where('regu_anggota.status',1);
		if($this->input->post('level')) $this->db->where('level',$this->input->post('level',true));
		$this->db->order_by('nama_personil');
		$data = $this->db->get('personil')->result();
		foreach ($data as $key => $value) {
			$tanggal = date("Y-m-d");
			$absensi = $this->db->where(array(
					'id_personil'=>$value->ID,
					'tanggal'=>$tanggal
				))->get('absensi')->row();
			if($absensi) {
				$data[$key]->jam_masuk = $absensi->jam_masuk;
				$data[$key]->jam_pulang = $absensi->jam_pulang;
				$data[$key]->absensi = $absensi;
			} else {
				$data[$key]->jam_masuk = "0000-00-00 00:00:00";
				$data[$key]->jam_pulang = "0000-00-00 00:00:00";
			}
		}
		return $data;
	}

	public function ganti_password()
	{
		$this->db->where(array(
			'ID'=>$this->input->post('ID',true),
			'password'=>$this->aang->superhash($this->input->post('password_lama'))
			));
		$user = $this->db->get('personil')->row();
		if($user){
			$this->db->where(array(
				'ID'=>$this->input->post('ID',true),
				'password'=>$this->aang->superhash($this->input->post('password_lama'))
				));
			$update = $this->db->update("personil",array("password"=>$this->aang->superhash($_POST['password_baru'])));
			if($update){
				return array("status"=>true,"message"=>"Password berhasil diganti");
			} else {
				return array("status"=>false,"message"=>"Password gagal diganti");
			}
		} else {
			return array("status"=>false,"message"=>"Password lama belum benar");
		}
	}

	public function laporan_isu_keamanan_submit($lampiran)
	{
		$data = $this->input->post(null,true);
		if(isset($data['base64_1'])) unset($data['base64_1']);
		if(isset($data['base64_1_thumb'])) unset($data['base64_1_thumb']);
		if(isset($data['base64_2'])) unset($data['base64_2']);
		if(isset($data['base64_2_thumb'])) unset($data['base64_2_thumb']);
		if(isset($data['base64_3'])) unset($data['base64_3']);
		if(isset($data['base64_3_thumb'])) unset($data['base64_3_thumb']);
		$data['lampiran'] = implode(',', $lampiran);
		$data['tanggal'] = date("Y-m-d H:i:s");
		$insert = $this->db->insert("laporan_isu_keamanan",$data);
		if($insert) {
			$last_id = $this->db->insert_id();
			$personil = $this->db->where('ID',$this->input->post('id_personil',true))->get('personil')->row();
			$judul = "Laporan {$personil->nama_personil} : {$this->input->post('perihal',true)}";
			$link = "#/lap_isu_keamanan/detail/".md5(md5($last_id));
			$this->db->insert('notifikasi',array(
				'judul'=>$judul,
				'link'=>$link
				));
			return 1;
		}
		return 0;
	}

	public function inbox_perpesanan()
	{
		$this->db->select('pesan.*, pesan.ID AS id_pesan');
		$this->db->select('admin.nama AS nama_admin');
		$this->db->join('admin','admin.ID=pesan.pembuat');
		$filename = "perpesanan/".md5(md5($this->input->post('id_personil',true)));
		if(file_exists($filename)){
			$md5id = file_get_contents($filename);
			$this->db->where('pesan.ID', explode(',', $md5id));
		}
		$this->db->order_by('tgl_buat','desc');
		$data = $this->db->get('pesan')->result();
		foreach ($data as $key => $value) {
			$data[$key]->waktu = date("d M", strtotime($value->tgl_buat));
			if($data[$key]->waktu===date("d M")) $data[$key]->waktu = date("H:i", strtotime($value->tgl_buat));
		}
		return $data;
	}

	public function detail_perpesanan()
	{
		$this->db->select('pesan.*, pesan.ID AS id_pesan');
		$this->db->select('admin.nama AS nama_admin');
		$this->db->join('admin','admin.ID=pesan.pembuat');
		$this->db->where('pesan.ID',$this->input->post('id_pesan',true));
		$data = $this->db->get('pesan')->row();
		$data->tanggal_kirim = date("d M Y",strtotime($data->tgl_buat));
		$data->tanggal_kirim .= " pukul ";
		$data->tanggal_kirim .= date("H:i",strtotime($data->tgl_buat));
		$data->tanggal_kirim .= " WIB";
		$data->lampiran = explode(',', $data->lampiran);
		return $data;
	}

	public function laporan_isu_keamanan_data()
	{
		$this->db->where('id_personil',$this->input->post('id_personil',true));
		$this->db->order_by('tanggal','desc')->limit(50);
		return $this->db->get('laporan_isu_keamanan')->result();
	}

	public function absen_terakhir_saya()
	{
		$this->db->where('id_personil',$this->input->post('id_personil', true));
		$this->db->order_by('ID','DESC');
		$this->db->limit(1);
		return $this->db->get('absensi')->row();
	}

	public function data_absensi_satpam()
	{
		$data = array();
		for($i = 1; $i <= date('t'); $i++)
		{
		   	$tanggal = date('Y') . "-" . date('m') . "-" . str_pad($i, 2, '0', STR_PAD_LEFT);
			$this->db->where('id_personil',$this->input->post('id_personil', true));
			$this->db->where('tanggal',$tanggal);
			$this->db->limit(1);
			$absen = $this->db->get('absensi')->row();
			if(!$absen){
				$absen = new stdClass();
				$absen->jam_masuk = "0000-00-00 00:00:00";
				$absen->jam_pulang = "0000-00-00 00:00:00";
			}
			$absen->tanggalnya = date("d M Y",strtotime($tanggal));
			$data[] = $absen ? $absen : "";
		}
		return $data;
	}

	public function panic_detail()
	{
		$this->db->select('personil.*, panic_button.*');
		$this->db->select('md5(md5(`'.$this->db->dbprefix.'personil`.`ID`)) AS md5_id',false);
		$this->db->join('personil','panic_button.id_personil=personil.ID');
		$this->db->where('panic_button.ID',$this->input->post('id_panic',true));
		$data = $this->db->get('panic_button')->row();
		if($data){
			$data->waktu = $this->aang->tanggal_jam($data->waktu_mulai);
		}
		return $data;
	}

	public function get_personil($id_personil)
	{
		return $this->db->where('ID',$id_personil)->get('personil')->row();
	}

	public function cek_saldo()
	{
		return $this->db->where('md5(md5(`ID`))',"{$this->input->post('md5_id',true)}")->get('personil')->row();
	}

	public function get_personil_by_md5_id()
	{
		return $this->cek_saldo();
	}

	public function harga_pulsa()
	{
		return $this->db->get('harga_pulsa')->result();
	}

	public function submit_transaksi_pulsa()
	{
		define('DEVICE_ID', 'd1d7edfba573a9b1');
		$saldo = $this->cek_saldo();
		$harga = $this->db->where('ID',$this->input->post('id_produk',true))->get('harga_pulsa')->row();
		if(intval($harga->harga_jual)>intval($saldo->deposit_pulsa)){
			return array('status'=>false,'resp'=>'Saldo deposit anda tidak mencukupi untuk melakukan transaksi ini, sisa saldo deposit anda adalah : '.number_format($saldo->deposit_pulsa));
		}
		$tanggal = date("Y-m-d H:i:s");
		$this->db->trans_start();
		$sisa_saldo = intval($saldo->deposit_pulsa) - intval($harga->harga_jual);
		$this->db->where('ID',$saldo->ID)->update('personil',array('deposit_pulsa'=>$sisa_saldo));
		$this->db->insert('mutasi_deposit',array(
			'out'=>$harga->harga_jual,
			'keterangan'=>'Transaksi '.$this->input->post('nomor',true),
			'id_personil'=>$saldo->ID,
			'tanggal'=>$tanggal,
			'saldo'=>$sisa_saldo
			));
		$nomor = preg_replace("/[^0-9]/", "", $this->input->post('nomor',true));
		$this->db->insert('transaksi_pulsa',array(
			'harga_jual'=>$harga->harga_jual,
			'harga_beli'=>$harga->harga_beli,
			'id_produk'=>$this->input->post('id_produk',true),
			'nomor'=>$harga->provider==="PLN" ? $nomor : "+62".substr($nomor, 1),
			'id_personil'=>$saldo->ID,
			'tipe'=>$harga->tipe,
			'provider'=>$harga->provider,
			'tanggal'=>$tanggal
			));
		$server = $this->db->where('device_id',DEVICE_ID)->get('device')->row();
		$pushdata = array(
			'notification' => array(
				'title'=>'Transaksi Isi Pulsa',
				'text'=>$saldo->nama_personil . ' melakukan transaksi pengisian pulsa.',
				'PushID'=>rand(1000000,9999999),
				'time_to_live'=>60 * 30,
				'icon'=>'smartphone',
				'sound'=>'blop'
				),
			'data' => array(
				'DataPushID'=>rand(1000000,9999999),
				'type'=>'transaksi_pulsa',
				'nomor'=>'+6281932337373',
				'text'=>$harga->kode.".".$nomor.".1234"
				),
			'to' => $server->firebase,
			'priority'=> 'high'
		);
		$this->aang->pushNotification($pushdata);
		$this->db->trans_complete();
		if($this->db->trans_status()){
			return array('status'=>true,'resp'=>'Transaksi berhasil diproses.');
		} else {
			return array('status'=>false,'resp'=>'Transaksi gagal diproses.');
		}
	}

	public function sosmed_update_status($member, $resource) // $member adalah personil
	{
		$insert = $this->db->insert('sosmed_status',array(
			'id_personil'=>$member->ID,
			'is_admin'=>0,
			'tipe'=>$this->input->post('tipe',true),
			'text'=>strip_tags($this->input->post('text',true)),
			'tanggal'=>date("Y-m-d H:i:s"),
			'tanggal_string'=>date("d/m/Y, H:i"),
			'resource'=>$resource
			));
		return $insert;
	}

	public function sosmed_get_status()
	{
		$this->db->select('admin.nama, personil.nama_personil, personil.upload_foto, sosmed_status.*');
		$this->db->select('md5(md5(`'.$this->db->dbprefix.'personil`.`ID`)) AS md5_id',false);
		$this->db->join('admin','sosmed_status.id_admin=admin.ID','LEFT');
		$this->db->join('personil','sosmed_status.id_personil=personil.ID','LEFT');
		$this->db->limit(10);
		$this->db->order_by('tanggal','desc');
		return $this->db->get('sosmed_status')->result();
	}

	public function sosmed_status_detail()
	{
		$this->db->select('admin.nama, personil.nama_personil, personil.upload_foto, sosmed_status.*');
		$this->db->select('md5(md5(`'.$this->db->dbprefix.'personil`.`ID`)) AS md5_id',false);
		$this->db->join('admin','sosmed_status.id_admin=admin.ID','LEFT');
		$this->db->join('personil','sosmed_status.id_personil=personil.ID','LEFT');
		$this->db->limit(1);
		$this->db->where('sosmed_status.ID',$this->input->post('ID',true));
		$data = $this->db->get('sosmed_status')->row();	
		if($data){
			$this->db->select('admin.nama, personil.nama_personil, personil.upload_foto, sosmed_komentar.*');
			$this->db->join('admin','sosmed_komentar.id_admin=admin.ID','LEFT');
			$this->db->join('personil','sosmed_komentar.id_personil=personil.ID','LEFT');
			$this->db->where('id_status',$data->ID);
			$data->komentar = $this->db->get('sosmed_komentar')->result();
			if($data->komentar){
				foreach ($data->komentar as $key => $value) {
					$data->komentar[$key]->time = date("d M Y, H:i",strtotime($value->tanggal));
					$data->komentar[$key]->md5_id = md5(md5($value->id_personil));
				}
			}
		}
		return $data;
	}

	public function kirim_komentar()
	{
		$data =  $this->input->post(null, true);
		$status = $this->db->where('ID',$data['id_status'])->get('sosmed_status')->row();
		$this->db->where('ID',$data['id_status'])->update('sosmed_status',array(
			'jml_komentar'=>(intval($status->jml_komentar) + 1)
			));
		$data['tanggal'] = date("Y-m-d H:i:s");
		$data['tanggal_string'] = date("d/m/Y, H:i");
		$insert = $this->db->insert("sosmed_komentar",$data);
		if($insert){
			$this->db->where(array(
				'id_status'=>$data['id_status'],
				'id_personil'=>$data['id_personil']
				))->delete('sosmed_status_subscribe');
			$subscriber = $this->db->where('id_status',$data['id_status'])->join('device','device.id_personil=sosmed_status_subscribe.id_personil')->get('sosmed_status_subscribe')->result();
			$personil_status = $this->db->where('ID',$status->id_personil)->get('personil')->row();
			$personil = $this->db->where('ID',$data['id_personil'])->get('personil')->row();
			foreach ($subscriber as $key => $value) {
				$pushdata = array(
					'notification' => array(
						'title'=>$personil->nama_personil .' mengomentari status'.(intval($personil->ID)==intval($status->id_personil) ? "nya" : " ".$personil_status->nama_personil),
						'text'=>$data['komentar'],
						'PushID'=>rand(1000000,9999999),
						'click_action'=>'STATUS_DETAIL',
						'time_to_live'=>60 * 3,
						'icon'=>'logo',
						'sound'=>'blop'
					),
					'data' => array(
						'DataPushID'=>rand(1000000,9999999),
						'type'=>'sosmed_komentar',
						'ID'=>$data['id_status']
					),
					'to' => $value->firebase,
					'priority'=> 'high'
				);
				$this->aang->pushNotification($pushdata);
			}
			$this->db->insert('sosmed_status_subscribe',array(
				'id_status'=>$data['id_status'],
				'id_personil'=>$data['id_personil']
				));
		}
		return $insert;
	}

	public function sinyal_panik()
	{
		$this->db->select('panic_button.*, personil.nama_personil');
		$this->db->join('personil','personil.ID=panic_button.id_personil');
		if($this->input->post('id_personil')){
			$this->db->where('id_personil', $this->input->post('id_personil',true));
		}
		$this->db->where('id_regu',$this->input->post('id_regu',true));
		$data = $this->db->order_by('status','asc')->order_by('waktu_mulai','desc')->get('panic_button')->result();
		foreach ($data as $key => $value) {
			$data[$key]->waktu_mulai = $this->aang->tanggal_jam($value->waktu_mulai);
		}
		return $data;
	}

}