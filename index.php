<?php session_start();
      error_reporting(0);
      require 'config/koneksi.php';
      require 'config/uri_visit.php';
      require 'helpers/function.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Crown Carwash</title>
    <!-- Bootstrap core CSS -->
    <link rel="shortcut icon" href="<?php echo $site;?>frontend/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo $site;?>frontend/favicon/favicon.ico" type="image/x-icon">
    <link href="<?php echo $site;?>frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site;?>frontend/css/one-page-wonder.css" rel="stylesheet">
    <link href="<?php echo $site;?>frontend/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo $site;?>frontend/vendor/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- JS -->
    <script src="<?php echo $site;?>frontend/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $site;?>frontend/js/select2.min.js"></script>
    <script src="<?php echo $site;?>frontend/vendor/popper/popper.min.js"></script>
    <script src="<?php echo $site;?>frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $site;?>frontend/vendor/sweetalert/sweetalert.min.js"></script>
  </head>
  <body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <?php include 'modules/view/partials/navbar.php';?>
  </nav>
  <!-- Modal Booking -->
  <?php include 'modules/view/modal-booking.php';?>
  <!-- Content All Start Here !! -->
  <?php include 'autoload/pages.php';?>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Crown CarWash <?php echo date('Y');?></p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
</body>
</html>
