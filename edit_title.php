<?php

require "load.php";
$page = "titles";
if (!$logged || !$level->editTitle()) header("Location: account.php") && exit;
$title = new Title(cat($_GET["slug"] ?? $_GET["id"]));
$page = "titles";

if ($logged && $level->editTitle()) {
    $error = false;
    if (isset($_POST["addTitle"])) {
        $name = clean($_POST["name"]);
        $synopsis = clean($_POST["synopsis"]);
        $slug = "";
        if ($level->isSpecial())
            $slug = cat($_POST["slug"]);
        $return = $editor->editTitle($title->getId(), $name, $synopsis, $slug);
        if ($return)
            header("Location: title.php?id={$title->getId()}") && exit;
        else
            $error = true;
    }
}

include "themes/{$thme}/parts/header.php";
echo $core->title("Edit Title", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/edit_title.php";
include "themes/{$thme}/parts/footer.php";
