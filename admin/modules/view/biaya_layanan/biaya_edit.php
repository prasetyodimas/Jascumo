<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){

		$id_layanan    = $_REQUEST['id_layanan'];
		$jenis_layanan = $_REQUEST['jenis_layanan'];
		$harga_layanan = $_REQUEST['harga_layanan'];

		$sql = mysqli_query($db_con, "UPDATE layanan SET jenis_layanan='$jenis_layanan', harga_layanan='$harga_layanan' WHERE id_layanan='$id_layanan'");

		if($sql == true){
			echo "<script>alert('success edit data master biaya layanan!!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=biaya_layanan>";
		} else {
			echo "<script>alert('ERROR! Periksa penulisan querynya!!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=biaya_layanan>";
		}
	} else {

		$id_layanan = $_REQUEST['id_layanan'];

		$sql = mysqli_query($db_con, "SELECT * FROM layanan WHERE id_layanan='$id_layanan'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Master Layanan</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="kode_layanan" class="col-sm-2 control-label">Kode Layanan</label>
		<div class="col-sm-4">
			<input type="text" name="kode_layanan" class="form-control" value="<?php echo $row['id_layanan']; ?>" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis Layanan</label>
		<div class="col-sm-4">
			<input type="hidden" name="id_total" value="<?php echo $row['id_layanan']; ?>">
			<input type="text" name="jenis_layanan" class="form-control" id="jenis_layanan" value="<?php echo $row['jenis_layanan']; ?>" placeholder="Jenis Kendaraan" required>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Biaya Jasa</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="harga_layanan" value="<?php echo $row['harga_layanan']; ?>" name="harga_layanan" placeholder="Biaya Jasa" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=biaya_layanan" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } } ?>
