</head>

<body class="container">
    <h1 class="text-center"><a href="<?= $config["url"] ?>"><?= $config["title"] ?></a></h1>
    <ul class="nav nav-tabs nav-fill" style="margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link <?= $page == "index" ? "active \" aria-current=\"page" : ""; ?>" href="index.php">Index</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page == "titles" ? "active \" aria-current=\"page" : ""; ?>" href="titles.php">Titles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page == "search" ? "active \" aria-current=\"page" : ""; ?>" href="search.php">Search</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page == "users" ? "active \" aria-current=\"page" : ""; ?>" href="users.php">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $page == "account" ? "active \" aria-current=\"page" : ""; ?>" href="account.php">Account</a>
        </li>
    </ul>