<section>
    <!-- ZURÜCK BUTTON-->
    <form class="inline" action=?c=car&a=detail&i=<?php if($this->car->__get('id')===1){echo 1;}else{echo ($this->car->__get('id')-1);} ; ?> method="post">
        <button type="submit"><span class="typcn typcn-arrow-left"></button>
    </form>
    <!--ÜBERSICHTS BUTTON-->
    <a class="btn" href=?c=car>Zurück zur Übersicht</a>
    <!--VORWÄRTS BUTTON-->
    <form class="inline" action=?c=car&a=detail&i=<?php echo ($this->car->__get('id') + 1); ?> method="post">
        <button type="submit"><span class="typcn typcn-arrow-right"></button>
    </form>
    <br>
    <!--falls ein passendes Bild zur ID gefunden wurde-->
    <?php if (file_exists('./img/' . $this->car->__get('id') . '.jpeg')) { ?>
        <img src=./img/<?php echo $this->car->__get('id'); ?>.jpeg>
    <?php } else { ?>
    <!--falls kein Bild gefunden wurde, Upload Fenster einblenden-->        
        <form class="upload" action=index.php?c=car&a=uploadImage&i=<?php echo $this->car->__get('id');?> method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    <?php }
    if (isset($this->car)) {
    ?>
        <table>
            <tr>
                <th>Technische Daten von <?php echo $this->car->__get('name'); ?></th>
                <th></th>
            </tr>
            <tr>
                <td>ID:</td>
                <td><?php echo $this->car->__get('id');        ?></td>
            </tr>
            <tr>
                <td>Name:</td>
                <td><?php echo $this->car->__get('name');      ?></td>
            </tr>
            <tr>
                <td>B2.1:</td>
                <td><?php echo $this->car->__get('b21');       ?></td>
            <tr>
                <td>B2.2:</td>
                <td><?php echo $this->car->__get('b22');       ?></td>
            </tr>
            <tr>
                <td>J:</td>
                <td><?php echo $this->car->__get('j');         ?></td>
            </tr>
            <tr>
                <td>4:</td>
                <td><?php echo $this->car->__get('vier');      ?></td>
            </tr>
            <tr>
                <td>D1:</td>
                <td><?php echo $this->car->__get('d1');        ?></td>
            </tr>
            <tr>
                <td>D2:</td>
                <td><?php echo $this->car->__get('d21');
                    echo "<br>";
                    echo $this->car->__get('d22');
                    echo "<br>";
                    echo $this->car->__get('d23'); ?></td>
            </tr>
            <tr>
                <td>2:</td>
                <td><?php echo $this->car->__get('zwei');      ?></td>
            </tr>
            <tr>
                <td>5:</td>
                <td><?php echo $this->car->__get('fuenf1');
                    echo "<br>";
                    echo $this->car->__get('fuenf2'); ?></td>
            </tr>
            <tr>
                <td>V9:</td>
                <td><?php echo $this->car->__get('v9');        ?></td>
            </tr>
            <tr>
                <td>14:</td>
                <td><?php echo $this->car->__get('vierzehn');  ?></td>
            </tr>
            <tr>
                <td>P3:</td>
                <td><?php echo $this->car->__get('p3');        ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch innerorts:</td>
                <td><?php echo $this->car->__get('verbin')." ".$this->car->__get('verb_unit');   ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch außerorts:</td>
                <td><?php echo $this->car->__get('verbau')." ".$this->car->__get('verb_unit');  ?></td>
            </tr>
            <tr>
                <td>NEFZ Verbrauch kombiniert:</td>
                <td><?php echo $this->car->__get('verbko')." ".$this->car->__get('verb_unit');  ?></td>
            </tr>
            <tr>
                <td>NEFZ CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->__get('co2komN')." ".$this->car->__get('co2_unit');  ?></td>
            </tr>
            <tr>
                <td>WLTP Sehr schnell:</td>
                <td><?php echo $this->car->__get('sehrs')." ".$this->car->__get('verb_unit');   ?></td>
            </tr>
            <tr>
                <td>WLTP Schnell:</td>
                <td><?php echo $this->car->__get('schnell')." ".$this->car->__get('verb_unit'); ?></td>
            </tr>
            <tr>
                <td>WLTP Langsam:</td>
                <td><?php echo $this->car->__get('langsam')." ".$this->car->__get('verb_unit'); ?></td>
            </tr>
            <tr>
                <td>WLTP CO2-Emission kombiniert:</td>
                <td><?php echo $this->car->__get('co2komW')." ".$this->car->__get('co2_unit'); ?></td>
            </tr>
        </table>
    <?php } else
        echo 0;
    ?>
</section>