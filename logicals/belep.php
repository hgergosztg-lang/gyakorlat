<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
        
        // Figyelj: itt utonev (nincs aláhúzás)
        $sqlSelect = "select id, csaladi_nev, utonev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        
        if($row) {
            // Itt javítottam: $row['utonev']-et kapunk az SQL-ből
            $_SESSION['csn'] = $row['csaladi_nev']; 
            $_SESSION['un'] = $row['utonev']; 
            $_SESSION['login'] = $_POST['felhasznalo'];
        }
    }
    catch (PDOException $e) {
        $errormessage = "Hiba: ".$e->getMessage();
    }      
}
else {
    header("Location: .");
}
?>
