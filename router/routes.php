<?php

// controllers
require_once "../controllers/auth.class.php";


$app->router->route('/authentication/find-email')->get(['Authentication', 'findEmail']);