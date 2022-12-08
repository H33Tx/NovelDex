<?php

class Core
{

    public function title($page, $seperator, $name)
    {
        return "<title>{$page} {$seperator} {$name}</title>";
    }

    public function genToken()
    {
        return md5(rand());
    }
}
