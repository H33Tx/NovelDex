<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

require "core/config.php";
require "core/funky.php";

include "lib/core.lib.php";
$core = new Core();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
$mail = new PHPMailer(true);

include "lib/MysqliDb.php";
include "lib/user.lib.php";
require "lib/Parsedown.php";
require "lib/title.lib.php";
require "lib/editor.lib.php";
require "lib/level.lib.php";
$db = new MysqliDb([
    'host' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PASSWORD,
    'db' => DB_NAME,
    'port' => DB_PORT,
    'prefix' => DB_PREFIX,
    'charset' => DB_CHARSET
]);
$user = new User();
$Parsedown = new Parsedown();
require "core/session.php";
$level = $logged ? $account["level"] : $config["level"]["guest"];
$level = new Level($level);
$editor = new Editor();


$thme = isset($_COOKIE[$config["cookie"] . "_theme"]) && !empty($_COOKIE[$config["cookie"] . "_theme"]) ? cat($_COOKIE[$config["cookie"] . "_theme"]) : $config["default_theme"];
require "themes/{$thme}/theme.php";
