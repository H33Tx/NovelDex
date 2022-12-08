<?php

require "load.php";

if (!isset($_GET["token"]) || empty($_GET["token"])) die("no token at all");
$token = clean($_GET["token"]);
if (empty($db->where("token", $token)->getOne("activation"))) die("invalid token");
$token = $db->getOne("activation");
$db->where("email", $token["email"])->update("user", ["level" => 100]);
$db->where("token", $token["token"])->delete("activation");

$mail->setFrom($config["email"], $config["title"] . " Staff");
$mail->addAddress($email, $config["title"] . " Reader");
$mail->isHTML(true);
$mail->Subject = "Your account at " . $config["title"];
$mail->Body = "<b>Hello,</b><br>This email is informing you, that your account has been activated. Thanks for using!";
$mail->AltBody = "Hello, This email is informing you, that your account has been activated. Thanks for using!";
$mail->send();

header("location: account.php");
die("end of file.");
