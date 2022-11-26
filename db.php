<?php

namespace App;

class DB {
  private $pdo;

  public function connect(){
    if ($this->pdo == null) {
      if (Config::CONNECTION==='sqlite'){
        $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
      }
      else if(Config::CONNECTION==='mysql'){
        try {
          $this->pdo = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME, Config::DB_USERNAME, Config::DB_PASSWORD);
          // set the PDO error mode to exception
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully"; 
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
      }
    }

    return $this->pdo;
  }

}