<?php session_start();
	include '../../config/koneksi.php'; 
	$act = $_GET['act'];
	if ($act =='loginprocess') {
		//CEK usernmae & password
		$username = mysqli_real_escape_string($db_con,$_POST['username_acces']);
		$password = mysqli_real_escape_string($db_con,md5($_POST['password_acces']));
		//CEK QUERY Database
		$querinya = mysqli_query($db_con,"SELECT * FROM member WHERE username_member='$username' AND password_member='$password' AND status_member='aktif'");
		$finding   = mysqli_fetch_array($querinya);
		if ($finding['username_member']==$username AND $finding['password_member']==$password) {
			$_SESSION['id_member']       = $finding ['id_member'];
			$_SESSION['username_member'] = $finding ['username_member'];
			$_SESSION['nama_member']     = $finding ['nama_member'];
			$_SESSION['alamat_member']   = $finding ['alamat_member'];
			$_SESSION['email_member']    = $finding ['email_member'];
			$_SESSION['notelp_member']   = $finding ['notelp_member'];
			$_SESSION['status_member']   = $finding ['status_member'];
			$_SESSION['password_member'] = $finding ['password_member'];
			echo "<script>alert('Selamat datang ".$_SESSION['nama_admin']." !!')</script>";
			echo "<meta http-equiv=refresh content=0;url=".$site."homeadmin.php?page=homebase>";
		}else{
			echo "<script>alert('maaf username dan password anda salah cek kolom username password dan level !!')</script>";
			echo "<script>history.go(-1)</script>";
		}

	}
?>