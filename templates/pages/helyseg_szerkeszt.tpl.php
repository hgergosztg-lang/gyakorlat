<?php
$adat = array("az" => "", "nev" => "", "orszag" => "");
if(isset($_GET['id'])) {
    // Ha szerkesztés van, betöltjük az eredeti adatokat
    $sth = $dbh->prepare("SELECT * FROM helyseg WHERE az = :id");
    $sth->execute(array(':id' => $_GET['id']));
    $adat = $sth->fetch(PDO::FETCH_ASSOC);
}
?>
<h3><?= ($adat['az'] != "") ? "Helyszín módosítása" : "Új úti cél felvitele" ?></h3>
<form action="helyseg_mentes" method="post">
    <input type="hidden" name="id" value="<?= $adat['az'] ?>">
    <div class="form-group">
        <label>Város neve:</label>
        <input type="text" name="nev" value="<?= htmlspecialchars($adat['nev']) ?>" required>
    </div>
    <div class="form-group">
        <label>Ország:</label>
        <input type="text" name="orszag" value="<?= htmlspecialchars($adat['orszag']) ?>" required>
    </div>
    <input type="submit" value="Mentés" class="btn-edit">
    <a href="tablazat" class="btn-delete" style="text-decoration:none;">Mégse</a>
</form>
