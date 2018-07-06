<?php include '../config/koneksi.php';
if(isset($_REQUEST['hlm'])){
	$hlm = $_REQUEST['hlm'];
		switch($hlm){
			case 'transaksi':
				include "modules/view/transaksi/transaksi.php";
				break;
			case 'transaksi_online':
				include "modules/view/transaksi_online/transaksi_online.php";
				break;
			case 'user':
				include "modules/view/user/user.php";
				break;
			case 'biaya_layanan':
				include "modules/view/biaya_layanan/biaya.php";
				break;
			case 'katemobil':
				include "modules/view/katemobil/katemobil.php";
				break;
			case 'merekmobil':
				include "modules/view/merekmobil/merekmobil.php";
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
			case 'lapincome':
				include "laporan_pemasukan.php";
			break;
			case 'lapmember':
				include "laporan_member.php";
			break;
		}
	} else {
?>
  <div class="jumbotron">
    <h2>Selamat Datang di Aplikasi Kasir Jasa Cuci</h2>
    <p>Halo <strong><?php echo $_SESSION['nama_user'];?></strong>, Anda login sebagai
		<strong>
		<?php
			if($_SESSION['level_akses'] == 0){
				echo 'Admin (Petugas Kasir)';
			}elseif($_SESSION['level_akses'] == 1) {
				echo 'Pimpinan / Manager.';
			}
		?>
		</strong>
	</p>
  </div>
<?php } ?>