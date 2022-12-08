<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Index</a></li>
        <li class="breadcrumb-item active" aria-current="page">Account</li>
    </ol>
</nav>

<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link <?= isset($_POST["login"]) || !isset($_POST["signup"]) ? "active" : "" ?>" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="true">Login</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link <?= isset($_POST["signup"]) ? "active" : "" ?>" id="pills-signup-tab" data-bs-toggle="pill" data-bs-target="#pills-signup" type="button" role="tab" aria-controls="pills-signup" aria-selected="false">Signup</button>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade <?= isset($_POST["login"]) || !isset($_POST["signup"]) ? "show active" : "" ?>" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab" tabindex="0">
        <form method="POST" name="login">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary" style="width: 100%;" name="login">Login</button>
            <?php if ($error == true) { ?>
                <p class="text-center" style="color: red;"><b><?= $return ?></b></p>
            <?php } ?>
        </form>
    </div>
    <div class="tab-pane fade <?= isset($_POST["signup"]) ? "show active" : "" ?>" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab" tabindex="0">
        <form method="POST" name="signup">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary" style="width: 100%;" name="signup">Signup</button>
            <?php if ($error) { ?>
                <p class="text-center" style="color: red;"><b><?= $return ?></b></p>
            <?php } ?>
        </form>
    </div>
</div>