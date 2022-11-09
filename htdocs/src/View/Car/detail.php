<section>
    <!-- ZURÜCK BUTTON-->
    <form class="inline" action=?c=car&a=detail&i=<?php if($this->car->getid()===1){echo 1;}else{echo ($this->car->getid()-1);} ; ?> method="post">
        <button type="submit"><span class="typcn typcn-arrow-left"></button>
    </form>
    <!--ÜBERSICHTS BUTTON-->
    <a class="btn" href=?c=car>Zurück zur Übersicht</a>
    <!--VORWÄRTS BUTTON-->
    <form class="inline" action=?c=car&a=detail&i=<?php echo ($this->car->getid() + 1); ?> method="post">
        <button type="submit"><span class="typcn typcn-arrow-right"></button>
    </form>
    <br>
    <!--falls ein passendes Bild zur ID gefunden wurde-->
    <?php if (file_exists('./img/' . $this->car->getid() . '.jpeg')) { ?>
        <img src=./img/<?php echo $this->car->id; ?>.jpeg>
    <?php } else { ?>
    <!--falls kein Bild gefunden wurde, Upload Fenster einblenden-->        
        <form class="upload" action=index.php?c=car&a=uploadImage&i=<?php echo $this->car->id;?> method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    <?php }
    if (isset($this->car)) {
    ?>
        <table>
            <tr>
                <th>Technische Daten von <?php echo $this->car->name ?></th>
                <th></th>
            </tr>
            <tr>
                <td>ID:</td>
                <td><?php echo $this->car->id;        ?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo $this->car->name;      ?></td>
            </tr>
            <tr>
                <td>B2.1:</td>
                <td><?php echo $this->car->b21;       ?></td>
            <tr>
                <td>B2.2:</td>
                <td><?php echo $this->car->b22;       ?></td>
            </tr>
            <tr>
                <td>J:</td>
                <td><?php echo $this->car->j;         ?></td>
            </tr>
            <tr>
                <td>4:</td>
                <td><?php echo $this->car->vier;      ?></td>
            </tr>
            <tr>
                <td>D1:</td>
                <td><?php echo $this->car->d1;        ?></td>
            </tr>
            <tr>
                <td>D2:</td>
                <td><?php echo $this->car->d21;
                    echo "<br>";
                    echo $this->car->d22;
                    echo "<br>";
                    echo $this->car->d23; ?></td>
            </tr>
            <tr>
                <td>2:</td>
                <td><?php echo $this->car->zwei;      ?></td>
            </tr>
            <tr>
                <td>5:</td>
                <td><?php echo $this->car->fuenf1;
                    echo "<br>";
                    echo $this->car->fuenf2; ?></td>
            </tr>
            <tr>
                <td>V9:</td>
                <td><?php echo $this->car->v9;        ?></td>
            </tr>
            <tr>
                <td>14:</td>
                <td><?php echo $this->car->vierzehn;  ?></td>
            </tr>
            <tr>
                <td>P3:</td>
                <td><?php echo $this->car->p3;        ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch innerorts:</td>
                <td><?php echo $this->car->verbin." ".$this->car->verb_unit;   ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch außerorts:</td>
                <td><?php echo $this->car->verbau." ".$this->car->verb_unit;  ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch kombiniert:</td>
                <td><?php echo $this->car->verbko." ".$this->car->verb_unit;  ?></td>
            </tr>
            <tr>
                <td>NEFZ CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->co2kom." ".$this->car->co2_unit;  ?></td>
            </tr>
            <tr>
                <td>WLTP Sehr schnell:</td>
                <td><?php echo $this->car->sehrs." ".$this->car->verb_unit;   ?></td>
            </tr>
            <tr>
                <td>WLTP Schnell:</td>
                <td><?php echo $this->car->schnell." ".$this->car->verb_unit; ?></td>
            </tr>
            <tr>
                <td>WLTP Langsam:</td>
                <td><?php echo $this->car->langsam." ".$this->car->verb_unit; ?></td>
            </tr>
            <tr>
                <td>WLTP CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->co2komW." ".$this->car->co2_unit; ?></td>
            </tr>
        </table>
    <?php } else
        echo 0;
    ?>
</section>