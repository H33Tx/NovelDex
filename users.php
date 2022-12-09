<?php

require "load.php";
$page = "users";

$pagination = isset($_GET["pagination"]) && !empty($_GET["pagination"]) && is_numeric($_GET["pagination"]) ? clean($_GET["pagination"]) : 1;
$db->pageLimit = $config["perpage"];
$users = $db->orderBy("username", "ASC")->arraybuilder()->paginate("user", $pagination);
// echo "showing $page out of " . $db->totalPages;

include "themes/{$thme}/parts/header.php";
echo $core->title("Users - Page {$pagination}", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/users.php";
include "themes/{$thme}/parts/footer.php";
