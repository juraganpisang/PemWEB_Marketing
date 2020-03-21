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
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Griya Intan Permai</b>
    <br><small>Perumahan Ekslusif</small>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Pendaftaran Akun Baru</p>
	<?php 
		if(isset($_GET['pesan'])){
			$pesan = $_GET['pesan'];
			if($pesan == "berhasil"){
		?>
		<p class="login-box-msg" style="color:green;"><b>Akun Berhasil Dibuat</b></p>
		<?php
			}
			if($pesan == "gagal"){
		?>
		<p class="login-box-msg" style="color:red;"><b>Akun Gagal Dibuat, Username telah digunakan</b></p>
		<?php	
			}
		}
		?>
    <form action="proses/daftar.php" method="post">
      <div class="form-group has-feedback">
        <input onkeyup="cek()" name="username" id="username" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input onkeyup="cek()" id="pass" name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input onkeyup="cek()" id="passConfirm" type="password" class="form-control" placeholder="Pencocokan Password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button id="daftar" type="submit" class="btn btn-primary btn-block btn-flat" disabled>Daftar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="../index.php" class="text-center">Sudah Punya Akun</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
	function cek() {
	  var username = document.getElementById("username");
	  var pass = document.getElementById("pass");
	  var passConfirm = document.getElementById("passConfirm");
	  var btn = document.getElementById("daftar");
	  if(username.value != "") {
		  if(pass.value != "") {
			  if(passConfirm.value != ""){
				  if(pass.value == passConfirm.value){
					  btn.disabled = false;
				  } else {
					  btn.disabled = true;
				  }
			  } else {
				  btn.disabled = true;
			  }
		  } else {
			  btn.disabled = true;
		  }
	  } else {
		  btn.disabled = true;
	  }
	}
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
