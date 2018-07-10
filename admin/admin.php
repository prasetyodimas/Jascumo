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
    <script src="<?php echo $site;?>admin/js/datatables/css/jquery.dataTables.min.css"></script>
    <script src="<?php echo $site;?>admin/js/datatables/css/dataTables.bootstrap.min.css"></script>
    <!-- Javascript core  -->
    <script src="<?php echo $site;?>admin/js/corejs/jquery.min.js"></script>
    <script src="<?php echo $site;?>admin/js/corejs/bootstrap.min.js"></script>
    <script src="<?php echo $site;?>admin/js/corejs/jquery-ui.min.js"></script>
    <script src="<?php echo $site;?>admin/js/corejs/vue.min.js"></script>
    <!-- Javascript library -->
    <script src="<?php echo $site;?>admin/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $site;?>admin/js/datatables/js/dataTables.bootstrap.min.js"></script>
  </head>
  <body>
      <?php include "modules/menus/menu.php"; ?>
    <div class="container">
      <?php include "autoload/pageloader.php";?>
    </div>
    <!-- Bootstrap core JavaScript, Placed at the end of the document so the pages load faster -->
  </body>
</html>
<?php } ?>
