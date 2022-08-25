<?php

class Router
{
  private Request $request;
  private string $path;
  private array $routes = [];

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function route(string $path)
  {
    $this->path = $path;
    return $this;
  }

  public function get(array $callback)
  {
    $this->routes['GET'][$this->path] = $callback;
    return $this;
  }

  public function post(array $callback)
  {
    $this->routes['POST'][$this->path] = $callback;
    return $this;
  }

  public function run()
  {
    $callback = $this->routes[$this->request->method][$this->request->pathName];
    $object = new $callback[0]($this->request);
    call_user_func([$object, $callback[1]]);
  }
}