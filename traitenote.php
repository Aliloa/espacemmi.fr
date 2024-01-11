<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

session_start();
include("connexion.php");

session_start();
include("connexion.php");

if (isset($_POST['ajoutnote'])) {
    $nomnote = $_POST['note_name'];
    $note = $_POST['notedonnee'];
    $choseneleve = $_POST['note_eleve'];
    $chosencours = $_SESSION['chosencours'];
    $chosenmatiere = $_SESSION['id_matiere'];

    $requeteid = 'SELECT id_cours, ext_matiere FROM cours WHERE id_cours = :idCours';
    $stmtIDs = $db->prepare($requeteid);
    $stmtIDs->bindValue(':idCours', $chosencours, PDO::PARAM_INT);
    $stmtIDs->execute();
    $resultIDs = $stmtIDs->fetch(PDO::FETCH_ASSOC);

    $idCours = $resultIDs['id_cours'];
    $idMatiere = $chosenmatiere;

    $requete = "INSERT INTO notes (notes, nom_note, ext_module, ext_prof, ext_cours, ext_eleve, coef_cours, coef_matiere, date_note) 
    VALUES (:note, :titre, :module, :externe_prof, :cours, :eleve, :coef_cours, :coef_matiere, NOW())";

    $stmt = $db->prepare($requete);
    $stmt->bindValue(":note", $note, PDO::PARAM_INT);
    $stmt->bindValue(":titre", $nomnote, PDO::PARAM_STR);
    $stmt->bindValue(":module", $chosenmatiere, PDO::PARAM_INT);
    $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
    $stmt->bindValue(":cours", $idCours, PDO::PARAM_INT);
    $stmt->bindValue(":eleve", $choseneleve, PDO::PARAM_INT);
    $stmt->bindValue(":coef_cours", $idCours, PDO::PARAM_INT);
    $stmt->bindValue(":coef_matiere", $idMatiere, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount()) {
        header('Location: ajoutnotes.php?added_successfully');
        echo "Votre note a bien été ajoutée";
        unset($_SESSION['chosencours']);
        unset($_SESSION['id_matiere']);
    } else {
        header('Location: ajoutnotes.php?error');
        echo "L'ajout de la note a échoué. Veuillez réessayer.";
    }
}


?>
</body>
</html>