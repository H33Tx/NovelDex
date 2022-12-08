<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $title->getName() ?></li>
    </ol>
</nav>

<h2><?= $title->getName() ?></h2>
<p><?= $Parsedown->text($title->getSynopsis()) ?></p>

<?php if (!empty($chapters)) { ?>
    <ul class="list-group">
        <?php foreach ($chapters as $chapter) { ?>
            <li class="list-group-item">
                <a href="read.php?slug=<?= $title->getSlug() ?>&lang=<?= $chapter["lang"] ?>#chapter_<?= $chapter["id"] ?>">[Read]</a> <?= chNo($chapter["number"]) ?> - [<?= $chapter["lang"] ?>] <?= !empty($chapter["name"]) ? $chapter["name"] : "Unknown" ?>
                <span class="text-muted">
                    (<?= formatDate($chapter["timestamp"], true) ?>)
                    by <?= $user->get($chapter["user"], "id")["username"] ?>
                </span>
            </li>
        <?php } ?>
    </ul>
<?php } else { ?>
    <p>This Title has no chapters available.</p>
<?php } ?>