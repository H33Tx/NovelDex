<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item"><a href="title.php?slug=<?= $title->getSlug() ?>"><?= $title->getName() ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Title</li>
    </ol>
</nav>

<form method="POST" name="addTitle">
    <?= !$level->isSpecial() ? "<fieldset disabled>" : "" ?>
    <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="<?= $title->getSlug() ?>" aria-describedby="slugHelp">
        <div id="slugHelp" class="form-text">Changing this will make all old links invalid. Only Staff can edit this. Report Title to change it as normal user.</div>
    </div>
    <?= !$level->isSpecial() ? "</fieldset>" : "" ?>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $title->getName() ?>">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label">Synposis</label>
        <textarea type="text" class="form-control" id="synopsis" name="synopsis"><?= isset($_POST["synopsis"]) ? clean($_POST["synopsis"]) : "" ?><?= $title->getSynopsis() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 100%;" name="addTitle">Edit Title</button>
    <?php if ($error == true) { ?>
        <p class="text-center" style="color: red;"><b><?= $return ?></b></p>
    <?php } ?>
</form>