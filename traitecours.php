<?php

session_start();
include("connexion.php");

if (isset($_POST['ajoutercours'])) {
    $cours = $_POST['cours'];
    $coef = $_POST['coef'] = null;
    $login = $_SESSION["login"];
    $matierechoose = $_POST["matierechoisi"];

    $content_dir = 'documents/';
    $tmp_file = $_FILES['document']['tmp_name'];
    if (!is_uploaded_file($tmp_file)) {
        exit("Le fichier est introuvable");
    }

    $name_file = $_FILES['document']['name'];
    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)){
        exit("Impossible de copier le fichier dans $content_dir");
    }

    $requete = "INSERT INTO cours (cours, document, externe_prof, coef, ext_matiere) VALUES (:cours, :doc, :externe_prof, :coef, :ext_matiere)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":cours", $cours, PDO::PARAM_STR);
    $stmt->bindValue(":doc", $name_file, PDO::PARAM_STR);
    $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
    $stmt->bindValue(":coef", $coef, PDO::PARAM_STR);
    $stmt->bindValue(":ext_matiere", $matierechoose, PDO::PARAM_INT);
    $stmt->execute();
var_dump($stmt);

    if ($stmt->rowCount()) {
        header('Location: ajout_cours.php?added_successfully');
        echo"Votre matière a bien été ajoutée";
    } else {
        echo "L'ajout du cours a échoué. Veuillez réessayer.";
    }
}

?>