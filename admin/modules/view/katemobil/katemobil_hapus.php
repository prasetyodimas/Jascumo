<?php
if(empty( $_SESSION['id_user'])){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

if(isset($_REQUEST['submit'])){

    $id_tipemobil = $_REQUEST['id_tipe_mobil'];

    $sql = mysqli_query($db_con, "DELETE FROM tipe_mobil WHERE id_tipe_mobil='$id_tipemobil'");
        if($sql == true){
            header("Location: ./admin.php?hlm=katemobil");
            die();
        }
    }
}
?>

