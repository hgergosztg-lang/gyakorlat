<?php
if(isset($_POST['nev']) && isset($_POST['orszag'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        if($_POST['id'] != "") {
            // Módosítás (Update)
            $sql = "UPDATE helyseg SET nev = :n, orszag = :o WHERE az = :id";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':n' => $_POST['nev'], ':o' => $_POST['orszag'], ':id' => $_POST['id']));
        } else {
            // Új felvétel (Insert) - az ID-t a DB adja (auto_increment)
            $sql = "INSERT INTO helyseg (nev, orszag) VALUES (:n, :o)";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':n' => $_POST['nev'], ':o' => $_POST['orszag']));
        }
        header("Location: tablazat");
    } catch (PDOException $e) {
        die("Hiba történt a mentés során.");
    }
}
?>
