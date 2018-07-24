<?php
if( empty( $_SESSION['id_user'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else { ?>
<style type="text/css">
.custom-headtables{background-color:#000;}.col-md-push-custom {left: 4.333333%; } tbody tr td{border-bottom: 1px solid #ddd; }
h4.customize-size{font-size: 16px; } .main-detail-information{margin-top: 50px; } .main-detail-information .main-tanda-tangan ,.main-paraf-area{text-align:center; font-size:15px; } 
table th{color: #fff !important;}
.heading-laporan-members{text-align: center;}
@media print {
	h3,h5{
		text-align: center;
	}
	.control-action-pages{
		display: none;
	}
	.heading-child{
		margin-left: 150px;
	}
	table , .main-detail-information{
		font-size: 11px;
	}
}
</style>
<div class='main-containpages'>
	<div class="col-lg-12">
		<div class="col-sm-2 col-md-2">
			<!-- <img src="<?php echo $site;?>frontend/logo/crown-cars.png" class="img-responsive" style="width: 80%;height:auto;"> -->
		</div>
		<!-- <div class="col-md-8 col-md-push-custom">
			<h3 style="margin-left:129px;">LAPORAN MEMBER CROWN CARS WASH </h3>
			<h5 class="col-md-8 col-md-push-2 heading-child">Jln. Arteri RIngrouad Utara Depok Sleman Yogyakarta, 555282 </h5>			
		</div> -->
		<div class="heading-laporan-members">
			<h3>LAPORAN MEMBER CROWN CARS WASH </h3>
			<h5>Jln. Arteri RIngrouad Utara Depok Sleman Yogyakarta, 555282 </h5>			
		</div>
	</div>
 	<div class="col-lg-12">
 		<table class="table table-hover">
 			<thead class="custom-headtables">
 				<tr>
 					<th>No</th>
 					<th>Kode</th>
 					<th>Nama Pemesan</th>
 					<th>Alamat</th>
 					<th>No telp</th>
 					<th>Email</th>
 					<th>Status</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 				$no =1;
 				$get_datamember = mysqli_query($db_con,"SELECT * FROM member ORDER BY id_member DESC");
 				while ($result = mysqli_fetch_array($get_datamember)) {
 			?>
 				<tr>
 					<td><?php echo $no;?></td>
 					<td><?php echo $result['id_member'];?></td>
 					<td><?php echo $result['nama_member'];?></td>
 					<td><?php echo $result['alamat_member'];?></td>
 					<td><?php echo $result['notelp_member'];?></td>
 					<td><?php echo $result['email_member'];?></td>
 					<td><?php echo $result['status_member'];?></td>
					<!-- <td> <a href="homeadmin.php?page=laporan_member_onepages&id=<?php echo $result['id_member'];?>">View</a> </td> </tr> -->
			<?php $no++; } ?>
 			</tbody>
 		</table>
 		<div class="col pull-right main-detail-information">
 			<h4 class="customize-size">Yogyakarta <?php echo tgl_indo(date('Y-m-d'));?></h4>
			<div class="main-tanda-tangan">
				<p class="">Pimpinan</p>
			</div>
			<div class="main-paraf-area">(...................................)</div>
 		</div>
 		<div class="control-action-pages">
 			<a href="#" class="btn btn-primary" onclick="myWindows();">Cetak Semua Laporan</a>
 		</div>
 	</div>
</div>        
<?php } ?>
<script type="text/javascript">
	function myWindows() {
    	window.print();
	}	
</script>



