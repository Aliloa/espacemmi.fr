<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_accueil.css'>
    <title>Document</title>
</head>

<body>

    <!-- Logo Accueil -->
    <a href='accueil.php'><img src='./img/logo.svg' alt="page d'accueil" aria-current="currentpage"></a>

    <!-- Navigation desktop -->
    <nav class='navigation'>
        <ul class='choix'>
            <li><a href=''>Mes cours</a></li>
            <li><a href='vie_etudiante.php'>Vie étudiante</a></li>
            <li><a href='vie_scolaire.php'>Vie scolaire</a></li>
            <li><a href='page_crous.php'>Crous</a></li>
        </ul>

        <!-- Barre de recherche -->
        <div class='group'>
            <svg viewBox='0 0 24 24' aria-hidden='true' class='icon'>
                <g>
                    <path
                        d='M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z'>
                    </path>
                </g>
            </svg>
            <input class='input' type='search' placeholder='Search' />
        </div>

        <!-- minis icons + lien pdp permettant de se déconnecter et d'aller dans les paramètres  -->
        <div class='icon-photo'>
            <img class='logo' src='./img/1-lettre.svg' alt="page d' accueil">
            <img class='logo' src='./img/1-notif.svg' alt="page d' accueil">
            <img class='logo' src='./img/1-moon.svg' alt="page d' accueil">

            <!-- PHP - AJOUTEZ LE LIEN POUR LA D2CONEXION ET LE LIEN VERS LA PAGE PARAMETRES.PHP POUR MODIF LA PDP-->
            <div class='photo-2'>

                <?php
                include('connexion.php');

                if (isset($_SESSION["login"])) {
                    $stmt = $db->prepare('SELECT * FROM utilisateurs WHERE login=:login');
                    $stmt->bindValue(':login', $_SESSION["login"], PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($result) {
                        echo "
                    <a href='parametres.php'> <img src='upload/{$result['photoprofil']}' alt='' class='photo-2'></a>";
                    }
                }
                ?>

            </div>
            <!-- FIN PHP-->
        </div>
    </nav>


    <form action="traiteinscription.php" method="POST">
        <h1>Inscription</h1>

        <label for="login">Login</label>
        <input type="text" id="login" name="login" required>



        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>


        <label for="mail">Email</label>
        <input type="email" id="mail" name="email" required>


        <fieldset required>
            <legend>Choisissez votre rôle</legend>

            <div>
                <input class="radio" type="radio" id="eleve" name="role" value="Étudiant.e"
                    onclick="activerChampPromotion()" />
                <label class="choix" for="eleve">Étudiant.e</label>
            </div>

            <div>
                <input class="radio" type="radio" id="prof" name="role" value="Enseignant.e" />
                <label class="choix" for="prof">Professeur.e</label>
            </div>

            <div>
                <input class="radio" type="radio" id="crous" name="role" value="Membre du CROUS" />
                <label class="choix" for="crous">Membre du CROUS</label>
            </div>
        </fieldset>


        <!-- Champ de promotion pour les étudiants -->
        <div id="champPromotion" style="display: none;">
            <label>Votre promotion :</label>
            <label for="mmi1">MMI1</label>
            <input type="radio" name="promotion" id="mmi1" value="MMI1">

            <label for="mmi2">MMI2</label>
            <input type="radio" name="promotion" id="mmi2" value="MMI2">

            <label for="mmi3">MMI3</label>
            <input type="radio" name="promotion" id="mmi3" value="MMI3">
        </div>

        <br>


        <label for="password">Entrez un mot de passe</label>
        <input type="password" id="password" name="password" required>


        <label for="password2">Répétez le même mot de passe</label>
        <input type="password" id="password2" name="password2" required>

        <button type="submit" name='soumettre'>S'inscrire</button>
    </form>


    <?php
    include('connexion.php');
    $stmt = $db->query('SELECT * FROM utilisateurs');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($result as $users) {
        if ($users['login'] !== 'Admin') {

            echo "
            <p>{$users['login']}, {$users['nom']}, {$users['prenom']}, {$users['email']}, {$users['role']} {$users['promotion']} </p>";
        }
    }

    ?>


<form action="deconnexion.php" action='GET'>
        <input type="submit" name="deconnect" value="Se déconnecter">
    </form>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const passwordInput = document.getElementById('password');
            const password2Input = document.getElementById('password2');
            const messageContainer = document.createElement('div');

            form.appendChild(messageContainer);

            form.addEventListener('submit', function (event) {
                if (passwordInput.value !== password2Input.value) {
                    event.preventDefault();
                    messageContainer.textContent = "Le mot de passe ne correspond pas";
                    messageContainer.style.color = "red";
                }
            });
        });

    </script>
        <script>
              // pour afficher la promotion si jamais on coche étudiant
              var roleButtons = document.querySelectorAll('input[name="role"]');
        roleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                activerChampPromotion();
            });
        });

        // Fonction pour activer ou désactiver le champ de promotion
        function activerChampPromotion() {
            // Récupérer l'élément du champ de promotion
            var champPromotion = document.getElementById("champPromotion");

            // Récupérer le bouton radio sélectionné
            var boutonSelectionne = document.querySelector('input[name="role"]:checked');

            // Afficher ou masquer le champ de promotion en fonction de la sélection du rôle "Étudiant.e"
            champPromotion.style.display = (boutonSelectionne && boutonSelectionne.value === "Étudiant.e") ? "block" : "none";
        }
    </script>
</body>

</html>