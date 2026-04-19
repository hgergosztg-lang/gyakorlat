<h2>Képgaléria</h2>
<?php if(isset($_SESSION['login'])): ?>
    <form action="kepek" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Képfeltöltés</legend>
            <input type="file" name="ujkep">
            <input type="submit" value="Feltöltés">
        </fieldset>
    </form>
<?php endif; ?>

<div class="galeria-grid" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 20px;">
    <?php if(isset($kepek)) foreach($kepek as $kep): ?>
        <img src="<?= $kep ?>" style="width: 200px; height: 150px; object-fit: cover; border-radius: 5px;">
    <?php endforeach; ?>
</div>
