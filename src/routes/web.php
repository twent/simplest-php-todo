<?php

declare(strict_types=1);

/**
 * Simple Router
 */

const PAGES = [
    'index' => [
        'uri_path' => '/',
        'name' => 'Index',
        'title' => 'Главная',
    ],
    'tasks' => [
        'uri_path' => '/tasks',
        'name' => 'Tasks',
        'title' => 'Задачи',
    ],
    'about' => [
        'uri_path' => '/about',
        'name' => 'About',
        'title' => 'О Нас',
    ]
];

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
    case '/index.php':
        $currentPage = PAGES['index'];
        require_once VIEWS_DIR . '/tasks/index.php';
        break;
    case '/tasks':
        $currentPage = PAGES['tasks'];
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
        $currentPage = PAGES['about'];
        require_once VIEWS_DIR . '/pages/about.php';
        break;
    default:
        http_response_code(404);
        require_once VIEWS_DIR . '/errors/404.php';
        break;
}
