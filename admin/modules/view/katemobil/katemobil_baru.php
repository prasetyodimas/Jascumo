<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{
	if(isset($_REQUEST['submit'])){

		$nama_mobil = $_REQUEST['nama_mobil'];
		$ukuran_mobil = $_REQUEST['ukuran_mobil'];

		$sql = mysqli_query($db_con, "INSERT INTO tipe_mobil(nama_mobil, ukuran_mobil) VALUES('$nama_mobil', '$ukuran_mobil')");

		if($sql == true){
			header('Location: ./admin.php?hlm=katemobil');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Kategori Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Jenis Kendaraan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="mobile_name" name="nama_mobil" placeholder="Jenis Kendaraan" required>
		</div>
	</div>
	<div class="form-group">
		<label for="Jenis Kendaraan" class="col-sm-2 control-label">Tipe Kendaraan</label>
		<div class="col-sm-3">
			<select name="ukuran_mobil" class="form-control" required>
				<option value="">Pilih</option>
				<option value="Kecil">Kecil</option>
				<option value="Sedang">Sedang</option>
				<option value="Besar">Besar</option>
			</select>
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