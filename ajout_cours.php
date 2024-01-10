<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours</title>
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

    <form action="traitecours.php" method="POST" enctype="multipart/form-data">
        <h1>Ajouter un cours</h1>

        <label for="module">Nom du cours</label>
        <input type="text" id="module" name="cours" required>


        <label for="co">Coefficient</label>
        <input type="number" id="co" name="coef" min="0" max="20">

        <h1>Choisissez la matière pour votre prochain cours :</h1>
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

        <p>Votre document</p>
        <input type="file" name="document" accept=".pdf, .odt, .pptx, .docx, .xlsx" required> <br>


        <button type="submit" name='ajoutercours'>Ajouter</button>


    </form>



    <form action="deconnexion.php" action='GET'>
        <input type="submit" name="deconnect" value="Se déconnecter">
    </form>
    <?php
    include("connexion.php");
    if (isset($_SESSION["login"])) {


        // Requete qui sélectionne tout de cours, mais nom de la matire pour grossematiere puis fait les liens avec les clés externes et récupère login pour afficher les modules du prof connecté
        $requete = "SELECT cours.*, grossematiere.nom_mat FROM cours INNER JOIN grossematiere ON cours.ext_matiere = grossematiere.id_matiere INNER JOIN utilisateurs ON grossematiere.prof_ext = utilisateurs.id_utilisateurs WHERE utilisateurs.login = :login AND utilisateurs.role = 'Enseignant.e'";        

        $stmt = $db->prepare($requete);
        $stmt->bindValue(":login", $_SESSION["login"], PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($resultat as $cours) {
            $chemindoc = "documents/" . $cours["document"];

            echo "<p>{$cours['cours']} - Matière : {$cours['nom_mat']}</p>
            <a href='{$chemindoc}'>{$cours["document"]} </a> </br></br>";
        }
    
}
    ?>
    </form>
</body>


</html>