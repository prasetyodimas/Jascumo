<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

      if(isset($_REQUEST['submit'])){
	    $submit    		= $_REQUEST['submit'];
        $datefrom  		= $_REQUEST['tgl1'];
        $tgl2      		= $_REQUEST['tgl2'];

        $formatFromDate = str_replace('/', '-', $datefrom);
        $substrChar2 	= str_replace('/', '-', $tgl2);
        $datenow     	= date('Y-m-d'); 

		$sql 			= "SELECT * FROM vw_transaksi_booking WHERE bookdate='$formatFromDate'";
		$QueryCheck 	= mysqli_query($db_con,$sql);

		if(mysqli_num_rows($QueryCheck) > 0){
		$no = 0;
		echo '<h3>Rekap Laporan Penghasilan <small>'.$formatFromDate.' sampai '.$substrChar2.'</small></h3><hr>
			  <div class="row">
			  	<div class="col-sm-12 col-md-12">
			  	<table class="table table-bordered">
			  	<thead>
					<tr class="info">
					  <th>No</th>
					  <th>No. Nota</th>
					  <th>Nama Pelanggan</th>
					  <th>Jenis Layanan / Harga</th>
					  <th>Tanggal Pesan</th>
					  <th>Total Bayar</th>
					</tr>
			  	</thead>
			  	<tbody>
			  	</div>
		  	  </div>
		  ';

		  while($row = mysqli_fetch_array($QueryCheck)){
		  	$no++;
		  	if ($row['id_member']!='') {
		  		$nama_pemesan = $row['nama_member'];
		  	}else{
		  		$nama_pemesan = $row['nama_pemesan'];
		  	}
		 echo '
			<tr>
			  <td>'.$no.'</td>
			  <td>'.$row['no_nota'].'</td>
			  <td>'.$nama_pemesan.'</td>
			  <td>'.$row['jenis_layanan'].' Rp.'.number_format($row['harga_layanan']).'</td>
			  <td>'.$row['bookdate'].'</td>
			  <td>Rp. '.number_format($row['total']).'</td>';
		 }
	 }
	 echo '
		 </tbody>
	 </table>
	 <div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered">';
		 echo '<tr class="info"><th><h4>Jumlah Pelanggan</h4></th><th><h4>Jumlah Pendapatan</h4></th></tr>';

		 $sql = mysqli_query($db_con, "SELECT count(nama_pemesan) as pelanggan, sum(total) FROM transaksi_booking WHERE status_pemesanan='lunas' OR status_pemesanan='selesai'");

		 list($pelanggan, $total) = mysqli_fetch_array($sql);{
			echo '<tr><td><span class="pull-right"><h4><b>'.$pelanggan.' Orang</b></h4></span></td><td><span class="pull-right"><h4><b>RP. '.number_format($total).'</b></h4></span></td></tr>';
		 }
		 echo '
			   </table>
		   </div>
		   </div>
		   </div>
		 </div>
	 </div>';
	 }else{

		echo '<h3>Rekap Laporan Penghasilan Hari Ini (<small>'.date('d-m-Y').'</small>)</h3><hr>';

?>
	<div class="row">
		<div class="well well-sm noprint">
			<form class="form-inline" role="form" method="post" action="">
			  <div class="form-group">
			    <label class="sr-only" for="tgl1">Mulai</label>
			    <input type="text" class="form-control" id="tgl1" name="tgl1" required autocomplete="off">
			  </div>
			  <label>S/d</label>
			  <div class="form-group">
			    <label class="sr-only" for="tgl2">Hingga</label>
			    <input type="text" class="form-control" id="tgl2" name="tgl2" required autocomplete="off">
			  </div>
			  <button type="submit" name="submit" class="btn btn-success">Tampilkan</button>
			</form>
		</div>
	</div>
<?php
	echo "<div class='row'>";
	echo "<div class='col-sm-12'><h4>Total Pendapatan Keseluruhan Transaksi</h4></div>";
	echo '<div class="col-sm-12 col-md-12">
		  <div class="row">
			<table class="table table-bordered">';
	echo '<tr class="info"><th><h4>Jumlah Pelanggan</h4></th><th><h4>Jumlah Pendapatan</h4></th></tr>';

		$tanggal =  date('Y-m-d');
		$sql     = mysqli_query($db_con, "SELECT count(nama_pemesan) as pelanggan, sum(total) FROM transaksi_booking WHERE status_pemesanan='lunas' OR status_pemesanan='selesai'");

		list($pelanggan, $total) = mysqli_fetch_array($sql);{
		 echo '<tr><td><span class="pull-right"><h4><b>'.$pelanggan.' Orang</b></h4></span></td><td><span class="pull-right"><h4><b>RP. '.number_format($total).'</b></h4></span></td></tr>';

		}
		echo '
				</table>
			</div>
				<div class="col-sm-12 col-md-12">
				  	<button id="tombol" onclick="window.print()" class="btn btn-warning pull-right"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
				</div>
			</div>
			</div>
		</div>
		</div>';
	   }
   }
?>
<script type="text/javascript">
	$(function(){
		//declaring date between 
		$('#tgl1').datepicker({
			format: 'yyyy/mm/dd', startDate: '-3d' 
		});
		$('#tgl2').datepicker({
			format: 'yyyy/mm/dd', startDate: '-3d' 
		});
	});
</script>
