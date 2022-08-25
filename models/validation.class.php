<?php

require_once "database.class.php";


class Validation extends Database
{
  public function __construct()
  {
    parent::__construct();
  }

  public function uniqueness(string $key, string $value)
  {
    return $this->select("SELECT * FROM users WHERE $key = :value_0", [$value]);
  }
}