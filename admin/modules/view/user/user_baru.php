<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

	if(isset($_REQUEST['submit'])){
		$username 	  = $_REQUEST['username'];
		$nama_user 	  = $_REQUEST['nama_user'];
		$password 	  = MD5($_REQUEST['password']);
		$alamat   	  = $_REQUEST['alamat_user'];
		$hp 	  	  = $_REQUEST['nomer_hp'];
		$level_akses  = $_REQUEST['level_akses'];
		$created_at   = date('y-m-d H:i:s');
		$update_at    = date('y-m-d H:i:s');

		$sql = mysqli_query($db_con, "INSERT INTO user (username, 
														nama_user, 
														password, 
														level_akses,
														nohp_user, 
														alamat_user,
														created_at,
														update_at 
														) VALUES
														('$username',
														 '$nama_user',
														 '$password',
														 '$level_akses', 
														 '$hp',
														 '$alamat', 
														 '$created_at',
														 '$update_at')");
		if($sql == true)
		{
			header('Location: ./admin.php?hlm=user');
			die();
		}else
		{
			echo 'ERROR! Periksa penulisan querynya.';
		}
	}else{
?>
<h2>Tambah User Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">Password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" id="username" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama User</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" name="nama_user" placeholder="Nama User" required>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-6">
			<textarea class="form-control" name="alamat_user" rows="4" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor HP</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="hp" name="nomer_hp" placeholder="Nomor HP" required>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-3">
			<select name="level_akses" class="form-control" required>
				<option value="">Pilih Jenis User</option>
				<option value="0">Admin</option>
				<option value="1">Pimpinan / Manager</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=user" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } ?>