<?php
$bdd=new PDO('mysql:host=localhost;dbname=amembers','root','');
session_start();
 $getid=$_GET['id']; 
 $reqid=$bdd->prepare('SELECT * FROM MEMBRE WHERE id=?');
 $reqid->execute(array($getid));
 $userinfo=$reqid->fetch();
?>
 <html>
 <body>
 <h2> Le Profil De <?php echo $userinfo['username']; ?>
<h2> Le Profil De <?php echo $userinfo['mail'];?>
	<br>
<?php

if ($getid==$_SESSION['id']) {
?>

<a href='Editer.php?'> Gerer mon Compte</a><br>
<a href="Deconnexion.php">Se deconecter</a><br>
<a href="home2.php">Index Reclamation </a>
<?php
}
?>

</body>
</html>

