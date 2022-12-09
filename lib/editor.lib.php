<?php

class Editor
{
    function __construct()
    {
        $this->db = MysqliDb::getInstance();
    }

    function checkExistence($id)
    {
        return !empty($this->db->where("id", $id)->getOne("titles")) ? true : false;
    }

    function checkApproved()
    {
        return $this->approved == 1 ? true : false;
    }

    function addTitle($name, $synopsis, $approved)
    {
        if (empty($name)) return "Name is empty";
        if (!empty($this->db->where("name", $name)->getOne("titles"))) return "Name already in use";
        $id = $this->db->insert("titles", ["slug" => cat($name), "name" => $name, "synopsis" => $synopsis, "approved" => $approved]);
        if ($id) return $id;
        return $this->db->getLastError();
    }

    function editTitle($id, $name, $synopsis, $slug)
    {
        if (empty($id)) return "ID empty";
        if (empty($name)) return "Name is empty";
        if (!$this->checkExistence($id)) return "Title does not exist";
        if (!empty($slug)) $this->db->where("id", $id)->update("titles", ["slug" => $slug]);
        if ($this->db->where("id", $id)->update("titles", ["name" => $name, "synopsis" => $synopsis])) return true;
        return $this->db->getLastError();
    }

    function addChapter($number, $lang, $title, $name, $data, $notes, $user)
    {
        if (empty($number)) return "Number is empty";
        if (!$this->checkDecimal($number)) return "Number format is invalid";
        if (empty($lang)) return "Lang is empty";
        if (!$this->checkExistence($title)) return "Title does not exist";
        if (empty($name)) return "Name is empty";
        if (empty($data)) return "Data is empty";
        if (empty($user) || !is_numeric($user)) return "Invalid User";
        if ($this->db->insert("chapters", ["number" => $number, "lang" => $lang, "title" => $title, "name" => $name, "data" => $data, "notes" => $notes, "user" => $user])) return true;
        return $this->db->getLastError();
    }

    function checkDecimal($data)
    {
        if (!preg_match('/^[0-9]+(\.[0-9]{1,2})?$/', $data)) return false;
        return true;
    }
}
