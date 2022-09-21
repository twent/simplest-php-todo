<?php

/**
 * @var array $config
 */

// Persistent Connection to DB
$pdo = new PDO("sqlite:" .  $config['ROOT_DIR'] ."/src/config/db/sqlite.db", null, null, [PDO::ATTR_PERSISTENT => true]);
