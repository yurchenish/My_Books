<?php require_once	'logic/db.php'; ?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
  <?php require_once	'parts/head.php'; ?>
	</head>
	<body>
		<?php include_once	'parts/header.php'; ?>

		<?php if( isset($_SESSION['user_login']) ): ?>
		
				<h1>Добавить фильм</h1>
				<form name="newBooks">
					<label>Название фильма</label>				
					<input type="text" name="newBooks__name" value="">
					<br>
					<label>Количество страниц</label>
					<input type="text" name="newBooks__duration" value="">
					<br>
					<label>Жанры произведения</label>
					<select name="newBooks__genres[]" multiple>
						<?php include_once 'logic/get_genres.php'; ?>
					</select>
					<br>
					<button type="submit">Добавить</button>

				</form>

		<?php else: ?>
				<?php include_once 'parts/not_auth.php'; ?>
			<?php endif; ?>	

	</body>
	</html>