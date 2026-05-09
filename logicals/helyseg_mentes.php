<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['login'])) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        
        $az = (int)$_POST['az'];
        $vnev = $_POST['nev'];
        $orszag = $_POST['orszag'];

        if ($az == 0) { // Új helység
            $sql = "INSERT INTO helysegek (nev, orszag) VALUES (:nev, :orszag)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':nev' => $vnev, ':orszag' => $orszag]);
        } else { // Módosítás
            $sql = "UPDATE helysegek SET nev = :nev, orszag = :orszag WHERE az = :az";
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':nev' => $vnev, ':orszag' => $orszag, ':az' => $az]);
        }
        
        header("Location: ./index.php?tablazat");
        exit;
    } catch (PDOException $e) {
        die("Hiba a mentés során: " . $e->getMessage());
    }
}
?>
