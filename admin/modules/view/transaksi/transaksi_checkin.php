<?php include '../config/koneksi.php';

if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();

}else{

    if(isset($_REQUEST['submit'])){
        $id_transaksi = $_REQUEST['id_transaksi'];
        $sql          = "UPDATE transaksi_booking SET status_pemesanan='konfirmasi' WHERE no_nota='$id_transaksi'";
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
?>
