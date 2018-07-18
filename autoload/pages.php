<?php 
	//setting Page Modules
    $modul = isset($_GET['m']) ? $_GET['m'] : null;

    if ($_GET['m'] =='' || $_GET['m']==null) {
        include ("modules/view/home.php");
    }
    elseif ($_GET['m']=='home') {
        include ("modules/view/home.php");
    }
    elseif ($_GET['m']=="booking") {
        include ("modules/view/booking.php");
    }
    elseif($_GET['m']=='cart'){
        include ("modules/view/cart.php");
    }
    elseif($_GET['m']=='services'){
        include ("modules/view/services.php");
    }
    elseif($_GET['m']=='contact'){
        include ("modules/view/contact.php");
    }
    elseif ($_GET['m']=='member-reg') {
        include ("modules/view/daftar-member.php");
    }
    elseif ($_GET['m']=='pemesanan') {
        include ("modules/view/pemesanan.php");
    }
    elseif ($_GET['m']=='detailprofile') {
        include ("modules/view/profile-member.php");
    }
    elseif($_GET['m']=='historybook'){
        include ("modules/view/history_booking.php");
    }
    else {
        echo "<p><b> Whoops Your Page Request Was Not Found !!</b></p>";

    }
?>
