<?php
if (empty($_SESSION['id_user'])) {
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('location:./');
	die();
}else{
	if (isset($_REQUEST['submit'])) {
		$nama_wilayah = $_REQUEST['nama_wilayah'];
		$biaya_jemput = $_REQUEST['biaya_jemput'];

		$sql = mysqli_query($db_con, "INSERT INTO ongkos_jemput(nama_wilayah, biaya_jemput) VALUES('$nama_wilayah', '$biaya_jemput')");

		if($sql == true){
			header('Location: ./admin.php?hlm=ongjemput');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	}else{
?>	
<div class="container">
	<div class="col-lg-12">
		<h2>Tambah Ongkos Jemput </h2>
		<hr>
		<form method="post" action="" class="form-horizontal" role="form">
			<div class="form-group">
				<label for="nama_wilayah" class="col-sm-2 control-label">Nama Wilayah</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="" name="nama_wilayah" placeholder="Nama Wilayah" required>
				</div>
			</div>
			<div class="form-group">
				<label for="Jenis Kendaraan" class="col-sm-2 control-label">Biaya Jemput</label>
				<div class="col-sm-3">
					<input type="number" name="biaya_jemput" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="submit" class="btn btn-success">Simpan</button>
					<a href="./admin.php?hlm=katemobil" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php } } ?>
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