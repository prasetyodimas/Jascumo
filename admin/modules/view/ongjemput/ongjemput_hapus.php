<?php
if(empty( $_SESSION['id_user'])){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

if(isset($_REQUEST['submit'])){

    $id_ongkos = $_REQUEST['id_ongkos'];

    $sql = mysqli_query($db_con, "DELETE FROM ongkos_jemput WHERE id_ongkos='$id_ongkos'");
        if($sql == true){
            header("Location: ./admin.php?hlm=ongjemput");
            die();
        }
    }
}
?>

