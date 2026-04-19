<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Törlés kezelése: ha a táblázatban a törlés gombra kattintanak
    if(isset($_GET['torol'])) {
        $st = $dbh->prepare("DELETE FROM helyseg WHERE az = :id");
        $st->execute(array(':id' => $_GET['torol']));
        header("Location: tablazat");
    }

    // Adatok lekérése a Napfény Tours helyszíneiről
    $sqlSelect = "SELECT az, nev, orszag FROM helyseg ORDER BY nev";
    $sth = $dbh->query($sqlSelect);
    $helysegek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Hiba az adatok lekérésekor: " . $e->getMessage();
}
?>
