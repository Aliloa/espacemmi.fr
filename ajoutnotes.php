<?php
session_start();
include("connexion.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php
    if (!isset($_SESSION['login'])) {
        header('Location: index.php?access_denied');
        exit();
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Étudiant.e') {
        header('Location: accueil.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'Membre du CROUS') {
        header('Location: page_crous.php?access_denied');
    }
    if (isset($_SESSION["role"]) && $_SESSION["login"] === 'Admin') {
        header('Location: administration.php?access_denied');
    }

    ?>


    <form action="ajoutnotes.php" method="GET">

        <h1>Choisissez le cours auquel vous associez la note</h1>
        <label for="cours">Cours :</label>
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
                    if ($cours['id_cours'] == $_GET['courschoisi']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }                    echo "<option value='{$cours['id_cours']}' $selected>{$cours['cours']}</option>";
                }
            }
            ?>

        </select>
        <a href="ajoutnotes.php">Reset</a>
        <input type="submit" name='choixcours' value='Cours'>
    </form>





    <form action="traitenote.php" method="POST" enctype="multipart/form-data">


        <h1>Choisissez la matière à laquelle vous associez la note</h1>
        <label for="matiere">Matière :</label>
        <select name="matierechoisi" id="matiere" required>

            <?php
            include("connexion.php");

            if (isset($_GET['choixcours'])) {
                $chosencours = $_GET['courschoisi'];
                $_SESSION['chosencours'] = $chosencours;
                $_SESSION['id_cours'] = $matiere['id_cours'];


                $requete = 'SELECT * FROM grossematiere, cours WHERE grossematiere.id_matiere = cours.ext_matiere AND grossematiere.prof_ext = :idProfesseur AND cours.id_cours = :idCours';


                $stmt = $db->prepare($requete);
                $stmt->bindValue(':idProfesseur', $_SESSION["id"], PDO::PARAM_INT);
                $stmt->bindValue(':idCours', $chosencours, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $matiere) {
                    $_SESSION['id_matiere'] = $matiere['id_matiere'];
                    // $_SESSION['coef_cours'] = $matiere['coef'];
                    // $_SESSION['coef_matiere'] = $matiere['coefficient'];
                    echo "<option value='{$matiere['id_matiere']}'>{$matiere['nom_mat']}</option>";
                }
            }
            ?>
        </select>




        <label for="name">Le nom de la note</label>
        <input type="text" name='note_name' id="name" required>

        <label for="note">La note attribué</label>
        <input type="number" name='notedonnee' id="note" min="0" step="0.01" required>


        <h1>Choisissez l'élève à qui vous attribuez la note</h1>
        <label for="eleve">Étudiant :</label>
        <select name="note_eleve" id="eleve" required>
            <option value="0">Choisir un étudiant.e</option>
            <?php
            include("connexion.php");

            if (isset($_SESSION["login"])) {
                $requete = "SELECT * FROM utilisateurs WHERE role = 'Étudiant.e' ORDER BY nom";
                $stmt = $db->query($requete);

                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $eleve) {
                    echo "<option value='{$eleve['id_utilisateurs']}'>{$eleve['nom']} {$eleve['prenom']} {$eleve['promotion']}</option>";
                }
            }

            ?>
        </select>


        </select>
        <button type="submit" name='ajoutnote'>Ajouter</button>


    </form>
</body>
<script src='js/script_accueil.js'></script>
<script src='js/script_dark_mode.js'></script>
</html>