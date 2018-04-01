<?php include '../helpers/generate_code.php';
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){

		$id_layanan    = $_REQUEST['kode_layanan'];
		$jenis_layanan = $_REQUEST['jenis_layanan'];
		$harga_layanan = $_REQUEST['harga_layanan'];

		$sql = mysqli_query($db_con, "INSERT INTO layanan(
									  id_layanan, jenis_layanan, harga_layanan) VALUES('$id_layanan','$jenis_layanan', '$harga_layanan')");

		if($sql == true){
			header('Location: ./admin.php?hlm=biaya_layanan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Master Layanan</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kode_layanan" class="col-sm-2 control-label">Kode Layanan</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="kode_layanan" value="LYN<?php echo generatorStr(3); ?>" name="kode_layanan" placeholder="Kode Layanan" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Layanan</label>
		<div class="col-sm-4">
			<select name="jenis_layanan" class="form-control" required="">
				<option value="">Pilih</option>
				<option value="Cuci Mobil">Cuci Mobil</option>
				<option value="Cuci Mobil + Wax">Cuci Mobil + Wax</option>
				<option value="Poles Body">Poles Body</option>
				<option value="Poles Jamur Kaca">Poles Jamur Kaca</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Biaya Jasa</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="harga_layanan" name="harga_layanan" placeholder="Biaya Jasa" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=biaya_layanan" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
