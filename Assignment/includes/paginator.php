
<!-- Used to the bottom navigation buttons -->
<nav id="pages" class="justify-content-center">

<?php if($pagenator -> total_pages > 0): ?>

    <!-- to check if the search table is present or not -->
    <?php if (!isset($_POST['table_attr'])): ?>

        <!-- to disable the previous button if previous is none -->
        <?php if ($pagenator -> previous): ?>

            <a id="prev" class="btn btn-primary" 
                href="<?= isset($_GET['order']) ? "?page=".$pagenator -> previous."&order=".$_GET['order']."&type=".$_GET['type'] : 
                    "?page=".$pagenator -> previous ?>"
            >
                Previous
            </a>

        <?php else: ?>

            <a class="btn btn-primary disabled" href="#">Previous</a>

        <?php endif; ?>

        <!-- to display pages number buttons -->
        <?php for($i = 1; $i <= $pagenator -> total_pages; $i++): ?>

            <a 
                class="btn 
                <?php ($pagenator -> current_page  == $i) ? print_r("btn-outline-primary") : print_r("") ?>" 
                href="<?= 
                    isset($_GET['order']) 
                    ? "?page=".$i."&order=".$_GET['order']."&type=".$_GET['type'] 
                    : 
                    "?page=".$i 
                    ?>"
            >

                <?= $i ?>

            </a>

        <?php endfor; ?>

        <!-- to disable the next button if next is none -->
        <?php if ($pagenator -> next): ?>

            <a 
                id="next"
                class="btn btn-primary" 
                href="<?= 
                    isset($_GET['order']) 
                    ? 
                    "?page=".$pagenator -> next."&order=".$_GET['order']."&type=".$_GET['type'] 
                    : "
                    ?page=".$pagenator -> next 
                    ?>"
            >

                Next

            </a>

        <?php else: ?>

            <a class="btn btn-primary disabled" href="#">Next</a>

        <?php endif; ?>

<?php else: ?>

    <!-- to disable the previous button if previous is none -->
        <?php if ($pagenator -> previous): ?>

            <a 
                class="btn btn-primary navigate" 
                href="#"
                data-page="<?= $pagenator -> previous ?>"
            >

                Previous

            </a>

        <?php else: ?>

            <a class="btn btn-primary disabled" href="#">Previous</a>

        <?php endif; ?>

        <!-- to display page number buttons -->
        <?php for($i = 1; $i <= $pagenator -> total_pages; $i++): ?>

            <a 
                class="btn navigate <?php ($pagenator -> current_page  == $i) ? print_r("btn-outline-primary") : print_r("") ?>" 
                href="#"
                data-page="<?= $i ?>"
            >

                <?= $i ?>

            </a>

        <?php endfor; ?>

        <!-- to disable the next button if next is none -->
        <?php if ($pagenator -> next): ?>

            <a 
                class="btn btn-primary navigate" 
                data-page="<?= $pagenator -> next ?>"
            >

                Next

            </a>

        <?php else: ?>

            <a class="btn btn-primary disabled" href="#">Next</a>

        <?php endif; ?>
    
    <?php endif; ?>

<?php else: ?>

<?php endif ?>

</nav>