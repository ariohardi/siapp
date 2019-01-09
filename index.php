<?php session_start(); 
  if(isset($_POST['ID'])) {
    $_SESSION['ID'] = $_POST['ID']; 
    $_SESSION['role'] = $_POST['role'];
    $_SESSION['id_level'] = $_POST['id_level'];
    $_SESSION['roleText'] = $_POST['roleText'];
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['leveling'] = $_POST['leveling'];      
  }
  if(!isset($_SESSION['ID'])) 
    header("Location: ./login");
?>

<!doctype html>
<html lang="en" ng-app="RDash">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title ng-bind="title_tag ? title_tag : page_title"></title>
  <!-- STYLES -->
  <meta name="robots" content="noindex,nofollow" />
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <link rel="stylesheet" href="lib/css/main.min.css"/>
  <!-- Chart JS Reference --->
  <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
  <script src="https://www.amcharts.com/lib/3/serial.js"></script>
  <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
  <script src="https://www.amcharts.com/lib/3/themes/none.js"></script>	
  <!--<link rel="stylesheet" href="css/dr.css"/>-->
  <link rel="stylesheet" href="js/popover/src/jquery.webui-popover.css"/>
  <link rel="stylesheet" href="js/magnific-popup/dist/magnific-popup.css"/>
  <link rel="stylesheet" href="lib/new/zebra-dialog/public/css/flat/zebra_dialog.css" type="text/css" />
  <link rel="stylesheet" href="js/themes/material/easyui.css"/>
  <link rel="stylesheet" href="js/themes/icon.css"/>

  <!--- Chart CSS Propinsi Reference --->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />		
  <!--<link rel="stylesheet" href="css/chat2.css"/>-->
  <!--<link rel="stylesheet" href="css/chat.css"/>-->
  
  <style>
  .ZebraDialog .ZebraDialog_Body {
  padding: 0px !important;
  }
  ul.sidebar .sidebar-main .menu-icon {
    padding-right: 65px !important;
    line-height: 73px !important;
  }
  ul.sidebar .sidebar-list .menu-icon {
    float: right;
    padding-right: 29px;
    line-height: 55px;
    width: 70px;
    position: relative !important;
  }
  .panel-header .panel-title {
    font-size: 12px !important;
  }
  .tbform td {
    padding-bottom: 8px;
  }
  .tbform td label {
    font-size: 11px;
    font-weight: normal;
    display: inline-block;
    margin-top: 3px;
  }
  .textbox .textbox-text {
    height: 21px !important;
    line-height: 21px !important;
  }
  .tbform td input, .tbform td textarea {
    padding: 2px !important;
    width: 100%;
  }
  ul.sidebar .sidebar-main .menu-icon {
    position: relative;
  }
  table td .easyui-linkbutton {
    width: 20px !important;
    height: 20px !important;
  }
  .datagrid table.datagrid-btable td .l-btn-icon {
    width: 13px;
    height: 13px;
    left: 3px !important;
    top: 10px !important;
    background-size: 100% 100%;
  }
  .date-info {
    display: inline-block;
    color: #AAAAAA;
    margin-left: 3px;
  }
  </style>
  <!-- SCRIPTS -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHicCY8Oao_qeu4dIZbC5vGrx4IwOhOp4&libraries=places"></script>
  <script src="lib/js/main.min.js"></script>
  <script type="text/javascript" src="js/ng-file-upload-master/dist/ng-file-upload-shim.min.js"></script>
  <script type="text/javascript" src="js/ng-file-upload-master/dist/ng-file-upload.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script src="js/angular-chart.min.js"></script>
  <script src="js/angular-base64-upload-master/dist/angular-base64-upload.min.js"></script>
  <script src="js/angular-cuppa-datepicker-master/js/lib/moment.js"></script>
  <script src="js/angular-cuppa-datepicker-master/js/datepicker-directive.js?a=1"></script>
  <!-- Custom Scripts -->
  <!-- <script type="text/javascript" src="ng-controller/dashboard.min.js"></script> -->
  <script type="text/javascript" src="script.php"></script>
  <script type="text/javascript" src="login/index_files/jquery.min.js"></script>
  <script type="text/javascript" src="js/ztree/js/jquery.ztree.all.min.js"></script>
  <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.playSound.js"></script>
  <script type="text/javascript" src="js/angucomplete-master/angucomplete.js"></script>
  <script type="text/javascript" src="js/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
  <script type="text/javascript" src="js/jquery-toast-plugin-master/src/jquery.toast.js"></script>
  <script type="text/javascript" src="lib/new/zebra-dialog/public/javascript/zebra_dialog.js"></script>
  <script type="text/javascript" src="lib/new/angularLocationpicker.jquery.min.js"></script>
  <script type="text/javascript" src="lib/new/locationpicker.jquery.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.6.7/firebase.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webui-popover/2.1.15/jquery.webui-popover.min.js"></script>
  <script>
    var config = {
      apiKey: "AIzaSyAUZxgMcZhe5eFiMU8Z5wnj-46NlaS4_Xg",
      authDomain: "rational-genius-106804.firebaseapp.com",
      databaseURL: "https://rational-genius-106804.firebaseio.com",
      storageBucket: "rational-genius-106804.appspot.com",
      messagingSenderId: "109014983012"
    };
    firebase.initializeApp(config);
  </script>
  <script type="text/javascript">
    $.extend($.fn.datagrid.methods, {
      editCell: function(jq,param){
        return jq.each(function(){
          var opts = $(this).datagrid('options');
          var fields = $(this).datagrid('getColumnFields',true).concat($(this).datagrid('getColumnFields'));
          for(var i=0; i<fields.length; i++){
            var col = $(this).datagrid('getColumnOption', fields[i]);
            col.editor1 = col.editor;
            if (fields[i] != param.field){
              col.editor = null;
            }
          }
          $(this).datagrid('beginEdit', param.index);
                    var ed = $(this).datagrid('getEditor', param);
                    if (ed){
                        if ($(ed.target).hasClass('textbox-f')){
                            $(ed.target).textbox('textbox').focus();
                        } else {
                            $(ed.target).focus();
                        }
                    }
          for(var i=0; i<fields.length; i++){
            var col = $(this).datagrid('getColumnOption', fields[i]);
            col.editor = col.editor1;
          }
        });
      },
            enableCellEditing: function(jq){
                return jq.each(function(){
                    var dg = $(this);
                    var opts = dg.datagrid('options');
                    opts.oldOnClickCell = opts.onClickCell;
                    opts.onClickCell = function(index, field){
                        if (opts.editIndex != undefined){
                            if (dg.datagrid('validateRow', opts.editIndex)){
                                dg.datagrid('endEdit', opts.editIndex);
                                opts.editIndex = undefined;
                            } else {
                                return;
                            }
                        }
                        dg.datagrid('selectRow', index).datagrid('editCell', {
                            index: index,
                            field: field
                        });
                        opts.editIndex = index;
                        opts.oldOnClickCell.call(this, index, field);
                    }
                });
            }
    });
  </script>
  <script type="text/javascript">
    function public_chatting(data){ 
      new jQuery.Zebra_Dialog('', {
          source: {'iframe': {
              'src':  '/web/custom/iframe_chatting.php?'+jQuery.param(data,true),
              'height': 500
          }},
          width: 800,
          title: 'Online Chatting',
          type: false
      });
    }
    jQuery(document).ready(function(){
      jQuery('#menu-item-91').css('cursor','pointer').click(function(){
        public_chatting();
      });
    });
  </script>
  <link rel="stylesheet" type="text/css" href="js/jquery-toast-plugin-master/src/jquery.toast.css" />
  <link rel="stylesheet" type="text/css" href="js/angular-cuppa-datepicker-master/css/cuppa-datepicker-styles.css" />
  <link rel="stylesheet" type="text/css" href="lib/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="js/ztree/css/zTreeStyle/zTreeStyle.css">
  <link rel="stylesheet" type="text/css" href="js/angucomplete-master/angucomplete.css?a=<?php echo uniqid() ?>">
  <style type="text/css">
    #map {
        min-height: 400px;
    }
  </style>
</head>
<body ng-controller="MasterCtrl">
  <div id="page-wrapper" ng-class="{'open': toggle}" ng-cloak>

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar">
        <li class="sidebar-main">
          <a ng-click="toggleSidebar()">
            E-RAKOP
            <span class="menu-icon glyphicon glyphicon-transfer"></span>
          </a>
        </li>
        <li class="sidebar-title"><span>Navigasi</span></li>
        <li class="sidebar-list">
          <a href="#/klien">Jadwal Rapat <span class="menu-icon fa fa-calendar"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/personil">Anggota<span class="menu-icon fa fa-user"></span></a>
        </li>
        <li class="sidebar-list">
          <a href="#/proyek">Hasil Rapat<span class="menu-icon fa fa-newspaper-o"></span></a>
        </li>
        <!-- <li class="sidebar-list" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <a href="#/absensi">Data Absensi Personil <span class="menu-icon fa fa-clock-o"></span></a>
        </li> -->
      </ul>
      <div class="sidebar-footer">
        <div class="col-xs-4">
          <!--<a href="http://www.sigapp.net/web" target="_blank">-->
          <a href="http://www.jn1.co.id/" target="_blank">
            <b>Website</b>
          </a>
        </div>
        <!---<div class="col-xs-4">
          <a href="javascript:void(0)" target="_blank">
            Setting
          </a>
        </div>-->
        <div class="col-xs-4">
          <a href="login">
            <b>Keluar</b>
          </a>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->
    
    <div id="content-wrapper">
      <div class="page-content">
		
        <!-- Header Bar -->
        <div class="row header">
          <div class="col-xs-12">
            <div class="user pull-right">
              <div class="item dropdown">
                <a href="#" class="dropdown-toggle">
                  <img style="height: 60px !important;width: auto !important;margin-top: 4px !important" src="login/Koperas_Janusa.png?a=1">
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">
                     <?php 
                        $nama = $_SESSION['nama'];
                        $roleText = $_SESSION['roleText'];
                        $leveling = $_SESSION['leveling'];
                        echo "Selamat Datang";
                        echo "<br>"; 
                        echo $nama;
                        echo "<br>";
                        echo "Role : " . $roleText;
                        echo "<br>";
                        echo "Jabatan ".$leveling;
                    ?>
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="#">
                      Profile
                    </a>
                  </li>
                  <li class="link">
                    <a href="#">
                      Menu Item
                    </a>
                  </li>
                  <li class="link">
                    <a href="#">
                      Menu Item
                    </a>
                  </li>
                  <li class="divider"></li>
                  <li class="link">
                    <a href="login">
                      Logout
                    </a>
                  </li>
                </ul>
              </div>
              <div class="item dropdown">
               <a href="#" ng-click="clear_notifikasi_baru()" class="dropdown-toggle">
                  <span class="badge red" ng-bind="notifikasi_baru" ng-show="notifikasi_baru > 0"></span> <i class="fa fa-bell-o"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-header">
                    Pemberitahuan
                  </li>
                  <li class="divider"></li>
                  <li ng-repeat="notif in notifikasi_terakhir">
                    <a href="{{notif.link}}" ng-bind="notif.judul"></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="meta">
              <div class="page" id="main-title" ng-bind="page_title"></div>
              <div class="breadcrumb-links" ng-bind="breadcrumb_text"></div>
            </div>
          </div>
        </div>
        <!-- End Header Bar -->
        <!-- Main Content -->
        <div ui-view></div>
      </div><!-- End Page Content -->
    </div><!-- End Content Wrapper -->
  </div><!-- End Page Wrapper -->
</body>
<div id="legend" style="background:#FFF; padding:10px; border:2px solid black; margin:5px; display: none; border-color:#FF0000"><font size="3" color="#0000CC">Keterangan</font></div>
</html>
