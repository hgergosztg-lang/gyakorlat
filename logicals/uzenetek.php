<?php
$uzenetek = array();
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
    $sqlSelect = "SELECT nev, idopont, szoveg FROM uzenetek ORDER BY idopont DESC";
    $sth = $dbh->query($sqlSelect);
    $uzenetek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Nem sikerült az üzenetek betöltése.";
}
?>
