<?php

session_start();
include("connexion.php");

if (isset($_POST['ajoutmatiere'])) {
    $module = $_POST['matiere'];
    $coef = $_POST['coef'];
    $type = $_POST['cours'];
    $login = $_SESSION["login"];

    $content_dir = 'matiere/'; // dossier où sera déplacé le fichier
    $tmp_file = $_FILES['fichier']['tmp_name'];
    if (!is_uploaded_file($tmp_file)) {
        $name_file = "matiere_" . "_" . $login . $module . ".png";
    } else {
        $name_file = "matiere_" . "_" . $login . $module . ".png";
    }
    // on copie le fichier dans le dossier de destination
    $name_file = "matiere_" . $login . "_" . $module . ".png";
    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)){
        exit("Impossible de copier le fichier dans $content_dir");
    }

    $requete = "INSERT INTO grossematiere (nom_mat, coefficient, illustration, type, prof_ext) VALUES (:cours, :coef, :photo, :type, :externe_prof)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":cours", $module, PDO::PARAM_STR);
    $stmt->bindValue(":coef", $coef, PDO::PARAM_INT);
    $stmt->bindValue(":photo", $name_file, PDO::PARAM_STR);
    $stmt->bindValue(":type", $type, PDO::PARAM_STR);
    $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount()) {
        header('Location: ajout_matiere.php?added_successfully');
        echo"Votre matière a bien été ajoutée";
    } else {
        echo "L'ajout du cours a échoué. Veuillez réessayer.";
    }
}

?>
