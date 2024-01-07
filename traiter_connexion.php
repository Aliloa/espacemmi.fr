<?php
session_start();

include("connexion.php");


// if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $requete = "SELECT * FROM utilisateurs WHERE login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(':login', $_GET["login_user"], PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount()) {
        $result = $stmt->fetch();
        if (password_verify($_GET["password"], $result["mot_de_passe"])) {
            $_SESSION["login"] = $result["login"];
            if (isset ($_SESSION["login"]) && $_SESSION["login"] === 'Admin'){
                header("Location: administration.php");
                exit();
            }
            header("Location: accueil.php");
            exit();
        } else {
            header('Location:connexion_page.php?erreur=mdp');
            exit();
        }
    } else {
        header('Location:connexion_page.php?erreur=user_not_found');
    }
// } else {
//     header('Location:connexion_page.php?erreur=champs_vide');
// }
?>
