<?php
    include('./includes/config.inc.php');
   
    $oldal = $_SERVER['QUERY_STRING'];
    $keresett_kulcs = explode('=', $oldal)[0];
    $keresett_kulcs = explode('&', $keresett_kulcs)[0];
    
    if ($keresett_kulcs != "") {
        if (isset($oldalak[$keresett_kulcs])) {
            $keres = $oldalak[$keresett_kulcs];
        }
        else { 
            $keres = $hiba_oldal;
            header("HTTP/1.0 404 Not Found");
        }
    }
    else {
        $keres = $oldalak['/'];
    }

    $php_fajl = "./includes/{$keres['fajl']}.php";
    if(file_exists($php_fajl)) {
        include($php_fajl);
    }
    include('./templates/index.tpl.php'); 
?>
