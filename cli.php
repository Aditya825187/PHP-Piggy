<?php

include __DIR__ . '/src/Framework/Database.php';


use Framework\Database;

$db = new Database('mysql', [
  'host' => 'localhost',
  'port' => 3300,
  'dbname' => 'phpiggy'
], 'root', '1234');

$sqlfile = file_get_contents("./database.sql");
$db->connection->query($sqlfile);
