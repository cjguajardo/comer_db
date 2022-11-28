<?php
  require_once(__DIR__."/session.php");
  require_once(__DIR__."/layout.php");
  require_once(__DIR__."/db.php");

  $db = new DB();
  $pdo = $db->connect();
  $layout = new Layout();
