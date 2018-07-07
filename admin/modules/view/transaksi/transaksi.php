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
			case 'konfirmasi':
				include 'transaksi_checkin.php';
				break;
			case 'cancel':
				include 'transaksi_modify.php';
				break;
			case 'cetak':
				include 'cetak_nota.php';
				break;
		}
	}else{ ?>
			<div class="container">
				<h3>Daftar Transaksi </h3>
					<a href="./admin.php?hlm=transaksi&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Transaksi Baru</a>
				<div class="clearfix form-group"></div>
				<table class="table table-bordered table-hover" id="tables-transaksi_offline">
				 <thead>
				   <tr class="info">
					 <th>No</th>
					 <th>No. Nota</th>
					 <th>Nama Pelanggan</th>
					 <th>Jenis</th>
					 <th>Total Bayar</th>
					 <th>Tanggal</th>
					 <th>Status</th>
					 <th class="col-sm-2">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>
			<?php
			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM transaksi_booking WHERE status_pemesanan !='pesan' ORDER BY no_nota DESC");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['no_nota'].'</td>
					 <td>'.$row['nama'].'</td>
					 <td>'.$row['jenis'].'</td>
					 <td>Rp. '.number_format($row['total']).'</td>
					 <td>'.date("d M Y", strtotime($row['tanggal'])).'</td>
					 <td></td>
					 <td>
						<script type="text/javascript" language="JavaScript">
						  	function konfirmasi(){
							  	tanya = confirm("Anda yakin akan menghapus data ini?");
							  	if (tanya == true) return true;
							  	else return false;
							}
						</script>
					 	<a href="?hlm=cetak&id_transaksi='.$row['id_transaksi'].'" class="btn btn-info btn-s" target="_blank">Cetak Nota</a>
					 	<a href="?hlm=transaksi&aksi=hapus&submit=yes&id_transaksi='.$row['id_transaksi'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
					</td>';
				}
			}else{
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=transaksi&aksi=baru">Tambah transaksi baru</a></u> </p></center></td></tr>';
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
	#tables-transaksi_offline_paginate{
		margin-left: 37em;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tables-transaksi_offline').DataTable();
	});
</script>