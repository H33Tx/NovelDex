<?php

class Title
{
    function __construct($data)
    {
        $this->db = MysqliDb::getInstance();
        $this->data = $data;
        if ($this->checkExistence()) {
            if (is_numeric($this->data)) {
                $this->id = $this->data;
                $this->slug = $this->db->where("id", $this->id)->getOne("titles")["slug"];
            } else {
                $this->slug = $this->data;
                $this->id = $this->db->where("slug", $this->slug)->getOne("titles")["id"];
            }

            $this->synopsis = $this->db->where("id", $this->id)->where("id", $this->id)->getOne("titles")["synopsis"];
            $this->name = $this->db->where("id", $this->id)->getOne("titles")["name"];
            $this->approved = $this->db->where("id", $this->id)->getOne("titles")["approved"];
        } else {
            return false;
        }
    }

    function checkExistence()
    {
        if (is_numeric($this->data))
            $this->db->where("id", $this->data);
        else
            $this->db->where("slug", $this->data);
        return !empty($this->db->getOne("titles")) ? true : false;
    }

    function checkApproved()
    {
        return $this->approved == 1 ? true : false;
    }

    function getSlug()
    {
        return $this->slug;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getSynopsis()
    {
        return $this->synopsis;
    }

    function getChapters($lang = "all", $index = "number", $order = "DESC")
    {
        if ($lang != "all") $this->db->where("lang", $lang);
        $this->db->where("title", $this->id);
        return $this->db->orderBy($index, $order)->get("chapters");
    }
}
