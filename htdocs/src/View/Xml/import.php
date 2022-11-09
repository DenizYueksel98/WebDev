<?php if (isset($this->error_message)) {
    print_r($this->error_message);
} else { ?>
    XML erfolgreich importiert und in die DB geladen.
<?php } ?>
<br>
<a class="button" href="index.php?c=xml">Zurück zur XML Übersicht</a>