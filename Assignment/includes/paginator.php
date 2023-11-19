<nav id="pages" class="justify-content-center">

        <!-- to disable the previous button if previous is none -->
        <?php if ($pagenator -> previous): ?>
            <a 
                id="prev"
                class="btn btn-primary" 
                href="<?= isset($_GET['order']) ? "?page=".$pagenator -> previous."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$pagenator -> previous ?>"
            >
                Previous
            </a>
        <?php else: ?>
            <a class="btn btn-primary disabled" href="#">Previous</a>
        <?php endif; ?>

        <!-- to display pages -->
        <?php for($i = 1; $i <= $pagenator -> total_pages; $i++): ?>
            <a 
                class="btn" 
                href="<?= isset($_GET['order']) ? "?page=".$i."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$i ?>"
            >
                <?= $i ?>
            </a>
        <?php endfor; ?>

        <!-- to disable the next button if next is none -->
        <?php if ($pagenator -> next): ?>
            <a 
                id="next"
                class="btn btn-primary" 
                href="<?= isset($_GET['order']) ? "?page=".$pagenator -> next."&order=".$_GET['order']."&type=".$_GET['type'] : "?page=".$pagenator -> next ?>"
            >
                Next
            </a>
        <?php else: ?>
            <a class="btn btn-primary disabled" href="#">Next</a>
        <?php endif; ?>

    </nav>