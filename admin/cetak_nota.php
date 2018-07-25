<?php error_reporting(0);
include '../config/koneksi.php'; 
include '../herpers/currency.php'; 

    if(empty( $_SESSION['id_user'])){
        $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
        header('Location: ./');
        die();
    }else{
    $getQuery = mysqli_fetch_array(mysqli_query($db_con, "SELECT tb.no_nota, 
                                                                 tb.id_member,
                                                                 tb.nama_pemesan, 
                                                                 tb.email_pemesan,
                                                                 tb.alamat_pemesan, 
                                                                 tb.notelp_pemesan, 
                                                                 tb.status_pemesanan, 
                                                                 la.jenis_layanan,
                                                                 tb.tanggal_pesan,
                                                                 tb.bayar, 
                                                                 tb.kembali, 
                                                                 tb.total
                                                        FROM transaksi_booking  tb
                                                        JOIN layanan la ON tb.id_layanan=la.id_layanan
                                                        WHERE no_nota='$_GET[id_transaksi]'"));

    $getQueryMember = mysqli_fetch_array(mysqli_query($db_con, "SELECT tb.no_nota, 
                                                                 tb.status_pemesanan, 
                                                                 m.nama_member,
                                                                 m.alamat_member,
                                                                 m.notelp_member,
                                                                 m.email_member,
                                                                 tb.id_member,
                                                                 la.jenis_layanan,
                                                                 tb.tanggal_pesan,
                                                                 tb.bayar, 
                                                                 tb.kembali, 
                                                                 tb.total
                                                        FROM transaksi_booking  tb
                                                        JOIN layanan la ON tb.id_layanan=la.id_layanan
                                                        JOIN member m ON m.id_member=tb.id_member
                                                        WHERE no_nota='$_GET[id_transaksi]'"))

?>

<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
    <div class="row">
        <div class="receipt-header">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="receipt-left">
                    <img class="img-responsive" alt="iamgurdeeposahan" src="<?php echo $site;?>frontend/logo/crown-cars.png" style="width: 71px; border-radius: 43px;">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                <div class="receipt-right">
                    <h5>Crown Cars Wash Solutions</h5>
                    <p>08754645<i class="fa fa-phone"></i></p>
                    <p>carwashcrowns@gmail.com <i class="fa fa-envelope-o"></i></p>
                    <p>Indonesia <i class="fa fa-location-arrow"></i></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="receipt-header receipt-header-mid">
            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                    <?php if($getQuery['id_member']!=''){ ?>
                        <h3><?php echo $getQueryMember['nama_member'];?></h3>
                        <p><b>Notelp :</b> <?php echo $getQueryMember['notelp_member']; ?></p>
                        <p><b>Email :</b> <?php  echo $getQueryMember['email_member']; ?></p>
                        <p><b>Alamat :</b> <?php echo $getQueryMember['alamat_member']; ?></p>
                    <?php }else{ ?>
                        <h3><?php echo $getQuery['nama_pemesan'];?></h3>
                        <p><b>Notelp :</b> <?php echo $getQuery['notelp_pemesan']; ?></p>
                        <p><b>Email :</b> <?php  echo $getQuery['email_pemesan']; ?></p>
                        <p><b>Alamat :</b> <?php echo $getQuery['alamat_pemesan']; ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                    <h1><i>Kwitansi</i></h1>
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php

                   $getQueryTrans = mysqli_query($db_con, "SELECT tb.no_nota, 
                                                                 tb.id_member,
                                                                 tb.nama_pemesan, 
                                                                 tb.alamat_pemesan, 
                                                                 tb.notelp_pemesan, 
                                                                 tb.status_pemesanan, 
                                                                 la.jenis_layanan,
                                                                 la.harga_layanan,
                                                                 tb.tanggal_pesan,
                                                                 mm.nama_kendaraan,
                                                                 tb.id_tipe_mobil,
                                                                 tb.carsothername,
                                                                 tm.nama_mobil,
                                                                 tb.bayar, 
                                                                 tb.kembali, 
                                                                 tb.total,
                                                                 tb.status_pemesanan
                                                        FROM transaksi_booking  tb
                                                        JOIN layanan la ON tb.id_layanan=la.id_layanan
                                                        JOIN tipe_mobil tm ON tm.id_tipe_mobil=tb.id_tipe_mobil
                                                        LEFT JOIN merek_mobil mm ON mm.id_merek_mobil=tm.id_merek_mobil
                                                        WHERE no_nota='$_GET[id_transaksi]'");
                   while ($res = mysqli_fetch_array($getQueryTrans)) {
                       
                 ?>
                <tr>
                    <?php if ($res['id_tipe_mobil']=='031-MEREK LAIN') { ?>
                        <td class="col-md-9"><?php echo  $res['jenis_layanan'].' '.$res['nama_mobil'].' ('.$res['carsothername'].')';?></td>
                    <?php }else{ ?>
                        <td class="col-md-9"><?php echo  $res['jenis_layanan'].' '.$res['nama_kendaraan'].' ('.$res['nama_mobil'].')';?></td>
                    <?php } ?>
                    <td class="col-md-3"><?php echo formatuang($res['harga_layanan']);?></td>
                </tr>
                <tr>
                    <td class="text-right">
                    <p> <strong>Total Amount: </strong> </p> 
                </td>
                    <td>
                    <p>
                        <strong><?php echo formatuang($res['harga_layanan']);?></strong>
                    </p>
                    </td>
                </tr>
                <tr>
                   
                    <td class="text-right"><h2><strong>Subtotal: </strong></h2></td>
                    <td class="text-left text-danger"><h2><strong><?php echo formatuang($res['total']); ?></strong></h2></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div class="row">
        <div class="receipt-header receipt-header-mid receipt-footer">
            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                <div class="receipt-right">
                    <p><b>Tanggal Pesan :</b> <?php echo date('d-m-Y',strtotime($getQuery['tanggal_pesan'])).' / '.date('H:i:s',strtotime($getQuery['tanggal_pesan']));?></p>
                    <h6>Terimakasih telah menggunakan layanan kami </br> contact support  24 jam Crown Carwash !</h6>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="receipt-left">
                    <h1>Signature</h1>
                </div>
            </div>
        </div>
    </div>
</div>    
<?php } ?>
<style type="text/css">
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
    }
    .receipt-main p {
        color: #333333;
        line-height: 1.42857;
    }
    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }
    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }
    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
        color:#fff;
    }
    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }
    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }
    .receipt-right p i {
        text-align: center;
        width: 18px;
    }
    .receipt-main td {
        padding: 9px 20px !important;
    }
    .receipt-main th {
        padding: 13px 20px !important;
    }
    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }
    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }   
    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }
    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }

    #container {
        background-color: #dcdcdc;
    }
</style>