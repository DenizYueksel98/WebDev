
<script src="../../../js/jQuery.min.js" type="text/javascript"></script>

<section class="create-form">
    <h1>Fahrzeug zur Datenbank hinzufügen</h1>
    <form id="create-form" method="post">
        <div class="input-container">
            <input id="id" name="id" type="number" placeholder=" " />
            <label for="id" class="placeholder">ID</label>
        </div>
        <div class="input-container">
            <input id="name" name="name" type="text" placeholder=" " />
            <label for="name" class="placeholder">Fahrzeugname</label>
        </div>
        <div class="input-container">
            <input id="b21" name="b21" type="text" placeholder=" " />
            <label for="b21" class="placeholder">B2.1 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="b22" name="b22" type="text" placeholder=" " />
            <label for="b22" class="placeholder">B2.2 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="j" name="j" type="text" placeholder=" " />
            <label for="j" class="placeholder">J lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="vier" name="vier" type="text" placeholder=" " />
            <label for="vier" class="placeholder">4 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="d1" name="d1" type="text" placeholder=" " />
            <label for="d1" class="placeholder">D1 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="d21" name="d21" type="text" placeholder=" " />
            <label for="d21" class="placeholder">D2.1 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="d22" name="d22" type="text" placeholder=" " />
            <label for="d22" class="placeholder">D2.2 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="d23" name="d23" type="text" placeholder=" " />
            <label for="d23" class="placeholder">D2.3 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="zwei" name="zwei" type="text" placeholder=" " />
            <label for="zwei" class="placeholder">2 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="fuenf1" name="fuenf1" type="text" placeholder=" " />
            <label for="fuenf1" class="placeholder">5.1 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="fuenf2" name="fuenf2" type="text" placeholder=" " />
            <label for="fuenf2" class="placeholder">5.2 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="v9" name="v9" type="text" placeholder=" " />
            <label for="v9" class="placeholder">V9 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-container">
            <input id="vierzehn" name="vierzehn" type="text" placeholder=" " />
            <label for="vierzehn" class="placeholder">14 lt. Zulassungsbescheinigung Teil 1</label>
        </div>
        <div class="input-radio">
            <input class="inline" id="benzin" name="p3" type="radio" value="Benzin" />
            <label class="inline" for="benzin">Benzin</label>
            <input class="inline" id="diesel" name="p3" type="radio" value="Diesel" />
            <label class="inline" for="diesel">Diesel</label>
            <input class="inline" id="elektro" name="p3" type="radio" value="Elektro" />
            <label class="inline" for="elektro">Elektro</label>
            <input class="inline" id="ethanol" name="p3" type="radio" value="Ethanol" />
            <label class="inline" for="ethanol">Ethanol</label>
            <input class="inline" id="gas" name="p3" type="radio" value="Gas" />
            <label class="inline" for="gas">Gas</label>
            <input class="inline" id="wasserstoff" name="p3" type="radio" value="Gas" />
            <label class="inline" for="wasserstoff">Wasserstoff</label>
        </div>
        <div class="input-container">
            <input id="verbin" name="verbin" type="text" placeholder=" " />
            <label for="verbin" class="placeholder">NEFZ Verbrauch innerorts</label>
        </div>
        <div class="input-container">
            <input id="verbau" name="verbau" type="text" placeholder=" " />
            <label for="verbau" class="placeholder">NEFZ Verbrauch außerorts</label>
        </div>
        <div class="input-container">
            <input id="verbko" name="verbko" type="text" placeholder=" " />
            <label for="verbko" class="placeholder">NEFZ Verbrauch kombiniert</label>
        </div>
        <div class="input-container">
            <input id="co2komN" name="co2komN" type="text" placeholder=" " />
            <label for="co2komN" class="placeholder">NEFZ CO2 Emission kombiniert</label>
        </div>
        <div class="input-container">
            <input id="sehrs" name="sehrs" type="text" placeholder=" " />
            <label for="sehrs" class="placeholder">WLTP Sehr schnell</label>
        </div>
        <div class="input-container">
            <input id="schnell" name="schnell" type="text" placeholder=" " />
            <label for="schnell" class="placeholder">WLTP Schnell</label>
        </div>
        <div class="input-container">
            <input id="langsam" name="langsam" type="text" placeholder=" " />
            <label for="langsam" class="placeholder">WLTP Langsam</label>
        </div>
        <div class="input-container">
            <input id="co2komW" name="co2komW" type="text" placeholder=" " />
            <label for="co2komW" class="placeholder">WLTP CO2 Emission kombiniert</label>
        </div>
        <!--input name="secret" type="hidden" value="1b3a9374-1a8e-434e-90ab-21aa7b9b80e7" /-->
        <input class="button" id="submit" value="Fahrzeug in die DB schreiben" type="submit" />
    </form>
</section>
<!--script src="../../../js/script.js"></script-->
<script src="../../../js/create_car.js"></script>