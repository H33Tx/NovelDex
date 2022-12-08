<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
    </ol>
</nav>

<?php if ($level->checkVerified() == false) { ?>
    <div class="alert alert-danger" role="alert">
        Your account has not been verified yet. We sent you an email with a link that can do so. It should arrive soon. Make sure to check your spam folder as well.
    </div>
<?php } ?>

<div class="d-grid gap-2">
    <a class="btn btn-danger" href="logout.php">Logout</a>
</div>