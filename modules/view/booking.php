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
									<label>Nama Lengkap</label>
									<input type="text" name="name_alias" class="form-control" value="<?php echo $_SESSION['nama_member'];?>" readonly>
								</div>
								<div class="form-">
									<label>Alamat</label>
									<textarea class="form-control" value="<?php echo $_SESSION['alamat_member'];?>" readonly></textarea>
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
								<select name="cars_type" class="form-control choose_cartype" required="">
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
								<select name="cars_name" class="form-control choose_car" required="" id="val_namecars">
									<option value=""> Pilih </option>
								</select>
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Ukuran</label>
								<input type="text" name="size-car" class="form-control" readonly id="val_ukuran">
							</div>
						</div>
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Keterangan</label>
								<input type="text" name="note-car" class="form-control" readonly id="val_teks">
							</div>
						</div>

						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Jenis Layanan</label>
								<input type="hidden" class="hidden-value-service" name="hidden_servicesval">
								<select name="car_type" class="form-control choose-services" required="" id="selected-services">
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
							<input type="text" name="harga_layanan" class="form-control" readonly id="harga_layanan">
						</div>
					</div>

					<div class="box-area__layanan row">
						<div class="col-sm-12 col-md-12">
							<label>Layanan Antar / Jemput</label>
							<p>Ketentuan : Klik dsini untuk melakukan layanan ini</p>
						</div>
						<div class="col-md-12 col-sm-12">
							<div class="input-group-prepend">
								<div class="card">
								  <div class="card-body row">
									<div class="col-sm-2">
										Layanan Jemput <input type="checkbox" aria-label="Checkbox for following text input">
									</div>
									<div class="col-sm-6">
										Layanan Antar & Jemput  <input type="checkbox" aria-label="Checkbox for following text input">
									</div>
								  </div>
								  <div class="col-sm-5 col-md-5" style="padding-bottom: 2em;">
								  	<select name="" class="form-control">
								  		<option value="">Pilih</option>
								  	<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM ongkos_jemput ORDER BY id_ongkos DESC");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_ongkos']."'>".$data['nama_wilayah']."</option>";
									 	}
									 ?>
								  	</select>
								  </div>
								</div>
							</div>
						</div>
					</div>
					<div style="margin-top: 2rem;"></div>
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
		let choose_car     = $('.choose_car');
		let choose_cartype = $('.choose_cartype');
		let choose_service = $('.choose-services');

		$('.book-now').on('click',function(){
			alert('this function was clicked !');
		});
		
		//get json services
		$('#selected-services').on('change',function(){
        	let getValue	   = $('.hidden-value-service').val();
			choose_service.on("select2:select", function (e) { 
			  let select_val = $(e.currentTarget).val();
			  $('.hidden-value-service').val(select_val);
			});
			
            if(getValue =='' || null) {
            	alert('Pilih layananan dulu !!');
            }else{
	            $.ajax({
	                url:'../modules/backend/json/jsonservices.php',
	                type:'GET',
	                dataType:'json',
	                data: {'jenis_layanan' : getValue},
	                success:function (results) {
	                	$('#harga_layanan').val(results[0].harga_layanan);
	            	},
	            	fail: function(jqXHR, textStatus, errorThrown) {
	    				console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
					}
	            });
			}
		});

		choose_cartype.on("select2:selecting", function(e) { 
			alert('selecting !');
		});

		choose_cartype.select2({
			placeholder:'jenis tipemobil'
		});
		choose_car.select2({
			placeholder:'nama mobil'
		});
		choose_service.select2({
			placeholder:'Pilih Jenis Layanan',
			data: '', 
		});

	});
</script>
