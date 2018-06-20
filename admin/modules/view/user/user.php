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
				include 'user_baru.php';
				break;
			case 'edit':
				include 'user_edit.php';
				break;
			case 'hapus':
				include 'user_hapus.php';
				break;
		}
	} else {
		echo '
			<div class="container">
			<div class="col-md-12">
				<div class="heading-user">
					<h3>Daftar User</h3>
					<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah User</a>
				</div>
				<div class="clearfix form-group"></div>
				<table class="table table-hover table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th>Username</th>
					 <th>Nama User</th>
					 <th>Level</th>
					 <th>Created at</th>
					 <th>Update at</th>
					 <th>Tindakan</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($db_con, "SELECT * FROM user");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;
				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '
				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['username'].'</td>
					 <td>'.$row['nama_user'].'</td>
					 <td>';
						 if($row['level_akses'] == 0){
							 echo 'Admin';
						 } else {
							 echo 'Manager / Pimpinan';
						 }
					 echo'</td>
					 <td>'.$row['update_at'].'</td>
					 <td>'.$row['created_at'].'</td>
					 <td>

						<script type="text/javascript" language="JavaScript">
						  	function konfirmasi(){
							  	tanya = confirm("Anda yakin akan menghapus user ini?");
							  	if (tanya == true) return true;
							  	else return false;
							}
						</script>

					 <a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s"><i class="fa fa-check-square-o" aria-hidden="true"></i> Edit</a>
					 <a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>

					 </td>';
				}
			}else{
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=user&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
