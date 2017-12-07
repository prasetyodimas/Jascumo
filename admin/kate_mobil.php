<div class="container">
	<div class="col-md-12">
		<h3 style="margin-bottom: -20px;">Tambah Kategori Mobil</h3>
			<a href="./admin.php?hlm=user&aksi=baru" class="btn btn-success btn-s pull-right">Tambah User</a>
		<br/><hr/>

		<table class="table table-bordered">
		 <thead>
		   <tr class="info">
			 <th width="5%">No</th>
			 <th width="22%">Username</th>
			 <th width="33%">Nama</th>
			 <th width="20%">Level</th>
			 <th width="20%">Tindakan</th>
		   </tr>
		 </thead>
		 <tbody>

		<script type="text/javascript" language="JavaScript">
		  	function konfirmasi(){
			  	tanya = confirm("Anda yakin akan menghapus user ini?");
			  	if (tanya == true) return true;
			  	else return false;
			}
		</script>

		<a href="?hlm=user&aksi=edit&id_user='.$row['id_user'].'" class="btn btn-warning btn-s">Edit</a>
		<a href="?hlm=user&aksi=hapus&submit=yes&id_user='.$row['id_user'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>
