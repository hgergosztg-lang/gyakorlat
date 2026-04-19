<?php
$mappa = './images/galeria/';
$tipusok = array('image/jpeg', 'image/png');

if (isset($_SESSION['login']) && isset($_FILES['ujkep'])) {
    if (in_array($_FILES['ujkep']['type'], $tipusok)) {
        $cel = $mappa . time() . '_' . $_FILES['ujkep']['name'];
        move_uploaded_file($_FILES['ujkep']['tmp_name'], $cel);
    }
}
$kepek = glob($mappa . "*.{jpg,jpeg,png}", GLOB_BRACE);
?>
