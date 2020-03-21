
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
<?php 
include '../../koneksi.php';
?>
<div class="content-wrapper" style="margin: auto;padding-bottom: 20px;">
	<section class="content-header">
		<div class="box box-primary" style="padding-left: 30px;padding-bottom: 40px;">
			<h3>DETAIL PESANAN ANDA</h3>
			<?php
			if(isset($_GET['kode_booking'])){
				$kode_booking = $_GET['kode_booking'];
				$sql = mysqli_query($koneksi , "SELECT * FROM tbl_pembeli WHERE kode_booking ='".$kode_booking."'");
				while($cetak = mysqli_fetch_array($sql)){
					?>
					<table>
						<tr>
							<td>Kode Booking </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['kode_booking'];?> </td>
						</tr>
						<tr>
							<td>Tanggal Transaksi </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['date'];?> </td>
						</tr>
						<tr>
							<th>DATA PEMBELI</th>
						</tr>
						<tr>
							<td>NIK </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['no_ktp'];?> </td>
						</tr>
						<tr>
							<td>Nama </td>
							<td>:</td>
							<td> &nbsp &nbsp Yth. <?php echo $cetak['nama'];?> </td>
						</tr>
						<tr>
							<td>Jenis Kelamin </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['jenis_kelamin'];?> </td>
						</tr>
						<tr>
							<td>Nomor Handphone </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['no_hp'];?> </td>
						</tr>
						<br>
						<br>
						<tr>
							<th>DATA RUMAH</th>
						</tr>
						<tr>
							<td>Pilihan Rumah </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['kode_rumah'];?> </td>
						</tr>
						<tr>
							<td>Harga Rumah </td>
							<td>:</td>
							<td> &nbsp &nbsp <?php echo $cetak['harga_rumah'];?> </td>
						</tr>
						<tr>
							<td>Metode Bayar </td>
							<td>:</td>
							<td>
								<?php if ($cetak['metode_bayar'] == 1){
									echo " &nbsp &nbsp Kontan (LUNAS)";
								}else{
									echo " &nbsp &nbsp Cicilan";
								}
								?> 
							</td>
						</tr>
						<?php
						if($cetak['metode_bayar'] == 1){
							?>
							<tr>
								<td>Nominal Kontan </td>
								<td>:</td>
								<td> &nbsp &nbsp Rp. <?php echo $cetak['kontan'];?> </td>
							</tr>
							<?php
						}else{
							?>
							<tr>
								<td>Cicilan </td>
								<td>:</td>
								<td> &nbsp &nbsp <?php echo $cetak['cicilan'];?> kali</td>
							</tr>
							<tr>
								<td>Nominal Cicilan </td>
								<td>:</td>
								<td> &nbsp &nbsp Rp. <?php echo $cetak['nominal_cicilan'];?> </td>
							</tr>
							<?php
						}
						?>
					</table>
					<?php    
				}
			}
			?>
		</div>
	</section>
</div>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>