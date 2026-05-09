<?php

if(isset($_POST['nev']) && isset($_POST['szoveg'])) {
    if(strlen(trim($_POST['nev'])) < 3 || strlen(trim($_POST['szoveg'])) < 10) {
        $hiba = "Hiba: A név legalább 3, az üzenet legalább 10 karakter legyen!";
    } else {
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $email_cim = (isset($_SESSION['login'])) ? $_SESSION['login'] : 'vendeg@pelda.hu';

            $sqlInsert = "INSERT INTO uzenetek (id, felhasznalo_nev, email, targy, uzenet, idopont) 
                          VALUES (0, :f_nev, :email, :targy, :uzenet, NOW())";
            
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(
                ':f_nev'  => $_POST['nev'], 
                ':email'  => $email_cim,
                ':targy'  => 'Weboldal üzenet',
                ':uzenet' => $_POST['szoveg']
            ));
            
            $siker = "Köszönjük! Az üzenetét rögzítettük.";
        } catch (PDOException $e) {
            // Ha adatbázis hiba van, írja ki (ez segít a debuggolásban)
            $hiba = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}
?>
