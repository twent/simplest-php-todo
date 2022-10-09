<?php

declare(strict_types=1);

require_once MODELS_DIR . '/task.php';

if (isset($_POST['delete']))
{
    $id = (int) h($_POST['id']);

    $deleteTask($id);

    flashMessages('Задача удалена', FLASH_SUCCESS);
}

redirect('back');