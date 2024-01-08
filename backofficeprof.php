<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_accueil.css'>
    
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>
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
    </form></body>
</html>