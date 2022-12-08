<?php

function clean($data)
{
    // This function is used, to completely sanitize user-input and make any form of scripts harmless and displayable
    $data = htmlspecialchars($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = trim($data);
    $data = str_replace("'", "\'", $data);
    return $data;
}

function cat($title, $lower = "false")
{
    // This function is used, to make all titles readable for the URL and links
    if ($lower == true) {
        return preg_replace('/[^A-Za-z0-9\-_,.]/', '', str_replace("&", "et", str_replace(' ', '-', strtolower($title))));
    } else {
        return preg_replace('/[^A-Za-z0-9\-_ ]/', '', str_replace("&", "et", $title));
    }
}

function cryptCode()
{
    require "config.php";
    return $config["salt"];
}

function cookieName()
{
    require "config.php";
    return $config["cookie"];
}

function dbp()
{
    require "config.php";
    return DB_PREFIX;
}

function genToken()
{
    return md5(rand());
}

function shorten($text, $max = 50)
{
    if (strlen($text) > $max) {
        $text = substr($text, 0, $max) . '...';
    }
    return $text;
}

function chNo($data)
{
    $out = "Chapter ";
    if (substr($data, -2) == ".0") return substr($out . $data, 0, -2);
    return $out . $data;
}

function formatDate($date, $full = false)
{
    $date = clean($date);

    $s = $date;
    $date = strtotime($s);
    if ($full == false) {
        return date('d. M Y', $date);
    } else {
        return date('d. M Y H:m:i', $date);
    }
}
