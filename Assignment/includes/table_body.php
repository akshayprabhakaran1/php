<!-- Body section of the table -->
<?php if(!empty($result[1])): ?>
    <?php foreach($result[1] as $des): ?>
        <tr>
            <?php foreach($des as $d): ?>
                <td> <?= $d ?> </td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="<?= count($result[0]) ?>" style="text-align:center">
            Record Not Found
        </td>
    </tr>
<?php endif; ?>