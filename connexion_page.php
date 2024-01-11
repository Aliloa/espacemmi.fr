<?php
    session_start();
    include('connexion.php');
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

    

    <main class="main-2">

        <div class="logo-1">
            <a href="index.php"><img src="img/logo.svg" alt="page d'accueil de l'ent"></a>
            <a href="index.php"><img src="img/logo-long.png" alt="page d'accueil de l'ent"></a>
        </div>


        <div class="formulaire">

            
            <form action="traiter_connexion.php" method="POST">
                <?php
                if (isset($_GET["erreur"])) {
                    echo "Vous vous êtes trompés, veuillez recommencez";
                    // echo "<a href='inscription_page.php?erreur=login'>Créez un compte</a>";
                
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

                <span>Vous avez oublié votre mot de passe ? Retrouvez le <a href="mdp_page.php" style="text-decoration: underline; color:  #604CF9;">lien de récupération de mot de passe ici ! </a></span>


            </form>

            <div class="image2">
                <img src="img/main_image.svg" alt="">
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