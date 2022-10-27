<h1>Falls du dich schon registriert hast, kannst du dich auch hier anmelden</h1>
<form action="http://localhost:8080/src/Model/User/authenticate.php" method="post">
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