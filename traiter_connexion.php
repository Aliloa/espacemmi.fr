<?php
session_start();

include("connexion.php");

$requete = "SELECT * FROM utilisateurs WHERE login=:login";
$stmt = $db->prepare($requete);
$stmt->bindValue(':login', $_GET["login_user"], PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount()) {
    $result = $stmt->fetch();
    if (password_verify($_GET["password"], $result["mot_de_passe"])) {
        $_SESSION["login"] = $result["login"];
        $_SESSION["role"] = $result["role"];  // Ajoutez cette ligne pour définir la variable de session "role"

        if (isset($_SESSION["login"]) && $_SESSION["login"] === 'Admin') {
            header("Location: administration.php");
            exit();
        } elseif (isset($_SESSION["role"]) && $_SESSION["role"] === 'Enseignant.e') {
            header("Location: parametres.php");
            exit();
        } elseif (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
            header("Location: page_crous.php");
            exit();
        }
    } else {
        header('Location:connexion_page.php?erreur=mdp');
        exit();
    }
        header("Location: accueil.php");
        exit();
    
}  else{
    header('Location:connexion_page.php?erreur=user_not_found');
    exit();


}
?>
