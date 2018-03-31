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
	}else{
?>
<div class="container">
	<div class="col-md-12">
		<div class="heading-katemobil">
			<h3>Ongkos Jemput</h3>
			<a href="./admin.php?hlm=ongjemput&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Ongkos Jemput</a>
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
			$no= 1;
	 		$getOngkosJemput = mysqli_query($db_con,"SELECT * FROM ongkos_jemput");
			while ($res=mysqli_fetch_array($getOngkosJemput)) {
	 	 ?>
	 	<tr>
	 		<td><?php echo $no;?></td>
	 		<td><?php echo $res['nama_wilayah'];?></td>
	 		<td>Rp.<?php echo formatuang($res['biaya_jemput']);?></td>
	 		<td>
				<a href="?hlm=ongjemput&aksi=edit&id_ongkos=<?php echo $res['id_ongkos'];?>" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
				<a href="?hlm=ongjemput&aksi=hapus&submit=yes&id_ongkos=<?php echo $res['id_ongkos'];?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
	 		</td>
	 	</tr>
	 	<?php $no++; } ?>
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