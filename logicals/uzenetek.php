<?php
$uzenetek = array();
try {
    $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // A te táblád oszlopai: felhasznalo_nev, idopont, uzenet
    $sqlSelect = "SELECT felhasznalo_nev, idopont, uzenet FROM uzenetek ORDER BY idopont DESC";
    $sth = $dbh->query($sqlSelect);
    $uzenetek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Hiba az üzenetek lekérésekor: " . $e->getMessage();
}
?>
