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

    <form action="traite_travail.php" method="POST">
        <h1>Ajouter un travail à faire</h1>

        <label for="travail">Travail</label>
        <textarea name="travail" cols="30" rows="10"></textarea>

        <label for="nom">Date</label>
        <input type="date" name="date" required> <br>

        <select name="matiere" id="matiere" required>


            <?php
            include("connexion.php");

            if (isset($_SESSION["login"])) {
                $requete = 'SELECT * FROM grossematiere WHERE prof_ext = :idProfesseur';
                $stmt = $db->prepare($requete);
                $stmt->bindValue(':idProfesseur', $_SESSION["id"], PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $matiere) {
                    echo "<option value='{$matiere['id_matiere']}'>{$matiere['nom_mat']}</option>";
                }
            }
            ?>


        </select>


        <button type="submit" name='soumettre'>S'inscrire</button>
    </form>
</body>

</html>