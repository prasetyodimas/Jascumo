<?php include '../../config/koneksi.php'; 

$act = $_GET['act'];
if ($act=='booking') {
	//declare param
	$no_nota 			= $_POST['no_nota'];
	$id_layanan  		= $_POST['id_layanan'];
	$id_member 			= $_POST['id_member'];
	$id_tipe_mobil  	= $_POST['id_tipe_mobil'];
	$id_ongkos  		= $_POST['id_ongkos'];

	$nama_pemesan 		= $_POST['nama_pemesan'];
	$alamat_pemesan 	= $_POST['alamat_pemesan'];
	$notelp_pemesan		= $_POST['notelp_pemesan'];
	$email_pemesan 		= $_POST['email_pemesan'];
	$tanggal_pesan 		= $_POST['tanggal_pesan'];
	$no_antrian 		= $_POST['no_antrian'];
	$checkin_noantrian 	= $_POST['checkin_noantrian'];
	$status_pemesanan 	= $_POST['status_pemesanan'];
	$bayar				= '',
	$kembali			= '',
	$total 				= '',

	$tgl_pesan			= date('Y-m-d H:i:s');

	$addBooking = "INSERT INTO transaksi_booking(no_nota, 
								   id_layanan, 
								   id_member, 
								   id_tipe_mobil, 
								   id_ongkos,
								   nama_pemesan,
								   alamat_pemesan,
								   notelp_pemesan,
								   email_pemesan,
								   tanggal_pesan,
								   no_antrian,
								   checkin_noantrian,
								   status_pemesanan,
								   bayar,
								   kembali,
								   total) 
							VALUES ('$no_nota',
									'$id_layanan',
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