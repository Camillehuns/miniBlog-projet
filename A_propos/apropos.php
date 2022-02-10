<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre Blog</title>
    <link rel="stylesheet" href="apropos.css">
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
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="../ajouterArticle.php">Ajouter un article</a></li>
                <li><a class="active" href="apropos.php" target="_blank">A propos</a></li>
                <li><a href="../Contact/contact.php">Contact</a></li>
                <li><a href="../login.php" target="_blank">Déconnexion</a></li>
            </ul>    
        </nav>
    </header>
    <div class="banniere">
        <img src="../image/blog.jpg" alt="blog">
    </div>
    <div class="format-text">
        <h2>Introduction</h2>
        <p>
            Dans ce projet de technologie web, nous avons réalisé un mini-blog  avec gestion des articles en CRUD par un administrateur, 
            un système de commentaire en CRUD par l’utilisateur mais aussi les utilisateurs extérieurs. Le modèle que nous avons choisi 
            n’est pas relative au MVC mais plus sur du micro-service, un code qui respecte les fonctionnalités demandé
        </p>
        <h2>Technologies utilisées</h2>
        <p>
            Pour la réalisation de ce projet, nous avons essentiellement choisit d’utiliser le  langage PHP car il est un langage script 
            embarqué et open-source et est le plus utilisé pour la création de pages web dynamique surtout dans le monde de l’entreprise.  
            De plus PHP présent l’avantage d’être flexible et à une grande compatibilité avec d’autre base de donnée . Il est aussi facile 
            à maîtriser et selon certaines sources plus performant que le JAVA en ce qui concerne le développement web.<br/>
            PHP nous offre la possibilité de bénéficier pour le développement de nos site d’un serveur gratuit que nous pouvant installer 
            en local  et est gratuit. En ce qui concerne notre base de donnée, nous avons utilisé MySQL vu que nous avions déjà des bases dans 
            l’utilisation de cette base de données. Toutes ces différentes raisons nous ont donc poussées à opter pour ces choix technologiques.
        </p>
        <h2>Conclusion</h2>
        <p>
            Pour la création de ce projet, nous avons voulu faire le modèle MVC afin de très vite nous rendre compte des différentes contraintes 
            de temps qui nous fessais face. Nous avons donc rencontré plusieurs difficultés lors de l’élaboration de notre projet, ce qui fais 
            que toutes les fonctionnalités demandés n’ont pas été prise en compte. Seule la base de donnée et quelques pages se sont fait sans 
            trop de problème. 
        </p>
    </div>
    
   <footer  class="footer">
        Le blog de Nathanaël et Camille| TP Web-Serveur S5
    </footer>  
</body>
</html>