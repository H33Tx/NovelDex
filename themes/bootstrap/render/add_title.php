<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item"><a href="titles.php">Titles</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Title</li>
    </ol>
</nav>

<form method="POST" name="addTitle">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="synopsis" class="form-label">Synposis</label>
        <textarea type="text" class="form-control" id="synopsis" name="synopsis"><?= isset($_POST["synopsis"]) ? clean($_POST["synopsis"]) : "" ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" style="width: 100%;" name="addTitle">Add Title</button>
    <?php if ($error == true) { ?>
        <p class="text-center" style="color: red;"><b><?= $return ?></b></p>
    <?php } ?>
</form>