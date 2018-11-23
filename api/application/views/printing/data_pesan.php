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
            <th>No</th>
            <th>Tanggal Kirim</th>
            <th>Perihal</th>
            <th>Penerima</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value) {
        	echo "<tr>
        	<td align='center'>".($key+1)."</td>
        	<td align='center'>{$value->tgl_buat}</td>
            <td align='center'>{$value->perihal}</td>
            <td align='center'>{$value->penerima}</td>
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