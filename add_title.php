<?php

require "load.php";
$page = "titles";
if ($logged == false) header("Location: account.php") && exit;

if ($logged == true && ($level->addTitle() == true || $level->reqTitle() == true)) {
    $error = false;
    if (isset($_POST["addTitle"])) {
        $name = clean($_POST["name"]);
        $synopsis = clean($_POST["synopsis"]);
        $approved = $level->addTitle() == true || $level->reqTitle() == true ? true : false;
        $return = $editor->addTitle($name, $synopsis, $approved);
        if (is_numeric($return))
            header("Location: title.php?id={$return}") && exit;
        else
            $error = true;
    }
}

include "themes/{$thme}/parts/header.php";
echo $core->title("Add Title", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/add_title.php";
include "themes/{$thme}/parts/footer.php";
