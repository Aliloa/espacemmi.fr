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


    <form action="traitematiere.php" method="POST" enctype='multipart/form-data'>
        <h1>Ajouter une matière</h1>

        <label for="module">Nom du la matière</label>
        <input type="text" id="module" name="matiere" required>


        <label for="co">Coefficient</label>
        <input type="number" id="co" name="coef" required min="0" max="20">


        <p>ajouter une photo pour votre matière</p>
        <input type="file" name="fichier" size="30" required> <br> 




        <button type="submit" name='ajoutercours'>Ajouter</button>


    </form>


    <form action="deconnexion.php" action='GET'>
        <input type="submit" name="deconnect" value="Se déconnecter">
    </form>

    <?php
    include("connexion.php");
    $requete = 'SELECT * FROM grossematiere';
    $stmt = $db->query($requete);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);


    foreach ($result as $matiere) {
        echo "        <p>{$matiere['nom_mat']}</p>

        <img src='matiere/{$matiere["illustration"]}' alt=''>";
    }
?>

</body>
</html>