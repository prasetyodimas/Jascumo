<?php error_reporting(0);
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
    <link href="frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/one-page-wonder.css" rel="stylesheet">
    <link href="frontend/css/select2.min.css" rel="stylesheet">
    <!-- JS -->
    <script src="frontend/vendor/jquery/jquery.min.js"></script>
    <script src="frontend/js/select2.min.js"></script>
    <script src="frontend/vendor/popper/popper.min.js"></script>
    <script src="frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="<?php echo $site;?>">Crown Carwash</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?php echo $url_home;?>">
            <a class="nav-link" href="index.php?m=home">Home
              <!-- <span class="sr-only">(current)</span> -->
            </a>
          </li>
          <li class="nav-item <?php echo $url_booking;?>">
            <a class="nav-link" href="<?php echo $site;?>index.php?m=booking">Booking</a>
          </li>
          <li class="nav-item <?php echo $url_about;?>">
            <a class="nav-link" href="<?php echo $site;?>index.php?m=about">About</a>
          </li>
          <li class="nav-item <?php echo $url_services;?>">
            <a class="nav-link" href="<?php echo $site;?>index.php?m=services">Services</a>
          </li>
          <li class="nav-item <?php echo $url_contact;?>">
            <a class="nav-link" href="<?php echo $site;?>index.php?m=contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
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
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->
</body>
</html>
