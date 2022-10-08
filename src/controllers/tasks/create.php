<?php

declare(strict_types=1);

/**
 * Create task
 */

$createTask = function() use (&$pdo): void
{
    $title = trim($_POST['title']);
    if (!empty($title)) {
        $query = $pdo->prepare("INSERT INTO `tasks` (title) VALUES (:title)");
        $query->bindValue(':title', $title);
        $query->execute();
        flashMessages('Добавлена новая задача', FLASH_SUCCESS);
    } else {
        flashMessages('Введите название задачи', FLASH_ERROR);
    }

    redirect('back');
};

$createTask();