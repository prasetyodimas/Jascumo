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
    elseif($_GET['m']=='about'){
        include ("modules/view/about.php");
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
    else {
        echo "<p><b> Whoops Your Page Request Was Not Found !!</b></p>";

    }
?>
