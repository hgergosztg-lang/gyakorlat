<h2>Üzenetküldés állapota</h2>

<div class="visszajelzes" style="padding: 20px; border: 1px solid #ccc; background: #f9f9f9; border-radius: 8px;">
    <?php if(isset($siker)): ?>
        <p style="color: green; font-weight: bold; font-size: 1.2em;">
            <?= $siker ?>
        </p>
        <hr>
        <p><strong>Beküldött adatok:</strong></p>
        <p>Név: <?= htmlspecialchars($_POST['nev']) ?></p>
        <p>Üzenet: <?= nl2br(htmlspecialchars($_POST['szoveg'])) ?></p>
        
        <br>
        <a href="./index.php?cimlap" style="text-decoration: none; color: blue;">&laquo; Vissza a főoldalra</a>
    <?php endif; ?>

    <?php if(isset($hiba)): ?>
        <p style="color: red; font-weight: bold; font-size: 1.2em;">
            <?= $hiba ?>
        </p>
        <p>Kérjük, ellenőrizze az adatokat és próbálja újra.</p>
        
        <br>
        <a href="javascript:history.back()" style="text-decoration: none; color: blue;">&laquo; Vissza az űrlaphoz</a>
    <?php endif; ?>
</div>
