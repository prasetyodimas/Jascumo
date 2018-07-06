<?php
if(empty($_SESSION['id_user'])){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

if(isset($_REQUEST['submit'])){
		$id_ongkos    		= $_REQUEST['id_ongkos'];
		$nama_wilayah  	    = $_REQUEST['nama_wilayah'];
		$biaya_jemput   	= $_REQUEST['biaya_jemput'];

		$update_sql = "UPDATE ongkos_jemput SET nama_wilayah='$nama_wilayah', biaya_jemput='$biaya_jemput' WHERE id_ongkos='$_GET[id_ongkos]'";
		$sql = mysqli_query($db_con, $update_sql);
		if($sql == true){
			header('Location: ./admin.php?hlm=ongjemput');
			die();
		}else{
			echo 'ERROR! Periksa penulisan querynya.';
		}
	}else{

		$id_ongkos = $_REQUEST['id_ongkos'];

		$sql = mysqli_query($db_con, "SELECT * FROM ongkos_jemput WHERE id_ongkos='$id_ongkos'");
		while($row = mysqli_fetch_array($sql)){
?>
<div class="container">
	<div class="col-lg-12">
		<h2>Edit Ongkos Jemput </h2>
		<hr>
		<form method="post" action="" class="form-horizontal" role="form">
			<input type="hidden" name="id_ongkos" value="<?php echo $id_ongkos ?>">
			<div class="form-group">
				<label for="nama_wilayah" class="col-sm-2 control-label">Nama Wilayah</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="" name="nama_wilayah" placeholder="Nama Wilayah" required value="<?php echo $row['nama_wilayah'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="Jenis Kendaraan" class="col-sm-2 control-label">Biaya Jemput</label>
				<div class="col-sm-3">
					<input type="number" name="biaya_jemput" class="form-control" required value="<?php echo $row['biaya_jemput'] ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" name="submit" class="btn btn-success">Simpan</button>
					<a href="./admin.php?hlm=ongjemput" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
	</div>
</div>
<?php } } } ?>