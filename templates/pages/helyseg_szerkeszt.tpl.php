<?php
// 1. ADATOK ELŐKÉSZÍTÉSE
if (!isset($dbh)) {
    try {
        $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    } catch (PDOException $e) { die("Adatbázis hiba!"); }
}

// ID kinyerése az URL-ből (pl. ?helyseg_szerkeszt=5)
$parts = explode('=', $_SERVER['QUERY_STRING']);
$az = (isset($parts[1]) && is_numeric($parts[1])) ? (int)$parts[1] : 0;

$nev = "";
$orszag = "";

// Ha szerkesztés van (az > 0), lekérjük a meglévő adatokat
if($az > 0) {
    $stmt = $dbh->prepare("SELECT * FROM helysegek WHERE az = :az");
    $stmt->execute([':az' => $az]);
    $v = $stmt->fetch(PDO::FETCH_ASSOC);
    if($v) {
        $nev = $v['nev'];
        $orszag = $v['orszag'];
    }
}
?>

<h2><?= ($az > 0) ? "Helység módosítása" : "Új helység felvétele" ?></h2>

<form action="./index.php?helyseg_mentes" method="post" style="background: #f9f9f9; padding: 20px; border: 1px solid #ddd;">
    <input type="hidden" name="az" value="<?= $az ?>">
    
    <p>
        <label>Város neve:</label><br>
        <input type="text" name="nev" value="<?= htmlspecialchars($nev) ?>" required style="width: 100%; padding: 5px;">
    </p>
    
    <p>
        <label>Ország:</label><br>
        <input type="text" name="orszag" value="<?= htmlspecialchars($orszag) ?>" required style="width: 100%; padding: 5px;">
    </p>
    
    <p>
        <button type="submit" style="padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer;">
            Mentés
        </button>
        <a href="./index.php?tablazat" style="margin-left: 10px; text-decoration: none; color: #666;">Mégse</a>
    </p>
</form>
