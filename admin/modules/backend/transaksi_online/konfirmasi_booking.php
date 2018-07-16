<?php include '../../../../config/koneksi.php';
	$act = $_GET['act'];

	if ($act =='konfirmasi') {
		$id_transaksi = $_GET['id'];
        $sql          = "UPDATE transaksi_booking SET status_pemesanan='konfrimasi' WHERE no_nota='$id_transaksi'";
        $processDb = mysqli_query($db_con,$sql);

        if($processDb){
            echo "<script>alert('Transaksi booking berhasil di konfirmasi !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
        }else{
            echo "<script>alert('Transaksi booking gagal di konfirmasi !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
        }


	}

?>