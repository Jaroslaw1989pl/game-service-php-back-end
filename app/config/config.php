<?php

require_once "dotenv.class.php";


// project root directory
define('ROOT_DIR', dirname(__FILE__, 3));

(new DotEnv(ROOT_DIR.'/.env'))->load();

// database credentials
$dbConfig = [
  'host' => getenv('DB_HOST'),
  'name' => getenv('DB_NAME'),
  'user' => getenv('DB_USER'),
  'pass' => getenv('DB_PASS')
];
define('DB_CONFIG', $dbConfig);