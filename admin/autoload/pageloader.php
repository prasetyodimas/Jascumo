<?php include '../config/koneksi.php';
if(isset($_REQUEST['hlm'])){
	$hlm = $_REQUEST['hlm'];
		switch($hlm){
			case 'transaksi':
				include "modules/view/transaksi/transaksi.php";
				break;
			case 'transaksi_online':
				include "modules/view/transaksi/transaksi_online.php";
				break;
			case 'user':
				include "modules/view/user/user.php";
				break;
			case 'biaya':
				include "modules/view/biaya/biaya.php";
				break;
			case 'katemobil':
				include "modules/view/katemobil/katemobil.php";
				break;
			case 'ongjemput':
				include "modules/view/ongjemput/ongjemput.php";
				break;
			case 'member':
				include "modules/view/member/member.php";
				break;
			case 'cetak':
				include "cetak_nota.php";
				break;
			case 'laporan':
				include "laporan.php";
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
				echo 'Admin (Petugas Kasir)';
			} else {
				echo 'Pimpinan / Manager.';
			}
		?>
		</strong>
	</p>
  </div>
<?php } ?>