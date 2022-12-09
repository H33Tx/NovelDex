<?php

require "load.php";
$title = new Title(clean($_GET["slug"] ?? $_GET["id"]));
$page = "titles";

include "themes/{$thme}/parts/header.php";
if ($title->checkExistence() === true) {
    $lang = isset($_GET["lang"]) && !empty($_GET["lang"]) ? clean($_GET["lang"]) : $config["readinglang"];
    $chapters = $title->getChapters($lang, "number", "ASC");
    echo $core->title("Read " . $title->getName(), $config["seperator"], $config["title"]);
    include "themes/{$thme}/parts/menu.php";
    include "themes/{$thme}/render/read.php";
} else {
    echo $core->title("Error", $config["seperator"], $config["title"]);
    include "themes/{$thme}/parts/menu.php";
    include "themes/{$thme}/render/error.php";
}
include "themes/{$thme}/parts/footer.php";
