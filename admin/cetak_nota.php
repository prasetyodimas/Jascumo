<?php error_reporting(0);include '../config/koneksi.php'; 

    if(empty( $_SESSION['id_user'])){
    	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    	header('Location: ./');
    	die();
    } else {
?>

<html>
<head>
    <link href="<?php echo $site;?>css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo $site;?>css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body onload="window.print()">
    <div class="container">

<?php

    $no_nota = $_REQUEST['id_transaksi'];

    $sql = mysqli_query($db_con, "SELECT tb.no_nota, 
                                         tb.id_member,
                                         tb.nama_pemesan, 
                                         tb.alamat_pemesan, 
                                         tb.notelp_pemesan, 
                                         tb.status_pemesanan, 
                                         la.jenis_layanan,
                                         tb.tanggal_pesan,
                                         tb.bayar, 
                                         tb.kembali, 
                                         tb.total
                                FROM transaksi_booking  tb
                                JOIN layanan la
                                ON tb.id_layanan=la.id_layanan
                                WHERE no_nota='$no_nota'");
                                list($no_nota, 
                                     $id_member,
                                     $nama_pemesan,
                                     $alamat_pemesan, 
                                     $notelp_pemesan,
                                     $status_pemesanan, 
                                     $jenis_layanan,
                                     $tanggal_pesan,
                                     $bayar, 
                                     $kembali, 
                                     $total) = mysqli_fetch_array($sql);

    $getMember = mysqli_fetch_array(mysqli_query($db_con,"SELECT * FROM member WHERE id_member='$id_member'"));

    echo '
        <center><h3>Crown Cars Wash Solutions</h3></center>
        <hr/>
        <h4>Nota Nomor : <b>'.$no_nota.'</b></h4>
        <table class="table table-bordered">
         <thead>
           <tr class="info">
             <th width="15%">Id Member</th>
             <th width="15%">Nama Pelanggan</th>
             <th width="12%">Jenis</th>
             <th width="10%">Bayar</th>
             <th width="10%">Kembali</th>
             <th width="10%">Total Bayar</th>
             <th width="10%">Tanggal</th>
           </tr>
         </thead>
         <tbody>

           <tr>
             <td>'.$id_member.'</td>
             <td>'.$nama_pemesan.'</td>
             <td>'.$jenis_layanan.'</td>
             <td>Rp.'.number_format($bayar).'</td>
             <td>Rp.'.number_format($kembali).'</td>
             <td>Rp.'.number_format($total).'</td>
             <td>'.date("d-m-y", strtotime($tanggal_pesan)).'</td>
             <tr/>

        </tbody>
    </table>

    <div style="margin: 0 0 50px 75%;">
        <p style="margin-bottom: 60px;">Petugas Kasir</p>
        <p>';

        $sql = mysqli_query($db_con, "SELECT nama_user FROM user WHERE id_user='$id_user'");
        list($nama_user) = mysqli_fetch_array($sql);

        echo "<b><u>$nama_user</u></b>";

        echo '</p>
    </div>

    <center>-------------------- Terima Kasih ------------------- </center>

    </div>
</body>
</html>';
}
?>
