<?php

declare(strict_types=1);

require_once MODELS_DIR . '/task.php';

$tasks = $getTasks();
$tasksCount = $getTasksCount();