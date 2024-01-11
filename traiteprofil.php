<?php
session_start();
include("connexion.php");


if (isset($_POST['upload'])) {
    $login = $_SESSION["login"];


    $content_dir = 'upload/'; // dossier où sera déplacé le fichier
    $tmp_file = $_FILES['fichier']['tmp_name'];
    if (!is_uploaded_file($tmp_file)) {
        $name_file = "profil_" . $login . ".png";
    } else {
        $name_file = "profil_" . $login . ".png";

    }
    // on copie le fichier dans le dossier de destination
    $name_file = "profil_" . $login . ".png";
    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)){
        exit("Impossible de copier le fichier dans $content_dir");
    }

    $requete = "UPDATE utilisateurs SET photoprofil = :upload WHERE login='{$_SESSION["login"]}'";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":upload", $name_file, PDO::PARAM_STR);
    $stmt->execute();

    header('Location:profil.php?modification_success');
    exit();
}    


if (isset($_POST['changerbio'])) {

    $requete = "UPDATE utilisateurs SET bio = :newbio WHERE login=:login";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":newbio", $_POST['bio'], PDO::PARAM_STR);
    $stmt->bindValue(":login", $_SESSION["login"], PDO::PARAM_STR);
    $stmt->execute();

    header('Location:profil.php?modification_success');
    exit(); 

}
// header('Location:profil.php?erreur=inconnu');

?>

