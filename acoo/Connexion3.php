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
  $error='Tous les champs doivent etre  remplis ';
}
}



?>


<html>
<head>
	<title>Connexion</title>
  <link rel="stylesheet" type="text/css" href="d.css">
</head>
<body>
	
        <div class="container">
 <div class="row">
  <div class="col-md-4" >
   <div class="panel panel-primary">
    <div class="panel-heading">Les informations Personnel :</div>
    <div class="wrapper">
     <div class="panel-body">
    <div align='center'>
      <div align="center">
  <h2>Connexion</h2>
    </div>
        <br><br>
    <form method="POST" action="" >
        <table>
        <tr>
            <td>
                <label for="usernamec">Username</label>
            </td>
            <td>
                <input type="text" name="usernamec" id="usernamec" placeholder="Username">
            </td>
        </tr>
        <tr>
           <td>
               <label for="passc">password </label>
           </td>
           <td>
               <input type="PASSWORD" name="passc" id="passc" placeholder=" Password">
           </td>
        </tr>
         <td><input type="submit" name="clickedc" value=" Connexion "></td> 
         <?php
         if(isset($error)){
         	echo $error;
         }

         ?>
     </table>
      </form>
     <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</div>
   </div>
  </div>
 </div>
</div>
                 
</body>
</html>