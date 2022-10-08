<?php

declare(strict_types=1);

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

$updateTask();