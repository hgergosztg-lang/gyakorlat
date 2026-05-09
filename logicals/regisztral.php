<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    // Szerveroldali ellenőrzés a szabályzat szerint (nem HTML5!)
    if(empty($_POST['felhasznalo']) || empty($_POST['jelszo']) || strlen($_POST['jelszo']) < 5) {
        $uzenet = "Hibás adatok! A jelszónak legalább 5 karakternek kell lennie.";
        $ujra = true;
    } else {
        try {
            $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
            
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználói név már foglalt!";
                $ujra = true;
            } else {
                $sqlInsert = "insert into felhasznalok(id, csaladi_nev, utonev, bejelentkezes, jelszo)
                              values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(
                    ':csaladinev' => $_POST['vezeteknev'], 
                    ':utonev'     => $_POST['utonev'],
                    ':bejelentkezes' => $_POST['felhasznalo'], 
                    ':jelszo'     => sha1($_POST['jelszo'])
                )); 
                
                if($stmt->rowCount()) {
                    $uzenet = "A regisztrációja sikeres! Most már bejelentkezhet.";                     
                    $ujra = false; // Sikeres regisztrációkor nincs szükség az űrlap újratöltésére
                } else {
                    $uzenet = "A regisztráció nem sikerült.";
                    $ujra = true;
                }
            }
        } catch (PDOException $e) {
            $uzenet = "Hiba: " . $e->getMessage();
            $ujra = true;
        }
    }
}
?>
