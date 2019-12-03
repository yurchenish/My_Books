	<?php require_once	'logic/db.php'; ?>

	<!DOCTYPE html>
	<html lang="ru">
	<head>
  <?php require_once	'parts/head.php'; ?>
	</head>
	<body>
		<?php include_once	'parts/header.php'; ?>

		<?php if( isset($_SESSION['user_login']) ): ?>
		
				<h3>Всего прочитано книг: <span id="reeded-count">
					<?php
							if( isset($_COOKIE['reeded']) ):
									echo count($_COOKIE['reeded']);
							else:
								echo 0;
							endif;
					?>
				</span></h3>

					<section id="mybooks-sec">	
							<?php include_once 'logic/print_books.php'; ?>
					</section>

		<?php else: ?>
				<?php include_once 'parts/not_auth.php'; ?>
			<?php endif; ?>	

	</body>
	</html>