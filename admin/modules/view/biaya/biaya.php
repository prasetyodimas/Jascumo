<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if(isset($_REQUEST['aksi'])){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'biaya_baru.php';
				break;
			case 'edit':
				include 'biaya_edit.php';
				break;
			case 'hapus':
				include 'biaya_hapus.php';
				break;
		}
	} else {

		echo '
			<div class="container">
			<div class="col-md-12">
			<div class="">
				<h3>Layanan / Jasa</h3>
				<a href="./admin.php?hlm=biaya&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Layanan / Jasa</a>
			</div>
			<div class="clearfix form-group"></div>
				<table class="table table-bordered table-hover">
				 <thead>
				   <tr class="info">  
					 <th width="10%">No</th>
					 <th width="35%">Jenis Layanan</th>
					 <th width="35%">Biaya Jasa</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM layanan ORDER BY id_layanan DESC");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['jenis_layanan'].'</td>
					 <td>Rp.'.formatuang($row['biaya']).'</td>
					 <td>
						<script type="text/javascript" language="JavaScript">
						  	function konfirmasi(){
							  	tanya = confirm("Anda yakin akan menghapus user ini?");
							  	if (tanya == true) return true;
							  	else return false;
							}
						</script>
						 <a href="?hlm=biaya&aksi=edit&id_layanan='.$row['id_layanan'].'" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
						 <a href="?hlm=biaya&aksi=hapus&submit=yes&id_layanan='.$row['id_layanan'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u></p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
