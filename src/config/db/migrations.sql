CREATE TABLE `tasks` (
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `done` BOOLEAN DEFAULT FALSE,
    `title` VARCHAR(255),
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);