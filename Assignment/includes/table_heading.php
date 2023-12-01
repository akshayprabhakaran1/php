<!-- Heading section of the table -->
<tr>
    <?php foreach($table_heading as $heading): ?>
        <th scope="col">
            <div class="title-sort">
                <div class="title m-2">
                    <?= ucwords($heading) ?>
                </div>
                <div class="sort-btn">
                    <div data-order=<?= $heading ?> data-type= "ASC">
                        <i class="bi bi-caret-up-fill"></i>
                    </div>
                    <div data-order=<?= $heading ?> data-type= "DESC">
                        <i class="bi bi-caret-down-fill"></i>
                    </div>
                </div>
            </div>
            <input 
                class="search" 
                id="<?= $heading ?>" 
                type="text" 
                style="display:table-cell; 
                        width:100%;
                        border-radius:5px"
            >
        </th>
    <?php endforeach; ?>
</tr>