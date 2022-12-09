<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Index</li>
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
    <p class="m-2">No Titles found...</p>
<?php } ?>

<?php if (!empty($chapters)) { ?>
    <ul class="list-group">
        <?php foreach ($chapters as $chapter) { ?>
            <?php $title = new Title($chapter["title"]); ?>
            <li class="list-group-item">
                <a href="read.php?slug=<?= $title->getSlug() ?>&lang=<?= $chapter["lang"] ?>#chapter_<?= $chapter["id"] ?>">[Read]</a>
                <a href="title.php?slug=<?= $title->getSlug() ?>"><?= $title->getName() ?></a> - <?= chNo($chapter["number"]) ?> - [<?= $chapter["lang"] ?>] <?= !empty($chapter["name"]) ? $chapter["name"] : "Unknown" ?>
                <span class="text-muted">
                    (<?= formatDate($chapter["timestamp"], true) ?>)
                    by <?= $user->get($chapter["user"], "id")["username"] ?>
                </span>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p class="m-2">No Chapters found...</p>
<?php } ?>

<?php if (!empty($users)) { ?>
    <div class="row mt-4">
        <?php foreach ($users as $user) { ?>
            <div class="col-2 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?= $user["username"] ?></h5>
                        <!-- <p class="card-text text-justify">Joined <?= formatDate($user["timestamp"], true) ?></p> -->
                        <div class="d-grid gap-2">
                            <a href="user.php?name=<?= $user["username"] ?>" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } else { ?>
    <p class="m-2">No Users found...</p>
<?php } ?>