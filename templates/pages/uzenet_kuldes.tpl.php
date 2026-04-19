<h2>Üzenetküldés állapota</h2>
<div class="visszajelzes">
    <?php if(isset($siker)): ?>
        <p style="color: green; font-weight: bold;"><?= $siker ?></p>
        <p>Beküldött név: <?= htmlspecialchars($_POST['nev']) ?></p>
        <p>Üzenet: <?= htmlspecialchars($_POST['szoveg']) ?></p>
    <?php endif; ?>

    <?php if(isset($hiba)): ?>
        <p style="color: red; font-weight: bold;"><?= $hiba ?></p>
        <a href="kapcsolat" class="btn-edit">Vissza az űrlaphoz</a>
    <?php endif; ?>
    <br>
    <a href="." class="btn-edit">Vissza a főoldalra</a>
</div> 
