<?php

require "load.php";
$page = "account";

if ($logged == false) {
    $error = false;
    if (isset($_POST["login"])) {
        $return = $user->login($_POST["username"], $_POST["password"]);
        if ($return !== true)
            $error = true;
        else
            header("Location: account.php");
    }
    if (isset($_POST["signup"])) {
        $return = $user->signup($_POST["username"], $_POST["password"], $_POST["email"]);
        if ($return !== true) {
            $error = true;
        } else {
            $token = genToken();
            $activationLink = $config["url"] . "activate.php?token=" . $token;
            $username = clean($_POST["username"]);
            $email = clean($_POST["email"]);
            $db->insert("activation", ["token" => $token, "email" => $email]);

            $mail->setFrom($config["email"], $config["title"] . " Staff");
            $mail->addAddress($email, $config["title"] . " Reader");
            $mail->isHTML(true);
            $mail->Subject = "Activate your account at " . $config["title"];
            $mail->Body = "<b>Hello, {$username}</b><br>You just created an account on {$config["title"]}.<br>Please use the link below to activate it and gain access to all of the features:<br>{$activationLink}";
            $mail->AltBody = "Hello {$username}, you just created an account on {$config["title"]}. Please activate it with this link to fully access our site: {$activationLink}";
            $mail->send();

            header("Location: account.php");
        }
    }
}

include "themes/{$thme}/parts/header.php";
echo $core->title("Account", $config["seperator"], $config["title"]);
include "themes/{$thme}/parts/menu.php";
if ($logged == false) {
    include "themes/{$thme}/render/login.php";
} else {
    include "themes/{$thme}/render/account.php";
}
include "themes/{$thme}/parts/footer.php";
