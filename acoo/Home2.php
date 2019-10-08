<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=greclamation','root','');
$list=$bdd->query('SELECT * FROM Reclamation ');
if (isset($_POST['R']) AND !empty($_POST['R'])) {

	$list=$bdd->prepare('SELECT * FROM Reclamation WHERE idReclamation= ?');
	$list->execute(array($_POST['R']));
}

?>
<html>
<head>
	<title></title>
</head>
<body>
<form method="POST" action="" >
	<input type="submit" name="profil" value="mon profil">
	<?php if (isset($_POST['profil'])) {
		header("Location: profil.php?id=".$_SESSION['id']);
		# code...
	} ?>
	<br>
    <input type="submit" name="liste" value="Lister les Reclamation"><br>
    <br>
    <a href="ajouterc.php">Ajouter Client</a><br>
    <a href="ajouter.php"> Ajouter une reclamation</a><br>

    <input type="search" name="R" placeholder="Rechercher..."><input type="submit" value='Rechercher une Reclamation'>

<?php

if(isset($_POST['liste']) or (isset($_POST['R']) AND !empty($_POST['R']))){
	
	?>
	<table border="1" align="center">
		<tr>
			<td>idReclamation</td><td>typeReclamation</td><td>dateReclamation</td><td>etatReclamation</td><td>panne</td><td> 	idClient</td>
		</tr>
<?php
	while ($info = $list->fetch()) {
?>
<tr>
<td><?php echo $info['idReclamation']; ?></td><td><?php echo $info['typeReclamation'] ; ?></td><td><?php echo $info['dateReclamation'] ; ?></td><td><?php echo $info['etatReclamation'] ; ?></td><td><?php echo $info['panne'] ; ?></td><td><?php echo $info['idClient'] ; ?></td></tr>

		<?php
		 
		 } 
		?>
	</table>
<?php
}
?>

</form>
</body>
</html>