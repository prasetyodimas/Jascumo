<?php include "../config/koneksi.php";
      include "../helpers/currency.php";
      include "../helpers/date.php";
session_start();
if(empty( $_SESSION['id_user'])){
  $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
  header('Location: ./');
  die();
}else{
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
    <link href="<?php echo $site?>admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site?>admin/css/custom.css" rel="stylesheet">
    <link href="<?php echo $site?>admin/css/font-awesome.min.css" rel="stylesheet">
	  <link href="<?php echo $site?>admin/css/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo $site?>frontend/favicon/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="<?php echo $site?>frontend/favicon/favicon.png" type="image/x-icon" rel="icon">
  </head>
  <body>
      <?php include "modules/menus/menu.php"; ?>
    <div class="container">
    	<?php include "autoload/pageloader.php";?>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $site;?>admin/js/jquery.min.js"></script>
    <script src="<?php echo $site;?>admin/js/bootstrap.min.js"></script>
	  <script src="<?php echo $site;?>admin/js/jquery-ui.min.js"></script>
  </body>
</html>
<?php } ?>
