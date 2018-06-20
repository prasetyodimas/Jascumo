<?php include '../helpers/generate_code.php';
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{
	if(isset($_REQUEST['submit'])){
		$id_merek_mobil  = $_REQUEST['kode_tipemobil'];
		$nama_kendaraan  = strtoupper($_REQUEST['nama_kendaraan']);
		$join_kodeStr    = $id_merek_mobil.'-'.$nama_kendaraan;


		$sql = mysqli_query($db_con, "INSERT INTO merek_mobil(id_merek_mobil ,nama_kendaraan)
									  VALUES('$join_kodeStr','$nama_kendaraan')");

		if($sql == true){
			header('Location: ./admin.php?hlm=merekmobil');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Merek Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Kode Kendaraan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="mobile_name" value="<?php echo generatorStr(3); ?>" name="kode_tipemobil" placeholder="Jenis Kendaraan" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Merek Kendaraan</label>
		<div class="col-sm-4">
			<input type="text" name="nama_kendaraan" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=katemobil" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } ?>