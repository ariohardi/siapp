function dgKomponenGaji(){
	$('#dg-komponen').datagrid({
	    url:'api/index.php/hr/komponen_gaji',
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	    columns:[[
	        {field:'nama',title:'Nama',width:200},
	        {field:'tipe',title:'Tipe Komponen',width:120},
	        {field:'detail',title:'Keterangan',width:336},
	        {field:'opsi',title:'Opsi',align:'center',width:56,formatter: function(value,row,index){
				setTimeout(function() {
					$("#btn-edit-"+row.ID).unbind('keyup');
					$("#btn-delete-"+row.ID).unbind('keyup');
					$("#btn-edit-"+row.ID).linkbutton().attr("title", "Edit : "+row.nama).on("click", function(){
						$('#dlg-komponen').dialog({
						    title: 'Edit Komponen Gaji',
						    width: 400,
						    height: 270,
						    closed: false,
						    cache: false,
						    modal: true,
						    toolbar: toolbar.hr.komponen_gaji_form
						});
						$("#id_komponen").val(row.ID);
						$("#nama_komponen").val(row.nama);
						$("#detail_komponen").val(row.detail);
						var tipe = "GP";
						if(row.tipe==="Tunjangan") tipe = "TJ";
						if(row.tipe==="Potongan") tipe = "PT";
						$("#tipe_komponen").combobox({
							editable : false,
							value : tipe
						});
						$(document).unbind('keyup');
						$(document).on("keyup", function(evt){
							if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_komponen();
							if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-komponen').dialog({closed:true});
						});
						return false;
					}).tooltip();
					$("#btn-delete-"+row.ID).linkbutton().attr("title", "Hapus : "+row.nama).on("click", function(){
						$.messager.confirm('Konfirmasi','Anda yakin akan menghapus komponen gaji : '+row.nama+'?',function(r){
						    if (r){
						        _submit.hapus_komponen(row);
						    }
						});
						return false;
					}).tooltip();    
				}, 150);
				return '<center><a id="btn-edit-'+row.ID+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-edit\'"></a> <a id="btn-delete-'+row.ID+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-remove\'"></a></center>';
			}}
	    ]],
	    rowStyler: function(index,row){
			if (row.tipe==="Gaji Pokok"){
				return 'background-color:#deffde;';	
			}
			if (row.tipe==="Tunjangan"){
				return 'background-color:#fffcdf;';	
			}
			if (row.tipe==="Potongan"){
				return 'background-color:#ffe9e8;';	
			}
		}
	});
}

function dgDivisi(){
	$('#dg-divisi').datagrid({
	    url:'api/index.php/hr/divisi',
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	    columns:[[
	        {field:'kode',title:'Kode Divisi',width:100},
	        {field:'nama',title:'Nama Divisi',width:280},
	        {field:'opsi',title:'Opsi',align:'center',width:56,formatter: function(value,row,index){
				setTimeout(function() {
					$("#btn-edit-"+row.kode).unbind('keyup');
					$("#btn-delete-"+row.kode).unbind('keyup');
					$("#btn-edit-"+row.kode).linkbutton().attr("title", "Edit : "+row.nama).on("click", function(){
						$('#dlg-divisi').dialog({
						    title: 'Edit Divisi',
						    width: 360,
						    height: 180,
						    closed: false,
						    cache: false,
						    modal: true,
						    toolbar: toolbar.hr.divisi_form("update")
						});
						$("#kode_divisi").attr("readonly", "readonly");
						$("#kode_divisi").val(row.kode);
						$("#nama_divisi").val(row.nama);
						$(document).unbind('keyup');
						$(document).on("keyup", function(evt){
							if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_divisi("update");
							if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-divisi').dialog({closed:true});
						});
						return false;
					}).tooltip();
					$("#btn-delete-"+row.kode).linkbutton().attr("title", "Hapus : "+row.nama).on("click", function(){
						$.messager.confirm('Konfirmasi','Anda yakin akan menghapus divisi : '+row.nama+' ('+row.kode+')?',function(r){
						    if (r){
						        _submit.hapus_divisi(row);
						    }
						});
						return false;
					}).tooltip();    
				}, 150);
				return '<center><a id="btn-edit-'+row.kode+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-edit\'"></a> <a id="btn-delete-'+row.kode+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-remove\'"></a></center>';
			}}
	    ]],
	    rowStyler: function(index,row){
			if (row.tipe==="Gaji Pokok"){
				return 'background-color:#deffde;';	
			}
			if (row.tipe==="Tunjangan"){
				return 'background-color:#fffcdf;';	
			}
			if (row.tipe==="Potongan"){
				return 'background-color:#ffe9e8;';	
			}
		}
	});
}

function dgDepartemen(){
	$('#dg-departemen').datagrid({
	    url:'api/index.php/hr/departemen',
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	    columns:[[
	        {field:'kode',title:'Kode',width:80},
	        {field:'nama',title:'Nama Departemen',width:300},
	        {field:'kode_divisi',title:'Divisi',width:120},
	        {field:'opsi',title:'Opsi',align:'center',width:56,formatter: function(value,row,index){
				setTimeout(function() {
					$("#btn-edit-"+row.kode.toLowerCase()).unbind('keyup');
					$("#btn-delete-"+row.kode.toLowerCase()).unbind('keyup');
					$("#btn-edit-"+row.kode.toLowerCase()).linkbutton().attr("title", "Edit : "+row.nama).on("click", function(){
						$('#dlg-departemen').dialog({
						    title: 'Edit Departemen',
						    width: 400,
						    height: 220,
						    closed: false,
						    cache: false,
						    modal: true,
						    toolbar: toolbar.hr.departemen_form("update")
						});
						$("#kode_departemen").val(row.kode).attr("readonly", "readonly");
						$("#nama_departemen").val(row.nama);
						$('#kode_divisi_departemen').combobox({
						    url:'api/index.php/hr/divisi',
						    valueField:'kode',
						    textField:'text',
						    editable:false,
						    onLoadSuccess:function(r){
						    	$('#kode_divisi_departemen').combobox("setValue", row.kode_divisi);
						    }
						});
						$(document).unbind('keyup');
						$(document).on("keyup", function(evt){
							if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_departemen("update");
							if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-departemen').dialog({closed:true});
						});
						return false;
					}).tooltip();
					$("#btn-delete-"+row.kode.toLowerCase()).linkbutton().attr("title", "Hapus : "+row.nama).on("click", function(){
						$.messager.confirm('Konfirmasi','Anda yakin akan menghapus departemen : '+row.nama+'?',function(r){
						    if (r){
						        _submit.hapus_departemen(row);
						    }
						});
						return false;
					}).tooltip();    
				}, 150);
				return '<center><a id="btn-edit-'+row.kode.toLowerCase()+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-edit\'"></a> <a id="btn-delete-'+row.kode.toLowerCase()+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-remove\'"></a></center>';
			}}
	    ]]
	});
}

function dgKaryawan(){
	$('#dg-karyawan').datagrid({
	    url:'api/index.php/hr/karyawan',
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
		columns:[[
	        {field:'nip',title:'NIP',width:80},
	        {field:'nama_lengkap',title:'Nama Karyawan',width:300},
	        {field:'divisi',title:'Divisi',width:100},
	        {field:'departemen',title:'Departemen',width:100},
	        {field:'opsi',title:'Opsi',align:'center',width:56,formatter: function(value,row,index){
				setTimeout(function() {
					$("#btn-edit-"+row.nip.toLowerCase()).unbind('keyup');
					$("#btn-delete-"+row.nip.toLowerCase()).unbind('keyup');
					$("#btn-edit-"+row.nip.toLowerCase()).linkbutton().attr("title", "Edit : "+row.nama).on("click", function(){
						$('#dlg-karyawan').dialog({
						    title: 'Edit Karyawan',
						    width: 400,
						    height: 220,
						    closed: false,
						    cache: false,
						    modal: true,
						    toolbar: toolbar.hr.karyawan_form("update")
						});
						$("#nip_karyawan").val(row.nip).attr("readonly", "readonly");
						$("#nama_karyawan").val(row.nama);
						$('#nip_divisi_karyawan').combobox({
						    url:'api/index.php/hr/divisi',
						    valueField:'nip',
						    textField:'text',
						    editable:false,
						    onLoadSuccess:function(r){
						    	$('#nip_divisi_karyawan').combobox("setValue", row.nip_divisi);
						    }
						});
						$(document).unbind('keyup');
						$(document).on("keyup", function(evt){
							if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_karyawan("update");
							if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-karyawan').dialog({closed:true});
						});
						return false;
					}).tooltip();
					$("#btn-delete-"+row.nip.toLowerCase()).linkbutton().attr("title", "Hapus : "+row.nama).on("click", function(){
						$.messager.confirm('Konfirmasi','Anda yakin akan menghapus karyawan : '+row.nama+'?',function(r){
						    if (r){
						        _submit.hapus_karyawan(row);
						    }
						});
						return false;
					}).tooltip();    
				}, 150);
				return '<center><a id="btn-edit-'+row.nip.toLowerCase()+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-edit\'"></a> <a id="btn-delete-'+row.nip.toLowerCase()+'" href="#" class="easyui-linkbutton" data-options="iconCls:\'icon-remove\'"></a></center>';
			}}
	    ]]
	});
}

var enableKontakEdit = false;
var onEditKontak = null;
function dgKontak(){
	$('#dg-karyawan-kontak').datagrid({
		toolbar : [{
			text:'Tambah Kontak',
			iconCls:'icon-add',
			handler:function(){
				if(onEditKontak!=null) $("#dg-karyawan-kontak").datagrid("endEdit", onEditKontak);
				var boleh_tambah = true;
				$.each($("#dg-karyawan-kontak").datagrid("getData").rows, function(key,value){
					console.log(key, value);
					if(value.tipe.length==0||value.kontak.length==0){
						boleh_tambah = false;
						setTimeout(function() {
							$.messager.alert("Warning", "Anda memiliki baris kontak yang belum dilengkapi, baris kontak nomor : "+(key+1));
						}, 150);
					}
				});
				if(boleh_tambah){
					$('#dg-karyawan-kontak').datagrid("appendRow",{
						tipe : "",
						kontak : ""
					});
					$('#dg-karyawan-kontak').datagrid('editCell', {
		                index: $('#dg-karyawan-kontak').datagrid("getData").total - 1,
		                field: 'tipe'
		            });
				}
			}
		}],
		enableCellEditing : true,
	    onClickRow:function(index){
		
		},
	    columns:[[
	        {field:'tipe',title:'Tipe',width:120,editor:'text'},
	        {field:'kontak',title:'Kontak',width:260,editor:'text'}
	    ]],
	    onClickCell:function(index,field,value){
	    	if(onEditKontak!=null) $("#dg-karyawan-kontak").datagrid("endEdit", onEditKontak);
	    	$('#dg-karyawan-kontak').datagrid('editCell', {
                index: index,
                field: field
            });
	    },
	    onBeginEdit:function(index,row,changes){
	    	onEditKontak = index;
	    },
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	});
	$('#dg-karyawan-kontak').datagrid({data:[]});
	if(!enableKontakEdit){
		$('#dg-karyawan-kontak').datagrid('enableCellEditing');
		enableKontakEdit = true;
	}
}

var enablePendidikanEdit = false;
var onEditPendidikan = null;
function dgPendidikan(){
	$('#dg-karyawan-pendidikan').datagrid({
		toolbar : [{
			text:'Tambah Pendidikan',
			iconCls:'icon-add',
			handler:function(){
				if(onEditPendidikan!=null) $("#dg-karyawan-pendidikan").datagrid("endEdit", onEditPendidikan);
				var boleh_tambah = true;
				$.each($("#dg-karyawan-pendidikan").datagrid("getData").rows, function(key,value){
					if(value.jenjang.length==0||value.lembaga.length==0){
						boleh_tambah = false;
						setTimeout(function() {
							$.messager.alert("Warning", "Anda memiliki baris pendidikan yang belum dilengkapi, baris pendidikan nomor : "+(key+1));
						}, 150);
					}
				});
				if(boleh_tambah){
					$('#dg-karyawan-pendidikan').datagrid("appendRow",{
						jenjang : "", lembaga : "", gelar : "", tahun_masuk : "", tahun_lulus : ""
					});
					$('#dg-karyawan-pendidikan').datagrid('editCell', {
		                index: $('#dg-karyawan-pendidikan').datagrid("getData").total - 1,
		                field: 'jenjang'
		            });
				}
			}
		}],
		enableCellEditing : true,
	    onClickRow:function(index){
		
		},
		frozenColumns:[[
			{field:'jenjang',title:'Jenjang',width:120,editor:'text'},
		]],
	    columns:[[
	        {field:'lembaga',title:'Lembaga Pendidikan / Institusi',width:260,editor:'text'},
	        {field:'gelar',title:'Gelar',width:120,editor:'text'},
	        {field:'tahun_masuk',title:'Th. Masuk',width:80,editor:'text'},
	        {field:'tahun_lulus',title:'Th. Lulus',width:80,editor:'text'}
	    ]],
	    onClickCell:function(index,field,value){
	    	if(onEditPendidikan!=null) $("#dg-karyawan-pendidikan").datagrid("endEdit", onEditPendidikan);
	    	$('#dg-karyawan-pendidikan').datagrid('editCell', {
                index: index,
                field: field
            });
	    },
	    onBeginEdit:function(index,row,changes){
	    	onEditPendidikan = index;
	    },
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	});
	$('#dg-karyawan-pendidikan').datagrid({data:[]});
	if(!enablePendidikanEdit){
		$('#dg-karyawan-pendidikan').datagrid('enableCellEditing');
		enablePendidikanEdit = true;
	}
}

var enableJadwalEdit = false;
var onEditJadwal = null;
function dgJadwalKerja(){
	$('#dg-jadwal').datagrid({
		url:'api/index.php/hr/shift',
		toolbar : [{
			text:'Tambah Shift',
			iconCls:'icon-add',
			handler:function(){
				if(onEditJadwal!=null) $("#dg-jadwal").datagrid("endEdit", onEditJadwal);
				var boleh_tambah = true;
				$.each($("#dg-jadwal").datagrid("getData").rows, function(key,value){
					if(value.nama.length==0||value.jam_masuk.length==0||value.jam_pulang.length==0){
						boleh_tambah = false;
						setTimeout(function() {
							$.messager.alert("Warning", "Anda memiliki baris jadwal yang belum dilengkapi, baris jadwal nomor : "+(key+1));
						}, 150);
					}
				});
				if(boleh_tambah){
					$('#dg-jadwal').datagrid("appendRow",{
						nama : "", jam_masuk : "", jam_pulang : "", keterangan : "", ID : 0
					});
					$('#dg-jadwal').datagrid('editCell', {
		                index: $('#dg-jadwal').datagrid("getData").total - 1,
		                field: 'nama'
		            });
				}
			}
		},{
			text:"Simpan Perubahan",
			iconCls:'icon-save',
			handler:function(){
				if(onEditJadwal!=null) $("#dg-jadwal").datagrid("endEdit", onEditJadwal);
				console.log($("#dg-jadwal").datagrid("getData").rows);
				var boleh_simpan = true;
				$.each($("#dg-jadwal").datagrid("getData").rows, function(key,value){
					if(value.nama.length==0||value.jam_masuk.length==0||value.jam_pulang.length==0){
						boleh_simpan = false;
						setTimeout(function() {
							$.messager.alert("Warning", "Anda memiliki baris jadwal yang belum dilengkapi, baris jadwal nomor : "+(key+1));
						}, 150);
					}
				});
				if(boleh_simpan){
					_submit.simpan_shift();
				}
			}
		}],
		enableCellEditing : true,
	    onClickRow:function(index){
		
		},
		frozenColumns:[[
			{field:'nama',title:'Nama Shift',width:240,editor:'text'},
		]],
	    columns:[[
	        {field:'jam_masuk',title:'Jam Masuk',width:80,editor:'timespinner',align:"center"},
	        {field:'jam_pulang',title:'Jam Pulang',width:80,editor:'timespinner',align:"center"},
	        {field:'keterangan',title:'Keterangan',width:300,editor:'text'},
	        {field:'ID',title:'Kode',align:"center",width:100,hidden:true}
	    ]],
	    onClickCell:function(index,field,value){
	    	if(onEditJadwal!=null) $("#dg-jadwal").datagrid("endEdit", onEditJadwal);
	    	$('#dg-jadwal').datagrid('editCell', {
                index: index,
                field: field
            });
            var row = $("#dg-jadwal").datagrid("getData").rows[index];
	    },
	    onBeginEdit:function(index,row,changes){
	    	onEditJadwal = index;
	    },
	    onEndEdit:function(index,row,changes){
	    	
	    },
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	});
	if(!enableJadwalEdit){
		$('#dg-jadwal').datagrid('enableCellEditing');
		enableJadwalEdit = true;
	}
}

var onEditJadwalKaryawan = null;
var enableJadwalKaryawanEdit = false;
var tgl_jadwal_aktif;
function dgJadwalKaryawan(tgl){
	tgl_jadwal_aktif = tgl;
	$('#dg-jadwal-karyawan').datagrid({
		title : "Jadwal Kerja Karyawan Tanggal : "+tgl.split("-")[2]+"/"+tgl.split("-")[1]+"/"+tgl.split("-")[0],
		url:'api/index.php/hr/jadwal_kerja/'+tgl,
		enableCellEditing : true,
		rowStyler: function(index,row){
			if (row.shift===""){
				return 'background-color:#ffe9e8;';
			}
		},
	    onClickRow:function(index){
		
		},
		frozenColumns:[[
			{field:'nip',title:'NIP',width:120},
		]],
		onLoadSuccess:function(){
			$('#dg-jadwal-karyawan').datagrid('editCell', {
                index: 0,
                field: "shift"
            });
		},
	    columns:[[
	        {field:'nama_lengkap',title:'Nama Karyawan',width:120},
	        {field:'divisi',title:'Div',width:60},
	        {field:'departemen',title:'Dept',width:60},
	        {field:'shift',title:'Shift',width:80,editor:{
				type:'combobox',
				options:{
						url:'api/index.php/hr/shift',
						valueField:'ID',
						textField:'nama',
						panelHeight:'auto',
						editable:false,
						onSelect:function(r){
							var nip = $("#dg-jadwal-karyawan").datagrid("getData").rows[onEditJadwalKaryawan].nip;
							var id_shift = $("#dg-jadwal-karyawan").datagrid("getData").rows[onEditJadwalKaryawan].shift;
							console.log(parseInt(id_shift), parseInt(r.ID));
							if(parseInt(id_shift)!=parseInt(r.ID)) jQuery.post("api/index.php/hr/simpan_jadwal",{
								id_shift : r.ID,
								nip : nip,
								tanggal : tgl_jadwal_aktif
							}, function(){
								$("#dg-jadwal-karyawan").datagrid("reload");
							});
						}
				   	}   
				},
				formatter:function(value,row){
					return row.nama_shift;
				}
			},
	        {field:'jam_masuk',title:'IN',align:"center",width:50},
	        {field:'jam_pulang',title:'OUT',align:"center",width:50}
	    ]],
	    onClickCell:function(index,field,value){
	    	if(onEditJadwalKaryawan!=null) $("#dg-jadwal-karyawan").datagrid("endEdit", onEditJadwalKaryawan);
	    	$('#dg-jadwal-karyawan').datagrid('editCell', {
                index: index,
                field: field
            });
            var row = $("#dg-jadwal-karyawan").datagrid("getData").rows[index];
	    },
	    onBeginEdit:function(index,row,changes){
	    	onEditJadwalKaryawan = index;
	    },
	    onEndEdit:function(index,row,changes){
	    	
	    },
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	});
	if(!enableJadwalKaryawanEdit){
		$('#dg-jadwal-karyawan').datagrid('enableCellEditing');
		enableJadwalKaryawanEdit = true;
	}
}

var enableAbsensiEdit = false;
var onEditAbsensi = null;
var toolbarAbsensi = null;
var toolbarAbsensiAkhir = null;
function dgAbsensi(tgl, tglAkhir){
	if(toolbarAbsensi==null){
		toolbarAbsensi = $('<div style="padding:2px 4px">Tanggal: </div>').appendTo('body');	
		var db = $('<input>').appendTo(toolbarAbsensi);
		var db2 = $('<input>').appendTo(toolbarAbsensi);
		db.datebox({
			width : 120,
			editable : false,
			current : new Date(),
			onSelect: function(date){
				tgl = (date.getFullYear()+"-"+(date.getMonth()+1<10 ? "0" : "")+(date.getMonth()+1)+"-"+(date.getDate()<10 ? "0" : "")+date.getDate());
				dgAbsensi(tgl, tglAkhir);
			}
		});
		db.datebox("setValue", tgl);
		db2.datebox({
			width : 120,
			editable : false,
			current : new Date(),
			onSelect: function(date){
				tglAkhir = (date.getFullYear()+"-"+(date.getMonth()+1<10 ? "0" : "")+(date.getMonth()+1)+"-"+(date.getDate()<10 ? "0" : "")+date.getDate());
				dgAbsensi(tgl, tglAkhir);
			}
		});
		db2.datebox("setValue", tglAkhir);

		var tanggal = tglAkhir + tgl;
		var tes = tglAkhir.concat(tgl);

	}
	// var cb = $('<input>').appendTo(toolbar);
	// cb.combobox();
	$('#dg-absensi').datagrid({

		url:'api/index.php/hr/absensi/'+   tgl + tglAkhir,
		toolbar : toolbarAbsensi,
		pagination:true,
		pageSize:50,
		title : "Data Absensi Harian",
		enableCellEditing : true,
	    onClickRow:function(index){
		
		},
		onLoadSuccess:function(data){
			$(".pagination-page-list").find("option").each(function(){
				if($(this).text()!=="50") $(this).remove();
			});
			$.each(data.rows, function(key, row){
				if(row.jam_masuk.length>3&&row.jam_pulang.length>3){
					if(row.jam_masuk!=="00:00"||row.jam_pulang!=="00:00"){
			    		var startTime=moment(row.jam_masuk, "HH:mm:ss");
						var endTime=moment(row.jam_pulang, "HH:mm:ss");
						var duration =moment.duration(endTime.diff(startTime));
						var hours = parseInt(duration.asHours());
						$('#dg-absensi').datagrid('updateRow',{
							index: key,
							row: {
								durasi: hours > 0 ? hours + " jam" : 0 + " jam",
								overtime: hours > 8 ? (hours-8) : "",
								status_absensi: "MASUK",
								tanggalBaru: tes
							}
						});
					}	
		    	}
		    });
		},
		rowStyler: function(index,row){
			if (row.status_absensi==="CUTI"){
				return 'background-color:#a3f8ff;'; // return inline style
			}
			if (row.status_absensi==="ALPHA"){
				return 'background-color:#ff6a6a;color: #fff;'; // return inline style
			}
			if (row.status_absensi==="SAKIT"){
				return 'background-color:#ffdfe4;'; // return inline style
			}
			if (row.status_absensi==="IJIN"){
				return 'background-color:#ffff8e;'; // return inline style
			}	
		},
		frozenColumns:[[
			{field:'tanggal',title:'Tanggal',width:100},
			{field:'nama_personil',title:'Nama Personil',width:100},
		]],
	    columns:[[
	    	{field:'divisi',title:'Divisi',width:100},
	        {field:'jam_masuk',title:'Masuk',width:130,editor:'timespinner',align:"center"},
	        {field:'jam_pulang',title:'Keluar',width:130,editor:'timespinner',align:"center"},
	        {field: 'durasi',title:'Durasi',width:130,editor:'timespinner',align:"center"},
	        {field: 'tanggalBaru',title:'tanggalBaru',width:130,editor:'timespinner',align:"center"},
	    ]],
	    onClickCell:function(index,field,value){
	    	if(onEditAbsensi!=null) $("#dg-absensi").datagrid("endEdit", onEditAbsensi);
	    	$('#dg-absensi').datagrid('editCell', {
                index: index,
                field: field
            });
            var row = $("#dg-absensi").datagrid("getData").rows[index];
	    },
	    onBeginEdit:function(index,row,changes){
	    	onEditAbsensi = index;
	    },
	    onEndEdit:function(index,row,changes){
	    	if(row.jam_masuk.length>3&&row.jam_pulang.length>3){
				if(row.jam_masuk!=="00:00"||row.jam_pulang!=="00:00"){
		    		var startTime=moment(row.jam_masuk, "HH:mm:ss");
					var endTime=moment(row.jam_pulang, "HH:mm:ss");
					var duration = moment.duration(endTime.diff(startTime));
					var hours = parseInt(duration.asHours());
					$('#dg-absensi').datagrid('updateRow',{
						index: index,
						row: {
							durasi: hours > 0 ? hours : 0,
							overtime: hours > 8 ? (hours-8) : "",
							status_absensi: "MASUK"
						}
					});
				}	
	    	}
	    	jQuery.post("api/index.php/hr/simpan_absensi", {
				nip : row.nip,
				jam_masuk : row.jam_masuk,
				jam_pulang : row.jam_pulang,
				status : row.status_absensi,
				tanggal : tgl
			});
	    	
	    },
	    onClickRow:function(index){
			$(this).datagrid('unselectRow',index);
		},
	});
	if(!enableAbsensiEdit){
		$('#dg-absensi').datagrid('enableCellEditing');
		enableAbsensiEdit = true;
	}
}