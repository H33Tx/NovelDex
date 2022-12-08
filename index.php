<?php

require "load.php";
$page = "index";

include "themes/{$thme}/parts/header.php";
echo $core->title("Home", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
include "themes/{$thme}/render/index.php";
include "themes/{$thme}/parts/footer.php";
