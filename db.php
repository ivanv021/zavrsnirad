<?php

try {
    $connection = new PDO("mysql:host=127.0.0.1;dbname=Blog",'root', 'vivify');
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 catch(PDOException $e)
 {
    echo $e->getMessage();
 };