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
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>

<a href="absenceprof.php">Ajouter les absences</a>

<a href="ajoutnotes.php">Ajouter des notes</a>


<a href="ajout_matiere.php">Ajouter une matière</a>


<a href="ajout_cours.php">Ajouter un cours</a>


  

</body>
</html>