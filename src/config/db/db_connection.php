<?php

/**
 * @var array $config
 */

// Persistent Connection to DB
$pdo = new PDO("sqlite:" .  DATABASE_DIR ."/sqlite.db", null, null, [PDO::ATTR_PERSISTENT => true]);
