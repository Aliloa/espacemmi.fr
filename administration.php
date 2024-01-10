<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_accueil.css'>
    <title>Espace MMI | admninistration</title>
</head>

<body>
    <style>
        .popup-visible {
  z-index: 999;
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  max-width: 80%;
  max-height: 80vh;
  overflow-y: auto;
  padding: 20px;
  background-color: #252525;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  line-height: 2.5rem;
  color: #D1CECE;
  text-align: center;
  border-radius: 22px;
}

.popup-visible img {
  cursor: pointer;
  width: 30px !important;
  height: 30px !important;
  position: absolute;
  filter: contrast(0%);
  top: 10px;
  right: 10px;
}

.croix {
  position: fixed;

}

.mention-ptit{
  cursor: pointer;
}
    </style>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>

    <!-- Logo Accueil -->
    <a href='#'><img src='./img/logo.svg' alt="page d'accueil" aria-current="currentpage"></a>

 

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
            <p>{$users['id_utilisateurs']}, {$users['login']}, {$users['nom']}, {$users['prenom']}, {$users['email']}, {$users['role']} {$users['promotion']} </p>
            <a href='javascript:void(0);' class='btn btn-danger mention-ptit' onclick='afficherPopupConfirmation({$users["id_utilisateurs"]})'>Supprimer</a>
                
            <div class='popup-visible'>
                <img src='img/croix.png' alt='fermer' class='fermer'>
                <div class='mention'>
                    <p>Êtes-vous sûr de vouloir effacer définitivement {$users["login"]} ?</p>
                    <a href='traitesuppression.php?id={$users["id_utilisateurs"]}' class='btn btn-warning' id='lienSuppression'>Oui</a>
                    <a href='javascript:void(0);' class='btn btn-secondary' onclick='annulerSuppression()'>Non</a>
                </div>
            </div>";
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

<script>
    let popup = document.querySelector('.popup-visible');

    function afficherPopupConfirmation(userId) {
        let lienSuppression = document.getElementById('lienSuppression');
        lienSuppression.href = 'traitesuppression.php?id=' + userId;

        popup.style.display = 'block';
    }

    function fermerPopup() {
        popup.style.display = 'none';
    }

    function annulerSuppression() {
        fermerPopup();
    }

    let fermer = document.querySelector('.fermer');
    fermer.addEventListener('click', function () {
        fermerPopup();
    });
</script>



</body>

</html>