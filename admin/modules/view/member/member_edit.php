<?php
if(empty($_SESSION['id_user'])){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if(isset($_REQUEST['submit'])){
        $id_member 	     = $_REQUEST['id_member'];
        $nama_member     = $_REQUEST['nama_member'];
        $alamat_member 	 = $_REQUEST['alamat_member'];
        $email_member    = $_REQUEST['email_member'];
        $password_member = $_REQUEST['password_member'];
        $status_member   = $_REQUEST['status_member'];
		$level_acces     = $_REQUEST['level'];

        if($id_user == 1){
            header("location: ./admin.php?hlm=member");
            die();
        }

		$sql = mysqli_query($db_con, "UPDATE member SET 
											id_member='$id_member', 
											nama_member='$nama_member', 
											alamat_member='$alamat_member',
											status_member='$status_member'
											WHERE id_member='$id_member'");
		if($sql == true){
			echo "<script>alert('success edit data master member !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=member>";
		} else {
			echo "<script>alert('ERROR! Periksa penulisan querynya !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=member>";
		}
	} else {

		$id_member = $_REQUEST['id_member'];

		$sql = mysqli_query($db_con, "SELECT * FROM member WHERE id_member='$id_member'");
		while($row = mysqli_fetch_array($sql)){

?>

<h2>Edit Member</h2>
<hr>

<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
        <input type="hidden" name="id_member" value="<?php echo $row['id_member']; ?>">
		<label for="username" class="col-sm-2 control-label">Kode Member</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="id_member" value="<?php echo $row['id_member']; ?>" name="id_member" placeholder="Id Member" readonly>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Member</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" value="<?php echo $row['nama_member']; ?>" name="nama_member" placeholder="Nama member">
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Email Member</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama" value="<?php echo $row['email_member']; ?>" name="email_member" placeholder="Email member">
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Alamat Member</label>
		<div class="col-sm-4">
			<textarea class="form-control" name="alamat_member" value="alamat_member"><?php echo $row['alamat_member']; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Status Member</label>
		<div class="col-sm-4">
			<select class="form-control" name="status_member">
				<option value="">Pilih</option>
				<option value="aktif">Aktif</option>
				<option value="blokir">Blokir</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=member" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php } } } ?>
