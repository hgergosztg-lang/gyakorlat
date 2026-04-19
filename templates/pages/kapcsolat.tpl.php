<h2>Kapcsolat</h2>

<div class="contact-info">
    <p>Ügyvezető: <strong>Valaki Az</strong></p>
    <p>E-mail: <strong>valaki.az@minihonlap.hu</strong></p>
</div>

<h3>Írjon nekünk!</h3>
<form action="uzenet_kuldes" method="post" onsubmit="return ellenoriz();">
    <div>
        <label for="nev">Név:</label><br>
        <input type="text" id="nev" name="nev" style="width:300px;">
    </div><br>
    <div>
        <label for="szoveg">Üzenet:</label><br>
        <textarea id="szoveg" name="szoveg" rows="5" style="width:300px;"></textarea>
    </div><br>
    <input type="submit" value="Küldés">
</form>

<script>
function ellenoriz() {
    var nev = document.getElementById('nev').value;
    var szoveg = document.getElementById('szoveg').value;
    
    if (nev.trim().length < 3) {
        alert("Hiba: Kérjük, adjon meg egy nevet (minimum 3 karakter)!");
        return false;
    }
    if (szoveg.trim().length < 10) {
        alert("Hiba: Az üzenetnek legalább 10 karakter hosszúnak kell lennie!");
        return false;
    }
    return true;
}
</script>

<br>
<h3>Irodánk helyszíne</h3>
<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.3375296155727!2d19.66695091525771!3d46.89607994478184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da7a6c479e1d%3A0xc8292b3f6dc69e7f!2sPallasz+Ath%C3%A9n%C3%A9+Egyetem+GAMF+Kar!5e0!3m2!1shu!2shu!4v1475753185783" 
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
