<?php

require "load.php";
$page = "logout";

if ($logged == true) {
    $db->where("user", $account["id"])->delete("sessions");
    setcookie($config["cookie"] . "_session", "", time() - 60 * 60 * 24 * 30, "/");
    session_destroy();
    session_unset();
}
header("Location: account.php");
die("You logged out. Now hush");

include "themes/{$thme}/parts/header.php";
echo $core->title("Logout", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/index.php";
include "themes/{$thme}/parts/footer.php";
