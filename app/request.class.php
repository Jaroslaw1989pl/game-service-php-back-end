<?php 

class Request
{
  public string $method;
                           // example: 'http://localhost:8080/default.htm?year=2017&month=february';
  public string $path;     // returns '/default.htm?year=2017&month=february'
  public string $pathName; // returns '/default.htm'
  public string $search;   // returns '?year=2017&month=february'
  public array $query;     // returns an object: { year: 2017, month: 'february' }
  public array $body;

  public function __construct()
  {
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->path = urldecode($_SERVER['REQUEST_URI']);
    $this->pathName = $_SERVER['REDIRECT_URL'];
    $this->search = urldecode($_SERVER['QUERY_STRING']);
    $this->query = $_GET;
    $this->body = $_POST;
  }
}