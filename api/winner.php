<?php
require '../include/db.php';

$sql = 'SELECT * FROM users ORDER BY rand() LIMIT 1';
$query = $pdo->query($sql);
$winner = $query->fetch(PDO::FETCH_ASSOC);

header("Content-Type: application/json");
echo json_encode($winner, JSON_PRETTY_PRINT);
