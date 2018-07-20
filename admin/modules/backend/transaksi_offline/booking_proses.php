<?php include '../../config/koneksi.php'; 

$act = $_GET['act'];
	
if ($act=='booking') {
	//declare param
	$no_nota 			= $_POST['book_kode'];
	$id_layanan  		= $_POST['services_layanan'];
	$id_member 			= $_POST['id_member'];
	$id_tipe_mobil  	= $_POST['cars_name'];
	$id_ongkos  		= $_POST['ongkir_services'];
	$id_user  		    = $_POST['id_user'];

	$nama_pemesan 		= $_POST['nama_pemesan'];
	$alamat_pemesan 	= $_POST['alamat_pemesan'];
	$notelp_pemesan		= $_POST['notelp_pemesan'];
	$email_pemesan 		= $_POST['email_pemesan'];
	$tanggal_pesan 		= $_POST['tanggal_pesan'];
	$no_antrian 		= $_POST['no_queue'];
	$checkin_noantrian 	= $_POST['checkin_noantrian'];
	$status_pemesanan 	= $_POST['status_pemesanan'];
	$bayar				= 0;
	$kembali			= 0;
	$total 				= $_POST['harga_layanan'];
	$tgl_pesan			= date('Y-m-d H:i:s');
	$biaya_jemput		= $_POST['biaya_jemput'];
	$countTrans 		= $total+$biaya_jemput;
	//count all transaction
	$getMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM member WHERE id_member='$id_member'"));
	
	if ($id_member =='' || $id_member == null) {
		$addBooking = "INSERT INTO transaksi_booking(no_nota, 
								   id_layanan, 
								   id_member, 
								   id_merek_mobil, 
								   id_ongkos,
								   id_user,
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
									'$id_tipe_mobil',
									'$id_merek_mobil',
									'$id_ongkos',
									'',
									'$nama_pemesan',
									'$alamat_user',
									'$notelp_pemesan',
									'$email_user',
									'$tgl_pesan',
									'$no_antrian',
									'$checking_noantrian',
									'pesan',
									'$bayar',
									'$kembali',
									'$countTrans')";

	}else{

		$addBooking = "INSERT INTO transaksi_booking(no_nota, 
								   id_layanan, 
								   id_member, 
								   id_tipe_mobil, 
								   id_ongkos,
								   id_user,
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
									'$id_tipe_mobil',
									'$id_ongkos',
									'',
									'-',
									'-',
									'-',
									'-',
									'$tgl_pesan',
									'$no_antrian',
									'$checking_noantrian',
									'pesan',
									'$bayar',
									'$kembali',
									'$countTrans')";

	}

	$saveBooking = mysqli_query($db_con,$addBooking);
	
	if ($saveBooking === false) {
		throw new Exception("Error cannot saved data !", 500);
		alert('Error Function !!');
	}

	if ($saveBooking) {
		echo "<script>alert('Pemesanan Berhasil Tunggu Konfirmasi Dari Kami Terimakasih !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."index.php?booking>";
	}else{
		echo "<script>alert('Error cannot saved data !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."index.php?booking>";
	}	

	// //check detail trasaction and mailer member or not !!
	// if ($_POST['id_member'] !='' || $_POST['id_member']!= null) {
	// 	$transact  = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking tb 
	// 					          JOIN layanan la ON tb.id_layanan=la.id_layanan 
	// 					          JOIN tipe_mobil tm ON tm.id_tipe_mobil=tb.id_tipe_mobil
	// 					          LEFT JOIN merek_mobil mm ON mm.id_merek_mobil=tm.id_merek_mobil
	// 					          WHERE id_member='$_POST[id_member]' AND status_pemesanan!='lunas'")); 

	// }else{
	// 	$transact  = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking tb 
	// 					          JOIN layanan la ON tb.id_layanan=la.id_layanan 
	// 					          JOIN tipe_mobil tm ON tm.id_tipe_mobil=tb.id_tipe_mobil
	// 					          LEFT JOIN merek_mobil mm ON mm.id_merek_mobil=tm.id_merek_mobil
	// 					          WHERE status_pemesanan!='lunas'")); 	
	// }

}elseif($act=='check_bookValidation'){
	
	$id_member  = $_GET['id_member'];
    $result = mysqli_fetch_array(mysqli_query($db_con,"SELECT status_pemesanan FROM transaksi_booking tb 
    													     JOIN member m ON tb.id_member=m.id_member WHERE tb.id_member='$id_member'")); 
	$rows  = array(); 
	$merge = $rows = $result;
	header("Content-type:application/json"); 
		echo json_encode($merge);

		
}

?>