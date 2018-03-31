<?php
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

	if(isset($_REQUEST['submit'])){
		$username 	  = $_REQUEST['username'];
		$name_userlog = $_REQUEST['name_userlog'];
		$password 	  = MD5($_REQUEST['password']);
		$alamat   	  = $_REQUEST['alamat'];
		$hp 	  	  = $_REQUEST['nomer_hp'];
		$level_acces  = $_REQUEST['level_acces'];
		$created_at   = date('y-m-d H:i:s');
		$update_at    = date('y-m-d H:i:s');

		$sql = mysqli_query($db_con, "INSERT INTO user (username, 
														name_userlog, 
														password, 
														level_acces,
														handphone, 
														alamat,
														created_at,
														update_at 
														) VALUES
														('$username',
														 '$name_userlog',
														 '$password',
														 '$level_acces', 
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
			<input type="text" class="form-control" id="nama" name="name_userlog" placeholder="Nama User" required>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-6">
			<textarea class="form-control" name="alamat" rows="4" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor HP</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="hp" name="nomer_hp" placeholder="Nomor HP" required>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-3">
			<select name="level_acces" class="form-control" required>
				<option value="">Pilih Jenis User</option>
				<option value="1">Admin</option>
				<option value="2">Pimpinan / Manager</option>
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