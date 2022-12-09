<?php

require "load.php";
$page = "index";

$titles = $db->orderBy("timestamp", "DESC")->where("approved", 1)->get("titles", 8);
$chapters = $db->orderBy("timestamp", "DESC")->get("chapters", 32);
$users = $db->orderBy("timestamp", "DESC")->get("user", 12);

include "themes/{$thme}/parts/header.php";
echo $core->title("Home", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/index.php";
include "themes/{$thme}/parts/footer.php";
