
<?php include '../config/koneksi.php';

if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();

}else{
    if(isset($_REQUEST['submit'])){

        $id_transaksi = $_REQUEST['id_transaksi'];
        $sql = mysqli_query($db_con, "DELETE FROM transaksi_booking WHERE no_nota='$id_transaksi'");
        if($sql == true){
            // header("Location: ./admin.php?hlm=transaksi_online");
            // die();
            echo "<script>alert('success menghapus data transaksi_online !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
        }else{
            echo "<script>alert('gagal menghapus data transaksi_online !!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=transaksi_online>";
        }
    }
}
?>
