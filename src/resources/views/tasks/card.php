<?php

use Carbon\Carbon;

/** @var array $task */

?>

<div id="task-<?= $task['id'] ?>" class="task-card rounded-lg border <?= $task['done'] ? 'shadow-md bg-gray-50 border-gray-100' : 'shadow-lg border-gray-200' ?>">
    <div class="task-card__header inline-flex items-center px-4 pt-4 w-full">
        <div class="w-full flex flex-row items-center justify-between">
            <div class="task-card__checkbox ml-3 sm:ml-5 text-indigo-500">
                <form method="post" action="/tasks/update" class="my-auto flex flex-row items-center">
                    <input name="id" type="hidden" value="<?=$task['id']?>">
                    <input type="checkbox" class="checkbox-x4" name="done" <?= $task['done'] ? ' checked' : '' ?>>
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

    <div class="task-card__footer inline-flex justify-between items-center w-full p-4 rounded-b-lg <?= $task['done'] ? 'bg-gray-50' : '' ?>">
        <div class="task-card__footer-date inline-flex items-center space-x-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span><?= Carbon::createFromFormat('Y-m-d H:s:i', $task['created_at'])->diffForHumans(); ?></span>
        </div>
        <div class=" task-card__footer-tags inline-flex space-x-2">
            <span class="tag text-sm border border-green-400 hover:bg-green-300 px-2.5 py-1 rounded-full cursor-pointer">learn</span>
            <span class="tag text-sm border border-yellow-500 hover:bg-yellow-400 px-2.5 py-1 rounded-full cursor-pointer">PHP</span>
        </div>
    </div>
</div>

<?php include VIEWS_DIR . '/tasks/delete_modal.php' ?>
