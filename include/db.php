<?php
require "config.php";
try {
    $db = new PDO(DNS, DB_USER, DB_PASS);
} catch (PDOException $e) {

}
