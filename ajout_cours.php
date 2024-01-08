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
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>
    <a href="backofficeprof.php">Retour</a>
    <form action="traitecours.php" method="POST">
        <h1>Ajouter un cours</h1>

        <label for="module">Nom du module</label>
        <input type="text" id="module" name="module" required>


        <label for="co">Coefficient</label>
        <input type="number" id="co" name="coef" required min="0" max="20">






        <button type="submit" name='ajoutercours'>Ajouter</button>


    </form>


    <form action="deconnexion.php" action='GET'>
        <input type="submit" name="deconnect" value="Se déconnecter">
    </form>
</body>
        <!-- <div>
            <input type="file" name="fichier" size="30" required> <br>ajouter une photo
            <input type="submit" name="upload" value="Uploader"><br> <br>
        </div> -->

</html>