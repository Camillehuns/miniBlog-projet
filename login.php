<?php 
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Blog</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <em class="fas fa-bars"></em>
            </label>
            <label class="logo">BLOG</label>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="A_propos/apropos.php" target="_blank">A propos</a></li>
                <li><a href="/Contact/contact.php">Contact</a></li>
            </ul>    
        </nav>
    </header>
    <div class="banniere">
        <img src="./image/blog.jpg" alt="blog">
    </div>
    <div class="table" id="A1">
        <form id="identification" action="" method="post">
            <p class="p1">
                Identifiez-vous <br/>
                <label class="username" for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" placeholder="durant_321" size="25" minlength="6" required/> <br/>
                <br/>
                <label class="userpwd" for="userpwd">Mot de passe</label>
                <input type="password" name="userpwd" id="userpwd" placeholder="**********" size="30" required/>
                <span id="msg_1"></span><br/>
                <br/>
            </p>
            <p class="p2">
                <input type="submit" value="Se connecter" name="envoi">
            </p> 
        </form>
        <p class="identification">
            première connexion?
            Si oui,cliquez
            <a href="./recording.php" title="Enregistrer un compte">ici</a>
        </p>
   </div>
   <div class="table1">
       <div class="cell" id="B1">
        <a href="http://www.economiematin.fr/img/femme-internet-entrepreneuse-web-technologies.jpg" target="_blank"><img class="image_1" src="image/def.jpg" alt=""></a>
       </div>
   </div>
   
   <footer  class="footer">
        Le blog de Nathanael et Camille| TP Web-Serveur S5
    </footer> 
    <?php 
     include("init_db.php");
if (isset($_POST['envoi'])){
    $message = " ";
    $password = password_hash(htmlspecialchars($_POST['userpwd']), PASSWORD_DEFAULT);
    $req = $bdd->prepare('SELECT * FROM users WHERE username = ?
    AND password = ?');
    $req->execute(array($_POST['username'],$password));
    $nbre=$req->rowCount();
    echo $nbre;
    if ($nbre == 1)
    {    
        echo "tcho";
         $message = "mauvais pseudo ou mot de passe";
    }
    else
    {
        echo "hello";
        session_start();
        while ( $userdata = $req -> fetch()){
            $_SESSION['id'] = $userdate['id'];
        }
        header('location:index.php');
    }
}     
?>
</body>
</html>