<?php
session_start();
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scales=1.0">
		<style>
		*,** {
			box-sizing: border-box;
		}
		body {
			padding:10%;
		}
		fieldset{
			display: flex;
			margin: auto;
			flex-wrap: wrap;
			width: 350px;
			margin-top: auto;
		}
		.btn {
			text-align: center;
			padding: 5%;
			background-color: indigo;
			color: white;
			margin-top: 15px;
			display: block;
			text-align: center;
			float:right;
			font-weight: bold;
		}
		.data {
			width: 100%;
			border-radius: 5px;
			margin: auto;
			padding:10px;
			outline: none;
			border-width: 1px;
		}
		</style>
		
	</head>

	<body>
		<fieldset>
			<legend><h2>Connectez-vous</h2></legend>
			<form method="post" action="">
					<label for="mail" id="adrm">Votre pseudo</label>:<br/><input type="text" name="adrm" class="data" required /><br/><br/>
					<label for="pass" id="mdp">Votre mot de passe</label>:<br/><input type="password" name="mdp" class="data"  required />
					<br/>
					<input type="submit" value="Connexion" name="conn" class="btn"/>
			</form>
		</fieldset>	
		<?php
include('init_db.php');
		if(isset($_POST['conn'])){
			if(isset($_POST['adrm'])){
				$pseudo=htmlspecialchars($_POST['adrm']);
				if(isset($_POST['mdp'])){
					$mdp=htmlspecialchars($_POST['mdp']);
					$req1=$bdd->prepare('SELECT * FROM admins WHERE pseudo=? AND password=?');
					$req1->execute(array($pseudo,$mdp));
					$nbre=$req1->rowCount();
					$resultat=$req1->fetch();
					if($nbre==1){
						$_SESSION['id']=$resultat['id'];
						/*$_SESSION['pseudo']=$resultat['pseudo'];
						$_SESSION['nom_photo']=$resultat['nom_photo'];
						$_SESSION['nom']=$resultat['nom'];
						$_SESSION['prenom']=$resultat['prenom'];*/
						header('location:ajouterArticle.php');
					}
					else {
						?><p style="color:red;position:absolute;top:25%;left:42.3%"><?php echo "Votre mail ou votre mot de passe est invalide";?></p>
			<?php
					}
				}
			}
		}
	
?>			
	</body>
</html>