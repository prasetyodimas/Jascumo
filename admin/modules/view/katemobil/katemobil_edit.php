<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){

		$id_tipe_mobil  = $_REQUEST['id_tipe_mobil'];
		$nama_mobil 	= $_REQUEST['nama_mobil'];
		$ukuran_mobil 	= $_REQUEST['ukuran_mobil'];

		$sql = mysqli_query($db_con, "UPDATE tipe_mobil SET id_tipe_mobil='$id_tipe_mobil', nama_mobil='$nama_mobil' , ukuran_mobil='$ukuran_mobil' WHERE id_tipe_mobil='$id_tipe_mobil'");

		if($sql == true){
			header('Location: ./admin.php?hlm=katemobil');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_tipe_mobil = $_REQUEST['id_tipe_mobil'];
		$sql = mysqli_query($db_con, "SELECT * FROM tipe_mobil WHERE id_tipe_mobil='$id_tipe_mobil'");
		while($row = mysqli_fetch_array($sql)){

?>
<h2>Edit Kategori Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Kode Mobil</label>
		<div class="col-sm-4">
			<input type="hidden" name="id_total" value="<?php echo $row['id_tipe_mobil']; ?>">
			<input type="text" name="id_tipe_mobil" class="form-control" id="id_tipe_mobil" value="<?php echo $row['id_tipe_mobil']; ?>" placeholder="Kode Kendaraan" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Nama Mobil</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nama_mobil" value="<?php echo $row['nama_mobil']; ?>" name="nama_mobil" placeholder="Nama Mobil" required>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Ukuran Kendaraan</label>
		<div class="col-sm-3">
			<select name="ukuran_mobil" class="form-control" id="ukuran_mobil" required>
				<option value="">Pilih</option>
				<option value="Kecil">Kecil</option>
				<option value="Sedang">Sedang</option>
				<option value="Besar">Besar</option>
			</select>
			<!-- <input type="text" class="form-control" id="ukuran" value="<?php echo $row['nama_mobil']; ?>" name="ukuran" placeholder="Mobil" required> -->
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=katemobil" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } } ?>
