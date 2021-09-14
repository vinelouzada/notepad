<?php


namespace Louzada\NotePad\Helper;


trait TraitConfigSession
{
    public function sessionOn():array{
        return ['/login','/signup'];
    }
    public function sessionOff():array{
        return ['/login','/'];
    }
}