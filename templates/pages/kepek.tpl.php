<?php
$mappa = './images/galeria/';
$tipusok = array('image/jpeg', 'image/png');
$uzenet = "";

// 1. Logika: Csak akkor fusson le, ha tényleg küldtek fájlt
if (isset($_SESSION['login']) && isset($_FILES['ujkep']) && $_FILES['ujkep']['error'] == 0) {
    if (in_array($_FILES['ujkep']['type'], $tipusok)) {
        $cel = $mappa . time() . '_' . $_FILES['ujkep']['name'];
        
        // Ha sikerül a mozgatás, azonnal átirányítunk
        if (move_uploaded_file($_FILES['ujkep']['tmp_name'], $cel)) {
            header("Location: index.php?kepek&siker=1");
            exit;
        }
    } else {
        $uzenet = "Hiba: Csak JPG vagy PNG tölthető fel!";
    }
}

// Üzenet beállítása az átirányítás után
if (isset($_GET['siker'])) {
    $uzenet = "Sikeres feltöltés!";
}

// Képek beolvasása a megjelenítéshez
$kepek = glob($mappa . "*.{jpg,jpeg,png,JPG,JPEG,PNG}", GLOB_BRACE);
?>

<h2>Képgaléria</h2>

<?php if($uzenet): ?>
    <p style="color: green; font-weight: bold;"><?= $uzenet ?></p>
<?php endif; ?>

<?php if(isset($_SESSION['login'])): ?>
    <form action="?kepek" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Képfeltöltés</legend>
            <input type="file" name="ujkep">
            <input type="submit" value="Feltöltés">
        </fieldset>
    </form>
<?php endif; ?>

<div class="galeria-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px;">
    <?php if(!empty($kepek)): ?>
        <?php foreach($kepek as $kep): ?>
            <div style="border: 1px solid #ddd; padding: 5px; border-radius: 5px; background: white;">
                <a href="<?= $kep ?>" target="_blank">
                    <img src="<?= $kep ?>" style="width: 200px; height: 150px; object-fit: cover; border-radius: 5px;">
                </a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Még nincsenek feltöltött képek.</p>
    <?php endif; ?>
</div>
