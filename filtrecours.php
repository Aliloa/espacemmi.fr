<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes cours filtrés</title>
</head>

<body>

    <?php
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    ?>
    <h1>Mes cours filtrés</h1>

    <div>
        <h1> Filtré par </h1>

        <form action="filtrecours.php" method="GET">
            <div class="input-container">
                <select name="filter" id="filter" aria-label="Filtrer dans le site">
                    <option value="0" <?php if ($_GET['filter'] == 0)echo 'selected'; ?>>Filtrer</option>
                    <option value="1" <?php if ($_GET['filter'] == 1)echo 'selected'; ?>>SAE</option>
                    <option value="2" <?php if ($_GET['filter'] == 2)echo 'selected'; ?>>Ressources</option>
                </select>
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>

    <?php
    include("connexion.php");

    if (isset($_GET['filter'])) {
        $filtrer = $_GET['filter'];
    } else {
        $filtrer = 0;
    }

    $requete = "SELECT grossematiere.*, utilisateurs.nom, utilisateurs.prenom
        FROM grossematiere
        INNER JOIN utilisateurs ON grossematiere.prof_ext = utilisateurs.id_utilisateurs";
    
    if ($filtrer != 0) {
        if ($filtrer == 1) {
            $requete .= " WHERE grossematiere.type = 'SAE'";
        } elseif ($filtrer == 2) {
            $requete .= " WHERE grossematiere.type = 'Ressources'";
        }
    }
    
    $requete .= " ORDER BY grossematiere.id_matiere DESC";

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
