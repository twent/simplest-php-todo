<?php

declare(strict_types=1);

require_once MODELS_DIR . '/task.php';

if (isset($_POST['id']))
{
    $id = (int) h($_POST['id']);

    $updateTask($id);

    flashMessages('Задача обновлена', FLASH_SUCCESS);
}

redirect('back');