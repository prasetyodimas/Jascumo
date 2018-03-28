<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

	if(isset($_REQUEST['submit'])){
		$no_nota  = $_REQUEST['no_nota'];
		$jenis    = $_REQUEST['jenis'];
		$nama     = $_REQUEST['nama'];
		$bayar    = $_REQUEST['bayar'];
		$kembali  = $_REQUEST['kembali'];
		$total    = $_REQUEST['total'];
		$id_user  = $_SESSION['id_user'];

		$sql = mysqli_query($db_con, "INSERT INTO transaksi(no_nota, jenis, nama, bayar, kembali, total, tanggal, id_user) VALUES('$no_nota', '$jenis', '$nama', '$bayar', '$kembali', '$total', NOW(), '$id_user')");
		if($sql == true){
			header('Location: ./admin.php?hlm=transaksi');
			die();
		}else{
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Transaksi Baru</h2>
<div class="clearfix form-group"></div>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-7">
				<div class="form-group">
					<label for="no_nota" class="col-sm-4 control-label">No. Nota</label>
					<div class="col-sm-4">
					<?php

						$sql = mysqli_query($db_con, "SELECT no_nota FROM transaksi");
							echo '<input type="text" class="form-control" id="no_nota" value="';

						$no_nota = "C001";
						if(mysqli_num_rows($sql) == 0){
							echo $no_nota;
						}

						$result = mysqli_num_rows($sql);
						$counter = 0;
						while(list($no_nota) = mysqli_fetch_array($sql)){
							if (++$counter == $result) {
								$no_nota++;
								echo $no_nota;
							}
						}
							echo '"name="no_nota" placeholder="No. Nota" readonly>';
					?>
					</div>
				</div>
				<div class="form-group">
					<label for="nama" class="col-sm-4 control-label">Nama Pelanggan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" required>
					</div>
				</div>
				<div class="form-group">
					<label for="jenis" class="col-sm-4 control-label">Jenis Kendaraan</label>
					<div class="col-sm-5">
						<select name="jenis" class="form-control" id="jenis" required>
							<option value="" disable> Pilih Jenis Kendaraan </option>
						<?php

							$q = mysqli_query($db_con, "SELECT * FROM tipe_mobil ORDER BY id_tipemobil DESC");
							while(list($jenis) = mysqli_fetch_array($q)){
								echo '<option value="'.$jenis['id_tipemobil'].'">'.$jenis['nama_mobil'].'</option>';
							}

						?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="jenis_layanan" class="col-lg-4 control-label">Jenis Layanan</label>
					<div class="col-lg-5">
						<select name="" class="form-control" required="">
							<option value="">Pilih Jenis Layanan</option>
							<?php 
								$data = mysqli_query($db_con, "SELECT * FROM layanan ORDER BY id_layanan DESC");
								while ($res =mysqli_fetch_array($data)){
									echo "<option value=".$res['id_layanan'].">".$res['jenis_layanan']."</option>";
								}
							 ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="biaya" class="col-sm-4 control-label">Biaya</label>
					<div class="col-sm-5">
						<input type="number" class="form-control" id="biaya" name="biaya" value="" required>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="col-lg-12">
	               <div class="panel outerlines-area">
		                <div class="border__booking">
	              		  <h2 class="text-center"><strong>Nomor Antrian Anda</strong></h2>                  
		                  <h4 class="text-center"><span class="days-now"></span> <?php echo tgl_indo(date('Y-m-d')); ?><span id="jam"></span></h4>
		                </div>
		                <div class="queue__list__booking">
		                  <h1 class="text-center">1</h1>
		                </div>
	                </div>
		            <div class="rown form-horizontal">
						<div class="form-group">
							<label for="bayar" class="col-sm-4 control-label">Bayar</label>
							<div class="col-sm-7">
								<input type="number" class="form-control" id="bayar" name="bayar" placeholder="Isi dengan angka" required>
							</div>
						</div>
						<div class="form-group">
							<label for="kembali" class="col-sm-4 control-label">Kembalian</label>
							<div class="col-sm-7">
								<input type="number" class="form-control" id="kembali" name="kembali" placeholder="Kembalian" required>
							</div>
						</div>
						<div class="form-group">
							<label for="total" class="col-sm-4 control-label">Total Bayar</label>
							<div class="col-sm-7">
								<input type="number" class="form-control" id="total" name="total" placeholder="Total Bayar" required>
							</div>
						</div>
		            </div>
				</div>
		        <div class="terms-condition">
		            <p>Ketentuan : Untuk Melakukan prosedur booking / reservasi pencucian pelanggan di harapkan melakukan pemesanan pada jam operasional 
		            / jam kerja. Jam operasional 8.00 Am - 17.00 Pm </p>
		        </div>
			</div>
			<div class="col-lg-12">
				<div class="form-group">
					<div class="col-sm-offset-2 pull-right">
						<button type="submit" name="submit" class="btn btn-success">Simpan</button>
						<a href="./admin.php?hlm=transaksi" class="btn btn-danger">Batal</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php } } ?>

<script type="text/javascript">
  $(document).ready(function(){ 
    $("#jenis").change(function(){ /* TRIGGER THIS WHEN USER HAS SELECTED DATA FROM THE SELECT FIELD */
      var jenis = $(this).val(); /* STORE THE SELECTED LOAD NUMBER TO THIS VARIABLE */
      $.ajax({
        type: "POST", /* METHOD TO USE TO PASS THE DATA */
        url: "action.php", /* THE FILE WHERE WE WILL PASS THE DATA */
        data: {"jenis": jenis}, /* THE DATA WE WILL PASS TO action.php */
        dataType: 'json', /* DATA TYPE THAT WILL BE RETURNED FROM action.php */
        success: function(result){
          /* PUT CORRESPONDING RETURNED DATA FROM action.php TO THESE TWO TEXTBOXES */
          $("#biaya").val(result.biaya);
        }

      }); 
    }); 

    
  });
</script>