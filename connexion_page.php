<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Connexion</title>
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="stylesheet" href="css/style_navigation.css">
    <link rel="icon" href="img/favicon.png">

</head>

<body>

    <?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
        header('Location: backofficeprof.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: backofficeprof.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>

    <main class="main-2">

        <div class="logo-1">
            <a href="index.php"><img src="img/logo.svg" alt="page d'accueil de l'ent"></a>
            <a href="index.php"><img src="img/logo-long.png" alt="page d'accueil de l'ent"></a>
        </div>


        <div class="formulaire">

            
            <form action="traiter_connexion.php" method="GET">
                <?php
                if (isset($_GET["erreur"])) {
                    echo "Vous vous êtes trompés, veuillez recommencez";
                
                }
                ?>

                <h1>Connexion</h1>

                <label for="mail">Login</label><br>
                <input class="bouton2" type="text" id="mail" name="login_user" required><br>

                <label for="password">Mot de passe</label><br>
                <input class="bouton2" type="password" id="password" name="password" required>


                <div class="bouton1">
                    <input type='submit' value='Se connecter'>
                </div>

                <span>Vous avez oublié votre mot de passe ? Alors retrouvez le <a href="mdp_page.php">ici !</a></span>


            </form>

            <div class="image2">
                <img src="img/main_image.svg">
            </div>

        </div>




    </main>



    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>


</body>

</html>