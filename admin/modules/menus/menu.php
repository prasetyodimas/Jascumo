<?php
    include "koneksi.php";
    if( !empty( $_SESSION['id_user'] ) ){
?>
<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href=""> Crown Carwash Administrator</a>
	</div>
	<div class="navbar-collapse collapse">
	  <ul class="nav navbar-nav">
		<li><a href="./admin.php">Beranda</a></li>
        <?php if( $_SESSION['level'] == 1 ){ ?> 
        <li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data Master <b class="caret"></b></a>
		  <ul class="dropdown-menu">
			<li><a href="./admin.php?hlm=kate_mobil">Kategori Mobil</a></li>
			<li><a href="./admin.php?hlm=ongkir">Biaya Jemput</a></li>
			<li><a href="./admin.php?hlm=biaya">Biaya</a></li>
			<li><a href="./admin.php?hlm=user">User</a></li>
		  </ul>
		<?php } ?> 
		</li>
		<li><a href="./admin.php?hlm=transaksi">Transaksi</a></li>
        <li><a href="?hlm=laporan">Laporan</a></li>

	  </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php echo $_SESSION['nama']; ?> <b class="caret"></b>
		  </a>
		  <ul class="dropdown-menu">
			<li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	</div><!--/.nav-collapse -->
  </div>
</div>
<?php
}else {
	header("Location: ./");
	die();
}
?>
