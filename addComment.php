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
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            // Connexion à la base de données
            include 'init_db.php';
            // Récupération du billet
            $req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(post_time, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM articles WHERE id = ?');
            $req->execute(array($_GET['comment']));
            $donnees = $req->fetch();
            ?>
            <div class="news">
                <h3>
                    <?php echo htmlspecialchars($donnees['title']); ?>
                    <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                </h3>

                <p>
                    <?php
                    echo nl2br(htmlspecialchars($donnees['content']));
                    ?>
                </p>
            </div>
            <div class="col-12 text-center mb-5">
                <h2 class="text-black section-title text-uppercase">Ajouter un commentaire</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6 mb-5">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <textarea name="content" class="form-control" placeholder="Ecrivez votre commentaire" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 ml-auto">
                            <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" name="sendNew" value="Commenter">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="news">
        <?php
        if (isset($_POST['sendNew'])) {
            $comment = $_POST['content'];
            include 'init_db.php';
            $data = $bdd->prepare("INSERT INTO commentaires(post_id,comment_id,content,post_time) VALUES (?,?,?,NOW())");
            $data->execute(array($_GET['comment'],$_SESSION['id'], $comment));
            header('location:index.php');
        }
        ?>

    </div>
    </div>

    </div>
</body>

</html>