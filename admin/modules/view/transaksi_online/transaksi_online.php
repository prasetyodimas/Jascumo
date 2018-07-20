<?php
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
			case 'proses_confrim':
				include 'transaksi_checkinprocess.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	}else{
		echo '
			<div class="container">
				<h3>Daftar Transaksi Online</h3>
				<div class="clearfix form-group"></div>
				<table class="table table-bordered table-hover" id="tables-transaksi_online">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Nota</th>
					 <th>Nama Pelanggan</th>
					 <th>Nama Kendaran</th>
					 <th>Jenis + Harga</th>
					 <th>Antarjemput</th>
					 <th>Tanggal Pesan</th>
					 <th>Total Bayar</th>
					 <th>Status</th>
					 <th>Antrian book</th>
					 <th></th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM transaksi_booking tb
		 								  JOIN layanan la ON tb.id_layanan=la.id_layanan
		 								  JOIN tipe_mobil tm ON tb.id_tipe_mobil=tm.id_tipe_mobil
		 								  JOIN merek_mobil mm ON tm.id_merek_mobil=mm.id_merek_mobil 
		 								  LEFT JOIN ongkos_jemput oj ON tb.id_ongkos=oj.id_ongkos
		 								  WHERE tb.status_pemesanan!='transots'
		 								  ORDER BY no_antrian ASC");

		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
					$getMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM member WHERE id_member='$row[id_member]'"));
	 				$no++;
				 	//check condition antarjemput
				 	if ($row['id_ongkos']=="" || $row['id_ongkos']== null) {
			 			$layanan = '-';
			 		}else{
			 			$layanan = $row['nama_wilayah'].' Rp.'.formatuang($row['biaya_jemput']);
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
				 	echo '
					 <td>'.$row['nama_kendaraan'].' '.$row['nama_mobil'].'</td>
					 <td>'.$row['jenis_layanan'].' Rp.'.formatuang($row['harga_layanan']).'</td>
					 <td>'.$layanan.'</td>
					 <td>'.date("d M Y", strtotime($row['tanggal_pesan'])).'</td>
					 <td>Rp. '.formatuang($row['total']).'</td>
					 <td>'.$row['status_pemesanan'].'</td>
					 <td style="background-color:#ff0a0a;color:#fff;font-size:1.6em;" class="text-center">'.$row['no_antrian'].'</td>
					 <td>
						<script type="text/javascript" language="JavaScript">
						  	function konfirmasi(){
							  	tanya = confirm("Anda yakin akan menghapus data ini?");
							  	if (tanya == true) return true;
							  	else return false;
							}
						</script>
						<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Aksi
						  <span class="caret"></span></button>
						  <ul class="dropdown-menu">
						    <li><a href="?hlm=checkkonfrim&id_transaksi='.$row['no_nota'].'">Konfirmasi Booking</a></li>
						    <li><a href="?hlm=cetak&id_transaksi='.$row['no_nota'].'" target="_blank">Cetak Nota / Kwitansi</a></li>
						    <li><a href="?hlm=transaksi&aksi=hapus&submit=yes&id_transaksi='.$row['no_nota'].'" onclick="return konfirmasi()">Hapus</a></li>
						    <li><a href="?hlm=transaksi&aksi=cancel&submit=yes&id_transaksi='.$row['no_nota'].'">Cancel / Batal Booking</a></li></ul>
						</div>
					</td>';
				}
			}else{
				echo '<td colspan="10"><center><p class="add">Tidak ada data untuk ditampilkan.</p></center></td></tr>';
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
	#tables-transaksi_online_paginate{
		margin-left: 37em;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tables-transaksi_online').DataTable();
	});
</script>