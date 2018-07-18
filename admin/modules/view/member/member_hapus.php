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
            echo "<script>alert('success menghapus data member!!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=member>";
            // header("Location: ./admin.php?hlm=member");
        }else{
            echo "<script>alert('gagal menghapus data member!!')</script>";
            echo "<meta http-equiv=refresh content=0;url=$site"."admin/admin.php?hlm=member>";
        }
    }
}
?>

