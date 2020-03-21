<?php 
include '../../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($koneksi, "INSERT INTO tbl_user(username, password) VALUES ('".$username."','".$password."')");
if($query){
	header("location:../daftar.php?pesan=berhasil");
}else{
	header("location:../daftar.php?pesan=gagal");
}
?>