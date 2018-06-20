<?php
  include "../config/koneksi.php"; 
  $cek_noantrian = mysqli_query($db_con,"SELECT * FROM transaksi_booking ORDER BY no_nota DESC");
  $show_queue = mysqli_num_rows($cek_noantrian);
  //get date 
  $getbooking_data = mysqli_fetch_array(mysqli_query($db_con,"SELECT tgl_pesan FROM transaksi_booking"));

  //check prepare condition
  $datenow = date('Y-m-d H:i:s');
  if ($datenow == $getbooking_data['tgl_pesan']) {
    $action  ='true logic !';
  }else{
    $action = 'whoops no no !';
  }

?>
<script type="text/javascript">
  $(document).ready(function() {
      $('.type-kendaraan').select2({
        placeholder :'Pilih Kendaraan'
      });

      function startTime() {
        var today   = new Date();
        var hours   = today.getHours();
        var minutes = today.getMinutes();
        var seconds = today.getSeconds();
            minutes = checkTime(minutes);
            seconds = checkTime(seconds);
        document.getElementById('jam').innerHTML = hours + ":" + minutes + ":" + seconds;
        // var todayGenerateTimeout = setTimeout(startTime, 5s00);
      }

      function checkTime(i) {
        if (i < 10) {
          i = 0 + i;
        };
        return i;
      }
      startTime();

      function getinitialize_day() {
        var weekday = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        var a = new Date();
        var defined_day = weekday[a.getDay()];
        $('.days-now').html(defined_day);
      }
      getinitialize_day();
  });
</script>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="makeBookAppointment" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Buat Janji / Booking Carwash </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <form action="<?php echo $site;?>modules/backend/proses_booking.php?act=booking" method="post" id="">
              <div class="form-group">
                <input type="hidden" name="no_antrian" value="1">
                <input type="hidden" name="id_member" value="1">
                <input type="hidden" name="id_biayajemput" value="HG33">
                <input type="hidden" name="status_booking" value="pesan">
                <label for="recipient-name" class="form-control-label">Kode Booking</label>
                <input type="text" name="id_booking" class="form-control" value="<?php echo $token;?>" required="">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Nama Lengkap</label>
                <input type="text" name="nama_user" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="email-user" class="form-control-label">Email</label>
                <input type="text" name="email_user" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="notelp-user" class="form-control-label">No telp</label>
                <input type="text" name="notelp_user" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="alamat-user" class="form-control-label">Alamat</label>
                <textarea name="alamat_user" class="form-control" required=""></textarea>
              </div>
              <div class="form-group">
                <label for="jenis-kendaraan">Pilih Kendaraan</label>
                <select name="jenis_kendaraan " class="form-control type_kendaraan"  required="" style="width: 100%;">
                  <?php
                    $getKendaraan = mysqli_query($db_con,"SELECT * FROM tipe_mobil");
                    while ($dataCar = mysqli_fetch_array($getKendaraan)) {
                      echo "<option value='".$dataCar['id_tipemobil']."'>".$dataCar['nama_mobil']."</option>";
                    }
                  ?>
                  <option value=""></option>
                </select>
              </div>
              <div class="form-group">
                <label>Tipe Mobil</label>
                <input type="text" name="tipe_mobil" class="form-control" readonly="">
              </div>
            </div>
            <div class="col-lg-6">
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
      <div class="modal-footer">
        <button type="cancel" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Janji Sekarang</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Remove until this features and analiysis is fixed -->
<style type="text/css">
  .outerlines-area{
    width: 100%;
    height: 200px;
    padding: 5px;
    display: block;
    box-shadow: 0px 0px 3px #4e4e4e;
  }
  .border__booking{
    border: 1px solid rgba(221, 221, 221, 0.33);
    background: #f9f9f9;
  }
  .queue__list__booking{
    font-size: 6em;
  }
</style>