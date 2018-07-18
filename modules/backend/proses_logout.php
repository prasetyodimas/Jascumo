<?php include "../../config/koneksi.php";
	$act = $_GET['act'];
	if ($act =='logout-process') {
	  	session_start();
	  	session_destroy();
		unset($_SESSION['id_member']);
		unset($_SESSION['username']);
		unset($_SESSION['password_member']);
	}
?>
