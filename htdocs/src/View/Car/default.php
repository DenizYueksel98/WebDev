    
    <section class="table">
    <?php
    if (isset($this->message)) {
        echo $this->message;
    ?>
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
            <?php foreach ($this->carModel as $car) { ?>
                <tr>
                    <td><?php $id= $car['id'];echo $car['id'];?><br><a href=?c=car&a=detail&i=<?php echo $id?>>Show details</a></td>
                    <td><?php echo $car['name']; ?></td>
                    <td><?php echo $car['b21']; ?></td>
                    <td><?php echo $car['b22']; ?></td>
                    <td><?php echo $car['j']; ?></td>
                    <td><?php echo $car['vier']; ?></td>
                    <td><?php echo $car['d1']; ?></td>
                    <td><?php echo $car['d2']; ?></td>
                    <td><?php echo $car['zwei']; ?></td>
                    <td><?php echo $car['fuenf']; ?></td>
                    <td><?php echo $car['v9']; ?></td>
                    <td><?php echo $car['vierzehn']; ?></td>
                    <td><?php echo $car['p3']; ?></td>
                    <td><?php echo $car['verbin']; ?></td>
                    <td><?php echo $car['verbau']; ?></td>
                    <td><?php echo $car['verbko']; ?></td>
                    <td><?php echo $car['co2kom']; ?></td>
                    <td><?php echo $car['sehrs']; ?></td>
                    <td><?php echo $car['schnell']; ?></td>
                    <td><?php echo $car['langsam']; ?></td>
                    <td><?php echo $car['co2komb']; ?></td>
                </tr>
        <?php }
        } else
            echo $message;
        ?>
        </table>
</section>