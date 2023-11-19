<tr>
    <?php foreach($t_heading as $heading): ?>
        <th> 
            <div class="title-sort">
                <div class="title">
                    <?= $heading ?>
                </div>
                <div class="sort-btn">
                    <a 
                        href="?page=<?= $_GET['page'] ?? 1 ?>&order=<?= $heading ?>&type=ASC"
                    >
                        <i class="bi bi-caret-up-fill"></i>
                    </a>
                    <a 
                        href="?page=<?= $_GET['page'] ?? 1 ?>&order=<?= $heading ?>&type=DESC"
                    >
                        <i class="bi bi-caret-down-fill"></i>
                    </a>
                </div>
            </div>
            <input 
                class="search" 
                id="<?= $heading ?>" 
                type="text" 
                style="display:table-cell; width:100%"
            >
        </th>
    <?php endforeach; ?>
</tr>