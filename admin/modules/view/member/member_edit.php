<?php
if(empty($_SESSION['id_user'])){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){
        $id_member 	     =  $_REQUEST['id_member'];
        $nama_member     = $_REQUEST['nama_member'];
        $alamat_member 	 = $_REQUEST['alamat_member'];
        $notelp_member   = $_REQUEST['notelp_member'];
        $password_member = $_REQUEST['notelp_member'];
        $status_member   = $_REQUEST['status_member'];
		$level_acces     = $_REQUEST['level'];

        if($id_user == 1){
            header("location: ./admin.php?hlm=member");
            die();
        }

		$sql = mysqli_query($db_con, "UPDATE member SET id_member='$id_member' WHERE id_member='$id_member'");
		if($sql == true){
			header('Location: ./admin.php?hlm=member');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {

		$id_member = $_REQUEST['id_user'];

		$sql = mysqli_query($db_con, "SELECT * FROM member WHERE id_member='$id_member'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Memmber</h2>
<hr>

<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
        <input type="hidden" name="id_member" value="<?php echo $row['id_member']; ?>">
		<label for="username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" value="<?php echo $row['username']; ?>" name="username" placeholder="Username" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Member</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" value="<?php echo $row['nama_member']; ?>" name="nama_member" placeholder="Nama User" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Jenis User</label>
		<div class="col-sm-3">
			<select name="level" class="form-control" required>
				<option value="">
				<?php
					$level = $row['level_akses'];
					if($level == 1){
						echo 'Admin';
					} else {
						echo 'Pimpinan / Manager';
					}
				?>
				</option>
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
<?php
    }
	}
}
?>
