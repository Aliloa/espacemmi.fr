<?php
session_start();
include("connexion.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace MMI | Vie scolaire</title>
    <link rel='stylesheet' href='css/style_vie_scolaire.css'>

</head>
<body>
<h1>Travail à faire</h1>

<?php
    $requete = "SELECT * FROM travail_a_faire";
    $stmt = $db->query($requete);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        echo "<div class='result-container'>";
        echo "<h2>{$result['travail']}</h2>";
        echo "<h3>{$result['enseignant']}</h3>";
        echo "<p>{$result['date']}</p>";
        echo "</div>";
    }
?>

<h1>Controle à venir</h1>
<?php
    $requete = "SELECT * FROM controle";
    $stmt = $db->query($requete);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        echo "<div class='result-container'>";
        echo "<h2>{$result['controle']}</h2>";
        echo "<h3>{$result['enseignant']}</h3>";
        echo "<p>{$result['date']}</p>";
        echo "</div>";
    }
?>

<h1>Absences et retards</h1>
<?php
    $requete = "SELECT * FROM abscence_retard";
    $stmt = $db->query($requete);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $result) {
        echo "<div class='result-container'>";
        echo "<h2>{$result['titre']}</h2>";
        echo "<h3>{$result['nombre']}</h3>";
        echo "<p>{$result['date']}</p>";
        echo "</div>";
    }
?>

<h1>Mes moyennes</h1>

</body>
</html>