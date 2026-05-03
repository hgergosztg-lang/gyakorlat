<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
    try {
        // JAVÍTOTT KAPCSOLÓDÁS (Írd be a saját adataidat!)
        $dbh = new PDO('mysql:host=localhost;dbname=IDE_AZ_ADATBAZIS_NEVE', 'IDE_A_FELHASZNALONEV', 'IDE_A_JELSZO',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Létezik már a felhasználói név?
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
        
        if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
        }
        else {
            // JAVÍTOTT INSERT (uto_nev átírva utonev-re, ha az SQL kódomat használtad)
            $sqlInsert = "insert into felhasznalok(id, csaladi_nev, utonev, bejelentkezes, jelszo)
                          values(0, :csaladinev, :utonev, :bejelentkezes, :jelszo)";
            $stmt = $dbh->prepare($sqlInsert); 
            $stmt->execute(array(
                ':csaladinev' => $_POST['vezeteknev'], 
                ':utonev' => $_POST['utonev'],
                ':bejelentkezes' => $_POST['felhasznalo'], 
                ':jelszo' => sha1($_POST['jelszo'])
            )); 
            
            if($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                $ujra = false;
            }
            else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    }
    catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
        $ujra = true;
    }      
}
else {
    header("Location: .");
}
?>
