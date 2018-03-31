<?php
if(empty( $_SESSION['id_user'])){
    $_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
    header('Location: ./');
    die();
} else {

if(isset($_REQUEST['submit'])){

    $id_member = $_REQUEST['id_member'];

    $sql = mysqli_query($db_con, "DELETE FROM member WHERE id_member='$id_member'");
        if($sql == true){
            header("Location: ./admin.php?hlm=member");
            die();
        }
    }
}
?>

