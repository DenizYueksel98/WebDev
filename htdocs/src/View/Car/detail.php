<section>
    <a href=index.php?c=car>Zurück zur Übersicht</a>
    <?php echo $this->car->getid(); ?>
    <?php if (file_exists('./img/' . $this->car->getid() . '.jpeg')) { ?>
        <img src=./img/<?php echo $this->car->id; ?>.jpeg>
    <?php } else { ?>
        <form action="index.php?c=car&a=uploadImage&i=<?php echo $this->car->id; ?>" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    <?php }
    if (isset($this->car)) {
    ?>
        <table>
            <tr>
                <th>Technische Daten von <?php echo $this->car->name?></th>
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
                <td><?php echo $this->car->d2;        ?></td>
            </tr>
            <tr>
                <td>2:</td>
                <td><?php echo $this->car->zwei;      ?></td>
            </tr>
            <tr>
                <td>5:</td>
                <td><?php echo $this->car->fuenf;     ?></td>
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
                <td>NEFZ Verbrauch innerorts</td>
                <td><?php echo $this->car->verbin;   ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch au</td>
                <td><?php echo $this->car->verbau;  ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch ko</td>
                <td><?php echo $this->car->verbko;  ?></td>
            </tr>
            <tr>
                <td>NEFZ CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->co2kom;  ?></td>
            </tr>
            <tr>
                <td>WLTP Sehr schnell</td>
                <td><?php echo $this->car->sehrs;   ?></td>
            </tr>
            <tr>
                <td>WLTP Schnell:</td>
                <td><?php echo $this->car->schnell; ?></td>
            </tr>
            <tr>
                <td>WLTP Langsam:</td>
                <td><?php echo $this->car->langsam; ?></td>
            </tr>
            <tr>
                <td>WLTP CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->co2komb; ?></td>
            </tr>
        </table>
    <?php } else
        echo 0;
    ?>
</section>