<?php

require "load.php";
$page = "titles";
if (!$logged || !$level->addChap()) header("Location: account.php") && exit;
$title = new Title(cat($_GET["slug"] ?? $_GET["id"]));
$page = "titles";

if ($logged && $level->addChap()) {
    $error = false;
    if (isset($_POST["addChapter"])) {
        $number = cat($_POST["number"]);
        $lang = cat($_POST["lang"]);
        $name = clean($_POST["name"]);
        $data = clean($_POST["data"]);
        $notes = clean($_POST["notes"]);
        $return = $editor->addChapter($number, $lang, $title->getId(), $name, $data, $notes, $account["id"]);
        if ($return === true)
            $number++ && header("Refresh: 0; url=add_chapter.php?slug={$title->getSlug()}&number={$number}&lang={$lang}");
        else
            $error = true;
    }
}

include "themes/{$thme}/parts/header.php";
echo $core->title("Add Chapter for " . $title->getName(), $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/add_chapter.php";
include "themes/{$thme}/parts/footer.php";
