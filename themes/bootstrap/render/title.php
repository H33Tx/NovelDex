<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title->getName() ?></li>
    </ol>
</nav>

<h2><?= $title->getName() ?></h2>
<p><?= $Parsedown->text($title->getSynopsis()) ?></p>

<?php if ($level->editTitle() || $level->addChap()) { ?>
    <div class="row">
        <?php if ($level->addChap()) { ?>
            <div class="col">
                <a class="col-12 btn btn-primary" href="add_chapter.php?slug=<?= $title->getSlug() ?>">Add Chapter</a>
            </div>
        <?php } ?>
        <?php if ($level->editTitle()) { ?>
            <div class="col">
                <a class="col-12 btn btn-primary" href="edit_title.php?slug=<?= $title->getSlug() ?>">Edit Title</a>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<ul class="list-group mt-3">
    <?php if (!empty($chapters)) { ?>
        <?php foreach ($chapters as $chapter) { ?>
            <li class="list-group-item">
                <a href="read.php?slug=<?= $title->getSlug() ?>&lang=<?= $chapter["lang"] ?>#chapter_<?= $chapter["id"] ?>">[Read]</a> <?= chNo($chapter["number"]) ?> - [<?= $chapter["lang"] ?>] <?= !empty($chapter["name"]) ? $chapter["name"] : "Unknown" ?>
                <span class="text-muted">
                    (<?= formatDate($chapter["timestamp"], true) ?>)
                    by <?= $user->get($chapter["user"], "id")["username"] ?>
                </span>
            </li>
        <?php } ?>
    <?php } else { ?>
        <li class="list-group-item">
            This Title has no chapters available.
        </li>
    <?php } ?>
</ul>