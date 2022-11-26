<?php

require_once("config.php");

class DB {
  private $pdo;

  public function connect(){
    if ($this->pdo == null) {
      if (Config::CONNECTION==='sqlite'){
        $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
      }
      else if(Config::CONNECTION==='mysql'){
        try {
          $this->pdo = new \PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME, Config::DB_USERNAME, Config::DB_PASSWORD);
          // set the PDO error mode to exception
          $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          //echo "Connected successfully"; 
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
      }
    }

    return $this->pdo;
  }

  public function insert($table, $data) {
    $columns = [];
    $values = [];
    $valInserts = '';

    foreach($data as $col => $val){
      $columns[] = $col;
      $values[] = $val;
      $valInserts[] = ":$col";
    }

    $columns = implode(',',$columns);
    $values = implode(',', $values);
    $valInserts = implode(',',$valInserts);

    $sql = "INSERT INTO $table($columns) VALUES($valInserts)";
    $stmt = $this->pdo->prepare($sql);
    foreach($data as $col => $val){
      $stmt->bindValue(":$col", $val);
    }
    $stmt->execute();

    return $this->pdo->lastInsertId();
  }

  public function query($sql){
    try{
      $result = $this->pdo->query($sql, PDO::FETCH_ASSOC);
      return $result;
    }catch(Exception $e){
      echo $e->getMessage();
    }

    return false;
  }

}