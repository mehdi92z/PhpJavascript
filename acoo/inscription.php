<?php


    $bdd = new PDO('mysql:host=localhost;dbname=amembers','root','');


    if (isset($_POST['clicked'])) {
        $username=htmlspecialchars($_POST['username']);
        $email=htmlspecialchars($_POST['email']);
        $email2=htmlspecialchars($_POST['email2']);
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];

        if (!empty($_POST['username']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) ) {
            if ($email==$email2) {

                if ($pass==$pass2) {
                $insertdb=$bdd-> prepare("INSERT INTO membre(username,mail,password) VALUES (?,?,?)");
                $insertdb->execute(array($username,$email,$pass));
                header('Location: connexion2.php');

                    }
                else{
                    $error="Le mot de pass nest pas identique";
                }
                    
            }
            else
            {
                $error=" Votre email ne sont pas identique ";
            }

            
        }
        else{
            $error="Tous les champs doit etre complete";
        }
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Bienvenue</title>
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
                <input type="text" name="username" id="username" placeholder="your username pls">
            </td>
        </tr>    
        <tr>
            <td>
                <label for="email">Email</label>
            </td>
            <td>
                <input type="email" name="email" id="email" placeholder="Right your email">
            </td>
        </tr>
        <tr>
            <td>
                <label for="email2">Confirm Email</label>
            </td>
            <td>
                <input type="email" name="email2" id="email2" placeholder="Confirm your email">
            </td>
        </tr>
        <tr>
            <td>
                <label for="pass">password </label>
            </td>
            <td>
                <input type="PASSWORD" name="pass" id="pass" placeholder="your password">
            </td>
        </tr>
          <tr>
            <td>
                <label for="pass2">Confirm password </label>
            </td>
            <td>
                <input type="PASSWORD" name="pass2" id="pass2" placeholder="Confirm your password">
            </td>
        </tr> 
        <td><input type="submit" name="clicked" value=" sign in "></td>               
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