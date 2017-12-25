<?php
if (empty($_SESSION['id_user'])) {
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('location:./');
	die();
}else{
	$aksi = $_REQUEST['aksi'];
	switch ($aksi) {
		case 'baru':
			include "ongjemput_baru.php";
			break;
		case 'edit':
			include "ongjemput_edit.php";
			break;
		case 'hapus':
			include "ongjemput_hapus.php";
			break;
	}
?>
<?php }else{ ?>
<div class="container">
	<div class="col-lg-12">
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
	</div>
</div>
<?php } ?>