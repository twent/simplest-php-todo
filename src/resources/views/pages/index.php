<?php

/**
 * @var array $config
 */

declare(strict_types=1);

require_once $config['ROOT_DIR'] . "/src/config/routes.php";
require_once $config['ROOT_DIR'] . "/src/flash_messages.php";
require_once $config['ROOT_DIR'] . "/src/todo.php";

include $config['ROOT_DIR'] . '/src/resources/views/partials/header.php';

?>
<!DOCTYPE html>
<html data-theme="light" lang="en">
<head>
    <?php include $config['ROOT_DIR'] . '/src/resources/views/partials/head_tags.php' ?>
</head>
<body>
<!-- main -->
<section class="text-gray-600 body-font">
    <div class="container px-5 py-20 mx-auto">
        <!-- Заголовок -->
        <div class="flex flex-wrap w-full mb-12 flex-col items-center text-center">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900"><?= $config['APP_NAME'] ?></h1>
            <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Управляй своими задачами 😊</p>
        </div>

        <!-- Flash Messages -->
        <?php flash() ?>

        <!-- Добавление задачи -->
        <form method="post" action="">
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
                        <strong class="text-center">Список задач</strong>
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
                        <div id="item-<?= htmlspecialchars($task['id']) ?>" class="task-card rounded-lg border <?= $task['completed'] ? 'shadow-md bg-gray-50 border-gray-100' : 'shadow-lg border-gray-200' ?>">
                            <div class="task-card__header inline-flex items-center px-4 pt-4 w-full">
                                <div class="w-full flex flex-row items-center justify-between">
                                    <div class="task-card__checkbox ml-3 sm:ml-5 text-indigo-500">
                                        <form method="post" action="/update" class="my-auto flex flex-row items-center">
                                            <input name="id" type="hidden" value="<?=$task['id']?>">
                                            <input type="checkbox" class="checkbox-x4" name="completed" <?= $task['completed'] ? ' checked' : '' ?>>
                                        </form>
                                        <!--<svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>-->
                                    </div>
                                    <div class="w-full flex items-end flex-col space-y-5 p-4 pl-3.5">
                                        <div class="flex justify-end items-center">
                                            <h2 class="text-right text-2xl text-gray-600 font-medium title-font"><?= htmlspecialchars($task['title']) ?></h2>
                                            <!--<div class="inline-flex text-sm rounded-full bg-indigo-100 text-indigo-500 p-2 px-3 space-x-2">
                                                <span class="text-small text-gray-800">Одношаговые</span>
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1zM4 22v-7"></path>
                                                </svg>
                                            </div>-->

                                        </div>

                                        <label for="deleteModal-<?= $task['id'] ?>" class="flex items-center inline-flex text-red-400 modal-button">
                                            <svg class="w-6 h-6 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            Удалить
                                        </label>

<!--                                        <form method="post">-->
<!--                                            <button class="inline-flex items-center float-right float-center button button-outline text-red-400" type="submit" name="delete">-->
<!--                                                <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>-->
<!--                                                Удалить-->
<!--                                            </button>-->
<!--                                            <input type="hidden" name="id" value="--><?//=$task['id']?><!--">-->
<!--                                            <input type="hidden" name="delete" value="true">-->
<!--                                        </form>-->

                                        <!--<div class="task-card__body pt-0">
                                            <p class="task-card__description leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile poke farm.</p>
                                        </div>-->
                                    </div>
                                </div>
                            </div>

                            <div class="task-card__footer inline-flex justify-between items-center w-full p-4 rounded-b-lg <?= $task['completed'] ? 'bg-gray-50' : '' ?>">
                                <div class="task-card__footer-date inline-flex items-center space-x-2 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>5 минут назад</span>
                                </div>
                                <div class=" task-card__footer-tags inline-flex space-x-2">
                                    <span class="tag text-sm border border-green-400 hover:bg-green-300 px-2.5 py-1 rounded-full cursor-pointer">learn</span>
                                    <span class="tag text-sm border border-yellow-500 hover:bg-yellow-400 px-2.5 py-1 rounded-full cursor-pointer">PHP</span>
                                </div>
                            </div>
                        </div>

                        <!-- Delete modal -->
                        <input type="checkbox" id="deleteModal-<?= $task['id'] ?>" class="modal-toggle" />
                        <label for="deleteModal-<?= $task['id'] ?>" class="modal cursor-pointer">
                            <label class="modal-box relative" for="">
                                <div class="flex justify-between">
                                    <h3 class="text-lg font-bold">Удалить задачу</h3>
                                    <a class="modal-toggle">
                                        <svg class="w-6 h-6" fill="none" stroke="#000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </a>
                                </div>
                                <p class="py-4">Вы точно хотите удалить задачу?</p>
                                <form method="post">
                                    <button class="inline-flex items-center float-right float-center text-red-400" type="submit" name="delete">
                                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        Удалить
                                    </button>
                                    <input type="hidden" name="id" value="<?=$task['id']?>">
                                    <input type="hidden" name="delete" value="true">
                                </form>
                            </label>
                        </label>
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

            <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Добавить задачу</button>

            </div>


    </div>
</section>

<!-- footer -->
<?php include $config['ROOT_DIR'] . '/src/resources/views/partials/footer.php'; ?>
<script src="/public/js/app.js"></script>
</body>
</html>

