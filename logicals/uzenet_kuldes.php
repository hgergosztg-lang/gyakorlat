<?php
if(isset($_POST['nev']) && isset($_POST['szoveg'])) {
    // Szerveroldali PHP ellenőrzés (Kötelező!)
    if(strlen($_POST['nev']) < 3 || strlen($_POST['szoveg']) < 10) {
        $hiba = "A szerveroldali ellenőrzés sikertelen! Kérjük, töltsön ki minden mezőt megfelelően.";
    } else {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlInsert = "insert into uzenetek(id, nev, idopont, szoveg) 
                          values(0, :nev, NOW(), :szoveg)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':nev' => $_POST['nev'], ':szoveg' => $_POST['szoveg']));
            $siker = "Köszönjük! Az üzenetét rögzítettük.";
        } catch (PDOException $e) {
            $hiba = "Hiba történt a mentés során: " . $e->getMessage();
        }
    }
}
?>
