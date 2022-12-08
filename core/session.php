<?php

if ((isset($_COOKIE[$config["cookie"] . "_session"]) && !empty($_COOKIE[$config["cookie"] . "_session"])) || (isset($_SESSION[$config["cookie"] . "_session"]) && !empty($_SESSION[$config["cookie"] . "_session"]))) {
    $token = clean($_COOKIE[$config["cookie"] . "_session"] ?? $_SESSION[$config["cookie"] . "_session"]);
    $account = $db->where("token", $token)->getOne("sessions");
    if (!empty($account["user"])) {
        $account = $user->get($account["user"], "id");
        if ($account["banned"] == 0) {
            $logged = true;
        } else {
            $logged = false;
        }
    } else {
        $logged = false;
    }
} else {
    $logged = false;
}
