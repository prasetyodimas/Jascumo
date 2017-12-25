<?php 
/* this function format uang Rp */
function formatuang($nilai_matauang){
    $var = number_format($nilai_matauang,0,",",".").',-';
    return $var;
}

?>