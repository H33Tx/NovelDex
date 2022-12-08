<?php

require "load.php";
$page = "titles";

$pagination = isset($_GET["pagination"]) && !empty($_GET["pagination"]) && is_numeric($_GET["pagination"]) ? clean($_GET["pagination"]) : 1;
$db->pageLimit = $config["perpage"];
$titles = $db->where("approved", 1)->arraybuilder()->paginate("titles", $pagination);
// echo "showing $page out of " . $db->totalPages;

include "themes/{$thme}/parts/header.php";
echo $core->title("Titles - Page {$pagination}", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/titles.php";
include "themes/{$thme}/parts/footer.php";
