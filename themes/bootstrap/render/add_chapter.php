<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item"><a href="title.php?slug=<?= $title->getSlug() ?>"><?= $title->getName() ?></a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Chapter</li>
    </ol>
</nav>

<form method="POST" name="addChapter">
    <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" class="form-control" id="number" name="number" value="<?= isset($_GET["number"]) || isset($_POST["number"]) ? cat($_GET["number"]) ?? cat($_POST["number"]) : "" ?>">
    </div>
    <div class="mb-3">
        <label for="lang" class="form-label">Language</label>
        <input type="text" maxlength="2" class="form-control" id="lang" name="lang" value="<?= isset($_POST["lang"]) || isset($_GET["lang"]) ? clean($_GET["lang"]) ?? clean($_POST["lang"]) : "" ?>">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= isset($_POST["name"]) ? clean($_POST["name"]) : "" ?>">
    </div>
    <div class="mb-3">
        <label for="data" class="form-label">Data</label>
        <textarea type="text" class="form-control" id="data" name="data"><?= isset($_POST["data"]) ? clean($_POST["data"]) : "" ?></textarea>
    </div>
    <div class="mb-3">
        <label for="notes" class="form-label">Notes</label>
        <textarea type="text" class="form-control" id="notes" name="notes"><?= isset($_POST["notes"]) ? clean($_POST["notes"]) : "" ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 100%;" name="addChapter">Add Chapter</button>
    <?php if ($error == true) { ?>
        <p class="text-center" style="color: red;"><b><?= $return ?></b></p>
    <?php } ?>
</form>