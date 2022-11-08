<section>
    <form class="form" method="post" action="contact.php">
    <h1>Schick uns hier ganz einfach eine Nachricht:</h1>
        <div>
            <div class="input-container">
                <input type="text" id="Name" name="Name" placeholder=" " required>
                <label for="Name" class="placeholder">Wie dürfen wir dich nennen:</label>
            </div>
        </div>
        <div>
            <div class="input-container">
                <input type="email" id="Email" name="Email" placeholder=" " required>
                <label for="Email" class="placeholder">Unter welcher E-Mail bist du zu erreichen:</label>
            </div>
        </div>
        <div>
            <div class="input-container">
                <input id="Message" name="Message" placeholder=" " required></textarea>
                <label for="Message" class="placeholder">Deine Nachricht an uns:</label>
            </div>
        </div>
        <input class="button" id="submit-btn" value="Senden" type="submit" />
    </form>
</section>