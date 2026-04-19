<?php
$ablakcim = array(
    'cim' => 'Választott Téma Megnevezése',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
    'cim' => 'Projektmunka Weboldal',
    'motto' => 'Reszponzív PHP alkalmazás'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Hallgatói Csoportmunka'
);

$oldalak = array(
    '/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képgaléria', 'menun' => array(1,1))
);
$oldalak += array(
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
    'crud' => array('fajl' => 'crud', 'szoveg' => 'Adatkezelés', 'menun' => array(1,1))
);
