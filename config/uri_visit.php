<?php require 'config/koneksi.php';

$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if($url == $site."index.php?home") {
    $url_home = "active";
}
elseif ($url==  $site."index.php?booking") {
    $url_booking ="active";
}
elseif ($url== $site."index.php?about") {
    $url_about ="active";
}
elseif ($url== $site."index.php?services") {
    $url_services ="active";
}
elseif ($url== $site."index.php?contact") {
    $url_contact ="active";
}
else{
    $url_home = 'active'; 
}
