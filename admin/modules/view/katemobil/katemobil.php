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
	<table class="table table-bordered table-hover" style="width:100%;" id="tables-katemobil">
	 <thead>
	   <tr class="info">
		 <th>No</th>
		 <th>Merek Mobil</th>
		 <th>Nama Mobil</th>
		 <th>Ukuran</th>
		 <th>Keterangan</th>
		 <th class="col-sm-2">Aksi</th>
	   </tr>
	 </thead>
	 <tbody>
	 	<?php
	 		$no= 1;
	 		$getTypeMobil = mysqli_query($db_con,"SELECT * FROM tipe_mobil tm 
	 											  JOIN merek_mobil mm on tm.id_merek_mobil=mm.id_merek_mobil 
	 										      ORDER BY nama_mobil ASC");
	 		while ($res=mysqli_fetch_array($getTypeMobil)) {
	 	 ?>
	 	<tr>
	 		<td><?php echo $no;?></td>
	 		<td><?php echo $res['nama_kendaraan'];?></td>
	 		<td><?php echo $res['nama_mobil'];?></td>
	 		<td><?php echo $res['ukuran_mobil'];?></td>
	 		<td><?php echo $res['keterangan'];?></td>
	 		<td>
				<a href="?hlm=katemobil&aksi=edit&id_tipe_mobil=<?php echo $res['id_tipe_mobil'];?>" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
				<a href="?hlm=katemobil&aksi=hapus&submit=yes&id_tipe_mobil=<?php echo $res['id_tipe_mobil'];?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
	 		</td>
	 	</tr>
	 	<?php $no++; }?>
	 </tbody>
	</table>	
	</div>
</div>
<style type="text/css">
	.dataTables_filter {
		margin-left: 25em;
	}
	#tables-katemobil_paginate{
		margin-left: 34em;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tables-katemobil').DataTable();
	});
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