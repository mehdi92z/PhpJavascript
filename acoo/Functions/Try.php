<?php
$bdd = new PDO('mysql:host=localhost;dbname=greclamation','root','');
include('functions.php');

$id=2;
$typer=getTypeReclamation($id);
echo $typer;
echo $id;
?>
<!DOCTYPE html>
<html>
<head>
	<title>try</title>
</head>
<body> 
	<?php= $id ?>
<br><br>
<img src="captcha.php">
</body>
</html>