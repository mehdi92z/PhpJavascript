<?php
session_start();

    $bdd = new PDO('mysql:host=localhost;dbname=greclamation','root','');


    if (isset($_POST['Click'])) {
        $typeReclamation=htmlspecialchars($_POST['typeReclamation']);
        $dateReclamation=htmlspecialchars($_POST['dateReclamation']);
        $etatReclamation=htmlspecialchars($_POST['etatReclamation']);
        $panne=htmlspecialchars($_POST['panne']);
        $idClient=htmlspecialchars($_POST['idClient']);

        if (!empty($_POST['typeReclamation']) AND !empty($_POST['dateReclamation']) AND !empty($_POST['etatReclamation']) AND !empty($_POST['panne']) AND !empty($_POST['idClient']) ) {


                $insertdb=$bdd-> prepare("INSERT INTO Reclamation (typeReclamation,dateReclamation,etatReclamation,panne,idClient) VALUES (?,?,?,?,?)");
                $insertdb->execute(array($typeReclamation,$dateReclamation,$etatReclamation,$panne,$idClient));
                header('Location: home2.php');

                    }

        else{
            $error="Tous les champs doit etre remplis";
        }
    }
    ?>
<html>
<head>
	<title>tuto</title>
</head>
<body>
	<form method="POST"  >
		<label>typeReclamation</label><input type="text" name="typeReclamation"> <br>
		<label>dateReclamation</label><input type="date" name="dateReclamation"> <br>
		<label>etatReclamation</label><input type="text" name="etatReclamation"> <br>
		<label>panne</label><input type="text" name="panne"> <br>
		<label>idClient</label><input type="text" name="idClient" value=<?php echo $_SESSION['idclient']; ?> > <br>
		<input type="submit" name="Click"  value="valider">
		<?php if (isset($error) AND !empty($error)) {
	
		echo $error;
	} ?>
	</form>

</body>
</html>