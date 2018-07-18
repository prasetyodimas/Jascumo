<?php
    $getInfoMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking WHERE id_member='$_SESSION[id_member]' ORDER BY no_nota DESC"));
    $getInfoNonMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM transaksi_booking WHERE id_member='$_SESSION[id_member]' ORDER BY no_nota DESC "));

?>
<style type="text/css">
    .panel-customize{
        border: 1px solid #cecece;
        border-radius: 6px;
        padding: 20px;
        font-size: 1.1em;
    }
    .padd-left-0{
        padding-left: 0.4em;
    }
</style>
<div class="container" style="margin-top: 2rem;margin-bottom:6rem;">
<div class="panel-heading text-left" style="margin-bottom:3em;"> <h4>Detail Profile</h4></div> 
    <!--REVIEW ORDER-->
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="row">
                <div class="col-md-12 panel-customize">
                    <ul class="padd-left-0">
                        <li class="list-unstyled"><a style="color:#000;" href="<?php echo $site;?>">Home </a></li>
                        <li class="list-unstyled"><a style="color:#000;" href="<?php echo $site?>index.php?m=pemesanan">Draft Pemesanan</a></li>
                        <li class="list-unstyled"><a style="color:#000;" href="<?php echo $site;?>index.php?m=historybook">History Pemesanan</a></li>
                    </ul>
                </div>
                
            </div>
        </div>
        <div class="col-sm-9 col-md-9">
              <!--SHIPPING METHOD-->
            <div class="panel panel-default">
                <div class="panel-heading"><h4></h4></div>
                <div class="panel-body">
                    <h5><strong>Informasi Member : </strong></h5>
                    <div class="row">
                       <div class="col-sm-12">
                           <?php if ($_SESSION['id_member'] !='' || $_SESSION['id_member'] != null) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Id Member</strong>
                                <div class="pull-right">(<?php echo  $_SESSION['id_member']; ?>)</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <strong>Nama Member</strong>
                            <div class="pull-right"><span><?php echo  $_SESSION['nama_member']; ?></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Email</strong>
                                <div class="pull-right"><span><?php echo  $_SESSION['email_member']; ?></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Notelp</strong>
                                <div class="pull-right"><span><?php echo  $_SESSION['notelp_member']; ?></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Status Member </strong>
                                <div class="pull-right"><span><?php echo  $_SESSION['status_member']; ?></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <strong>Alamat </strong>
                                <div class="pull-right"><span><?php echo  $_SESSION['alamat_member']; ?></span></div>
                                <hr>
                            </div>
                        </div>
                    </div>
                <?php }else{ ?>

                <?php } ?>
                   </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
