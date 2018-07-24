<?php error_reporting(0);
if(empty($_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{
	if(isset($_REQUEST['aksi'])){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'transaksi_baru.php';
				break;
			case 'edit':
				include 'transaksi_edit.php';
				break;
			case 'hapus':
				include 'transaksi_hapus.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	}else{ ?>
			<div class="container">
				<h3>Daftar Antrian Crown Cars Wash</h3>
				<div class="clearfix form-group"></div>
				<table class="table table-bordered table-hover" id="table-daftarantri">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Nota</th>
					 <th>Nama Pelanggan</th>
					 <th>Nama Kendaraan	</th>
					 <th>Jenis+ Harga</th>
					 <th>Antar Jemput</th>
					 <th>Total Bayar</th>
					 <th>Tanggal Pesan</th>
					 <th>Antrian Pengerjaan</th>
					 <th>Status</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>
		 	<?php 
			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM transaksi_booking tb
		 								  JOIN layanan la ON tb.id_layanan=la.id_layanan
		 								  JOIN tipe_mobil tm ON tb.id_tipe_mobil=tm.id_tipe_mobil
		 								  JOIN merek_mobil mm ON tm.id_merek_mobil=mm.id_merek_mobil 
		 								  LEFT JOIN member m ON tb.id_member=m.id_member
		 								  WHERE tb.status_pemesanan='konfrimasi' OR tb.status_pemesanan='progress' OR tb.status_pemesanan='selesai'
		 								  ORDER BY tb.checkin_noantrian ASC");
		 	$getMmeber = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM member WHERE id_member='$_GET[id_member]'"));
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
					$getMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM member WHERE id_member='$row[id_member]'"));
	 				$no++;
	 				if ($row['status_pemesanan']=='konfrimasi') {
	 					$addclass = 'konfrimasi';
	 				}elseif($row['status_pemesanan']=='progress') {
	 					$addclass = 'progress-cuci';
	 				}elseif($row['status_pemesanan']=='selesai') {
	 					$addclass = 'selesai-cuci';
	 				}
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['no_nota'].'</td>';
					 	if ($row['id_member']!='') {
				 			echo '<td>'.$getMember['nama_member'].'</td>';
				 		}else{
				 			echo '<td>'.$row['nama_pemesan'].'</td>';
				 		}
				 		if ($row['id_tipe_mobil']=='031-MEREK LAIN') {
					 		echo '<td>'.$row['carsothername'].'</td>';
						}else{
						 	echo '<td>'.$row['nama_kendaraan'].' '.$row['nama_mobil'].'</td>';
						}
				 	echo '
					 <td>'.$row['jenis_layanan'].' Rp.'.formatuang($row['harga_layanan']).'</td>
					 <td>'.$row['nama_wilayah'].'</td>
					 <td>Rp. '.formatuang($row['total']).'</td>
					 <td>'.date("d M Y", strtotime($row['tanggal_pesan'])).'</td>
					 <td>'.$row['status_pemesanan'].'</td>
					 <td class="text-center '.$addclass.'">'.$row['checkin_noantrian'].'</td>
					 <td>
					 	<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="'.$site.'admin/modules/backend/transaksi_online/konfirmasi_booking.php?act=progress_cuci&id='.$row['no_nota'].'">Proses Pencucian</a></li>
						    <li><a href="'.$site.'admin/modules/backend/transaksi_online/konfirmasi_booking.php?act=selesai_cuci&id='.$row['no_nota'].'">Selesai Cuci</a></li>
						</div>
					</td>';
				}
						    // <li><a href="?hlm=transaksi&aksi=baru&id='.$row['no_nota'].'">Proses Pembayaran</a></li>
					 	// <a href="#" class="btn btn-info btn-s">Konfirmasi</a>
					 	// <a href="?hlm=transaksi&aksi=hapus&submit=yes&id_transaksi='.$row['id_transaksi'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
			}else{
				 echo '<td colspan="12"><center><p class="add">Tidak ada data untuk ditampilkan.</p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
		</div>';
	}
}
?>
<style type="text/css">
	.dataTables_filter {
		margin-left: 25em;
	}
	#table-daftarantri_paginate{
		margin-left: 36em;
	}
	.konfrimasi{
		background-color:#ff0000;color:#fff;font-size:1.6em;
	}
	.progress-cuci{
		background-color:#fcb00a;color:#fff;font-size:1.6em;
	}
	.selesai-cuci{
		background-color:#55fc0a;color:#fff;font-size:1.6em;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#table-daftarantri').DataTable();
	});
	function konfirmasi(){
		tanya = confirm("Anda yakin akan menghapus data ini?");
		if (tanya == true) return true;
		else return false;
	}
</script>