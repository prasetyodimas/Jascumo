<?php include '../../config/koneksi.php'; 

$act = $_GET['act'];
if ($act=='booking') {
	//declare param
	$kd_booking 	= $_POST['no_nota'];
	$id_biayajemput = $_POST['id_biayajemput'];
	$id_member 		= $_POST['id_member'];
	$no_antrian 	= $_POST['no_antrian'];
	$nama_user 		= $_POST['nama_user'];
	$email_user 	= $_POST['email_user'];
	$alamat_user 	= $_POST['alamat_user'];
	$status_booking = $_POST['status_booking'];
	$tgl_pesan		= date('Y-m-d H:i:s');

	$addBooking = "INSERT INTO transaksi_booking(no_nota, 
								   id_layanan, 
								   id_member, 
								   id_tipe_mobil, 
								   nama_user,
								   email_user,
								   alamat_user,
								   status_booking,
								   tgl_pesan) 
							VALUES ('$kd_booking',
									'$id_biayajemput',
									'$id_member',
									'$no_antrian',
									'$nama_user',
									'$email_user',
									'$alamat_user',
									'$status_booking',
									'$tgl_pesan')";
	$saveBooking = mysqli_query($db_con,$addBooking);
	if ($saveBooking) {
		echo "<script>alert('Pemesanan Berhasil Tunggu Konfirmasi Dari Kami Terimakasih !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."index.php?booking>";
	}else{
		echo "<script>alert('Pemesanan Berhasil Tunggu Konfirmasi Dari Kami Terimakasih !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."index.php?booking>";
	}	
	
}elseif ($act=='update-booking') {
	



}elseif ($act=='delete-booking') {




}
?>