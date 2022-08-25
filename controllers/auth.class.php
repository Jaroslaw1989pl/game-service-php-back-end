<?php

require_once "../models/validation.class.php";


class Authentication
{
  private Request $request;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }
  
  public function findEmail()
  {
    // response headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Content-Type: application/json; charset=utf-8");

    $validation = new Validation();
    
    echo json_encode($validation->uniqueness('email', $this->request->query['email']));
  }
}