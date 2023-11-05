<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'ct467');
define('DB_USER', 'newuser');
define('DB_PASSWORD', 'mysqlct467');

$host = 'localhost';
$dbname = 'project_ct467';
$username = 'root';
$password = 'phamminhkhanh';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

try {
  $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}