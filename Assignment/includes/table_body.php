<!-- Body section of the table -->
<?php foreach($result[1] as $des): ?>

    <tr>

        <?php foreach($des as $d): ?>

            <th> <?= $d ?> </th>

        <?php endforeach; ?>

    </tr>
    
<?php endforeach; ?>