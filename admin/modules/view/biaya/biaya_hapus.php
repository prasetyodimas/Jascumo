<?php
if(empty( $_SESSION['id_user'])){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
}else{

if(isset($_REQUEST['submit'])){

    $id_layanan = $_REQUEST['id_layanan'];

    $sql = mysqli_query($db_con, "DELETE FROM layanan WHERE id_layanan='$id_layanan'");
        if($sql == true){
            header("Location: ./admin.php?hlm=biaya");
            die();
        }
    }
}
?>

