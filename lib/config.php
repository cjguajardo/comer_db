<?php

namespace App\Lib;

class Config {
  //SQLite config
  const CONNECTION = 'sqlite'; // sqlite, mysql
  const PATH_TO_SQLITE_FILE = './comer.db';

  //MySql config
  const DB_HOST = 'localhost';
  const DB_NAME = 'user';
  const DB_USERNAME = 'comer_db';
  const DB_PASSWORD = '123456';
}