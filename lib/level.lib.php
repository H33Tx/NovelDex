<?php

class Level
{
    // private $id = 0;
    // private $name = false;
    // private $verified = false;
    // private $canLogin = false;
    // private $canSignup = false;
    // private $canRequestTitle = false;
    // private $canRequestTitleDeletion = false;
    // private $canAddTitle = false;
    // private $canEditTitle = false;
    // private $canDeleteTitle = false;
    // private $canRequestChapterDeletion = false;
    // private $canAddChapter = false;
    // private $canEditChapter = false;
    // private $canDeleteChapter = false;
    // private $canManageUser = false;
    // private $canComment = false;
    // private $canManageComment = false;
    // private $banned = false;

    function __construct($id)
    {
        $this->db = MysqliDb::getInstance();
        $this->id = $id;
        $level = $this->db->where("level", $this->id)->getOne("levels");

        $this->name = $level["name"];
        $this->verified = $level["verified"] == 1 ? true : false;
        $this->canLogin = $level["can_login"] == 1 ? true : false;
        $this->canSignup = $level["can_signup"] == 1 ? true : false;
        $this->canRequestTitle = $level["can_request_title"] == 1 ? true : false;
        $this->canRequestTitleDeletion = $level["can_request_title_deletion"] == 1 ? true : false;
        $this->canAddTitle = $level["can_add_title"] == 1 ? true : false;
        $this->canEditTitle = $level["can_edit_title"] == 1 ? true : false;
        $this->canDeleteTitle = $level["can_delete_title"] == 1 ? true : false;
        $this->canRequestChapterDeletion = $level["can_request_chapter_deletion"] == 1 ? true : false;
        $this->canAddChapter = $level["can_add_chapter"] == 1 ? true : false;
        $this->canEditChapter = $level["can_edit_chapter"] == 1 ? true : false;
        $this->canDeleteChapter = $level["can_delete_chapter"] == 1 ? true : false;
        $this->canManageUser = $level["can_manage_user"] == 1 ? true : false;
        $this->canComment = $level["can_comment"] == 1 ? true : false;
        $this->canManageComment = $level["can_manage_comment"] == 1 ? true : false;
        $this->banned = $level["banned"] == 1 ? true : false;
    }

    function getName()
    {
        return $this->name;
    }

    function checkVerified()
    {
        return $this->verified;
    }

    function login()
    {
        return $this->canLogin;
    }

    function signup()
    {
        return $this->canSignup;
    }

    function reqTitle()
    {
        return $this->canRequestTitle;
    }

    function reqTitleDel()
    {
        return $this->canRequestTitleDeletion;
    }

    function addTitle()
    {
        return $this->canRequestTitle;
    }

    function editTitle()
    {
        return $this->canEditTitle;
    }

    function delTitle()
    {
        return $this->canDeleteTitle;
    }

    function reqChapDel()
    {
        return $this->canRequestChapterDeletion;
    }

    function addChap()
    {
        return $this->canAddChapter;
    }

    function editChap()
    {
        return $this->canEditChapter;
    }

    function delChap()
    {
        return $this->canDeleteChapter;
    }

    function manUser()
    {
        return $this->canManageUser;
    }

    function canCom()
    {
        return $this->canComment;
    }

    function manCom()
    {
        return $this->canManageComment;
    }

    function isBanned()
    {
        return $this->banned;
    }
}
