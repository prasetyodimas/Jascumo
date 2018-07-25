<?php include '../config/koneksi.php';

if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();

}else{

    if(isset($_REQUEST['submit'])){
        $id_transaksi = $_REQUEST['id_transaksi'];
         //validasi
        $getStatusPrevius = mysqli_fetch_array(mysqli_query($db_con,"SELECT status_pemesanan FROM transaksi_booking WHERE no_nota='$id_transaksi'"));
        $status = $getStatusPrevius['status_pemesanan'];
        if ($status == 'konfrimasi') {
            echo "<script>alert('Maaf anda tidak dapat melakukan pembatalan karena status sudah di konfirmasi !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
        }else{

            $sql       = "UPDATE transaksi_booking SET status_pemesanan='cancel' WHERE no_nota='$id_transaksi'";
            $processDb = mysqli_query($db_con,$sql);
            if($processDb){
                echo "<script>alert('Transaksi booking berhasil di batalkan !!')</script>";
                echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
            }else{
                echo "<script>alert('Transaksi booking gagal di batalkan !!')</script>";
                echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
            }
        }
    }
}
?>
