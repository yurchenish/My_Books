<?php 
require_once 'db.php';

$offset = (int) $_POST['last_shown_book'];

$sql = 'SELECT id, name FROM mybooks ORDER BY id DESC LIMIT :lastShown, 1';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':lastShown', $offset, PDO::PARAM_INT);

$stmt->execute();

$mybooks = $stmt->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');

echo json_endcode($mybooks);