<?php

declare(strict_types=1);

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

$deleteTask();