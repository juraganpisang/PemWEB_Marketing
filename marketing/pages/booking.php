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
<style type="text/css">
  .pesan{
    display: none;
    color: black; 
    margin: 10px;
  }
</style>
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
      <div id="tampil">
      </div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <?php 
        include '../koneksi.php';
        if(isset($_GET['kode_booking'])){
          $kode_booking = $_GET['kode_booking'];
          $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE kode_booking='".$kode_booking."' AND status = 0") or die(mysqli_error());
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

      <form action="booking.php" role="form" method="GET">
        <h2>Kode Booking</h2>
        <div class="row" style="margin-bottom:20px;">
          <div class="col-md-12">
            <input name="kode_booking" type="text" class="form-control">
            <br>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary pull-right"> Cari</button>
            </div>
          </div>
        </div>
      </form>
      <!-- form start -->
      <form class="form-data" method="POST">
        <!-- BEDA KONTEN -->
        <div class="row">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3>Data Booking</h3>
              </div>
              <!-- /.box-header -->
              <?php 
              include '../koneksi.php';
              if(isset($_GET['kode_booking'])){
                $kode_booking = $_GET['kode_booking'];
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE kode_booking='".$kode_booking."' AND status = 0") or die(mysqli_error());
                while($hasil = mysqli_fetch_array($data)){
                ?>
                  <div class="box-body">
                    <div class="form-group">
                      <input type="hidden" name="kode_booking" value="<?php echo $hasil['kode_booking'] ?>">
                      <input type="hidden" name="id_pembeli" value="<?php echo $hasil['id_pembeli'] ?>">
                      <label>NIK</label>
                      <input id="nik" name="nik" type="text" class="form-control" placeholder="Masukkan NIK" value="<?php echo $hasil['no_ktp'];?>">
                      <br>
                      <label>Nama Lengkap</label>
                      <input id="nama" name="nama"type="text" class="form-control" placeholder="Masukkan Nama" value="<?php echo $hasil['nama'];?>">
                      <br>
                      <label>Jenis Kelamin</label>
                      <br>
                      <input type="radio" name="jk" value="Laki - Laki"checked> Laki - Laki &nbsp;&nbsp;&nbsp;
                      <input type="radio" name="jk" value="Perempuan"> Perempuan
                      <br>
                      <br>
                      <label>Alamat</label>
                      <input id="alamat" name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat">
                      <br>
                      <label>No. Hp</label>
                      <input id="no_hp" name="no_hp"type="text" class="form-control" placeholder="Masukkan No Hp" value="<?php echo $hasil['no_hp'];?>">
                      <br>
                      <label>E-mail</label>
                      <input id="email" name="email"type="text" class="form-control" placeholder="Masukkan Email">
                      <br>
                      <label>Pilih Rumah</label>
                      <input name="pilih_rumah" class="form-control" value="<?php echo $hasil['kode_rumah'];?>" readonly=true>
                      <br>
                      <?php
                      $data_harga = mysqli_query($koneksi, "SELECT tbl_harga.harga from tbl_harga, tbl_rumah WHERE tbl_rumah.kode_rumah='".$hasil['kode_rumah']."' AND tbl_rumah.id_harga = tbl_harga.id_harga") or die(mysqli_error());
                      while($hasil_harga = mysqli_fetch_array($data_harga)){
                        ?>
                        <label>Harga Rumah</label>
                        <input id="harga" name="harga" class="form-control" value="<?php echo $hasil_harga['harga'] ?>" readonly="true">
                        <br>
                      <?php } ?>
                      <label>Metode Pembayaran</label>
                      <br>
                      <input type="radio" id="cek1" name="radio_metode" value="Kontan" onclick="document.getElementById('teks').disabled = false, document.getElementById('selek').disabled = true"> Kontan
                      <input onkeyup="cek()" type="text" id="teks" name="metode_pem" class="form-control" placeholder="Masukkan Jumlah Pembayaran" onclick="document.getElementById('teks').disabled = false, document.getElementById('selek').disabled = true, document.getElementById('cek1').checked = true">
                      <span class="pesan pesan-harga">Maaf, Uang Anda Kurang!</span>
                      <br>
                      <?php
                      $data_harga = mysqli_query($koneksi, "SELECT tbl_harga.harga from tbl_harga, tbl_rumah WHERE tbl_rumah.kode_rumah='".$hasil['kode_rumah']."' AND tbl_rumah.id_harga = tbl_harga.id_harga") or die(mysqli_error());
                      while($hasil_harga = mysqli_fetch_array($data_harga)){
                        $duaBelas = ($hasil_harga['harga']/12 + ($hasil_harga['harga']*0.003));
                        $duaPuluhEmpat = $hasil_harga['harga']/24 + ($hasil_harga['harga']*0.005);
                        $tigaPuluhEnam = $hasil_harga['harga']/36 + ($hasil_harga['harga']*0.01); 
                        ?>
                        <input type="radio" id="cek2" name="radio_metode" value="Cicil" onclick="document.getElementById('teks').disabled = true, document.getElementById('selek').disabled = false"> Cicil
                        <select name="metode_pem" id="selek" class="form-control" onclick="document.getElementById('cek2').checked = true, document.getElementById('teks').disabled = true">
                          <option>-</option>
                          <option value="12">12 kali |  Bunga 0,3%   | Rp. <?php echo ceil($duaBelas); ?></option>
                          <option value="24">24 kali |  Bunga 0,5%   | Rp. <?php echo ceil($duaPuluhEmpat); ?></option>
                          <option value="36">36 kali |  Bunga 1% | Rp. <?php echo ceil($tigaPuluhEnam); ?></option>
                        </select>
                        <?php
                      }
                      ?>
                      <br>

                      <!-- /.box-body -->
                      <div class="box-footer">
                        <a class="btn btn-info pull-right" id="tombol">Simpan</a>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
                <?php
              }
            }
            ?>
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

    <script src="../plugins/jquery/jquery-1.11.3.min.js"></script>
    <script src="../plugins/jquery/jquery-migrate-1.2.1.js"></script>
    <script src="../plugins/jquery/jquery.ui.totop.js"></script>
    <script src="../plugins/jquery/jquery.easing.1.3.js"></script>
    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- Page script -->
    <script>

     $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    //$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Today'       : [moment(), moment()],
        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<!-- Duit lek Kurang -->
<script type="text/javascript">
  function cek(){
    var kontan = document.getElementById("teks");
    var harga = document.getElementById("harga");
    if(kontan.value != harga.value){
      $(".pesan-harga").css('display','block');
    }else{
      $(".pesan-harga").hide();
    }
  }
</script>
<!-- Pemrosesan Form -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#tombol").click(function(){
      var nama = $("#nama").val();
      var nik = $("#nik").val();
      var alamat = $('#alamat').val();  
      var no_hp = $('#no_hp').val();
      var email = $('#email').val();
      var kontan = document.getElementById("teks");
      var harga = document.getElementById("harga");

      if(nik == ""){     
        alert("NIK Tidak Boleh Kosong!");
      }else if(nama == ""){     
        alert("Nama Tidak Boleh Kosong!")
      }else if(alamat == ""){     
        alert("Alamat Tidak Boleh Kosong!");
      }else if(no_hp == ""){     
        alert("Nomor HP Tidak Boleh Kosong!");
      }else if(email == ""){        
        alert("Email Tidak Boleh Kosong!");
      }else{

        if(kontan.value != 0){
          if(kontan.value != harga.value){
            alert("Maaf, Uang Anda Kurang!");
          }else{
            var data = $('.form-data').serialize();
            $.ajax({
             type: 'POST',
             url: 'proses/insert.php',
             data: data,
             success: function(data){
               $('.content-header').remove(),
               <?php 
               include '../koneksi.php';
               if(isset($_GET['kode_booking'])){
                $kode_booking = $_GET['kode_booking'];
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE kode_booking='".$kode_booking."' AND status = 0") or die(mysqli_error());
                while($hasil = mysqli_fetch_array($data)){
                  ?>
                  $('#tampil').load('proses/tampildata.php?kode_booking=<?php echo $hasil['kode_booking']; ?>')
                  <?php
                }
              }
              ?>
            }
          });
          }
        }else{

          var data = $('.form-data').serialize();
          $.ajax({
           type: 'POST',
           url: 'proses/insert.php',
           data: data,
           success: function(data){
             $('.content-header').remove(),
             <?php 
             include '../koneksi.php';
             if(isset($_GET['kode_booking'])){
              $kode_booking = $_GET['kode_booking'];
              $data = mysqli_query($koneksi, "SELECT * FROM tbl_pembeli WHERE kode_booking='".$kode_booking."' AND status = 0") or die(mysqli_error());
              while($hasil = mysqli_fetch_array($data)){
                ?>
                $('#tampil').load('proses/tampildata.php?kode_booking=<?php echo $hasil['kode_booking']; ?>')
                <?php
              }
            }
            ?>
          }
        });
        }
      }
    });
  });
</script>
</body>
</html>
