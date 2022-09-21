<?php

$config = include $_SERVER['DOCUMENT_ROOT'] . '/src/config/app.php';
require_once $config['ROOT_DIR'] . "/src/config/db/db_connection.php";
require $config['ROOT_DIR'] . "/src/flash_messages.php";

// Session Start
if (!isset($_SESSION)) {
    session_start();
}

require_once $config['ROOT_DIR'].'/src/config/routes.php';