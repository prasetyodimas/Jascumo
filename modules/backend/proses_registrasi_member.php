<?php include '../../config/koneksi.php'; 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../../vendor/autoload.php';

$act = $_GET['act'];
	if ($act =='registrasi') {
		$id_member	   		= $_POST['id_member'];
		$username_member    = $_POST['username_member'];
		$nama_member   		= $_POST['name_lengkap'];
		$email_member  		= $_POST['email_member'];
		$notelp_member 		= $_POST['notelp_member'];
		$alamat_member 		= $_POST['alamat_member'];
		$password_member    = md5($_POST['password_member']);
		$status_mem	   		= 'aktif';

		$sql = mysqli_query($db_con, "INSERT INTO member (id_member, username_member , nama_member, email_member, notelp_member, alamat_member, password_member, status_member)
									  VALUES ('$id_member','$username_member','$nama_member','$email_member','$notelp_member','$alamat_member','$password_member','$status_mem')");
		if ($sql === false) {
			throw new Exception("Error cannot saved data !", 500);
			alert('Error Function !!');
		}


		// proses sending to mailer	
		$mail = new PHPMailer(true);                               // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug  = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                       // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                              // Enable SMTP authentication
		    $mail->Username   = 'carwashcrowns@gmail.com';         // SMTP username
		    $mail->Password   = 'crowncar123';                     // SMTP password
		    $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                               // TCP port to connect to

		    //Recipients
		    $mail->setFrom('carwashcrowns@gmail.com', 'CrownCars Wash');
		    $mail->addAddress(''.$email_member.'', ''.$nama_member.'');     // Add a recipient
		    $mail->addReplyTo('carwashcrowns@gmail.com', 'Information / Custtomer Service');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('../../frontend/logo/crown-cars.png', 'crownbranding.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                     // Set email format to HTML
		    $mail->Subject = 'Crown Carswash Solution';
		    // Compose a simple HTML email message
		    $mail->Body    = '<h3 style="color:#000;">Dear Yth <span style="color:#eac702;">'.$nama_member.'</span></h3>'
		                     .'<p>Pendaftaran Member Anda Telah Berhasil Terimakasih telah menggunakan layanan dan kepercayaanya <span style="font-size:12px;font-style:italic;"> crowncarswash solution </span></p>'
		                     .'<p>Account Information :</p>'
		                     .'<table style="border:1px solid #b9b9b9;padding:10px;">
		                            <thead>
		                                <tr>No Member          : '.$id_member.' </tr>
		                                <tr>No Member          : '.$username_member.' </tr>
		                                <tr>Nama Pemesan       : '.$nama_member.' </tr>
		                                <tr>Alamat             : '.$alamat_member.'</tr>
		                                <tr>Notelp / Handphone : '.$notelp_member.' </tr>
		                                <tr>Status  		   : '.$status_mem.' </tr>
		                            </thead>
		                       </table>'
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

	}

?>