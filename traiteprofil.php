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
    
    header('Location:parametres.php?modification_success');


    $requete = "UPDATE utilisateurs SET photoprofil = :upload WHERE login='{$_SESSION["login"]}'";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":upload", $name_file, PDO::PARAM_STR);
    $stmt->execute();
    echo $requete;
}    
// header('Location:parametres.php?erreur=inconnu');

?>


<!--  if ($nouvellephoto) {
        $content_dir = 'upload/';
        $tmp_file = $nouvellephoto['tmp_name'];
        if (!is_uploaded_file($tmp_file)) {
            $name_file = "profil_" . $login . ".png";
        } else {
            $name_file = "profil_" . $login . ".png";
            if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
                exit("Impossible de copier le fichier dans $content_dir");
            }
            echo "Le fichier a bien été uploadé";
        }

        // Mettre à jour la nouvelle photo de profil
        $requete = "UPDATE utilisateurs SET profilphoto = :photo WHERE id = :userId";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(":photo", $name_file, PDO::PARAM_STR);
        $stmt->bindValue(":userId", $id_user, PDO::PARAM_INT);
        $stmt->execute();

        // Récupérer les informations mises à jour de l'utilisateur
        $requeteInfosMisesAJour = "SELECT * FROM utilisateurs WHERE id = :userId";
        $stmtInfosMisesAJour = $db->prepare($requeteInfosMisesAJour);
        $stmtInfosMisesAJour->bindValue(":userId", $id_user, PDO::PARAM_INT);
        $stmtInfosMisesAJour->execute();
        return $stmtInfosMisesAJour->fetch(PDO::FETCH_ASSOC);
    } else {
        // Si aucune nouvelle photo n'est téléchargée, garder la photo de profil actuelle
        $requeteInfosActuelles = "SELECT * FROM utilisateurs WHERE id = :userId";
        $stmtInfosActuelles = $db->prepare($requeteInfosActuelles);
        $stmtInfosActuelles->bindValue(":userId", $id_user, PDO::PARAM_INT);
        $stmtInfosActuelles->execute();
        return $stmtInfosActuelles->fetch(PDO::FETCH_ASSOC);
    } -->