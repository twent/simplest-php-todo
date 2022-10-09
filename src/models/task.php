<?php

declare(strict_types=1);

/** Task Model logic
 *
 * Get tasks from DB
 */

$getTasks = function() use (&$pdo): array|bool {
    $query = $pdo->prepare("SELECT * FROM `tasks` ORDER BY done, id DESC");
    $query->execute();
    return $query->fetchAll();
};

/**
 * Get tasks count
 */

$getTasksCount = function() use (&$pdo): array|bool {
    $query = $pdo->prepare("SELECT COUNT(*) AS count  FROM `tasks`");
    $query->execute();
    return $query->fetch();
};

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

/**
 * Update (toggle) task status
 */

$updateTask = function() use (&$pdo): void
{
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];

        $query = $pdo->prepare("UPDATE `tasks`
            SET done = CASE done
                WHEN false THEN true
                ELSE false
                END
            WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        // Create Flash Message
        flashMessages('Задача обновлена', FLASH_SUCCESS);
    }

    redirect('back');
};

/**
 * Delete task from DB
 */

$deleteTask = function() use (&$pdo): void
{
    if (isset($_POST['delete']))
    {
        $id = $_POST['id'];
        $query = $pdo->prepare("DELETE FROM `tasks` WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        flashMessages('Задача удалена', FLASH_SUCCESS);
    }

    redirect('back');
};