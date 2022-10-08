<?php

declare(strict_types=1);

// Session array key for flash messages
const FLASH = 'FLASH_MESSAGES';

// Flash messages types
const FLASH_ERROR = 'error';
const FLASH_WARNING = 'warning';
const FLASH_INFO = 'info';
const FLASH_SUCCESS = 'success';

// Flash messages colors
const FLASH_MESSAGES_COLORS = [
    'background' => [
        'error' => 'red',
        'warning' => 'yellow',
        'info' => 'blue',
        'success' => 'green'
    ]
];

/**
 * Create a flash message
 *
 * @param string $message
 * @param string $type
 * @return void
 */
function createFlashMessage(string $message, string $type): void
{
    $_SESSION[FLASH][] = ['message' => $message, 'type' => $type];
}

/**
 * Format a flash message
 *
 * @param array $flashMessage
 * @return string
 */
function formatFlashMessage(array $flashMessage): string
{
    return sprintf(
        '<div class="mb-6 p-2 mx-auto max-w-xl rounded-lg bg-%s-400 text-white shadow-lg hover:shadow-xl cursor-pointer" onclick="this.remove()">
                    <div class="p-2 flex justify-between items-center space-x-4">
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-8 w-8" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span>%s</span>
                        </div>
                        <svg class="stroke-current flex-shrink-0 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                </div>',
        FLASH_MESSAGES_COLORS['background'][$flashMessage['type']],
        $flashMessage['message']
    );
}

/**
 * Display all flash messages
 *
 * @return void
 */
function displayAllFlashMessages(): void
{
    if (!isset($_SESSION[FLASH])) {
        return;
    }

    // Get flash messages
    $flashMessages = $_SESSION[FLASH];

    // Remove all the flash messages
    unset($_SESSION[FLASH]);

    // Show all flash messages
    foreach ($flashMessages as $message) {
        echo formatFlashMessage($message);
    }
}

/**
 * Multi-logic flash shortcut
 *
 * @param string $message
 * @param string $type (error, warning, info, success)
 * @return void
 */
function flashMessages(string $message = '', string $type = ''): void
{
    if ($message !== '' && $type !== '') {
        createFlashMessage($message, $type);
    } else {
        displayAllFlashMessages();
    }
}
