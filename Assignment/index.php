<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include "includes/header.php"; ?>
    </head>
    <body>
        <div class="main">
            <h1 style="text-align: center">Table Of Books</h1>
            <h2>Total No: of Records: <?= $total_records; ?></h2>
            <div class="table-responsive">
                <table class=" table table-striped table-hover table-bordered rounded-3 overflow-hidden"
                    style="table-layout: fixed; word-wrap: break-word;">
                    <thead class="thead-dark">
                        <?php include "includes/table_heading.php"; ?>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div id="pagination">

            </div>
        </div>
        <footer>
            <?php include "includes/footer.php"; ?>
        </footer>
    </body>
</html>