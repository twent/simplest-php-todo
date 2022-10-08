<?php

declare(strict_types=1);

/** @var array CONFIG */

require_once CONTROLLERS_DIR . "/tasks/index.php";

include_once VIEWS_DIR . '/partials/header.php';

?>
<!DOCTYPE html>
<html data-theme="light" lang="en">
<head>
    <?php include_once VIEWS_DIR . '/partials/head_tags.php' ?>
</head>
<body>
<!-- main -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-20 mx-auto">
        <!-- Заголовок -->
        <div class="flex flex-wrap w-full mb-12 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900"><?= CONFIG['APP_NAME'] ?></h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Управляй своими задачами 😊</p>
        </div>

        <!-- Flash Messages -->
        <?php flashMessages() ?>

        <!-- Добавление задачи -->
        <form method="post" action="/tasks/create">
            <div class="task-search mb-14 flex flex-col md:flex-row w-full justify-center px-0 lg:px-12">
                <div class="group box-content relative inline-flex flex-nowrap w-full md:w-3/4 xl:w-1/2 h-14 m-2" role="group">
                    <input type="text" id="hero-field" name="title" class="w-full px-6 h-14 rounded-lg bg-gray-100 group-hover:shadow-lg hover:bg-gray-200 active:bg-gray-200 bg-opacity-50 focus:ring-1 focus:ring-green-200 focus:bg-transparent border border-gray-300 focus:border-green-500 text-base outline-none text-gray-700 py-1.5 px-3 leading-8 transition-colors duration-200 ease-in-out mb-4 md:mb-0 shadow-md" placeholder="Название новой задачи">
                    <button type="submit" name="create" class="h-14 absolute right-0 flex items-center text-white bg-green-400 border-0 py-2 pb-2.5 px-10 focus:outline-none hover:bg-green-500 rounded-lg text-xl font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mt-1 mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Добавить</span>
                    </button>
                </div>
            </div>
        </form>

        <!-- Флексбокс с колонками -->
        <div class="kanban-board flex flex-col lg:flex-row justify-center space-x-0 lg:space-x-8 space-y-10 lg:space-y-0">

            <!-- Колонка задач -->
            <div id="column-01" class="w-full tasks-column new-tasks flex flex-col max-w-2xl space-y-4 text-xl">

                <div class="mb-2 tasks-column__header inline-flex justify-between items-center rounded-lg text-white bg-indigo-400 hover:opacity-90 hover:shadow-2xl px-8 py-4 shadow-xl">
                    <span class="inline-flex items-center space-x-3">
                        <strong class="text-center"><?= CONFIG['APP_NAME'] ?></strong>
                        <span class="counter rounded-full bg-gray-50 px-2 font-semibold text-gray-600">
                            <?= $_SESSION['tasksCount']['count'] ?>
                        </span>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                    </svg>
                </div>

                <div class="task-list space-y-4 min-w-full">
                    <?php foreach ($_SESSION['tasks'] as $task): ?>
                        <?php include VIEWS_DIR . '/tasks/card.php' ?>
                    <?php endforeach ?>

                <!-- Карточка добавления задачи -->
                <a href="#top" class="task-card__new border flex justify-center border-dashed hover:border-solid border-gray-300 bg-gray-100 hover:bg-white text-gray-500 p-8 shadow-inner hover:shadow-sm hover:cursor-pointer rounded-lg">
                    <div class="task-header inline-flex items-center">
                        <div class="w-10 h-10 mr-4 inline-flex items-center justify-center rounded-full bg-gray-200 text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <span class="text-lg font-medium title-font">Добавить задачу</span>
                    </div>
                </a>
            </div>

<!--            <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Добавить задачу</button>-->

            </div>


    </div>
</section>

<!-- footer -->
<?php include_once VIEWS_DIR . '/partials/footer.php'; ?>
<script src="/public/js/app.js"></script>
</body>
</html>

