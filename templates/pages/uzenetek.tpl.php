<?php if (count($uzenetek) > 0) : ?>
    <table>
        <thead>
            <tr>
                <th>Küldő neve</th>
                <th>Időpont</th>
                <th>Üzenet</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($uzenetek as $sor) : ?>
                <tr>
                    <td data-label="Név:"><?= htmlspecialchars($sor['nev'] == "" ? "Vendég" : $sor['nev']) ?></td>
                    <td data-label="Időpont:"><?= $sor['idopont'] ?></td>
                    <td data-label="Üzenet:"><?= htmlspecialchars($sor['szoveg']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Még nem érkezett üzenet.</p>
<?php endif; ?>
