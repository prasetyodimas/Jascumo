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
				include 'member_baru.php';
				break;
			case 'edit':
				include 'member_edit';
				break;
			case 'hapus':
				include 'member_hapus.php';
				break;
		}
	} else {

		echo '
			<div class="container">
			<div class="col-md-12">
			<div class="">
				<h3>Master Member</h3>
				<a href="./admin.php?hlm=member&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Member </a>
			</div>
			<div class="clearfix form-group"></div>
				<table class="table table-bordered table-hover">
				 <thead>
				   <tr class="info">  
					 <th width="10%">No</th>
					 <th width="35%">Nama Lengkap</th>
					 <th width="35%">Email</th>
					 <th width="35%">No telp</th>
					 <th width="35%">Alamat</th>
					 <th width="20%">Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM member ORDER BY id_member DESC");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['nama_lengkap'].'</td>
					 <td>'.$row['email_member'].'</td>
					 <td>'.$row['notelp_member'].'</td>
					 <td>'.$row['alamat_member'].'</td>
					 <td>
						<script type="text/javascript" language="JavaScript">
						  	function konfirmasi(){
							  	tanya = confirm("Anda yakin akan menghapus user ini?");
							  	if (tanya == true) return true;
							  	else return false;
							}
						</script>
						 <a href="?hlm=member&aksi=edit&id_member='.$row['id_member'].'" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
						 <a href="?hlm=member&aksi=hapus&submit=yes&id_member='.$row['id_member'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
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
