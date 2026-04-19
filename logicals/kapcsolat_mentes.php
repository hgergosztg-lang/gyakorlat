<?php
$reakcio = "";
if(isset($_POST['nev']) && isset($_POST['email']) && isset($_POST['szoveg'])) {
    // Szerveroldali ellenőrzés (HTML ellenőrzés tilos!) [cite: 36]
    if(strlen($_POST['nev']) < 3 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['szoveg']) < 10) {
        $reakcio = "Hibás adatok! Kérjük, töltsön ki minden mezőt megfelelően.";
    } else {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlInsert = "insert into uzenetek(id, nev, email, idopont, szoveg) 
                          values(0, :nev, :email, NOW(), :szoveg)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(':nev' => $_POST['nev'], ':email' => $_POST['email'], ':szoveg' => $_POST['szoveg']));
            $reakcio = "Köszönjük! Üzenetét rögzítettük a Napfény Tours rendszerében.";
        } catch (PDOException $e) {
            $reakcio = "Hiba történt a mentés során.";
        }
    }
}
?>
