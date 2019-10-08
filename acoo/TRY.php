<?php
$bdd=new PDO('mysql:host=localhost;dbname=amembers','root','');

	$requser=$bdd->prepare("SELECT * FROM membre WHERE username = ? AND password = ?");
	$requser->execute(array('adel Zeriri','123456'));
	
	$userexist=$requser->rowCount();
	echo $userexist;
	if ($userexist==1) {
		header('Location: profil.php');
		# code...
	}
?>