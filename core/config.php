<?php

$config["title"] = "NovelStorm";
$config["url"] = "http://localhost/novelstorm/";
$config["default_theme"] = "bootstrap";
$config["seperator"] = "/";
$config["salt"] = 'c4FWkzW5$$V*qkANrH7f'; // You should change this before using first time.
$config["cookie"] = "ns";
$config["perpage"] = 24;
$config["readinglang"] = "en";
$config["email"] = "saintly@h33t.moe";

$config["level"]["guest"] = 0;
$config["level"]["banned"] = 1;
$config["level"]["nonactivated"] = 99;
$config["level"]["activated"] = 100;
$config["level"]["uploader"] = 101;
$config["level"]["mod"] = 200;
$config["level"]["admin"] = 999;

if (!defined("DB_HOST")) define("DB_HOST", "localhost");
if (!defined("DB_NAME")) define("DB_NAME", "novelstorm");
if (!defined("DB_CHARSET")) define("DB_CHARSET", "utf8");
if (!defined("DB_USER")) define("DB_USER", "root");
if (!defined("DB_PREFIX")) define("DB_PREFIX", "");
if (!defined("DB_PORT")) define("DB_PORT", 3306);
if (!defined("DB_PASSWORD")) define("DB_PASSWORD", "");

if (!defined("PATH_LIB")) define("PATH_LIB", __DIR__ . DIRECTORY_SEPARATOR);
if (!defined("PATH_BASE")) define("PATH_BASE", dirname(PATH_LIB) . DIRECTORY_SEPARATOR);
