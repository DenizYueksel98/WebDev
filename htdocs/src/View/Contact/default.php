<form id="contact-form-id" class="contact-form-class" method="post" action="contact-form-process.php">

    <div class="contact-form">
        <label for="Name" class="contact-form-label">Ihr Name</label>
        <div class="contact-form-input-group">
            <input type="text" id="Name" name="Name" placeholder="Name" class="contact-form-control" required>
        </div>
    </div>

    <div class="contact-form">
        <label for="Email" class="contact-form-label">Ihre E-Mail Adresse</label>
        <div class="contact-form-input-group">
            <input type="email" id="Email" name="Email" placeholder ="E-Mail"  class="contact-form-control" required>
        </div>
    </div>

    <div class="contact-form">
        <label for="Message" class="contact-form-label">Ihre Nachricht</label>
        <div class="contact-form-input-group">
            <textarea id="Message" name="Message" placeholder="Nachricht" class="contact-form-control" rows="6" maxlength="3000" required></textarea>
        </div>
    </div>

    <div class="contact-form">
        <button class="button" type="submit" id="contact-form-btn" class="contact-form-button">Nachricht senden</button>
    </div>

</form>

