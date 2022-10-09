<?php

declare(strict_types=1);

require_once MODELS_DIR . '/task.php';

$title = h($_POST['title']);

if (!empty($title))
{
    $createTask($title);

    flashMessages('Добавлена новая задача', FLASH_SUCCESS);
} else {
    flashMessages('Введите название задачи', FLASH_ERROR);
}

redirect('back');