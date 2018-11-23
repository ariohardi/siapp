var _submit = {
	simpan_komponen : function(){
		var data = getParams($("#ff-komponen").serializeArray());
		if(data.nama_komponen.length<4) setError("#nama_komponen", "Masukan nama komponen dengan benar");
		else {
			$.messager.progress({
			    title:'Loading',
			    msg:'Memproses data..'
			});
			jQuery.post("api/index.php/hr/simpan_komponen", data, function(serv){
				if(serv.status==200){
					$("#nama_komponen, #detail_komponen").val("");
					$("#dg-komponen").datagrid("reload");
					if($("#id_komponen").val().length>0) $('#dlg-komponen').dialog("close");
					else $("#id_komponen").focus();
				}
				$.messager.progress('close');
				$.messager.alert(
					serv.status==200 ? "Sukses" : "Gagal",
					serv.message,
					serv.status==200 ? "info" : "error");
			}, "json").error(function(err){
				$.messager.progress('close');
				console.log(err.resposeText);
			});
		}
	},
	simpan_shift : function(){
		var data = {
			shift : $("#dg-jadwal").datagrid("getData").rows
		}
		$.messager.progress({
		    title:'Loading',
		    msg:'Menyimpan data..'
		});
		jQuery.post("api/index.php/hr/simpan_shift", data, function(serv){
			console.log("serv",serv);
			$.messager.progress('close');
			$.messager.alert(
				serv.status==200 ? "Sukses" : "Gagal",
				serv.message,
				serv.status==200 ? "info" : "error");
			if(serv.status==200){
				$("#dg-komponen").datagrid("reload");
			}
		}, "json").error(function(err){
			$.messager.progress('close');
			console.log(err.resposeText);
		});
	},
	hapus_komponen : function(data){
		$.messager.progress({
			title:'Loading',
		    msg:'Menghapus data..'
		});
		jQuery.post("api/index.php/hr/hapus_komponen", data, function(serv){
			if(serv.status==200)$("#dg-komponen").datagrid("reload");
			$.messager.progress('close');
			$.messager.alert(
				serv.status==200 ? "Sukses" : "Gagal",
				serv.message,
				serv.status==200 ? "info" : "error");
		}, "json").error(function(err){
			console.log(err.resposeText);
			$.messager.progress('close');
		});
	},
	simpan_divisi : function(operasi){
		var data = getParams($("#ff-divisi").serializeArray());
		if(data.kode_divisi.length==0) setError("#kode_divisi", "Masukan kode divisi dengan benar");
		else if(data.nama_divisi.length<5) setError("#nama_divisi", "Masukan nama divisi dengan benar");
		else {
			$.messager.progress({
			    title:'Loading',
			    msg:'Memproses data..'
			});
			jQuery.post("api/index.php/hr/simpan_divisi/"+operasi, data, function(serv){
				if(serv.status==200){
					$("#nama_divisi, #kode_divisi").val("");
					$("#dg-divisi").datagrid("reload");
					if(operasi==="insert"){
						$("#kode_divisi, #nama_divisi").val("");
						$("#kode_divisi").focus();
					} else $("#dlg-divisi").dialog("close");
				}
				$.messager.progress('close');
				$.messager.alert(
					serv.status==200 ? "Sukses" : "Gagal",
					serv.message,
					serv.status==200 ? "info" : "error");
			}, "json").error(function(err){
				console.log(err.resposeText);
				$.messager.progress('close');
			});
		}
	},
	hapus_divisi : function(data){
		$.messager.progress({
			title:'Loading',
		    msg:'Menghapus data..'
		});
		jQuery.post("api/index.php/hr/hapus_divisi", data, function(serv){
			if(serv.status==200)$("#dg-divisi").datagrid("reload");
			$.messager.progress('close');
			$.messager.alert(
				serv.status==200 ? "Sukses" : "Gagal",
				serv.message,
				serv.status==200 ? "info" : "error");
		}, "json").error(function(err){
			console.log(err.resposeText);
			$.messager.progress('close');
		});
	},
	simpan_departemen : function(operasi){
		var data = getParams($("#ff-departemen").serializeArray());
		if(data.kode_departemen.length==0) setError("#kode_departemen", "Masukan kode departemen dengan benar");
		else if(data.nama_departemen.length<5) setError("#nama_departemen", "Masukan nama departemen dengan benar");
		else {
			$.messager.progress({
			    title:'Loading',
			    msg:'Memproses data..'
			});
			jQuery.post("api/index.php/hr/simpan_departemen/"+operasi, data, function(serv){
				if(serv.status==200){
					$("#nama_departemen, #kode_departemen").val("");
					$("#dg-departemen").datagrid("reload");
					if(operasi==="insert"){
						$("#kode_departemen, #nama_departemen").val("");
						$("#kode_departemen").focus();
					} else $("#dlg-departemen").dialog("close");
				}
				$.messager.progress('close');
				$.messager.alert(
					serv.status==200 ? "Sukses" : "Gagal",
					serv.message,
					serv.status==200 ? "info" : "error");
			}, "json").error(function(err){
				console.log(err.resposeText);
				$.messager.progress('close');
			});
		}
	},
	hapus_departemen : function(data){
		$.messager.progress({
			title:'Loading',
		    msg:'Menghapus data..'
		});
		jQuery.post("api/index.php/hr/hapus_departemen", data, function(serv){
			if(serv.status==200)$("#dg-departemen").datagrid("reload");
			$.messager.progress('close');
			$.messager.alert(
				serv.status==200 ? "Sukses" : "Gagal",
				serv.message,
				serv.status==200 ? "info" : "error");
		}, "json").error(function(err){
			console.log(err.resposeText);
			$.messager.progress('close');
		});
	},
	simpan_karyawan : function(){
		var data = getParams($("#ff-karyawan").serializeArray());
		data.kontak = $("#dg-karyawan-kontak").datagrid("getData").rows;
		data.riwayat_pendidikan = $("#dg-karyawan-pendidikan").datagrid("getData").rows;
		console.log("data",data);
		var operasi = $(".window.panel-htop").find(".panel-title:first").text().split(" ")[0].toUpperCase();
		var missing_required = 0;
		$.each(data, function(key,value){
			console.log(key);
			if(key.substring(0,3)==="kry"){
				if(key!=="kry_departemen")
					if(value.trim()==0){
						setError("#"+key, "Kolom ini tidak boleh kosong");
						missing_required++;
					}
			}
		});
		if(missing_required>0){
			$.messager.alert("Warning", "Anda melewatkan kolom yang wajib diisi, mohon periksa formulir karyawan.","warning");
		} else {
			$.messager.progress({
			    title:'Loading',
			    msg:'Memproses data..'
			});
			jQuery.post("api/index.php/hr/simpan_karyawan/"+(operasi==="TAMBAH" ? "insert" : "update"), data, function(serv){
				if(serv.status==200){
					$("#nama_karyawan, #kode_karyawan").val("");
					$("#dg-karyawan").datagrid("reload");
					if(operasi==="TAMBAH"){
						$("#kode_karyawan, #nama_karyawan").val("");
						$("#kode_karyawan").focus();
					} else $("#dlg-karyawan").dialog("close");
				}
				$.messager.progress('close');
				$.messager.alert(
					serv.status==200 ? "Sukses" : "Gagal",
					serv.message,
					serv.status==200 ? "info" : "error");
			}, "json").error(function(err){
				console.log(err.resposeText);
				$.messager.progress('close');
			});
		}
	},
};