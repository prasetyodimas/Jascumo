<?php 
	if (empty($_SESSION['id_user'])) {
		$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
		header('location: ./');
		die();
	}else{
		if (isset($_REQUEST['aksi'])) {
			$aksi = $_REQUEST['aksi'];
			switch ($aksi) {
				case 'baru':
					include 'ongjemput_baru.php';
					break;
				case 'edit':
					include 'ongjemput_edit.php';
					break;
				case 'hapus':
					include 'ongjemput_hapus.php';
					break;
			}
?>
<?php }else{ ?>
<div class="container">
	<div class="col-md-12">
		<div class="heading-katemobil">
			<h3>Ongkos Jemput</h3>
			<a href="./admin.php?hlm=ongjemput_baru&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kategori Mobil</a>
		</div>
		<div class="clearfix form-group"></div>
	<table class="table table-bordered table-hover">
	 <thead>
	   <tr class="info">
		 <th width="5%">No</th>
		 <th width="22%">Nama Wilayah / Kecamatan</th>
		 <th width="20%">Biaya Jemput</th>
		 <th width="10%">Aksi</th>
	   </tr>
	 </thead>
	 <tbody>
	 	<?php
	 		$getOngkosJemput = mysqli_query($db_con,"SELECT * FROM biaya_jemput");
 			if (mysqli_num_rows($getOngkosJemput) > 0) {
 				$no= 0;
 				while ($res=mysqli_fetch_array($getOngkosJemput)) {
 					$no++;
	 	 ?>
	 	<tr>
	 		<td><?php echo $no;?></td>
	 		<td><?php echo $res['nama_wilayah'];?></td>
	 		<td>Rp.<?php echo formatuang($res['biaya_jemput']);?></td>
	 		<td>
				<a href="?hlm=ongjemput&aksi=edit&id_biayajemput=<?php echo $res['id_biayajemput'];?>" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
				<a href="?hlm=ongjemput&aksi=hapus&submit=yes&id_biayajemput=<?php echo $res['id_biayajemput'];?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
	 		</td>
	 		<?php } ?>
	 	<?php }else{ ?>
	 		<td>Belum Ada Data</td>
	 	</tr>
	 	<?php } ?>
	 </tbody>
	</table>	
	</div>
</div>
<script type="text/javascript">
  	function konfirmasi(){
	  	tanya = confirm("Anda yakin akan menghapus user ini?");
	  	if (tanya == true){
	  		return true;
	  	}else{
	  		return false;
	  	} 
	}
</script>
<?php } } ?>