<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.zui-table {
		    border: solid 1px #DDEEEE;
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
<h2><?php echo $judul ?></h2>
<table class="zui-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Nama Perusahaan</th>
            <th>Jam Kerja</th>
            <th>Jam Masuk</th>
            <th>Jam Pulang</th>
            <th>Durasi</th>
            <th>Overtime</th>
            <th>Status</th>
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
        	<td>{$level}</td>
        	<td>{$value->nama_klien}</td>
        	<td align='center'>{$value->jam_kerja} jam</td>
        	<td align='center'>".(substr($value->jam_masuk,0,2) == "00" ? '' : substr($value->jam_masuk, 11, 5))."</td>
        	<td align='center'>".(substr($value->jam_pulang,0,2) == "00" ? '' : substr($value->jam_pulang, 11, 5))."</td>
        	<td align='center'>".(substr($value->jam_pulang,0,2) == "00" ? "" : "{$value->durasi} jam")."</td>
        	<td align='center'>".(isset($value->jam_lembur) && $value->jam_lembur ? "{$value->jam_lembur} jam" : "")."</td>
        	<td align='center'>{$value->status}</td>
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