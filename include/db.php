<?php
require "config.php";

$pdo = new PDO(
    "mysql:host={$DB['HOST']};dbname={$DB['DB_NAME']}",
    $DB['USER'],
    $DB['PASS']
);
if (!$pdo) {
    die("MySQL pdoection error");
}
