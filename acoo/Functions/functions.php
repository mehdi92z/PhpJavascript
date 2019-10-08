<?php
function getTypeReclamation($id){
	global $bdd;
	$rec=$bdd->prepare('SELECT typeReclamation FROM reclamation WHERE idReclamation = ?');
	$rec->execute(array($id));
	$type=$rec->fetch();
	return $type['typeReclamation'];
}

function getEtatReclamation($id){
	global $bdd;
	$rec=$bdd->prepare('SELECT etatReclamation FROM reclamation WHERE idReclamation = ?');
	$rec->execute(array($id));
	$type=$rec->fetch();
	return $type['etatReclamation'];
}

function getpanne($id){
	global $bdd;
	$rec=$bdd->prepare('SELECT panne FROM reclamation WHERE idReclamation = ?');
	$rec->execute(array($id));
	$type=$rec->fetch();
	return $type['panne'];
}


function getnomClient($id){
	global $bdd;
	$rec=$bdd->prepare('SELECT nomClient FROM client WHERE idReclamation = ?');
	$rec->execute(array($id));
	$type=$rec->fetch();
	return $type['nomClient'];
}

function getnumclient($id){
	global $bdd;
	$rec=$bdd->prepare('SELECT numclient FROM client WHERE idReclamation = ?');
	$rec->execute(array($id));
	$type=$rec->fetch();
	return $type['numclient'];
}



?>