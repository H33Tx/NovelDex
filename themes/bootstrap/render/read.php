<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item"><a href="title.php?slug=<?= $title->getSlug() ?>"><?= $title->getName() ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Read</li>
    </ol>
</nav>
<div class="row">
    <div class="col-3">
        <div class="sticky-top">
            <h4><?= $title->getName() ?></h4>
            <div class="d-grid gap-2">
                <a class="btn btn-success" href="title.php?slug=<?= $title->getSlug() ?>">Return to Title</a>
            </div>
            <div id="chapterList" class="list-group" style="max-height: 90vh; overflow-y: auto;">
                <?php foreach ($chapters as $chapter) { ?>
                    <a class="list-group-item list-group-item-action" href="#chapter_<?= $chapter["id"] ?>"><?= chNo($chapter["number"]) ?></a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div data-bs-spy="scroll" data-bs-target="#chapterList" data-bs-smooth-scroll="true" tabindex="0" class="m-0 p-0">
            <?php foreach ($chapters as $chapter) { ?>
                <div style="min-height: 100vh" id="chapter_<?= $chapter["id"] ?>">
                    <h4><?= chNo($chapter["number"]) ?> <?= !empty($chapter["name"]) ? ": " . $chapter["name"] : "" ?></h4>
                    <?= $Parsedown->text($chapter["data"]) ?>
                    <?php if (!empty($chapter["notes"])) { ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Author's Notes</h5>
                                <?= $Parsedown->text($chapter["notes"]) ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <hr>
            <?php } ?>
        </div>
    </div>
</div>