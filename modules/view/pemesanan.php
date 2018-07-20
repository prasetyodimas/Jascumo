<?php
    $getInfoMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking WHERE id_member='$_SESSION[id_member]' ORDER BY no_nota DESC"));
    $getInfoNonMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking WHERE id_member='' ORDER BY no_nota DESC "));

?>
<div class="container" style="margin-top: 2rem;margin-bottom:6rem;">
<div class="panel-heading text-left" style="margin-bottom:3em;"> <h4>Review Order / Informasi Pemesanan</h4> </div> 
    <!--REVIEW ORDER-->
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <h4><strong>Informasi Member : </strong></h4>
                    <div class="pull-right"><span></span></div>
                </div>
                <?php if ($_SESSION['id_member'] !='' || $_SESSION['id_member'] != null) { ?>
                    <div class="col-md-12">
                        <strong>Id Member</strong>
                        <div class="pull-right">(<?php echo  $_SESSION['id_member']; ?>)</div>
                    </div>
                    <div class="col-md-12">
                        <strong>Nama Member</strong>
                        <div class="pull-right"><span><?php echo  $_SESSION['nama_member']; ?></span></div>
                    </div>
                     <div class="col-md-12">
                        <strong>Status Member</strong>
                        <div class="pull-right"><span><?php echo  $_SESSION['status_member']; ?></span></div>
                    </div>
                    <div class="col-md-12">
                        <strong>Email</strong>
                        <div class="pull-right"><span><?php echo  $_SESSION['email_member']; ?></span></div>
                    </div>
                    <a href="<?php echo $site ?>index.php?m=detailprofile" class="btn btn-primary btn-lg btn-block">More Information </a>
                <?php }else{ ?>
                    <div class="col-md-12">
                        <strong>Nama Pemesan</strong>
                        <div class="pull-right"><span></span></div>
                    </div>
                    <div class="col-md-12">
                        <strong>Nama Pemesan</strong>
                        <div class="pull-right"><span></span></div>
                    </div>
                    <div class="col-md-12">
                        <strong>Email</strong>
                        <div class="pull-right"><span></span></div>
                    </div>
                    <div class="col-md-12">
                        <strong>Alamat </strong>
                        <div class="pull-right"><span></span></div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
              <!--SHIPPING METHOD-->
            <div class="panel panel-default">
                <div class="panel-heading"><h4></h4></div>
                <div class="panel-body">
                   <table class="table borderless table-hover table-striped" style="font-size: 14px;">
                    <thead>
                        <?php $count = mysqli_fetch_array(mysqli_query($db_con," SELECT count(no_nota) as item FROM transaksi_booking 
                                       WHERE id_member='$_SESSION[id_member]' AND status_pemesanan!='lunas'")); ?>
                        <tr>
                            <td colspan="7"><strong>Daftar Pemesanaan anda: <?php echo $count['item']; ?> item</strong></td>
                        </tr>
                        <tr>
                            <th>kode Book</th>
                            <th>Nama Kendaraan</th>
                            <th>Harga</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($_SESSION['id_member']=='') {
                                $getQuery = mysqli_query($db_con,"SELECT * FROM transaksi_booking tb 
                                                          JOIN layanan la ON tb.id_layanan=la.id_layanan 
                                                          JOIN tipe_mobil tm ON tm.id_tipe_mobil=tb.id_tipe_mobil
                                                          LEFT JOIN merek_mobil mm ON mm.id_merek_mobil=tm.id_merek_mobil
                                                          WHERE status_pemesanan!='lunas' AND tb.no_nota='$_GET[idtrans]' 
                                                          ORDER BY no_nota DESC");

                            }else{
                                $getQuery = mysqli_query($db_con,"SELECT * FROM transaksi_booking tb 
                                                              JOIN layanan la ON tb.id_layanan=la.id_layanan 
                                                              JOIN tipe_mobil tm ON tm.id_tipe_mobil=tb.id_tipe_mobil
                                                              LEFT JOIN merek_mobil mm ON mm.id_merek_mobil=tm.id_merek_mobil
                                                              WHERE id_member='$_SESSION[id_member]' AND status_pemesanan!='lunas' 
                                                              ORDER BY no_nota DESC");
                            }
                            while ($res = mysqli_fetch_array($getQuery)) {
                         ?>
                        <tr>
                            <td class="text-left"><?php echo $res['no_nota']; ?></td>
                            <td class="text-left"><?php echo $res['nama_kendaraan'].''.$res['nama_mobil'];?></td>
                            <td class="text-center"><?php echo $res['jenis_layanan']; ?></td>
                            <td class="text-center">Rp.<?php echo number_format($res['harga_layanan']).',-';?></td>
                            <td class="text-center"><?php echo $res['status_pemesanan'];?></td>
                            <td class="text-right"><a href="<?php echo $site;?>modules/backend/proses_cancelbooking.php?act=cancel_booking&id=<?php echo $res['no_nota'];?>" class="btn btn-danger" id="modify-book">Batalkan</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table> 
                </div>
            </div>
            <!--SHIPPING METHOD END-->
        </div>
    </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#modify-book1').on('click',function(){
            alret('working fine !');
        });
    });
</script>