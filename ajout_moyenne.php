<?php
    session_start();
    include("connexion.php");
    ?>  

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace | Moyenne</title>
<link rel="stylesheet" href="css/style_vie_scolaire.css">
<link rel="icon" href="img/favicon.png"></head>
<body>
<?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>
<div class="formulaire">
<h1>Moyenne</h1>

<form action="traite_moyenne.php" method="post">
<label for="matiere">Matière</label>
<input type="input" id="matiere" name="matiere" required>
<label for="note">Note</label>
<input type="input" id="note" name="note" required>
<input type='submit' value='Publier'>

</form>
</div>

</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
</html>