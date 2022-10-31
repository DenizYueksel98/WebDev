<section>
    <a href=index.php?c=car>Zurück zur Übersicht</a>
    <img src=./img/<?php echo $this->singleCar[0]['id'];?>.jpeg>
<?php
    if (isset($this->message)) {
        echo $this->message;
    ?>
        <ul>
            <li>ID: <?php echo $this->singleCar[0]['id'];?></li>
            <li>Name: <?php echo $this->singleCar[0]['name']; ?></li>
            <li>B2: <?php echo $this->singleCar[0]['b21']; ?></li>
            <li>B2: <?php echo $this->singleCar[0]['b22']; ?></li>
            <li>J: <?php echo $this->singleCar[0]['j']; ?></li>
            <li>4: <?php echo $this->singleCar[0]['vier']; ?></li>
            <li>D1: <?php echo $this->singleCar[0]['d1']; ?></li>
            <li>D2: <?php echo $this->singleCar[0]['d2']; ?></li>
            <li>2: <?php echo $this->singleCar[0]['zwei']; ?></li>
            <li>5: <?php echo $this->singleCar[0]['fuenf']; ?></li>
            <li>V9: <?php echo $this->singleCar[0]['v9']; ?></li>
            <li>14: <?php echo $this->singleCar[0]['vierzehn']; ?></li>
            <li>P3: <?php echo $this->singleCar[0]['p3']; ?></li>
            <li>NEFZ Verbrauch innerorts: <?php echo $this->singleCar[0]['verbin']; ?></li>
            <li>NEFZ Verbrauch au: <?php echo $this->singleCar[0]['verbau']; ?>.</li>
            <li>NEFZ Verbrauch ko: <?php echo $this->singleCar[0]['verbko']; ?>.</li>
            <li>NEFZ CO2-Emission kombiniert: <?php echo $this->singleCar[0]['co2kom']; ?></li>
            <li>WLTP Sehr schnell: <?php echo $this->singleCar[0]['sehrs']; ?></li>
            <li>WLTP Schnell: <?php echo $this->singleCar[0]['schnell']; ?></li>
            <li>WLTP Langsam: <?php echo $this->singleCar[0]['langsam']; ?></li>
            <li>WLTP CO2-Emission kombiniert: <?php echo $this->singleCar[0]['co2komb']; ?></li>
        </ul>
    <?php } else
        echo $message;
    ?>
</section>