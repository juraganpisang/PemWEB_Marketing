<?php 
include "../koneksi.php";
session_start();
if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Griya Intan Permai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>G</b>IP</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>G</b><span>riya Intan Permai</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="user-menu">
              <a href="#">
                <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu Utama</li>
          <li>
            <a href="booking.php">
              <i class="fa fa-newspaper-o"></i> <span>Booking</span>
            </a>
          </li>
          <li>
            <a href="data_pembeli.php">
              <i class="fa fa-th"></i> <span>Data Pembeli</span>
            </a>
          </li>
          <li>
            <a href="../logout.php">
              <i class="fa fa-sign-out"></i> <span>Keluar</span>
            </a>
          </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <?php 
        include '../koneksi.php';
        if(isset($_GET['kode_booking'])){
          $kode_booking = $_GET['kode_booking'];
          $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE kode_booking='".$kode_booking."'") or die(mysqli_error());
          while ($hasil = mysqli_fetch_array($data)) {
            if($hasil){//$hasil['kode_booking'] == $kode_booking
              ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Data Berhasil Ditemukan!</h4>
              </div>
              <?php
          }else{
            ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Data gagal Ditemukan!</h4>
              </div>
              <?php 
            }
      }
      }
        ?>

        
        <!-- form start -->
        <form action="proses/insert.php" role="form" method="post" enctype="multipart/form-data">
          <!-- BEDA KONTEN -->
          <div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
              <div class="box-header">
              <h3>Data Pembeli</h3>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO</th>
                  <th>NIK</th>
                  <th>NAMA</th>
                  <th>JENIS KELAMIN</th>
                  <th>ALAMAT</th>
                  <th>NOMOR HANDPHONE</th>
                  <th>TANGGAL PEMBELIAN</th>
                  <th>NOMOR RUMAH</th>
                  <th>HARGA RUMAH</th>
                  <th>METODE BAYAR</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                include '../koneksi.php';
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli") or die(mysqli_error());
                while($hasil = mysqli_fetch_array($data)){
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                      <?php
                        echo $hasil['no_ktp'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['nama'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['jenis_kelamin'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['alamat'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['no_hp'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['date'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['kode_rumah'];
                      ?>
                    </td>
                    <td>
                      <?php
                        echo $hasil['harga_rumah'];
                      ?>
                    </td>
                    <td>
                      <?php
                        if($hasil['metode_bayar'] == 1){
                          echo "KONTAN";
                        }else{
                          echo "CICIL";
                        }
                      ?>
                    </td>
                  </tr>
                <?php
                $no++;
                }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
            </section>
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2019</strong>
          </footer>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>
        <!-- Page script -->
        <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
