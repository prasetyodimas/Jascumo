<div class="container">
  <a class="navbar-brand" href="<?php echo $site;?>">Crown Carwash</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php echo $url_home;?>">
        <a class="nav-link" href="index.php?m=home">Home <!-- <span class="sr-only">(current)</span> --> </a> 
      </l i>
      <li class="nav-item <?php echo $url_booking;?>">
        <a class="nav-link" href="<?php echo $site;?>index.php?m=booking">Booking</a>
      </li>
      <li class="nav-item <?php echo $url_services;?>">
        <a class="nav-link" href="<?php echo $site;?>index.php?m=services">Services</a>
      </li>
      <li class="nav-item <?php echo $url_contact;?>">
        <a class="nav-link" href="<?php echo $site;?>index.php?m=contact">Contact</a>
      </li>
      <?php if($_SESSION['id_member']==''){ ?>
        <li class="nav-item <?php echo $url_contact;?>">
          <a class="nav-link" href="<?php echo $site;?>index.php?m=member-reg">Registrasi / Login Area</a>
        </li>
      <?php }  ?>
      <?php if($_SESSION['id_member']!=''){ ?>
        <li class="nav-item <?php echo $url_contact;?>">
          <a class="nav-link" href="<?php echo $site;?>index.php?m=pemesanan">Pemesanan</a>
        </li>
        <li class="nav-item <?php echo $url_contact;?>">
          <a class="nav-link logout-funct" href=""> Logout</a>
        </li>
      <?php }  ?>
    </ul>
  </div>
</div>
