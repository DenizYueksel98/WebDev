    <section>
        <h1>Hier direkt für die Kfz-Datenbank registrieren</h1>
        <form name="register" onsubmit="setAction(this)" method="post" id="regform">
            <div class="input-container">
                <input type="text" name="username" id="username" placeholder=" " />
                <label for="username" class="placeholder">Benutzername</label>
            </div>
            <div class="input-container">
                <input type="text" name="firstname" id="firstname" placeholder=" " />
                <label for="firstname" class="placeholder">Vorname</label>
            </div>
            <div class="input-container">
                <input type="text" name="lastname" id="lastname" placeholder=" " />
                <label for="lastname" class="placeholder">Nachname</label>
            </div>
            <div class="input-container">
                <input type="password" name="password" id="password" placeholder=" " />
                <label for="password" class="placeholder">Passwort</label>
            </div>

            <input value="registrieren" style="position: absolute" class="registerbutton" id="regbtn" type="submit">

        </form>
        <h1>Falls du dich schon registriert hast, kannst du dich auch hier anmelden</h1>
        <form action="authenticate.php" method="post">
            <div class="input-container">
                <input type="text" name="usernameLogin" placeholder=" " />
                <label for="username" class="placeholder">Benutzername</label>
            </div>
            <div class="input-container">
                <input type="password" name="passwordLogin" placeholder=" " />
                <label for="password" class="placeholder">Passwort</label>
            </div>

            <button class="button" type="submit">
                Anmelden
            </button>
        </form>
    <section>
    <script src="../../../js/jQuery.min.js"></script>
    <script src="../../../js/create_user.js"></script>