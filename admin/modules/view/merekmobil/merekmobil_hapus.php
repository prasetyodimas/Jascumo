<?php
if(empty( $_SESSION['id_user'])){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

if(isset($_REQUEST['submit'])){

    $id_merek_mobil = $_REQUEST['id_merek_mobil'];

    $sql = mysqli_query($db_con, "DELETE FROM merek_mobil WHERE id_merek_mobil='$id_merek_mobil'");
        if($sql == true){
            header("Location: ./admin.php?hlm=merekmobil");
            die();
        }
    }
}
?>

