<?php
require_once 'db.php';

$books_duration = getNakedInput($_POST['newBooks__duration']);
$books_name = getNakedInput($_POST['newBooks__name']);

if( empty($books_duration) || empty($books_name) || !isset($_POST['newBooks__genres']) ){
	die('Пожалуйста, заполните все поля');
}

try{

	$pdo->beginTransaction();

	$sql_mybooks = 'INSERT INTO mybooks(name, duration)
	VALUES(:name, :duration)';
	$params = [
		':name' => $books_name,
	 ':duration' => $books_duration
	];

	$stmt_books = $pdo->prepare($sql_mybooks);
	$stmt_books->execute($params);

	$last_id = $pdo->lastInsertId();

	$genre_param = [];
	$rows = [];


	foreach($_POST['newBooks__genres'] as $genres){

		array_push($genre_param, $last_id, $genre);

		$str = '(?, ?)';
		array_push($rows, $str);

	}

 $sql_genres = 'INSERT INTO mybooks_genres(mybooks_id, genres_id) VALUES' . implode($rows, ',') ;

 $stmt_genres = $pdo->prepare($sql_genres);
 $stmt_genres->execute($genre_param);

 $pdo->commit();

 echo 'Новое произведение успешно добавлено';




}catch(PDOEException $e){

	echo 'Во время добавления произведения произошла ошибка:' . $e->getMessage();

	$pdo->rollBack();



}


function getNakedInput($_POST['newBooks__name($input){
	return htmlentities(trim($input));
}