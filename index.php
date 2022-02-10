<?php
session_start();
include('init_db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Blog</title>
    <link rel="stylesheet" href="style.css">
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
                <li><a class="active" href="index.php">Accueil</a></li>
                <li><a href="ajouterArticle.php">Ajouter un article</a></li>
                <li><a href="A_propos/apropos.php" target="_blank">A propos</a></li>
                <li><a href="Contact/contact.php">Contact</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="admin.php">Connexion Admin</a></li>
            </ul>
        </nav>
    </header>
    <div class="banniere">
        <img src="./image/blog.jpg" alt="blog">
    </div>
    <main class="main">
        <?php
        $req = $bdd->query('SELECT id, title, content, DATE_FORMAT(post_time, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles ORDER BY date_creation_fr desc');
        $link="login.php";
              

        while ($donnees = $req-> fetch()) {

            /*echo $_SESSION['id'];*/
            $req1 = $bdd->prepare('SELECT pseudo FROM admins WHERE id=?');
            $req1->execute(array($donnees['admin_id']));   
            $resultat = $req1->fetch();

            if(isset($_SESSION['id'])) {
                $link= "./addComment.php?comment=".$donnees['id'] ;
            }

        ?>
        <article class="article">
            <div class="article-date">Publié le <?php echo $donnees['date_creation_fr']; ?> <br/>
            par <?php echo $resultat['author']; ?></div>
            <h3 class="article-title"><?php echo htmlspecialchars($donnees['title']); ?></h3>
            <p>
            <?php echo nl2br(htmlspecialchars($donnees['content'])); ?>  </p>
            <a href="./allComments.php?comment=<?php echo $donnees['id']; ?>">Commentaires</a>
            <a style="margin-left:10%;" href="<?php echo $link ; ?> ">Commenter</a>
        </article><br/>
        <?php
        } // Fin de la boucle des billets
        $req->closeCursor();
        ?>
    </main>

    <footer class="footer">
        Le blog de Nathanaël et Camille| TP Web-Serveur S5
    </footer>
</body>

</html>