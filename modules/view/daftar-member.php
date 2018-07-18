<?php include 'helpers/generate_code.php';?>
<div class="container">
	<div class="main-memberareas">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-sm-6 col-md-6">
				 	<div class="col-sm-12 col-md-12"><h4>Login Area / Login Member</h4></div>
				 	<form method="post" id="login-acces">
				 		<div class="form-group">
				 			<label class="col-sm-2">Username</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="text" name="username_acces" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-2">Password</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="password" name="password_acces" class="form-control" required="">
				 			</div>
				 		</div>
				 	</form>
			 		<div class="form-group">
			 			<div class="col-sm-12 col-md-12">
			 				<button type="submit" value="simpan" class="btn btn-primary" id="log-member">Login Sekarang</button>
			 			</div>
			 		</div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="col-sm-12 col-md-12"><h4>Registrasi Area / Registrasi Member </h4></div> 
					<form method="post" id="registrasi-areas">
						<div class="form-group">
				 			<label class="col-sm-4">Id member  </label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="text" name="id_member" class="form-control" value="CRWN<?php echo generatorStr(4); ?>" readonly="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-4">Username</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="text" name="username_member" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-4">Nama Lengkap</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="text" name="name_lengkap" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-2">Email</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="text" name="email_member" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-2">Password</label>
				 			<div class="col-sm-9 col-md-9">
				 				<input type="password" name="password_member" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-2">Notelp</label>
				 			<div class="col-sm-6 col-md-6">
				 				<input type="number" name="notelp_member" class="form-control" required="">
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-2">Alamat</label>
				 			<div class="col-sm-9 col-md-9">
				 				<textarea name="alamat_member" class="form-control" required=""></textarea>
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<label class="col-sm-5">Terms and Condition</label>
				 			<div class="col-sm-12 col-md-12">
				 				<input type="checkbox" name="terms-condition" id="termConditon" required="">
				 				<span class="information-area">Pastikan data yang anda masukan benar dan valid dan sesuai dengan kebijakan manajemen crown car wash !!</span>
				 			</div>
				 		</div>
				 		<div class="form-group">
				 			<div class="col-sm-12 col-md-12">
				 				<button type="submit" value="registrasi-member" id="reg-members" class="btn btn-danger" style="color:#fff;"> Daftar Sekarang</button>
				 			</div>
				 		</div>
				 	</form>
				</div>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
	.main-memberareas{
		padding-top: 4em;
		padding-bottom: 4em;
	}
	.information-area{
		font-size: 11px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		//Function Login Proccess !!
		$(document).on('click','#reg-members',function(){
			let url_aplication = '<?php echo $site;?>';
			let array_data     = $('#registrasi-areas').serializeArray();  
			let termConditon   = $('#termConditon').val('');
			if (termConditon == '') {
				alert('Term and condition should be checked !!');
			}
			$.ajax({
				url: url_aplication+"modules/backend/proses_registrasi_member.php?&act=registrasi",
				method :"POST",
				data : array_data,
				beforeSend: function(response){
					$('#reg-members').prop('disabled',true);
				},
				success : function (response) {
  					alert('Registrasi Member Berhasil Dilakukan !!');
  					location.reload();
				},
		        error : function (response) {
  					alert('Whoops Registrasi Member Gagal !!');
					$('#reg-members').prop('disabled',false);
  					resetForm();
		        }
			});

			function resetForm(){
				$('input[name=name_lengkap]').val('');
				$('input[name=email_member]').val('');
				$('input[name=password_member]').val('');
				$('input[name=notelp_member]').val('');
				$('textarea[name=alamat_member]').val('');
			}
		});
		//Function Login Proccess !!
		$('#log-member').on('click',function(){
			let url_aplication = '<?php echo $site;?>';
			let dataLogin      = $('#login-acces').serializeArray();  
			$.ajax({
				url: url_aplication+"modules/backend/proses_login.php?&act=loginprocess",
				method :"POST",
				data : dataLogin,
				beforeSend: function(response){
					$('#log-member').prop('disabled',true);
				},
				success : function (response) {
  					alert('Selamat Datang Di  SistemCrown Carwash !!');
					setTimeout(function(){
					  window.location = '<?php echo $site;?>'+'index.php?m=booking';
					},1000);
				},
		        error : function (response) {
  					alert('Whoops Registrasi Member Gagal !!');
					$('#log-member').prop('disabled',false);
		        }
			});
		});
	});
</script>