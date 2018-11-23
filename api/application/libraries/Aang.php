<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aang {

	public function superhash($string)
	{
		for ($i=1; $i < 21; $i++) { 
			$string = md5($string);
		}
		return $string;
	}

	private function bulan()
	{
		$bulan = array(
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
		"12"=>"Desember"
		);
		return $bulan;
	}

	public function tugaskan($id_personil)
	{
		$ci =& get_instance();
		return $ci->db->where('ID',$id_personil)->update('personil',array('sedang_tugas'=>1));
	}

	public function bebas_tugaskan($id_personil)
	{
		$ci =& get_instance();
		return $ci->db->where('ID',$id_personil)->update('personil',array('sedang_tugas'=>0));
	}

	public function save_base64($base64_string, $output_file) {
		if(substr($base64_string, 0, 1)==="[") $base64_string = trim(substr($base64_string, 9));
	    $data = base64_decode($base64_string);
	    file_put_contents($output_file, $data);
	    return $output_file; 
	}

	public function compress_image($source, $destination, $quality) {

	    $info = getimagesize($source);

	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($source);

	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($source);

	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($source);

	    imagejpeg($image, $destination, $quality);

	    return $destination;
	}

	public function ageCalculator($dob){
	    if(!empty($dob)){
	        $birthdate = new DateTime($dob);
	        $today   = new DateTime('today');
	        $age = $birthdate->diff($today)->y;
	        return $age;
	    }else{
	        return 0;
	    }
	}

	public function pushNotification($data){
		if(!isset($data['data']['DataPushID'])){
			$data['data']['DataPushID'] = rand(1000000, 9999999);
		}
		$ch = curl_init("https://fcm.googleapis.com/fcm/send");
		$header=array('Content-Type: application/json',"Authorization: key=AAAAHi9y0uY:APA91bHNMTSAI-3tlyS-Gn8ySis2DfsiNgB27NntVBItZeO3CGT8Kyrkq8dNsrHkc9hIfoqV5xlb3-LNZfDkpCVjWW9rT4ufy4DhV5P_3y4OgHXZq8IE1fBerFvIoUkbdxsQ1oyw46DU");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		// curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"notification\": {    \"title\": \"Test desde curl\",    \"text\": \"Otra prueba\"  },    \"to\" : \"eZNkEzrk_Z4:APA91bEahizRuXukwNuN1hGoSlawKIiE4vaIMo0Q5G7rCAhGfJoJeHdJ7yLO6CwRViyEzKm0VH2V0sw-91tLMvHLq72FLFhK2vRiopMINcZlOzljva66dxBbjNRbaoC6_tf062wKrq4X\"}");
		curl_exec($ch);
		curl_close($ch);
	}

	public function selisihJam($start, $end){
		$t1 = strtotime ($end);
		$t2 = strtotime ($start);
		$diff = $t1 - $t2;
		$hours = $diff / ( 60 * 60 );
		return floor($hours);
	}

	public function thumbnailGenerator( $original_file, $destination_file , $square_size = 256 ){
	 //  	if(isset($destination_file) and $destination_file!=NULL){
		// 	if(!is_writable($destination_file)){
		// 		echo '<p style="color:#FF0000">Oops, the destination path is not writable. Make that file or its parent folder wirtable.</p>'; 
		// 	}
		// }
		
		// get width and height of original image
		$imagedata = getimagesize($original_file);
		$original_width = $imagedata[0];	
		$original_height = $imagedata[1];
		
		if($original_width > $original_height){
			$new_height = $square_size;
			$new_width = $new_height*($original_width/$original_height);
		}
		if($original_height > $original_width){
			$new_width = $square_size;
			$new_height = $new_width*($original_height/$original_width);
		}
		if($original_height == $original_width){
			$new_width = $square_size;
			$new_height = $square_size;
		}
		
		$new_width = round($new_width);
		$new_height = round($new_height);
		
		// load the image
		if(substr_count(strtolower($original_file), ".jpg") or substr_count(strtolower($original_file), ".jpeg")){
			$original_image = imagecreatefromjpeg($original_file);
		}
		if(substr_count(strtolower($original_file), ".gif")){
			$original_image = imagecreatefromgif($original_file);
		}
		if(substr_count(strtolower($original_file), ".png")){
			$original_image = imagecreatefrompng($original_file);
		}
		
		$smaller_image = imagecreatetruecolor($new_width, $new_height);
		$square_image = imagecreatetruecolor($square_size, $square_size);
		
		imagecopyresampled($smaller_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
		
		if($new_width>$new_height){
			$difference = $new_width-$new_height;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0-$half_difference+1, 0, 0, 0, $square_size+$difference, $square_size, $new_width, $new_height);
		}
		if($new_height>$new_width){
			$difference = $new_height-$new_width;
			$half_difference =  round($difference/2);
			imagecopyresampled($square_image, $smaller_image, 0, 0-$half_difference+1, 0, 0, $square_size, $square_size+$difference, $new_width, $new_height);
		}
		if($new_height == $new_width){
			imagecopyresampled($square_image, $smaller_image, 0, 0, 0, 0, $square_size, $square_size, $new_width, $new_height);
		}
		

		// if no destination file was given then display a png		
		if(!$destination_file){
			imagepng($square_image,NULL,9);
		}
		
		// save the smaller image FILE if destination file given
		if(substr_count(strtolower($destination_file), ".jpg")){
			imagejpeg($square_image,$destination_file,100);
		}
		if(substr_count(strtolower($destination_file), ".gif")){
			imagegif($square_image,$destination_file);
		}
		if(substr_count(strtolower($destination_file), ".png")){
			imagepng($square_image,$destination_file,9);
		}

		imagedestroy($original_image);
		imagedestroy($smaller_image);
		imagedestroy($square_image);
	}

	public function tanggal_jam($tanggal){
		$bulan = $this->bulan();
		$strtotime = strtotime($tanggal);
		$tanggal = date("d ",$strtotime);
		$tanggal .= $bulan[date("m",$strtotime)];
		$tanggal .= " ".date(" Y, H:i");
		return $tanggal;
	}

}
