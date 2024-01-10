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

    <form action="traitenote.php" method="POST" enctype="multipart/form-data">


        <label for="name">Le nom de la note</label>
        <input type="text" name='note_name' id="name" required>

        <label for="note">La note attribué</label>
        <input type="number" name='notedonnee' id="note" min="0" max="20" required>


        <h1>Choisissez l'élève à qui vous attribuez la note</h1>
        <label for="eleve">Étudiant :</label>
        <select name="note_eleve" id="eleve" required>
            <?php
            include("connexion.php");

            if (isset($_SESSION["login"])) {
                $requete = "SELECT * FROM utilisateurs WHERE role = 'Étudiant.e' ORDER BY nom";
                $stmt = $db->query($requete);

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $cours) {
                    echo "<option value='{$cours['id_utiliateurs']}'>{$cours['nom']} {$cours['prenom']} {$cours['promotion']}</option>";
                }
            }
            ?>

        </select>


        <h1>Choisissez le cours auquel vous associez la note</h1>
        <label for="cours">Matière :</label>
        <select name="courschoisi" id="cours" required>
            <?php
            include("connexion.php");

            if (isset($_SESSION["login"])) {
                $requete = 'SELECT * FROM cours WHERE externe_prof = :idProfesseur AND coef IS NOT NULL';
                $stmt = $db->prepare($requete);
                $stmt->bindValue(':idProfesseur', $_SESSION["id"], PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $cours) {
                    echo "<option value='{$cours['id_cours']}'>{$cours['cours']}</option>";
                }
            }
            ?>

        </select>



        <h1>Choisissez la matière à laquelle vous associez la note</h1>
        <label for="matiere">Matière :</label>
        <select name="matierechoisi" id="matiere" required>

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








        <button type="submit" name='ajoutnote'>Ajouter</button>


    </form>
</body>

</html>