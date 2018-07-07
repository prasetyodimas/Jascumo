<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){

		$id_merek_mobil  = $_REQUEST['id_merek_mobil'];
		$nama_kendaraan  = $_REQUEST['nama_kendaraan'];

		$sql = mysqli_query($db_con, "UPDATE merek_mobil SET id_merek_mobil='$id_merek_mobil', nama_kendaraan='$nama_kendaraan' 
								      WHERE id_merek_mobil='$id_merek_mobil'");

		if($sql == true){
			header('Location: ./admin.php?hlm=merekmobil');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_merek_mobil = $_REQUEST['id_merek_mobil'];
		$sql = mysqli_query($db_con, "SELECT * FROM merek_mobil WHERE id_merek_mobil='$id_merek_mobil'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Merek Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Kode Mobil</label>
		<div class="col-sm-4">
			<input type="hidden" name="id_merek_mobil" value="<?php echo $row['id_merek_mobil']; ?>">
			<input type="text" name="id_merek_mobil" class="form-control" id="id_merek_mobil" value="<?php echo $row['id_merek_mobil']; ?>" placeholder="Kode Kendaraan" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Nama Mobil</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama_kendaraan" value="<?php echo $row['nama_kendaraan']; ?>" name="nama_kendaraan" placeholder="Nama Mobil" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=merekmobil" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } } ?>
