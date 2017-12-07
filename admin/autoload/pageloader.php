<?php
if(isset($_REQUEST['hlm'])){
	$hlm = $_REQUEST['hlm'];
		switch($hlm){
			case 'transaksi':
				include "transaksi.php";
				break;
			case 'laporan':
				include "laporan.php";
				break;
			case 'user':
				include "user.php";
				break;
			case 'biaya':
				include "biaya.php";
				break;
			case 'kate_mobil':
				include "kate_mobil.php";
				break;
			case 'ongkir':
				include "ongkir.php";
				break;
			case 'cetak':
				include "cetak_nota.php";
				break;
		}
	} else {
?>
  <div class="jumbotron">
    <h2>Selamat Datang di Aplikasi Kasir Jasa Cuci</h2>

    <p>Halo <strong><?php echo $_SESSION['nama'];?></strong>, Anda login sebagai
		<strong>
		<?php
			if($_SESSION['level'] == 1){
				echo 'Admin.';
			} else {
				echo 'Petugas Kasir.';
			}
		?>
		</strong>
	</p>
  </div>
<?php } ?>