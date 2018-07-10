<?php include '../helpers/generate_code.php';
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{
	if(isset($_REQUEST['submit'])){
		$id_tipe_mobil  = $_REQUEST['kode_tipemobil'];
		$nama_mobil 	= strtoupper($_REQUEST['nama_mobil']);
		$id_merek_mobil  = $_REQUEST['id_merek_mobil'];
		$ukuran_mobil 	= $_REQUEST['ukuran_mobil'];
		$keterangan 	= $_REQUEST['keterangan'];
		$join_kodeStr   = $id_tipe_mobil.'-'.$nama_mobil;

		$sql = mysqli_query($db_con, "INSERT INTO tipe_mobil(id_tipe_mobil , id_merek_mobil ,nama_mobil, ukuran_mobil, keterangan)
									  VALUES('$join_kodeStr', '$id_merek_mobil', '$nama_mobil', '$ukuran_mobil','$keterangan')");
		if($sql == true){
			echo "<script>alert('success menambah data master kategori mobil !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=katemobil>";
		}else{
			echo "<script>alert('gagal menambah data master kategori mobil !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=katemobil>";
		}
	} else {
?>
<h2>Tambah Kategori Mobil</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Kode Kendaraan</label>
		<div class="col-sm-4">
			<!-- <input type="text" class="form-control" id="mobile_name" name="nama_mobil" placeholder="Jenis Kendaraan" required> -->
			<input type="text" class="form-control" id="mobile_name" value="<?php echo generatorStr(3); ?>" name="kode_tipemobil" placeholder="Jenis Kendaraan" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Merek Kendaraan</label>
		<div class="col-sm-4">
			<select name="id_merek_mobil" class="form-control" id="" required>
				<option value="">Pilih</option>
				<?php
					$getQuery = mysqli_query($db_con,"SELECT * FROM merek_mobil");
					while ($data = mysqli_fetch_array($getQuery)) {
						echo "<option value='".$data['id_merek_mobil']."'>".$data['nama_kendaraan']."</option>";
				 	}
				 ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="nama_mobil" class="col-sm-2 control-label">Nama Kendaraan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="mobile_name" name="nama_mobil" placeholder="Jenis Kendaraan" required>
		</div>
	</div>
	<div class="form-group">
		<label for="Jenis Kendaraan" class="col-sm-2 control-label">Ukuran Kendaraan</label>
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
		<label for="nama_mobil" class="col-sm-2 control-label">Keterangan</label>
		<div class="col-sm-4">
			<textarea name="keterangan" class="form-control"></textarea>
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