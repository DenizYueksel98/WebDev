We found <?php if(isset($this->searchResultExplicit)){echo count($this->searchResultExplicit);}else{ echo "0";} ?> explicit matching items for your query '<?php echo $this->searchQuery; ?>'
<br>
If your aren't happy with that...
We found <?php if(isset($this->searchResultContains)){echo count($this->searchResultContains);}else{ echo "0";} ?> matching items containing your query '<?php echo $this->searchQuery; ?>'

<hr />
<?php if(isset($this->searchResultExplicit)){?> 
<section class=table>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>B2.1</th>
            <th>B2.2</th>
            <th>J</th>
            <th>4</th>
            <th>D1</th>
            <th>D2</th>
            <th>2</th>
            <th>5</th>
            <th>V9</th>
            <th>14</th>
            <th>P3</th>
            <th>NEFZ Verbrauch in.</th>
            <th>NEFZ Verbrauch au.</th>
            <th>NEFZ Verbrauch ko.</th>
            <th>NEFZ CO2-Emission ko.</th>
            <th>WLTP Sehr schnell</th>
            <th>WLTP Schnell</th>
            <th>WLTP Langsam</th>
            <th>WLTP CO2-Emission ko.</th>
        </tr>
        <?php foreach ($this->searchResultExplicit as $car) {?>
            <tr>
                <?php foreach($car as $singleCar){?>
                <td><?php echo $singleCar;?></td>
                <?php }?>
            </tr>
        <?php }} ?>
    </table>

</section>

<?php   if((isset($this->searchResultContains) && isset($this->searchResultExplicit)==false)
        ||(isset($this->searchResultContains) && isset($this->searchResultExplicit))){?> 
<section class=table>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>B2.1</th>
            <th>B2.2</th>
            <th>J</th>
            <th>4</th>
            <th>D1</th>
            <th>D2</th>
            <th>2</th>
            <th>5</th>
            <th>V9</th>
            <th>14</th>
            <th>P3</th>
            <th>NEFZ Verbrauch in.</th>
            <th>NEFZ Verbrauch au.</th>
            <th>NEFZ Verbrauch ko.</th>
            <th>NEFZ CO2-Emission ko.</th>
            <th>WLTP Sehr schnell</th>
            <th>WLTP Schnell</th>
            <th>WLTP Langsam</th>
            <th>WLTP CO2-Emission ko.</th>
        </tr>
        <?php foreach ($this->searchResultContains as $car) {?>
            <tr>
                <?php foreach($car as $singleCar){?>
                <td><?php echo $singleCar;?></td>
                <?php }?>
            </tr>
        <?php }} ?>
    </table>

</section>