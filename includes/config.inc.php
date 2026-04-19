<?php
$ablakcim = array(
    'cim' => 'Napfény Tours - Utazás',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
    'cim' => 'Napfény Tours',
    'motto' => 'Reszponzív PHP alkalmazás'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Napfény Tours Utazási Iroda'
);

/* Oldalak beállítása:
  'url' => array('fajl', 'szoveg', array(látható_kijelentkezve, látható_bejelentkezve))
*/
$oldalak = array(
    '/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
    'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képgaléria', 'menun' => array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0,1)),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Adatkezelés (CRUD)', 'menun' => array(1,1))
);

// Technikai oldalak (Menüben nem látszanak, de az útvonalválasztónak ismernie kell őket)
$oldalak += array(
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0)),
    'uzenet_kuldes' => array('fajl' => 'uzenet_kuldes', 'szoveg' => '', 'menun' => array(0,0)),
    'helyseg_szerkeszt' => array('fajl' => 'helyseg_szerkeszt', 'szoveg' => '', 'menun' => array(0,0)),
    'helyseg_mentes' => array('fajl' => 'helyseg_mentes', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>
