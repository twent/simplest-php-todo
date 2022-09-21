<?php

/**
 * Simple Router
 * @var array $config
 */

const PAGES = [
  'index' => [
      'URI_PATH' => "/"
  ]
];

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/':
    case '':
    case '/index.php':
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Главная";
    require $config['ROOT_DIR'].'/src/resources/views/pages/index.php';
        break;
    case '/update':
        $CURRENT_PAGE = "Update";
        require $config['ROOT_DIR'].'/src/update.php';
        break;
    case '/about':
        $CURRENT_PAGE = "About";
        $PAGE_TITLE = "О Нас";
        require $config['ROOT_DIR'].'/src/resources/views/pages/about.php';
        break;
    default:
        http_response_code(404);
        require $config['ROOT_DIR'].'/src/resources/views/errors/404.php';
        break;
}
