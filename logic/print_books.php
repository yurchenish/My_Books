<?php 
require_once	'db.php';

$sql = 'SELECT mybooks.id, mybooks.name, mybooks.duration, GROUP_CONCAT(genres.genre SEPARATOR ", ") AS genres 
FROM mybooks INNER JOIN mybooks_genres
ON mybooks.id = mybooks_genres.mybooks_id
INNER JOIN genres
ON mybooks_genres.genre_id = genres.id
GROUP BY mybooks.id, mybooks.name, mybooks.duration';

$result = $pdo->query($sql);


while( $mybooks = $result->fetch(PDO::FETCH_OBJ) ):
?>

			<div class="mybooks__container" id=<?php echo 'mybooks_' . $mybooks->id; ?>  data-mybooks-id=<?php echo $mybooks->id ?>>
					<h3 class="mybooks__name"><?php echo $mybooks->name ?></h3>
					<h4 class="mybooks__genre"><?php echo $mybooks->genres ?></h4>
					<h4 class="mybooks__duration">Продолжительность книги: <?php echo $mybooks->duration; ?> страниц</h4>

					<?php if( isset($_COOKIE['reeded']) &&	array_key_exists($mybooks->id,
					 $_COOKIE['reeded']) ): ?>
					 		<button class="mybooks__reeded mybooks__reeded_active">(Читал)</button>
					 <?php else: ?>
					 	<button class="mybooks__reeded">(Не читал)</button>
					 <?php endif; ?>

				</div>
				<hr>

<?php endwhile; ?>