<?php


namespace Louzada\NotePad\Controller;


class LogoutController implements ProcessRequestInterface
{

    public function ProcessRequest(): void
    {
        session_destroy();
        header('Location: /login');
    }
}