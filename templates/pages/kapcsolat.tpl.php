<h2>Kapcsolat</h2>
<div class="contact-info">
    <p>Ügyvezető: <strong>Valaki Az</strong></p>
    <p>E-mail: <strong>valaki.az@minihonlap.hu</strong></p>
</div>

<h3>Írjon nekünk!</h3>
<form action="uzenet_kuldes" method="post" onsubmit="return ellenoriz();">
    <div>
        <label for="nev">Név:</label><br>
        <input type="text" id="nev" name="nev" style="width:300px;" required>
    </div><br>
    <div>
        <label for="szoveg">Üzenet:</label><br>
        <textarea id="szoveg" name="szoveg" rows="5" style="width:300px;" required></textarea>
    </div><br>
    <input type="submit" value="Küldés">
</form>

<script>
function ellenoriz() {
    var nev = document.getElementById('nev').value;
    var szoveg = document.getElementById('szoveg').value;
    
    if (nev.trim().length < 3) {
        alert("Kérjük, adjon meg egy érvényes nevet (min. 3 karakter)!");
        return false;
    }
    if (szoveg.trim().length < 10) {
        alert("Az üzenetnek legalább 10 karakter hosszúnak kell lennie!");
        return false;
    }
    return true;
}
</script>

<br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2725.2657430485984!2d19.664539615606684!3d46.89607987914389!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da0f0f3531b9%3A0x669736e676106683!2sNeumann+J%C3%A1nos+Egyetem+GAMF+Kar!5e0!3m2!1shu!2shu!4v1491811824401" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
