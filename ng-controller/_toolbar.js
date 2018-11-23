function setError(el, errMsg)
{
	$(el).css("background", "#ffebeb");
	$(".setError").remove();
	$("<p/>").addClass("setError").css({
		"font-size" : "10px",
		"color" : "red",
		"margin" : "2px 0px 0px 0px"
	}).text(errMsg).insertAfter(el).prepend( $("<img/>").attr("width", "14").attr("src", "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAADVUlEQVQ4T21TbWhbZRR+zv1Kem+bjyZtGpqUtkvdalt1abEWJ8IUux/TOVxqZTMooqAgyPCHTHSFTYetIrN+zCHzYxQ6qv2/Usc+YBSzzLnJupmaaG2TrknNWJOb5uPeV3LXBZW9f14473mf55zzPIdwl5OJRl2J8E/3F5aXWnTSyexwxRq6e3+u8fmW/59O/w6k0zFb7Itvgpnp6aC8mrvHLAhVBFC2mFdVizLreGrn0c7B58epoSF7518FIHX9euOv+/Z+bI3O73S7vYJJVsDKr4wZuQVVxUJiPp974L5jne++t8/e0nKzHDcA2NKScnbva5/Xzs4FG1vbwIiQLxah6ToYYyDGIHAcRJ7HwnxUW9vSN9x7+Mg7RKQZAFePfjq4MvLh183eVrNosaDEGJgoggTBYGelEvS1NVCpBInnEVmIprzDIzua+7efJ8aYdCawY8wxO7dLdjhBVVXgFQW8LIOTRANALxShqSp0NQueAWp6BTf7ej566PCRN2klEvGEAk9PNUFsZy4nTI9thWSvBfE8iONuV1BuRdOQjUTAh8IQ8gUs1iqntxwbe5ISMzP3XtgdONms2D3cpjY0j34Gud51N3Vx4/QppA8ehJhRsSiyy93fjT9BN65c2DDzzK6pBl1ord7og/LsAMwOJ0AcwK2LpJeVYLh1+Rewk9Og1Qzi1abQ5uPj24jF4/LUC8/9gPCVbU0bN0GyWcEr1eDlKpBkut1CIQ9NzUHLZkG5HNKJOFb9nccfHfv+RYPi4vD7r8YOHBh11tbzjT4fTBYLOLMZJK4PsVg0VNBVFdlUCrH4n7kNHxza0x58edIAWE1E6s4NBscLoUtbrQ4n6r1eKDYbOEmqyFhUVdxKprC0OA/xkd4Tj3/57UtlR1acGD/7oz/8xutfab/9sVkSTZCra2BWZHA8j2I+j7VMBtlcBqK/65T/k9FXXF09v1eceGfk4cnJ9ouH9r9tuja3vYY4K2d4GdAJ7G+Ukuj2n3jwrf0jXf39f/1nFxhjNDAwIIZCIY5U1SqsLPe0icLDNiKPRtBSuhaNlfTzeVfjJWpqUvs8Hq2jo6M0NDSkV1oog0xMTHB1dXWUTCZZOp3mEokEv85UKt9ut5vsdrseCAR0IjK27B/XymGPx1KyfgAAAABJRU5ErkJggg==") );
	$(el).on("keypress", function(){
		$(el).css("background", "#ffffff");
		$(".setError").remove();
	});
}
function getParams(serializedArray)
{
	var data = {};
	jQuery.each(serializedArray, function(k,v){
		data[v.name] = v.value;
	});
	return data;
}
var toolbar = {
	hr : {
		komponen_gaji : [{
		    text:'Tambah Komponen',
            iconCls:'icon-add',
            handler:function(){
            	$('#dlg-komponen').dialog({
				    title: 'Tambah Komponen Gaji',
				    width: 400,
				    height: 270,
				    closed: false,
				    cache: false,
				    modal: true,
				    toolbar: toolbar.hr.komponen_gaji_form
				});
				$("#id_komponen").val("");
				$("#tipe_komponen").combobox({
					editable : false
				});
				$(document).unbind('keyup');
				$(document).on("keyup", function(evt){
					if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_komponen();
					if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-komponen').dialog({closed:true});
				});
        	}
        }],
	    komponen_gaji_form : [{
			text:'Simpan (F2)',
			iconCls:'icon-save',
			handler:function(){
				_submit.simpan_komponen();
			}
		}],
		divisi : [{
		    text:'Tambah Divisi',
            iconCls:'icon-add',
            handler:function(){
            	$('#dlg-divisi').dialog({
				    title: 'Tambah Divisi',
				    width: 360,
				    height: 180,
				    closed: false,
				    cache: false,
				    modal: true,
				    toolbar: toolbar.hr.divisi_form("insert")
				});
				$("#kode_divisi").removeAttr("readonly");
				$(document).unbind('keyup');
				$(document).on("keyup", function(evt){
					if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_divisi("insert");
					if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-divisi').dialog({closed:true});
				});
        	}
        }],
        departemen : [{
		    text:'Tambah Departemen',
            iconCls:'icon-add',
            handler:function(){
            	$('#dlg-departemen').dialog({
				    title: 'Tambah Departemen',
				    width: 400,
				    height: 220,
				    closed: false,
				    cache: false,
				    modal: true,
				    toolbar: toolbar.hr.departemen_form("insert")
				});
				$("#kode_departemen").removeAttr("readonly");
				$('#kode_divisi_departemen').combobox({
				    url:'api/index.php/hr/divisi',
				    valueField:'kode',
				    textField:'text',
				    editable:false,
				    onLoadSuccess:function(r){
				    	if(r.length>0){
				    		$('#kode_divisi_departemen').combobox("setValue", r[0].kode);
				    	} else {
				    		$("#dlg-departemen").dialog("close");
				    		$.messager.alert("Gagal", "Anda harus membuat setidaknya satu divisi untuk membuat departemen", "warning");
				    	}
				    }
				});
				$(document).unbind('keyup');
				$(document).on("keyup", function(evt){
					if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_departemen("insert");
					if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-departemen').dialog({closed:true});
				});
        	}
        }],
        karyawan : [{
		    text:'Tambah Karyawan',
            iconCls:'icon-add',
            handler:function(){
            	setTimeout(function() {
            		$(".mypanel").panel();
            		dgKontak();
            		dgPendidikan();
            	}, 250);
            	$('#dlg-karyawan').dialog({
				    title: 'Tambah Karyawan',
				    width: 620,
				    height: 540,
				    closed: false,
				    cache: false,
				    modal: true,
				    toolbar: toolbar.hr.karyawan_form("insert")
				});
				$("#tt-karyawan").tabs({
					tabPosition : "left",
					height : 472,
					border : false
				});
				$('.mydate').css("width","90px").datebox({
					editable : false
				});
				$("#nip").removeAttr("readonly");
				$('#kry_alamat_propinsi').combobox({
					url:'api/index.php/geo/propinsi',
				    valueField:'ID',
				    textField:'nama_propinsi',
					editable:false,
					onSelect:function(r){
				    	$('#kry_alamat_kabupaten').combobox({
						    url:'api/index.php/geo/kabupaten/'+r.ID,
						    valueField:'ID',
						    textField:'nama_kabupaten',
						    editable:false,
						    onSelect:function(r){
						    	$('#kry_alamat_kecamatan').combobox({
								    url:'api/index.php/geo/kecamatan/'+r.ID,
								    valueField:'ID',
								    textField:'nama_kecamatan',
								    editable:false,
								    onSelect:function(r){

								    },
								    onLoadSuccess:function(r){
								    	if(r.length>0){
								    		$('#kry_alamat_kecamatan').combobox("setValue", r[0].ID);
								    	}
								    }	
								});
						    },
						    onLoadSuccess:function(r){
						    	if(r.length>0){
						    		$('#kry_alamat_kabupaten').combobox("setValue", r[0].ID);
						    	}
						    }	
						});
				    },
					onLoadSuccess:function(r){
				    	if(r.length>0){
				    		$('#kry_alamat_propinsi').combobox("setValue", r[0].ID);
				    	}
				    }	
				});
				$('#kry_status').combobox({editable:false});
				$('#kry_departemen').combobox({editable:false});
				$('#kry_divisi').combobox({
				    url:'api/index.php/hr/divisi',
				    valueField:'kode',
				    textField:'text',
				    editable:false,
				    onSelect:function(r){
				    	$('#kry_departemen').combobox({
						    url:'api/index.php/hr/departemen/'+r.kode,
						    valueField:'kode',
						    textField:'text',
						    onLoadSuccess:function(r){
						    	if(r.length>0){
						    		$('#kry_departemen').combobox("setValue", r[0].kode);
						    	}
						    }	
						});
				    },
				    onLoadSuccess:function(r){
				    	if(r.length>0){
				    		$('#kry_divisi').combobox("setValue", r[0].kode);
				    	} else {
				    		$("#dlg-karyawan").dialog("close");
				    		$.messager.alert("Gagal", "Anda harus membuat setidaknya satu divisi untuk membuat data karyawan", "warning");
				    	}
				    }
				});
				$(document).unbind('keyup');
				$(document).on("keyup", function(evt){
					if(evt.key=="F2"||evt.keyCode==113) _submit.simpan_karyawan();
					if(evt.key=="F4"||evt.keyCode==115||evt.key=="Escape"||evt.keyCode==27) $('#dlg-karyawan').dialog({closed:true});
				});
        	}
        }],
        divisi_form : function(operasi){
        	return [{
				text:'Simpan (F2)',
				iconCls:'icon-save',
				handler:function(){
					_submit.simpan_divisi(operasi);
				}
			}];
        },
        karyawan_form : function(){
        	return [{
				text:'Simpan (F2)',
				iconCls:'icon-save',
				handler:function(){
					_submit.simpan_karyawan();
				}
			}];
        },
        departemen_form : function(operasi){
        	return [{
				text:'Simpan (F2)',
				iconCls:'icon-save',
				handler:function(){
					_submit.simpan_departemen(operasi);
				}
			}];
        }
	}
};