<header>	
	<nav>	
		<?php if( isset($_SESSION['user_login']) ): ?>
			<a href="index.php">Главная</a>
			<a href="mybooks.php">Мои книги</a>
			<a href="control.php">Контрольная панель</a>
		<?php else: ?>
			<a href="signin.php">Авторизация</a>
			<a href="signup.php">Зарегистрироваться</a>
		<?php endif; ?>
	</nav>	
</header>
<hr>