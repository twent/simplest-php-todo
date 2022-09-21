<?php

/**
 * @var array $config
 * @var string $CURRENT_PAGE
 */

?>

<!-- header -->
<header id="top" class="text-gray-600 body-font shadow-md">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <svg class="w-10 h-10 text-gray-600 p-2 bg-yellow-400 rounded-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span class="ml-3 text-xl"><?= $config['APP_NAME'] ?></span>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-start text-base justify-center">
            <a href="<?= PAGES['index']['URI_PATH'] ?>" class="mr-5 hover:text-gray-400 cursor-pointer <?php if($CURRENT_PAGE == "Index"): ?>text-blue-600<?php endif ?>">Главная</a>
            <a class="mr-5 hover:text-gray-400 cursor-pointer">Мои задачи</a>
            <a class="mr-5 hover:text-gray-400 cursor-pointer">Профиль</a>
            <a class="mr-5 hover:text-gray-400 cursor-pointer">Настройки</a>
        </nav>
        <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Выйти
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</header>