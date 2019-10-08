<?php
session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=greclamation','root','');


    if (isset($_POST['ajouterc'])) {
        $idclient=htmlspecialchars($_POST['idclient']);
        $_SESSION['idclient']=$idclient;
        $nomClient=htmlspecialchars($_POST['nomClient']);
        $numClient=htmlspecialchars($_POST['numClient']);
      
        if (!empty($_POST['idclient']) AND !empty($_POST['nomClient']) AND !empty($_POST['numClient'])){


                $insertdb=$bdd-> prepare("INSERT INTO client (idclient,nomClient,numClient) VALUES (?,?,?)");
                $insertdb->execute(array($idclient,$nomClient,$numClient));
                header('Location: ajouter.php');

                    }

        else{
            $error="Tous les champs doit etre remplis";
        }
    }




?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajouter Client</title>
</head>
<body>
	<div align="center">
		<h1>Ajouter un Client </h1>
	</div>
	<form method="POST" action="" >
	<label for="idclient">Id Client </label><input type="number" name="idclient"> <br>
	<label for="nomClient">Nom Client </label><input type="text" name="nomClient"><br>
	<label for="numClient">Num Client</label><input type="text" name="numClient"><br>
	<?php if (isset($error)) {
		echo $error ; }?>
	<input type="submit" name="ajouterc" value="Valider">
	</form>

</body>
</html>