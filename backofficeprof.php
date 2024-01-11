<?php
session_start();
include("connexion.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style_accueil.css'>
    
    <title>Document</title>
</head>
<body>
<?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>

<a href="absenceprof.php">Ajouter les absences</a>

<a href="ajoutnotes.php">Ajouter des notes</a>


<a href="ajout_matiere.php">Ajouter une matière</a>


<a href="ajout_cours.php">Ajouter un cours</a>

<a href="ajout_travail.php">Ajouter un travail à faire</a>


  

</body>
</html>