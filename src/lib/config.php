<?php

class Config {
  //SQLite config
  const CONNECTION = 'sqlite'; // sqlite, mysql
  const PATH_TO_SQLITE_FILE = __DIR__.'/../db/comer.db';

  //MySql config
  const DB_HOST = 'localhost';
  const DB_NAME = 'comer';
  const DB_USERNAME = 'root';
  const DB_PASSWORD = '';
}