<?php include "../config/koneksi.php";
session_start();
if(empty( $_SESSION['id_user'])){
  //session_destroy();
  $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
  header('Location: ./');
  die();
} else {
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Crown Carwash Administrator</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	  <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $site?>frontend/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $site?>frontend/favicon/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <?php include "modules/menus/menu.php"; ?>
    <div class="container">
    	<?php include "autoload/pageloader.php";?>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
  </body>
</html>
<?php } ?>

<style type="text/css"> body {min-height: 200px; padding-top: 70px; } 
@media print {.container {margin-top: -30px; } #tombol, .noprint {display: none; } } 
</style>