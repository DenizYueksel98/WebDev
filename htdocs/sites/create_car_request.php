<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration für Kfz-Datenbank</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/typicons.css">
    <link rel="stylesheet" href="../css/style.css?ts=<?= time() ?>" />
</head>

<body>
    <input type="hidden" name="redirurl" value="<? echo $_SERVER['HTTP_REFERER']; ?>" />
    <!-- header -->
    <header>
        <div id="logo">
            <a href="../index.php"><img src="../img/logo.png" /></a>
        </div>
        <nav id="mainnav">
            <!-- breadcrumb -->
            <ul class="breadcrumb - Pfad">
                <li>
                    <a href="#">Anmeldung</a>
                </li>
                <li>
                    <a href="#">Anfrage</a>
                </li>
            </ul>
            <!-- breadcrumb end -->
            <!-- search -->
            <form class="search">
                <input type="search" placeholder="Search...">
                <button type="submit"><span class="typcn typcn-arrow-right"></button>
            </form>
            <!-- search end -->
        </nav>
    </header>
    <!-- header end -->

    <!-- navigation -->
    <nav id="sidenav">
        <ul>
            <li>
                <a href="datenbank.html">Datenbank</a>
            </li>
            <li>
                <a href="register.php">Registration/Anmeldung</a>
            </li>
            <li>
                <a href="kontakt.html">Kontakt</a>
            </li>
        </ul>
    </nav>
    <!-- navigation end -->

    <main>
        <h1>Hier direkt für die Kfz-Datenbank registrieren</h1>
        <section class="create-form">
            <h1>Send Me a Message</h1>
            <p>Use this handy contact form to get in touch with me.</p>

            <form id="create-form"action="../api/create_car.php" method="post">
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
                    <input id="d2" name="d2" type="text" placeholder=" " />
                    <label for="d2" class="placeholder">D2 lt. Zulassungsbescheinigung Teil 1</label>
                </div>
                <div class="input-container">
                    <input id="zwei" name="zwei" type="text" placeholder=" " />
                    <label for="zwei" class="placeholder">2 lt. Zulassungsbescheinigung Teil 1</label>
                </div>
                <div class="input-container">
                    <input id="fuenf" name="fuenf" type="text" placeholder=" " />
                    <label for="fuenf" class="placeholder">5 lt. Zulassungsbescheinigung Teil 1</label>
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
                    <input id="co2kom" name="co2kom" type="text" placeholder=" " />
                    <label for="co2kom" class="placeholder">NEFZ CO2 Emission kombiniert</label>
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
                    <input id="co2komb" name="co2komb" type="text" placeholder=" " />
                    <label for="co2komb" class="placeholder">WLTP CO2 Emission kombiniert</label>
                </div>
                <!--input name="secret" type="hidden" value="1b3a9374-1a8e-434e-90ab-21aa7b9b80e7" /-->
                <input class="button" id="send" value="Fahrzeug in die DB schreiben" type="submit"/>
            </form>
        </section>
    </main>
    <script src="../js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../js/create_car_request.js"></script>
</body>

</html>