<?php
    include '../../koneksi.php';

    $kode_booking = $_POST['kode_booking'];
    $id_pembeli = $_POST['id_pembeli'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $harga = $_POST['harga'];
    $metode_pem = $_POST['metode_pem'];

    if($metode_pem == 12){
        $cicilan = $metode_pem;
        $nominal_cicilan = ($harga/12 + ($harga*0.003));
        $metode_bayar = 2;
    }else if($metode_pem == 24){
        $cicilan = $metode_pem;
        $nominal_cicilan = ($harga/24 + ($harga*0.005));
        $metode_bayar = 2;
    }else if($metode_pem ==36){
        $cicilan = $metode_pem;
        $nominal_cicilan = ($harga/36 + ($harga*0.01));
        $metode_bayar = 2;
    }else{
        $cicilan = 0;
        $nominal_cicilan = 0;
        $metode_bayar = 1;
        $kontan = $metode_pem;
    }

    $query = mysqli_query($koneksi, "UPDATE tbl_pembeli SET
        nama = '".$nama."',
        no_ktp = '".$nik."', 
        jenis_kelamin = '".$jk."', 
        alamat = '".$alamat."', 
        no_hp = '".$alamat."', 
        email = '".$email."', 
        harga_rumah = '".$harga."', 
        metode_bayar = '".$metode_bayar."', 
        cicilan = '".$cicilan."',
        nominal_cicilan = '".$nominal_cicilan."', 
        kontan = '".$kontan."',
        status = 1 
        WHERE 
        tbl_pembeli.id_pembeli = '".$id_pembeli."'");

    if($query){
        echo 'DATA BERHASIL';
    }else{
        echo mysqli_error($koneksi);;
    }
?>