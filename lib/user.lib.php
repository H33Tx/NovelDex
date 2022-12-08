<?php

class User
{
    public function get($data, $type = "id")
    {
        $this->db = MysqliDb::getInstance();
        return $this->db->where($type, $data)->getOne("user");
    }

    public function login($name, $pass)
    {
        if (empty($name)) return "Username cannot be empty";
        if (empty($pass)) return "Password cannot be empty";
        $name = clean($name);
        $pass = crypt(clean($pass), cryptCode());
        if (empty($this->get($name, "username"))) return "User not found.";
        if (empty($this->get($pass, "password"))) return "Password is wrong.";
        $token = genToken();
        setcookie(cookieName() . "_session", $token, time() + 60 * 60 * 24 * 365, "/");
        $user = $this->get($name, "username");
        $this->db->insert("sessions", ["token" => $token, "user" => $user["id"]]);
        return true;
    }

    function signup($name, $pass, $email)
    {
        $name = clean($name);
        $pass = crypt(clean($pass), cryptCode());
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (empty($name)) return "Username cannot be empty";
        if (empty($pass)) return "Password cannot be empty";
        if (empty($email)) return "Email cannot be empty";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) return "Email is invalid";
        if (!empty($this->get($name, "username"))) return "Name already in use.";
        if (!empty($this->get($email, "email"))) return "Email already in use.";
        $this->db->insert("user", ["username" => $name, "password" => $pass, "email" => $email]);
        $out = $this->login($name, $pass);
        if ($out) return true;
        return false;
    }
}
