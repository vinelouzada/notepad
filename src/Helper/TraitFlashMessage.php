<?php
namespace Louzada\NotePad\Helper;

trait TraitFlashMessage
{
    public function defineMessage(string $type, string $message)
    {
        $_SESSION['type'] = $type;
        $_SESSION['message'] = $message;

    }
}