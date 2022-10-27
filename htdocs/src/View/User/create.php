<script src="../../../js/jQuery.min.js" type="text/javascript"></script>
<script src="../../../js/create_user.js"></script>
<section>
    <h1>Register here for our database </h1>
    <p>Use this handy form to register for our car database.</p>

    <form id="regform" method="post">
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
        <!--input name="secret" type="hidden" value="1b3a9374-1a8e-434e-90ab-21aa7b9b80e7" /-->
        <input value="registrieren" style="position: absolute" class="registerbutton" id="submit" type="submit">

    </form>
</section>