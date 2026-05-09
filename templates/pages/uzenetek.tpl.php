<h2>Beérkezett üzenetek</h2>

<?php if (isset($hiba)): ?>
    <p style="color: red;"><?= $hiba ?></p>
<?php endif; ?>

<?php if (count($uzenetek) > 0): ?>
    <table border="1" style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #eee;">
                <th>Küldő</th>
                <th>Dátum</th>
                <th>Üzenet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzenetek as $sor): ?>
                <tr>
                    <td><?= htmlspecialchars($sor['felhasznalo_nev']) ?></td>
                    <td><?= $sor['idopont'] ?></td>
                    <td><?= htmlspecialchars($sor['uzenet']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Még nem érkezett üzenet az adatbázisba.</p>
<?php endif; ?>
