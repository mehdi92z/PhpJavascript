<?php
$bdd=new PDO('mysql:host=localhost;dbname=amembers','root','');
session_start();

 if (isset($_SESSION['id'])) {
 	$id=$_SESSION['id'];
 	$requser=$bdd->prepare('SELECT * FROM membre WHERE id = ?');
 	$requser->execute(array($id));
 	$userinfo=$requser->fetch();
 	if (isset($_POST['nvusername']) AND !empty($_POST['nvusername']) AND $_POST['nvusername']!=$userinfo['username']) {
 			///Update le username 
 			$nvusername=htmlspecialchars($_POST['nvusername']);
 			$insertuser=$bdd->prepare('UPDATE membre SET username=? WHERE id=?');
 			$insertuser->execute(array($nvusername,$id));
 			header('Location: profil.php?id='.$_SESSION['id']);

 		}
 	if (isset($_POST['nvemail']) AND !empty($_POST['nvemail']) AND $_POST['nvemail']!=$userinfo['mail']) {
 		$nvemail=htmlspecialchars($_POST['nvemail']);
 		$insertemail=$bdd->prepare('UPDATE membre SET mail=? WHERE id=?');
 		$insertemail->execute(array($nvemail,$id));
 		header('Location: profil.php?id='.$_SESSION['id']);
 		
 		   	# code...
 		   }	   
  ?>
  <html>
  <head>
  	<title>Editeur</title>
  </head>
  <body>
          <br><br>
    <div align='center'>
    <form method="POST" action="" >
        <table>
        <tr>
            <td>
                <label for="username">Username</label>
            </td>
            <td>
                <input type="text" name="nvusername" id="nvusername" value="<?php echo $userinfo['username'] ?>">
            </td>
        </tr>    
        <tr>
            <td>
                <label for="nvemail">Email</label>
            </td>
            <td>
                <input type="email" name="nvemail" id="nvemail" value="<?php echo $userinfo['mail'] ?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="nvpass">password </label>
            </td>
            <td>
                <input type="PASSWORD" name="nvpass" id="nvpass" value="">
            </td>
        </tr>
          <tr>
            <td>
                <label for="pass2">Confirm password </label>
            </td>
            <td>
                <input type="PASSWORD" name="nvpass2" id="nvpass2" value="" ">
            </td>
        </tr> 
        <td><input type="submit" name="update" value=" Update "></td>               
        </table>
    </form>
    <?php 
    if (isset($error)) {
        echo $error;
        # code...
    }
    ?>
    </div>
  </body>
  </html>
  <?php
}
else {
	header('Location: Connexion2.php');
}
?>