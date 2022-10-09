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
$createTask = function(string $title) use (&$pdo): array|bool {
    $query = $pdo->prepare("INSERT INTO `tasks` (title) VALUES (:title)");
    $query->bindValue(':title', $title);
    $query->execute();
    return $query->fetch();
};

/**
 * Update (toggle) task status
 */
$updateTask = function(int $id) use (&$pdo): array|bool {
    $query = $pdo->prepare("UPDATE `tasks`
        SET done = CASE done
            WHEN false THEN true
            ELSE false
            END
        WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
};

/**
 * Delete task from DB
 */

$deleteTask = function(int $id) use (&$pdo): array|bool {
    $query = $pdo->prepare("DELETE FROM `tasks` WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
};