<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Blog</title>
    <link rel="stylesheet" href="recording.css">
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
                <li><a href="Contact/contact.php">Contact</a></li>
            </ul>    
        </nav>
    </header>
    <div class="banniere">
        <img src="image/blog.jpg" alt="blog">
    </div>
    <div class="div_1">
        <div id="welcome">Bienvenue sur la page d'enregistrement</div>
        <form id="form" method="post" action="" onsubmit="return validateDate() && validatePassword() && validateEmail()">
            <p>
                <label for="lastname">Nom : <input type="text" name="last_name" id="lastname" placeholder="Durant" size="30" required/></label><br/>
                <br/>
                <label for="firstname">Prénom : <input type="text" name="first_name" id="firstname" placeholder="Alisson" size="30" required/></label><br/>
                <br/>
                <label for="birthday">Date de naissance : <input type="date" name="birthday" id="birthday" placeholder="jj/mm/aaaa" size="30" required/></label><br/>
                <br/>
                <label for="username">Nom d'utilisateur : <input type="text" name="username" id="username" placeholder="durant_alisson321" size="40" minlength="6" required/></label><br/>
                <br/>
                <label for="userpwd">Mot de passe : <input type="password" name="userpwd" id="userpwd" placeholder="**********" size="20" required/></label><br/>
                <br/>
                <label for="useremail">Adresse mail : <input type="text" name="usermail" id="useremail" placeholder="durantAlisson@gmail.com" size="80" required/></label><br/>
                <br/>
            </p>
            <p>
                <input type="submit" value="Envoyer" name="envoi" />
                <input type="reset" value="Annuler"/>
            </p>
        </form>
    </div>


    <div class="table1">
         <a href="http://www.economiematin.fr/img/femme-internet-entrepreneuse-web-technologies.jpg" target="_blank"><img class="image_1" src="image/def.jpg" alt=""></a>
    </div>

   <footer  class="footer">
        Le blog de Nathanael et Camille| TP Web-Serveur S5
    </footer>
    <?php
include ('init_db.php');
if (isset($_POST['envoi'])) {
    if (isset($_POST['usermail'])) {
        $mail = htmlspecialchars($_POST['usermail']);
        if (isset($_POST['last_name'])) {
            $last_name = htmlspecialchars($_POST['last_name']);
            if (isset($_POST['first_name'])) {
                $first_name = htmlspecialchars($_POST['first_name']);
                if (isset($_POST['birthday'])) {
                    $birthday = htmlspecialchars($_POST['birthday']);
                    if (isset($_POST['username'])) {
                        $username = htmlspecialchars($_POST['username']);
                        if (isset($_POST['userpwd'])) {
                            $password = password_hash(htmlspecialchars($_POST['userpwd']), PASSWORD_DEFAULT);
                            // Vérification de l'existence du mail de celui qui s'inscrit actuellement
                            $reqmail = $bdd->prepare('SELECT * FROM membres WHERE email=?');
                            $reqmail->execute(array($mail));
                            $mail_exist = $reqmail->rowCount();
                            if ($mail_exist == 0) {
                                $insert = $bdd->prepare('INSERT INTO users(name,firstname,birthday,username,password,email) VALUES (?,?,?,?,?,?)');
                                $insert->execute(array($last_name, $first_name, $birthday, $username, $password, $mail));
                                header('location: index.php');
                            } else {
                                ?>
                                    <p style="color:red;position:absolute;left:50%;right:0%;top:62%;bottom:20%;"><?php echo 'Ce mailest déjà utilisé'; ?></p><?php
}
                        } else {
                            echo "Vous n'avez pas défini de mot de passe";
                        }

                    } else {
                        echo "Veuillez défini un pseudo";
                    }

                } else {
                    echo "Veuillez donner votre date de naissance";
                }

            } else {
                echo "Entrez votre prénom";
            }

        } else {
            echo "Entrez votre nom";
        }
    } else {
        echo "Entrez votre adresse mail";
    }

}
?>
</body>
</html>