<?php

require "load.php";
$title = new Title(cat($_GET["slug"] ?? $_GET["id"]));
$page = "titles";

include "themes/{$thme}/parts/header.php";
if ($title->checkExistence() === true && $title->checkApproved() === true) {
    $chapters = $title->getChapters();
    // print_r($chapters);
    echo $core->title("Title: " . $title->getName(), $config["seperator"], $config["title"]);
    include "themes/{$thme}/parts/menu.php";
    include "themes/{$thme}/render/title.php";
} else {
    echo $core->title("Error", $config["seperator"], $config["title"]);
    include "themes/{$thme}/parts/menu.php";
    include "themes/{$thme}/render/error.php";
}
include "themes/{$thme}/parts/footer.php";
