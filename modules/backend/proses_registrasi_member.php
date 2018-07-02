<?php include '../../config/koneksi.php'; 
$act = $_GET['act'];
	if ($act =='registrasi') {
		$id_member	   		= $_POST['id_member'];
		$nama_member   		= $_POST['name_lengkap'];
		$email_member  		= $_POST['email_member'];
		$notelp_member 		= $_POST['notelp_member'];
		$alamat_member 		= $_POST['alamat_member'];
		$password_member    = md5($_POST['password_member']);
		$status_mem	   		= 'aktif';

		$sql = mysqli_query($db_con, "INSERT INTO member (id_member, nama_member, email_member, notelp_member, alamat_member, password_member, status_member)
									  VALUES ('$id_member','$nama_member','$email_member','$notelp_member','$alamat_member','$password_member','$status_mem')");
		if ($sql === false) {
			throw new Exception("Error cannot saved data !", 500);
			alert('Error Function !!');
		}

	}

?>