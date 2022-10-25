<section class="table">
    <table>
        <tr>
            <th>
                Nummer
            </th>
            <th>
                Marke
            </th>
            <th>
                &nbsp;
            </th>                    
        </tr>
<?php foreach($this->carModel as $car): ?>
        <tr>
            <td>
                1
            </td>
            <td>
                <?php echo $car; ?>
            </td>
            <td>
                <a href="#">show details</a>
            </td>                                        
        </tr>
<?php endforeach; ?>                                      
    </table>
</section>