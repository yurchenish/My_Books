<?php 
require_once 'db.php' ;

$sql = 'SELECT id, name FROM mybooks ORDER BY id DESC LIMIT 1';
$result = $pdo->query($sql);
$mybooks = $result->fetch(PDO::FETCH_OBJ);
?>

<h4>
		<a href=<?php echo 'mybooks.php#reeded' . $mybooks->id; ?> ><?php echo $mybooks->name; ?></a>
</h4>