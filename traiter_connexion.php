<?php
session_start();

include("connexion.php");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Mot de passe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300&family=Inter:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style_inscription.css">
    <link rel="icon" href="img/favicon.png">
</head>

<body>
    <?php

$requete = "SELECT * FROM utilisateurs WHERE login=:login";
$stmt = $db->prepare($requete);
$stmt->bindValue(':login', $_POST["login_user"], PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount()) {
    $result = $stmt->fetch();
    if (password_verify($_POST["password"], $result["mot_de_passe"])) {
        $_SESSION["login"] = $result["login"];
        $_SESSION["role"] = $result["role"];
        $_SESSION["id"] = $result["id_utilisateurs"];

        if (isset($_SESSION["login"]) && $_SESSION["login"] === 'Admin') {
            header("Location: administration.php");
            exit();
        } elseif (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
            header("Location: backofficeprof.php");
            exit();
        } elseif (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
            header("Location: page_crous.php");
            exit();
        }
    } else {
        header('Location:connexion_page.php?erreur=mdp');
        exit();
    }
        echo "<div id='custom-popup'>";
                echo "<p>Connexion réussi ! </p>";
                echo "</div>";

                echo "<script>";
                echo "setTimeout(function() {";
                echo "   window.location.href = 'accueil.php';";
                echo "}, 2000);";
                echo "</script>";
            exit(); 
    
}  else{
    header('Location:connexion_page.php?erreur=user_not_found');
    exit();

}
?>

</body>
</html>
