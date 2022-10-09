<?php

declare(strict_types=1);

/* Sanitize user input */
function h(string|int $string): string
{
    return htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
}