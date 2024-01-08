<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

session_start();
include("connexion.php");

if (isset($_POST['ajoutercours'])) {
    $module = $_POST['matiere'];
    $coef = $_POST['coef'];
    $login = $_SESSION["login"];

    $content_dir = 'matiere/'; // dossier où sera déplacé le fichier
    $tmp_file = $_FILES['fichier']['tmp_name'];
    if (!is_uploaded_file($tmp_file)) {
        $name_file = "matiere_" . $login . ".png";
    } else {
        $name_file = "matiere_" . $login . ".png";
    }
    // on copie le fichier dans le dossier de destination
    $name_file = "matiere_" . $login . ".png";
    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)){
        exit("Impossible de copier le fichier dans $content_dir");
    }

    $requete = "INSERT INTO grossematiere (nom_mat, coefficient, illustration, prof_ext) VALUES (:cours, :coef, :photo, :externe_prof)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":cours", $module, PDO::PARAM_STR);
    $stmt->bindValue(":coef", $coef, PDO::PARAM_STR);
    $stmt->bindValue(":photo", $name_file, PDO::PARAM_STR);
    $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
    $stmt->execute();

    $requeteProfesseur = "SELECT * FROM utilisateurs WHERE nom = :nomProfesseur AND prenom = :prenomProfesseur AND role = 'Enseignant.e'";
    $stmtProfesseur = $db->prepare($requeteProfesseur);
    $stmtProfesseur->bindValue(":nomProfesseur", $nomProfesseur, PDO::PARAM_STR);
    $stmtProfesseur->bindValue(":prenomProfesseur", $prenomProfesseur, PDO::PARAM_STR);
    $stmtProfesseur->execute();

    if ($stmt->rowCount()) {
        header('Location: ajout_matiere.php?added_successfully');
        echo"Votre matière a bien été ajoutée";
    } else {
        echo "L'ajout du cours a échoué. Veuillez réessayer.";
    }
}

?>

</body>
</html>