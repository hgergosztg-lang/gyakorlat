<?php
try {
    $dbh = new PDO("mysql:host=localhost;dbname=gamf_admin", "gamf_admin", "Gamf123.",
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Törlés kezelése
    if(isset($_GET['torol']) && isset($_SESSION['login'])) {
        $st = $dbh->prepare("DELETE FROM helysegek WHERE az = :id");
        $st->execute(array(':id' => $_GET['torol']));
        header("Location: ./index.php?tablazat");
        exit;
    }

    // Adatok betöltése
    $sqlSelect = "SELECT az, nev, orszag FROM helysegek ORDER BY nev";
    $sth = $dbh->query($sqlSelect);
    $helysegek = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $hiba = "Hiba: " . $e->getMessage();
}
?>

<h2>Helységek kezelése (CRUD)</h2>

<table border="1" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #eee;">
            <th>Azonosító</th>
            <th>Város</th>
            <th>Ország</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($helysegek)): foreach($helysegek as $h): ?>
            <tr>
                <td><?= $h['az'] ?></td>
                <td><?= htmlspecialchars($h['nev']) ?></td>
                <td><?= htmlspecialchars($h['orszag']) ?></td>
                <td>
                    <?php if(isset($_SESSION['login'])): ?>
                        <a href="./index.php?helyseg_szerkeszt=<?= $h['az'] ?>">Szerkesztés</a> | 
                        <a href="./index.php?tablazat&torol=<?= $h['az'] ?>" onclick="return confirm('Törli?')">Törlés</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; endif; ?>
    </tbody>
</table>

<?php if(isset($_SESSION['login'])): ?>
    <br>
    <a href="./index.php?helyseg_szerkeszt" style="padding: 10px; background: green; color: white; text-decoration: none;">+ Új helység</a>
<?php endif; ?>
