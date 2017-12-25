<div class="container">
	<div class="col-md-12">
	<h3 style="margin-bottom: -20px;">Tambah Kategori Mobil</h3>
	<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Kategori Mobil</a>
	<br/><hr/>
	<table class="table table-bordered">
	 <thead>
	   <tr class="info">
		 <th width="5%">No</th>
		 <th width="22%">Tipe Mobil</th>
		 <th width="20%">Ukuran</th>
		 <th width="20%">Aksi</th>
	   </tr>
	 </thead>
	 <tbody>
	 	<?php
	 		$no= 1;
	 		$getTypeMobil = mysqli_query($db_con,"SELECT * FROM tipe_mobil");
	 		while ($res=mysqli_fetch_array($getTypeMobil)) {
	 	 ?>
	 	<tr>
	 		<td><?php echo $no;?></td>
	 		<td><?php echo $res['nama_mobil'];?></td>
	 		<td><?php echo $res['ukuran_mobil'];?></td>
	 		<td>
				<a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s">Edit</a>
				<a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
	 		</td>
	 	</tr>
	 	<?php } $no++; ?>
	 </tbody>
	</table>	
	</div>
</div>
<script type="text/javascript">
  	function konfirmasi(){
	  	tanya = confirm("Anda yakin akan menghapus user ini?");
	  	if (tanya == true){
	  		return true;
	  	}else{
	  		return false;
	  	} 
	}
</script>