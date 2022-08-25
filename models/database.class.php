<?php

class Database
{
  protected $connection;

  public function __construct()
  {
    try 
    {
      $this->connection = new PDO('mysql:host='.DB_CONFIG['host'].';dbname='.DB_CONFIG['name'], DB_CONFIG['user'], DB_CONFIG['pass']);
      // set the PDO error mode to exception
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $error) 
    {
      echo "Connection failed: " . $error->getMessage();
    }
  }

  public function __destruct()
  {
    $this->connection = null;
  }

  protected function select(string $query, array $values)
  {
    $statement = $this->connection->prepare($query);
    for ($i = 0; $i < count($values); $i++) 
    {
      $statement->bindParam('value_'.$i, $values[$i]);
    }
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}