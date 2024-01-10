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
    <h1> Filtré par </h1>

    <form action="filtrecours.php" method="GET">
            <div class="input-container">
                <select name="filter" id="filter" aria-label="Filtrer dans le site">
                    <option value="0">Filtrer</option>
                    <option value="1">SAE</option>
                    <option value="2">Ressources</option>
                </select>
                <input type="submit" value="Valider">
            </div>
        </form>



        <?php
include('connexion.php');

$requete = "SELECT *, nom, prenom from grossematiere, utilisateurs WHERE prof_ext = id_utilisateurs AND role = 'Enseignant.e' ORDER BY id_matiere DESC";
$stmt = $db->query($requete);
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultat as $cours) {
    echo "<div class='cours'>
        <div>
            <h2>{$cours["nom_mat"]}</h2>
            <p> Créé par {$cours["nom"]} {$cours["prenom"]}</p>
        </div>
    </div>";
}
?>

</body>

</html>