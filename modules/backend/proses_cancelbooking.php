<?php include '../../config/koneksi.php';
 $act = $_GET['act'];
 	if ($act =='cancel_booking') {
        //check condition
        $id_transaksi = $_GET['id'];
        $checkQuery   = mysqli_fetch_array(mysqli_query($db_con,"SELECT status_pemesanan FROM transaksi_booking WHERE no_nota='$id_transaksi'"));
        if ($checkQuery['status_pemesanan']=='cancel') {
             echo "<script>alert('Mohon maaf anda telah mengajukan permohonan pembatalan pemesanan !!')</script>";
             echo "<meta http-equiv=refresh content=1;url=$site"."index.php?m=pemesanan>";
        }elseif($checkQuery['status_pemesanan']=='konfrimasi'){
             echo "<script>alert('Mohon maaf anda tidak dapat membatalkan pemesanan yang sudah di konfirmasi !!')</script>";
             echo "<meta http-equiv=refresh content=1;url=$site"."index.php?m=pemesanan>";
        }else{
            $sql       = "UPDATE transaksi_booking SET status_pemesanan='cancel' WHERE no_nota='$id_transaksi'";
            $processDb = mysqli_query($db_con,$sql);
            if($processDb){
                echo "<script>alert('Transaksi booking berhasil di batalkan !!')</script>";
                echo "<meta http-equiv=refresh content=1;url=$site"."index.php?m=pemesanan>";
            }else{
                echo "<script>alert('Transaksi booking gagal di batalkan !!')</script>";
                echo "<meta http-equiv=refresh content=1;url=$site"."index.php?m=pemesanan>";
            }
        }
 	}
?>
