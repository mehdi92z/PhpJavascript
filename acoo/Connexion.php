<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbname=amembers','root','');
if(isset($_POST['clickedc'])){
$usernamec=htmlspecialchars($_POST['usernamec']);
$passc=$_POST['passc'];

if(!empty($usernamec) AND !empty($passc)){
	$requser=$bdd->prepare("SELECT * FROM membre WHERE username = ? AND password = ?");
	$requser->execute(array($usernamec,$passc));
	
	$userexist=$requser->rowCount();
	if ($userexist==1) {

    $userinfo=$requser->fetch();
    $_SESSION['id']=$userinfo['id'];
    $_SESSION['usename']=$userinfo['username'];
    $_SESSION['mail']=$userinfo['mail'];

    header("Location: profil.php?id=".$_SESSION['id']);
	

	}
	else{
		$error='identifiant exist pas ';
	}


}
else{
	$error='Tous les champs doivent entre complete';
}
}



?>
<html>
<head>
	<title>Connexion</title>
</head>
<body>
	<div align="center">
	<h2>Connexion</h2>
    </div>
        <br><br>
    <div align='center'>
    <form method="POST" action="" >
        <table>
        <tr>
            <td>
                <label for="usernamec">Username</label>
            </td>
            <td>
                <input type="text" name="usernamec" id="usernamec" placeholder="your username pls">
            </td>
        </tr>
        <tr>
           <td>
               <label for="passc">password </label>
           </td>
           <td>
               <input type="PASSWORD" name="passc" id="passc" placeholder="your password">
           </td>
        </tr>
         <td><input type="submit" name="clickedc" value=" Connexion "></td> 
         <?php
         if(isset($error)){
         	echo $error;
         }

         ?>
     </table>
                 
</body>
</html>