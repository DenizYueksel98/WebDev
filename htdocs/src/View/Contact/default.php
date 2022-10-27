<form id="contact-form-id" class="contact-form-class" method="post" action="contact-form-process.php">

    <div class="contact-form">
        <label for="Name" class="contact-form-label">Your name</label>
        <div class="contact-form-input-group">
            <input type="text" id="Name" name="Name" class="contact-form-control" required>
        </div>
    </div>

    <div class="contact-form">
        <label for="Email" class="contact-form-label">Your email address</label>
        <div class="contact-form-input-group">
            <input type="email" id="Email" name="Email" class="contact-form-control" required>
        </div>
    </div>

    <div class="contact-form">
        <label for="Message" class="contact-form-label">Your message</label>
        <div class="contact-form-input-group">
            <textarea id="Message" name="Message" class="contact-form-control" rows="6" maxlength="3000" required></textarea>
        </div>
    </div>

    <div class="contact-form">
        <button type="submit" id="contact-form-btn" class="contact-form-button">Send Message</button>
    </div>

</form>