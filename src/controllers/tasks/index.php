<?php

declare(strict_types=1);

/**
 * Get tasks from DB
 */

$getTasks = function() use (&$pdo): void
{
    $query = $pdo->prepare("SELECT * FROM `tasks` ORDER BY done, id DESC");
    $query->execute();
    $_SESSION['tasks'] = $query->fetchAll();

    $query = $pdo->prepare("SELECT COUNT(*) AS count  FROM `tasks`");
    $query->execute();
    $_SESSION['tasksCount'] = $query->fetch();
};

$tasks = $getTasks();