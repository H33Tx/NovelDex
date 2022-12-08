<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item active" aria-current="page">Titles</li>
    </ol>
</nav>

<?php if (!empty($titles)) { ?>
    <div class="row">
        <?php foreach ($titles as $title) { ?>
            <div class="col-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $title["name"] ?></h5>
                        <p class="card-text text-justify"><?= shorten($title["synopsis"], 100) ?></p>
                        <div class="d-grid gap-2">
                            <a href="title.php?slug=<?= $title["slug"] ?>" class="btn btn-primary">Read Novel</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <p>No Titles found...</p>
<?php } ?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="?pagination=1" aria-label="Previous">
                <span aria-hidden="true">First</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?pagination=<?= $pagination - 1 > 0 ? $pagination - 1 : $pagination ?>" aria-label="Previous">
                <span aria-hidden="true">Prev</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $db->totalPages; $i++) { ?>
            <li class="page-item <?= $pagination == $i ? "active" : "" ?>"><a class="page-link" href="?pagination=<?= $i ?>">1</a></li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link" href="?pagination=<?= $i >= $db->totalPages ? $i - 1 : $i ?>" aria-label="Next">
                <span aria-hidden="true">Next</span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link" href="?pagination=<?= $db->totalPages ?>" aria-label="Next">
                <span aria-hidden="true">Last</span>
            </a>
        </li>
    </ul>
</nav>

<?php if ($level->canAddTitle == true || $level->canRequestTitle == true) { ?>
    <div class="d-grid gap-2">
        <a href="add_title.php" class="btn btn-primary">Add Title</a>
    </div>
<?php } ?>