<?php 

require_once "../app/app.class.php";


$app = new Application();

// routes
require_once "../router/routes.php";

$app->router->run();