<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';

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
    $mail->addAddress('dimasprasetyo485@gmail.com', 'Dimas Prasetyo');     // Add a recipient
    $mail->addReplyTo('carwashcrowns@gmail.com', 'Information / Custtomer Service');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('../../frontend/logo/crown-cars.png', 'crownbranding.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                     // Set email format to HTML
    $mail->Subject = 'Crown Carswash Solution';
    // Compose a simple HTML email message
    $mail->Body    = '<h3 style="color:#000;">Dear Yth <span style="color:#eac702;">Dimas Prasetyo</span></h3>'
                     .'<p>Terimakasih telah menggunakan layanan dan kepercayaan kami <span style="font-size:12px;font-style:italic;"> crowncarswash solution </span></p>'
                     .'<p>Booking Information :</p>'
                     .'<table style="border:1px solid #b9b9b9;padding:10px;">
                            <thead>
                                <tr>Kode Booking       : JSC002 </tr>
                                <tr>Nama Pemesan       : Dimas Prasetyo </tr>
                                <tr>Alamat             : Lorem Ipsum Color Sit Amet</tr>
                                <tr>Notelp / Handphone : 084234234 </tr>
                            </thead>
                       </table>'
                    .'<h5>Crown Carwash We Serve With Profesional Way Open 9 AM - Closed 6 PM <span style="font-size:10px;font-style:italic;"> Please Contact Us We Care About You :) </span> Cheeers</h5>'
                    .'<p style="margin-bottom:1em;">Warm Regard</p>'
                    .'</br>'
                    .'<p>Customer Services</p>'
                     ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
