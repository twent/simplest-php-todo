<?php

declare(strict_types=1);

/**
 * Simple Router
 */

const PAGES = [
    'index' => [
        'URN' => '/',
        'name' => 'Index',
        'title' => 'Главная',
    ],
    'tasks' => [
        'URN' => '/tasks',
        'name' => 'Tasks',
        'title' => 'Задачи',
    ],
    'about' => [
        'URN' => '/about',
        'name' => 'About',
        'title' => 'О Нас',
    ]
];

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
    case '/index.php':
        $CURRENT_PAGE = PAGES['index'];
        require_once VIEWS_DIR . '/tasks/index.php';
        break;
    case '/tasks':
        $CURRENT_PAGE = PAGES['tasks'];
        require_once VIEWS_DIR . '/tasks/index.php';
        break;
    case '/tasks/create':
        require_once CONTROLLERS_DIR . '/tasks/create.php';
        break;
    case '/tasks/update':
        require_once CONTROLLERS_DIR . '/tasks/update.php';
        break;
    case '/tasks/delete':
        require_once CONTROLLERS_DIR . '/tasks/delete.php';
        break;
    case '/about':
        $CURRENT_PAGE = PAGES['about'];
        require_once VIEWS_DIR . '/pages/about.php';
        break;
    default:
        http_response_code(404);
        require_once VIEWS_DIR . '/errors/404.php';
        break;
}
