<?php error_reporting(0) ?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.zui-table {
		    border: solid 1px <?php echo $this->input->get('export')==="excel" ? "#000000" : "#DDEEEE"; ?>;
		    border-collapse: collapse;
		    border-spacing: 0;
		    font: normal 13px Arial, sans-serif;
		    width: 100%;
		}
		.zui-table thead th {
		    background-color: #DDEFEF;
		    border: solid 1px #999999;
		    color: #336B6B;
		    padding: 4px;
		    text-align: center;
		    text-shadow: 1px 1px 1px #fff;
		}
		.zui-table tbody td {
		    border: solid 1px #999999;
		    color: #333;
		    padding: 4px;
		    font-size: 11px;
		    text-shadow: 1px 1px 1px #fff;
		}
		h2 {
			font-family: Arial;
			margin: 0px 0px 5px 0px;
		}
	</style>
</head>
<body>
<!-- <h2><?php echo $judul ?></h2> -->
<table class="zui-table" <?php if($this->input->get('export')==="excel") echo "border='1'" ?>>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Level</th>
            <th>Kualifikasi</th>
            <th>Tinggi Badan</th>
            <th>Berat Badan</th>
            <th>No. Handphone</th>
            <th>Alamat Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) {
        	switch ($value->level) {
        		case 'C':
        			$level = "CHIEF";
        			break;
        		
        		case 'D':
        			$level = "DANRU";
        			break;
        		
        		default:
        			$level = "SATPAM";
        			break;
        	}
        	echo "<tr>
        	<td align='center'>".($key+1)."</td>
        	<td>{$value->nama_personil}</td>
            <td align='center'>".($value->jenis_kelamin === "P" ? "Wanita" : "Pria")."</td>
            <td>".ucwords($value->tempat_lahir)."</td>
            <td align='center'>".(date("d/m/Y", strtotime($value->tanggal_lahir)))."</td>
        	<td>{$level}</td>
        	<td align='left'>".(strlen(trim($value->kualifikasi))==4 ? "-" : $value->kualifikasi)."</td>
            <td align='center'>{$value->tinggi_badan}cm</td>
            <td align='center'>{$value->berat_badan}kg</td>
            <td align='left'>{$value->nomor_handphone}</td>
        	<td align='left'>{$value->email}</td>
        	</tr>";
        } ?>
    </tbody>
</table>
</body>
<script type="text/javascript">
	window.print();
	setTimeout(function() {
		window.close();
	}, 100);
</script>
</html>