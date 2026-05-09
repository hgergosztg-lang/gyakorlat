<h2>Regisztráció</h2>

<?php if(isset($uzenet)) { ?>
    <div style="background: #f0f0f0; padding: 10px; border: 1px solid #ccc;">
        <h3><?= $uzenet ?></h3>
        <?php if(!$ujra) { ?>
            <p><a href="?belepes">Kattintson ide a belépéshez!</a></p>
        <?php } ?>
    </div>
<?php } ?>

<?php if(!isset($uzenet) || (isset($ujra) && $ujra)) { ?>
    <form action="index.php?regisztral" method="post">
        <fieldset>
            <legend>Adatok megadása</legend>
            <br>
            <input type="text" name="vezeteknev" placeholder="Vezetéknév"><br><br>
            <input type="text" name="utonev" placeholder="Utónév"><br><br>
            <input type="text" name="felhasznalo" placeholder="Felhasználói név"><br><br>
            <input type="password" name="jelszo" placeholder="Jelszó"><br><br>
            <input type="submit" name="regisztracio" value="Regisztráció">
            <br>&nbsp;
        </fieldset>
    </form>
<?php } ?>
