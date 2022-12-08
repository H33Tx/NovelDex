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
        if ($id)
            return $id;
        else
            return $this->db->getLastError();
    }
}
