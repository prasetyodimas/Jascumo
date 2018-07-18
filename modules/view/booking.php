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
					<form action="" method="post" id="formData">
						<div class="form-horizontal">
							<div class="form-">
								<label>Kode Booking</label>
								<input type="text" name="book_kode" class="form-control" value="<?php echo $token;?>" readonly>
								<input type="hidden" name="validation_status" class="form-control" value="lunas" readonly>
							</div>
							<?php if ($_SESSION['id_member']=='') { ?>
								<div class="form-">
									<label>Nama Lengkap</label>
									<input type="text" name="nama_pemesan" class="form-control" required="">
								</div>
								<div class="form-">
									<label>Email</label>
									<input type="text" name="email_pemesan" class="form-control" required="">
								</div>
								<div class="form-">
									<label>No telp</label>
									<input type="text" name="notelp_pemesan" class="form-control" required="">
								</div>
								<div class="form-">
									<label>Alamat</label>
									<textarea name="alamat_pemesan" class="form-control" required=""></textarea>
								</div>
							<?php }else{ ?>
								<div class="form-">
									<label>Id Member</label>
									<input type="text" name="id_member" id="memberId" class="form-control" value="<?php echo $_SESSION['id_member'];?>" readonly>
								</div>
								<div class="form-">
									<label>Nama Lengkap</label>
									<input type="text" name="nama_member" class="form-control" value="<?php echo $_SESSION['nama_member'];?>" readonly>
								</div>
								<div class="form-">
									<label>Email</label>
									<input type="text" name="email_member" class="form-control" value="<?php echo $_SESSION['email_member'];?>" readonly>
								</div>
								<div class="row">
									<h6><a class="btn clickedtoggle">Expand Information / Tampilkan Detail</a></h6>
								</div>
								<div class="inner-hidden">
									<div class="form-">
										<label>Notelp / Handphone</label>
										<input type="text" name="notelp_member" class="form-control" value="<?php echo $_SESSION['notelp_member'];?>" readonly>
									</div>
									<div class="form-">
										<label>Alamat</label>
										<textarea name="alamat_user" class="form-control"readonly><?php echo $_SESSION['alamat_member'];?></textarea>
									</div>
								</div>
							<?php } ?>
						</div>
				</div>
				
				<div class="col-lg-6">
					<div class="panel panel-default">
						<div class="col-sm-12 col-lg-12">
			              <label for="heading-barloket__queue"><strong style="font-size:1.5em;">Jumlah Antrian Saat Ini</strong> / Antiran yang anda dapat adalah antrian setelah daftar antrian di bawah ini</label>                  
			              <div class="panel outerlines-area">
			                <div class="border__booking">
			                  <h4 class="text-center"><span class="days-now"></span> <?php echo date('d-m-Y');?> <span id="jam"></span></h4>
			                </div>
			                <div class="queue__list__booking">
			                  <p class="text-center"><?php echo $show_queue;?></p>
			                  <input type="hidden" name="no_queue" value="<?php echo $show_queue+1; ?>">
			                </div>
			              </div>
			              <div class="terms-condition">
			                <p>Ketentuan : Untuk Melakukan prosedur booking / reservasi pencucian pelanggan di harapkan melakukan pemesanan pada jam operasional 
			                / jam kerja. Jam operasional 8.00 Am - 17.00 PM, jika diluar jam kerja maka pemesanan akan di proses pada hari berikutnya </p>
			              </div>
           				</div>
					</div>
				</div>	
				<div class="col-sm-12 col-lg-12" style="margin-top: 1em;">
					<h5>Layanan Kami / Our Services</h5>
					<div class="row form-group">
						<div class="col-sm-3 col-md-3">
							<div class="form-group">
								<label>Jenis Tipe Mobil</label>
								<select name="cars_brandname" class="form-control choose_cartype" required="">
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
									<?php
										$getQuery = mysqli_query($db_con,"SELECT * FROM tipe_mobil ORDER BY id_tipe_mobil DESC");
										while ($data = mysqli_fetch_array($getQuery)) {
											echo "<option value='".$data['id_tipe_mobil']."'>".$data['nama_mobil']."</option>";
									 	}
									 ?>
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
								<select name="services_layanan" class="form-control choose-services" required="" id="selected-services">
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
							<p id="clicked">Ketentuan : Klik dsini untuk melakukan layanan ini</p>
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

								  <div class="col-sm-12 col-md-12" style="padding-bottom: 2em;">
								  	<div class="row">
								  		<div class="col-sm-4 col-md-4">
											<label>Nama Wilayah</label>
										  	<div class="form-group">
											  	<select name="ongkir_services" class="form-control select-antarjmput" id="services_jempt" style="width: 100%;">
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
									  	<div class="col-sm-4 col-md-4">
										  	<div class="form-group">
												<label>Harga / Ongkos</label>
											  	<input type="text" name="biaya_jemput" class="form-control" readonly id="biaya_jemput">
											  	<input type="hidden" name="hidden-jemputan" class="form-control" readonly id="hidden-jemputan">
										  	</div>
								  		</div>
								  	</div>
								  </div>
								</div>
							</div>
						</div>
						</form>
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
		//declaring variables
		let choose_car         = $('.choose_car');
		let choose_cartype     = $('.choose_cartype');
		let choose_service     = $('.choose-services');
		let choose_deliveryjpt = $('.select-antarjmput');
		let getstatus 		   = $('input[name=validation_status]').val();
		let url_aplication = '<?php echo $site;?>';
		$('.book-now').on('click',function(){
			validateBooking();
		});

		//function validation form
		function validateBooking(){
			let bookingarray   = $('#formData').serializeArray();  
			let memberId       = $('#memberId').val();
			// console.log(bookingarray);
			$.ajax({
				url:"modules/backend/proses_booking.php?&act=check_bookValidation&id_member="+memberId,
				method:'GET',
				success: function(response){
					if (response.status_pemesanan != getstatus) {
						console.log(response.status_pemesanan);
						alert('maaf anda tidak bisa melakukan pemesanan checkstatus pemesanan anda !!');
			    		setTimeout(function(){
					  		 window.location = '<?php echo $site;?>'+'index.php?m=pemesanan';
						},2000);
					}else{
						$.ajax({
							url: url_aplication+"modules/backend/proses_booking.php?&act=booking",
							method :"POST",
							data : bookingarray,
							beforeSend: function(response){
								$('.book-now').prop('disabled',true);
							},
							success : function (response) {
								console.log(response);
			  					alert('Pemesanan berhasil dilakukan terimakasih telah menggunakan layanan kami');
								setTimeout(function(){
								  window.location = '<?php echo $site;?>'+'index.php?m=pemesanan';
								},1000);
							},
					        error : function (response) {
			  					alert('Whoops Registrasi Member Gagal !!');
								$('.book-now').prop('disabled',false);
					        }
						});
					}
				},
				error: function(response){
					console.log('Whoops Validation Failed !!');
				}
			});

		}
		
		//event triggered get json services
		$('#selected-services').on('change',function(){
			getServicesLayanan();
		});

		function getServicesLayanan(){
        	let getValue	   = $('.hidden-value-service').val();
			choose_service.on("select2:select", function () { 
			    let select_val = $(this).val();
			  	console.log(select_val);
	            $.ajax({
	                url:'../modules/backend/json/jsonservices.php',
	                type:'GET',
	                dataType:'json',
	                data: {'jenis_layanan' : select_val},
	                success:function (results) {
	                	$('#harga_layanan').val(results[0].harga_layanan);
	            	},
	            	fail: function(jqXHR, textStatus, errorThrown) {
	    				console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
					}
	            });
			});
		}

		//get json services
		$('#services_jempt').on('change',function(){
			choose_deliveryjpt.on("select2:select", function (e) { 
			  let select_val = $(e.currentTarget).val();
			  $('#hidden-jemputan').val(select_val);
			  // console.log(valueParse);
			  getserviceOngkir();
			});
			
		});
		function getserviceOngkir(){
        	let getValue  = $('#hidden-jemputan').val();
        	valueParse    = parseFloat(getValue);
	        $.ajax({
	            url:'../modules/backend/json/jsonservices_ongkos.php',
	            type:'GET',
	            dataType:'json',
	            data: {'ongkos':valueParse},
	            success:function (results) {
	            	$('#biaya_jemput').val(results[0].biaya_jemput);
	        	},
	        	fail: function(jqXHR, textStatus, errorThrown) {
					console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
				}
	        });
		}

		//function slide toggles
		let selector     = $('.input-group-prepend');
		let hideselector = selector.hide();
		$('#clicked').on('click',function(){
			selector.slideToggle(1000);
		});
		//function slide toggles
		let selectorForm     = $('.inner-hidden');
		let hideelems = selectorForm.hide();
		$('.clickedtoggle').on('click',function(){
			selectorForm.slideToggle(1000);
		});

		choose_cartype.on('change', function() { 
			var selections = $(this).val();
		    console.log('Selected options: ' + selections);
		});

		choose_deliveryjpt.select2({
			placeholder:'Pilih Lokasi ',
		});
		choose_cartype.select2({
			placeholder:'jenis tipemobil',
		});
		choose_car.select2({
			placeholder:'nama mobil',
		});
		choose_service.select2({
			placeholder:'Pilih Jenis Layanan',
			data: '', 
		});

		// $("#e6").select2({
		//     placeholder: "Enter an item id please",
		//     minimumInputLength: 1,
		//     ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
		//         url: "index.php?r=sia/searchresults",
		//         dataType: 'jsonp',
		//         quietMillis: 3000,
		//         data: function (term, page) {
		//         return {
		//             q: term, // search term
		//             page_limit: 10,
		//             id: 10
		//             };
		//         },
		//         results: function (data, page) { // parse the results into the format expected by Select2.
		//             // since we are using custom formatting functions we do not need to alter remote JSON data
		//             return {results: data};
		//         },
		//     },

		//     formatResult: movieFormatResult, // omitted for brevity, see the source of this page
		//     formatSelection: movieFormatSelection, // omitted for brevity, see the source of this page
		//     dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
		//     escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
		// });
	});
</script>
