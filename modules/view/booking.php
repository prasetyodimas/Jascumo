<script type="text/javascript">
	//init select 2 function
	$(document).ready(function(){
		$('.form-tested').select2({
			placeholder:'jenis kendaraan'
		});
	});
</script>
<div class="container">
	<div class="col-lg-12" style="margin-top: 2rem;">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<h4>Buat Janji / Booking Carwash</h4>
					<form action="" method="post" id="">
						<div class="form-horizontal form-control">
							<div class="form-">
								<label>Kode Booking</label>
								<input type="text" name="book_kode" class="form-control" value="<?php echo $token;?>" required="">
							</div>
							<div class="form-">
								<label>Nama Lengkap</label>
								<input type="text" name="name_alias" class="form-control" required="">
							</div>
							<div class="form-">
								<label>Email</label>
								<input type="text" name="email_user" class="form-control" required="">
							</div>
							<div class="form-">
								<label>No telp</label>
								<input type="text" name="notelp_user" class="form-control" required="">
							</div>
							<div class="form-">
								<label>Alamat</label>
								<input type="text" name="notelp_user" class="form-control" required="">
							</div>
							<div class="form-">
								<label>Jenis Tipe Mobil</label>
								<select name="car_type" class="form-control form-tested" required="">
									<option value=""> Pilih </option>
									<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM biaya_jemput");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_biayajemput']."'>".$data['nama_wilayah']."</option>";
									 	}
									 ?>
								</select>
							</div>
						</div>
					</form>
				</div>

				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="col-lg-6">
								<h4 class="text-center">No Antrian Anda</h4>
							</div> 
						</div>
					</div>
				</div>



				
			</div>
		</div>
	</div>
</div>