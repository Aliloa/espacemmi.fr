<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="stylesheet" href="css/style_navigation.css">



</head>

<body>

    <div class="main-2">

        <div class="logo-1">
            <a href="index.php"><img src="img/logo.svg"></a>
            <a href="index.php"><img src="img/logo-long.png"></a>

        </div>



        <div class="formulaire">


            <form action="traiter_mdp_mail.php" method="post">

                <p>Vous avez oublié votre mot de passe? Renseignez votre mail.</p>

                <label for="mail">Mail</label><br>
                <input class="bouton2" type="email" id="mail" name="mail" required>


                <div class="bouton1">
                    <a href="traiter_connexion.php">Envoyer</a>
                </div>
            </form>


            <div class="image2">
                <img src="img/main_image.svg">
            </div>

        </div>
    </div>

    <footer>
        <a href='mentions_legales.html'>
            <p> Mentions légales </p>
        </a>
    </footer>

    <!-- <footer>
        <div class="mentions-legales" onclick="openModal()">Mentions Légales</div>
    </footer> -->

    <!-- Modal -->
    <!-- <div id="myModal" class="modal" onclick="closeModal()">
        <div class="modal-content" onclick="event.stopPropagation();">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Mentions Légales</h2>
            <p>Ajoutez ici le contenu de vos mentions légales.</p>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('myModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('myModal').style.display = 'none';
        }
    </script> -->
</body>

</html>