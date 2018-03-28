<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

	if(isset($_REQUEST['submit'])){

		$id_member 		= $_REQUEST['id_member'];
		$nama_lengkap   = $_REQUEST['nama_lengkap'];
		$email_member   = $_REQUEST['email_member'];
		$notelp_member  = $_REQUEST['notelp_member'];
		$alamat_member  = $_REQUEST['alamat_member'];

		$sql = mysqli_query($db_con, "INSERT INTO member
												 (id_member, 
												 nama_lengkap, 
												 email_member, 
												 notelp_member, 
												 alamat_member)
									  	VALUES 	('$id_member', 
									  		 	'$nama_lengkap',
									  		 	'$email_member',
									  		 	'$notelp_member',
									  		 	'$alamat_member')");
		if($sql == true){
			header('Location: ./admin.php?hlm=biaya');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Master Member</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama_lengkap" class="col-sm-2 control-label">Nama Lengkap</label>
		<div class="col-sm-3">
			<input type="text" name="nama_lengkap" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Email </label>
		<div class="col-sm-3">
			<input type="text" name="email_member" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Notelp </label>
		<div class="col-sm-3">
			<input type="text" name="notelp_member" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label">Alamat </label>
		<div class="col-sm-3">
			<input type="text" name="alamat_member" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=member" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
