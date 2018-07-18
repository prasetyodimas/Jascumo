<?php include '../../config/koneksi.php'; 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

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

		// proses sending to mailer	
		$mail = new PHPMailer(true);                               // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->isSMTP();                                       // Set mailer to use SMTP
		    $mail->SMTPDebug  = 2;                                 // Enable verbose debug output
		    $mail->Host       = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
		    $mail->Username   = 'carwashcrowns@gmail.com';         // SMTP username
		    $mail->Password   = 'crowncar123';                     // SMTP password
		    $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                               // TCP port to connect to

		    //Recipients
		    $mail->setFrom('carwashcrowns@gmail.com', 'CrownCars Wash');
		    $mail->addAddress(''.$getMember['email_member'].'', ''.$getMember['nama_member'].'');     // Add a recipient
		    $mail->addReplyTo('carwashcrowns@gmail.com', 'Information / Custtomer Service');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('../../frontend/logo/crown-cars.png', 'crownbranding.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                     // Set email format to HTML
		    $mail->Subject = 'Crown Carswash Solution';
		    // Compose a simple HTML email message
		    $mail->Body    = '<h3 style="color:#000;">Dear Yth <span style="color:#eac702;">'.$getMember['nama_member'].'</span></h3>'
		                     .'<p>Terimakasih telah menggunakan layanan dan kepercayaan kami <span style="font-size:12px;font-style:italic;"> crowncarswash solution </span></p>'
		                     .'<p>Booking Information :</p>'
		                     .'<table style="border:1px solid #b9b9b9;padding:10px;">
		                            <thead>
		                                <tr>Kode Booking       : '.$no_nota.' </tr>
		                                <tr>Id Member          : '.$id_member.' </tr>
		                                <tr>Tanggal Pesan      : '.$tgl_pesan.' </tr>
		                                <tr>Nama Pemesan       : '.$getMember['nama_member'].' </tr>
		                                <tr>Alamat             : '.$getMember['alamat_member'].'</tr>
		                                <tr>Notelp / Handphone : '.$getMember['notelp_member'].' </tr>
		                                <tr>Nama Kendaraan	   : '.$transact['nama_kendaran'].' </tr>
		                                <tr>Subtotal		   : Rp.'.number_format($countTrans).',-'.' </tr>
		                            </thead>
		                       </table>'
		                    .'<h3>Nomor Antrian Sementara Anda <span style"font-size:15px;">('.$no_antrian.')</span></h3>'
		                    .'<p>Ketentuan : Tunjukan Kode Booking ini kepada kami sebagai bukti konfirmasi bahwa anda telah memesan jika anda ingin proses mencuci mobil. 
		                      jika anda datang terlambat otomatis nomer antrian akan kami ganti untuk itu bawa bukti ini sebagai konfirmasi no antrian.</p>'
		                    .'<h4>Crown Carwash We Serve With Profesional Way Open 9 AM - Closed 6 PM <span style="font-size:11px;font-style:italic;"> Please Contact Us We Care About You :) Cheers </span></h4>'
		                    .'<p style="margin-bottom:1em;">Warm Regard</p>'
		                    .'</br>'
		                    .'<p>Customer Services</p>'
		                     ;
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		    $mail->send();
		    echo 'Message has been sent';
		}catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}

}elseif($act=='check_bookValidation'){
	$id_member  = $_GET['id_member'];
	//check status transcation / validation 
    // $checkTrans   = mysqli_fetch_array(mysqli_query($db_con,"SELECT status_pemesanan FROM transaksi_booking tb 
    // 													     JOIN member m ON tb.id_member=m.id_member"));
    $result = mysqli_fetch_array(mysqli_query($db_con,"SELECT status_pemesanan FROM transaksi_booking tb 
    													     JOIN member m ON tb.id_member=m.id_member WHERE tb.id_member='$id_member'")) or die("Data not found."); 
	$rows  = array(); 
	$merge = $rows = $result;
	header("Content-type:application/json"); 
		echo json_encode($merge);
	}

?>