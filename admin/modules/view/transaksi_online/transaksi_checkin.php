<?php
  $getInfomationMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking tb LEFT JOIN member m ON tb.id_member=m.id_member
                                               WHERE tb.no_nota='$_GET[id_transaksi]'"));
  $getQueue            = mysqli_fetch_array(mysqli_query($db_con,"SELECT count(no_nota) AS antrian FROM transaksi_booking WHERE status_pemesanan='konfrimasi'")); 
  if ($getInfomationMember['checkin_noantrian']=="" || $getInfomationMember['checkin_noantrian']==null) {
      $no_queuetask  = 1;
  }else{
      $no_queuetask  = $getQueue['antrian']+1;
  }
?>
<div class="container">
  <div class="col-sm-12 col-md-12">
    <div class="row">
      <div class="col-lg-6">
          <h3>Konfirmasi Booking Carwash</h3>
          <h5>Informasi Akun Pemesan</h4>
          <form action="<?php echo $site?>admin/modules/backend/transaksi_online/konfirmasi_booking.php?act=konfirmasi&id=<?php echo $_GET['id_transaksi'];?>&queue=<?php echo $no_queuetask;?>" method="post" id="formData">
            <div class="form-horizontal">
              <div class="col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="hidden" name="kode_booking" value="<?php echo $_GET['id_transaksi'] ?>">
                  <input type="hidden" name="queue_no" value="<?php echo $getInfomationMember['no_antrian'] ?>">
                  <label>Id Member</label>
                  <input type="text" name="id_member" class="form-control" value="<?php echo $getInfomationMember['id_member'];?>" readonly>
                </div>
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input type="text" name="nama_member" class="form-control" value="<?php echo $getInfomationMember['nama_member'];?>" readonly>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email_member" class="form-control" value="<?php echo $getInfomationMember['email_member'];?>" readonly>
                </div>
                <div class="inner-hidden">
                  <div class="form-group">
                    <label>Notelp / Handphone</label>
                    <input type="text" name="notelp_member" class="form-control" value="<?php echo $getInfomationMember['notelp_member'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat_user" class="form-control" readonly><?php echo $getInfomationMember['alamat_member'];?></textarea>
                  </div>
                  <div class="form-group">
                  <label>Status Member</label>
                    <input type="text" name="status_member" class="form-control" value="<?php echo $getInfomationMember['status_member'];?>" readonly>
                  </div>
                  <div class="form-group">
                  <label>Status Pemesanan</label>
                    <input type="text" name="status_member" class="form-control" value="<?php echo $getInfomationMember['status_pemesanan'];?>" readonly>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="col-sm-12 col-lg-12">
                <label for="heading-barloket__queue"><strong style="font-size:1.5em;">No Antrian Booking / Pesanan Anda : </strong></label>                  
                <div class="panel outerlines-area">
                  <div class="border__booking">
                    <h4 class="text-center"><span class="days-now"></span> Tanggal <?php echo date('d-m-Y');?> <span id="jam"></span></h4>
                  </div>
                  <div class="queue__list__booking">
                    <p class="text-center" style="font-size: 6em;"><?php echo $getInfomationMember['no_antrian'];?></p>
                  </div>
                </div>
                <div class="panel outerlines-area">
                  <label for="heading-barloket__queue"><strong style="font-size:1.5em;">No Antrian Pengerjaan : </strong></label>                  
                  <div class="queue__list__booking">
                    
                    <p class="text-center" style="font-size: 6em;"><?php echo $no_queuetask;?></p>
                    <input type="hidden" name="no_queue" value="<?php echo $no_queuetask;?>">
                  </div>
                </div>
                <div class="terms-condition">
                  <p>Ketentuan :  </p>
                </div>
              </div>
            </div>
          </div>
      </div>  

      <div class="col-sm-12 col-md-12" style="margin-bottom: 2em;">
        <div class="row">
          <div class="col-sm-12 col-md-12">
            <button class="btn btn-primary" id="confrimation_proccess">Konfirmasi Checkin Antrian</button>
          </div>
        </div>
      </div>
    </div>  
  </div>  
</div>  
<script type="text/javascript">
  $(document).ready(function(){
    $('#confrimation_proccess').on('click',function(){
      alert('Anda Yakin melakukan konfirmasi Pemesanan !');
    });
  });
</script>