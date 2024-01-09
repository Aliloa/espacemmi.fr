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
    <h1>Mes cours</h1>

    <div>
    </div>


    <?php
    include('connexion.php');
    $requete = "SELECT * FROM grossematiere ORDER BY id_cours";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    foreach ($resultat as $cours) {
        echo "<div class='cours'>
                            <img src='matiere/{$cours["img"]}' alt=''>
                            <div>
                                <h2>{$cours["cours"]}</h2>
                                <p> Crée par {$cours["prof"]}</p>
                            </div>
                        </div>";
    }
    ?>
</body>

</html>