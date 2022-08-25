<?php

require_once "config/config.php";
require_once "request.class.php";
require_once "../router/router.class.php";


class Application
{
  public Request $request;
  public Router $router;

  public function __construct()
  {
    $this->request = new Request();
    $this->router = new Router($this->request);
  }
}