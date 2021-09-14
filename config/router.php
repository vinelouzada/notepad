<?php

$router = [
    '/notes' => Louzada\NotePad\Controller\IndexController::class,
    '/new-note' => Louzada\NotePad\Controller\NewNoteController::class,
    '/login' => Louzada\NotePad\Controller\LoginController::class,
    '/signup' => Louzada\NotePad\Controller\SignUpController::class,
    '/logout' => \Louzada\NotePad\Controller\LogoutController::class,
    '/delete' => \Louzada\NotePad\Controller\DeleteController::class,
    '' => \Louzada\NotePad\Controller\IndexController::class
];

return $router;