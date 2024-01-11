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
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
   
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: backofficeprof.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }


    ?>

    <form action="traite_controle.php" method="POST">
        <h1>Ajouter un controle / devoir sur table</h1>

        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" required>

        <label for="nom">Date</label>
        <input type="date" name="date" required> <br>


        <button type="submit" name='soumettre'>Ajouter</button>
    </form>
</body>

</html>