<div class="container">
	<div class="col-lg-12" style="margin-top: 2rem;">
		<h3>Service / Layanan</h3>
		<div class="row">
			<div class="col-sm-12 col-md-12">
			 	<h6>Penanganan Pada Mobil yang sering kami tangani untuk di cuci maupun poles body + jamur kaca	</h6>
			 	<div class="main-servicesareas">
			 		<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>Merek Mobil</th>
								<th>Nama Mobil</th>
								<th>Ukuran</th>
								<th>Keterangan</th>
							</tr>	
						</thead>
						<tbody>
							<?php
								$no =1;
								$getQueryAll = mysqli_query($db_con,"SELECT mm.id_merek_mobil, mm.nama_kendaraan, tm.nama_mobil, tm.ukuran_mobil, tm.keterangan
																     FROM merek_mobil mm JOIN tipe_mobil tm ON mm.id_merek_mobil=tm.id_merek_mobil");
								while ($fetch = mysqli_fetch_array($getQueryAll)) {
							 ?>
							<tr>
								<td><?php echo $no;?></td>
								<td><?php echo $fetch['nama_kendaraan'];?></td>
								<td><?php echo $fetch['nama_mobil'];?></td>
								<td><?php echo $fetch['ukuran_mobil'];?></td>
								<td><?php echo $fetch['keterangan'];?></td>
							</tr>		 			
							<?php $no++; } ?>
						</tbody>
			 		</table>
			 	</div>
			</div>
		</div>
	</div>
</div>