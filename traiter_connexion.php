<?php
session_start();

include("connexion.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $requete = "SELECT * FROM utilisateurs WHERE email=:mail";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(':mail', $_POST["mail"], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
        $result = $stmt->fetch();
        if (password_verify($_POST["password"], $result["mot_de_passe"])) {
            $_SESSION["login"] = $result["mail"];
            $_SESSION["prenom"] = $result["prenom"];
            header("Location: accueil.php");
        } else {
            header('Location:connexion_page.php?erreur=mdp');

        }
    } else {
        header('Location:connexion_page.php?erreur=user_not_found');
    }
} else {
    header('Location:connexion_page.php?erreur=champs_vide');
}
?>
