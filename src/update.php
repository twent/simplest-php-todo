<?php

/**
 * Update (Toggle) Task Status
 *
 * @var PDO $pdo
 */

if (isset($_POST))
{
    $id = $_POST['id'];
    $query = $pdo->prepare("UPDATE `todos`
            SET completed = CASE completed
                WHEN false THEN true
                ELSE false
                END
            WHERE id = :id");
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    // Create Flash Message
    flash('Задача обновлена', FLASH_SUCCESS);
}

header('Location:/');