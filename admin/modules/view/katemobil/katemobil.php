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
					include 'katemobil_baru.php';
					break;
				case 'edit':
					include 'katemobil_edit.php';
					break;
				case 'hapus':
					include 'katemobil_hapus.php';
					break;
			}

	
?>
<?php }else{ ?>
<div class="container">
	<div class="col-md-12">
		<div class="heading-katemobil">
			<h3>Kategori Mobil</h3>
			<a href="./admin.php?hlm=katemobil&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Kategori Mobil</a>
		</div>
		<div class="clearfix form-group"></div>
	<table class="table table-bordered table-hover">
	 <thead>
	   <tr class="info">
		 <th width="5%">No</th>
		 <th width="22%">Tipe Mobil</th>
		 <th width="20%">Ukuran</th>
		 <th width="10%">Aksi</th>
	   </tr>
	 </thead>
	 <tbody>
	 	<?php
	 		$no= 1;
	 		$getTypeMobil = mysqli_query($db_con,"SELECT * FROM tipe_mobil");
	 		while ($res=mysqli_fetch_array($getTypeMobil)) {
	 	 ?>
	 	<tr>
	 		<td><?php echo $no;?></td>
	 		<td><?php echo $res['nama_mobil'];?></td>
	 		<td><?php echo $res['ukuran_mobil'];?></td>
	 		<td>
				<a href="?hlm=katemobil&aksi=edit&id_tipemobil=<?php echo $res['id_tipemobil'];?>" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
				<a href="?hlm=katemobil&aksi=hapus&submit=yes&id_tipemobil=<?php echo $res['id_tipemobil'];?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
	 		</td>
	 	</tr>
	 	<?php $no++; }?>
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