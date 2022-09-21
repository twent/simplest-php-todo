<?php


/**
 * Get tasks info from DB functions
 *
 * @var PDO $pdo
 */

$getTasks = function() use ($pdo): void
{
    $query = $pdo->prepare("SELECT * FROM todos ORDER BY completed, id DESC");
    $query->execute();
    $_SESSION['tasks'] = $query->fetchAll();

    $query = $pdo->prepare("SELECT COUNT(*) AS count  FROM todos");
    $query->execute();
    $_SESSION['tasksCount'] = $query->fetch();
};

// Logic for clear messages and $_POST data (store data to session + redirect)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['POST_DATA'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

/*
* Handle POST requests
* Handle submitted forms here using the $_SESSION['POST_DATA'] instead of $_POST
*/
if (array_key_exists('POST_DATA', $_SESSION)) {
    /*
    * Logic handles user actions
    * Create New Task
    */
    if (isset($_SESSION['POST_DATA']['create']))
    {
        $title = trim($_SESSION['POST_DATA']['title']);
        if (!empty($title)) {
            $query = $pdo->prepare("INSERT INTO `todos` (title) VALUES (:title)");
            $query->bindValue(':title', $title);
            $query->execute();
            flash('Добавлена новая задача', FLASH_SUCCESS);
        } else {
            flash('Введите название задачи', FLASH_ERROR);
        }

    }

    // Delete Task
    elseif (isset($_SESSION['POST_DATA']['delete']))
    {
        $id = $_SESSION['POST_DATA']['id'];
        $query = $pdo->prepare("DELETE FROM `todos` WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        flash('Задача удалена', FLASH_SUCCESS);
    }

    // Unset/clear POST_DATA after using it
    unset($_SESSION['POST_DATA']);
}

// Get tasks info from DB
$getTasks();
