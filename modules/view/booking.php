<style type="text/css">
	.select2-container--default .select2-selection--single .select2-selection__rendered{
		line-height: 33px;
	}
	.select2-container .select2-selection--single {
	    display: block;
	    height: 38px !important;
	}
</style>
<div class="container">
	<div class="col-lg-12" style="margin-top: 2rem;">
		<div class="form-group">
			<div class="row">
				<div class="col-lg-6">
					<h4>Buat Janji / Booking Carwash</h4>
					<form action="" method="post" id="">
						<div class="form-horizontal">
							<div class="form-">
								<label>Kode Booking</label>
								<input type="text" name="book_kode" class="form-control" value="<?php echo $token;?>" readonly>
							</div>
							<?php if ($_SESSION['id_member']=='') { ?>
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
									<textarea class="form-control" name="alamat_user" required=""></textarea>
								</div>
								
							<?php }else{ ?>
								<div class="form-">
									<label>Id Member</label>
									<input type="text" name="name_alias" class="form-control" value="<?php echo $_SESSION['id_member'];?>" readonly>
								</div>
								<div class="form-">
									<label>Nama Member</label>
									<input type="text" name="name_alias" class="form-control" required="" value="<?php echo $_SESSION['nama_member'];?>">
								</div>
							<?php } ?>
						</div>
					</form>
				</div>
				

				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="col-sm-12 col-lg-12">
			              <label for="heading-barloket__queue">Nomor Antrian Anda</label>                  
			              <div class="panel outerlines-area">
			                <div class="border__booking">
			                  <h4 class="text-center"><span class="days-now"></span> <?php echo date('d-m-Y');?> <span id="jam"></span></h4>
			                </div>
			                <div class="queue__list__booking">
			                  <p class="text-center"><?php echo $show_queue;?></p>
			                </div>
			              </div>
			              <div class="terms-condition">
			                <p>Ketentuan : Untuk Melakukan prosedur booking / reservasi pencucian pelanggan di harapkan melakukan pemesanan pada jam operasional 
			                / jam kerja. Jam operasional 8.00 Am - 17.00 Pm </p>
			              </div>
           				</div>
					</div>
				</div>	
				<div class="col-sm-12 col-lg-12">
					<div class="row form-group">
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Jenis Tipe Mobil</label>
								<select name="car_type" class="form-control form-tested" required="">
									<option value=""> Pilih </option>
									<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM merek_mobil ORDER BY id_merek_mobil DESC");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_merek_mobil']."'>".$data['nama_kendaraan']."</option>";
									 	}
									 ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Nama Mobil</label>
								<select name="car_type" class="form-control form-tested" required="">
									<option value=""> Pilih </option>
									<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM merek_mobil ORDER BY id_merek_mobil DESC");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_merek_mobil']."'>".$data['nama_kendaraan']."</option>";
									 	}
									 ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Ukuran</label>
								<input type="text" name="size-car" class="form-control" readonly>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="note-car" class="form-control" readonly>
							</div>
						</div>

						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Jenis Layanan</label>
								<select name="car_type" class="form-control form-tested" required="">
									<option value=""> Pilih </option>
									<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM layanan ORDER BY id_layanan DESC");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_layanan']."'>".$data['jenis_layanan']."</option>";
									 	}
									 ?>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<label>Harga Layanan</label>
							<input type="text" name="harga_layanan" class="form-control" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<button class="btn btn-primary book-now" value="">Pesan Sekarang</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		let choose_car = $('.form-tested');
		let choose_service = $('.choose-services');
		$('.book-now').on('click',function(){
			alert('this function was clicked !');
		});

		choose_car.select2({
			placeholder:'jenis kendaraan'
		});
		choose_service.select2({
			placeholder:'Pilih Jenis Layanan'
		});
	});
</script>
