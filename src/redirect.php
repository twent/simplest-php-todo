<?php

declare(strict_types=1);

function redirect(string $option = 'home'): void
{
    switch ($option) {
        case 'back':
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        case 'main':
        case 'home':
        default:
            header('Location: /');
            exit();
    }
}