<?php

/** Bootstrap Web App
 *
 */

declare(strict_types=1);

use Carbon\Carbon;

require_once $_SERVER['DOCUMENT_ROOT'] . "/src/config/paths.php";

define('CONFIG', require_once CONFIG_DIR . "/app.php");

/* Timezone and locale settings applying */
Carbon::setLocale(CONFIG['LOCALE']);
date_default_timezone_set(CONFIG['TIME_ZONE']);

/* Load base components */
require_once DATABASE_DIR . "/db_connection.php";
require_once APP_DIR . "/start_session.php";
require_once APP_DIR . "/flash_messages.php";
require_once APP_DIR . "/redirect.php";
require_once APP_DIR . "/safety.php";

/* Load router */
require_once ROUTES_DIR . "/web.php";