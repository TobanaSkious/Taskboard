<?php
session_start();
class Database {

    protected function connect()
    {
      $dsn = "mysql:host=localhost:3307;dbname=kanban";
      $user = "root";
      $password = "";
      $conn = new PDO($dsn, $user, $password);
      return $conn;
    }
  
  }
?>