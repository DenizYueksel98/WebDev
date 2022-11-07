<section>
    <a href=index.php?c=car>Zurück zur Übersicht</a>
    <?php echo $this->car->getid();?>
    <?php if(file_exists('./img/'.$this->car->getid().'.jpeg')){?>
    <img src=./img/<?php echo $this->car->id;?>.jpeg>
<?php }
    else{?>
        <form action="index.php?c=car&a=uploadImage&i=<?php echo $this->car->id;?>" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>
    <?php }
    if (isset($this->car)) {
    ?>
        <ul>
            <li>ID:     <?php   echo $this->car->id;        ?></li>
            <li>Name:   <?php   echo $this->car->name;      ?></li>
            <li>B2:     <?php   echo $this->car->b21;       ?></li>
            <li>B2:     <?php   echo $this->car->b22;       ?></li>
            <li>J:      <?php   echo $this->car->j;         ?></li>
            <li>4:      <?php   echo $this->car->vier;      ?></li>
            <li>D1:     <?php   echo $this->car->d1;        ?></li>
            <li>D2:     <?php   echo $this->car->d2;        ?></li>
            <li>2:      <?php   echo $this->car->zwei;      ?></li>
            <li>5:      <?php   echo $this->car->fuenf;     ?></li>
            <li>V9:     <?php   echo $this->car->v9;        ?></li>
            <li>14:     <?php   echo $this->car->vierzehn;  ?></li>
            <li>P3:     <?php   echo $this->car->p3;        ?></li>
            <li>NEFZ Verbrauch innerorts:   <?php   echo $this->car->verbin." ".$this->car->verbin_unit;  ?></li>
            <li>NEFZ Verbrauch au:          <?php   echo $this->car->verbau;  ?></li>
            <li>NEFZ Verbrauch ko:          <?php   echo $this->car->verbko;  ?></li>
            <li>NEFZ CO2-Emission kombiniert:<?php  echo $this->car->co2kom;  ?></li>
            <li>WLTP Sehr schnell:          <?php   echo $this->car->sehrs;   ?></li>
            <li>WLTP Schnell:               <?php   echo $this->car->schnell; ?></li>
            <li>WLTP Langsam:               <?php   echo $this->car->langsam; ?></li>
            <li>WLTP CO2-Emission kombiniert: <?php echo $this->car->co2komb; ?></li>
        </ul>
    <?php } else
        echo 0;
    ?>
</section>