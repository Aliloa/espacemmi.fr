<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<?php
include('connexion.php');
session_start();

$requete = "SELECT id_utilisateurs FROM utilisateurs";
$stmt = $db->prepare($requete);

$result = $stmt->execute();

if ($result) {
    // Fetch the data after execution
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $id = $row['id_utilisateurs'];
        echo 'ID Utilisateur: ' . $id;
    } else {
        echo 'User not found';
    }
} else {
    echo 'Error executing the query';
}
?>

<div class="main">
    <div class="logo">
        <img src="img/favicon.png" width="30px">
        <img src="img/logo(2).png">
    </div>

    <div class="formulaire">
        <form action="traiter_mdp_mail.php" method="post">
            <h1>Mot de passe</h1>
            <span>Vous avez oublié votre mot de passe? Renseignez votre mail</span>
            <label for="mail">Mail</label>
            <input type="email" id="mail" name="mail" required>
            <div class="bouton1">
                <button type="submit">Envoyer</button>
            </div>
        </form>

      

    </div>

    <div class="image3">
        <img src="img/main_image.png">
    </div>
</div>

<footer>
    <div class="mentions-legales" onclick="openModal()">Mentions Légales</div>
</footer>

<!-- Modal -->
<div id="myModal" class="modal" onclick="closeModal()">
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
</script>
</body>
</html>
