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

if (isset($_POST['ajoutnote'])) {
    $nomnote= $_POST['note_name'];
    $note = $_POST['notedonnee'];
    $choseneleve = $_POST['note_eleve'];
    $chosencours = $_SESSION['chosencours'];
    $chosenmatiere = $_POST['matierechoisi'];
    

    $login = $_SESSION["login"];


    $requete = "INSERT INTO notes (notes, nom_note, ext_module, ext_prof, ext_cours, ext_eleve) VALUES (:note, :titre, :module, :externe_prof, :cours, :eleve)";
    $stmt = $db->prepare($requete);
    $stmt->bindValue(":note", $note, PDO::PARAM_INT);
    $stmt->bindValue(":titre", $nomnote, PDO::PARAM_STR);
    $stmt->bindValue(":module", $chosenmatiere, PDO::PARAM_INT);
    $stmt->bindValue(":externe_prof", $_SESSION["id"], PDO::PARAM_INT);
    $stmt->bindValue(":cours", $chosencours, PDO::PARAM_INT);
    $stmt->bindValue(":eleve", $choseneleve, PDO::PARAM_INT);
    $stmt->execute();


    if ($stmt->rowCount()) {
        header('Location: ajoutnotes.php?added_successfully');
        echo"Votre matière a bien été ajoutée";
        var_dump($nomnote, $note, $choseneleve, $chosencours, $chosenmatiere, $_SESSION["id"]);

    } else {
        echo "L'ajout du cours a échoué. Veuillez réessayer.";
    }
}

?>


<!--     // $stmt->bindValue(":coef_cours", $coef, PDO::PARAM_INT);
    // $stmt->bindValue(":coef_matiere", $coef, PDO::PARAM_INT);
    // , :coef_cours, :coef_matiere -->
</body>
</html>