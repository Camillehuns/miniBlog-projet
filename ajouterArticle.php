<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Notre Blog</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700|Anton" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/v4-shims.css">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="Contact/contact.css">
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
                <li><a href="login.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="text-black section-title text-uppercase">Ajouter un article</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-5">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="title" placeholder="Titre">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="content" class="form-control" placeholder="Ecrivez le contenu" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 ml-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="sendNew" value="Poster">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="news">
        <?php
        if (isset($_POST['sendNew'])) {
            $title = $_POST['title'];
            $description = $_POST['content'];
            include 'init_db.php';
            $data = $bdd->prepare("INSERT INTO articles(admin_id,title,content,post_time) VALUES (?,?,?,NOW())");
            $data->execute(array($_SESSION['id'],$title, $description));
        }
        ?>

    </div>
    </div>

    </div>
    <footer class="footer">
        Le blog de Nathanaël et Camille| TP Web-Serveur S5
    </footer>
</body>

</html>